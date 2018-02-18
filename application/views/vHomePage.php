	<div class="container-box">
		<div class="container-content"></div>
		<div class="container">
			<div class="col-md-12">
				<div class="row">
					<div class="list-of-events"  id="targ2">
						<?php
	                    	$cnt =1;
	                        if(isset($events)){
	                            foreach ($events as $event) {
	                    ?>
		                            <div class="event-box">
					        		 	<a href="<?php echo site_url();?>/event/cEvent/displayEventDetails/<?php echo $event->event_id;?>">
					                		<div class="event-box-overlay">
						                		<span class="fa-stack fa-lg">
						    						<i class="glyphicon glyphicon-eye-open"></i>
												</span>
											</div>
											<div class = "event">
												<img src="<?php echo base_url();?><?php echo $event->event_picture; ?>">
												<div class = "event-description">
													<div class = "event-date-category">
														<span><?php echo $event->dateStart;?> </span>
														<span class = "event-category"><?php echo $event->event_category;?> </span>
													</div>
													<div class = "event-name">
														<span>
															<?php
				                                                if(strlen($event->event_name)>=42){
				                                                    echo substr($event->event_name,0,39)."...";
				                                                }else{
				                                            	    echo $event->event_name;
				                                                }
				                                            ?>
			                                            </span>
													</div>
													<div class = "event-location">
														<div class="location-icon"></div>
														<span><?php echo $event->event_venue.', '.$event->location[0]->location_name.', '.$event->location[0]->region_code.'';?></span>
													</div>
												</div>
											</div>
										</a>
									</div>
	                    <?php
	                            }
	                        }
	                    ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
