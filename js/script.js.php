<script type="text/javascript">
jQuery(document).ready(function(){
	jQuery('#address_country').change(function() {
		showAddressStates('<?php echo $address_country; ?>');
	});
	
	jQuery('#state').change(function() {
		showSchools('<?php echo $school; ?>');
	});
	
	jQuery('#school').change(function() {
		showDepts('<?php echo $dept; ?>');
	});
	
	jQuery('#dept').change(function() {
		showCourses('<?php echo $course; ?>');
	});
	
	showAddressStates('<?php echo $address_country; ?>');
	showSchools('<?php echo $school; ?>');
	showDepts('<?php echo $dept; ?>');
	showCourses('<?php echo $course; ?>');
	
	jQuery('#thickBoxLoginForm').submit(function(){
		$('.errorThickBox').html('<img src="images/loading_thickbox.gif" alt="" border="">');
		var userName = jQuery('.loginBoxInner #userName').val();
		userName = jQuery.trim(userName);
		
		var password = jQuery('.loginBoxInner #password').val();
		password = jQuery.trim(password);
		
		var remember = jQuery('.loginBoxInner #remember').attr('checked');
		if(remember == true) {
			remember = 1;
		} else {
			remember = 0;
		}
		
		if(userName == '') {
			$('.errorThickBox').html('Please provide User Name');
		} else if(password == '') {
			$('.errorThickBox').html('Please enter Password');
		} else {
			jQuery.ajax({
				type: "POST",
				url: "ajax.php",
				data: "userName="+userName+"&password="+password+"&remember="+remember+"&action=logMeIn",
				success: function(response){
					response = jQuery.trim(response);
					if(response=='1') {
						$('.errorThickBox').html('');
						window.location.href = '<?php echo curPageURL(); ?>';
					} else {
						$('.errorThickBox').html(response);
					}
				}
			});
		}
				
		return false;
	});
	
	jQuery('#listView').click(function(){
		jQuery('._prod_box').removeClass('_prod_box').addClass('_prod_item');
		return false;
	});
	jQuery('#gridView').click(function(){
		jQuery('._prod_item').removeClass('_prod_item').addClass('_prod_box');
		return false;
	});
	
	jQuery('#so').change(function(){
		var so = jQuery(this).val();
		if(so != '') {
			showSearchResults('');
		}
	});
	
	jQuery('.downloadNotice').click(function(){
		var purchaseID = jQuery(this).attr('id');
		purchaseID = purchaseID.replace('downloadNotice_', '');
		purchaseID = jQuery.trim(purchaseID);
		window.location.href = 'download.php?id='+purchaseID;
		return false;
	});
	
	if(jQuery('#messages').length) {
		jQuery('#messages').slideDown();
	}
	
	jQuery('.botheaderpanel').hover(
		function () {
			jQuery(this).find('span.displaytext').css('color','#000');
		},
		function () {
			jQuery(this).find('span.displaytext').css('color','#666');
		}

	);
	
	jQuery('#thickBoxAnswerForm').submit(function() {
		$('.errorThickBox').html('<img src="images/loading_thickbox.gif" alt="" border="">');
		
		var quesID = jQuery('#quesID').val();
		var quesAnswer = escape(tinyMCE.get('quesAnswer').getContent());
		quesAnswer = jQuery.trim(quesAnswer);
		
		if(quesID < 1 || quesAnswer == '') {
			$('.errorThickBox').html("Make ensure that there is no validation error.");
			return false;
		}
		
		if(quesAnswer != '') {
			jQuery.ajax({
				type: "POST",
				url: "ajax.php",
				data: "quesAnswer="+quesAnswer+"&quesID="+quesID+"&action=addAnswer", //add Answer to db
				success: function(response){
					pos = response.indexOf('insertID_');
					if (pos != -1) {
						var ansID = response.replace('insertID_', '');
						if(ansID > 0) {
							appendAnswerData(ansID);
						}
					} else {
						$('.errorThickBox').html(response);						
					}
				}
			});
		}
		return false;
	});
	
	jQuery('.close').click(function() {
		hideCustomPop();
	});
	
	jQuery('#editAnsForm').submit(function() {
		jQuery('.loading').css('visibility','visible');
		var ansID = jQuery('#editAnsInput').val();
		var answer = escape(tinyMCE.get('editAnsTextarea').getContent());
		
		if(ansID < 1 || answer == '') {
			alert("Make ensure that there is no validation error.");
			return false;
		}
		
		jQuery.ajax({
			type: "POST",
			url: "ajax.php",
			data: "ansID="+ansID+"&answer="+answer+"&action=editAnswer", //edit Answer to db
			success: function(response){
				jQuery('.loading').css('visibility','hidden');
				if(response == '1') {
					var editorContent = jQuery('#descAns_'+ansID).html(tinyMCE.get('editAnsTextarea').getContent());
					
					jQuery('#editAnsInput').val('');
					tinyMCE.get('editAnsTextarea').setContent('');					
					hideCustomPop();
				} else {
					alert(response);
				}
			}
		});
		
		return false;
	});
	
	jQuery('#addCommentForm').submit(function() {
		jQuery('.loading').css('visibility','visible');
		var pID = jQuery('#pID').val();
		var pType = jQuery('#pType').val();
		var comment = escape(tinyMCE.get('addCommentTextarea').getContent());
		
		if(pID < 1 || comment == '') {
			alert("Make ensure that there is no validation error.");
			return false;
		}
		
		jQuery.ajax({
			type: "POST",
			url: "ajax.php",
			data: "pID="+pID+"&pType="+pType+"&comment="+comment+"&action=addComment", //Add comment to db
			success: function(response){
				jQuery('.loading').css('visibility','hidden');
				
				pos = response.indexOf('commentID_');
				if (pos != -1) {
					var commentID = response.replace('commentID_', '');
					if(commentID > 0) {
						appendCommentData(commentID, pID, pType);
					}
				} else {
					alert(response);
				}
			}
		});
		
		return false;
	});
	
	
	jQuery('.cart_chk').click(function() {
		var approveCheckID = $(this).attr('id');
		var parentOBJ = $(this).parents('.approve:first');
		if ($("#"+approveCheckID).is(":checked")) {
			parentOBJ.removeClass('approve_off');
			parentOBJ.addClass('approve_on');
		} else {
			parentOBJ.removeClass('approve_on');
			parentOBJ.addClass('approve_off');
		}
	});
	
	jQuery('.approveSelected').click(function() {
		var approveQuesID = jQuery('#approveQuesID').val();
		if(jQuery('input[name="approveCheck[]"]:checked').length == 0) {
			alert("Select atleast one answer for approve");
			return false;
		}
		
		/*
		var ansIDs = '';
		jQuery('input[name="approveCheck"]:checked').each(function(i) {
			var ansID = jQuery(this).attr('id');
			ansID = ansID.replace('approveCheck_', '');
			ansIDs = ansIDs + ansID + ",";
		});
		
		jQuery.ajax({
			type: "POST",
			url: "ajax.php",
			data: "approveQuesID="+approveQuesID+"&ansIDs="+ansIDs+"&action=approveAns",
			success: function(response){
				if(response == 1) {
					window.location.href = "questions.php?id="+approveQuesID;
				}
			}
		});
		*/
		
		return true;
	});
	
	jQuery('input.locked').click(function() {
		return false;
	});
});

