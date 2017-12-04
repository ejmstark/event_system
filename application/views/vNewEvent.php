<!DOCTYPE html>
<html lang = "en">
<head>


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
                    <a class="navbar-brand" href="index-5.html"><img src="<?php echo base_url('assets/dianeAssets/img/logoBlack.png')?>"></a>
                </div>

                <div class="collapse navbar-collapse yamm" id="navigation">
                    <div class="button navbar-right">
                        <button class="navbar-btn nav-button wow bounceInRight login"> <a href ="<?php echo site_url();?>/cLogin/userLogout" data-wow-delay="0.1s">Logout </a></button>
                    </div>

                    <div class="button navbar-right">
                        <button class="navbar-btn nav-button wow bounceInRight login"> <a href ="<?php echo site_url();?>/event/cEvent/viewCreateEvent" data-wow-delay="0.4s">Create Event </a></button>
                    </div>


                    <ul class="main-nav nav navbar-nav navbar-right">
                        <li class="wow fadeInDown" data-wow-delay="0.1s"><a href="<?php echo site_url();?>/cLogin/viewDashBoard">Home</a></li>

                        <li class="wow fadeInDown" data-wow-delay="0.1s"><a href="<?php echo site_url();?>/event/cEvent/viewEvents">Profile</a></li><!--
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
                        <h1 class="page-title">Create Event</h1>
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
                            <form action="<?php echo site_url();?>/event/cEvent/createEvent " method="post">
                                <div class="form-group">
                                    <label for="name">Event Title</label>
                                    <input type="text" class="form-control" name="event_name" required="">
                                </div>
                                <div class="form-group">
                                    <label for="name">Location</label>
                                    <input type="text" class="form-control" name="event_venue" required="">
                                </div>

                                <div class="form-group">
                                    <label for="name">STARTS</label>
                                    <input  class="form-control" type="text"  value="<?php if(!empty($start_date)){
                                        echo $start_date." ".$start_time;
                                    }else{
                                        echo "";
                                    };
                                    ?>" name="dateStart" id="datetimepicker1" required="">

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
                                    <input  class="form-control" type="text" value="<?php if(!empty($end_date)){
                                        echo $end_date." ".$end_time;
                                    }else{
                                        echo "";
                                    };
                                    ?>" name="dateEnd" id="datetimepicker2" required="">

                                    <script>
                                        $("#datetimepicker2").datetimepicker();
                                    </script>
                                </div>


                                <div class="form-group">
                                    <label for="email">Category</label>
                                        <select Class="form-control" name="event_category" required>
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
                                        </select>
                                </div>

                                <div class="form-group">
                                    <label for="name">Event Description</label>
                                    <input type="text" class="form-control" name="event_details" required="">
                                </div>



                <div class='input-group date' id='datetimepicker1'>
                    <input type='text' class="form-control" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>

                                <br>
                                <h2>Ticket Details : </h2>
                                 <div class="ticketContainer">
                                    <span>TICKET TYPE </span> <br>
                                    <div class="select-field">
                                         <input type="text" class="form-control" required="" name="ticketType1" placeholder="Ticket type">
                                       <!--  <select name="ticketType">
                                            <option value="">Free</option>
                                            <option value="">VIP</option>
                                        </select> -->
                                    </div>
                                </div>
                                <div class="ticketContainer">
                                    <span>NUMBER OF TICKETS</span>
                                    <div class="select-field">
                                        <input type="number" class="form-control" min="1" required="" name="no_tickets_total1" placeholder="Ticket count">
                                    </div>
                                </div>
                                <div class="ticketContainer">
                                    <span>PRICE OF TICKET</span>
                                    <div class="select-field">
                                        <input type="number" class="form-control" min="0" required="" name="price_tickets_total1" placeholder="Ticket price">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name">Uplaod Photo</label>
                                    <input type="text" class="form-control" name="upload_photo" required="">
                                    <php? echo $error;?>
                                    <? echo form_open_multipart(cUploadPhoto/upload);?>
                                    <input type="file" name="attachments[1][uploaded_data]">
                                </div>


                                <br><br>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-default" value="Create Event"><!-- <a href="<?php echo site_url();?>/cLogin/viewEvents"> -->Register</button>
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
                                <li><a class="wow fadeInUp animated" href="#" data-wow-delay="0.2s">Home</a></li>
                                <li><a class="wow fadeInUp animated" href="#" data-wow-delay="0.3s">Events</a></li>
                                <li><a class="wow fadeInUp animated" href="#" data-wow-delay="0.6s">Contact</a></li>
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
