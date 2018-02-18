<div id="main">

    <ol class="breadcrumb">
        <li><a href="<?php echo site_url();?>/admin/cAdmin">Home</a></li>
        <li class="active">User Account Management</li>
    </ol>
      <!-- //breadcrumb-->

    <div id="content">
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        <h2><strong>User</strong> Management</h2>
                    </header>

                    <div class="panel-body">
                        <form action="<?php echo site_url();?>/admin/cAdmin/viewSearchUserAccountMgt" class=" form-inline" method="POST">

                            <input name="search_val" type="text" class="form-control" placeholder="Search User"></input>
                
                            <button class="btn search-btn" type="submit"><i class="fa fa-search"></i></button> 
                        </form>
                        
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
                                          <td>".$object->addedAt."</td>
                                          <td>".$object->user_status."</td>
                                          <td>";                        
                                        if($object->user_status == "Active"){
                                          echo "<a  href='".site_url()."/admin/cAdmin/Ban/".$object->account_id."/user'>
                                            <button  type='button' class='btn btn-inverse'>Update Status</button></a>";
                                        }else{
                                          echo "<a  href='".site_url()."/admin/cAdmin/Unban/".$object->account_id."/user'>
                                            <button  type='button' class='btn btn-inverse'>Update Status</button></a>";
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
</div>
           