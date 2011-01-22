<?php
require_once '/var/www/Homkora/app/vendors/haml/HamlHelpers.php';
?><?php
App::import('Sanitize');
?>
<div class="users view"><h2>User<div class="project-view"><?php echo $gravatar2; ?><h2>User Name</h2><?php echo Sanitize::html($user['User']['username']); ?></div><div class="project-view"><h2>API Key</h2><?php echo Sanitize::html($user['User']['ApiKey'][0]['ApiKey']['key']); ?></div><div id="project-view-break"></div><div class="project-view"><h2>Email</h2><?php echo Sanitize::html($user['User']['email']); ?></div><div class="project-view"><h2>Created</h2><?php echo date("M-d-Y",$user['User']['created']); ?></div><div class="bottomLinks"><br /><?php echo $html->link($html->image('icon_pencil.png', array('alt' => 'Add','title'=>'Add')).'Edit Account',array('controller'=>'users', 'action'=>'userEdit',$user['User']['_id']),array('escape' => false,'class'=>'button addTimerIndex')); ?></div></h2></div>