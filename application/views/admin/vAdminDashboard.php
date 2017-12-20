
<div id="main">

	<ol class="breadcrumb">
			<li><a href="#">Home</a></li>
			<li class="active">Events</li>
	</ol>
	<!-- //breadcrumb-->

	<div id="content">
		<div class="row">
			<div class="col-lg-12">
				<section class="panel">
						<div class="widget-clock">
								<div id="clock"></div>
						</div>
				</section>
			</div>

			<div class="col-lg-12" >
				<section class="panel corner-flip">
					<div class="widget-chart bg-lightseagreen bg-gradient-green">
						<div id="reportrange" class="pull-right" style="background: rgba(255,255,255,0.3); color:#FFF; cursor: pointer; padding: 5px 10px 10px; margin-top:5px;">
						</div>
						<h2>Registered Users</h2>
						<table class="flot-chart" data-type="lines" data-tick-color="rgba(255,255,255,0.2)" data-width="100%" data-height="220px">
							<thead>
								<tr>
									<th></th>
									<th style="color : #FFF;">Test</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<th>SY 2014-2015</th>
									<td>60</td>
								</tr>

								<tr>
									<th>SY 2015-2016</th>
									<td>30</td>
								</tr>
								<tr>
									<th>SY 2016-2017</th>
									<td>30</td>
								</tr>
								<tr>
									<th>SY 2017-2018</th>
									<td>20</td>
								</tr>
								<tr>
									<th>SY 2018-2019</th>
									<td>50</td>
								</tr>
									
							</tbody>
						</table>
					</div>		
				</section>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-12">
				<section class="panel">
					<header class="panel-heading">
						<h2><strong>Event</strong> Management</h2>
					</header>
                  	<div class="panel-body">
						<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-hover" data-provide="data-table" id="toggle-column table-example">
		                    <thead>
		                        <tr>
		                          <th>#</th>
		                          <th>Name</th>
		                          <th>Time</th>
		                          <th>Tickets Sold</th>
		                          <th>Status</th>
		                          <th>Options</th>
		                        </tr>
		                    </thead>
		                    <tbody>
		                        <?php
		                            if($row!=FALSE){
		                                foreach ($row as $object) {
		                            		echo  "<tr>
                                            <td>".$object->event_id."</td>
                                            <td>".$object->event_name."</td>
                                            <td>".$object->event_date_start." to ".$object->event_date_end."</td>
			                                <td>".$object->no_tickets_total."</td>
			                                <td>".$object->event_status."</td>";

				                            if($object->event_status == "Pending"){
				                              echo " <td><a href='".site_url()."/CAdmin/approveEvent/".$object->event_id."'>
				                                  <button  type='button' class='btn btn-success'>APPROVE</button></a>
				                                  <a href='".site_url()."/CAdmin/rejectEvent/".$object->event_id."'>
				                                  <button  type='button' class='btn btn-danger'>REJECT</button></a>
				                                  </td>
                                        		  </tr>";
				                            }else {
				                              echo " <td>
				                                  You have ".$object->event_status." this event.
				                                  </td>
				                                  </tr>";
				                            }
		                          		}
		                            }
		                        ?>
		                    </tbody>
                 		</table>
                	</div>
            	</section>
        	</div>
		</div>
	</div>
</div>