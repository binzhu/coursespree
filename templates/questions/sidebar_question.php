<div class="leftside">
	<h4>Categories</h4>
	<h5><a href="questions.php"/>All Categories</a></h5>
	
		<?php
		$cats = getQuestionCats(); //All parent cats
		if(!empty($cats)) {
			echo '<ul>';
			foreach($cats as $cat) {
				echo '<li>';
					echo '<a href="questions.php?catID='.$cat->id.'">'.$cat->name.'</a>';
				echo '</li>';
			}
			echo '</ul>';
		}
		?>
</div>
