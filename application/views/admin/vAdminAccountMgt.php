<div id="main">

    <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Admin Account Management</li>
    </ol>
      <!-- //breadcrumb-->

    <div id="content">
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        <h2><strong>Admin</strong> Management</h2>
                    </header>

                    <div class="panel-body">
                        <button class="btn btn-outline-primary" style="margin-bottom:25px;" type="button" name="button" data-toggle="modal" data-target="#addAdmin">Add Admin</button>

                        <?php if ($this->session->flashdata('error_msg')): ?>
                                <div class="alert alert-danger" style="margin-top: 15px;">
                                    <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                                    <?php echo $this->session->flashdata('error_msg'); ?>
                                </div>
                            <?php endif ?>
                        
                        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-hover" data-provide="data-table" id="toggle-column table-example">                 
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
                </section>
            </div>
        </div>
    </div>


 
	<div id="addAdmin" class="modal fade"  data-header-color="#34495e">
		<div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                <h1 class="modal-title" align="center">ADD ADMIN</h1>
        </div>

        <div class="modal-body">
            <div class="panel-body">

			<!-- Modal content-->
			<form class="form-horizontal" method="POST" action="<?php echo site_url()?>/admin/cAdmin/addAdmin">

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
        </form>
    </div>
</div>

