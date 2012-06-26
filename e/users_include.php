<?php
// e-Tutor is licensed under the GPL. Please see the LICENSE file for more
// information.

/*
users_include.php


Various functions for users.php
*/


		
/*
printCourseSelector()
prints course/section selector
(uses JavaScript)
written on 2nd March, 2002 by Markus

Parameters (all are optional):
First parameter - the prompt (e.g. 'Select course and section: ')
Second parameter - the caption on the form's submit button.
Third parameter - course ID of course that is selected by default
Fourth parameter - section that is selected by default
*/



function printCourseSelector() {

	global $user; //gain access to global $user object
	global $PHP_SELF;
	
	
	$num_args = func_num_args();
	if ($num_args > 0) $prompt = func_get_arg(0);
	else $prompt = 'Course:';
	if ($num_args > 1) $submit_caption = func_get_arg(1);
	else $submit_caption = 'Change';
	if ($num_args > 2) $default_course = func_get_arg(2);
	else $default_course = '';
	if ($num_args > 3) $default_section = func_get_arg(3);
	else $default_section = '';

	$ta_tag = false; //this tag will be true if any courses in which the user is a TA (or prof) are found
	
	$sel = ''; //string to hold select list
	
	//$tag is an array to keep track of which courses have <OPTIONS> printed
	//an <OPTION> tag will only be printed if $tag[$course_id] is false
	$tag = array();
	
	$sel = ''; //string to store selection list
	$js_array_def = ''; //string to contain javascript array definition code
	
	foreach ($user->sections as $course => $section_array) {
		$js_array_def .= "sections[$course] = new Array(";
		$temp = array();
		foreach($section_array as $section) {
			$temp[count($temp)] = "'$section'";
			$t = $user->get_course($course, $section); //temp course object
			//$x = $t->ID; //alias $t->ID (shorter to type)
			if ($t->isTA && !$tag[$t->ID]) { //check if user is TA and $tag for this course is false
				$ta_tag = true;
				$tag[$t->ID] = true; //set the $tag for this course to true
				if ($sc == $t->ID) //if selected course ID is the same as $t->ID, then make this the selected course
					$sel .= "<OPTION value='$t->ID' selected>$t->code - $t->title</OPTION>\n";
				else $sel .= "<OPTION value='$t->ID'>$t->code - $t->title</OPTION>\n";
			}
		}
		sort($temp, $SORT_STRING); //string sort $temp array
		$js_array_def .= join(', ', $temp) . ");\n";
	}

	if ($ta_tag) { //if user is a TA in any courses, we can print course selector form

		?>

		<FORM name='f' action='<?php print $PHP_SELF; ?>'>
		<?php print $prompt; ?> <SELECT name='sc' onChange='set_sections()'>
		<?php print $sel; /* print selection list */ ?>
		</SELECT>
		Section: <SELECT name='ss'>
		<OPTION value='*'>All</OPTION>
		<OPTION>a</OPTION> <!-- fake options so list is longer in Netscape -->
		<OPTION>a</OPTION>
		<OPTION>a</OPTION>
		<OPTION>a</OPTION>
		</SELECT>
		<INPUT type='submit' value='<?php print $submit_caption; ?>'>

		<SCRIPT language='JavaScript'><!--

		var default_course = '<?php print $default_course?>';
		var default_section = '<?php print $default_section?>';

		var sections = new Array();
		<?php print $js_array_def; /* print javascript section array definition */ ?>

		function set_sections() {
			form = document.f; //alias the form (it's name is 'form')
			sel = form.sc.options[form.sc.selectedIndex].value;
			//clear old options in ss (section selection box)
			for (i = 0; i < form.ss.options.length; i++)
				form.ss.options[i] = null;
			form.ss.options[0] = new Option('All', '*', true, true);
			for (i = 0; i < sections[sel].length; i++)
				form.ss.options[i + 1] = new Option(sections[sel][i], sections[sel][i]);
		}

		set_sections(); //call function on page load

		if (default_course) {
			form = document.f;
			for (i = 0; i < form.sc.options.length; i++)
				if (form.sc.options[i].value == default_course)
					form.sc.selectedIndex = i;
			if (default_section) {
				for (i = 0; i < form.ss.options.length; i++)
					if (form.ss.options[i].value == default_section)
					    form.ss.selectedIndex = i;
			}
		}

		//-->
		</SCRIPT>
		</FORM>

		<?php
	}
	return $ta_tag; //return if form was printed or not
}




