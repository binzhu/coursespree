<?php

/********************************************
 SetFundingSourceConfirmed.php


 Calls  SetFundingSourceConfirmedReceipt.php,and APIError.php.
 ********************************************/

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
<head>
<title>Adaptive Accounts - Set Funding Source Confirm Page</title>
<link href="../Common/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../Common/tooltip.js">
</script>
</head>
<script type="text/javascript">
function prefill()
{
	document.getElementById('emailAddress').value = "platfo@paypal.com";
}
</script>
<script type="text/javascript" src="../ToolTip.js">
</script>
<body>
<br />
<div id="jive-wrapper">
<div id="jive-header">
<div id="logo"><span>You must be Logged in to <a
	href="<?php echo DEVELOPER_PORTAL;?>" target="_blank">PayPal sandbox</a></span>
<a title="Paypal X Home" href="#">
<div id="titlex"></div>
</a></div>
</div>

<?php
require_once '../Common/menu.html';?>
<div id="request_form">
<form id="Form1" name="Form1"
	action="SetFundingSourceConfirmedReceipt.php">
<center>
<h3>Adaptive Accounts - Set Funding Source Confirm</h3>
</center>
<p class="header3"><a onclick="prefill()">Populate default values</a></p>

<table align="center" width="70%">
	<tr>
		<td style="width: 200px"><a style="text-decoration: none"
			onmouseover="ShowContent('email'); return true;"
			onmouseout="HideContent('email'); return true;"
			href="javascript:ShowContent('email')"> email Id: </a>
		<div id="email"
			style="display: none; position: absolute; border-style: solid; background-color: white; padding: 20px;">The
		email address for the bank</div>
		</td>
		<td align="left" style="width: 408px"><input type="text"
			id="emailAddress" name="emailAddress" size="50" /></td>
	</tr>
	<tr>
		<td style="width: 200px"><a style="text-decoration: none"
			onmouseover="ShowContent('fundinSourceKey'); return true;"
			onmouseout="HideContent('fundinSourceKey'); return true;"
			href="javascript:ShowContent('fundinSourceKey')"> Funding Source Key:
		</a>
		<div id="fundinSourceKey"
			style="display: none; position: absolute; border-style: solid; background-color: white; padding: 20px;">Key
		generated from Create account web flow</div>
		</td>
		<td align="left" style="width: 408px"><input type="text"
			id="fundingSourceKey" name="fundingSourceKey" size="50" /></td>
	</tr>
	<tr align="center">
		<td colspan="2"><br />
		<a class="pop-button primary" onclick="document.Form1.submit();"
			id="Submit"><span>Submit</span></a></td>
	</tr>
	<tr align="right">
		<td colspan="4"><i>** Required</i><br />
		<br />
		</td>
	</tr>
</table>
</form>
</div>
</div>
</body>
</html>

