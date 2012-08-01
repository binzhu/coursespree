<?php require_once 'includes/config.php'; ?>
<?php
$action = 'add';
if(isset($_SESSION['adminID']) && $_SESSION['adminID'] > 0) {
	$user = getAdminInfo();
	if($user['id'] > 0) {
		$action = 'edit';
		$ID = $user['id'];
		$name = $user['name'];
		$userName = $user['userName'];
		$email = $user['email'];
		$paypalEmail = $user['paypalEmail'];
		
		$paypalApiCredentials = $user['paypalApiCredentials'];
		if($paypalApiCredentials != '') {
			$paypalApiCredentialsArr = unserialize($paypalApiCredentials);
			if(!empty($paypalApiCredentialsArr)) {
				$paypalApiUsername = $paypalApiCredentialsArr['paypalApiUsername'];
				$paypalApiPassword = $paypalApiCredentialsArr['paypalApiPassword'];
				$paypalApiSignature = $paypalApiCredentialsArr['paypalApiSignature'];
			}
		}
	}
}

if($action == 'add') {
	exit;
}

if(isset($_POST['submitForm']) && $_POST['submitForm'] == '1') {
	$name = filterMe($_POST['name']);
	$email = filterMe($_POST['email']);
	$paypalEmail = filterMe($_POST['paypalEmail']);
	
	$userName = filterMe($_POST['userName']);
	$password = filterMe($_POST['password']);
	$cPassword = filterMe($_POST['cPassword']);
	
	$paypalApiUsername = filterMe($_POST['paypalApiUsername']);
	$paypalApiPassword = filterMe($_POST['paypalApiPassword']);
	$paypalApiSignature = filterMe($_POST['paypalApiSignature']);
	
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
	
	if($paypalApiUsername == '') {
		$_SESSION['errors']['apiUser'] = 'You have to enter Paypal Api User Name.';
	}
	
	if($paypalApiPassword == '') {
		$_SESSION['errors']['apiPass'] = 'You have to enter Paypal Api Password.';
	}
	
	if($paypalApiSignature == '') {
		$_SESSION['errors']['apiSignature'] = 'You have to enter Paypal Api Signature.';
	}
		
	if(!(isError())) {
		/******* Admin already exists with same user name/email *******/
		if($ID > 0) {
			$where = " AND id!='$ID'";
		}
		$sql = "SELECT * FROM `".DB_PREFIX."admin` WHERE userName='$userName' $where LIMIT 0,1";
	
		$data = get_row($sql);
		if(!empty($data)) {
			$_SESSION['errors']['userName'] = 'This User Name is already registered.';
		}
	
		$sql = "SELECT * FROM `".DB_PREFIX."admin` WHERE email='$email' $where LIMIT 0,1";
		$data = get_row($sql);
		if(!empty($data)) {
			$_SESSION['errors']['email'] = 'This Email Address is already registered.';
		}
		/******* Admin already exists with same user name/email *******/
	
	
		if(!(isError())) {
			$paypalApiCredentialsArr['paypalApiUsername'] = $paypalApiUsername;
			$paypalApiCredentialsArr['paypalApiPassword'] = $paypalApiPassword;
			$paypalApiCredentialsArr['paypalApiSignature'] = $paypalApiSignature;
			$paypalApiCredentials = serialize($paypalApiCredentialsArr);
			$fields = "name='$name', userName='$userName', email='$email', paypalEmail='$paypalEmail', paypalApiCredentials='$paypalApiCredentials'";
			if($action == 'add' || $password != '') {
				$fields .= ", password='".md5($password)."'";
			}
			
			switch($action) {
				case 'add':
					$dated = date('Y-m-d H:i:s');
					$fields .= ", dated='$dated'";
					$sql = "INSERT INTO `".DB_PREFIX."admin` SET $fields, dated='$dated'";
					break;
				case 'edit':
					$sql = "UPDATE `".DB_PREFIX."admin` SET $fields WHERE id='$ID'";
					break;
			}
			
			if($sql != '') {
				$success = mysql_query($sql);
				if($success) {
					if($action == 'add') {
						$ID = mysql_insert_id();
						$_SESSION['messages'][] = 'Admin added successfully';
					} else {
						$_SESSION['messages'][] = 'Admin updated successfully';
					}
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
		<h1>Admin Details</h1>
		
		<dl>
			<dt><label for="fName">Name:</label></dt>
			<dd><input type="text" name="name" id="name" value="<?php echo stripslashes($name); ?>"></dd>
		</dl>
		
		<dl>
			<dt><label for="email">Email Address:</label></dt>
			<dd><input type="text" name="email" id="email" value="<?php echo stripslashes($email); ?>"></dd>
		</dl>
		
		<dl>
			<dt><label for="paypalEmail">PayPal Email Address:</label></dt>
			<dd><input type="text" value="<?php echo stripslashes($paypalEmail); ?>" name="paypalEmail"></dd>
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
			
			<?php if($action == 'edit') { ?>
				<dl>
					<dt> </dt>
					<dd><p class="note">*Leave blank in order to retain old password</p></dd>
				</dl>
			<?php } ?>
		
			<dl>
				<dt><label for="cPassword">Re-Type Password:</label></dt>
				<dd><input type="text" name="cPassword" id="cPassword" value=""></dd>
			</dl>
			
			<div class="clear"></div>
		</div>
		
		
		<?php /***********************************************/ ?>
		<div class="clear" style="height:20px;"></div>
		<div style="padding:5px; border:1px dotted black;">
			<h1>Paypal API Credentials</h1>
			<dl>
				<dt><label for="userName">Paypal API UserName:</label></dt>
				<dd><input type="text" name="paypalApiUsername" id="paypalApiUsername" value="<?php echo stripslashes($paypalApiUsername); ?>" /></dd>
			</dl>
		
			<dl>
				<dt><label for="password">Paypal API Password:</label></dt>
				<dd><input type="text" name="paypalApiPassword" id="paypalApiPassword" value="<?php echo stripslashes($paypalApiPassword); ?>" /></dd>
			</dl>
			
			<dl>
				<dt><label for="cPassword">Paypal API Signature:</label></dt>
				<dd><input type="text" name="paypalApiSignature" id="paypalApiSignature" value="<?php echo stripslashes($paypalApiSignature); ?>" /></dd>
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
