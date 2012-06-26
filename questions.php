<?php require_once('includes/config.php'); ?>
<?php
$_SESSION['redirectPath'] = curPageURL();
if(isset($_GET['action']) && $_GET['action'] == 'post') {
	if(!isUserLoggedin()) {
		header('Location: register.php?type=login');
		exit;
	}
}
?>
<?php require_once 'templates/header.php'; ?>

<div class="inner">
	<div id="body_cont">
		<div id="body">			
			<div id="question">
				<div id="botheader">
					<div class="botheaderpanel askquestion" onclick="javascript: window.location.href='questions.php?action=post';">
						<img src="images/image-1.png" />
						<div id="askimg"></div>
						<span class="displaytext">ask</span>
						<div class="clear"></div>
						<div class="botheaderpanelxtratext"> Ask whatever question, you wish. Make sure you select the correct category for the question. </div>
					</div>

					<div class="botheaderpanel" onclick="javascript: window.location.href='questions.php';">
						<img src="images/image-2.png" />
						<div id="answerimg"></div>
						<span class="displaytext">answer</span>
						<div class="clear"></div>
						<div class="botheaderpanelxtratext"> Like to help other, then browse through the open questions to answer their questions. </div>
					</div>

					<div class="botheaderpanel" onclick="javascript: window.location.href='questions.php?action=search';">
						<img src="images/image-3.png" />
						<div id="discoverimg"></div>
						<span class="displaytext">discover</span>
						<div class="clear"></div>
						<div class="botheaderpanelxtratext"> Find answer by browsing the resolved questions. </div>
					</div>
				
					<div class="searchbox">
						<div class="search">
							<form name="searchForm" action="questions.php" method="get">
								<h3>Search for quesitons :</h3>
								<input type="text" name="qs" id="qs" value="<?php echo $_GET['qs']; ?>" class="fLeft" />
								<?php
								$parentCats = getQuestionCats(-1);
								if(!empty($parentCats)) {
									echo '<select name="qs_cat" class="fLeft">';
										echo '<option value="">--Select Category--</option>';
										foreach($parentCats as $parentCat) {
											$selected = '';
											if($parentCat->id == $_GET['qs_cat']) {
												$selected = 'selected="selected"';
											}
											echo '<option value="'.$parentCat->id.'" '.$selected.'>'.$parentCat->name.'</option>';
										}
									echo '</select>';
								}
								?>
								<button type="submit">search</button>
							</form>
						</div>
						<!-- div class="myprofile">
							<img src="images/image-4.png" />
							<span><a href="#">My Profile</a></span>
						</div -->
					</div>

					<?php if(!(isset($_GET['action']) && $_GET['action'] == 'search')) { ?>
						<div class="container">
							<?php require_once 'templates/questions/sidebar_question.php'; ?>

							<div class="rightside">
								<?php
									if(isset($_GET['action'])) {
										$questionAction = $_GET['action'];
									} else if(isset($_GET['id']) && $_GET['id'] > 0) {
										$questionAction = 'single';
									}
									
									switch($questionAction) {
										case 'post':
											require_once 'templates/questions/post.php';
											break;
											
										case 'single':
											require_once 'templates/questions/single.php';
											break;
									
										default:
											require_once 'templates/questions/list.php';
											break;
									}
								?>
							</div>						
						</div>
					<?php } ?>
				</div>
				<div class="clear"></div>
			</div>
			<div class="clear"></div>
			
		</div>
	</div>
</div>
<?php require_once 'templates/footer.php'; ?>
