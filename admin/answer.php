<?php require_once 'includes/config.php'; ?>
<?php
$action = 'add';
if(isset($_GET['id'])) {
	$action = 'edit';
	$ID = $_GET['id'];
	$postInfo = getAnswer($ID);
	if(!empty($postInfo)) {
		$quesCaption = stripslashes($postInfo->quesCaption);
		$userName = stripslashes($postInfo->userName);
		$answer = stripslashes($postInfo->answer);
		$status = stripslashes($postInfo->status);
		$dated = stripslashes($postInfo->dated);
	}
}

if(isset($_POST['submitForm']) && $_POST['submitForm'] == '1') {
	$answer = filterMe($_POST['answer']);
	$status = filterMe($_POST['status']);
	updateAnswer($ID, $answer, $status);
	
	if(!(isError())) {
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

		header('Location: answer.php?id='.$ID);
		exit;
	}
}

require_once 'templates/header.php'; ?>
    
<div class="form">
<form action="" method="post" name="mainFrom" id="mainFrom" class="niceform">
	<input type="hidden" name="submitForm" id="submitForm" value='1' />
	<h2>Edit Answer</h2>
	<fieldset>
		
		<?php /***********************************************/ ?>
		<div class="clear"></div>
		
		<dl>
			<dt><label for="catID">Status:</label></dt>
			<dd>
				<input type="radio" value="pending" name="status" checked="checked"><label style="margin-left:5px;">Pending</label>
				<input type="radio" value="approved" name="status" <?php if(stripslashes($status) == 'approved') { echo 'checked="checked"'; } ?>><label style="margin-left:5px;">Approved</label>
			</dd>
		</dl>
		
		<dl>
			<dt><label for="description">Description:</label></dt>
			<dd>
				<?php
				$answer = str_replace("\n","", $answer);
				$answer = str_replace("\r","", $answer);
				$answer = str_replace("'","&rsquo;",$answer);
				$answer = stripslashes($answer);
				?>
				<script src="fckeditor/fckeditor.js" type="text/javascript"></script>
				<script type="text/javascript">
					var sBasePath = "fckeditor/" ;
					
					var oFCKeditor = new FCKeditor( 'answer' ) ;
					oFCKeditor.BasePath	= sBasePath ;
					oFCKeditor.Height	= 250 ;
					oFCKeditor.Width	= 600 ;
					oFCKeditor.ToolbarSet	= 'Basic' ;
					oFCKeditor.Value	= '<?php echo $answer; ?>' ;
					oFCKeditor.Create() ;
				</script>
			</dd>
		</dl>
		
		<?php
		/************* Answer comments *********/
		if($action == 'edit') {
			$comments = getQuesAnsComments($ID, 'ans');
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
		
		<div class="clear"></div>
		<dl class="submit"><input type="submit" name="submit" id="submit" value="Submit" /></dl>
	</fieldset>
</form>
</div>

<?php require_once 'scripts.js.php'; ?>
<?php require_once 'templates/footer.php'; ?>
