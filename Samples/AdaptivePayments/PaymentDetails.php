<?php 
/******************************************************
PaymentDetails.php
This page is specified as the ReturnURL for the Pay Operation.
When returned from PayPal this page is called.
Page get the payment details for the payKey either stored
in the session or passed in the Request.
******************************************************/

require_once '../../Lib/Config/Config.php';
require_once '../../Lib/CallerService.php';
require_once '../Common/NVP_SampleConstants.php';


session_start();
	if(isset($_GET['cs'])) {
		$_SESSION['payKey'] = '';
	}
	try {
		if(isset($_REQUEST["payKey"])){
			$payKey = $_REQUEST["payKey"];}
			if(empty($payKey))
			{
				$payKey = $_SESSION['payKey'];
			}
			
			$request_array = array (
			PaymentDetails::$payKey=> $payKey,
			RequestEnvelope::$requestEnvelopeErrorLanguage=> 'en_US'
			);
			
			$nvpStr=http_build_query($request_array, '', '&');
			$resArray=hash_call("AdaptivePayments/PaymentDetails",$nvpStr);
			
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
  <title>PayPal PHP SDK -Payment Details</title>
 <link href="../Common/style.css" rel="stylesheet" type="text/css" />
 <script type="text/javascript" src="../Common/tooltip.js">
    </script>
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
<h3><b>Payment
    Details</b></h3>
    <br />
</center>
        
 		<?php 
   		 	require_once 'ShowAllResponse.php';
   		 ?>
</div>
</div>
</body>
</html>
