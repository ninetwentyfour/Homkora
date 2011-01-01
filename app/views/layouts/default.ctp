<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Time Tracking Made Simple | Homkora</title>
	<?php echo $html->css('style'); ?>
	<?php echo $html->css('jquery.stopwatch'); ?>
</head>
<body>
	<header>
		<h1><a href="http://homkora.com">Homkora</a></h1>
		<nav>
			<?php
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
		</nav>
	</header>
  	<div id="container">
		<div id="content">
			<?php 
				echo $this->Session->flash();
				echo $this->Session->flash("auth");
				echo $content_for_layout; 
			?>
			<div style="clear:both;"></div>
		</div>
		<div style="clear:both;"></div>
	</div>
	<footer class="transparent_class">
		<a href="http://homkora.com/pages/about">About</a> | 
		<a href="http://homkora.com/pages/contact">Contact</a> | 
		<a href="http://homkora.com/pages/privacy">Privacy</a> | 
		<a href="http://homkora.com/pages/faq">FAQ</a> | 
		<a href="http://homkora.com/pages/help">Help</a> | 
		Created by <a href="http://www.travisberry.com">Travis Berry</a>
	</footer>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>


</body>
</html>