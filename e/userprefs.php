<?php
// e-Tutor is licensed under the GPL. Please see the LICENSE file for more
// information.

/*
userprefs.php

written January 26th, 2002 by Pat

Script:

	Allows users to set their preferences: password, eMail.
	Takes input for each of these functions and decides what to do.
*/

	session_start();
 	session_register("loggedin");
	session_register("id", "stnum", "first", "last", "course", "sections", "email", "username", "password", "account", "cryptpassword");
	
	require("include.php");
	doc_start('e-tutor User Preferences');

	// *************
	// ADMIN SECTION
	if (checkadmin()) {
		// Check if the password was just submitted
		if ($action == 'changeadminpw') {
			// Check for password congruency
			if ($pw1 != $pw2) {
				msgbox("Password Error", "The passwords do not match.", 'error', 'Okay', $PHP_SELF);
				die;
			}

			// Check for password length
			if (strlen($pw1) < 1) {
				msgbox("Password Error", "The password is blank. It has not been changed", 'error', 'Okay', $PHP_SELF);
				die;
			}
			
			// Write the password
			$adminpw = crypt($pw1, $pw1);
			@mysql_query("UPDATE prefs SET value='" . crypt($pw1, $pw1) . "' WHERE name='adminpw'") or die (mysql_error());
			
			msgbox("Password Changed", "Your password has been changed.", 'normal', 'Okay', $PHP_SELF);
			exit();
		}
		elseif ($action == 'changeorg') {
			// Write to the database, there are no restrictions on this
			@mysql_query("UPDATE prefs SET value='$org' WHERE name='organization'") or die(mysql_error());
			msgbox("Organization Updated", "The organization name was changed to '$org'.", 'normal', 'Okay', $PHP_SELF);
			exit();
		}
		elseif ($action == 'changeforcepw') {
			// Check that it's not blank
			if (!isset($forcepw)) die("Error.</BODY></HTML>");
			
			// Write to the database
			@mysql_query("UPDATE prefs SET value='$forcepw' WHERE name='forcepwchange'") or die(mysql_error());
			msgbox("Password Change Forcing Updated", "The password change forcing preference was successfully updated.", 'normal', 'Okay', $PHP_SELF);
			exit();
		}
		elseif ($action == 'changeccformat') {
			// If it's blank, don't perform checks
			if (isset($ccformat)) {
				$ccformat = strtoupper($ccformat);
				
				// Check for illegal characters
				if (preg_match("/[^#A\s\-\.]/", $ccformat)) {
					msgbox("Format Error", "Your course code was not properly formatted. Try again.", 'error', 'Okay', $PHP_SELF);
					die();
				}
				
				// Convert it to regular expression format
				$ccformat = toReg($ccformat);
			}
			
			// Write to the database
			@mysql_query("UPDATE prefs SET value='$ccformat' WHERE name='ccformat'") or die(mysql_error());
			msgbox("Course Code Format Updated", "The course code format has been updated.", 'normal', 'Okay', $PHP_SELF);
			exit();
		}
		elseif ($action == 'changeloginformat') {
			// Check that it's not blank
			if (!isset($lformat)) die("Error.</BODY></HTML>");
			
			// Write to the database
			@mysql_query("UPDATE prefs SET value='$lformat' WHERE name='loginformat'") or die(mysql_error());
			msgbox("Format Updated", "The login auto-generation format was successfully updated.", 'normal', 'Okay', $PHP_SELF);
			exit();
		}
		elseif ($action == 'changebatchorder') {
			// Check that it's not blank
			if (!isset($order)) die("Error.</BODY></HTML>");
			
			// Write to the database
			@mysql_query("UPDATE prefs SET value='$order' WHERE name='batchorder'") or die(mysql_error());
			msgbox("Order Updated", "The batch adding order was successfully updated.", 'normal', 'Okay', $PHP_SELF);
			exit();
		}
		
		// Show the admin menu
		showAdminMenu();
		die();
	}

	// ***********
	// LOGIN CHECK
	if (!isset($loggedin)) {
		die ("Not Logged In!</body></html>");
	}
	
	// ********************
	// REGULAR USER SECTION
	if ($action == 'changeemail') {
		// Check that the email has an "@" and "."
		if (!strstr($newemail, "@") || !strstr($newemail, ".")) {
			msgbox("eMail Error", "Your email address is wrongly formatted.", 'error', 'Okay', $PHP_SELF);
			die;
		}
		
		@mysql_query("UPDATE user SET email='$newemail' WHERE ID='$id'") or die (mysql_error());
		$email = $newemail;
		
		msgbox("eMail Changed", "Your new eMail address is <B>$newemail</B>.", 'normal', 'Okay', $PHP_SELF);
		die;
	}
	elseif ($action == 'changepw') {
		// If forced password change, use index.php as return page
		if ($forcepwchange) {
			$returnpage = './';
		}
		else {
			$returnpage = $PHP_SELF;
		}
		
		// Check for password congruency
		if ($pw1 != $pw2) {
			msgbox("Password Error", "The passwords do not match.", 'error', 'Okay', $returnpage);
			die;
		}
		
		// Check for password length
		if (strlen($pw1) < 4) {
			msgbox("Password Error", "The password is too short.<BR>It must be at least 4 characters in length.", 'error', 'Okay', $returnpage);
			die;
		}
		
		// If forced password change and user tries to set to the same...
		if ($forcepwchange && (crypt($pw1, $user->ln) == $user->password)) {
			msgbox("Password Error", "You <B>must</B> change your password.", 'error', 'Okay', $returnpage);
			die;
		}

		// Set the cookie password, crypt it, change in database.
		$password = $pw1;
		$cryptpassword = crypt($pw1, $user->ln);
		$user->password = $cryptpassword;
		$user->save();
		@mysql_query("UPDATE user SET pwchanged='1' WHERE ID='$id'") or die (mysql_error());
		//if $user->save() returned true, then that means successfully saved
		if ($user->save()) msgbox("Password Changed", "Your password has been changed.", 'normal', 'Okay', $returnpage);
		else msgbox("Failed", "Your password was not changed, because some sort of error occurred.", 'error', 'Okay', $PHP_SELF);
		die;
	}
	
	// To show an empty eMail address
	if ($email == "") {
		$email = "<I>nothing</I>";
	}
