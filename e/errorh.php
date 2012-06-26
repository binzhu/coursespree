<?php
// e-Tutor is licensed under the GPL. Please see the LICENSE file for more
// information.

/*
errorh.php
Simple error logging routines
written January 5th, 2002 by Markus

Dependency: requires some routines from include.php
*/

$et_error = array(); //array to store error messages


/*
error()
Logs an error message in $et_error array.

Input:
	$error_text - error message to log
	
Output:
	number of error messages logged, including the one just logged
*/
function log_error($error_text) {
	global $et_error; //declare $et_error so that we can use it inside the function
	$et_error[count($et_error)] = $error_text;
	return count($et_error);
}


/*
are_errors()
Returns number of error messages in $et_error array.
*/
function are_errors() {
	return count($et_error);
}


/*
format_errors()
Returns an HTML-formatted string of error messages.
*/
function format_errors() {
	global $et_error; //access global variable
	$t = ''; //temp variable
	for ($i = 0; $i < count($et_error); $i++) //for every error logged
		if ($i == count($et_error) - 1) //if it's the last error in the list
			$t .= "<LI>" . $et_error[$i] . "</LI>\n"; //don't add a <BR> tag at the end
		else $t .= "<LI>" . $et_error[$i] . "</LI><BR>\n"; //otherwise add <BR> tag
	return $t;
}


/*
error_msg()
If any errors were logged, error_msg() displays a message with a list of logged errors, and returns
true. If no errors were logged, error_msg() displays nothing and returns false. See adduser.php
for example of use.

Input:
	(optional) 1st argument can be additional text to display in error message, after list of errors

*/
function error_msg() {
	global $et_error; //access global variable
	if (count($et_error)) {
		if (func_num_args()) //see if any arguments were passed
			$t = func_get_arg(0); //if yes then get first argument
		//error message text
		$m = "The following error(s) occurred:<BR><BR>" . format_errors();	
		if ($t) $m .= "<BR><BR>$t"; 
		msgbox("Oh No!", $m, 'error', 'Shoot Me', '');
		return true;
	} else return false;
}

?>

