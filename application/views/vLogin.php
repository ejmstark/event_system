<?php if (!$this->session->userdata('userSession')) { ?>
<!doctype html>
<html lang="en">
<head>
  <title>DailyEvents </title>
    <link href="<?php echo base_url('assets/josephAssets/css/styleLogin.css')?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/josephAssets/css/font-awesome.css')?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/josephAssets/css/font-awesome.min.css')?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/josephAssets/css/bootstrap.css')?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/josephAssets/css/bootstrap.min.css')?>" rel="stylesheet" />

</head>

<body>
  <div class="loginBox">
    <center><span class="eventSystem"> <img src="<?php echo base_url('assets/josephAssets/img/DailyEvents.png')?>" class="eventLogo"> </span></center>
    <form  method="POST" action="<?php echo site_url()?>/cLogin/userLogin">
      <div>
        <input type="text" id="#{label}" name="Username" placeholder="Username" required/><span class="fa fa-user" aria-hidden="true"></span>
      </div>
      <div>
        <input type="password" id="#{label}" name="Password" placeholder="Password" required><span class="fa fa-lock" aria-hidden="true"></span> 
      </div>
      <input type="submit" name="" value="Log in">
      <center> 
      <a href="#"> Forgot your password? </a>
      <br>Don't have an account? <a href="<?php echo site_url();?>/user/cUser/viewSignUp"> Sign up here! </a>
      </center>
    </form>
  </div>

  <div class="detailsBox">
    <span class="detailOne"> Get acquainted with the people around you. </span>
    <br><br><br>
    <span class="detailTwo"> Know the latest events. </span>
    <br><br><br>
    <span class="detailThree"> <span class="orange">Join</span> them. <span class="orange">Create</span> them. </span>
  </div>
</body>
</html>
<?php }else{
  redirect('cLogin/viewDashboard');
  }?>