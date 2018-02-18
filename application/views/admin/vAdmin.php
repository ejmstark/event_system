<div id="main">

    <ol class="breadcrumb">
        <li><a href="<?php echo site_url();?>/admin/cAdmin">Home</a></li>
        <li class="active">Events</li>
    </ol>
      <!-- //breadcrumb-->


    <div id="content">
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        <h2><strong>Event</strong> Management</h2>
                    </header>
                    <div class="panel-body">
                        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-hover" data-provide="data-table" id="toggle-column table-example">
                            <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Name</th>
                                  <th>Time</th>
                                  <th>Tickets Sold</th>
                                  <th>Status</th>
                                  <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if($row!=FALSE){
                                        foreach ($row as $object) {
                                            echo  "<tr>
                                            <td>".$object->event_id."</td>
                                            <td>".$object->event_name."</td>
                                            <td>".$object->event_date_start." to ".$object->event_date_end."</td>
                                            <td>".$object->no_tickets_total."</td>
                                            <td>".$object->event_status."</td>";

                                            if($object->event_status == "Pending"){
                                              echo " <td><a href='".site_url()."/admin/cAdmin/approveEvent/".$object->event_id."'>
                                                  <button  type='button' class='btn btn-inverse'>APPROVE</button></a>
                                                  <a href='".site_url()."/admin/cAdmin/rejectEvent/".$object->event_id."'>
                                                  <button  type='button' class='btn btn-theme'>REJECT</button></a>
                                                  </td>
                                                  </tr>";
                                            }else {
                                             echo "<td>
                                                <button name='button' data-toggle='modal' data-target='#updateAccount' type='button' class='btn btn-info' data-backdrop='static' data-keyboard='false'>VIEW ATTENDEES </button>
                                                <input type = 'hidden' value = '".$object->event_id." id = 'pass' name = 'pass'>
                                                </td>
                                            </tr>";  
                                            }
                                            echo " <div id='updateAccount' class='modal' tabindex'-1' data-width='500'>
                                            <div class='modal-header bg-inverse bd-inverse-darken'>
                                                    <button type='button' class='close' data-dismiss='modal' aria-hidden='true'><i class='fa fa-times'></i></button>
                                                    <h1 class='modal-title' align='center'>Event: ". $object->event_name."</h1>
                                            </div>
                                   
                                            <div class='modal-body'>
                                                <div class='panel-body'>
                                                ";
                                              
                                              $result = $this->MReports->nameAttendees( $object->event_id);
                                              foreach($result as $obj){
                                                  echo"
                                                      <tr>
                                                      
                                                      <td>".$obj['user_name']."</td>
                                                      <tr>
                                                  ";
                                              }
                                              $num = $this->MReports->countAttendees( $object->event_id);
                                              echo"
		                 <hr><h4 class='modal-title' align='left'>TOTAL : ".$num."</h4>
		              <!-- Modal content-->
		              </div>
		          </div>

		          <div class='modal-footer'>
		              <button id='closeEditAccount' type='button' class='btn btn-danger' data-dismiss='modal' >Close</button>
		          </div>
		        </div>
		";
                                        }
                                    }
                                echo"
                            </tbody>
                        </table>
                    </div>
                </section>
            </div>
        </div>";
		 ?>
    </div>

</div>

</body>
