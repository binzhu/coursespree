<?php
require_once("../../Lib/OAuth_Signature/OAuth.php");

$key = @$_REQUEST['consumerKey'];
$secret = @$_REQUEST['consumerSecret'];
$token = @$_REQUEST['accessToken'];
$token_secret = @$_REQUEST['tokenSecret'];
$httpMethod=@$_REQUEST['httpMethod'];
$endpoint = @$_REQUEST['endpoint'];
  

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>PayPal PHP SDK - Permission Signature generation</title>
 <link href="../Common/style.css" rel="stylesheet" type="text/css" />
 <script type="text/javascript" src="../Common/tooltip.js">
    </script>
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

<center>
<h3>Oauth Signature generation</h3>
</center>
<table align="center">
<?php try{
  $result=GenSignature($key,$secret,$token,$token_secret,$httpMethod,$endpoint,$params);
 
  }
 catch (OAuthException $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
    exit;
}?>
	<tr>
		<td class="thinfield2">TimeStamp:</td>
		<td class="thinfield3"><?php echo $result['oauth_timestamp'];
		?></td>
	</tr>
	
	<tr>
		<td class="thinfield2">Signature:</td>

		<td class="thinfield3"><?php echo $result['oauth_signature'];?></td>
	</tr>
	
</table><br/><br/>

</div>
</div>

</body>
</html>

