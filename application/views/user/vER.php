<div class="content">
	<h1>EVENT DETAILS PREFRENCE</h1>
		<?php foreach ($events as $e) { ?>
			<table>
				<thead>
					<tr>
						<th>Name</th>
						<td>Container</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<th>Event ID</th>
						<td><?php echo $e->event_id; ?></td>
					</tr>
					<tr>
						<th>Event Name</th>
						<td><?php echo $e->event_name; ?></td>
					</tr>
					<tr>
						<th>Event Category</th>
						<td><?php echo $e->event_category; ?></td>
					</tr>
					<tr>
						<th>Event Details</th>
						<td><?php echo $e->event_details; ?></td>
					</tr>
					<tr>
						<th>Event Date Start</th>
						<td><?php echo $e->event_date_start; ?></td>
					</tr>
					<tr>
						<th>Event Date End</th>
						<td><?php echo $e->event_date_end; ?></td>
					</tr>
					<tr>
						<th>Event Venue</th>
						<td><?php echo $e->event_venue; ?></td>
					</tr>
					<tr>
						<th>Event Organizer	</th>
						<td><?php foreach ($users as $a) {
							# code...
							echo $a->first_name," ",$a->middle_initial,". ",$a->last_name ;   
						
						}  ?></td>
					</tr>
					
				</tbody>
			</table>
		<?php } ?>
	