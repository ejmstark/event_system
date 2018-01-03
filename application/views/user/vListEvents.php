<div class="content">
	<h1>EVENTS</h1>
	<table>
		<thead>
			<tr>
				<th>Event ID</th>
				<th>Event Name</th>
				<th>Event Date Start</th>
				<th>Event Status</th>
				<th>Event Venue</th>
				<th>Event Category</th>
				<th>Option</th>

			</tr>
		</thead>
		<tbody>
			<?php if (isset($events)) {?>
				<?php foreach ($events as $e) { ?>
					<tr>
						<td><?php echo $e->event_id;?></td>
						<td><?php echo $e->event_name;?></td>
						<td><?php echo $e->event_date_start;?></td>
						<td><?php echo $e->event_status;?></td>
						<td><?php echo $e->event_venue;?></td>
						<td><?php echo $e->event_category;?></td>
						<td>
							<a href="<?php echo site_url();?>/user/cEvent/displayEventDetails/<?php echo $e->event_id;?>"><button id="<?php echo $e->event_id;?>">View</button></a>
							<a href="<?php echo site_url();?>/event/cEvent/deleteEvent/<?php echo $e->event_id;?>"><button id="<?php echo $e->event_id;?>">Delete</button></a>
						</td>
					</tr>
				<?php } ?>
			<?php } ?>
		</tbody>
	</table>
</div>