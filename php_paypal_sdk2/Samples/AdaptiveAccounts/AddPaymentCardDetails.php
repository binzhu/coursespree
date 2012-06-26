<?php

/********************************************
AddPaymentCarddetail.php
Calls AddPaymentCard API of CreateAccounts webservices.

Called by AddPaymentCardReceipt.php
Calls  AdaptiveAccounts.php,and APIError.php.
********************************************/


session_start();
$resArray = $_SESSION['cardAdded'];  
     
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
<center><h3>AddPaymentCard (as funding source) Confirmation</h3>
<br />
<h5>Card Added!</h5>
<br />
</center>
<?php 
require_once '../Common/menu.html';?>
<table width="70%">
 


        
 		<?php 
   		 	require_once 'ShowAllResponse.php';
   		 ?>
</table>

</div>
</div>

</body>
</html>