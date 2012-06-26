<?php require_once('includes/config.php'); ?>
<?php require_once 'canAccessNotice.php'; ?>
<?php require_once 'templates/header.php'; ?>

<?php
if($status != '1') {
	header('Location: buy.php');
	exit;
}
?>

<style type="text/css">
	.inner #profile ._activity_box ._info {
		width:478px !important;
	}
</style>

<div class="inner">
	<div id="body_cont">
		<div id="body">
			<?php require_once 'templates/nav-user.php'; ?>
			<div id="profile">
				<div class="white_box">
					<div style="float: right; width: 332px;">
						<div class="price_col">
							<div style="width: 290px; text-align:left;" class="_btn">
								<div class="clear"></div>
								<div style="font-size:14px;">
									<strong>Price:</strong>
									<?php
										$price = stripslashes($price);
										if($cp_fee_percentage > 0) {
											$price = $price + ($price*$cp_fee_percentage/100);
										}
										echo "$".$price;
									?>
								</div>
								
								<?php if(isUserLoggedin()) { ?>
									<a style="float: left;" class="button yellowb" href="payment.php?nID=<?php echo $docID; ?>"><span>Download Notes</span></a>
								<?php } else { ?>
									<?php $loginFormThickBoxAlreadyCoded = loginFormThickBox('Sign in for Download Notice', $loginFormThickBoxAlreadyCoded); ?>
								<?php } ?>
								<div class="clear"></div>
							</div>
						</div>
						<div class="clear"></div>

						
						<div style="margin-top: 10px;" class="info_col">
							<?php $docOwner = getUser($docInfo->userID); ?>
							<div class="_cont">
								<div class="_thb">
									<span style="position: relative; width: 68px; height: 68px; overflow: hidden; display: block; text-align: left;">
										<a href="user.php?type=profile&id=<?php echo $docOwner->id; ?>">
											<?php
											$avatar = "uploads/images/".stripslashes($docOwner->avatar);
											if(!file_exists(stripslashes(trim($avatar))) || trim($docOwner->avatar) == '') {
												$avatar = 'images/no-img.jpg';
											}
											?>
											<img border="0" width="68" height="68" style="position: relative; top: 0px; left: 0px;" class="pngfix" alt="" src="<?php echo $avatar; ?>">
										</a>
									</span>
								</div>
		
								<div class="_ttl"><?php echo stripslashes($docOwner->fullName); ?></div>
									<a style="margin: 4px 0pt 0pt 15px; height:auto; padding:5px;" class="button green" href="user.php?type=profile&id=<?php echo $docOwner->id; ?>"><span style="padding:5px;">VIEW NOTEBOOK</span></a>
									<div class="clear"></div>
								</div>
							</div>
							<div class="clear"></div>

							<div style="border-top: medium none;" class="info_col"><div class="_cont">
								<strong>NOTES:</strong> <?php echo stripslashes($docName); ?><br>
								<strong>SCHOOL:</strong> <?php echo stripslashes($docInfo->schoolName); ?><br>
								<strong>DEPARTMENT:</strong> <?php echo stripslashes($docInfo->deptName); ?><br>
								<strong>COURSE:</strong> <?php echo stripslashes($docInfo->courseName); ?><br>
								<strong>PROFESSOR:</strong> <?php echo stripslashes($docInfo->profName); ?><br>
								<strong>Document Type:</strong> <?php echo stripslashes($docInfo->docTypeName); ?><br>
								<strong>TERM:</strong> <?php echo stripslashes($docInfo->term); ?><br>
							</div>
						</div>
					</div>

					<div style="float: left; width: 580px; padding:10px;">
						<?php
						$coverImageNameOnly = $coverImage;
						$coverImage = "uploads/docs/preview/".stripslashes($coverImage);
						if(!file_exists(stripslashes(trim($coverImage))) || trim($coverImageNameOnly) == '') {
							$coverImage = 'images/no-img.jpg';
						}
						?>
						<div class="detail_col">
							<div class="_cont">
								<div id="_cms_scribd_viewer_1" style="text-align:center;">
									<a href="<?php echo stripslashes($coverImage); ?>" title="<?php echo stripslashes($docName); ?>" class="lightbox">
										<img src="<?php echo $coverImage; ?>" border="0" alt="" style="margin:auto; max-height:400px; max-width:550px;" />
									</a>
								</div>
								<div class="clear"></div>
							</div>
						</div>
						<div class="clear"></div>
						
						<div class="detail_col" style="margin-top:10px;">
							<div class="_cont">
								<h2>Notes/Tips</h2>
								<div class="clear"></div>
								<div style="background:#EEEEEE; border-radius:5px; padding:5px; margin-top:10px;"><?php echo stripslashes($tips); ?></div>
							</div>
							
							<div class="_cont" style="margin-top:15px;">
								<h2>Comments</h2>
								<div class="clear"></div>
								<?php
								$comments = getNoticeComments($_GET['id']);
								if(!empty($comments)) {
									foreach($comments as $comment) {
										if($comment->comment != '') {
											$img = "uploads/images/{$comment->uImg}";
											if(!file_exists(stripslashes(trim($img))) || trim($comment->uImg) == '') {
												$img = 'images/no-img.jpg';
											}
											?>
										
											<div class="_activity_box">
												<div class="_icon">
													<a href="user.php?type=profile&id=<?php echo $comment->uID; ?>">
														<img border="0" width="58" height="58" style="position: relative; top: 0px; left: -8px;" class="pngfix" alt="" src="<?php echo $img; ?>" />
													</a>
												</div>
							
												<div class="_info">
													<h3><a href="user.php?type=profile&id=<?php echo $comment->uID; ?>"><?php echo $comment->uFullName; ?></a> commented</h3>
													<div class="_date">on <?php echo stripslashes($comment->dated); ?></div>
													<p><?php echo stripslashes($comment->comment); ?></p>
												</div>
												<div class="clear"></div>
											</div>
											<div class="clear"></div>
											<?php
										}
									}
								}
								?>
								<div class="clear"></div>
								<?php if(isUserLoggedin()) { ?>
									<div class="_feed_comment">
										<form method="post" action="" name="commentForm">
											<input type="hidden" name="noticeID" value="<?php echo $_GET['id']; ?>" />
											<div class="_txt"><textarea rows="3" cols="10" wrap="soft" name="commentsBody" style="width:565px;"></textarea></div>
											<div class="_btn"><button class="yellow" type="submit"><span>Add Comment</span></button></div>
										</form>
									</div>
								<?php } else { ?>
									<?php $loginFormThickBoxAlreadyCoded = loginFormThickBox('Sign in for comments', $loginFormThickBoxAlreadyCoded); ?>
								<?php } ?>
							</div>
						</div>
						<div class="clear"></div>
					</div>
					<div class="clear"></div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php require_once 'templates/footer.php'; ?>
