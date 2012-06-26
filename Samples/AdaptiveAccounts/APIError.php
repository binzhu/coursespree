<?php
/*************************************************
APIError.php

Displays error parameters.

Called by DoDirectPaymentReceipt.php, TransactionDetails.php,
GetExpressCheckoutDetails.php and DoExpressCheckoutPayment.php.

*************************************************/

session_start();
$resArray=$_SESSION['reshash']; 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
<head>
<title>PayPal API Error</title>
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
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<h3><b>The PayPal API has returned an error!</b></h3>

<table width="280">

<?php  //it will print if any URL errors 
	if(isset($_SESSION['curl_error_no'])) { 
			$errorCode= $_SESSION['curl_error_no'] ;
			$errorMessage=$_SESSION['curl_error_msg'] ;	
			session_unset();	
?>

   
<tr>
		<td class="thinfield">Error Number:</td>
		<td><?php $errorCode ?></td>
	</tr>
	<tr>
		<td>Error Message:</td>
		<td><?php $errorMessage ?></td>
	</tr>
	
	
	</table>
<?php } else {

/* If there is no URL Errors, Construct the HTML page with 
   Response Error parameters.   
   */
?>


	<font size=2 color=black face=Verdana><b></b></font>
	<br><br>

	<b> PayPal API Error</b><br><br>
	
    <table width = 400>
    	<?php 
    
    require 'ShowAllResponse.php';
    ?>
    </table>
 	
	
<?php 
}// end else
?>
</center>

</div>
</div>
</body>
</html>