?>
<CENTER>

<!-- EMAIL FORM -->

<FORM METHOD="POST" ACTION="<?PHP echo $PHP_SELF?>">
<INPUT TYPE="HIDDEN" NAME="action" VALUE="changeemail">

<?PHP box_start('E-mail Settings', '350') ?>
<BR><CENTER>
Your current eMail address is set to<BR>
<B><?PHP echo $email?></B>.
<P>This address is used should important information need to be sent to you.
<P>New e-mail address<BR><INPUT TYPE="TEXT" SIZE="50" NAME="newemail">
<P><INPUT TYPE="SUBMIT" VALUE="Change">
</CENTER>

<?php box_end() ?>

</FORM>


<!-- PASSWORD FORM -->

<FORM METHOD="POST" ACTION="<?php echo $PHP_SELF?>">
<INPUT TYPE="HIDDEN" NAME="action" VALUE="changepw">

<?php box_start('Password Settings', '350') ?>
<CENTER><BR>
This is the password you use to login. You should set it to something difficult to guess.<BR>
It <B>must</B> be at least 4 characters in length.<BR><BR>

<TABLE BORDER='0'>
<TR><TD>New password: </TD><TD><INPUT TYPE="PASSWORD" SIZE="8" MAXLENGTH=8 NAME="pw1"></TD><TD ROWSPAN=2 WIDTH=100 ALIGN=CENTER><INPUT TYPE="SUBMIT" VALUE="Change"></TD></TR>
<TR><TD>Retype: </TD><TD><INPUT TYPE="PASSWORD" SIZE="8" MAXLENGTH=8 NAME="pw2"></TD></TR>
</TABLE>
<BR>

</CENTER>
<?php box_end() ?>
</FORM>

<BR><BR>
<A HREF="./">Return to Menu</A></CENTER>

