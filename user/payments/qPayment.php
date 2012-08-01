<?php
if(isset($_GET['mode'])) {
	$mode = $_GET['mode'];
}
?>

<div class="userDashboardRight" id="question">
	<div class="rightside">
		<?php
			if($mode == 'qReceived') {
				$sql = "SELECT p.*, q.id as qID, q.caption as qTitle, u.id as userID, CONCAT(u.fName,' ',u.lName) as userName, u.avatar, qa.answer as answer FROM `".DB_PREFIX."purchases` p LEFT JOIN `".DB_PREFIX."question_answers` qa ON(p.itemID=qa.id) LEFT JOIN `".DB_PREFIX."questions` q ON(qa.questionID=q.id) LEFT JOIN `".DB_PREFIX."users` u ON(q.userID=u.id) WHERE p.toUserID='{$_SESSION['userID']}' AND p.active='1' AND p.itemType='question' ORDER BY p.id ASC";
			} else if($mode == 'qPaid') {
				$sql = "SELECT p.*, q.id as qID, q.caption as qTitle, 	u.id as userID, CONCAT(u.fName,' ',u.lName) as userName, u.avatar, qa.answer as answer FROM `".DB_PREFIX."purchases` p LEFT JOIN `".DB_PREFIX."question_answers` qa ON(p.itemID=qa.id) LEFT JOIN `".DB_PREFIX."questions` q ON(qa.questionID=q.id) LEFT JOIN `".DB_PREFIX."users` u ON(q.userID=u.id) WHERE p.userID='{$_SESSION['userID']}' AND p.active='1' AND p.itemType='question' ORDER BY p.id ASC";
			}
			
			$data = get_rows($sql);
			if(!empty($data)) {
				$total = 0;
				foreach($data as $payment) {
					if($mode == 'qReceived') {
						$receivedPayment = $payment->price - $payment->cp_fee - $payment->paypal_charges;
					} else if($mode == 'qPaid') {
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
							if($mode == 'qReceived') {
								echo 'Payment received till date:';
							} else if($mode == 'qPaid') {
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
