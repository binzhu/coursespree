<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
<head>
<meta name="generator"
	content="HTML Tidy for Windows (vers 14 February 2006), see www.w3.org">

<title>PayPal Platform - Pay Center- Samples</title>
 <link href="../Common/style.css" rel="stylesheet" type="text/css" />
 <script type="text/javascript" src="../Common/tooltip.js">
    </script>
</head>
<script type="text/javascript">
function PrePopulate()
{
	document.getElementById('senderEmail').value = "platfo_1255076101_per@gmail.com";
	document.getElementById('startingDate').value = "2011-11-07";
	document.getElementById('endingDate').value = "2012-06-07";
	document.getElementById('maxNumberOfPayments').value = "10";
	document.getElementById('maxTotalAmountOfAllPayments').value = "50.00";
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
					<h3><b>Adaptive Payments - Preapproval</b></h3>
					<p class="header3"><a onclick="PrePopulate()">Populate default values</a></p>
				</center>
				<br/>

<form id="Form1" name="Form1" action="PreapprovalReceipt.php">
<table align="center">
						<tr>
							<td class="thinfield label" colspan="4" >
								<p align="left">
									<b>Sender Details</b></p>
							</td>
						</tr>

	<tr>
		<td class="thinfield" width="200"><a href=""
			style="text-decoration: none"
			onmouseover="ShowContent('senderEmail1'); return true;"
			onmouseout="HideContent('senderEmail1'); return true;"
			href="javascript:ShowContent('senderEmail1')">Sender's Email:</a>
		<div id="senderEmail1"
			style="display: none; position: absolute; border-style: solid; background-color: white; padding: 20px; width :100px;">Sender’s email address. If not specified, the email address of the
                    sender<br /> who logs in to approve the request becomes the email address
                    associated with the preapproval key</div>
		</td>
		<td><input type="text" size="50" maxlength="64"	id="senderEmail" name="senderEmail" value=""></td>
	</tr>

	<tr>
		<td class="thinfield label" colspan="4" >
		<p align="left">
		<b>Preapproval Details</b></p>
		</td>
	</tr>

	<tr>
		<td class="field"><a href="" style="text-decoration: none"
			onmouseover="ShowContent('startingDate1'); return true;"
			onmouseout="HideContent('startingDate1'); return true;"
			href="javascript:ShowContent('startingDate1')">Starting date:</a>
		<div id="startingDate1"
			style="display: none; position: absolute; border-style: solid; background-color: white; padding: 20px;">First
		First date for which the preapproval is valid. It cannot be before
                today’s date or after the ending date</div>
		</td>
		<td><input type="text" size="50" maxlength="32"
			id="startingDate" name="startingDate" value=""></td>
	</tr>
	<tr>
		<td class="field"><a href="" style="text-decoration: none"
			onmouseover="ShowContent('endingDate1'); return true;"
			onmouseout="HideContent('endingDate1'); return true;"
			href="javascript:ShowContent('endingDate1')">Ending date:</a>
		<div id="endingDate1"
			style="display: none; position: absolute; border-style: solid; background-color: white; padding: 20px;">Last
		 Last date for which the preapproval is valid. It cannot be later than
                            one year from the starting date</div>
		</td>
		<td><input type="text" size="50" maxlength="32" id="endingDate" name="endingDate"
			value=""></td>
	</tr>
	<tr>
		<td class="field"><a href="" style="text-decoration: none"
			onmouseover="ShowContent('maxNoOfPayment'); return true;"
			onmouseout="HideContent('maxNoOfPayment'); return true;"
			href="javascript:ShowContent('maxNoOfPayment')">Maximum number of Payments</a>
		<div id="maxNoOfPayment"
			style="display: none; position: absolute; border-style: solid; background-color: white; padding: 20px;">The
		preapproved maximum number of payments. It cannot exceed the
		preapproved maximum total number of all payments</div>
		</td>
		<td><input type="text" size="50" maxlength="32"
			id="maxNumberOfPayments" name="maxNumberOfPayments" value="" /></td>
	</tr>
	<tr>
		<td class="field"><a href="" style="text-decoration: none"
			onmouseover="ShowContent('maxAmount'); return true;"
			onmouseout="HideContent('maxAmount'); return true;"
			href="javascript:ShowContent('maxAmount')">Maximum Total Amount:</a>
		<div id="maxAmount"
			style="display: none; position: absolute; border-style: solid; background-color: white; padding: 20px;">The
		preapproved maximum total amount of all payments. It cannot exceed
		$2,000 USD or the equivalent in other currencies</div>
		</td>
		<td><input type="text" size="50" maxlength="32"
			id="maxTotalAmountOfAllPayments" name="maxTotalAmountOfAllPayments" value="" /></td>
	</tr>
	<tr>
		<td class="field" width="52"><a href=""
			style="text-decoration: none"
			onmouseover="ShowContent('currencyCode1'); return true;"
			onmouseout="HideContent('currencyCode1'); return true;"
			href="javascript:ShowContent('currencyCode1')">currencyCode</a>
		<div id="currencyCode1"
			style="display: none; position: absolute; border-style: solid; background-color: white; padding: 20px;">currency
		Code</div>

		</td>
		<td><select name="currencyCode">
			<option value="USD" selected>USD</option>
			<option value="GBP">GBP</option>
			<option value="EUR">EUR</option>
			<option value="JPY">JPY</option>
			<option value="CAD">CAD</option>
			<option value="AUD">AUD</option>
		</select></td>
	</tr>

		     <tr></tr>
		     <tr></tr>
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
</div>
</div>
</body>
</html>