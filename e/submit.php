<?php
// e-Tutor is licensed under the GPL. Please see the LICENSE file for more
// information.

/*
submit.php

written January 26th, 2002 by Pat
multi-file submission added December 28th, 2002 by Pat

Script:

	Submits assignments.
	Checks if valid information for.
*/
	session_start();
 	session_register("loggedin");

	session_register("id", "stnum", "first", "last", "course", "sections", "email", "username", "password", "account", "cryptpassword");
	require("include.php");
	doc_start('e-tutor File Submission');
	if (!isset($loggedin)) {
		die ("Not Logged In!</body></html>");
	}
	else {
		// PERFORM SUBMISSION VALIDITY CHECKS
		$dbcnx = @mysql_connect('localhost', 'etutor', getPasswd()) or die (mysql_error());
		@mysql_select_db("etutor") or die('e-tutor not properly set up.');
		
		$courses = split(',', $course);
		$csections = split(',', $sections);

		$curtime = date("Y-m-d H:i:s");
		
		$result = @mysql_query("SELECT * FROM assignments WHERE ID='$aid'") or die (mysql_error());
		$row = mysql_fetch_array($result);
		
		// Verify that the user is in the course associated with the assignment
		for ($i=0; $i<count($courses); $i++) {
			if (($courses[$i] == $row["courseID"]) and ($csections[$i] == $row["section"])) {
				$verified = 1;
			}
		}
		if ($verified != 1) {
			die("<B>Error</B><BR>You are NOT in this course!<BR><BR><B>OR</B><BR><BR>The file you are uploading is much too big.</body></html>");
		}
		$verified = 0;
		
		// Check for late 'hackers'
		if (($curtime > $row["duedate"]) && ($row["allowlate"] == 0)) {
			die("This assignment is LATE!</body></html>");
		}

		// Only do this if multiple file uploads are not permitted
		if ($row["maxfiles"] == 0) {
			// See if assignment is submitted already
			$afile = @mysql_query("SELECT ID FROM files WHERE stnum='$stnum' AND assignmentID='" . $aid . "'") or die (mysql_error());
			$submitted = mysql_num_rows($afile);
		}

		// Final security check
		if (($row["allowlate"] > 0) || ($submitted > 0 && $row["allowmultiple"] > 0) || ($submitted == 0 && $curtime <= $row["duedate"])) {
			$verified = 1;
		}
		else {
			die("You cannot submit this assignment!</body></html>");
		}
		
		// START MULTIPLE FILE UPLOAD
		if (isset($uploading)) {
			// Do a count to see how many files actually got uploaded
			$fileuploadcount = 0;
			for ($i=0; $i<count($HTTP_POST_FILES['userfile']['tmp_name']); $i++) {
				if (is_uploaded_file($userfile[$i])) {
					$fileuploadcount++;
				}
			}

			// If one or more files got uploaded, remove any previous submissions
			// from database
			if ($fileuploadcount > 0) {
				@mysql_query("DELETE FROM files WHERE stnum='$stnum' AND assignmentID='$aid'") or die (mysql_error());
				
				// Make sure this will be told to the user
				$message = '<P>Your previous file upload for this assignment has been removed.';
			}

			// Now add the new files
			// Go through each file -- i is the index variable
			for ($i=0; $i<count($HTTP_POST_FILES['userfile']['tmp_name']); $i++) {
				// Check that this file field was used
				if (is_uploaded_file($userfile[$i])) {
					// Read in the current file
					$fh = fopen($userfile[$i], 'r');
					$filecontents = fread($fh, filesize($userfile[$i]));
					$filecontents = addslashes($filecontents);
					fclose ($fh);

					$filename = $HTTP_POST_FILES['userfile']['name'][$i];
					$mimetype = $HTTP_POST_FILES['userfile']['type'][$i];

					// Set the SET part of the SQL statement
					$set = "courseID='" . $row["courseID"] . "', section='" . $row["section"] . "', assignmentID='$aid', stnum='$stnum', filename='$filename', receipt='12345', mimetype='$mimetype', data='$filecontents'";

					// Create new entry for this file
					@mysql_query("INSERT INTO files SET $set") or die (mysql_error());
					
					// Add to success string
					$successstring .= '- ' . $HTTP_POST_FILES['userfile']['name'][$i] . ' (' . number_format($HTTP_POST_FILES['userfile']['size'][$i]/1024) . 'K) <BR>';
				}
				elseif ($HTTP_POST_FILES['userfile']['name'][$i]) {
					// PHP doesn't think it's an uploaded file
					// See that the filename specified by user is blank
					$errorstring .= '- ' . $HTTP_POST_FILES['userfile']['name'][$i] . '<BR>';
					$errorcount++;
				}
			}

			// MESSAGE BOX PRINTING
			$msgtitle = 'Sucess';
			$buttoncaption = 'Okay';
			$buttonaction = './';
			
			// See if there were errors
			if ($errorcount > 0) {
				$msgtitle = 'Error';
				$boxtype = 'error';
				$buttoncaption = 'Try Again';
				$buttonaction = "$PHP_SELF?aid=$aid";
			}

			if ($successstring == '') {
				$successstring = '- <I>No files uploaded successfully</I>';
			}

			// Construct the message
			$message .= '<P>The following files were successfully uploaded:<BR>' . $successstring;
			
			// Again, if there were errors
			if ($errorcount > 0) {
				$message .= "<P><FONT COLOR='Red'>$errorcount files did not upload successfully.</FONT> They are:<BR>" . $errorstring;
				$message .= '<P>A possible cause of error is that your files are too big.<BR>This assignment requires a total file size within ' . $row["maxfilesize"] . ' Kb.';
			}

			// Show the message box and exit
			msgbox($msgtitle, $message, $boxtype, $buttoncaption, $buttonaction);
			exit();
		}
		// END FILE UPLOADING
?>

<FORM action="<?php echo $PHP_SELF?>" enctype="multipart/form-data" method="post">
<INPUT type="hidden" name="MAX_FILE_SIZE" value="<?php echo ($row["maxfilesize"]*1024)?>">
<INPUT type="hidden" name="aid" value="<?php echo $aid?>">

<CENTER>
<?PHP box_start('Online File Submission', '350') ?>
<CENTER><BR>
The selected assignment is<BR><I><?php echo $row["name"]?></I><BR><BR>
You are allowed to submit up to <B><?php echo $row["maxfiles"]?></B> files.<BR><BR>
<FONT COLOR="Red"><B>Warning</B></FONT><BR>The maximum total file size is<BR><I><?php echo $row["maxfilesize"]?> Kb</I><BR><BR>
Please select the file(s) you wish to submit.<BR>
Then click 'Upload'.<BR><BR>

<?php
	for ($i=0; $i<$row["maxfiles"]; $i++) {
		print 'File: <INPUT type="file" name="userfile[]" size=24><BR><BR>' . "\n";
	}
?>

<INPUT type="hidden" name="uploading" value="1">
<INPUT type="submit" value="Upload"><BR>
<BR></CENTER>
<?PHP box_end() ?>
</FORM>

<BR><BR>
<A HREF="./">Return to Menu</A>
</CENTER>
</BODY>
</HTML>

<?php
	}
?>
