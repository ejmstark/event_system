<?php
  require('assets/CustomizationManager.php');
  CustomizationManager::SetTheme("configurations 0");
?>
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

                    <a class="navbar-brand" href="<?php echo site_url();?>/cLogin/viewDashBoard"><img src="<?php echo base_url(CustomizationManager::$images->LOGO_DARK)?>"></a>
                </div>

                <div class="collapse navbar-collapse yamm" id="navigation">
                    <div class="button navbar-right">
                        <button class="navbar-btn nav-button wow bounceInRight login"> <a href ="<?php echo site_url();?>/cLogin/userLogout" data-wow-delay="0.1s"><?php echo CustomizationManager::$strings->NEW_EVENT_PAGE_CREATE_EVENT_BUTTON ?> </a></button>
                    </div>

                    <div class="button navbar-right">
                        <button class="navbar-btn nav-button wow bounceInRight login"> <a href ="<?php echo site_url();?>/event/cEvent/viewCreateEvent" data-wow-delay="0.4s"><?php echo CustomizationManager::$strings->NEW_EVENT_PAGE_LOGOUT_BUTTON ?> </a></button>
                    </div>


                    <ul class="main-nav nav navbar-nav navbar-right">
                        <li class="wow fadeInDown" data-wow-delay="0.1s"><a href="<?php echo site_url();?>/cLogin/viewDashBoard"><?php echo CustomizationManager::$strings->NEW_EVENT_PAGE_NAV_HOME ?></a></li>
                        <li class="wow fadeInDown" data-wow-delay="0.1s"><a href="<?php echo site_url();?>/event/cEvent/viewEvents"><?php echo CustomizationManager::$strings->NEW_EVENT_PAGE_NAV_PROFILE ?></a></li>
                        <li class="wow fadeInDown" data-wow-delay="0.1s"><a href="<?php echo site_url();?>/user/cUser/viewAnnouncements">Announcements</a></li>
                        <li class="wow fadeInDown" data-wow-delay="0.1s"><a href="<?php echo site_url();?>/event/cEvent/viewPreferenceEvents">Interested Events</a></li>
                        <li class="wow fadeInDown" data-wow-delay="0.1s"><a href="<?php echo site_url();?>/finance/cCart/viewCart">View Cart</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <!-- End of nav bar -->


        <div class="page-head">
            <div class="container">
                <div class="row">
                    <div class="page-head-content">
                        <h1 class="page-title"><?php echo CustomizationManager::$strings->NEW_EVENT_PAGE_TITLE ?></h1>
                    </div>
                </div>
            </div>
        </div>
        <!-- End page header -->


        <!-- register-area -->
        <div class="register-area" style="background-color: rgb(249, 249, 249);">
            <div class="container">
                <div class="col-md-3"></div>
                <div class="col-md-6 ">
                    <div class="box-for overflow">
                        <div class="col-md-12 col-xs-12 register-blocks">
                            <h2><?php echo CustomizationManager::$strings->NEW_EVENT_PAGE_DETAILS ?></h2>
                            <form action="<?php echo site_url();?>/event/cEvent/createEvent " method="post" accept-charset="utf-8" enctype="multipart/form-data">
                                <div class="form-group">
                                    <!-- <label for="name">Event Picture</label> -->
                                    <label for="name"><?php echo CustomizationManager::$strings->NEW_EVENT_PAGE_EVENT_PICTURE ?></label>
                                   <input type="file" name="userfile"  id="fileToUpload" accept="image/*">
                                </div>
                                <div class="form-group">

                                    <!-- <label for="name">Event Title</label> -->
                                    <label for="name"><?php echo CustomizationManager::$strings->NEW_EVENT_PAGE_EVENT_TITLE ?></label>
                                    <input type="text" class="form-control" name="event_name" required="">
                                </div>

                                <div class="form-group">
                                    <!-- <label for="name">Location</label> -->
                                    <label for="name"><?php echo CustomizationManager::$strings->NEW_EVENT_PAGE_EVENT_LOCATION ?></label>
                                    <input type="text" class="form-control" name="event_venue" required="">
                                </div>

                                <!-- Added a location_code -->
                                <div class="form-group">

                                    <!-- <label for="email">Location_code</label> -->
                                    <label for="region_code">Region Code</label>
                                        <select Class="form-control" id="region_code" name="region_code" required>
                                            <option></option>
                                            <option>NCR</option>
                                            <option>CAR</option>
                                            <option>MIMAROPA</option>
                                            <option>ARMM</option>
                                            <option>Region I</option>
                                            <option>Region II</option>
                                            <option>Region III</option>
                                            <option>Region IV-A</option>
                                            <option>Region V</option>
                                            <option>Region VI</option>
                                            <option>Region VII</option>
                                            <option>Region VIII</option>
                                            <option>Region IX</option>
                                            <option>Region X</option>
                                            <option>Region XI</option>
                                            <option>Region XII</option>
                                            <option>Region XIII</option>
                                        </select>
                                </div>

                                <!-- Added a city group -->
                                <div class="form-group">

                                    <!-- <label for="email">Location_code</label> -->
                                    <label for="municipal-name">CITY/MUNICIPAL</label>
                                        <select Class="form-control" id="municipal-name" name="municipal-name" required>
                                            <option></option>
                                        </select>
                                </div>

                                <div class="form-group">
                                    <!-- <label for="name">STARTS</label> -->
                                    <label for="name"><?php echo CustomizationManager::$strings->NEW_EVENT_PAGE_EVENT_START ?></label>
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

                                    <!-- <label for="name">ENDS</label> -->
                                    <label for="name"><?php echo CustomizationManager::$strings->NEW_EVENT_PAGE_EVENT_END ?></label>
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

                                    <!-- <label for="email">Category</label> -->
                                    <label for="email"><?php echo CustomizationManager::$strings->NEW_EVENT_PAGE_EVENT_CATEGORY ?></label>
                                        <select Class="form-control" name="event_category" required>
                                            <option></option>
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
                                    <label for="name"><?php echo CustomizationManager::$strings->NEW_EVENT_PAGE_EVENT_DESCRIPTION ?></label>
                                    <textarea class="form-control" name="event_details" required="" rows="3"></textarea>
                                </div>
                                <br>
                                <h2><?php echo CustomizationManager::$strings->NEW_EVENT_PAGE_TICKET_DETAILS ?></h2>
                                 <div class="ticketContainer">
                                    <!-- <span>TICKET TYPE </span> <br> -->
                                    <span><?php echo CustomizationManager::$strings->NEW_EVENT_PAGE_TICKET_TYPE ?></span> <br>
                                    <div class="select-field">
                                         <input type="text" class="form-control" required="" name="ticketType1" placeholder="Ticket type">
                                       <!--  <select name="ticketType">
                                            <option value="">Free</option>
                                            <option value="">VIP</option>
                                        </select> -->
                                    </div>
                                </div>
                                <div class="ticketContainer">
                                    <span><?php echo CustomizationManager::$strings->NEW_EVENT_PAGE_TICKET_QUANTITY ?></span>
                                    <div class="select-field">
                                        <input type="number" class="form-control" min="1" required="" name="no_tickets_total1" placeholder="Ticket count">
                                    </div>
                                </div>
                                <div class="ticketContainer">
                                    <span><?php echo CustomizationManager::$strings->NEW_EVENT_PAGE_TICKET_PRICE ?></span>
                                    <div class="select-field">
                                        <input type="number" class="form-control" min="0" required="" name="price_tickets_total1" placeholder="Ticket price">
                                    </div>
                                </div>


                                <br><br>

                                <div class="ticketContainer">
                                    <!-- <span>TICKET TYPE </span> <br> -->
                                    <span><?php echo CustomizationManager::$strings->NEW_EVENT_PAGE_TICKET_TYPE ?></span> <br>
                                    <div class="select-field">
                                         <input type="text" class="form-control" name="ticketType2" placeholder="Ticket type">
                                       <!--  <select name="ticketType">
                                            <option value="">Free</option>
                                            <option value="">VIP</option>
                                        </select> -->
                                    </div>
                                </div>
                                <div class="ticketContainer">
                                    <span><?php echo CustomizationManager::$strings->NEW_EVENT_PAGE_TICKET_QUANTITY ?></span>
                                    <div class="select-field">
                                        <input type="number" min="1" class="form-control" name="no_tickets_total2" placeholder="Ticket count">
                                    </div>
                                </div>
                                <div class="ticketContainer">
                                    <!-- <span>PRICE OF TICKET</span> -->
                                    <span><?php echo CustomizationManager::$strings->NEW_EVENT_PAGE_TICKET_PRICE ?></span>
                                    <div class="select-field">
                                        <input type="number" min="1" class="form-control" name="price_tickets_total2" placeholder="Ticket price">
                                    </div>
                                </div>


                                <br><br>

                                <div class="ticketContainer">
                                    <span><?php echo CustomizationManager::$strings->NEW_EVENT_PAGE_TICKET_TYPE ?></span> <br>
                                    <div class="select-field">
                                         <input type="text" class="form-control" name="ticketType3" placeholder="Ticket type">
                                       <!--  <select name="ticketType">
                                            <option value="">Free</option>
                                            <option value="">VIP</option>
                                        </select> -->
                                    </div>
                                </div>
                                <div class="ticketContainer">

                                    <span><?php echo CustomizationManager::$strings->NEW_EVENT_PAGE_TICKET_QUANTITY ?></span>
                                    <div class="select-field">
                                        <input type="number" min="1" class="form-control" name="no_tickets_total3" placeholder="Ticket count">
                                    </div>
                                </div>
                                <div class="ticketContainer">
                                    <!-- <span>PRICE OF TICKET</span> -->
                                    <span><?php echo CustomizationManager::$strings->NEW_EVENT_PAGE_TICKET_PRICE ?></span>
                                    <div class="select-field">
                                        <input type="number" min="1" class="form-control" name="price_tickets_total3" placeholder="Ticket price">
                                    </div>
                                </div>

                                <br><br>

                                <div class="text-center">
                                    <!-- <button type="submit" class="btn btn-default" value="Create Event"> <a href="<?php echo site_url();?>/cLogin/viewEvents"> Register</button> -->
                                    <button type="submit" class="btn btn-default" value="Create Event"><!-- <a href="<?php echo site_url();?>/cLogin/viewEvents"> --><?php echo CustomizationManager::$strings->NEW_EVENT_PAGE_SUBMIT_BUTTON ?></button>
                                </div>

                                <br><br>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>

         <!-- Footer area-->
         <div class="footer-area">

             <div class=" footer">
                 <div class="container">
                     <div class="row">

                         <div class="col-md-3 col-sm-6 wow fadeInRight animated">
                             <div class="single-footer">
                               <!-- <h4>About us </h4> -->
                               <h4><?php echo CustomizationManager::$strings->ABOUT_HEADER ?></h4>
                               <div class="footer-title-line"></div>

                              <!-- <img src= "<?php echo base_url('assets/dianeAssets/img/logoBlack.png')?>" alt="" class="wow pulse" data-wow-delay="1s" > -->
                              <img src= "<?php echo base_url(CustomizationManager::$images->LOGO_DARK)?>" alt="" class="wow pulse" data-wow-delay="1s" >
                               <!-- <p>We help you reach out to the most interesting events anywhere they may be. The events you’ve always wanted to join and create will be in your hands with just a few clicks. Worry not because we’re here to help you discover the latest events this planet will ever have.</p> -->
                               <p><?php echo CustomizationManager::$strings->ABOUT_MESSAGE ?></p>

                             </div>
                         </div>

                         <div class="col-md-3 col-sm-6 wow fadeInRight animated">
                             <div class="single-footer news-letter">
                               <!-- <h4>Contact Us</h4> -->
                               <h4><?php echo CustomizationManager::$strings->CONTACT_US_HEADER ?></h4>
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
                            <li><a class="wow fadeInUp animated" href="<?php echo site_url();?>/cLogin/viewDashBoard" data-wow-delay="0.2s"><?php echo CustomizationManager::$strings->FOOTER_NAV_HOME ?></a></li>
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

        <script>
            $('#region_code').on('change', function(){
              $('#municipal-name').empty().append('<option></option>');
                if(this.value != ""){
                    // alert(this.value);
                    var code = this.value;
                    var dataSet = "region_code="+code;
                        $.ajax({
                            type: "POST",
                            url: '<?php echo site_url()?>/event/cEvent/displayMunicipal',
                            data: dataSet,
                            cache: true,
                            success: function(result){
                                if(result){
                                //    $('body').html(result);
                                    var output = $.parseJSON(result);
                                    $.each(output, function(i, d) {
                                        // You will need to alter the below to get the right values from your json object.  Guessing that d.id / d.modelName are columns in your carModels data
                                        $('#municipal-name').append('<option value="' + d.location_id+ '">' + d.location_name + '</option>');

                                    });
                                }else{
                                    alert("Error");
                                }
                            },
                            error: function(jqXHR, errorThrown){
                                console.log(errorThrown);
                            }
                        });
                }
            });

            // $('#municipal-name').on('change', function(){
            //     if(this.value != "Select CITY/MUNICIPAL below..."){
            //         var city = this.value;
            //         alert(city);
            //     }
            // });
        </script>
