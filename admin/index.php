<?php require_once 'includes/config.php'; ?>
<?php require_once 'templates/header.php'; ?>

<script type="text/javascript">
	function expandme(id) {
		$('.hide:not(#hide_'+id+')').slideUp('fast', function() {
			$('#hide_'+id).slideToggle('slow');
		});
	}
</script>

<h2>Coursespree Question/Answer Payments</h2>
<table id="rounded-corner">
	<thead>
		<tr>
			<th scope="col" class="rounded-company"></th>
			<th class="rounded" scope="col">Question</th>
			<th class="rounded" scope="col">Price Paid</th>
			<th class="rounded" scope="col">Payment Status</th>
			<th class="rounded" scope="col">Date</th>
			<th class="rounded-q4 actions" scope="col">Actions</th>
		</tr>
	</thead>

	<tbody>
		<?php
		$results = getQuestionsPayment();
		if(!empty($results)) {
			foreach($results as $result) {
				if(!empty($result)) { ?>
					<tr>
						<td></td>
						<td><?php echo $result[0]->qTitle ."<br />(". $result[0]->byUserName .")"; ?></td>
						
						<td>
							<?php $total = 0; foreach($result as $data) { ?>
									<?php $total += $data->price; ?>
							<?php } echo "$".$total; ?>
						</td>
						
						<td>
							<?php if($data->active) {
								echo 'Success';
							} else {
								echo 'Failed';
							} ?>
						</td>
						<td><?php echo $data->dated; ?></td>
						<td class="actions"><a href="javascript:" onclick="javascript: expandme('<?php echo $result[0]->id; ?>');"><img src="images/plus-icon.png" alt="" border="0" /></a></td>
					</tr>
					
					<tr class="hidePartentTR">
						<td colspan="6" style="border-bottom:2px dotted #60C8F2;">
							<table width="95%" border="0" class="rounded-corner-expand hide" id="hide_<?php echo $result[0]->id; ?>" style="margin:0 auto;">
								<tr>
									<th class="rounded" scope="col" width="560">Approved Answers</th>
									<th class="rounded" scope="col" width="150">Given By</th>
									<th class="rounded" scope="col" width="100">Price paid</th>
								</tr>
								
								<?php foreach($result as $data) { ?>
									<tr>
										<td><?php echo $data->answer; ?></td>
										<td><?php echo $data->toUserName; ?></td>
										<td><?php echo "<strong>$". $data->price ."</strong>"; ?></td>
									</tr>
								<?php } ?>
							</table>
						</td>
					</tr>
				<?php }
			}
		}
		?>
	</tbody>
</table>








<div class="clear" style="clear:both; height:30px;"></div>
<h2>Coursespree Notices Payments</h2>
<table id="rounded-corner">
	<thead>
		<tr>
			<th scope="col" class="rounded-company"></th>
			<th class="rounded" scope="col">Question</th>
			<th class="rounded" scope="col">Price Paid</th>
			<th class="rounded" scope="col">Payment Status</th>
			<th class="rounded" scope="col">Date</th>
			<th class="rounded-q4 actions" scope="col">Actions</th>
		</tr>
	</thead>

	
</table>

<?php require_once 'templates/footer.php'; ?>
