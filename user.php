<?php
$type = $_GET['type'];
switch($type) {
	case 'myaccount':
		require_once 'user/profile/myaccount.php';
		break;
		
	case 'sell':
		require_once 'user/profile/sell.php';
		break;
		
	case 'profile':
		require_once 'user/profile/profile.php';
		break;
		
	case 'mydocs':
		require_once 'user/profile/mydocs.php';
		break;
		
	case 'purchases':
		require_once 'user/profile/purchases.php';
		break;
		
	case 'mypurchases':
		require_once 'user/profile/mypurchases.php';
		break;
		
	case 'questions':
		require_once 'user/questions/main.php';
		break;
		
	case 'answers':
		require_once 'user/questions/main.php';
		break;
	
	case 'payment':
		require_once 'user/questions/payment.php';
		break;
		
	case 'subscriber':
		require_once 'user/profile/subscriber.php';
		break;
		
	case 'subscribed':
		require_once 'user/profile/subscribed.php';
		break;
		
	default:
		require_once 'user/profile/profile.php';
		break;
}
?>
