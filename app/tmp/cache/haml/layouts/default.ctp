<?php
require_once '/var/www/Homkora/app/vendors/haml/HamlHelpers.php';
?><!DOCTYPE html>
<html><head><meta charset="utf-8" /><title>Time Tracking Made Simple | Homkora</title><?php
if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')){
  echo '<link href="https://s3.amazonaws.com/homkora-static/css/homkora-static.gz.css" type="text/css" rel="stylesheet">';
}else{
  echo '<link href="https://s3.amazonaws.com/homkora-static/css/homkora-static.css" type="text/css" rel="stylesheet">';
}
?>
</head><body><header><h1> <a href="http://homkora.com">Homkora</a> </h1><nav><?php
// show different nav bars to different people
if(isset($_SESSION['Auth']['User'])){
  if($_SESSION['Auth']['User']['group_id']=='1'){
    echo $this->element('navigation');	
  }else{
    echo $this->element('navigation_user');	
  }
}else{
  echo $this->element('navigation_no_user');
}
?>
</nav></header><div id="container"><noscript>Homkora must have javascript enabled.</noscript><div id="content"><?php echo $this->Session->flash();; ?><?php echo $this->Session->flash("auth");; ?><?php echo $content_for_layout;; ?><div style="clear:both;"></div></div><div style="clear:both;"></div></div><footer class="transparent_class"><?php echo $this->element('footer');; ?></footer><script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript"></script><?php
if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')){
  echo '<script type="text/javascript" src="https://s3.amazonaws.com/homkora-static/js/common.gz.js"></script>';
}else{
  echo '<script type="text/javascript" src="https://s3.amazonaws.com/homkora-static/js/common.js"></script>';
}
?>
</body></html>