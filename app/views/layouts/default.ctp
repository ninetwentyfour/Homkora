<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Oulomos | Time Tracking Made Simple</title>
	<link rel="stylesheet" href="css/style.css" />
	<link rel="stylesheet" href="css/jquery.stopwatch.css" />
	<?php echo $html->css('style'); ?>
	<?php echo $html->css('jquery.stopwatch'); ?>
</head>
<body>
	<header>
		<h1>Homkora</h1>
		<nav>
			<ul>
				<li><?php echo $html->link('Users',array('controller'=>'users', 'action'=>'index'));?></li>
				<li><?php echo $html->link('Projects',array('controller'=>'projects', 'action'=>'index'));?></li>
				<li><?php echo $html->link('Timers',array('controller'=>'timers', 'action'=>'index'));?></li>
				<li><?php echo $html->link('Groups',array('controller'=>'groups', 'action'=>'index'));?></li>
				<li><?php echo $html->link('Login',array('controller'=>'users', 'action'=>'login'));?></li>
				<li><?php echo $html->link('Logout',array('controller'=>'users', 'action'=>'logout'));?></li>
			</ul>
		</nav,>
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
	<footer>
		Footer info
	</footer>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
	<?php echo $this->Html->script('jquery.stopwatch'); ?>
	<script type="text/javascript">
		//write the timer to the time input in add timer on form submit
		function checkForm(frm) {
			frm.submit.disabled=true;
			var o = $('div.display').text();
			//alert(o);
			if (o){
				document.getElementById("TimerTime").value = o;
				return true; //returns true if all validation passes
			}else{
				alert('Please Add Feedback before requesting a revision');
				return false;
			}
		}
	</script>
	<script type="text/javascript">
		//create the clock
		$(function() {
			$('#clock1').stopwatch();
		});
	</script>
</body>
</html>