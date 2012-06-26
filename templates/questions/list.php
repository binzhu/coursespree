<?php
if(isset($_GET['status'])) {
	$status = $_GET['status'];
}
?>
<div class="text-2">
	<?php $style = ''; if($status != 'closed') { $style = 'style="text-decoration:underline;"'; } ?>
	<h4><a href="<?php echo getQuestionsURL('questions.php', ''); ?>" <?php echo $style; ?>>Open Questions</a></h4>

	<h4>|</h4>

	<?php $style = ''; if($status == 'closed') { $style = 'style="text-decoration:underline;"'; } ?>
	<h4><a href="<?php echo getQuestionsURL('questions.php', 'closed'); ?>" <?php echo $style; ?>>Closed Questions</a></h4>
</div>

<div class="list-middle">
	
	<?php
	$numberOfRecs = '10';
	if(isset($_GET['catID']) && $_GET['catID'] > 0) {
		$keyword = $_GET['catID'];
		list($questions, $paging) = getQuestions($keyword, 'cat', $status, $numberOfRecs);
	} else if(isset($_GET['tag']) && $_GET['tag'] != '') {
		$keyword = $_GET['tag'];
		list($questions, $paging) = getQuestions($keyword, 'tag', $status, $numberOfRecs);
	} else if(isset($_GET['qs']) || isset($_GET['qs_cat'])) { 
		list($questions, $paging) = getQuestions('', 'search', $status, $numberOfRecs);
	} else {
		list($questions, $paging) = getQuestions('', '', $status, $numberOfRecs);
	}
	
	if(empty($questions)) {
		echo '<p style="color: #666666; float: left; font-size: 20px; margin-top: 20px; text-align: center; width: 100%;">No question found</p>';
	} else {
		foreach($questions as $question) { ?>
			<div class="listMain">
				<div class="column-1">
					<div class="subcolumn">
						
						<h3>
							<?php
							if(stripslashes($question->status) == 'closed') {
								$ansList = getAnswers($question->id, 'approved');
							} else {
								$ansList = getAnswers($question->id, '');
							}
							echo sizeof($ansList);
							?>
						</h3>
						<p>Answers</p>
					</div>
				</div>

				<div class="column-2">
					<div class="quesimage"></div>
					<div class="subcolumn-2">
						<?php
						$avatar = "uploads/images/".stripslashes($question->avatar);
						if(!file_exists(stripslashes(trim($avatar))) || trim($question->avatar) == '') {
							$avatar = 'images/no-img.jpg';
						}
						?>
						<img src="<?php echo $avatar; ?>">
						<p><?php echo stripslashes($question->userName); ?></p>
					</div>
	
					<div class="subcolumn-3">
						<div class="title">
							<p><a href="questions.php?id=<?php echo stripslashes($question->id); ?>"><?php echo stripslashes($question->caption); ?></a></p>
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
						<div class="info">
							In <a href="questions.php?catID=<?php echo stripslashes($question->catID); ?>"><?php echo stripslashes($question->catName); ?></a> - Asked By <a href="profile.php?id=<?php echo stripslashes($question->userID); ?>"><?php echo stripslashes($question->userName); ?></a>
							<?php echo getTimeDifference($question->dated); ?>
						</div>
						
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
