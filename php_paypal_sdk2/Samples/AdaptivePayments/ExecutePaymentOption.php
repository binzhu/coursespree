<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<HTML>
<HEAD>
<title>PayPal SDK - Adaptive Payments - Execute Payment Option</title>
<link href="../Common/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../Common/tooltip.js">
    </script>
</HEAD>

<script type="text/javascript">
function PrePopulate()
{
	document.getElementById('payKey').value = "";
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
<h3>Execute Payment Option</h3>
<form id="Form1" name="Form1" action="ExecutePaymentOptionReceipt.php">
	<p class="header3"><a onclick="PrePopulate()">Populate default values</a></p>
	<br />
	<table align="center">

		<tr>
			<td class="smallfield" width="80"><a href=""
				style="text-decoration: none"
				onmouseover="ShowContent('PayKey'); return true;"
				onmouseout="HideContent('PayKey'); return true;"
				href="javascript:ShowContent('PayKey')">Pay Key:</a>
			<div id="PayKey"
				style="display: none; position: absolute; border-style: solid; background-color: white; padding: 20px;">The pay key that identifies the payment to be executed. <br />This is the
                    pay key returned in the PayResponse message of PAY api with CREATE option</div>
			</td>
			<td align="left"><input id="payKey" type="text" maxLength="32"
				size="60" value="<?php if(isset($_GET["payKey"])) echo $_GET["payKey"];?>" name="payKey"></td>
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
</div>
</div>
</body>
</HTML>
