<body class="">

    <header class="a-event-header d-block sticky-top">
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">

        <div class="header-content">
          <p class="text-center">
            <img class="sys-logo" src=<?php echo base_url('assets/jcAssets/pics/main-logo-prime.png')?> alt="Event system logo">
          </p>
        </div>
    </header>

    <div class="a-main-content">

      <aside class="admin-sidebar-wrapper">
        <ul class="admin-leftsidenav">
          <div class="upper-sbar">
            <li class="a-user-details">
              <div class="row">
                <div class="col-sm-4">
                  <img id="user-pic" src=<?php echo base_url('assets/jcAssets/pics/user-2.png')?> alt="User picture">
                </div>
                <div class="col-sm-8 d-none d-sm-none d-md-block">
                  <h3><?php echo $this->session->userdata['userSession']->userFName; ?></h3>
                  <p class="user-role d-none d-sm-none d-md-none d-lg-inline">Administrator</p>
                </div>
              </div>
            </li>
          </div>

          <div class="lower-sbar">
            
            <li ><a href="<?php echo site_url();?>/admin/cAdmin">
              <p>
               <div class="d-block d-sm-block d-md-none">
                  <center> <i class="fa fa-list-alt" aria-hidden="true"></i> </center>
                </div>
               <span class= "d-none d-sm-none d-md-inline">
                  <i class="fa fa-list-alt" aria-hidden="true"></i> 
                  Events 
                </span> 
              </a></li></p>
            <li><a href="<?php echo site_url();?>/admin/cAdmin/viewUserAccountMgt">
              <p>
                <div class="d-block d-sm-block d-md-none">
                  <center> <i class="fa fa-calendar" aria-hidden="true"></i> </center>
                </div>
                <span class="d-none d-sm-none d-md-inline">  <i class="fa fa-calendar" aria-hidden="true"></i> User Account </span>
              </a></li></p>
            <li><a href="<?php echo site_url();?>/admin/cAdmin/viewAdminAccountMgt">
              <p>
                <div class="d-block d-sm-block d-md-none">
                  <center><i class="fa fa-user-secret" aria-hidden="true"></i> </center>
                </div>
                <span class="d-none d-sm-none d-md-inline"> <i class="fa fa-user-secret" aria-hidden="true"></i> Admin Account </span>
              </a></li></p>
            <li><a href="<?php echo site_url();?>/admin/cAdmin/viewFinance">
              <p>
                <div class="d-block d-sm-block d-md-none">
                  <center><i class="fa fa-line-chart" aria-hidden="true"></i></center>
                </div>
                <span class="d-none d-sm-none d-md-inline"> <i class="fa fa-line-chart" aria-hidden="true"></i> Finance</span>
              </a></li></p>
            <li><a href="<?php echo site_url();?>/admin/cAdmin/viewReport">
              <p>
                <div class="d-block d-sm-block d-md-none">
                  <center><i class="fa fa-envelope-open" aria-hidden="true"></i></center>
                </div>
                <span class="d-none d-sm-none d-md-inline"> <i class="fa fa-envelope-open" aria-hidden="true"></i> Report</span>
              </a></li></p>

               <li class="active-li" ><a href ="<?php echo site_url();?>/admin/cAdmin/generateCard" data-wow-delay="0.1s">
              <p>
                <div class="d-block d-sm-block d-md-none">
                  <center><i class="fa fa-credit-card" aria-hidden="true"></i></center>
                </div>
                <span class="d-none d-sm-none d-md-inline"><i class="fa fa-credit-card" aria-hidden="true"></i> Cards</span>
              </a></li></p>

            <li><a href ="<?php echo site_url();?>/cLogin/userLogout" data-wow-delay="0.1s">
              <p>
                <div class="d-block d-sm-block d-md-none">
                  <center><i class="fa fa-sign-out" aria-hidden="true"></i></center>
                </div>
                <span class="d-none d-sm-none d-md-inline"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</span>
              </a></li></p>
          </div>
        </ul>

      </aside>


      <div class="admin-main container">

        <div class="admin-wrapper">
          <div class="row justify-content-end">
            <div class="col-10">
              <form id="gForm" class="form inline" method="POST" action="<?php echo site_url('finance/cCard/card'); ?>">
                <h3><center>Generate Card</center></h3><br><br>
                <table class="table table-responsive table-sm">
                  <thead>
                    <tr>
                      <th>Amount</th>
                      <th>Quantity</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>&#x20B1; 100</td>
                      <!-- <td class="col-2"><input class="form-control" type="number" name="quantity"> -->
                    <td>
                      <span class="input-group-btn">
                       <button class="btn btn-secondary col-1 cardsbtn unaM" type="button"><i class="fa fa-minus" aria-hidden="true"></i></button> 
                       <input type="text" name="qty1" class="form-control col-sm-3 qtyinput" id="qty1" placeholder="Quantity" aria-label="Quantity">
                       <button class="btn btn-secondary col-1 cardsbtn unaP" type="button"><i class="fa fa-plus" aria-hidden="true"></i></button>
                      </span>
                      
                    
                    </td>
                    </tr>
                    <tr>
                      <td>&#x20B1; 200</td> 
                      <td>
                        <span class="input-group-btn">
                       <button class="btn btn-secondary col-1 dosM" type="button"><i class="fa fa-minus" aria-hidden="true"></i></button>
                       <input type="text" name="qty2" class="form-control col-sm-3 qtyinput" id="qty2" placeholder="Quantity" aria-label="Quantity">
                       <button class="btn btn-secondary col-1 dosP" type="button"><i class="fa fa-plus" aria-hidden="true"></i></button>
                      </span>
                      </td>

                    </tr>
                    <tr>
                      <td>&#x20B1; 500</td>
                      <td><span class="input-group-btn">
                       <button class="btn btn-secondary col-1 tresM" type="button"><i class="fa fa-minus" aria-hidden="true"></i></button>
                       <input type="text" name="qty3" class="form-control col-sm-3 qtyinput" id="qty3" placeholder="Quantity" aria-label="Quantity">
                       <button class="btn btn-secondary col-1 tresP" type="button"><i class="fa fa-plus" aria-hidden="true"></i></button>
                      </span></td>
                    </tr>
                    <tr>
                      <td>&#x20B1; 1000</td>
                      <td><span class="input-group-btn">
                       <button class="btn btn-secondary col-1 kwatroM" type="button"><i class="fa fa-minus" aria-hidden="true"></i></button>
                       <input type="text" name="qty4" class="form-control col-sm-3 qtyinput" id="qty4" placeholder="Quantity" aria-label="Quantity">
                       <button class="btn btn-secondary col-1 kwatroP" type="button"><i class="fa fa-plus" aria-hidden="true"></i></button>
                      </span></td>
                    </tr>   
                  </tbody>
                </table>

                <center><button id="generate" class="btn btn-success" type="submit"><strong>GENERATE</strong></button></center>
             </form>
            </div>
          </div>
        </div>

    

      </div>

    </div>

    <footer class="a-event-footer">

    </footer>

    <script type="text/javascript">
