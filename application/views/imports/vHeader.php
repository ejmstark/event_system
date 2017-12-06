<!doctype html>
<html lang="en">
	 <head> 
      <meta charset = "utf-8"> 
      <title>Event System</title> 
       
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.2/css/bootstrap-select.min.css" />
	<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.2/js/bootstrap-select.min.js"></script>


	<!-- FullCalendar -->
	<script  src="<?php echo base_url(); ?>assets/jsKyleAssets/moment.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.5.1/fullcalendar.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.5.1/fullcalendar.js"></script>
    
         
   </head>
<body>
	    <div class="sidebar">
	    	<div class="sidebar-wrapper">
				<ul class="nav">
				  <li id = "dash">
	                    <a href="<?php echo site_url();?>/cLogin/viewDashBoard">
	                         <i class="material-icons"></i>
	                        <p>Dashboard</p>
	                    </a>
	                </li>

	                <li id = "admin">
	                   <a href="<?php echo site_url();?>/admin/cAdmin">
	                         <i class="fa fa-users"></i>
			        			Admin
			        	</a>
	                </li>

	                <li id = "cal">
	                     <a href="<?php echo site_url();?>/calendar/cCalendar">
	                        <i class="fa fa-book "></i>
	                        Calendar
	                    </a>
	                </li>
	                <li id = "fin">
	                    <a href="<?php echo site_url();?>/finance/cFinance">
	                       <i class="fa fa-location-arrow"></i>
	                        Finance
	                    </a>
	                </li>
	                <li id = "rep">
	                    <a href="<?php echo site_url();?>/reports/cReports">
	                       <i class="fa fa-location-arrow"></i>
	                        Report
	                    </a>
	                </li>
					<li id = "sec">
	                    <a href="<?php echo site_url();?>/security/cSecurity">
	                       <i class="fa fa-location-arrow"></i>
	                        Security
	                    </a>
	                </li>
					<li id = "user">
	                    <a href="<?php echo site_url();?>/user/cUser">
	                       <i class="fa fa-location-arrow"></i>
	                        User
	                    </a>
	                </li>


	            </ul>
	    	</div>
		</div>


	 