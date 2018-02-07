<!-- Add these lines below to pages with customizable elements -->
<?php
  require('assets/CustomizationManager.php');
  CustomizationManager::SetTheme("configurations ");
?>
<!-- Up to here -->

    <body>

        <div id="preloader">
            <div id="status">&nbsp;</div>
        </div>

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
                    <a class="navbar-brand" href="<?php echo site_url();?>/cLogin/viewDashBoard"><img src="<?php echo base_url('assets/dianeAssets/img/logoBlack.png')?>"></a>
                </div>

                <div class="collapse navbar-collapse yamm" id="navigation">
                    <div class="button navbar-right">
                        <a href ="<?php echo site_url();?>/cLogin/userLogout" data-wow-delay="0.1s"><button class="navbar-btn nav-button wow bounceInRight login"> Logout </button></a>
                    </div>

                    <div class="button navbar-right">
                        <a href ="<?php echo site_url();?>/event/cEvent/viewCreateEvent" data-wow-delay="0.4s"><button class="navbar-btn nav-button wow bounceInRight login"> Create Event </button></a>
                    </div>


                    <ul class="main-nav nav navbar-nav navbar-right">
                        <li class="wow fadeInDown" data-wow-delay="0.1s"><a href="<?php echo site_url();?>/cLogin/viewDashBoard"><?php echo CustomizationManager::$strings->LANDING_PAGE_NAV_HOME ?></a></li>
                        <li class="wow fadeInDown" data-wow-delay="0.1s"><a href="<?php echo site_url();?>/event/cEvent/viewEvents"><?php echo CustomizationManager::$strings->LANDING_PAGE_NAV_PROFILE ?></a></li>
                        <li class="wow fadeInDown" data-wow-delay="0.1s" id="aDropdown" data-id='<?php echo $this->session->userdata['userSession']->userID; ?>'><a href="<?php echo site_url();?>/user/cUser/viewAnnouncements"><?php echo CustomizationManager::$strings->LANDING_PAGE_NAV_ANNOUNCEMENTS ?><?php if($announcementCount>0) {?><span id="bdg" class="ballons"><?php echo $announcementCount;?></span><?php }?></a></li>
                        <li class="wow fadeInDown" data-wow-delay="0.1s"><a href="<?php echo site_url();?>/event/cEvent/viewPreferenceEvents">Interested Events</a></li>
                        <li class="wow fadeInDown" data-wow-delay="0.1s"><a href="<?php echo site_url();?>/finance/cCart/viewCart"><?php echo CustomizationManager::$strings->LANDING_PAGE_NAV_VIEW_CART ?></a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <!-- End of nav bar -->

        <div class="page-head"> 
            <div class="container">
                <div class="row">
                    <div class="page-head-content">
                        <h1 class="page-title">Interested Events</h1>               
                    </div>
                </div>
            </div>
        </div>

        <!-- property area -->
         <div class="content-area recent-property" style="padding-bottom: 60px; background-color: rgb(252, 252, 252);">
         <div class="container">
             <div class="row">
                <div class="col-md-12 ">
                    <div id="list-type" class="proerty-th">
                        <?php
                            $cnt =1;
                            if(isset($events)){
                                 foreach ($events as $event) {
                                    date_default_timezone_set('Asia/Manila');
                                    $now = new DateTime("now");
                                    $end = new DateTime($event->dateEnd);
                                    $start = new DateTime($event->dateStart);
                                    $interval = date_diff($now, $start);

                                    if($now < $start){
                                                echo '<div class="col-sm-6 col-md-4 p0" >';
                                                    echo '<div class="box-two proerty-item">';
                                                        echo '<div class="item-entry overflow" >';

                                                                if($now < $start){
                                                                    if($interval->days == 0){
                                                                        echo '<div class="corner-ribbon top-right sticky red">Less than a day!</div>';
                                                                    }else{
                                                                        echo '<div class="corner-ribbon top-right sticky red">'.$interval->days;
                                                                        echo ' day/s left!';
                                                                        echo '</div>';      
                                                                    }
                                                                }   

                                                                echo '<h3 class="text-center"><a href="'.site_url().'/event/cEvent/displayEventDetails/'.$event->event_id.'"> ';

                                                                if(strlen($event->event_name)>=42){
                                                                    echo substr($event->event_name,0,39)."...";
                                                                }else{
                                                                    echo $event->event_name;
                                                                }
                                                
                                                                echo '</a></h3>';

                                                                echo '<div class="item-thumb">
                                                                <a href="'.site_url().'/event/cEvent/displayEventDetails/'.$event->event_id.'"><img style="clip: rect(0px,100px,100px,0px); height:100px;" src="'.base_url($event->event_picture).'"></a></div>'; 

                                                                echo '<h5>Where: '.$event->event_venue.', '.$event->location_name.', '.$event->region_code.'</h5>';

                                                                $dateS = date_create($event->dateStart);
                                                                $dateE = date_create($event->dateEnd);
                                                                echo '<h5>When: '.date_format($dateS, 'M d Y').' - '.date_format($dateE, 'M d Y').'</h5>';

                                                                                                              
                                                    
                                                                $mintix = $event->tix;
                                                                foreach ($event->tix as $key) {
                                                                    $mintix = ($key->price <= $mintix)? $key->price : $mintix;
                                                                }
                                                                echo '<h5>Event Tickets as low as Php '.$mintix.'!!!</h5>';          
                                                                echo '<div class="dot-hr"></div>
                                                            </div>
                                                        </div>
                                                    </div>';

                                            }else if($now >= $start && $now <= $end){
                                                echo ' <div class="col-sm-6 col-md-4 p0">';
                                                    echo '<div class="box-two proerty-item">';
                                                        echo '<div class="item-entry overflow" >';
                                                                echo '<div class="corner-ribbon top-right sticky red">Happening now!</div>';
                                                                    

                                                                echo '<h3 class="text-center"><a href="'.site_url().'/event/cEvent/displayEventDetails/'.$event->event_id.'"> ';

                                                                if(strlen($event->event_name)>=42){
                                                                    echo substr($event->event_name,0,39)."...";
                                                                }else{
                                                                    echo $event->event_name;
                                                                }
                                                
                                                                echo '</a></h3>';

                                                                echo '<div class="item-thumb">
                                                                <a href="'.site_url().'/event/cEvent/displayEventDetails/'.$event->event_id.'"><img style="clip: rect(0px,100px,100px,0px); height:100px;" src="'.base_url($event->event_picture).'"></a></div>'; 

                                                                echo '<h5>Where: '.$event->event_venue.', '.$event->location_name.', '.$event->region_code.'</h5>';

                                                                $dateS = date_create($event->dateStart);
                                                                $dateE = date_create($event->dateEnd);
                                                                echo '<h5>When: '.date_format($dateS, 'M d Y').' - '.date_format($dateE, 'M d Y').'</h5>';
                                                                $mintix = $event->tix;
                                                                foreach ($event->tix as $key) {
                                                                    $mintix = ($key->price <= $mintix)? $key->price : $mintix;
                                                                }
                                                                echo '<h5>Event Tickets as low as Php '.$mintix.'!!!</h5>';
                                                                echo '<div class="dot-hr"></div>
                                                            </div>
                                                        </div>
                                                    </div>';
                                            }
                                }
                            }
                        ?>
                    </div>
                </div>
             </div><!-- END OF ROW-->
         </div>
      </div>
     <!--- END OF CONTENT AREA-->
      
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
                                <li><a class="wow fadeInUp animated" href="<?php echo site_url();?>/cLogin/viewDashBoard" data-wow-delay="0.2s">Home</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>

