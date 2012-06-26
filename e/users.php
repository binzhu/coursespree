<?php
// e-Tutor is licensed under the GPL. Please see the LICENSE file for more
// information.

require("include.php"); //regular stuff to include
require("users_include.php"); //regular stuff to include
require("errorh.php"); //error logging code

/*
users.php
translated and improved by Markus
(based on original Perl version, also by Markus)
13th January, 2002
some improvements made 28th September, 2002
many more improvements made December, 2002
still more bug fixes and other stuff mangles through 2003

Outline of script function:

listing TAs or users in a course:
1. get list of TAs/students in course, sorted by specified criteria
2. print table with users

	- have option of showing only users in a certain section or sections

General Inputs (some run modes have inputs particular to that run mode):

	c - run mode
	s - which user to start listing from
	t - user type to list.
		Possible values:
		'ta' - TAs
		'st' - students
		'' or 'both' - TAs and students at once (TAs will be displayed in a table by
			themselves, before students)
	
Run Modes:

	'' (nothing) - list users
	
		Inputs:
		requires no additional inputs
	
	'add'        - first step of adding user (shows form to get info for new user)
		
		Inputs:
		num - how many users to add
		
		Shows form to add users. The form will contain enough fields to add num users.
		It will be possible to specify all user information, as well account type
		(student or TA).
	
	'batchadd'   - first step of batch add users (shows form to paste excel sheet) 
	
		Inputs:
		requires no additional inputs
	
	'add2'       - second step of adding user (writes user(s) to database)
	
		Inputs:
		batch - specifies if it's a batch add or not
			possible values:
			'y' - means that users are being added from the batch add script
			anything else - users are being added from regular add users form
	
		If batch mode is being used (that is, if batch == 'y'):
		newusers - tab and newlines separated string containing new user information
			Each line of the string should contain the following fields, in the following
			order (fields must be separated by tabs):
			
			username, student number, first name, last name, email address
			
		Note:
		All users will be added as students.
		All passwords will be set to student number.
		All fields except email (which is optional) must be present.
			-> Users that don't have all fields present will not be added. A message will
			be displayed notifying if this is the case. Message will also say how many,
			and which, users weren't added.
			
			
		If batch mode is not being used:
		num - number of users being added
		un - username
		pw - password
		sn - student number
		fn - first name
		ln - last name
		em - email address
		ut - user type ('ta' for TA or 'st' for student)
		
		Note:
		If multiple users are being added, these parameters will become arrays.
		All fields except email (which is optional) must be present.
			-> Users that don't have all fields present will not be added. A message will
			be displayed notifying if this is the case. Message will also say how many
			and which users weren't added.
		pw1 and pw2 will always match because these fields are pre-processed by a JavaScript
			in the form that submits to this run mode. The JavaScript will not submit the form
			if the fields do not match.
	
	'save'       - saves changes to editted user

		Inputs:
		id - user ID to modify
		sn - student number
		changepw - if true, then look at pw1 for new password
		pw1 - password
		pw2 - password (JavaScript in form checks if pw1 and pw2 match.
			If they don't match, it won't let the form be submitted.)
		fn - first name
		ln - last name
		em - email address
		
		
		
		All fields (except for em which is optional) must be present in order for user to
		be successfully saved.

	'delete'     - deletes user(s)
	
		Inputs:
		confirm - must be 'yes' for users to be successfully deleted
		u - user ID(s) of users to be deleted (this becomes an array if multiple users are
			specified to be deleted)

*/

//some prefs:
$users_per_page = 20; //how many users to display per page

if (!isset($s)) $s = 0; //this line is necessary!!!! don't delete. If $s is undefined, an SQL statement doesn't execute.

//get selected course and selected section codes
if ($sc) $selectedcourse = $sc;
if ($ss) $selectedsection = $ss;


//if $view_profs is true, then a list of professors will be displayed
//if the selectedcourse is 'pr' (not a course ID) then that means show professors
$view_profs = false; //initially set tag false
if ($selectedcourse == 'pr') $view_profs = true; //set tag true


if (checkadmin()) {
	$user = new User();
	$user->username = 'admin';
    
    if ($selectedcourse)
    	$temp = new Course($selectedcourse);
    
	if ($selectedcourse == '' || (!$temp->exists && $selectedcourse != 'pr')) {
		doc_start();
		center_start();
		box_start('User Manager');
		if (!printAdminCourseSelector('Go >>')) {
			?>
			
			<FORM action="<?php print $PHP_SELF?>">
	   		<INPUT type="hidden" name="sc" value="pr">
			<INPUT type="hidden" name="ss" value="*">
			There are no courses in the database.<BR>
			Click OK to view professor accounts only.<BR>
			<BR>
			<INPUT type="submit" value="OK">
			</FORM>
			
			<?php
		}
		box_end();
		center_end();
		doc_end();
		die();
	} else {
		$user->courses[0] = new Course($selectedcourse);
	}
	$selectedusertype = $usertype;
	
} else {
	if (count($user->courses) == 0) { //if user has no courses
		msgbox('No Courses', 'You are not registered as a TA or prof for any courses.', 'normal', 'Rats', './');
		die();
	}

	if ($selectedcourse == '') {
		doc_start();
		center_start();
		box_start('User Manager');

		?>

		Please select the course for which you wish to manage users.<BR>
		<BR>

		<?php
		printCourseSelector('Course:', 'Go >>');
		box_end();
		print "<BR><BR><A HREF='./'>Return to Menu</A>";
		center_end();
		doc_end();
		die();
	}
}


