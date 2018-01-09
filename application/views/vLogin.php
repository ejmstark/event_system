<?php if (!$this->session->userdata('userSession')) { ?>
<!-- Add these lines below to pages with customizable elements -->
<?php
  require('assets/CustomizationManager.php');
  CustomizationManager::SetTheme("configurations 1");
?>
<!-- Up to here -->
<!DOCTYPE html>
<html>
<head>
  <title>DailyEvents </title>
  <!-- Custom Theme files -->
  <link href="<?php echo base_url('assets/josephAssets/"css/font-awesome.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/josephAssets/"css/font-awesome.min.css')?>" rel="stylesheet">

  <link href="<?php echo base_url('assets/josephAssets/css/style.css')?>" rel="stylesheet" type="text/css" media="all" >
  <!-- <link href="<?php echo base_url('assets/josephAssets/css/styleLogin1.css')?>" rel="stylesheet" /> -->
  <link href="<?php echo base_url('assets/josephAssets/css/styleLogin1.php')?>" rel="stylesheet" />
  <link href="<?php echo base_url('assets/josephAssets/css/bootstrap.css')?>" rel="stylesheet" />
  <link href="<?php echo base_url('assets/josephAssets/css/bootstrap.min.css')?>" rel="stylesheet" />
</head>

<body>
<div class="main-agileits">
<!--form-stars-here-->
    <div class="right-map-w3-agile">
      <!-- <span class = "messageOne">Get acquainted with the people around you.</span>
      <p class="messageTwo"> Know the latest events. </p>
        <p class="messageThree"> <span class="orange">Join</span> them. <span class="orange">Create</span> them. </p> -->
        <span class = "messageOne"><?php echo CustomizationManager::$strings->LOGIN_PAGE_MESSAGE_1 ?></span>
        <p class="messageTwo"><?php echo CustomizationManager::$strings->LOGIN_PAGE_MESSAGE_2 ?></p>
          <p class="messageThree"><?php echo CustomizationManager::$strings->LOGIN_PAGE_MESSAGE_3 ?></p>
    </div>
<!--//form-ends-here-->
    <div class="left-form-w3-agile">
      <div class="loginBox">
          <center>
            <span class="eventSystem">
              <!-- <img src="<?php echo base_url('assets/josephAssets/img/DailyEvents.png')?>" class="eventLogo"> -->
              <img src="<?php echo base_url(CustomizationManager::$images->LOGO_LIGHT) ?>" class="eventLogo">
            </span>
            <form  method="POST" action="<?php echo site_url()?>/cLogin/userLogin">
              <div>
                <input type="text" id="#{label}" name="Username" placeholder="Username" required/>
                <!-- <span class="fa fa-user" aria-hidden="true"></span> -->
              </div>
              <div>
                <input type="password" id="#{label}" name="Password" placeholder="Password" required>
                <!-- <span class="fa fa-lock" aria-hidden="true"></span> -->
              </div>

              <!-- <input type="submit" name="" value="Log in">
                <a href="#"> Forgot your password? </a>
                <br>Don't have an account? <a href="<?php echo site_url();?>/user/cUser/viewSignUp"> Sign up here! </a> -->
                <input type="submit" name="" value=<?php echo CustomizationManager::$strings->LOGIN_PAGE_LOGIN_BUTTON ?>>
                  <a href="#"><?php echo CustomizationManager::$strings->LOGIN_PAGE_FORGOT_PASSWORD ?></a>
                  <br><?php echo CustomizationManager::$strings->LOGIN_PAGE_DONT_HAVE_AN_ACCOUNT ?> <a href="<?php echo site_url();?>/user/cUser/viewSignUp"><?php echo CustomizationManager::$strings->LOGIN_PAGE_SIGNUP_HERE ?></a>
            </form>
          </center>
        </div>
    </div>
  </div>
  <div style="position:fixed;top:15px;right:15px;"> <a href="<?php echo base_url()?>" style="color:#ffff;">⟵ Home</a></div>
</body>
</html>
<?php }else{
  redirect('cLogin/viewDashboard');
  }?>
