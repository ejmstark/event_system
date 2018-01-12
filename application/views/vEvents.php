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
                        <a href ="<?php echo site_url();?>/cLogin/userLogout" data-wow-delay="0.1s"><button class="navbar-btn nav-button wow bounceInRight login"> Logout </button></a>
                    </div>
                    <div class="button navbar-right">
                        <a href ="<?php echo site_url();?>/event/cEvent/viewCreateEvent" data-wow-delay="0.4s"><button class="navbar-btn nav-button wow bounceInRight login"> Create Event </button></a>
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

<!--                                             <button type="button" class="dbutton" data-toggle ="modal" data-target="#lmodal">Load Now</button>
 -->
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

<div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" id="myTabs" role="tablist">
    <li role="presentation" class="tab active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">My Events</a></li>
    <li role="presentation" class="tab"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Reports</a></li>
    <li role="presentation" class="tab"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Payment History</a></li>
    <li role="presentation" class="tab"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Settings</a></li>
    <li role="presentation" class="tab"><a href="#editprofile" aria-controls="editprofile" role="tab" data-toggle="tab">Edit Profile</a></li>

  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home">
        <div class="col-md-12 clear">
            <div class="row">
                <div class="col-xs-12 layout-switcher pull-right">
                    <a class="layout-list" href="javascript:void(0);"> <i class="fa fa-th-list"></i>  </a>
                    <a class="layout-grid active" href="javascript:void(0);"> <i class="fa fa-th"></i> </a>
                </div>
            </div>

            <div id="list-type" class="proerty-th">

                        <?php
                            if(isset($events)){
                                $cnt =1;
                                foreach ($events as $event) {
                                   ?>
                            <div class="col-sm-6 col-md-4 p0">
                                <div class="box-two proerty-item">
                                    <div class="item-thumb">
                                        <a href="<?php echo site_url();?>/event/cEvent/displayEventDetails/<?php echo $event->event_id;?>"><img  style="max-height: 50px;" src="<?php echo base_url();?><?php echo $event->event_picture; ?>"></a>
                                    </div>
                                       <div class="item-entry overflow">
                                        <h5><a href="<?php echo site_url();?>/cLogin/viewEventDetails"> <?php
                                                if(strlen($event->event_name)>=26){
                                                    echo substr($event->event_name,0,23)."...";
                                                }else{
                                                        echo $event->event_name;
                                                }
                                                ?>
                                        </a></h5>
                                        <?php
                                                if($event->event_status == 'Approved'){
                                                        date_default_timezone_set('Asia/Manila');
                                                        $now = new DateTime("now");
                                                        $end = new DateTime($event->dateEnd);
                                                        $start = new DateTime($event->dateStart);
                                                        $interval = date_diff($now, $start);

                                                        if($now > $start && $now > $end){
                                                            echo "<h5>Expired!</h5>";
                                                                
                                                        }else if($now < $start){
                                                            if($interval->days == 0){
                                                                echo "<h5>Less than a day!</h5>";
                                                            }else{
                                                                echo "<h5>$interval->days day/s left!</h5>";
                                                                }
                                                                    
                                                        }else if($now >= $start && $now <= $end){
                                                            echo "<h5>Happening now!</h5>";
                                                        }
                                                    }else{
                                                        echo "<h5>Not yet Approved!</h5>";
                                                    }    
                                                        
                                                            
                                                ?>   

                                            <div class="dot-hr"></div>
                                            <span class="pull-left"><b> Date: </b> <?php echo $event->dateStart;?>  </span>
                                            <span class="proerty-price pull-right"><?php echo $event->event_status;?> </span>
                                            <br>
                                            <!-- <p max="30" style="overflow: hidden;"><?php echo $event->event_details;?> </p> -->
                                            <!-- <div class="property-icon pull-right">
                                                <a>Read More</a>
                                            </div> -->
                                        </div>
                                </div>
                            </div>

                        <?php
                                }
                            }
                        ?>
            </div>

            <div class="col-md-12">
                <div class="pull-right">
                    <div class="pagination">
                        <ul>
                            <li><a href="#">Prev</a></li>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">Next</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div role="tabpanel" class="tab-pane" id="profile">
        <div class="col-md-12 clear">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Event ID</th>
                                    <th>Event Name</th>
                                    <th>Event Date Start</th>
                                    <th>Event Status</th>
                                    <th>Event Venue</th>
                                    <th>Event Category</th>
                                    <th>Option</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php if (isset($events)) {?>
                                    <?php foreach ($events as $e) { ?>
                                        <tr>
                                            <td><?php echo $e->event_id;?></td>
                                            <td><?php echo $e->event_name;?></td>
                                            <td><?php echo $e->dateStart;?></td>
                                            <td><?php echo $e->event_status;?></td>
                                            <td><?php echo $e->event_venue;?></td>
                                            <td><?php echo $e->event_category;?></td>
                                            <td>
                                                <div class="panel-body search-widget">
                                                    <fieldset >
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <!-- <a href="<?php echo site_url();?>/reports/cReports/generateRevenue/<?php echo $e->event_id;?>"><button class="button btn largesearch-btn " id="<?php echo $e->event_id;?>">Generate Revenue</button></a> -->

<!-- Button HTML (to Trigger Modal) -->
<a href="#myModal<?php echo $e->event_id;?>" role="button" class="button btn largesearch-btn" data-toggle="modal">Generate Revenue</a>

<!-- Modal HTML -->
<div id="myModal<?php echo $e->event_id;?>" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h1 class="modal-title"><?php echo $e->event_name;?></h1>
            </div>
            <div class="modal-body">
                <?php
                $ei = new MEventInfo();
                $res = $ei->getRevenue($e->event_id);
                ?>

                <table class="table table-hover table-striped">
                    <tbody>
                        <thead>
                            <tr>
                                <th>Ticket Name</th>
                                <th>Quantity Sold</th>
                                <th>Price</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $gTotal = 0;
                foreach ($res as $r) {
                    $gTotal += ($r->cnt*$r->price);
                ?>
                            <tr>
                                <td><?php echo $r->ticket_name; ?></td>
                                <td><?php echo $r->cnt; ?></td>
                                <td><?php echo $r->price; ?></td>
                                <td><?php echo $r->cnt*$r->price; ?> </td>
                            </tr>
                        <?php
                        }
                            ?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td><h3 style="font-size: 20px; text-align: right; font-weight: 600; padding: 10px;"> Total Revenue: </h3></td>
                                <td>
                                    <div class="panel-heading">
                                        <center><h2 class="panel-title" style="font-size: 30px; font-weight: 600; border-bottom: 3px solid #e2624b; padding: 10px;"> <?php echo $gTotal; ?> </h2></center>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>



                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>

    </div>
    <div role="tabpanel" class="tab-pane" id="messages">
         <div class="col-md-12 clear">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Event Name</th>
                                    <th>Amount</th>
                                    <th>Date paid</th>
                                </tr>
                            </thead>
                            <tbody>
                              
                            </tbody>
                        </table>
                    </div>
    </div>
    <div role="tabpanel" class="tab-pane" id="settings">
    </div>

     <div role="tabpanel" class="tab-pane" id="editprofile">
        <h2>Edit Profile</h2>
        <div class="col-md-8">
            <div class="form-group">
                <label for="name">First Name</label>
                 <input type="text" <?php  if(isset($first_name)){echo 'value="'.$first_name.'"';}?> class="form-control" pattern="[a-zA-Z]+" name="fname" id="name" required="">
            </div>

             <div class="form-group">
                 <label for="name">Middle Initial</label>
                <input type="text"  <?php  if(isset($middle_initial)){echo 'value="'.$middle_initial.'"';}?> class="form-control" pattern="[a-zA-Z]+" name="miname" id="name" required="">
            </div>

            <div class="form-group">
                <label for="name">Last Name</label>
                <input type="text"  <?php  if(isset($last_name)){echo 'value="'.$last_name.'"';}?> class="form-control" pattern="[a-zA-Z]+" name="lname" id="name" required="">
            </div>

           <div class="form-group">
                <label for="email">Email</label>
                <input type="email"  <?php  if(isset($email)){echo 'value="'.$email.'"';}?> class="form-control" name="email" id="email" required="">
            </div>

           <div class="form-group">
                <label for="email">Birthdate</label>
                <input type="date"  <?php  if(isset($birthdate)){echo 'value="'.$birthdate.'"';}?> name="bdate" required="">
            </div>

            <div class="form-group">
                <label for="email">Gender</label>
                <select class="form-control" name="gender">
                    <option value="Male" <?php  if(isset($gender) && $gender=="Male"){echo 'selected';}?>>Male</option>
                    <option value="Female" <?php  if(isset($gender) && $gender=="Female"){echo 'selected';}?>>Female</option>
                    <option value="Other" <?php  if(isset($gender) && $gender=="Other"){echo 'selected';}?>>Other</option>
                </select>
            </div>

            <div class="form-group">
                <label for="email">Contact Number</label>
                <input type="text" <?php  if(isset($contact_no)){echo 'value="'.$contact_no.'"';}?>  pattern="^(09)\d{9}$" class="form-control" name="contact" id="email" required="">
            </div>
            <div class="form-group">
                <label for="email">Username</label>
                <input type="text" minlength="6" <?php  if(isset($user_name)){echo 'value="'.$user_name.'"';}?> required="" class="form-control" pattern="[a-zA-Z0-9]+" name="uname" id="email">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" <?php  if(isset($password)){echo 'value="'.$password.'"';}?> class="form-control" required="" minlength="8" pattern="[a-zA-Z0-9]+" name="password" id="password">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-default"><!-- <a href="<?php echo site_url();?>/cLogin/viewEvents"> -->Edit Profile</button>
            </div>


        </div>

    </div>
          

    </div>


  <script type="text/javascript">

    $('.tab a').on('click', function (e) {
      e.preventDefault();
      console.log('clicked');
      $(this).parent().addClass('active');
      $(this).parent().siblings().removeClass('active');

      target = $(this).attr('href');

      $('.tab-content > div').not(target).hide();

      $(target).fadeIn(600);

});
</script>

</div>

                    <div class="col-md-12 clear">
                        <div class="col-xs-10 page-subheader sorting pl0">
                            <!-- <ul class="sort-by-list">
                                <li class="active">
                                    <a href="javascript:void(0);" class="order_by_date" data-orderby="property_date" data-order="ASC">
                                        Event Date <i class="fa fa-sort-amount-asc"></i>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="javascript:void(0);" class="order_by_price" data-orderby="property_price" data-order="DESC">
                                        Event Ticket Price <i class="fa fa-sort-numeric-desc"></i>
                                    </a>
                                </li>
                            </ul>

                            <div class="items-per-page">
                                <label for="items_per_page"><b>Events per page :</b></label>
                                <div class="sel">
                                    <select id="items_per_page" name="per_page">
                                        <option value="3">3</option>
                                        <option value="6">6</option>
                                        <option value="9">9</option>
                                        <option selected="selected" value="12">12</option>
                                        <option value="15">15</option>
                                        <option value="30">30</option>
                                        <option value="45">45</option>
                                        <option value="60">60</option>
                                    </select>
                                </div>
                            </div>
                        </div>-->


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