/*
printAdminCourseSelector()
prints course/section selector for administrator
allows selection to view professors or users
(uses JavaScript)
written on Friday, 15 March, 2002 by Markus

Parameters (all are optional):
First parameter can be the prompt (e.g. 'Select course and section: ')
Second parameter can be the caption on the form's submit button.
*/
function printAdminCourseSelector() {

	global $user; //gain access to global $user object
	global $PHP_SELF, $SORT_STRING;
	
	$num_args = func_num_args();
	if ($num_args > 0) $button_caption = func_get_arg(0);
	else $button_caption = 'Change';
	if ($num_args > 1) $default_course = func_get_arg(1);
	else $default_course = '';
	if ($num_args > 2) $default_section = func_get_arg(2);
	else $default_section = '';
	if ($num_args > 3) $default_usertype = func_get_arg(3);
	else $default_usertype = 'st';

	$ta_tag = false; //this tag will be true if any courses in which the user is a TA (or prof) are found
	
	$sel = ''; //string to hold select list
	
	//$tag is an array to keep track of which courses have <OPTIONS> printed
	//an <OPTION> tag will only be printed if $tag[$course_id] is false
	$tag = array();
	
	$sel = ''; //string to store selection list
	$js_array_def = ''; //string to contain javascript array definition code
	
	$result = @mysql_query("SELECT * FROM courses ORDER BY code") or die(mysql_error());
	if (mysql_num_rows($result)) {
		while ($row = mysql_fetch_array($result)) {
			$temp = split(',', $row['sections']);
			sort($temp, $SORT_STRING);
			$js_array_def .= "sections[" . $row['ID'] . "] = new Array('" . join("','", $temp) . "');";
			$t = new Course($row['ID']); //temp course object
			if ($default_course == $t->ID) //if selected course ID is the same as $t->ID, then make this the selected course
				$sel .= "<OPTION value='$t->ID' selected>$t->code - $t->title</OPTION>\n";
			else $sel .= "<OPTION value='$t->ID'>$t->code - $t->title</OPTION>\n";
		}

		?>
		<FORM name='f' action='<?php print $PHP_SELF; ?>' onsubmit='do_shit()'>
		
		<TABLE cellspacing=0 cellpadding=0 border=0>
		<TR>
		<TD><INPUT type='radio' name='usertype' value='pr'<?php if ($default_usertype=='pr') print ' checked'?>></TD>
		<TD> View professors</TD>
		<TD colspan=3></TD>
		</TR>
		<TR>
		<TD><INPUT type='radio' name='usertype' value='st'<?php if ($default_usertype=='st' || $default_usertype=='') print ' checked'?>></TD>
		<TD> View students from course:</TD>
		</TR>
		<TR>
		<TD>&nbsp;</TD>
		<TD>
		
		<SELECT name='sc' onChange='set_sections()'>
		<?php print $sel; /* print selection list */ ?>
		</SELECT>
		Section: <SELECT name='ss'>
		<OPTION value='*'>All</OPTION>
		<OPTION>a</OPTION> <!-- fake options so list is longer in Netscape -->
		<OPTION>a</OPTION>
		<OPTION>a</OPTION>
		<OPTION>a</OPTION>
		</SELECT><BR>
		<BR>
		<INPUT type='submit' value='<?php print $button_caption?>'>
		</TD>
		</TR>
		</TABLE>
		
		<SCRIPT language='JavaScript'><!--

		var default_course = '<?php print $default_course?>';
		var default_section = '<?php print $default_section?>';

		var sections = new Array();
		<?php print $js_array_def; /* print javascript section array definition */ ?>

		set_sections(); //call function on page load

		if (default_course) {
			form = document.f;
			for (i = 0; i < form.sc.options.length; i++)
				if (form.sc.options[i].value == default_course)
					form.sc.selectedIndex = i;
			if (default_section) {
				for (i = 0; i < form.ss.options.length; i++)
					if (form.ss.options[i].value == default_section)
						form.ss.selectedIndex = i;
			}
		}

		function do_shit() { //pre-process form before submission
			if (document.f.usertype[0].checked)
				document.f.sc.options[document.f.sc.selectedIndex].value = 'pr';
		}

		function set_sections() {
			form = document.f; //alias the form (it's name is 'form')
			sel = form.sc.options[form.sc.selectedIndex].value;
			//clear old options in ss (section selection box)
			for (i = 0; i < form.ss.options.length; i++)
				form.ss.options[i] = null;
			form.ss.options[0] = new Option('All', '*', true, true);
			for (i = 0; i < sections[sel].length; i++)
				form.ss.options[i + 1] = new Option(sections[sel][i], sections[sel][i]);
		}

		//-->
		</SCRIPT>
		
		</FORM>
		<?php
		
		return true;
		
	} else {
		
		return false;
		
	}
}



