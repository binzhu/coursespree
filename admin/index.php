<?php require_once 'includes/config.php'; ?>
<?php require_once 'templates/header.php'; ?>

<script type="text/javascript">
	function expandme(id) {
		$('.hide:not(#hide_'+id+')').slideUp('fast', function() {
			$('#hide_'+id).slideToggle('slow');
		});
	}
	
	function loadPage(pageNum, divID) {
		jQuery.ajax({
			type: "GET",
			url: "ajax.php",
			data: "paging="+pageNum+"&pageType="+divID+"&action=loadPage",
			success: function(response){
				jQuery('#'+divID).html(response);
			}
		});
	}
</script>

<h2>Coursespree Question/Answer Payments</h2>
<div id="questionsPayment"><?php getQuestionsPaymentTemplate(); ?></div>

<div class="clear" style="clear:both; height:30px;"></div>

<h2>Coursespree Notes Payments</h2>
<div id="notesPayment"><?php getNotesPaymentTemplate(); ?></div>

<?php require_once 'templates/footer.php'; ?>
