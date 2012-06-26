<?php
require_once('includes/config.php');
require_once('includes/paypal_ipn_class/paypal_class.php');

$admin = getAdmin();
$p = new paypal_class( );
$p->admin_mail = $admin->email;


if(isset($_GET['nID']) && $_GET['nID'] > 0) {
	$nID = $_GET['nID'];
	$docInfo = get_doc($nID);
	if(!empty($docInfo) && $docInfo->userID > 0) {
		$doc = $docInfo->doc;
		if(stripslashes(trim($docName)) == '') {
			$docName = get_doc_name($doc);
		}

		$actualPrice = $docInfo->price;
		
		$cp_fee_percentage = $docInfo->cp_fee_percentage;
		if($cp_fee_percentage > 0) {
			$cp_fee  = $actualPrice * $cp_fee_percentage / 100;
		}
		$price = $actualPrice + $cp_fee;
		$price = number_format($price, 2, '.', '');
		$products = array();
		$count = 1;
		if($price > 0) {
			$products[$count]['title'] = "$docName";
			$products[$count]['price'] = "$price";
		}
	}
} else if(isset($_GET['aID']) && trim($_GET['aID']) != '') {
	$aIDs = $_GET['aID'];
	$qID = $_GET['qID'];
	$userID = $_SESSION['userID'];
	
	$newAnsIDs = validateQuesUserRel($qID, $aIDs, $userID);
	$newAnsIDsArr = explode(',', $newAnsIDs);
	if(!empty($newAnsIDsArr)) {
		foreach($newAnsIDsArr as $k=>$newAnsID) {
			if($newAnsID < 1) {
				unset($newAnsIDsArr[$k]);
			}
		}
	}
	
	if(isError() || empty($newAnsIDsArr)) {
		header('Location: questions.php?id='.$qID);
		exit;
	}
	
	
	$question = getQuestion($qID);
	$actualPrice = stripslashes($question->price);
	
	$cp_fee_percentage = stripslashes($question->cp_fee_percentage);
	if($cp_fee_percentage > 0) {
		$cp_fee  = $actualPrice * $cp_fee_percentage / 100;
	}
	$price = ($actualPrice + $cp_fee) * sizeof($newAnsIDsArr);
	$price = number_format($price, 2, '.', '');
	$products = array();
	$count = 1;
	if($price > 0) {
		$products[$count]['title'] = "Approved Answers";
		$products[$count]['price'] = "$price";
	}
}

