<body>
	<form id="createEventForm" action="<?php echo base_url("index.php/event/cEvent/createEvent")?>" method="post">
		<label>Date Start&nbsp;</label>
		<input name="event_date_start" type="date" min="<?php echo date('Y-m-d')?>" required/><br/>
		<label>Date End&nbsp;</label>
		<input name="event_date_end" type="date" min="<?php echo date('Y-m-d')?>" required/><br/>
		<label>Total Tickets&nbsp;</label>
		<input name="no_tickets_total" type="number" min="10" required/><br/>
		<label>Event name&nbsp;</label>
		<input name="event_name" type="text" maxlength="50" required/><br/>
		<label>Event details&nbsp;</label>
		<input name="event_details" type="text"/><br/>
		<label>Event category&nbsp;</label>
		<select name="event_category" required>
			<option>Attraction</option>
			<option>Appearance</option>
			<option>Competition</option>
			<option>Concert</option>
			<option>Conference</option>
			<option>Convention</option>
			<option>Festival</option>
			<option>Gala</option>
			<option>Meeting</option>
			<option>Party</option>
			<option>Rally</option>
			<option>Retreat</option>
			<option>Screening</option>
			<option>Seminar</option>
			<option>Tour</option>
			<option>Others</option>
		</select><br>
		<label>Address</label>
	    <input type="text" id="address" name="event_venue" required>
		<div id="map" style="width:100%;height:500px"></div><br/>
		<input id="submit" type="submit" value="Submit">
	</form>
</body>
