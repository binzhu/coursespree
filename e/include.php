<?php
// e-Tutor is licensed under the GPL. Please see the LICENSE file for more
// information.

/* 
include.php
Common routines for inclusion in [almost] every etutor php file.
written January 2002 by Markus and Pat

Dependency: some routines from errorh.php are required
*/

session_start();
session_register("loggedin");

session_register("id", "stnum", "first", "last", "course", "sections", "email", "username", "password", "account", "cryptpassword");

//session vars for users.php:
session_register("selectedcourse", "selectedsection", "selectedusertype");

require("classes.php"); //include User and Course class definitions

//connect to database
$dbcnx = @mysql_connect('localhost', 'etutor', getPasswd()) or die (mysql_error());
@mysql_select_db('etutor');

$user = new User($id); //load $user object using user ID stored in session variable 

// The all-important version number
$etversion = "1.0alpha";

/*
checkadmin()
returns true of administrator is logged in, false if not
written 26th January, 2002 by Markus

Password check at each execute added to make for secure.
*/
function checkadmin() {
	global $username, $password;
	if (($username == 'admin') && adminCheckPass($password))
		return 1;
	else return 0;
}

/*
adminCheckPass()
returns true of administrator is logged in, false if not
moved here 4th January, 2003 by Pat
*/
function adminCheckPass($password) {
	$result = mysql_query("SELECT value FROM prefs WHERE name='adminpw'");
	$row = mysql_fetch_array($result);

	if (crypt($password, $password) == $row['value']) {
		return 1;
	}
	return 0;
}

/*
accesslevel()
returns access level of user currently logged in
written 3rd February, 2002 by Markus

NOTE: this function needs more checks to make it more secure, but this will be done later.
*/
function accesslevel() {
	if (checkadmin())
		return 'admin';
	else return $account;
}



/*
read password from file
written January 2nd, 2002 by Pat

Input:
	no input
	
Output:
	returns password
*/
function getPasswd() {
	$password = file('./passwd') or die('Password file does not exist or is inaccessible');
	return $password[0];
}



// Adds all courses in the database to the current user (used for admin)
function fillCourses() {
	global $user;
	
	$result = @mysql_query("SELECT ID,sections FROM courses ORDER BY code") or die(mysql_error());
	while ($courselist = mysql_fetch_array($result)) {
		$sections = split(',', $courselist['sections']);
		foreach ($sections as $section) {
			$user->add_course($courselist['ID'], $section, 0);
		}
	}
}



/********************************************************************************
*********************************************************************************
Basic HTML printing functions
written 10th Feb. 2002 by Markus
*********************************************************************************
********************************************************************************/


/*
topbar()

Prints an information bar at the top at the top of the browser window.
written 21st Feb. by Markus
*/
function topbar() {
	global $user;
	$curtime = date("Y-m-d H:i:s");

	?>
	<TABLE width=100% cellspacing=0 cellpadding=0 border=0>
	<TR>
	<TD bgcolor="#A0A0A0">

	<TABLE width=100% cellspacing=1 cellpadding=2 border=0>
	<TR>
	<TD bgcolor="#FFFFFF">You are logged in as <B><?php print $user->fn . ' ' . $user->ln ?></B>
	<?php
	if (checkadmin())
		print "(administrator account)";
	else if ($user->account == 'pr')
		print "(professor account)";
	else if ($user->account == 'st')
		print "(student account)";
	?>
	</TD>
	<TD align=right>
	Current date/time: <?php print $curtime ?><BR>
	</TD>
	</TR>
	</TABLE>

	</TD>
	</TR>
	</TABLE>
<?php
}



/*
msgbox()
message box function, new and improved version
written January 2nd, 2002 by Markus

Input:
	$title - message title
	$msgtext - message text
	
	Optional arguments:
	
	The third argument can specify the type of message:
	'' or 'normal' for normal (grey title bar)
	'error' for error box (makes title bar red)
	'warning' for warning message (makes title bar yellow)
	
	Further arguments are interpretted as pairs. The provide information for any buttons
	to be displayed on the message box. If an odd number of further arguments is encountered,
	the last one is ignored, and an error is logged. The first argument from a pair is the
	button text, and the second one is the URL to which the button takes the user.
	
	For example, the following statement
	
	msgbox('Are You Sure?', 'Are you sure you want to erase this data?', 'normal', 'Yes', 'deletedata.php', 'No', 'main.php');
	
	will display a normal message box with two buttons, Yes and No. Clicking Yes
	will take the user to deletedata.php, and clicking No will take the user to main.php
	
	Note: JavaScript needs to be turned on in the user's browser so that the messages work
*/
function msgbox($title, $msgtext) {
	
	$num_args = func_num_args();
	if ($num_args) $type = func_get_arg(2);
	else $type = '';
	
	$btn_args = $num_args - 3; //get number of button arguments
	
	$icon = "";
	$bc = "";
	$tbc = "";
	
	if ($type == 'error') {
		$bc = "#FFA0A0"; //border colour
		$tbc = "#FFF0F0"; //title bar colour
		$icon = "error";
	} else if ($type == 'warning') { //if $type is 'warning'
		$bc = '#A0A0A0';
		$tbc = '#FFFFA0';
		$icon = "info";
	} else if ($type == 'normal' || $type != '' || $type == '') { //if $type is 'normal' or some unrecognized type
		$bc = "#A0A0A0";
		$tbc = "#F0F0F0";
		$icon = "info";
	}
	?>

	<HTML>
	<HEAD>
	<LINK REL="stylesheet" HREF="style.css">
	
	<TITLE><?php print $title?></TITLE>
	</HEAD>
	<?php

	//if there are any buttons, the make the first button the default button
	if ($btn_args > 0) print "<BODY onLoad='document.form1.button1.focus();'>";
	else print "<BODY>\n";

	center_start();
	?>
	
	<FORM name='form1' action=''>

	<?php
	box_start($title, 400, $bc, $tbc);
	?>
	
	<TABLE width=100% cellspacing=2 cellpadding=0>
	<TR>
	<TD width=1%><IMG src="img/<?php print $icon?>.png" width=48 height=48></TD>
	<TD><?php print $msgtext?></TD>
	</TR>
	</TABLE>
	
	<BR>
	<CENTER>
	
	<?php
	for ($i = 3; $i < $num_args; $i+=2) {
		$btn_text = func_get_arg($i);
		if ($i < $num_args - 1) $btn_url = func_get_arg($i + 1);
		else $btn_url = '';
		$b_num = $i - 2;
		print "<INPUT type='button' name='button$b_num' value='$btn_text' onClick='location=\"$btn_url\";'>";
		if ($i < $num_args - 2) print "\n";
	}

	print "</CENTER>";	

	box_end();
	print "</FORM>";
	center_end();
	doc_end();
}



