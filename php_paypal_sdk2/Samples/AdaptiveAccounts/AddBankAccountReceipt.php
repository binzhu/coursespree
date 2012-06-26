			<?php

/********************************************
AddBankAccountReceipt.php


Called by AddBankAccount.php
Calls  AdaptiveAccounts.php,and APIError.php.
********************************************/
require_once '../../Lib/Config/Config.php';
require_once '../../Lib/CallerService.php';	
require_once '../Common/NVP_SampleConstants.php';		
session_start();

		try {
			$serverName = $_SERVER['SERVER_NAME'];
			$serverPort = $_SERVER['SERVER_PORT'];
			$url=dirname('http://'.$serverName.':'.$serverPort.$_SERVER['REQUEST_URI']);
			$returnURL = $url."/../Common/WebflowReturnPage.php";
			$cancelURL = $url. "/AddBankAccount.php" ;
			$createAccountKey=$_REQUEST['createAccountKey'];
			$request_array= array(
			AddBankAccount::$webOptionsreturnUrl=> $returnURL,
			AddBankAccount::$webOptionsreturnUrlDescription=> "return URL",
			AddBankAccount::$webOptionscancelUrl=> $cancelURL,
			AddBankAccount::$webOptionscancelUrlDescription=> 'cancelUR',
			RequestEnvelope::$requestEnvelopeErrorLanguage=> 'en_US',
			AddBankAccount::$emailAddress=> $_REQUEST['email'],
			AddBankAccount::$bankCountryCode=> $_REQUEST['bankCountryCode'],
			AddBankAccount::$bankName=> $_REQUEST['bankName'],
			AddBankAccount::$routingNumber=> $_REQUEST['routingNumber'],
			AddBankAccount::$bankAccountNumber=> $_REQUEST['bankAccountNumber'],
			AddBankAccount::$bankAccountType=> $_REQUEST['bankAccountType'],
			AddBankAccount::$confirmationType=> $_REQUEST['confirmationType'],
			);
			if(!empty($createAccountKey))
			{
				$request_array[AddBankAccount::$createAccountKey]=$createAccountKey;
			}
			
			
			$nvpStr=http_build_query($request_array, '', '&');
	
	/* Make the call to PayPal to get the fundingSourceKey
	 If the API call succeded, then redirect the user to PayPal
	 to begin to authorize Adding Funding source. If an error occured, show the
	 resulting errors
	 Note: if the confirmation type is none then no need of redirecting
	 */

	$resArray=hash_call('AdaptiveAccounts/AddBankAccount',$nvpStr,$sandboxEmailAddress);

	


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
throw new Exception('Error occurred in AddPaymentCard method');
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
 <link href="../Common/style.css" rel="stylesheet" type="text/css" />
   <script type="text/javascript" src="../Common/tooltip.js">
    </script>
<body>
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
<center><h3>AddBankAccount (as funding source) -response</h3>

<br />
<?php 
require_once '../Common/menu.html';?>
<table align="center">
 


        
 		<?php 
   		 	require_once 'ShowAllResponse.php';
   		 	if($resArray['redirectURL'])
	        {
			    $location = $resArray['redirectURL'];
			     echo" <a href=$location><b>* Redirect URL to Complete AddBankAccount API operation </b></a><br>";		
             }
   		 	
   		 ?>
</table>

</center>
</div>
</div>
</body>
</html>		
