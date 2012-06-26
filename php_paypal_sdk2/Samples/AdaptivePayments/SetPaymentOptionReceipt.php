<?php

/********************************************
 SetPaymentOptionReceipt.php

 This file is called after the user clicks on a button during
 the Pay process to use PayPal's AdaptivePayments Pay features'. The
 user logs in to their PayPal account.
 Called by SetPaymentOption.php
 Calls  CallerService.php,and APIError.php.
 ********************************************/

require_once '../../Lib/Config/Config.php';
require_once '../../Lib/CallerService.php';
require_once '../Common/NVP_SampleConstants.php';
session_start();

try {

		$request_array= array(
			
			SetPaymentOption::$payKey => $_REQUEST["payKey"],
		    RequestEnvelope::$requestEnvelopeErrorLanguage => 'en_US'
			);
			if($_REQUEST['headerImage'])
			{
				$request_array[SetPaymentOption::$displayOptions_emailHeaderImageUrl] =  $_REQUEST['headerImage'];
			}
			if($_REQUEST['marketingImage'])
			{
				$request_array[SetPaymentOption::$displayOptions_emailMarketingImageUrl] =  $_REQUEST['marketingImage'];
			}
					
	$nvpStr=http_build_query($request_array, '', '&');
	$resArray=hash_call('AdaptivePayments/SetPaymentOptions',$nvpStr); 

	
		
	/* Make the call to PayPal to get the Pay token
	 If the API call succeded, then redirect the buyer to PayPal
	 to begin to authorize payment.  If an error occured, show the
	 resulting errors
	 */
	
         
		$ack = strtoupper($resArray['responseEnvelope.ack']);

	if($ack!="SUCCESS"){
		$_SESSION['reshash']=$resArray;
		$location = "APIError.php";
		header("Location: $location");
			}
		}
		catch(Exception $ex) {
			
		throw new Exception('Error occurred in PaymentDetails method');
		}
	
				?>
				<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
				
<html>
<head>

<title>PayPal Platform SDK - Set Payment Option</title>
<link href="../Common/style.css" rel="stylesheet" type="text/css" />
</head>
<body >
	 <br/>
        <div id="jive-wrapper">
            <div id="jive-header">
                <div id="logo">
                    <span >You must be Logged in to <a href="<?php echo DEVELOPER_PORTAL;?>" target="_blank">PayPal sandbox</a></span>
                    <a title="Paypal X Home" href="#"><div id="titlex"></div></a>
                </div>
            </div>

		<?php 
require_once '../Common/menu.html';?>
<div id="request_form">

<center><h3>Set Payment Options - Response</h3>
<br />


<table align="center">
	 <?php 
   		 	require_once 'ShowAllResponse.php';
   		 	$payKey=$_REQUEST["payKey"];
   		 	echo"<a href=ExecutePaymentOption.php?payKey=$payKey><b>* Execute Payment Options</b></a><br>";
   		 ?>
</table>
<br />

</center>

</div>
</div>
</body>
</html>

			