//what follows is the older way:
//$result = mysql_query("SELECT * FROM courses WHERE ID='$selectedcourse'");
//$row = mysql_fetch_array($result);
//$selcourse = new Course($row); //load selected course info into object

if (!$view_profs)
	$selcourse = $user->get_course_by_id($selectedcourse); //copy information of selected course into a separate Course object

doc_start("User Manager");

//choose action based on run mode
$c = strtolower($c); //lowercase runmode
if ($cancel) $c = ''; //if a cancel button was pressed, then return to main listing

/**************************************************
 *
 * LIST USERS
 *
 **************************************************/
if ($c == '') { //list users

	?>
	<TABLE cellpadding=2 cellspacing=1 border=0 align=center width=600>
	<TR>
	<TD colspan=2>
	<?php
	
	if (checkadmin() && $view_profs) {
		?>
		<SPAN class=title>Professors</SPAN><BR>
		<BR>
		<?php printAdminCourseSelector('Change', $selectedcourse, $selectedsection, $selectedusertype); ?></TD></TR>
		</TABLE>

		<FORM name='users' action='<?php print $PHP_SELF?>'>
		<TABLE cellpadding=2 cellspacing=1 border=0 align=center width=600>
		<TR>
		<TD valign=top>

		<INPUT type='hidden' name='s' value='<?php print $s?>'>

		<TABLE cellspacing=0 cellpadding=0 border=0>
		<TR>
		<TD bgcolor="#C0C0C0">
		<TABLE border=0 cellspacing=1 cellpadding=2 width=400>
		
		<?php
		print_profs();
	} else {

		?>
		<SPAN class=title>Users in <?php print $selcourse->title?> (<?php print $selcourse->code?>)</SPAN><BR>
		<BR>
		<?php
		
		print "Selected course ID: " . $selcourse->ID . "<BR><BR>\n";
		
		if (checkadmin())
			printAdminCourseSelector('Change');
		else
			printCourseSelector('View users for course:', 'Change', $sc, $ss); ?></TD></TR>
			
		</TABLE>

		<FORM name='users' action='<?php print $PHP_SELF?>'>
		<TABLE cellpadding=2 cellspacing=1 border=0 align=center width=600>
		<TR>
		<TD valign=top>

		<INPUT type='hidden' name='s' value='<?php print $s?>'>

		<TABLE cellspacing=0 cellpadding=0 border=0>
		<TR>
		<TD bgcolor="#C0C0C0">
		<TABLE border=0 cellspacing=1 cellpadding=2 width=400>

		<?php

		$temp = new Course($selectedcourse); //create new Course object with selected course
		if ($temp->exists) //only print users for this course if the course exists
			print_users($selectedcourse, $selectedsection);
	}
?>

</TABLE>
</TD>

</TR>
</TABLE>

</TD>
<TD> <!-- this is where the side boxes go -->
	<!--add new user side bar-->
	<?php
	// $view_profs is true of we are viewing prof listings
	if (!$view_profs) {
		sidebox_start('Add New Users') ?>

	No. of users to add: <INPUT type=text name='num' size=3 maxlength=3 value=1>
	<INPUT type='submit' name='c' value='Add'><BR>
	<BR>
	<A href='users.php?c=batchadd&s=<?php print $s?>'>Batch Add</A>: add users by copying and pasting rows
	from a spreadsheet program.<BR>
	
	<?php sidebox_end(); } ?>

	<?php if (checkadmin() && $view_profs) { /* print this box if prof viewing is on */

	sidebox_start('Add New Professors');
	?>
	No. to add: <INPUT type=text name='num' size=3 maxlength=3 value='1'>
	<INPUT type='submit' name='c' value='Add Profs'><BR>
	<?php
	sidebox_end();
	}
	?>
	
	<BR>
	
	<!--edit users side bar-->
	<?php sidebox_start('Edit User Information') ?>
	Click a user's name to edit his or her information.<BR>
	<?php sidebox_end() ?>

	<BR>
	<!--delete users side bar-->
	<?php sidebox_start('Delete Users') ?>

	Check the boxes beside the names of the users you wish to delete,
	and click 'Delete'.<BR>
	<BR>
	Are you sure you want to delete the checked users? <INPUT type='checkbox' name='confirm' value='yes'> Yes<BR>
	<BR>
	<INPUT type='submit' name='c' value='Delete'><BR>
	
	<?php sidebox_end() ?>

</TD>
</TR>
</TABLE>

</FORM>

<BR><BR>
<CENTER><A HREF="./">Return to Menu</A></CENTER>

<SCRIPT language='JavaScript' type='text/javascript'><!--

function checkem() {
	var f = document.users;
	for (i = 0; i < f.elements.length; i++)
		if (f.elements[i].name == 'u[]')
			f.elements[i].checked = f.checkall.checked;
}

//unchecks 'check all' check box when another check box is clicked
function uncheck() {
	document.users.checkall.checked = false;
}

function checkem_ta() {
	var f = document.users;
	for (i = 0; i < f.elements.length; i++)
		if (f.elements[i].name == 'u_ta[]')
			f.elements[i].checked = f.checkall_ta.checked;
}

//unchecks 'check all' check box when another check box is clicked
function uncheck_ta() {
	document.users.checkall_ta.checked = false;
}
//-->
</SCRIPT>

<?php

/**************************************************
 *
 * ADD PROFS
 *
 **************************************************/
} else if ($c == 'add profs') { //show add users form
	?>
	
	<SCRIPT language="JavaScript" type='text/javascript'><!--
	var num_fields_per_user = 6;
	function makeusername(usernum) { //constructs a sample username
		u = document.newusers.elements[usernum * num_fields_per_user + 4]; //access username field
		p = document.newusers.elements[usernum * num_fields_per_user + 5]; //access username field
		if (u.value == '') {
			fn = document.newusers.elements[usernum * num_fields_per_user + 1];
			ln = document.newusers.elements[usernum * num_fields_per_user + 2];
			//alert("fn: " + fn.value + ", ln: " + ln.value);
			un = fn.value.charAt(0) + ln.value;
			u.value = p.value = un.toLowerCase(); //set username and password to the same thing
		}
	}

	//-->
	</SCRIPT>
	
	<TABLE cellpadding=2 cellspacing=1 border=0 align=center width=608>
	<TR>
	<TD>
	<SPAN class=title>Create Professor Accounts</SPAN><BR>
	<BR>
	<I>All fields are required except where noted otherwise.</I><BR>
	</TD></TR>
	</TABLE>
	
	<FORM action='adduser.php' name='newusers' method='get'>
	<TABLE cellpadding=2 cellspacing=1 border=0 align=center width=600>
	<TR>
	<TD valign=top>
	
	<?php

	$adm = checkadmin();
	
	if ($num > 20) $num = 20; //make sure user doesn't try adding too many users at once
	
	for ($i = 0; $i < $num; $i++) {
		?>
		<INPUT type='hidden' name='ut[]' value='pr'>
		<TABLE cellspacing=0 cellpadding=0 border=0>
		<TR>
		<TD bgcolor="#C0C0C0">

		<TABLE border=0 cellspacing=1 cellpadding=2 width=400>
		<TR bgcolor=white>
		
		<TD rowspan=3 bgcolor="#F0F0F0"><B><?php print $i + 1?>.</B></TD>
		<TD>

			<TABLE border=0 cellspacing=0 cellpadding=0 width="100%">
			<TR>
			<TD>First name:<BR><INPUT type="text" name="fn[]" size=16></TD>
			<TD>Last name:<BR><INPUT type="text" name="ln[]" size=16 onBlur="makeusername(<?php print $i?>)"></TD>
			</TR>
			</TABLE>

		</TD></TR>
		<TR bgcolor=white><TD>

			<TABLE border=0 cellspacing=0 cellpadding=0 bgcolor=white width="100%">
			<TR>
			<TD>E-mail (optional):<BR><INPUT type="text" name="em[]" size=20></TD>
			<TD>Username:<BR><INPUT type="text" name="un[]" size=10></TD>
			<TD>Password:<BR><INPUT type="text" name="pw[]" size=10></TD>
			</TR>
			</TABLE>

		</TD></TR>
		</TABLE>

		</TD>
		</TR>
		</TABLE>
		<BR>

		<?php
		
	}
	?>
	
	</TD>
	<TD valign=top> <!-- side boxes go here -->

		<!--options-->
		<TABLE cellspacing=0 cellpadding=0 border=0>
		<TR><TD bgcolor="#C0C0C0">
		<TABLE border=0 cellspacing=1 cellpadding=2 width=200>
		<TR bgcolor="#F0F0F0">
		<TD class=sidebox>	
		<SPAN class=opt>When You Are Done...</SPAN><BR>
		<BR>
		When you are done entering the new professor information,
		please check it over to make sure that it is correct.
		Once you are sure that everything is in order, click 'Done'.<BR>
		<BR>
		Please note that only professors with complete information entered
		(i.e. all required fields are filled out) will be saved.<BR>
		<BR>

		<INPUT type='hidden' name='num' value='$num'>
		<INPUT type='submit' value='Done >>'>
		<INPUT type='button' name='cancel' value='Cancel' onClick='location="users.php"'><BR>
		</TD>
		</TR>
		</TABLE>
		</TD></TR>
		</TABLE>
	</TD>
	</TR>
	</TABLE>
	</FORM>
	
	<?php


/**************************************************
 *
 * ADD
 *
 **************************************************/
} else if ($c == 'add') { //show add users form
	// Establish username & password formats
	$prefresult = @mysql_query("SELECT value FROM prefs WHERE name='loginformat'") or die(mysql_error());
	$lformat = mysql_fetch_array($prefresult);
	?>	
	
	<SCRIPT language="JavaScript" type='text/javascript'><!--
	
	var numfields = 7;
	<?php
	if ($lformat['value'] == 'namenumber') {
		// Use JS with username initialLast, pw stnum
		?>
		function makeusername(usernum) { //constructs a sample username
			u = document.newusers.elements[usernum * numfields + 5]; //access username field
			if (u.value == '') {
				fn = document.newusers.elements[usernum * numfields + 2];
				ln = document.newusers.elements[usernum * numfields + 3];
				un = fn.value.charAt(0) + ln.value;
				u.value = un.toLowerCase();
			}
		}

		function makepassword(usernum) { //uses student number as password
			p = document.newusers.elements[usernum * numfields + 6]; //access password field
			if (p.value == '') {
				sn = document.newusers.elements[usernum * numfields + 1];
				p.value = sn.value;
			}
		}
		<?php
	}
	else {
		// Use JS with username stnum, pw ln
		?>
		function makeusername(usernum) { //constructs a sample username
			u = document.newusers.elements[usernum * numfields + 5]; //access username field
			if (u.value == '') {
				sn = document.newusers.elements[usernum * numfields + 1];
				u.value = sn.value;
			}
		}

		function makepassword(usernum) { //uses student number as password
			p = document.newusers.elements[usernum * numfields + 6]; //access password field
			if (p.value == '') {
				ln = document.newusers.elements[usernum * numfields + 3];
				pass = ln.value;
				p.value = pass.toUpperCase();
			}
		}
		<?php
	}
	?>
	//-->
	</SCRIPT>
	
	<TABLE cellpadding=2 cellspacing=1 border=0 align=center width=608>
	<TR>
	<TD>
	<SPAN class=title>Add New Users</SPAN><BR>
	<BR>
	Adding <?php print $num; if($num==1)print" user"; else print" users";?> to <?php print $selcourse->title . " (" . $selcourse->code . ")"?><BR>
	</TD></TR>
	</TABLE>
	
	<FORM action='adduser.php' name='newusers' method='post'>
	<INPUT type='hidden' name='s' value='<?php print $s?>'>
	<TABLE cellpadding=2 cellspacing=1 border=0 align=center width=600>
	<TR>
	<TD valign=top>
	
	<?php

	$adm = checkadmin();
	
	if ($num > 20) $num = 20; //make sure user doesn't try adding too many users at once
	
	$selectsection = "<SELECT name='se[]'>\n";
	if (checkadmin()) //if administrator is logged in
		foreach ($selcourse->sections as $x) //allow adding courses to all sections
			$selectsection .= "<OPTION value='" . $x . "'>" . $x . "</OPTION>\n";
	else //if prof
		foreach ($user->sections[$selectedcourse] as $x) //only allow adding to own sections
			$selectsection .= "<OPTION value='" . $x . "'>" . $x . "</OPTION>\n";
	$selectsection .= "</SELECT><BR>\n";
	
	for ($i = 0; $i < $num; $i++) {
		// Decide what gets created when (un/pass using JS)
		if ($lformat['value'] == 'namenumber') {
			// Use JS with username initialLast, pw stnum
			$onBlurSN = "makepassword($i)";
			$onBlurLN = "makeusername($i)";
		}
		else {
			// Use JS with username stnum, pw ln
			$onBlurSN = "makeusername($i)";
			$onBlurLN = "makepassword($i)";
		}
		?>

		<TABLE cellspacing=0 cellpadding=0 border=0>
		<TR>
		<TD bgcolor="#C0C0C0">

		<TABLE border=0 cellspacing=1 cellpadding=2 width=400>
		<TR bgcolor=white>
		
		<TD rowspan=3 bgcolor="#F0F0F0"><B><?php print $i + 1?>.</B></TD>
		<TD>

			<TABLE border=0 cellspacing=0 cellpadding=0 width="100%">
			<TR>
			<TD>Student no.:<BR><INPUT type="text" name="sn[]" size=10 onBlur="<?php print $onBlurSN?>"></TD>
			<TD>First name:<BR><INPUT type="text" name="fn[]" size=16></TD>
			<TD>Last name:<BR><INPUT type="text" name="ln[]" size=16 onBlur="<?php print $onBlurLN?>"></TD>
			</TR>
			</TABLE>

		</TD></TR>
		<TR bgcolor=white><TD>

			<TABLE border=0 cellspacing=0 cellpadding=0 bgcolor=white width="100%">
			<TR>
			<TD>E-mail (optional):<BR><INPUT type="text" name="em[]" size=20></TD>
			<TD>Username:<BR><INPUT type="text" name="un[]" size=10></TD>
			<TD>Password:<BR><INPUT type="text" name="pw[]" size=10></TD>
			</TR>
			</TABLE>

		</TD></TR>
		<TR bgcolor=white><TD>

			<TABLE border=0 cellspacing=0 cellpadding=0 bgcolor=white width="100%">
			<TR>
			<TD>Section:<BR><?php print $selectsection ?></TD>
			</TR>
			</TABLE>

		</TD></TR>
		</TABLE>

		</TD>
		</TR>
		</TABLE>
		<BR>

		<?php
		
	}


	?>
	
	</TD>
	<TD valign=top> <!-- side boxes go here -->

		<!--options-->
		<TABLE cellspacing=0 cellpadding=0 border=0>
		<TR><TD bgcolor="#C0C0C0">
		<TABLE border=0 cellspacing=1 cellpadding=2 width=200>
		<TR bgcolor="#F0F0F0">
		<TD class=sidebox>	
		<SPAN class=opt>When You Are Done...</SPAN><BR>
		<BR>
		When you are done entering the new user information,
		please check it over to make sure that it is correct.
		Once you are sure that everything is in order, click 'Done'.<BR>
		<BR>
		Please note that only users with complete information entered
		(i.e. all fields are filled out) will be saved.<BR>
		<BR>

		<INPUT type='hidden' name='num' value='$num'>
		<INPUT type='hidden' name='c' value='add2'>
		<INPUT type='submit' value='Done >>'>
		<INPUT type='submit' name='cancel' value='Cancel'><BR>
		</TD>
		</TR>
		</TABLE>
		</TD></TR>
		</TABLE>
	</TD>
	</TR>
	</TABLE>
	</FORM>
	
	<?php
/**************************************************
 *
 * BATCHADD
 *
 **************************************************/
} else if ($c == 'batchadd') { //show batch add (from pasted excel data) users form


	center_start();
	box_start("Batch Add Users - Step 1", 600);
	
	
	/*
	stnum,fn,ln,section,email,username,password
	*/
	?>
	<FORM method='post' action='<?php print $PHP_SELF?>'>

	<TABLE cellpadding=2 cellspacing=1 border=0 align=center>
	<TR>
	<TD colspan=2>
	If you have your student list in a spreadsheet file, this is a quick way to
	add students to your course.<BR>
	<BR>
	Have your student information columns arranged in this order:<BR>
	<BR>
	<LI>
	<?php
		// Print the correct order of batch ordering
		$result = @mysql_query("SELECT value FROM prefs WHERE name='batchorder'") or die(mysql_error());
		$batchorder = mysql_fetch_array($result);
		$order = $batchorder['value'];
		$order = ereg_replace ('\$sn', '<B>Student Number</B>', $order);
		$order = ereg_replace ('\$ln', '<B>Last Name</B>', $order);
		$order = ereg_replace ('\$fn', '<B>First Name</B>', $order);
		$order = ereg_replace ('\$se', '<B>Section</B>', $order);
		$order = ereg_replace ('\$em', 'E-Mail Address', $order);
		$order = ereg_replace ('\$un', 'Username', $order);
		$order = ereg_replace ('\$pw', 'Password', $order);
		$order = ereg_replace (',', ', ', $order);
		
		print $order . ".\n";
	?>
	</LI><BR><BR>
	Then copy the rows containing information for the students you wish
	to add, and paste them into
	the text box below. The pasted text may appear somewhat messed up and out of order, but this is normal.<BR>
	<BR>
	The columns in bold above are necessary; the rest are optional. The optional columns
	may be left blank, but <B>you must copy and paste a blank column</B> for every column
	you want to leave blank.<BR>
	<BR>
	Click the 'Done' button when you are done.<BR>
	</TD></TR>
	<TR>
	<TD valign=top>

		<TEXTAREA rows=16 cols=40 wrap=soft name='newusers'></TEXTAREA>

	</TD>

	<TD valign=top>

		<!--options-->
		<TABLE cellspacing=0 cellpadding=0 border=0>
		<TR><TD bgcolor="#C0C0C0">
		<TABLE border=0 cellspacing=1 cellpadding=2 width=200>
		<TR bgcolor="#F0F0F0">
		<TD class=sidebox>	
		<SPAN class=opt>When You Are Done...</SPAN><BR>
		<BR>
		When you have pasted in the user information you copied from your
		spreadsheet program, click the 'Done' button. The User Manager
		will do the rest of the work for you, and add the users to your
		course.<BR>
		<BR>
		<INPUT type='hidden' name='c' value='batchadd2'>
		<INPUT type='submit' value='Done >>'>
		<INPUT type='submit' name='cancel' value='Cancel'><BR>
		</TD>
		</TR>
		</TABLE>
		</TD></TR>
		</TABLE>

	</TD>
	</TR></TABLE>
	</FORM>
	<?php
	
	box_end();
	center_end();

/**************************************************
 *
 * BATCHADD2
 *
 **************************************************/
} else if ($c == 'batchadd2') { //parses spread sheet pasted data
	// Grab the current course information (object)
	global $selcourse;
	
	$prefresult = @mysql_query("SELECT value FROM prefs WHERE name='loginformat'") or die(mysql_error());
	$lformat = mysql_fetch_array($prefresult);
	$lformat = $lformat['value'];
	
	center_start();

	box_start("Batch Add Users - Step 2", 600);
	?>

	<FORM method='post' action='adduser.php'>
	The following information was parsed from your spreadsheet data. Green comments
	indicate status messages; red comments indicate fatal errors. Users with red
	comments will not be added to your course.<BR>
	<BR>
	Once you are satisfied that all of the information below is in order, please
	click 'Continue' to add the users to your course.<BR>
	<BR>
	<DIV align='right'><INPUT type='submit' value='Continue >>'></DIV>
	<BR>
	<TABLE cellpadding=0 align=center>
	<TR>
	<TD bgcolor='#A0A0A0'>

	<TABLE cellspacing="1" border="0" cellpadding="2">
	<TR>
	<TD class='header'>St#</TD>
	<TD class='header'>Last</TD>
	<TD class='header'>First</TD>
	<TD class='header'>Sec.</TD>
	<TD class='header'>E-mail</TD>
	<TD class='header'>UN</TD>
	<TD class='header'>PW</TD>
	<TD class='header'>Comment</TD>
	</TR>


	<?php
	
	$pc_linebreak = chr(13) . chr(10);
	
	// Add Mac support ?
	if (strstr($newusers, chr(13))) //accomodate PC users
		$lines = split($pc_linebreak, $newusers);
	else //normal unix
		$lines = split("\n", $newusers);

	// Get all existing usernames from database. These will be checked to
	// prevent duplicates.
	$usednames = array();
	$newusednames = array();
	$stnums = array();
	$result = @mysql_query('SELECT username,stnum FROM user') or die(mysql_error());
	while ($row = mysql_fetch_array($result)) { //if any users were found
		array_push($usednames, $row['username']);
		array_push($stnums, $row['stnum']);
	}

	// Read the batch ordering from the prefs and apply it.
	// $line is a line from the batch list of students.
	// In this block $line doesn't exist yet. It is a part of code in a variable.
	$result = @mysql_query("SELECT * FROM prefs WHERE name='batchorder'") or die(mysql_error());
	$batchorder = mysql_fetch_array($result);
	$execute = 'list(' . $batchorder['value'] . ') = split("\t", $line);';
		
	// This executes the code in the $execute variable.
	foreach($lines as $line) {
		if (strlen($line) <= 1) break;
		$comment = '';
		// Get the next row from the batch input by executing the $execute statement (from above)
		eval ($execute);

		// If student number already exists, get their username from database
		// This is for display purposes only, adduser.php handles this
		$nointerfere = 0;
		if (in_array($sn, $stnums)) {
			$result = @mysql_query("SELECT username,password FROM user WHERE stnum=$sn") or die(mysql_error());
			$row = mysql_fetch_array($result);
			$un = $row['username'];
			// This pasword will not do anything.
			// It is exclusively to prevent incomplete information check in addusers.php
			// addusers.php will not actually modify the password for this user
			// It will jsut add this course.
			$pw = '<FONT COLOR=BLUE>Not Changed</FONT>';
			$nointerfere = 1;
		}

		// Make a username that works
		$anumber = 1;
		$madenameflag = 0;
		
		// Only generate this way if generation technique is "namenumber"
		// If a username was specified don't do anything
		if ($lformat == 'namenumber' && $un == '') {
			while (true) {
				if ($un == '') {
					// Try making a name
					$un = strtolower(substr($fn, 0, 1) . $ln);
					// Good name?
					if (!in_array($un, $usednames) && !in_array($un, $newusednames)) {
						array_push($newusednames, $un);
						$madenameflag = 1;
						break;
					}
				}
				else {
					// This is not the first iteration of this loop
					// Append a number and see if that works
					if (!in_array($un.$anumber, $usednames) && !in_array($un.$anumber, $newusednames)) {
						// Found a unique userid
						$un .= $anumber;
						// Add it to the list of existing ID's
						array_push($newusednames, $un);
						$madenameflag = 1;
						break;
					}
					// If gotten this far, name didn't work, bump number
					$anumber++;
				}
			}
		}
		else {
			// The Username is supposed to be the student number in this case
			$un = $sn;
			
			// Might as well generate the password here
			$pw = strtoupper($ln);
		}
		
		// UN check will only fail if username is from spreadsheet, otherwise
		// it would have been auto-created by now.
		if ($sn == "" || $fn == "" || $ln == "" || $se == "" || !in_array(strtoupper($se), $selcourse->sections) || in_array($un, $usednames) && $nointerfere == 0) {
			$comment = "<FONT color='red'>Incomplete info</FONT>";
			if (!in_array(strtoupper($se), $selcourse->sections) && ! $se == '') 
				$comment = "<FONT color='red'>Section does not exist</FONT>";
			if (in_array($un, $usednames)) {
				// Append an error regarding username
				if ($comment != '') $comment .= '<BR>';
				$comment .= "<FONT color='red'>Username already exists!</FONT>";
			}
			?>
			<TR>
			<TD><?php print $sn?></TD>
			<TD><?php print $ln?></TD>
			<TD><?php print $fn?></TD>
			<TD><?php print $se?></TD>
			<TD><?php print $em?></TD>
			<TD><?php print $un?></TD>
			<TD><?php print $pw?></TD>
			<TD><?php print $comment?></TD>
			</TR>
			<?php
		} else {
			if ($nointerfere == 1) {
				$comment = "<FONT color='green'>Already exists. Adding section.</FONT>";
			}
			else if ($madenameflag == 1 && $pw == "") {
				$pw = $sn;
				$comment = "<FONT color='green'>Username/password created</FONT>";
			} else if ($pw == "") {
				$pw = $sn;
				$comment = "<FONT color='green'>Password created</FONT>";
            } else if ($madenameflag == 1) {
				$comment = "<FONT color='green'>Username created</FONT>";            
			} else {
				$comment = "<FONT color='green'>OK</FONT>";
			}
			?>
			<TR>
			<TD><INPUT type='hidden' name='ut[]' value='st'>
			<INPUT type='hidden' name='sn[]' value='<?php print $sn?>'><?php print $sn?></TD>
			<TD><INPUT type='hidden' name='fn[]' value='<?php print $fn?>'><?php print $fn?></TD>
			<TD><INPUT type='hidden' name='ln[]' value='<?php print $ln?>'><?php print $ln?></TD>
			<TD><INPUT type='hidden' name='se[]' value='<?php print $se?>'><?php print $se?></TD>
			<TD><INPUT type='hidden' name='em[]' value='<?php print $em?>'><?php print $em?></TD>
			<TD><INPUT type='hidden' name='un[]' value='<?php print $un?>'><?php print $un?></TD>
			<TD><INPUT type='hidden' name='pw[]' value='<?php print $pw?>'><?php print $pw?></TD>
			<TD><?php print $comment?></TD>
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
	box_end();
	center_end();


/**************************************************
 *
 * EDIT USER
 *
 **************************************************/
} else if ($c == 'edit') { //edit a user's information

	/*
	Input required by this run mode:
	
		UserID
	
		(Course ID of selected course will be determined from $selectedcourse)
	*/

	if (!isset($eid))
		die("Run mode: 'edit'<BR>\nNo eid passed.");

	$uTemp = new User($eid); //temp user object
	$cTemp = new Course($selectedcourse); //temp course object
	
	$profallowedit = 0;
	if (checkAdmin()) {
		$profallowedit = 1;
	}
	else {
		foreach ($user->courses as $pc) {
			foreach ($uTemp->courses as $uc) {
				if ($pc->ID == $uc->ID && $pc->section == $uc->section) {
					$profallowedit = 1;
					break;
				}
				// For efficiency
				if ($profallowedit) break;
			}
		}
		// If not allowed to edit
		if (!profallowedit) {
			die("You can't edit this user!</BODY></HTML>");
		}
	}
	
	$sTitle = "";
	
	if (strtolower($uTemp->account) == "pr")
		$sTitle = "Editing Prof Account";
	else if ($uTemp->hasTACourses)
		$sTitle = "Editing T.A. Account";
	else
		$sTitle = "Editing Student Account";
	
	center_start();
	box_start($sTitle, 500);
	?>
	
	<SCRIPT language="JavaScript"><!--
	
	function CheckSection(checkbox) {
		
		nChecks = 0;
		form = checkbox.form;

		for (i = 0; i < form.elements.length; i++) {
			el = form.elements[i];
			if (el.name == checkbox.name && el.checked)
				nChecks++;
		}
		
		if (nChecks == 0) {
			checkbox.checked = true;
			alert("You must leave at least one section checked for each course."); 
		}
	}
	
	//-->
	</SCRIPT>
	
	<FORM action="users.php" name="f">
	
	<TABLE width="100%" cellspacing="0" cellpadding="2" border="0">
	

	<TR>
	<TD colspan="2"><I>User Information</I><BR><HR size="1"></TD>
	</TR>
	
	<TR>
	<TD width="50%" align="right">Username:</TD>
	<TD width="50%"><INPUT name="new_un" type="text" size="16" value="<?php print $uTemp->username; ?>"></TD>
	</TR>
	
	<TR>
	<TD width="50%" align="right">First name:</TD>
	<TD width="50%"><INPUT name="new_fn" type="text" size="16" value="<?php print $uTemp->fn; ?>"></TD>
	</TR>
	<TR>
	<TD width="50%" align="right">Last name:</TD>
	<TD width="50%"><INPUT name="new_ln" type="text" size="16" value="<?php print $uTemp->ln; ?>"></TD>
	</TR>
	<TR>

	<?php
	if (checkAdmin() && $uTemp->account != "pr") {
		?>
	<TD width="50%" align="right">Student no.:</TD>
	<TD width="50%"><INPUT name="new_sn" type="text" size="16" value="<?php print $uTemp->stnum; ?>"></TD>
	</TR>
		<?
	}
	else {
		print "<INPUT name='new_sn' type='hidden' value='$uTemp->stnum'>";
	}
	?>
	
	<TR>
	<TD colspan="2"><BR><I>Change Password</I><BR><HR size="1">
	To reset this user's password, enter the new password in the boxes below.
	(Leave blank for no change.)</TD>
	</TR>

	<TR>
	<TD width="50%" align="right">New password:</TD>
	<TD width="50%"><INPUT name="pw1" type="password" size="16" value=""></TD>
	</TR>
	
	<TR>
	<TD width="50%" align="right">Confirm new password:</TD>
	<TD width="50%"><INPUT name="pw2" type="password" size="16" value=""></TD>
	</TR>
	
	<?php
	
	$nTACourses = 0; //keeps count of no. of courses user is TA for
	$nCourses = count($uTemp->sections);
	$sSectionChecked = ""; //string for marking section checkboxes as checked
	
	if (count($uTemp->sections) && $uTemp->account != "pr") {
		?>
		
		<TR>
		<TD colspan="2"><BR><I>Courses</I><BR>
		<HR size="1">
		
		<TABLE width="100%" cellspacing="0" cellpadding="0" border="0">

		<?php

		//get array keys
		$aTemp = array_keys($uTemp->sections);

		for ($i = 0; $i < count($aTemp); $i++) {

			$nCourseID = $aTemp[$i];

			//find course which corresponds to current course ID
			foreach ($uTemp->courses as $cTemp) {
				if ($cTemp->ID == $nCourseID)
					break;
			}

			$nTACourses++;
			?>

			<TR>
			<TD width="80%" bgcolor="#F0F0F0"><?php print $cTemp->title . " (" . $cTemp->code . ")"; ?></TD>

			<?php

			$sTAChecked = "";
			if ($cTemp->isTA)
				$sTAChecked = " checked";

			?>
			<TD align=right bgcolor="#F0F0F0"><INPUT name="ta_<?php print $cTemp->ID ?>" value="true" type="checkbox"<?php print $sTAChecked ?>>&nbsp;TA</TD>
			</TR>

			<TR>
			<TD colspan=2>Sections:


			<?php

			foreach ($cTemp->sections as $sTemp) {

				$sSectionChecked = "";
				foreach ($uTemp->sections[$nCourseID] as $sSection)
					if ($sSection == $sTemp) {
						$sSectionChecked = " checked";
						break;
					}

				//print the sections for this course
				//the name of the checkboxes is "sections_X" where X is replaced by the course ID
				print "<INPUT name=\"sections_$cTemp->ID[]\" value=\"$sTemp\" type=\"checkbox\" onclick=\"CheckSection(this)\"$sSectionChecked> $sTemp&nbsp;&nbsp;&nbsp;\n";
			}
			print "<BR><BR></TD></TR>";

		}

		?>
		
		</TABLE>
		
		</TD>
		</TR>
		
		
		<?php
	}
	?>
	
	
	<TR>
	<TD colspan="2"><HR size="1">
	<INPUT type="hidden" name="eid" value="<?php print $eid ?>">
	<INPUT type="hidden" name="c" value="save">
	<INPUT type="submit" value="Save Changes">
	<INPUT type="button" value="Cancel" onclick="location='users.php'"><BR>
	</TD>
	</TR>
	</TABLE>
	
	</FORM>
	<?php

	box_end();
	center_end();

/**************************************************
 *
 * SAVE
 *
 **************************************************/
} else if ($c == 'save') { //save changes to editted user
	if (!isset($eid))
		die("Run mode: 'save'<BR>\nNo eid passed.");
	
	$uTemp = new User($eid);
	
	//get a list of all courses user is part of
	$aCourses = array_keys($uTemp->sections);

	$uTemp->remove_all_courses();
	
	for ($i = 0; $i < count($aCourses); $i++) {
		eval("\$aSections = \$sections_$aCourses[$i];"); //get array of course sections
		eval("\$bIsTA = \$ta_$aCourses[$i];"); //get TA tag
		
		if ($bIsTA == "")
			$bIsTA = 0;
		else
			$bIsTA = 1;
		
		for ($j = 0; $j < count($aSections); $j++)
			$uTemp->add_course($aCourses[$i], $aSections[$j], $bIsTA);
	}
	
	$error = 0;
	
	/*
	Change other user info here.
	If any errors occur, set $error to 1.

	$new_un - new username
	$new_fn - new first name
	$new_ln - new last name
	$new_sn - new student no.	

	None of these can be blank. $new_un must not duplicate another username already in the
	database. Output appropriate error message if anything is wrong.
	*/
	
	// Check for blanks
	if ($new_un == '' || $new_fn == '' || $new_ln == '' || $new_sn == '') {
		msgbox('Blank Fields', 'One or more fields was left blank. Please press the Back Button.', 'error', 'Okay', 'users.php');
		$error = 1;
	}

	// If username changed
	if ($new_un != $uTemp->username) {
		// Check for duplicate username
		$result = @mysql_query("SELECT username FROM user WHERE username='$new_un'") or die(mysql_error());
		if (mysql_num_rows($result) == 0) {
			// Good to change to this name
			$uTemp->username = $new_un;
		}
		else {
			// Spit out error
			msgbox('Bad User Name...', 'This username already exists. Please press the Back Button.', 'error', 'Okay', 'users.php');
			$error = 1;
		}
	}

	// If name changed
	$uTemp->fn = $new_fn;
	$uTemp->ln = $new_ln;

	// If student number changed (SAME as for username)
	if ($new_sn != $uTemp->stnum) {
		// Check for duplicate username
		$result = @mysql_query("SELECT stnum FROM user WHERE stnum=$new_sn") or die(mysql_error());
		if (mysql_num_rows($result) == 0) {
			// Good to change to this number
			$uTemp->stnum = $new_sn;
		}
		else {
			// Spit out error
			msgbox('Bad Student Number...', 'This Student Number already exists. Please press the Back Button.', 'error', 'Okay', 'users.php');
			$error = 1;
		}
	}

	/*
	Changing password:
	
	$pw1 and $pw2 should match. Only change password if $pw1 or $pw2 is not blank.
	Output appropriate error messages if $pw1 and $pw2 don't match, or if one is empty.
	*/
	
	if ($pw1 != '' || $pw2 != '') {
		if ($pw1 == $pw2) {
			// Good to change
			$uTemp->password = crypt($pw1, $uTemp->ln);
		}
		else {
			// Error
			msgbox('Password Mismatch...', 'The password cannot be changed because the two password fields do not match. Please press the Back Button.', 'error', 'Okay', 'users.php');
			$error = 1;
		}
	}
	
	if ($error == 0) {
		//save changes made to user object
		if ($uTemp->save()) //if saving was successfuly
			msgbox('Changes Saved', 'The changes you made to the user were successfully saved to the database.', 'normal', 'OK', 'users.php');
		else //if saving failed
			msgbox('Save Failed...', 'Failure to save changes to database.', 'error', 'Rats', 'users.php');
	}

/**************************************************
 *
 * DELETE
 *
 **************************************************/
} else if ($c == 'delete') { //delete user(s)
	
	$nUsers = count($u); //find out how many users were selected to be deleted
	$nTAs = count($u_ta);
	
	if ($nUsers + $nTAs) { //if any users were selected
		if ($confirm == 'yes') { //only proceed with deleting if confirmation checkbox was checked
			
			//construct a WHERE clause with the IDs of all users to be deleted:
			
			$where = '';
			
			for ($i = 0; $i < $nUsers; $i++) {
			
				$where .= "ID='" . $u[$i] . "'";
				if ($i < $nUsers - 1) //if this is not the last user, then add an OR
					$where .= ' OR ';
			}

			for ($i = 0; $i < $nTAs; $i++) {
			
				if ($i == 0 && strlen($where)) //if this is the first TA, and if $where contains something, then add an OR
					$where .= ' OR ';
					
				$where .= "ID='" . $u_ta[$i] . "'";
				
				if ($i < $nTAs - 1)
					$where .= ' OR ';
			}
			
			//variables to keep track of how many users were removed from the course and how many were deleted from the database
			$removed = 0;
			$deleted = 0;
			
			$result = @mysql_query("SELECT * FROM user WHERE $where") or die ("Invalid query");
			while ($row = mysql_fetch_array($result)) {
				$temp = new User($row); //create temporary User object from database row
				if (count($temp->courses) > 1) { //if user belongs to more than one course
					//then just remove THIS COURSE from user's course list
					//$selcourse is an object representing the currently selected course
					if ($temp->remove_course($selcourse->ID, $selcourse->section)) { //if course removing was successful
						$temp->save(); //and save changes to database
						$removed++; //increase counter
					}
				} else { //otherwise simply delete user from the database
					if ($temp->delete()) //if delete was successful then increase counter
						$deleted++;
				}
			}
			
			$total_removed = $removed + $deleted;
			//display message to user
			if ($total_removed) //if any users were deleted
				msgbox('User(s) Deleted', $total_removed . ' users were removed from this course.', 'normal', 'Okay', $PHP_SELF);
			else
				msgbox('No Users Deleted', 'The users you specified to delete were not found.', 'error', 'Okay', $PHP_SELF);
		} else
			msgbox('No Users Deleted', 'No users were deleted because you did not put a check mark in the delete confirmation checkbox. Please check it, and try again.', 'error', 'Okay', $PHP_SELF);
	} else
		msgbox('No Users Selected', 'You did not select any users to delete.', 'normal', 'Okay', $PHP_SELF);


/**************************************************
 *
 * TESTING AREA
 *
 **************************************************/
} else if ($c == 'test') {
	print 'testing area<BR>';
	
	printCourseSelector('Users in ', 'Change', 1, 'D');
}
doc_end();

?>

