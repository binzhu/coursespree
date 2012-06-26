<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<HTML>
	<HEAD>
		<title>PayPal SDK - Adaptive Payments CancelPreapproval</title>
		 <link href="../Common/style.css" rel="stylesheet" type="text/css" />
		 <script type="text/javascript" src="../Common/tooltip.js">
    </script>
	</HEAD>
<script type="text/javascript">
function prefill()
{
	document.getElementById('preapprovalKey').value = "PA-1B596337Y5206552R";

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
		<form id="Form1" name="Form1" method="post"action = "CancelPreapprovalReceipt.php?cs=s">
		<center> 
				<h3>Adaptive Payments -CancelPreapproval</h3><br></br>
				
					
						<p class="header3"><a onclick="prefill()">Populate default values</a></p>
					
					
				<table align="center">
					<tr>
						<td class="thinfield"><a href= "" style="text-decoration:none" onmouseover="ShowContent('preaproovalKey'); return true;"onmouseout="HideContent('preaproovalKey'); return true;"href="javascript:ShowContent('preaproovalKey')">Pre Approval Key:</a>
<div id="preaproovalKey" style="display:none; position:absolute; border-style: solid; background-color: white; padding: 20px;"> The preapproval key that identifies the preapproval to be canceled..</div>
</td>
						<td><input type="text" name="preapprovalKey" id="preapprovalKey" size="50" value=""></td>
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
			</center>
			
		</form>
		</div>
		</div>
	</body>
</HTML>