function showCustomPop(width, height, popType) {
	var top = (jQuery(window).height() - height) / 2;
	var left = (jQuery(window).width() - width) / 2;	
	
	width = width + 'px';
	height = height + 'px';
	top = top + 'px';
	left = left + 'px';
	
	if(popType == 'commentQues') {
		jQuery('.popupCommentBox').css({'width':width, 'height':height, 'top':top, 'left':left});
		jQuery('#filterCommentPop').show();
		jQuery('.popupCommentBox').fadeIn();
	} else {
		jQuery('.popupBox').css({'width':width, 'height':height, 'top':top, 'left':left});
		jQuery('#filterPop').show();
		jQuery('.popupBox').fadeIn();
	}
}
function hideCustomPop() {
	if(jQuery('#filterPop').length) {
		jQuery('#filterPop').fadeOut();
		jQuery('.popupBox').fadeOut();
	}
		
	if(jQuery('#filterCommentPop').length) {
		jQuery('#filterCommentPop').fadeOut();
		jQuery('.popupCommentBox').fadeOut();
	}
}

function editAns(ansID) {
	var thisID = "#editAns_"+ansID;
	showCustomPop('600', '270', 'ans');
	
	jQuery('#editAnsInput').val(ansID);
	
	var editorContent = jQuery('#descAns_'+ansID).html();
	tinyMCE.get('editAnsTextarea').setContent(editorContent);
	return false;
}

