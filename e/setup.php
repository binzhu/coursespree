<?php
// e-Tutor is licensed under the GPL. Please see the LICENSE file for more
// information.

/*
setup.php

written January 2nd, 2001 by Pat

Function:

	Setup program for e-tutor PHP.

Input Parameters:

	rootname - MySQL root username
	rootpw - MySQL root password

Output:

	Sets up random password file and MySQL tables, displays success or error.
*/
?>

<HTML>
<HEAD><TITLE>e-tutor PHP Setup</TITLE></HEAD>
<LINK REL="stylesheet" HREF="style.css">
<BODY>

<?php
	if (!isset($rootname)) {
?>

	<P><FONT SIZE="+2"><B>e-Tutor PHP Setup</B></FONT>

	<P>Before proceeding, please make certain that the directory in which the PHP files reside is owned by the web server. On most newer systems this can be done by going to that directory and typing:<BR>
	<UL><FONT COLOR="Blue">chown apache:apache ./</FONT></UL>
	If this does not work, you must find the user and group that apache belongs to, and chown for that.
	
	<P>To complete the setup, simple follow the three steps below.
	<HR>
	
	<OL><FORM METHOD=POST ACTION="<?php echo $PHP_SELF; ?>">
	<LI><P><I>What is the name of your Organization?</I><BR>
	Organization: <INPUT TYPE="TEXT" SIZE="30" NAME="org" VALUE="Some Organization">
	
	<LI><P><I>Choose a password for administrating e-Tutor:</I><BR>
	Admin Password: <INPUT TYPE="TEXT" MAXLENGTH="12" SIZE="16" NAME="adminpw">
	
	<LI><P><I>Enter the MySQL admin user and password below.</I><BR>
	On most systems the administrator is root.<BR>
	<B>Note:</B> This is not asking for the root password of the computer.<BR>
	<FORM METHOD=POST ACTION="<?php echo $PHP_SELF; ?>">
	Root Username: <INPUT TYPE="TEXT" MAXLENGTH="16" SIZE="16" NAME="rootname" VALUE="root"><BR>
	Root Password: <INPUT TYPE="PASSWORD" MAXLENGTH="8" SIZE="16" NAME="rootpw">
	
	</OL>
	<P><INPUT TYPE="submit" VALUE="Perform Install">
	</FORM>

<?php
	}
	else {
		if ($rootpw == '') {
			die('No MySQL password given!</BODY></HTML>');
		}
		
		if ($adminpw == '') {
			die('No administrator password given!</BODY></HTML>');
		}
		
		// MAKE A PASSWORD
		$random = addslashes(crypt(time()));
		
		// Connect to MySQL
		$dbcnx = @mysql_connect('localhost', $rootname, $rootpw) or die (mysql_error());
		
		// PASSWORD FILE WRITING
		if (is_file('./passwd')) {
			die('Setup already ran. Remove passwd file and MySQL database to start a clean setup.');
		}

		$of = fopen ('./passwd', 'w') or die('Could not open password file for writing!');
		fputs($of, $random);
		fclose($of);

		chmod('./passwd', 0600) or die('Could not change file mode. Please make sure Apache has write permissions in this directory');

		print "Password Successfully Created...<BR>";
		
		// MYSQL DATABASE CREATION
		if (@mysql_select_db("etutor")) {
			// Database opened, must already exist
			print "<FONT COLOR='Blue'>Note: Database already existed. This setup may restore some preferences but not data.</FONT><BR>";
		}
		else {
			@mysql_create_db("etutor") and @mysql_select_db("etutor") or die(mysql_error());
		}
		
		@mysql_query("CREATE TABLE IF NOT EXISTS user (ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY, stnum INT NOT NULL, fn CHAR(40) NOT NULL, ln CHAR(40) NOT NULL, courseID TEXT NOT NULL, sections TEXT NOT NULL, email TEXT, username CHAR(12) NOT NULL, password CHAR(14) NOT NULL, account CHAR(2) NOT NULL, pwchanged BOOL NOT NULL)");
		@mysql_query("CREATE TABLE IF NOT EXISTS courses (ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY, code CHAR(12) NOT NULL, sections TEXT NOT NULL, title TEXT NOT NULL)");
		@mysql_query("CREATE TABLE IF NOT EXISTS assignments (ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY, name TEXT NOT NULL, courseID INT NOT NULL, section CHAR(2) NOT NULL, duedate DATETIME, maxfilesize INT NOT NULL, maxfiles INT NOT NULL, allowlate BOOL NOT NULL)");
		@mysql_query("CREATE TABLE IF NOT EXISTS files (ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY, courseID INT NOT NULL, section CHAR(2) NOT NULL, assignmentID INT NOT NULL, stnum INT NOT NULL, filename TEXT NOT NULL, date timestamp(14) NOT NULL, receipt INT NOT NULL, mimetype CHAR(128) NOT NULL, data MEDIUMBLOB NOT NULL)");
		@mysql_query("CREATE TABLE IF NOT EXISTS prefs (name CHAR(20) PRIMARY KEY, value TEXT)");
		
		print "Database Successfully Created...<BR>";
		
		// MYSQL USER CREATION
		@mysql_query("GRANT ALL PRIVILEGES ON etutor.* TO etutor@localhost IDENTIFIED BY '$random'") or die(mysql_error());
		
		print "MySQL User Successfully Created...<BR>";
		
		// ADMIN PASSWORD
		$adminpw = crypt($adminpw, $adminpw);
		@mysql_query("REPLACE INTO prefs SET name='adminpw', value='$adminpw'") or die (mysql_error());

		print "Administrator Password Set...<BR>\n";
		
		// INITIAL PREFERENCES
		print "<BR><B>Initial Preferences...</B><BR>";
		if ($org == '') $org = 'Some Organization';
		@mysql_query("INSERT INTO prefs SET name='organization', value='$org'") or @mysql_query("UPDATE prefs SET value='$org' WHERE name='organization'");
		@mysql_query("INSERT INTO prefs SET name='batchorder', value='" . addslashes('$sn,$ln,$fn,$se,$em,$un,$pw') . "'") or print "&nbsp;&nbsp;&nbsp;<I>Batch Order Exists... skipping</I><BR>\n";
		@mysql_query("INSERT INTO prefs SET name='loginformat', value='namenumber'") or print "&nbsp;&nbsp;&nbsp;<I>Login Format Exists... skipping</I><BR>\n";
		@mysql_query("INSERT INTO prefs SET name='ccformat', value=''") or print "&nbsp;&nbsp;&nbsp;<I>Course Code Format Exists... skipping</I><BR>\n";
		@mysql_query("INSERT INTO prefs SET name='forcepwchange', value='0'") or print "&nbsp;&nbsp;&nbsp;<I>Password-Forcing Option Exists... skipping</I><BR>\n";

		print "Initial Preferences Set...<BR><BR><BR>\n";

		print "<B>DONE</B><BR>Click <A HREF='./'>here</A> to Log In.";
	}
?>

</BODY>
</HTML>
