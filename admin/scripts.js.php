<script type="text/javascript">
jQuery(document).ready(function() {
	stateList();
	addressStateList();
	
	jQuery('#address_country').change(function() {
		addressStateList();
	});
	
	jQuery('#countryID').change(function() {
		stateList();
	});
	
	jQuery('#stateID').change(function() {
		schoolList();
	});
	
	jQuery('#schoolID').change(function() {
		deptList();
	});
	
	jQuery('#deptID').change(function() {
		courseList();
	});
});

function addressStateList() {
	if(jQuery('#address_state').length) {
		var countryID = jQuery('#address_country').val();
		jQuery.ajax({
			type: "POST",
			url: "ajax.php",
			data: "countryID="+countryID+"&stateID=<?php echo $address_state; ?>&action=stateList",
			success: function(response){
				response = jQuery.trim(response);
				jQuery('#address_state').html(response);
				schoolList();
			}
		});
	}
}

function stateList() {
	if(jQuery('#stateID').length) {
		var countryID = jQuery('#countryID').val();
		jQuery.ajax({
			type: "POST",
			url: "ajax.php",
			data: "countryID="+countryID+"&stateID=<?php echo $stateID; ?>&action=stateList",
			success: function(response){
				response = jQuery.trim(response);
				jQuery('#stateID').html(response);
				schoolList();
			}
		});
	}
}

function schoolList() {
	if(jQuery('#schoolID').length) {
		var countryID = jQuery('#countryID').val();
		var stateID = jQuery('#stateID').val();
		jQuery.ajax({
			type: "POST",
			url: "ajax.php",
			data: "countryID="+countryID+"&stateID="+stateID+"&schoolID=<?php echo $schoolID; ?>&action=schoolList",
			success: function(response){
				response = jQuery.trim(response);
				jQuery('#schoolID').html(response);
				deptList();
			}
		});
	}
}

function deptList() {
	if(jQuery('#deptID').length) {
		var countryID = jQuery('#countryID').val();
		var stateID = jQuery('#stateID').val();
		var schoolID = jQuery('#schoolID').val();
		jQuery.ajax({
			type: "POST",
			url: "ajax.php",
			data: "countryID="+countryID+"&stateID="+stateID+"&schoolID="+schoolID+"&deptID=<?php echo $deptID; ?>&action=deptList",
			success: function(response){
				response = jQuery.trim(response);
				jQuery('#deptID').html(response);
				courseList();
			}
		});
	}
}

function courseList() {
	if(jQuery('#courseID').length) {
		var countryID = jQuery('#countryID').val();
		var stateID = jQuery('#stateID').val();
		var schoolID = jQuery('#schoolID').val();
		var deptID = jQuery('#deptID').val();
		jQuery.ajax({
			type: "POST",
			url: "ajax.php",
			data: "countryID="+countryID+"&stateID="+stateID+"&schoolID="+schoolID+"&deptID="+deptID+"&courseID=<?php echo $courseID; ?>&action=courseList",
			success: function(response){
				response = jQuery.trim(response);
				jQuery('#courseID').html(response);
			}
		});
	}
}

function delComment(commentID) {
	var s = confirm("Are you sure?");
	if(s == true) {
		jQuery.ajax({
			type: "POST",
			url: "ajax.php",
			data: "commentID="+commentID+"&action=delComment",
			success: function(response){
				response = jQuery.trim(response);
				if(response == '1') {
					jQuery('#commentList_'+commentID).remove();
				}
			}
		});
	}
}

function delAnswer(ansID) {
	var s = confirm("Are you sure?");
	if(s == true) {
		jQuery.ajax({
			type: "POST",
			url: "ajax.php",
			data: "ansID="+ansID+"&action=delAnswer",
			success: function(response){
				response = jQuery.trim(response);
				if(response == '1') {
					jQuery('#answerList_'+ansID).remove();
				}
			}
		});
	}
}
</script>
