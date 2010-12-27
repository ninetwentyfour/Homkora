<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Stopwatch</title>
	<link rel="stylesheet" href="css/style.css" />
	<link rel="stylesheet" href="css/jquery.stopwatch.css" />
	<?php echo $html->css('style'); ?>
	<?php echo $html->css('jquery.stopwatch'); ?>
	<?php echo $html->css('stylesheet'); ?>
	
</head>
<body>
  	<div id="container">
		<div id="content">
		<div id="clock1"></div>
		<?php 
		//echo $this->Session->flash();
		//echo $this->Session->flash("auth");
		echo $content_for_layout; ?>
		</div>
	</div>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery.stopwatch.js"></script>
	<script type="text/javascript">
		$(function() {
			$('#clock1').stopwatch();
		});
	</script>
</body>
</html>