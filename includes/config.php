<?php
session_start();
ini_set('display_errors','0');

define('SITE_TITLE', 'Course Spree');
define('SITE_URL', 'http://www.coursespree.com/');
define('ADMIN_EMAIL', 'subodh@jst-technologies.com');

define('FB_APP_ID', '149275945201648');
define('FB_APP_SECRET_KEY', 'c83aa406ae082248387170edf2c65a9e');

require_once 'db.php';
require_once 'functions.php';
require_once 'simplepie.inc';

if(isUserLoggedin()) {
	$user = getLoggedUser();
}

define('DEFAULT_COUNTRY', 'United States');
define('CP_PAYMENT_FEE_PERCENTAGE', '20');
?>
