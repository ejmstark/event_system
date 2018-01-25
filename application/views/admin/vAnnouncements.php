<div id="main">

    <ol class="breadcrumb">
        <li><a href="<?php echo site_url();?>/admin/cAdmin">Home</a></li>
        <li class="active">Admin Account Management</li>
    </ol>
      <!-- //breadcrumb-->

      <?php
         foreach($ownAdminAccount as $ownAccount) { }
         //foreach ($announcements as $announcement) {}
     ?>

    <div id="content">
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        <h2><strong>Announcements</strong> Management</h2>
                    </header>

                    <div class="panel-body">
                      
                        <?php if ($this->session->flashdata('error_msg')): ?>
                                <div class="alert alert-danger" style="margin-top: 15px;">
                                    <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                                    <?php echo $this->session->flashdata('error_msg'); ?>
                                </div>
                            <?php endif ?>
                        

                        <button class="btn btn-outline-primary" style="margin-bottom:25px;" type="button" name="button" data-toggle="modal" data-target="#createAnnouncement">Create Announcement</button>

              <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-hover" data-provide="data-table" id="toggle-column table-example">
                <thead class="">
                    <tr>
                      <th>#</th>
                      <th>Details</th>
                      <th>Date Posted</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                </thead>

                  <tbody>
                    <?php
                          if($announcements!=FALSE){
                            foreach ($announcements as $announcement) {
                              if($announcement->announcementStatus != "Finished") {
                                $date = date("m-d-Y", strtotime($announcement->addedAt));
                                echo  "<tr>
                                <td id='announcementID'>".$announcement->announcementID."</td>
                                <td>".$announcement->announcementDetails."</td>
                                <td>".$date."</td>
                                <td>".$announcement->announcementStatus."</td>
                                <td>";
                                
                                /*if($announcement->announcementStatus == "OnGoing" ){
                                  echo "<a  href='".site_url()."/admin/cAdmin/FinishAnnouncement/".$announcement->announcementID."/user'>
                                    <button  type='button' class='btn btn-primary'>Update Status</button></a>";
                                }else{
                                  echo "<a  href='".site_url()."/admin/cAdmin/OnGoingAnnouncement/".$announcement->announcementID."/user'>
                                    <button  type='button' class='btn btn-primary'>Update Status</button></a>";
                                }*/
                                
                                  echo "<a  href='".site_url()."/admin/cAdmin/deleteAnnouncement/".$announcement->announcementID."'>
                                  <button  type='button' class='btn btn-danger'>Delete Announcement</button></a>";
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



<div id="createAnnouncement" class="modal fade" tabindex="-1" data-width="650">
    <div class="modal-header bg-inverse bd-inverse-darken">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                <h1 class="modal-title" align="center">CREATE AN ANNOUNCEMENT</h1>
        </div>

        <div class="modal-body">
            <div class="panel-body">

      <!-- Modal content-->
          <form class="form-horizontal" method="POST" action="<?php echo site_url()?>/admin/cAdmin/createAnnouncement">

                <div class="form-group" >
                  <label for="" class="col-8 control-label">Announcement:</label>
                  <div class="col-8">
                    <textarea class="form-control" type="text" name="announcementDetails" required="" style="min-height: 300px; max-height: 300px;"></textarea> 
                  </div>
                </div>

                <div class="form-group" >
                  <div class="col-8">
                    <input class="form-control hidden" type="text" name="postedBy" value="<?php echo $ownAccount->account_id; ?>">
                  </div>
                </div>


              <div class="modal-footer">
                        <button id="closeEditAccount" type="button" class="btn btn-danger" data-dismiss="modal" >Close</button>
                        <input id="" class="btn btn-primary" type="submit"  name="action" value="Announce">
                    </div>
                </form>
            </div>
        </div>
    </div>




    <div class="content"> 
      <!-- Create Announcement Modal -->
      <div id="" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">

          <!-- Modal content-->
          <form class="form-horizontal" method="POST" action="<?php echo site_url()?>/admin/cAdmin/createAnnouncement">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" style="color:#ffffff;">&times;</button>
                <h4 class="modal-title">Create Announcement</h4>
              </div>

              <div class="modal-body form-horizontal ">

                
              </div>

              <div class="modal-footer">
                <button id="closeEditAccount" type="button" class="btn btn-danger" data-dismiss="modal" >Close</button>
                <input id="" class="btn btn-primary" type="submit"  name="action" value="Announce">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>


    <footer class="a-event-footer">
    </footer>

  </body>
</html>
