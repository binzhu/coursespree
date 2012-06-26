<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>PayPal PHP SDK - Permission Signature generation</title>
 <link href="../Common/style.css" rel="stylesheet" type="text/css" />
 <script type="text/javascript" src="../Common/tooltip.js">
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

<div id="main">
		<?php 
require_once '../Common/menu.html';?>
<div id="request_form">
<center>
<br />
<h3>Generate Signature</h3>
<br />
</center>
<form name="Form1" method="post" action="OAuth_client.php">

 <table align="center" width="100%">
	<tr>
		<td ><a href="">API User Name(Consumer Key):</a></td>
		<td><input type="text" name="consumerKey" value="" size="50" /></td>
		<td>(Required)</td>
	</tr>
	<tr>
		<td class="thinfield"><a href="">API Password(Consumer Secret):</a></td>

		<td class="thinfield"><input type="text" name="consumerSecret" value="" size="50"/></td>
		<td class="thinfield">(Required)</td>
	</tr>
	<tr>
		<td class="thinfield"><a href="">Access Token:</a></td>
		<td class="thinfield"><input type="text" name="accessToken" value="" size="50"/></td>
		<td class="thinfield">(Required)</td>

	</tr>

	<tr>
		<td class="thinfield"><a href="">Token Secret:</a></td>
		<td class="thinfield"><input type="text" name="tokenSecret" value="" size="50"/></td>
		<td class="thinfield">(Required)</td>
	</tr>
	<tr>

		<td class="thinfield"><a href="">Http Method:</a></td>
		<td class="thinfield">
		   <select name="httpMethod">
				<option value="POST" >POST</option>
			
			</select>
		</td>
		<td class="thinfield">(Required)</td>
	</tr>

	<tr>
		<td class="thinfield"><a href="">Script Uri (endpoint):</a></td>

		<td class="thinfield"><input type="text" name="endpoint" value="" size="50"/></td>
		<td class="thinfield">(Required)</td>
	</tr>
 <tr>
	<td>
	<br />
	</td>
	</tr>

	<tr align="center">
<td colspan="2">
<a class="pop-button primary" onclick="document.Form1.submit();" id="Submit"><span>Submit</span></a>
			</td>
		</tr>
</table>
<br/>

</form>
</div>
</div>
</body>
</html>