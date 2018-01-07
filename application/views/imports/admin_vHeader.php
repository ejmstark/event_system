<!DOCTYPE html>

<html lang="en">
<head>

<!-- Meta information -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">

<!-- Title-->
<title>DailyEvents </title>
<!-- Favicons -->
<link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
<link rel="shortcut icon" href="assets/ico/logo.png">

<!-- CSS Stylesheet-->

<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/adminAssets/css/bootstrap/bootstrap.min.css')?>" />
<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/adminAssets/css/bootstrap/bootstrap-themes.css')?>" />
<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/adminAssets/css/dsStudentsStyles.css')?>" />
<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/adminAssets/css/style5.css')?>" />

<link type="text/css" rel="alternate stylesheet" media="screen" title="style1" href="<?php echo base_url('assets/adminAssets/css/styleTheme1.css')?>" />

<script src="<?php echo base_url('assets/jcAssets/js/popper.min.js"')?>"></script>
<script src="<?php echo base_url('assets/jcAssets/js/jquery-3.2.1.min.js"')?>"></script>
<script src="<?php echo base_url('assets/jcAssets/js/bootstrap.min.js"')?>"></script>

</head>
<body class="leftMenu nav-collapse">
<div id="wrapper">
    
    <!-- HEADER CONTENT -->
    <div id="header">
    
        <div class="logo-area clearfix">
            <a href="#" class="logo"></a>
        </div>
        <!-- //logo-area-->
        
        <div class="tools-bar">
            <ul class="nav navbar-nav nav-main-xs">
                <li><a href="#" class="icon-toolsbar nav-mini"><i class="fa fa-bars"></i></a></li>

                <li><button class="btn btn-circle btn-header-search" ><i class="fa fa-search"></i></button></li>
            </ul>
            
              
            </ul>
            <ul class="nav navbar-nav navbar-right tooltip-area">
                               
                <li><a class="avatar-header">
                        <img alt="" src="<?php echo base_url('assets/adminAssets/img/admin.png')?>"  class="circle">
                    </a>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">
                      <em> ADMIN </em> <i class="dropdown-icon fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu pull-right icon-right arrow">
                        <li><a href="#"><i class="fa fa-user"></i> Profile</a></li>
                        <li><a href="<?php echo site_url();?>/admin/cAdmin/adminSettings"><i class="fa fa-cog"></i> Settings </a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo site_url();?>/cLogin/userLogout"><i class="fa fa-sign-out"></i> Signout </a></li>
                    </ul>
                    <!-- //dropdown-menu-->
                </li>
                <li class="visible-lg">
                  <a href="#" class="h-seperate fullscreen" data-toggle="tooltip" title="Full Screen" data-container="body"  data-placement="left">
                    <i class="fa fa-expand"></i>
                  </a>
                </li>
            </ul>
        </div>
        <!-- //tools-bar-->
        
    </div>
    <!-- //header-->
    
  
    <!-- TOP HEADER CONTENT -->
    <div class="widget-top-search">
      <span class="icon"><a href="#" class="close-header-search"><i class="fa fa-times"></i></a></span>
      <form id="top-search">
          <h2><strong>Quick</strong> Search</h2>
          <div class="input-group">
              <input  type="text" name="q" placeholder="Find something..." class="form-control" />
              <span class="input-group-btn">
              <button class="btn" type="button" title="With Sound"><i class="fa fa-microphone"></i></button>
              <button class="btn" type="button" title="Visual Keyboard"><i class="fa fa-keyboard-o"></i></button>
              <button class="btn" type="button" title="Advance Search"><i class="fa fa-th"></i></button>
              </span>
          </div>
      </form>
    </div>
    <!-- //widget-top-search-->


    <!-- LEFT NAV CONTENT  -->

    <nav id="menu"  >
        <ul>  
            <li><a href="<?php echo site_url();?>/admin/cAdmin/viewReport"><i class="icon  fa fa-laptop"></i> Dashboard </a></li>

            <li><a href="<?php echo site_url();?>/admin/cAdmin"><i class="icon  fa fa-bullhorn"></i>  Events </a></li>
            
            <li><a href="<?php echo site_url();?>/admin/cAdmin/viewUserAccountMgt"><i class="icon  fa fa-users"></i>  User Account </a></li>
            
            <li><a href="<?php echo site_url();?>/admin/cAdmin/viewAdminAccountMgt"><i class="icon  fa fa-user"></i>  Admin Account </a></li>

            <li><a href="<?php echo site_url();?>/admin/cAdmin/viewFinance"><i class="icon  fa fa-money"></i> Finance </a></li>

            <li><a href ="<?php echo site_url();?>/admin/cAdmin/generateCard" data-wow-delay="0.1s"><i class="icon  fa fa-credit-card"></i> Cards </a></li>

            <li><a href ="<?php echo site_url();?>/admin/cAdmin/viewReport" data-wow-delay="0.1s"><i class="icon  fa fa-bar-chart-o"></i> Reports </a></li>
            
        </ul>
    </nav>
    <!-- //nav left menu-->
    