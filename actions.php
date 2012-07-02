<?php
if(isset($_GET['action'])) {
	$action = $_GET['action'];
	
	switch($action) {
		case 'logout':
			unset($_SESSION['userID']);
			header('Location: index.php');
			exit;
			break;
	}
}

if(isset($_POST['loginVar'])) {
	$userName = filterMe($_POST['userName']);
	$password = filterMe($_POST['password']);
	if(isset($_POST['remember'])) {
		$remember = 1;
	} else {
		$remember = 0;
	}
	
	logMeIn($userName, $password, $remember);
} else if(isset($_POST['registerVar'])) {
	$fName = filterMe($_POST['fName']);
	$lName = filterMe($_POST['lName']);
	$email = filterMe($_POST['email']);
	$cEmail = filterMe($_POST['cEmail']);
	$userName = filterMe($_POST['userName']);
	$password = filterMe($_POST['password']);
	$cPassword = filterMe($_POST['cPassword']);
	
	$state = filterMe($_POST['state']);
	$school = filterMe($_POST['school']);
	$dept = filterMe($_POST['dept']);
	
	$active = '0';
	$dated = date('Y-m-d H:i:s');
	
	if(isset($_POST['acceptTerms'])) {
		$acceptTerms = 1;
	} else {
		$acceptTerms = 0;
	}
	
	if($fName == '') {
		$_SESSION['errors']['fName'] = 'You have to enter First Name.';
	}
	
	if($lName == '') {
		$_SESSION['errors']['lName'] = 'You have to enter Last Name.';
	}
	
	if($email == '') {
		$_SESSION['errors']['email'] = 'You have to enter Email Address.';
	} else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$_SESSION['errors']['email'] = 'You have specified invalid Email address.';
	}  else if($email != $cEmail) {
		$_SESSION['errors']['email'] = 'Entered Emails do not match.';
	}
	
	if(strlen($userName) < 4) {
		$_SESSION['errors']['userName'] = 'User Name must contain atleast 4 characters.';
	}
	
	if($password == '') {
		$_SESSION['errors']['password'] = 'You have to enter Password.';
	} else if($password != $cPassword) {
		$_SESSION['errors']['password'] = 'Entered Passwords do not match.';
	}
	
	if(!$acceptTerms) {
		$_SESSION['errors']['terms'] = 'You must agree with Terms & Conditions.';
	}
	
	if(!(isError())) {
		userAlreadyExists($userName, $email, '');
		
		if(!(isError())) {
			$sql = "INSERT INTO `".DB_PREFIX."users` SET
						fName='$fName', lName='$lName', email='$email', userName='$userName', password='".md5($password)."', active='$active', dated='$dated'
					";
			$res = mysql_query($sql);
			if($res) {
				$userID = mysql_insert_id();
				/************* Insert user school info ***********/
				$sql = "SELECT * FROM `".DB_PREFIX."user_school` WHERE userID='$userID'";
				$res = mysql_query($sql);
				
				$fields = "stateID='$state', schoolID='$school', departmentID='$dept'";
				if(mysql_num_rows($res) > 0) {
					$sql = "UPDATE `".DB_PREFIX."user_school` SET $fields WHERE userID='$userID'";
				} else {
					$fields .= ", userID='$userID', dated='$dated'";
					$sql = "INSERT INTO `".DB_PREFIX."user_school` SET $fields";
				}
				$res = mysql_query($sql);
				/************* Insert user school info ***********/
				
				/************* Send Confirmation Mail ***********/
				$mail = sendConfirmMail($userID);
				/************* Send Confirmation Mail ***********/
				
				$_SESSION['unActiveUserID'] = $userID;
				header('Location: register.php?type=login');
				exit;
			} else {
				$_SESSION['errors']['register'] = 'Sorry! Try again later.';
			}
		}
	}
}

