<?php if ($_GET['type'] =="find") {?>
    <?php require_once 'tutor/findtutor.php' ;?>
<?php } elseif ($_GET['type']=="be"){ ?>
    <?php require_once 'tutor/betutor.php' ;} ?>

<a href="tutor.php?type=find">find a tutor</a>
<a href="tutor.php?type=be">Be a tutor</a>