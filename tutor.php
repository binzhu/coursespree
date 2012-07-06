<?php
require_once('includes/config.php');

if(!isUserLoggedin()) {
	header('Location: register.php?type=login');
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
					<?php require_once 'templates/bbb-userbar.php'; ?>
					
					<div class="userDashboardRight">
						<div class="profile_content">
                                                    <h1>tutor center</h1>
                                                    <?php require_once 'tutor/index.php'?>
						</div>
					</div>
					<div class="clear"></div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php require_once 'templates/footer.php'; ?>