if(isset($_POST['myAccountVar'])) {
	$fName = filterMe($_POST['fName']);
	$lName = filterMe($_POST['lName']);
	$email = filterMe($_POST['email']);
	$gender = filterMe($_POST['gender']);
	
	$day = filterMe($_POST['day']);
	$month = filterMe($_POST['month']);
	$year = filterMe($_POST['year']);
	$dob = $year."-".$month."-".$day;
	
	$paypalEmail = filterMe($_POST['paypalEmail']);
	$address_fName = filterMe($_POST['address_fName']);
	$address_lName = filterMe($_POST['address_lName']);
	
	$address_address = filterMe($_POST['address_address']);
	$address_city = filterMe($_POST['address_city']);
	$address_state = filterMe($_POST['address_state']);
	$address_zip = filterMe($_POST['address_zip']);
	$address_country = filterMe($_POST['address_country']);
	
	$state = filterMe($_POST['state']);
	$school = filterMe($_POST['school']);
	$dept = filterMe($_POST['dept']);
	
	if($fName == '') {
		$_SESSION['errors']['fName'] = 'You have to enter First Name.';
	}
	
	if($lName == '') {
		$_SESSION['errors']['lName'] = 'You have to enter Last Name.';
	}
	
	if($email == '') {
		$_SESSION['errors']['email'] = 'You have to enter Email Address.';
	} else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$_SESSION['errors']['email'] = 'You have specified invalid Email address.';
	}
	
	if(!(isError())) {
		userAlreadyExists($userName, $email, $_SESSION['userID']);
		if(!(isError())) {
			/******** Upload avatar *******/
			$avatar = $user->avatar;
			if($_FILES['avatar']['name'] != '') {
				if($_FILES['avatar']['error'] == 0) {
					$tmp_name = $_FILES["avatar"]["tmp_name"];
					$avatar = addslashes(time()."_".$_FILES["avatar"]["name"]);
					$uploads_dir = 'uploads/images';
					$uploaded = move_uploaded_file($tmp_name, "$uploads_dir/$avatar");
					
					if(!$uploaded) {
						$_SESSION['warnings']['avator'] = 'There is some error when uploading avatar';
					}
				} else {
					$_SESSION['warnings']['avator'] = 'There is some error when uploading avatar';
				}
			}
			/******** Upload avatar *******/
			
			$sql = "UPDATE `".DB_PREFIX."users` SET
						fName='$fName', lName='$lName', gender='$gender', avatar='$avatar', dob='$dob', paypalEmail='$paypalEmail'
					WHERE id='{$_SESSION['userID']}'
					";
			$res = mysql_query($sql);
			if($res) {
				$userID = $_SESSION['userID'];
				
				/************* Insert user school info ***********/
				$sql = "SELECT * FROM `".DB_PREFIX."user_school` WHERE userID='$userID'";
				$res = mysql_query($sql);
				
				$fields = "stateID='$state', schoolID='$school', departmentID='$dept'";
				if(mysql_num_rows($res) > 0) {
					$sql = "UPDATE `".DB_PREFIX."user_school` SET $fields WHERE userID='$userID'";
				} else {
					$fields .= ", userID='$userID', dated='$dated'";
					$sql = "INSERT INTO `".DB_PREFIX."user_school` SET $fields";
				}
				$res = mysql_query($sql);
				/************* Insert user school info ***********/
				
				
				/************* Insert user address info ***********/
				$sql = "SELECT * FROM `".DB_PREFIX."user_address` WHERE userID='$userID'";
				$res = mysql_query($sql);
				
				$fields = "fName='$address_fName', lName='$address_lName', address='$address_address', city='$address_city', state='$address_state', zip='$address_zip', country='$address_country'";
				if(mysql_num_rows($res) > 0) {
					$sql = "UPDATE `".DB_PREFIX."user_address` SET $fields WHERE userID='$userID'";
				} else {
					$fields .= ", userID='$userID', dated='$dated'";
					$sql = "INSERT INTO `".DB_PREFIX."user_address` SET $fields";
				}
				$res = mysql_query($sql);
				/************* Insert user address info ***********/
				
				$_SESSION['messages']['register'] = 'Account has been updated successfully.';
				header('Location: user.php?type=myaccount');
				exit;
			} else {
				$_SESSION['errors']['register'] = 'Sorry! Try again later.';
				header('Location: user.php?type=myaccount');/*xxxxxxxxxxxxxxxxxxxxx*/
			}
		}
	}
}

if(isset($_REQUEST['approveAns'])) {
	$approveQuesID = filterMe($_GET['id']);
	$ansIDs = $_POST['approveCheck'];
	$ansIDsList = '';
	if(!empty($ansIDs)) {
		foreach($ansIDs as $ansID) {
			if($ansID > 0) {
				$ansIDsList .= "$ansID,";
			}
		}
		$return = approveAns($approveQuesID, $ansIDsList, $_SESSION['userID']);
	}
}

if(isset($_POST['changePasswordVar'])) {
	$oPassword = filterMe($_POST['oPassword']);
	$password = filterMe($_POST['password']);
	$cPassword = filterMe($_POST['cPassword']);
	
	if($oPassword == '') {
		$_SESSION['errors']['password'] = 'You have to enter Old Password.';
	} else if($password == '') {
		$_SESSION['errors']['password'] = 'You have to enter New Password.';
	} else if($password != $cPassword) {
		$_SESSION['errors']['password'] = 'Entered Passwords do not match.';
	} else if(isInvlidOldPassword($_SESSION['userID'], $oPassword)) {
		$_SESSION['errors']['password'] = 'Invalid old password.';
	} 
	
	if(!(isError())) {
		$sql = "UPDATE `".DB_PREFIX."users` SET password='".md5($password)."' WHERE id='{$_SESSION['userID']}'";
		$res = mysql_query($sql);
		
		if($res) {
			$_SESSION['messages']['password'] = 'Password updated successfully.';
			header('Location: user.php?type=myaccount');
			exit;
		}
	}
}

