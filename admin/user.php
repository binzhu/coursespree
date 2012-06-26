<?php require_once 'includes/config.php'; ?>
<?php
$action = 'add';
if(isset($_GET['id'])) {
	$action = 'edit';
	$ID = $_GET['id'];
	$user = getUser($ID);
	
	$fName = $user->fName;
	$lName = $user->lName;
	$email = $user->email;
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
	$stateID = $user->stateID;
	$schoolID = $user->schoolID;
	$deptID = $user->departmentID;
	
	$sql = "SELECT * FROM `".DB_PREFIX."states` WHERE id='$stateID'";
	$countryID = get_field('countryID', $sql);
	
	$active = $user->active;
}

if(isset($_POST['submitForm']) && $_POST['submitForm'] == '1') {
	$fName = filterMe($_POST['fName']);
	$lName = filterMe($_POST['lName']);
	$email = filterMe($_POST['email']);
	$gender = filterMe($_POST['gender']);
	$paypalEmail = filterMe($_POST['paypalEmail']);
	
	$day = filterMe($_POST['day']);
	$month = filterMe($_POST['month']);
	$year = filterMe($_POST['year']);
	$dob = $year."-".$month."-".$day;
	
	$address_fName = filterMe($_POST['address_fName']);
	$address_lName = filterMe($_POST['address_lName']);	
	$address_address = filterMe($_POST['address_address']);
	$address_city = filterMe($_POST['address_city']);
	$address_state = filterMe($_POST['address_state']);
	$address_country = filterMe($_POST['address_country']);
	$address_zip = filterMe($_POST['address_zip']);
	
	$stateID = filterMe($_POST['stateID']);
	$schoolID = filterMe($_POST['schoolID']);
	$deptID = filterMe($_POST['deptID']);
	
	$userName = filterMe($_POST['userName']);
	$password = filterMe($_POST['password']);
	$cPassword = filterMe($_POST['cPassword']);
	
	if(isset($_POST['active'])) {
		$active = 1;
	} else {
		$active = 0;
	}
	
	if($fName == '') {
		$_SESSION['errors'][] = 'You have to enter First Name.';
	}
	
	if($lName == '') {
		$_SESSION['errors'][] = 'You have to enter Last Name.';
	}
	
	if($email == '') {
		$_SESSION['errors'][] = 'You have to enter Email Address.';
	} else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$_SESSION['errors'][] = 'You have specified invalid Email address.';
	}
	
	if(strlen($userName) < 4) {
		$_SESSION['errors']['userName'] = 'User Name must contain atleast 4 characters.';
	}
	
	if($action == 'add' || $password != '') {
		if($password == '') {
			$_SESSION['errors'][] = 'You have to enter Password.';
		} else if($password != $cPassword) {
			$_SESSION['errors'][] = 'Entered Passwords do not match.';
		}
	}
		
	if(!(isError())) {
		userAlreadyExists($userName, $email, $ID);
		if(!(isError())) {
			/******** Upload avatar *******/
			$avatar = $user->avatar;
			if($_FILES['avatar']['name'] != '') {
				if($_FILES['avatar']['error'] == 0) {
					$tmp_name = $_FILES["avatar"]["tmp_name"];
					$avatar = addslashes(time()."_".$_FILES["avatar"]["name"]);
					$uploads_dir = '../uploads/images';
					$uploaded = move_uploaded_file($tmp_name, "$uploads_dir/$avatar");
					
					if(!$uploaded) {
						$_SESSION['warnings'][] = 'There is some error when uploading avatar';
					}
				} else {
					$_SESSION['warnings'][] = 'There is some error when uploading avatar';
				}
			}
			/******** Upload avatar *******/
			
			$fields = "fName='$fName', lName='$lName', gender='$gender', email='$email', userName='$userName', avatar='$avatar', dob='$dob', paypalEmail='$paypalEmail', active='$active'";
			if($action == 'add' || $password != '') {
				$fields .= ", password='".md5($password)."'";
			}
			
			switch($action) {
				case 'add':
					$fields .= ", dated='$dated'";
					$sql = "INSERT INTO `".DB_PREFIX."users` SET $fields, dated='$dated'";
					break;
				case 'edit':
					$sql = "UPDATE `".DB_PREFIX."users` SET $fields WHERE id='$ID'";
					break;
			}
			
			if($sql != '') {
				$success = mysql_query($sql);
				if($success) {
					if($action == 'add') {
						$ID = mysql_insert_id();
						$_SESSION['messages'][] = 'User added successfully';
					} else {
						$_SESSION['messages'][] = 'User updated successfully';
					}
			
					/************* Insert user school info ***********/
					$sql = "SELECT * FROM `".DB_PREFIX."user_school` WHERE userID='$ID'";
					$res = mysql_query($sql);
				
					$fields = "stateID='$stateID', schoolID='$schoolID', departmentID='$deptID'";
					if(mysql_num_rows($res) > 0) {
						$sql = "UPDATE `".DB_PREFIX."user_school` SET $fields WHERE userID='$ID'";
					} else {
						$fields .= ", userID='$ID', dated='$dated'";
						$sql = "INSERT INTO `".DB_PREFIX."user_school` SET $fields";
					}
					$res = mysql_query($sql);
					/************* Insert user school info ***********/
				
				
					/************* Insert user address info ***********/
					$sql = "SELECT * FROM `".DB_PREFIX."user_address` WHERE userID='$ID'";
					$res = mysql_query($sql);
				
					$fields = "fName='$address_fName', lName='$address_lName', address='$address_address', city='$address_city', state='$address_state', zip='$address_zip', country='$address_country'";
					if(mysql_num_rows($res) > 0) {
						$sql = "UPDATE `".DB_PREFIX."user_address` SET $fields WHERE userID='$ID'";
					} else {
						$fields .= ", userID='$ID', dated='$dated'";
						$sql = "INSERT INTO `".DB_PREFIX."user_address` SET $fields";
					}
					$res = mysql_query($sql);
					/************* Insert user address info ***********/
					
					//header('Location: user.php?id='.$ID);
					//exit;
				} else {
					$_SESSION['errors'][] = 'There is some validation error';
				}
			}
		}
	}
}

