<?php

/********************************************
CancelPermissions.php

Calls  CancelPermissionsReceipt.php,and APIError.php.
********************************************/

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
<head >
    <title>Permissions - Cancel Permissions</title>
     <link href="../Common/style.css" rel="stylesheet" type="text/css" />
   <script type="text/javascript" src="../Common/tooltip.js">
  </script>
<script type="text/javascript" src="../ToolTip.js">
</script>
</head>
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
    <form id="Form1" name="Form1"  action="CancelPermissionsReceipt.php">
     <center>  <h3>Permissions - Cancel Permissions</h3></center>
				<br />
        <table align="center" width="60%">
            <tr>
                <td style="width:200px">
                <a style="text-decoration:none" onmouseover="ShowContent('Accesstoken'); return true;"onmouseout="HideContent('Accesstoken'); return true;"href="javascript:ShowContent('Accesstoken')">
                    Access token:    
                </a>  
                <div id="Accesstoken" style="display:none; position:absolute; border-style: solid; background-color: white; padding: 20px;">Tokens are used to access resources. Access types token.</div>                               
                </td>
                 <td align="left" style="width: 408px">
                    <input type="text" id="txtAccesstoken" name="txtAccesstoken" size="100" />
                </td>
            </tr>
              <tr align="center">
			<td colspan="2"><br/>
                <a class="pop-button primary" onclick="document.Form1.submit();" id="Submit"><span>Submit</span></a>
			</td>
        </tr>
    </table>
</form>
</body>
</html>