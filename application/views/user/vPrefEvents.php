<div class="content">
	<h1>PREFRENCES</h1>
	<table>
		<thead>
			<tr>
				<th>Event ID</th>
				<th>Event Name</th>
				<th>Event Venue</th>
				<th>Event Date</th>
				<th>Option</th>

			</tr>
		</thead>
		<tbody>
			<?php if (isset($prefs)) {?>
				<?php foreach ($prefs as $e) { ?>
					<tr>
						<td><?php echo $e->event_id;?></td>
						<td><?php echo $e->event_name;?></td>
						<td><?php echo $e->event_venue;?></td>
						<td><?php echo $e->event_date_start;?></td>
						<td><a href="<?php echo site_url();?>/CEvent/displayEventDetails2/<?php echo $e->event_id;?>"><button id="<?php echo $e->event_id;?>">View</button></a></td>
					</tr>
				<?php } ?>
			<?php } ?>
		</tbody>
	</table>
</div>