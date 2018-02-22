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
<html>
    <head>
        <style>
            .rating-stars ul {
                list-style-type:none;
                padding:0;
  
                -moz-user-select:none;
                -webkit-user-select:none;
            }
            
            .rating-stars ul > li.star {
                display:inline-block;  
            }

/* Idle State of the stars */
            .rating-stars ul > li.star > i.fa {
              font-size:1.5em; /* Change the size of the stars */
              color:#ccc; /* Color on idle state */
            }

            /* Hover state of the stars */
            .rating-stars ul > li.star.hover > i.fa {
              color:#FFCC36;
            }

            /* Selected state of the stars */
            .rating-stars ul > li.star.selected > i.fa {
              color:#FF912C;
            }

        </style>
    </head>
    <body>

        <div id="preloader">
            <div id="status">&nbsp;</div>
        </div>
        <!-- Body content -->
    </body>
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
            <div class="container">
                <div class="row">
                    <div class="page-head-content">
                        <h1 class="page-title">REVIEWS for <?php echo $e->event_name; ?></h1>
                        <button class="navbar-btn nav-button login"> <a href ="<?php echo site_url();?>/event/cEvent/displayEventDetails/<?php echo $e->event_id; ?>" style="color:white;"><span class="	fa fa-toggle-left"></span> Event Details </a></button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End page header -->

        <!-- property area -->
        
        <div class="content-area single-property" style="background-color: #FCFCFC;">&nbsp;
            <div class="container">
                <div class="clearfix padding-top-40" >
                <?php 
                    if(isset($reviews)){
                        foreach($reviews as $r){ ?>
                            <div class="container">
                                <div class="card" style="border: 0.5px solid beige; border-radius: 5px;">
                                    <div class="card-header">
                                        <?php for($x=0; $x<5; $x++){
                                            if($r->rating>$x){?>
                                                <img src=" http://localhost/event_system/assets/gaiusAssets/star-full.png" style="float:right; height:32px; width:32px;">
                                        
                                        <?php }}?>
                                        <h2><?php echo $r->user_name;?></h2>
                                    </div>
                                    <div class="card-block">
                                        <p class="card-text"><?php echo $r->description;?></p>
                                   </div>
                                </div>
                            </div>
                            <br>
                        <?php } ?>
                    <?php } ?>
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
