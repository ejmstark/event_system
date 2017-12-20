<?php if (!$this->session->userdata('userSession')) { ?>
<?php
  require("application/customization/CustomizationManager.php");
  CustomizationManager::SetTheme("configurations 2");
  $images = CustomizationManager::$images;
?>
<!DOCTYPE html>
<html>
<head>
  <title>DailyEvents </title>
  <!-- Custom Theme files -->
  <link href="<?php echo base_url('assets/josephAssets/"css/font-awesome.css')?>" rel="stylesheet"> 
    <link href="<?php echo base_url('assets/josephAssets/"css/font-awesome.min.css')?>" rel="stylesheet"> 

  <link href="<?php echo base_url('assets/nikkiAssets/css/style.php')?>" rel="stylesheet" type="text/css" media="all" >
  <link href="<?php echo base_url('assets/josephAssets/css/styleLogin1.css')?>" rel="stylesheet" /> <!-- should have a styleLogin1.php I thinks -->
  <link href="<?php echo base_url('assets/josephAssets/css/bootstrap.css')?>" rel="stylesheet" />
  <link href="<?php echo base_url('assets/josephAssets/css/bootstrap.min.css')?>" rel="stylesheet" />
</head>

<body>
<div class="main-agileits">
<!--form-stars-here-->
    <div class="right-map-w3-agile">
      <span class = "messageOne">Get acquainted with the people around you.</span>
      <p class="messageTwo"> Know the latest events. </p>
        <p class="messageThree"> <span class="orange">Join</span> them. <span class="orange">Create</span> them. </p> 
    </div>
<!--//form-ends-here-->
    <div class="left-form-w3-agile">
      <div class="loginBox">
          <center>
            <span class="eventSystem"> 
              <img src="<?php 
                if(CustomizationManager::$currentConfigName == 'configurations 1'){
                  //
                  echo base_url('assets/josephAssets/img/DailyEvents.png');
                }else if(CustomizationManager::$currentConfigName == 'configurations 2'){
                  echo base_url('assets/josephAssets/img/DailyEvents.png');
                }else{
                  echo base_url('assets/josephAssets/img/DailyEvents.png');
                }
              ?>" class="eventLogo"> 
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
              
              <input type="submit" name="" value="Log in">
                <a href="#"> Forgot your password? </a>
                <br>Don't have an account? <a href="<?php echo site_url();?>/user/cUser/viewSignUp"> Sign up here! </a>
            </form>
          </center>
        </div>
    </div>
  </div>


 
</body>
</html>
<?php }else{
  redirect('cLogin/viewDashboard');
  }?>