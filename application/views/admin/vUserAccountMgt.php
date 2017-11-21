 <body class="">

    <header class="a-event-header sticky-top">
      <div class="header-content">
        <p class="text-center"><img class="sys-logo" src=<?php echo base_url('assets/jcAssets/pics/main-logo-prime.png')?> alt="Event system logo"></p>
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
            
            <li><a href="<?php echo site_url();?>/admin/cAdmin">
              <p>
               <div class="d-block d-sm-block d-md-none">
                  <center> <i class="fa fa-list-alt" aria-hidden="true"></i> </center>
                </div>
               <span class= "d-none d-sm-none d-md-inline">
                  <i class="fa fa-list-alt" aria-hidden="true"></i> 
                  Events 
                </span> 
              </a></li></p>
            <li class="active-li"><a href="<?php echo site_url();?>/admin/cAdmin/viewUserAccountMgt">
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

               <li ><a href ="<?php echo site_url();?>/admin/cAdmin/generateCard" data-wow-delay="0.1s">
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
              <form action="<?php echo site_url();?>/admin/cAdmin/viewSearchUserAccountMgt" class=" form-inline" method="POST">
                <b>Search: </b>
                <input name="search_val" type="text"></input>
                
                <button class="btn search-btn" type="submit"><i class="fa fa-search"></i></button> 
              </form>
              <h3><center>User Management<center></h3>
              <table class="table table-hover table-responsive table-sm">
                <thead class="">
                    <tr>
                      <th>#</th>
                      <th>User Name</th>
                      <th>Full Name</th>
                      <th>Email</th>
                      <th>Birthdate</th>
                      <th>Gender</th>
                      <th>Contact Number</th>
                      <th>Load Amount</th>
                      <th>Date Created</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                  <?php 
                              if($users!=FALSE){
                                foreach ($users as $object) {
                        $num = ($object->contact_no != NULL)? $object->contact_no : "N/A";
                        $date = date("m-d-Y", strtotime($object->birthdate));
                        echo  "<tr>
                                            <td id='accountId'>".$object->account_id."</td>
                                            <td>".$object->user_name."</td>
                                            <td>".$object->first_name." ".$object->middle_initial." ".$object->last_name."</td>
                                            <td>".$object->email."</td>
                              <td>".$date."</td>
                              <td>".$object->gender."</td>
                              <td>".$num."</td>
                              <td>".$object->load_amt."</td>
                              <td>".$object->date_account_created."</td>
                              <td>".$object->user_status."</td>
                              <td>";                        
                            if($object->user_status == "Active"){
                              echo "<a  href='".site_url()."/admin/cAdmin/Ban/".$object->account_id."/user'>
                                <button  type='button' class='btn btn-primary'>Update Status</button></a>";
                            }else{
                              echo "<a  href='".site_url()."/admin/cAdmin/Unban/".$object->account_id."/user'>
                                <button  type='button' class='btn btn-primary'>Update Status</button></a>";
                            }
                            echo "</td></tr>";
                             
                      } 
                              }
                            ?>
                </tbody>
              </table>
            </div>
          </div>

        </div>

      </div>

    </div>

    <footer class="a-event-footer">

    </footer>

  </body>
</html>
