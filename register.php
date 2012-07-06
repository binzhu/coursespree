<?php require_once('includes/config.php'); ?>
<?php
if(isUserLoggedin()) {
	header('Location: index.php');
	exit;
}
?>
<?php require_once 'templates/header.php'; show_msgs();  ?>
<div class="inner">
	<div id="body_cont">
		<div id="body">
			<div style="width:620px; float:left; margin-top:6px; margin-left:5px;" class="_body_box">
				<div class="_cont">
					<?php if(isset($_GET['type']) && $_GET['type']   == 'login') { ?>
						<?php
	                	$userName = stripslashes($_COOKIE['cs_userName']);
	                	if($userName == '') {
	                		$userName = $_POST['userName'];
	                	}
	                	
	                	$password = stripslashes($_COOKIE['cs_password']);
	                	if($password == '') {
	                		$password = $_POST['password'];
	                	}
	                	?>
						<form method="post" action="" name="login">
		                	<input type="hidden" value="1" id="loginVar" name="loginVar">
		                	
		                	<?php if(isset($_SESSION['unActiveUserID']) && $_SESSION['unActiveUserID'] > 0) { ?>
				            	A confirmation mail has been sent to your shared mail. Please follow the instructions and get started.<br />
				            	In case if you haven't received the mail, Please request a <a href="register.php?type=login&resend=1">resend link</a> or <a href="#">contact</a> admin.<br /><br />
				            <?php } ?>
				            
							<h1>Login  Details</h1>

							
							<div class="_label">User Name</div>
							<div class="_input"><input type="text" name="userName" value="<?php echo $userName; ?>" class="inp" /></div>
							<div class="clear"></div>
							
							<div class="_label">Password</div>
							<div class="_input"><input type="password" name="password" value="<?php echo $password; ?>"  class="inp" /></div>
							<div class="clear"></div>
							
							<div class="clear" style="height:20px;"></div>
							<div style="float:left; width:350px; font-size:14px;">
								<label class="_label">
									<input type="checkbox" name="remember" value="1" <?php if($_COOKIE['cs_userName'] != '') { echo 'checked="checked"'; } ?> style="margin-top:1px; float:left;">Remember me</a>
								</label>
							</div>
							<div style="float:left;"><button type="submit"><span>Sign in</span></button></div>
							<div class="clear"></div>
						</form>
					<?php } else { ?>
						<form method="post" action="" name="register">
							<input type="hidden" name="registerVar" id="registerVar" value="1" />
							<h1>Your Details</h1>
							<div class="_label">First Name</div>
							<div class="_input"><input type="text" value="<?php echo $fName; ?>" name="fName"></div>
							<div class="clear"></div>
							<div class="_label">Last Name</div>
							<div class="_input"><input type="text" value="<?php echo $lName; ?>" name="lName"></div>
							<div class="clear"></div>
							<div class="_label">Email Address</div>
							<div class="_input"><input type="text" value="<?php echo $email; ?>" name="email"></div>
							<div class="clear"></div>
							<div class="_label">Re-Type Email</div>
							<div class="_input"><input type="text" value="" name="cEmail"></div>
							<div class="clear" style="height:20px;"></div>
							<?php if (isset($_GET['ref'])) {?>
							<div class='_input'><input type='text' name='refby_id' value='<?php echo get_refby_id_by_reflink($_GET['ref']); ?>' /></div>
								
							<?php }else{ echo '<div id="test">nothing</div>' ;} ?>						
							<h1>Login Details</h1>
							<div class="_label">User Name</div>
							<div class="_input"><input type="text" value="<?php echo $userName; ?>" name="userName"></div>
							<div class="clear"></div>
							<div class="_label">Password</div>
							<div class="_input"><input type="password" value="" name="password"></div>
							<div class="clear"></div>
							<div class="_label">Re-Type Password</div>
							<div class="_input"><input type="password" value="" name="cPassword"></div>
							<div class="clear" style="height:20px;"></div>
						
						
							<div class="schoolInfo">
								<h1>Your School</h1>
								<div class="_label">State</div>
								<div class="_input">
									<select name="state" id="state">
										<option value="">--SELECT--</option>
										<?php
										$countryID = get_country_id(DEFAULT_COUNTRY);
										$states = get_states($countryID);
										if(!empty($states)) {
											 foreach($states as $stateInfo) {
											 	$selected = '';
											 	if($stateInfo->id == $state) {
											 		$selected = 'selected="selected"';
											 	}
											 	echo '<option value="'.$stateInfo->id.'" '.$selected.'>'.$stateInfo->name.'</option>';
											 }
										}
										?>
									</select>
				
							
							<div class="_input"><input type="text" name="reflink" value="<?php echo rand_str() ?>" /></div>
							
				
									<span class="addNew">
										<a href="#" onclick="javascript:return addNew(this, 'state');" style="margin-top:4px; position:absolute;">Add New</a>
									</span>
								</div>
								<div class="clear"></div>
						
								<div class="_label">School Name</div>
								<div class="_input">
									<select name="school" id="school">
										<option value="">--SELECT--</option>
									</select>
				
									<span class="addNew">
										<a href="#" onclick="javascript:return addNew(this, 'school');" style="margin-top:4px; position:absolute;">Add New</a>
									</span>
								</div>
								<div class="clear"></div>
						
								<div class="_label">Department</div>
								<div class="_input">
									<select name="dept" id="dept">
										<option value="">--SELECT--</option>
									</select>
				
									<span class="addNew">
										<a href="#" onclick="javascript:return addNew(this, 'dept');" style="margin-top:4px; position:absolute;">Add New</a>
									</span>
								</div>
								<div class="clear"></div>
							</div>
						
							<div class="clear" style="height:20px;"></div>
							<div style="float:right;"><button type="submit"><span>CREATE ACCOUNT</span></button></div>
							<div style="float:left; width:350px; font-size:14px;">
								<label class="_label" style="width:auto;">
									<input type="checkbox" style="margin-top:1px; float:left;" value="1" name="acceptTerms" <?php if($acceptTerms == '1') { echo 'checked="checked"';} ?> >I agree to these <a href="/tc" target="_blank" class="cboxElement">Terms &amp; Conditions</a>
								</label>
							</div>
							<div class="clear"></div>
						</form>
					<?php } ?>
				</div>
			</div>

			<div style="width:300px; float:right; margin-top:6px; margin-right:5px;" class="_body_box">
				<div class="_title"><h1>Why Sign Up?</h1></div>
				<div class="_cont">
					<div style="float: left; height: 65px; padding-right: 9px;"><img width="50" alt="" src="var/cms/paper.png"></div>
					<div><span style="font-size: 15px; color: #000000;">Sell your lecture notes @ your own price </span><br><br><span style="font-size: 11px;color:#666">&gt;Ex: $20 notes X 5 buyers = $100</span></div>
					<p>&nbsp;</p>
		
					<div style="float: left; height: 100px; padding-right: 9px;"><img width="50" alt="" src="var/cms/calendar.png"></div>
					<div><span style="font-size: 15px; color: #000000;">Buy lecture notes from your classes </span><br><br><span style="font-size: 11px;color:#666;">&gt;Save Time Study Smarter<br>&gt;Buy from those who have succeed in that class!<br>&gt;A+ your courses</span></div>
					<p>&nbsp;</p>
		
					<div style="float: left; height: 80px; padding-right: 9px;"><img width="50" alt="" src="var/cms/chat.png" style="margin-top: -7px;"></div>
					<div><span style="font-size: 15px; color: #000000;">Credibility </span><br><br><span style="font-size: 11px;color:#666;">&gt;Preview/Buy actual couse materials<br>&gt;Real Ratings<br>&gt;Real Comments<br>&gt;Real People</span></div>
					<p>&nbsp;</p>
				
					<p><span style="font-size: 15px; color: #000000;">Proud members:</span><br><br><img width="24" alt="" src="images/twitter.png"><img width="24" alt="" src="images/facebook.png"><img width="24" alt="" src="images/tumblr.png"><img width="24" alt="" src="images/scribd32.png"> <img height="24" alt="" src="images/paypal.png" style="padding-left: 25px;"></p>
				</div>
			</div>
		</div>
	</div>
	<div class="clear"></div>
</div>
<?php require_once 'templates/footer.php'; ?>
