<?php
if(isset($events) ){
    $bought = FALSE;
    // print_r($events);
foreach ($events as $e) { } foreach ($organizer as $o) { }
    foreach ($user as $u) { }


foreach($going as $g){
    if($this->session->userdata['userSession']->userID == $g->account_id){
        $bought = TRUE;

    }

}
// if($isset($tixStat)){foreach ( as $ts) { }}
    }?>
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

                        <li class="wow fadeInDown" data-wow-delay="0.1s"><a href="<?php echo site_url();?>/event/cEvent/viewEvents">Profile</a></li>
                        <!-- <li class="wow fadeInDown" data-wow-delay="0.1s"><a href ="#" >Contact</a></li>
                        <li class="wow fadeInDown" data-wow-delay="0.1s"><a href ="#" >Profile</a></li> -->
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <!-- End of nav bar -->

        <div class="page-head">
        <!-- put feedback icon here -->
            
            <div class="container">
                <div class="row">
                    <div class="page-head-content">
                        <h1 class="page-title">EVENT DETAILS</h1>
                    </div>
                </div>
                <div class="row" >
                    <a href="<?php echo site_url();?>">link to feedback</a>
                </div>
            </div>
        </div>
        <!-- End page header -->

        <!-- property area -->
        <div class="content-area single-property" style="background-color: #FCFCFC;">&nbsp;
            <div class="container">

                <div class="clearfix padding-top-40" >

                    <div class="col-md-8 single-property-content prp-style-1 ">
                        <div class="row">
                            <div class="light-slide-item">
                                <div class="clearfix">
                                    <div class="favorite-and-print">
                                        <a class="add-to-fav" href="#login-modal" data-toggle="modal">
                                            <i class="fa fa-star-o"></i>
                                        </a>
                                        <a class="printer-icon " href="javascript:window.print()">
                                            <i class="fa fa-print"></i>
                                        </a>
                                    </div>

                                    <ul id="image-gallery" class="gallery list-unstyled cS-hidden" >
                                        <li data-thumb="assets/img/property-1/property1.jpg">
                                            <img src="assets/img/property-1/property1.jpg" />
                                        </li>
                                        <li data-thumb="assets/img/property-1/property2.jpg">
                                            <img src="assets/img/property-1/property3.jpg" />
                                        </li>
                                        <li data-thumb="assets/img/property-1/property3.jpg">
                                            <img src="assets/img/property-1/property3.jpg" />
                                        </li>
                                        <li data-thumb="assets/img/property-1/property4.jpg">
                                            <img src="assets/img/property-1/property4.jpg" />
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php if(isset($errorMsg)){?>
                            <!-- error message / alert handling. -->
                        <div class="alert px-0 mx-0" style="background-color: #FDC600;">
                            <span class="pull-right px-0"><button style="background-color: #FDC600; color: gray;">X</button></span>
                            <p style="color: gray;"><?php echo $errorMsg; ?></p>
                        </div>
                        <br><br>
                        <?php }?>
                        <?php if(isset($successMsg)){?>
                            <!-- error message / alert handling. -->
                        <div class="alert px-0 mx-0" style="background-color: #FDC600;">
                            <span class="pull-right px-0"><button style="background-color: #FDC600; color: gray;">X</button></span>
                            <p style="color: gray;"><?php echo $successMsg; ?></p>
                        </div>
                        <br><br>
                        <?php }?>

                        <div class="single-property-wrapper">
                            <div class="single-property-header">
                                <h1 class="property-title pull-left"><?php echo $e->event_name; ?></h1>
                                <?php if($this->session->userdata['userSession']->userID == $e->user_id){?>
                                <span class="property-price pull-right"><?php echo $e->event_status; ?></span>
                                <?php } ?>
                            </div>

                            <div class="property-meta entry-meta clearfix ">
                                <span class="property-info-entry">
                                    <span class="property-info-label">Ticket Sale Status</span>
                                    <span class="property-info-value"><?php echo $e->event_status; ?></span>
                                </span>

                            </div>
                            
                            <?php foreach($events as $x){ if($id == $x->user_id){ ?>
                                <a href="<?php echo site_url('event/cEvent/editEvent/'.$e->event_id);?>"><div>Edit event</div></a>
                            <?php }} ?>
                            <!-- .property-meta -->

                            <div class="section">
                                <h4 class="s-property-title">Description</h4>
                                <div class="s-property-content">
                                    <p><?php echo $e->event_details; ?></p>
                                </div>
                            </div>
                            <!-- End description area  -->

                            <div class="section additional-details">

                                <h4 class="s-property-title">Additional Details</h4>

                                <ul class="additional-details-list clearfix">
                                    <li>
                                        <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">Location</span>
                                        <span class="col-xs-6 col-sm-8 col-md-8 add-d-entry"><?php echo $e->event_venue; ?></span>
                                    </li>

                                    <li>
                                        <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">Date Start</span>
                                        <span class="col-xs-6 col-sm-8 col-md-8 add-d-entry"><?php echo $e->event_date_start; ?></span>
                                    </li>
                                    <li>
                                        <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">Date End</span>
                                        <span class="col-xs-6 col-sm-8 col-md-8 add-d-entry"><?php echo $e->event_date_end; ?></span>
                                    </li>

                                    <!-- <li>
                                        <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">Grade</span>
                                        <span class="col-xs-6 col-sm-8 col-md-8 add-d-entry">Wan point jero</span>
                                    </li>  -->

                                </ul>
                            </div>
                            <!-- End additional-details area  -->
                        <?php if($this->session->userdata['userSession']->userID == $e->user_id){?>
                            <div class="section property-share">
                                <h4 class="s-property-title">Users who are going:</h4>
                                <div class="roperty-social">
                                    <ul>
                                    <?php foreach($going as $g){?>
                                        <li><?php echo $g->first_name." ".$g->middle_initial." ".$g->last_name;?></li><br>
                                        <?php }?>
                                    </ul>
                                </div>
                            </div>
                        <?php }?>
                            <!-- End video area  -->

                        </div>
                    </div>


                    <div class="col-md-4 p0">
                        <aside class="sidebar sidebar-property blog-asside-right">
                            <div class="dealer-widget">
                                <div class="dealer-content">
                                    <div class="inner-wrapper">

                                        <div class="clear">
                                            <div class="col-xs-4 col-sm-4 dealer-face">
                                                <a href="">
                                                    <img src="<?php echo base_url('assets/nikkiAssets/img/client-face1.png" class="img-circle')?>">
                                                </a>
                                            </div>
                                            <div class="col-xs-8 col-sm-8 ">
                                                <h3 class="dealer-name">
                                                    <a href=""><?php echo $o->first_name." ".$o->middle_initial." ".$o->last_name;?></a>
                                                    <span>Organizers</span>
                                                </h3>
                                                <div class="dealer-social-media">
                                                    <a class="twitter" target="_blank" href="">
                                                        <i class="fa fa-twitter"></i>
                                                    </a>
                                                    <a class="facebook" target="_blank" href="">
                                                        <i class="fa fa-facebook"></i>
                                                    </a>
                                                    <a class="instagram" target="_blank" href="">
                                                        <i class="fa fa-instagram"></i>
                                                    </a>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="clear">
                                            <ul class="dealer-contacts">
                                                <li><i class="pe-7s-map-marker strong"> </i> University of San Carlos</li>
                                                <li><i class="pe-7s-mail strong"> </i> <?php echo $o->email;?></li>
                                                <li><i class="pe-7s-call strong"> </i> <?php echo $o->contact_no;?></li>
                                            </ul>
                                            <div class="text-center">
                                            <?php if($e->event_status == "Approved"){?>
                                                <button class="navbar-btn nav-button wow bounceInRight login animated" onclick="#" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: bounceInRight;">Intrested</button>
                                                <!-- <a href="<?php echo site_url();?>/event/cEvent/going/<?php echo $e->event_id;?>"><button class="navbar-btn nav-button wow bounceInRight login animated" >Going</button></a> -->                                            <?php }?>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-default sidebar-menu similar-property-wdg wow fadeInRight animated">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Ticket Prices</h3>
                                </div>
                                <div class="panel-body recent-property-widget">
                                    <ul>
                                    <h2>Card Load: <span><?php echo $u->load_amt; ?></span></h2>
                                    <input  id="cLoad" hidden value="<?php echo $u->load_amt; ?>">
                                        <?php foreach ($types as $t) { ?>
                                        <li>
                                            <div class="col-md-3 col-sm-3 col-xs-3 blg-thumb p0">
                                                <a href="single.html"><img src="assets/img/demo/small-property-2.jpg"></a>
                                            </div>
                                            <div class="col-md-8 col-sm-8 col-xs-8 blg-entry">
                                                <h4> <?php echo  $t->ticket_name;?> </h4>
                                                <span class="property-price"><?php echo "P"." ".$t->price.".00";?></span>
                                                 <?php if($e->event_status == "Approved"){?>
                                                 <!-- <span>&nbsp; &nbsp; &nbsp;
                                                 <form method="post" action="<?php echo site_url();?>/event/cEvent/buyTicket">
                                                     <input type="text" name="eId" value="<?php echo $e->event_id;?>">
                                                     <input type="text" name="tId" value="<?php echo $t->ticket_type_id;?>">

                                                 </form> -->

                                                 <?php if(!$bought){?>
                                                   <a href="<?php echo site_url();?>/event/cEvent/buyTicket/<?php echo $t->ticket_type_id;?>/<?php echo $e->event_id;?>"><input hidden class="val" value="<?php echo $t->price;?>">
                                                <button   class="buy navbar-btn nav-button wow bounceInRight login animated" >Buy</button></a>
                                                <?php }?>

                                                </span>                                            <?php }?>
                                                <!--<span>&nbsp;&nbsp;&nbsp; Sold:
                                                 <?php $ts->cnt?>
                                                </span> -->
                                                <!-- <script>
   $(document).on('click', 'button.buy', function () {
        alert("asdasdasd");
        var val =$("this").closest('input.val').getVal();
        var cVal = $(document).closest('.cVal').getVal();
        alert("ASDASDAsd");
    });
</script> -->
                                            </div>
                                        </li>
                                        <?php } ?>

                                    </ul>
                                </div>
                            </div>

                            <div class="panel panel-default sidebar-menu wow fadeInRight animated">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Ads here</h3>
                                </div>
                                <div class="panel-body recent-property-widget">
                                    <img src="assets/img/ads.jpg">
                                </div>
                            </div>

                            <!-- <div class="panel panel-default sidebar-menu wow fadeInRight animated" >
                                <div class="panel-heading">
                                <h3 class="panel-title">Search</h3>
                            </div> -->
                            <!-- <div class="panel-body search-widget">
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

                                                    <option>Music Concerts</option>
                                                    <option>Workshops</option>
                                                    <option>Fashion Show</option>
                                                    <option>Party</option>
                                                    <option>Food Bazaars</option>
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
                            </div> -->

                        </aside>
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
