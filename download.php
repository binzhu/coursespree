<?php
require_once('includes/config.php');

if(!isUserLoggedin()) {
	header('Location: index.php');
	exit;
}

$loggedUserID = $_SESSION['userID'];
$purchaseID = $_GET['id'];

$sql = "SELECT p.*, n.doc as nDoc FROM  `".DB_PREFIX."purchases` p LEFT JOIN `".DB_PREFIX."notices` n ON(p.itemID=n.id) WHERE p.id='$purchaseID' AND p.userID='$loggedUserID' AND p.itemType='notice'";
$data = get_row($sql);
if(!empty($data)) {
	$path = "uploads/docs/";
	$fileName = "$path/{$data->nDoc}";
	
	header("Pragma: public"); // required
	header("Expires: 0");
	header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
	header("Cache-Control: private",false); // required for certain browsers 
	header("Content-Disposition: attachment; filename=\"".basename($fileName)."\";" );
	header("Content-Transfer-Encoding: binary");
	header("Content-Length: ".filesize("$fileName"));
	readfile("$fileName");
	exit();
}
?>
