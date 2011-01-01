<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Time Tracking Made Simple | Homkora</title>
	<?php echo $html->css('style'); ?>
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
	<script type="text/javascript">
		function addTime() {
			var data = $("#UserAddForm").serialize();

			$.ajax({
				type: "post",		// Request method: post, get
				url: "/projects/addTime",	// URL to request
				data: data,		// Form variables
				dataType: "json",	// Expected response type
				success: function(response, status) {
					// Response was a success
					if (response.success === true) {
						$("#responseSuccess").html(response.data).slideDown();
						$('#totalTime').html(response.time);
						// Response contains errors
					}else{
						var errors = new Array;

						if (typeof(response.data) == ("object" || "array")) {
							$.each(response.data, function(key, value) {
								var text = (isNaN(key)) ? key +": "+ value : value;
								errors[errors.length] = "<li>"+ text +"</li>";
							});
						}else{
							errors[errors.length] = "<li>"+ response.data +"</li>";
						}
						errors = errors.join("\n");
						$("#responseError").html(errors).slideDown();
					}
				},
				error: function(response, status) {
					alert('An unexpected error has occurred!');
				}
			});
			setTimeout(function() {
				$(".responseBox").slideUp();
			}, 5000);
			
			return false;
		}
	</script>
</body>
</html>