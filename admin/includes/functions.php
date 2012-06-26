<?php
function admin_login($userName, $password, $rememberMe) {
	if($rememberMe == '1') {
		setcookie('adminUser', $userName, time()+(60*60*24*365) ); /*for 1 year*/
		setcookie('adminPass', base64_encode($password), time()+(60*60*24*365) ); /*for 1 year*/
	} else {
		setcookie('adminUser', ''); /*delete cookie*/
		setcookie('adminPass', ''); /*delete cookie*/
	}
	
	if($userName == '' || $password == '') {
		$_SESSION['errors']['validation'] = 'Some validation errors';
		return;
	}
	
	$sql = "SELECT * FROM `".DB_PREFIX."admin` WHERE userName='$userName' AND password='".md5($password)."' LIMIT 0,1";
	$res = mysql_query($sql);
	
	if(mysql_num_rows($res) > 0) {
		$data = mysql_fetch_array($res);
		if($data['id'] > 0) {
			$_SESSION['adminID'] = $data['id'];
			header('Location: index.php');
			exit;
		}
	}
}

function admin_forgotPass($email) {
	$sql = "SELECT * FROM `".DB_PREFIX."admin` WHERE email='$email' LIMIT 0,1";
	$res = mysql_query($sql);
	
	if(mysql_num_rows($res) > 0) {
		$data = mysql_fetch_array($res);
		if($data['id'] > 0) {
			$newPass = generatePassword(9,8);
			
			$sql = "UPDATE `".DB_PREFIX."admin` SET password='".md5($newPass)."' WHERE email='$email'";
			$res = mysql_query($sql);
			
			if($res) {
				$name = $data['name'];
				$userName = $data['userName'];
				$password = $newPass;
				
				/******** Mail ********/
				$to = $email;
				$from = $email;
				$subject = 'Forgot Password';
				$message = "
					Hi $name, <br /><br />
					Your login details for wetweet are:<br />
					<strong>Login Url:</strong> http://wetweet.me/new/admin/login.php<br />
					<strong>User Name:</strong> $userName<br />
					<strong>Password:</strong> $password<br />
				";
				
				$sent = sendmail($to, $subject, $message);
				if($sent) {
					$_SESSION['messages']['forgot'] = 'A mail has been sent to your inbox.';
				}
			}
		}
	} else {
		$_SESSION['errors']['forgot'] = 'Invalid Email-ID.';
	}
}

function isAdminLoggedIn() {
	if(isset($_SESSION['adminID']) && $_SESSION['adminID'] > 0)
		return 1;
	else
		return 0;
}

function generatePassword($length=9, $strength=8) {
	$vowels = 'aeuy';
	$consonants = 'bdghjmnpqrstvz';
	if ($strength & 1) {
		$consonants .= 'BDGHJLMNPQRSTVWXZ';
	}
	if ($strength & 2) {
		$vowels .= "AEUY";
	}
	if ($strength & 4) {
		$consonants .= '23456789';
	}
	if ($strength & 8) {
		$consonants .= '@#$%';
	}
 
	$password = '';
	$alt = time() % 2;
	for ($i = 0; $i < $length; $i++) {
		if ($alt == 1) {
			$password .= $consonants[(rand() % strlen($consonants))];
			$alt = 0;
		} else {
			$password .= $vowels[(rand() % strlen($vowels))];
			$alt = 1;
		}
	}
	return $password;
}

function getAdminInfo() {
	if(isset($_SESSION['adminID']) && $_SESSION['adminID'] > 0) {
		$sql = "SELECT * FROM `".DB_PREFIX."admin` WHERE id='{$_SESSION['adminID']}'";
		$res = mysql_query($sql);
	
		if(mysql_num_rows($res) > 0) {
			$data = mysql_fetch_array($res);
			return $data;
		}
	}
}

function show_admin_msgs() {
	if(!empty($_SESSION['warnings'])) { ?>
		<div class="warning_box">
			<?php
			foreach($_SESSION['warnings'] as $warning) {
				echo $warning."<br />";
			}
			?>
		</div>
    <?php 
		unset($_SESSION['warnings']);
	} 
	
	if(!empty($_SESSION['errors'])) { ?>
		<div class="error_box">
			<?php
			foreach($_SESSION['errors'] as $error) {
				echo $error."<br />";
			}
			?>
		</div>
    <?php
		unset($_SESSION['errors']);
	} else if(!empty($_SESSION['messages'])) { ?>
		<div class="valid_box">
			<?php
			foreach($_SESSION['messages'] as $error) {
				echo $error."<br />";
			}
			?>
		</div>
    <?php
		unset($_SESSION['messages']);
	}
}

