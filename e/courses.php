<?php
// e-Tutor is licensed under the GPL. Please see the LICENSE file for more
// information.

/*
courses.php

written February 21st, 2002 by Pat

Script:

	Gives menu of options to add and remove courses.
	Adds courses.
	Removes courses.
*/

	session_start();
	session_register("loggedin", "id");

	require("include.php");
	doc_start('Course Manager');

	if (!$loggedin && !checkAdmin()) {
		die ("Not logged in!</BODY></HTML>");
	}

	if ($user->account != 'pr' && !checkAdmin()) {
		die ("You do not have course-administration status.</BODY></HTML>");
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
	elseif ($option == 'selectadd') {
		// YES selected
		if ($yesno == '1') {
			// No course selected
			if ($courseid == '0') {
				msgbox("Select Something", "You must select a course or specify that the one you are looking for is not in the list.", 'error', 'Okay', $PHP_SELF);
				die();
			}
			// Course Selected
			showAddSection();
		}
		// NO selected
		else {
			showAddCourse();
		}	
	}
	elseif ($option == 'addcourse') {
		// Add a New Course to the database
		if ($code == '' || $sectionstoadd == '' || $title == '') {
			msgbox('Error', 'Not enough information was supplied to create the course.', 'error', 'Okay', "$PHP_SELF?option=selectadd&yesno=0");
		}
		elseif ($user->account != 'pr' && !checkAdmin()) {
			die ("You are not allowed to add courses.");
		}
		else {
			// Check if course code has already been used
			$s = "SELECT code FROM courses WHERE code='$code'";
			$result = @mysql_query($s) or die(mysql_error()); //query for users with this username
			
			// Ssee if any courses were found with specified course code
			if ($row = mysql_fetch_array($result)) {
				msgbox('Error', "A course with the code '$code' has already been registered.<BR>If you need to add a section, select <I>Yes</I> and choose it from the list.", 'error', 'Okay', "$PHP_SELF?option=selectadd&yesno=0");
				die();
			}

			// Make the course code and section letters uppercase
			$code = strtoupper($code);
			$sectionstoadd = strtoupper($sectionstoadd);

			// Get the course code format from the prefs database
			$prefresult = mysql_query("SELECT value FROM prefs WHERE name='ccformat'") or die(mysql_error());
			$ccformat = mysql_fetch_array($prefresult);

			// See that the course code format is adhered to
			if (!preg_match('/' . $ccformat['value'] . '/', $code)) {
				msgbox('Error', "Wrong format for course code. Please follow the guidelines provided", 'error', 'Okay', "$PHP_SELF?option=selectadd&yesno=0");
				die();
			}
			
			// Check that the user entered the right format for sections
			if (!ereg("^[A-Z](,[A-Z])*$", $sectionstoadd)) {
				msgbox('Error', "Wrong format for sections.", 'error', 'Okay', "$PHP_SELF?option=selectadd&yesno=0");
				die();
			}
			
			// Add the course
			mysql_query("INSERT INTO courses SET code='$code', sections='$sectionstoadd', title='$title'") or die(mysql_error());
			
			// Add the course to the user's list of courses
			$result = mysql_query("SELECT ID FROM courses WHERE code='$code'") or die(mysql_error());
			$row = mysql_fetch_array($result);
			foreach (split(',', $sectionstoadd) as $sect) {
				$user->add_course($row['ID'], $sect, 0);
				$user->save();
			}
			
			msgbox("Course Added", "The course '$title' ($code $sectionstoadd) added.", '', 'Okay', $PHP_SELF);
		}
	}
	elseif ($option == 'addsection') {
		// Add a New Course Section to the database
		// Check for good input
		if (!ereg("^[A-Z](,[A-Z])*$", $sectionstoadd)) {
			msgbox('Error', "Wrong format for sections.", 'error', 'Okay', "$PHP_SELF?option=selectadd&yesno=0");
			die();
		}
		
		$sects = split(',', $sectionstoadd);
		
		// Retrieve sections in the selected course code
		$result = mysql_query("SELECT sections FROM courses WHERE ID='$courseid'");
		$row = mysql_fetch_array($result);
		
		$arrayexists = array();
		$arrayadded = array();
		
		foreach ($sects as $sect) {
			// If the section doesn't exist, add it.
			if (!ereg(",$sect,", $row['sections']) && !ereg("^$sect,", $row['sections']) && !ereg(",$sect$", $row['sections'])) {
				// Add the course section
				mysql_query("UPDATE courses SET sections=CONCAT(sections,',$sect') WHERE ID='$courseid'") or die(mysql_error());
				
				// Add to the list of prof's courses
				// SQL METHOD: mysql_query("UPDATE user SET courseID=CONCAT(courseID,',$courseid'), sections=CONCAT(sections,',$sect') WHERE ID='$user->ID'") or die(mysql_error());
				$user->add_course($courseid, $sect, 0);
				$user->save();
				
				array_push($arrayadded, $sect);
			}
			else {
				// Add this one to the list of already-existing sections
				array_push($arrayexists, $sect);
			}
		}

		$result = mysql_query("SELECT code FROM courses WHERE ID='$courseid'") or die(mysql_error());
		$row = mysql_fetch_array($result);

		// Compose the message and show the messagebox
		if (count($arrayadded) > 0) {
			$message = "The following sections were added:\n";
			foreach ($arrayadded as $added) {
				$message .= "<LI>" . $row['code'] . " $added</LI>\n";
			}
		}
		if (count($arrayexists) > 0) {
			$message .= "<BR><BR>The following sections already existed and were not added:\n";
			foreach ($arrayexists as $exists) {
				$message .= "<LI>" . $row['code'] . " $exists</LI>\n";
			}
		}
		msgbox("Results", $message, '', 'Okay', $PHP_SELF);
	}
	elseif ($option == 'removeconfirm') {
		// Confirm the removal of a course
		msgbox("Important Confirmation", "Are you absolutely certain you want to remove this course?<OL><LI>This section (<B>$sec</B>) will be removed</LI><LI>The users for this section will be removed</LI><LI>The assignments will be removed</LI><LI>The uploaded assignment files will be removed</LI></OL>", '', 'I am certain', "$PHP_SELF?option=removecourse&cid=$cid&sec=$sec", 'Cancel', $PHP_SELF);
	}
	elseif ($option == 'removecourse') {
		// Remove a course
		
		// Check ownership over course
		if (!$user->has_course($cid, $sec)) die("You can't delete this course!</BODY></HTML>");

		// Get list of assignments belonging to course
		$result = mysql_query("SELECT ID FROM assignments WHERE courseID='$cid' AND section='$sec'") or die(mysql_error());
		while ($row = mysql_fetch_array($result)) {
			// Remove all files relating to course
			mysql_query("DELETE FROM files WHERE assignmentID='" . $row['ID'] . "'") or die(mysql_error());
		}

		// Remove assignments associated with the course
		mysql_query("DELETE FROM assignments WHERE courseID='$cid' AND section='$sec'") or die(mysql_error());
		
		// Remove all USER associations with course
		// 1) Narrow list of users down to those who MIGHT be in the course (or a similar course id)
		//    They don't necessarily have the exact section, just the same section letter somewhere (maybe for some other course)
		$result = mysql_query("SELECT ID,courseID,sections FROM user WHERE courseID REGEXP '^$cid\\\\**,|,$cid\\\\**,|,$cid\\\\**$|^$cid\\\\**$' AND sections REGEXP '$sec'") or die(mysql_error());

		// 2) For each of the results, remove the course and section reference if it exists & write back to database if changed
		while ($row = mysql_fetch_array($result)) {
			$carray = split(',', $row['courseID']);
			$sarray = split(',', $row['sections']);
			
			$changed = 0;
			for ($i=0; $i<count($carray); $i++) {
				if ((($carray[$i] == $cid) || ($carray[$i] == "$cid*")) && ($sarray[$i] == $sec)) {
					$carray[$i] = '';
					$sarray[$i] = '';
					$changed = 1;
				}
			}
			
			if ($changed == 1) {
				// Clean up the arrays by removing any blank spots
				$carray = array_filter($carray, "blank");
				$sarray = array_filter($sarray, "blank");
				
				// If the STUDENT user has no courses remaining, delete user altogether
				if (count($carray) < 1) {
					mysql_query("DELETE FROM user WHERE ID='" . $row['ID'] . "' AND account='st'") or die(mysql_error());
				}
				else {
					// Write the info back with updated sections
					mysql_query("UPDATE user SET courseID='" . join(',', $carray) . "', sections='" . join(',', $sarray) . "' WHERE ID='" . $row['ID'] . "'") or die(mysql_error());
				}
			}
		}
		
		// UPDATE COURSES
		$result = mysql_query("SELECT sections FROM courses WHERE ID='$cid'");
		$row = mysql_fetch_array($result);
		$sarray = split(',', $row['sections']);
		
		// If this is the final section delete the entire course entry
		if (count($sarray) <= 1) {
			mysql_query("DELETE FROM courses WHERE ID='$cid'") or die(mysql_error());
		}
		// This is not the last section. Delete only the section entry
		else {
			for ($i=0; $i<count($sarray); $i++) {
				if ($sarray[$i] == $sec) {
					$sarray[$i] = '';
				}
			}
			$sarray = array_filter($sarray, "blank");
			mysql_query("UPDATE courses SET sections='" . join(',', $sarray) . "' WHERE ID='$cid'") or die(mysql_error());
		}
		
		msgbox("Course Removed", "The course and all pertinent files and links have been removed.", '', 'Okay', $PHP_SELF);
	}

	function blank($str) {
		return !$str == '';
	}
		

	// MENU DRAWING ****************************************

	// MAIN COURSE MENU
	function showMenu() {
		global $user;
		?>
		<CENTER>
		<!-- Add Course -->
		<FORM action="<?php echo $PHP_SELF ?>" METHOD="POST">
		<INPUT TYPE="hidden" NAME="option" VALUE="selectadd">
		<?php box_start('Add Course', 400) ?>
		Is your course in the list?<BR>
		If yes, select it, and click 'Continue'.<BR>
		If not, select 'No' and click 'Continue'.<BR><BR>
		<TABLE ALIGN="CENTER">
		<TR><TD>
		<INPUT TYPE="RADIO" NAME="yesno" VALUE="1" CHECKED> Yes,&nbsp;
		</TD><TD>
		<SELECT NAME="courseid">
		<OPTION VALUE="0">select a course...</OPTION>
		<?php
		
		$result = mysql_query("SELECT ID,code,title FROM courses ORDER BY code") or die(mysql_error());
		
		while ($row = mysql_fetch_array($result)) {
			print "<OPTION VALUE='" . $row['ID'] . "'>" . $row['code'] . " " . $row['title'] . "</OPTION>\n";
		}
		
		?>
		</SELECT>
		</TD></TR>
		<TR><TD>
		<INPUT TYPE="RADIO" NAME="yesno" VALUE="0"> No
		</TD><TD></TD></TR></TABLE>
		<CENTER><INPUT TYPE="SUBMIT" VALUE="Continue"></CENTER>
		<?php box_end() ?>
		</FORM>
		
		<!-- Remove Course -->
		<?php
		box_start('Remove Course', 400);
		
		print "<TABLE WIDTH='100%'>\n";
		$count = 0;
		foreach ($user->courses as $courses) {
			print "<TR><TD>$courses->code</TD><TD>$courses->section</TD><TD>$courses->title</TD><TD><A HREF='$PHP_SELF?option=removeconfirm&cid=$courses->ID&sec=$courses->section'>remove</A></TD></TR>\n";
			$count++;
		}
		
		if ($count == 0) {
			print "You are not registered for any courses.\n";
		}
		
		print "</table>\n";
		box_end();
		print '<BR><BR><A HREF="./">Return to Menu</A></CENTER>';
	}

	// Add a Section
	function showAddSection() {
		global $courseid;
		$result = mysql_query("SELECT * FROM courses WHERE ID='$courseid'") or die(mysql_error());
		$row = mysql_fetch_array($result);
		
		center_start();
		?>
		<FORM action="<?php echo $PHP_SELF ?>" METHOD="POST">
		<INPUT TYPE="hidden" NAME="option" VALUE="addsection">
		<INPUT TYPE="hidden" NAME="courseid" VALUE="<?php echo $courseid ?>">
		<?php box_start('Add Section to ' . $row['code'], 400) ?>
		Input <B>only</B> the sections you teach.<BR><BR>
		<TABLE ALIGN=CENTER CELLSPACING=10>
		<TR>
		<TD>Course Code:</TD>
		<TD><?php echo $row['code'] ?></TD>
		</TR>
		<TR>
		<TD>Section Letters:<BR><FONT SIZE="-2" COLOR="#A0A0A0">(list, no spaces)</FONT></TD><TD><INPUT type="text" name="sectionstoadd" size="12" VALUE="A,B,C"></TD>
		</TR>
		</TABLE>
		<BR><CENTER><INPUT type="submit" value="Add Section(s)"><BR>
		<INPUT TYPE="submit" name="cancel" value="Cancel"></CENTER>
		<?php box_end() ?>
		</FORM>
		<?php
		center_end();
	}
	
	// Add entire course
	function showAddCourse() {
		center_start();
		?>
		<FORM action="<?php echo $PHP_SELF ?>" METHOD="POST">
		<INPUT TYPE="hidden" NAME="option" VALUE="addcourse">
		<?php box_start('Add Course', 400) ?>
		Include all of the required information to create a course.<BR>
		Input <B>only</B> the sections you teach.<BR><BR>
		<?php $sample = printCCFormat() ?>
		<P><TABLE ALIGN=CENTER CELLSPACING=10>
		<TR>
		<TD>Course Code:<BR><FONT SIZE="-2" COLOR="#A0A0A0">(see above)</FONT></TD>
		<TD><INPUT type="text" name="code" maxlength="12" SIZE="12" VALUE="<?php echo $sample; ?>"></TD>
		</TR>
		<TR>
		<TD>Section Letters:<BR><FONT SIZE="-2" COLOR="#A0A0A0">(list, no spaces)</FONT></TD><TD><INPUT type="text" name="sectionstoadd" size="12" VALUE="A,B,C"></TD>
		</TR>
		<TR>
		<TD>Course Title:</TD><TD><INPUT type="text" name="title" size="30" VALUE="Sample Course"></TD>
		</TR>
		</TABLE>
		<BR><CENTER><INPUT type="submit" value="Create Course"><BR>
		<INPUT TYPE="submit" name="cancel" value="Cancel"></CENTER>
		<?php box_end() ?>
		</FORM>
		<?php
		center_end();
	}
	
	// Function that prints the course code format and an example
	function printCCFormat() {
		$prefresult = mysql_query("SELECT value FROM prefs WHERE name='ccformat'") or die(mysql_error());
		$ccformat = mysql_fetch_array($prefresult);
		$ccformat = $ccformat['value'];
		
		$ccformat = ereg_replace('\\\\', '', $ccformat);
		$ccformat = ereg_replace('\^', '', $ccformat);
		$ccformat = ereg_replace('\$', '', $ccformat);
		
		$example = ereg_replace('\[A-Z\]', 'A', $ccformat);
		$example = ereg_replace('d', '5', $example);
		$example = ereg_replace('s', ' ', $example);

		$ccformat = ereg_replace('A-Z', 'letter', $ccformat);
		$ccformat = ereg_replace('d', '[digit]', $ccformat);
		$ccformat = ereg_replace('s', '[space]', $ccformat);
		$ccformat = ereg_replace('-', '[dash]', $ccformat);
		$ccformat = ereg_replace('\.', '[dot]', $ccformat);
		
		print "The format of the course code <B>must be</B> <FONT COLOR='Blue'>$ccformat</FONT><BR>as specified by the administrator. For example '$example'.\n";
		return $example;
	}
?>
