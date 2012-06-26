<?php

/******************************************************
ConvertCurrencyReceipt.php
Displays the Currency conversion details after calling the
ConvertCurrency API.
Called by SetConvertCurrency.php 
Calls  AdaptivePayments.php,and APIError.php.
******************************************************/

require_once '../../Lib/Config/Config.php';
require_once '../../Lib/CallerService.php';
require_once '../Common/NVP_SampleConstants.php';
session_start();

	try {
		$request_array= array(
		ConvertCurrency::$baseAmountList_currency_0_amount => $_REQUEST['baseamount'],
		ConvertCurrency::$baseAmountList_currency_0_code  =>  $_REQUEST['fromcurrencyCode'],
		ConvertCurrency::$convertToCurrencyList_currencyCode_0 =>  $_REQUEST['tocurrencyCode1'],
		ConvertCurrency::$convertToCurrencyList_currencyCode_1 =>  $_REQUEST['tocurrencyCode2'],
		ConvertCurrency::$convertToCurrencyList_currencyCode_2 =>  $_REQUEST['tocurrencyCode3'],
		RequestEnvelope::$requestEnvelopeErrorLanguage => 'en_US'
		);
		
		
		$nvpStr=http_build_query($request_array, '', '&');
		$resArray=hash_call('AdaptivePayments/ConvertCurrency',$nvpStr);
		
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
		}
		catch(Exception $ex) {
			
		throw new Exception('Error occurred in PaymentDetails method');
		}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">


<html>
<head>
  <meta name="generator" content=
  "HTML Tidy for Windows (vers 14 February 2006), see www.w3.org">

  <title>PayPal PHP SDK -Payment Details</title>
 <link href="../Common/style.css" rel="stylesheet" type="text/css" />
</head>

<body ><br/>
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
    <h3>convertCurrency -Response</h3><br>


    <table align="center">
	
		 <?php 
   		 	require_once 'ShowAllResponse.php';
   		 ?>
	</table>
	 </center>
	 </div>
	 </div>
</body>
</html>