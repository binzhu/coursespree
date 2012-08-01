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
	<div class="school_info">
		<?php
			if($user->schoolID > 0) {
				$schoolInfo = get_school( $user->schoolID );
				$stateInfo = get_state( $user->stateID );
				echo $schoolInfo->name ."( ".$stateInfo->name.")<br />";
			}
			
			if($user->departmentID > 0) {
				$deptInfo = get_dept( $user->departmentID );
				echo "Department: ".$deptInfo->name;
			}
		?>
		
	</div>
	<div class="_hline"></div>
	
	
	<div style="padding:4px; line-height:1.6; color:#266126;">
		
		<div style="width:105px; float:left">Income:</div>
		<div style="width:16px; float:left;">+</div>
		<div style="width:125px; float:left;">
			<?php
				$income = getIncome($_SESSION['userID']);
				if($income > 0) {
					echo "$".$income;
				}
			?>
		</div>
		<div class="clear"></div>
		
		<div style="width:105px; float:left">Expenses:</div>
		<div style="width:16px; float:left;">-</div>
		<div style="width:125px; float:left;">
			<?php
				$expenses = getExpenses($_SESSION['userID']);
				if($expenses > 0) {
					echo "$".$expenses;
				}
			?>
		</div>
		<div class="clear"></div>
		
		<div style="width:121px; float:left">Account Balance:</div>
		<?php
			$balance = $income - $expenses;
			$balance = number_format($balance, 2, '.', '');
			if($balance > 0) {
				$sign = '+';
			} else {
				$sign = '-';
			}
			
			$balance = str_replace('-', '', $balance);
			echo '<div style="width:16px; float:left;">'.$sign.'</div>';
			echo '<div style="width:125px; float:left;">';
				echo "$".$balance;
			echo '</div>';
		?>
	
		<div class="clear"></div>
	</div>

	<?php if(isUserLoggedin()) { ?>
		<div class="_hline"></div>
		<div class="userSidebarLinks" style="padding:4px; line-height:1.3">
			<h2>My Profile</h2>
			<ul>
				<li> > <a href="user.php?type=myaccount">Edit Settings / Profile</a><br />
				<li> > <a href="user.php?type=sell">Upload Notes</a>
				<li> > <a href="user.php?type=subscriber">Subscribers</a>
				<li> > <a href="user.php?type=subscribed">Subscribed</a>
				<li> > <a href="index.php?action=logout">Logout</a>
			</ul>
		</div>
		
		<div class="_hline"></div>
		<div class="userSidebarLinks" style="padding:4px; line-height:1.3">
			<h2>Notes</h2>
			<ul>
				<li> > <a href="user.php?type=mydocs">Notes uploaded by me</a>
				<li> > <a href="user.php?type=mypurchases">Notes purchased by me</a>
				<li> > <a href="user.php?type=payment&mode=nReceived">payment received till date</a>
				<li> > <a href="user.php?type=payment&mode=nPaid">payment paid till date</a>
			</ul>
		</div>
		
		<div class="_hline"></div>
		<div class="userSidebarLinks" style="padding:4px; line-height:1.3">
			<h2>Questions</h2>
			<ul>
				<li> > <a href="user.php?type=questions">Questions posted by me</a>
				<li> > <a href="user.php?type=answers">Answers given by me</a>
				<li> > <a href="user.php?type=payment&mode=qReceived">payment received till date</a>
				<li> > <a href="user.php?type=payment&mode=qPaid">payment paid till date</a>
			</ul>
		</div>
	<?php } ?>
</div>
