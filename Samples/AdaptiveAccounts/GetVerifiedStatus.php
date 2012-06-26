<?php

/********************************************
GetVerifiedStatus.php

Calls  CreateAccountReceipt.php,and APIError.php.
********************************************/

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
<head >
    <title>Adaptive Accounts - Get verified status</title>
     <link href="../Common/style.css" rel="stylesheet" type="text/css" />
   <script type="text/javascript" src="../Common/tooltip.js">
  </script>

<script type="text/javascript">
function prefill()
{
	document.getElementById('emailAddress').value = "platfo@paypal.com";
	document.getElementById('firstName').value = "Bonzop";
	document.getElementById('lastName').value = "Zaius";
	document.getElementById('matchCriteria').value = "NAME";
}
</script>
<script type="text/javascript" src="../ToolTip.js">
</script>
</head>
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
    <form name="Form1" id="Form1" action="GetVerifiedStatusReceipt.php">
       <center>
				    <h3>Adaptive Accounts - Get verified status</h3>
		<p class="header3"><a onclick="prefill()">Populate default values</a></p>
</center>
        <table align="center" width="60%">
            <tr>
                <td style="width:200px">
                <a style="text-decoration:none" onmouseover="ShowContent('email'); return true;"onmouseout="HideContent('email'); return true;"href="javascript:ShowContent('email')">
                    email Id:    
                </a>  
                <div id="email" style="display:none; position:absolute; border-style: solid; background-color: white; padding: 20px;">The email address of the PayPal account holder</div>                               
                </td>
                 <td align="left" style="width: 408px">
                    <input type="text" id="emailAddress" name="emailAddress" size="50" />
                </td>
            </tr>
            <tr>
                <td style="width:200px">
                <a style="text-decoration:none" onmouseover="ShowContent('fname'); return true;"onmouseout="HideContent('fname'); return true;"href="javascript:ShowContent('fname')">
                    First Name:
                </a>
                <div id="fname" style="display:none; position:absolute; border-style: solid; background-color: white; padding: 20px;">The first name of the PayPal account holder</div>                  
                </td>
                <td align="left" style="width: 408px">
                    <input type="text" id="firstName" name="firstName" /></td>
            </tr>
            <tr>
                <td style="width:200px">
                <a style="text-decoration:none" onmouseover="ShowContent('lname'); return true;"onmouseout="HideContent('lname'); return true;"href="javascript:ShowContent('lname')">
                    Last Name:
                </a>
                <div id="lname" style="display:none; position:absolute; border-style: solid; background-color: white; padding: 20px;">The last name of the PayPal account holder.</div>                  
                </td>
                <td align="left" style="width: 408px">
                    <input type="text" id="lastName" name="lastName" /></td>
            </tr>
            <tr>
                <td style="width:200px">
                <a style="text-decoration:none" onmouseover="ShowContent('match'); return true;"onmouseout="HideContent('match'); return true;"href="javascript:ShowContent('match')">
                    Match Criteria:
                </a>
                <div id="match" style="display:none; position:absolute; border-style: solid; background-color: white; padding: 20px;">The criteria that must be matched in addition to emailAddress.
                Currently, only name is supported</div>                  
                </td>
                <td align="left" style="width: 408px">
                    <input type="text" id="matchCriteria" name="matchCriteria" /></td>
            </tr>
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

