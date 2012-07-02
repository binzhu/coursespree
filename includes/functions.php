<?php
//require_once('includes/db.php');

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

function get_country_id($countryName) {
	$sql = "SELECT * FROM `".DB_PREFIX."countries` WHERE name='$countryName'";
	$data = get_field('id', $sql);
	return $data;
}
function get_countries() {
	$sql = "SELECT * FROM `".DB_PREFIX."countries`";
	$data = get_rows($sql);
	return $data;
}
function get_states($countryID) {
	$sql = "SELECT * FROM `".DB_PREFIX."states` WHERE countryID='$countryID'";
	$data = get_rows($sql);
	return $data;
}
function get_schools($stateID) {
	$sql = "SELECT * FROM `".DB_PREFIX."schools` WHERE stateID='$stateID'";
	$data = get_rows($sql);
	return $data;
}
function get_depts($schoolID) {
	$sql = "SELECT * FROM `".DB_PREFIX."school_dept_rel` WHERE schoolID='$schoolID'";
	$rels = get_rows($sql);
	if(!empty($rels)) {
		$deptID = '';
		foreach($rels as $rel) {
			$deptID .= $rel->deptID.",";
		}
		
		if($deptID != '') {
			$deptID = substr($deptID, 0, -1);
			
			$sql = "SELECT * FROM `".DB_PREFIX."departments` WHERE id IN($deptID)";
			$data = get_rows($sql);
			return $data;
		}
	}
}
function get_course_name($courseid){
	echo $sql = "SELECT * FROM `cs_courses` WHERE id= ".$courseid;
	$data = get_row($sql); 
	return $data;
}

function get_courses($schoolID, $deptID) {
	$sql = "SELECT * FROM `".DB_PREFIX."dept_course_rel` WHERE schoolID='$schoolID' AND deptID='$deptID'";
	$rels = get_rows($sql);
	if(!empty($rels)) {
		$courseID = '';
		foreach($rels as $rel) {
			$courseID .= $rel->courseID.",";
		}
		
		if($courseID != '') {
			$courseID = substr($courseID, 0, -1);
			
			$sql = "SELECT * FROM `".DB_PREFIX."courses` WHERE id IN($courseID)";
			$data = get_rows($sql);
			return $data;
		}
	}
}

function get_professorsme() {
	$sql = "SELECT * FROM `".DB_PREFIX."professors` ";
	$data = get_rows($sql);
	return $data;
}

function get_professors($courseID) {
	$sql = "SELECT * FROM `".DB_PREFIX."professors` WHERE courseID='$courseID'";
	$data = get_rows($sql);
	return $data;
}

