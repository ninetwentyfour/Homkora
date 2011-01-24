<?php
require_once '/var/www/Homkora/app/vendors/haml/HamlHelpers.php';
?><!DOCTYPE html>
<html><head><meta charset="utf-8" /><title>Time Tracking Made Simple | Homkora</title><?php echo $html->css('scss-style');; ?><?php echo $html->css('jquery.stopwatch');; ?></head><body><header><h1> <a href="http://homkora.com">Homkora</a> </h1><nav><?php
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
</nav></header><div id="container"><noscript>Homkora must have javascript enabled.</noscript><div id="content"><?php echo $this->Session->flash();; ?><?php echo $this->Session->flash("auth");; ?><?php echo $content_for_layout;; ?><div style="clear:both;"></div></div><div style="clear:both;"></div></div><footer class="transparent_class"><?php echo $this->element('footer');; ?></footer><script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript"></script><script type="text/javascript">
  //<![CDATA[
jQuery(function() {
  jQuery.support.placeholder = false;
  test = document.createElement('input');
  if('placeholder' in test) jQuery.support.placeholder = true;
});
$(function() {
  if(!$.support.placeholder) { 
    var active = document.activeElement;
    $(':text').focus(function () {
      if ($(this).attr('placeholder') != '' && $(this).val() == $(this).attr('placeholder')) {
        $(this).val('').removeClass('hasPlaceholder');
      }
    }).blur(function () {
      if ($(this).attr('placeholder') != '' && ($(this).val() == '' || $(this).val() == $(this).attr('placeholder'))) {
        $(this).val($(this).attr('placeholder')).addClass('hasPlaceholder');
      }
    });
    $(':text').blur();
    $(active).focus();
    $('form').submit(function () {
      $(this).find('.hasPlaceholder').each(function() { $(this).val(''); });
    });
  }
});
  //]]>
</script>
</body></html>