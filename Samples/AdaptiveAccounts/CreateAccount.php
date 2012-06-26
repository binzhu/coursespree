<?php

/********************************************
CreateAccount.php


Calls  CreateAccountReceipt.php,and APIError.php.
********************************************/

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html  >
<head >
    <title>Adaptive Accounts - Add Bank Account Page</title>
     <link href="../Common/style.css" rel="stylesheet" type="text/css" />
   <script type="text/javascript" src="../Common/tooltip.js">
    </script>
<script type="text/javascript">
function prefill()
{
	document.getElementById('firstName').value = "Bonzop";
	document.getElementById('middleName').value = "Simore";
	document.getElementById('lastName').value = "Zaius";
	document.getElementById('dateOfBirth').value = "1968-01-01Z";
	document.getElementById('address1').value = "1968 Ape Way";
	document.getElementById('address2').value = "Apt 123";
	document.getElementById('city').value = "Austin";
	document.getElementById('postalCode').value = "78750";
	document.getElementById('countryCode').value = "US";
	document.getElementById('citizenshipCountryCode').value = "US";
	document.getElementById('contactPhoneNumber').value = "5126914160";
	document.getElementById('notificationUrl').value = "http://stranger.paypal.com/cgi-bin/ipntest.cgi";
	document.getElementById('p1').value = "p1";
	document.getElementById('p2').value = "p2";
	document.getElementById('p3').value = "p3";
	document.getElementById('p4').value = "p4";
	document.getElementById('p5').value = "p5";
	document.getElementById('sandboxDeveloperEmail').value = "Platform.sdk.seller@gmail.com";
	document.getElementById('sandboxEmail').value = "platfo_1255076101_per@gmail.com";
	
	
	document.getElementById('businessName').value = "Bonzop";
	document.getElementById('businessAddress1').value = "1968 Ape Way";
	document.getElementById('businessAddress2').value = "Apt 123";
	
	document.getElementById('businessCity').value = "Austin";
	document.getElementById('businessZip').value = "78750";
	document.getElementById('businessCountry').value = "US";
	document.getElementById('businessPhone').value = "5126914160";
	document.getElementById('businessCategory').value = "1001";
	document.getElementById('businessSubCategory').value = "2001";
	document.getElementById('businessCustomerServicePhone').value = "5126914160";
	document.getElementById('businessCustomerServiceEmail').value = "platfo_1255076101_per@gmail.com";
	document.getElementById('businessWeb').value = "https://www.x.com";
	document.getElementById('dateOfEstablishment').value = "2000-01-01";
	document.getElementById('avgPrice').value = "1.00";
	document.getElementById('averageMonthlyVolume').value = "100";
	document.getElementById('percentageRevenueFromOnline').value = "60";
	document.getElementById('salesVenue').value = "WEB";	

}

function dropdown_change(elem)
{
    if (document.getElementById('AccountType').value=="BUSINESS")
    {
        elem.style.display ='block';
    }
    else if ((document.getElementById('AccountType').value=="PERSONAL")||(document.getElementById('AccountType').value=="PREMIER"))
    {
        elem.style.display ='none';
    }

}
</script>
<script type="text/javascript" src="../ToolTip.js">
</script>
</head>
<body onload="dropdown_change(document.getElementById('business'));">

<br/>
        <div id="jive-wrapper">
            <div id="jive-header">
                <div id="logo">
                    <span >You must be Logged in to <a href="<?php echo DEVELOPER_PORTAL;?>" target="_blank">PayPal sandbox</a></span>
                    <a title="Paypal X Home" href="#"><div id="titlex"></div></a>
                </div>
            </div>

		<?php  require_once '../Common/menu.html';?>
