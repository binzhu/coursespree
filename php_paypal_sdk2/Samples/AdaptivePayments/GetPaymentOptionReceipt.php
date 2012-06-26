<?php

/********************************************
GetPaymentOptionReceipt.php

 This file is called after the user clicks on a button during
 the Pay process to use PayPal's AdaptivePayments Pay features'. The
 user logs in to their PayPal account.
 Called by GetPaymentOption.php
 Calls  CallerService.php,and APIError.php.
 ********************************************/

require_once '../../Lib/Config/Config.php';
require_once '../../Lib/CallerService.php';
require_once '../Common/NVP_SampleConstants.php';
session_start();

try {

	
	 
$request_array = array (
			GetPaymentOptions::$payKey=> $_REQUEST["payKey"],
			RequestEnvelope::$requestEnvelopeErrorLanguage => 'en_US'
			);
	          
			
			$nvpStr=http_build_query($request_array, '', '&');
			$resArray=hash_call("AdaptivePayments/GetPaymentOptions",$nvpStr);
			
			/* Display the API response back to the browser.
			   If the response from PayPal was a success, display the response parameters'
			   If the response was an error, display the errors received using APIError.php.
			 */
			$ack = strtoupper($resArray["responseEnvelope.ack"]);
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
  <title>PayPal PHP SDK -GetPaymentOption details</title>
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
    <h3>GetPaymentOption
    Details</h3>
    <br />

        
 		<?php 
   		 	require_once 'ShowAllResponse.php';
   		 ?>
</center>
</div>
</div>
</body>

</html>
			