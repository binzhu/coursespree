<?php require_once('includes/config.php'); ?>
<?php
if(!isUserLoggedin()) {
	header('Location: register.php?type=login');
	exit;
}

$isNoticePage = '0';
if(isset($_GET['step']) && $_GET['step'] == '3') {
	$isNoticePage = '1';
}

require_once 'canAccessNotice.php';
if($isNoticePage && !$true_step_2) {
	header('Location: user.php?type=sell&id='.$docID);
	exit;
}
require_once 'templates/header.php';
?>

<div class="inner">
	<div id="body_cont">
		<div id="body">
			<?php require_once 'templates/nav-user.php'; ?>
			<div id="profile">
				<div class="white_box">
					<?php if(!$isNoticePage) { ?>
						<?php require_once 'templates/sidebar-user.php'; ?>
				
						<div class="userDashboardRight">
							<div class="profile_content">
								<?php show_msgs(); ?>
						
								<?php
								if(!$true_step_1) {
									require_once 'templates/sell/sell_step_1.php';
								} else {
									require_once 'templates/sell/sell_step_2.php';
								}
								?>
							</div>
						</div>
					<?php } else { ?>
						<?php require_once 'templates/sell/sell_step_3.php'; ?>
					<?php } ?>
					<div class="clear"></div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php require_once 'templates/footer.php'; ?>
