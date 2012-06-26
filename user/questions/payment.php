<?php
require_once('includes/config.php');

if(!isUserLoggedin()) {
	header('Location: register.php?type=login');
	exit;
}

if(isset($_GET['mode']) && $_GET['mode'] == 'received') {
	$mode = 'received';
} else {
	$mode = 'paid';
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
					
					<div class="userDashboardRight" id="question">
						<div class="rightside">
							<?php
								if($mode == 'received') {
									$sql = "SELECT p.*, q.id as qID, q.caption as qTitle, u.id as userID, CONCAT(u.fName,' ',u.lName) as userName, u.avatar, qa.answer as answer FROM `".DB_PREFIX."purchases` p LEFT JOIN `".DB_PREFIX."question_answers` qa ON(p.itemID=qa.id) LEFT JOIN `".DB_PREFIX."questions` q ON(qa.questionID=q.id) LEFT JOIN `".DB_PREFIX."users` u ON(q.userID=u.id) WHERE p.toUserID='{$_SESSION['userID']}' AND p.active='1' AND p.itemType='question' ORDER BY p.id ASC";
								} else {
									$sql = "SELECT p.*, q.id as qID, q.caption as qTitle, 	u.id as userID, CONCAT(u.fName,' ',u.lName) as userName, u.avatar, qa.answer as answer FROM `".DB_PREFIX."purchases` p LEFT JOIN `".DB_PREFIX."question_answers` qa ON(p.itemID=qa.id) LEFT JOIN `".DB_PREFIX."questions` q ON(qa.questionID=q.id) LEFT JOIN `".DB_PREFIX."users` u ON(q.userID=u.id) WHERE p.userID='{$_SESSION['userID']}' AND p.active='1' AND p.itemType='question' ORDER BY p.id ASC";
								}
								
								$data = get_rows($sql);
								if(!empty($data)) {
									$total = 0;
									foreach($data as $payment) {
										if($mode == 'received') {
											$receivedPayment = $payment->price - $payment->cp_fee - $payment->paypal_charges;
										} else {
											$receivedPayment = $payment->price;
										}
										
										if($receivedPayment > 0) {
											$receivedPayment = number_format($receivedPayment, 2, '.', '');
											$total = $total + $receivedPayment; ?>
											
											<div class="list-middle paymentList">
												<div class="price">
													<h3>$</h3>
													<p><?php echo $receivedPayment; ?></p>
												</div>
												
												<div class="profile">
													<?php
													$avatar = "uploads/images/".stripslashes($payment->avatar);
													if(!file_exists(stripslashes(trim($avatar))) || trim($payment->avatar) == '') {
														$avatar = 'images/no-img.jpg';
													}
													?>
													<img src="<?php echo $avatar; ?>">
													<p><?php echo stripslashes($payment->userName); ?></p>
												</div>
												
												<div class="details">
													<div class="title"><p><a href="questions.php?id=<?php echo $payment->qID; ?>"><?php echo stripslashes($payment->qTitle); ?></a></p></div>
													<strong>Approved Answer:</strong>
													<?php echo stripslashes($payment->answer); ?>
												</div>
												
												
												<div class="clear"></div>
											</div>
											
										<?php }
									}
									
									$total = number_format($total, 2, '.', ''); ?>
									
									<div class="text-2">
										<h4>
											<span style="color:#255F7A;">
												<?php
												if($mode == 'received') {
													echo 'Payment received till date:';
												} else {
													echo 'Payment paid till date:';
												}
												?>
											</span>
											<?php echo "$".$total; ?></h4>
									</div>
									<?php
								}
							?>
						</div>
					</div>
					<div class="clear"></div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php require_once 'templates/footer.php'; ?>