function get_docTypes() {
	$sql = "SELECT * FROM `".DB_PREFIX."docTypes`";
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
	if($sql == '') {
		return;
	}
	
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

function isInvlidOldPassword($userID, $oPassword) {
	$sql = "SELECT * FROM `".DB_PREFIX."users` WHERE id='$userID' AND password='".md5($oPassword)."' LIMIT 0,1";
	$return = get_num_rows($sql);
	
	if($return > 0) {
		return false;
	}
	return true;
}

function get_num_rows($sql) {
	$res = mysql_query($sql);
	return mysql_num_rows($res);
}

function logMeIn($userName, $password, $remember) {
	logMeIn_step2($userName, $password, $remember); //Step 2 for ajax becoz no redirection is required in case of ajax
	
	if(isUserLoggedin()) {
		
		if(isset($_SESSION['redirectPath']) && $_SESSION['redirectPath'] != '') {
			$path = $_SESSION['redirectPath'];
			unset($_SESSION['redirectPath']);
		} else {
			$path = 'user.php?type=myaccount';
		}
		header('location:'.$path);
		exit;
	}
}
function logMeIn_step2($userName, $password, $remember) { //Step 2 for ajax becoz no redirection is required in case of ajax
	if($remember) {
		setCookie('cs_userName', $userName, time()+(60*60*24*365));
		setCookie('cs_password', $password, time()+(60*60*24*365));
	} else {
		setCookie('cs_userName','');
		setCookie('cs_password','');
	}
	$sql = "SELECT * FROM `".DB_PREFIX."users` WHERE userName='$userName' AND password='".md5($password)."' AND active='1' LIMIT 0,1";
	//echo $result = mysql_query($sql);
	//	echo $row = mysql_fetch_array($result);
	//	print_r($row);
	//	var_dump($row);
	$data = get_row($sql);
	//echo $id = $row['id'];
	//print_r($data);
	//	echo $data->id;
	//	echo $data['id'];
	//$_SESSION['userID'] = 10;
	if(!empty($data)) {
		$_SESSION['userID'] = $data->id;
		//echo "dsfseafeasfesfasefeafea";
	} else {
		$_SESSION['errors']['login'] = 'Invalid login details';
	}
}

function logmeinByID($userID) {
	if($userID > 0) {
		$_SESSION['userID'] = $userID;
	}
}

function isUserLoggedin() {
	if(isset($_SESSION['userID']) && $_SESSION['userID'] > 0) {
		return true;
	}
	return false;
}

function getLoggedUser() {
	$data = array();
	if(isUserLoggedin()) {
		$data = getUser($_SESSION['userID']);
	}
	
	return $data;
}

function getUser($userID) {
	$data = array();
	if($userID > 0) {
		$sql = "SELECT u.*, CONCAT(u.fName,' ',u.lName) as fullName, DATE_FORMAT(u.dated, '%d %b, %Y') as memberSince, ua.fName as address_fName, ua.lName as address_lName, ua.address as address_address, ua.city as address_city, ua.state as address_state, ua.zip as address_zip, ua.country as address_country, us.*, u.id as id, u.dated as dated FROM `".DB_PREFIX."users` u LEFT JOIN `".DB_PREFIX."user_address` ua ON(u.id=ua.userID) LEFT JOIN `".DB_PREFIX."user_school` us ON(u.id=us.userID) WHERE u.id='$userID'";
		$data = get_row($sql);
	}
	
	return $data;
}

function sendMail($to, $subject, $message) {
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= 'From: '.SITE_TITLE.'<'.ADMIN_EMAIL.'>' . "\r\n";
	
	$mail = mail($to, $subject, $message, $headers);
	return $mail;
}

function sendConfirmMail($userID) {
	$userInfo = getUser($userID);
	
	$confirm = md5($userInfo->id."-".$userInfo->userName."-".$userInfo->email);
	$confirmLink = SITE_URL."index.php?confirm=$confirm";
	
	$subject = "Course Spree - registration confirmation mail";
	$message = "
	Hi {$userInfo->fName}, <br />
	Thanks for registring with us.<br /><br />
	Please follow the confirmation link to activate the account and avail the services:<br />
	<a href='$confirmLink'>$confirmLink</a><br /><br />
	<strong>Regards,<br />
	Team - Course Spree</strong>
	";
	
	$mail = sendMail($userInfo->email, $subject, $message);
	return $mail;
}

function show_msgs() {
	if( (isset($_SESSION['warnings']) && !empty($_SESSION['warnings']))
			|| (isset($_SESSION['errors']) && !empty($_SESSION['errors']))
				|| (isset($_SESSION['messages']) && !empty($_SESSION['messages'])) ) {
		echo '<div id="messages">';
		echo '<div style="float:right; text-align:right; margin:5px 10px 0 0;"><img src="images/close.png" border="0" style="cursor:pointer;" onclick="javascript: jQuery(\'#messages\').slideUp();" /></div>';
		echo '<div class="messagesInner">';
		if(isset($_SESSION['warnings'])) {
			if(!empty($_SESSION['warnings'])) {
				echo '<div class="warnings"><ul>';
				$warnings = '';
				foreach($_SESSION['warnings'] as $warning) {
					echo "<li>$warning</li>";
				}
				echo '</ul></div>';
			}
			unset($_SESSION['warnings']);
		}
		
		if(isset($_SESSION['errors'])) {
			if(!empty($_SESSION['errors'])) {
				echo '<div class="errors"><ul>';
				$warnings = '';
				foreach($_SESSION['errors'] as $error) {
					echo "<li>$error</li>";
				}
				echo '</ul></div>';
			}
			unset($_SESSION['errors']);
		}
		
		if(isset($_SESSION['messages'])) {
			if(!empty($_SESSION['messages'])) {
				echo '<div class="messages"><ul>';
				$warnings = '';
				foreach($_SESSION['messages'] as $message) {
					echo "<li>$message</li>";
				}
				echo '</ul></div>';
			}
			unset($_SESSION['messages']);
		}
		echo '</div>';
		echo '</div>';
	}		
}

function get_doc($docID) {
	$sql = "SELECT
	n.*, s.name as stateName, sc.name as schoolName, d.name as deptName, c.name as courseName, p.name as profName, dt.name as docTypeName
	FROM
	`".DB_PREFIX."notices` n
	LEFT JOIN `".DB_PREFIX."states` s ON(n.stateID=s.id)
	LEFT JOIN `".DB_PREFIX."schools` sc ON(n.schoolID=sc.id)
	LEFT JOIN `".DB_PREFIX."departments` d ON(n.deptID=d.id)
	LEFT JOIN `".DB_PREFIX."courses` c ON(n.deptID=c.id)
	LEFT JOIN `".DB_PREFIX."professors` p ON(n.deptID=p.id)
	LEFT JOIN `".DB_PREFIX."docTypes` dt ON(n.docTypeID=dt.id)
	WHERE n.id='$docID'";
	$data = get_row($sql);
	if(!empty($data)) {
		return $data;
	}
}

function get_doc_name($doc) {
	$docName = '';
	$docNameArr = explode(".", $doc);
	if(!empty($docNameArr)) {
		for($i=0; $i<sizeof($docNameArr)-1; $i++) {
			if(trim($docNameArr[$i]) != '') {
				$docName .= $docNameArr[$i].".";
			}
		}
		$docName = trim($docName);
		$docName = substr($docName, 0, -1);
	}
	return $docName;
}

function isFieldsExist($id, $table) {
	$sql = "SELECT * FROM `".DB_PREFIX."$table` WHERE id='$id'";
	$return = get_num_rows($sql);
	if($return > 0) {
		$return = 1;
	}
	return $return;
}

function canAccess($userID, $docID) {
	$sql = "SELECT * FROM `".DB_PREFIX."notices` WHERE id='$docID' AND userID='$userID'";
	$return = get_num_rows($sql);
	if($return > 0) {
		$return = 1;
	}
	return $return;
}

function getNotices($userID, $type='') {
	$addSql = '';
	
	/*if($type == 'published') {
		$addSql = "AND n.status='1'";
	} else if($userID != $_SESSION['userID']) {
		$addSql = "AND n.status='1'";
	}*/
	
	$addSql = "AND n.status='1'";
	
	$sql = "SELECT n.*, DATE_FORMAT(n.dated, '%d %b, %Y %h:%i %p') as dated, u.id as uID, CONCAT(u.fName,' ',u.lName) as uFullName, u.avatar as uImg FROM `".DB_PREFIX."notices` n LEFT JOIN `".DB_PREFIX."users` u ON(n.userID = u.id)  WHERE n.userID='$userID' AND u.id>0 $addSql ORDER BY n.id DESC";
	$data = get_rows($sql);
	return $data;
}

function getMyNotices() {
	$sql = "SELECT
		n.*, s.name as stateName, sc.name as schoolName, d.name as deptName, c.name as courseName, p.name as profName, dt.name as docTypeName, u.id as uID, CONCAT(u.fName,' ',u.lName) as uFullName, u.avatar as uImg
		FROM `".DB_PREFIX."notices` n
		LEFT JOIN `".DB_PREFIX."users` u ON(n.userID = u.id)
		LEFT JOIN `".DB_PREFIX."states` s ON(n.stateID=s.id)
		LEFT JOIN `".DB_PREFIX."schools` sc ON(n.schoolID=sc.id)
		LEFT JOIN `".DB_PREFIX."departments` d ON(n.deptID=d.id)
		LEFT JOIN `".DB_PREFIX."courses` c ON(n.deptID=c.id)
		LEFT JOIN `".DB_PREFIX."professors` p ON(n.deptID=p.id)
		LEFT JOIN `".DB_PREFIX."docTypes` dt ON(n.docTypeID=dt.id)
		WHERE u.id>0 AND n.status='1' AND n.userID='{$_SESSION['userID']}'
		ORDER BY n.id DESC";
			
		global $paging;
		$paging = array();
		$paging = generatePaging($sql, 8);
		$sql = $sql . $paging['limit'];
		$data = get_rows($sql);
		if(!empty($data)) {
			require 'searchTemplate.php';
		}
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

function curPageName() {
	return substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
}

function getCommentsOnWall($userID) {
	$notices = getNotices($userID);
	$addSql = '';
	$toNoticeIDs = '';	
	if(!empty($notices)) {
		foreach($notices as $notice) {
			$toNoticeIDs .= $notice->id.",";
		}
		
		$toNoticeIDs = substr($toNoticeIDs, 0, -1);
	}
	
	if($toNoticeIDs != '') {
		$addSql = "OR c.toNoticeID IN($toNoticeIDs)";
	}
	
	$sql = "SELECT c.*, DATE_FORMAT(c.dated, '%d %b, %Y %h:%i %p') as dated, n.id as nID, n.docName as nName, u.id as uID, CONCAT(u.fName,' ',u.lName) as uFullName, u.avatar as uImg FROM `".DB_PREFIX."comments` c LEFT JOIN `".DB_PREFIX."users` u ON(c.fromUserID = u.id) LEFT JOIN `".DB_PREFIX."notices` n ON(c.toNoticeID = n.id) WHERE (c.fromUserID='$userID' OR c.toUserID='$userID' $addSql) AND u.id>0 ORDER BY c.id DESC";
	$data = get_rows($sql);
	return $data;
}


function getNoticeComments($id) {
	$sql = "SELECT c.*, DATE_FORMAT(c.dated, '%d %b, %Y %h:%i %p') as dated, u.id as uID, CONCAT(u.fName,' ',u.lName) as uFullName, u.avatar as uImg FROM `".DB_PREFIX."comments` c LEFT JOIN `".DB_PREFIX."users` u ON(c.fromUserID = u.id) WHERE c.toNoticeID=$id AND u.id>0 ORDER BY c.id DESC";
	$data = get_rows($sql);
	return $data;
}

function loginFormThickBox($val, $loginFormThickBoxAlreadyCoded) {
	if($loginFormThickBoxAlreadyCoded < 1) {
		$loginFormThickBoxAlreadyCoded = 0;
	}
	
	if($val == '') {
		$val = 'Sign in';
	}
	?>
	<div id="loginBoxMain">
	<input alt="#TB_inline?height=165&width=300&inlineId=loginBox" title="Sign in" class="thickbox btn" type="button" value="<?php echo $val; ?>" style="float:right;" />
	<div class="clear"></div>
	<?php if($loginFormThickBoxAlreadyCoded == 0) { ?>
		<div id="loginBox" class="hide">
		<div class="loginBoxInner">
		<form id="thickBoxLoginForm" method="post" action="">
		<input type="hidden" value="1" id="loginVar" name="loginVar" />
		<div class="errorThickBox"></div>
		
		<div>
		<label for="userName">User name:</label>
			<input type="text" value="<?php echo stripslashes($_COOKIE['cs_userName']); ?>" name="userName" id="userName" />
			</div>
			
			<div>
			<label for="userName">Password:</label>
				<input type="password" value="<?php echo stripslashes($_COOKIE['cs_password']); ?>" name="password" id="password" />
				</div>
				
				<div>
				<input type="checkbox" name="remember" id="remember" value="1" <?php if($_COOKIE['cs_userName'] != '') { echo 'checked="checked"'; } ?> />Remember me
		<input type="submit" value="Sign In" class="btn" style="float:right;" />
		</div>
		</form>
		</div>
		</div>
	<?php } ?>
	</div>
	
	<?php
	$loginFormThickBoxAlreadyCoded = $loginFormThickBoxAlreadyCoded + 1;
	return $loginFormThickBoxAlreadyCoded;
}

function generatePaging($sql, $numberOfRecs) {
	if($numberOfRecs < 1) {
		$numberOfRecs = 10;
	}
	//$numberOfRecs = 1;
	
	$link = curPageName();
	if(!empty($_REQUEST)) {
		foreach($_REQUEST as $k=>$v) {
			if($k != 'paging') {
				$sign = getSign($link);
				$link = $link.$sign.$k."=".$v;
			}
		}
	}
	
	$pageNum = isset($_GET['paging']) ? $_GET['paging'] : 1;
	$tmpRes = mysql_query($sql);
	$totalRecs = mysql_num_rows($tmpRes);
	$_SESSION['TOTAL_RECORDS'] = $totalRecs;
	
	$sign = getSign($link);
	
	$recStart = ( (int) ($pageNum-1) )* ((int) $numberOfRecs );
	$totalRecs = $_SESSION['TOTAL_RECORDS'];
	
	$totalPages = ceil( ( (int) $totalRecs ) / ( (int) $numberOfRecs ) );
	
	$pagingString = '<div class="pager"><ul>';
	$pagingStartPage = 1;
	$pagingEndPage = $totalPages ;
	
	if ($pageNum > 6 ) 
		$pagingStartPage = $pageNum - 5;
	
	if ($pageNum < ($totalPages - 5) ) 
		$pagingEndPage = $pageNum + 5;
	
	if ($pageNum > 1 ) {
		$prPage = $pageNum -1;			
		$pagingString .= '<li class="Prev_next"><a href="'. $link .$sign.'paging=1" >&laquo; First</a></li> ';
		$pagingString .= '<li class="Prev_next"><a href="'. $link .$sign.'paging='. $prPage .'" >&laquo; Previous</a></li>';
	}
	
	for($i=$pagingStartPage;$i<=$pagingEndPage;$i++) {
		
		if ($pageNum == $i) {
			$pagingString .= '<li class="PG_sel" style="font-weight: bold;"><a href="'. $link .$sign.'paging='.$i.'">' . $i . '</a></li>';
		} else {
			$pagingString .= '<li><a href="'. $link .$sign.'paging='.$i.'">'.$i.'</a>';
		}			
	}
	if ($pageNum < $totalPages ) {
		$nePage = $pageNum + 1;
		$pagingString .= '<li class="Prev_next"><a href="'. $link .$sign.'paging='. $nePage .'" >Next &raquo;</a></li> ';
		$pagingString .= '<li class="Prev_next"><a href="'. $link .$sign.'paging='. $totalPages .'" >Last &raquo;</a></li>';
	}
	
	$pagingString .= '</ul><div class="clear"></div></div>';
	
	$sqlLIMIT = " LIMIT ". $recStart . " , " . $numberOfRecs;
	
	if ($totalPages == 1)
	{
		$a['pagingString'] = '';
		$a['limit'] = '';
	}
	else
	{
		$a['pagingString'] = $pagingString;
		$a['limit'] =  $sqlLIMIT;
	}
	
	return $a;
}

function generateSearchResultsPaging($sql, $numberOfRecs, $link='') {
	//$numberOfRecs = 2;
	
	if($link == '') {
		$link = curPageName();
		if(!empty($_REQUEST)) {
			foreach($_REQUEST as $k=>$v) {
				if($k != 'paging') {
					$sign = getSign($link);
					$link = $link.$sign.$k."=".$v;
				}
			}
		}
	}
	
	$pageNum = isset($_GET['paging']) ? $_GET['paging'] : 1;
	if($pageNum < 1) {
		$pageNum = 1;
	}
	
	$tmpRes = mysql_query($sql);
	$totalRecs = mysql_num_rows($tmpRes);
	$_SESSION['TOTAL_RECORDS'] = $totalRecs;
	
	$sign = getSign($link);
	
	$recStart = ( (int) ($pageNum-1) )* ((int) $numberOfRecs );
	$totalRecs = $_SESSION['TOTAL_RECORDS'];
	
	$totalPages = ceil( ( (int) $totalRecs ) / ( (int) $numberOfRecs ) );
	
	$pagingString = '<div class="pager"><ul>';
	$pagingStartPage = 1;
	$pagingEndPage = $totalPages ;
	
	if ($pageNum > 6 ) 
		$pagingStartPage = $pageNum - 5;
	
	if ($pageNum < ($totalPages - 5) ) 
		$pagingEndPage = $pageNum + 5;
	
	if ($pageNum > 1 ) {
		$prPage = $pageNum -1;			
		$pagingString .= '<li class="Prev_next"><a href="1" class="pagingLi">&laquo; First</a></li> ';
		$pagingString .= '<li class="Prev_next"><a href="'.$prPage.'" class="pagingLi">&laquo; Previous</a></li>';
	}
	
	for($i=$pagingStartPage;$i<=$pagingEndPage;$i++) {
		
		if ($pageNum == $i) {
			$pagingString .= '<li class="PG_sel" style="font-weight: bold;"><a href="'.$i.'" class="pagingLi">' . $i . '</a></li>';
		} else {
			$pagingString .= '<li><a href="'.$i.'" class="pagingLi">'.$i.'</a>';
		}			
	}
	if ($pageNum < $totalPages ) {
		$nePage = $pageNum + 1;
		$pagingString .= '<li class="Prev_next"><a href="'.$nePage.'" class="pagingLi">Next &raquo;</a></li> ';
		$pagingString .= '<li class="Prev_next"><a href="'.$totalPages.'" class="pagingLi">Last &raquo;</a></li>';
	}
	
	$pagingString .= '</ul><div class="clear"></div></div>';
	
	$sqlLIMIT = " LIMIT ". $recStart . " , " . $numberOfRecs;
	
	if ($totalPages == 1)
	{
		$a['pagingString'] = '';
		$a['limit'] = '';
	}
	else
	{
		$a['pagingString'] = $pagingString;
		$a['pagingString'] .= '
		<script type="text/javascript">
		jQuery(document).ready(function(){
		jQuery(".pagingLi").click(function(){
		var number = jQuery(this).attr("href");
		showSearchResults(number);
		return false;
		});
		});
		</script>
		';
		
		$a['limit'] =  $sqlLIMIT;
	}
	
	return $a;
}

function showSearchTemplate($s, $so, $stateID, $schoolID, $deptID) {
	if($s != '') {
		if($so == '2') {
			$addOrder = 'ORDER BY n.docName ASC';
		} else if($so == '3') {
			$addOrder = 'ORDER BY n.price ASC';
		} else {
			$addOrder = 'ORDER BY n.id DESC';
		}
		
		
		$addSql = '';
		if($stateID != '') {
			$addSql .= " AND n.stateID='$stateID'";
		}
		if($schoolID != '') {
			$addSql .= " AND n.schoolID='$schoolID'";
		}
		if($deptID != '') {
			$addSql .= " AND n.deptID='$deptID'";
		}
		
		
		
		$sql = "SELECT
		n.*, s.name as stateName, sc.name as schoolName, d.name as deptName, c.name as courseName, p.name as profName, dt.name as docTypeName, u.id as uID, CONCAT(u.fName,' ',u.lName) as uFullName, u.avatar as uImg
		FROM `".DB_PREFIX."notices` n
		LEFT JOIN `".DB_PREFIX."users` u ON(n.userID = u.id)
		LEFT JOIN `".DB_PREFIX."states` s ON(n.stateID=s.id)
		LEFT JOIN `".DB_PREFIX."schools` sc ON(n.schoolID=sc.id)
		LEFT JOIN `".DB_PREFIX."departments` d ON(n.deptID=d.id)
		LEFT JOIN `".DB_PREFIX."courses` c ON(n.deptID=c.id)
		LEFT JOIN `".DB_PREFIX."professors` p ON(n.deptID=p.id)
		LEFT JOIN `".DB_PREFIX."docTypes` dt ON(n.docTypeID=dt.id)
		WHERE u.id>0 AND n.status='1' AND (n.docName LIKE '%$s%' OR n.tips LIKE '%$s%') $addSql $addOrder
		";
		
		global $paging;
		$paging = array();
		$link = "search.php?s=".$_REQUEST['s'];
		$paging = generateSearchResultsPaging($sql, 8, $link);
		$sql = $sql . $paging['limit'];
		$data = get_rows($sql);


    $khan_data = khanAcademySearch($s);

	  require 'searchTemplate.php';
	}
}


function khanAcademySearch($query) {
  $youtube_api_url = "https://gdata.youtube.com/feeds/api/videos?q=$query&author=khanacademy";

  $xml = simplexml_load_file($youtube_api_url);

  $data = array();

  $counter = 0;
  foreach($xml->entry as $entry) {
    $data[$counter]['title'] = $entry->title;
    $data[$counter]['link'] = $entry->link["href"][0];

    $counter++;
  }

  return $data;
}

function getSign($link) {
	$posOfMark = strpos($link, "?");
	if($posOfMark === false) {
		$sign = "?";
	}
	else {
		$sign = "&";
	}
	
	return $sign;
}

function setClass($tabName) {
	if( ($tabName == 'profile' && $_GET['type'] == '') || $tabName == $_GET['type']) {
		echo 'class="sel"';
	}
}

function getPurchases() {
	//ub=>userby, uf=>userfrom
	$sql = "
		SELECT
			p.*, DATE_FORMAT(p.dated, '%d %b, %Y<br /> %H:%i %p') as purchasedOn,
			ub.id as ubID, CONCAT(ub.fName,' ',ub.lName) as ubFullName, ub.avatar as ubImg,
			n.userID as nOwnerID, n.coverImage as nCoverImage, n.doc as noticeTitle,
			uf.id as ufID, CONCAT(uf.fName,' ',uf.lName) as ufFullName, uf.avatar as ufImg, uf.email as ufEmail
		FROM
			`".DB_PREFIX."purchases` p
				LEFT JOIN `".DB_PREFIX."users` ub ON(p.userID=ub.id)
				LEFT JOIN `".DB_PREFIX."notices` n ON(p.itemID=n.id)
				LEFT JOIN `".DB_PREFIX."users` uf ON(n.userID=uf.id)
		WHERE
			p.userID='{$_SESSION['userID']}' AND p.active='1' AND p.itemType='notice'
	";
	
	$data = get_rows($sql);
	return $data;
}

function subscribe($subscribeBy, $subscribeTo, $type) {
	if($subscribeTo < 1) {
		$subscribeTo = $_SESSION['userID'];
	}
	
	if($subscribeBy<1 || $subscribeTo<1) {
		return;
	}
	
	$return = '';
	
	switch($type) {
		case 'subscribe':
			if($subscribeBy != $subscribeTo) {
				$return = alreadySubscribed($subscribeBy, $subscribeTo);
				
				if($return > 0) {
					$return = 'Already subscribed';
				} else {
					$dated = date('Y-m-d H:i:s');
					$sql = "INSERT INTO `".DB_PREFIX."subscription` SET subscribeBy='$subscribeBy', subscribeTo='$subscribeTo', dated='$dated' ";
					$res = mysql_query($sql);
					if($res) {
						$return = '1';
					}
				}
			}
			break;
			
		case 'unsubscribe':
			if($subscribeBy != $subscribeTo) {
				$dated = date('Y-m-d H:i:s');
				$sql = "DELETE FROM `".DB_PREFIX."subscription` WHERE subscribeBy='$subscribeBy' AND subscribeTo='$subscribeTo'";
				$res = mysql_query($sql);
				$return = '1';
			}
			break;
	}
	
	return $return;
}

function alreadySubscribed($subscribeBy, $subscribeTo) {
	$sql = "SELECT * FROM `".DB_PREFIX."subscription` WHERE subscribeBy='$subscribeBy' AND subscribeTo='$subscribeTo'";
	$return = get_num_rows($sql);
	return $return;
}

function getQuestionCats() {
	$sql = "SELECT * FROM `".DB_PREFIX."question_categories` ORDER BY name";
	$data = get_rows($sql);
	return $data;
}

function getQuestions($keyword, $type, $status='open', $numberOfRecs=10, $byUserID='') {
	$addSql = '';
	
	if($byUserID > 0) {
		$addSql .= "AND q.userID='$byUserID'";
	}
	
	if($status != 'closed') {
		$status = 'open';
	}
	
	switch($type) {
		case 'cat':
			if($keyword != '-1') {
				$addSql .= "AND q.catID='$keyword'";
			}
			break;
			
		case 'search':
			$keyword = trim($_GET['qs']);
			$qs_cat = trim($_GET['qs_cat']);
			
			if($keyword != '') {
				$addSql .= " AND (
					q.tags LIKE '".$keyword."'
					|| q.tags LIKE '".$keyword.",%'
					|| q.tags LIKE '%,".$keyword."'
					|| q.tags LIKE '%,".$keyword.",%'
				
					|| q.caption LIKE '%".$keyword."%'
				)";
			}
			
			if($qs_cat != '') {
				$addSql .= " AND q.catID='$qs_cat'";
			}
			
			break;
			
		case 'tag':
			if($keyword != '') {
				$addSql .= "AND (
				q.tags LIKE '".$keyword."'
				|| q.tags LIKE '".$keyword.",%'
				|| q.tags LIKE '%,".$keyword."'
				|| q.tags LIKE '%,".$keyword.",%'
				)";
			}
			break;
	}
	
	$sql = "SELECT q.*, qc.id as catID, qc.name as catName, u.id as userID, CONCAT(u.fName,' ',u.lName) as userName, u.avatar FROM `".DB_PREFIX."questions` q LEFT JOIN `".DB_PREFIX."question_categories` qc ON(q.catID=qc.id) LEFT JOIN `".DB_PREFIX."users` u ON(q.userID=u.id)  WHERE 1 AND q.status='$status' $addSql ORDER BY q.id DESC";
	
	$paging = array();
	if($numberOfRecs > 0) {
		$paging = generatePaging($sql, $numberOfRecs);
		$sql = $sql . $paging['limit'];
	}
	
	$data = get_rows($sql);
	
	if(!empty($paging)) {
		return array($data, $paging);
	} else {
		return $data;
	}
}