function course_exists($c, $s) { //$c is course, $s is section
	
}



/*
print_profs()

prints list of all users with prof privileges in database
used only for administrator in user manager

written on Friday, 15 March, 2002 by Markus
*/
function print_profs() {
	global $user; //access global User object
	
	//get course TAs from database (any users who have courses that are suffixed with an asterisk)
	$result = mysql_query("SELECT ID, ln, fn FROM user WHERE account='pr' ORDER BY ln, fn");

	if (mysql_num_rows($result) > 0) { //if any results were returned
		?>
		<TR>
		<TD align=right class=header><INPUT type='checkbox' name='checkall' onClick='checkem()'></TD><TD class=header>Username</TD><TD class=header>Name</TD>
		</TR>

		<?php
		$user_num = 0;
		$sec = $selectedsection;
		if (checkadmin()) { //only show users' first and last names as links if administrator is logged in
			while ($row = mysql_fetch_array($result)) {
				$user_num++;
				$u = new User($row['ID']); //temp user object
				print_prof_row($u, $user_num);
			}
		}
	} else {
		print "<TR bgcolor=white>\n";
		print "<TD colspan=3>No professors currently in database.</TD>\n";
		print "</TR>\n";
    }
}



/*
print_prof_row()

prints a row with prof information
written on Friday, 15 March, 2002 by Markus
*/

function print_prof_row($u, $user_num) {
	print "<TR bgcolor=white>\n";
	print "<TD align=right>$user_num. <INPUT name='u[]' value='$u->ID' type='checkbox' onclick='javascript:uncheck()'></TD>\n";
	print "<TD><A href=\"users.php?c=edit&eid=$u->ID\">$u->username</A></TD><TD>$u->ln, $u->fn</TD>\n";
	print "</TR>\n";
}

/*
print_users()

prints out all users and TAs in passed course and section as table rows
(meant to be used in users.php where users are displayed)

made into a function on Friday, 15 March, 2002 by Markus
*/
function print_users($selectedcourse, $selectedsection) {
	
	global $user; //access global User object
	
	/*
	get users from database, sorted by last name then first name
	the regexp checks all possibilities as the course code might appear in the list
	the commas are included so that if, for example, you want users in course 5 to be selected,
	it won't select users in other courses that contain the number 5, like 25, or 51.
	*/

	//get course TAs from database (any users who have courses that are suffixed with an asterisk)
	//$result = mysql_query("SELECT ID FROM user WHERE account='st' AND courseID REGEXP ',$selectedcourse\\\\*,|^$selectedcourse\\\\*,|,$selectedcourse\\\\*$|^$selectedcourse\\\\*$' ORDER BY ln, fn");
	
	//execute query to get all users in this course
	$result = mysql_query("SELECT ID FROM user WHERE account='st' AND courseID REGEXP ',$selectedcourse\\\\**,|^$selectedcourse\\\\**,|,$selectedcourse\\\\**$|^$selectedcourse\\\\**$' ORDER BY ln, fn");

	//if the query returned nothing, then show a message indicating this
	if (mysql_num_rows($result) == 0) {
		print "<TR bgcolor=white>\n";
		print "<TD colspan=4>No users in this course/section.</TD>\n";
		print "</TR>\n";
	}
	
	//otherwise, if the query didn't return empty-handed
	else {
	
		//these arrays will contain User objects, of TAa and students respectively
		$ta_users = array();
		$student_users = array();
	
		//fill arrays from the MySQL query result stored in $result
		while ($row = mysql_fetch_array($result)) {
			$u = new User($row['ID']); //create a temporary User object for this user
			
			//if all sections have been selected
			if ($selectedsection == '*') {
				
				//if this tag is set to true, it means that the user was added to the
				//$ta_users array
				$bAddedToTA = false;
				
				//loop over user's courses
				foreach ($u->courses as $c) {
					//if user is a TA in the selected course
					if ($c->ID == $selectedcourse && $c->isTA) {
						array_push($ta_users, $u); //push user onto end of TA user array
						$bAddedToTA = true; //set tag to true
						break; //all done with this user
					}
				}
				
				//if user wasn't added to the $ta_users array, then add him or her to the
				//$student_users array
				if (!$bAddedToTA)
					array_push($student_users, $u);
				
			}
			
			//if a specific section has been selected
			else {
			

				//loop over user's courses
				foreach ($u->courses as $c) {
				
					//if the user is part of the selected course/section
					if ($c->ID == $selectedcourse && $c->section == $selectedsection) {
						
						if ($c->isTA) //if user is a TA in this course
							array_push($ta_users, $u); //push user onto end of TA user array
						else //nope, a regular student
							array_push($student_users, $u); //push user onto end of student user array

						break; //all done with this user
					}
				} //end of: foreach ($u->courses as $c)

			}
			
		} // end of: while ($row = mysql_fetch_array($result))
	}
	
	$admin_tag = checkadmin();

	//if (mysql_num_rows($result) > 0) { //if any results were returned
	if (count($ta_users)) { //if there are any TA users	
		?>
		<TR>
		<TD colspan=4 bgcolor=white><B>TAs:</B><BR></TD>
		</TR>
		<TR>
		<TD align=right class=header><INPUT type='checkbox' name='checkall_ta' onClick='checkem_ta()'></TD><TD class=header>Name</TD><TD class=header>Student&nbsp;No.</TD><TD class=header>Section</TD>
		</TR>

		<?php
		$user_num = $s + 1;
		$sec = $selectedsection;
		
		foreach ($ta_users as $u) {
		
			if ($selectedsection == '*') { //if all sections were selected
				$sec = join(', ', $u->sections[$selectedcourse]);
				print_user_row($u, $user_num, $sec, $admin_tag);
				$user_num++;
			} else {
				foreach ($u->courses as $x) {
					if ($x->section == $selectedsection) {
						print_user_row($u, $user_num, $sec, $admin_tag); //print table row
						$user_num++;
						break;
					}
				}
			}
		} // end of loop: foreach ($ta_users as $u)
	}



	//if (mysql_num_rows($result) > 0) { //if any results were returned
	if (count($student_users)) { //if there are any TA users	
		?>
		<TR>
		<TD colspan=4 bgcolor=white><B>Students:</B><BR></TD>
		</TR>
		<TR>
		<TD align=right class=header><INPUT type='checkbox' name='checkall' onClick='checkem()'></TD><TD class=header>Name</TD><TD class=header>Student&nbsp;No.</TD><TD class=header>Section</TD>
		</TR>

		<?php
		$user_num = $s + 1;
		$sec = $selectedsection;
		
		foreach ($student_users as $u) {
		
			if ($selectedsection == '*') { //if all sections were selected
				$sec = join(', ', $u->sections[$selectedcourse]);
				print_user_row($u, $user_num, $sec, $admin_tag);
				$user_num++;
			} else {
				foreach ($u->courses as $x) {
					if ($x->section == $selectedsection) {
						print_user_row($u, $user_num, $sec, $admin_tag); //print table row
						$user_num++;
						break;
					}
				}
			}
		} // end of loop: foreach ($student_users as $u)
	}


	
}