if(isset($_POST['sell_step_1'])) {
	$doc = filterMe($_POST['doc']);
	$coverimage = filterMe($_POST['coverimage']);
	$state = filterMe($_POST['state']);
	$school = filterMe($_POST['school']);
	$dept = filterMe($_POST['dept']);
	$course = filterMe($_POST['course']);
	$term = filterMe($_POST['term']);
	$status = '0';
	$dated = date('Y-m-d H:i:s');
	
	if($doc == '') {
		$_SESSION['errors']['doc'] = 'You have to upload a file.';
	}
	if($state < 1) {
		$_SESSION['errors']['state'] = "You have to select School's State.";
	}
	if($school < 1) {
		$_SESSION['errors']['school'] = "You have to select School.";
	}
	if($dept < 1) {
		$_SESSION['errors']['dept'] = "You have to select Department.";
	}
	if($course < 1) {
		$_SESSION['errors']['course'] = "You have to select Course.";
	}
	if($term == '') {
		$_SESSION['errors']['term'] = "You have to select Term.";
	}
	
	if(!(isError())) {
		$sql = "INSERT INTO `".DB_PREFIX."notices` SET userID='{$_SESSION['userID']}', doc='$doc',coverimage = '$coverimage', stateID='$state', schoolID='$school', deptID='$dept', courseID='$course', term='$term', status='$status', dated='$dated'";
		$res = mysql_query($sql);
		if($res) {
			$docID = mysql_insert_id();
			header('Location: user.php?type=sell&id='.$docID);
			exit;
		}
	}
}

if(isset($_POST['sell_step_2'])) {
	$professor = filterMe($_POST['professor']);
	$docType = filterMe($_POST['docType']);
	$docName = filterMe($_POST['docName']);
	$tips = filterMe($_POST['tips']);
	$price = filterMe($_POST['price']);
	$cp_fee_percentage = CP_PAYMENT_FEE_PERCENTAGE;
	$paypalEmail = filterMe($_POST['paypalEmail']);
	
	if($professor == '') {
		$_SESSION['errors']['professor'] = 'You have to select Professor.';
	}
	if($docType < 1) {
		$_SESSION['errors']['docType'] = "You have to select Document type.";
	}
	if($docName == '') {
		$_SESSION['errors']['docName'] = "You have to enter Document name.";
	}
	if($tips == '') {
		$_SESSION['errors']['tips'] = "You have to enter Notes/Tips.";
	}
	if($price == '') {
		$_SESSION['errors']['price'] = "You have to enter Price.";
	}
	if($paypalEmail == '') {
		$_SESSION['errors']['paypalEmail'] = "You have to enter Paypal Email Address.";
	}  else if(!filter_var($paypalEmail, FILTER_VALIDATE_EMAIL)) {
		$_SESSION['errors']['paypalEmail'] = 'You have specified invalid Email address.';
	}
	
	/******** Upload Cover Image *******/
	if(!empty($_FILES['coverImage']) && $_FILES['coverImage']['name'] != '') {
		if($_FILES['coverImage']['error'] == 0) {
			$tmp_name = $_FILES["coverImage"]["tmp_name"];
			$coverImage = addslashes(time()."_".$_FILES["coverImage"]["name"]);
			$uploads_dir = 'uploads/docs/preview';
			$uploaded = move_uploaded_file($tmp_name, "$uploads_dir/$coverImage");
			
			if(!$uploaded) {
				$_SESSION['warnings']['coverImage'] = 'There is some error when uploading cover image';
			}
		} else {
			$_SESSION['warnings']['avator'] = 'There is some error when uploading Cover image';
		}
	}
	/******** Upload Cover Image *******/
	
	if(!(isError())) {
		$sql = "UPDATE `".DB_PREFIX."notices` SET coverImage='$coverImage', professorID='$professor', docTypeID='$docType', docName='$docName', tips='$tips', price='$price', cp_fee_percentage='$cp_fee_percentage' WHERE id='$docID'";
		$res = mysql_query($sql);
		if($res) {
			$sql = "UPDATE `".DB_PREFIX."users` SET paypalEmail='$paypalEmail' WHERE id='{$_SESSION['userID']}'";
			$res = mysql_query($sql);
			if($res) {
				header('Location: user.php?type=sell&id='.$docID.'&step=3');
				exit;
			} else {
				$_SESSION['errors']['paypalEmail'] = "There is some error when trying to update your Paypal Email Address.";
			}
		}
	}
}

