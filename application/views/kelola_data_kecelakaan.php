<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kelola Lokasi Kecelakaan</title>
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datatables/dataTables.bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/iCheck/flat/blue.css">
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
                            <li class="active">
                                <a href="<?php echo site_url() ?>"> <i class="fa fa-database"></i> <span>Data Kecelakaan</span> <span class="pull-right-container">
					    <i class="fa fa-angle-left pull-right"></i>
					  </span> </a>
                                <ul class="treeview-menu">
                                    <li class="active"><a href="<?php echo site_url('c_kelola/lihat_data') ?>"><i class="fa fa-circle-o"></i> Kelola Data</a></li>
                                    <li><a href="<?php echo site_url('c_kelola/kelola_koordinat') ?>"><i class="fa fa-circle-o"></i> Kelola Koordinat</a></li>
                                    <!-- <li><a href="<?php echo site_url('tambah_data') ?>"><i class="fa fa-circle-o"></i> Tambah Data</a></li> -->
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
                <!-- Main content -->
                <section class="content">
                    <div class="col-xs-3"></div>
                    <div class="col-xs-6">
                        <section class="content-header">
                            <h1>Kelola Lokasi Kecelakaan<small>Kota Batu</small></h1> </section>
                    </div>
                    <!--  ##########-->
                    <section class="content">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="box">
                                    <div class="box-header">
                                        <!-- <h3 class="box-title">Data Table With Full Features</h3> </div> -->
                                        <div class="col-xs-4"></div>
                                        <div class="col-xs-4"></div>
                                        <div class="col-xs-2"></div>
                                        <div class="col-xs-2">
                                            <a href="<?php echo site_url('c_kelola/input_data')?>">
                                                <button type="button" class="btn btn-block btn-success btn-lg">Tambah Data</button>
                                            </a>
                                        </div>
                                        <div class="col-xs-12"></div>
                                        <!-- /.box-header -->
                                        <div class="box-body">
                                            <table id="example1" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <!-- <th>ID</th> -->
                                                        <th>Nama Jalan</th>
                                                        <th>Kecamatan</th>
                                                        <th>Meninggal</th>
                                                        <th>Luka Berat</th>
                                                        <th>Luka Ringan</th>
                                                        <th>Total Kecelakaan</th>
                                                        <th>Waktu</th>
                                                        <th>Koordinat</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
											$no=1;
			                               foreach($data_kecelakaan as $dk){
			                                ?>
                                                        <tr>
                                                            <td>
                                                                <?php echo $no++;?>
                                                            </td>
                                                            <!-- <td>
														<?php echo $dk->ID_KECELAKAAN?>
													</td> -->
                                                            <td>
                                                                <?php echo $dk->Name?>
                                                            </td>
                                                            <td>
                                                                <?php echo $dk->KECAMATAN?>
                                                            </td>
                                                            <td>
                                                                <?php echo $dk->T_MENINGGAL?>
                                                            </td>
                                                            <td>
                                                                <?php echo $dk->T_LUKA_BERAT?>
                                                            </td>
                                                            <td>
                                                                <?php echo $dk->T_LUKA_RINGAN?>
                                                            </td>
                                                            <td>
                                                                <?php echo $dk->TOTAL_K?>
                                                            </td>
                                                            <td>
                                                                <?php echo $dk->WAKTU?>
                                                            </td>
                                                            <td>
                                                                <?php echo $dk->KOORDINAT; ?>
                                                            </td>
                                                            <td>
                                                                <div class="col-xs-6">
                                                                    <a class="glyphicon glyphicon-edit" href="<?php echo ('ubah_data/'.$dk->ID_KECELAKAAN) ?>"> </a>
                                                                </div>
                                                                <div class="col-xs-6">
                                                                    <a class="glyphicon glyphicon-trash" href="<?php echo ('hapus_data/'.$dk->ID_KECELAKAAN); ?>" onclick="return konfirmasi(<?php echo $dk->ID_KECELAKAAN ?>)"></a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <?php
			                                }
			                                ?>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>No</th>
                                                        <!-- <th>ID</th> -->
                                                        <th>Nama Jalan</th>
                                                        <th>Kecamatan</th>
                                                        <th>Meninggal</th>
                                                        <th>Luka Berat</th>
                                                        <th>Luka Ringan</th>
                                                        <th>Total Kecelakaan</th>
                                                        <th>Waktu</th>
                                                        <th>Koordinat</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                        <!-- /.box-body -->
                                    </div>
                                </div>
                            </div>
                    </section>
                    <!--#########-->
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
            <script src="<?php echo base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
            <script src="<?php echo base_url() ?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
            <script src="<?php echo base_url() ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
            <script src="<?php echo base_url() ?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>
            <script src="<?php echo base_url() ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
            <script src="<?php echo base_url() ?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
            <script src="<?php echo base_url() ?>assets/plugins/fastclick/fastclick.js"></script>
            <script src="<?php echo base_url() ?>assets/dist/js/app.min.js"></script>
            <!--    <script src="<?php echo base_url() ?>assets/dist/js/pages/dashboard.js"></script>-->
            <script src="<?php echo base_url() ?>assets/dist/js/demo.js"></script>
            <script>
                $.widget.bridge('uibutton', $.ui.button);
            </script>
            <script>
                $(function () {
                    $("#example1").DataTable();
                    $('#example2').DataTable({
                        "paging": true
                        , "lengthChange": false
                        , "searching": false
                        , "ordering": true
                        , "info": true
                        , "autoWidth": false
                    });
                });
            </script>
            <script type="text/javascript" language="JavaScript">
                function konfirmasi(id_kecelakaan) {
                    var user = $(id_kecelakaan).val();
                    tanya = confirm("Anda Yakin Akan Menghapus Data Ini ?");
                    if (tanya == true) return true;
                    else return false;
                }
            </script>
</body>

</html>