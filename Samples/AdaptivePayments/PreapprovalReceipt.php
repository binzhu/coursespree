
<?php

/********************************************
Preapproval.php

This file is called after the user clicks on a button during
the preapproval process to use PayPal's AdaptivePayments preapproval features'. The
user logs in to their PayPal account.

Called by Preapproval.php

Calls  CallerService.php,and APIError.php.

********************************************/


require_once '../../Lib/Config/Config.php';
require_once '../../Lib/CallerService.php';
require_once '../Common/NVP_SampleConstants.php';
session_start();
			try {
			
		        /* The servername and serverport tells PayPal where the buyer
		           should be directed back to after authorizing payment.
		           In this case, its the local webserver that is running this script
		           Using the servername and serverport, the return URL is the first
		           portion of the URL that buyers will return to after authorizing payment                */
		
		           $serverName = $_SERVER['SERVER_NAME'];
		           $serverPort = $_SERVER['SERVER_PORT'];
		           $url=dirname('http://'.$serverName.':'.$serverPort.$_SERVER['REQUEST_URI']);
		           /* The returnURL is the location where buyers return when a
		            payment has been succesfully authorized.
		            The cancelURL is the location buyers are sent to when they hit the
		            cancel button during authorization of payment during the PayPal flow                 */
		
		           $returnURL = $url."/../Common/WebflowReturnPage.php";
		           $cancelURL = $url."/SetPreapproval.php" ;
		           $request_array = array (
		           Preapproval::$cancelUrl => $cancelURL,
		           Preapproval::$returnUrl => $returnURL,
		           Preapproval::$currencyCode => $_REQUEST['currencyCode'],
		           Preapproval::$startingDate => $_REQUEST['startingDate'],
		           Preapproval::$endingDate =>  $_REQUEST['endingDate'],
		           Preapproval::$maxNumberOfPayments =>  $_REQUEST['maxNumberOfPayments'],
		           Preapproval::$maxTotalAmountOfAllPayments => $_REQUEST['maxTotalAmountOfAllPayments'],
		           Preapproval::$requestEnvelope_senderEmail =>  $_REQUEST['senderEmail'],
		           RequestEnvelope::$requestEnvelopeErrorLanguage => 'en_US'
		           );
		           
		           
		           /* Make the call to PayPal to get the Pay token
		            If the API call succeded, then redirect the buyer to PayPal
		            to begin to authorize payment.  If an error occured, show the
		            resulting errors
		            */
		       
		           $nvpStr=http_build_query($request_array, '', '&');
				   $resArray=hash_call("AdaptivePayments/Preapproval",$nvpStr);
		           
		    
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

<html >
<head >
    <title>Preapproval -Response </title>
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
	<h3><b>Preapproval Details</b></h3>

 		<?php  		 
   		 	require_once 'ShowAllResponse.php';
   		 	
						// Redirect to paypal.com here
						$payPalURL = PAYPAL_REDIRECT_URL.'_ap-preapproval&preapprovalkey='.$resArray['preapprovalKey'];
						echo" <a href=$payPalURL><b>* Redirect URL to Complete Preapproval API operation </b></a><br>";
		 ?>

</center>
</div>
</div>
</body>
</html>