function generatePaging($sql) {
	define('MAX_RECORD_PER_PAGE', 5);
	$pageNum = isset($_GET['paging']) ? $_GET['paging'] : 1;
	
	$tmpRes = mysql_query($sql);
	$totalRecs = mysql_num_rows($tmpRes);
	$_SESSION['TOTAL_RECORDS'] = $totalRecs;
	
	$link = curPageName();
	if(!empty($_GET)) {
		foreach($_GET as $key=>$val) {
			if($key != 'paging') {
				$sign = getSign($link);
				$link .= $sign . $key . "=" . $val;
			}
		}
	}
	
	$sign = getSign($link);
	$recStart = ( (int) ($pageNum-1) )* ((int) MAX_RECORD_PER_PAGE );
	$totalRecs = $_SESSION['TOTAL_RECORDS'];
	
	$totalPages = ceil( ( (int) $totalRecs ) / ( (int) MAX_RECORD_PER_PAGE ) );

	$pagingString = '<div class="pagination">';
	
	$pagingStartPage = 1;
	$pagingEndPage = $totalPages ;
	
	if ($pageNum > 6 ) 
		$pagingStartPage = $pageNum - 5;
	
	if ($pageNum < ($totalPages - 5) ) 
		$pagingEndPage = $pageNum + 5;
	
	if ($pageNum > 1 ) {
		$prPage = $pageNum -1;			
		$pagingString .= '<a href="'. $link .$sign.'paging=1" ><< First</a>';
		$pagingString .= '<a href="'. $link .$sign.'paging='. $prPage .'" >< Prev</a>';
	} else {
		$pagingString .= '<span class="disabled"><< First</span>';
		$pagingString .= '<span class="disabled">< Prev</span>';		
	}

	for($i=$pagingStartPage;$i<=$pagingEndPage;$i++) {	
		if ($pageNum == $i) {
			$pagingString .= '<span class="current">'.$i.'</span>';
		} else {
			$pagingString .= '<a href="'. $link .$sign.'paging='.$i.'">'.$i.'</a>';
		}			
	}
	
	if ($pageNum < $totalPages ) {
		$nePage = $pageNum + 1;
		$pagingString .= '<a href="'. $link .$sign.'paging='. $nePage .'" >Next ></a>';
		$pagingString .= '<a href="'. $link .$sign.'paging='. $totalPages .'" >Last >></a>';
	} else {
		$pagingString .= '<span class="disabled">Next ></span>';
		$pagingString .= '<span class="disabled">Last >></span>';		
	}

	$pagingString .= '</div>';
	
	$sqlLIMIT = " LIMIT ". $recStart . " , " . MAX_RECORD_PER_PAGE;
	if ($totalPages == 1) {
		//$ret['pagingString'] = '<div class="pagination"><ul><li style="width:100%; text-align:center; color: #005395; font-size:14px;">Showing page 1 of 1</li></ul><div class="clear"></div></div>';
		$ret['pagingString'] = '';
		$ret['limit'] = '';
	} else {
		$ret['pagingString'] = $pagingString;
		$ret['limit'] =  $sqlLIMIT;
	}
	
	return $ret;
}

function seoUrl($string) {
    //Unwanted:  {UPPERCASE} ; / ? : @ & = + $ , . ! ~ * ' ( )
    $string = strtolower($string);
    //Strip any unwanted characters
    $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
    //Clean multiple dashes or whitespaces
    $string = preg_replace("/[\s-]+/", " ", $string);
    //Convert whitespaces and underscore to dash
    $string = preg_replace("/[\s_]/", "-", $string);
    
    $string = compareSlugs($string, '0');
    return $string;
}

function compareSlugs($slug, $i) {
	$sql = "SELECT * FROM `".DB_PREFIX."pages` WHERE slug='$slug' LIMIT 0,1";
	$res = mysql_query($sql);
	if(mysql_num_rows($res) > 0) {
		$i = $i + 1;
		$slug = $slug.$i;
		compareSlugs($slug, $i);
	}
	
	return $slug;
}

function curPageName() {
	return substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
}

function curPageURL() {
	$pageURL = 'http';
	if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
		$pageURL .= "://";
		
	if ($_SERVER["SERVER_PORT"] != "80") {
		$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	} else {
		$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	}
	
	return $pageURL;
}

function getSign($link) {
	$posOfMark = strpos($link, "?");
	if($posOfMark === false) {
		$sign = "?";
	} else {
		$sign = "&";
	}
	
	return $sign;
}