function getQuestion($id) {
	$sql = "SELECT q.*, qc.id as catID, qc.name as catName, u.id as userID, CONCAT(u.fName,' ',u.lName) as userName, u.fName as userFirstName, u.avatar FROM `".DB_PREFIX."questions` q LEFT JOIN `".DB_PREFIX."question_categories` qc ON(q.catID=qc.id) LEFT JOIN `".DB_PREFIX."users` u ON(q.userID=u.id)  WHERE q.id='$id' LIMIT 0,1";
	
	$data = get_row($sql);
	return $data;
}

function getTimeDifference($from) {
	$time = time();
	$fromArr = explode("-", $from);
	if(!empty($fromArr)) {
		$year = $fromArr['0'];
		$month = $fromArr['1'];
		$fromArr1 = explode(" ", $fromArr['2']);
		$day = $fromArr1['0'];
		
		$fromArr2 = explode(":", trim($fromArr1['1']));
		$hour = $fromArr2['0'];
		$min = $fromArr2['1'];
		$sec = $fromArr2['2'];
		
		//$fromHoursArr = explode($fromArr);
		$now = mktime($hour, $min, $sec, $month, $day, $year);
	} else {
		return;
	}
	
	$diff = $now - $time;
	if ($diff < 0) {
		$dir = 'ago';
		$diff *= -1;
	} else {
		$dir = 'ago';
	}
	if ($years=intval((floor($diff/31536000)))) $diff = $diff % 31536000;
	if ($days=intval((floor($diff/86400)))) $diff = $diff % 86400;
	if ($hours=intval((floor($diff/3600)))) $diff = $diff % 3600;
	if ($minutes=intval((floor($diff/60)))) $diff = $diff % 60;
	
	$seconds = intval($diff);
	if ($years > 0) {
		if ($years != 1) $years_txt = 's';
		if ($days != 1) $days_txt = 's';
		return $years.' year'.$years_txt.', '.$days.' day'.$days_txt.' '.$dir;
	} else {
		if ($days > 0) {
			if ($days != 1) $days_txt = 's';
			if ($hours != 1) $hours_txt = 's';
			return $days.' day'.$days_txt.', '.$hours.' hour'.$hours_txt.' '.$dir;
		} else {
			if ($hours > 0) {
				if ($hours != 1) $hours_txt = 's';
				if ($minutes != 1) $minutes_txt = 's';
				return $hours.' hour'.$hours_txt.', '.$minutes.' minute'.$minutes_txt.' '.$dir;
			} else {
				if ($minutes != 1) $minutes_txt = 's';
				if ($seconds != 1) $seconds_txt = 's';
				return $minutes.' minute'.$minutes_txt.', '.$seconds.' second'.$seconds_txt.' '.$dir;
			}
		}
	}
}

