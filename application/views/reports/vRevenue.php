<div class="content">
	<?php if(isset($revenue)){?>
		<?php foreach ($revenue as $r ){ ?>
			<label>TOTAL REVENUE: </label>
			<?php echo $r->REVENUE ;?> <br> <br>
			<lanel>TOTAL TICKETS SOLD: </label>
			<?php echo $r->TOTAL_TICKET_SOLD ;?> <br> <br>
		<?php } ?>
	<?php } ?>
</div>