/*
print_user_row()
written 9th March 2002 by Markus

parameters:
$u - User object
$user_num - user number to display in list
$sec - section
$adm_tag - is true if administrator view is to be shown
*/
function print_user_row($u, $user_num, $sec, $adm_tag) {
	global $selectedsection, $selectedcourse, $user; //get access global variables
	
	$suffix = '';
	
	//loop over all courses user is registered in
	foreach ($u->courses as $c) {
		if ($c->ID == $selectedcourse &&
			($selectedsection == '*' || $c->section == $selectedsection))
		{
			if ($c->isTA)
				$suffix = '_ta';
				
			break;
		}
	}

	// Set a flag if the prof is supposed to be able to edit this user
	if (!$adm_tag) {
		$profallowedit = 0;
		foreach ($user->courses as $c) {
			if ($c->ID == $selectedcourse && ereg($c->section, $sec)) {
				$profallowedit = 1;
				break;
			}
		}
	}

	if ($adm_tag || ($user->account == 'pr' && $profallowedit)) {
		print "<TR bgcolor=white>\n";
		print "<TD align=right>$user_num. <INPUT name='u$suffix" . "[]' value='$u->ID' type='checkbox' onclick='javascript:uncheck$suffix()'></TD>\n";
		if ($selectedsection == '*')
			$sec = join(', ', $u->sections[$selectedcourse]);
		print "<TD><A href=\"users.php?c=edit&eid=$u->ID\">$u->ln, $u->fn</A></TD><TD>$u->stnum</TD><TD>$sec</TD>\n";
		print "</TR>\n";
	} else {
		print "<TR bgcolor=white>\n";
		print "<TD align=right>$user_num. <INPUT name='u$suffix" . "[]' value='$u->ID' type='checkbox' onclick='javascript:uncheck()'></TD>\n";
		print "<TD>$u->ln, $u->fn</TD><TD>$u->stnum</TD><TD>$sec</TD>\n";
		print "</TR>\n";
	}
}


?>
