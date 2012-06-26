<?php require_once 'includes/config.php'; ?>
<?php
$action = 'add';
if(isset($_GET['id'])) {
	$action = 'edit';
	$ID = $_GET['id'];
	$postInfo = getQuestion($ID);
	if(!empty($postInfo)) {
		$caption = stripslashes($postInfo->caption);
		$description = stripslashes($postInfo->description);
		$catName = stripslashes($postInfo->catName);
		$userName = stripslashes($postInfo->userName);
		$catID = stripslashes($postInfo->catID);
		$price = stripslashes($postInfo->price);
		$tags = stripslashes($postInfo->tags);
		$status = stripslashes($postInfo->status);
		$dated = stripslashes($postInfo->dated);
	}
}

if(isset($_POST['submitForm']) && $_POST['submitForm'] == '1') {
	$caption = filterMe($_POST['caption']);
	$description = filterMe($_POST['description']);
	$catID = filterMe($_POST['catID']);
	$price = filterMe($_POST['price']);
	$status = filterMe($_POST['status']);
	$dated = date('Y-m-d H:i:s');
	
	$tags = filterMe($_POST['tags']);
	$tagsArr = explode(',', $tags);
	$tagsNew = '';
	if(!empty($tagsArr)) {
		foreach($tagsArr as $tag) {
			$tag = trim($tag);
			if($tag != '') {
				$tagsNew .= trim($tag).",";
			}
		}
	}
	$tags = $tagsNew;
	
	if($caption == '') {
		$_SESSION['errors'][] = 'Please provide caption for question.';
	}

	if($description == '') {
		$_SESSION['errors'][] = 'Please provide description for question.';
	}

	if($catID < 1) {
		$_SESSION['errors'][] = 'Please select a category for question.';
	}
	
	if(!(isError())) {
		if(!(isError())) {
			$fields = "caption='$caption', description='$description', catID='$catID', price='$price', tags='$tags'";
			
			switch($action) {
				case 'add':
					$fields .= ", dated='$dated'";
					$sql = "INSERT INTO `".DB_PREFIX."questions` SET $fields";
					break;
				case 'edit':
					$sql = "UPDATE `".DB_PREFIX."questions` SET $fields WHERE id='$ID'";
					break;
			}
			
			if($sql != '') {
				$success = mysql_query($sql);
				if($success) {
					if($action == 'add') {
						$ID = mysql_insert_id();
						$_SESSION['messages'][] = 'Question added successfully';
					} else {
						$_SESSION['messages'][] = 'Question updated successfully';
					}
					
					
					/************* Update Comments ***********/
					if(isset($_POST['commentsFieldNames']) && $ID>0) {
						$commentsFieldNames = trim($_POST['commentsFieldNames']);
						if($commentsFieldNames != '') {
							$commentsFieldNamesArr = explode(",", $commentsFieldNames);
							if(!empty($commentsFieldNamesArr)) {
								foreach($commentsFieldNamesArr as $commentsFieldName) {
									if($commentsFieldName != '') {
										if(isset($_POST[$commentsFieldName])) {
											$commentsFieldNameArr = explode("_", $commentsFieldName);
											if(!empty($commentsFieldNameArr)) {
												$commentID = $commentsFieldNameArr['1'];
												$comment = $_POST[$commentsFieldName];
												updateComment($commentID, $comment);
											}
										}
									}
								}
							}
						}
					}
					/************* Update Comments ***********/
			
					header('Location: question.php?id='.$ID);
					exit;
				} else {
					$_SESSION['errors'][] = 'There is some validation error';
				}
			}
		}
	}
}

require_once 'templates/header.php'; ?>
    
