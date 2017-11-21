 <body>

       
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
                        
                        <li class="wow fadeInDown" data-wow-delay="0.1s"><a href="<?php echo site_url();?>/event/cEvent/viewEvents">Profile</a></li>
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
                        <h1 class="page-title">Profile</h1>               
                    </div>
                </div>
            </div>
        </div>
        <!-- End page header -->

        <!-- property area -->
        <div class="properties-area recent-property" style="background-color: #FFF;">
            <div class="container">  
                <div class="row">  
                    <div class="col-md-3 p0 padding-top-40">
                        <div class="blog-asside-right pr0">   
                            <div class="panel panel-default sidebar-menu wow fadeInRight animated" >
                                <div class="panel-body search-widget">
                                   <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="panel-heading">
                                                    <center><h1 style="font-size: 50px;" class="panel-title">P<?php foreach($user as $u){echo $u->load_amt;}?>.00</h1></center>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <p>Insufficient balance? 
                                                 <a style=" color: #e2624b; cursor:pointer; border-bottom: 1.5px solid #e2624b;padding-bottom: 2px"  onMouseOver="this.style.color='#ffcec0';this.style.paddingBottom='8px';this.style.borderBottom='3px solid #e2624b';"    onMouseOut="this.style.color='#e2624b' ;this.style.paddingBottom='2px';" type="button" class="dbutton " id="load" >Load Now</a> 
      
                                                 <script>
                                                     $("#load").click(function(){
                                                        $("#some").toggle(500);
                                                    });
                                                 </script>
                                            </p>
                                            <div class="row">
                                                
                                                    <div class="col-xs-12" id="some" hidden="">
                                                        <form action="<?php echo site_url(); ?>/user/cUser/redeemCode" method="post">
                                                            <input type="text" class="form-control" name="ccode" placeholder="Enter code">
                                                            <button type="submit" class="navbar-btn nav-button pull-right"   >Redeem Code</button>
                                                        </form>
                                                    </div>
                                                
                                            </div>
                                        </div>    
                                    </div>                                    
                                </div>

                                <div class="modal fade" id="lmodal">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3><img src="img/credit-card.png" class="elogo"> eLoad</h3>
                                            </div>
                                            <div class="modal-body">
                                                
                                                <label class="label-control">Card Number</label>
                                                <input type="text" class="form-control" name="" placeholder="Enter Card Number">
                                                
                                                <h6 class="note">*Note: you only have 3 attemps to enter correct values</h6>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                                <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="panel-body search-widget">
                                    <fieldset >
                                        <div class="row">
                                            <div class="col-md-12">  
                                                 <a href="<?php echo site_url()?>/calendar/cCalendar">
                                                <button class = "button btn largesearch-btn">Calendar</button></a>
                                            </div>  
                                        </div>
                                    </fieldset>   
                                    <fieldset >
                                        <div class="row">
                                            <div class="col-md-12">  
                                                <button class = "button btn largesearch-btn">Payment Summary</button>
                                            </div>  
                                        </div>
                                    </fieldset>                                     
                                </div>
                                <br><br>
                                <div class="panel-heading">
                                    <h3 class="panel-title">Search</h3>
                                </div>
                                <div class="panel-body search-widget">
                                    <form action="" class=" form-inline"> 
                                        <fieldset>
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <input type="text" class="form-control" placeholder="Key word">
                                                </div>
                                            </div>
                                        </fieldset>

                                        <fieldset>
                                            <div class="row">
                                                <div class="col-xs-6">

                                                    <select id="lunchBegins" class="selectpicker" data-live-search="true" data-live-search-style="begins" title="Category">
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

                                            </div>
                                        </fieldset>

                                        <fieldset class="padding-5">
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <label for="price-range">Price range (P):</label>
                                                    <input type="text" class="span2" value="" data-slider-min="0" 
                                                           data-slider-max="10000" data-slider-step="5" 
                                                           data-slider-value="[0,1000]" id="price-range" ><br />
                                                    <b class="pull-left color">P0.00</b> 
                                                    <b class="pull-right color">P10,000.00</b>                                       
                                                </div>                                      
                                            </div>
                                        </fieldset>                                
                                        
                                        <fieldset class="padding-5">
                                            <div class="row">
                                                <div class="col-xs-6">
                                                    <div class="checkbox">
                                                        <label> <input type="checkbox" checked> Workshops</label>
                                                    </div> 
                                                </div>

                                                <div class="col-xs-6">
                                                    <div class="checkbox">
                                                        <label> <input type="checkbox"> Parties</label>
                                                    </div>
                                                </div>                                            
                                            </div>
                                        </fieldset>

                                        <fieldset class="padding-5">
                                            <div class="row">
                                                <div class="col-xs-6"> 
                                                    <div class="checkbox">
                                                        <label> <input type="checkbox" checked> Food Bazaar</label>
                                                    </div>
                                                </div>  
                                                <div class="col-xs-6"> 
                                                    <div class="checkbox">
                                                        <label> <input type="checkbox" checked> Fashion Shows</label>
                                                    </div>
                                                </div>  
                                            </div>
                                        </fieldset>

                                        <fieldset class="padding-5">
                                            <div class="row">
                                                <div class="col-xs-6"> 
                                                    <div class="checkbox">
                                                        <label><input type="checkbox"> Concerts </label>
                                                    </div>
                                                </div>  
                                                <div class="col-xs-6"> 
                                                    <div class="checkbox">
                                                        <label> <input type="checkbox"> Exhibits</label>
                                                    </div>
                                                </div>  
                                            </div>
                                        </fieldset>

                                        <fieldset class="padding-5">
                                            <div class="row">
                                                <div class="col-xs-6"> 
                                                    <div class="checkbox">
                                                        <label>  <input type="checkbox" checked> Sports Event </label>
                                                    </div>
                                                </div>  
                                                <div class="col-xs-6"> 
                                                    <div class="checkbox">
                                                        <label>  <input type="checkbox"> Others </label>
                                                    </div>
                                                </div>  
                                            </div>
                                        </fieldset>

                                        <fieldset >
                                            <div class="row">
                                                <div class="col-xs-12">  
                                                    <input class="button btn largesearch-btn" value="Search" type="submit">
                                                </div>  
                                            </div>
                                        </fieldset>                                     
                                    </form>
                                </div>
                            </div>

                            <div class="panel panel-default sidebar-menu wow fadeInRight animated">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Recommended</h3>
                                </div>
                                <div class="panel-body recent-property-widget">
                                            <ul>
                                            <li>
                                                <div class="col-md-3 col-sm-3 col-xs-3 blg-thumb p0">
                                                    <a href="single.html"><img src="assets/img/demo/small-property-2.jpg"></a>
                                                </div>
                                                <div class="col-md-8 col-sm-8 col-xs-8 blg-entry">
                                                    <h6> <a href="single.html"> JS Workshop </a></h6>
                                                    <span class="property-price">P 200.00</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="col-md-3 col-sm-3 col-xs-3 blg-thumb p0">
                                                    <a href="single.html"><img src="assets/img/demo/small-property-2.jpg"></a>
                                                </div>
                                                <div class="col-md-8 col-sm-8 col-xs-8 blg-entry">
                                                    <h6> <a href="single.html"> Music Concert </a></h6>
                                                    <span class="property-price">P 250.00</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="col-md-3 col-sm-3 col-xs-3 blg-thumb p0">
                                                    <a href="single.html"><img src="assets/img/demo/small-property-2.jpg"></a>
                                                </div>
                                                <div class="col-md-8 col-sm-8 col-xs-8 blg-entry">
                                                    <h6> <a href="single.html"> Some Party </a></h6>
                                                    <span class="property-price">P 600.00</span>
                                                </div>
                                            </li>
                                           <li>
                                                <div class="col-md-3 col-sm-3 col-xs-3 blg-thumb p0">
                                                    <a href="single.html"><img src="assets/img/demo/small-property-2.jpg"></a>
                                                </div>
                                                <div class="col-md-8 col-sm-8 col-xs-8 blg-entry">
                                                    <h6> <a href="single.html"> Food Bazaar </a></h6>
                                                    <span class="property-price">P 100.00</span>
                                                </div>
                                            </li>

                                        </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-9  pr0 padding-top-40 properties-page">
                        <div class="col-md-12 clear"> 
                            <div class="col-xs-10 page-subheader sorting pl0">
                                    <div class="content"> 
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
                            </div>
                        </div>
                    </div>  
                </div>              
            </div>
        </div>

        <script >

    $(document).ready(function() {
        
        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month'
            },
            defaultDate: "<?php date_default_timezone_set('UTC'); echo date('d/M/Y'); ?>",
            editable: false,
            eventLimit: true, // allow "more" link when too many events
            selectable: true,
            displayEventTime: true,
            timeFormat: 'hh:mm a:',
            selectHelper: true,
           select: function(start, end) {
                    var startDate = moment(start).format('MM/DD/YYYY');
                    var endDate = moment(end).format('MM/DD/YYYY');
                    var startTime = moment(start).format('h:mm a');
                    var endTime = moment(end).format('h:mm a');
                    var currentDate = moment().format('MM/DD/YYYY');

                    var date = currentDate.split("/");
                    var start = startDate.split("/");

                    var flag = true;

                    if(start[2] <= date[2] ){
                        if(start[0] <= date[0]){
                                if(start[1]< date[1]){
                                     $('#errmodal').modal('show');
                                    flag = false;
                                }
                        }
                       
                    }


                    if(flag){
                        var dataSet = "startDate="+startDate+"&startTime="+startTime+"&endDate="+endDate+"&endTime="+endTime;
                        $.ajax({
                            type: "POST",
                            url: '<?php echo site_url()?>/event/cEvent/viewCreateFromCalendar',
                            data: dataSet,
                            cache: false,
                            success: function(result){
                                $('body').html(result);
                            },
                            error: function(jqXHR, errorThrown){
                                console.log(errorThrown);
                            }
                        });
                    }
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

<div class="modal fade bd-example-modal-sm" id="errmodal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header" style="background-color: red;">
        <h2 style="color: white;">ERROR!</h2>
      </div>
      <div class="modal-body">
        <h2><strong>Cannot add events on past dates!</strong></h2>
        <h3>Please choose a different date.</h3>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Got it.</button>
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
          


       
   