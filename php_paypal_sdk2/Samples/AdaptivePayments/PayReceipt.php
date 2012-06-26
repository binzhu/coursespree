<?php


/********************************************
 PayReceipt.php

 This file is called after the user clicks on a button during
 the Pay process to use PayPal's AdaptivePayments Pay features'. The
 user logs in to their PayPal account.
 Called by SetPay.php
 Calls  CallerService.php,and APIError.php.
 ********************************************/

require_once '../../Lib/Config/Config.php';
require_once '../../Lib/CallerService.php';
require_once '../Common/NVP_SampleConstants.php';
session_start();


print_r($_REQUEST);
try {

	$owner_id = $_REQUEST['owner_id'];
	$doc_id = $_REQUEST['doc_id'];
	$buyer_id = $_REQUEST['buyer_id'];
	$access_key = $_REQUEST['access_key'];
	$public_doc_id = $_REQUEST['public_doc_id']; 
	
	$additionals = "?owner_id="."$owner_id"."&doc_id="."$doc_id"."&buyer_id="."$buyer_id"."&access_key="."$access_key"."&public_doc_id="."$public_doc_id";
	
	$serverName = $_SERVER['SERVER_NAME'];
	$serverPort = $_SERVER['SERVER_PORT'];
	$url=dirname('http://'.$serverName.':'.$serverPort.$_SERVER['REQUEST_URI']);
	$returnURL = $url."/../Common/WebflowReturnPage.php".$additionals;
	$cancelURL = $url. "/Pay.php" ;
	$preapprovalKey=$_REQUEST["preapprovalkey"];
	$senderEmail  = $_REQUEST["email"];
	$request_array= array(
	Pay::$actionType => $_REQUEST['actionType'],
	Pay::$cancelUrl  => $cancelURL,
	Pay::$returnUrl=>   $returnURL,
	Pay::$currencyCode  => $_REQUEST['currencyCode'],

	Pay::$clientDetails_deviceId  => DEVICE_ID,
	Pay::$clientDetails_ipAddress  => '127.0.0.1',
	Pay::$clientDetails_applicationId =>APPLICATION_ID,
	RequestEnvelope::$requestEnvelopeErrorLanguage => 'en_US',
	Pay::$memo => $_REQUEST["memo"],
	Pay::$feesPayer => $_REQUEST["feesPayer"]

	);

	if(isset($_REQUEST['receiverEmail']))
	{
		$i = 0;
		$j = 0;
		$k = 0;

		//foreach ($_REQUEST['receiverEmail'] as $value)
//		{
//				
//			$request_array[Pay::$receiverEmail[$i]] = $value;
//			$i++;
//				
//		}
		 	$email1 = $_REQUEST['receiverEmail'];
			$email2 = "bscs06_1338473343_per@gmail.com";
			$request_array[Pay::$receiverEmail[0]] = $email1;
			$request_array[Pay::$receiverEmail[1]] = $email2;
			 
		 
		//foreach ($_REQUEST['receiverAmount'] as $value)
//		{
//				
//			$request_array[Pay::$receiverAmount[$j]] = $value;
//			$j++;
//				
//		}

	 
			$amount1 = $_REQUEST['receiverAmount'];
			$amount2 = 2;	
			$request_array[Pay::$receiverAmount[0]] = $amount1;
			$request_array[Pay::$receiverAmount[1]] = $amount2;
			 
				
		 

		//foreach ($_REQUEST['primaryReceiver'] as $value)
//		{
//				
//			$request_array[Pay::$primaryReceiver[$k]] = $value;
//			$k++;
//				
//		}
			
			$primaryReceiver = "false";
			$request_array[Pay::$primaryReceiver[0]] = $primaryReceiver;
			$request_array[Pay::$primaryReceiver[1]] = $primaryReceiver;

	}

	if($preapprovalKey!= "")
	{
		$request_array[Pay::$preapprovalKey] = $preapprovalKey;
	}
	if($senderEmail!= "")
	{
		$request_array[Pay::$senderEmail]  = $senderEmail;
	}

	$nvpStr=http_build_query($request_array, '', '&');

	/* Make the call to PayPal to get the Pay token
	 If the API call succeded, then redirect the buyer to PayPal
	 to begin to authorize payment.  If an error occured, show the
	 resulting errors
	 */

	$resArray=hash_call('AdaptivePayments/Pay',$nvpStr);




	/* Display the API response back to the browser.
	 If the response from PayPal was a success, display the response parameters'
	 If the response was an error, display the errors received using APIError.php.
	 */
	$ack = strtoupper($resArray['responseEnvelope.ack']);

	if($ack!="SUCCESS"){
		$_SESSION['reshash']=$resArray;
		$location = "APIError.php";
		header("Location: $location");
	}
	else
	{
		$_SESSION['payKey'] = $resArray['payKey'];
		$payKey=$resArray['payKey'];
		if(($resArray['paymentExecStatus'] == "COMPLETED" ))
		{
			$case ="1";
		}
		else if(($_REQUEST['actionType']== "PAY") && ($resArray['paymentExecStatus'] == "CREATED" ))
		{
			$case ="2";
				
		}
		else if(($preapprovalKey!=null ) && ($_REQUEST['actionType']== "CREATE") && ($resArray['paymentExecStatus'] == "CREATED" ))
		{
			$case ="3";
		}
		else if(($_REQUEST['actionType']== "PAY_PRIMARY"))
		{
			$case ="4";
				
		}
		else if(($_REQUEST['actionType']== "CREATE") && ($resArray['paymentExecStatus'] == "CREATED" ))
		{
			$temp1=API_USERNAME;
			$temp2=str_replace('_api1.','@',$temp1);
			if($temp2==$_REQUEST["email"])
			{
				$case ="3";
			}
			else{
				$case ="2";
			}
		}
	}
}
catch(Exception $ex) {
	throw new Exception('Error occurred in PayReceipt method');
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">


 



 
<?php 
require_once('../../../includes/functions.php'); 
 
?>
<script type="text/javascript">
 
</script>
<style type="text/css">
.container {
	border-color: red;
	height: auto;
	width: 665px;
	margin-top: 21px;
}
.singlecontainer {
	background: none repeat scroll 0 0 gray;
	border-radius: 5px 5px 5px 5px;
	float: left;
	height: 160px;
	margin-left: 5px;
	margin-top: 5px;
	padding: 4px;
	width: 312px;
}
.thumb {
	border-radius: 5px 5px 5px 5px;
	float: left;
	height: 142px;
	margin: 9px 4px 2px;
	width: 111px;
}
.textt {
	color: #FFFFFF;
	float: left;
	font-family: cursive, Geneva, sans-serif;
	font-size: 19px;
	font-style: normal;
	margin-left: 3px;
	margin-top: 6px;
	padding: 0;
	width: 150px;
}
.thumbs {
	border-radius: 3px 3px 3px 3px;
}
.desc {
	color: #FFFFFF;
	float: left;
	font-size: 14px;
	margin-left: 4px;
	margin-top: 3px;
	width: 176px;
}
.status {
	color: #FFFFFF;
	float: left;
	font-size: 14px;
	margin-left: 4px;
	margin-right: 5px;
	margin-top: -4px;
	width: 176px;
}
.btn {
	background: none repeat scroll 0 0 buttonshadow;
	border-radius: 4px 4px 4px 4px;
	float: right;
	height: 21px;
	margin-right: 7px;
	margin-top: 17px;
	width: 50px;
}
.view {
	color: white;
	float: right;
	margin-right: 10px;
	margin-top: 2px;
	text-decoration: none;
}
.cost {
	float: right;
	margin-right: 24px;
	width: 10px;
}
.price {
	color: #FF0000;
	font-size: 22px;
	margin-right: 15px;
	margin-top: 12px;
}
</style>

<?php
if(!isUserLoggedin()) {
	header('Location: register.php?type=login');
	exit;
}
 
?>

<div class="inner">
	<div id="body_cont">
		<div id="body">
			<?php require_once '../../../templates/nav-user.php'; ?>
			<div id="profile">
				<div class="white_box">
				
						<?php require_once '../../../templates/sidebar-user.php'; ?>
				
						<div class="userDashboardRight">
							 
								
								
								<?php show_msgs(); ?>
						 
                         <div id="request_form">

<center>
	<h3><b>Pay - Response</b></h3>


	<?php
	require_once 'ShowAllResponse.php';
	switch($case) {
		case "2" :
			$token = $resArray['payKey'];
			$payPalURL = PAYPAL_REDIRECT_URL.'_ap-payment&paykey='.$token;
			echo" <a href=$payPalURL><b>* Redirect URL to Complete Payment </b></a><br>";
			break;
		case "3" :
			$token = $resArray['payKey'];
			$payPalURL = PAYPAL_REDIRECT_URL.'_ap-payment&paykey='.$token;
			echo" <a href=$payPalURL><b>* Redirect URL to Complete Payment </b></a><br>";
			echo"<a href=SetPaymentOption.php?payKey=$payKey><b>* Set Payment Options(optional)</b></a><br>";
			echo"<a href=ExecutePaymentOption.php?payKey=$payKey><b>* Execute Payment Options</b></a><br>";

			break;
		case "4" :
			$token = $resArray['payKey'];
			$payPalURL = PAYPAL_REDIRECT_URL.'_ap-payment&paykey='.$token;
			echo"Payment to \"Primary Receiver\" is Complete<br/>";
			echo"<a href=ExecutePaymentOption.php?payKey=$payKey><b>* \"Execute Payment\" to pay to the secondary receivers</b></a><br>";
			break;

	}
	?>
</center>
</div>
                         
					
				</div>
                <div class="clear"></div>
			</div>
		</div>
	</div>
</div>
 
<?php require_once '../../../templates/footer.php'; ?>
  
