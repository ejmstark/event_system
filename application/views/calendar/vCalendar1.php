<body>
	<nav class="navbar navbar-inverse">
            <div class="container container-fluid">
                <div class="navbar-header">
                    <a href="#" class="navbar-brand"><img src="<?php echo base_url('assets/josephAssets/img/DailyEvents.png" class="eventLogo')?>"></a>
                </div>

                <div class="container">
                    <ul class="nav navbar-navx navbar-right inline-navbar">
                        <li><a href="<?php echo site_url();?>/cLogin/viewDashboard">Home</a></li>
                        <li class="Active"><a href="<?php echo site_url();?>/cLogin/viewEvents">Events</a></li>
                        <li><a href="contact.html">Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </nav>
     <div class="content">
	    <div class="container">

	        <div class="row">
	            <div class="col-lg-12 text-center">

	                <div id="calendar" class="col-centered">
	                </div>
	            </div>

	        </div>
	        <!-- /.row -->

			<!-- Modal -->
			<div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog" role="document">
				<div class="modal-content">
				<form class="form-horizontal" method="POST" action="<?php echo site_url()?>/calendar/cCalendar/AddEvent">

				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Add Event</h4>
				  </div>
				  <div class="modal-body">

					  <div class="form-group">
						<label for="title" class="col-sm-2 control-label">Title</label>
						<div class="col-sm-10">
						  <input type="text" name="title" class="form-control" id="title" placeholder="Title" required="true">
						</div>
					  </div>

					  <div class="form-group">
						<label for="event_detail" class="col-sm-2 control-label">Details</label>
							<div class="col-sm-10">
								<textarea class="form-control" rows="5" name="event_detail" id="event_detail" placeholder="Event Details" required="true"></textarea>
							</div>
					  </div>

					  <div class="form-group">
						<label for="color" class="col-sm-2 control-label">Color</label>
						<div class="col-sm-10">
						  <select name="color" class="form-control" id="color">
						  	  <option value="">Choose</option>
							  <option style="color:#0071c5;" value="#0071c5">&#9724; Dark blue</option>
							  <option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquoise</option>
							  <option style="color:#008000;" value="#008000">&#9724; Green</option>
							  <option style="color:#FFD700;" value="#FFD700">&#9724; Yellow</option>
							  <option style="color:#FF0000;" value="#FF0000">&#9724; Red</option>
							  <option style="color:#000;" value="#000">&#9724; Black</option>

							</select>
						</div>
					  </div>
					  <div class="form-group">
						<label for="start" class="col-sm-2 control-label">Start date</label>
						<div class="col-sm-10">
						  <input type="text" name="start" class="form-control" id="start" readonly>
						</div>
					  </div>

					  <div class="form-group">
						<label for="end" class="col-sm-2 control-label">End date</label>
						<div class="col-sm-10">
						  <input type="text" name="end" class="form-control" id="end" readonly>
						</div>
					  </div>

					  <div class="form-group">
						<label for="event_category" class="col-sm-2 control-label">Category</label>
						<div class="col-sm-10">
						  <select name="event_category" class="form-control"  id="event_category" required="true">
							  <option value="-1">Choose Event Category ...</option>
							  <option value="Appearance">Appearance</option>
							  <option value="Attraction">Attraction</option>
							  <option value="Retreat">Retreat</option>
							  <option value="Training">Training</option>
							  <option value="Concert">Attraction</option>
							  <option value="Conference">Conference</option>
							  <option value="Convention">Convention</option>
							  <option value="Gala">Gala</option>
							  <option value="Festival">Festival</option>
							  <option value="Competition">Competition</option>
							  <option value="Meeting">Meeting</option>
							  <option value="Party">Party</option>
							  <option value="Rally">Rally</option>
							  <option value="Screening">Screening</option>
							  <option value="Seminar">Seminar</option>
							  <option value="Tour">Tour</option>
							  <option value="Other">Other</option>
							</select>
						</div>
					  </div>

					<div class="form-group">
						<label for="event_venue" class="col-sm-2 control-label">Venue</label>
						<div class="col-sm-10">
						  <input type="text" name="event_venue" class="form-control" id="event_venue" placeholder="Venue" required="true">
						</div>
					</div>

					<hr>
					<div class="modal-header">
						<h4 class="modal-title" id="myModalLabel">Ticket Details</h4>
				  	</div>
				  	<br>
					<div class="form-group">
						<label for="event_ticket_price" class="col-sm-2 control-label">Price</label>
						<div class="col-sm-10">
						  <input type="number" name="event_ticket_price" class="form-control" id="event_ticket_price" placeholder="Ticket Price" required="true">
						</div>
					</div>
					<div class="form-group">
						<label for="event_ticket_type" class="col-sm-2 control-label">Type</label>
						<div class="col-sm-10">
						  <input type="text" name="event_ticket_type" class="form-control" id="event_ticket_type" placeholder="Ticket Type (optional)">
						</div>
					</div>

					<div class="form-group">
						<label for="event_ticket_total_no" class="col-sm-2 control-label">Total Number</label>
						<div class="col-sm-10">
						  <input type="number" name="event_ticket_total_no" class="form-control" id="event_ticket_total_no" placeholder="Ticket Total Number" required="true">
						</div>
					</div>

					<div class="form-group">
						<label for="event_ticket_discount" class="col-sm-2 control-label">Discount</label>
						<div class="col-sm-10">
						  <input type="number" name="event_ticket_discount" class="form-control" id="event_ticket_discount" placeholder="Ticket Discount" required="true">
						</div>
					</div>


				  </div>
				  <div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save changes</button>
				  </div>
				</form>
				</div>
			  </div>
			</div>



			<!-- Modal -->
			<div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

			</div>

			<?php
			foreach($event_data as $data){


				echo "<br>";
			}

			// echo date("Ymd",strtotime("-12days",strtotime(20171022)));

			?>

	    </div>
	    <!-- /.container -->

































