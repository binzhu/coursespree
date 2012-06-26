<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" >
<head >
    <title>Preapproval Detail </title>
     <link href="../Common/style.css" rel="stylesheet" type="text/css" />
     <script type="text/javascript" src="../Common/tooltip.js">
    </script>
</head>

<script type="text/javascript">
function prefill()
{
	document.getElementById('txtPayKey').value = "PA-9EH2527802434180H";

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
					<h3><b>Adaptive Payments - Pay</b></h3>
					<p class="header3"><a onclick="prefill()">Populate default values</a></p>
				</center>
				<br/>
   
    <form id="form1" name="Form1" action = "PreapprovalDetails.php?cs=s">

<table align="center">
            <tr>
                
            </tr>
            <tr>
                <td style="width: 120px">
                   <a href= "" style="text-decoration:none" onmouseover="ShowContent('preaproovalKey'); return true;"onmouseout="HideContent('preaproovalKey'); return true;"href="javascript:ShowContent('preaproovalKey')"> 
                        Preapproval Key
                   </a>
                  <div id="preaproovalKey" style="display:none; position:absolute; border-style: solid; background-color: white; padding: 20px;">The pay key that identifies the payment for which you want to
                    retrieve details. <br />This is the pay key returned in the PayResponse message.</div>
                </td>
                <td style="width: 100px">
                    <input type ="text" id="txtPayKey" name= "preapprovalKey" size="50" /></td>
               
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
