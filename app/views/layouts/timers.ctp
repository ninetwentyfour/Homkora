<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Time Tracking Made Simple | Homkora</title>
	<?php echo $html->css('sass-style'); ?>
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