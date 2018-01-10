<html>
    <head>
        <style>
            .rating-stars ul {
                list-style-type:none;
                padding:0;
  
                -moz-user-select:none;
                -webkit-user-select:none;
            }
            
            .rating-stars ul > li.star {
                display:inline-block;  
            }

/* Idle State of the stars */
            .rating-stars ul > li.star > i.fa {
              font-size:1.5em; /* Change the size of the stars */
              color:#ccc; /* Color on idle state */
            }

            /* Hover state of the stars */
            .rating-stars ul > li.star.hover > i.fa {
              color:#FFCC36;
            }

            /* Selected state of the stars */
            .rating-stars ul > li.star.selected > i.fa {
              color:#FF912C;
            }

        </style>
    </head>
    <body>
        <nav class="navbar navbar-default ">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index-5.html"><img src="<?php echo base_url('assets/dianeAssets/img/logoBlack.png')?>"></a>
                </div>

                <div class="collapse navbar-collapse yamm" id="navigation">
                    <div class="button navbar-right">
                        <button class="navbar-btn nav-button wow bounceInRight login"> <a href ="<?php echo site_url();?>/cLogin/userLogout" data-wow-delay="0.1s">Logout </a></button>
                    </div>
                    <div class="button navbar-right">
                        <button class="navbar-btn nav-button wow bounceInRight login"> <a href ="<?php echo site_url();?>/event/cEvent/viewCreateEvent" data-wow-delay="0.4s">Create Event </a></button>
                    </div>

                    <ul class="main-nav nav navbar-nav navbar-right">
                        <li class="wow fadeInDown" data-wow-delay="0.1s"><a href="<?php echo site_url();?>/cLogin/viewDashBoard">Home</a></li>
                        
                        <li class="wow fadeInDown" data-wow-delay="0.1s"><a href="<?php echo site_url();?>/event/cEvent/viewEvents">Profile</a></li>
                        <!-- 
                        <li class="wow fadeInDown" data-wow-delay="0.1s"><a href ="<?php echo site_url();?>/event/cEvent/viewCreateEvent" >Contact</a></li>
                        <li class="wow fadeInDown" data-wow-delay="0.1s"><a href ="#" >Profile</a></li> -->
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <!-- End of nav bar -->


        <div class="page-head"> 
            <div class="container">
                <div class="row">
                    <div class="page-head-content">
                        <h1 class="page-title">Rate this event</h1>               
                    </div>
                </div>
            </div>
        </div>
    </body>
        <!-- End page header -->
    <br><br>
    <section class='rating-widget'>

      <!-- Rating Stars Box -->
      <div class='rating-stars text-center'>
        <ul id='stars'>
          <li class='star' title='Poor' data-value='1'>
            <i class='fa fa-star fa-fw'></i>
          </li>
          <li class='star' title='Fair' data-value='2'>
            <i class='fa fa-star fa-fw'></i>
          </li>
          <li class='star' title='Good' data-value='3'>
            <i class='fa fa-star fa-fw'></i>
          </li>
          <li class='star' title='Excellent' data-value='4'>
            <i class='fa fa-star fa-fw'></i>
          </li>
          <li class='star' title='WOW!!!' data-value='5'>
            <i class='fa fa-star fa-fw'></i>
          </li>
        </ul>
      </div>
    </section>
    <form action="" method="post" id="reg-form" enctype="multipart/form-data">
        <div class="modal-body">
            <div class="form-group">
				<label for="desc" class="control-label">Comment:</label>
                <textarea class="form-control" rows="6.0" id="desc" name="desc"></textarea>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" onclick="myFunc()" class="btn btn-primary">Save changes</button>
        </div>
    </form>
    <script>
        $(document).ready(function(){
            /* 1. Visualizing things on Hover - See next part for action on click */
            $('#stars li').on('mouseover', function(){
                var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on
                // Now highlight all the stars that's not after the current hovered star
                $(this).parent().children('li.star').each(function(e){
                    if (e < onStar) {
                        $(this).addClass('hover');
                    }else {
                        $(this).removeClass('hover');
                    }
                });
    
            }).on('mouseout', function(){
                $(this).parent().children('li.star').each(function(e){
                    $(this).removeClass('hover');
                });
            });
  
            /* 2. Action to perform on click */
            $('#stars li').on('click', function(){
                var onStar = parseInt($(this).data('value'), 10); // The star currently selected
                var stars = $(this).parent().children('li.star');
    
                for (i = 0; i < stars.length; i++) {
                    $(stars[i]).removeClass('selected');
                }
    
                for (i = 0; i < onStar; i++) {
                    $(stars[i]).addClass('selected');
                }
            });
        });

        function myFunc(){
            var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
            var msg = $("#desc").val();
            alert(ratingValue+" "+msg);
            $.post("addRating.php",{rating:ratingValue, desc:msg}, function(data){
            });
        }
    </script>
    <!-- Footer area-->
        <div class="footer-area">

            <div class=" footer">
                <div class="container">
                    <div class="row">

                        <div class="col-md-3 col-sm-6 wow fadeInRight animated">
                            <div class="single-footer">
                                <h4>About us </h4>
                                <div class="footer-title-line"></div>

                               <img src= "<?php echo base_url('assets/dianeAssets/img/logoBlack.png')?>" alt="" class="wow pulse" data-wow-delay="1s" >
                                <p>We help you reach out to the most interesting events anywhere they may be. The events you’ve always wanted to join and create will be in your hands with just a few clicks. Worry not because we’re here to help you discover the latest events this planet will ever have.</p>
                                
                            </div>
                        </div>
                    
                        <div class="col-md-3 col-sm-6 wow fadeInRight animated">
                            <div class="single-footer news-letter">
                                <h4>Contact Us</h4>
                                <div class="footer-title-line"></div>
                                <ul class="footer-adress">
                                    <li><i class="pe-7s-mail strong"> </i> dailyEvents@gmail.com</li>
                                    <li><i class="pe-7s-call strong"> </i> 253-2753</li>
                                </ul>

                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="footer-copy text-center">
                <div class="container">
                    <div class="row">
                        <div class="pull-left">
                            <span> (C) UI Module , All rights reserved 2017  </span> 
                        </div> 
                        <div class="bottom-menu pull-right"> 
                            <ul> 
                                <li><a class="wow fadeInUp animated" href="#" data-wow-delay="0.2s">Home</a></li>
                                <li><a class="wow fadeInUp animated" href="#" data-wow-delay="0.3s">Events</a></li>
                                <li><a class="wow fadeInUp animated" href="#" data-wow-delay="0.6s">Contact</a></li>
                            </ul> 
                        </div>
                    </div>
                </div>
            </div>

        </div>
</html>