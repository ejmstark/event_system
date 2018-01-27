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
    <script src="<?php echo base_url('assets/josephAssets/js/jquery-3.2.1.js')?>" /></script>
    <script src="<?php echo base_url('assets/josephAssets/js/bootstrap.min.js')?>" /></script>
  </head>
  
  <body>
  <div class="main-agileits">
  <!--form-starts-here-->
      <div class="right-map-w3-agile">
        <a href="<?php echo site_url(); ?>">
          <img src="<?php echo base_url(); ?>/assets/customizationAssets/RobinAssets/arrow-left.png">
        </a>
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
                  <a href="<?php echo base_url('/index.php/cError404') ?>"> Forgot your password? </a>
                  <br>Don't have an account? <a href="<?php echo site_url();?>/user/cUser/viewSignUp"> Sign up here! </a>
              </form>
            </center>
          </div>
      </div>
    </div>
  
  <!-- Added by Ted -->
  <!-- Error Modal -->
  <div id="errorModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
  
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><?php echo $errorTitle ?></h4>
        </div>
        <div class="modal-body">
          <p><?php echo $errorMessage ?></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
  
    </div>
  </div>
  <!-- End of Error Modal -->
  <!-- Error Modal Trigger -->
  <?php
    if(isset($errorTitle) && isset($errorMessage)){
      echo "<script type = 'text/javascript'>
              $(document).ready(function(){
                $('#errorModal').modal('show');
              });
            </script>";
    }
  ?>
  <!-- End of Error Modal Trigger -->
  
   <div style="position:fixed;top:15px;right:15px;"> <a href="<?php echo base_url()?>" style="color:#ffff;">⟵ Home</a></div>
  </body>
  </html>
  <?php }else{
    redirect('cLogin/viewDashboard');
    }?>
  