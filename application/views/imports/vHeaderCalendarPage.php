<?php if ($this->session->userdata('userSession')) { ?>
<!DOCTYPE html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Event System | Calendar</title>


                <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
                <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
                <link rel="icon" href="favicon.ico" type="image/x-icon">

                <link href="<?php echo base_url('assets/nikkiAssets/css/normalize.css')?>" rel="stylesheet" />
                <link href="<?php echo base_url('assets/nikkiAssets/css/font-awesome.min.css')?>" rel="stylesheet" />
                <link href="<?php echo base_url('assets/nikkiAssets/css/fontello.css')?>" rel="stylesheet" />
                <link href="<?php echo base_url('assets/nikkiAssets/fonts/icon-7-stroke/css/pe-icon-7-stroke.css')?>" rel="stylesheet" />
                <link href="<?php echo base_url('assets/nikkiAssets/fonts/icon-7-stroke/css/helper.css')?>" rel="stylesheet" />
                <link href="<?php echo base_url('assets/nikkiAssets/css/animate.css')?>" rel="stylesheet" />
                <link href="<?php echo base_url('assets/nikkiAssets/css/bootstrap-select.min.css')?>" rel="stylesheet" />
                <link href="<?php echo base_url('assets/nikkiAssets/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet" />
                <link href="<?php echo base_url('assets/nikkiAssets/css/icheck.min_all.css')?>" rel="stylesheet" />
                <link href="<?php echo base_url('assets/nikkiAssets/css/price-range.css')?>" rel="stylesheet" />
                <link href="<?php echo base_url('assets/nikkiAssets/css/owl.carousel.css')?>" rel="stylesheet" />
                <link href="<?php echo base_url('assets/nikkiAssets/css/owl.theme.css')?>" rel="stylesheet" />
                <link href="<?php echo base_url('assets/nikkiAssets/css/owl.transitions.css')?>" rel="stylesheet" />
                <!-- <link href="<?php echo base_url('assets/nikkiAssets/css/style.css')?>" rel="stylesheet" /> -->
                <link href="<?php echo base_url('assets/nikkiAssets/css/normalize.css')?>" rel="stylesheet" />
                <link href="<?php echo base_url('assets/nikkiAssets/css/responsive.css')?>" rel="stylesheet" />


                <script src="<?php echo base_url('assets/jsKyleAssets/jquery.js')?>" rel="stylesheet" /> </script>
             <!--    <link href="<?php echo base_url('assets/cssKyleAssets/bootstrap.min.css')?>" rel="stylesheet" /> -->
                <link href="<?php echo base_url('assets/cssKyleAssets/fullcalendar.css')?>" rel="stylesheet" />
                

    <style>
    body {
        /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
    }
    #calendar {
        max-width: 800px;
    }
    .col-centered{
        float: none;
        margin: 0 auto;
    }
    </style>

</head>

<?php } else {
       redirect('cLogin/login');
    }
?>
