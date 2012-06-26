<?php
	if(!isAdminLoggedIn()) {
		header('Location: login.php');
		exit;
	}
	$adminInfo = getAdminInfo();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ADMIN PANEL | Dashboard</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/ddaccordion.js"></script>
<script type="text/javascript">
ddaccordion.init({
	headerclass: "submenuheader", //Shared CSS class name of headers group
	contentclass: "submenu", //Shared CSS class name of contents group
	revealtype: "click", //Reveal content when user clicks or onmouseover the header? Valid value: "click", "clickgo", or "mouseover"
	mouseoverdelay: 200, //if revealtype="mouseover", set delay in milliseconds before header expands onMouseover
	collapseprev: true, //Collapse previous content (so only one open at any time)? true/false 
	defaultexpanded: [], //index of content(s) open by default [index1, index2, etc] [] denotes no content
	onemustopen: false, //Specify whether at least one header should be open always (so never all headers closed)
	animatedefault: false, //Should contents open by default be animated into view?
	persiststate: true, //persist state of opened contents within browser session?
	toggleclass: ["", ""], //Two CSS classes to be applied to the header when it's collapsed and expanded, respectively ["class1", "class2"]
	togglehtml: ["suffix", "<img src='images/plus.gif' class='statusicon'>", "<img src='images/minus.gif' class='statusicon'>"], //Additional HTML added to the header when it's collapsed and expanded, respectively  ["position", "html1", "html2"] (see docs)
	animatespeed: "fast", //speed of animation: integer in milliseconds (ie: 200), or keywords "fast", "normal", or "slow"
	oninit:function(headers, expandedindices){ //custom code to run when headers have initalized
		//do nothing
	},
	onopenclose:function(header, index, state, isuseractivated){ //custom code to run whenever a header is opened or closed
		//do nothing
	}
})
</script>
<script src="js/jquery.jclock-1.2.0.js.txt" type="text/javascript"></script>
<script type="text/javascript" src="js/jconfirmaction.jquery.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('.ask').jConfirmAction();
	});
</script>

<script type="text/javascript">
$(function($) {
    $('.jclock').jclock();
});
</script>

<script language="javascript" type="text/javascript" src="js/niceforms.js"></script>
<link rel="stylesheet" type="text/css" media="all" href="css/niceforms-default.css" />

<script type="text/javascript">
$(document).ready(function() {
	$('#checkAll').click(function() {
		if($('#checkAll').attr('checked')) {
			$(".checkList").attr('checked', true);
		} else {
			$(".checkList").attr('checked', false);
		}
	});
	
	$('.confirm').click(function() {
		var sure = confirm("Are you sure?");
		
		if(sure) {
			return true;
		}
		return false;
	});
	
	$('#delItems').click(function() {
		var sure = confirm("Are you sure?");
		
		if(sure) {
			$('#mainFrom').submit();
		}
		return false;
	});
});
</script>
</head>
<body>

<div id="main_container">
	<div class="header">
		<div class="logo"><a href="index.php"><img src="../images/logo.png" alt="" title="" border="0" /></a></div>
		<div class="right_header">Welcome <?php echo $adminInfo['name']; ?>, <a href="../" target="blank">Visit site</a> | <a href="index.php?action=adminLogout" class="logout">Logout</a></div>
		<div class="jclock"></div>
	</div>
    
	<div class="main_content">
		<div class="menu">
			<?php
			if(!empty($menu)) {
				echo '<ul>';
					$parentCount = 0;
					foreach($menu as $item) {
						if(isset($item['link']) && $item['link'] == 'direct') {
							$href = $item['page'];
						} else {
							$href = 'list.php?menu='.$parentCount;
						}
						echo '<li><a href="'.$href.'">';
							echo $item['title'];
						
						if(isset($item['sub']) && !empty($item['sub'])) { // Sub menu
							echo '<!--[if IE 7]><!--></a><!--<![endif]-->';
							echo '<!--[if lte IE 6]><table><tr><td><![endif]-->';
								echo '<ul>';
									$subCount = 0;
									foreach($item['sub'] as $subItem) {
										if(isset($subItem['link']) && $subItem['link'] == 'direct') {
											$href = $subItem['page'];
										} else {
											$href = 'list.php?menu='.$parentCount.'&sub='.$subCount;
										}
										echo '<li><a href="'.$href.'">'.$subItem['title'].'</a></li>';
										
										$subCount = $subCount + 1;
									}
								echo '</ul>';
							echo '<!--[if lte IE 6]></td></tr></table></a><![endif]-->';
							echo '</li>';
						} else {
							echo '</a></li>';
						}
						
						$parentCount = $parentCount + 1;
					}
				echo '</ul>';
			}
			?>
		</div>
		
		<div class="center_content">
			<?php //require_once 'sidebar.php'; ?>
			<div class="right_content">
				<?php show_admin_msgs(); ?>
