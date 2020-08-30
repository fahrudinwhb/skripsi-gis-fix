<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Perbandingan</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datatables/dataTables.bootstrap.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/AdminLTE.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/skins/_all-skins.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/iCheck/flat/blue.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/style.css">
</head>
<style media="screen">
  .twitter-typeahead{
    width: 100% !important;
  }
  .ta-sugest{
    background-color: #00c0ef;
    /*border: 1px solid gray;
    border-bottom: none;*/
  }
  .ta-data{
    border: 1px solid gray;
  }
  .ta-input{
    width: 100%;
  }
</style>
<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">
		<header class="main-header">
			<!-- Logo -->
			<a href="<?php echo base_url() ?>assets/admin.jpg" class="logo">
				<!-- mini logo for sidebar mini 50x50 pixels --><span class="logo-mini"><b>A</b>LT</span>
				<!-- logo for regular state and mobile devices --><span class="logo-lg"><b>Admin</b>SIK</span> </a>
			<!-- Header Navbar: style can be found in header.less -->
			<nav class="navbar navbar-static-top">
				<!-- Sidebar toggle button--><a href="<?php echo base_url() ?>assets/#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        Sistem Informasi Kecelakaan Kota Batu
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
				<a href="<?php echo site_url('utama') ?>"> <i class="fa fa-dashboard"></i> <span>Welcome</span> </a>
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
					<a href="<?php echo site_url('utama') ?>"> <i class="fa fa-dashboard"></i> <span>Welcome</span> </a>
				</li>
				<li>
					<a href="<?php echo site_url('peta') ?>"> <i class="fa fa-map"></i> <span>Peta</span> </a>
				</li>
				<li>
					<a href="<?php echo site_url('c_statistik/h_statistik') ?>"> <i class="fa fa-bar-chart"></i> <span>Statistik</span> </a>
				</li>
				<li>
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
    <div class="content">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>Perbandingan<small>Jalan</small></h1>
        <!-- <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Charts</a></li>
          <li class="active">ChartJS</li>
        </ol> -->
      </section>
      <!-- Main content -->
      <section class="content">
				<div class="nama">
					<div class="box-body">
				<div class="callout callout-info">
					<h4>
						Pilih Jalan
					</h4>
					<!-- form start -->
					<form class="form-horizontal" action="" method="post">
						<div class="box-body">
							<div class="form-group">
								<label for="inputPassword3" class="col-sm-2 control-label">Nama Jalan 1</label>

								<div class="col-sm-10">
									<input type="text" class="typeahead form-control" value="" placeholder="Ketik Nama Jalan" name="nama_jalan1" required>
								</div>
							</div>
							<div class="form-group">
								<label for="inputPassword3" class="col-sm-2 control-label">Nama Jalan 2</label>

								<div class="col-sm-10">
									<input type="text" class="typeahead form-control" value="" placeholder="Ketik Nama Jalan" name="nama_jalan2" required>
								</div>
							</div>
							<button type="submit" class="btn btn-warning pull-right">Bandingkan</button>
						</div>
						<!-- /.box-body -->
					</form>
				</div>
			</div>
				</div>
				<div class="row">
        <div class="col-md-12">
					<!-- LINE CHART perbulan -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"> Grafik Perbandingan Total Kecelakaan Per-Bulan</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="chart">
                <canvas id="lineChart" style="height:150px"></canvas>
              </div>
            </div>
          </div>
					<!-- LINE CHART pertahun -->
          <!-- <?php foreach ($bulan1 as $b1) {
            echo $b1['Name']."</br>";
            echo $b1['T']."</br>";
          } ?> -->
          
        </div>
      </div>
				<!-- KONTEN E NDEK KENE -->
      </section>
      <!-- /.content -->
    </div>
  </div>
  <!-- 'End Kontent' -->
  <footer class="main-footer">
		<div class="pull-right hidden-xs"> </div> <strong>Copyright &copy; 2017 <a href="http://www.polresbatu.id/">Polres Kota Batu</a>.</strong> <b>Version</b> 1.0.0
  </footer>
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
	<script type="text/javascript" src="<?php echo base_url() ?>assets/typeahead.bundle.js"></script>
  <script type="text/javascript">

  var states = <?php echo file_get_contents(site_url('ajax_jalan/cari_jalan')) ?>;

  // constructs the suggestion engine
	var states = new Bloodhound({
	datumTokenizer: Bloodhound.tokenizers.whitespace,
	queryTokenizer: Bloodhound.tokenizers.whitespace,
	// `states` is an array of state names defined in "The Basics"
	local: states
	});

	$('.typeahead').typeahead({
	hint: true,
	highlight: true,
	minLength: 1,
	classNames: {
	  input: 'ta-input',
	  suggestion: 'ta-sugest',
	  dataset: 'ta-data'
	}
	},
	{
	name: 'states',
	source: states
	});
	$('.typeahead').bind('typeahead:render', function(ev, suggestion) {
	  $('.ta-sugest').css('width',$(".twitter-typeahead").width());
	});

  </script>
  <script>
	  $(function () {
	    var areaChartData = {
	      labels: [
					// <?php foreach ($jalan as $j) {
					// 		echo '"'.$j['Nama_Bulan'].'"'.",";
					// } ?>
          "Januari","Januari","Januari","Januari","Januari","Januari","Januari","Januari","Januari","Januari","Januari","Januari","Januari"
				],
	      datasets: [
	        {
	          label: "Jalan",
	          fillColor: "rgba(0, 0, 0, 1)",
	          strokeColor: "rgba(0, 0, 0, 1)",
	          pointColor: "rgba(0, 0, 0, 1)",
	          pointStrokeColor: "#000000",
	          pointHighlightFill: "#fff",
	          pointHighlightStroke: "rgba(0,0,0,1)",
	          data:[
							<?php foreach ($bulan1 as $b1) {
									echo $b1['T'].",";

							} ?>
						]
	        },
	        {
	          label: "Jalan1",
	          fillColor: "rgba(185,0,0,1)",
	          strokeColor: "rgba(185,0,0,1)",
	          pointColor: "#b90000",
	          pointStrokeColor: "rgba(185,0,0,1)",
	          pointHighlightFill: "#fff",
	          pointHighlightStroke: "rgba(185,0,0,1)",
	          data: [
              <?php foreach ($bulan2 as $b2) {
									echo $b2['T'].",";

							} ?>
						]
	        }
	      ]
	    };

	    var areaChartOptions = {
	      showScale: true,
	      scaleShowGridLines: false,
	      scaleGridLineColor: "rgba(0,0,0,.05)",
	      scaleGridLineWidth: 1,
	      scaleShowHorizontalLines: true,
	      scaleShowVerticalLines: true,
	      bezierCurve: true,
	      bezierCurveTension: 0.3,
	      pointDot: false,
	      pointDotRadius: 4,
	      pointDotStrokeWidth: 1,
	      pointHitDetectionRadius: 20,
	      datasetStroke: true,
	      datasetStrokeWidth: 2,
	      datasetFill: true,
	      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
	      maintainAspectRatio: true,
	      responsive: true
	    };

	    //Create the line chart
	    // areaChart.Line(areaChartData, areaChartOptions);

	    //-------------
	    //- LINE CHART -
	    //--------------
	    var lineChartCanvas = $("#lineChart").get(0).getContext("2d");
	    var lineChart = new Chart(lineChartCanvas);
	    var lineChartOptions = areaChartOptions;
	    lineChartOptions.datasetFill = false;
	    lineChart.Line(areaChartData, lineChartOptions);
	  });
	</script>

</body>

</html>
