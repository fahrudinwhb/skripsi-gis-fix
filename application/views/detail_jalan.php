<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kelola Data Kecelakaan</title>
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/iCheck/flat/blue.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/morris/morris.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/style.css"> </head>

<body class="hold-transition skin-green sidebar-mini">
    <div class="wrapper">
        <header class="main-header">
            <!-- Logo -->
            <div class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels --><span class="logo-mini">
					<center>
					<img class="logo-minim" src="<?php echo base_url('assets/logo-mini.png') ?>" alt="">
				</center></span>
                <!-- logo for regular state and mobile devices --><span class="logo-lg">
					<center>
					<img class="logo-utama" src="<?php echo base_url('assets/logo.png') ?>" alt="">
				</center></span> </div>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="<?php echo base_url() ?>assets/#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <!--                Sistem Informasi Pemetaan Lokasi Kecelakaan Kota--><span class="sr-only">Toggle navigation</span> </a>
                <div class="center-title"> Sistem Informasi Pemetaan Lokasi Kecelakaan Kota Batu </div>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
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
                        <!-- masya -->
                        <?php
						if (empty($_SESSION['username'])) {
						  ?> <img src="<?php echo base_url().'assets/group.png'?>" class="img-circle" alt="User Image">
                            <!--                        admin-->
                            <?php
                         } elseif ($_SESSION['username']=='admin') {
				        ?> <img src="<?php echo base_url().'assets/'.$this->session->userdata('foto')?>" class="img-circle" alt="User Image">
                                <?php } ?>
                    </div>
                    <div class="pull-left info info-admin">
                        <!--                      masyarakat-->
                        <?php
						if (empty($_SESSION['username'])) {
                        ?>
                            <p> Masyarakat </p>
                            <a href="<?php echo base_url() ?>assets/#"> <i class="fa fa-circle text-danger">
                        </i>Offline </a>
                            <!--                        admin-->
                            <?php
                        } elseif ($_SESSION['username']=='admin') {
                        ?>
                                <p>
                                    <?php echo $this->session->userdata('username'); ?>
                                </p>
                                <a href="<?php echo base_url() ?>assets/#"> <i class="fa fa-circle text-success">
                        </i>
                                    <?php echo $this->session->userdata('status'); ?>
                                </a>
                                <?php } ?>
                    </div>
                    <!-- end new -->
                </div>
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu">
                    <li class="header">MAIN NAVIGATION</li>
                    <?php
					if (empty($_SESSION['username'])) {
					?>
                        <li>
                            <a href="<?php echo site_url('utama') ?>"> <i class="fa fa-bank"></i> <span>Beranda</span> </a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('show_peta') ?>"> <i class="fa fa-map"></i> <span>Peta</span> </a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('c_statistik/h_statistik') ?>"> <i class="fa fa-bar-chart"></i> <span>Statistik</span> </a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('c_statistik/bandingwilayah') ?>"> <i class="fa fa-exchange"></i> <span>Perbandingan Wilayah</span> </a>
                        </li>
                        <?php
					}elseif ($_SESSION['username']=='admin') {
					?>
                            <li>
                                <a href="<?php echo site_url('utama') ?>"> <i class="fa fa-bank"></i> <span>Beranda</span> </a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('show_peta') ?>"> <i class="fa fa-map"></i> <span>Peta</span> </a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('c_statistik/h_statistik') ?>"> <i class="fa fa-bar-chart"></i> <span>Statistik</span> </a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('c_statistik/bandingwilayah') ?>"> <i class="fa fa-exchange"></i> <span>Perbandingan Wilayah</span> </a>
                            </li>
                            <li>
                                <a href="<?php echo site_url() ?>"> <i class="fa fa-database"></i> <span>Data Kecelakaan</span> <span class="pull-right-container">
					    <i class="fa fa-angle-left pull-right"></i>
					  </span> </a>
                                <ul class="treeview-menu">
                                    <li><a href="<?php echo site_url('c_kelola/lihat_data') ?>"><i class="fa fa-circle-o"></i> Kelola Data</a></li>
                                    <li><a href="<?php echo site_url('c_kelola/kelola_koordinat') ?>"><i class="fa fa-circle-o"></i> Kelola Koordinat</a></li>
                                </ul>
                            </li>
                            <?php
					}
					 ?>
                                <?php
										if (empty($_SESSION['username'])) {
										?>
                                    <li>
                                        <a href="<?php echo site_url('c_akses') ?>"> <i class="fa fa-sign-in"></i> <span>Login</span> </a>
                                    </li>
                                    <?php
										}elseif ($_SESSION['username']=='admin') {
										?>
                                        <li>
                                            <a href="<?php echo site_url('c_akses/logout') ?>"> <i class="fa fa-sign-out"></i> <span>Logout</span> </a>
                                        </li>
                                        <?php
										}
										?>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>
        <!-- 'Start Kontent' -->
        <div class="content-wrapper">
            <div class="">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>Profil<small>Jalan</small></h1> </section>
                <!-- Main content -->
                <section class="content">
                    <div class="nama">
                        <div class="box-body">
                            <div class="callout callout-info">
                                <h4>
						<?php
						if (count($jalan)!=0) {
							echo "Nama Jalan : ".$jalan[0]['Name'].'</br>';
							echo "Kategori Jalan : ".$jalan[0]['Category'].'</br>';
							echo "Panjang Jalan : ".$jalan[0]['SHAPE_len'].'</br>';
						} else{
							echo "Belum Pernah Terjadi Kecelakaan";
						}
						?>
					</h4> </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- LINE CHART perbulan -->
                            <div class="box box-info">
                                <div class="box-header with-border">
                                    <h3 class="box-title"> Grafik <i>Street Profile</i> Total Kecelakaan dan Total Korban Berdasarkan Tahun</h3>
                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i> </button>
                                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <div class="chart">
                                        <canvas id="tahun" style="height:150px"></canvas>
                                    </div>
                                </div>
                            </div>
                               <div class="box box-info">
                                <div class="box-header with-border">
                                    <h3 class="box-title"> Grafik <i>Street Profile</i> Total Kecelakaan dan Total Korban Berdasarkan Bulan
								<!-- <?php
								if (count($jalan)!=0) {
									echo "Nama Jalan : ".$jalan[0]['Name'].'</br>';
									echo "Kategori Jalan : ".$jalan[0]['Category'].'</br>';
									echo "Panjang Jalan : ".$jalan[0]['SHAPE_len'];
								} else{
									echo "Belum Pernah Terjadi Kecelakaan";
								}
								?> -->
							</h3>
                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i> </button>
                                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <div class="chart">
                                        <canvas id="bulan" style="height:150px"></canvas>
                                    </div>
                                </div>
                            </div>
                            <!-- LINE CHART pertahun -->
                            <!--                            coba baru-->
                            
                            <!--                           baru end-->
                        </div>
                    </div>
                </section>
                <!-- /.content -->
            </div>
        </div>
        <!-- 'End Kontent' -->
        <footer class="main-footer">
            <div class="pull-right hidden-xs"> </div> <strong>Copyright &copy; 2017 <a href="http://www.polresbatu.id/">Polres Kota Batu</a>.</strong> <b>Version</b> 1.0.0 </footer>
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
        <script src="<?php echo base_url() ?>assets/dist/js/demo.js"></script>
        <script>
            $.widget.bridge('uibutton', $.ui.button);
        </script>
        <script src="<?php echo base_url() ?>assets/plugins/chartjs/Chart.min.js"></script>
