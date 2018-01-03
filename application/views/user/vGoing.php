
<div class="content">
	<h1>BUY TICKETS</h1>
	<form method="POST" action="<?php echo site_url();?>/user/cEvent/buyTickets">
		<label>Quantity :</label>
		<input type="number" name="qty" placeholder="Enter Quantity" required=""> <br> <br>
		<label>Select Ticket Type: </label>
		<select name="type" required="">
			<option hidden="">Select One	</option>
			<?php if (isset($tickets)) {?>
				<?php foreach ($tickets as $t) { ?>
					<option value='<?php echo $t->ticket_type_id;?>' > <?php echo $t->ticket_name;?> </option>

				<?php } ?>
				<input type="number" name="eid" value="<?php echo $t->event_id;?>" hidden=""> 
			<?php } ?>
		</select> <br> <br>

		<button type="submit">Buy</button>
	</form>
</div>
