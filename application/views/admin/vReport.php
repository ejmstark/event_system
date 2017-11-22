<body class="">

    <header class="a-event-header">
      <div class="header-content">
        <p class="text-center"><img class="sys-logo" src="<?php echo base_url('assets/jcAssets/pics/main-logo-prime.png')?>" alt="Event system logo"></p>
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
                <div class="col-sm-8 d-none d-sm-none d-md-block">
                  <h3><?php echo $this->session->userdata['userSession']->userFName; ?></h3>
                  <p class="user-role d-none d-sm-none d-md-none d-lg-inline">Administrator</p>
                </div>
              </div>
            </li>
          </div>

          <div class="lower-sbar">
            
            <li><a href="<?php echo site_url();?>/admin/cAdmin">
              <p>
               <div class="d-block d-sm-block d-md-none">
                  <center> <i class="fa fa-list-alt" aria-hidden="true"></i> </center>
                </div>
               <span class= "d-none d-sm-none d-md-inline">
                  <i class="fa fa-list-alt" aria-hidden="true"></i> 
                  Events 
                </span> 
              </a></li></p>
            <li><a href="<?php echo site_url();?>/admin/cAdmin/viewUserAccountMgt">
              <p>
                <div class="d-block d-sm-block d-md-none">
                  <center> <i class="fa fa-calendar" aria-hidden="true"></i> </center>
                </div>
                <span class="d-none d-sm-none d-md-inline">  <i class="fa fa-calendar" aria-hidden="true"></i> User Account </span>
              </a></li></p>
            <li><a href="<?php echo site_url();?>/admin/cAdmin/viewAdminAccountMgt">
              <p>
                <div class="d-block d-sm-block d-md-none">
                  <center><i class="fa fa-user-secret" aria-hidden="true"></i> </center>
                </div>
                <span class="d-none d-sm-none d-md-inline"> <i class="fa fa-user-secret" aria-hidden="true"></i> Admin Account </span>
              </a></li></p>
            <li><a href="<?php echo site_url();?>/admin/cAdmin/viewFinance">
              <p>
                <div class="d-block d-sm-block d-md-none">
                  <center><i class="fa fa-line-chart" aria-hidden="true"></i></center>
                </div>
                <span class="d-none d-sm-none d-md-inline"> <i class="fa fa-line-chart" aria-hidden="true"></i> Finance</span>
              </a></li></p>
            <li class="active-li"><a href="<?php echo site_url();?>/admin/cAdmin/viewReport">
              <p>
                <div class="d-block d-sm-block d-md-none">
                  <center><i class="fa fa-envelope-open" aria-hidden="true"></i></center>
                </div>
                <span class="d-none d-sm-none d-md-inline"> <i class="fa fa-envelope-open" aria-hidden="true"></i> Report</span>
              </a></li></p>

               <li ><a href ="<?php echo site_url();?>/admin/cAdmin/generateCard" data-wow-delay="0.1s">
              <p>
                <div class="d-block d-sm-block d-md-none">
                  <center><i class="fa fa-credit-card" aria-hidden="true"></i></center>
                </div>
                <span class="d-none d-sm-none d-md-inline"><i class="fa fa-credit-card" aria-hidden="true"></i> Cards</span>
              </a></li></p>

            <li><a href ="<?php echo site_url();?>/cLogin/userLogout" data-wow-delay="0.1s">
              <p>
                <div class="d-block d-sm-block d-md-none">
                  <center><i class="fa fa-sign-out" aria-hidden="true"></i></center>
                </div>
                <span class="d-none d-sm-none d-md-inline"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</span>
              </a></li></p>
          </div>
        </ul>

      </aside>


<div class="admin-main container">

        <div class="admin-wrapper">
          <div class="row justify-content-end">
            <div class="col-10">
                <h3><center>Reports<center></h3><br>
                  <h5><center>Registered Users</center></h5>
                  
                  <!----- REPORTS CHART --> 
                  <canvas id="line-chart" width="600" height="200"></canvas>

                  <?php  $result = $this->MReports->countUsers('2017-10-01 01:00:00','2017-11-01 01:00:00');
                    
                      echo "<br>Num of active users for month of Oct: ".$result;?>
                  
                  <br> 
                  <br>
                  <h5><center>APPROVED EVENTS</center></h5>
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
          </div>
        </div>

      </div>

    </div>

    <footer class="a-event-footer">

    </footer>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
  </body>
</html>
    
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
                                borderColor: "#3e95cd"
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
                                borderColor: "#3e95cd"
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