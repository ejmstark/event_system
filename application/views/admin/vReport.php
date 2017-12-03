<div id="main">

    <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
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

            <div class="col-lg-12" >
                <section class="panel corner-flip">
                    <div class="widget-chart bg-lightseagreen">
                        <div id="reportrange" class="pull-right" style="background: rgba(255,255,255,0.3); color:#FFF; cursor: pointer; padding: 5px 10px 10px; margin-top:5px;">
                        </div>
                        <h2>Registered Users</h2>

                        <!----- REPORTS CHART --> 
                        <canvas id="line-chart" width="600" height="200"></canvas>

                        <?php  $result = $this->MReports->countUsers('2017-10-01 01:00:00','2017-11-01 01:00:00');
                            
                              echo "<br>Num of active users for month of Oct: ".$result;?>
                    </div>
                </section>
            </div>

            <br> 
            <br>

            <div class="col-lg-12" >
                <section class="panel corner-flip">
                    <div class="widget-chart bg-danger-lighten">
                        <div id="reportrange" class="pull-right" style="background: rgba(255,255,255,0.3); color:#FFF; cursor: pointer; padding: 5px 10px 10px; margin-top:5px;">
                        </div>
                        <h2>Approved Events</h2>
                        <canvas id="line-chart2" width="600" height="200"></canvas>
                        
                        <!--- jesus part -->
                        <?php                   
                          echo "<br>Number of approved events for month of Oct: ".$result."<br>";
                          
                          $result =$this->MReports->numEvents('2017-11-01 01:00:00', '2017-12-01 01:00:00');
                          
                          echo "<br>Number of approved events for month of Nov: ".$result."<br>";

                          $result =$this->MReports->numEvents('2017-12-01 01:00:00', '2018-01-01 01:00:00');
                          
                          echo "<br>Number of approved events for month of Dec: ".$result."<br>";
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
               var chart1, chart2;

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
                });

                
             function getData(){
               $.ajax({
                      url:"../../../getUserMonthly.php",
                      method:"GET",
                      dataType:"text json",
                      data: {
                        years:"2017"
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


             function getEventsData(){
               $.ajax({
                      url:"../../../getEvents.php",
                      method:"GET",
                      dataType:"text json",
                      data: {
                        years:"2017"
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


              </script>