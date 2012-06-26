<?php
// e-Tutor is licensed under the GPL. Please see the LICENSE file for more
// information.

/*
logout.php

Logs out current user, clears session variables
written 21st Feb. 2002 by Markus

*/

require('include.php');

//clear all session variables
session_unset();

//show user message that he/she has been logged out
msgbox('Logged Out', 'You have been logged out of the e-Tutor system.', 'normal', 'Okay', './');

?>
