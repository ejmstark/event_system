<?php
  require('assets/CustomizationManager.php');
  CustomizationManager::SetTheme("configurations 2");
?>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> About Us </title>
        <link rel="stylesheet" href="<?php echo base_url('assets/josephAssets/css/styleCreateEvent.css')?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/josephAssets/css/font-awesome.css')?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/josephAssets/css/font-awesome.min.css')?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/josephAssets/css/bootstrap.css')?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/josephAssets/css/bootstrap.min.css')?>">
        <!-- <link href="<?php echo base_url('assets/nikkiAssets/img/aboutusbackground.png')?>" rel="image_src" /> -->

        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" />

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
    
        <style>
            a{
                color:	#D2691E;
            }
            h1{
                margin: auto;
                margin-left: 33%;
                color:	#333333;
                width: 50%;
                padding: 10px;
            }
            span{ 
                padding-left: 3.8em;
                font-size: 16px;
            }
            body {
                background-color: #cccccc;
            }
            .content{
                padding: 3em;
                background-color: rgba(255, 255, 255, 0.5); 
            }
        </style>
    </head>

    <body background = "<?php echo base_url();?>/assets/nikkiAssets/img/aboutusbackground.png">
        <nav class="navbar navbar-inverse">
            <div class="container container-fluid">
                <div class="container">
                    <ul class="nav navbar-navx navbar-right inline-navbar" color = "#D2691E">
                        <li><a href="<?php echo site_url();?>/cInitialize/#">Home</a></li>
                        <li><a href="contact.html">Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class = "row">
            <div class = "col-sm-3"></div>
            <div class = "col-sm-6 div-content">
                <h1>About US!</h1>
                <br>
                <hr>
                <br>
                <div class = "content">
                    <span>Daily Events is a joint effort project software application that the students of University of San Carlos made for their project in Software Development Course with their awe-inspiring instructor who has taught them ropes by applying methods directly from the industry in order to have confidence in pursuing the Software Development career in the field of Information Technology. This web application allows people to connect together through events and give them an accessible way for them to look for events that have piqued their interests, giving clients an easy way to bring events to them through this site and maybe even new, unique or hidden events that you the customer have yet to discover and love. In order for this to work, the team of highly skilled individuals who are the students of USC have made ascertain that the application is up to the standards of modern day software application and even added their own little touch, giving a feeling of distinctiveness. This application also allows users to transact the tickets directly using this website making it hassle-free by simply loading up your account in order to buy said ticket.
                    </span>
                    <br>
                    <br>
                    <span>Lastly, I would like to give credit to the people who have made this application possible no matter how small or big the contribution they have to this project, their laughs, their blessings, their perseverance, their ideas and even their time, understanding that the entire class still had other matters to work on such as their thesis, helped all of us no matter how of a burden or hardship it may be, yet they persevered through and through. 
                    </span>
                </div>
            </div>
        </div>
    </body>
</html>