if($_SERVER['REQUEST_METHOD'] == 'GET') {
	if(isset($_GET['action'])) {
		$action = $_GET['action'];

		switch($action) {
			case 'adminLogout':
				unset($_SESSION['adminID']);
				header('Location: login.php');
				exit;
				break;			
		}
	}
}

function pr($arr) {
	echo "<pre>";
	print_r($arr);
	echo "</pre>";
}

function prx($arr) {
	pr($arr);
	exit;
}

function filterMe($string) {
	$string = addslashes(trim($string));
	return $string;
}

function updateComment($id, $comment) {
	if($id < 1) {
		$_SESSION['warnings'][] = "Some validation error!";
	} else if($comment == '') {
		$_SESSION['warnings'][] = "Please enter comment";
	} else {
		$sql = "UPDATE `".DB_PREFIX."question_answer_comments` SET comment='$comment' WHERE id='$id'";
		$res = mysql_query($sql);
	}
}

function delComment($id) {
	$sql = "DELETE FROM `".DB_PREFIX."question_answer_comments` WHERE id='$id'";
	$res = mysql_query($sql);
	return $res;
}

function delAnswer($id) {
	$sql = "DELETE FROM `".DB_PREFIX."question_answers` WHERE id='$id'";
	$res = mysql_query($sql);
	return $res;
}

function updateAnswer($ansID, $answer, $status) {
	if($answer == '') {
		$return = "Please enter answer.";
	} else {		
		$sql = "UPDATE `".DB_PREFIX."question_answers` SET answer='$answer', status='$status' WHERE id='$ansID'";
		$res = mysql_query($sql);
		if($res) {
			$_SESSION['messages'][] = 'Answer updated successfully';
		} else {
			$_SESSION['errors'][] = 'There is some problem when trying to update your answer';
		}
	}
	
	return $return;
}

/********************* Common with front end ************/
function userAlreadyExists($userName, $email, $notCompareWithID) {
	$where = "";
	if($notCompareWithID > 0) {
		$where = " AND id!='$notCompareWithID'";
	}
	$sql = "SELECT * FROM `".DB_PREFIX."users` WHERE userName='$userName' $where LIMIT 0,1";
	
	$data = get_row($sql);
	if(!empty($data)) {
		$_SESSION['errors']['userName'] = 'This User Name is already registered.';
	}
	
	$sql = "SELECT * FROM `".DB_PREFIX."users` WHERE email='$email' $where LIMIT 0,1";
	$data = get_row($sql);
	if(!empty($data)) {
		$_SESSION['errors']['email'] = 'This Email Address is already registered.';
	}
}

function getUser($userID) {
	$data = array();
	if($userID > 0) {
		$sql = "SELECT u.*, CONCAT(u.fName,' ',u.lName) as fullName, DATE_FORMAT(u.dated, '%d %b, %Y') as memberSince, ua.fName as address_fName, ua.lName as address_lName, ua.address as address_address, ua.city as address_city, ua.state as address_state, ua.zip as address_zip, ua.country as address_country, us.*, u.id as id, u.dated as dated FROM `".DB_PREFIX."users` u LEFT JOIN `".DB_PREFIX."user_address` ua ON(u.id=ua.userID) LEFT JOIN `".DB_PREFIX."user_school` us ON(u.id=us.userID) WHERE u.id='$userID'";
		$data = get_row($sql);
	}
	
	return $data;
}

function get_countries() {
	$sql = "SELECT * FROM `".DB_PREFIX."countries`";
	$data = get_rows($sql);
	return $data;
}

function get_row($sql) {
	$data = array();
	$res = mysql_query($sql);
	if(mysql_num_rows($res) > 0) {
		$data = mysql_fetch_object($res);
	}
	
	return $data;
}

function get_rows($sql) {
	$data = array();
	$res = mysql_query($sql);
	
	if(mysql_num_rows($res) > 0) {
		while($info = mysql_fetch_object($res)) {
			$data[] = $info;
		}
	}
	
	return $data;
}

function get_field($field, $sql) {
	$data = get_row($sql);
	if(!empty($data)) {
		return $data->$field;
	}
}

function isError() {
	if(!isset($_SESSION['errors']) || empty($_SESSION['errors'])) {
		return false;
	}
	return true;
}

function getQuestionCats() {
	$sql = "SELECT * FROM `".DB_PREFIX."question_categories` ORDER BY name";
	$data = get_rows($sql);
	return $data;
}

