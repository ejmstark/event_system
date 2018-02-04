<div id="main">

    <ol class="breadcrumb">
        <li><a href="<?php echo site_url();?>/admin/cAdmin">Home</a></li>
        <li class="active">Reports</li>
    </ol>

    <div id="content">
        <div class="row">

            <div class="col-lg-12">
                <section class="panel">
                    <div class="widget-clock">
                        <div id="clock"></div>
                    </div>
                </section>
            </div>
            <!--  header cards -->
            <div class="col-md-3">
                    <div class="well bg-primary">
                        <div class="widget-tile">
                          <section>
                              <h5><strong>REGISTERED</strong> USERS </h5>
                              <h2>
                                <?php
                                    $result = $this->MReports->totalUsers(); 
                                    echo $result; 
                                ?>
                              </h2>
                              <div class="progress progress-xs 
                              progress-white progress-over-tile">
                                  <div class="progress-bar  progress-bar-white" aria-valuetransitiongoal="8590" aria-valuemax="10000"></div>
                              </div>
                              
                          </section>
                          <div class="hold-icon"><i class="fa fa-bar-chart-o"></i></div>
                        </div>
                    </div>
            </div>

            <div class="col-md-3">
                    <div class="well bg-danger">
                        <div class="widget-tile">
                          <section>
                              <h5><strong>APPROVED </strong> EVENTS </h5>
                              <h2>
                                <?php 
                                  $result =$this->MReports->totalnumEvents(1);

                                  echo $result;
                                ?>
                              </h2>
                              <div class="progress progress-xs 
                              progress-white progress-over-tile">
                                  <div class="progress-bar  progress-bar-white" aria-valuetransitiongoal="8590" aria-valuemax="10000"></div>
                              </div>
                              
                          </section>
                          <div class="hold-icon"><i class="fa fa-bar-chart-o"></i></div>
                        </div>
                    </div>
            </div>

            <div class="col-md-3">
                    <div class="well bg-warning">
                        <div class="widget-tile">
                          <section>
                              <h5><strong>REJECTED</strong>EVENTS</h5>
                              <h2>
                                <?php 
                                  $result =$this->MReports->totalnumEvents(2);

                                  echo $result;
                                ?>
                              </h2>
                              <div class="progress progress-xs 
                              progress-white progress-over-tile">
                                  <div class="progress-bar  progress-bar-white" aria-valuetransitiongoal="8590" aria-valuemax="10000"></div>
                              </div>
                              
                          </section>
                          <div class="hold-icon"><i class="fa fa-bar-chart-o"></i></div>
                        </div>
                    </div>
            </div>

            <div class="col-md-3">
                    <div class="well bg-success">
                        <div class="widget-tile">
                            <section>
                              <h5><strong>CARDS</strong> SOLD </h5>
                              <h2>
                                <?php
                                    $result = $this->MReports->cardsSold(); 
                                    echo $result; 
                                ?>
                              </h2>
                              <div class="progress progress-xs 
                              progress-white progress-over-tile">
                                  <div class="progress-bar  progress-bar-white" aria-valuetransitiongoal="8590" aria-valuemax="10000"></div>
                              </div>            
                            </section>
                          <div class="hold-icon"><i class="fa fa-bar-chart-o"></i></div>
                        </div>
                    </div>
            </div>
          <!-- end of header cards -->
            <div class="col-lg-6" >
                <section class="panel corner-flip">
                    <div class="widget-chart bg-lightseagreen">
                        <div id="reportrange" class="pull-right" style="background: rgba(255,255,255,0.3); color:#FFF; cursor: pointer; padding: 5px 10px 10px; margin-top:5px;">
                        </div>
                        <h2>Registered Users</h2>

                        <!----- REPORTS CHART -->
                        <canvas id="line-chart" width="600" height="200"></canvas>

                        <?php  $result = $this->MReports->countUsers('2017-10-01 01:00:00','2017-11-01 01:00:00');

                              echo "<br><h3>Number of active users for month of Oct: ".$result."</h3>";?>
                    </div>
                </section>
            </div>

            <div class="col-lg-6" >
                <section class="panel corner-flip">
                    <div class="widget-chart bg-lightseagreen">
                        <div id="reportrange" class="pull-right" style="background: rgba(255,255,255,0.3); color:#FFF; cursor: pointer; padding: 5px 10px 10px; margin-top:5px;">
                        </div>
                        <h2>Total Cards Sold</h2>

                        <!----- REPORTS CHART -->
                        <canvas id="line-chart3" width="600" height="200"></canvas>

                        <?php  $result = $this->MReports->cardsSold('2017-01-01 01:00:00','2017-12-12 01:00:00');

                        echo "<br><h3>Number of cards sold: ".$result."</h3>";?>
                    </div>
                </section>
            </div>

            <div class="col-lg-6" >
                <section class="panel corner-flip">
                    <div class="widget-chart bg-danger-lighten">
                        <div id="reportrange" class="pull-right" style="background: rgba(255,255,255,0.3); color:#FFF; cursor: pointer; padding: 5px 10px 10px; margin-top:5px;">
                        </div>
                        <h2>Approved Events</h2>
                        <canvas id="line-chart2" width="600" height="200"></canvas>

                        <!--- jesus part -->
                        <?php
                         

                          echo "<br>Number of approved events for month of Nov: ".$result."<br>";

                          $result =$this->MReports->numEvents('2017-01-01 01:00:00', '2018-01-01 01:00:00');

                          echo "<br>Number of approved events for month of Dec: ".$result."<br>";


                          $result = $this->MReports->showApprovedEvents();
              
                          if($result){
                            echo "<table>";
                            foreach($result as $object){
                              
                                echo "<tr>";

                                  echo "<td>Number of registered users for ".$object['event_name'].": ".$this->MReports->countAttendees($object['event_id'])."</td>";

                                echo "</tr>";
                              
                            }
                            echo "</table>";
                          }
                      ?>

                    </div>
                </section>
            </div>
        </div>
    </div>
