<?php
define( 'EMAIL_ADD', 'subodh@jst-technologies.com' );
define( 'PAYPAL_EMAIL_ADD', 'subodh_1338802242_biz@jst-technologies.com' );
require_once('paypal_class.php');
$p = new paypal_class( );
$p->admin_mail = EMAIL_ADD;

switch ($_GET['action']) {
	default:
		$curPageURL = 'http://www.coursespree.com/includes/paypal_ipn_class/paypal.php';
		$sign = '?';
		
		$p->add_field('business', PAYPAL_EMAIL_ADD);
		$p->add_field('return', $curPageURL.$sign.'action=success');
		$p->add_field('cancel_return', $curPageURL.$sign.'action=cancel');
		$p->add_field('notify_url', $curPageURL.$sign.'action=ipn');
		$p->add_field('cmd', '_cart');
		$p->add_field('upload','1');
		$p->add_field('rm', '2');
		$p->add_field('currency_code','USD');
		$p->add_field('no_shipping','1');
		$p->add_field('no_shipping','1');
		$p->add_field('custom', $orderID);

		/************** Mltiproducts **********/
		$p->add_field('item_name_1', "test title");
		$p->add_field('amount_1', "10.00");
		$p->add_field('quantity_1', "1");
		
		$p->add_field('item_name_2', "test title");
		$p->add_field('amount_2', "10.00");
		$p->add_field('quantity_2', "1");
		/************** Mltiproducts **********/
					
		$p->submit_paypal_post();
		$p->dump_fields();
		break;

	case 'success':
		echo "<pre>";
		print_r($_POST);
		break;

	case 'cancel':
		header('Location: index.php');
		exit;
		break;

	case 'ipn':
		if ($p->validate_ipn()) {
			$subject = 'Instant Payment Notification - Recieved Payment';
			$p->send_report ( $subject );
		} else {
			$subject = 'Instant Payment Notification - Payment Fail';
			$p->send_report ( $subject );
		}
		break;
}
?>
