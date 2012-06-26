<?php require_once 'includes/config.php'; ?>
<?php
$action = 'add';
if(isset($_GET['id'])) {
	$action = 'edit';
	$ID = $_GET['id'];
	
	$sql = "SELECT * FROM `".DB_PREFIX."pages` WHERE id='$ID'";
	$res = mysql_query($sql);
	
	if(mysql_num_rows($res) > 0) {
		$postInfo = mysql_fetch_array($res);
	
		if(!empty($postInfo)) {
			$title = $postInfo['title'];
			$description = $postInfo['description'];
			$meta_title = $postInfo['meta_title'];
			$meta_description = $postInfo['meta_description'];
			$meta_keywords = $postInfo['meta_keywords'];
		}
	}
}

if(isset($_POST['submitForm']) && $_POST['submitForm'] == '1') {
	$title = filterMe($_POST['title']);
	$slug = seoUrl($title);
	$description = filterMe($_POST['description']);
	$meta_title = filterMe($_POST['meta_title']);
	$meta_description = filterMe($_POST['meta_description']);
	$meta_keywords = filterMe($_POST['meta_keywords']);
		
	if($title=='') {
		$_SESSION['errors'][] = 'Please enter Title';
	}

	if($description=='') {
		$_SESSION['errors'][] = 'Please enter Description';
	}

	if(empty($_SESSION['errors'])) {
		$sql = '';
		$fields = "title='$title', description='$description',  meta_title='$meta_title', meta_description='$meta_description', meta_keywords='$meta_keywords'";
		if($action == 'add') {
			$dated = date('Y-m-d H:i:s');
			$fields .= ", slug='$slug', dated='$dated'";
		}
		
		switch($action) {
			case 'add':
				$sql = "INSERT INTO `".DB_PREFIX."pages` SET $fields";
				break;
			case 'edit':
				$sql = "UPDATE `".DB_PREFIX."pages` SET $fields WHERE id='$ID'";
				break;
		}
		
		if($sql != '') {
			$success = mysql_query($sql);
			if($success) {
				if($action == 'add') {
					$ID = mysql_insert_id();
					$_SESSION['messages'][] = 'Page added successfully';
				} else {
					$_SESSION['messages'][] = 'Page updated successfully';
				}
				
				header('Location: page.php?id='.$ID);
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
	<h2>Add/Edit Page</h2>
	<fieldset>
		<dl>
			<dt><label for="fname">Title:</label></dt>
			<dd><input type="text" name="title" id="title" value="<?php echo stripslashes($title); ?>"></dd>
		</dl>
		
		<dl>
			<dt><label for="description">Description:</label></dt>
			<dd>
				<?php
				$description = str_replace("\n","", $description);
				$description = str_replace("\r","", $description);
				$description = str_replace("'","&rsquo;",$description);
				$description = stripslashes($description);
				?>
				<script src="fckeditor/fckeditor.js" type="text/javascript"></script>
				<script type="text/javascript">
					var sBasePath = "fckeditor/" ;
					
					var oFCKeditor = new FCKeditor( 'description' ) ;
					oFCKeditor.BasePath	= sBasePath ;
					oFCKeditor.Height	= 350 ;
					oFCKeditor.Width	= 600 ;
					oFCKeditor.UserFilesPath	= 350 ;
					oFCKeditor.ToolbarSet	= 'Default' ;
					oFCKeditor.Value	= '<?php echo $description; ?>' ;
					oFCKeditor.Create() ;
				</script>
			</dd>
		</dl>
		
		<dl>
			<dt><label for="meta_title">Meta Title:</label></dt>
			<dd><input type="text" name="meta_title" id="meta_title" value="<?php echo stripslashes($meta_title); ?>"></dd>
		</dl>
		
		<dl>
			<dt><label for="meta_description">Meta Description:</label></dt>
			<dd><textarea name="meta_description" id="meta_description"><?php echo stripslashes($meta_description); ?></textarea></dd>
		</dl>
		
		<dl>
			<dt><label for="meta_keywords">Meta Keywords:</label></dt>
			<dd><textarea name="meta_keywords" id="meta_keywords"><?php echo stripslashes($meta_keywords); ?></textarea></dd>
		</dl>
		
		<dl class="submit"><input type="submit" name="submit" id="submit" value="Submit" /></dl>
	</fieldset>
</form>
</div>

<?php require_once 'templates/footer.php'; ?>
