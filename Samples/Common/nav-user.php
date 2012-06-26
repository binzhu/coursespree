<?php if(isUserLoggedin()) { ?>
	<div id="profile_hdr">
		<a href="user.php?type=profile" <?php setClass('profile'); ?>>Profile</a>
		<a href="user.php?type=myaccount" <?php setClass('myaccount'); ?>>My Account</a>		
		<a href="user.php?type=questions" <?php setClass('questions'); ?>>Questions</a>
		
		<div style="float:right; margin-right:40px">
			<a href="index.php?action=logout">Logout</a>
		</div>
	</div>
<?php } else { ?>
	<div class="clear" style=margin-top:20px;></div>
<?php } ?>
