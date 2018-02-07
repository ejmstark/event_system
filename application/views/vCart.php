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
                        <h1 class="page-title">View Cart</h1>               
                    </div>
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
                       <?php if(isset($events) && count($events)>0){
                              foreach ($events as $event) {
                                   ?>
                                    <div style="padding:1%; margin-top: 2%;">
                                      <input type="checkbox" checked="" class="evt" id="<?php echo key($events); ?>"  style="margin-bottom:2%;">
                                      <span class="h4">
                                        <strong>Event Name :<?php echo $event[0]->event_name;?></strong>
                                      </span>
                                    </div>
                                   <?php
                                   foreach ($event as $cart) {                     
                                   ?>
                                      <div class="panel panel-default" style="margin-left:3%;">
                                      <input type="hidden" class="cartID" value="<?php echo $cart->cart_id;?>" >
                                       <div class="panel-heading">

                                              <input type="checkbox" class="<?php echo 'tix'.key($events);?>" id="<?php echo $cart->ticket_type_id;?>" checked="">
                                              <span> Ticket Name:<?php echo $cart->ticket_name;?></span>
                                              <span class="pull-right"> Price:<?php echo $cart->price;?> </span>                       
                                        </div>
                                       <div class="panel-body">
                                          <table class="table table-sm table-borderless">
                                              <tbody>
                                                <tr>
                                                  <th scope="row"> Count:<?php echo $cart->quantity;?></th>
                                                  <td class="pull-right">
                                                    <form class="offset-md-3">
                                                        <div class="form-group row">
                                                          <button class="btn btn-default pull-left plus" type="button"><span class="glyphicon glyphicon-plus"></span></button>
                                                          <div class="col-sm-6">
                                                            <input type="text" class="qty" value ="<?php echo $cart->quantity;?>" class="form-control">
                                                          </div>
                                                          <button class="btn btn-default minus" type="button"><span class="glyphicon glyphicon-minus"></span></button>
                                                        </div>
                                                    </form>
                                                  </td>
                                                  <td> <button class="btn btn-primary pull-right" type="button">
                                                    <span class="glyphicon glyphicon-trash delete"></span>
                                                  </button></td>     
                                                </tr>
                                              </tbody>
                                            </table>                                           
                                       </div>
                                     </div>
                                   
                                   <?php
                                   }?>
                                   </div>
                                   <?php
                                   next($events);
                              }
                       }else{?>
                          <h1>Nothing in your cart. Shop for tickets now!</h1>
                       <?php }?>
                    </div>
                </div>
             </div><!-- END OF ROW-->

             <div class="checkoutContainer" style="margin-left:3%;">
                   <input type="checkbox" checked="">
                   <span class="h4"><strong>SELECT ALL</strong><span style="margin: 10px;" class="badge badge-light h5">4</span> </span>
                  <button class="btn btn-default pull-right" type="button">CHECKOUT</button>
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
  var panel;
    $(document).ready(function() {
      $(".delete").click(function(){
         panel= $(this).closest("div.panel");
        var id = panel.find("input.cartID").val();
        $(this).attr("disabled",true);
        $.ajax({
                url: "<?php echo site_url()?>/finance/cCart/deleteCartItem",
                data: { "id":id},
                type: "POST",
                success: function(e){
                  panel.remove();
                },
                error: function(e){
                    // console.log(e);
                    // alert(e.responseText);
                }
            });
      });
      $('input').on('ifChecked', function (event){
          $(this).closest("input").attr('checked', true);          
          var id = $(this).closest("input").attr('id');
          $(document).find(".tix"+id).closest("div.icheckbox_square-yellow").addClass("checked");
      });
      $('input').on('ifUnchecked', function (event) {
          $(this).closest("input").attr('checked', false);
          var id = $(this).closest("input").attr('id');
          $(document).find(".tix"+id).closest("div.icheckbox_square-yellow").removeClass("checked");
      });

      $(".minus").click(function(){
        var input = $(this).closest("div.row").find("input");
        if(input.val() > 1){
          var get = input.val();
          get-=1;
          input.val(get);
          updateTicketCount("minus",$(this).closest("div.panel").find("input.cartID").val(),get);
        }
      });
      $(".plus").click(function(){
        var input = $(this).closest("div.row").find("input");
        var get = parseInt(input.val());
        get+=1;
        input.val(get);
        updateTicketCount("plus",$(this).closest("div.panel").find("input.cartID").val(),get);
      });

      function updateTicketCount(type,id,quantity){
        var link ="";
        if(type == "plus"){
          var link =  "<?php echo site_url()?>/finance/cCart/addQty";
        }else{
          var link = "<?php echo site_url()?>/finance/cCart/minusQty";
        }
        $(document).find(".plus").attr("disabled", true);
        $(document).find(".minus").attr("disabled", true);
        $.ajax({
                url: link,
                data: { "id":id,"quantity":quantity },
                type: "POST",
                success: function(e){
                     $(document).find(".plus").attr("disabled", false);
                     $(document).find(".minus").attr("disabled", false);
                },
                error: function(e){
                    // console.log(e);
                    // alert(e.responseText);
                }
            });
      }
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