<?php
if(!empty($data)) {
	foreach($data as $notice) {
		$coverImage = "uploads/docs/preview/".stripslashes($notice->coverImage);
		if(!file_exists(stripslashes(trim($coverImage))) || trim($notice->coverImage) == '') {
			$coverImage = 'images/no-img.jpg';
		}
	
		$avatar = "uploads/images/".stripslashes($notice->uImg);
		if(!file_exists(stripslashes(trim($avatar))) || trim($notice->uImg) == '') {
			$avatar = 'images/no-img.jpg';
		}
		?>
		<div class="_prod_item">
			<div class="clear"></div>
			<div class="_user">
				<span style="position:relative; width:60px; height:60px; overflow:hidden; display:block; text-align:left;"><a href="<?php echo $avatar; ?>" title="<?php echo stripslashes($notice->uFullName); ?>" class="lightbox"><img src="<?php echo $avatar; ?>" border="0" alt="" /></a></span>
				<div class="clear"></div>
				<a href="profile.php?id=<?php echo stripslashes($notice->uID); ?>"><?php echo stripslashes($notice->uFullName); ?></a>
			</div>

			<div class="_thb_box">
				<div class="_ttl _prod_box_ttl"><a href="notice.php?id=<?php echo $notice->id; ?>"><?php echo stripslashes($notice->docName); ?></a></div>
				<div class="_thb"><span style="background:#f3f3f3;; position:relative; width:100px; height:130px; overflow:hidden; display:block; text-align:left;"><a href="notice.php?id=<?php echo $notice->id; ?>"><img src="<?php echo $coverImage; ?>" border="0" alt="" /></a></span></div>
			</div>

			<div class="_ttl _prod_item_ttl"><a href="notice.php?id=<?php echo $notice->id; ?>"><?php echo stripslashes($notice->docName); ?></a></div>
			<div class="_descr">
				<strong>SCHOOL:</strong> <?php echo stripslashes(trim($notice->schoolName)); ?><br>
				<strong>DEPARTMENT:</strong> <?php echo stripslashes(trim($notice->deptName)); ?><br>
				<strong>COURSE:</strong> <?php echo stripslashes(trim($notice->courseName)); ?><br>
				<strong>PROFESSOR:</strong> <?php echo stripslashes(trim($notice->profName)); ?><br>
				<strong>Document Type:</strong> <?php echo stripslashes(trim($notice->docTypeName)); ?><br>
				<strong>Notes/Tips:</strong><br><?php echo stripslashes(trim($notice->tips)); ?>
			</div>
			<div class="_price">
				<?php
					$price = stripslashes(trim($notice->price));
					$cp_fee_percentage = stripslashes(trim($notice->cp_fee_percentage));
					if($cp_fee_percentage > 0) {
						$price = $price + ($price*$cp_fee_percentage/100);
					}
					echo "$".$price;
				?>
				<!-- div class="_sales">0 sales</div -->
			</div>
			<div class="clear"></div>
		</div>		
		<?php
	} ?>
	<div class="clear"></div>
	<?php global $paging; echo $paging['pagingString']; ?>
	<div class="clear"></div>
<?php } ?>

<script type="text/javascript">
$(function() {
    $('a.lightbox').lightBox();
});
</script>
