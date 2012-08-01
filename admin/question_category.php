<?php require_once 'includes/config.php'; ?>
<?php
$action = 'add';
if(isset($_GET['id'])) {
	$action = 'edit';
	$ID = $_GET['id'];
	
	$sql = "SELECT * FROM `".DB_PREFIX."question_categories` WHERE id='$ID'";
	$res = mysql_query($sql);
	
	if(mysql_num_rows($res) > 0) {
		$postInfo = mysql_fetch_array($res);
	
		if(!empty($postInfo)) {
			$name = $postInfo['name'];
		}
	}
}

if(isset($_POST['submitForm']) && $_POST['submitForm'] == '1') {
	$name = filterMe($_POST['name']);
	if($name == '') {
		$_SESSION['errors'][] = 'Please enter Name';
	}

	if(empty($_SESSION['errors'])) {
		$sql = '';
		$fields = "name='$name'";
		
		switch($action) {
			case 'add':
				$sql = "INSERT INTO `".DB_PREFIX."question_categories` SET $fields";
				break;
			case 'edit':
				$sql = "UPDATE `".DB_PREFIX."question_categories` SET $fields WHERE id='$ID'";
				break;
		}
		
		if($sql != '') {
			$success = mysql_query($sql);
			if($success) {
				if($action == 'add') {
					$ID = mysql_insert_id();
					$_SESSION['messages'][] = 'Category added successfully';
				} else {
					$_SESSION['messages'][] = 'Category updated successfully';
				}
				
				header('Location: question_category.php?id='.$ID);
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
	<h2>Add/Edit Question Categories</h2>
	<fieldset>
		<dl>
			<dt><label for="name">Name:</label></dt>
			<dd><input type="text" name="name" id="name" value="<?php echo stripslashes($name); ?>"></dd>
		</dl>
		
		<dl class="submit"><input type="submit" name="submit" id="submit" value="Submit" /></dl>
	</fieldset>
</form>
</div>

<?php require_once 'templates/footer.php'; ?>
