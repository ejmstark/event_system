<?php
  require('assets/CustomizationManager.php');
  CustomizationManager::SetTheme("configurations 0");
?>
<!doctype html>
<html lang="en">
<head>
	<title>DailyEvents </title>
    <link href="<?php echo base_url('assets/dianeAssets/css/bootstrap/bootstrap.min.css')?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/dianeAssets/css/bootstrap/bootstrap-themes.css')?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/dianeAssets/css/font-awesome.min.css')?>" rel="stylesheet" />
    <!-- <link href="<?php echo base_url('assets/dianeAssets/css/style1.css')?>" rel="stylesheet" /> -->
		<link href="<?php echo base_url('assets/dianeAssets/css/style1.php')?>" rel="stylesheet" />
</head>
<body>
	<div class = "outer-header">
	    <div class = "top"></div>
	   	<div class = "row ">
	 		<div class = "col-sm-10 div-content">
				<div class = "col-sm-2"><a href = "<?php echo site_url();?>/cInitialize"><?php echo CustomizationManager::$strings->WELCOME_PAGE_NAV_HOME ?></a></div>
				<div class = "col-sm-2"><a href = "#"><?php echo CustomizationManager::$strings->WELCOME_PAGE_NAV_EVENTS ?></a> </div>
				<div class = "col-sm-2"><a href = "<?php echo site_url();?>/CInitialize/viewAboutUs"><?php echo CustomizationManager::$strings->WELCOME_PAGE_NAV_ABOUT ?></a></div>
				<?php if (!$this->session->userdata('userSession')) { ?>
				<div class = "col-sm-2"><a href = "<?php echo site_url();?>/cLogin"><?php echo CustomizationManager::$strings->WELCOME_PAGE_NAV_LOGIN ?></a> </div><?php }?>
				<div class = "col-sm-2"><a href = "<?php echo site_url();?>/user/cUser/viewSignUp"><?php echo CustomizationManager::$strings->WELCOME_PAGE_NAV_REGISTER ?></a> </div>
			</div>
		</div>

	    <div class = "inner-header" id="targ"></div>

	</div>
