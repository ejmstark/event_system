<?php if ($this->session->userdata('userSession')) { ?>
<!-- Add these lines below to pages with customizable elements -->
<?php
  require('assets/CustomizationManager.php');
  CustomizationManager::SetTheme("configurations 0");
?>
<!-- Up to here -->
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> Daily Events Create </title>
        <link rel="stylesheet" href="<?php echo base_url('assets/josephAssets/css/styleCreateEvent.css')?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/josephAssets/css/font-awesome.css')?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/josephAssets/css/font-awesome.min.css')?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/josephAssets/css/bootstrap.css')?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/josephAssets/css/bootstrap.min.css')?>">

        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" />

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
    </head>

    <body>
        <nav class="navbar navbar-inverse">
            <div class="container container-fluid">
                <div class="navbar-header">
                    <!-- <a href="#" class="navbar-brand"><img src="<?php echo base_url('assets/dianeAssets/img/dailyEvents.png" class="eventLogo')?>"></a> -->
                    <a href="#" class="navbar-brand"><img src="<?php echo base_url(CustomizationManager::$images->LOGO_DARK)?>"></a>
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
    <form method="post" action="<?php echo site_url();?>/event/cEvent/createEvent ">
        <div class ="createYourEvent">
            <h1> CREATE YOUR EVENT! </h1> <br>
            <h2> Share it. Make it live. </h2>
        </div>

        <div class="eventHeader">
            <span> EVENT DETAILS </span>
        </div>

        <div class="form-container">
            <span>EVENT TITLE</span> <br>
            <input type="text" name="event_name" placeholder="Give a short distinct name." required=""> <br><br>
            <span>LOCATION</span> <br>
            <input type="text" name="event_venue" placeholder="State where it is held." required=""> <br><br>

            <span>STARTS</span> <br>
            <div class="row container">
                <div class="col-md-6">
                    <div class="container timeContainer">
                        <input type="text"  value="<?php if(!empty($start_date)){
                            echo $start_date." ".$start_time;
                        }else{
                            echo "";
                        };
                        ?>" name="dateStart" id="datetimepicker1" required="">
                    </div>

                    <script>
                        $("#datetimepicker1").datetimepicker();
                    </script>
                </div>

                <!-- <div class="timeContainer">
                    <input type="text" id="date1" name="event_date_start" placeholder="Date Start">
                </div>
                <div class="timeContainer">
                    <input type="text" id="time1" name="event_time_start" placeholder="Event starts">
                </div> -->
            </div>

            <span>ENDS</span> <br>
            <div class="row container">
                <div class="col-md-6 ">
                    <div class="container timeContainer">
                        <input type="text" value="<?php if(!empty($end_date)){
                            echo $end_date." ".$end_time;
                        }else{
                            echo "";
                        };
                        ?>" name="dateEnd" id="datetimepicker2" required="">
                    </div>

                    <script>
                        $("#datetimepicker2").datetimepicker();
                    </script>
                </div>

                <!-- <div class="timeContainer">
                    <input type="text" id="date1" name="event_date_start" placeholder="Date Start">
                </div>
                <div class="timeContainer">
                    <input type="text" id="time1" name="event_time_start" placeholder="Event starts">
                </div> -->
            </div>
            <span>CATEGORY </span> <br>
                    <div class="select-field">
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
                        </select>
                    </div>
             <br><br>
           <span>EVENT DESCRIPTION</span> <br>
            <input type="text" name="event_details" placeholder="Tell what your event is all about." required=""> <br><br>


        </div>

        <br><br>
        <div class="eventHeader">
            <span> EVENT TICKETS </span>
        </div>
        <div class="form-container">
            <div class="row container">
                <div class="ticketContainer">
                    <span>TICKET TYPE </span> <br>
                    <div class="select-field">
                         <input type="text" required="" name="ticketType1" placeholder="Ticket type">
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
            </div>
        </div><br>
        <div class="form-container">
            <div class="row container">
                <div class="ticketContainer">
                    <span>TICKET TYPE </span> <br>
                    <div class="select-field">
                         <input type="text" name="ticketType2" placeholder="Ticket type">
                       <!--  <select name="ticketType">
                            <option value="">Free</option>
                            <option value="">VIP</option>
                        </select> -->
                    </div>
                </div>
                <div class="ticketContainer">
                    <span>NUMBER OF TICKETS</span>
                    <div class="select-field">
                        <input type="number" min="1" class="form-control" name="no_tickets_total2" placeholder="Ticket count">
                    </div>
                </div>
                <div class="ticketContainer">
                    <span>PRICE OF TICKET</span>
                    <div class="select-field">
                        <input type="number" min="1" class="form-control" name="price_tickets_total2" placeholder="Ticket price">
                    </div>
                </div>
            </div>
        </div><br>
        <div class="form-container">
            <div class="row container">
                <div class="ticketContainer">
                    <span>TICKET TYPE </span> <br>
                    <div class="select-field">
                         <input type="text" name="ticketType3" placeholder="Ticket type">
                       <!--  <select name="ticketType">
                            <option value="">Free</option>
                            <option value="">VIP</option>
                        </select> -->
                    </div>
                </div>
                <div class="ticketContainer">
                    <span>NUMBER OF TICKETS</span>
                    <div class="select-field">
                        <input type="number" min="1" class="form-control" name="no_tickets_total3" placeholder="Ticket count">
                    </div>
                </div>
                <div class="ticketContainer">
                    <span>PRICE OF TICKET</span>
                    <div class="select-field">
                        <input type="number" min="1" class="form-control" name="price_tickets_total3" placeholder="Ticket price">
                    </div>
                </div>
            </div>
        </div>

        </div>
        <br><br><br>

        <div class="horizontalLine"></div>

        <div class="submitContainer">
            <center><span> Your event is ready! Make it live now. </span></center>
            <center>
                <button class="btn btn-lg btn-warning" type="submit" value="Create Event">
                    Create Event
                </button>
            </center>
        </div>
    </form>


        <div class="footer">
            <span> © 2017 Daily Events </span>
        </div>
    </body>



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

</html>

<?php } else {
        redirect('cLogin/login');
    }
?>
