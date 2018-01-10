
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
	<div class = "body-content">
		<div class = "outer-header">
		    <div class = "top"></div>

			 	<nav class="navbar">
		    		<div class="container-fluid">
				        <!-- Brand and toggle get grouped for better mobile display -->
				        <div class="navbar-header">
				            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
				                <span class="sr-only">Toggle navigation</span>
				                <span class="icon-bar"></span>
				                <span class="icon-bar"></span>
				                <span class="icon-bar"></span>
				            </button>
				        </div>
				        
				        <!-- Collect the nav links, forms, and other content for toggling -->
				        <div class="collapse navbar-collapse">
				            <ul class="nav navbar-nav">
				                <li><a href = "<?php echo site_url();?>/cInitialize">HOME</a></li>
				                <li><a href = "#">EVENTS</a></li>
				                <li><a href = "#">ABOUT</a></li>
				                <?php if (!$this->session->userdata('userSession')) { ?>
				                	<li><a href = "<?php echo site_url();?>/cLogin">LOGIN</a></li>
				                <?php }?>
				                <li><a href = "<?php echo site_url();?>/user/cUser/viewSignUp">CREATE ACCOUNT</a></li>
				            </ul>
				        </div><!-- /.navbar-collapse -->
				    </div><!-- /.container-fluid -->
				</nav>



		    <div class = "inner-header"></div>

		    <div class="search-container">
			      <input type="text" class="searchTerm" placeholder="Name of Event  &#x2022;  Category  &#x2022;  Location  &#x2022;  Date">
			      <button type="submit" class="searchButton">
			        <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
			     </button>
			</div>
		</div>

		
	
	


	 