switch ($_GET['action']) {
	default:
		if(!empty($products)) {
			$curPageURL = curPageURL();
			$sign = getSign($curPageURL);

			define( 'EMAIL_ADD', "{$admin->email}" );
			define( 'PAYPAL_EMAIL_ADD', "{$admin->paypalEmail}" );

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

			/************** Mltiproducts **********/
			foreach($products as $k=>$product) {
				$p->add_field('item_name_'.$k, "{$product['title']}");
				$p->add_field('amount_'.$k, "{$product['price']}");
				$p->add_field('quantity_'.$k, "1");
			}
			/************** Mltiproducts **********/
			
			$p->submit_paypal_post();
			$p->dump_fields();
		}
		break;

	case 'success':
		$massPayment = 0;
		$purchaseID = '';
		if(!empty($_POST) && isset($_POST['mc_gross'])) {
			$transaction = serialize($_POST);			
			$dated = date('Y-m-d H:i:s');
			
			if(isset($_GET['nID']) && $_GET['nID'] > 0) {
				$nID = $_GET['nID'];
				$userID = $docInfo->userID;
				$userDet = getUser($userID);
				$sql = "INSERT INTO `".DB_PREFIX."purchases` SET userID='{$_SESSION['userID']}', toUserID='{$userDet->id}', itemID='$nID', price='{$_POST['mc_gross']}', paypal_charges='{$_POST['mc_fee']}', cp_fee='$cp_fee', transaction='$transaction', itemType='notice', active='0', dated='$dated'";
				$res = mysql_query($sql);
				if($res) {
					$purchaseID .= mysql_insert_id();
					$purchaseID = $purchaseID.",";
					
					/********** Mass Payment Fields ********/
					$emailSubject =urlencode('Coursespree Notices - payment notification');
					//$receiverType = urlencode("{$userDet->paypalEmail}");
					
					$receiverData = array(	
						'receiverEmail' => "{$userDet->paypalEmail}",
						'amount' => "$actualPrice",
						'uniqueID' => rand(100,100000),
						'note' => "$emailSubject"
					);
					$receiversArray[0] = $receiverData;				
					$massPayment = 1;
					/********** Mass Payment Fields ********/
					
				} else {
					//echo 'Sorry! There is some issue when trying to store in db';
				}
			} else if(isset($_GET['aID']) && trim($_GET['aID']) != '') {
				$aID = $_GET['aID'];
				$transaction = '';
				$purchaseID = '';
				
				$perHeadPaypalPrice = $_POST['mc_gross']/sizeof($newAnsIDsArr);
				$perHeadPaypalPrice = number_format($perHeadPaypalPrice, 2, '.', '');
				
				$perHeadPaypalFee = $_POST['mc_fee']/sizeof($newAnsIDsArr);
				$perHeadPaypalFee = number_format($perHeadPaypalFee, 2, '.', '');
				
				$cp_fee = $cp_fee/sizeof($newAnsIDsArr);
				$cp_fee = number_format($cp_fee, 2, '.', '');

				
				if(!empty($_POST) && isset($_POST['mc_gross'])) {
					$transaction = serialize($_POST);			
					$dated = date('Y-m-d H:i:s');
				}
				
				/********** Mass Payment Fields ********/
				$emailSubject =urlencode('Coursespree Answer Approved - payment notification');
				//$receiverType = urlencode("{$userDet->paypalEmail}");
				
				$receiversArray = array();
				$i = 0;
				foreach($newAnsIDsArr as $newAnsID) {
					$answer = getAnswer($newAnsID);
					$userPaypalEmail = trim(stripslashes($answer->userPaypalEmail));
					if($userPaypalEmail != '') {
						if($transaction != '') {
							$sql = "INSERT INTO `".DB_PREFIX."purchases` SET userID='{$_SESSION['userID']}', toUserID='{$answer->userID}', itemID='$aID', price='$perHeadPaypalPrice', paypal_charges='$perHeadPaypalFee', cp_fee='$cp_fee', transaction='$transaction', itemType='question', active='0', dated='$dated'";
							$res = mysql_query($sql);
							if($res) {
								$purchaseID .= mysql_insert_id();
								$purchaseID = $purchaseID.",";
								
								$receiverData = array(	
									'receiverEmail' => "$userPaypalEmail",
									'amount' => "$actualPrice",
									'uniqueID' => rand(100,100000),
									'note' => "$emailSubject"
								);
								$receiversArray[$i] = $receiverData;
								$i = $i + 1;
							}
						}
					}
				}			
				$massPayment = 1;
				/********** Mass Payment Fields ********/
				
			}
		}
		
		if($massPayment) {
			/***************** Mass Payment to receivers *****************/
				// Set request-specific fields.
				$currency = urlencode('USD'); // or other currency ('GBP', 'EUR', 'JPY', 'CAD', 'AUD')

				// Add request-specific fields to the request string.
				//$nvpStr="&EMAILSUBJECT=$emailSubject&RECEIVERTYPE=$receiverType&CURRENCYCODE=$currency";
				$nvpStr="&EMAILSUBJECT=$emailSubject&CURRENCYCODE=$currency";
				
				if(!empty($receiversArray)) {
					foreach($receiversArray as $i => $receiverData) {
						$receiverEmail = urlencode($receiverData['receiverEmail']);
						$amount = urlencode($receiverData['amount']);
						$uniqueID = urlencode($receiverData['uniqueID']);
						$note = urlencode($receiverData['note']);
						$nvpStr .= "&L_EMAIL$i=$receiverEmail&L_Amt$i=$amount&L_UNIQUEID$i=$uniqueID&L_NOTE$i=$note";
					}

					// Execute the API operation; see the PPHttpPost function above.
					$httpParsedResponseAr = $p->PPHttpPost('MassPay', $nvpStr);

					if("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"])) {
						if(isset($_GET['nID']) && $_GET['nID'] > 0) {
							$purchaseID = substr($purchaseID, 0, -1);
							$sql = "UPDATE `".DB_PREFIX."purchases` SET active='1' WHERE id IN ($purchaseID)";
							$res = mysql_query($sql);
							if($res) {
								header('Location: user.php?type=mypurchases');
								exit;
							}
						} else if(isset($_GET['aID']) && trim($_GET['aID']) != '') {
							$purchaseID = substr($purchaseID, 0, -1);
							$sql = "UPDATE `".DB_PREFIX."purchases` SET active='1' WHERE id IN ($purchaseID)";
							$res = mysql_query($sql);
							
							/**** Set Question status as "closed" ****/
							$sql = "UPDATE `".DB_PREFIX."questions` SET status='closed' WHERE id='$qID'";
							$res = mysql_query($sql);
			
							/**** Set answers status as "approved" ****/
							if(!empty($newAnsIDsArr)) {
								$newAnsIDs = '';
								foreach($newAnsIDsArr as $newAnsID) {
									if($newAnsID > 0) {
										$newAnsIDs .= $newAnsID.',';
									}
								}
								if($newAnsIDs != '') {
									$newAnsIDs = substr($newAnsIDs, 0, -1);
									$sql = "UPDATE `".DB_PREFIX."question_answers` SET status='approved' WHERE id IN($newAnsIDs)";
									$res = mysql_query($sql);
									
									header('Location: questions.php?id='.$qID);
									exit;
								}
							}
						}
					} else  {
						pr($httpParsedResponseAr);
					}
				}
			/***************** Mass Payment to receivers *****************/
		}
		
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
