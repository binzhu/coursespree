<?php require_once 'includes/config.php'; ?>
<?php
$action = 'add';
if(isset($_GET['id'])) {
	$action = 'edit';
	$ID = $_GET['id'];
	
	$sql = "SELECT d.*, sc.id as schoolID, s.id as stateID, c.id as countryID FROM `".DB_PREFIX."departments` d LEFT JOIN `".DB_PREFIX."school_dept_rel` sdr ON(d.id=sdr.deptID) LEFT JOIN `".DB_PREFIX."schools` sc ON(sdr.schoolID=sc.id) LEFT JOIN `".DB_PREFIX."states` s ON(sc.stateID=s.id) LEFT JOIN `".DB_PREFIX."countries` c ON(s.countryID=c.id) WHERE d.id='$ID'";
	$res = mysql_query($sql);
	
	if(mysql_num_rows($res) > 0) {
		$postInfo = mysql_fetch_array($res);
	
		if(!empty($postInfo)) {
			$countryID = $postInfo['countryID'];
			$stateID = $postInfo['stateID'];
			$schoolID = $postInfo['schoolID'];
			$name = $postInfo['name'];
		}
	}
}

if(isset($_POST['submitForm']) && $_POST['submitForm'] == '1') {
	$schoolID = filterMe($_POST['schoolID']);
	$name = filterMe($_POST['name']);
	if($name == '') {
		$_SESSION['errors'][] = 'Please enter Name';
	}

	if(empty($_SESSION['errors'])) {
		$sql = '';
		$fields = "name='$name'";
		
		switch($action) {
			case 'add':
				$sql = "INSERT INTO `".DB_PREFIX."departments` SET $fields";
				break;
			case 'edit':
				$sql = "UPDATE `".DB_PREFIX."departments` SET $fields WHERE id='$ID'";
				break;
		}
		
		if($sql != '') {
			$success = mysql_query($sql);
			if($success) {
				if($action == 'add') {
					$ID = mysql_insert_id();
					$_SESSION['messages'][] = 'Department added successfully';
				} else {
					$_SESSION['messages'][] = 'Department updated successfully';
				}
				
				/***** Entry in `cs_school_dept_rel` table **/
				$sql = "SELECT * FROM `".DB_PREFIX."school_dept_rel` WHERE deptID='$ID'";
				$res = mysql_query($sql);
				if(mysql_num_rows($res) > 0) {
					$sql = "UPDATE `".DB_PREFIX."school_dept_rel` SET schoolID='$schoolID' WHERE deptID='$ID'";
				} else {
					$sql = "INSERT INTO `".DB_PREFIX."school_dept_rel` SET deptID='$ID', schoolID='$schoolID'";
				}
				$res = mysql_query($sql);
				/***** Entry in `cs_school_dept_rel` table **/
				
				header('Location: departments.php?id='.$ID);
				exit;
			} else {
				$_SESSION['errors'][] = 'There is some validation error';
			}
		}
	}
}

require_once 'templates/header.php'; ?>
    
<div class="form">
<form action="" method="post" name="mainFrom" id="mainFrom" class="niceform">
	<input type="hidden" name="submitForm" id="submitForm" value='1' />
	<h2>Add/Edit Department</h2>
	<fieldset>
		<dl>
			<dt><label for="name">Name:</label></dt>
			<dd><input type="text" name="name" id="name" value="<?php echo stripslashes($name); ?>"></dd>
		</dl>
		
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
		
		<dl class="submit"><input type="submit" name="submit" id="submit" value="Submit" /></dl>
	</fieldset>
</form>
</div>

<?php require_once 'scripts.js.php'; ?>
<?php require_once 'templates/footer.php'; ?>
