<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" >
	<head >
		<title>Request Permissions</title>
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

				<form name="Form1" id="Form1" method="post" action="RequestPermissionsReceipt.php">
					<center>
						<h3>Permissions - Request Permissions</h3>
						<table>

							<tr>
								<td class="thinfield" width="120">
								<a href= "" style="text-decoration:none" onmouseover="ShowContent('Callback'); return true;"onmouseout="HideContent('Callback'); return true;"href="javascript:ShowContent('Callback')">Callback:</a>
								<div id="Callback" style="display:none; position:absolute; border-style: solid; background-color: white; padding: 20px;">
									Return URL
								</div>
								</td>
								<td align="left">
								<input type="text" id="txtCallback" size="100" maxlength="100" name="txtCallback" value="<?php echo $returnURL?>"/>
								</td>
							</tr>
							<tr>
								<td class="thinfield" width="120">
								<a href= "" style="text-decoration:none" onmouseover="ShowContent('Scope'); return true;"onmouseout="HideContent('Scope'); return true;"href="javascript:ShowContent('Scope')">Scope:</a>
								<div id="Scope" style="display:none; position:absolute; border-style: solid; background-color: white; padding: 20px;">
									The Source identifies which APIs permissions has to be given
								</div>
								</td>
								<td align="left">
								<input type=checkbox name=chkScope[] value='EXPRESS_CHECKOUT'/>
								EXPRESS_CHECKOUT
								<br />
								<input type=checkbox name=chkScope[] value='DIRECT_PAYMENT'/>
								DIRECT_PAYMENT
								<br />
								<input type=checkbox name=chkScope[] value='AUTH_CAPTURE'/>
								AUTH_CAPTURE
								<br />
								<input type=checkbox name=chkScope[] value='AIR_TRAVEL'/>
								AIR_TRAVEL
								<br />
								<input type=checkbox name=chkScope[] value='TRANSACTION_SEARCH'/>
								TRANSACTION_SEARCH
								<br />
								<input type=checkbox name=chkScope[] value='RECURRING_PAYMENTS'/>
								RECURRING_PAYMENTS
								<br />
								<input type=checkbox name=chkScope[] value='ACCOUNT_BALANCE'/>
								ACCOUNT_BALANCE
								<br />
								<input type=checkbox name=chkScope[] value='ENCRYPTED_WEBSITE_PAYMENTS'/>
								ENCRYPTED_WEBSITE_PAYMENTS
								<br />
								<input type=checkbox name=chkScope[] value='REFUND'/>
								REFUND
								<br />
								<input type=checkbox name=chkScope[] value='BILLING_AGREEMENT'/>
								BILLING_AGREEMENT
								<br />
								<input type=checkbox name=chkScope[] value='REFERENCE_TRANSACTION'/>
								REFERENCE_TRANSACTION
								<br />
								<input type=checkbox name=chkScope[] value='MASS_PAY'/>
								MASS_PAY
								<br />
								<input type=checkbox name=chkScope[] value='TRANSACTION_DETAILS'/>
								TRANSACTION_DETAILS
								<br />
								<input type=checkbox name=chkScope[] value='NON_REFERENCED_CREDIT'/>
								NON_REFERENCED_CREDIT
								<br />
								<input type=checkbox name=chkScope[] value='SETTLEMENT_CONSOLIDATION'/>
								SETTLEMENT_CONSOLIDATION
								<br/>
								<input type=checkbox name=chkScope[] value='SETTLEMENT_REPORTING'/>
								SETTLEMENT_REPORTING
								<br/>
								<input type=checkbox name=chkScope[] value='BUTTON_MANAGER'/>
								BUTTON_MANAGER
								<br/>
								<input type=checkbox name=chkScope[] value='MANAGE_PENDING_TRANSACTION_STATUS'/>
								MANAGE_PENDING_TRANSACTION_STATUS
								<br/>
								<input type=checkbox name=chkScope[] value='RECURRING_PAYMENT_REPORT'/>
								RECURRING_PAYMENT_REPORT
								<br />
								<input type=checkbox name=chkScope[] value='EXTENDED_PRO_PROCESSING_REPORT'/>
								EXTENDED_PRO_PROCESSING_REPORT
								<br />
								<input type=checkbox name=chkScope[] value='EXCEPTION_PROCESSING_REPORT'/>
								EXCEPTION_PROCESSING_REPORT
								<br />
								<input type=checkbox name=chkScope[] value='ACCOUNT_MANAGEMENT_PERMISSION'/>
								ACCOUNT_MANAGEMENT_PERMISSION
								<br />
								<input type=checkbox name=chkScope[] value='INVOICING'/>
								INVOICING
								<br />
								<input type=checkbox name=chkScope[] value='ACCESS_BASIC_PERSONAL_DATA'/>
								ACCESS_BASIC_PERSONAL_DATA
								<br />
								<input type=checkbox name=chkScope[] value='ACCESS_ADVANCED_PERSONAL_DATA'/>
								ACCESS_ADVANCED_PERSONAL_DATA
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
							<tr align="right">
								<td colspan="4">
								<i>** Required</i>
								<br/>
								<br/>
								</td>
							</tr>
						</table>
					</center>
				</form>
			</div>
		</div>
	</body>
</html>