<script >

	$(document).ready(function() {

		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek'
			},
			defaultDate: "<?php date_default_timezone_set('UTC'); echo date('d/M/Y'); ?>",
			editable: true,
			eventLimit: true, // allow "more" link when too many events
			selectable: true,
			displayEventTime: true,
			timeFormat: 'hh:mm a:',
			selectHelper: true,
			select: function(start, end) {
				// $('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
				// $('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD HH:mm:ss'));
				// $('#ModalAdd').modal('show');
					var startDate = moment(start).format('YYYY/MM/DD');
					var endDate = moment(end).format('YYYY/MM/DD');
					var startTime = moment(start).format('hh:mm A');
					var endTime = moment(end).format('hh:mm A');

					var dataSet = "startDate="+startDate+"&startTime="+startTime+"&endDate="+endDate+"&endTime="+endTime;
					$.ajax({
						type: "POST",
						url: '<?php echo site_url()?>/event/cEvent/viewCreateFromCalendar',
						data: dataSet,
						cache: false,
						success: function(result){
							// if(result=="error"){
								// $('#ModalEdit').html(result);
								// $('#ModalEdit').modal('show');
							// }else{
								// alert("Error");
							// }
							//alert(result);
							$('body').html(result);
						},
						error: function(jqXHR, errorThrown){
							console.log(errorThrown);
						}
					});
			},

			eventDrop: function(event, delta, revertFunc) { //
				edit(event);
			},
			eventResize: function(event,dayDelta,minuteDelta,revertFunc) { //
				edit(event);
			},
			events: [
				<?php foreach($event_data as $events):

					$start = explode(" ", $events->event_date_start);
					$end = explode(" ", $events->event_date_end);
					if($start[1] == '00:00:00'){
						$start = $start[0];
					}else{
						$start = $events->event_date_start;
					}
					if($end[1] == '00:00:00'){
						$end = $end[0];
					}else{
						$end = $events->event_date_end;
					}
					  // date_default_timezone_set('Singapore');
					  $date_now = new DateTime();
 					  $date2    = new DateTime($end);
					  $date3 = new DateTime($start);
					  $newColor;
				?>
				{
					id: '<?php echo $events->event_id; ?>',
					title: '<?php echo $events->event_name; ?>',
					start: '<?php echo $start; ?>',
					end: '<?php echo $end; ?>',
					color: '<?php
						if($date_now>$date2){
							echo $newColor = "#808080";
						}else{
							$difference = $date_now->diff($date3);
							$difference = (int) $difference->d;
							if($difference>5){
								echo $newColor = $events->color;
							}else{
								echo $newColor = "#ffae00";
							}
						}
					?>',
				},
				<?php endforeach; ?>
			]
		});
		function edit(event){
			start = event.start.format('YYYY-MM-DD HH:mm:ss');
			if(event.end){
				end = event.end.format('YYYY-MM-DD HH:mm:ss');
			}else{
				end = start;
			}
			id =  event.id;
			Event = [];
			Event[0] = id;
			Event[1] = start;
			Event[2] = end;
			$.ajax({
			 url: '<?php echo site_url()?>/calendar/cCalendar/ajaxUpdate',
			 type: "POST",
			 data: {Event:Event},
			 success: function(rep) {


			 		location.reload();

				}
			});
		}
	});
</script>
