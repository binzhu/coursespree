<?php require_once 'includes/config.php'; ?>
<?php
$action = 'add';
if(isset($_GET['id'])) {
	$action = 'edit';
	$ID = $_GET['id'];
	$docInfo = get_doc($ID);
	if(!empty($docInfo)) {
		$userID = stripslashes($docInfo->userID);
		$doc = stripslashes($docInfo->doc);
		$coverImage = stripslashes($docInfo->coverImage);
		$stateID = stripslashes($docInfo->stateID);
		$schoolID = stripslashes($docInfo->schoolID);
		$deptID = stripslashes($docInfo->deptID);
		$courseID = stripslashes($docInfo->courseID);
		$term = stripslashes($docInfo->term);
		$professorID = stripslashes($docInfo->professorID);
		$docTypeID = stripslashes($docInfo->docTypeID);
		$docName = stripslashes($docInfo->docName);
		$tips = stripslashes($docInfo->tips);
		$price = stripslashes($docInfo->price);
		$cp_fee_percentage = stripslashes($docInfo->cp_fee_percentage);
		$status = stripslashes($docInfo->status);
	}
}

if(isset($_POST['submitForm']) && $_POST['submitForm'] == '1') {
	$doc = filterMe($_POST['doc']);
	$stateID = filterMe($_POST['stateID']);
	$schoolID = filterMe($_POST['schoolID']);
	$deptID = filterMe($_POST['deptID']);
	$courseID = filterMe($_POST['courseID']);
	$term = filterMe($_POST['term']);
	
	$professorID = filterMe($_POST['professorID']);
	$docTypeID = filterMe($_POST['docTypeID']);
	$docName = filterMe($_POST['docName']);
	$tips = filterMe($_POST['tips']);
	$price = filterMe($_POST['price']);
	$userID = filterMe($_POST['userID']);
	$status = filterMe($_POST['status']);
	$dated = date('Y-m-d H:i:s');
	
	if($doc == '') {
		$_SESSION['errors']['doc'] = 'You have to upload a file.';
	}
	if($stateID < 1) {
		$_SESSION['errors']['state'] = "You have to select School's State.";
	}
	if($schoolID < 1) {
		$_SESSION['errors']['school'] = "You have to select School.";
	}
	if($deptID < 1) {
		$_SESSION['errors']['dept'] = "You have to select Department.";
	}
	if($courseID < 1) {
		$_SESSION['errors']['course'] = "You have to select Course.";
	}
	if($term == '') {
		$_SESSION['errors']['term'] = "You have to select Term.";
	}
	if($docTypeID < 1) {
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
	if($userID == '') {
		$_SESSION['errors']['userID'] = "You have to select User.";
	}
	
	if(!(isError())) {
		/******** Upload avatar *******/
		if($_FILES['coverImage']['name'] != '') {
			if($_FILES['coverImage']['error'] == 0) {
				$tmp_name = $_FILES["coverImage"]["tmp_name"];
				$coverImage = addslashes(time()."_".$_FILES["coverImage"]["name"]);
				$uploads_dir = '../uploads/docs/preview';
				$uploaded = move_uploaded_file($tmp_name, "$uploads_dir/$coverImage");
				
				if(!$uploaded) {
					$_SESSION['warnings'][] = 'There is some error when uploading avatar';
				}
			} else {
				$_SESSION['warnings'][] = 'There is some error when uploading avatar';
			}
		}
		/******** Upload avatar *******/
		
		if($cp_fee_percentage > 0) {
			//Nothing
		} else {
			$cp_fee_percentage = CP_PAYMENT_FEE_PERCENTAGE;
		}
		
		$fields = "stateID='$stateID', schoolID='$schoolID', deptID='$deptID', courseID='$courseID', term='$term', doc='$doc', coverImage='$coverImage', professorID='$professorID', docTypeID='$docTypeID', docName='$docName', tips='$tips', price='$price', cp_fee_percentage='$cp_fee_percentage', userID='$userID', status='$status'";
		
		switch($action) {
			case 'add':
				$fields .= ", dated='$dated'";
				$sql = "INSERT INTO `".DB_PREFIX."notices` SET $fields";
				break;
			case 'edit':
				$sql = "UPDATE `".DB_PREFIX."notices` SET $fields WHERE id='$ID'";
				break;
		}
		
		if($sql != '') {
			$success = mysql_query($sql);
			if($success) {
				if($action == 'add') {
					$ID = mysql_insert_id();
					$_SESSION['messages'][] = 'Notes added successfully';
				} else {
					$_SESSION['messages'][] = 'Notes updated successfully';
				}
				
				header('Location: notes.php?id='.$ID);
				exit;
			} else {
				$_SESSION['errors'][] = 'There is some validation error';
			}
		}
	}
}

require_once 'templates/header.php'; ?>
    
<div class="form">
<form action="" method="post" name="mainFrom" id="mainFrom" class="niceform" enctype="multipart/form-data">
	<input type="hidden" name="submitForm" id="submitForm" value='1' />
	<h2>Add/Edit Notes</h2>
	<fieldset>
		
		<?php /***********************************************/ ?>
		<div class="clear"></div>
		
		<dl>
			<dt><label for="catID">Status:</label></dt>
			<dd>
				<input type="radio" value="1" name="status" checked="checked"><label style="margin-left:5px;">Published</label>
				<input type="radio" value="0" name="status" <?php if(stripslashes($status) == '0') { echo 'checked="checked"'; } ?>><label style="margin-left:5px;">Un-published</label>
			</dd>
		</dl>
		
		<dl>
			<dt>
				<label>
					<link rel="stylesheet" type="text/css" media="all" href="../js-plugins/ajax-file-uploader/ajax-upload.css" />
					<script type="text/javascript" src="../js-plugins/ajax-file-uploader/jquery.ajax.upload.js"></script>
					<script type="text/javascript">
					$(document).ready(function() {
						var upload = new AjaxUpload('#userfile', {
							//upload script 
							action: '../js-plugins/ajax-file-uploader/upload.php',
							onSubmit : function(file, extension){
								//check file extension
								if (! (extension && /^(pdf|txt|ps|rtf|epub|odt|odp|ods|odg|odf|sxw|sxc|sxi|sxd|doc|ppt|pps|xls|docx|pptx|ppsx|xlsx|tif|tiff)$/.test(extension))){
							   	// extension is not allowed
									 $('#errormes').html('');	
							
									 $("<span class='error'>Error: Not a valid file extension</span>").appendTo("#errormes");
									// cancel upload
							   		return false;
								} else {
									// get rid of error
									$('.error').hide();
								}	
						
								//send the data
								upload.setData({'file': file});
							},
							onComplete : function(file, response){
								//add display:block to success message holder
								$(".success").css("display", "block");
							
								$('#errormes').html('');	
								//This lower portion gets the error message from upload.php file and appends it to our specifed error message block
								//find the div in the iFrame and append to error message	
								var oBody = $(".iframe").contents().find("div");
								//add the iFrame to the errormes td
								$(oBody).appendTo("#errormes");

								//This is the demo dummy success message, comment this out when using the above code
								//$("#errormes").html("<span class='success'>Your file was uploaded successfully</span>");
							}
						});
					});	
					</script>
				
					<img src="../images/upload.jpg" border="0" alt="" id="userfile" />
				</label>
			</dt>
			<dd><div id="errormes"><input type="text" name="doc" value="<?php echo stripslashes($doc); ?>" readonly></div></dd>
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
		
		<dl>
			<dt><label for="name">Course:</label></dt>
			<dd>
				<select name="courseID" id="courseID">
					<option value="">--Select Course--</option>
				</select>
			</dd>
		</dl>
		
		<dl>
			<dt><label for="name">Term:</label></dt>
			<dd>
				<select name="term" id="term">
					<option value="">--SELECT--</option>
					<?php
					$seasons = array('Fall', 'Summer', 'Spring', 'Winter');
					for($i=2008; $i<=2012; $i++) {
						foreach($seasons as $season) {
							$val = "$season $i";
							
							$selected = '';
						 	if($val == stripslashes($term)) {
						 		$selected = 'selected="selected"';
						 	}
						 	echo '<option value="'.$val.'" '.$selected .'>'.$val.'</option>';
						}
					}
					?>
				</select>
			</dd>
		</dl>
		
		
		<div style="clear:both;"></div>
		<div style="padding:5px; border:1px dotted black;">
			<h1>Some Other Information:</h1>
			<dl>
				<dt><label for="name">Choose a Professor:</label></dt>
				<dd>
					<select name="professorID" id="professorID">
						<option value="">--SELECT--</option>
					</select>
				</dd>
			</dl>
		
			<dl>
				<dt><label for="name">Type of Document:</label></dt>
				<dd>
					<select name="docTypeID" id="docTypeID">
						<option value="">--SELECT--</option>
					</select>
				</dd>
			</dl>
		
			<dl>
				<dt><label for="name">Name your Document:</label></dt>
				<dd><input type="text" value="<?php echo stripslashes($docName); ?>" name="docName" /></dd>
			</dl>
		
			<dl>
				<dt><label for="name">Notes/Tips:</label></dt>
				<dd><textarea name="tips"><?php echo stripslashes($tips); ?></textarea></dd>
			</dl>
		
			<dl>
				<dt><label for="name">Price:</label></dt>
				<dd><input type="text" name="price" value="<?php echo stripslashes($price); ?>" /></dd>
			</dl>
		
			<dl>
				<dt> </dt>
				<dd>
					<p class="note" style="margin-top:-10px;">
						<?php if($cp_fee_percentage > 0 || $action == 'add') { ?>
							*excluding <?php if($cp_fee_percentage > 0) { echo $cp_fee_percentage; } else { echo CP_PAYMENT_FEE_PERCENTAGE; } ?>% charges of coursespree
						<?php } else {
							echo "This price is without coursespree charges. You need to submit form once to include coursespree charges.";
						} ?>
					</p>
				</dd>
			</dl>
		
			<dl>
				<dt><label for="name">Owner Name:</label></dt>
				<dd>
					<select name="userID" id="userID">
						<?php
						echo '<option value="">--Select User--</option>';
						$sql = "SELECT * FROM `".DB_PREFIX."users` ORDER BY `fName`,`lName`";
						$res = mysql_query($sql);

						if(mysql_num_rows($res) > 0) {
							while($user = mysql_fetch_array($res)) {
								$selected = '';
								if($user['id'] == $userID) {
									$selected = 'selected="selected"';
								}
								echo '<option value="'.$user['id'].'" '.$selected.'>'.$user['fName']." ".$user['lName'].'</option>';
							}
						}
						?>
					</select>
				</dd>
			</dl>
		
			<dl>
				<dt><label for="name">Upload Cover Image:</label></dt>
				<dd>
					<table cellspacing="2" cellpadding="2" border="0" class="coverImg">
						<tbody>
						<tr>
							<td style="vertical-align:top; padding-right:10px;"><input type="file" value="" name="coverImage"></td>
							<td>
								<span><a href="../uploads/docs/preview/<?php echo stripslashes($coverImage); ?>" title="<?php echo stripslashes($docName); ?>" target="_blank"><img border="0" height="60" class="pngfix" alt="" src="../uploads/docs/preview/<?php echo stripslashes($coverImage); ?>"></a></span>
							</td>
						</tr>
						</tbody>
					</table>
				</dd>
			</dl>
			<div style="clear:both;"></div>
		</div>
		
		<div class="clear"></div>
		<dl class="submit"><input type="submit" name="submit" id="submit" value="Submit" /></dl>
	</fieldset>
</form>
</div>

<?php require_once 'scripts.js.php'; ?>
<?php require_once 'templates/footer.php'; ?>
