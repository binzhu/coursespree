<?php $canAccess = canAccess($_SESSION['userID'], $docID); ?>

<?php if($canAccess) { ?>
	<h1>Sell Notes - Class Selection - <?php echo $docName; ?></h1>
	<div style="height: 10px; line-height: 1px; font-size: 1px;"></div>

	<form enctype="multipart/form-data" method="post" action="">
		<input type="hidden" name="sell_step_2" value="1" />
	
		<div class="doc_thumb">
			<!-- Preview will go here -->
		</div>

		<h2>1. Choose a Professor</h2>
		Select the professor your document applies to:
		<div class="clear"></div>
		<div style="float: left;">
			<select name="professor">
				<?php
				$output = '';
				$professors = get_professors($course);
				$output .= '<option value="">--SELECT--</option>';
				if(!empty($professors)) {
					foreach($professors as $professorInfo) {
						$selected = '';
					 	if($professorInfo->id == $professor) {
					 		$selected = 'selected="selected"';
					 	}
						$output .= '<option value="'.$professorInfo->id.'" '.$selected.'>'.$professorInfo->name.'</option>';
					}
				}
				echo $output;
				?>
			</select>
		</div>
		<div class="clear"></div>
		<div style="width: 100%; height: 20px;"></div>

		<h2>2. Enter Some Basic Information</h2>
		<div class="_label _w">Type of Document:</div>
		<div class="_input">
			<select name="docType">
				<?php
				$output = '';
				$docTypes = get_docTypes();
				$output .= '<option value="">--SELECT--</option>';
				if(!empty($docTypes)) {
					foreach($docTypes as $docTypeInfo) {
						$selected = '';
					 	if($docTypeInfo->id == $docType) {
					 		$selected = 'selected="selected"';
					 	}
						$output .= '<option value="'.$docTypeInfo->id.'" '.$selected.'>'.$docTypeInfo->name.'</option>';
					}
				}
				echo $output;
				?>
			</select>
		</div>
		<div class="clear"></div>
	
		<div class="_label _w">Name your Document:</div>
		<div class="_input"><input type="text" style="width: 300px;" value="<?php echo stripslashes($docName); ?>" name="docName" /></div>
		<div class="clear"></div>
	
		<div class="_label _w">Notes/Tips:</div>
		<div class="clear"></div>
		<textarea style="width: 476px; margin-left: 10px;" rows="4" cols="30" wrap="soft" name="tips"><?php echo stripslashes($tips); ?></textarea>
		<div class="clear"></div>
		<div style="width: 100%; height: 20px;"></div>

		<h2>3. Price your Notes</h2>
		Select a price for your document.
		<div style="height: 6px; line-height: 1px; font-size: 1px;"></div>
		<input type="text" style="width: 80px;" name="price" value="<?php echo stripslashes($price); ?>" /> + <?php echo CP_PAYMENT_FEE_PERCENTAGE; ?>% charges of coursespree
		<div class="clear"></div>
		<div style="width: 100%; height: 20px;"></div>

		<h2>4. Enter your PayPal Account Email address</h2>
		Funds from the sales will be transferred to this account.
		<div style="height: 6px; line-height: 1px; font-size: 1px;"></div>
		<input type="text" style="width: 300px;" value="<?php echo stripslashes($paypalEmail); ?>" name="paypalEmail" />
		<div style="clear: both; font-size: 11px; padding-left: 6px;">
			Dont have a PayPal account? <br> We recommend signing up for a PREMIER account, its FREE!!
			<a onclick="open(this.href, '', 'width=800,height=600'); return false;" target="_blank" href="https://www.paypal.com/webscr?cmd=_registration-run">Sign up here!</a>
		</div>
		<div style="width: 100%; height: 20px;"></div>
		
		<!-- ****** Ajax File Uploader ********* -->
		<h2>5. Upload Cover Image</h2>
		<div class="_settings_box" style="display: block;">
			<div class="_cont">
				<table cellspacing="2" cellpadding="2" border="0" class="_form">
					<tbody>
					<tr>
						<td style="vertical-align:top; padding-right:10px;"><input type="file" value="" name="coverImage"></td>
						<td>
							<span><a href="uploads/docs/preview/<?php echo stripslashes($coverImage); ?>" title="<?php echo stripslashes($docName); ?>" class="lightbox"><img border="0" width="150" height="150" class="pngfix" alt="" src="uploads/docs/preview/<?php echo stripslashes($coverImage); ?>"></a></span>
						</td>
					</tr>
					</tbody>
				</table>
			</div>
		</div>
		<!-- ****** Ajax File Uploader ********* -->

		<div class="clear"></div>
		<div style="float: right; margin: 10px 200px 0pt 0pt;"><button class="yellow" type="submit"><span>Continue</span></button></div>
		<div class="clear"></div>
	</form>
	<div class="clear"></div>
<?php } ?>
