<?php
define('DB_HOST', '127.0.0.1');
//define('DB_HOST', 'localhost');
//define('DB_USER', 'coursespree');
//define('DB_PASS', 'Course@123');

define('DB_USER', 'root');
define('DB_PASS', 'coursespree');

$con = mysql_connect(DB_HOST, DB_USER, DB_PASS);
//if($con){
//	echo "database connected";
//	}else{
//		echo "not connected.....";
//		}
mysql_select_db('coursespree', $con);

define('DB_PREFIX', 'cs_');
?>
