<?php require_once('includes/config.php'); ?>
<?php
if(isUserLoggedin()) {
	$path = $_SESSION['redirectPath'];
	if($path == '') {
		$path = 'user.php?type=myaccount';
	}
	header('Location: '.$path);
	exit;
}
?>
<?php require_once 'templates/header.php'; ?>

<div class="inner">
	<div id="body_cont">
		<div id="body">
			
			<div class="loginpanel">
				<h3>Sign In!</h3>

				<div class="logintable" style="padding: 10px; font-size: 14px;">
					<table style="width: 100%; margin-top: 30px;">
						<tbody>
							<tr>
								<td align="right">User Name <strong>:</strong></td>
								<td align="left">
									<input type="text" name="loginname" style="width: 150px;"><br />
								</td>
							</tr>
							
							<tr>
								<td align="right">Password <strong>:</strong></td>
								<td align="left">
									<input type="text" name="loginname" style="width: 150px;"><br />
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="clear"></div>			
		</div>
	</div>
</div>
<?php require_once 'templates/footer.php'; ?>