function insertAnswer($userID, $quesID, $quesAnswer) {
	$question = getQuestion($quesID);
	if($userID < 1) {
		$return =  'You must log in for answer';
	} else if($quesID < 1 || $quesAnswer == '') {
		$return = "Some validation error!";
	} else {
		if($userID != stripslashes($question->userID)) {
			$status = 'pending';
			$dated = date('Y-m-d H:i:s');
			$sql = "INSERT INTO `".DB_PREFIX."question_answers` SET questionID='$quesID', userID='$userID', answer='$quesAnswer', status='$status', dated='$dated'";
			$res = mysql_query($sql);
			if($res) {
				$id = mysql_insert_id();
				$return = 'insertID_'.$id;
			} else {
				$return = 'There is some problem when trying to add your answer';
			}
		} else {
			$return = "You can't answer for your own question";
		}
	}
	
	return $return;
}

function updateAnswer($userID, $ansID, $newAnswer) {
	$answer = getAnswer($ansID);
	if($userID < 1) {
		$return =  'You must log in for answer';
	} else if($ansID < 1 || $newAnswer == '') {
		$return = "Some validation error!";
	} else {
		if($userID == stripslashes($answer->userID)) {
			$sql = "UPDATE `".DB_PREFIX."question_answers` SET answer='$newAnswer' WHERE id='$ansID' AND userID='$userID'";
			$res = mysql_query($sql);
			if($res) {
				$return = '1';
			} else {
				$return = 'There is some problem when trying to update your answer';
			}
		} else {
			$return = "You can't update this answer";
		}
	}
	
	return $return;
}

