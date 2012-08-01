<?php require_once 'includes/config.php'; ?>
<?php
$action = 'add';
if(isset($_GET['id'])) {
	$action = 'edit';
	$ID = $_GET['id'];
	
	$sql = "SELECT sc.*,c.id as countryID FROM `".DB_PREFIX."schools` sc LEFT JOIN `".DB_PREFIX."states` s ON(sc.stateID=s.id) LEFT JOIN `".DB_PREFIX."countries` c ON(s.countryID=c.id) WHERE sc.id='$ID'";
	$res = mysql_query($sql);
	
	if(mysql_num_rows($res) > 0) {
		$postInfo = mysql_fetch_array($res);
	
		if(!empty($postInfo)) {
			$countryID = $postInfo['countryID'];
			$stateID = $postInfo['stateID'];
			$name = $postInfo['name'];
		}
	}
}

if(isset($_POST['submitForm']) && $_POST['submitForm'] == '1') {
	$stateID = filterMe($_POST['stateID']);
	$name = filterMe($_POST['name']);
	if($name == '') {
		$_SESSION['errors'][] = 'Please enter Name';
	}

	if(empty($_SESSION['errors'])) {
		$sql = '';
		$fields = "stateID='$stateID', name='$name'";
		
		switch($action) {
			case 'add':
				$sql = "INSERT INTO `".DB_PREFIX."schools` SET $fields";
				break;
			case 'edit':
				$sql = "UPDATE `".DB_PREFIX."schools` SET $fields WHERE id='$ID'";
				break;
		}
		
		if($sql != '') {
			$success = mysql_query($sql);
			if($success) {
				if($action == 'add') {
					$ID = mysql_insert_id();
					$_SESSION['messages'][] = 'School added successfully';
				} else {
					$_SESSION['messages'][] = 'School updated successfully';
				}
				
				header('Location: schools.php?id='.$ID);
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
	<h2>Add/Edit School</h2>
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
		
		<dl class="submit"><input type="submit" name="submit" id="submit" value="Submit" /></dl>
	</fieldset>
</form>
</div>

<?php require_once 'scripts.js.php'; ?>
<?php require_once 'templates/footer.php'; ?>
