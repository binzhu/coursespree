<?php
require_once('includes/config.php');

if(!isset($_REQUEST['action'])) {
	exit;
}

$action = $_REQUEST['action'];
switch($action) {
	case 'showAddressStates':
		$output = '';
		$addressCountryID = $_REQUEST['addressCountryID'];
		$state = $_REQUEST['selectedID'];
		$states = get_states($addressCountryID);
		
		$output .= '<option value="">--SELECT--</option>';
		if(!empty($states)) {
			foreach($states as $stateInfo) {
				$selected = '';
			 	if($stateInfo->id == $state) {
			 		$selected = 'selected="selected"';
			 	}
				$output .= '<option value="'.$stateInfo->id.'" '.$selected.'>'.$stateInfo->name.'</option>';
			}
		}
		
		echo $output;
		break;
		
	case 'showStates':
		$output = '';
		$countryID = $_REQUEST['countryID'];
		$state = $_REQUEST['selectedID'];
		$states = get_states($countryID);
		
		$output .= '<option value="">--SELECT--</option>';
		if(!empty($states)) {
			foreach($states as $stateInfo) {
				$selected = '';
			 	if($stateInfo->id == $state) {
			 		$selected = 'selected="selected"';
			 	}
				$output .= '<option value="'.$stateInfo->id.'" '.$selected.'>'.$stateInfo->name.'</option>';
			}
		}
		
		echo $output;
		break;
		
	case 'showSchools':
		$output = '';
		$stateID = $_REQUEST['stateID'];
		$school = $_REQUEST['selectedID'];
		$schools = get_schools($stateID);
		
		$output .= '<option value="">--SELECT--</option>';
		if(!empty($schools)) {
			foreach($schools as $schoolInfo) {
				$selected = '';
			 	if($schoolInfo->id == $school) {
			 		$selected = 'selected="selected"';
			 	}
				$output .= '<option value="'.$schoolInfo->id.'" '.$selected.'>'.$schoolInfo->name.'</option>';
			}
		}
		
		echo $output;
		break;
	
	case 'showDepts':
		$output = '';
		$schoolID = $_REQUEST['schoolID'];
		$dept = $_REQUEST['selectedID'];
		$depts = get_depts($schoolID);
		
		$output .= '<option value="">--SELECT--</option>';				
		if(!empty($depts)) {
			foreach($depts as $deptInfo) {
				$selected = '';
			 	if($deptInfo->id == $dept) {
			 		$selected = 'selected="selected"';
			 	}
				$output .= '<option value="'.$deptInfo->id.'" '.$selected.'>'.$deptInfo->name.'</option>';
			}
		}
		
		echo $output;
		break;
		
	case 'showCourses':
		$output = '';
		$schoolID = $_REQUEST['schoolID'];
		$deptID = $_REQUEST['deptID'];
		$course = $_REQUEST['selectedID'];
		$courses = get_courses($schoolID, $deptID);
		
		$output .= '<option value="">--SELECT--</option>';				
		if(!empty($courses)) {
			foreach($courses as $courseInfo) {
				$selected = '';
			 	if($courseInfo->id == $course) {
			 		$selected = 'selected="selected"';
			 	}
				$output .= '<option value="'.$courseInfo->id.'" '.$selected.'>'.$courseInfo->name.'</option>';
			}
		}
		
		echo $output;
		break;
	
	case 'logMeIn':
		$userName = $_REQUEST['userName'];
		$password = $_REQUEST['password'];
		$remember = $_REQUEST['remember'];
		
		logMeIn_step2($userName, $password, $remember);
		if(isUserLoggedin()) {
			echo '1';
		} else {
			echo 'Invalid login details';
		}
		unset($_SESSION['errors']);
		unset($_SESSION['warnings']);
		unset($_SESSION['messages']);
		break;
		
	case 'showSearchResults':
		$s = $_REQUEST['s'];
		$stateID = $_REQUEST['stateID'];
		$schoolID = $_REQUEST['schoolID'];
		$deptID = $_REQUEST['deptID'];
		$so = $_REQUEST['so'];
		
		showSearchTemplate($s, $so, $stateID, $schoolID, $deptID);
		break;
		
	case 'subscribe':
		$subscribeToID = $_REQUEST['subscribeToID'];
		$return = subscribe($_SESSION['userID'], $subscribeToID, 'subscribe');
		echo $return;
		break;
		
	case 'unsubscribe':
		$subscribeToID = $_REQUEST['subscribeToID'];
		$return = subscribe($_SESSION['userID'], $subscribeToID, 'unsubscribe');
		echo $return;
		break;
		
	case 'addAnswer':
		$quesID = filterMe($_REQUEST['quesID']);
		$quesAnswer = filterMe($_REQUEST['quesAnswer']);		
		
		$return = insertAnswer($_SESSION['userID'], $quesID, $quesAnswer);
		echo $return;
		
		break;
	
	case 'editAnswer':
		$ansID = filterMe($_REQUEST['ansID']);
		$answer = filterMe($_REQUEST['answer']);
		
		$return = updateAnswer($_SESSION['userID'], $ansID, $answer);
		echo $return;
		
		break;
		
	case 'addSingleAnswerTemplate':
		$ansID = filterMe($_REQUEST['ansID']);	
		$ans = getAnswer($ansID);
		echo getSingleAnswerTemplate($ans, '');
		
		break;
	
	case 'delAns':
		$ansID = filterMe($_REQUEST['ansID']);	
		$userID = $_SESSION['userID'];
		$sql = "SELECT * FROM `".DB_PREFIX."question_answers` WHERE id='$ansID' AND userID='$userID'";
		$numOfRows = get_num_rows($sql);
		
		if($numOfRows > 0) {
			$sql = "DELETE FROM `".DB_PREFIX."question_answers` WHERE id='$ansID' AND userID='$userID'";
			$res = mysql_query($sql);
			if($res) {
				$return = '1';
			}
		} else {
			$return = "You haven't access to delete this answer.";
		}
		
		echo $return;
		break;
	
	
	case 'delQues':
		$quesID = filterMe($_REQUEST['quesID']);	
		$userID = $_SESSION['userID'];
		$sql = "SELECT * FROM `".DB_PREFIX."questions` WHERE id='$quesID' AND userID='$userID'";
		$numOfRows = get_num_rows($sql);
		
		if($numOfRows > 0) {
			$sql = "DELETE FROM `".DB_PREFIX."questions` WHERE id='$quesID' AND userID='$userID'";
			$res = mysql_query($sql);
			if($res) {
				$_SESSION['messages']['question'] = 'Your question has been deleted successfully';
				$return = '1';
			}
		} else {
			$return = "You haven't access to delete this question.";
		}
		
		echo $return;
		break;
		
	case 'abuse':
		$pID = filterMe($_REQUEST['pID']);
		$abuseType = filterMe($_REQUEST['abuseType']);
		$userID = $_SESSION['userID'];
		
		$return = sendAbuseMail($pID, $userID, $abuseType);
		
		echo $return;
		break;
		
	case 'addComment':
		$pID = filterMe($_REQUEST['pID']);
		$pType = filterMe($_REQUEST['pType']);
		$comment = filterMe($_REQUEST['comment']);
		
		$return = addComment($_SESSION['userID'], $pID, $pType, $comment);
		echo $return;		
		break;
	
	case 'addSingleCommentTemplate':
		$commentID = filterMe($_REQUEST['commentID']);
		$pID = filterMe($_REQUEST['pID']);
		$pType = filterMe($_REQUEST['pType']);
		$comment = getQuesAnsComment($commentID);
		if(!empty($comment)) {
			echo getSingleCommentTemplate($comment, $pType, $pType);
		}
		break;
		
	/*case 'approveAns':
		$approveQuesID = filterMe($_REQUEST['approveQuesID']);
		$ansIDs = filterMe($_REQUEST['ansIDs']);
		$return = approveAns($approveQuesID, $ansIDs, $_SESSION['userID']);
		echo $return;
		break;*/
		
	case 'addNew':
		$newVal = filterMe($_REQUEST['newVal']);
		$addType = filterMe($_REQUEST['addType']);
		
		$countryID = filterMe($_REQUEST['countryID']);
		$stateID = filterMe($_REQUEST['stateID']);
		$schoolID = filterMe($_REQUEST['schoolID']);
		$deptID = filterMe($_REQUEST['deptID']);
		$courseID = filterMe($_REQUEST['courseID']);
		
		if($addType == 'state') {
			$sql = "SELECT * FROM `".DB_PREFIX."states` WHERE countryID='$countryID' AND name='$newVal'";
			$data = get_row($sql);
			if(!empty($data)) {
				$id = $data->id;
			} else {
				$sql = "INSERT INTO `".DB_PREFIX."states` SET countryID='$countryID', name='$newVal'";
				$row = mysql_query($sql);
				if($row) {
					$id = mysql_insert_id();
				}
			}
		} else if($addType == 'school') {
			$sql = "SELECT * FROM `".DB_PREFIX."schools` WHERE stateID='$stateID' AND name='$newVal'";
			$data = get_row($sql);
			if(!empty($data)) {
				$id = $data->id;
			} else {
				$sql = "INSERT INTO `".DB_PREFIX."schools` SET stateID='$stateID', name='$newVal'";
				$row = mysql_query($sql);
				if($row) {
					$id = mysql_insert_id();
				}
			}
		} else if($addType == 'dept') {
			$sql = "SELECT d.* FROM `".DB_PREFIX."departments` d LEFT JOIN `".DB_PREFIX."school_dept_rel` sdr ON(d.id=sdr.deptID) WHERE sdr.deptID='$deptID' AND d.name='$newVal'";
			$data = get_row($sql);
			if(!empty($data)) {
				$id = $data->id;
			} else {
				$sql = "INSERT INTO `".DB_PREFIX."departments` SET name='$newVal'";
				$row = mysql_query($sql);
				if($row) {
					$id = mysql_insert_id();
					
					$sql = "INSERT INTO `".DB_PREFIX."school_dept_rel` SET schoolID='$schoolID', deptID='$id'";
					$row = mysql_query($sql);
				}
			}
		} else if($addType == 'course') {
			$sql = "SELECT c.* FROM `".DB_PREFIX."courses` c LEFT JOIN `".DB_PREFIX."dept_course_rel` dcr ON(c.id=dcr.courseID) LEFT JOIN `".DB_PREFIX."schools` sc ON(dcr.schoolID=sc.id) WHERE dcr.id='$schoolID' AND dcr.deptID='$deptID' AND c.name='$newVal'";
			$data = get_row($sql);
			if(!empty($data)) {
				$id = $data->id;
			} else {
				$dated = date('Y-m-d H:i:s');
				$sql = "INSERT INTO `".DB_PREFIX."courses` SET name='$newVal', dated='$dated'";
				$row = mysql_query($sql);
				if($row) {
					$id = mysql_insert_id();
					
					$sql = "INSERT INTO `".DB_PREFIX."dept_course_rel` SET schoolID='$schoolID', deptID='$deptID', courseID='$id'";
					$row = mysql_query($sql);
				}
			}
		}
		
		if($id > 0) {
			echo $id;
		}
		break;
}
?>
