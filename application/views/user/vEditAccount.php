
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
                            <button class="navbar-btn nav-button wow bounceInRight login"> <a href ="<?php echo site_url();?>/CLogin/userLogout" data-wow-delay="0.1s">Logout </a></button>
                        </div>

                        <div class="button navbar-right">
                            <button class="navbar-btn nav-button wow bounceInRight login"> <a href ="<?php echo site_url();?>/CEvent/viewCreateEvent" data-wow-delay="0.4s">Create Event </a></button>
                        </div>


                        <ul class="main-nav nav navbar-nav navbar-right">
                            <li class="wow fadeInDown" data-wow-delay="0.1s"><a href="<?php echo site_url();?>/CLogin/viewDashBoard">Home</a></li>

                            <li class="wow fadeInDown" data-wow-delay="0.1s"><a href="<?php echo site_url();?>/CEvent/viewEvents">Profile</a></li><!--
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
                        <h1 class="page-title">Edit Your Account</h1>
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
                            <h2>Your Account : </h2>
                            <form action="<?php echo site_url();?>/CUser/updateAccount" method="post">
                                <input type="text" name="account_id" value="<?php echo $ev["account_id"];?>" hidden>
                                <div class="form-group">
                                    <label for="name">First Name</label>
                                    <input type="text" value="<?php echo $ev["first_name"];?>" class="form-control" name="first_name" required="">
                                </div>

                                <div class="form-group">
                                    <label for="name">Last Name</label>
                                    <input type="text" value="<?php echo $ev["last_name"];?>" class="form-control" name="last_name" required="">

                                </div>

                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="text" value="<?php echo $ev["password"];?>" class="form-control" name="password" required="">

                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-default"><!-- <a href="<?php echo site_url();?>/cLogin/viewAccount"> -->Save</button>
                                </div>
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