function delAns(ansID) {
	var s = confirm("Are you sure?");
	if(s == true) {
		var thisID = "#delAns_"+ansID;
		jQuery(thisID).after('<img src="images/loading.gif" alt="" border="0" class="loading" style="float:left; margin-top:3px;">');
		
		if(ansID > 0) {
			jQuery.ajax({
				type: "POST",
				url: "ajax.php",
				data: "ansID="+ansID+"&action=delAns",
				success: function(response){
					jQuery('.loading').remove();
					if(response == 1) {
						var answersCount = jQuery('#answersCount').html();
						answersCount = parseInt(answersCount) - parseInt(1);
						jQuery('#answersCount').html(answersCount);
			
						jQuery(thisID).parents('.commentstext-1').remove();
					} else {
						alert(response);
					}
				}
			});
		}
	}

	return false;
}

function delQues(quesID) {
	var s = confirm("Are you sure?");
	if(s == true) {
		var thisID = "#delQues_"+quesID;
		jQuery(thisID).after('<img src="images/loading.gif" alt="" border="0" class="loading" style="float:left; margin-top:3px;">');
		
		if(quesID > 0) {
			jQuery.ajax({
				type: "POST",
				url: "ajax.php",
				data: "quesID="+quesID+"&action=delQues",
				success: function(response){
					jQuery('.loading').remove();
					if(response == 1) {
						window.location.href = "questions.php";
					} else {
						alert(response);
					}
				}
			});
		}
	}

	return false;
}

function appendAnswerData(ansID) {
	$('.errorThickBox').html('');
	$('.errorThickBox').hide();
	jQuery('#answerBox').hide();
	tinyMCE.get('quesAnswer').setContent('');
	
	if(ansID > 0) {
		jQuery('.answersListDiv').prepend('<div class="ansLoading"><img src="images/loading_thickbox.gif" alt="" border=""></div>');		
		
		jQuery.ajax({
			type: "POST",
			url: "ajax.php",
			data: "ansID="+ansID+"&action=addSingleAnswerTemplate", //add new added answer to top of answer list in template
			success: function(response){
				jQuery('.ansLoading').remove();
				
				var answersCount = jQuery('#answersCount').html();
				answersCount = parseInt(answersCount) + parseInt(1);
				jQuery('#answersCount').html(answersCount);
				
				response = jQuery.trim(response);
				jQuery('.answersListDiv').prepend(response);
			}
		});
	}
}

function appendCommentData(commentID, pID, pType) {
	jQuery('#pID').val('');
	jQuery('#pType').val('');
	tinyMCE.get('addCommentTextarea').setContent('');
	hideCustomPop();
	
	if(commentID > 0) {
		jQuery('#commentsListDiv_'+pType+'_'+pID).prepend('<div class="ansLoading"><img src="images/loading_thickbox.gif" alt="" border=""></div>');		
		
		jQuery.ajax({
			type: "POST",
			url: "ajax.php",
			data: "commentID="+commentID+"&pID="+pID+"&pType="+pType+"&action=addSingleCommentTemplate", //add new added comment to top of comment list in template
			success: function(response){
				jQuery('.ansLoading').remove();
				
				var commentsCount = jQuery('#'+pType+'CommentsCount_'+pID).html();
				commentsCount = parseInt(commentsCount) + parseInt(1);
				jQuery('#'+pType+'CommentsCount_'+pID).html(commentsCount);
				
				response = jQuery.trim(response);
				jQuery('#commentsListDiv_'+pType+'_'+pID).prepend(response);
			}
		});
	}
}

