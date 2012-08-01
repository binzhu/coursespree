<?php
require_once 'includes/config.php';
$action = $_REQUEST['action'];
switch($action) {
	case 'stateList':
		$countryID = $_REQUEST['countryID'];
		$stateID = $_REQUEST['stateID'];
		
		echo '<option value="">--Select State--</option>';
		$sql = "SELECT * FROM `".DB_PREFIX."states` WHERE countryID='$countryID' ORDER BY `name`";
		$res = mysql_query($sql);

		if(mysql_num_rows($res) > 0) {
			while($state = mysql_fetch_array($res)) {
				$selected = '';
				if($state['id'] == $stateID) {
					$selected = 'selected="selected"';
				}
				echo '<option value="'.$state['id'].'" '.$selected.'>'.$state['name'].'</option>';
			}
		}
		break;
		
	case 'schoolList':
		$countryID = $_REQUEST['countryID'];
		$stateID = $_REQUEST['stateID'];
		$schoolID = $_REQUEST['schoolID'];
		
		echo '<option value="">--Select School--</option>';
		$sql = "SELECT * FROM `".DB_PREFIX."schools` WHERE stateID='$stateID' ORDER BY `name`";
		$res = mysql_query($sql);

		if(mysql_num_rows($res) > 0) {
			while($school = mysql_fetch_array($res)) {
				$selected = '';
				if($school['id'] == $schoolID) {
					$selected = 'selected="selected"';
				}
				echo '<option value="'.$school['id'].'" '.$selected.'>'.$school['name'].'</option>';
			}
		}
		break;
		
	case 'deptList':
		$countryID = $_REQUEST['countryID'];
		$stateID = $_REQUEST['stateID'];
		$schoolID = $_REQUEST['schoolID'];
		$deptID = $_REQUEST['deptID'];
		
		echo '<option value="">--Select Department--</option>';
		$sql = "SELECT d.* FROM `".DB_PREFIX."departments` d LEFT JOIN `".DB_PREFIX."school_dept_rel` sdr ON(d.id=sdr.deptID) WHERE sdr.schoolID='$schoolID' ORDER BY `name`";
		$res = mysql_query($sql);

		if(mysql_num_rows($res) > 0) {
			while($dept = mysql_fetch_array($res)) {
				$selected = '';
				if($dept['id'] == $deptID) {
					$selected = 'selected="selected"';
				}
				echo '<option value="'.$dept['id'].'" '.$selected.'>'.$dept['name'].'</option>';
			}
		}
		break;
	
	case 'courseList':
		$countryID = $_REQUEST['countryID'];
		$stateID = $_REQUEST['stateID'];
		$schoolID = $_REQUEST['schoolID'];
		$deptID = $_REQUEST['deptID'];
		$courseID = $_REQUEST['courseID'];
		
		echo '<option value="">--Select Department--</option>';
		echo $sql = "SELECT c.* FROM `".DB_PREFIX."courses` c LEFT JOIN `".DB_PREFIX."dept_course_rel` dcr ON(c.id=dcr.courseID) LEFT JOIN `".DB_PREFIX."departments` d ON(dcr.deptID=d.id) LEFT JOIN `".DB_PREFIX."school_dept_rel` sdr ON(d.id=sdr.deptID) LEFT JOIN `".DB_PREFIX."schools` sc ON(sdr.schoolID=sc.id)  WHERE d.id='$deptID' AND sc.id='$schoolID' ORDER BY `name`";
		$res = mysql_query($sql);

		if(mysql_num_rows($res) > 0) {
			while($course = mysql_fetch_array($res)) {
				$selected = '';
				if($course['id'] == $courseID) {
					$selected = 'selected="selected"';
				}
				echo '<option value="'.$course['id'].'" '.$selected.'>'.$course['name'].'</option>';
			}
		}
		break;
		
	case 'professorList':
		$courseID = $_REQUEST['courseID'];
		$professorID = $_REQUEST['professorID'];
		
		echo '<option value="">--Select Professor--</option>';
		$sql = "SELECT * FROM `".DB_PREFIX."professors` WHERE `courseID`='$courseID' ORDER BY `name`";
		$res = mysql_query($sql);

		if(mysql_num_rows($res) > 0) {
			while($professor = mysql_fetch_array($res)) {
				$selected = '';
				if($professor['id'] == $professorID) {
					$selected = 'selected="selected"';
				}
				echo '<option value="'.$professor['id'].'" '.$selected.'>'.$professor['name'].'</option>';
			}
		}
		break;
		
	case 'docTypeList':
		$docTypeID = $_REQUEST['docTypeID'];
		
		echo '<option value="">--Select Doc Type--</option>';
		$sql = "SELECT * FROM `".DB_PREFIX."docTypes` ORDER BY `name`";
		$res = mysql_query($sql);

		if(mysql_num_rows($res) > 0) {
			while($docType = mysql_fetch_array($res)) {
				$selected = '';
				if($docType['id'] == $docTypeID) {
					$selected = 'selected="selected"';
				}
				echo '<option value="'.$docType['id'].'" '.$selected.'>'.$docType['name'].'</option>';
			}
		}
		break;
		
		
	case 'delComment':
		$commentID = $_REQUEST['commentID'];
		echo delComment($commentID);
		break;
		
	case 'delAnswer':
		$ansID = $_REQUEST['ansID'];
		echo delAnswer($ansID);
		break;
		
	case 'loadPage':
		$pageNum = $_REQUEST['pageNum'];
		$pageType = $_REQUEST['pageType'];
		
		if($pageType == 'questionsPayment') {
			getQuestionsPaymentTemplate();
		} else if($pageType == 'notesPayment') {
			getNotesPaymentTemplate();
		}
		break;
}
?>
