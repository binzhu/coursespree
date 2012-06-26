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
					<?php require_once 'templates/sidebar-user.php'; ?>
					
					<div class="userDashboardRight" id="question">
						<div class="rightside">
							<?php
							$type = $_GET['type'];
							switch($type) {
								case 'questions':
									require_once 'user/questions/questions.php';
									break;
								
								case 'answers':
									require_once 'user/questions/answers.php';
									break;
									
								default:
									require_once 'user/questions/questions.php';
									break;
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
