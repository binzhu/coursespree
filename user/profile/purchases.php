<?php
require_once('includes/config.php');

if(!isUserLoggedin()) {
	header('Location: register.php?type=login');
	exit;
}

require_once 'templates/header.php';
?>

<style type="text/css">
.container {
	border-color: red;
	height: auto;
	width: 665px;
	margin-top: 21px;
}
.singlecontainer {
	background: none repeat scroll 0 0 gray;
	border-radius: 5px 5px 5px 5px;
	float: left;
	height: 160px;
	margin-left: 5px;
	margin-bottom: 5px;
	padding: 4px;
	width: 312px;
}
.nThumb {
	border-radius: 5px 5px 5px 5px;
	float: left;
	height: 142px;
	margin: 1px 4px 2px;
	width: 111px;
	color:#fff;
}
.nInfo {
	float:right;
	width:180px;
}
.textt {
	color: #FFFFFF;
	float: left;
	font-family: cursive, Geneva, sans-serif;
	font-size: 14px;
	font-style: normal;
	margin-left: 3px;
	margin-top: 6px;
	padding: 0;
	width: 150px;
}
.thumbs {
	border-radius: 3px 3px 3px 3px;
	max-width: 110px;
	max-height:130px;
}
.desc {
	color: #FFFFFF;
	float: left;
	font-size: 12px;
	margin-left: 4px;
	margin-top: 3px;
	width: 176px;
	height:70px;
	overflow:hidden;
}
.status {
	color: #FFFFFF;
	float: left;
	font-size: 14px;
	margin-left: 4px;
	margin-right: 5px;
	margin-top: -4px;
	width: 176px;
}
.btn {
	background: none repeat scroll 0 0 buttonshadow;
	border-radius: 4px 4px 4px 4px;
	float: right;
	height: 21px;
	margin-right: 7px;
	width: 50px;
}
.view {
	color: white;
	float: right;
	margin-right: 10px;
	margin-top: 2px;
	text-decoration: none;
}
.cost {
	float: right;
	margin-right: 24px;
	width: 10px;
}
.price {
	color: #FF0000;
	font-size: 22px;
	margin-right: 15px;
	margin-top: 12px;
}
</style>

<div class="inner">
	<div id="body_cont">
		<div id="body">
			<?php require_once 'templates/nav-user.php'; ?>
			<div id="profile">
				<div class="white_box">
					<?php require_once 'templates/sidebar-user.php'; ?>

					<div class="userDashboardRight">
						<?php
						show_msgs();
						$sql = "SELECT n.*, DATE_FORMAT(n.dated, '%d %b, %Y') as dated, u.id as uID, CONCAT(u.fName,' ',u.lName) as uFullName, u.avatar as uImg FROM `".DB_PREFIX."notices` n LEFT JOIN `".DB_PREFIX."users` u ON(n.userID = u.id)  WHERE n.status='1' ORDER BY n.id DESC";
						$paging = array();
						$paging = generatePaging($sql, '10');
						$sql = $sql . $paging['limit'];
						$res = mysql_query($sql);
						
						if(mysql_num_rows($res) > 0) {
							while($doc = mysql_fetch_object($res)) {
								$title = stripslashes($doc->docName);
								if(strlen($title) > 20){
									$title = substr($title, 0, 18)."..";
								}
								
								$description = stripslashes($doc->tips);
								if(strlen($description) >= 100){
									$description = substr($description, 0, 100)."...";
								}

								$price = stripslashes($doc->price);
								if($doc->cp_fee_percentage > 0) {
									$price = $price + ($price * $doc->cp_fee_percentage / 100);
								}
								
								$price = "$".$price;
								
								$img = stripslashes($doc->coverImage);
								$img = "uploads/docs/preview/{$img}";
								if($doc->coverImage == '' || !file_exists($img)) {
									$img = 'images/no-img.jpg';
								} ?>
								
								<div class="singlecontainer">
									<div class="nThumb"> <img  class="thumbs" src="<?php echo $img; ?>" align="image" /><br /><center><a href="user.php?id=<?php echo $doc->uID; ?>"><?php echo $doc->uFullName; ?></a> <br />on <em style="font-style:italic;"><?php echo $doc->dated; ?></em></center> </div>
									<div class="nInfo">
										<p class="textt"><?php echo $title; ?></p>
										<p class="desc"><?php echo $description;?></p>
										<p class="status">Price: &nbsp;&nbsp;<b><?php echo $price;?></b></p>
										<div class="btn" onclick="javascript: window.location.href='notice.php?id=<?php echo $doc->id; ?>'"><a href="javascript:" class="view">View</a></div>
									</div>
								</div>
							<?php } ?>
							<div class="clear"></div>
							<?php echo $paging['pagingString']; ?>
							<div class="clear"></div>
						<?php } ?>
					</div>
					<div class="clear"></div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php require_once 'templates/footer.php'; ?>
