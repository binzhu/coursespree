<?php
require_once('includes/config.php');

if(!isUserLoggedin()) {
	header('Location: register.php?type=login');
	exit;
}

if(isset($_GET['mode'])) {
	$mode = $_GET['mode'];
}

require_once 'templates/header.php';
?>

<style type="text/css">
	#question .paymentList {
		-webkit-border-radius: 5px;
		-moz-border-radius: 5px;
		border-radius: 5px;
		
		background: #ddd;
		width:98%;
		margin-bottom:10px;
		font-weight:bold;
	}
	
	#question .paymentList .price {
		background-color: #FFFFFF;
		border: 1px solid #808080;
		color: #666666;
		float: left;
		height: 60px;
		margin: 10px 10px 20px;
		text-align: center;
		width: 60px;
	}
	
	#question .paymentList .price h3 {
		float: left;
		font-size: 43px;
		font-weight: bold;
		line-height: 35px;
		margin: 0;
		padding: 2px 5px;
		width: 50px;
	}
	
	#question .paymentList .details {
		width:440px;
		font-weight: normal;
		float:left;
		margin-left:20px;
	}
	
	
	#question .paymentList .title {
		width:100%;
	}
	
	#question .paymentList .profile {
		border-right: 1px dotted #808080;
		border-left: 1px dotted #808080;
		float: left;
		height: 100%;
		margin: 0;
		padding: 0 5px;
		text-align: center;
		width: 90px;
	}
	
	#question .paymentList .profile img {
		float: left;
		height: 70px;
		margin: 10px 5px 0 10px;
		width: 70px;
	}
	
	#question .paymentList .profile p {
		float: left;
		margin: 0 5px 5px 0;
		text-align: center;
		width: 100%;
		padding:0 0 4px;
		font-weight:normal;
	}
	
	#question .text-2 {
		width:655px;
		
		-webkit-border-radius: 5px;
		-moz-border-radius: 5px;
		border-radius: 5px;
	}
	
	#question .text-2 h4 {
		margin:10px 10px 0;
		text-align:center;
		width:635px;
	}
</style>

<div class="inner">
	<div id="body_cont">
		<div id="body">
			<?php require_once 'templates/nav-user.php'; ?>
			<div id="profile">
				<div class="white_box">
					<?php require_once 'templates/sidebar-user.php'; ?>
					
					<?php
					if($mode == 'qReceived' || $mode == 'qPaid') {
						require 'qPayment.php';
					} else {
						require 'nPayment.php';
					}
					?>
					
				</div>
			</div>
		</div>
	</div>
</div>
<?php require_once 'templates/footer.php'; ?>
