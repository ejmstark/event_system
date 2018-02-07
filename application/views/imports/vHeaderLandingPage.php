<?php if ($this->session->userdata('userSession')) { ?>
<!DOCTYPE html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Event System | Home page</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.2/css/bootstrap-select.min.css" />
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.2/js/bootstrap-select.min.js"></script>

    <!-- FullCalendar -->
    <script  src="<?php echo base_url(); ?>assets/jsKyleAssets/moment.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.5.1/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.5.1/fullcalendar.js"></script>
    
    
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
    <link href="<?php echo base_url('assets/nikkiAssets/css/style.css')?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/nikkiAssets/css/normalize.css')?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/nikkiAssets/css/responsive.css')?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/nikkiAssets/css/pushpin.css')?>" rel="stylesheet" />

    <!--Customization module-->
    <!--<link href="<?php echo base_url('assets/nikkiAssets/css/style.php')?>" rel="stylesheet" />-->
    <link href="<?php echo base_url('assets/customization1Assets/css/notification.css')?>" rel="stylesheet" />
    <script src="<?php echo base_url('assets/customization1Assets/js/notification.js')?>"></script>

    <style>
        .calendar-legend{ margin-top:5%; max-width: 50%; border-radius: 15px; border: 1px solid #ccc; padding: 5px;}
        .legend { list-style: none; margin-left:-35px;}
        .legend span {   border: 1px solid #ccc; float: left; width: 15px; height: 15px; margin: 5px; }
        .legend .expired{ background-color: #808080; }
        .legend .approved{ background-color: #ffae00; }
        .legend .pending { background-color: #337ab7; }

        .table-borderless > tbody > tr > td,
        .table-borderless > tbody > tr > th,
        .table-borderless > tfoot > tr > td,
        .table-borderless > tfoot > tr > th,
        .table-borderless > thead > tr > td,
        .table-borderless > thead > tr > th {
            border: none;
        }
        .ballons {
            float:right;
            margin:-20px 8px 0 0;
            line-height:30px;
            padding:0 10px;
            border-radius: 30px;
            border:3px solid #fff;
            -moz-border-radius: 30px; 
            -webkit-border-radius: 305px;
            background:red;
            color:#fff;
            text-align:center;
            -moz-box-shadow:    1px 1px 3px 3px #ccc;
            -webkit-box-shadow: 1px 1px 3px 3px #ccc;
            box-shadow:         1px 1px 3px 3px #ccc;
        }        

      .checkoutContainer {
        overflow: hidden;
        background-color: #333;
        position: fixed;
        bottom: 0;
        width: 100%;
        padding: 10px;
        margin:0px !important;
        color:white;
      }

                .details{
                  display:inline-block;
                  position: absolute;
                  overflow:hidden;
                }

                .corner-ribbon{
                  width: 200px;
                  background: #e43; 
                  display:inline-block;
                  position: absolute;
                  overflow:hidden; 
                  top: 25px;
                  left: -50px;
                  text-align: center;
                  line-height: 50px;
                  letter-spacing: 1px;
                  color: #f0f0f0;
                  transform: rotate(-45deg);
                  -webkit-transform: rotate(-45deg);
                }

                /* Custom styles */

                .corner-ribbon.sticky{
                   display:inline-block;
                    position: relative;
                    overflow:hidden; 
                }

                .corner-ribbon.shadow{
                  box-shadow: 0 0 3px rgba(0,0,0,.3);
                }

                /* Different positions */
                .corner-ribbon.top-right{
                  top: 15px;
                  right: -210px;
                  left: auto;
                  transform: rotate(45deg);
                  -webkit-transform: rotate(45deg);
                }

                

                /* Colors */

                .corner-ribbon.white{background: #f0f0f0; color: #555;}
                .corner-ribbon.black{background: #333;}
                .corner-ribbon.grey{background: #999;}
                .corner-ribbon.blue{background: #39d;}
                .corner-ribbon.green{background: #2c7;}
                .corner-ribbon.turquoise{background: #1b9;}
                .corner-ribbon.purple{background: #95b;}
                .corner-ribbon.red{background: #e43;}
                .corner-ribbon.orange{background: #e82;}
                .corner-ribbon.yellow{background: #ec0;}

            
    </style>
</head>

<?php } else {
        redirect('cLogin/login');
    }
?>
