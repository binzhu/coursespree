<?php

/********************************************
RefundReceipt.php
Displays refund status after calling Refund API
Called by Refund.php
Calls  AdaptivePayments.php,and APIError.php.
********************************************/

require_once '../../Lib/Config/Config.php';
require_once '../../Lib/CallerService.php';
require_once '../Common/NVP_SampleConstants.php';
session_start();
		try {

			
			$request_array= array(
			Refund::$currencyCode => $_REQUEST["currencyCode"],
			Refund::$payKey  => $_REQUEST["payKey"],
			Refund::$receiverList_receiver_0_amount => $_REQUEST["amount"],
			Refund::$receiverList_receiver_0_email => $_REQUEST["receiveremail"],
			RequestEnvelope::$requestEnvelopeErrorLanguage => 'en_US'
			);
			
	$nvpStr=http_build_query($request_array, '', '&');
	$resArray=hash_call('AdaptivePayments/Refund',$nvpStr);
			
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
    <title>PayPal PHP SDK - AdaptivePayments Refund</title>
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
    <center>
     <h3><b>Refund details!</b></h3><br/><br/>
    </center>
    <table align="center">
       <?php 
   		 	require_once 'ShowAllResponse.php';
   		 ?>
    </table>
</div>
</div>    
    
</body>
</html>