var value = 0 ;
  $( document ).ready(function() {
    $(".qtyinput").val(value);


    
    $('.qtyinput').on('input', function (event) { 
      this.value = this.value.replace(/[^0-9]/g, '');
      if (this.value == "" ) {
        this.value = 0;
      }
    });

    $( ".unaM" ).click(function() {
      if ($("#qty1").val() <= 0) {
        // alert('Error!');
      } else {
        var get = $("#qty1").val();
        get -= 1;
        $("#qty1").val(get); 
      }
    });

    $( ".unaP" ).click(function() {
      var get = parseInt($("#qty1").val());
      if (get <= 1000) {
        get += 1;
        $("#qty1").val(get); 
      }
      
    });

     $( ".dosM" ).click(function() {
      if ($("#qty2").val() <= 0) {
        // alert('Error!');
      } else {
        var get = $("#qty2").val();
        get -= 1;
        $("#qty2").val(get); 
      }
    });

    $( ".dosP" ).click(function() {
      var get = parseInt($("#qty2").val());
      if (get <= 1000) {
        get += 1;
        $("#qty2").val(get);
      } 
    });

     $( ".tresM" ).click(function() {
      if ($("#qty3").val() <= 0) {
        // alert('Error!');
      } else {
        var get = $("#qty3").val();
        get -= 1;
        $("#qty1").val(get); 
      }
    });

    $( ".tresP" ).click(function() {
      var get = parseInt($("#qty3").val());
      if (get <= 1000) {
        get += 1;
        $("#qty3").val(get);
      }  
    });

     $( ".kwatroM" ).click(function() {
      if ($("#qty4").val() <= 0) {
        // alert('Error!');
      } else {
        var get = $("#qty4").val();
        get -= 1;
        $("#qty4").val(get); 
      }
    });

    $( ".kwatroP" ).click(function() {
      var get = parseInt($("#qty4").val());
      if (get < 1000) {
        get += 1;
        $("#qty4").val(get);
      } 
    });

      $(document).on('submit',"#gForm",function(e){
        e.preventDefault();
        var _url = $(this).attr('action');


        $.ajax({
          url: _url,
          method:"POST",
          data: $(this).serialize(),
          success: function(){ 
                    alert("sucess");
                    $(':input').val(0);
                  },
          error: function(){
                    alert("error!");
                  }
        });
      });
  });
</script>
  </body>
</html>
