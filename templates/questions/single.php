<?php
if(isset($_GET['id']) && $_GET['id'] > 0) {
	$id = $_GET['id'];
	$question = getQuestion($id);
}
?>

<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "specific_textareas",
        editor_selector : "editor_custom",
        theme : "advanced",
		plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,image,cleanup,help,code",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,undo,redo,|,link,unlink,anchor",
		theme_advanced_buttons3 : "styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_toolbar_location : "top",
		width : "500",
		eight: "500"
	});
</script>

<div class="commentsform">
	<div class="image"></div>
	<div class="comments">
		<div class="comment-1">
			<?php
			$avatar = "uploads/images/".stripslashes($question->avatar);
			if(!file_exists(stripslashes(trim($avatar))) || trim($question->avatar) == '') {
				$avatar = 'images/no-img.jpg';
			}
			?>
			<a href="profile.php?id=<?php echo $question->userID; ?>"><img src="<?php echo $avatar; ?>"></a>
			<p style="padding-left:20px;"><a href="profile.php?id=<?php echo $question->userID; ?>"><?php echo stripslashes($question->userFirstName); ?></a></p>
		</div>
		<div class="comment-2">
			
			<div style="float:left; width:80%;">
				<h3><?php echo stripslashes($question->caption); ?></h3>

				<?php
				$tags = stripslashes($question->tags);
				if($tags != '') {
					$tagsArr = explode(',', $tags);
					if(!empty($tagsArr)) {
						echo '<div class="tag"><p>Tagged With :-<p><ul>';
							foreach($tagsArr as $tag) {
								if($tag != '') {
									echo '<li><a href="questions.php?tag='.$tag.'">'.$tag.'</a></li>';
								}
							}
						echo '</ul></div><div class="clear"></div>';
					}
				}
				?>
			</div>
			
			<div style="float:right; width:20%; margin-top:10px; margin-bottom:10px;">
				<span class="qPrice">
					<?php
						$qPrice = stripslashes($question->price);
						$cp_fee_percentage = stripslashes($question->cp_fee_percentage);
						if($cp_fee_percentage > 0) {
							$qPrice = $qPrice + ($qPrice * $cp_fee_percentage / 100);
						}
						
						echo "$".$qPrice;
					?>
				</span>
			</div>
			
			<div class="clear"></div>
			
			
			<div class="desc"><?php echo stripslashes($question->description); ?></div>
			<div class="days" style="background:url(none);"><p style="font-weight:bold;">Category: <a href="questions.php?catID=<?php echo stripslashes($question->catID); ?>"><?php echo stripslashes($question->catName); ?></a></p></div>
			<div class="days"><p><?php echo getTimeDifference($question->dated); ?></p></div>
			<div class="clear"></div>
			
			<?php if(stripslashes($question->status) != 'closed') { ?>
				<?php if(isUserLoggedin() && $_SESSION['userID'] == stripslashes($question->userID)) { ?>
					<div class="cobutton" style="margin-top: 0px; margin-bottom: 10px;">
						<button type="button" style="float:left;" onclick="javascript:window.location.href='questions.php?action=post&id=<?php echo stripslashes($question->id); ?>';"><img src="images/edit.png" style="margin: 0 3px -2px 0;"><a href="#">Edit Your Question</a></button>
							<button type="button" style="float:left;" id="delQues_<?php echo stripslashes($question->id); ?>" onclick="javascript:delQues('<?php echo stripslashes($question->id); ?>');"><img src="images/delete.png" style="margin: 0 3px -2px 0;"><a href="#">Delete Your Question</a></button>
					</div>
					<div class="clear"></div>
				<?php } else { ?>
					<div class="cobutton">
						<?php if(isUserLoggedin() && $_SESSION['userID'] != stripslashes($question->userID)) { ?>
							<input title="Answer" type="button" value="Answer this question" onclick="javascript: jQuery('#answerBox').slideDown();" />
							<div class="clear"></div>
							<div id="answerBox" class="hide">
								<div class="loginBoxInner">
									<form id="thickBoxAnswerForm" method="post" action="">
										<input type="hidden" name="quesID" id="quesID" value="<?php echo stripslashes($question->id); ?>" />
										<!--h2 style="font-weight:bold; font-size:16px; color:#666; margin-bottom:10px;"><?php echo stripslashes($question->caption); ?></h2-->
										<div><textarea class="editor_custom" name="quesAnswer" id="quesAnswer"></textarea></div>
									
										<div style="float:right;"><input type="submit" value="Submit" /></div>
										<div class="errorThickBox" style="float:left; margin-left:10px;"></div>
										<div class="clear"></div>
									</form>
								</div>
							</div>
							<div class="clear"></div>
						<?php } else if(!isUserLoggedin()) { ?>
							<button type="button" onclick="javascript: window.location.href='register.php?type=login'; return false;"><a href="#">Answer this question</a></button>
						<?php } ?>
					</div>
					<div class="clear"></div>
				<?php } ?>
			
			
				<?php /******************* Comments section *************/ ?>
				<?php $comments = getQuesAnsComments(stripslashes($question->id), 'ques'); ?>
				<div class="commbuttons">
					<div class="commbuttons-1">
						<img src="images/pencil.png">
						<p>
							<?php if(!isUserLoggedin()) { ?>
								<a href="register.php?type=login">Comment(s)(<span id="quesCommentsCount_<?php echo stripslashes($question->id); ?>"><?php echo sizeof($comments); ?></span>)</a>
							<?php } else { ?>
								<a href="javascript:" id="addComment_ques_<?php echo stripslashes($question->id); ?>" onclick="javascript:addComment('<?php echo stripslashes($question->id); ?>', 'ques');">Comment(s)(<span id="quesCommentsCount_<?php echo stripslashes($question->id); ?>"><?php echo sizeof($comments); ?></span>)</a>
							<?php } ?>
						</p>
					</div>
					<div class="commbuttons-2">
						<img src="images/flag.png">
						<p>
							<?php if(!isUserLoggedin()) { ?>
								<a href="register.php?type=login">Report Abuse</a>
							<?php } else { ?>
								<a href="javascript:" id="abuse_ques_<?php echo stripslashes($question->id); ?>" onclick="javascript: abuse('<?php echo stripslashes($question->id); ?>', 'ques');">Report Abuse</a>
							<?php } ?>
						</p>
					</div>
				</div>
				<?php getCommentsTemplate($comments, stripslashes($question->id), 'ques'); ?>
				<?php /******************* Comments section *************/ ?>
			<?php } else { ?>
				<div class="cobutton" style="margin-top: 0px; margin-bottom: 10px;">
					<button type="button" style="float:left;" id="delQues_<?php echo stripslashes($question->id); ?>" onclick="javascript:delQues('<?php echo stripslashes($question->id); ?>');"><img src="images/delete.png" style="margin: 0 3px -2px 0;"><a href="#">Delete Your Question</a></button>
				</div>
				<div class="clear"></div>
			<?php } ?>
		</div>
	</div>
