<?php
if(isset($_GET['status'])) {
	$status = $_GET['status'];
}
?>

<style type="text/css">
#question .commentstext-1 {
	border:0px !important;
}
.listMain {
	margin-bottom: 30px;
	padding-bottom:10px;
	border-bottom: 2px dotted #808080;
}
</style>

<div class="text-2">
	<?php $style = ''; if($status != 'closed') { $style = 'style="text-decoration:underline;"'; } ?>
	<h4><a href="<?php echo getAnswersURL('user.php', ''); ?>" <?php echo $style; ?>>Pending Answers</a></h4>

	<h4>|</h4>

	<?php $style = ''; if($status == 'closed') { $style = 'style="text-decoration:underline;"'; } ?>
	<h4><a href="<?php echo getAnswersURL('user.php', 'closed'); ?>" <?php echo $style; ?>>Approved Answers</a></h4>
</div>

<div class="list-middle">

	<?php
	list($answers, $paging) = getAnswersByUser($status, '10', $_SESSION['userID']);
	
	if(empty($answers)) {
		echo '<p style="color: #666666; float: left; font-size: 20px; margin-top: 20px; text-align: center; width: 100%;">No answers found</p>';
	} else {
		foreach($answers as $answer) { ?>
			<div class="listMain">
				<div class="column-1">
					<div class="subcolumn profileImg">
						<?php
						$avatar = "uploads/images/".stripslashes($answer->quesUserAvatar);
						if(!file_exists(stripslashes(trim($avatar))) || trim($answer->quesUserAvatar) == '') {
							$avatar = 'images/no-img.jpg';
						}
						?>
						<img src="<?php echo $avatar; ?>">
						<?php echo stripslashes($answer->quesUserFirstName); ?>
					</div>
				</div>

				<div class="column-2">
					<div class="quesimage"></div>
					<div class="subcolumn-3">
						<div class="title">
							<p><a href="questions.php?id=<?php echo stripslashes($answer->qID); ?>"><?php echo stripslashes($answer->qCaption); ?></a></p>
						</div>
						<div class="info">
							In <a href="questions.php?catID=<?php echo stripslashes($answer->catID); ?>"><?php echo stripslashes($answer->catName); ?></a> - <?php echo getTimeDifference($answer->qDated); ?>
						</div>
					
						<?php
						$qTags = stripslashes($answer->qTags);
						if($qTags != '') {
							$qTagsArr = explode(',', $qTags);
							if(!empty($qTagsArr)) {
								echo '<div class="tag"><p>Tagged With :-<p><ul>';
									foreach($qTagsArr as $tag) {
										if($tag != '') {
											echo '<li><a href="questions.php?tag='.$tag.'">'.$tag.'</a></li>';
										}
									}
								echo '</ul></div><div class="clear"></div>';
							}
						}
						?>
					</div>
				</div>
				
				<div class="clear"></div>
				<div class="answersListDiv">					
					<div class="commentstext-1" id="commentstext-1-5">
						<div class="comment-2" style="float:right;">
							<div style="float: left;" id="descAns_5"><p><?php echo stripslashes($answer->answer); ?></p></div>
						    <div class="clear"></div>
							<div class="days"><p><?php echo getTimeDifference($answer->dated); ?></p></div>
						</div>
					</div>
					<div class="clear"></div>
				</div>
		
			</div>
		<?php } ?>
		<div class="clear"></div>
		<?php echo $paging['pagingString']; ?>
		<div class="clear"></div>
		<?php
	}
	?>
</div>
