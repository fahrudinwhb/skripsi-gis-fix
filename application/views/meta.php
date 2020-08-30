<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="initial-scale=1,width=device-width">
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/iCheck/flat/blue.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/morris/morris.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datepicker/datepicker3.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
        <style>
        html, body, #map {
            width: 100%;
            height: 100%;
            padding: 0;
            margin: 0;
        }
        </style>
        <title></title>
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="<?php echo base_url() ?>assets/#" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>A</b>LT</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>Admin</b>SIK</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="<?php echo base_url() ?>assets/#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        Sistem Informasi Kecelakaan Kota Batu
        <span class="sr-only">Toggle navigation</span>
      </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="<?php echo base_url() ?>assets/#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                                <span class="hidden-xs">Alexander Pierce</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                                    <p>
                                        Alexander Pierce - Kasatlantas
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                <!-- /.row -->
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="<?php echo base_url() ?>assets/#" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="<?php echo base_url() ?>assets/#" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <!-- Control Sidebar Toggle Button -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p>Alexander Pierce</p>
                        <a href="<?php echo base_url() ?>assets/#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>
                <!-- search form -->
                <!-- /.search form -->
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="active">
                        <a href="<?php echo base_url() ?>assets/#">
                            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('peta') ?>">
                            <i class="fa fa-map"></i> <span>Peta</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() ?>assets/">
                            <i class="fa fa-database"></i> <span>Data Kecelakaan</span>
                            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo base_url() ?>assets/kelola_data.html"><i class="fa fa-circle-o"></i> Kelola Data</a></li>
                            <li><a href="<?php echo base_url() ?>assets/pages/UI/icons.html"><i class="fa fa-circle-o"></i> Tambah Lokasi</a></li>
                            <li><a href="<?php echo base_url() ?>assets/pages/UI/icons.html"><i class="fa fa-circle-o"></i> Tambah Data</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?php echo base_url() ?>assets/laporan_kecelakaan.html">
                            <i class="fa fa-file"></i> <span>Laporan Kecelakaan</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() ?>assets/login.html">
                            <i class="fa fa-sign-in"></i> <span>Login</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() ?>assets/">
                            <i class="fa fa-sign-out"></i> <span>Logout</span>
                        </a>
                    </li>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <iframe src="<?php echo site_url('peta')?>"></iframe>
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 1.0.0
            </div>
            <strong>Copyright &copy; 2017 <a href="<?php echo base_url() ?>assets/http://www.polresbatu.id/">Polres Kota Batu</a>.</strong> All rights reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Create the tabs -->
            <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
                <li><a href="<?php echo base_url() ?>assets/#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
                <li><a href="<?php echo base_url() ?>assets/#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <!-- Home tab content -->
                <div class="tab-pane" id="control-sidebar-home-tab">
                    <h3 class="control-sidebar-heading">Recent Activity</h3>
                    <ul class="control-sidebar-menu">
                        <li>
                            <a href="<?php echo base_url() ?>assets/javascript:void(0)">
                                <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                                    <p>Will be 23 on April 24th</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url() ?>assets/javascript:void(0)">
                                <i class="menu-icon fa fa-user bg-yellow"></i>

                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                                    <p>New phone +1(800)555-1234</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url() ?>assets/javascript:void(0)">
                                <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                                    <p>nora@example.com</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url() ?>assets/javascript:void(0)">
                                <i class="menu-icon fa fa-file-code-o bg-green"></i>

                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                                    <p>Execution time 5 seconds</p>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <!-- /.control-sidebar-menu -->

                    <h3 class="control-sidebar-heading">Tasks Progress</h3>
                    <ul class="control-sidebar-menu">
                        <li>
                            <a href="<?php echo base_url() ?>assets/javascript:void(0)">
                                <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url() ?>assets/javascript:void(0)">
                                <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url() ?>assets/javascript:void(0)">
                                <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url() ?>assets/javascript:void(0)">
                                <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <!-- /.control-sidebar-menu -->

                </div>
                <!-- /.tab-pane -->
                <!-- Stats tab content -->
                <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
                <!-- /.tab-pane -->
                <!-- Settings tab content -->
                <div class="tab-pane" id="control-sidebar-settings-tab">
                    <form method="post">
                        <h3 class="control-sidebar-heading">General Settings</h3>

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Report panel usage
                                <input type="checkbox" class="pull-right" checked>
                            </label>

                            <p>
                                Some information about this general settings option
                            </p>
                        </div>
                        <!-- /.form-group -->

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Allow mail redirect
                                <input type="checkbox" class="pull-right" checked>
                            </label>

                            <p>
                                Other sets of options are available
                            </p>
                        </div>
                        <!-- /.form-group -->

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Expose author name in posts
                                <input type="checkbox" class="pull-right" checked>
                            </label>

                            <p>
                                Allow the user to show his name in blog posts
                            </p>
                        </div>
                        <!-- /.form-group -->

                        <h3 class="control-sidebar-heading">Chat Settings</h3>

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Show me as online
                                <input type="checkbox" class="pull-right" checked>
                            </label>
                        </div>
                        <!-- /.form-group -->

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Turn off notifications
                                <input type="checkbox" class="pull-right">
                            </label>
                        </div>
                        <!-- /.form-group -->

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Delete chat history
                                <a href="<?php echo base_url() ?>assets/javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                            </label>
                        </div>
                        <!-- /.form-group -->
                    </form>
                </div>
                <!-- /.tab-pane -->
            </div>
        </aside>
        <!-- /.control-sidebar -->
        <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->


    <script src="<?php echo base_url() ?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <script src="<?php echo base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/morris/morris.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/knob/jquery.knob.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/fastclick/fastclick.js"></script>
    <script src="<?php echo base_url() ?>assets/dist/js/app.min.js"></script>
<!--    <script src="<?php echo base_url() ?>assets/dist/js/pages/dashboard.js"></script>-->
    <script src="<?php echo base_url() ?>assets/dist/js/demo.js"></script>
    <script>$.widget.bridge('uibutton', $.ui.button);</script>
        <script>
            $(document).ready(function(){
                $("iframe").css("width","100%");
                $("iframe").height($(".content-wrapper").height());
            });
        </script>
</body>
</html>