function getQuestion($id) {
	$sql = "SELECT q.*, qc.id as catID, qc.name as catName, u.id as userID, CONCAT(u.fName,' ',u.lName) as userName, u.fName as userFirstName, u.avatar FROM `".DB_PREFIX."questions` q LEFT JOIN `".DB_PREFIX."question_categories` qc ON(q.catID=qc.id) LEFT JOIN `".DB_PREFIX."users` u ON(q.userID=u.id)  WHERE q.id='$id' LIMIT 0,1";
	
	$data = get_row($sql);
	return $data;
}

function getQuesAnsComments($pID, $pType) {
	$sql = "SELECT qac.*, DATE_FORMAT(qac.dated, '%b %d, %Y') as dated, u.id as userID, u.fName as userFirstName, u.lName as userLastName, CONCAT(u.fName,' ',u.lName) as userName, u.avatar FROM `".DB_PREFIX."question_answer_comments` qac LEFT JOIN `".DB_PREFIX."users` u ON(qac.userID=u.id) WHERE qac.pID='$pID' AND qac.pType='$pType' ORDER BY qac.id DESC";
	$data = get_rows($sql);
	return $data;
}

function getAnswers($quesID, $status='') {
	$addSql = '';
	if($status != '') {
		$addSql .= " AND qa.status='$status'";
	}
	if($quesID != '-1') {
		$addSql .= " AND qa.questionID='$quesID'";
	}
	$sql = "
			SELECT
				qa.*, DATE_FORMAT(qa.dated, '%b %d, %Y') as dated, u.id as userID, u.fName as userFirstName, u.lName as userLastName, CONCAT(u.fName,' ',u.lName) as userName, u.avatar as avatar,  qu.id as quesUserID, qu.fName as quesUserFirstName, qu.lName as quesUserLastName, CONCAT(qu.fName,' ',qu.lName) as quesUserName, qu.avatar as quesUserAvatar
			FROM
				`".DB_PREFIX."question_answers` qa
				LEFT JOIN `".DB_PREFIX."users` u ON(qa.userID=u.id)
				LEFT JOIN `".DB_PREFIX."questions` q ON(qa.questionID=q.id)
				LEFT JOIN `".DB_PREFIX."users` qu ON(q.userID=qu.id)
			WHERE
				1 $addSql ORDER BY qa.id DESC";
	
	$data = get_rows($sql);
	return $data;
}

function getAnswer($ansID) {
	$data = array();
	if($ansID > 0) {
		$sql = "
			SELECT
				qa.*, DATE_FORMAT(qa.dated, '%b %d, %Y') as dated, u.id as userID, u.fName as userFirstName, u.lName as userLastName, CONCAT(u.fName,' ',u.lName) as userName, u.avatar as avatar, q.caption as quesCaption, qu.id as quesUserID, qu.fName as quesUserFirstName, qu.lName as quesUserLastName, CONCAT(qu.fName,' ',qu.lName) as quesUserName, qu.avatar as quesUserAvatar
			FROM
				`".DB_PREFIX."question_answers` qa
				LEFT JOIN `".DB_PREFIX."users` u ON(qa.userID=u.id)
				LEFT JOIN `".DB_PREFIX."questions` q ON(qa.questionID=q.id)
				LEFT JOIN `".DB_PREFIX."users` qu ON(q.userID=qu.id)
			WHERE
				qa.id='$ansID' LIMIT 0,1";
		$data = get_row($sql);		
	}
	return $data;
}

function getQuestionsPayment() {
	$sql = "SELECT p.*, DATE_FORMAT(p.dated, '%d %b, %Y') as dated, q.id as qID, q.caption as qTitle, bu.id as byUserID, CONCAT(bu.fName,' ',bu.lName) as byUserName, bu.avatar as byUserAvatar, tu.id as toUserID, CONCAT(tu.fName,' ',tu.lName) as toUserName, tu.avatar as toUserAvatar, qa.answer as answer FROM `".DB_PREFIX."purchases` p LEFT JOIN `".DB_PREFIX."question_answers` qa ON(p.itemID=qa.id) LEFT JOIN `".DB_PREFIX."questions` q ON(qa.questionID=q.id) LEFT JOIN `".DB_PREFIX."users` bu ON(p.userID=bu.id) LEFT JOIN `".DB_PREFIX."users` tu ON(p.toUserID=tu.id) WHERE p.itemType='question' ORDER BY p.id ASC";
	$results = get_rows($sql);
	if(!empty($results)) {
		$data = array();
		foreach($results as $result) {
			$data[ $result->itemID ][] = $result;
		}
		
		return $data;
	}
}
?>