</div>
<div class="clear" style="height:20px;"></div>
<?php getAnswersTemplate(stripslashes($question->id)); ?>

<!-- ***** Edit answer pop up ***** -->
<div id="filterPop"></div>
<div class="popupBox">
	<div class="popupBoxInnerDiv">
		<h2>Edit Answer</h2>
		<div class="close">X</div>
		<div class="clear" style="height:5px; border-bottom:1px dotted #a9a9a9;"></div>
		
		<div style="width:500px; margin:10px auto 0;">
			<form name="editAnsForm" id="editAnsForm">
				<input type="hidden" name="editAnsInput" id="editAnsInput" value="" />
				<textarea class="editor_custom" name="editAnsTextarea" id="editAnsTextarea"></textarea>
				
				<div style="margin:10px auto 0; width:150px; text-align:center;">
					<input type="submit" value="Update Answer" style="float:left;" />
					<img src="images/loading.gif" alt="" border="0" class="loading" style="float:left; margin-top:3px; visibility: hidden;">
				</div>
			</form>
		</div>
	</div>
</div>
<!-- ***** Edit answer pop up ***** -->


<!-- ***** Add comment pop up ***** -->
<div id="filterCommentPop"></div>
<div class="popupCommentBox">
	<div class="popupBoxInnerDiv">
		<h2>Add Comment</h2>
		<div class="close">X</div>
		<div class="clear" style="height:5px; border-bottom:1px dotted #a9a9a9;"></div>
		
		<div style="width:500px; margin:10px auto 0;">
			<form name="addCommentForm" id="addCommentForm">
				<input type="hidden" name="pID" id="pID" value="" />
				<input type="hidden" name="pType" id="pType" value="" />				
				<textarea class="editor_custom" name="addCommentTextarea" id="addCommentTextarea"></textarea>
				
				<div style="margin:10px auto 0; width:150px; text-align:center;">
					<input type="submit" value="Add Comment" style="float:left;" />
					<img src="images/loading.gif" alt="" border="0" class="loading" style="float:left; margin-top:3px; visibility: hidden;">
				</div>
			</form>
		</div>
	</div>
</div>
<!-- ***** Add comment pop up ***** -->
