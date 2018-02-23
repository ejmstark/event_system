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
        <script>
        $(document).ready(function(){
            /* 1. Visualizing things on Hover - See next part for action on click */
            $('#stars li').on('mouseover', function(){
                var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on
                // Now highlight all the stars that's not after the current hovered star
                $(this).parent().children('li.star').each(function(e){
                    if (e < onStar) {
                        $(this).addClass('hover');
                    }else {
                        $(this).removeClass('hover');
                    }
                });
    
            }).on('mouseout', function(){
                $(this).parent().children('li.star').each(function(e){
                    $(this).removeClass('hover');
                });
            });
  
            /* 2. Action to perform on click */
            $('#stars li').on('click', function(){
                var onStar = parseInt($(this).data('value'), 10); // The star currently selected
                var stars = $(this).parent().children('li.star');
    
                for (i = 0; i < stars.length; i++) {
                    $(stars[i]).removeClass('selected');
                }
    
                for (i = 0; i < onStar; i++) {
                    $(stars[i]).addClass('selected');
                }
                });
            });

            function myFunc(){
                var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
                var msg = $("#desc").val();
                alert(ratingValue+" "+msg);
                $.post("addRating.php",{rating:ratingValue, desc:msg}, function(data){
                });
            }
        </script>
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
                        <div class='rating-stars'>
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
                      </div>
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
                                <div class="s-property-content">
                                    <div class="clear">
                                        <hr>
                                        <div class="dealer-face">
                                            <h3><img src="<?php echo base_url('assets/nikkiAssets/img/client-face1.png" class="img-circle"')?>" style="height:50px;width=50px;" align="top">Neil Llenes</h3>
                                            <p style="font-size:90%;">&emsp;This event is so rad like whut idk how to explain it well 8/8 would go at it again</p>
                                            <div class='rating-stars'>
                                            <ul id='stars'>&emsp;Rating
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
                                          </div>
                                        </div>
                                        <hr>
                                        <div class="dealer-face">
                                            <h3><img src="<?php echo base_url('assets/nikkiAssets/img/client-face1.png" class="img-circle"')?>" style="height:50px;width=50px;" align="top">Dave Concepcion</h3>
                                            <p style="font-size:90%;">&emsp;gr8 m8 i r8 8/8</p>
                                            <div class='rating-stars'>
                                            <ul id='stars'>&emsp;Rating
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
                                          </div>
                                        </div>
                                        <hr>
                                        <div class="dealer-face">
                                            <h3><img src="<?php echo base_url('assets/nikkiAssets/img/client-face1.png" class="img-circle"')?>" style="height:50px;width=50px;" align="top">Username</h3>
                                            <p style="font-size:90%;">&emsp;Comments here</p>
                                            <div class='rating-stars'>
                                            <ul id='stars'>&emsp;Rating
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
                                          </div>
                                        </div>
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
                                    <div class='rating-stars text-center'>
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
</html>