<?php
// e-Tutor is licensed under the GPL. Please see the LICENSE file for more
// information.

require("include.php"); //regular stuff to include
require("errorh.php"); //error logging code

/*
adduser.php

written January 2nd, 2002 by Markus

Function:

	Creates a new user in the 'user' table in the 'etutor' database.

Input Parameters:

	ut - user type:
		'st' for student
		'pr' for prof
		'ta' for ta -- NOTE: the 'ta' account type is now deprecated, do not use it
	un - username
	pw - crypted password
	sn - student number
	fn - first name
	ln - last name
	ci - course ID(s)
	se - section(s)
	em - email address

	Any of these parameters may be arrays; in that case, multiple users will be added.

Output:

	Displays message indicating success or failure.

*/
	
	//check user privileges
	if (!checkadmin() && $user->account != 'pr') {
		msgbox('Error', 'Your account is not set up to access this file.', 'index.php', 'Curses!');
		die();
	}

	// Check if cancel was pushed
	if (isset($cancel)) {
		header('Location: users.php');
	}

	$dbcnx = @mysql_connect('localhost', 'etutor', getPasswd()) or die (mysql_error());
	@mysql_select_db('etutor');

	$num_users = count($un); //determine how many users are being added
	
	$successful = 0; //keep track of how many users were successfully added
	$failed = 0; //keep track of how many users didn't get created
	$skipped = 0; //keep track of how many users were skipped due to incomplete info
	
	$successful_msg = array();
	$failed_msg = array();
	
	/*
	how this works:
	- check if student # exists
		|-> if yes, check if student # is already in course
		|	|-> if yes, don't add to course
		|	|		add message to message buffer
		|	+-> if no, add course ID and section to user's courseID and sections fields
		|		|	but don't change any other user's info
		|		|	add message to message buffer
		|		+-> if user being added is a TA then add * after course ID in courseID field
		+-> if no, add user with all info specified info
			+-> if user being added is a TA then add * after course ID in courseID field
				add message to message buffer
	*/
	
	for ($i = 0; $i < $num_users; $i++) {
		
		if ($ut[$i] == 'pr') { //if a prof is being added
		
			//if this user was left entirely blank
			if ($fn[$i] == '' || $ln[$i] == '' || $un[$i] == '' || $pw[$i] == '') {
				$skipped++; //
				continue; //skip rest of for loop
			}
		
			//check if student number is already in the database
			$s = "SELECT * FROM user WHERE username='" . $un[$i] . "'";
			$result = @mysql_query($s) or die(mysql_error()); //query for users with this username

			if ($row = mysql_fetch_array($result)) { //if any users with this username were found
				$failed_msg[$failed] = "The username '$u->username' has already been taken. Please choose another.";
				$failed++;
			} else { //if no user matching this username was found, then we can add the user
				$u = new User();
				$u->fn = $fn[$i];
				$u->ln = $ln[$i];
				$u->username = $un[$i];
				$u->password = crypt($pw[$i], $u->ln); //crypt password
				$u->email = $em[$i];
				$u->account = 'pr';
				if ($u->save()) { //if user was successfully written to database
					$successful_msg[$successful] = "A professor account for $u->fn $u->ln (username: $u->username) was successfully created.";
					$successful++;
				} else {
					$failed_msg[$failed] = "A professor account for $u->fn $u->ln (username: $u->username) could not be created due to an error.";
					$failed++;
				}
			}
			
		} else { //if student or ta is being added
				//if this user missing vital information
			if ($sn[$i] == '' || $fn[$i] == '' || $ln[$i] == '' || $un[$i] == '' || $pw[$i] == '') {
				$skipped++; //
				continue; //skip rest of for loop
			}

			//if no course codes have been selected for user, then use selectedcourse
			if (empty($ci[$i])) $ci[$i] = $selectedcourse;
			//if no account type was specified, then default to student
			if (empty($ut[$i])) $ut[$i] = 'st';

			$error = 0;

			//check if student number is already in the database
			$s = "SELECT * FROM user WHERE stnum='" . $sn[$i] . "'";
			$result = @mysql_query($s) or die(mysql_error()); //query for users with this username

			if ($row = mysql_fetch_array($result)) { //if any users with this username were found

				$u = new User($row); //create temporary User object
				if ($ut[$i] == 'ta') $isTA = true;
				else $isTA = false;

				if ($u->add_course($ci[$i], $se[$i], $isTA)) { //if course was successfully added
					if ($u->save()) {
						$successful_msg[$successful] = "$u->stnum (username: $u->username) is already registered user, and was successfully added to this course.";
						$successful++;
					} else {
						$failed_msg[$failed] = "$u->stnum (username: $u->username) is already a registered user, but was not added to this course due to an error.";
						$failed++;
					}
				} else {
					$failed_msg[$failed] = "$u->stnum (username: $u->username) is already registered in this course!";
					$failed++;
				}

			} else { //if the user doesn't already exist, then create a new one with all information

				$u = new User();
				$u->stnum = $sn[$i];
				$u->fn = $fn[$i];
				$u->ln = $ln[$i];
				$u->username = $un[$i];
				$u->password = crypt($pw[$i], $u->ln); //crypt password
				$u->email = $em[$i];
				$u->account = 'st';

				if ($ut[$i] == 'ta') $isTA = true;
				else $isTA = false;

				if ($u->add_course($ci[$i], $se[$i], $isTA)) { //if course was successfully added
					if ($u->save()) { //if user was successfully written to database
						$successful_msg[$successful] = "$u->stnum (username: $u->username) was successfully created, and added to this course.";
						$successful++;
					} else {
						$failed_msg[$failed] = "$u->stnum (username: $u->username) could not be created due to an error.";
						$failed++;
					}
				} else {
					$failed_msg[$failed] = "$u->stnum (username: $u->username) is already registered in this course!";
					$failed++;
				}
			}
		}
	}

	//construct a message to show user
	$msg = '';
	$title = '';
	if ($successful == 0) { //if zero users were added
		$title = "No Users Added";
		$msg = "No users were created. The following error(s) occurred:<BR><BR>";
		foreach($failed_msg as $x)
			$msg .= "<LI>$x</LI><BR>";
	} else if ($failed) {
		$title = "Users Added, Some Failed";
		$msg = "Failed to create " . ($failed) . " users.";
		foreach($failed_msg as $x)
			$msg .= "<LI>$x</LI><BR>";
	} else if ($failed == 0) {
		$title = "Users Added";
		$msg = "Successfully added users:<BR><BR>";
		foreach($successful_msg as $x)
			$msg .= "<LI>$x</LI><BR>";
	}
	
	if ($skipped) //if any users were skipped
		$msg .= "<BR>$skipped users were skipped, and hence were not added, because of incomplete information.";
		
	msgbox($title, $msg, 'normal', 'Okay', 'users.php');

	
?>

</BODY>
</HTML>