function abuse(pID, abuseType) {
	var s = confirm("Are you sure?");
	if(s == true) {
		jQuery('#abuse_'+abuseType+'_'+pID).after('<img src="images/loading.gif" border="0" alt="" class="loading">');
		jQuery.ajax({
			type: "POST",
			url: "ajax.php",
			data: "pID="+pID+"&abuseType="+abuseType+"&action=abuse",
			success: function(response){
				//jQuery('.loading').remove();
				alert(response);
			}
		});
	}
	return false;
}

function addComment(pID, pType) {
	var thisID = "#addComment_"+pType+"_"+pID;
	showCustomPop('600', '270', 'commentQues');
	
	jQuery('#pID').val(pID);
	jQuery('#pType').val(pType);
	tinyMCE.get('addCommentTextarea').setContent('');
	return false;
}

function subUnsubCommon(type) {
	if(type == 'subscribe') {
		//var htm = '<a href="javascript:" class="button yellow cboxElement subscribeTo" id="subscribeTo_<?php echo $userID; ?>" onclick="subUnsubCommon(\'unsubscribe\')"><span>Unsubscribe</span></a>';
		var htm = '<span style="color:green; font-weight:bold;">Subscribed Successfully</span>';
	} else {
		//var htm = '<a href="javascript:" class="button yellow cboxElement unsubscribeTo" id="subscribeTo_<?php echo $userID; ?>" onclick="subUnsubCommon(\'subscribe\')"><span>Subscribe</span></a>';
		var htm = '<span style="color:green; font-weight:bold;">Unsubscribed Successfully</span>';
	}
	
	$('#msgSubscribe').html('<img src="images/loading_thickbox.gif" alt="" border="">');
	var subscribeToID = jQuery('.subscribeTo').attr('id');
	subscribeToID = subscribeToID.replace('subscribeTo_', '');
	subscribeToID = jQuery.trim(subscribeToID);
	
	jQuery.ajax({
		type: "POST",
		url: "ajax.php",
		data: "subscribeToID="+subscribeToID+"&action="+type,
		success: function(response){
			response = jQuery.trim(response);
			if(response != '1') {
				$('#msgSubscribe').html(response);
			} else {
				$('#msgSubscribe').html('');
				$('.subscriptionMain').html(htm);
			}
		}
	});
}

function showAddressStates(selectedID) {
	var responseID = jQuery('#address_state');
	if(responseID.length) {	
		var addressCountryID = jQuery('#address_country').val();
		jQuery.ajax({
			type: "POST",
			url: "ajax.php",
			data: "addressCountryID="+addressCountryID+"&selectedID="+selectedID+"&action=showAddressStates",
			success: function(response){
				$(responseID).html(response);
			}
		});
	}
}

function showStates(selectedID) {
	var responseID = jQuery('#state');
	if(responseID.length) {
		if(jQuery('#country'),length > 0) {
			var countryID = jQuery('#address_country').val();
		} else {
			var countryID = 1;
		}
		
		jQuery.ajax({
			type: "POST",
			url: "ajax.php",
			data: "countryID="+countryID+"&selectedID="+selectedID+"&action=showStates",
			success: function(response){
				$(responseID).html(response);
				showSchools('<?php echo $school; ?>');
			}
		});
	}
}

function showSchools(selectedID) {
	var responseID = jQuery('#school');
	if(responseID.length) {	
		var stateID = jQuery('#state').val();
		jQuery.ajax({
			type: "POST",
			url: "ajax.php",
			data: "stateID="+stateID+"&selectedID="+selectedID+"&action=showSchools",
			success: function(response){
				$(responseID).html(response);
				showDepts('<?php echo $dept; ?>');
			}
		});
	}
}