</BODY></HTML>

<?php
function showAdminMenu() {
	?>
	<CENTER>
	<!-- Admin Password -->
	<FORM METHOD="POST" ACTION="<?php echo $PHP_SELF?>">
	<INPUT TYPE="HIDDEN" NAME="action" VALUE="changeadminpw">
	<?php box_start('Administrator Password Settings', '350') ?>
	<CENTER><BR>
	This is the password the administrator uses to login. You should set it to something difficult to guess.<BR>
	<TABLE BORDER='0'>
	<TR><TD>New password: </TD><TD><INPUT TYPE="PASSWORD" SIZE="8" MAXLENGTH=8 NAME="pw1"></TD><TD ROWSPAN=2 WIDTH=100 ALIGN=CENTER><INPUT TYPE="SUBMIT" VALUE="Change"></TD></TR>
	<TR><TD>Retype: </TD><TD><INPUT TYPE="PASSWORD" SIZE="8" MAXLENGTH=8 NAME="pw2"></TD></TR>
	</TABLE>
	<BR>
	</CENTER>
	<?php box_end() ?>
	</FORM>
	
	<!-- Organization Name -->
	<FORM METHOD="POST" ACTION="<?php echo $PHP_SELF?>">
	<INPUT TYPE="HIDDEN" NAME="action" VALUE="changeorg">
	<?php box_start('Organization Name', '350') ?>
	<CENTER><BR>
	This setting alters the organization at which the server runs. It is displayed on the login page.
	<?php
		$prefresult = mysql_query("SELECT value FROM prefs WHERE name='organization'") or die(mysql_error());
		$org = mysql_fetch_array($prefresult);
	?>
	<P><INPUT TYPE="TEXT" NAME="org" VALUE="<?php echo $org['value']?>" SIZE="50">
	<BR><BR>
	<INPUT TYPE="SUBMIT" VALUE="Save">
	</CENTER>
	<?php box_end() ?>
	</FORM>
	
	<!-- Force Password Change -->
	<FORM METHOD="POST" ACTION="<?php echo $PHP_SELF?>">
	<INPUT TYPE="HIDDEN" NAME="action" VALUE="changeforcepw">
	<?php box_start('Force Password Change', '350') ?>
	<CENTER><BR>
	This determines if new users are forced to change their password upon first login. It is <I>highly recommended</I> that this option be turned on.<BR><BR>
	<?php
		$prefresult = @mysql_query("SELECT value FROM prefs WHERE name='forcepwchange'") or die(mysql_error());
		$forcepw = mysql_fetch_array($prefresult);
		if ($forcepw['value'] == '1') { $o1 = ' CHECKED'; }
		else { $o2 = ' CHECKED'; }
	?>
	<INPUT TYPE="RADIO" NAME="forcepw" VALUE="1"<?php echo $o1?>> On &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<INPUT TYPE="RADIO" NAME="forcepw" VALUE="0"<?php echo $o2?>> Off<BR>
	<BR><BR>
	<INPUT TYPE="SUBMIT" VALUE="Save">
	</CENTER>
	<?php box_end() ?>
	</FORM>
	
	<!-- Course Code Format -->
	<FORM METHOD="POST" ACTION="<?php echo $PHP_SELF?>">
	<INPUT TYPE="HIDDEN" NAME="action" VALUE="changeccformat">
	<?php box_start('Course Code Format', '350') ?>
	<CENTER><BR>
	This is the format that all course codes must adhere to.
	<P>Although recommended for uniformity, code-formatting can be turned off by leaving blank.
	<P>Allowed characters include <I>dots</I>, <I>dashes</I>, and <I>spaces</I>. Represent a letter with an A (A), and numerical character with a hash (#).
	<P>For example, a course code format like 'PHYS-1003' would be written 'AAAA-####'.
	<?php
		$prefresult = mysql_query("SELECT value FROM prefs WHERE name='ccformat'") or die(mysql_error());
		$ccformat = mysql_fetch_array($prefresult);
		$ccformat = fromReg($ccformat['value']);
	?>
	<P><INPUT TYPE="TEXT" NAME="ccformat" VALUE="<?php echo $ccformat?>" SIZE="50">
	<BR><BR>
	<INPUT TYPE="SUBMIT" VALUE="Save">
	</CENTER>
	<?php box_end() ?>
	</FORM>

	<!-- Name Generation -->
	<FORM METHOD="POST" ACTION="<?php echo $PHP_SELF?>">
	<INPUT TYPE="HIDDEN" NAME="action" VALUE="changeloginformat">
	<?php box_start('Name Auto-Generation Scheme', '350') ?>
	<CENTER><BR>
	This determines the way in which usernames and passwords are auto-generated by the User Addition program.<BR><BR>
	</CENTER>
	<?php
		$prefresult = @mysql_query("SELECT value FROM prefs WHERE name='loginformat'") or die(mysql_error());
		$lformat = mysql_fetch_array($prefresult);
		if ($lformat['value'] == 'namenumber') { $o1 = ' CHECKED'; }
		else { $o2 = ' CHECKED'; }
	?>
	<INPUT TYPE="RADIO" NAME="lformat" VALUE="namenumber"<?php echo $o1?>> Login: <I>InitialAndLastName</I>, Pass: <I>StudentNumber</I><BR>
	<INPUT TYPE="RADIO" NAME="lformat" VALUE="numberlname"<?php echo $o2?>> Login: <I>StudentNumber</I>, Pass: <I>LastName</I><BR>
	<BR><BR>
	<CENTER>
	<INPUT TYPE="SUBMIT" VALUE="Save">
	</CENTER>
	<?php box_end() ?>
	</FORM>
	
	<!-- Batch Order -->
	<FORM METHOD="POST" ACTION="<?php echo $PHP_SELF?>">
	<INPUT TYPE="HIDDEN" NAME="action" VALUE="changebatchorder">
	<?php box_start('Batch Adding Order', '350') ?>
	<CENTER><BR>
	This is the order in which the Batch Add Users page expects spreadsheet data to be pasted in.<BR><BR>
	</CENTER>
	<?php
		$result = @mysql_query("SELECT value FROM prefs WHERE name='batchorder'") or die(mysql_error());
		$batchorder = mysql_fetch_array($result);
		if ($batchorder['value'] == '$sn,$ln,$fn,$se,$em,$un,$pw') { $o1 = ' CHECKED'; }
		else { $o2 = ' CHECKED'; }
	?>
	<INPUT TYPE="RADIO" NAME="order" VALUE="$sn,$ln,$fn,$se,$em,$un,$pw"<?php echo $o1?>> St#, Last, First, Section, eMail, Username, Pass<BR>
	<INPUT TYPE="RADIO" NAME="order" VALUE="$ln,$fn,$sn,$se,$em,$un,$pw"<?php echo $o2?>> Last, First, St#, Section, eMail, Username, Pass<BR>
	<BR><BR>
	<CENTER>
	<INPUT TYPE="SUBMIT" VALUE="Save">
	</CENTER>
	<?php box_end() ?>
	</FORM>
	
	<BR><BR>
	<A HREF="./">Return to Menu</A></CENTER>
	</BODY></HTML>
	<?PHP
}

function toReg($input) {
	// Don't do anything if it's blank.
	if ($input == '') return '';
	
	$input = ereg_replace('\.', '\\\.', $input);
	$input = ereg_replace('-', '\\\-', $input);
	$input = ereg_replace(' ', '\\\s', $input);
	$input = ereg_replace('#', '\\\d', $input);
	$input = ereg_replace('A', '[A-Z]', $input);
	$input = "^$input\$";
	
	return $input;
}

function fromReg($input) {
	$input = ereg_replace('\\\\', '', $input);
	$input = ereg_replace('\^', '', $input);
	$input = ereg_replace('\$', '', $input);

	$input = ereg_replace('\[A-Z\]', 'A', $input);
	$input = ereg_replace('d', '#', $input);
	$input = ereg_replace('s', ' ', $input);
	
	return $input;
}

?>