<!--        bulan-->
       <script type="text/javascript">
            var ctx = document.getElementById("bulan").getContext('2d');
            var bulan = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [
                        <?php foreach ($jalan as $j) {
						echo '"'.$j['Nama_Bulan'].'"'.",";
				} ?>
                    ],
                    datasets: [
                        {
                            label: 'Total Kecelakaan',
                            data: [
                                <?php foreach ($jalan as $j) {
							if ($j['MONTH(WAKTU)'] > 0) {
								echo $j['T'].",";
							}
						} ?>
                            ],
                            backgroundColor: "rgba(0, 0, 0, 1)",
                            borderColor: "rgba(0, 0, 0, 1)",
                            borderWidth: 1,
                            fill: false,
                        },
                        {
                            label: 'Korban Meninggal',
                            data: [
                                <?php foreach ($jalan as $j) {
							if ($j['MONTH(WAKTU)'] > 0) {
								echo $j['M'].",";
							}
						} ?>
                            ],
                            backgroundColor: "rgba(185,0,0,1)",
                            borderColor: "rgba(185,0,0,1)",
                            borderWidth: 1,
                            fill: false,
                        },
                        {
                            label: 'Korban Luka Berat',
                            data: [
                                <?php foreach ($jalan as $j) {
							if ($j['MONTH(WAKTU)'] > 0) {
								echo $j['LB'].",";
							}
						} ?>
                            ],
                            backgroundColor: "rgba(246, 155, 0,1)",
                            borderColor: "rgba(246, 155, 0,1)",
                            borderWidth: 1,
                            fill: false,
                        },
                        {
                            label: 'Korban Luka Ringan',
                            data: [
                                <?php foreach ($jalan as $j) {
							if ($j['MONTH(WAKTU)'] > 0) {
								echo $j['LR'].",";
							}
						} ?>
                            ],
                            backgroundColor: "rgba(246, 254, 0,1)",
                            borderColor: "rgba(246, 254, 0,1)",
                            borderWidth: 1,
                            fill: false,
                        }
                    ]
                },
                options: {
                    responsive: true,
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        </script>
        <!--        tahun-->
        <script type="text/javascript">
            var ctx = document.getElementById("tahun").getContext('2d');
            var tahun = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [
                        <?php foreach ($tahun as $t) {
						  echo $t['YEAR(WAKTU)'].',';
				        } ?>
                    ],
                    datasets: [
                        {
                            label: 'Total Kecelakaan',
                            data: [
                                <?php foreach ($tahun as $t) {
                                    if ($t['YEAR(WAKTU)'] > 0) {
                                        echo $t['T'].",";
                                    }
                                }?>
                            ],
                            backgroundColor: "rgba(0, 0, 0, 1)",
                            borderColor: "rgba(0, 0, 0, 1)",
                            borderWidth: 1,
                            fill: false,
                        },
                        {
                            label: 'Korban Meninggal',
                            data: [
                                <?php foreach ($tahun as $t) {
                                    if ($t['YEAR(WAKTU)'] > 0) {
                                        echo $t['M'].",";
                                    }
                                }?>
                            ],
                            backgroundColor: "rgba(185,0,0,1)",
                            borderColor: "rgba(185,0,0,1)",
                            borderWidth: 1,
                            fill: false,
                        },
                        {
                            label: 'Korban Luka Berat',
                            data: [
                                <?php foreach ($tahun as $t) {
                                    if ($t['YEAR(WAKTU)'] > 0) {
                                        echo $t['LB'].",";
                                    }
                                }?>
                            ],
                            backgroundColor: "rgba(246, 155, 0,1)",
                            borderColor: "rgba(246, 155, 0,1)",
                            borderWidth: 1,
                            fill: false,
                        },
                        {
                            label: 'Korban Luka Ringan',
                            data: [
                                <?php foreach ($tahun as $t) {
                                    if ($t['YEAR(WAKTU)'] > 0) {
                                        echo $t['LR'].",";
                                    }
                                }?>
                            ],
                            backgroundColor: "rgba(246, 254, 0,1)",
                            borderColor: "rgba(246, 254, 0,1)",
                            borderWidth: 1,
                            fill: false,
                        }
                    ]
                },
                options: {
                    responsive: true,
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        </script>
</body>

</html>