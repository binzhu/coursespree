<?php
// e-Tutor is licensed under the GPL. Please see the LICENSE file for more
// information.

/*
index.php (was: login.php)

written January 5th, 2002 by Pat

Script:

	Displays login screen, then verifies login and shows main menu.
	For successful login, sets session-cookie.
*/

	require("include.php");
	doc_start('e-Tutor');
	center_start();
	
	if (!isset($username)) {
		showLogin('');
	}
	else {
		$result = @mysql_query("SELECT * FROM user WHERE username='$username'") or die ("Invalid query");
		$row = mysql_fetch_array($result);
		
		// Try regular login OR
		// Try student number as un and case-insensitive ln as password
		if (($row["password"] == crypt($password, $row["ln"])) || ($username == $row['stnum'] && $row["password"] == crypt(strtoupper($password), $row["ln"]))) {
			// The user has successfully Logged IN!
				
			$loggedin = 1;
			$id = $row["ID"];
			$stnum = $row["stnum"];
			$first = $row["fn"];
			$last = $row["ln"];
			$course = $row["courseID"];
			$sections = $row["sections"];
			$email = $row["email"];
			$username = $row["username"];
			$cryptpassword = $row["password"];
			$account = $row["account"];
			
			$user = new User($id); //re-load $user object with information for user with user ID equal to $id
			
			// Do check for password change
			passChangeCheck();
			
			box_start("", 600);
			?>
			e-Tutor System<BR>
			<SPAN class="title">Welcome <?php print $user->fn . " " . $user->ln?></SPAN><BR>
			<?php
			box_end();
			print "<BR>";
			
			box_start("", 600);
			$curtime = date("Y-m-d H:i:s");
			print "Current server date and time: $curtime";
			box_end();
			
			print "<BR>";
		
			switch ($row["account"]) {
				case 'st':
					showStudentMenu();
					break;
				case 'pr':
					showProfMenu();
					break;
			}
		} elseif ($username == 'admin' && adminCheckPass($password)) {
			box_start("", 600);
			?>
			e-Tutor System<BR>
			<SPAN class="title">Welcome Administrator</SPAN><BR>
			<?php
			box_end();
			print "<BR>";
			
			box_start("", 600);
			$curtime = date("Y-m-d H:i:s");
			print "Current server date and time: $curtime";
			box_end();
			print "<BR>";
			showProfMenu();
		}
		else {
			// The login has FAILED
			$errormessage = "<FONT COLOR='#FF0000'>Invalid User/Password</FONT><BR>";
			showLogin($errormessage);
			session_unset();
		}
	}
	
	center_end();
	doc_end();
	
	function showLogin($error) {
		global $etversion;
		
		// Get Organization name
		$prefresult = mysql_query("SELECT value FROM prefs WHERE name='organization'") or die(mysql_error());
		$org = mysql_fetch_array($prefresult);
?>

		<FORM ACTION="<?php echo $PHP_SELF; ?>" METHOD="POST">
		<?php center_start() ?>
		<TABLE CELLPADDING=1 BORDER=0 ALIGN=CENTER>
		<TR><TD BGCOLOR="#A0A0A0">
		<TABLE BORDER=0 WIDTH=600 CELLSPACING=0>
		<TR VALIGN="MIDDLE"><TD><IMG SRC="logo.png" HEIGHT=75 ALT="Logo"></TD><TD><FONT SIZE="+2" COLOR="#005EA0"><B>e-Tutor Login</B></FONT><BR><B>at <?php echo $org['value']?></B></TD></TR>
		</TABLE>
		<TABLE width=600 cellspacing=0 cellpadding=2 border=0>
		<TR><TD colspan=2 bgcolor="#DDDDDD"><B>e-Tutor - Login</B></TD></TR>
		<TR><TD colspan=2><B><?php echo $error; ?>&nbsp;</B></TD></TR>
		<TR>
		<TD WIDTH="50%" ALIGN="RIGHT">User Name:&nbsp;</TD>
		<TD WIDTH="50%"><INPUT TYPE="TEXT" NAME="username" MAXLENGTH="35" SIZE="14"></TD>
		</TR>
		<TR>
		<TD ALIGN="RIGHT">Password:&nbsp;</TD>
		<TD><INPUT TYPE="PASSWORD" NAME="password" MAXLENGTH="14" SIZE="14"></TD>
		</TR>
		<TR>
		<TD colspan=2 align=center><BR><FONT SIZE="-2"><INPUT TYPE="SUBMIT" VALUE="Login"><BR>
		<BR>
		<B>Note:</B> Your web browser must accept cookies.</FONT></TD>
		</TR>
		</TABLE>
		</TD></TR></TABLE>
		<FONT SIZE="-2" COLOR="#A0A0A0">e-Tutor &copy;2002-2003 J. Nash, P. Suwalski, M. Svilans.<BR>
		Web: <A HREF="http://etutor.sf.net" CLASS="hiddenlink">http://etutor.sf.net</A><BR>
		Version: PHP <?php echo $etversion ?></FONT>
		<?php center_end() ?>
		</FORM>

<?php
	}
	
	function showStudentMenu() {
		global $user, $id, $stnum, $first, $last, $course, $sections, $email, $username, $password, $account, $cryptpassword;
		$courses = split(',', $course);
		$csections = split(',', $sections);
		global $curtime;

		$result = @mysql_query("SELECT ID, code FROM courses") or die (mysql_error());
		while ( $row = mysql_fetch_array($result) ) {
			$courselist[$row['ID']] = $row['code'];
		}
		
		box_start("Assignments", 600);
		
		// Generate the assignment table into $assigntable
		for ($i=0; $i<count($courses); $i++) {
			// Skip over courses where user is a TA
			if (strstr($courses[$i], '*')) {
				continue;
			}
			
			$result = @mysql_query("SELECT * FROM assignments WHERE courseID='" . $courses[$i] . "' AND section='" . $csections[$i] . "'") or die (mysql_error());
			while ( $row = mysql_fetch_array($result) ) {
				// See if assignment is submitted already
				$afile = @mysql_query("SELECT data,filename,date,ID FROM files WHERE stnum='$stnum' AND assignmentID='" . $row["ID"] . "'") or die (mysql_error());
				$submitted = mysql_num_rows($afile);
				$status = '';
				
				if ($submitted > 0) {
					// Get the file size
					while ($fetch = mysql_fetch_array($afile)) {
						$fieldlen = mysql_fetch_lengths($afile);
						$status .= '<A HREF="getfile.php?fid=' . $fetch['ID'] . '">' . $fetch['filename'] . '</A>&nbsp;(' . number_format(($fieldlen[0] / 1024), 1) . "K)<BR>\n";
					}
				}
				elseif ($curtime > $row["duedate"]) {
					$status .= "<font color='#ff0000'>Late</font>";
				}
				if ($submitted && $curtime <= $row["duedate"]) {
					$status .= " [<a href='submit.php?aid=" . $row["ID"] . "'>Resubmit</a>]";
				}
				elseif (($row["allowlate"] > 0 && !$submitted) || (!$submitted && $curtime <= $row["duedate"])) {
					$status .= " [<a href='submit.php?aid=" . $row["ID"] . "'>Submit</a>]";
				}
								
				$assigntable .= '<TR VALIGN=TOP><TD>' . $courselist[$row["courseID"]] . $row["section"] . '</TD><TD class="grey">' . $row["name"] . '</TD><TD>' . $row["duedate"] . '</TD><TD>' . $status . "</TR>\n";
			}
		}
		
		// See if any assignments are present in the $assigntable
		if (isset($assigntable)) {
			print "<TABLE cellspacing=0 cellpadding=0 border=0><TR><TD bgcolor=#A0A0A0>\n";
			print "<TABLE CELLPADDING='2' CELLSPACING='1' BORDER='0'><TR><TD class='header'>Course</TD><TD class='header'>Assignment</TD><TD class='header'>Deadline</TD><TD class='header'>Status</TD></TR>\n";
			print $assigntable;
			print "</TABLE></TD></TR></TABLE>\n";
		}
		else {
			print "<I>You have no assignments</I>.";
		}
		
		box_end(); //end assignments box
		print "<P>";
		
		if (strstr($course, '*'))
			showTAMenu();
		
		require('plugins.php');
		if ($user->account == 'st' && $user->hasTACourses) {
			printPlugInIcons('ta');
		}
		else {
			printPlugInIcons($user->account);
		}
		
		box_start("Options", 600);
		?>
		
		<TABLE width=66%>
		<TR>
		<TD align=center width=50%><A href="userprefs.php"><IMG src="img/prefs.png" width=48 height=48 border=0><BR>User Preferences</A></TD>
		<TD align=center width=50%><A href="logout.php"><IMG src="img/logout.png" width=48 height=48 border=0><BR>Log Out</A></TD>
		</TR>
		</TABLE>
		
		<?php
		box_end();
	}

	function showTAMenu() {
		global $user;

		box_start("Assignment Files", 600);
		
		?>
		Click an assignment below to view the submitted student files.<BR>
		<BR>
		
		<?php
		
		if (checkadmin()) { //show all assignments to administrator
			$result = @mysql_query("SELECT * FROM assignments ORDER BY duedate") or die (mysql_error());

			?>
			<TABLE CELLPADDING=0>
			<TR>
			<TD BGCOLOR='#A0A0A0'>

			<TABLE WIDTH="450" CELLSPACING="1" BORDER="0" CELLPADDING="2">
			<TR>
			<TD class='header'>Name</TD>
			<TD class='header'>Course</TD>
			<TD class='header'>Due Date</TD>
			</TR>

			<?php
			
			if (mysql_num_rows($result)) {
				while ($row = mysql_fetch_array($result)) {
					$temp = new Course($row["courseID"]);
					?>
					
					<TR>
					<TD><A HREF='listfiles.php?aid=<?php print $row['ID']?>'><?php print $row['name']?></A></TD>
					<TD><?php print $temp->code . " " . $row['section']?></TD>
					<TD>Due: <?php print $row['duedate']?></TD>
					</TR>
					
					<?php
				}
			}
			?>

			</TABLE>
			</TD>
			</TR>
			</TABLE>
			<?php
		} else {
			
			foreach ($user->courses as $courses) {
				if (($courses->isTA) || ($user->account == 'pr')) {

					$result = @mysql_query("SELECT * FROM assignments WHERE courseID='$courses->ID' AND section='$courses->section' ORDER BY duedate") or die (mysql_error());

					if (mysql_num_rows($result)) {

						?>

						<TABLE CELLPADDING=0>
						<TR>
						<TD BGCOLOR='#A0A0A0'>

						<TABLE WIDTH="450" CELLSPACING="1" BORDER="0" CELLPADDING="2">
						<TR>
						<TD COLSPAN='2' class='header'><?php print "$courses->code$courses->section - $courses->title" ?></TD>
						</TR>

						<?php
						while ($row = mysql_fetch_array($result)) {
							print "<TR><TD width='50%'><A HREF='listfiles.php?aid=" . $row['ID'] . "'>" . $row['name'] . "</A></TD><TD width='50%'>Due: " . $row['duedate'] . "</TD></TR>\n";
						}
						?>

						</TABLE>
						</TD>
						</TR>
						</TABLE>
						<?php
					}
				}
			}
		}
		
		box_end();	
		print '<BR>';
	}
	
	function showProfMenu() {
		global $user;
		
		box_start("Main Menu", 600);
		?>
		
		<TABLE cellspacing=0 cellpadding=0 border=0 width=100%>
		<TR>
		<TD align=center width=33%><A href="courses.php"><IMG src="img/courses.png" width=48 height=48 border=0><BR>Manage Courses</A></TD>
		<TD align=center width=34%><A href="users.php"><IMG src="img/users.png" width=48 height=48 border=0><BR>Manage Users</A></TD>
		<TD align=center width=33%><A href="assignments.php"><IMG src="img/assignments.png" width=48 height=48 border=0><BR>Course Assignments</A></TD>
		</TR>
		<TR>
		<TD colspan=3>&nbsp;<BR>&nbsp;<BR></TD>
		</TR>
		<TR>
		<TD align=center><A href="userprefs.php"><IMG src="img/prefs.png" width=48 height=48 border=0><BR>Preferences</A></TD>
		<TD align=center><A href="logout.php"><IMG src="img/logout.png" width=48 height=48 border=0><BR>Log Out</A></TD>
		<TD align=center>&nbsp;</TD>
		</TR>
		</TABLE>
		
		<?php
		
		box_end();
		print "<P>";
		require('plugins.php');
		printPlugInIcons($user->account);
		showTAMenu();
	}
	
	function passChangeCheck() {
		global $user;
		
		// Check if the password is even to be changed
		$prefresult = mysql_query("SELECT value FROM prefs WHERE name='forcepwchange'") or die(mysql_error());
		$pref = mysql_fetch_array($prefresult);
		if (!$pref['value']) return;
		
		// Check that the user hasn't changed their password
		$userpwresult = mysql_query("SELECT pwchanged FROM user WHERE ID='" . $user->ID . "'") or die(mysql_error());
		$userpw = mysql_fetch_array($userpwresult);
		if ($userpw['pwchanged']) return;
		
		// If we got this far, force password change
		box_start("Forced Password Change", 600);
		?>
		<TABLE width="100%" cellspacing="2" cellpadding="0">
		<TR>
		<TD width="64" rowspan="4"><IMG src="img/password.png" width=48 height=48></TD>
		<TD COLSPAN=2><P>Welcome to e-Tutor. As a security measure, you will now be asked to change your default password to one of your own choosing.
		<FORM ACTION="userprefs.php" METHOD="POST">
		<INPUT TYPE="HIDDEN" NAME="action" VALUE="changepw">
		<INPUT TYPE="HIDDEN" NAME="forcepwchange" VALUE="1">
		</TD></TR>
		<TR><TD ALIGN="RIGHT" WIDTH="40%">New Password:</TD><TD><INPUT TYPE="PASSWORD" SIZE="8" MAXLENGTH=8 NAME="pw1"></TD></TR>
		<TR><TD ALIGN="RIGHT">Confirm New Password:</TD><TD><INPUT TYPE="PASSWORD" SIZE="8" MAXLENGTH=8 NAME="pw2"></TD></TR>
		<TR><TD COLSPAN="2" ALIGN=RIGHT><BR><INPUT TYPE="SUBMIT" VALUE="Save Password"></FORM></TD></TR>
		</TABLE>
		<?php
		box_end();
		doc_end();
		exit();
	}
	
?>
