<?php
  require('assets/CustomizationManager.php');
  CustomizationManager::SetTheme("configurations 2");
?>
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
           <style>
            .rating {
                overflow: hidden;
                display: inline-block;
                position: relative;
                font-size:20px;
                color: #FFCA00;
            }
            .rating-star {
                padding: 0 5px;
                margin: 0;
                cursor: pointer;
                display: inline-block;
                text-align: center;
                float: right;
            }
            .rating-star:after {
                position: relative;
                font-family: FontAwesome;
                content:'\f006';
            }
            
            .rating-star.checked ~ .rating-star:after,
            .rating-star.checked:after {
                content:'\f005';
            }
            
            .rating:hover .rating-star:after {content:'\f006';}
            
            .rating-star:hover ~ .rating-star:after, 
            .rating-star:hover:after {
                content:'\f005' !important;
            }

        </style>
    </head>
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
                    <a class="navbar-brand" href="index-5.html"><img src="<?php echo base_url(CustomizationManager::$images->LOGO_DARK)?>"></a>
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
                        <!--<div class='rating-stars'>
                        <ul id='stars'>
                          <li class='star' title='Poor' data-value='1'>
                            <i class='fa fa-star fa-fw'></i>
                          </li>
                          <li class='star' title='Fair' data-value='2'>
                            <i class='fa fa-star fa-fw'></i>
                          </li>
                          <li class='star' title='Good' data-value='3'>
                            <i class='fa fa-star fa-fw'></i>
                          </li>
                          <li class='star' title='Excellent' data-value='4'>
                            <i class='fa fa-star fa-fw'></i>
                          </li>
                          <li class='star' title='WOW!!!' data-value='5'>
                            <i class='fa fa-star fa-fw'></i>
                          </li>
                        </ul>
                      </div>-->
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
                    <div class="col-md-8 single-property-content prp-style-1">
                        <div class="section">
                            <h4 class="s-property-title">User Reviews</h4>
                             <?php 
                                        if(isset($reviewAvg)){
                                            foreach($reviewAvg as $avg){ ?>
                                                <h3 ><strong>Average Rating: </strong><?php echo $avg->avg_rating?></h3>
                                                <h3 style="float:left;">Stars: </h3><div>
                                                <?php for($x=0; $x<5; $x++){
                                                                if($avg->avg_rating>$x && $avg->avg_rating-$x>=1){?>
                                                                    <img src="<?php echo site_url();?>/../assets/gaiusAssets/star-full.png" style="height:32px; width:32px;">
                                                            
                                                            <?php }else if($avg->avg_rating>$x && $avg->avg_rating-$x<1 && $avg->avg_rating-$x>0){?>
                                                                    <img src="<?php echo site_url();?>/../assets/gaiusAssets/star-half.png" style="height:32px; width:32px;">
                                                            
                                                            <?php }?>
                                                            
                                                        <?php }?>
                                                </div>
                                            <?php } ?>
                                        <?php } ?>
                                <div class="s-property-content">
                                    <div class="clear">
                                        <?php 
                                        if(isset($reviews)){
                                            foreach($reviews as $r){ ?>
                                            <hr>
                                                <div class="dealer-face">
                                                    <h3><img src="<?php echo base_url('assets/nikkiAssets/img/client-face1.png" class="img-circle"')?>" style="height:50px;width=50px;" align="top"><?php echo $r->user_name;?></h3>
                                                    <p style="font-size:90%;">&emsp;<?php echo $r->description;?></p>
                                                    Rating
                                                    <?php for($x=0; $x<5; $x++){
                                                                if($r->rating>$x){?>
                                                                    <img src="<?php echo site_url();?>/../assets/gaiusAssets/star-full.png" style="height:32px; width:32px;">
                                                            
                                                            <?php }}?>
                                                </div>
                                                
                                                <br>
                                            <?php } ?>
                                        <?php } ?>
                                        <hr>
                                    </div>
                                </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4 p0">
                        <aside class="sidebar sidebar-property blog-asside-right">
                            <div class="dealer-widget">
                                <div class="dealer-content">
                                    <div class="inner-wrapper">
                                        <h2 align="center">SUBMIT A REVIEW</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default sidebar-menu similar-property-wdg wow fadeInRight animated">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Rating</h3>
                                </div>
                                
                                <div class="panel-body recent-property-widget">
                                    <div class="rating text-center" style="display: inline-block;">
                                        <span class="rating-star" data-value="5"></span>
                                        <span class="rating-star" data-value="4"></span>
                                        <span class="rating-star" data-value="3"></span>
                                        <span class="rating-star" data-value="2"></span>
                                        <span class="rating-star" data-value="1"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-default sidebar-menu wow fadeInRight animated">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Comment</h3>
                                </div>
                                <div class="panel-body recent-property-widget">
                                    <div class="form-group">
                                        <textarea class="form-control" rows="6.0" id="desc" name="desc"></textarea>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" onclick="myFunc()" class="btn btn-primary">Submit Review</button>
                                    </div>
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>

            </div>
        </div>
    </body>
    <!-- Footer area-->
        <div class="footer-area">

            <div class=" footer">
                <div class="container">
                    <div class="row">

                        <div class="col-md-3 col-sm-6 wow fadeInRight animated">
                            <div class="single-footer">
                                <h4>About us </h4>
                                <div class="footer-title-line"></div>

                               <img src="<?php echo base_url(CustomizationManager::$images->LOGO_DARK)?>" alt="" class="wow pulse" data-wow-delay="1s" >
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
            <script>
            var submitStars;
            $('.rating-star').click(function() {
                $(this).parents('.rating').find('.rating-star').removeClass('checked');
                $(this).addClass('checked');

                submitStars = $(this).attr('data-value');
            });

            function myFunc(){
                var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>',
                    csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';
                var msg = $("#desc").val();
                var id = <?php echo $e->event_id;?>;
                //alert('<?php echo $this->session->userdata['userSession']->userID;?>');
                $.ajax({
                    url: "<?php echo site_url().'/event/cEvent/createEventReview';?>",
                    type: "POST",
                    data: {
                            'csrfName':csrfHash,
                            'event_id':id, 
                            'rating':submitStars,
                            'desc'  :msg
                           },
                    datatype: 'text',
                    success: function(data){
                    }
                });
                //window.location.reload();
             }
        </script>
</html>