<?php
// e-Tutor is licensed under the GPL. Please see the LICENSE file for more
// information.

/*
submit.php

written February 10th, 2002 by Pat

Script:

	Gets lists of files in an assignment.
	Gives option to batch download them.
*/

	session_start();
 	session_register("loggedin", "id");
	
	require("include.php");
	doc_start('e-tutor Assignment Files');
	
	if (!$loggedin && !checkadmin()) {
		die ("Not logged in!</BODY></HTML>");
	}
	
	if (!isset($orderby)) {
		$orderby = "stnum";
	}
	
	$result = @mysql_query("SELECT name,duedate,date_format(duedate, '%Y%m%d%H%i%S'),courseID,section FROM assignments WHERE ID='$aid'") or die (mysql_error());
	$ainfo = mysql_fetch_array($result);
	
	global $user;
	
	$courseobject = $user->get_course_by_id($ainfo['courseID']);
	if ((!$courseobject->isTA || $courseobject->section != $ainfo['section']) && !checkadmin()) {
		die ("You're not a TA for this course.</BODY></HTML>");
	}
	
	center_start();
	box_start("Assignment: " . $ainfo['name'], 600);
		
	print "The due date for this assignment is: <B>" . $ainfo['duedate'] . "</B><BR>\nLate submissions are marked in <FONT COLOR='red'>red</FONT>.<BR><BR>\n";
	
	$result = @mysql_query("SELECT *,date_format(date, '%Y-%m-%d %T') FROM files WHERE assignmentID='$aid' ORDER BY $orderby") or die (mysql_error());
	
	if (shell_exec('zip') == '') {
		print "Batch downloading of assignment not available ('zip' not found).<BR><BR>\n";
	}
	elseif (mysql_num_rows($result) > 0) {
		print "<A HREF='getfile.php?aid=$aid'>Get whole assignment</A><BR><BR>\n";
	}
	
	while ( $row = mysql_fetch_array($result) ) {
		$nameresult = @mysql_query("SELECT fn,ln FROM user WHERE stnum='" . $row['stnum'] . "'") or die (mysql_error());
		$namefield = mysql_fetch_array($nameresult);
		
		if ($row['date'] > $ainfo['date_format(duedate, \'%Y%m%d%H%i%S\')']) {
			$classtd = ' class="late"';
		}
		else {
			$classtd = '';
		}
		
		$fieldlen = mysql_fetch_lengths($result);
		$table .= "<TR><TD$classtd>" . $row['stnum'] . "</TD><TD$classtd>" . $namefield['ln'] . ', ' . $namefield['fn'] . "</TD><TD$classtd>" . $row['date_format(date, \'%Y-%m-%d %T\')'] . "</TD><TD$classtd><A HREF='getfile.php?fid=" . $row['ID'] ."'>" . $row['filename'] . "</A></TD><TD$classtd>" . number_format(($fieldlen[8] / 1024), 1) . "K</TD></TR>\n";
	}
	if (mysql_num_rows($result) > 0) {
		print "<TABLE cellspacing=0 cellpadding=0 border=0><TR><TD bgcolor=#A0A0A0>\n";
		print "<TABLE CELLSPACING='1' BORDER=0><TR><TD class='header'><A HREF='$PHP_SELF?aid=$aid?orderby=stnum'>Student Number</A></TD><TD class='header'>Name</TD><TD class='header'><A HREF='$PHP_SELF?aid=$aid?orderby=date'>Submission Time</A></TD><TD class='header'><A HREF='$PHP_SELF?aid=$aid?orderby=filename'>Filename</A></TD><TD class='header'>Size</TD></TR>\n";
		print $table;
		print "</TABLE></TD></TR></TABLE><BR>\n";
		print "<FONT SIZE='-2'>Note: Clicking column headers will sort by that column, ascending.</FONT><BR>\n";
	}
	else {
		print "<I>No files have been uploaded.</I>\n";
	}
	box_end();
	
?>

<BR><BR>
<A HREF="./">Return to Menu</A></CENTER>
</BODY></HTML>
<?php center_end()?>