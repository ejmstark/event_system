<!-- Add these lines below to pages with customizable elements -->
<?php
  require('assets/CustomizationManager.php');
  CustomizationManager::SetTheme("configurations 1");
?>
<!-- Up to here -->

    <body>

        <div id="preloader">
            <div id="status">&nbsp;</div>
        </div>

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
                    <!-- <a class="navbar-brand" href="index-5.html"><img src="<?php echo base_url('assets/dianeAssets/img/logoBlack.png')?>"></a> -->
                    <a class="navbar-brand" href="index-5.html"><img src="<?php echo base_url(CustomizationManager::$images->LOGO_DARK)?>"></a>
                </div>

                <div class="collapse navbar-collapse yamm" id="navigation">
                    <div class="button navbar-right">
                        <!-- <a href ="<?php echo site_url();?>/cLogin/userLogout" data-wow-delay="0.1s"><button class="navbar-btn nav-button wow bounceInRight login"> Logout </button></a> -->
                        <a href ="<?php echo site_url();?>/cLogin/userLogout" data-wow-delay="0.1s"><button class="navbar-btn nav-button wow bounceInRight login"> <?php echo CustomizationManager::$strings->LANDING_PAGE_LOGOUT_BUTTON ?> </button></a>
                    </div>

                    <div class="button navbar-right">
                        <!-- <a href ="<?php echo site_url();?>/event/cEvent/viewCreateEvent" data-wow-delay="0.4s"><button class="navbar-btn nav-button wow bounceInRight login"> Create Event </button></a> -->
                        <a href ="<?php echo site_url();?>/event/cEvent/viewCreateEvent" data-wow-delay="0.4s"><button class="navbar-btn nav-button wow bounceInRight login"> <?php echo CustomizationManager::$strings->LANDING_PAGE_CREATE_EVENT_BUTTON ?> </button></a>
                    </div>


                    <ul class="main-nav nav navbar-nav navbar-right">
                        <!-- <li class="wow fadeInDown" data-wow-delay="0.1s"><a href="<?php echo site_url();?>/cLogin/viewDashBoard">Home</a></li>
                        <li class="wow fadeInDown" data-wow-delay="0.1s"><a href="<?php echo site_url();?>/event/cEvent/viewEvents">Profile</a></li>
                        <li class="wow fadeInDown" data-wow-delay="0.1s"><a href="<?php echo site_url();?>/user/cUser/viewAnnouncements">Announcements</a></li>
                        <li class="wow fadeInDown" data-wow-delay="0.1s"><a href="<?php echo site_url();?>/finance/cCart/viewCart">View Cart</a></li> -->
                        <li class="wow fadeInDown" data-wow-delay="0.1s"><a href="<?php echo site_url();?>/cLogin/viewDashBoard"><?php echo CustomizationManager::$strings->LANDING_PAGE_NAV_HOME ?></a></li>
                        <li class="wow fadeInDown" data-wow-delay="0.1s"><a href="<?php echo site_url();?>/event/cEvent/viewEvents"><?php echo CustomizationManager::$strings->LANDING_PAGE_NAV_PROFILE ?></a></li>
                        <li class="wow fadeInDown" data-wow-delay="0.1s"><a href="<?php echo site_url();?>/user/cUser/viewAnnouncements"><?php echo CustomizationManager::$strings->LANDING_PAGE_NAV_ANNOUNCEMENTS ?></a></li>
                        <li class="wow fadeInDown" data-wow-delay="0.1s"><a href="<?php echo site_url();?>/finance/cCart/viewCart"><?php echo CustomizationManager::$strings->LANDING_PAGE_NAV_VIEW_CART ?></a></li>
                        <!--
                        <li class="wow fadeInDown" data-wow-delay="0.1s"><a href ="<?php echo site_url();?>/event/cEvent/viewCreateEvent" >Contact</a></li>
                        <li class="wow fadeInDown" data-wow-delay="0.1s"><a href ="#" >Profile</a></li> -->
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <!-- End of nav bar -->



        <div class="slider-area">
            <div class="slider">
                <div id="bg-slider" class="owl-carousel owl-theme">

                    <!-- <div class="item"><img src= "<?php echo base_url('assets/nikkiAssets/img/slide1/slider-image-2.jpg')?>"></div>
                    <div class="item"><img src= "<?php echo base_url('assets/nikkiAssets/img/slide1/slider-image-5.jpg')?>"></div>
                    <div class="item"><img src= "<?php echo base_url('assets/nikkiAssets/img/slide1/slider-image-3.jpg')?>"></div> -->

                    <?php echo '<div class="item"><img src= "' . base_url(CustomizationManager::$images->LANDING_PAGE_CAROUSEL_BACKGROUND_1) . '"></div>'?>
                    <?php echo '<div class="item"><img src= "' . base_url(CustomizationManager::$images->LANDING_PAGE_CAROUSEL_BACKGROUND_2) . '"></div>'?>
                    <?php echo '<div class="item"><img src= "' . base_url(CustomizationManager::$images->LANDING_PAGE_CAROUSEL_BACKGROUND_3) . '"></div>'?>

                </div>
            </div>
            <div class="container slider-content">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-12">
                        <!-- <h2>See Events Near You</h2> -->
                        <h2><?php echo CustomizationManager::$strings->LANDING_PAGE_CAROUSEL_MESSAGE ?></h2>
                        <div class="search-form wow pulse" data-wow-delay="0.8s">

                            <form action="<?php echo site_url();?>/user/cEvent/searchEvent" class=" form-inline" method="POST">
                                <!-- <span style="color: gray;">Search Event</span><span>aaa</span> -->
                                <span style="color: gray;"><?php echo CustomizationManager::$strings->LANDING_PAGE_SEARCH_BOX_LABEL ?></span><span>aaa</span>
                                <div class="form-group">
                                    <!-- <input name="searchWord" type="text" class="form-control" placeholder="Key word" pattern="[\sa-zA-z0-9]+"> -->
                                    <input name="searchWord" type="text" class="form-control" placeholder="<?php echo CustomizationManager::$strings->LANDING_PAGE_SEARCH_BOX_PLACEHOLDER ?>" pattern="[\sa-zA-z0-9]+">
                                </div>
                                <!-- <div class="form-group">
                                    <select name="basic" class="form-control">
                                        <option>Concerts</option>
                                        <option>Workshops</option>
                                        <option>Other</option>
                                    </select>
                                </div> -->
                                <button class="btn search-btn" type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- property area -->
        <div class="content-area recent-property" style="padding-bottom: 60px; background-color: rgb(252, 252, 252);">
            <div class="container">
                <div class="row">
                    <div class="col-md-12  padding-top-40 properties-page">
                        <div class="col-md-12 ">
                            <div class="col-xs-10 page-subheader sorting pl0">

                                <ul class="sort-by-list">
                                    <li class="active">
                                        <!-- <a href="javascript:void(0);" class="order_by_date" data-orderby="property_date" data-order="ASC">
                                            Sort By Date <i class="fa fa-sort-amount-asc"></i>
                                        </a> -->
                                        <a href="javascript:void(0);" class="order_by_date" data-orderby="property_date" data-order="ASC">
                                            <?php echo CustomizationManager::$strings->LANDING_PAGE_SORT_BY_DATE ?> <i class="fa fa-sort-amount-asc"></i>
                                        </a>
                                    </li>
                                    <li class="">
                                        <!-- <a href="javascript:void(0);" class="order_by_price" data-orderby="property_price" data-order="DESC">
                                            Sort By Price <i class="fa fa-sort-numeric-desc"></i>
                                        </a> -->
                                        <a href="javascript:void(0);" class="order_by_price" data-orderby="property_price" data-order="DESC">
                                            <?php echo CustomizationManager::$strings->LANDING_PAGE_SORT_BY_PRICE ?> <i class="fa fa-sort-numeric-desc"></i>
                                        </a>
                                    </li>
                                </ul>

                                <div class="items-per-page">
                                    <!-- <label for="items_per_page"><b>Events per page :</b></label> -->
                                    <label for="items_per_page"><b><?php echo CustomizationManager::$strings->LANDING_PAGE_EVENTS_PER_PAGE ?></b></label>
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
                                    </div><!--/ .sel-->
                                </div><!--/ .items-per-page-->
                            </div>

                            <div class="col-xs-2 layout-switcher">
                                <a class="layout-list" href="javascript:void(0);"> <i class="fa fa-th-list"></i>  </a>
                                <a class="layout-grid active" href="javascript:void(0);"> <i class="fa fa-th"></i> </a>
                            </div><!--/ .layout-switcher-->
                        </div>

                        <div class="col-md-12 ">
                            <div id="list-type" class="proerty-th">
                            <?php
                            $cnt =1;
                                        if(isset($events)){
                                            foreach ($events as $event) {
                                               ?>
                                            <div class="col-sm-6 col-md-4 p0">
                                            <div class="box-two proerty-item">
                                                <div class="item-thumb">
                                                    <a href="<?php echo site_url();?>/event/cEvent/displayEventDetails/<?php echo $event->event_id;?>"><img style="max-height: 70px;" src="<?php echo base_url();?>assets/dianeAssets/img/events<?php echo $cnt++; ?>.jpg"></a>
                                                </div>
                                                   <div class="item-entry overflow">
                                                        <h5><a href="<?php echo site_url();?>/cLogin/viewEventDetails"> <?php
                                                    if(strlen($event->event_name)>=42){
                                                        echo substr($event->event_name,0,39)."...";
                                                    }else{
                                                            echo $event->event_name;
                                                    }
                                                    ?></a></h5>
                                                    <?php
                                                        echo $event->event_name;

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

                                                    ?>
                                                        <div class="dot-hr"></div>
                                                        <!-- <span class="pull-left"><b> Date: </b> <?php echo $event->dateStart;?>  </span> -->
                                                        <span class="proerty-price pull-right"></span>
                                                        <!-- <p><?php echo $event->event_details;?> </p> -->
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
                             <!--<p><?php echo CustomizationManager::$strings->ABOUT_MESSAGE ?></p> -->
                             <p> <?php if(CustomizationManager::$currentConfigName == 'configurations 1'){
                                include_once("vAboutUs.php");
                            }else if(CustomizationManager::$currentConfigName == 'configurations 2'){

                            }else{

                            } ?> </p>

                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6 wow fadeInRight animated">
                            <div class="single-footer news-letter">
                              <!-- <h4>Contact Us</h4> -->
                              <h4><?php echo CustomizationManager::$strings->CONTACT_US_HEADER ?></h4>
                                <div class="footer-title-line"></div>
                                <ul class="footer-adress">
                                    <!--<li><i class="pe-7s-mail strong"> </i> dailyEvents@gmail.com</li>
                                        <li><i class="pe-7s-call strong"> </i> 253-2753</li> -->
                                    <li><i class="pe-7s-mail strong"> </i> 
                                        <?php if(CustomizationManager::$currentConfigName == 'configurations 1'){
                                            include_once("vEmail.php");
                                        }else if(CustomizationManager::$currentConfigName == 'configurations 2'){
                                        
                                        }else{

                                        } ?> 
                                    </li>
                                    <li><i class="pe-7s-call strong"> </i>
                                        <?php if(CustomizationManager::$currentConfigName == 'configurations 1'){
                                            include_once("vContactNo.php");
                                        }else if(CustomizationManager::$currentConfigName == 'configurations 2'){

                                        }else{

                                        } ?>
                                    </li>
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
                              <!-- <li><a class="wow fadeInUp animated" href="#" data-wow-delay="0.2s">Home</a></li>
                              <li><a class="wow fadeInUp animated" href="#" data-wow-delay="0.3s">Events</a></li>
                              <li><a class="wow fadeInUp animated" href="#" data-wow-delay="0.6s">Contact</a></li> -->
                              <li><a class="wow fadeInUp animated" href="#" data-wow-delay="0.2s"><?php echo CustomizationManager::$strings->FOOTER_NAV_HOME ?></a></li>
                              <li><a class="wow fadeInUp animated" href="#" data-wow-delay="0.3s"><?php echo CustomizationManager::$strings->FOOTER_NAV_EVENTS ?></a></li>
                              <li><a class="wow fadeInUp animated" href="#" data-wow-delay="0.6s"><?php echo CustomizationManager::$strings->FOOTER_NAV_CONTACT ?></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
