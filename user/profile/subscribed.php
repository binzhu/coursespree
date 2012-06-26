<?php
require_once('includes/config.php');

if(!isUserLoggedin()) {
	header('Location: register.php?type=login');
	exit;
}

require_once 'templates/header.php';
?>

<style type="text/css">
	table.purchasesTable td {
		vertical-align: middle;
	}
</style>

<div class="inner">
	<div id="body_cont">
		<div id="body">
			<?php require_once 'templates/nav-user.php'; ?>
			<div id="profile">
				<div class="white_box">
					<?php require_once 'templates/sidebar-user.php'; ?>
					
					<div class="userDashboardRight">
						<div style="margin-top:10px;">
							<?php getListTemplate($_GET['type']); ?>
						</div>
					</div>
					<div class="clear"></div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php require_once 'templates/footer.php'; ?>
