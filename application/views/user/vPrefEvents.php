
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
                        <li class="wow fadeInDown" data-wow-delay="0.1s"><a href="<?php echo site_url();?>/cLogin/viewDashBoard">Home</a></li>

                        <li class="wow fadeInDown" data-wow-delay="0.1s"><a href="<?php echo site_url();?>/event/cEvent/viewEvents">Profile</a></li>
                       <!--  <li class="wow fadeInDown" data-wow-delay="0.1s" id="aDropdown" data-id='<?php echo $this->session->userdata['userSession']->userID; ?>'><a href="<?php echo site_url();?>/user/cUser/viewAnnouncements">Announcements<?php if($announcementCount>0) {?><span id="bdg" class="ballons"><?php echo $announcementCount;?></span><?php }?></a></li> -->
                        <!-- <li class="wow dropdown" data-wow-delay="0.1s" id="announcement">
                            <a  class="dropdown-toggle" data-toggle="dropdown" id="aDropdown" data-id='<?php echo $this->session->userdata['userSession']->userID; ?>' >
                              <em> Announcements </em> 
                                <?php if($announcementCount > 0){?>
                                    <span id="bdg" class="ballons"><?php echo $announcementCount;?></span></i>
                                <?php }  else { ?>
                                    <span class="ballons hidden"></span></i>
                                <?php }  ?>
                            </a>
                            <ul class="dropdown-menu " style="position: absolute;">
                                <?php if(isset($announcements)){
                                        foreach ($announcements as $key) {
                                            ?>
                                            <li style="width: 550px; z-index: 1;">
                                                <a href="<?php echo site_url().'/user/cUser/viewClickedAnnouncement/'.$key->announcementID;?> ">
                                                    <div class="row">
                                                        <div class="col col-xs-4">
                                                            <img src="<?php echo base_url('assets/adminAssets/img/admin.png')?>"  class="circle" style="width: 50px;height: 50px;">
                                                        
                                                        </div>
                                                        <div class="col col-xs-4"><h1><?php echo$key->announcementDetails;?> </h1><h5><?php echo $key->ago." ".$key->agoU;?></h5></div>
                                                        <div class="col col-xs-4"><img style="width: 250px;height: 100px;" src= "<?php echo base_url('assets/nikkiAssets/img/slide1/slider-image-5.jpg')?>"  ></div>
                                                    </div>
                                                    
                                                
                                            </a>
                                            </li>
                                            <?php
                                        }
                                    }?>
                                <?php ?>
                                <li class="divider"></li>
                                <li style="text-align: center;"><a href ="<?php echo site_url();?>/user/cUser/viewAnnouncements" >View All</a></li>
                            </ul>
                        </li> -->
                        <li class="wow fadeInDown" data-wow-delay="0.1s"><a href="<?php echo site_url();?>/event/cEvent/viewPreferenceEvents">Interested Events</a></li>
                        <li class="wow fadeInDown" data-wow-delay="0.1s"><a href="<?php echo site_url();?>/finance/cCart/viewCart">View Cart</a></li>
                        <!--
                        <li class="wow fadeInDown" data-wow-delay="0.1s"><a href ="<?php echo site_url();?>/event/cEvent/viewCreateEvent" >Contact</a></li>
                        <li class="wow fadeInDown" data-wow-delay="0.1s"><a href ="#" >Profile</a></li> -->
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <!-- End of nav bar -->
        <div class="container" style="background-color:#777;color:#fff;margin-top:25px;">
            <div class="row">
                <div class="page-head-content">
                    <h1 class="page-title">Interested Events</h1>
                </div>
            </div>
        </div>
