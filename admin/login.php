<?php require_once 'includes/config.php'; ?>
<?php
if(isset($_POST['adminLogin']) && $_POST['adminLogin'] == '1') {
	if(isset($_POST['rememberMe'])) {
		$rememberMe = 1;
	} else {
		$rememberMe = 0;
	}
	admin_login($_POST['userName'], $_POST['password'], $rememberMe);
} else if(isset($_POST['forgotPass']) && $_POST['forgotPass'] == '1') {
	admin_forgotPass($_POST['userEmail']);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>CourseSpree::Admin Login Panel</title>
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script language="javascript" type="text/javascript" src="js/niceforms.js"></script>
	<link rel="stylesheet" type="text/css" media="all" href="css/niceforms-default.css" />

	<script type="text/javascript">
	$(document).ready(function() {
		$('#show_forgot_pass_form').click(function() {
			$('.sign_in_form').fadeOut(function() {
				$('.forgot_pass_form').fadeIn();
			});
		
			return false;
		});
	
		$('#show_sign_in_form').click(function() {
			$('.forgot_pass_form').fadeOut(function() {
				$('.sign_in_form').fadeIn();
			});
		
			return false;
		});
	});
	</script>
</head>

<body>
<div id="main_container">
	<div class="header_login">
		<div class="logo"><a href="index.php"><img src="../images/logo.png" alt="" title="" border="0" /></a></div>
	</div>

	<?php
	$userName = '';
	if(isset($_COOKIE['adminUser']) && $_COOKIE['adminUser'] != '') {
		$userName = $_COOKIE['adminUser'];
	} else if(isset($_POST['userName']) && $_POST['userName'] != '') {
		$userName = $_POST['userName'];
	}

	$password = '';
	if(isset($_COOKIE['adminPass']) && $_COOKIE['adminPass'] != '') {
		$password = base64_decode($_COOKIE['adminPass']);
	}

	$checked = '';
	if( (isset($_COOKIE['adminUser']) && $_COOKIE['adminUser'] != '') || isset($_POST['rememberMe'])) {
		$checked = 'checked';
	}
	?>

	<?php
	$sign_in_form_style = 'style="display:block;"';
	$forgot_pass_form = 'style="display:none;"';
	
	if(isset($_POST['forgotPass'])) {
		$sign_in_form_style = 'style="display:none;"';
		$forgot_pass_form = 'style="display:block;"';
	}
	?>
	<div class="login_form">
		<div class="sign_in_form" <?php echo $sign_in_form_style; ?>>
			 <h3>Admin Panel Login</h3>
			 <a href="#" class="forgot_pass" id="show_forgot_pass_form">Forgot password</a>
			 
			 <form action="" method="post" class="niceform">
				<input type="hidden" name="adminLogin" value="1" />
				<fieldset>
					<dl>
						<dt><label for="userName">Username:</label></dt>
						<dd><input type="text" name="userName" id="userName" value="<?php echo $userName; ?>" /></dd>
					</dl>
					<dl>
						<dt><label for="password">Password:</label></dt>
						<dd><input type="password" name="password" id="password" value="<?php echo $password; ?>" /></dd>
					</dl>

					<dl>
						<dt><label></label></dt>
						<dd>
							<input type="checkbox" name="rememberMe" id="rememberMe" value="1" <?php echo $checked; ?> />
							<label class="check_label" for="rememberMe">Remember me</label>
						</dd>
					</dl>

					 <dl class="submit">
						<input type="submit" name="submit" id="submit" value="Log in" />
					 </dl>
				</fieldset>
			 </form>
		</div>

		<div class="forgot_pass_form" <?php echo $forgot_pass_form; ?>>
			 <h3>Forgot Password</h3>
			 <a href="#" class="forgot_pass" id="show_sign_in_form">Sign In</a>

			 <form action="" method="post" class="niceform">
		 		<input type="hidden" name="forgotPass" value="1" />
				<fieldset>
					<dl>
						<dt><label for="userEmail">Admin Email:</label></dt>
						<dd><input type="text" name="userEmail" id="userEmail" value="<?php echo $userEmail; ?>" /></dd>
					</dl>
					
					 <dl class="submit">
						<input type="submit" name="submit" id="submit" value="Submit" />
					 </dl>
				</fieldset>
			 </form>
		 </div>
	</div>
</div>
</body>
</html>
