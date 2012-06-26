<?php
$question = array();
$action = 'ask';

if(isset($_GET['id']) && $_GET['id'] > 0) {
	if(!isUserLoggedin()) {
		echo '<script type="text/javascript">window.location.href="register.php?type=login";</script>';
		exit;
	}
	
	$quesID = $_GET['id'];
	$question = getQuestion($quesID);
	if($question->userID != $_SESSION['userID']) {
		echo '<script type="text/javascript">window.location.href="questions.php";</script>';
		exit;
	}
	
	if(!isset($_POST['addQuestionVar'])) {
		$caption = stripslashes($question->caption);
		$description = stripslashes($question->description);
		$catID = stripslashes($question->catID);
		$price = stripslashes($question->price);
		$tags = stripslashes($question->tags);
		
		$action = 'edit';
	}
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
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_toolbar_location : "top",
	});
</script>

<form name="addQuestionForm" action="" method="post">
	<input type="hidden" name="addQuestionVar" value="1" />
	
	<div class="text">
		<h1><?php echo ucFirst($action); ?> Your Question</h1>
		<img src="images/massimage.png" />
	</div>

	<div class="textform quesForm">
		<div class="image"></div>
		<div class="form">
			<h3>What would you like to ask</h3>
			<input type="text" name="caption" id="caption" value="<?php echo stripslashes($caption); ?>" />
			<div class="helptext">( Any html code found would be stripped out )</div>
			
			<h3>Add little more details</h3>
			<div class="clear"></div>
			<textarea name="description" class="editor_custom" id="description"><?php echo stripslashes($description); ?></textarea>
			
			<h3>Select the category for the question</h3>
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
			
			<?php if($action != 'edit') { ?>
				<h3>Price for question</h3>
				<strong>$</strong> <input type="text" name="price" id="price" value="<?php echo stripslashes($price); ?>" style="width:10%;" />
			<?php } ?>
			
			<h3>Enter tags relative to your question</h3>   
			<input type="text" name="tags" id="tags" value="<?php echo stripslashes($tags); ?>" />
			<div class="helptext">( Tags should be seperated by comma(,) )</div>
		</div>
	</div>
	
	<div class="button">
		<?php if($action == 'edit') { ?>
			<button type="submit">Update Question</button>
		<?php } else { ?>
			<button type="submit">Post Question</button>
			<button type="reset">Reset Form</button>
		<?php } ?>
		
	</div>
</form>
