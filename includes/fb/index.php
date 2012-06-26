<?php
require '../config.php';
require 'src/facebook.php';

$facebook = new Facebook(array(
	'appId'  => FB_APP_ID,
	'secret' => FB_APP_SECRET_KEY,
));

$user = $facebook->getUser();
if ($user) {
	try {
		$user_profile = $facebook->api('/me');
	} catch (FacebookApiException $e) {
		error_log($e);
		$user = null;
	}
}
?>
<!doctype html>
<html xmlns:fb="http://www.facebook.com/2008/fbml">
<body>
<?php
if($user) {
	$fb_ID = $user_profile['id'];
	$name = $user_profile['name'];
	$fName = $user_profile['first_name'];
	$lName = $user_profile['last_name'];
	
	$userName = $user_profile['username'];
	$userName = 'fb_'.$userName;
	
	$email = $user_profile['email'];
	$email = 'fb_'.$email;
	
	$gender = $user_profile['gender'];
	if($gender == 'female') {
		$gender = 'f';
	} else {
		$gender = 'm';
	}	
	$type = 'fb';
	$dated = date('Y-m-d H:i:s');
	
	$sql = "SELECT * FROM `".DB_PREFIX."users` WHERE fb_ID='$fb_ID' LIMIT 0,1";
	$data = get_row($sql);
	
	if(!empty($data)) {
		//$sql = "UPDATE `".DB_PREFIX."users` SET fName='$fName', lName='$lName', email='$email', userName='$userName', gender='$gender' WHERE id='{$data->id}'";
		////$res = mysql_query($sql);
		$userID = $data->id;
	} else {
		$sql = "INSERT INTO `".DB_PREFIX."users` SET fb_ID='$fb_ID', fName='$fName', lName='$lName', email='$email', userName='$userName', gender='$gender', type='$type', active='1', dated='$dated'";
		$res = mysql_query($sql);
		$userID = mysql_insert_id();
	}
	
	logmeinByID($userID);
	echo '<script>window.opener.location.href = "'.SITE_URL.'"; window.close();</script>';
	
	if($res) {
		$userID = mysql_insert_id();
	}
} else {
	$loginUrl = $facebook->getLoginUrl(array('scope' => 'email'));
	echo '<script>window.location.href="'.$loginUrl.'";</script>';
	exit;
}
?>
</body>
</html>
