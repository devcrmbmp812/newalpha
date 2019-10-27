</head>

<body class="hold-transition sidebar-mini fixed skin-blue">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="/index.php" class="logo">
            <!-- mini logo -->
            <b class="logo-mini">
                <span class="light-logo"><img src="/images/logo/logo-light.png" alt="logo"></span>
                <span class="dark-logo"><img src="/images/logo/logo-dark.png" alt="logo"></span>
            </b>
            <!-- logo-->
            <span class="logo-lg">
          <img src="/images/logo/logo-light-text.png" alt="logo" class="light-logo" width="130px">
          <img src="/images/logo/logo-dark-text.png" alt="logo" class="dark-logo" width="130px">
        </span>
        </a>
        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <div>
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Vis/skjul navigation</span>
                </a>
            </div>
        
         <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
          <li class="search-box">
            <a class="nav-link hidden-sm-down" href="javascript:void(0)"><i class="mdi mdi-magnify"></i></a>
            <form class="app-search" style="display: none;">
                <input type="text" class="form-control" placeholder="Indtast søgeord & enter"> <a class="srh-btn"><i class="ti-close"></i></a>
            </form>
          </li>         
          
          <!-- Messages -->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="mdi mdi-email"></i>
            </a>
            <ul class="dropdown-menu scale-up">
              <li class="header">You have 1 message</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu inner-content-div">
                  <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                        <img src="/images/user2-160x160.jpg" class="rounded-circle" alt="User Image">
                      </div>
                      <div class="mail-contnet">
                         <h4>
                          Lorem Ipsum
                          <small><i class="fa fa-clock-o"></i> 15 mins</small>
                         </h4>
                         <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
                      </div>
                    </a>
                  </li>
                  <!-- end message -->
                </ul>
              </li>
              <li class="footer"><a href="#">See all e-Mails</a></li>
            </ul>
          </li>
          <!-- Notifications -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="mdi mdi-bell"></i>
            </a>
            <ul class="dropdown-menu scale-up">
              <li class="header">You have 1 notification</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu inner-content-div">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> Curabitur id eros quis nunc suscipit blandit.
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          <!-- Tasks-->
          <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="mdi mdi-message"></i>
            </a>
            <ul class="dropdown-menu scale-up">
              <li class="header">You have 1 task</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu inner-content-div">
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Lorem ipsum dolor sit amet
                        <small class="pull-right">30%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-aqua" style="width: 30%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">30% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                </ul>
              </li>
              <li class="footer">
                <a href="#">View all tasks</a>
              </li>
            </ul>
          </li>
          <!-- User Account-->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="/images/user5-128x128.jpg" class="user-image rounded-circle" alt="User Image">
            </a>
            <ul class="dropdown-menu scale-up">
              <!-- User image -->
              <li class="user-header">
                <img src="/images/user5-128x128.jpg" class="float-left rounded-circle" alt="User Image">

                <p>
                  <?php echo $_SESSION['user_name'];?>
                  <small class="mb-5"><?php echo $_SESSION['user_email'];?></small>
                  <a href="#" class="btn btn-danger btn-sm btn-rounded">Vis profil</a>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row no-gutters">
                  <div class="col-12 text-left">
                    <a href="#"><i class="ion ion-person"></i> Min profil</a>
                  </div>
                  <div class="col-12 text-left">
                    <a href="#"><i class="ion ion-email-unread"></i> Indbakke</a>
                  </div>
                <div role="separator" class="divider col-12"></div>
                  <div class="col-12 text-left">
                    <a href="#"><i class="ti-settings"></i> Indstillinger</a>
                  </div>
                <div role="separator" class="divider col-12"></div>
                  <div class="col-12 text-left">
                    <a href="/logout.php"><i class="fa fa-power-off"></i> Log ud</a>
                  </div>                
                </div>
                <!-- /.row -->
              </li>
            </ul>
          </li>
           <!-- Fullscreen Toggle Button -->
          <li class="notifications-menu">
            <button type="button" class="btn btn-box-tool font-size-24" data-provide="fullscreen">
              <i class="ion ion-android-expand fullscreen-default" style="color: white;"></i>
              <i class="ion ion-android-contract fullscreen-active" style="color: white;"></i>
            </button>
          </li>
          <!-- /.Fullscreen Toggle Button -->
          <!--
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-cog fa-spin"></i></a>
          </li>
          -->
        </ul>
      </div>
    </nav>
    </header>

    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
<style type="text/css">
        .bgimg {
            background-image: url('/images/logo/logo-color-m.png'); 
            background-repeat: no-repeat; 
            background-position: bottom;
        }
    </style>      
        <!-- sidebar-->
        <section class="sidebar bgimg">

            <!-- sidebar menu-->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="user-profile treeview">
                    <a href="/index.php">
                        <img src="/images/user5-128x128.jpg" alt="user">
                        <span><?php echo $_SESSION['user_name'];?></span>
                        <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="javascript:void()"><i class="fa fa-user mr-5"></i>Min profile </a></li>
                        <li><a href="javascript:void()"><i class="fa fa-envelope-open mr-5"></i>Indbakke</a></li>
                        <li><a href="javascript:void()"><i class="fa fa-cog mr-5"></i>Indstillinger</a></li>
                        <li><a href="/logout.php"><i class="fa fa-power-off mr-5"></i>Log ud</a></li>
                    </ul>
                </li>
                <li class="header nav-small-cap">MAIN</li>
        <li class="<?PHP if ($page == "") { echo "active"; } ?>">
          <a href="/">
            <i class="fa fa-home"></i> <span>Hjem</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
        </li>
        
        <li class="<?PHP if ($page == "calendar") { echo "active"; } ?>">
          <a href="#">
            <i class="fa fa-calendar"></i> <span>Vagtplan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
        </li>
      
        <li class="<?PHP if ($page == "users") { echo "active"; } ?>">
          <a href="#">
            <i class="fa fa-users"></i> <span>Kollegaer</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
        </li>
         <li class="<?PHP if ($page == "forum") { echo "active"; } ?>">
          <a href="#">
            <i class="fa fa-comments"></i> <span>Forum</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
        </li>
        <li class="<?PHP if ($page == "about") { echo "active"; } ?>">
          <a href="/about">
            <i class="fa fa-info-circle"></i> <span>Om <?php echo SITE_NAME;?></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
        </li>
        <li class="header nav-small-cap">ADMIN</li>
        <li class="treeview <?PHP if ($page == "users" && $mode == "users") { echo "active"; } ?>">
          <a href="/admin/settings">
            <i class="fa fa-users"></i>
            <span>Brugerhåndtering</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
           <ul class="treeview-menu">
            <li><a href="/apps/users/" id="sa-access"><i class="fa fa-circle-thin"></i>Brugere</a></li>
            <li><a href="/apps/users/logs.php" id="sa-access"><i class="fa fa-circle-thin"></i>Log oversigt</a></li>

          </ul>
        </li>
        <li>
          <a href="#" data-toggle="control-sidebar">
            <i class="fa fa-cog"></i>
            <span>Control (temp)</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
        </li>
            </ul>

        </section>
    </aside>