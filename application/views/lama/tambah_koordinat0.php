<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--    meta maps-->
    <meta name="keywords" content="get lattitude longitude, latlng onclick google map, latlng onmousemove google map, get lattitude longitude onclick, google map mouse event, show lattitude longutude onmousemove, show latlng onclick">
    <meta name="description" content="Get lattitude and longitude when onmouseover and onmouseclick in google map version 2" />
    <!--   end meta maps-->
    <title>Tambah Lokasi Kecelakaan</title>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datatables/dataTables.bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/style.css">
    <!--    maps-->
    <script src="http://maps.google.com/maps?file=api&v=2&key=AIzaSyAb5n_p20i7G1LubSHRURH8HPjeueFPjjg" type="text/javascript"></script>
    <!--end maps-->
</head>

<body class="tambah_koordinat hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    <header class="main-header">
			<!-- Logo -->
			<a href="#" class="logo">
				<!-- mini logo for sidebar mini 50x50 pixels -->
				<span class="logo-mini">
					<center>
					<img class="welcome" src="<?php echo base_url('assets/lantas.png') ?>" alt="">
				</center></span>
				<!-- logo for regular state and mobile devices -->
				<span class="logo-lg">
					<center>
					<img class="welcome" src="<?php echo base_url('assets/lantas.png') ?>" alt="">
				</center></span> </a>
			<!-- Header Navbar: style can be found in header.less -->
			<nav class="navbar navbar-static-top">
				<!-- Sidebar toggle button--><a href="<?php echo base_url() ?>assets/#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        Sistem Informasi Pemetaan Lokasi Kecelakaan Kota Batu
        <span class="sr-only">Toggle navigation</span>
      </a>
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
            <!-- new -->
            <?php
            if (empty($_SESSION['username'])) {
              ?>
              <img src="<?php echo base_url().'assets/user.png'?>" class="img-circle" alt="User Image"> </div>
          <div class="pull-left info">
            <p>
              Masyarakat
            </p> <a href="<?php echo base_url() ?>assets/#"><i class="fa fa-circle text-danger"></i>Offline</a> </div>
          <?php
            }elseif ($_SESSION['username']=='admin') {
            ?>
            <img src="<?php echo base_url().'assets/'.$this->session->userdata('foto')?>" class="img-circle" alt="User Image"> </div>
        <div class="pull-left info">
          <p>
            <?php echo $this->session->userdata('username'); ?>
          </p> <a href="<?php echo base_url() ?>assets/#"><i class="fa fa-circle text-success"></i><?php echo $this->session->userdata('status'); ?></a> </div>
        <?php
            }
             ?>
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
				<a href="<?php echo site_url('peta') ?>"> <i class="fa fa-map"></i> <span>Peta</span> </a>
			</li>
			<li>
				<a href="<?php echo site_url('c_statistik/h_statistik') ?>"> <i class="fa fa-bar-chart"></i> <span>Statistik</span> </a>
			</li>
			<?php
					}elseif ($_SESSION['username']=='admin') {
					?>
				<li>
					<a href="<?php echo site_url('utama') ?>"> <i class="fa fa-bank"></i> <span>Beranda</span> </a>
				</li>
				<li>
					<a href="<?php echo site_url('peta') ?>"> <i class="fa fa-map"></i> <span>Peta</span> </a>
				</li>
				<li>
					<a href="<?php echo site_url('c_statistik/h_statistik') ?>"> <i class="fa fa-bar-chart"></i> <span>Statistik</span> </a>
				</li>
        <li>
					<a href="<?php echo site_url('c_statistik/perbandingan') ?>"> <i class="fa fa-road"></i> <span>Perbandingan Jalan</span> </a>
				</li>
				<li class="active">
					<a href="<?php echo site_url() ?>"> <i class="fa fa-database"></i> <span>Data Kecelakaan</span> <span class="pull-right-container">
					    <i class="fa fa-angle-left pull-right"></i>
					  </span> </a>
					<ul class="treeview-menu">
						<li><a href="<?php echo site_url('c_kelola/lihat_data') ?>"><i class="fa fa-circle-o"></i> Kelola Data</a></li>
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
        <section class="content-header">
          <h1>Tambah Lokasi Kecelakaan<small>Kota Batu</small></h1>
        </section>
        <!--maps-->
        <div class="box box-info">
            <div class="col-cs-12">
                <div class="box-body">
                    <div id="mapa"></div>
                    <div class="eventtext">
                        <form action="<?php echo site_url('c_kelola/tambah_koordinat') ?>" method="post">
                            <div class="col-xs-12" hidden="">Lattitude: <span id="latspan"></span></div>
                            <div class="col-xs-12" hidden="">Longitude: <span id="lngspan"></span></div>
                            <div class="col-xs-12" hidden="">Lat Lng: <span id="latlong"></span></div>
                            <div class="col-xs-12">Latitude dan Longitude:</div>
                            <div class="col-xs-4">
                                <div class="input-group"> <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
                                    <input type="text" class="form-control" placeholder="Kode" id="kode" name="kode_titik" required> </div>
                                    <div id="peringatan">

                                    </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="input-group"> <span class="input-group-addon"><i class="fa fa-map-pin"></i></span>
                                    <input type="text" id="latclicked" class="form-control" placeholder="Latitude" name="latitude" required> </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="input-group"> <span class="input-group-addon"><i class="fa fa-map-pin"></i></span>
                                    <input type="text" id="longclicked" class="form-control" placeholder="Longitude" name="longitude" required> </div>
                            </div>
                            <div class="col-xs-2">
                                <button type="submit" class="btn btn-primary btn-block btn-flat" disabled>Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--   end maps-->
      </section>
      <!-- /.content -->
    </div>
  </div>
  <!-- 'End Kontent' -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs"> </div> <strong>Copyright &copy; 2017 <a href="http://www.polresbatu.id/">Polres Kota Batu</a>.</strong> <b>Version</b> 1.0.0
  </footer>


    <!--    new script-->
    <script src="<?php echo base_url() ?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <script src="<?php echo base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/fastclick/fastclick.js"></script>
    <script src="<?php echo base_url() ?>assets/dist/js/app.min.js"></script>
    <script src="<?php echo base_url() ?>assets/dist/js/demo.js"></script>
    <!--    end new scrip-->
    <!--maps script-->
    <script type="text/javascript">
        if (GBrowserIsCompatible()) {
            map = new GMap2(document.getElementById("mapa"));
            map.addControl(new GLargeMapControl());
            map.addControl(new GMapTypeControl(3));
            map.setCenter(new GLatLng(-7.871121, 112.526818), 15, 0);
            GEvent.addListener(map, 'mousemove', function (point) {
                document.getElementById('latspan').innerHTML = point.lat()
                document.getElementById('lngspan').innerHTML = point.lng()
                document.getElementById('latlong').innerHTML = point.lat() + ', ' + point.lng()
            });
            GEvent.addListener(map, 'click', function (overlay, point) {
                document.getElementById('latclicked').value = point.lat()
                document.getElementById('longclicked').value = point.lng()
            });
        }
    </script>
    <script type="text/javascript">
  $.ajaxSetup({
  type:"POST",
  url: "<?php echo base_url('index.php/ajax_kode'); ?>",
  cache: false,
  });

  $("#kode").keyup(function(){
  var kode_t = $("#kode").val();
  if (kode_t.length == 5) {
    if(kode_t != ''){
    $.ajax({
    data:{kode_titik:kode_t},
    success: function(respond){
    var data = JSON.parse(respond);
    $("#peringatan").html(data[0]);
    if (data[1]=='on') {
        $(':input[type="submit"]').prop('disabled', true);
    }
    else {
      $(':input[type="submit"]').prop('disabled', false);
    }
    }
    })
    }
    else {
    $.ajax({
    data:{kode_titik:'|kosong|'},
    success: function(respond){
      var data = JSON.parse(respond);
      $("#peringatan").html(data[0]);
      if (data[1]=='on') {
          $(':input[type="submit"]').prop('disabled', true);
      }
      else {
        $(':input[type="submit"]').prop('disabled', false);
      }
    }
    })
    }
  }else{
      $("#peringatan").html('Panjang ID Harus 7 Karakter');
      $(':input[type="submit"]').prop('disabled', true);
  }

  });


 </script>
    <!--end maps script-->
</body>

</html>
