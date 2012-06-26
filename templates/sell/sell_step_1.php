<h1>Sell Notes - Class Selection</h1>
<div style="height: 10px; line-height: 1px; font-size: 1px;"></div>

<form enctype="multipart/form-data" method="post" action="">
	<input type="hidden" name="sell_step_1" value="1" />
	<table cellspacing="2" cellpadding="2" border="0" class="_form find_class sellStep1" width="100%">
		<tbody>
		<!-- ****** Ajax File Uploader ********* -->
		<tr>
			<td>
				<link rel="stylesheet" type="text/css" media="all" href="js-plugins/ajax-file-uploader/ajax-upload.css" />
				<script type="text/javascript" src="js-plugins/ajax-file-uploader/jquery.ajax.upload.js"></script>
				<script type="text/javascript">
				$(document).ready(function() {
					var upload = new AjaxUpload('#userfile', {
						//upload script 
						action: 'js-plugins/ajax-file-uploader/upload.php',
						onSubmit : function(file, extension){
							//show loading animation
							$("#loading").show();
					
							//check file extension
							if (! (extension && /^(pdf|txt|ps|rtf|epub|odt|odp|ods|odg|odf|sxw|sxc|sxi|sxd|doc|ppt|pps|xls|docx|pptx|ppsx|xlsx|tif|tiff)$/.test(extension))){
						   	// extension is not allowed
								 $("#loading").hide();
								 $('#errormes').html('');	
							
								 $("<span class='error'>Error: Not a valid file extension</span>").appendTo("#errormes");
								// cancel upload
						   		return false;
							} else {
								// get rid of error
								$('.error').hide();
							}	
						
							//send the data
							upload.setData({'file': file});
						},
						onComplete : function(file, response){
							//hide the loading animation
							$("#loading").hide();
							
							//add display:block to success message holder
							$(".success").css("display", "block");
							
							$('#errormes').html('');	
							//This lower portion gets the error message from upload.php file and appends it to our specifed error message block
							//find the div in the iFrame and append to error message	
							var oBody = $(".iframe").contents().find("div");
							//add the iFrame to the errormes td
							$(oBody).appendTo("#errormes");

							//This is the demo dummy success message, comment this out when using the above code
							//$("#errormes").html("<span class='success'>Your file was uploaded successfully</span>");
						}
					});
				});	
				</script>
				
				<img src="images/upload.jpg" border="0" alt="" id="userfile" />
			</td>
			<td style="vertical-align:middle">
				<div id="loading"><img src="ajax-loader.gif" alt="Loading" /> Loading, please wait...</div>
				<div id="errormes"><input type="text" name="doc" value="<?php echo stripslashes($doc); ?>" readonly></div>
				<div class="clear" style="height:10px;"></div>
			</td>
		</tr>
		<!-- ****** Ajax File Uploader ********* -->
		
		<tr>
			<td width="200">State:</td>
			<td>
				<select name="state" id="state">
					<option value="">--SELECT--</option>
					<?php
					$country = get_country_id(DEFAULT_COUNTRY);
					$states = get_states($country);
					if(!empty($states)) {
						 foreach($states as $stateInfo) {
						 	$selected = '';
						 	if($stateInfo->id == $state) {
						 		$selected = 'selected="selected"';
						 	}
						 	echo '<option value="'.$stateInfo->id.'" '.$selected.'>'.$stateInfo->name.'</option>';
						 }
					}
					?>
				</select>
				
				<span class="addNew">
					<a href="#" onclick="javascript:return addNew(this, 'state');" style="margin-top:4px; position:absolute;">Add New</a>
				</span>
			</td>
		</tr>
		<tr>
			<td>School:</td>
			<td>
				<select name="school" id="school">
					<option value="">--SELECT--</option>
				</select>
				
				<span class="addNew">
					<a href="#" onclick="javascript:return addNew(this, 'school');" style="margin-top:4px; position:absolute;">Add New</a>
				</span>
			</td>
		</tr>
		<tr>
			<td class="label">Department:</td>
			<td>
				<select name="dept" id="dept">
					<option value="">--SELECT--</option>
				</select>
				
				<span class="addNew">
					<a href="#" onclick="javascript:return addNew(this, 'dept');" style="margin-top:4px; position:absolute;">Add New</a>
				</span>
			</td>
		</tr>
		<tr>
			<td class="label">Course:</td>
			<td>
				<select name="course" id="course">
					<option value="">--SELECT--</option>
				</select>
				
				<span class="addNew">
					<a href="#" onclick="javascript:return addNew(this, 'course');" style="margin-top:4px; position:absolute;">Add New</a>
				</span>
			</td>
		</tr>
		<tr>
			<td class="label">Term:</td>
			<td>
				<select name="term" id="term">
					<option value="">--SELECT--</option>
					<?php
					$seasons = array('Fall', 'Summer', 'Spring', 'Winter');
					for($i=2008; $i<=2012; $i++) {
						foreach($seasons as $season) {
							$val = "$season $i";
							
							$selected = '';
						 	if($val == stripslashes($term)) {
						 		$selected = 'selected="selected"';
						 	}
						 	echo '<option value="'.$val.'" '.$selected .'>'.$val.'</option>';
						}
					}
					?>
				</select>
			</td>
		</tr>
		</tbody>
	</table>
	<div class="clear"></div>
	<div style="float: right; margin: 10px 250px 0pt 0pt;"><button class="yellow" type="submit"><span>Continue</span></button></div>
	<div class="clear"></div>
</form>
<div class="clear"></div>