function updateQuestion($userID, $quesID, $newQuestion) {
	$question = getQuestion($quesID);
	if($userID < 1) {
		$return =  'You must log in for question';
	} else if($quesID < 1 || $newQuestion == '') {
		$return = "Some validation error!";
	} else {
		if($userID == stripslashes($question->userID)) {
			$sql = "UPDATE `".DB_PREFIX."questions` SET description ='$newQuestion' WHERE id='$quesID' AND userID='$userID'";
			$res = mysql_query($sql);
			if($res) {
				$return = '1';
			} else {
				$return = 'There is some problem when trying to update your question';
			}
		} else {
			$return = "You can't update this question";
		}
	}
	
	return $return;
}

function getAnswersTemplate($quesID) {
	$question = getQuestion($quesID);
	
	if(stripslashes($question->status) == 'closed') {
		$ansList = getAnswers($quesID, 'approved');
	} else {
		$ansList = getAnswers($quesID, '');
	}
	
	$ansText = 'Answers';
	if(stripslashes($question->status) == 'closed') {
		$ansText = 'Approved Answers';
	}
	
	if($question->userID == $_SESSION['userID']) { echo '<form name="approveAnsForm" id="approveAnsForm" method="post" action=""><input type="hidden" name="approveAns" id="approveAns" value="1" />'; }
	
	echo '<div class="commentstext"><h3>'.$ansText.' (<span id="answersCount">'.sizeof($ansList).'</span>)</h3></div>';
	echo '<div class="answersListDiv">';
	if(!empty($ansList)) {
		foreach($ansList as $ans) {
			getSingleAnswerTemplate($ans, stripslashes($question->status));
		}
		
		if(isUserLoggedin() && stripslashes($question->status) != 'closed') {
			//echo '<input type="hidden" name="approveQuesID" id="approveQuesID" value="'.$quesID.'" />';
			if($question->userID == $_SESSION['userID']) { ?>
				<!-- button type="button" class="approveSelected" style="float:right;"><a href="#">Approve Selected</a></button -->
				<button type="submit" class="approveSelected" style="float:right;"><a href="#">Approve Selected</a></button>
			<?php }
		}
	}
	echo '</div>';
	
	if($question->userID == $_SESSION['userID']) { echo '</form>'; }
}

