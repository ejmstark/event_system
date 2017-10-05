<div class="content">
	Hi! Put your content here. Find me at "application\views\reports\vReport.php"
    <br>
    <h1>EVENTS</h1>
	<table>
		<thead>
			<tr>
				<th>Event ID</th>
				<th>Event Name</th>
				<th>Total</th>
			</tr>
		</thead>
		<tbody>
			<?php if (isset($perfs)) {?>
			
				<?php foreach ($perfs as $e) { ?>
					<tr>
						<td><?php echo $e->event_id;?></td>
						<td><?php echo $e->name;?></td>
						<td><?php echo $e->total;?></td>
					</tr>
				<?php } ?>
			<?php } ?>
		</tbody>
	</table>
	<br><br>
</div>