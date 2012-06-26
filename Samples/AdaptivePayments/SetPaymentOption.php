<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<HTML>
<HEAD>
<title>PayPal SDK - Adaptive Payments - Set Payment Option</title>
<link href="../Common/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../Common/tooltip.js">
    </script>
</HEAD>

<script type="text/javascript">
function prefill()
{
	
	document.getElementById('countryCode').value = "";
	document.getElementById('displayName').value = "";
	document.getElementById('email').value = "";
	document.getElementById('firstName').value = "";
	document.getElementById('lastName').value = "";
	document.getElementById('customerId').value = "";
	document.getElementById('institutionId').value = "";
	document.getElementById('headerImage').value = "http://bankone.com/images/emailHeaderImage.jpg";
	document.getElementById('marketingImage').value = "http://bankone.com/images/emailMarketingImage.jpg";
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

<form id="Form1" name="Form1" action="SetPaymentOptionReceipt.php">
	<center>
		<h3> Adaptive
			Payments - Set Payment Option</h3>
		</center>			
	<p class="header3"><a onclick="prefill()">Populate default values</a></p>
<table align="center">
	
		<tr>
			<td class="thinfield" width="100">
				<a 	style="text-decoration: none"
					onmouseover="ShowContent('PayKey'); return true;"
					onmouseout="HideContent('PayKey'); return true;"
					href="javascript:ShowContent('PayKey')">Pay Key:</a>
				<div id="PayKey" style="display: none; position: absolute; border-style: solid; background-color: white; padding: 20px;">
				   The pay key that identifies the payment for which you want to set
                    payment options.<br /> This is the pay key returned in the PayResponse message 
				</div>
			</td>
			<td align="left"><input id="payKey" type="text" maxLength="32"
				size="50" value="<?php if(isset($_GET["payKey"])) echo $_GET["payKey"];?>" name="payKey"></td>
		</tr>
		<tr/><tr/>
		<tr>
			<td class="thinfield3" height="14" colspan="3" >
			<p align="center"><b>Financial Partner Detail:(Optional)</b></p>
			</td>
		</tr>
		
		<tr>
			<td class="thinfield" width="100">
				<a 	style="text-decoration: none"
					onmouseover="ShowContent('CountryCode'); return true;"
					onmouseout="HideContent('CountryCode'); return true;"
					href="javascript:ShowContent('CountryCode')">Country Code:</a>
				<div id="CountryCode" style="display: none; position: absolute; border-style: solid; background-color: white; padding: 20px;">
				   Country Code
				</div>
			</td>
			<td align="left"><input id="countryCode" type="text" maxLength="32"
				size="50" value="" name="countryCode"></td>
		</tr>
		
		<tr>
			<td class="thinfield" width="100">
				<a 	style="text-decoration: none"
					onmouseover="ShowContent('DisplayName'); return true;"
					onmouseout="HideContent('DisplayName'); return true;"
					href="javascript:ShowContent('DisplayName')">Name:</a>
				<div id="DisplayName" style="display: none; position: absolute; border-style: solid; background-color: white; padding: 20px;">
				   Display Name
				</div>
			</td>
			<td align="left"><input id="displayName" type="text" maxLength="32"
				size="50" value="" name="displayName"></td>
		</tr>
		
		<tr>
			<td class="thinfield" width="100">
				<a 	style="text-decoration: none"
					onmouseover="ShowContent('Email'); return true;"
					onmouseout="HideContent('Email'); return true;"
					href="javascript:ShowContent('Email')">Email:</a>
				<div id="Email" style="display: none; position: absolute; border-style: solid; background-color: white; padding: 20px;">
				   Financial Partner's Email
				</div>
			</td>
			<td align="left"><input id="email" type="text" maxLength="32"
				size="50" value="" name="email"></td>
		</tr>
		
		<tr>
			<td class="thinfield" width="100">
				<a 	style="text-decoration: none"
					onmouseover="ShowContent('FirstName'); return true;"
					onmouseout="HideContent('FirstName'); return true;"
					href="javascript:ShowContent('FirstName')">First Name:</a>
				<div id="FirstName" style="display: none; position: absolute; border-style: solid; background-color: white; padding: 20px;">
				   First Name
				</div>
			</td>
			<td align="left"><input id="firstName" type="text" maxLength="32"
				size="50" value="" name="firstName"></td>
		</tr>
		
		<tr>
			<td class="thinfield" width="100">
				<a 	style="text-decoration: none"
					onmouseover="ShowContent('LastName'); return true;"
					onmouseout="HideContent('LastName'); return true;"
					href="javascript:ShowContent('LastName')">Last Name:</a>
				<div id="LastName" style="display: none; position: absolute; border-style: solid; background-color: white; padding: 20px;">
				   Last Name
				</div>
			</td>
			<td align="left"><input id="lastName" type="text" maxLength="32"
				size="50" value="" name="lastName"></td>
		</tr>
		
		<tr>
			<td class="thinfield" width="100">
				<a 	style="text-decoration: none"
					onmouseover="ShowContent('CustomerId'); return true;"
					onmouseout="HideContent('CustomerId'); return true;"
					href="javascript:ShowContent('CustomerId')">Customer Id:</a>
				<div id="CustomerId" style="display: none; position: absolute; border-style: solid; background-color: white; padding: 20px;">
				   Customer Id
				</div>
			</td>
			<td align="left"><input id="customerId" type="text" maxLength="32"
				size="50" value="" name="customerId"></td>
		</tr>
		
		<tr>
			<td class="thinfield" width="100">
				<a 	style="text-decoration: none"
					onmouseover="ShowContent('InstitutionId'); return true;"
					onmouseout="HideContent('InstitutionId'); return true;"
					href="javascript:ShowContent('InstitutionId')">Institution Id:</a>
				<div id="InstitutionId" style="display: none; position: absolute; border-style: solid; background-color: white; padding: 20px;">
				   Institution Id
				</div>
			</td>
			<td align="left"><input id="institutionId" type="text" maxLength="32"
				size="50" value="" name="institutionId"></td>
		</tr>
		
		<tr>
			<td class="thinfield3" height="14" colspan="3" >
			<p align="center"><b>Display Option:(Optional)</b></p>
			</td>
		</tr>
		
		<tr>
			<td class="thinfield" width="100">
				<a 	style="text-decoration: none"
					onmouseover="ShowContent('HeaderImage1'); return true;"
					onmouseout="HideContent('HeaderImage1'); return true;"
					href="javascript:ShowContent('HeaderImage1')">Header Image:</a>
				<div id="HeaderImage1" style="display: none; position: absolute; border-style: solid; background-color: white; padding: 20px;">
				   The URL where the image is stored that appears in the header of
                    customer emails. <br />The image dimensions are 43 pixels high x 240 pixels wide.
				</div>
			</td>
			<td align="left"><input id="headerImage" type="text" maxLength="32"
				size="50" value="" name="headerImage"></td>
		</tr>
		
		<tr>
			<td class="thinfield" width="150">
				<a 	style="text-decoration: none"
					onmouseover="ShowContent('MarketingImage1'); return true;"
					onmouseout="HideContent('MarketingImage1'); return true;"
					href="javascript:ShowContent('MarketingImage1')">Marketing Image:</a>
				<div id="MarketingImage1" style="display: none; position: absolute; border-style: solid; background-color: white; padding: 20px;">
				   The URL where the marketing image is stored that appears in
                        customer emails. <br />The image dimensions are 80 pixels high x 530 pixels wide.
				</div>
			</td>
			<td align="left"><input id="marketingImage" type="text" maxLength="32"
				size="50" value="" name="marketingImage"></td>
		</tr>
		<tr/><tr/>
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
</HTML>
