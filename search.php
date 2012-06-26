<?php
require_once('includes/config.php');
require_once 'templates/header.php';
?>
<div class="inner">
	<div id="body_cont">
		<div id="body">
			<div style="width:100%;">
				<div class="left_col">
					<div class="_hdr">Find Your Class</div>
					<div class="find_class">
						<form method="post" action="#" name="class_select">
							<div class="schoolInfo">
								<h1>Your School</h1>
								<div class="_label">State</div>
								<div class="_input">
									<select name="state" id="state">
										<option value="">--SELECT--</option>
										<?php
										$countryID = get_country_id(DEFAULT_COUNTRY);
										$states = get_states($countryID);
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
								</div>
								<div class="clear"></div>
						
								<div class="_label">School Name</div>
								<div class="_input">
									<select name="school" id="school">
										<option value="">--SELECT--</option>
									</select>
								</div>
								<div class="clear"></div>
						
								<div class="_label">Department</div>
								<div class="_input">
									<select name="dept" id="dept">
										<option value="">--SELECT--</option>
									</select>
								</div>
								<div class="clear"></div>
							</div>
						</form>
					</div>
				</div>



				<div class="buy_col">
					<div class="_btn">
						<form method="post" action="" name="list_type">
							<div style="float:left; padding-top:2px">
								Order by:
								<select name="so" id="so">
									<option value="1">Upload Date</option>
									<option value="2">Name</option>
									<option value="3">Price</option>
								</select>
							</div>

							<button id="listView"><span>LIST VIEW</span></button>
							<button id="gridView"><span>GRID VIEW</span></button>
						</form>
					</div>
	
					<div class="clear" style="height:10px;"></div>
					<div class="_cont">
						<div id="searchTemplate">
							<?php
							$s = filterMe($_GET['s']);
							if($s != '') {
								showSearchTemplate($s, '', '', '', '');
							}
							?>
						</div>
					</div>

					<div class="clear"></div>
				</div>

				<div class="clear"></div>
			</div>
		
			<div style="width:100%; height:20px; overflow:hidden;"></div>
		</div>
	</div>	
</div>

<?php require_once 'templates/footer.php'; ?>
