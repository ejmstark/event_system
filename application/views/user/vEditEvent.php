
    <body>
    
            <div id="preloader">
                <div id="status">&nbsp;</div>
            </div>
            <!-- Body content -->
    
            <nav class="navbar navbar-default ">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navigation">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="<?php echo site_url();?>/cLogin/viewDashBoard"><img src="<?php echo base_url('assets/dianeAssets/img/logoBlack.png')?>"></a>
                    </div>
    
                    <div class="collapse navbar-collapse yamm" id="navigation">
                        <div class="button navbar-right">
                        <a href ="<?php echo site_url();?>/cLogin/userLogout" data-wow-delay="0.1s"><button class="navbar-btn nav-button wow bounceInRight login"> Logout </button></a>
                        </div>
    
                        <div class="button navbar-right">
                            <a href ="<?php echo site_url();?>/event/cEvent/viewCreateEvent" data-wow-delay="0.4s"><button class="navbar-btn nav-button wow bounceInRight login"> Create Event </button></a>
                        </div>
                        
    
                        <ul class="main-nav nav navbar-nav navbar-right">
                        <li class="wow fadeInDown" data-wow-delay="0.1s"><a href="<?php echo site_url();?>/cLogin/viewDashBoard">Home</a></li>

                        <li class="wow fadeInDown" data-wow-delay="0.1s"><a href="<?php echo site_url();?>/event/cEvent/viewEvents">Profile</a></li>
                        <li class="wow fadeInDown" data-wow-delay="0.1s"><a href="<?php echo site_url();?>/user/cUser/viewAnnouncements">Announcements</a></li>
                        <li class="wow fadeInDown" data-wow-delay="0.1s"><a href="<?php echo site_url();?>/finance/cCart/viewCart">View Cart</a></li>
                        <!--
                        <li class="wow fadeInDown" data-wow-delay="0.1s"><a href ="<?php echo site_url();?>/event/cEvent/viewCreateEvent" >Contact</a></li>
                        <li class="wow fadeInDown" data-wow-delay="0.1s"><a href ="#" >Profile</a></li> -->
                    </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
            <!-- End of nav bar -->
    
    
            <div class="page-head"> 
                <div class="container">
                    <div class="row">
                        <div class="page-head-content">
                            <h1 class="page-title">Edit your Event</h1>               
                        </div>
                    </div>
                </div>
            </div>
            <!-- End page header -->
     
    
            <!-- register-area -->
            <div class="register-area" style="background-color: rgb(249, 249, 249);">
                <div class="container">
    
                    <div class="col-md-6">
                        <div class="box-for overflow">
                            <div class="col-md-12 col-xs-12 register-blocks">
                                <h2>Event Details : </h2> 
                                <form action="<?php echo site_url();?>/event/cEvent/updateEvent " method="post">
                                    <input type="text" name="event_id" value="<?php echo $ev->event_id;?>" hidden>
                                    <div class="form-group">
                                        <label for="name">Event Title</label>
                                        <input type="text" value="<?php echo $ev->event_name;?>" class="form-control" name="event_name" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Location</label>
                                        <input type="text" value="<?php echo $ev->event_venue;?>" class="form-control" name="event_venue" required="">
                                    </div>
    
                                    <div class="form-group">
                                        <label for="name">STARTS</label>
                                        <input  class="form-control" type="text"  value="<?php echo $ev->event_date_start;?>" name="event_date_start" id="datetimepicker1" required="">
    
                                        <script>
                                            $("#datetimepicker1").datetimepicker();
                                        </script>
    
                                        <!-- <div class="timeContainer">
                                            <input type="text" id="date1" name="event_date_start" placeholder="Date Start">
                                        </div>
                                        <div class="timeContainer">
                                            <input type="text" id="time1" name="event_time_start" placeholder="Event starts">
                                        </div> -->
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="name">ENDS</label>
                                        <input  class="form-control" type="text" value="<?php echo $ev->event_date_end;?>" name="event_date_end" id="datetimepicker2" required="">
    
                                        <script>
                                            $("#datetimepicker2").datetimepicker();
                                        </script>
                                    </div>
    
     
                                    <div class="form-group">
                                        <label for="email">Category</label>
                                            <select class="form-control" value="<?php echo $ev->event_category;?>" name="event_category" required>
                                                <option value="Attraction" <?php if($ev->event_category == 'Attraction'){ echo 'selected="selected"';}?>>Attraction</option>
                                                <option value="Competition" <?php if($ev->event_category == 'Competition'){ echo 'selected="selected"';}?>>Competition</option>
                                                <option value="Concert" <?php if($ev->event_category == 'Concert'){ echo 'selected="selected"';}?>>Concert</option>
                                                <option value="Conference" <?php if($ev->event_category == 'Conference'){ echo 'selected="selected"';}?>>Conference</option>
                                                <option value="Convention" <?php if($ev->event_category == 'Convention'){ echo 'selected="selected"';}?>>Convention</option>
                                                <option value="Festival" <?php if($ev->event_category == 'Festival'){ echo 'selected="selected"';}?>>Festival</option>
                                                <option value="Gala" <?php if($ev->event_category == 'Gala'){ echo 'selected="selected"';}?>>Gala</option>
                                                <option value="Meeting" <?php if($ev->event_category == 'Meeting'){ echo 'selected="selected"';}?>>Meeting</option>
                                                <option value="Party" <?php if($ev->event_category == 'Party'){ echo 'selected="selected"';}?>>Party</option>
                                                <option value="Rally" <?php if($ev->event_category == 'Rally'){ echo 'selected="selected"';}?>>Rally</option>
                                                <option value="Retreat" <?php if($ev->event_category == 'Retreat'){ echo 'selected="selected"';}?>>Retreat</option>
                                                <option value="Screening" <?php if($ev->event_category == 'Screening'){ echo 'selected="selected"';}?>>Screening</option>
                                                <option value="Seminar" <?php if($ev->event_category == 'Seminar'){ echo 'selected="selected"';}?>>Seminar</option>
                                                <option value="Tour" <?php if($ev->event_category == 'Tour'){ echo 'selected="selected"';}?>>Tour</option>
                                                <option value="Others" <?php if($ev->event_category == 'Others'){ echo 'selected="selected"';}?>>Others</option>
                                            </select>
                                    </div>
    
                                    <div class="form-group">
                                        <label for="name">Event Description</label>
                                        <textarea class="form-control" name="event_details" required="" rows="3"><?php echo $ev->event_details;?></textarea>
                                    </div>
    
        
        
                    <!--<div class='input-group date' id='datetimepicker1'>
                        <input type='text' class="form-control" />
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>-->
         
                    <h2>Ticket Details : </h2> 
          
    
    
                                    <br>
                                    <?php $x = 0; ?>
                                    <?php foreach($ti as $t) { ?>

                                    <input type="text" name="<?php echo 'ticketID'.$x;?>" value="<?php echo $t->ticket_type_id;?>" hidden>
                                     <div class="ticketContainer">
                                        <span>TICKET TYPE </span>
                                        <i>(e.g. Genral Admission, Gold, Silver, VIP)</i> <br>
                                        <div class="select-field">
                                             <input type="text" value="<?php echo $t->ticket_name;?>" class="form-control" required="" name="<?php echo 'ticketType'.$x; ?>" placeholder="Ticket type"> 
                                           <!--  <select name="ticketType">
                                                <option value="">Free</option>
                                                <option value="">VIP</option>
                                            </select> -->
                                        </div>
                                    </div>
                                    <div class="ticketContainer">
                                        <span>NUMBER OF TICKETS</span>
                                        <div class="select-field">  
                                            <input type="number" value="<?php echo $t->ticket_count;?>" class="form-control" min="1" required="" name="<?php echo 'no_tickets_total'.$x; ?>" placeholder="Ticket count"> 
                                        </div>
                                    </div>
                                    <div class="ticketContainer">
                                        <span>PRICE OF TICKET</span>
                                        <div class="select-field">  
                                            <input type="number" value="<?php echo $t->price;?>" class="form-control" min="0" required="" name="<?php echo 'price_tickets_total'.$x; ?>" placeholder="Ticket price"> 
                                        </div>
                                    </div>
                                        
                                    
                                    <br><br>
                                    <?php $x++; } ?>
                                    <!-- <input type="text"  name="totalshit" value="<?php //echo $x; ?>"> -->

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-default" value="Create Event"><!-- <a href="<?php echo site_url();?>/cLogin/viewEvents"> -->Edit</button>
                                    </div>
                                        
                                    <br><br>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>      
    
             <!-- Footer area-->
            <div class="footer-area">
    
                <div class=" footer">
                    <div class="container">
                        <div class="row">
    
                            <div class="col-md-3 col-sm-6 wow fadeInRight animated">
                                <div class="single-footer">
                                    <h4>About us </h4>
                                    <div class="footer-title-line"></div>
    
                                   <img src= "<?php echo base_url('assets/dianeAssets/img/logoBlack.png')?>" alt="" class="wow pulse" data-wow-delay="1s" >
                                    <p>We help you reach out to the most interesting events anywhere they may be. The events you’ve always wanted to join and create will be in your hands with just a few clicks. Worry not because we’re here to help you discover the latest events this planet will ever have.</p>
                                    
                                </div>
                            </div>
                        
                            <div class="col-md-3 col-sm-6 wow fadeInRight animated">
                                <div class="single-footer news-letter">
                                    <h4>Contact Us</h4>
                                    <div class="footer-title-line"></div>
                                    <ul class="footer-adress">
                                        <li><i class="pe-7s-mail strong"> </i> dailyEvents@gmail.com</li>
                                        <li><i class="pe-7s-call strong"> </i> 253-2753</li>
                                    </ul>
    
                                </div>
                            </div>
    
                        </div>
                    </div>
                </div>
    
                <div class="footer-copy text-center">
                    <div class="container">
                        <div class="row">
                            <div class="pull-left">
                                <span> (C) UI Module , All rights reserved 2017  </span> 
                            </div> 
                            <div class="bottom-menu pull-right"> 
                                <ul> 
                                    <li><a class="wow fadeInUp animated" href="<?php echo site_url();?>/cLogin/viewDashBoard" data-wow-delay="0.2s">Home</a></li>
                                </ul> 
                            </div>
                        </div>
                    </div>
                </div>
    
            </div>
    
    
            
            <script type="text/javascript">
                $("#datetime").datepicker();
            </script>
            
            <script type="text/javascript">
                $("#date1").datepicker();
            </script>
            <script type="text/javascript">
                $("#date2").datepicker();
            </script>
            <script type="text/javascript">
                $('#time1').timepicker();
            </script>
            <script type="text/javascript">
                $('#time2').timepicker();
            </script>
    
              <script type="text/javascript">
                $(function () {
                    $('#datetimepicker1').datetimepicker();
                });
            </script>