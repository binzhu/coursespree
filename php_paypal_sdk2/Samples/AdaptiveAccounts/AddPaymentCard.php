<?php

/********************************************
AddPaymentCard.php


Calls  AddPaymentCardReceipt.php,and APIError.php.
********************************************/

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html  >
<head >
    <title>Adaptive Accounts - Add Payment Card </title>
     <link href="../Common/style.css" rel="stylesheet" type="text/css" />
   <script type="text/javascript" src="../Common/tooltip.js">
</script>

<script type="text/javascript">
function prefill()
{
	document.getElementById('emailAddress').value = "platfo@paypal.com";
	document.getElementById('fname').value = "Jhon";

	document.getElementById('lname').value = "Deo";
    document.getElementById('verificationNumber').value = "956";
	document.getElementById('postalCode').value = "78750";
	document.getElementById('line1').value = "1 Main St";
	document.getElementById('line2').value = "2nd cross";
	document.getElementById('countryCode').value = "US";
    document.getElementById('txtcity').value = "Austin";
}

	function GenerateCreditCardNumber(){
		var cc_number = new Array(16);
		var cc_len = 16;
		var start = 0;
		var rand_number = Math.random();

		switch(document.AddPaymentCardForm.creditCardType.value)
        {
			case "Visa":
				cc_number[start++] = 4;
				
				break;
			case "Discover":
				cc_number[start++] = 6;
				cc_number[start++] = 0;
				cc_number[start++] = 1;
				cc_number[start++] = 1;
				break;
			case "MasterCard":
				cc_number[start++] = 5;
				cc_number[start++] = Math.floor(Math.random() * 5) + 1;
				break;
			case "Amex":
				cc_number[start++] = 3;
				cc_number[start++] = Math.round(Math.random()) ? 7 : 4 ;
				cc_len = 15;
				break;
        }

        for (var i = start; i < (cc_len - 1); i++) {
			cc_number[i] = Math.floor(Math.random() * 10);
        }

		var sum = 0;
		for (var j = 0; j < (cc_len - 1); j++) {
			var digit = cc_number[j];
			if ((j & 1) == (cc_len & 1)) digit *= 2;
			if (digit > 9) digit -= 9;
			sum += digit;
		}

		var check_digit = new Array(0, 9, 8, 7, 6, 5, 4, 3, 2, 1);
		cc_number[cc_len - 1] = check_digit[sum % 10];

		document.AddPaymentCardForm.cardNumber.value = "";
		
		for (var k = 0; k < cc_len; k++) {
			document.AddPaymentCardForm.cardNumber.value += cc_number[k];
		}
	}
