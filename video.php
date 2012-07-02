<?php
require_once('includes/config.php');
require_once 'templates/header.php';

$link = stripslashes($_GET['link']);
$title = stripslashes($_GET['title']);

?>

<div class='inner'>
  <div id='body_cont'>
    <div id='body'>
      <div class='buy_col'>
        <div class='_cont'>
          <h1><?php echo $title ?></h1>

          <br/>

          <iframe class="youtube-player" type="text/html" width="600" height="385" src="<?php echo $link ?>" frameborder="0">
          </iframe>
        </div>
      </div>
    </div>
  </div>
</div>

<div class='clear'></div>

<?php require_once 'templates/footer.php'; ?>
