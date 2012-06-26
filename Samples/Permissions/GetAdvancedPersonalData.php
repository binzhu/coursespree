<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" >
	<head >
		<title>GetAdvancedPersonalData</title>
		<link href="../Common/style.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="../Common/tooltip.js"></script>
	</head>
	<body >
		<br/>
		<div id="jive-wrapper">
			<div id="jive-header">
				<div id="logo">
					<span >
						You must be Logged in to
						<a href="<?php echo DEVELOPER_PORTAL;?>" target="_blank">PayPal sandbox</a>
					</span>
					<a title="Paypal X Home" href="#">
					<div id="titlex">
					</div>
					</a>
				</div>
			</div>
			<?php
require_once '../Common/menu.html';
			?>
			<div id="request_form">

				<?php
require_once '../Common/menu.html';
$serverName=$_SERVER['SERVER_NAME'];
$serverPort=$_SERVER['SERVER_PORT'];
$url=dirname('http://'.$serverName.':'.$serverPort.$_SERVER['REQUEST_URI']);
$returnURL=$url."/../Common/WebflowReturnPage.php";
				?>

				<form name="Form1" id="Form1" method="post" action="GetAdvancedPersonalDataReceipt.php">
					<center>
						<h3>Permissions - GetAdvancedPersonalData</h3>
						<table>
<tr>
<td class="smalltext" width="52">Advanced Attributes:/td>
<td align="left">
								<input type=checkbox name=attr[] value='http://axschema.org/namePerson/first' checked=true/>
								FirstName
								<br />
								<input type=checkbox name=attr[] value='http://axschema.org/namePerson/last' checked=true/>
								LastName
								<br />
								<input type=checkbox name=attr[] value='http://axschema.org/contact/email' checked=true/>
								Email
								<br />
								<input type=checkbox name=attr[] value='http://schema.openid.net/contact/fullname' checked=true/>
								FullName
								<br />
								<input type=checkbox name=attr[] value='http://axschema.org/company/name' checked=true/>
								BusinessName
								<br />
								<input type=checkbox name=attr[] value='http://axschema.org/contact/country/home' checked=true/>
								CountryCode
								<br />
								<input type=checkbox name=attr[] value='http://axschema.org/birthDate' checked=true/>
								BirthDate
								<br />
								<input type=checkbox name=attr[] value='http://axschema.org/contact/postalCode/home' checked=true/>
								PostalCode
								<br />
								<input type=checkbox name=attr[] value='http://schema.openid.net/contact/street1' checked=true/>
								Street Line 1
								<br />
								<input type=checkbox name=attr[] value='http://schema.openid.net/contact/street2' checked=true/>
								Street Line 2
								<br />
								<input type=checkbox name=attr[] value='http://axschema.org/contact/city/home' checked=true/>
								City
								<br />
								<input type=checkbox name=attr[] value='http://axschema.org/contact/state/home' checked=true/>
								State
								<br />
								<input type=checkbox name=attr[] value='http://axschema.org/contact/phone/default' checked=true/>
								Phone
								<br />
								<input type=checkbox name=attr[] value='https://www.paypal.com/webapps/auth/schema/payerID' checked=true/>
								PayerId
								<br />
								
								</td>
</tr>
							<tr align="center">
								<td colspan="2">
								<br/>
								<a class="pop-button primary" onclick="document.Form1.submit();" id="Submit">
								<span>Submit</span>
								</a>
								</td>
							</tr>
						</table>
					</center>
				</form>
			</div>
		</div>
	</body>
</html>
