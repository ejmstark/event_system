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
                <div class="col-sm-8">
                  <h1><?php echo $this->session->userdata['userSession']->userFName; ?></h1>
                  <p class="user-role">Administrator</p>
                </div>
              </div>
            </li>
          </div>

          <div class="lower-sbar">
            <li><a href="<?php echo site_url();?>/admin/cAdmin"><i class="fa fa-list-alt" aria-hidden="true"></i>Events</a></li>
            <li><a href="<?php echo site_url();?>/admin/cAdmin/viewUserAccountMgt"><i class="fa fa-calendar" aria-hidden="true"></i>User Account</a></li>
            <li><a href="<?php echo site_url();?>/admin/cAdmin/viewAdminAccountMgt"><i class="fa fa-user-secret" aria-hidden="true"></i>Admin Account </a></li>
            <li><a href="<?php echo site_url();?>/admin/cAdmin/viewFinance"><i class="fa fa-line-chart" aria-hidden="true"></i>Finance</a></li>
            <li class="active-li"><a href="<?php echo site_url();?>/admin/cAdmin/viewReport"><i class="fa fa-envelope-open" aria-hidden="true"></i>Report</a></li>
            <li><a href ="<?php echo site_url();?>/cLogin/userLogout" data-wow-delay="0.1s"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a></li>

          </div>
        </ul>

      </aside>

      <div class="admin-main container">

        <div class="admin-wrapper">
          <div class="row justify-content-end">
            <div class="col-10">
                <h3><center>Reports<center></h3><br>
                  <h5><center>Registered Users</center></h5>
                  
                
                  <canvas id="line-chart" width="600" height="200"></canvas>


                  <!-- query = SELECT * FROM `user_account` WHERE `user_type` = 'Regular' AND `user_status` = 'Active' AND `date_account_created` BETWEEN '2017-10-01 00:00:00.000000' AND '2017-10-31 00:00:00.000000'-->
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
                   var chart;
                   
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
                            console.log("data:" + data);
                            $(data).each(function(key,val){
                                newlabel[i] = val[1];
                                display[i++] = parseInt(val[0]);
                            });
                            console.log(display);
                            num =display;
                            labels = newlabel;
                              
                            updateChart();                         
                          },
                          complete: function(){

                             
                          }
                        });

                 }
                 function updateChart(){
                  console.log(num); 
                    chart.data.datasets[0].data = num;
                    chart.data.labels = labels; 
                    chart.update(2000); 
                 }


                  </script>