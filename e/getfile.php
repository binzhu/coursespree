<?php
// e-Tutor is licensed under the GPL. Please see the LICENSE file for more
// information.

require "include.php";

// Verify Logged In
if (!$loggedin && !checkAdmin()) {
	die ("Not logged in!</BODY></HTML>");
}

if (isset($fid)) {
	$result = @mysql_query("SELECT courseID,section,stnum FROM files WHERE ID='$fid'") or die (mysql_error());
}
else {
	$result = @mysql_query("SELECT courseID,section FROM assignments WHERE ID='$aid'") or die (mysql_error());
}
$ainfo = mysql_fetch_array($result);
global $user;
$courseobject = $user->get_course_by_id($ainfo['courseID']);
if ((!$courseobject->isTA) || ($courseobject->section != $ainfo['section'])) { // TA CHECK
	if (!checkAdmin() && ($user->stnum != $ainfo['stnum'])) { // ADMIN and STUDENT CHECK
		die ("You're not allowed to get this file.</BODY></HTML>");
	}
}
// End User Check

// Check if fid is set; if yes, then a single file is selected. Otherwise,
// aid indicates assignment to zip and send.
if (isset($fid)) {
	$write = mysql_query("SELECT stnum,filename,mimetype,data FROM files WHERE ID=$fid");
	$row = mysql_fetch_array($write);

	Header('Content-type: ' . $row['mimetype']);
	Header("Content-Disposition: inline; filename=" . $row['stnum'] . '-' . $row['filename']);

	print $row["data"];
}
else {
	// This means we will need to zip and send a whole assignment.

	// No students allowed here
	if (($user->account == 'st') && (!$courseobject->isTA)) {
		die ("User's can't download assignments. Keep hacking...</BODY></HTML>");
	}

	// Get the assignment title
	$result = mysql_query("SELECT name FROM assignments WHERE ID=$aid") or die(mysql_error());
	$atitle = mysql_fetch_array($result);

	Header("Content-type: application/x-zip-compressed");
	Header("Content-Disposition: inline; filename=" . $atitle['name'] . ".zip");

	// Make a random filename for the temporary zip file with prefix 'et'
	$tempfile = tempnam('/tmp', 'et');

	$result = mysql_query("SELECT stnum,filename,data FROM files WHERE assignmentID=$aid");

	while ($row = mysql_fetch_array($result)) {
		$userfile = $row['stnum'] . '-' . addslashes($row['filename']);

		// Write the current file
		$curfile = fopen("/tmp/$userfile", "wb");
		fwrite($curfile, $row['data']);
		fclose ($curfile);

		// Add it to the zip
		exec("cd /tmp;zip $tempfile $userfile");

		// Delete it
		unlink("/tmp/$userfile");
	}

	// Send the zip file
	$fp = fopen("$tempfile.zip", "rb");
	while(!feof($fp)) {
		$buffer = fread($fp, 4096);
		print $buffer;
	}
	fclose($fp);

	// Delete the zip file
	unlink($tempfile);
	unlink("$tempfile.zip");
}

?>