function getSingleAnswerTemplate($ans, $quesStatus='') { ?>
	<?php if(!empty($ans)) { ?>
		<?php
		$avatar = "uploads/images/".stripslashes($ans->avatar);
		if(!file_exists(stripslashes(trim($avatar))) || trim($ans->avatar) == '') {
			$avatar = 'images/no-img.jpg';
		}
		?>
		
		<div class="commentstext-1" id="commentstext-1-<?php echo stripslashes($ans->id); ?>">
		<div class="comment-1">
		<a href="profile.php?id=<?php echo stripslashes($ans->userID); ?>"><img src="<?php echo $avatar; ?>" /></a>
		<p><a href="profile.php?id=<?php echo stripslashes($ans->userID); ?>"><?php echo stripslashes($ans->userFirstName); ?></a></p>
		</div>
		
		<div class="comment-2">
		<div style="float:left;" id="descAns_<?php echo stripslashes($ans->id); ?>"><?php echo stripslashes($ans->answer); ?></div>
		
		<?php if($quesStatus != 'closed') { ?>
			<?php if(isUserLoggedin() && $ans->quesUserID == $_SESSION['userID']) { ?>
				<?php if($ans->status == 'approved') { ?>
					<div class="approve approve_on">
					<div class="approveInner">
					<input type="checkbox" name="approveCheck[]" id="approveCheck_<?php echo stripslashes($ans->id); ?>" value="<?php echo stripslashes($ans->id); ?>" class="locked" checked="checked">
					</div>
					</div>
				<?php } else { ?>
					<div class="approve approve_off">
					<div class="approveInner">
					<input type="checkbox" name="approveCheck[]" id="approveCheck_<?php echo stripslashes($ans->id); ?>" value="<?php echo stripslashes($ans->id); ?>" class="cart_chk">
					</div>
					</div>
				<?php } ?>
			<?php } ?>
		<?php } ?>
		
		<div class="clear"></div>
		
		<div class="days">
		<p><?php echo getTimeDifference($ans->dated); ?></p></p>
		</div>
		
		<?php if($quesStatus != 'closed') { ?>
			<?php $comments = getQuesAnsComments(stripslashes($ans->id), 'ans'); ?>
			<div class="commbuttons">
			<div class="commbuttons-1">
			<img src="images/pencil.png">
			<p>
			<?php if(!isUserLoggedin()) { ?>
				<a href="register.php?type=login">Comment(s)(<span id="ansCommentsCount_<?php echo stripslashes($ans->id); ?>"><?php echo sizeof($comments); ?></span>)</a>
			<?php } else { ?>
				<a href="javascript:" id="addComment_ans_<?php echo stripslashes($ans->id); ?>" onclick="javascript:addComment('<?php echo stripslashes($ans->id); ?>', 'ans');">Comment(s)(<span id="ansCommentsCount_<?php echo stripslashes($ans->id); ?>"><?php echo sizeof($comments); ?></span>)</a>
			<?php } ?>
			</p>
			</div>       
			
			<div class="commbuttons-2">
			<img src="images/flag.png">
			<p>
			<?php if(!isUserLoggedin()) { ?>
				<a href="register.php?type=login">Report Abuse</a>
			<?php } else { ?>
				<a href="javascript:" id="abuse_ans_<?php echo stripslashes($ans->id); ?>" onclick="javascript: abuse('<?php echo stripslashes($ans->id); ?>', 'ans');">Report Abuse</a>
			<?php } ?>
			</p>
			</div>           
			</div>
			
			<?php if($_SESSION['userID'] == stripslashes($ans->userID)) { ?>
				<div class="cobutton" style="margin-top: 0px; margin-bottom: 10px;">
				<button type="button" style="float:left;" id="editAns_<?php echo stripslashes($ans->id); ?>" onclick="javascript:editAns('<?php echo stripslashes($ans->id); ?>');"><img src="images/edit.png" style="margin: 0 3px -2px 0;"><a href="#">Edit Your Answer</a></button>
				<button type="button" style="float:left;" id="delAns_<?php echo stripslashes($ans->id); ?>" onclick="javascript:delAns('<?php echo stripslashes($ans->id); ?>');"><img src="images/delete.png" style="margin: 0 3px -2px 0;"><a href="#">Delete Your Answer</a></button>
				</div>
			<?php } ?>
			
			<?php getCommentsTemplate($comments, stripslashes($ans->id), 'ans'); ?>
		<?php } ?>
		</div>
		</div>
	<?php } ?>
<?php }

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
	qa.*, u.id as userID, u.fName as userFirstName, u.lName as userLastName, CONCAT(u.fName,' ',u.lName) as userName, u.avatar as avatar,  qu.id as quesUserID, qu.fName as quesUserFirstName, qu.lName as quesUserLastName, CONCAT(qu.fName,' ',qu.lName) as quesUserName, qu.avatar as quesUserAvatar
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
		qa.*, u.id as userID, u.fName as userFirstName, u.lName as userLastName, CONCAT(u.fName,' ',u.lName) as userName, u.avatar as avatar,  u.paypalEmail as userPaypalEmail, qu.id as quesUserID, qu.fName as quesUserFirstName, qu.lName as quesUserLastName, CONCAT(qu.fName,' ',qu.lName) as quesUserName, qu.avatar as quesUserAvatar
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

