<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Data Kecelakaan</title>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/style.css"> </head>
<style media="screen">
    .twitter-typeahead {
        width: 100% !important;
    }
    
    .ta-sugest {
        background-color: white;
        /*border: 1px solid gray;
    border-bottom: none;*/
    }
    
    .ta-data {
        border: 1px solid gray;
    }
    
    .ta-input {
        width: 100%;
    }
</style>

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
                <!-- Main content -->
                <section class="content-header">
                    <h1>Tambah Data Kecelakaan<small>Kota Batu</small></h1> </section>
                <section class="content">
                    <div class="row">
                        <!--/.col (left) -->
                        <!-- right column -->
                        <div class="col-md-12">
                            <!-- Horizontal Form -->
                            <div class="box box-info">
                                <!-- <div class="box-header with-border">
                    <h3 class="box-title">Data Kecelakaan Baru</h3>
                  </div> -->
                                <!-- /.box-header -->
                                <!-- form start -->
                                <form class="form-horizontal" action="<?php echo site_url('c_kelola/tambah_data') ?>" method="post">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Kode Titik</label>
                                            <div class="col-sm-10">
                                                <select type="option" class="form-control" id="opsi" placeholder="" name="kode_titik" required>
                                                    <option value selected disabled>Pilih Kode Titik</option>
                                                    <?php
                            foreach ($titik as $t) {
                             ?>
                                                        <option value="<?php echo $t['KODE_TITIK'] ?>">
                                                            <?php echo $t['KODE_TITIK']?>
                                                        </option>
                                                        <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPassword3" class="col-sm-2 control-label">ID Jalan</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="id_jalan" placeholder="Nama Jalan" name="id_jalan" required readonly> </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPassword3" class="col-sm-2 control-label">Nama Jalan</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="nama_jalan" placeholder="Nama Jalan" name="nama_jalan" required readonly> </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPassword3" class="col-sm-2 control-label">Kecamatan</label>
                                            <div class="col-sm-10">
                                                <select type="option" class="form-control" placeholder="" name="kecamatan" required>
                                                    <option value selected disabled>Pilih Kecamatan</option>
                                                    <?php
                            foreach ($wilayah as $w) {
                             ?>
                                                        <option value="<?php echo $w['KECAMATAN'] ?>">
                                                            <?php echo $w['KECAMATAN']?>
                                                        </option>
                                                        <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPassword3" class="col-sm-2 control-label">Total</label>
                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" id="" placeholder="Total Kecelakaan" name="total" required> </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPassword3" class="col-sm-2 control-label">Meninggal</label>
                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" id="" placeholder="Totak Meninggal" name="meninggal" required> </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPassword3" class="col-sm-2 control-label">Luka Berat</label>
                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" id="" placeholder="Total Luka Berat" name="luka_berat" required> </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPassword3" class="col-sm-2 control-label">Luka Ringan</label>
                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" id="" placeholder="Total Luka Ringan" name="luka_ringan" required> </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPassword3" class="col-sm-2 control-label">Waktu</label>
                                            <div class="col-sm-10">
                                                <input type="date" class="form-control" id="" placeholder="" name="waktu" required> </div>
                                        </div>
                                        <div class="" id="cek"> </div>
                                    </div>
                                    <!-- /.box-body -->
                                    <div class="box-footer">
                                        <!-- <button type="submit" class="btn btn-default">Batal</button> -->
                                        <button type="submit" class="btn btn-info pull-right">Tambah</button>
                                    </div>
                                    <!-- /.box-footer -->
                                </form>
                            </div>
                        </div>
                        <!--/.col (right) -->
                    </div>
                    <!-- /.row -->
                    <!-- </section> -->
                    <!-- /.content -->
                    <!-- </div> -->
                </section>
                <!-- /.content -->
            </div>
        </div>
        <!-- 'End Kontent' -->
        <footer class="main-footer">
            <div class="pull-right hidden-xs"> </div> <strong>Copyright &copy; 2017 <a href="http://www.polresbatu.id/">Polres Kota Batu</a>.</strong> <b>Version</b> 1.0.0 </footer>
        <script src="<?php echo base_url() ?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
        <script src="<?php echo base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url() ?>assets/plugins/fastclick/fastclick.js"></script>
        <script src="<?php echo base_url() ?>assets/dist/js/app.min.js"></script>
        <script src="<?php echo base_url() ?>assets/dist/js/demo.js"></script>
        <script type="text/javascript">
            $.ajaxSetup({
                type: "POST"
                , url: "<?php echo base_url('index.php/c_kelola/opsi'); ?>"
                , cache: false
            , });
            $("#opsi").change(function () {
                var kode_titik = $('select[name=kode_titik]').val();
                $.ajax({
                    data: {
                        kode_titik: kode_titik
                    }
                    , success: function (data) {
                        var obj = JSON.parse(data);
                        $("#id_jalan").val(obj.ID_JALAN);
                        $("#nama_jalan").val(obj.Name);
                    }
                });
            });
        </script>
</body>
</html>