<!-- 


        <div class="slider-area">
            <div class="slider">
                <div id="bg-slider" class="owl-carousel owl-theme">

                    <div class="item"><img src= "<?php echo base_url('assets/nikkiAssets/img/slide1/slider-image-2.jpg')?>" alt="Mirror Edge"></div>
                    <div class="item"><img src= "<?php echo base_url('assets/nikkiAssets/img/slide1/slider-image-5.jpg')?>" alt="The Last of us"></div>
                    <div class="item"><img src= "<?php echo base_url('assets/nikkiAssets/img/slide1/slider-image-3.jpg')?>" alt="GTA V"></div>

                </div>
            </div>
            <div class="container slider-content">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-12">
                        <h2>See Events Near You</h2>
                        <div class="search-form wow pulse" data-wow-delay="0.8s">

                            <form action="<?php echo site_url();?>/user/cEvent/searchEvent" class=" form-inline" method="POST">
                                <span style="color: gray;">Search Event</span><span>aaa</span>
                                <div class="form-group">
                                    <?php
                                    if(!isset($_POST['searchDateMonth'])){
                                        echo '<select name="searchDateMonth" class="form-control">
                                                  <option value="0">-Month-</option>
                                                  <option value="1">Jan</option>
                                                  <option value="2">Feb</option>
                                                  <option value="3">Mar</option>
                                                  <option value="4">Apr</option>
                                                  <option value="5">May</option>
                                                  <option value="6">Jun</option>
                                                  <option value="7">Jul</option>
                                                  <option value="8">Aug</option>
                                                  <option value="9">Sep</option>
                                                  <option value="10">Oct</option>
                                                  <option value="11">Nov</option>
                                                  <option value="12">Dec</option>
                                                </select>';
                                    } else {
                                        echo '<b style="color: black;">'.$_POST['searchDateMonth'].'</b><select name="searchDateMonth" >
                                                  <option value="0">-Month-</option>
                                                  <option value="1">Jan</option>
                                                  <option value="2">Feb</option>
                                                  <option value="3">Mar</option>
                                                  <option value="4">Apr</option>
                                                  <option value="5">May</option>
                                                  <option value="6">Jun</option>
                                                  <option value="7">Jul</option>
                                                  <option value="8">Aug</option>
                                                  <option value="9">Sep</option>
                                                  <option value="10">Oct</option>
                                                  <option value="11">Nov</option>
                                                  <option value="12">Dec</option>
                                                </select>';
                                    }
                                    ?>

                                    <?php
                                    if(!isset($_POST['searchDateYear'])){
                                        echo '<input name="searchDateYear" type="text" class="form-control" placeholder="Year">';
                                    } else {
                                        echo '<input name="searchDateYear" type="text" class="form-control" placeholder="Key word" value="'.$_POST['searchDateYear'].'">';
                                    }
                                    ?>

                                    <?php
                                    if(!isset($_POST['searchWord'])){
                                        echo '<input name="searchWord" type="text" class="form-control" placeholder="Key word" pattern="[\sa-zA-z0-9]+">';
                                    } else {
                                        echo '<input name="searchWord" type="text" class="form-control" placeholder="Key word" value="'.$_POST['searchWord'].'" pattern="[\sa-zA-z0-9]+">';
                                    }
                                    ?>
                                    
                                </div>
                                <button class="btn search-btn" type="submit"><i class="fa fa-search"></i></button> 
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->


        <!-- property area -->
        <div class="content-area recent-property" style="padding-bottom: 60px; background-color: rgb(252, 252, 252);">
            <div class="container">
                <div class="row">
                    <div class="col-md-12  padding-top-40 properties-page">
                    	<div class="col-md-12 ">
                            <div id="list-type" class="proerty-th">
                            <?php
                            $cnt =1;
                                        if(isset($events)){
                                            foreach ($events as $event) {
                                               ?>
                                            <div class="col-sm-6 col-md-4 p0">
                                            <div class="box-two proerty-item">
                                                <div class="item-thumb">
                                                    <a href="<?php echo site_url();?>/event/cEvent/displayEventDetails/<?php echo $event->event_id;?>"><img style="max-height: 1000px;" src="<?php echo base_url();?><?php echo $event->event_picture; ?>"></a>
                                                </div>
                                                   <div class="item-entry overflow">
                                                      <h5><a href="<?php echo site_url();?>/event/cEvent/displayEventDetails/<?php echo $event->event_id;?>"> <?php
                                                    if(strlen($event->event_name)>=42){
                                                        echo substr($event->event_name,0,39)."...";
                                                    }else{
                                                            echo $event->event_name;
                                                    }
                                                    ?></a></h5>
                                                    <?php
                                                        echo $event->event_name;

                                                            date_default_timezone_set('Asia/Manila');
                                                            $now = new DateTime("now");
                                                            $end = new DateTime($event->dateEnd);
                                                            $start = new DateTime($event->dateStart);
                                                            $interval = date_diff($now, $start);

                                                            if($now > $start && $now > $end){
                                                                echo "<h5>Expired!</h5>";

                                                            }else if($now < $start){
                                                                if($interval->days == 0){
                                                                    echo "<h5>Less than a day!</h5>";
                                                                }else{
                                                                    echo "<h5>$interval->days day/s left!</h5>";
                                                                }

                                                            }else if($now >= $start && $now <= $end){
                                                                echo "<h5>Happening now!</h5>";
                                                            }

                                                    ?>
                                                    <h2>Price List</h2>
                                                            <table class="table-condensed table-responsive">
                                                                <thead>
                                                                    <th>Ticket Name</th>
                                                                    <th>Ticket Price</th>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                    foreach ($event->tix as $key) {?>
                                                                    <tr>
                                                                        <td><?php echo$key->name;?></td>
                                                                        <td><?php echo$key->price;?></td>
                                                                    </tr>
                                                                    <?php
                                                                        }
                                                                    ?>
                                                                </tbody>
                                                            </table>
                                                        <div class="dot-hr"></div>
                                                        <!-- <span class="pull-left"><b> Date: </b> <?php echo $event->dateStart;?>  </span> -->
                                                        <span class="proerty-price pull-right"></span>
                                                        <!-- <p><?php echo $event->event_details;?> </p> -->
                                                        <!-- <div class="property-icon pull-right">
                                                            <a>Read More</a>
                                                        </div> -->
                                                    </div>
                                            </div>
                                        </div>
                                    <?php
                                            }
                                        }
                                    ?>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


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