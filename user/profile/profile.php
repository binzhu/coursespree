<?php
require_once('includes/config.php');

if(isset($_GET['id']) && $_GET['id'] > 0) {
	$userID = $_GET['id'];
} else {
	$userID = $_SESSION['userID'];
}


if(isset($_GET['id']) && $_GET['id'] > 0) {
	$userID = $_GET['id'];
	$user = array();
	$user = getUser($userID);
}

require_once 'templates/header.php';
?>

<div class="inner">
	<div id="body_cont">
		<div id="body">
			<?php require_once 'templates/nav-user.php'; ?>
			<div id="profile">
				<div class="white_box">
					<?php require_once 'templates/sidebar-user.php'; ?>
					
					<div class="userDashboardRight">
						<div style="margin-top:10px;">
							<?php
							$notices = getNotices($userID, 'all');
							if(!empty($notices)) {
								echo '<ul id="carousel" class="jcarousel-skin-tango">';
								for($io=1;$io<=3; $io++) {
									foreach($notices as $notice) {
										$img = stripslashes($notice->coverImage);
										$img = "uploads/docs/preview/{$img}";
										if($notice->coverImage == '' || !file_exists($img)) {
											$img = 'images/no-img.jpg';
										}
										$status = $notice->status;
										if($status == '1') {
											$price = stripslashes($notice->price);
											
											if($notice->cp_fee_percentage > 0) {
												$price = $price + ($price * $notice->cp_fee_percentage / 100);
											}
											
											$price = "$".$price;
										} else {
											$price = 'Unpublished';
										}
										$anchor = 'notice.php?id='.$notice->id;
									
										echo '<li>';
											echo '<a href="'.$anchor.'"><img src="'.$img.'" alt="" /></a>';
											echo '<div>';
												echo stripslashes($notice->docName)."<br />";
												echo $price;
											echo '</div>';
										
										echo '</li>';
									}
								}
								echo '</ul>';
							}
							?>
						</div>
						
						<div class="profile_content">
							<h1><?php echo $user->fName; ?>'s Activiy Feed</h1>
							<div class="clear"></div>
								
								<?php
								$notices = getNotices($userID, 'published');
								if(!empty($notices)) {
									foreach($notices as $notice) { ?>
										<?php
										$img = "uploads/images/{$notice->uImg}";
										if(!file_exists(stripslashes(trim($img))) || trim($notice->uImg) == '') {
											$img = 'images/no-img.jpg';
										}
										?>
										<div class="_activity_box">
											<div class="_icon">
												<a href="notice.php?id=<?php echo $notice->uID; ?>">
													<img border="0" width="88" height="88" style="position: relative; top: 0px; left: -8px;" class="pngfix" alt="" src="<?php echo $img; ?>" />
												</a>
											</div>
								
											<div class="_info">
												<h3>
													<a href="user.php?type=profile&id=<?php echo $notice->uID; ?>"><?php echo $notice->uFullName; ?></a> published Lecture notes <a href="notice.php?id=<?php echo $notice->id; ?>"><?php echo stripslashes($notice->docName); ?></a>
												</h3>
									
												<div class="_date">on <?php echo stripslashes($notice->dated); ?></div>
												<p><?php echo stripslashes($notice->tips); ?></p>
											</div>
											
											<div class="clear"></div>
										</div>
										<div class="clear"></div>
									<?php
									}
								}
								
								$comments = getCommentsOnWall($userID);
								
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
														<img border="0" width="88" height="88" style="position: relative; top: 0px; left: -8px;" class="pngfix" alt="" src="<?php echo $img; ?>" />
													</a>
												</div>
							
												<div class="_info">
													<h3>
														<?php if($comment->toNoticeID > 0) { //COMMENT ON USER'S PUBLISHED NOTICE ?>
															<a href="user.php?type=profile&id=<?php echo $comment->uID; ?>"><?php echo $comment->uFullName; ?></a> commented on <a href="notice.php?id=<?php echo $comment->nID; ?>"><?php echo $comment->nName; ?></a>
														<?php } else if($comment->toUserID > 0) { //COMMENT ON USER'S ACTIVITY FEED   ?>
															<a href="user.php?type=profile&id=<?php echo $comment->uID; ?>"><?php echo $comment->uFullName; ?></a> wrote here
														<?php } ?>
													</h3>
								
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
							
							<div class="_feed_comment">
								<?php if(isUserLoggedin()) { ?>
									<form method="post" action="" name="commentForm">
										<div class="_ttl">Write on <?php echo $user->fName; ?>'s Activiy Feed</div>
										<div class="_txt"><textarea rows="3" cols="10" wrap="soft" name="commentsBody"></textarea></div>
										<div class="_btn"><button class="yellow" type="submit"><span>Add Comment</span></button></div>
									</form>
								
								<?php } else { ?>
									<?php $loginFormThickBoxAlreadyCoded = loginFormThickBox('Sign in for comment', $loginFormThickBoxAlreadyCoded); ?>
								<?php } ?>
							</div>
							<div class="clear"></div>
						</div>
					</div>
					<div class="clear"></div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php require_once 'templates/footer.php'; ?>