<script type="text/javascript">
    $(document).ready(function() {
        $(document).on('click', '#aDropdown', function(){
            var id = $(this).data('id');
            $.ajax({
                url: "<?php echo site_url()?>/user/cUser/updateAnnounce/"+id,
                data: { id:id },
                type: "POST",
                success: function(data){
                    var d=data.split('/');
                    $('#bdg').remove();
                    // alert(d[0].trim());
                   
                },
                error: function(data){
                    alert("error");
                }
            });
        });
    } );
    
    $(document).ready(function(){
        <?php if(isset($announcements)){
        foreach ($announcements as $key) {
            ?>
             $.notify({
              title: "<?php echo '<strong>'.$key->announcementDetails.'</strong><br>';?>",              
              icon: 'glyphicon glyphicon-info-sign',
              message: '<?php echo $key->ago." ".$key->agoU;?><a href="<?php echo site_url();?>/user/cUser/viewClickedAnnouncement/<?php echo $key->announcementID; ?>" >Click here...</a> '
            },{
              type: 'info',
              animate: {
                    enter: 'animated fadeInUp',
                exit: 'animated fadeOutDown'
              },
              placement: {
                from: "bottom",
                align: "left"
              },
              offset: 20,
              spacing: 10,
              z_index: 1031,
            });
            <?php
        }
       
       
    }?>
<?php ?>
    });
</script>