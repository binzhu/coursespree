<?php
// e-Tutor is licensed under the GPL. Please see the LICENSE file for more
// information.

/*
assignments.php

written March 8th, 2002 by Pat

Script:

	Gives menu of options to add and remove assignments.
	Adds assignments.
	Removes assignments.
*/

	session_start();
	session_register("loggedin", "id");
	
	require("include.php");
	doc_start('Assignment Manager');

	if (!$loggedin && !checkAdmin()) {
		die ("Not logged in!</BODY></HTML>");
	}

	if ($user->account != 'pr' && !checkAdmin()) {
		die ("You do not have course-administration status.</BODY></HTML>");
	}

	// If there are no courses, say so!
	$result = @mysql_query("SELECT ID FROM courses") or die(mysql_error());
	if (mysql_num_rows($result) < 1) {
		msgbox("No Courses Yet!", "There are no courses on this server yet. You must create courses prior to adding assignments.", 'error', 'Okay', './');
		die();
	}

	if (isset($cancel)) {
		unset($option);
	}

	// If it's the admin, populate the list of courses with all the courses on the server
	if (checkAdmin()) {
		fillCourses();
	}
	
	if (!isset($option)) {
		showMenu();
	}
	elseif ($option == 'add') {
		// Perform Input Checks
		$c = split(',', $coursesec);
		if (!$user->has_course($c[0], $c[1])) die("You can't set assignments for this course!</BODY></HTML>");
		
		if (strlen($title) == 0) {
			msgbox('Error', "No assignment name entered.", 'error', 'Okay', "$PHP_SELF");
			die();
		}
		if (intval($maxfile) < 1) {
			msgbox('Error', "Invalid maximum file size entered. Size must be 1 or greater.", 'error', 'Okay', "$PHP_SELF");
			die();
		}
		if (intval($maxnumfiles) < 1) {
			msgbox('Error', "Invalid maximum number of files entered. There must be at least 1 file.", 'error', 'Okay', "$PHP_SELF");
			die();
		}
		
		// Check if valid day of the month is valid
		$daysinmonth = array(31,28,31,30,31,30,31,31,30,31,30,31);
		if (($dueyear - 2000) % 4 == 0) $daysinmonth[1] = 29;
		if ($dueday > $daysinmonth[$duemonth-1]) {
			msgbox('Error', "That date does not exist.", 'error', 'Okay', "$PHP_SELF");
			die();
		}
		
		// Check if date due is in the past
		if (date("YmdHi") >= "$dueyear$duemonth$dueday$duehour$dueminute") {
			msgbox('Error', "The due date is in the past.", 'error', 'Okay', "$PHP_SELF");
			die();
		}
		
		// Compose the elements of the SQL statement
		if ($late) {
			$late = 1;
		}
		else {
			$late = 0;
		}
		
		$courseid = split(',', $coursesec);
		
		mysql_query("INSERT INTO assignments SET name='$title', courseID='" . $courseid[0] . "', section='" . $courseid[1] . "', duedate='$dueyear-$duemonth-$dueday $duehour:$dueminute:00', maxfilesize='" . intval($maxfile) . "', maxfiles='" . intval($maxnumfiles) . "', allowlate='$late'") or die(mysql_error());
		
		msgbox("Assignment Created", "The assignment '$title' has been added.", '', 'Okay', $PHP_SELF);
	}
	
	elseif ($option == 'removeconfirm') {
		// Confirm the removal of assignment
		msgbox("Important Confirmation", "Are you absolutely certain you want to remove this course?<OL><LI>This assignment will be removed</LI><LI>All user files pertaining to assignments will be removed</LI></OL>", '', 'I am certain', "$PHP_SELF?option=removeassign&aid=$aid", 'Cancel', $PHP_SELF);
	}
	
	elseif ($option == 'removeassign') {
		$result = mysql_query("SELECT courseID,section FROM assignments WHERE ID='$aid'") or die(mysql_error());
		$row = mysql_fetch_array($result);
		
		// Check ownership over course
		if (!$user->has_course($row['courseID'], $row['section'])) die("You can't set assignments for this course!</BODY></HTML>");
		
		// Remove everything associated with the assignment
		mysql_query("DELETE FROM files WHERE assignmentID='$aid'") or die(mysql_error());
		mysql_query("DELETE FROM assignments WHERE ID='$aid'") or die(mysql_error());
		
		msgbox("Assignment Removed", "The assignment and all pertinent files have been removed.", '', 'Okay', $PHP_SELF);
	}
	
	function showMenu() {
		global $user;
		?>
		<CENTER>
		<!-- Add Assignment -->
		<FORM action="<?php echo $PHP_SELF ?>" METHOD="POST">
		<INPUT TYPE="hidden" NAME="option" VALUE="add">
		<?php box_start('Add Assignment', 400) ?>
		<B>Course to add the Assignment to:</B><BR>
		<SELECT NAME="coursesec">
		
		<?php
		// Print all the courses pertinent to user
		foreach ($user->courses as $courses) {
			print "<OPTION VALUE='$courses->ID,$courses->section'>$courses->code$courses->section - $courses->title</OPTION>\n";
		}
		?>
		
		</SELECT>
		<BR><BR>
		<B>Assignment Title:</B><BR>
		<INPUT TYPE="TEXT" NAME="title" SIZE="40" MAXLENGTH="120" VALUE="Sample Assignment">
		
		<BR><BR>
		<B>Due Date:</B><BR>
		<SELECT NAME="dueyear">
		<?php
		$date = split(',', date("Y,n,j"));
		$months = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
		// Print this year and next year
		print "<OPTION VALUE='" . $date[0] . "'>" . $date[0] . "</OPTION>\n";
		print "<OPTION VALUE='" . ($date[0] + 1) . "'>" . ($date[0] + 1) . "</OPTION></SELECT> \n";
		print "<SELECT NAME='duemonth'>\n";
		
		// Print the months
		for ($i=1; $i<=12; $i++) {
			if ($i < 10) { $zero = '0'; }
			else { $zero = ''; }
			print "<OPTION VALUE='$zero$i'>" . $months[$i-1] . "</OPTION>\n";
		}
		print "</SELECT>\n";
		
		// Print the days
		print "<SELECT NAME='dueday'>\n";
		for ($i=1; $i<=31; $i++) {
			if ($i < 10) { $zero = '0'; }
			else { $zero = ''; }
			print "<OPTION VALUE='$zero$i'>$i</OPTION>\n";
		}
		print "</SELECT> at \n";
		
		// Print the hours
		print "<SELECT NAME='duehour'>\n";
			for ($i=0; $i<=24; $i++) {
				if ($i < 10) { $zero = '0'; }
				else { $zero = ''; }
				print "<OPTION VALUE='$zero$i'>$zero$i</OPTION>\n";
			}
		print "</SELECT>:";
		
		// Print the minutes
		print "<SELECT NAME='dueminute'>\n";
			for ($i=0; $i<=59; $i+=5) {
				if ($i < 10) { $zero = '0'; }
				else { $zero = ''; }
				print "<OPTION VALUE='$zero$i'>$zero$i</OPTION>\n";
			}
		print "</SELECT>\n";
		
		?>
		
		<BR><BR>
		<B>Maximum file size for uploads:</B><BR>
		<INPUT TYPE="TEXT" NAME="maxfile" SIZE="5" MAXLENGTH="5" VALUE="1000"> kilobytes<BR>
		<FONT SIZE="-2">(maximum size on server is <?php echo get_cfg_var(upload_max_filesize); ?>b)</FONT>

		<BR><BR>
		<B>Maximum number of files allowed:</B><BR>
		<INPUT TYPE="TEXT" NAME="maxnumfiles" SIZE="2" MAXLENGTH="2" VALUE="1"> file(s)
		
		<BR><BR>
		<B>Other Options:</B><BR>
		<INPUT type="checkbox" name="late">&nbsp;&nbsp;Allow late submissions<BR><BR>
		
		<CENTER><INPUT TYPE="SUBMIT" VALUE="Create Assignment"></CENTER>
		
		<?php box_end(); ?>
		</FORM>
				
		<!-- Remove Assignment -->
		<?php
		box_start('Remove Assignment', 400);

		$count = 0;
		print "<TABLE WIDTH='100%'>\n";
		foreach ($user->courses as $courses) {
			if (($courses->isTA) || ($user->account == 'pr' || checkAdmin())) {
				$assignments = mysql_query("SELECT ID,name FROM assignments WHERE courseID='$courses->ID' AND section='$courses->section'");

				while ( $row = mysql_fetch_array($assignments) ) {
					print "<TR><TD>$courses->code</TD><TD>$courses->section</TD><TD>" . $row["name"] . "</TD><TD><A HREF='$PHP_SELF?option=removeconfirm&aid=" . $row["ID"] . "'>remove</A></TD></TR>\n";
					$count++;
				}
			}
		}
		print "</table>\n";
		
		if ($count == 0) {
			print "<I>You have no assignments for any sections</I>\n";
		}
		
		box_end();
		print '<BR><BR><A HREF="./">Return to Menu</A></CENTER>';
	}	
?>
