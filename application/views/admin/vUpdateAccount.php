<div id="main">

    <?php
         foreach($ownAdminAccount as $updateAdmin) { }
     ?>

    <ol class="breadcrumb">
        <li><a href="<?php echo site_url();?>/admin/cAdmin">Home</a></li>
        <li class="active">Admin Account Management</li>
    </ol>
      <!-- //breadcrumb-->

    <div id="content">
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        <h2><strong>Update</strong> Account</h2>
                    </header>

                    <div class="panel-body">

                        <?php if ($this->session->flashdata('error_msg')): ?>
                                <div class="alert alert-danger" style="margin-top: 15px;">
                                    <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                                    <?php echo $this->session->flashdata('error_msg'); ?>
                                </div>
                            <?php endif ?>

                       

                    <form class="form-horizontal" method="POST" action="<?php echo site_url()?>/admin/cAdmin/updateAdmin">

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
                      <i>(example: johndoe@XXXX.com)</i>
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
                      <i>(if mobile no.: 09XXXXXXXXX; if telephone no.: XXX-XXXX)</i>
                      <div class="col-8">
                        <input class="form-control" type="number" min="11" name="ucontact" required="" value="<?php echo $updateAdmin->contact_no; ?>">
                      </div>
                    </div>

                    <br><br>

                    <div class="form-group" >
                      <label for="" class="col-8 control-label">Username:</label>
                      <i>(must contain at least 3 characters, maximum of 50 characters)</i>
                      <div class="col-8">
                        <input class="form-control" type="text" name="uuname" required="" value="<?php echo $updateAdmin->user_name; ?>">
                      </div>
                    </div>

                    <div class="form-group" >
                      <label for="" class="col-8 control-label">Password:</label>
                      <i>(must contain at least 8 characters, maximum of 50 characters)</i>
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

                </section>
            </div>
        </div>
    </div>
   
    <!-- ADD ADMIN MODAL -->
	


    <!-- UPDATE ACCOUNT MODAL -->
    <div id="updateAccount" class="modal" tabindex="-1" data-width="550">
        <div class="modal-header bg-inverse bd-inverse-darken">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                <h1 class="modal-title" align="center">UPDATE ACCOUNT</h1>
        </div>

        <div class="modal-body">
            <div class="panel-body">

            <!-- Modal content-->
                <form class="form-horizontal" method="POST" action="<?php echo site_url()?>/admin/cAdmin/updateAdmin">

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
                      <i>(example: johndoe@XXXX.com)</i>
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
                      <i>(if mobile no.: 09XXXXXXXXX; if telephone no.: XXX-XXXX)</i>
                      <div class="col-8">
                        <input class="form-control" type="number" min="11" name="ucontact" required="" value="<?php echo $updateAdmin->contact_no; ?>">
                      </div>
                    </div>

                    <br><br>

                    <div class="form-group" >
                      <label for="" class="col-8 control-label">Username:</label>
                      <i>(must contain at least 3 characters, maximum of 50 characters)</i>
                      <div class="col-8">
                        <input class="form-control" type="text" name="uuname" required="" value="<?php echo $updateAdmin->user_name; ?>">
                      </div>
                    </div>

                    <div class="form-group" >
                      <label for="" class="col-8 control-label">Password:</label>
                      <i>(must contain at least 8 characters, maximum of 50 characters)</i>
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