</div>



     <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>


              <script>
               var labels;
               var num;
               var chart1, chart2, chart3;

                $(document).ready(function(){
                   Chart.defaults.global.legend.display = false;
                   chart = new Chart(document.getElementById("line-chart"), {
                          type: 'line',
                          data: {
                            labels: [],
                            datasets: [{
                                data: num,
                                borderColor: "#FFFFFF"
                              }
                            ]
                          },
                          options: {

                            title: {
                              display: true,
                              text: 'Year 2017'
                            }
                          }
                      });

                   setTimeout(function(){
                       getData();
                  },200);

                   chart2 = new Chart(document.getElementById("line-chart2"), {
                          type: 'line',
                          data: {
                            labels: [],
                            datasets: [{
                                data: num,
                                borderColor: "#FFFFFF"
                              }
                            ]
                          },
                          options: {

                            title: {
                              display: true,
                              text: 'Year 2017'
                            }
                          }
                      });
                   setTimeout(function(){
                       getEventsData();
                  },200);

                chart3 = new Chart(document.getElementById("line-chart3"), {
                          type: 'line',
                          data: {
                            labels: [],
                            datasets: [{
                                data: num,
                                borderColor: "#FFFFFF"
                              }
                            ]
                          },
                          options: {

                            title: {
                              display: true,
                              text: 'Year 2017'
                            }
                          }
                      });
                   setTimeout(function(){
                       getData2();

                  },200);
                });

             function getData(){
               $.ajax({
                      url:"<?php echo site_url()?>/admin/cAdmin/getUserMonthly",
                      method:"GET",
                      dataType:"json",
                      data: {
                        'years': '2017'
                      },
                      success: function(data){
                        var display = Array();
                        var newlabel = Array();
                        var i =1;
                        display[0] = 0;
                        newlabel[0]=" ";
                        $(data).each(function(key,val){
                            newlabel[i] = val[1];
                            display[i++] = parseInt(val[0]);
                        });
                        num =display;
                        labels = newlabel;

                        updateChart();
                      },
                      complete: function(){

                      }
                    });

             }

             function getData2(){

               $.ajax({
                      url:"<?php echo site_url()?>/admin/cAdmin/getCardsMonthly",
                      method:"GET",
                      dataType:"json",
                      data: {
                        'years': '2017'
                      },
                      success: function(data){
                        var display = Array();
                        var newlabel = Array();
                        var i =1;
                        display[0] = 0;
                        newlabel[0]=" ";
                        $(data).each(function(key,val){
                            newlabel[i] = val[1];
                            display[i++] = parseInt(val[0]);
                        });
                        num =display;
                        labels = newlabel;
  
                        updateChart3();
                      },
                      complete: function(){

                      }
                    });

             }


             function getEventsData(){
               $.ajax({
                      url:"<?php echo site_url()?>/admin/cAdmin/getEvents",
                      method:"GET",
                      dataType:"text json",
                      data: {
                        'years':'2017'
                      },
                      success: function(data){
                        var display = Array();
                        var newlabel = Array();
                        var i =1;
                        display[0] = 0;
                        newlabel[0]=" ";

                        $(data).each(function(key,val){
                            newlabel[i] = val[1];
                            display[i++] = parseInt(val[0]);
                        });
                        num =display;
                        labels = newlabel;

                        updateChart2();
                      },
                      complete: function(){


                      }
                    });

             }

             function updateChart(){
                chart.data.datasets[0].data = num;
                chart.data.labels = labels;
                chart.update(2000);
             }

             function updateChart2(){
                chart2.data.datasets[0].data = num;
                chart2.data.labels = labels;
                chart2.update(2000);
             }

             function updateChart3(){
                chart3.data.datasets[0].data = num;
                chart3.data.labels = labels;
                chart3.update(2000);
             }
              </script>