function getAnswersByUser($qStatus='open', $numberOfRecs=10, $byUserID='') {
	$addSql = '';
	
	if($byUserID > 0) {
		$addSql .= " AND qa.userID='$byUserID'";
	}
	
	if($qStatus != 'closed') {
		$qStatus = 'open';
	} else {
		$addSql .= " AND qa.status='approved'";
	}
	
	$sql = "
	SELECT
	qa.*, u.id as userID, u.fName as userFirstName, u.lName as userLastName, CONCAT(u.fName,' ',u.lName) as userName, u.avatar as avatar,
	q.id as qID, q.caption as qCaption, q.dated as qDated, q.tags as qTags, qc.id as catID, qc.name as catName, qu.id as quesUserID, qu.fName as quesUserFirstName, qu.lName as quesUserLastName, CONCAT(qu.fName,' ',qu.lName) as quesUserName, qu.avatar as quesUserAvatar
	FROM
	`".DB_PREFIX."question_answers` qa
	LEFT JOIN `".DB_PREFIX."users` u ON(qa.userID=u.id)
	LEFT JOIN `".DB_PREFIX."questions` q ON(qa.questionID=q.id)
	LEFT JOIN `".DB_PREFIX."users` qu ON(q.userID=qu.id)
	LEFT JOIN `".DB_PREFIX."question_categories` qc ON(q.catID=qc.id)
	WHERE
	1 AND q.id>0 AND q.status='$qStatus' $addSql ORDER BY qa.id DESC";
	
	$paging = array();
	if($numberOfRecs > 0) {
		$paging = generatePaging($sql, $numberOfRecs);
		$sql = $sql . $paging['limit'];
	}
	
	$data = get_rows($sql);
	
	if(!empty($paging)) {
		return array($data, $paging);
	} else {
		return $data;
	}
}


function addComment($userID, $pID, $pType, $comment) {
	if($userID < 1) {
		$return =  'You must log in for comment';
	} else if($pID < 1 || $comment == '') {
		$return = "Some validation error!";
	} else {
		$dated = date('Y-m-d H:i:s');
		$sql = "INSERT INTO `".DB_PREFIX."question_answer_comments` SET userID='$userID', pID='$pID', pType='$pType', comment='$comment', dated='$dated'";
		$res = mysql_query($sql);
		if($res) {
			$id = mysql_insert_id();
			$return = "commentID_$id";
		} else {
			$return = 'There is some problem when trying to update your answer';
		}
	}
	
	return $return;
}

function getQuesAnsComments($pID, $pType) {
	$sql = "SELECT qac.*, DATE_FORMAT(qac.dated, '%b %d, %Y') as dated, u.id as userID, u.fName as userFirstName, u.lName as userLastName, CONCAT(u.fName,' ',u.lName) as userName, u.avatar FROM `".DB_PREFIX."question_answer_comments` qac LEFT JOIN `".DB_PREFIX."users` u ON(qac.userID=u.id) WHERE qac.pID='$pID' AND qac.pType='$pType' ORDER BY qac.id DESC";
	
	$data = get_rows($sql);
	return $data;
}

function getQuesAnsComment($commentID) {
	$sql = "SELECT qac.*, u.id as userID, u.fName as userFirstName, u.lName as userLastName, CONCAT(u.fName,' ',u.lName) as userName, u.avatar FROM `".DB_PREFIX."question_answer_comments` qac LEFT JOIN `".DB_PREFIX."users` u ON(qac.userID=u.id) WHERE qac.id='$commentID'";
	$data = get_row($sql);
	return $data;
}

function getCommentsTemplate($comments, $ansID, $pType) {
	echo '<div class="commentsListDiv" id="commentsListDiv_'.$pType.'_'.$ansID.'">';
	if(!empty($comments)) {
		foreach($comments as $comment) {
			getSingleCommentTemplate($comment, $ansID, $pType);
		}
	}
	echo '</div>';
}

function getSingleCommentTemplate($comment, $ansID, $pType) { ?>
	<?php if(!empty($comment)) { ?>
		<?php
		if($pType == 'ans') {
			$color = '#EAE9E9';
		} else {
			$color = '#FFFFFF';
		}
		?>
		<div class="commentstext-1 comment" style="background: <?php echo $color; ?> !important;">
		<div class="comment-1">
		<?php
		$avatar = "uploads/images/".stripslashes($comment->avatar);
		if(!file_exists(stripslashes(trim($avatar))) || trim($comment->avatar) == '') {
			$avatar = 'images/no-img.jpg';
		}
		?>
		<a href="profile.php?id=<?php echo stripslashes($comment->userID); ?>"><img src="<?php echo $avatar; ?>"></a>
		<p><a href="profile.php?id=<?php echo stripslashes($comment->userID); ?>"><?php echo stripslashes($comment->userFirstName); ?></a></p>
		</div>
		
		<div class="comment-2">
		<div id="descAns_3"><?php echo stripslashes($comment->comment); ?></div>
		<div class="days"><p><?php echo getTimeDifference($comment->dated); ?></p></div>
		</div>
		</div>
	<?php } ?>
<?php }

function validateQuesUserRel($approveQuesID, $ansIDs, $userID) {
	$_SESSION['errors'] = array();
	
	$sql = "SELECT * FROM `".DB_PREFIX."questions` WHERE id='$approveQuesID' AND status='closed'";
	$return = get_num_rows($sql);
	if($return > 0) {
		$_SESSION['errors'][] = "This question has already been closed";
	} else {
		$question = getQuestion($approveQuesID);
		if(trim($question->userID) == trim($userID)) { //Check if question is posted by current logged user or not
			$ansIDsArr = explode(",", $ansIDs);
			if(!empty($ansIDsArr)) {
				$newAnsIDs = '';
				foreach($ansIDsArr as $ansID) {
					if($ansID > 0) {
						$answer = getAnswer($ansID);
						if(trim($answer->questionID) == $approveQuesID) { //Check if answer is related to current question or not
							$newAnsIDs .= $ansID.",";
						} else {
							$_SESSION['errors'][] = "Approved answer is not related to current question";
						}
					}
				}
			}
		} else {
			$_SESSION['errors'][] = "You haven't access to approve the answers for this question";
		}
	}
	
	if($newAnsIDs != '') {
		return $newAnsIDs;
	}
}

