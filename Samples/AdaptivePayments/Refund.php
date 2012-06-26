<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<HTML>
	<HEAD>
		<title>PayPal SDK - Adaptive Payments - Refund</title>
		<link href="../Common/style.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="../Common/tooltip.js">
    </script>
	</HEAD>
<script type="text/javascript">
function prefill()
{
	document.getElementById('payKey').value = "";
	document.getElementById('receiveremail').value = "platfo_1255611349_biz@gmail.com";
	document.getElementById('amount').value = "1.00";
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
					<h3><b>Adaptive Payments - Refund</b></h3>
				</center>
					<p class="header3"><a onclick="prefill()">Populate default values</a></p>
			
				<br/>
 <center>
   
		<form id="Form1" name="Form1" method="post" action ="RefundReceipt.php">
       		<table align="center">
					<tr>
						<td class="thinfield"><a href= "" style="text-decoration:none" onmouseover="ShowContent('paykey'); return true;"onmouseout="HideContent('paykey'); return true;"href="javascript:ShowContent('paykey')">Pay Key:</a>
							<div id="paykey" style="display:none; position:absolute; border-style: solid; background-color: white; padding: 20px;">The key used to create the payment that you want to refund.</div>
						</td>
						<td><input type="text" maxlength="32" name="payKey" id="payKey" size="40"></td>
					</tr>
					<tr>
						<td class="thinfield" width="52">
							<a href= "" style="text-decoration:none" onmouseover="ShowContent('currencycode'); return true;"onmouseout="HideContent('currencycode'); return true;"href="javascript:ShowContent('currencycode')">currencyCode</a>
								
							<div id="currencycode" style="display:none; position:absolute; border-style: solid; background-color: white; padding: 20px;">The currency code. If specified, you must specify the currency code
							that matches the currency code of the original payment</div>	
							</td>
						<td><select name="currencyCode" id="currencyCode">
								<option value="USD" selected>USD</option>
								<option value="GBP">GBP</option>
								<option value="EUR">EUR</option>
								<option value="JPY">JPY</option>
								<option value="CAD">CAD</option>
								<option value="AUD">AUD</option>
							</select></td>
					</tr>

					<tr>
					</tr>
						<tr>
							<td class="thinfield label" colspan="4" >
								<p align="left">
									<b>Refund Details</b></p>
							</td>
						</tr>
					<tr>
						<td width="52"><a href= "" style="text-decoration:none" onmouseover="ShowContent('receivers'); return true;"onmouseout="HideContent('receivers'); return true;"href="javascript:ShowContent('receivers')">Receivers</a>
							<div id="receivers" style="display:none; position:absolute; border-style: solid; background-color: white; padding: 20px;">Information about the receivers of the payment that you want to
							refund</div>
						</td>
						<td><a href= "" style="text-decoration:none" onmouseover="ShowContent('receiverEmail1'); return true;"onmouseout="HideContent('receiverEmail1'); return true;"href="javascript:ShowContent('receiverEmail1')">ReceiverEmail (Required):</a>
							<div id="receiverEmail1" style="display:none; position:absolute; border-style: solid; background-color: white; padding: 20px;">receiver's Email</div>	
						</td>
						<td><a href= "" style="text-decoration:none" onmouseover="ShowContent('amountdef'); return true;"onmouseout="HideContent('amountdef'); return true;"href="javascript:ShowContent('amountdef')">Amount(Required):</a>
						<div id="amountdef" style="display:none; position:absolute; border-style: solid; background-color: white; padding: 20px;">
 to refund; not to exceed the amount of the payment</div>	

						</td>
					</tr>
					<tr>
						<td>
							<P align="left">1</P>
						</td>
						<td><input type="text" name="receiveremail" id="receiveremail" size="50" value=""></td>
						<td><input type="text" name="amount" id="amount" size="5" maxlength="7" value=""></td>
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
			</center>
			</div>
			</div>
	</body>
</HTML>