if(isset($_POST['publish'])) {
	$price = filterMe($_POST['price']);
	$cp_fee_percentage = CP_PAYMENT_FEE_PERCENTAGE;
	if($price == '') {
		$_SESSION['errors']['price'] = "You have to enter Price.";
	}
	
	if(!(isError())) {
		$sql = "UPDATE `".DB_PREFIX."notices` SET price='$price', cp_fee_percentage='$cp_fee_percentage', status='1' WHERE id='$docID'";
		$res = mysql_query($sql);
		
		if($res) {
			header('Location: notice.php?id='.$docID);
			exit;
		}
	}
}

if(isset($_POST['commentsBody'])) {
	if(isUserLoggedin()) {
		$comment = filterMe($_POST['commentsBody']);
		if($comment != '') {
			$fromUserID = $_SESSION['userID'];
			
			$toNoticeID = $_POST['noticeID'];
			if($toNoticeID > 0) {
				$toUserID = 0;
			} else {
				$toUserID = $_GET['id'];
			}
			$dated = date('Y-m-d H:i:s');
			$sql = "INSERT INTO `".DB_PREFIX."comments` SET fromUserID='$fromUserID', toUserID='$toUserID', toNoticeID='$toNoticeID', comment='$comment', dated='$dated'";
			$res = mysql_query($sql);
		}
	}
}

if(isset($_POST['addQuestionVar'])) {
	if(isUserLoggedin()) {
		$quesID = '';
		
		$caption = filterMe($_POST['caption']);
		$description = filterMe($_POST['description']);
		$catID = filterMe($_POST['catID']);
		$price = filterMe($_POST['price']);
		$cp_fee_percentage = CP_PAYMENT_FEE_PERCENTAGE;
		$tags = filterMe($_POST['tags']);
		
		if(isset($_GET['id'])) {
			$quesID = $_GET['id'];
			$question = getQuestion($quesID);
			if($question->userID != $_SESSION['userID']) {
				$_SESSION['errors']['security'] = "You haven't access to edit this question.";
			}
		}
		
		if(!(isError())) {
			$tagsArr = explode(',', $tags);
			$tagsNew = '';
			if(!empty($tagsArr)) {
				foreach($tagsArr as $tag) {
					$tag = trim($tag);
					if($tag != '') {
						$tagsNew .= trim($tag).",";
					}
				}
			}
			$tags = $tagsNew;
			$dated = date('Y-m-d H:i:s');
	
			if($caption == '') {
				$_SESSION['errors']['caption'] = 'Please provide caption for question.';
			}
	
			if($description == '') {
				$_SESSION['errors']['description'] = 'Please provide description for question.';
			}
		
			if($catID < 1) {
				$_SESSION['errors']['catID'] = 'Please select a category for question.';
			}
	
			if(!(isError())) {
				if($quesID > 0) {
					$sql = "UPDATE `".DB_PREFIX."questions` SET caption='$caption', description='$description', catID='$catID', tags='$tags' WHERE id='$quesID' AND userID='{$_SESSION['userID']}'";
					$message = 'Your question has been updated successfully.';
				} else {
					$sql = "INSERT INTO `".DB_PREFIX."questions` SET userID='{$_SESSION['userID']}', caption='$caption', description='$description', catID='$catID', price='$price', cp_fee_percentage='$cp_fee_percentage', tags='$tags', dated='$dated'";
					$message = 'Your question has been added successfully.';
				}
				
				$res = mysql_query($sql);
				if($res) {
					$_SESSION['messages']['question'] = $message;
					if($quesID < 1) {
						$quesID = mysql_insert_id();
					}
					
					header('Location:questions.php?id='.$quesID);
					exit;
				} else {
					$_SESSION['errors']['question'] = 'There is some problem when trying to add your question.';
				}
			}
		}
	}
}

if(isset($_GET['resend']) && $_GET['resend'] == '1') {
	$unActiveUserID = $_SESSION['unActiveUserID'];
	if($unActiveUserID > 0) {
		$mail = sendConfirmMail($unActiveUserID);
		header('Location: register.php?type=login');
		exit;
	}
}

if(isset($_GET['confirm']) && $_GET['confirm'] != '') {
	$confirm = $_GET['confirm'];
	$confirm = trim($confirm);
	
	$sql = "SELECT *, CONCAT(id,'-',userName,'-',email) as confirm FROM `".DB_PREFIX."users` WHERE active!='1'";
	$data = get_rows($sql);
	
	if(!empty($data)) {
		foreach($data as $result) {
			if(md5($result->confirm) == $confirm) {
				$resultUserID = $result->id;
				break;
			}
		}
		
		if($resultUserID > 0) {
			$sql = "UPDATE `".DB_PREFIX."users` SET active='1' WHERE id='$resultUserID'";
			$res = mysql_query($sql);
		}
	}
	
	header('Location: register.php?type=login');
	exit;
}
?>