<div id="request_form">
    <form name="Form1" id="Form1" action="CreateAccountReceipt.php">
    <center>
        <h3>Adaptive Accounts - Create Account</h3>
        </center>
					<p class="header3"><a onclick="prefill()">Populate default values</a></p>
		
		<table align="center" width="80%">
		    <tr>
		    <td><center>
					<h5>Personal Info</h5></center>
				</td>
			</tr>
		    <tr>
		        <td>
		            <a style="text-decoration:none" onmouseover="ShowContent('infoAccountType'); return true;"onmouseout="HideContent('infoAccountType'); return true;"href="javascript:ShowContent('infoAccountType')">
		                Account Type:
		            </a>
		            <div id="infoAccountType" style="display:none; position:absolute; border-style: solid; background-color: white; padding: 20px;">
		                The type of account to be created. <br /><b>Allowable values are:</b><br />
                            >><i> Personal – Personal account</i><br />
                            >><i> Premier – Premier account</i><br />
                            >><i> Business – Business account</i><br />
		            </div>                  
		        </td>
		        <td style="width: 408px">
                    <select id="AccountType" name="accountType"  onchange="dropdown_change(document.getElementById('business'));">
                       <option value="PERSONAL">PERSONAL</option>
                        <option value="PREMIER">PREMIER</option>
                        <option value="BUSINESS">BUSINESS</option></select>
                   </td>
		    </tr>
		    <tr>
		        <td>
		        <a style="text-decoration:none" onmouseover="ShowContent('infoSalutation'); return true;"onmouseout="HideContent('infoSalutation'); return true;"href="javascript:ShowContent('infoSalutation')">
		            Salutation:
		        </a>
		        <div id="infoSalutation" style="display:none; position:absolute; border-style: solid; background-color: white; padding: 20px;">
		            A salutation for the account user
		        </div>                  
		        </td>
		        <td style="width: 408px">
                   <select id="salutation" name="salutation" >
                   <option value="Mr.">Mr.</option>
                         <option value="Dr.">Dr.</option>
                         <option value="Mrs.">Mrs.</option></select>
                    </td>
		    </tr>
		    <tr>
		        <td style="width:200px">
		            <a style="text-decoration:none" onmouseover="ShowContent('infoFirstName'); return true;"onmouseout="HideContent('infoFirstName'); return true;"href="javascript:ShowContent('infoFirstName')">
                        First Name:
                    </a>
                    <div id="infoFirstName" style="display:none; position:absolute; border-style: solid; background-color: white; padding: 20px;">
                        First name of the account user
                        
                    </div>                  
                </td>
		        <td align="left" style="width: 408px">
                     <input type="text" id="firstName"  name="firstName" /></td>
		    </tr>
		    <tr>
		        <td style="width:200px">
		            <a style="text-decoration:none" onmouseover="ShowContent('infoMiddleName'); return true;"onmouseout="HideContent('infoMiddleName'); return true;"href="javascript:ShowContent('infoMiddleName')">
                        Middle Name:
                    </a>
                    <div id="infoMiddleName" style="display:none; position:absolute; border-style: solid; background-color: white; padding: 20px;">
                        Middle name of the account user
                    </div>                  
                </td>
		        <td align="left" style="width: 408px">
                     <input type="text" id="middleName" name="middleName" /></td>
		    </tr>
		    <tr>
		        <td style="width:200px">
		        <a style="text-decoration:none" onmouseover="ShowContent('infoLastName'); return true;"onmouseout="HideContent('infoLastName'); return true;"href="javascript:ShowContent('infoLastName')">
                    Last Name:
                </a>
                <div id="infoLastName" style="display:none; position:absolute; border-style: solid; background-color: white; padding: 20px;">
                    Last name of the account user
                </div>                  
                </td>
		        <td align="left" style="width: 408px">
                   <input type="text" id="lastName" name="lastName" /></td>
		    </tr>
		    <tr>
		        <td style="width:200px">
		            <a style="text-decoration:none" onmouseover="ShowContent('infoDateOfBirth'); return true;"onmouseout="HideContent('infoDateOfBirth'); return true;"href="javascript:ShowContent('infoDateOfBirth')">
                        DOB:
                    </a>
                    <div id="infoDateOfBirth" style="display:none; position:absolute; border-style: solid; background-color: white; padding: 20px;">
                        The date of birth of the person for whom the PayPal account is
                        created. <br />Use YYYY-MM-DDZ format; for example 1970-01-01Z.<br />
                        <i>NOTE:</i> This field may not be required for certain countries.PayPal
                        recommends<br /> passing the date of birth to avoid the return of an error in
                        case the field is required.
                    </div>                  
                </td>
		        <td align="left" style="width: 408px">
                     <input type="text" id="dateOfBirth" name="dateOfBirth" /></td>
		    </tr>
		    <tr>
		        <td style="width:200px; height: 21px;">
		            <a style="text-decoration:none" onmouseover="ShowContent('infoAddress1'); return true;"onmouseout="HideContent('infoAddress1'); return true;"href="javascript:ShowContent('infoAddress1')">
                        Address1:
                    </a>
                    <div id="infoAddress1" style="display:none; position:absolute; border-style: solid; background-color: white; padding: 20px;">The street address</div>                  
                </td>
		        <td align="left" style="width: 408px; height: 21px;">
                   <input type="text" id="address1" name="address1"/></td>
		    </tr>
		    <tr>
		        <td style="width:200px; height: 26px;">
		        <a style="text-decoration:none" onmouseover="ShowContent('infoAddress2'); return true;"onmouseout="HideContent('infoAddress2'); return true;"href="javascript:ShowContent('infoAddress2')">
                    Address2:
                </a>
                <div id="infoAddress2" style="display:none; position:absolute; border-style: solid; background-color: white; padding: 20px;">
                    The second line of the address.<br />
                    <i>NOTE:</i> This field is required for Brazilian addresses
                </div>                  
                </td>
		        <td align="left" style="width: 408px; height: 26px;">
                   <input type="text" id="address2" name="address2" /></td>
		    </tr>
		    <tr>
		        <td style="width:200px">
		        <a style="text-decoration:none" onmouseover="ShowContent('infoCity'); return true;"onmouseout="HideContent('infoCity'); return true;"href="javascript:ShowContent('infoCity')">
                    City:
                </a>
                <div id="infoCity" style="display:none; position:absolute; border-style: solid; background-color: white; padding: 20px;">The city.</div>                  
                </td>
		        <td align="left" style="width: 408px">
                     <input type="text" id="city" name="city"/></td>
		    </tr>
		    <tr>
		        <td style="height: 21px">
		        <a style="text-decoration:none" onmouseover="ShowContent('infoState'); return true;"onmouseout="HideContent('infoState'); return true;"href="javascript:ShowContent('infoState')">
                    State:
                </a>
                <div id="infoState" style="display:none; position:absolute; border-style: solid; background-color: white; padding: 20px;">The state code</div>                  
                </td>
		        <td style="height: 21px">
                    <select id="state" name="state" >
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
            <option value="VI">VI</option> </select>                                                                                      
                   </td>
		    </tr>	
		    <tr>
		        <td style="width:200px">
		        <a style="text-decoration:none" onmouseover="ShowContent('infoPostalCode'); return true;"onmouseout="HideContent('infoPostalCode'); return true;"href="javascript:ShowContent('infoPostalCode')">
                    ZIP Code:
                </a>
                <div id="infoPostalCode" style="display:none; position:absolute; border-style: solid; background-color: white; padding: 20px;">The zip or postal code</div>                  
                </td>
		        <td align="left" style="width: 408px">
                    <input type="text" id="postalCode" name="postalCode" /></td>
		    </tr>	
		    <tr>
		        <td style="width:200px; height: 26px;">
		        <a style="text-decoration:none" onmouseover="ShowContent('infoCountryCode'); return true;"onmouseout="HideContent('infoCountryCode'); return true;"href="javascript:ShowContent('infoCountryCode')">
                    Country:
                </a>
                <div id="infoCountryCode" style="display:none; position:absolute; border-style: solid; background-color: white; padding: 20px;">
                    The country code. <br /><b>Allowable values are:</b><br />
                       >> <i>Australia – AU</i><br />
                        >> <i>Canada – CA</i><br />
                        >> <i> Czech Republic – CZ</i><br />
                        >> <i> France – FR</i><br />
                        >> <i> Germany – DE</i><br />
                        >> <i> Greece – GR</i><br />
                        >> <i> Israel – IL</i><br />
                        >> <i> Italy – IT</i><br />
                        >> <i> Japan – JP</i><br />
                        >> <i> Netherlands – NL</i><br />
                        >> <i> Poland – PL</i><br />
                        >> <i> Russian Federation – RU</i><br />
                        >> <i> Spain – ES</i><br />
                        >> <i> United Kingdom – GB</i><br />
                        >> <i> United States – US</i>
                </div>                  
                </td>
		        <td align="left" style="width: 408px; height: 26px;">
                    <input type="text" id="countryCode" name="countryCode" /></td>
		    </tr>
		    <tr>
		        <td style="width:200px">
		        <a style="text-decoration:none" onmouseover="ShowContent('infoCitizenshipCountryCode'); return true;"onmouseout="HideContent('infoCitizenshipCountryCode'); return true;"href="javascript:ShowContent('infoCitizenshipCountryCode')">
                    CitizenshipCountryCode:
                </a>
                <div id="infoCitizenshipCountryCode" style="display:none; position:absolute; border-style: solid; background-color: white; padding: 20px;">
                    The code of the country to be associated with the account.<br />
                        <b>Allowable values are:</b><br />
                        >> <i> Argentina – AR (Personal/Premier accounts only)</i><br />
                        >> <i> Australia – AU</i><br />
                        >> <i> Brazil – BR (Personal/Premier accounts only)</i><br />
                        >> <i> Canada – CA</i><br />
                        >> <i> China – CN (Personal/Premier accounts only)</i><br />
                        >> <i> Czech Republic – CZ</i><br />
                        >> <i> France – FR</i><br />
                        >> <i> Germany – DE</i><br />
                        >> <i> Greece – GR</i><br />
                        >> <i> Israel – IL</i><br />
                        >> <i> Italy – IT</i><br />
                        >> <i> Japan – JP</i><br />
                        >> <i> Malaysia – MY (Personal/Premier accounts only)</i><br />
                        >> <i> Mexico – MX (Personal/Premier accounts only)</i><br />
                        >> <i> Netherlands – NL</i><br />
                        >> <i> Poland – PL</i><br />
                        >> <i> Russian Federation – RU</i><br />
                        >> <i> Spain – ES</i><br />
                        >> <i> United Kingdom – GB</i><br />
                        >> <i> United States – US</i>
                </div>                  
                </td>
		        <td align="left" style="width: 408px">
                    <input type="text" id="citizenshipCountryCode" name="citizenshipCountryCode" /></td>
		    </tr>
		    <tr>
		        <td style="width:200px; height: 21px;">
		        <a style="text-decoration:none" onmouseover="ShowContent('infoContactPhoneNumber'); return true;"onmouseout="HideContent('infoContactPhoneNumber'); return true;"href="javascript:ShowContent('infoContactPhoneNumber')">
                    Contact Phone Number:
                </a>
                <div id="infoContactPhoneNumber" style="display:none; position:absolute; border-style: solid; background-color: white; padding: 20px;">Phone number to be associated with the account</div>                  
                </td>
		        <td align="left" style="width: 408px; height: 21px;">
                   <input type="text" id="contactPhoneNumber" name="contactPhoneNumber" /></td>
		    </tr>
		    <tr>
		        <td style="width:200px">
		        <a style="text-decoration:none" onmouseover="ShowContent('infoNotificationUrl'); return true;"onmouseout="HideContent('infoNotificationUrl'); return true;"href="javascript:ShowContent('infoNotificationUrl')">
                    Notification URL:
                </a>
                <div id="infoNotificationUrl" style="display:none; position:absolute; border-style: solid; background-color: white; padding: 20px;">
                    The URL to post instant payment notification (IPN) messages to
                    regarding account creation. <br />This URL supersedes the IPN notification URL set
                    in the merchant profile.<br />
                    Maximum string length: between 1 and 1024 characters of the pattern <[a-aZZ]+\://){
                    1}\S+
                </div>                  
                </td>
		        <td align="left" style="width: 408px">
                    <input type="text" id="notificationUrl" name="notificationUrl" /></td>
		    </tr>
		    <tr>
		        <td style="width:200px">
		        <a style="text-decoration:none" onmouseover="ShowContent('infoP1'); return true;"onmouseout="HideContent('infoP1'); return true;"href="javascript:ShowContent('infoP1')">
                    partnerField1:
                </a>
                <div id="infoP1" style="display:none; position:absolute; border-style: solid; background-color: white; padding: 20px;">
                    A maximum of five fields for your own use, where n is a digit
                    between 1 and 5, inclusive.
                </div>                  
                </td>
		        <td align="left" style="width: 408px">
                    <input type="text" id="p1" name="p1" /></td>
		    </tr>
		    <tr>
		        <td style="width:200px">
		        <a style="text-decoration:none" onmouseover="ShowContent('infoP2'); return true;"onmouseout="HideContent('infoP2'); return true;"href="javascript:ShowContent('infoP2')">
                    partnerField2:
                </a>
                <div id="infoP2" style="display:none; position:absolute; border-style: solid; background-color: white; padding: 20px;">
                    A maximum of five fields for your own use, where n is a digit
                    between 1 and 5, inclusive.
                </div>                  
                </td>
		        <td align="left" style="width: 408px">
                    <input type="text" id="p2" name="p2" /></td>
		    </tr>
		    <tr>
		        <td style="width:200px">
		        <a style="text-decoration:none" onmouseover="ShowContent('infoP3'); return true;"onmouseout="HideContent('infoP3'); return true;"href="javascript:ShowContent('infoP3')">
                    partnerField3:
                </a>
                <div id="infoP3" style="display:none; position:absolute; border-style: solid; background-color: white; padding: 20px;">
                    A maximum of five fields for your own use, where n is a digit
                    between 1 and 5, inclusive.
                </div>                  
                </td>
		        <td align="left" style="width: 408px">
                    <input type="text" id="p3" name="p3" /></td>
		    </tr>
		    <tr>
		        <td style="width:200px">
		        <a style="text-decoration:none" onmouseover="ShowContent('infoP4'); return true;"onmouseout="HideContent('infoP4'); return true;"href="javascript:ShowContent('infoP4')">
                    partnerField4:
                </a>
                <div id="infoP4" style="display:none; position:absolute; border-style: solid; background-color: white; padding: 20px;">
                    A maximum of five fields for your own use, where n is a digit
                    between 1 and 5, inclusive.
                </div>                  
                </td>
		        <td align="left" style="width: 408px">
                    <input type="text" id="p4" name="p4" /></td>
		    </tr>
		    <tr>
		        <td style="width:200px">
		        <a style="text-decoration:none" onmouseover="ShowContent('infoP5'); return true;"onmouseout="HideContent('infoP5'); return true;"href="javascript:ShowContent('infoP5')">
                    partnerField5:
                </a>
                <div id="infoP5" style="display:none; position:absolute; border-style: solid; background-color: white; padding: 20px;">
                  A maximum of five fields for your own use, where n is a digit
                    between 1 and 5, inclusive.
                </div>                  
                </td>
		        <td align="left" style="width: 408px">
                   <input type="text" id="p5" name="p5" /></td>
		    </tr>
		    <tr>
		        <td>
		        <a style="text-decoration:none" onmouseover="ShowContent('infoCurrencyCode'); return true;"onmouseout="HideContent('infoCurrencyCode'); return true;"href="javascript:ShowContent('infoCurrencyCode')">
                    currencyCode:
                </a>
                <div id="infoCurrencyCode" style="display:none; position:absolute; border-style: solid; background-color: white; padding: 20px;">
                    The code of the currency to be associated with the account. <br />It is one
                        of the following values:<br />
                        >> <i>  Australian Dollar – AUD</i><br />
                        >> <i>  Canadian Dollar – CAD</i><br />
                        >> <i>  Czech Koruna – CZK</i><br />
                        >> <i>  Danish Krone – DKK</i><br />
                        >> <i>  Euro – EUR</i><br />
                        >> <i>  Hong Kong Dollar – HKD</i><br />
                        >> <i>  Hungarian Forint – HUF</i><br />
                        >> <i>  Israeli New Sheqel – ILS</i><br />
                        >> <i>  Japanese Yen – JPY</i><br />
                        >> <i>  New Zealand Dollar – NZD</i><br />
                        >> <i>  Polish Zloty – PLN</i><br />
                        >> <i>  Pound Sterling – GBP</i><br />
                        >> <i>  Swiss Franc – CHF</i><br />
                        >> <i>  U.S. Dollar – USD</i>
                </div>                  
                </td>
		        <td>
                     <select id="currencyCode" name="currencyCode" >
                        <option value="USD">USD</option>  
                        <option value="GBP">GBP</option>
                         <option value="EUR">EUR</option>
                         <option value="JPY">JPY</option>
                        <option value="CAD">CAD</option>
                       <option value="AUD">AUD</option>             
                    </select></td>
		    </tr>
		    <tr>
		        <td style="width:200px">
		        <a style="text-decoration:none" onmouseover="ShowContent('infoSandboxDeveloperEmail'); return true;"onmouseout="HideContent('infoSandboxDeveloperEmail'); return true;"href="javascript:ShowContent('infoSandboxDeveloperEmail')">
                    Sandbox Developer Central Email(only for Sandbox):
                </a>
                <div id="infoSandboxDeveloperEmail" style="display:none; position:absolute; border-style: solid; background-color: white; padding: 20px;">sandbox account</div>                  
                </td>
		        <td align="left" style="width: 408px">
                    <input type="text" id="sandboxDeveloperEmail" name="sandboxDeveloperEmail" size="50"/></td>
		    </tr>
		    <tr>
		        <td style="width:200px">
		        <a style="text-decoration:none" onmouseover="ShowContent('infoSandboxEmail'); return true;"onmouseout="HideContent('infoSandboxEmail'); return true;"href="javascript:ShowContent('infoSandboxEmail')">
                    Email:
                </a>
                <div id="infoSandboxEmail" style="display:none; position:absolute; border-style: solid; background-color: white; padding: 20px;">sandbox Email Address</div>                  
                </td>
		        <td align="left" style="width: 408px">
                    <input type="text" id="sandboxEmail" name="newemail" size="50" /></td>
		    </tr>
		</table>
		    <div id="business" >
		<table align="center" width="80%">
		    <tr>
				<td>
					<h5>Business Info:</h5>
				</td>
			</tr>
			<tr>
		        <td style="width:200px"> 
		        <a style="text-decoration:none" onmouseover="ShowContent('infoBusinessName'); return true;"onmouseout="HideContent('infoBusinessName'); return true;"href="javascript:ShowContent('infoBusinessName')">
		            businessName: 
		        </a>  
		        <div id="infoBusinessName" style="display:none; position:absolute; border-style: solid; background-color: white; padding: 20px;">The name of the business for which the PayPal account is created.</div>                       
                </td>
		        <td align="left" style="width: 410px">
                   <input type="text" id="businessName" name="businessName" /></td>
		    </tr>
		    <tr>
		        <td style="width:200px"> 
		        <a style="text-decoration:none" onmouseover="ShowContent('infoBusinessAddress1'); return true;"onmouseout="HideContent('infoBusinessAddress1'); return true;"href="javascript:ShowContent('infoBusinessAddress1')"> 
		         BizAddressline1: 
		        </a>   
		        <div id="infoBusinessAddress1" style="display:none; position:absolute; border-style: solid; background-color: white; padding: 20px;">The address of the stakeholder in the business for which the PayPal
                   account is created.</div>                     
                </td>
		        <td align="left" style="width: 410px">
                    <input type="text" id="businessAddress1" name="businessAddress1" /></td>
		    </tr>
			<tr>
		        <td style="width:200px">
		        <a style="text-decoration:none" onmouseover="ShowContent('infoBusinessAddress2'); return true;"onmouseout="HideContent('infoBusinessAddress2'); return true;"href="javascript:ShowContent('infoBusinessAddress2')">
		            BizAddressline2:  
		        </a> 
		        <div id="infoBusinessAddress2" style="display:none; position:absolute; border-style: solid; background-color: white; padding: 20px;">The address of the stakeholder in the business for which the PayPal
                    account is created.</div>                        
                </td>
		        <td align="left" style="width: 410px">
                    <input type="text" id="businessAddress2" name="businessAddress2" /></td>
		    </tr>
			<tr>
		        <td style="width:200px"> 
		        <a style="text-decoration:none" onmouseover="ShowContent('infoBusinessCity'); return true;"onmouseout="HideContent('infoBusinessCity'); return true;"href="javascript:ShowContent('infoBusinessCity')">
		            city: 
		        </a>   
		        <div id="infoBusinessCity" style="display:none; position:absolute; border-style: solid; background-color: white; padding: 20px;">city</div>                      
                </td>
		        <td align="left" style="width: 410px">
                    <input type="text" id="businessCity" name="businessCity" /></td>
		    </tr>
			<tr>
		        <td style="width:200px"> 
		        <a style="text-decoration:none" onmouseover="ShowContent('infoBusinessState'); return true;"onmouseout="HideContent('infoBusinessState'); return true;"href="javascript:ShowContent('infoBusinessState')">
		            State:        
		        </a>
		        <div id="infoBusinessState" style="display:none; position:absolute; border-style: solid; background-color: white; padding: 20px;">The state code</div>                  
                </td>
		        <td style="height: 21px; width: 410px;">
                    <select id="businessState" name="businessState" >
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
            <option value="VI">VI</option> </select>         </td>
		    </tr>		    		    		    
			<tr>
		        <td style="width:200px"> 
		        <a style="text-decoration:none" onmouseover="ShowContent('infoBusinessZip'); return true;"onmouseout="HideContent('infoBusinessZip'); return true;"href="javascript:ShowContent('infoBusinessZip')">  
		            ZIP Code:      
		        </a>
		        <div id="infoBusinessZip" style="display:none; position:absolute; border-style: solid; background-color: white; padding: 20px;">The zip or postal code</div>                  
                </td>
		        <td align="left" style="width: 410px">
                    <input type="text" id="businessZip" name="businessZip" /></td>
		    </tr>
			<tr>
		        <td style="width:200px"> 
		        <a style="text-decoration:none" onmouseover="ShowContent('infoBusinessCountry'); return true;"onmouseout="HideContent('infoBusinessCountry'); return true;"href="javascript:ShowContent('infoBusinessCountry')">
		            Country:        
		        </a>
		        <div id="infoBusinessCountry" style="display:none; position:absolute; border-style: solid; background-color: white; padding: 20px;">
		             The country code. <br /><b>Allowable values are:</b><br />
                       >> <i>Australia – AU</i><br />
                        >> <i>Canada – CA</i><br />
                        >> <i> Czech Republic – CZ</i><br />
                        >> <i> France – FR</i><br />
                        >> <i> Germany – DE</i><br />
                        >> <i> Greece – GR</i><br />
                        >> <i> Israel – IL</i><br />
                        >> <i> Italy – IT</i><br />
                        >> <i> Japan – JP</i><br />
                        >> <i> Netherlands – NL</i><br />
                        >> <i> Poland – PL</i><br />
                        >> <i> Russian Federation – RU</i><br />
                        >> <i> Spain – ES</i><br />
                        >> <i> United Kingdom – GB</i><br />
                        >> <i> United States – US</i>
		        </div>                  
                </td>
		        <td align="left" style="width: 410px">
                    <input type="text" id="businessCountry" name="businessCountry" /></td>
		    </tr>
			<tr>
		        <td style="width:200px"> 
		        <a style="text-decoration:none" onmouseover="ShowContent('infoBusinessPhone'); return true;"onmouseout="HideContent('infoBusinessPhone'); return true;"href="javascript:ShowContent('infoBusinessPhone')">
		            workPhone:        
		        </a>
		        <div id="infoBusinessPhone" style="display:none; position:absolute; border-style: solid; background-color: white; padding: 20px;">The phone number for the business.</div>                  
                </td>
		        <td align="left" style="width: 410px">
                    <input type="text" id="businessPhone" name="businessPhone" /></td>
		    </tr>
			<tr>
		        <td style="width:200px">
		        <a style="text-decoration:none" onmouseover="ShowContent('infoBusinessCategory'); return true;"onmouseout="HideContent('infoBusinessCategory'); return true;"href="javascript:ShowContent('infoBusinessCategory')">
		            Category:         
		        </a>
		        <div id="infoBusinessCategory" style="display:none; position:absolute; border-style: solid; background-color: white; padding: 20px;">
		            The category describing the business for which the PayPal account
                    is created, for example; 1004 for Baby.<br /> PayPal uses the industry standard
                    Merchant Category Codes. Refer to the business’ Association Merchant
                    Category Code documentation for a list of codes
		        </div>                  
                </td>
		        <td align="left" style="width: 410px">
                    <input type="text" id="businessCategory" name="businessCategory" /></td>
		    </tr>
			<tr>
		        <td style="width:200px">  
		        <a style="text-decoration:none" onmouseover="ShowContent('infoBusinessSubCategory'); return true;"onmouseout="HideContent('infoBusinessSubCategory'); return true;"href="javascript:ShowContent('infoBusinessSubCategory')">
		            SubCategory:       
		        </a>
		        <div id="infoBusinessSubCategory" style="display:none; position:absolute; border-style: solid; background-color: white; padding: 20px;">
		            The category describing the business for which the PayPal account
                    is created, for example; 1004 for Baby. PayPal uses the industry standard
                    Merchant Category Codes. Refer to the business’ Association Merchant
                    Category Code documentation for a list of codes
		         </div>                  
                </td>
		        <td align="left" style="width: 410px">
                   <input type="text" id="businessSubCategory" name="businessSubCategory" /></td>
		    </tr>
			<tr>
		        <td style="width:200px">
		        <a style="text-decoration:none" onmouseover="ShowContent('infoBusinessCustomerServicePhone'); return true;"onmouseout="HideContent('infoBusinessCustomerServicePhone'); return true;"href="javascript:ShowContent('infoBusinessCustomerServicePhone')">
		            customerServicePhone:         
		        </a>
		        <div id="infoBusinessCustomerServicePhone" style="display:none; position:absolute; border-style: solid; background-color: white; padding: 20px;">
		            The phone number for the customer service department of the
                    business
		        </div>                  
                </td>
		        <td align="left" style="width: 410px">
                    <input type="text" id="businessCustomerServicePhone" name="businessCustomerServicePhone" /></td>
		    </tr>
			<tr>
		        <td style="width:200px"> 
		        <a style="text-decoration:none" onmouseover="ShowContent('infoBusinessCustomerServiceEmail'); return true;"onmouseout="HideContent('infoBusinessCustomerServiceEmail'); return true;"href="javascript:ShowContent('infoBusinessCustomerServiceEmail')">
		            customerServiceEmail:  
		        </a>  
		        <div id="infoBusinessCustomerServiceEmail" style="display:none; position:absolute; border-style: solid; background-color: white; padding: 20px;">
		            The email address for the customer service department of the
                    business.
		        </div>                      
                </td>
		        <td align="left" style="width: 410px">
                    <input type="text" id="businessCustomerServiceEmail" name="businessCustomerServiceEmail" /></td>
		    </tr>
			<tr>
		        <td style="width:200px">  
		        <a style="text-decoration:none" onmouseover="ShowContent('infoBusinessWeb'); return true;"onmouseout="HideContent('infoBusinessWeb'); return true;"href="javascript:ShowContent('infoBusinessWeb')">
		            webSite:       
		        </a>
		        <div id="infoBusinessWeb" style="display:none; position:absolute; border-style: solid; background-color: white; padding: 20px;">The website address for the business.</div>                  
                </td>
		        <td align="left" style="width: 410px">
                    <input type="text" id="businessWeb" name="businessWeb" /></td>
		    </tr>
			<tr>
		        <td style="width:200px"> 
		        <a style="text-decoration:none" onmouseover="ShowContent('infoDateOfEstablishment'); return true;"onmouseout="HideContent('infoDateOfEstablishment'); return true;"href="javascript:ShowContent('infoDateOfEstablishment')">
		            dateOfEstablishment:     
		        </a>
		        <div id="infoDateOfEstablishment" style="display:none; position:absolute; border-style: solid; background-color: white; padding: 20px;">The date of establishment for the business</div>                  
                </td>
		        <td align="left" style="width: 410px">
                    <input type="text" id="dateOfEstablishment" name="dateOfEstablishment" /></td>
		    </tr>
			<tr>
		        <td style="width:200px"> 
		        <a style="text-decoration:none" onmouseover="ShowContent('infoBusinessType'); return true;"onmouseout="HideContent('infoBusinessType'); return true;"href="javascript:ShowContent('infoBusinessType')">
		            businessType:    
		        </a>  
		        <div id="infoBusinessType" style="display:none; position:absolute; border-style: solid; background-color: white; padding: 20px;">
		            The type of the business for which the PayPal account is created.<br />
                        <b>Allowable values are:</b><br />
                        >> <i>CORPORATION</i><br />
                        >> <i>GOVERNMENT</i><br />
                        >> <i>INDIVIDUAL</i><br />
                        >> <i> NONPROFIT</i><br />
                        >> <i> PARTNERSHIP</i><br />
                        >> <i> PROPRIETORSHIP</i>
		        </div>                  
                </td>
		        <td align="left" style="width: 410px">
                    <select id="businessType" name="businessType">
                    <option value="INDIVIDUAL" >INDIVIDUAL</option>
                        <option  value="ASSOCIATION">ASSOCIATION</option>
                        <option  value="CORPORATION">CORPORATION</option>
                        <option  value="GENERAL_PARTNERSHIP">GENERAL_PARTNERSHIP</option>
                        <option  value="GOVERNMENT">GOVERNMENT</option>
                        
                        <option  value="LIMITED_LIABILITY_PARTNERSHIP">LIMITED_LIABILITY_PARTNERSHIP</option>  
                        <option  value="LIMITED_LIABILITY_PRIVATE_CORPORATION">LIMITED_LIABILITY_PRIVATE_CORPORATION</option>
                        <option  value="LIMITED_LIABILITY_PROPRIETORS">LIMITED_LIABILITY_PROPRIETORS</option>
                        <option  value="LIMITED_PARTNERSHIP">LIMITED_PARTNERSHIP</option>
                        <option  value="LIMITED_PARTNERSHIP_PRIVATE_CORPORATION">LIMITED_PARTNERSHIP_PRIVATE_CORPORATION</option>
                        <option  value="NONPROFIT">NONPROFIT</option>
                        <option  value="OTHER_CORPORATE_BODY">OTHER_CORPORATE_BODY</option> 
                        <option  value="PARTNERSHIP">PARTNERSHIP</option>
                        <option  value="PRIVATE_CORPORATION">PRIVATE_CORPORATION</option>
                        <option  value="PRIVATE_PARTNERSHIP">PRIVATE_PARTNERSHIP</option>
                        <option  value="PROPRIETORSHIP">PROPRIETORSHIP</option>
                        <option  value="PROPRIETORSHIP_CRAFTSMAN">PROPRIETORSHIP_CRAFTSMAN</option>
                        <option  value="PROPRIETARY_COMPANY">PROPRIETARY_COMPANY</option>                        
                        <option  value="PUBLIC_COMPANY">PUBLIC_COMPANY</option>
                        <option  value="PUBLIC_CORPORATION">PUBLIC_CORPORATION</option>
                        <option  value="PUBLIC_PARTNERSHIP">PUBLIC_PARTNERSHIP</option>                                                 
                    </select></td>
		    </tr>
			<tr>
		        <td style="width:200px">
		        <a style="text-decoration:none" onmouseover="ShowContent('infoAvgPrice'); return true;"onmouseout="HideContent('infoAvgPrice'); return true;"href="javascript:ShowContent('infoAvgPrice')"> 
		            averagePrice:      
		        </a>
		        <div id="infoAvgPrice" style="display:none; position:absolute; border-style: solid; background-color: white; padding: 20px;">
		            The average price per transaction.
		        </div>                  
                </td>
		        <td align="left" style="width: 410px">
                   <input type="text" id="avgPrice" name="avgPrice" /></td>
		    </tr>
			<tr>
		        <td style="width:200px">
		        <a style="text-decoration:none" onmouseover="ShowContent('infoAverageMonthlyVolume'); return true;"onmouseout="HideContent('infoAverageMonthlyVolume'); return true;"href="javascript:ShowContent('infoAverageMonthlyVolume')"> 
		            averageMonthlyVolume:      
		        </a>
		        <div id="infoAverageMonthlyVolume" style="display:none; position:absolute; border-style: solid; background-color: white; padding: 20px;">The average monthly transaction volume of the business for which
                    the PayPal account is created</div>                  
                </td>
		        <td align="left" style="width: 410px">
                    <input type="text" id="averageMonthlyVolume" name="averageMonthlyVolume" /></td>
		    </tr>
			<tr>
		        <td style="width:200px">
		        <a style="text-decoration:none" onmouseover="ShowContent('infoPercentageRevenueFromOnline'); return true;"onmouseout="HideContent('infoPercentageRevenueFromOnline'); return true;"href="javascript:ShowContent('infoPercentageRevenueFromOnline')"> 
		            percenRevenueFromOnline:      
		        </a>
		        <div id="infoPercentageRevenueFromOnline" style="display:none; position:absolute; border-style: solid; background-color: white; padding: 20px;">The percentage of online sales for the business from 0 through 100</div>                  
                </td>
		        <td align="left" style="width: 410px">
                   <input type="text" id="percentageRevenueFromOnline" name="percentageRevenueFromOnline" /></td>
		    </tr>
			<tr>
		        <td style="width:200px"> 
		        <a style="text-decoration:none" onmouseover="ShowContent('infoSalesVenue'); return true;"onmouseout="HideContent('infoSalesVenue'); return true;"href="javascript:ShowContent('infoSalesVenue')">
		            salesVenue:       
		        </a>
		        <div id="infoSalesVenue" style="display:none; position:absolute; border-style: solid; background-color: white; padding: 20px;">
		            The venue type for sales.
		            <b>Allowable values are:</b><br />
                         >><i> WEB, EBAY,OTHER_MARKETPLACE,OTHER</i>
		        </div>                  
                </td>
		        <td align="left" style="width: 410px">
                    <input type="text" id="salesVenue" name="salesVenue"/></td>
		    </tr>		    		    		    		    		    		    		    		    		    		    		    		    		    		    
		    </table>
		    </div>
		    <table align="center" width="45%">
		     <tr align="center">
			<td colspan="2"><br/>
                <a class="pop-button primary" onclick="document.Form1.submit();" id="Submit"><span>Submit</span></a>
			</td>
			
	        </tr>
			<tr align="right">
				<td colspan="2"><i>** Required</i><br/><br/></td>
			</tr>	    		    		    		    		    		    		    		    		    		        		    		    		    		    		    
			</table>
    </form>
    </div>
</body>
</html>
