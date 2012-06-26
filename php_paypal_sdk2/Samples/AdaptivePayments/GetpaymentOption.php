<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<HTML>
<HEAD>
<title>PayPal SDK - Adaptive Payments - Get Payment Option</title>
<link href="../Common/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../Common/tooltip.js">
    </script>
</HEAD>

<script type="text/javascript">
function PrePopulate()
{
	document.getElementById('payKey').value = "AP-5YL76254522892258";
}


</script>
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
<form id="Form1" name="Form1" action="GetPaymentOptionReceipt.php">
	
			<h3>Adaptive Payments - Get Payment Option</h3>
		<p class="header3"><a onclick="prefill()">Populate default values</a></p>
	
	<br />


<table align="center">

		<tr>
			<td class="smallfield" width="80"><a href=""
				style="text-decoration: none"
				onmouseover="ShowContent('PayKey1'); return true;"
				onmouseout="HideContent('PayKey1'); return true;"
				href="javascript:ShowContent('PayKey1')">Pay Key:</a>
			<div id="PayKey1"
				style="display: none;width:200px; position: absolute; border-style: solid; background-color: white; padding: 20px;">The pay key that identifies the payment for which you want to set
                    payment options.<br /> This is the pay key returned in the PayResponse message.</div>
			</td>
			<td align="left"><input id="payKey" type="text" maxLength="32"
				size="60" value="" name="payKey"></td>
		</tr>

		<tr align="center">
			<td colspan="2"><br/>
                <a class="pop-button primary" onclick="document.Form1.submit();" id="Submit"><span>Submit</span></a>
			</td>
        </tr>
<tr align="right">
			<td colspan="4"><i>** Required</i><br/><br/></td>
		</tr>
	</table>
</form>
</center>
</body>
</HTML>
