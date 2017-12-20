<div id="main">

    <?php
         foreach($ownAdminAccount as $updateAdmin) { }
     ?>

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
                        <button class="btn btn-outline-primary" style="margin-bottom:25px;" type="button" name="button" data-toggle="modal" data-target="#updateAccount">Update Account</button>

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
                                  <?php if($this->session->userdata['userSession']->userLevel == "Superadmin") {
                                    echo "<th>Action</th>";
                                  } ?>
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
                                <td>".$object->user_status."</td>";

                                if($this->session->userdata['userSession']->userLevel == "Superadmin" && $object->user_status != "Deleted"){
                                  echo"<td>";
                                if ($this->session->userdata['userSession']->userID != $object->account_id){
                                    if($object->user_type == "Admin"){
                                        //upgraded type to Superadmin
                                      echo "<a  href='".site_url()."/CAdmin/SuperAdmin/".$object->account_id."'>
                                        <button type='button' class='btn btn-info fa fa-user'></button></a>";
                                    }else{
                                        if($this->session->userdata['userSession']->userID == $object->upgraded_by){
                                            //upgrade type to Admin
                                              echo "<a  href='".site_url()."/CAdmin/Admin/".$object->account_id."'>
                                               <button  type='button' class='btn btn-warning fa fa-user'></button></a>";
                                               //delete
                                               echo "<a  href='".site_url()."/CAdmin/Delete/".$object->account_id."/admin'>
                                                 <button  type='button' class='btn btn-danger fa fa-trash-o'></button></a>";
                                          }
                                    }

                                    //delete
                                    if($object->user_type == "Admin"){
                                        echo "<a  href='".site_url()."/CAdmin/Delete/".$object->account_id."/admin'>
                                          <button  type='button' class='btn btn-danger fa fa-trash-o'></button></a>";
                                    }

                                    if($this->session->userdata['userSession']->userID == $object->upgraded_by || $object->user_type == "Admin") {
                                        //update status
                                        if($object->user_status == "Active"){
                                          echo "<a  href='".site_url()."/CAdmin/Ban/".$object->account_id."/admin'>
                                            <button  type='button' class='btn btn-success fa fa-credit-card'></button></a>";
                                        }else{
                                          echo "<a  href='".site_url()."/CAdmin/Unban/".$object->account_id."/admin'>
                                            <button  type='button' class='btn btn-inverse fa fa-credit-card'></button></a>";
                                        }
                                    }
                                    
                                  }else{
                                    //echo "Can't ban yourself.";
                                    echo "<a  href='".site_url()."/CAdmin/Delete/".$object->account_id."/admin'>
                                      <button  type='button' class='btn btn-danger fa fa-trash-o'></button></a>";
                                  }
                                echo "</td></tr>";
                            }
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

    <!-- ADD ADMIN MODAL -->
	<div id="addAdmin" class="modal fade" tabindex="-1" data-width="450">
		<div class="modal-header bg-inverse bd-inverse-darken">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                <h1 class="modal-title" align="center">ADD ADMIN</h1>
        </div>

        <div class="modal-body">
            <div class="panel-body">

			<!-- Modal content-->
    			<form class="form-horizontal" method="POST" action="<?php echo site_url()?>/CAdmin/addAdmin">

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
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                      </select>
                    	</div>
                    </div>

                    <div class="form-group" >
                    	<label for="" class="col-8 control-label">User Type:</label>
                    	<div class="col-8">
                      <select class="form-control" name="userType" required=""> <br>
                        <option selected="" value="Admin">Select User Type</option>
                        <option value="Admin">Admin</option>
                        <?php
                            if($this->session->userdata['userSession']->userLevel == "Superadmin"){
                                echo"<option value='Superadmin'>Superadmin</option>";
                            }
                        ?>

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


        			<div class="modal-footer">
                        <button id="closeEditAccount" type="button" class="btn btn-danger" data-dismiss="modal" >Close</button>
                        <input id="" class="btn btn-primary" type="submit"  name="action" value="Add">
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- UPDATE ACCOUNT MODAL -->
    <div id="updateAccount" class="modal fade" tabindex="-1" data-width="450">
        <div class="modal-header bg-inverse bd-inverse-darken">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                <h1 class="modal-title" align="center">UPDATE ACCOUNT</h1>
        </div>

        <div class="modal-body">
            <div class="panel-body">

            <!-- Modal content-->
                <form class="form-horizontal" method="POST" action="<?php echo site_url()?>/CAdmin/updateAdmin">

                    <div class="form-group" >
                      <label for="" class="col-8 control-label">First name:</label>
                      <div class="col-8">
                        <input class="form-control" type="text" name="ufname" required="" value="<?php echo $updateAdmin->first_name; ?>">
                      </div>
                    </div>

                    <div class="form-group" >
                      <label for="" class="col-8 control-label">Middle Initial:</label>
                      <div class="col-8">
                        <input class="form-control" type="text" name="uminame" required="" value="<?php echo $updateAdmin->middle_initial; ?>">
                      </div>
                    </div>

                    <div class="form-group" >
                      <label for="" class="col-8 control-label">Last name:</label>
                      <div class="col-8">
                        <input class="form-control" type="text" name="ulname" required="" value="<?php echo $updateAdmin->last_name; ?>">
                      </div>
                    </div>

                    <div class="form-group" >
                      <label for="" class="col-8 control-label">Email:</label>
                      <div class="col-8">
                        <input class="form-control" type="text" name="uemail" required="" value="<?php echo $updateAdmin->email; ?>">
                      </div>
                    </div>

                    <div class="form-group" >
                      <label for="" class="col-8 control-label">Birthdate:</label>
                      <div class="col-8">
                        <input class="form-control" type="date" name="ubdate" required="" value="<?php echo $updateAdmin->birthdate; ?>">
                      </div>
                    </div>

                    <div class="form-group" >
                      <label for="" class="col-8 control-label">Gender:</label>
                      <div class="col-8">
                      <select class="form-control" name="ugender" required=""> <br>
                        <option value="Male" <?php if($updateAdmin->gender=='Male') {echo "selected=''";}?> >Male</option>
                        <option value="Female" <?php if($updateAdmin->gender=='Female') {echo "selected=''";}?>>Female</option>
                        <option value="Other" <?php if($updateAdmin->gender=='Other') {echo "selected=''";}?>>Other</option>
                      </select>
                      </div>
                    </div>

                    <div class="form-group" >
                      <label for="" class="col-8 control-label">Contact no:</label>
                      <div class="col-8">
                        <input class="form-control" type="number" min="11" name="ucontact" required="" value="<?php echo $updateAdmin->contact_no; ?>">
                      </div>
                    </div>

                    <br><br>

                    <div class="form-group" >
                      <label for="" class="col-8 control-label">Username:</label>
                      <div class="col-8">
                        <input class="form-control" type="text" name="uuname" required="" value="<?php echo $updateAdmin->user_name; ?>">
                      </div>
                    </div>

                    <div class="form-group" >
                      <label for="" class="col-8 control-label">Password:</label>
                      <div class="col-8">
                        <input class="form-control" type="password" name="upassword" required="" value="<?php echo $updateAdmin->password; ?>">
                      </div>
                        <input class="form-control hidden" type="text" name="uuserType" required="" value="<?php echo $updateAdmin->user_type; ?>">
                      </div>
                    </div>

                    <div class="modal-footer">
                        <button id="closeEditAccount" type="button" class="btn btn-danger" data-dismiss="modal" >Close</button>
                        <input id="" class="btn btn-primary" type="submit"  name="action" value="Update">
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
        