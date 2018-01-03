
<!doctype html>
<html lang="en">
<head>
	<title>DailyEvents </title>
    <link href="<?php echo base_url('assets/dianeAssets/css/bootstrap/bootstrap.min.css')?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/dianeAssets/css/bootstrap/bootstrap-themes.css')?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/dianeAssets/css/font-awesome.min.css')?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/dianeAssets/css/style1.css')?>" rel="stylesheet" />
</head>
<body>
	<div class = "outer-header">
	    <div class = "top"></div>
	   	<div class = "row ">
	 		<div class = "col-sm-10 div-content">
				<div class = "col-sm-2"><a href = "<?php echo site_url();?>/CInitialize">HOME</a></div>
				<div class = "col-sm-2"><a href = "#">EVENTS</a> </div>
				<div class = "col-sm-2"><a href = "#">ABOUT</a></div>
				<?php if (!$this->session->userdata('userSession')) { ?>
				<div class = "col-sm-2"><a href = "<?php echo site_url();?>/CLogin">LOGIN</a> </div><?php }?>
				<div class = "col-sm-2"><a href = "<?php echo site_url();?>/CUser/viewSignUp">CREATE ACCOUNT</a> </div>
			</div>
		</div>

	    <div class = "inner-header"></div>

	    <div class="search-container">
		      <input type="text" class="searchTerm" placeholder="Name of Event  &#x2022;  Category  &#x2022;  Location  &#x2022;  Date" pattern="[\sa-zA-z0-9]+">
		      <button type="submit" class="searchButton">
		        <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
		     </button>
		</div>
	</div>

	
	


	 