function showDepts(selectedID) {
	var responseID = jQuery('#dept');
	if(responseID.length) {	
		var schoolID = jQuery('#school').val();
		jQuery.ajax({
			type: "POST",
			url: "ajax.php",
			data: "schoolID="+schoolID+"&selectedID="+selectedID+"&action=showDepts",
			success: function(response){
				$(responseID).html(response);
				showCourses('<?php echo $course; ?>');
			}
		});
	}
}

function showCourses(selectedID) {
	showSearchResults('');
	
	var responseID = jQuery('#course');
	if(responseID.length) {	
		var schoolID = jQuery('#school').val();
		var deptID = jQuery('#dept').val();
		jQuery.ajax({
			type: "POST",
			url: "ajax.php",
			data: "schoolID="+schoolID+"&deptID="+deptID+"&selectedID="+selectedID+"&action=showCourses",
			success: function(response){
				$(responseID).html(response);
			}
		});
	}
}

function showSearchResults(paging) {
	var responseID = jQuery('#searchTemplate');
	if(responseID.length) {
		if(paging == '') {
			paging = '<?php echo $_GET[paging]; ?>';
		}
		
		var stateID = jQuery('#state').val();
		var schoolID = jQuery('#school').val();
		var deptID = jQuery('#dept').val();
		var so = jQuery('#so').val();
	
		jQuery.ajax({
			type: "GET",
			url: "ajax.php",
			data: "s=<?php echo $_GET[s]; ?>&paging="+paging+"&stateID="+stateID+"&schoolID="+schoolID+"&deptID="+deptID+"&so="+so+"&action=showSearchResults",
			success: function(response){
				$(responseID).html(response);
			}
		});
	}
}

function PopupCenter(pageURL, title, w, h) {
	var left = (screen.width/2)-(w/2);
	var top = (screen.height/2)-(h/2);
	var targetWin = window.open (pageURL, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
}

function addNew(obj, addType) {
	jQuery(obj).parents('.addNew:last').html('<input type="text" name="add'+addType+'" id="add'+addType+'" value=""> <a href="#" onclick="javascript: return addNew2(\''+addType+'\');">Add</a>');
	return false;
}

function addNew2(addType) {
	var newVal = jQuery( '#add'+addType ).val();
	newVal = jQuery.trim(newVal);
	if(newVal != '') {
		var countryID = '<?php echo get_country_id(DEFAULT_COUNTRY); ?>';
		var stateID = jQuery('#state').val();
		var schoolID = jQuery('#school').val();
		var deptID = jQuery('#dept').val();
		var courseID = jQuery('#course').val();
		
		if(addType == 'school') {
			if(stateID == '') {
				alert('Please select state');
				return false;
			}
		} else if(addType == 'dept') {
			if(stateID == '') {
				alert('Please select state');
				return false;
			} else if(schoolID == '') {
				alert('Please select school');
				return false;
			}
		} else if(addType == 'course') {
			if(stateID == '') {
				alert('Please select state');
				return false;
			} else if(schoolID == '') {
				alert('Please select school');
				return false;
			} else if(deptID == '') {
				alert('Please select department');
				return false;
			}
		}
		
		if(addType == 'school') {
			if(stateID == '') {
				alert('Please select state');
				return false;
			}
		}
		
		jQuery.ajax({
			type: "POST",
			url: "ajax.php",
			data: "newVal="+newVal+"&addType="+addType+"&countryID="+countryID+"&stateID="+stateID+"&schoolID="+schoolID+"&deptID="+deptID+"&courseID="+courseID+"&action=addNew",
			success: function(response){
				if(response > 0) {
					if(addType == 'state')
						showStates(response);
						
					if(addType == 'school')
						showSchools(response);
						
					if(addType == 'dept')
						showDepts(response);
						
					if(addType == 'course')
						showCourses(response);
						
						jQuery( '#add'+addType ).val('');
				}
			}
		});
	}
	
	return false;
}
</script>
