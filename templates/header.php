<?php require_once 'actions.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html dir="ltr" lang="en-US">
<head>
<title>CourseSpree.com</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" type="text/css" media="all" href="css/style.css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<?php require_once 'js/script.js.php';?>
<!-- ****** Lightbox ********* -->
<script type="text/javascript" src="js-plugins/lightbox/js/jquery.lightbox-0.5.js"></script>
<link rel="stylesheet" type="text/css" href="js-plugins/lightbox/css/jquery.lightbox-0.5.css" media="screen"/>
<script type="text/javascript">
$(function() {
	$('a.lightbox').lightBox();
});
</script>
<!-- ****** Lightbox ********* -->
<!-- ****** Carousel Slider ********* -->
<script type="text/javascript" src="js-plugins/jcarousel-slider/jcarousel.js"></script>
<link rel="stylesheet" type="text/css" href="js-plugins/jcarousel-slider/skin.css" />
<script type="text/javascript">
jQuery(document).ready(function() {
	jQuery('#carousel').jcarousel();
});
</script>
<!-- ****** Carousel Slider ********* -->
<!-- ******** Thickbox ********* -->
<script type="text/javascript" src="js-plugins/thickbox/thickbox.js"></script>
<link rel="stylesheet" type="text/css" href="js-plugins/thickbox/thickbox.css" />
<script type="text/javascript">
jQuery(document).ready(function() {
	jQuery('#carousel').jcarousel({
	scroll: 6
	});
});
</script>
<!-- ******** Thickbox ********* -->

<!-- ******** Tinymce ********* -->
<script type="text/javascript" src="js-plugins/tinymce/tiny_mce.js"></script>
<!-- ******** Tinymce ********* -->
</head>

<body>
<div id="container">
<div id="content">
<div id="header">
<div class="logo left">
<h1><a href="index.php"><img src="images/logo.png" alt="" /></a></h1>
</div>

<div class="right" style="margin-top:10px;">
<?php if(!isUserLoggedin()) { ?>
<?php
$userName = stripslashes($_COOKIE['cs_userName']);
if($userName == '') {
	$userName = 'User Name';
}

$password = stripslashes($_COOKIE['cs_password']);
if($password == '') {
	$password = 'Password';
}
?>
<form action="register.php?type=login" method="post" class="left">
<input type="hidden" name="loginVar" id="loginVar" value="1" />
<input type="text" name="userName" value="<?php echo $userName; ?>" class="inp" onclick="javascript:if(this.value=='User Name') { this.value=''; }" onblur="javascript:if(this.value=='') { this.value='User Name'; }" />
<input type="password" name="password" value="<?php echo $password; ?>"  class="inp" onclick="javascript:if(this.value=='Password') { this.value=''; }" onblur="javascript:if(this.value=='') { this.value='Password'; }" />
<!-- input type="checkbox" name="remember" value="1" <?php if($_COOKIE['cs_userName'] != '') { echo 'checked="checked"'; } ?> />Remember me -->
<input type="submit" class="btn" value="Sign In" />
</form>

<a href="register.php" class="btn">Register</a>
<p><a href="javascript:" onclick="javascript: PopupCenter('includes/fb/index.php', 'Coursespree sign up via Facebook', '1000', '400');"><img src="images/facebook-btn.png" alt="" /></a></p>
<?php } else { ?>
<div class="topright">
<ul>
<li class="none">Welcome <?php echo stripslashes($user->fName); ?></li>
<li><a href="user.php">Dashboard</a></li>
<li class="none"><a href="index.php?action=logout">Sign Out</a></li>
</ul>
</div>
<?php }?>

</div> <!-- .right -->
<div class="clear"></div>


<div class="left">
<ul class="main">
<li><a href="user.php?type=purchases">Buy Notes</a></li>
<li><a href="user.php?type=sell">Sell Notes</a></li>
<li><a href="questions.php">HomeWork Help</a></li>
<li><a href="virtual-tutoring">E-Learning</a></li>
<li><a href="http://danishnadeem.brandyourself.com/">About Us</a></li>


</ul>
</div>
<div class="right">
<div class="search">
<form action="search.php" class="search">
<input type="text" name="s" id="s" class="inp" value="<?php echo $_GET['s']; ?>" />
<input type="submit" value="" class="lens" />
</form>
</div>
</div>
<div class="clear"></div>

</div> <!-- #header -->

<?php show_msgs(); ?>