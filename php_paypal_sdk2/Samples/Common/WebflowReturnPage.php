 
		<?php 
 
print_r($_REQUEST);

	$owner_id = $_REQUEST['owner_id'];
	$doc_id = $_REQUEST['doc_id'];
	$buyer_id = $_REQUEST['buyer_id'];
	$access_key = $_REQUEST['access_key'];
	$public_doc_id = $_REQUEST['public_doc_id']; 


	define('DB_HOST', 'coursespree.db.9232987.hostedresource.com');
	define('DB_USER', 'coursespree');
	define('DB_PASS', 'Abcd123!');
	$con = mysql_connect(DB_HOST, DB_USER, DB_PASS);
	mysql_select_db('coursespree', $con);
	
	echo $qry =  "insert into cs_course_private (public_doc_id , owner_id , doc_id , access_key,active) values($public_doc_id,$owner_id,$doc_id,'$access_key',1)";
 	 mysql_query($qry);

	
?>
 



<?php  require_once('../../../includes/config.php'); ?>
<?php 
require_once('../../../includes/functions.php'); 
 ?>
<script type="text/javascript">
function preview(id,key,price){
	alert('preview.php?doc_id='+id+'&access_key='+key);
	window.location='preview.php?doc_id='+id+'&access_key='+key+"&price="+price;
	
	}
</script>
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
	margin-top: 5px;
	padding: 4px;
	width: 312px;
}
.thumb {
	border-radius: 5px 5px 5px 5px;
	float: left;
	height: 142px;
	margin: 9px 4px 2px;
	width: 111px;
}
.textt {
	color: #FFFFFF;
	float: left;
	font-family: cursive, Geneva, sans-serif;
	font-size: 19px;
	font-style: normal;
	margin-left: 3px;
	margin-top: 6px;
	padding: 0;
	width: 150px;
}
.thumbs {
	border-radius: 3px 3px 3px 3px;
}
.desc {
	color: #FFFFFF;
	float: left;
	font-size: 14px;
	margin-left: 4px;
	margin-top: 3px;
	width: 176px;
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
	margin-top: 17px;
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

<?php
if(!isUserLoggedin()) {
	header('Location: register.php?type=login');
	exit;
}

 
require_once 'header.php';
 ?>

<div class="inner">
	<div id="body_cont">
		<div id="body">
			<?php   require_once 'nav-user.php'; ?>
			<div id="profile">
				<div class="white_box">
				
						<?php  require_once 'sidebar-user.php'; ?>
				
						<div class="userDashboardRight">
							 
								
								
								<?php show_msgs(); 
								
								echo "Thank you for buying this document, you can view this in   ";
								echo "<a href='mydoc.php'>My Documents</a>" ;
								?>
						
							 
					
					
				</div>
                <div class="clear"></div>
			</div>
		</div>
	</div>
</div>
 
<?php require_once  'footer.php'; ?>
 

