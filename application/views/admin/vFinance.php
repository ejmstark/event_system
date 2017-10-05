<body class="">

    <header class="a-event-header">
      <div class="header-content">
        <p class="text-center"><img class="sys-logo" src=<?php echo base_url('assets/jcAssets/pics/main-logo-prime.png')?> alt="Event system logo"></p>
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
            <li class="active-li"><a href="<?php echo site_url();?>/admin/cAdmin/viewFinance"><i class="fa fa-line-chart" aria-hidden="true"></i>Finance</a></li>
            <li><a href="<?php echo site_url();?>/admin/cAdmin/viewReport"><i class="fa fa-envelope-open" aria-hidden="true"></i>Report</a></li>
            <li><a href ="<?php echo site_url();?>/cLogin/userLogout" data-wow-delay="0.1s"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a></li>

          </div>
        </ul>

      </aside>

      <div class="admin-main container">

        <div class="admin-wrapper">
          <div class="row justify-content-end">
            <div class="col-4">
                Finance Here
            </div>
          </div>
        </div>

      </div>

    </div>

    <footer class="a-event-footer">

    </footer>

  </body>
</html>
