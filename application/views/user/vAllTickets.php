<div class="content">
	<h1>MY TICKETS</h1>
	<table>
		<thead>
			<tr>
				<th>Event Name</th>
				<th>Event Ticket Type</th>
				<th>Quantity</th>
				<th>Event Date</th>
				<th>Event Venue</th>
				<th>Option</th>

			</tr>
		</thead>
		<tbody>
			<?php if (isset($tickets)) {?>
				<?php foreach ($tickets as $e) { ?>
					<tr>
						<td><?php echo $e->event_name;?></td>
						<td><?php echo $e->ticket_name;?></td>
						<td>1</td>
						<td><?php echo $e->event_date_start;?></td>
						<td><?php echo $e->event_venue;?></td>
						<td><a href="<?php echo site_url();?>/user/cEvent/displayEventDetails2/<?php echo $e->event_id;?>"><button id="<?php echo $e->event_id;?>">View</button></a></td>
					</tr>
				<?php } ?>
			<?php } ?>
		</tbody>
	</table>
</div>