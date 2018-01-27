
<!doctype html>
<html lang="en">
<head>
	<title>DailyEvents </title>
    <link href="<?php echo base_url('assets/dianeAssets/css/bootstrap/bootstrap.min.css')?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/dianeAssets/css/bootstrap/bootstrap-themes.css')?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/dianeAssets/css/font-awesome.min.css')?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/dianeAssets/css/style.php')?>" rel="stylesheet" /> <!-- causes homepage to change --> 
     <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
      <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>

</head>
<body>
	<div class = "outer-header">
	    <div class = "top"></div>
	   	<div class = "row ">
	 		<div class = "col-sm-10 div-content">
				<div class = "col-sm-2"><a href = "<?php echo site_url();?>/cInitialize">HOME</a></div>
				<div class = "col-sm-2"><a href = "#targ2">EVENTS</a> </div>
				<div class = "col-sm-2"><a href = "<?php echo site_url('cInitialize/viewAboutUs');?>">ABOUT</a></div>
				<?php if (!$this->session->userdata('userSession')) { ?>
				<div class = "col-sm-2"><a href = "<?php echo site_url();?>/cLogin">LOGIN</a> </div><?php }?>
				<div class = "col-sm-2"><a href = "<?php echo site_url();?>/user/cUser/viewSignUp">CREATE ACCOUNT</a> </div>
			</div>
		</div>

	    <div class = "inner-header" id="targ"></div>

	</div>

	
	


	 