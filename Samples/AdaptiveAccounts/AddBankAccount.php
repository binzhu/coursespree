
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" >
<head >
    <title>Adaptive Accounts - Add Bank Account Page</title>
     <link href="../Common/style.css" rel="stylesheet" type="text/css" />
   <script type="text/javascript" src="../Common/tooltip.js">
    </script>

<script type="text/javascript">
function prefill()
{
	document.getElementById('emailAddress').value = "platfo@paypal.com";
	document.getElementById('bankCountryCode').value = "US";
	document.getElementById('bankName').value = "Huntington Bank";
	document.getElementById('routingNumber').value = "021473030";
	var randomNumber=Math.floor(Math.random()*100001);
    document.getElementById('bankAccountNumber').value = randomNumber;

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
    <form id="Form1" name="Form1" action="AddBankAccountReceipt.php" >
        <center>
			<h3>Adaptive Accounts - Add Bank Account</h3><br />
			  </center>	
		
			<p class="header3"><a onclick="prefill()">Populate default values</a></p>
        <table align="center" width="80%">
            <tr>
                <td style="width:200px">
                <a style="text-decoration:none" onmouseover="ShowContent('email'); return true;"onmouseout="HideContent('email'); return true;"href="javascript:ShowContent('email')">
                    email Id: </a>
                <div id="email" style="display:none; position:absolute; border-style: solid; background-color: white; padding: 20px;">The email address for the bank</div>                  
                </td>
                 <td align="left" style="width: 408px">
                    <input type ="text" id="emailAddress" name="email"size="50"/>
                </td>
            </tr>
            <tr>
                <td style="width:200px">
                <a style="text-decoration:none" onmouseover="ShowContent('createAccKey'); return true;"onmouseout="HideContent('createAccKey'); return true;"href="javascript:ShowContent('createAccKey')">
                   Create Account Key: </a>
                <div id="createAccKey" style="display:none; position:absolute; border-style: solid; background-color: white; padding: 20px;">Key generated from Create account web flow</div>                  
                </td>
                 <td align="left" style="width: 408px">
                    <input type=text id=createAccountKey name=createAccountKey size="50"/>
                </td>
            </tr>            
            <tr>
                <td style="width:200px">
                <a style="text-decoration:none" onmouseover="ShowContent('countryCode'); return true;"onmouseout="HideContent('countryCode'); return true;"href="javascript:ShowContent('countryCode')">
                    Bank Country Code:</a>
                <div id="countryCode" style="display:none; position:absolute; border-style: solid; background-color: white; padding: 20px;">
                    The country code for the bank. Allowable values are:<br />
                        >><i> Australia – AU</i><br />
                        >><i>  Canada – CA</i><br />
                        >><i>  France – FR</i><br />
                        >><i>  Germany – DE</i><br />
                        >><i>  Israel – AU</i><br />
                        >><i>  Italy – IT</i><br />
                        >><i>  Netherlands – NL</i><br />
                        >><i>  United States– US</i><br />
                </div>
                </td>
                <td align="left" style="width: 408px">
                    <input type="text" id ="bankCountryCode" name="bankCountryCode"/></td>
            </tr>
            <tr>
                <td style="width:200px">
                <a style="text-decoration:none" onmouseover="ShowContent('bank'); return true;"onmouseout="HideContent('bank'); return true;"href="javascript:ShowContent('bank')">
                    Bank Name:</a>
                <div id="bank" style="display:none; position:absolute; border-style: solid; background-color: white; padding: 20px;">
                    The name of the bank. The default is UNKNOWN.
                </div>
                </td>
                <td align="left" style="width: 408px">
                    <input type="text" id="bankName" name="bankName" /></td>
            </tr>
            <tr>
                <td style="width:200px">
                <a style="text-decoration:none" onmouseover="ShowContent('routingNo'); return true;"onmouseout="HideContent('routingNo'); return true;"href="javascript:ShowContent('routingNo')">
                    Routing Number:</a>
                <div id="routingNo" style="display:none; position:absolute; border-style: solid; background-color: white; padding: 20px;">
                    The bank’s routing number
                </div>
                </td>
                <td align="left" style="width: 408px">
                   <input type="text" id="routingNumber" name="routingNumber" /></td>
            </tr>
            <tr>
                <td style="width:200px">
                <a style="text-decoration:none" onmouseover="ShowContent('accountNumber'); return true;"onmouseout="HideContent('accountNumber'); return true;"href="javascript:ShowContent('accountNumber')">
                    Bank Account Number:</a>
               <div id="accountNumber" style="display:none; position:absolute; border-style: solid; background-color: white; padding: 20px;">
                    The account number (BBAN) of the bank account to be added
               </div>
                </td>
                <td align="left" style="width: 408px">
                     <input type="text" id="bankAccountNumber" name="bankAccountNumber" /></td>
            </tr>
            <tr>
                <td style="width:200px">
                <a style="text-decoration:none" onmouseover="ShowContent('accountType'); return true;"onmouseout="HideContent('accountType'); return true;"href="javascript:ShowContent('accountType')">
                   Account type:</a>
                   <div id="accountType" style="display:none; position:absolute; border-style: solid; background-color: white; padding: 20px;">
                    The type of bank account to be added.<br /><b> Allowable values are:</b><br />
                        <i> >> CHECKING</i><br />
                        <i> >> SAVINGS</i><br />
                        <i> BUSINESS_SAVINGS</i><br />
                        <i>BUSINESS_CHECKINGS</i><br />
                        <i> NORMAL</i><br />
                        <i>UNKNOWN </i>
                   </div>
                </td>
                <td align="left" style="width: 408px">
                    <select id="bankAccountType" name="bankAccountType">
                      <option value="CHECKING">CHECKING</option>
                        <option value="SAVING">SAVING</option>
                        <option value="BUSINESS_CHECKING">BUSINESS_CHECKING</option>
                        <option value="NORMAL">NORMAL</option>
                         <option value="UNKNOWN">UNKNOWN</option> </select>
                  </td>
            </tr>
            <tr>
                <td style="width:200px">
                <a style="text-decoration:none" onmouseover="ShowContent('confirmation'); return true;"onmouseout="HideContent('confirmation'); return true;"href="javascript:ShowContent('confirmation')">
                    confirmationType:</a>
                <div id="confirmation" style="display:none; position:absolute; border-style: solid; background-color: white; padding: 20px;">
                    Whether the confirmation for the bank addition addition will be from
                    the web or via a mobile device. <br /><b>Allowable values are:</b><br />
                    <i> >> WEB</i><br />
                    <i> >> MOBILE</i><br />
                    <i> >> NONE</i>
                </div>
                </td>
                <td align="left" style="width: 408px">
                    <select id="confirmationType" name="confirmationType">
                       <option value="WEB" >WEB</option>
                        <option value="MOBILE">MOBILE</option>
                        <option value="NONE">NONE</option></select>
                    </td>
            </tr>
             <tr></tr>
              <tr></tr>
            <tr>
                <td  colspan="2">
                    <b>Note:</b>
                   For AddBankAccount direct flow Create Account Key must be provided and Confirmation type must be NONE
                </td>
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
