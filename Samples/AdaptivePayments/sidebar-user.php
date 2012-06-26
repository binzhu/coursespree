<?php
$currentPage = curPageName();
?>
<div id="profile_menu">
	<div class="user_info">
		<span style="border:1px solid #afafaf; position:relative; width:138px; height:146px; overflow:hidden; display:block; text-align:left;">
			<?php
			$avatar = "uploads/images/{$user->avatar}";
			if(!file_exists(stripslashes(trim($avatar))) || trim($user->avatar) == '') {
				$avatar = 'images/no-img.jpg';
			}
			?>
			<img width="146" height="146" border="0" style="position:relative; top:0px; left:-4px;" class="pngfix" alt="" src="<?php echo $avatar; ?>">
		</span>
		<div style="height:6px; line-height:1px; font-size:1px; width:100%; clear:both;"></div>

		<div style="padding:2px; line-height:1.5">
			Username: <?php echo stripslashes($user->fullName); ?><br />
			Member Since: <?php echo stripslashes($user->memberSince); ?><br />
		</div>
		
		
		<?php if(isUserLoggedin() && (isset($userID) && $_SESSION['userID']!=$userID) ) {
			$return = alreadySubscribed($_SESSION['userID'], $userID);
			?><div class="subscriptionMain"><?php
				if($return > 0) { ?>
					<a href="javascript:" class="button yellow cboxElement subscribeTo" id="subscribeTo_<?php echo $userID; ?>" onclick="subUnsubCommon('unsubscribe')"><span>Unsubscribe</span></a>
				<?php } else { ?>
					<a href="javascript:" class="button yellow cboxElement subscribeTo" id="subscribeTo_<?php echo $userID; ?>" onclick="subUnsubCommon('subscribe')"><span>Subscribe</span></a>
				<?php } ?>
			</div>
			<div id="msgSubscribe"></div>
		<?php } ?>
	
		<div class="clear"></div>
	</div>

	<div class="_hline"></div>
	<div class="school_info">Lawson State Community College (WV)<br />Department: Anthropology<br /></div>
	<div class="_hline"></div>
	
	
	<?php if($user->type == 'expert') { ?>
		<div class="_hline"></div>
		<div class="school_info">
			I charge $<?php echo stripslashes($user->rate); ?> for an answer.
			<?php if(isUserLoggedin()) { ?>
				<?php if( isset($user->id) && $_SESSION['userID']!=$user->id) { ?>
					<a rel="popup" class="button yellow cboxElement" href=""><span>Ask Question</span></a>
				<?php } ?>
			<?php } else { ?>
				<br /><?php $loginFormThickBoxAlreadyCoded = loginFormThickBox('Sign in for question', $loginFormThickBoxAlreadyCoded); ?>
			<?php } ?>
		</div>
		<div class="_hline"></div>
	<?php } ?>	

	<div style="padding:4px; line-height:1.6; color:#266126;">
		<div style="width:105px; float:left">Income:</div>
		<div style="width:16px; float:left;">+</div>
		<div style="width:125px; float:left;">$0.00</div>
		<div class="clear"></div>
		<div style="width:105px; float:left">Expenses:</div>
		<div style="width:16px; float:left;">-</div>
		<div style="width:125px; float:left;">$0.00</div>
		<div class="clear"></div>
		<div style="width:121px; float:left">Account Balance:</div>
		<div style="width:125px; float:left;">$0.00</div>
		<div class="clear"></div>
	</div>

	<?php if(isUserLoggedin()) { ?>
		<div class="_hline"></div>
		<div class="userSidebarLinks" style="padding:4px; line-height:1.3">
			<h2>My Profile</h2>
			<ul>
				<li> > <a href="#">Inbox</a>
				<li> > <a href="user.php?type=myaccount">Edit Settings / Profile</a><br />
				<li> > <a href="user.php?type=purchases">Purchases</a>
				<li> > <a href="user.php?type=sell">Upload Notes</a>
				<li> > <a href="#">Statements</a>
				<li> > <a href="#">Subscribers</a>
				<li> > <a href="#">Subscribed</a>
                <li> > <a href="mydocs.php?type=id">My Documents</a>
				<li> > <a href="index.php?action=logout">Logout</a>
			</ul>
		</div>
		
		<div class="_hline"></div>
		<div class="userSidebarLinks" style="padding:4px; line-height:1.3">
			<h2>Questions</h2>
			<ul>
				<li> > <a href="user.php?type=questions">Questions posted by me</a>
				<li> > <a href="user.php?type=answers">Answers given by me</a>
				<li> > <a href="#">payment received till date</a>
				<li> > <a href="#">payment paid till date</a>
			</ul>
		</div>
	<?php } ?>
</div>