</script>
<script type="text/javascript" src="../ToolTip.js">
</script>
</head>
<body onload=GenerateCreditCardNumber();>
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
    <form id="AddPaymentCardForm" name="AddPaymentCardForm" action="AddPaymentCardReceipt.php" >
    				   <center>
    				    <h3>Adaptive Accounts - Payment Card</h3></center>
	<p class="header3"><a onclick="prefill()">Populate default values</a></p>

        <table align="center" width="80%">
            <tr>
                <td style="width:200px">
                <a style="text-decoration:none" onmouseover="ShowContent('email'); return true;"onmouseout="HideContent('email'); return true;"href="javascript:ShowContent('email')">
                    email Id: </a>
                <div id="email" style="display:none; position:absolute; border-style: solid; background-color: white; padding: 20px;">The email address for the bank</div>                  
                </td>
                 <td align="left" style="width: 408px">
                     <input type="text" id="emailAddress" name="emailAddress"  size="50"/>
                </td>
            </tr>
             <tr>
                <td style="width:200px">
                <a style="text-decoration:none" onmouseover="ShowContent('createAccKey'); return true;"onmouseout="HideContent('createAccKey'); return true;"href="javascript:ShowContent('createAccKey')">
                   Create Account Key: </a>
                <div id="createAccKey" style="display:none; position:absolute; border-style: solid; background-color: white; padding: 20px;">Key generated from Create account web flow</div>                  
                </td>
                 <td align="left" style="width: 408px">
                     <input type="text" id="createAccountKey" name="createAccountKey"  size="50"/>
                </td>
            </tr>  
            <tr>
                <td style="width:200px">
                <a style="text-decoration:none" onmouseover="ShowContent('cc'); return true;"onmouseout="HideContent('cc'); return true;"href="javascript:ShowContent('cc')">
                 Card Type:
                </a>
                <div id="cc" style="display:none; position:absolute; border-style: solid; background-color: white; padding: 20px;">Credit Card Type</div>                  
                </td>
                <td align="left" style="width: 408px">	
                    <select   name="creditCardType" id="creditCardType" onchange="javascript:GenerateCreditCardNumber(); return false;">        
                        <option  value="Visa">Visa</option>
                        <option  value="MasterCard">MasterCard</option>
                        <option  value="Discover">Discover</option>
                        <option  value="Amex">American Express</option>                    
                    </select>
                </td>
            </tr>
            <tr>
                <td style="width:200px">
                <a style="text-decoration:none" onmouseover="ShowContent('ccNumber'); return true;"onmouseout="HideContent('ccNumber'); return true;"href="javascript:ShowContent('ccNumber')">
                    Card Number: </a>
                <div id="Div1" style="display:none; position:absolute; border-style: solid; background-color: white; padding: 20px;">Credit card number</div>                  
                </td>
                 <td align="left" style="width: 408px">
                     <input type="text" id="cardNumber" name="cardNumber" />
                </td>
            </tr>  
            <tr>
                <td style="width:200px">
                <a style="text-decoration:none" onmouseover="ShowContent('firstName'); return true;"onmouseout="HideContent('firstName'); return true;"href="javascript:ShowContent('firstName')">
                    First Name: </a>
                <div id="firstName" style="display:none; position:absolute; border-style: solid; background-color: white; padding: 20px;">First Name</div>                  
                </td>
                 <td align="left" style="width: 408px">
                     <input type="text" id="fname" name="fname" />
                </td>
            </tr>  
            <tr>
                <td style="width:200px">
                <a style="text-decoration:none" onmouseover="ShowContent('lastName'); return true;"onmouseout="HideContent('lastName'); return true;"href="javascript:ShowContent('lastName')">
                    Last Name: </a>
                <div id="lastName" style="display:none; position:absolute; border-style: solid; background-color: white; padding: 20px;">First Name</div>                  
                </td>
                 <td align="left" style="width: 408px">
                     <input type="text" id="lname" name="lname" />
                </td>
            </tr>    
            <tr>
	            <td style="width:200px">
	           
	            <a style="text-decoration:none" onmouseover="ShowContent('expDate'); return true;"onmouseout="HideContent('expDate'); return true;"href="javascript:ShowContent('expDate')">
	            Expiration Date:
	            </a>
	            <div id="expDate" style="display:none; position:absolute; border-style: solid; background-color: white; padding: 20px;">Credit card expiration date</div>                  
	            </td>
	            <td>
                        <select   name="expDateMonth" id="expDateMonth" name="expDateMonth">        
                            <option  value="01">01</option>
                            <option  value="02">02</option>
                            <option  value="03">03</option>
                            <option  value="04">04</option>
                            <option  value="05">05</option>
                            <option  value="06">06</option>
                            <option  value="07">07</option>
                            <option  value="08">08</option>
                            <option  value="09">09</option>
                            <option  value="10">10</option>
                            <option  value="11">11</option>
                            <option  value="12">12</option>                     
                        </select>
                        <select   name="expDateYear" id="expDateYear" name="expDateYear">        
                            <option  value="2005">01</option>
                            <option  value="2006">2006</option>
                            <option  value="2007">2007</option>
                            <option  value="2008">2008</option>
                            <option  value="2009">2009</option>
                            <option  value="2010">2010</option>
                            <option  value="2011">2011</option>
                            <option  value="2012" selected>2012</option>
                            <option  value="2013">2013</option>
                            <option  value="2014">2014</option>
                            <option  value="2015">2015</option>                   
                        </select>            
	            </td>
            </tr>   
            <tr>
                <td style="width:200px">
                <a style="text-decoration:none" onmouseover="ShowContent('ccverificationNumber'); return true;"onmouseout="HideContent('ccverificationNumber'); return true;"href="javascript:ShowContent('ccverificationNumber')">
                    Card Verification Number: </a>
                <div id="ccverificationNumber" style="display:none; position:absolute; border-style: solid; background-color: white; padding: 20px;">First Name</div>                  
                </td>
                 <td align="left" style="width: 408px">
                     <input type="text" id="verificationNumber" name="verificationNumber" />
                </td>
            </tr>  
            <tr>
                <td style="width:200px">
                <a style="text-decoration:none" onmouseover="ShowContent('confirmation'); return true;"onmouseout="HideContent('confirmation'); return true;"href="javascript:ShowContent('confirmation')">
                    ConfirmationType:</a>
                <div id="confirmation" style="display:none; position:absolute; border-style: solid; background-color: white; padding: 20px;">
                    Whether the confirmation for the bank addition addition will be from
                    the web or via a mobile device. <br /><b>Allowable values are:</b><br />
                    <i> >> WEB</i><br />
                    <i> >> MOBILE</i><br />
                    <i> >> NONE</i>
                </div>
                </td>
                <td align="left" style="width: 408px">
                    <select id="confirmationType" name="confirmationType" >
                        <option Value="WEB">WEB</option>
                         <option Value="MOBILE">MOBILE</option>
                         <option Value="NONE">NONE</option>
                    </select></td>
            </tr>                                     
            
            <tr>
                <td style="width:200px">
                    Billing Address
                </td>
            </tr>         
            <tr>
                <td style="width:200px">
                <a style="text-decoration:none" onmouseover="ShowContent('address1'); return true;"onmouseout="HideContent('address1'); return true;"href="javascript:ShowContent('address1')">
                    Address 1:</a>
                <div id="address1" style="display:none; position:absolute; border-style: solid; background-color: white; padding: 20px;">
                Address Line 1
                </div>
                </td>
                <td align="left" style="width: 408px">
                     <input type="text" id="line1" name="line1" /></td>
            </tr>
            <tr>
                <td style="width:200px">
                <a style="text-decoration:none" onmouseover="ShowContent('address2'); return true;"onmouseout="HideContent('address2'); return true;"href="javascript:ShowContent('address2')">
                    Address 2:</a>
                <div id="Div2" style="display:none; position:absolute; border-style: solid; background-color: white; padding: 20px;">
                Address Line 2
                </div>
                </td>
                <td align="left" style="width: 408px">
                     <input type="text" id="line2" name="line2" /></td>
            </tr> 
            <tr>
                <td style="width:200px">
                <a style="text-decoration:none" onmouseover="ShowContent('city'); return true;"onmouseout="HideContent('city'); return true;"href="javascript:ShowContent('city')">
                    city:</a>
                <div id="city" style="display:none; position:absolute; border-style: solid; background-color: white; padding: 20px;">
                city
                </div>
                </td>
                <td align="left" style="width: 408px">
                     <input type="text" id="txtcity" name="txtcity" /></td>
            </tr>
            <tr>
				<td style="width:200px">
				<a style="text-decoration:none" onmouseover="ShowContent('stateCode'); return true;"onmouseout="HideContent('stateCode'); return true;"href="javascript:ShowContent('stateCode')">
				State:</a>
				<div id="stateCode" style="display:none; position:absolute; border-style: solid; background-color: white; padding: 20px;">
				State
				</div>
				</td>
				<td align="left" style="width: 408px"><select  id="addressState" name="addressState">
						<option></option>
						<option value="AK">AK</option>
						<option value="AL">AL</option>
						<option value="AR">AR</option>
						<option value="AZ">AZ</option>
						<option value="CA">CA</option>
						<option value="CO">CO</option>
						<option value="CT">CT</option>
						<option value="DC">DC</option>
						<option value="DE">DE</option>
						<option value="FL">FL</option>
						<option value="GA">GA</option>
						<option value="HI">HI</option>
						<option value="IA">IA</option>
						<option value="ID">ID</option>
						<option value="IL">IL</option>
						<option value="IN">IN</option>
						<option value="KS">KS</option>
						<option value="KY">KY</option>
						<option value="LA">LA</option>
						<option value="MA">MA</option>
						<option value="MD">MD</option>
						<option value="ME">ME</option>
						<option value="MI">MI</option>
						<option value="MN">MN</option>
						<option value="MO">MO</option>
						<option value="MS">MS</option>
						<option value="MT">MT</option>
						<option value="NC">NC</option>
						<option value="ND">ND</option>
						<option value="NE">NE</option>
						<option value="NH">NH</option>
						<option value="NJ">NJ</option>
						<option value="NM">NM</option>
						<option value="NV">NV</option>
						<option value="NY">NY</option>
						<option value="OH">OH</option>
						<option value="OK">OK</option>
						<option value="OR">OR</option>
						<option value="PA">PA</option>
						<option value="RI">RI</option>
						<option value="SC">SC</option>
						<option value="SD">SD</option>
						<option value="TN">TN</option>
						<option value="TX" selected>TX</option>
						<option value="UT">UT</option>
						<option value="VA">VA</option>
						<option value="VT">VT</option>
						<option value="WA">WA</option>
						<option value="WI">WI</option>
						<option value="WV">WV</option>
						<option value="WY">WY</option>
						<option value="AA">AA</option>
						<option value="AE">AE</option>
						<option value="AP">AP</option>
						<option value="AS">AS</option>
						<option value="FM">FM</option>
						<option value="GU">GU</option>
						<option value="MH">MH</option>
						<option value="MP">MP</option>
						<option value="PR">PR</option>
						<option value="PW">PW</option>
						<option value="VI">VI</option>
					</select></td>
					</tr>
            <tr>
                <td style="width:200px">
                <a style="text-decoration:none" onmouseover="ShowContent('zip'); return true;"onmouseout="HideContent('zip'); return true;"href="javascript:ShowContent('zip')">
                    Zip Code:</a>
                <div id="zip" style="display:none; position:absolute; border-style: solid; background-color: white; padding: 20px;">
               Postal code
                </div>
                </td>
                <td align="left" style="width: 408px">
                     <input type="text" id="postalCode" name="postalCode" /></td>
            </tr> 
            <tr>
                <td style="width:200px">
                <a style="text-decoration:none" onmouseover="ShowContent('country'); return true;"onmouseout="HideContent('country'); return true;"href="javascript:ShowContent('country')">
                    Country:</a>
                <div id="country" style="display:none; position:absolute; border-style: solid; background-color: white; padding: 20px;">
               Country code
                </div>
                </td>
                <td align="left" style="width: 408px">
                     <input type="text" id="countryCode" name="countryCode" /></td>
            </tr>                                    
                         <tr></tr>
              <tr></tr>
            <tr>
                <td  colspan="2">
                    <b>Note:</b>
                   For AddPaymentCard direct flow Create Account Key, Card Verification Number must be provided and Confirmation type must be NONE
                </td>
            </tr>
            
            
                 <tr align="center">
			<td colspan="2"><br/>
                <a class="pop-button primary" onclick="document.AddPaymentCardForm.submit();" id="Submit"><span>Submit</span></a>
			</td>
        </tr>
        </table>
    </form>
   
</body>
</html>

