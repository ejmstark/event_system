<div class="content">
	Hi! Put your content here. Find me at "application\views\reports\vReport.php"
    <br>
    <h1>EVENTS</h1>
	<table>
		<thead>
			<tr>
				<th>Event Name</th>
				<th>Total Attendees</th>
			</tr>
		</thead>
		<tbody>
			<?php if (isset($perfs)) {?>
			
				<?php foreach ($perfs as $e) { ?>
					<tr>
						<td><?php echo $e->Event_Name;?></td>
						<td><?php echo $e->Total_No_Of_Attendees;?></td>
					</tr>
				<?php } ?>
			<?php } ?>
		</tbody>
	</table>
	<br><br>
</div>