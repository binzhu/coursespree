<?php
$true_step_1 = 0;
$true_step_2 = 0;
if(!isset($_POST['sell_step_1'])) {
	if(isset($_GET['id']) && $_GET['id'] > 0) {
		$docID = $_GET['id'];
		$docInfo = get_doc($docID);
		if(!empty($docInfo)) {
			$doc = $docInfo->doc;
			$coverImage = $docInfo->coverImage;
			
			$state = $docInfo->stateID;
			$school = $docInfo->schoolID;
			$dept = $docInfo->deptID;
			$course = $docInfo->courseID;
			$term = $docInfo->term;
			
			$professor = $docInfo->professorID;
			$docType = $docInfo->docTypeID;
			$docName = $docInfo->docName;
			if(stripslashes(trim($docName)) == '') {
				$docName = get_doc_name($doc);
			}
			
			$tips = $docInfo->tips;
			$price = $docInfo->price;
			$cp_fee_percentage = $docInfo->cp_fee_percentage;
			$status = $docInfo->status;
			$paypalEmail = $user->paypalEmail;
		
			if(isUserLoggedin()) {
				$true_step_1 = isFieldsExist($state, 'states');
				if($true_step_1) {
					$true_step_1 = isFieldsExist($school, 'schools');
					if($true_step_1) {
						$true_step_1 = isFieldsExist($dept, 'departments');
						if($true_step_1) {
							$true_step_1 = isFieldsExist($course, 'courses');
						}
					}
				}
			
				if($true_step_1 == 1) {
					$true_step_2 = isFieldsExist($professor, 'professors');
					if($true_step_2) {
						$true_step_2 = isFieldsExist($docType, 'docTypes');
						if($true_step_2) {
							if(stripslashes(trim($docName)) == '') {
								$true_step_2 = 0;
							}
							if($true_step_2) {
								if(stripslashes(trim($tips)) == '') {
									$true_step_2 = 0;
								}
								if($true_step_2) {
									if(stripslashes(trim($price)) == '') {
										$true_step_2 = 0;
									}
									if($true_step_2) {
										if(stripslashes(trim($paypalEmail)) == '') {
											$true_step_2 = 0;
										}
										if($true_step_2) {
											if(stripslashes(trim($coverImage)) == '') {
												$true_step_2 = 0;
											}
										}
									}
								}
							}
						}
					}
				}
			}
		}
	}
}
?>