/*
doc_start()

prints basic document headers
written 10th Feb. 2002 by Markus

Input:
	argument 1: title of document to print between <TITLE></TITLE> tags
*/
function doc_start() {
	$num_args = func_num_args();
	if ($num_args >= 1) $title = func_get_arg(0);
	else $title = '';
	?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
	<HTML>
	<HEAD>
	<LINK REL="stylesheet" HREF="style.css">
	<META http-equiv="Content-Type" content="text/html; charset=utf-8"> 

	<TITLE><?php print $title ?></TITLE>
	</HEAD>
	
	<BODY>
<?php
}


/*
doc_end()

prints document closing tags
written 10th Feb. 2002 by Markus

no inputs.
*/
function doc_end() {
?>
	</BODY>
	</HTML>
	<?php
}

/*
center_start()

prints opening of table which centers everything inside is vertically and horizontally
in browser window
written 10th Feb. 2002 by Markus

no inputs.
*/
function center_start() {
?>
	<TABLE width="100%" height="99%" cellspacing=0 cellpadding=0 border=0>
	<TR>
	<TD align=center>
	<?php
}

/*
center_end()

closes centering table
written 10th Feb. 2002 by Markus

no inputs.
*/
function center_end() {
?>
	</TD></TR>
	</TABLE>
	<?php
}

/*
box_start()

Prints required table tags to open a bordered box with a title
written 10th Feb. 2002 by Markus

Inputs:

	arg. 1: title (if not given, title row doesn't get printed)
	arg. 2: width - width of box in pixels
	arg. 3: border colour (defaults to #A0A0A0 if not given)
	arg. 4: title bar background colour (defaults to #F0F0F0 if not given)
	
	example:
	
	box_start("Important Message", 400);
	
	Prints box starting tags, with Important Message as title, and 400 pixels wide,
	using default border and background colours.
	
*/
function box_start() {

	//all arguments are optional:
	
	$num_args = func_num_args();
	
	if ($num_args >= 1) $title = func_get_arg(0); //get value, if it was passed
		else $title = ''; //otherwise use default value

	if ($num_args >= 2) $width = func_get_arg(1);
		else $width = '';

	if ($num_args >= 3) $border_colour = func_get_arg(2);
		else $border_colour = "#A0A0A0";

	if ($num_args >= 4) $title_bar_colour = func_get_arg(3);
		else $title_bar_colour = "#F0F0F0";
	?>

	<TABLE cellspacing=0 cellpadding=0 border=0>
	<TR>
	<TD bgcolor="<?php print $border_colour ?>">

	<TABLE<? if ($width) print " width='" . $width . "'"; ?> cellspacing=1 cellpadding=2 border=0>
	<?php if ($title) { /*only print title row if a title was passed */ ?>
	<TR>
	<TD bgcolor="<?php print $title_bar_colour ?>"><B><? print $title ?></B></TD>
	</TR>
	<?php } ?>
	<TR>
	<TD bgcolor="#FFFFFF" class='msgbox'>
	<?php
}


/*
box_end()

Closes bordered box (used after box_start())
written on 10th Feb. 2002 by Markus
*/
function box_end() {
?>
	</TD>
	</TR>
	</TABLE>
	</TD>
	</TR>
	</TABLE>
<?php
}


/*
sidebox_start()

Prints opening table tags for side boxes (used in User Manager)
written 21st Feb. 2002

Input:

	argument 1: title of side box (optional)

*/
function sidebox_start() {

	$num_args = func_num_args();
	if ($num_args >= 1) $title = func_get_arg(0); //get value, if it was passed
		else $title = ''; //otherwise use default value
	?>
	
	<TABLE cellspacing=0 cellpadding=0 border=0>
	<TR><TD bgcolor="#C0C0C0">
	<TABLE border=0 cellspacing=1 cellpadding=2 width=200>
	<TR>
	<TD class=sidebox>
	<?php if ($title) { ?>
	<SPAN class=opt><?php print $title ?></SPAN><BR>
	<?php } ?>
	<BR>
<?php
}

/*
sidebox_end()

Closes side box opened by sidebox_start()
written 21st Feb. 2002 by Markus
*/

function sidebox_end() {
?>
	</TD>
	</TR>
	</TABLE>
	</TD></TR>
	</TABLE>
<?php
}


function popup($msg) {
	?>
	
	<SCRIPT language="JavaScript"><!--
	alert("<?php print $msg?>");
	//-->
	</SCRIPT>
	
	<?php
}

?>
