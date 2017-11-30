 <body class="">

    <header class="a-event-header">
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
                <div class="col-sm-8">
                  <h1><?php echo $this->session->userdata['userSession']->userFName; ?></h1>
                  <p class="user-role">Administrator</p>
                </div>
              </div>
            </li>
          </div>

          <div class="lower-sbar">
            <li><a href="<?php echo site_url();?>/admin/cAdmin"><i class="fa fa-list-alt" aria-hidden="true"></i>Events</a></li>
            <li><a href="<?php echo site_url();?>/admin/cAdmin/viewUserAccountMgt"><i class="fa fa-calendar" aria-hidden="true"></i>User Account</a></li>
            <li class="active-li"><a href="<?php echo site_url();?>/admin/cAdmin/viewAdminAccountMgt"><i class="fa fa-user-secret" aria-hidden="true"></i>Admin Account </a></li>
            <li><a href="<?php echo site_url();?>/admin/cAdmin/viewFinance"><i class="fa fa-line-chart" aria-hidden="true"></i>Finance</a></li>
            <li><a href="<?php echo site_url();?>/admin/cAdmin/viewReport"><i class="fa fa-envelope-open" aria-hidden="true"></i>Report</a></li>
            <li><a href ="<?php echo site_url();?>/cLogin/userLogout" data-wow-delay="0.1s"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a></li>

          </div>
        </ul>

      </aside>

      <div class="admin-main container">
        <div class="admin-wrapper">
          <div class="row justify-content-end">
            <div class="col-10">
              <h3><center>Admin Management<center></h3>
              <button class="btn btn-outline-primary" style="margin-bottom:25px;" type="button" name="button" data-toggle="modal" data-target="#addAdmin">Add Admin</button>
              <?php if ($this->session->flashdata('error_msg')): ?>
                                <div class="alert alert-danger" style="margin-top: 15px;">
                                    <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                                    <?php echo $this->session->flashdata('error_msg'); ?>
                                </div>
                            <?php endif ?>
              <table class="table table-hover">
                <thead class="">
                    <tr>
                      <th>#</th>
                      <th>User Name</th>
                      <th>Full Name</th>
                      <th>Email</th>
                      <th>Birthdate</th>
                      <th>Gender</th>
                      <th>Contact Number</th>
                      <th>Date Created</th>
                      <th>Type</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                </thead>

                  <tbody>
                    <?php 
                                if($admin!=FALSE){
                                  foreach ($admin as $object) {
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
                                <td>".$object->date_account_created."</td>
                                <td>".$object->user_type."</td>
                                <td>".$object->user_status."</td>
                                <td>";
                              
                              if ($this->session->userdata['userSession']->userID != $object->account_id){  
                                if($object->user_type == "Admin"){
                                  echo "<a  href='".site_url()."/admin/cAdmin/SuperAdmin/".$object->account_id."'>
                                    <button  type='button' class='btn btn-warning'>Update Type</button></a>";
                                }else{
                                  echo "<a  href='".site_url()."/admin/cAdmin/Admin/".$object->account_id."'>
                                    <button  type='button' class='btn btn-warning'>Update Type</button></a>";
                                }
                                
                                if($object->user_status == "Active"){
                                  echo "<a  href='".site_url()."/admin/cAdmin/Ban/".$object->account_id."/admin'>
                                    <button  type='button' class='btn btn-primary'>Update Status</button></a>";
                                }else{
                                  echo "<a  href='".site_url()."/admin/cAdmin/Unban/".$object->account_id."/admin'>
                                    <button  type='button' class='btn btn-primary'>Update Status</button></a>";
                                }
                              }else{
                                echo "Can't ban yourself.";
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

    <div class="content">
			<!-- Modal -->
			<div id="addAdmin" class="modal fade" role="dialog">
				<div class="modal-dialog modal-lg">

					<!-- Modal content-->
					<form class="form-horizontal" method="POST" action="<?php echo site_url()?>/admin/cAdmin/addAdmin">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" style="color:#ffffff;">&times;</button>
								<h4 class="modal-title">Add Administrator</h4>
							</div>

							<div class="modal-body form-horizontal ">
                
                <div class="form-group" >
                	<label for="" class="col-8 control-label">First name:</label>
                	<div class="col-8">
                		<input class="form-control" pattern = "[a-zA-z]+" type="text" name="fname" required="">
                	</div>
                </div>

                <div class="form-group" >
                	<label for="" class="col-8 control-label">Middle Initial:</label>
                	<div class="col-8">
                		<input class="form-control" pattern="[a-zA-Z]+" type="text" name="miname" required="">
                	</div>
                </div>

                <div class="form-group" >
                	<label for="" class="col-8 control-label">Last name:</label>
                	<div class="col-8">
                		<input class="form-control" pattern="[a-zA-Z]+" type="text" name="lname" required="">
                	</div>
                </div>

                <div class="form-group" >
                	<label for="" class="col-8 control-label">Email:</label>
                	<div class="col-8">
                		<input class="form-control" type="text" name="email" required="">
                	</div>
                </div>

                <div class="form-group" >
                	<label for="" class="col-8 control-label">Birthdate:</label>
                	<div class="col-8">
                		<input class="form-control" type="date" name="bdate" required="">
                	</div>
                </div>

                <div class="form-group" >
                	<label for="" class="col-8 control-label">Gender:</label>
                	<div class="col-8">
                  <select class="form-control" name="gender" required=""> <br>
                    <option selected="" value="Male">Select Gender</option>
                    <option value="Male">male</option>
                    <option value="Female">female</option>
                    <option value="Other">other</option>
                  </select>
                	</div>
                </div>

                <div class="form-group" >
                	<label for="" class="col-8 control-label">User type:</label>
                	<div class="col-8">
                  <select class="form-control" name="userType" required=""> <br>
                    <option selected="" value="Admin">Select User Type</option>
                    <option value="Admin">Admin</option>
                    <option value="Superadmin">Super Admin</option>
                  </select>
                	</div>
                </div>

                <div class="form-group" >
                	<label for="" class="col-8 control-label">Contact no:</label>
                	<div class="col-8">
                		<input class="form-control" type="text" pattern="^(09)\d{9}$" name="contact" required="">
                	</div>
                </div>

                <div class="form-group" >
                	<label for="" class="col-8 control-label">Username:</label>
                	<div class="col-8">
                		<input class="form-control" pattern="[a-zA-Z0-9]{6,}" type="text" name="uname" required="">
                	</div>
                </div>

                <div class="form-group" >
                	<label for="" class="col-8 control-label">Password:</label>
                	<div class="col-8">
                		<input class="form-control" pattern="[a-zA-Z0-9]{8,}" type="password" name="password" required="">
                	</div>
                </div>

							</div>

							<div class="modal-footer">
                <button id="closeEditAccount" type="button" class="btn btn-danger" data-dismiss="modal" >Close</button>
                <input id="" class="btn btn-primary" type="submit"  name="action" value="Add">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>

  </body>
</html>