require_once 'templates/header.php'; ?>
    
<div class="form">
<form action="" method="post" name="mainFrom" id="mainFrom" class="niceform" enctype="multipart/form-data">
	<input type="hidden" name="submitForm" id="submitForm" value='1' />
	<h2>Add/Edit User</h2>
	<fieldset>
		
		<?php /***********************************************/ ?>
		<div class="clear"></div>
		<h1>User Details</h1>
		
		<dl>
			<dt><label for="active">Active:</label></dt>
			<dd>
				<input type="checkbox" name="active" id="active" <?php if($active) { echo 'checked="checked"'; } ?> >
			</dd>
		</dl>
		
		<dl>
			<dt><label for="fName">First Name:</label></dt>
			<dd><input type="text" name="fName" id="fName" value="<?php echo stripslashes($fName); ?>"></dd>
		</dl>
		
		<dl>
			<dt><label for="lName">Last Name:</label></dt>
			<dd><input type="text" name="lName" id="lName" value="<?php echo stripslashes($lName); ?>"></dd>
		</dl>
		
		<dl>
			<dt><label for="email">Email Address:</label></dt>
			<dd><input type="text" name="email" id="email" value="<?php echo stripslashes($email); ?>"></dd>
		</dl>
		
		<dl>
			<dt><label for="email">Gender:</label></dt>
			<dd>
				<input type="radio" value="m" name="gender" checked="checked"><label style="margin-left:5px;">Male</label>
				<input type="radio" value="f" name="gender" <?php if(stripslashes($gender) == 'f') { echo 'checked="checked"'; } ?>><label style="margin-left:5px;">Female</label>
			</dd>
		</dl>
		
		<dl>
			<dt><label for="paypalEmail">PayPal Email Address:</label></dt>
			<dd><input type="text" value="<?php echo stripslashes($paypalEmail); ?>" name="paypalEmail"></dd>
		</dl>
		
		<dl>
			<dt><label for="email">Date of birth:</label></dt>
			<dd class="bday">
				<div class="fLeft">
					<select name="day">
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
				</div>
				
				<div class="fLeft">
					<select name="month">
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
				</div>
				
				<div class="fLeft">
					<select name="year">
						<option value="0000">yyyy</option>
						<?php for($i=1910; $i<2012; $i++) { ?>
							<option value="<?php echo $i; ?>" <?php if($i == stripslashes($year)) { echo 'selected="selected"'; } ?>><?php echo $i; ?></option>
						<?php } ?>
					</select>
				</div>
			</dd>
		</dl>
		
		<dl>
			<dt><label for="paypalEmail">Avatar Image:</label></dt>
			<dd class="imageUpload">
				<table cellspacing="2" cellpadding="2" border="0" class="_form" width="100%">
					<tbody>
						<tr>
							<td style="vertical-align:top;"><input type="file" value="" name="avatar"></td>
							<td><span><img border="0" width="75" height="75" class="pngfix" alt="" src="../uploads/images/<?php echo stripslashes($avatar); ?>"></span></td>
						</tr>
					</tbody>
				</table>
			</dd>
		</dl>
		
		
		<?php /***********************************************/ ?>
		<div class="clear"></div>
		<h1>Address Details</h1>
		<dl>
			<dt><label for="address_fName">First Name:</label></dt>
			<dd><input type="text" name="address_fName" id="address_fName" value="<?php echo stripslashes($address_fName); ?>"></dd>
		</dl>
		
		<dl>
			<dt><label for="address_lName">Last Name:</label></dt>
			<dd><input type="text" name="address_lName" id="address_lName" value="<?php echo stripslashes($address_lName); ?>"></dd>
		</dl>
		
		<dl>
			<dt><label for="address_address">Address:</label></dt>
			<dd><input type="text" name="address_address" id="address_address" value="<?php echo stripslashes($address_address); ?>"></dd>
		</dl>
		
		<dl>
			<dt><label for="address_city">City:</label></dt>
			<dd><input type="text" name="address_city" id="address_city" value="<?php echo stripslashes($address_city); ?>"></dd>
		</dl>
		
		<dl>
			<dt><label for="address_state">State/Province:</label></dt>
			<dd>
				<select name="address_state" id="address_state">
					<option value="">--SELECT--</option>
				</select>
			</dd>
		</dl>
		
		<dl>
			<dt><label for="address_country">Country:</label></dt>
			<dd>
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
			</dd>
		</dl>
		
		<dl>
			<dt><label for="address_zip">ZIP:</label></dt>
			<dd><input type="text" name="address_zip" id="address_zip" value="<?php echo stripslashes($address_zip); ?>"></dd>
		</dl>
		
		
		<?php /***********************************************/ ?>
		<div class="clear"></div>
		<h1>School Details</h1>
		<dl>
			<dt><label for="name">Country:</label></dt>
			<dd>
				<select name="countryID" ID="countryID">
					<option value="">--Select Country--</option>
					<?php
					$sql = "SELECT * FROM `".DB_PREFIX."countries` ORDER BY `name`";
					$res = mysql_query($sql);
	
					if(mysql_num_rows($res) > 0) {
						while($country = mysql_fetch_array($res)) {
							$selected = '';
							if($country['id'] == $countryID) {
								$selected = 'selected="selected"';
							}
							echo '<option value="'.$country['id'].'" '.$selected.'>'.$country['name'].'</option>';
						}
					}
					?>
				</select>
			</dd>
		</dl>
		
		<dl>
			<dt><label for="name">State:</label></dt>
			<dd>
				<select name="stateID" id="stateID">
					<option value="">--Select State--</option>
				</select>
			</dd>
		</dl>
		
		<dl>
			<dt><label for="name">School:</label></dt>
			<dd>
				<select name="schoolID" id="schoolID">
					<option value="">--Select School--</option>
				</select>
			</dd>
		</dl>
		
		<dl>
			<dt><label for="name">Department:</label></dt>
			<dd>
				<select name="deptID" id="deptID">
					<option value="">--Select Department--</option>
				</select>
			</dd>
		</dl>
		
		<?php /***********************************************/ ?>
		<div class="clear"></div>
		<div style="padding:5px; border:1px dotted black;">
			<h1>Login Details</h1>
			<dl>
				<dt><label for="userName">User Name:</label></dt>
				<dd><input type="text" name="userName" id="userName" value="<?php echo stripslashes($userName); ?>"></dd>
			</dl>
		
			<dl>
				<dt><label for="password">Password:</label></dt>
				<dd><input type="text" name="password" id="password" value=""></dd>
			</dl>
			<?php if($action == 'edit') { ?><p class="note">*Leave blank in order to retain old password</p><?php } ?>					
		
			<dl>
				<dt><label for="cPassword">Re-Type Password:</label></dt>
				<dd><input type="text" name="cPassword" id="cPassword" value=""></dd>
			</dl>
			
			<div class="clear"></div>
		</div>
				
		
		<?php /***********************************************/ ?>
		
		
		<div class="clear"></div>
		<dl class="submit"><input type="submit" name="submit" id="submit" value="Submit" /></dl>
	</fieldset>
</form>
</div>

<?php require_once 'scripts.js.php'; ?>
<?php require_once 'templates/footer.php'; ?>