<div class="form">
<form action="" method="post" name="mainFrom" id="mainFrom" class="niceform">
	<input type="hidden" name="submitForm" id="submitForm" value='1' />
	<h2>Add/Edit Question</h2>
	<fieldset>
		
		<?php /***********************************************/ ?>
		<div class="clear"></div>
		
		<dl>
			<dt><label for="catID">Status:</label></dt>
			<dd>
				<input type="radio" value="open" name="status" checked="checked"><label style="margin-left:5px;">Open</label>
				<input type="radio" value="closed" name="status" <?php if(stripslashes($status) == 'closed') { echo 'checked="checked"'; } ?>><label style="margin-left:5px;">Closed</label>
			</dd>
		</dl>
		
		<dl>
			<dt><label for="userName">User Name:</label></dt>
			<dd><input type="text" name="userName" id="userName" value="<?php echo stripslashes($userName); ?>" readonly></dd>
		</dl>
		
		<dl>
			<dt><label for="caption">Caption:</label></dt>
			<dd><input type="text" name="caption" id="caption" value="<?php echo stripslashes($caption); ?>"></dd>
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
					oFCKeditor.Height	= 250 ;
					oFCKeditor.Width	= 600 ;
					oFCKeditor.ToolbarSet	= 'Default' ;
					oFCKeditor.Value	= '<?php echo $description; ?>' ;
					oFCKeditor.Create() ;
				</script>
			</dd>
		</dl>
		
		
		<dl>
			<dt><label for="address_lName">Category:</label></dt>
			<dd>
				<select name="catID">
					<option value=''>Select Category</option>
					<?php
					$cats = getQuestionCats('-1');
					if(!empty($cats)) {
						foreach($cats as $cat) {
							$selected = '';
							if(stripslashes($catID) == $cat->id) {
								$selected = 'selected="selected"';												
							}
							echo '<option value="'.$cat->id.'" '.$selected.'>'.$cat->name.'</option>';
						}
					}
					?>
				</select>
			</dd>
		</dl>
		
		<dl>
			<dt><label for="price">Price:</label></dt>
			<dd><input type="text" value="<?php echo stripslashes($price); ?>" name="price"></dd>
		</dl>
		
		<div class="clear"></div>
		<dl>
			<dt><label for="tags">Tags:</label></dt>
			<dd><input type="text" name="tags" id="tags" value="<?php echo stripslashes($tags); ?>"></dd>
		</dl>		
		
		<?php
		/************* Question comments *********/
		if($action == 'edit') {
			$comments = getQuesAnsComments($ID, 'ques');
			if(!empty($comments)) { ?>
				<div class="clear"></div>
				<div class="commentsList">
					<div class="commentsListInner">
						<h1>Comments</h1>
						<?php $commentsFieldNames = ''; ?>
						<?php foreach($comments as $comment) { ?>
							<dl id="commentList_<?php echo $comment->id; ?>">
								<dd>
									<?php
									$commentContent = $comment->comment;
									$commentContent = str_replace("\n","", $commentContent);
									$commentContent = str_replace("\r","", $commentContent);
									$commentContent = str_replace("'","&rsquo;",$commentContent);
									$commentcommentContent = stripslashes($commentContent);
							
									$commentsFieldName = "comment_".$comment->id;
									$commentsFieldNames .= trim($commentsFieldName).",";
									?>
									<script src="fckeditor/fckeditor.js" type="text/javascript"></script>
									<script type="text/javascript">
										var sBasePath = "fckeditor/" ;
					
										var oFCKeditor = new FCKeditor( '<?php echo $commentsFieldName; ?>' ) ;
										oFCKeditor.BasePath	= sBasePath ;
										oFCKeditor.Height	= 100 ;
										oFCKeditor.Width	= 750 ;
										oFCKeditor.UserFilesPath	= 350 ;
										oFCKeditor.ToolbarSet	= 'Basic' ;
										oFCKeditor.Value	= '<?php echo $commentContent; ?>' ;
										oFCKeditor.Create() ;
									</script>
									<p class="note">
										<span style="display:block; float:left;"><strong>By:</strong> <?php echo $comment->userName; ?> <strong>on</strong> <?php echo $comment->dated; ?></span>
										<span style="display:block; float:right;"><a onclick="javascript: delComment('<?php echo $comment->id; ?>');" href="javascript:"><img border="0" title="Delete" alt="Delete" src="images/trash.png"></a></span>
										<span class="clear"></span>
									</p>
								</dd>
								<div class="clear"></div>
							</dl>
						<?php } ?>
					</div>
					<input type="hidden" name="commentsFieldNames" id="commentsFieldNames" value="<?php echo $commentsFieldNames; ?>" />
				</div>
			<?php }
		}
		?>
		
		<?php
		/************* Question Answers *********/
		if($action == 'edit') {
			$answers = getAnswers($ID, '');
			if(!empty($answers)) { ?>
				<div class="clear"></div>
				<div class="answersList">
					<div class="answersListInner">
						<h1>Answers</h1>
						<ul>
							<?php foreach($answers as $answer) { ?>
								<li id="answerList_<?php echo $answer->id; ?>">
									<?php echo stripslashes($answer->answer); ?>
									<p class="note">
										<span style="display:block; float:left;"><strong>By:</strong> <?php echo $answer->userName; ?> <strong>on</strong> <?php echo $answer->dated; ?></span>
										<span style="display:block; float:right;">
											<a href="answer.php?id=<?php echo $answer->id; ?>"><img border="0" title="Edit" alt="Edit" src="images/user_edit.png"></a>
											<a onclick="javascript: delAnswer('<?php echo $answer->id; ?>');" href="javascript:"><img border="0" title="Delete" alt="Delete" src="images/trash.png"></a>
										</span>
										<span class="clear"></span>
									</p>
								</li>
							<?php } ?>
						</ul>
					</div>
				</div>
			<?php }
		}
		?>
		
		<div class="clear"></div>
		<dl class="submit"><input type="submit" name="submit" id="submit" value="Submit" /></dl>
	</fieldset>
</form>
</div>

<?php require_once 'scripts.js.php'; ?>
<?php require_once 'templates/footer.php'; ?>
