<?php
require_once('includes/config.php');

if(!isUserLoggedin()) {
	header('Location: register.php?type=login');
	exit;
}

if(!isset($_POST['myAccountVar'])) {
	$fName = $user->fName;
	$lName = $user->lName;
	$email = $user->email;
	$reflink =$user->reflink;
	$refby = $user->refby_id;
	$userName = $user->userName;
	$gender = $user->gender;

	$dob = $user->dob;
	$dobArr = explode('-', $dob);
	if(!empty($dobArr)) {
		$day = $dobArr['2'];
		$month = $dobArr['1'];
		$year = $dobArr['0'];
	}

	$avatar = $user->avatar;
	$rate = $user->rate;
	
	$paypalEmail = $user->paypalEmail;
	$address_fName = $user->address_fName;
	$address_lName = $user->address_lName;
	$address_address = $user->address_address;
	$address_city = $user->address_city;
	$address_state = $user->address_state;
	$address_zip = $user->address_zip;
	$address_country = $user->address_country;
	$state = $user->stateID;
	$school = $user->schoolID;
	$dept = $user->departmentID;
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

					<div class="userDashboardRight">
						<div class="profile_content">
							<form enctype="multipart/form-data" method="post" action="" name="myAccount">
								<input type="hidden" name="myAccountVar" id="myAccountVar" value="1" />	
								<?php if($reflink != null) {?>
								<p>
								Here is your unique referal link, use this link to invite friend joins coursespree, your will get 5% interest of their first two transactions.
								</p>
								<p><a href="http://localhost/register.php?ref=<?php echo stripslashes($reflink); ?>" >http://localhost/register.php?ref=<?php echo stripslashes($reflink); ?></a></p>
								<?php }?>
								<h1>Settings</h1>
								<div class="clear"></div>
								<div class="_settings_hdr _sel"><span>Personal Information</span></div>
								<div class="_settings_box" style="display: block;">
									<div class="_cont">
										<table cellspacing="2" cellpadding="2" border="0" class="_form">
											<tbody>

											<tr>
												<td>Username:</td>
												<td><input type="text" readonly="readonly" value="<?php echo stripslashes($userName); ?>" name="userName"></td>
											</tr>
												<tr>
												<td>Gender:</td>
												<td>
													<label><input type="radio" value="m" name="gender" checked="checked">Male</label>
													<label><input type="radio" value="f" name="gender" <?php if(stripslashes($gender) == 'f') { echo 'checked="checked"'; } ?>>Female</label>
												</td>
											</tr>
											<tr>
												<td>First Name:</td>
												<td><input type="text" value="<?php echo stripslashes($fName); ?>" name="fName"></td>
											</tr>
											<tr>
												<td>Last Name:</td>
												<td><input type="text" value="<?php echo stripslashes($lName); ?>" name="lName"></td>
											</tr>
											<tr>
												<td>Email:</td>
												<td><input type="text" readonly="readonly" value="<?php echo stripslashes($email); ?>" name="email"></td>
											</tr>

											<tr>
												<td>Reffered by:</td>
												<td><?php echo get_username_by_id($refby); ?></td>
											</tr>											
											<tr>
												<td>Date of Birth:</td>
												<td>
													<select name="day" style="width:60px;">
														<option value="00">dd</option>
														<?php for($i=1; $i<32; $i++) { ?>
															<?php
															if($i<10) {
																$i = "0".$i;
															}
															?>
															<option value="<?php echo $i; ?>" <?php if($i == stripslashes($day)) { echo 'selected="selected"'; } ?>><?php echo $i; ?></option>
														<?php } ?>
													</select>
					
													<select name="month" style="width:60px;">
														<option value="00">mm</option>
														<?php for($i=1; $i<13; $i++) { ?>
															<?php
															if($i<10) {
																$i = "0".$i;
															}
															?>
															<option value="<?php echo $i; ?>" <?php if($i == stripslashes($month)) { echo 'selected="selected"'; } ?>><?php echo $i; ?></option>
														<?php } ?>
													</select>
					
													<select name="year" style="width:100px;">
														<option value="0000">yyyy</option>
														<?php for($i=1910; $i<2012; $i++) { ?>
															<option value="<?php echo $i; ?>" <?php if($i == stripslashes($year)) { echo 'selected="selected"'; } ?>><?php echo $i; ?></option>
														<?php } ?>
													</select>
												</td>
											</tr>
											</tbody>
										</table>
									</div>
								</div>
				
				
								<div class="clear"></div>
								<div class="_settings_hdr"><span>PayPal</span></div>
								<div class="_settings_box" style="display: block;">
									<div class="_cont">
										<table cellspacing="2" cellpadding="2" border="0" class="_form">
											<tbody>
											<tr>
												<td>PayPal Email Address:</td>
												<td><input type="text" value="<?php echo stripslashes($paypalEmail); ?>" name="paypalEmail"></td>
											</tr>
											</tbody>
										</table>
									</div>
								</div>

								<div class="clear"></div>
								<div class="_settings_hdr"><span>Avatar Image</span></div>
								<div class="_settings_box" style="display: block;">
									<div class="_cont">
										<table cellspacing="2" cellpadding="2" border="0" class="_form">
											<tbody>
											<tr>
												<td>Photo:</td>
												<td><input type="file" value="" name="avatar"></td>
											</tr>
											<tr>
												<td></td>
												<td><span><img border="0" width="150" height="150" class="pngfix" alt="" src="<?php echo stripslashes($avatar); ?>"></span></td>
											</tr>
											</tbody>
										</table>
									</div>
								</div>
				
				
								<div class="clear"></div>
								<div class="_settings_hdr"><span>Address</span></div>
								<div class="_settings_box" style="display: block;">
									<div class="_cont">
										<table cellspacing="2" cellpadding="2" border="0" class="_form">
											<tbody>
											<tr>
												<td>First Name:</td>
												<td><input type="text" value="<?php echo stripslashes($address_fName); ?>" name="address_fName"></td>
											</tr>
											<tr>
												<td>Last Name:</td>
												<td><input type="text" value="<?php echo stripslashes($address_lName); ?>" name="address_lName"></td>
											</tr>
											<tr>
												<td class="label">Address:</td>
												<td><input type="text" value="<?php echo stripslashes($address_address); ?>" name="address_address"></td>
											</tr>
											<tr>
												<td class="label">City:</td>
												<td><input type="text" value="<?php echo stripslashes($address_city); ?>" name="address_city"></td>
											</tr>
											<tr>
												<td class="label">State/Province:</td>
												<td>
													<select name="address_state" id="address_state">
														<option value="">--SELECT--</option>
													</select>
												</td>
											</tr>
											<tr>
												<td class="label">Country:</td>
												<td>
													<select name="address_country" id="address_country">
														<option value="">--SELECT--</option>
														<?php
														$countries = get_countries();
														if(!empty($countries)) {
															 foreach($countries as $countryInfo) {
															 	$selected = '';
															 	if($countryInfo->id == stripslashes($address_country)) {
															 		$selected = 'selected="selected";';
															 	}
															 	echo '<option value="'.$countryInfo->id.'" '.$selected.'>'.$countryInfo->name.'</option>';
															 }
														}
														?>
													</select>
												</td>
											</tr>
											<tr>
												<td class="label">ZIP:</td>
												<td><input type="text" value="<?php echo stripslashes($address_zip); ?>" name="address_zip"></td>
											</tr>
											</tbody>
										</table>
									</div>
								</div>
	
								<div class="clear"></div>
								<div class="_settings_hdr"><span>School</span></div>
								<div class="_settings_box" style="display: block;">
									<div class="_cont">
										<table cellspacing="2" cellpadding="2" border="0" class="_form">
											<tbody>
											<tr>
												<td>State:</td>
												<td>
													<select name="state" id="state">
														<option value="">--SELECT--</option>
														<?php
														$country = get_country_id(DEFAULT_COUNTRY);
														$states = get_states($country);
														if(!empty($states)) {
															 foreach($states as $stateInfo) {
															 	$selected = '';
															 	if($stateInfo->id == $state) {
															 		$selected = 'selected="selected";';
															 	}
															 	echo '<option value="'.$stateInfo->id.'" '.$selected.'>'.$stateInfo->name.'</option>';
															 }
														}
														?>
													</select>
												</td>
											</tr>
											<tr>
												<td>School:</td>
												<td>
													<select name="school" id="school">
														<option value="">--SELECT--</option>
													</select>
												</td>
											</tr>
											<tr>
												<td colspan="2">&nbsp;</td>
											</tr>
											<tr>
												<td class="label">Department:</td>
												<td>
													<select name="dept" id="dept">
														<option value="">--SELECT--</option>
													</select>
												</td>
											</tr>
											</tbody>
										</table>
									</div>
								</div>
								
								
								<div class="clear"></div>
								<div class="_settings_box" style="display: block;">
									<div style="float:right; margin-right:25px;"><button class="yellow" type="submit"><span>Save</span></button></div>
									<div class="clear"></div>
								</div>
							</form>
							
							
							<form action="" method="post">
								<input type="hidden" name="changePasswordVar" id="changePasswordVar" value="1" />									
								<div class="clear"></div>
								<div class="_settings_hdr"><span>Change Your Password</span></div>
								<div class="_settings_box" style="display: block;">
									<div class="_cont">
										<table cellspacing="2" cellpadding="2" border="0" class="_form">
											<tbody>
											<tr>
												<td>User Name:</td>
												<td><span><?php echo stripslashes($userName); ?></span></td>
											</tr>
											<tr>
												<td>Current Password:</td>
												<td><input type="password" maxlength="40" value="" name="oPassword"></td>
											</tr>
											<tr>
												<td>New Password:</td>
												<td><input type="password" maxlength="40" value="" name="password"></td>
											</tr>
											<tr>
												<td>Repeat Password:</td>
												<td><input type="password" maxlength="40" value="" name="cPassword"></td>
											</tr>
											</tbody>
										</table>
									</div>
								</div>
								
								<div class="clear"></div>
								<div class="_settings_box" style="display: block;">
									<div style="float:right; margin-right:25px;"><button class="yellow" type="submit"><span>Save</span></button></div>
									<div class="clear"></div>
								</div>
							</form>
						</div>
					</div>
					<div class="clear"></div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php require_once 'templates/footer.php'; ?>
