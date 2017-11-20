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
              <form class="form inline">
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
                       <button class="btn btn-secondary col-1 cardsbtn" type="button"><i class="fa fa-minus" aria-hidden="true"></i></button> 
                       <input type="text" class="form-control col-sm-3 qtyinput" placeholder="Quantity" aria-label="Quantity">
                       <button class="btn btn-secondary col-1 cardsbtn" type="button"><i class="fa fa-plus" aria-hidden="true"></i></button>
                      </span>
                      
                    
                    </td>
                    </tr>
                    <tr>
                      <td>&#x20B1; 200</td> 
                      <td>
                        <span class="input-group-btn">
                       <button class="btn btn-secondary col-1" type="button"><i class="fa fa-minus" aria-hidden="true"></i></button>
                       <input type="text" class="form-control col-sm-3 qtyinput" placeholder="Quantity" aria-label="Quantity">
                       <button class="btn btn-secondary col-1" type="button"><i class="fa fa-plus" aria-hidden="true"></i></button>
                      </span>
                      </td>

                    </tr>
                    <tr>
                      <td>&#x20B1; 500</td>
                      <td><span class="input-group-btn">
                       <button class="btn btn-secondary col-1" type="button"><i class="fa fa-minus" aria-hidden="true"></i></button>
                       <input type="text" class="form-control col-sm-3 qtyinput" placeholder="Quantity" aria-label="Quantity">
                       <button class="btn btn-secondary col-1" type="button"><i class="fa fa-plus" aria-hidden="true"></i></button>
                      </span></td>
                    </tr>
                    <tr>
                      <td>&#x20B1; 1000</td>
                      <td><span class="input-group-btn">
                       <button class="btn btn-secondary col-1" type="button"><i class="fa fa-minus" aria-hidden="true"></i></button>
                       <input type="text" class="form-control col-sm-3 qtyinput" placeholder="Quantity" aria-label="Quantity">
                       <button class="btn btn-secondary col-1" type="button"><i class="fa fa-plus" aria-hidden="true"></i></button>
                      </span></td>
                    </tr>
                      
                     
                  </tbody>
                </table>

                <center><button class="btn btn-success" type="button"><strong>GENERATE</strong></button></center>
             
            </div>
          </div>
        </div>

    

      </div>

    </div>

    <footer class="a-event-footer">

    </footer>
  </body>
</html>
