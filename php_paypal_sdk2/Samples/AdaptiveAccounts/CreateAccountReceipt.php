<?php

/********************************************
CreateAccountReceipt.php
Calls CreateAccount API of CreateAccounts webservices.

Called by CreateAccount.php
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
			$cancelURL = $url. "/CreateAccount.php" ;
			$sandboxEmailAddress=$_REQUEST['sandboxDeveloperEmail'];
			$request_array= array(
			CreateAccount::$createAccountWebOptionsreturnUrl => $returnURL,
			RequestEnvelope::$requestEnvelopeErrorLanguage => 'en_US',
			CreateAccount::$preferredLanguageCode => 'en_US',
			CreateAccount::$accountType => $_REQUEST['accountType'],
			CreateAccount::$namesalutation => $_REQUEST['salutation'],
			CreateAccount::$namefirstName => $_REQUEST['firstName'],
			CreateAccount::$namemiddleName => $_REQUEST['middleName'],
			CreateAccount::$namelastName => $_REQUEST['lastName'],
			CreateAccount::$dateOfBirth => $_REQUEST['dateOfBirth'],
			CreateAccount::$addressline1 => $_REQUEST['address1'],
			CreateAccount::$addressline2 => $_REQUEST['address2'],
			CreateAccount::$addresscity => $_REQUEST['city'],
			CreateAccount::$addressstate => $_REQUEST['state'],
			CreateAccount::$addresspostalCode => $_REQUEST['postalCode'],
			CreateAccount::$addresscountryCode => $_REQUEST['countryCode'],
			CreateAccount::$citizenshipCountryCode => $_REQUEST['citizenshipCountryCode'],
			CreateAccount::$contactPhoneNumber => $_REQUEST['contactPhoneNumber'],
			CreateAccount::$notificationURL => $_REQUEST['notificationUrl'],
			CreateAccount::$partnerField1 => $_REQUEST['p1'],
			CreateAccount::$partnerField2 => $_REQUEST['p2'],
			CreateAccount::$partnerField3 => $_REQUEST['p3'],
			CreateAccount::$partnerField4 => $_REQUEST['p4'],
			CreateAccount::$partnerField5 => $_REQUEST['p5'],
			CreateAccount::$currencyCode => $_REQUEST['currencyCode'],
			CreateAccount::$emailAddress => $_REQUEST['newemail'],
			//'sandboxEmailAddress'=> $_REQUEST['sandboxDeveloperEmail'],
			CreateAccount::$registrationType => 'WEB',
			);
			if($_REQUEST['accountType']=="BUSINESS")
			{
				$request_array2= array(
				CreateAccount::$businessInfobusinessName => $_REQUEST['businessName'],
				CreateAccount::$businessInfobusinessAddressline1 => $_REQUEST['businessAddress1'],
				CreateAccount::$businessInfobusinessAddressline2 => $_REQUEST['businessAddress2'],
				CreateAccount::$businessInfobusinessAddresscity => $_REQUEST['businessCity'],
				CreateAccount::$businessInfobusinessAddressstate => $_REQUEST['businessState'],
				CreateAccount::$businessInfobusinessAddresspostalCode => $_REQUEST['businessZip'],
				CreateAccount::$businessInfobusinessAddresscountryCode => $_REQUEST['businessCountry'],
				CreateAccount::$businessInfoworkPhone => $_REQUEST['businessPhone'],
				CreateAccount::$businessInfocategory => $_REQUEST['businessCategory'],
				CreateAccount::$businessInfosubCategory => $_REQUEST['businessSubCategory'],
				CreateAccount::$businessInfocustomerServicePhone => $_REQUEST['businessCustomerServicePhone'],
				CreateAccount::$businessInfocustomerServiceEmail => $_REQUEST['businessCustomerServiceEmail'],
				CreateAccount::$businessInfowebSite => $_REQUEST['businessWeb'],
				CreateAccount::$businessInfodateOfEstablishment => $_REQUEST['dateOfEstablishment'],
				CreateAccount::$businessInfobusinessType => $_REQUEST['businessType'],
				CreateAccount::$businessInfoaveragePrice => $_REQUEST['avgPrice'],
				CreateAccount::$businessInfoaverageMonthlyVolume => $_REQUEST['averageMonthlyVolume'],
				CreateAccount::$businessInfopercentageRevenueFromOnline => $_REQUEST['percentageRevenueFromOnline'],
				CreateAccount::$businessInfosalesVenue => $_REQUEST['salesVenue'],
				);
			$request_array=array_merge($request_array,$request_array2);
			}
			
			$nvpStr=http_build_query($request_array, '', '&');
	
	/* Make the call to PayPal to get the CreateAccountKey
	 If the API call succeded, then redirect the user to PayPal
	 to begin to authorize account creation.  If an error occured, show the
	 resulting errors
	 */

	$resArray=hash_call('AdaptiveAccounts/CreateAccount',$nvpStr,$sandboxEmailAddress);

	


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
throw new Exception('Error occurred in reateAccountReceipt method');
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
<center><h3>Create Account -Response</h3>
<br />

<br />
<?php 
require_once '../Common/menu.html';?>

 


        
 		<?php 
   		 	require_once 'ShowAllResponse.php';
   		 	$payPalURL = $resArray['redirectURL'];
   		 	echo" <a href=$payPalURL><b>* Redirect URL to Complete CreateAccount API operation </b></a><br>";
   		 ?>


</center>
</div>
</div>
</body>
</html>		