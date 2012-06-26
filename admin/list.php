<?php require_once 'includes/config.php'; ?>
<?php
$mainMenu = $_GET['menu'];
$subMenu = $_GET['sub'];
$settings = array();
if(isset($menu[$mainMenu]['sub'][$subMenu])) {
	$settings = $menu[$mainMenu]['sub'][$subMenu];
} else if(isset($menu[$mainMenu])) {
	$settings = $menu[$mainMenu];
} else {
	$settings = $menu[0];
}

if(	isset($_POST['checkList']) || isset($_GET['delID'])	) {
	if(isset($_POST['checkList'])) {
		$checkList = $_POST['checkList'];

		$postIDs = '';
		if(is_array($checkList)) {
			foreach($checkList as $postID) {
				$postIDs .= $postID.",";
			}
			$postIDs = substr($postIDs, 0, -1);
		} else {
			$postIDs = $checkList;
		}
	} else if(isset($_GET['delID'])) {
		$postIDs = $_GET['delID'];
	}
	
	$sql = "DELETE FROM `".DB_PREFIX.$settings['table']."` WHERE id IN($postIDs)";
	$res = mysql_query($sql);
	
	if($res) {
		$_SESSION['messages']['del'] = "{$settings['title']} deleted successfully.";
	}
}
?>
<?php require_once 'templates/header.php'; ?>

<form action="" method="post" name="mainFrom" id="mainFrom">
	<h2>CourseSpree <?php echo $settings['title']; ?> List</h2>     
	<table id="rounded-corner">
		<thead>
			<tr>
				<?php
				$fields = $settings['fields'];
				if(!empty($fields)) {
					echo '<th scope="col" class="rounded-company"><input type="checkbox" id="checkAll" /></th>';
					foreach($fields as $field=>$label) {
						echo '<th scope="col" class="rounded">'.$label.'</th>';
					}
					echo '<th scope="col" class="rounded-q4 actions">Action</th>';
				}
				?>
			</tr>
		</thead>
	
		<tbody>
			<?php
			if(isset($settings['custom_sql']) && $settings['custom_sql'] != '') {
				$sql = $settings['custom_sql'];
			} else {
				$sql = "SELECT * FROM `".DB_PREFIX.$settings['table']."` ORDER BY id DESC";
			}
			
			$paging = array();
			$paging = generatePaging($sql);
			$sql = $sql . $paging['limit'];
			$res = mysql_query($sql);
	
			if(mysql_num_rows($res) > 0) {
				while($data = mysql_fetch_array($res)) { ?>
					<tr>
						<?php
						$fields = $settings['fields'];
						if(!empty($fields)) {
							echo '<td><input type="checkbox" name="checkList[]" class="checkList" value="'.$data['id'].'" /></td>';
							foreach($fields as $field=>$label) {
								echo '<td>'.$data[$field].'</th>';
							} ?>
							<td class="actions">
								<a href="<?php echo $settings['page']; ?>?id=<?php echo $data['id']; ?>"><img src="images/user_edit.png" alt="Edit" title="Edit" border="0" /></a>
							
								<?php
								$link = curPageName();
								if(!empty($_GET)) {
									foreach($_GET as $key=>$val) {
										if($key != 'delID') {
											$sign = getSign($link);
											$link .= $sign . $key . "=" . $val;
										}
									}
								}
								$sign = getSign($link);
								$link .= $sign . "delID=" . $data['id'];
								?>
								<a href="<?php echo $link; ?>" class="confirm"><img src="images/trash.png" alt="Delete" title="Delete" border="0" /></a>
							</td>
						<?php } ?>
					</tr>
				<?php }
			}
			?>
		</tbody>
	</table>
	<a href="<?php echo $settings['page']; ?>" class="bt_green"><span class="bt_green_lft"></span><strong>Add new</strong><span class="bt_green_r"></span></a>
	<a href="#" class="bt_red" id="delItems"><span class="bt_red_lft"></span><strong>Delete</strong><span class="bt_red_r"></span></a> 
</form>

<?php echo $paging['pagingString']; ?>
<?php require_once 'templates/footer.php'; ?>
