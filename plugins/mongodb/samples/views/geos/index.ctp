<?php echo $html->link('Add data', 'add'); ?>
<br>
<br>
<?php foreach($results as $result): ?>

	id: <?php echo $result['Geo']['_id']; ?> 
		[<?php echo $html->link('delete','delete/'.$result['Geo']['_id']); ?>]
		[<?php 
			$url = array('action' => 'index', 'near', $result['Geo']['loc']['lat'], $result['Geo']['loc']['long']);
			echo $html->link('near here', $url); 
		?>]
		[<?php 
			$url = array('action' => 'index', 'circle', $result['Geo']['loc']['lat'], $result['Geo']['loc']['long'], 10);
			echo $html->link('around here', $url); 
		?>]
	<br>
	title: <?php echo h($result['Geo']['title']); ?><br>
	body: <?php echo h($result['Geo']['body']); ?><br>
	latitude:<?php echo h($result['Geo']['loc']['lat']) ?><br>
	longitude:<?php echo h($result['Geo']['loc']['long']) ?><br>
	
<hr>
<?php endforeach; ?>
