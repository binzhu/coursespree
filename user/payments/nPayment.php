<?php
if(isset($_GET['mode'])) {
	$mode = $_GET['mode'];
}
?>

<div class="userDashboardRight" id="question">
	<div class="rightside">
		<div class="buy_col" style="margin-left:0px;">
			<div class="_cont">
				<?php
					$sql = "
							SELECT
								p.*, DATE_FORMAT(p.dated, '%d %b, %Y<br /> %H:%i %p') as purchasedOn,
								ub.id as ubID, CONCAT(ub.fName,' ',ub.lName) as ubFullName, ub.avatar as ubImg,
								n.id as nID, n.userID as nOwnerID, n.coverImage as nCoverImage, n.doc as noticeTitle, n.docName as nDocName,
								uf.id as ufID, CONCAT(uf.fName,' ',uf.lName) as ufFullName, uf.avatar as ufImg, uf.email as ufEmail
							FROM
								`".DB_PREFIX."purchases` p
									LEFT JOIN `".DB_PREFIX."users` ub ON(p.userID=ub.id)
									LEFT JOIN `".DB_PREFIX."notices` n ON(p.itemID=n.id)
									LEFT JOIN `".DB_PREFIX."users` uf ON(n.userID=uf.id)
							WHERE
								p.active='1' AND p.itemType='notice' 
							";
								
					if($mode == 'nReceived') {
						$sql .= " AND p.toUserID='{$_SESSION['userID']}'";
					} else if($mode == 'nPaid') {
						$sql .= " AND p.userID='{$_SESSION['userID']}'";
					}
			
					$data = get_rows($sql);
					if(!empty($data)) {
						$total = 0;
						foreach($data as $payment) {
							if($mode == 'nReceived') {
								$receivedPayment = $payment->price - $payment->cp_fee - $payment->paypal_charges;
							} else if($mode == 'nPaid') {
								$receivedPayment = $payment->price;
							}
					
							if($receivedPayment > 0) {
								$receivedPayment = number_format($receivedPayment, 2, '.', '');
								$total = $total + $receivedPayment; ?>
						
								<div class="_prod_item" style="width:300px; float:left; clear:none; margin:0px 5px 5px 0px; border-right: 3px solid #C0C0C0; border-bottom: 3px solid #C0C0C0;">
									<div class="clear"></div>
									<div class="_user">
										<?php
										if($mode == 'nReceived') {
											$uID = stripslashes($payment->ubID);
											$uName = stripslashes($payment->ubFullName);
											$uAvatar = "uploads/images/".stripslashes($payment->ubImg);
											
											if(!file_exists(stripslashes(trim($uAvatar))) || trim($payment->ubImg) == '') {
												$uAvatar = 'images/no-img.jpg';
											}
										} else {
											$uID = stripslashes($payment->ufID);
											$uName = stripslashes($payment->ufFullName);
											$uAvatar = "uploads/images/".stripslashes($payment->ufImg);
											
											if(!file_exists(stripslashes(trim($uAvatar))) || trim($payment->ufImg) == '') {
												$uAvatar = 'images/no-img.jpg';
											}
										}
										?>
										<span style="position:relative; width:60px; height:60px; overflow:hidden; display:block; text-align:left;"><a href="<?php echo $avatar; ?>" title="<?php echo $uName; ?>" class="lightbox"><img src="<?php echo $uAvatar; ?>" border="0" alt="" /></a></span>
										<div class="clear"></div>
										<a href="user.php?id=<?php echo $uID; ?>"><?php echo $uName; ?></a>
									</div>

									<div class="_thb_box" style="height:150px; background:none;">
										<?php
										$coverImageNameOnly = $payment->nCoverImage;
										$coverImage = "uploads/docs/preview/".stripslashes($payment->nCoverImage);
										if(!file_exists(stripslashes(trim($coverImage))) || trim($coverImageNameOnly) == '') {
											$coverImage = 'images/no-img.jpg';
										}
										?>
										<div class="_ttl _prod_box_ttl"><a href="notice.php?id=<?php echo $payment->nID; ?>"><?php echo stripslashes($payment->nDocName); ?></a></div>
										<div class="_thb" style="text-align:center; height:150px; border:none;">
											<a href="notice.php?id=<?php echo $payment->nID; ?>">
												<span style="position:relative; width:100px; height:130px; overflow:hidden; display:block; text-align:left;"><img src="<?php echo $coverImage; ?>" border="0" alt="" /></span><br />
												<span style="color: #403F3F;"><?php echo stripslashes($payment->nDocName); ?></a>
											</a><br />
										</div>
									</div>

									<div class="_price">
										<?php echo '$'.$receivedPayment; ?>
									</div>
									<div class="clear"></div>
								</div>
						
							<?php }
						}
					}
				?>
				<div class="clear"></div>
			</div>
		</div>
		
		<?php $total = number_format($total, 2, '.', ''); ?>
		<div class="text-2">
			<h4>
				<span style="color:#255F7A;">
					<?php
					if($mode == 'nReceived') {
						echo 'Payment received till date:';
					} else if($mode == 'nPaid') {
						echo 'Payment paid till date:';
					}
					?>
				</span>
				<?php echo "$".$total; ?></h4>
		</div>
		<div class="clear" style="height:10px;"></div>
	</div>
</div>
<div class="clear"></div>
