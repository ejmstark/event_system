<div id="main">

    <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
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
                                                  <button  type='button' class='btn btn-success'>APPROVE</button></a>
                                                  <a href='".site_url()."/admin/cAdmin/rejectEvent/".$object->event_id."'>
                                                  <button  type='button' class='btn btn-danger'>REJECT</button></a>
                                                  </td>
                                                  </tr>";
                                            }else {
                                              echo " <td>
                                                  You have ".$object->event_status." this event.
                                                  </td>
                                                  </tr>";
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
</div>