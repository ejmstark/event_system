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
                    <ul class="main-nav nav navbar-nav navbar-right">
                      <!-- <li class="wow fadeInDown" data-wow-delay="0.1s"><a href="<?php echo site_url();?>/cInitialize">Home</a></li> -->
                        <li class="wow fadeInDown" data-wow-delay="0.1s"><a href="<?php echo site_url();?>/cInitialize"><?php echo CustomizationManager::$strings->SIGNUP_PAGE_NAV_HOME ?></a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <!-- End of nav bar -->


        <div class="page-head">
            <div class="container">
                <div class="row">
                    <div class="page-head-content">
                        <!-- <h1 class="page-title">Sign Up / Sign In</h1> -->
                        <h1 class="page-title"><?php echo CustomizationManager::$strings->SIGNUP_PAGE_TITLE ?></h1>
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
                            <!-- <h2>New account : </h2> -->
                            <h2><?php echo CustomizationManager::$strings->SIGNUP_PAGE_NEW_ACCOUNT ?></h2>
                            <?php if ($this->session->flashdata('error_msg')): ?>
                                <div class="alert alert-danger" style="margin-top: 15px;">
                                    <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                                    <?php echo $this->session->flashdata('error_msg'); ?>
                                </div>
                            <?php endif ?>
                            <form action="<?php echo site_url();?>/user/cUser/signup" method="post">
                                <div class="form-group">
                                    <!-- <label for="name">First Name</label> -->
                                    <label for="name"><?php echo CustomizationManager::$strings->SIGNUP_PAGE_FIRST_NAME ?></label>
                                    <input type="text" <?php  if(isset($first_name)){echo 'value="'.$first_name.'"';}?> class="form-control" pattern="[a-zA-Z]+" name="fname" id="name" required="">
                                </div>
                                <div class="form-group">
                                    <!-- <label for="name">Middle Initial</label> -->
                                    <label for="name"><?php echo CustomizationManager::$strings->SIGNUP_PAGE_MIDDLE_INITIAL ?></label>
                                    <input type="text"  <?php  if(isset($middle_initial)){echo 'value="'.$middle_initial.'"';}?> class="form-control" pattern="[a-zA-Z]+" name="miname" id="name" required="">
                                </div>
                                <div class="form-group">
                                    <!-- <label for="name">Last Name</label> -->
                                    <label for="name"><?php echo CustomizationManager::$strings->SIGNUP_PAGE_LAST_NAME ?></label>
                                    <input type="text"  <?php  if(isset($last_name)){echo 'value="'.$last_name.'"';}?> class="form-control" pattern="[a-zA-Z]+" name="lname" id="name" required="">
                                </div>
                                <div class="form-group">
                                    <!-- <label for="email">Email</label> -->
                                    <label for="email"><?php echo CustomizationManager::$strings->SIGNUP_PAGE_EMAIL ?></label>
                                    <input type="email"  <?php  if(isset($email)){echo 'value="'.$email.'"';}?> class="form-control" name="email" id="email" required="">
                                </div>
                                <div class="form-group">
                                    <!-- <label for="email">Birthdate</label> -->
                                    <label for="email"><?php echo CustomizationManager::$strings->SIGNUP_PAGE_BIRTHDATE ?></label>
                                    <input type="date"  <?php  if(isset($birthdate)){echo 'value="'.$birthdate.'"';}?> name="bdate" required="">



                                </div>
                                <div class="form-group">
                                    <!-- <label for="email">Gender</label> -->
                                    <label for="email"><?php echo CustomizationManager::$strings->SIGNUP_PAGE_GENDER ?></label>
                                    <select class="form-control" name="gender">
                                        <!-- <option value="Male" <?php  if(isset($gender) && $gender=="Male"){echo 'selected';}?>>Male</option>
                                        <option value="Female" <?php  if(isset($gender) && $gender=="Female"){echo 'selected';}?>>Female</option>
                                        <option value="Other" <?php  if(isset($gender) && $gender=="Other"){echo 'selected';}?>>Other</option> -->
                                        <option value="Male" <?php  if(isset($gender) && $gender=="Male"){echo 'selected';}?>><?php echo CustomizationManager::$strings->SIGNUP_PAGE_GENDER_MALE ?></option>
                                        <option value="Female" <?php  if(isset($gender) && $gender=="Female"){echo 'selected';}?>><?php echo CustomizationManager::$strings->SIGNUP_PAGE_GENDER_FEMALE ?></option>
                                        <option value="Other" <?php  if(isset($gender) && $gender=="Other"){echo 'selected';}?>><?php echo CustomizationManager::$strings->SIGNUP_PAGE_GENDER_OTHER ?></option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <!-- <label for="email">Contact Number</label> -->
                                    <label for="email"><?php echo CustomizationManager::$strings->SIGNUP_PAGE_CONTACT_NUMBER ?></label>
                                    <input type="text" <?php  if(isset($contact_no)){echo 'value="'.$contact_no.'"';}?>  pattern="^(09)\d{9}$" class="form-control" name="contact" id="email" required="">
                                </div>
                                <div class="form-group">
                                    <!-- <label for="email">Username</label> -->
                                    <label for="email"><?php echo CustomizationManager::$strings->SIGNUP_PAGE_USERNAME ?></label>
                                    <input type="text" minlength="6" <?php  if(isset($user_name)){echo 'value="'.$user_name.'"';}?> required="" class="form-control" pattern="[a-zA-Z0-9]+" name="uname" id="email">
                                </div>
                                <div class="form-group">
                                    <!-- <label for="password">Password</label> -->
                                    <label for="password"><?php echo CustomizationManager::$strings->SIGNUP_PAGE_PASSWORD ?></label>
                                    <input type="password" <?php  if(isset($password)){echo 'value="'.$password.'"';}?> class="form-control" required="" minlength="8" pattern="[a-zA-Z0-9]+" name="password" id="password">
                                </div>
                                <div class="text-center">
                                    <!-- <button type="submit" class="btn btn-default"><a href="<?php echo site_url();?>/cLogin/viewEvents">Register</button> -->
                                    <button type="submit" class="btn btn-default"><!-- <a href="<?php echo site_url();?>/cLogin/viewEvents"> --><?php echo CustomizationManager::$strings->SIGNUP_PAGE_SIGNUP_BUTTON ?></button>
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
