<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Time Tracking Made Simple | Homkora</title>
	<?php echo $html->css('sass-style'); ?>
	<?php echo $html->css('jquery.stopwatch'); ?>
</head>
<body onLoad="addTime()">
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
		<noscript>
			Homkora must have javascript enabled.
		</noscript>
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
		<?php echo $this->element('footer'); ?>
	</footer>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
</body>
</html>