function approveAns($approveQuesID, $ansIDs, $userID) {
	if(isUserLoggedin()) {
		if($approveQuesID > 0) {
			if($ansIDs == '') {
				$_SESSION['errors'][] = 'Select atleast one answer';	
			} else {
				$newAnsIDs = validateQuesUserRel($approveQuesID, $ansIDs, $userID);
				if(!isError()) {
					if($newAnsIDs != '') {
						header('Location: payment.php?qID='.$approveQuesID.'&aID='.$newAnsIDs);
						exit;
					
						/**** Set Question status as "closed" ****
						$sql = "UPDATE `".DB_PREFIX."questions` SET status='closed' WHERE id='$approveQuesID'";
						$res = mysql_query($sql);
					
						/**** Set answers status as "approved" ****
						$newAnsIDs = substr($newAnsIDs, 0, -1);
						$sql = "UPDATE `".DB_PREFIX."question_answers` SET status='approved' WHERE id IN($newAnsIDs)";
						$res = mysql_query($sql);
						if($res) {
							$return = 1;
						}
						*/
					}
				}
			}
		} else {
			$_SESSION['errors'][] = 'There is some validation error when trying to approve answer';
		}
	} else {
		$_SESSION['errors'][] = 'You must login for approve answers';
	}
	
	return $return;
}


function getQuestionsURL($page, $status) {
	if($page != '') {
		$url = $page;
	} else {
		$url = 'questions.php';
	}
	if(!empty($_GET)) {
		foreach($_GET as $k=>$v) {
			if($k != 'status' && $k != 'paging') {
				$sign = getSign($url);
				$url = $url . $sign . $k . "=" . $v;
			}
		}
	}
	
	if($status != '') {
		$sign = getSign($url);
		$url = $url . $sign . "status=" . $status;
	}
	
	return $url;
}

function getAnswersURL($page, $status) {
	if($page != '') {
		$url = $page;
	} else {
		$url = 'questions.php';
	}
	if(!empty($_GET)) {
		foreach($_GET as $k=>$v) {
			if($k != 'status' && $k != 'paging') {
				$sign = getSign($url);
				$url = $url . $sign . $k . "=" . $v;
			}
		}
	}
	
	if($status != '') {
		$sign = getSign($url);
		$url = $url . $sign . "status=" . $status;
	}
	
	return $url;
}

function sendAbuseMail($pID, $userID, $abuseType) {
	if($userID > 0) {
		$user = getUser($userID);
		switch($abuseType) {
			case 'ques':
				$question = getQuestion($pID);
				$link = SITE_URL . "questions.php?id=$pID";
				$subject = 'REPORT ABUSE Notification Alert!!!';
				$message = "
				<p style='font-weight:bold; font-size:16px; text-align:center;'>Notification Alert!!!</p><br />
				This is in concern to Report Abuse request raised by <strong>{$user->fullName}</strong> with permalink $link regarding question<br />
				<div style='font-size:11px;'> \"{$question->caption}\" </div><br />
				So you are requested to look into and take the decision
				";
				break;
				
			case 'ans':
				$answer = getAnswer($pID);
				$link = SITE_URL . "questions.php?id={$answer->questionID}";
				$subject = 'REPORT ABUSE Notification Alert!!!';
				$message = "
				<p style='font-weight:bold; font-size:16px; text-align:center;'>Notification Alert!!!</p><br />
				This is in concern to <strong>Report Abuse</strong> request raised by {$user->fullName} with permalink $link regarding answer<br />
				<div style='font-size:11px;'> \"{$answer->answer}\" </div><br />
				So you are requested to look into and take the decision
				";
				break;
		}
		if($message != '') {
			$to = ADMIN_EMAIL;
			$return = sendMail($to, $subject, $message);
		}
		
		if($return == '1') {
			echo 'A notification has been sent to administrator.';
		} else {
			echo 'There is some problem when trying to send mail.';
		}
	}
}

function getAdmin() {
	$sql = "SELECT * FROM `".DB_PREFIX."admin` WHERE 1 LIMIT 0,1";
	$res = mysql_query($sql);
	
	if(mysql_num_rows($res) > 0) {
		$data = mysql_fetch_object($res);
		return $data;
	}
}

function get_state($stateID) {
	$sql = "SELECT * FROM `".DB_PREFIX."states` WHERE id='$stateID'";
	$data = get_row($sql);
	return $data;
}
function get_school($schoolID) {
	$sql = "SELECT * FROM `".DB_PREFIX."schools` WHERE id='$schoolID'";
	$data = get_row($sql);
	return $data;
}
function get_dept($deptID) {
	$sql = "SELECT * FROM `".DB_PREFIX."departments` WHERE id='$deptID'";
	$data = get_row($sql);
	return $data;
}

function getList($type) {
	if($type == 'subscriber') {
		$sql = "SELECT *FROM `".DB_PREFIX."subscription` WHERE subscribeBy='{$_SESSION['userID']}'";
	} else if($type == 'subscribed') {
		$sql = "SELECT * FROM `".DB_PREFIX."subscription` WHERE subscribeTo='{$_SESSION['userID']}'";
	}
	
	if($sql != '') {
		$users = get_rows($sql);
		if(!empty($users)) {
			$data = array();
			foreach($users as $user) {
				if($type == 'subscriber') {
					$data[] = getUser($user->subscribeTo);
				} else {
					$data[] = getUser($user->subscribeBy);
				}
			} 
		}
		return $data;
	}
}

function getListTemplate($type) {
	echo '<div class="profile_content"><h1>'.ucFirst($type).' users list</h1><table border="0" class="purchasesTable">';		
		echo '<tr>
			<th>S. No.</th>
			<th>Image</th>
			<th>Full Name</th>
			<th>Email</th>
		</tr>';
		
		$users = getList($type);
		if(!empty($users)) {
			$count = 0;
			foreach($users as $user) { $count=$count+1; ?>
				<tr>
					<td><?php echo $count; ?>)</td>
					<td>
						<?php
							$avatar = "uploads/images/".stripslashes($user->avatar);
							if(!file_exists(stripslashes(trim($avatar))) || trim($user->avatar) == '') {
								$avatar = 'images/no-img.jpg';
							}
							?>
							<a href="user.php?id=<?php echo $user->id; ?>"><img src="<?php echo $avatar; ?>" style="max-width:60px; max-height:60px; border:none;" /></a>
						</td>
					<td><a href="user.php?id=<?php echo $user->id; ?>"><?php echo $user->fullName; ?></a></td>
					<td><?php echo $user->email; ?></td>
				</tr>
			<?php }
		}
	echo '</table></div>';
}

function getIncome($userID) {
	$sql = "SELECT sum(price-cp_fee-paypal_charges) as income FROM `".DB_PREFIX."purchases` WHERE toUserID='$userID' AND active='1'";
	$data = get_field('income', $sql);
	if($data > 0) {
		$data = number_format($data, 2, '.', '');
		return $data;
	}
}

function getExpenses($userID) {
	$sql = "SELECT sum(price) as income FROM `".DB_PREFIX."purchases` WHERE userID='$userID' AND active='1'";
	$data = get_field('income', $sql);
	if($data > 0) {
		$data = number_format($data, 2, '.', '');
		return $data;
	}
}
?>
