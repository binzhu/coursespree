<div style="float: right; width: 332px;">
	
	<?php if($status != '1') { ?>
		<div class="price_col">
			<form method="post" action="" name="confirm">
				<input type="hidden" name="publish" value="1" />
				<div class="_price">
					<div style="font-size: 14px; padding-top: 5px;">Document Price: <input type="text" style="width: 80px;" value="<?php echo stripslashes($price); ?>" name="price"></div>
					<a rel="popup" style="font-size: 11px; color: rgb(17, 17, 17);" href="#" class="cboxElement">pricing suggestions</a><br>
					<span class="gn_fee">(Price will be increased by <?php echo CP_PAYMENT_FEE_PERCENTAGE; ?>%)</span>
				</div>

				<div style="width: 290px;" class="_btn">
					<div class="clear"></div>
					<button style="float:left; height:36px; padding-top:0px;" class="yellowb" type="submit"><span>PUBLISH NOTES</span></button>
					<a style="float: left;" class="button yellowb" href="user.php?type=sell&id=<?php echo $_GET['id']; ?>"><span>GO BACK</span></a>
					<div class="clear"></div>
				</div>
			</form>
		</div>
	<?php } else { ?>
		<div class="price_col">
			<div style="width: 290px; text-align:left;" class="_btn">
				<div class="clear"></div>
				<div style="font-size:14px;">
					<strong>Price:</strong>
					<?php
						$price = stripslashes($price);
						if($cp_fee_percentage > 0) {
							$price = $price + ($price*$cp_fee_percentage/100);
						}
						echo "$".$price;
					?>
				</div>
				<a style="float: left;" class="button yellowb" href="#"><span>Download Notes</span></a>
				<div class="clear"></div>
			</div>
		</div>
	<?php } ?>
	
	<div class="clear"></div>

	
	<div style="margin-top: 10px;" class="info_col">
		<?php $docOwner = getUser($docInfo->userID); ?>
		<div class="_cont">
			<div class="_thb">
				<span style="position: relative; width: 68px; height: 68px; overflow: hidden; display: block; text-align: left;">
					<a href="user.php?type=profile&id=<?php echo $docOwner->id; ?>">
						<?php
						$avatar = "uploads/images/".stripslashes($docOwner->avatar);
						if(!file_exists(stripslashes(trim($avatar))) || trim($docOwner->avatar) == '') {
							$avatar = 'images/no-img.jpg';
						}
						?>
						<img border="0" width="68" height="68" style="position: relative; top: 0px; left: 0px;" class="pngfix" alt="" src="<?php echo $avatar; ?>">
					</a>
				</span>
			</div>

			<div class="_ttl"><?php echo stripslashes($docOwner->fullName); ?></div>
				<a style="margin: 4px 0pt 0pt 15px;" class="button green" href="user.php?type=profile&id=<?php echo $docOwner->id; ?>"><span style="padding:5px 5px 0 5px; display:block;">VIEW NOTEBOOK</span></a>
				<div class="clear"></div>
			</div>
		</div>
		<div class="clear"></div>

		<div style="border-top: medium none;" class="info_col"><div class="_cont">
			<strong>NOTES:</strong> <?php echo stripslashes($docName); ?><br>
			<strong>SCHOOL:</strong> <?php echo stripslashes($docInfo->schoolName); ?><br>
			<strong>DEPARTMENT:</strong> <?php echo stripslashes($docInfo->deptName); ?><br>
			<strong>COURSE:</strong> <?php echo stripslashes($docInfo->courseName); ?><br>
			<strong>PROFESSOR:</strong> <?php echo stripslashes($docInfo->profName); ?><br>
			<strong>Document Type:</strong> <?php echo stripslashes($docInfo->docTypeName); ?><br>
			<strong>TERM:</strong> <?php echo stripslashes($docInfo->term); ?><br>
		</div>
	</div>
</div>

<div style="float: left; width: 580px; padding:10px;">
	<?php $coverImage = "uploads/docs/preview/".stripslashes($coverImage); ?>
	<div class="detail_col">
		<div class="_cont">
			<div id="_cms_scribd_viewer_1" style="text-align:center;">
				<a href="<?php echo stripslashes($coverImage); ?>" title="<?php echo stripslashes($docName); ?>" class="lightbox">
					<img src="<?php echo $coverImage; ?>" border="0" alt="" style="margin:auto; max-height:400px; max-width:550px;" />
				</a>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	<div class="clear"></div>
	
	<div class="detail_col" style="margin-top:10px;">
		<div class="_cont">
			<h2>Notes/Tips</h2>
			<div class="clear"></div>
			<div style="background:#EEEEEE; border-radius:5px; padding:5px; margin-top:10px;"><?php echo stripslashes($tips); ?></div>
		</div>
	</div>
	<div class="clear"></div>
</div>
