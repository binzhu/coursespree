<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>ConvertCurrency</title>
<link href="../Common/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../Common/tooltip.js">
    </script>
</head>
<script type="text/javascript">
function PrePopulate()
{
	document.getElementById('baseamount').value = "1.00";
}


</script>


<body ><br/>
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
<h3>Adaptive
			Payments -ConvertCurrency</h3>
<form id="Form1" name="Form1"action="ConvertCurrencyReceipt.php">
	<p class="header3"><a onclick="PrePopulate()">Populate default values</a></p>
<br></br>

	<table align="center">
		<tr>
			<td class="thinfield" width="50"><a href=""
				style="text-decoration: none"
				onmouseover="ShowContent('amount'); return true;"
				onmouseout="HideContent('amount'); return true;"
				href="javascript:ShowContent('amount')"> Amount(Required)</a>
			<div id="amount"
				style="display: none; position: absolute; border-style: solid; background-color: white; padding: 20px;">Amount
			that is to be converted</div>
			</td>
			<td style="width: 100px"><input type="text" name="baseamount" id="baseamount" value=""></td>
		</tr>
		<tr>
			<td class="thinfield" width="50"><a href=""
				style="text-decoration: none"
				onmouseover="ShowContent('baseCurrency'); return true;"
				onmouseout="HideContent('baseCurrency'); return true;"
				href="javascript:ShowContent('baseCurrency')"> FromCurrencyCode</a>
			<div id="baseCurrency"
				style="display: none; position: absolute; border-style: solid; background-color: white; padding: 20px;">Base
			currency code</div>
			</td>



			<td><select name="fromcurrencyCode" id="fromcurrencyCode">
				<option value="USD">USD - Dollars</option>
				<option value="AUD">AUD - Australian Dollars</option>
				<option value="GBP">GBP - British Pounds</option>
				<option value="CAD">CAD - Canadian Dollars</option>
				<option value="CZK">CZK - Czech Koruny</option>
				<option value="DKK">DKK - Danish Koruny</option>
				<option value="EUR">EUR</option>
				<option value="HKD">HKD - Hong Kong Dollars</option>
				<option value="HUF">HUF - Hungarian Forints</option>
				<option value="ILS">ILS - Israeli New Shekels</option>
				<option value="JPY">JPY</option>
				<option value="MXN">MXN - Mexican Pesos</option>
				<option value="NZD">NZD - New Zealand Dollars</option>
				<option value="NOK">NOK - Norwegian Kroner</option>
				<option value="PLN">PLN - Polish Zlotych</option>
				<option value="SGD">SGD - Singapore Dollars</option>
				<option value="SEK">SEK - Swedish Kronor</option>
				<option value="CHF">CHF - Swiss Francs</option>
			</select></td>
		</tr>
		<tr>
			<td class="thinfield" width="50"><a href=""
				style="text-decoration: none"
				onmouseover="ShowContent('toCurrency'); return true;"
				onmouseout="HideContent('toCurrency'); return true;"
				href="javascript:ShowContent('toCurrency')">
			convertToCurrencyList</a>
			<div id="toCurrency"
				style="display: none; position: absolute; border-style: solid; background-color: white; padding: 20px;">Currency
			code to which the ammount should be converted</div>

			</td>
			<td><select name="tocurrencyCode1" id="tocurrencyCode1">
				<option value="USD">USD - Dollars</option>
				<option value="AUD">AUD - Australian Dollars</option>
				<option value="GBP">GBP - British Pounds</option>
				<option value="CAD" selected="true">CAD - Canadian Dollars
				</option>
				<option value="CZK">CZK - Czech Koruny</option>
				<option value="DKK">DKK - Danish Koruny</option>
				<option value="EUR">EUR</option>
				<option value="HKD">HKD - Hong Kong Dollars</option>
				<option value="HUF">HUF - Hungarian Forints</option>
				<option value="ILS">ILS - Israeli New Shekels</option>
				<option value="JPY">JPY</option>
				<option value="MXN">MXN - Mexican Pesos</option>
				<option value="NZD">NZD - New Zealand Dollars</option>
				<option value="NOK">NOK - Norwegian Kroner</option>
				<option value="PLN">PLN - Polish Zlotych</option>
				<option value="SGD">SGD - Singapore Dollars</option>
				<option value="SEK">SEK - Swedish Kronor</option>
				<option value="CHF">CHF - Swiss Francs</option>
			</select></td>
			<td style="width: 100px"></td>
		</tr>
		<tr>
			<td style="width: 100px; height: 24px"></td>
			<td><select name="tocurrencyCode2" id="tocurrencyCode2">
				<option value="USD" selected="true">USD - Dollars</option>
				<option value="AUD" selected="true">AUD - Australian
				Dollars</option>
				<option value="GBP">GBP - British Pounds</option>
				<option value="CAD">CAD - Canadian Dollars</option>
				<option value="CZK">CZK - Czech Koruny</option>
				<option value="DKK">DKK - Danish Koruny</option>
				<option value="EUR">EUR</option>
				<option value="HKD">HKD - Hong Kong Dollars</option>
				<option value="HUF">HUF - Hungarian Forints</option>
				<option value="ILS">ILS - Israeli New Shekels</option>
				<option value="JPY">JPY</option>
				<option value="MXN">MXN - Mexican Pesos</option>
				<option value="NZD">NZD - New Zealand Dollars</option>
				<option value="NOK">NOK - Norwegian Kroner</option>
				<option value="PLN">PLN - Polish Zlotych</option>
				<option value="SGD">SGD - Singapore Dollars</option>
				<option value="SEK">SEK - Swedish Kronor</option>
				<option value="CHF">CHF - Swiss Francs</option>
			</select></td>
			<td style="width: 100px"></td>

		</tr>
		<tr>
			<td style="width: 100px"></td>
			<td><select name="tocurrencyCode3" id="tocurrencyCode3">
				<option value="USD" selected="true">USD - Dollars</option>
				<option value="AUD">AUD - Australian Dollars</option>
				<option value="GBP" selected="true">GBP - British Pounds</option>
				<option value="CAD">CAD - Canadian Dollars</option>
				<option value="CZK">CZK - Czech Koruny</option>
				<option value="DKK">DKK - Danish Koruny</option>
				<option value="EUR">EUR</option>
				<option value="HKD">HKD - Hong Kong Dollars</option>
				<option value="HUF">HUF - Hungarian Forints</option>
				<option value="ILS">ILS - Israeli New Shekels</option>
				<option value="JPY">JPY</option>
				<option value="MXN">MXN - Mexican Pesos</option>
				<option value="NZD">NZD - New Zealand Dollars</option>
				<option value="NOK">NOK - Norwegian Kroner</option>
				<option value="PLN">PLN - Polish Zlotych</option>
				<option value="SGD">SGD - Singapore Dollars</option>
				<option value="SEK">SEK - Swedish Kronor</option>
				<option value="CHF">CHF - Swiss Francs</option>
			</select></td>
			<td style="width: 100px"></td>

		</tr>
		<tr>
			<td style="width: 100px"></td>
			<td style="width: 100px">&nbsp;</td>
			<td style="width: 100px"></td>
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
</form>
</center>
</body>
</html>
