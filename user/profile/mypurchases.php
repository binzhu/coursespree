<?php
require_once('includes/config.php');

if(!isUserLoggedin()) {
	header('Location: register.php?type=login');
	exit;
}

require_once 'templates/header.php';
?>

<div class="inner">
	<div id="body_cont">
		<div id="body">
			<?php require_once 'templates/nav-user.php'; ?>
			<div id="profile">
				<div class="white_box">
					<?php require_once 'templates/sidebar-user.php'; ?>
					
					<div class="userDashboardRight">
						<div class="profile_content">
							<h1>My Purchases list</h1>
							<table border="0" class="purchasesTable">
								<tr>
									<th>S. No.</th>
									<th>Notice title</th>
									<th>Price</th>
									<th>Purchased from</th>
									<th>Download</th>
									<th>Purchased on</th>
								</tr>
								
								<?php
								$purchases = getPurchases();
								if(!empty($purchases)) {
									$count = 0;
									foreach($purchases as $purchase) {
										$count = $count + 1;
										$noticeTitle = get_doc_name($purchase->noticeTitle);
										?>
										<tr>
											<td><?php echo $count; ?>)</td>
											<td><?php echo stripslashes($noticeTitle); ?></td>
											<td>$<?php echo stripslashes($purchase->price); ?></td>
											<td><?php echo stripslashes($purchase->ufFullName); ?><br />(<?php echo stripslashes($purchase->ufEmail); ?>)</td>
											<td><a href="javascript:" class="downloadNotice" id="downloadNotice_<?php echo $purchase->id; ?>">Download</a></td>
											<td><?php echo stripslashes($purchase->purchasedOn); ?></td>
										</tr>
										<?php
									}
								} ?>
							</table>
						</div>
					</div>
					<div class="clear"></div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php require_once 'templates/footer.php'; ?>
