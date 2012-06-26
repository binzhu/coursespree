<?php
/****************************************************
CallerService.php

This file uses the constants.php to get parameters needed 
to make an API call and calls the server.if you want use your
own credentials, you have to change the constants.php

Called by 

****************************************************/
require_once 'Config/Config.php';

//session_start();

/**
  * hash_call: Function to perform the API call to PayPal using API signature
  * @methodName is name of API  method.
  * @nvpStr is nvp string.
  * returns an associtive array containing the response from the server.
*/


function hash_call($methodName,$nvpStr,$sandboxEmailAddress = '')
{
	//declaring of global variables
	
$URL=API_ENDPOINT.$methodName;
	//setting the curl parameters.
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,$URL);
	curl_setopt($ch, CURLOPT_VERBOSE, 1);

	//turning off the server and peer verification(TrustManager Concept).
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);

	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch, CURLOPT_POST, 1);
    //if USE_PROXY constant set to TRUE in Constants.php, then only proxy will be enabled.
   //Set proxy name to PROXY_HOST and port number to PROXY_PORT in constants.php 
	if(USE_PROXY)
	curl_setopt ($ch, CURLOPT_PROXY, PROXY_HOST.":".PROXY_PORT); 

	$headers_array = setupHeaders();
    if(!empty($sandboxEmailAddress)) {
    	$headers_array[] = "X-PAYPAL-SANDBOX-EMAIL-ADDRESS: ".$sandboxEmailAddress;
    }
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers_array);
    curl_setopt($ch, CURLOPT_HEADER, false);
	//setting the nvpreq as POST FIELD to curl
	curl_setopt($ch,CURLOPT_POSTFIELDS,$nvpStr);

	
	//getting response from server
	$response = curl_exec($ch);
	
	if (curl_errno($ch) == 60) {
	 	curl_setopt($ch, CURLOPT_CAINFO, dirname(__FILE__) . '/cacert.pem');
	 	$response = curl_exec($ch);
		}
 	
	//convrting NVPResponse to an Associative Array
	$nvpResArray=deformatNVP($response);
	//$nvpReqArray=deformatNVP($nvpreq);
	//$_SESSION['nvpReqArray']=$nvpReqArray;

	if (curl_errno($ch)) {
		// moving to display page to display curl errors
		  $_SESSION['curl_error_no']=curl_errno($ch) ;
		  $_SESSION['curl_error_msg']=curl_error($ch);
		  $location = "APIError.php";
		  header("Location: $location");
	 } else {
		 //closing the curl
			curl_close($ch);
	  }

return $nvpResArray;
}

/** This function will take NVPString and convert it to an Associative Array and it will decode the response.
  * It is usefull to search for a particular key and displaying arrays.
  * @nvpstr is NVPString.
  * @nvpArray is Associative Array.
  */

function deformatNVP($nvpstr)
{

	$intial=0;
 	$nvpArray = array();


	while(strlen($nvpstr)){
		//postion of Key
		$keypos= strpos($nvpstr,'=');
		//position of value
		$valuepos = strpos($nvpstr,'&') ? strpos($nvpstr,'&'): strlen($nvpstr);

		/*getting the Key and Value values and storing in a Associative Array*/
		$keyval=substr($nvpstr,$intial,$keypos);
		$valval=substr($nvpstr,$keypos+1,$valuepos-$keypos-1);
		//decoding the respose
		$nvpArray[urldecode($keyval)] =urldecode( $valval);
		$nvpstr=substr($nvpstr,$valuepos+1,strlen($nvpstr));
     }
	return $nvpArray;
}



function setupHeaders() {
    $headers_arr = array();

	
    $headers_arr[]="X-PAYPAL-SECURITY-SIGNATURE: ".API_SIGNATURE;
	$headers_arr[]="X-PAYPAL-SECURITY-USERID:  ".API_USERNAME;
	$headers_arr[]="X-PAYPAL-SECURITY-PASSWORD: ".API_PASSWORD;
	$headers_arr[]="X-PAYPAL-APPLICATION-ID: ".APPLICATION_ID;
    $headers_arr[] = "X-PAYPAL-REQUEST-DATA-FORMAT: ".REQUEST_FORMAT;
    $headers_arr[] = "X-PAYPAL-RESPONSE-DATA-FORMAT: " .RESPONSE_FORMAT;
	$headers_arr[]="X-PAYPAL-DEVICE-IPADDRESS: ".DEVICE_IPADDRESS; 

	if(!defined('X-PAYPAL-REQUEST-SOURCE'))
	{
		$headers_arr[]="X-PAYPAL-REQUEST-SOURCE: ".X_PAYPAL_REQUEST_SOURCE;
	}
	else 
	$headers_arr[]="X-PAYPAL-REQUEST-SOURCE: ".X_PAYPAL_REQUEST_SOURCE."-".X-PAYPAL-REQUEST-SOURCE;
	return $headers_arr;
  
}

?>
