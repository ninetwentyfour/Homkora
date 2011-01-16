<?php
require_once '/var/www/cake/app/vendors/haml/HamlHelpers.php';
?><?php
App::import('Sanitize');
?>
<div class="projects view"><div class="project-view"><h2>Total Time</h2><div id="totalTime"><?php echo Sanitize::html($project[0]['Project']['total_time']); ?></div></div><div id="project-view-break"></div><div class="project-view"><h2>Title</h2><?php echo Sanitize::html($project[0]['Project']['title']); ?></div><div class="project-view"><h2>Description</h2><?php echo Sanitize::html($project[0]['Project']['description']); ?></div><div class="project-view"><h2>Created</h2><?php echo Sanitize::html($project[0]['Project']['created']); ?></div><div class="project-view"><h2>Modified</h2><?php echo Sanitize::html($project[0]['Project']['modified']); ?></div></div>