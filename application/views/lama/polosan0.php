<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Kelola Data Kecelakaan</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datatables/dataTables.bootstrap.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/AdminLTE.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/skins/_all-skins.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/iCheck/flat/blue.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
</head>

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
        <h1>ChartJS<small>Preview sample</small></h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Charts</a></li>
          <li class="active">ChartJS</li>
        </ol>
      </section>
      <!-- Main content -->
      <section class="content">
				<!-- KONTEN E NDEK KENE -->
				<section class="content">
      <div class="row" <?php if ($hasil1=="") {
      	echo 'style="display:none"';
      } ?> >
        <div class="col-md-6">
          <!-- AREA CHART -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Area Chart</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="chart">
                <canvas id="areaChart" style="height:250px"></canvas>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- DONUT CHART -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Donut Chart</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <canvas id="pieChart" style="height:250px"></canvas>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
        <!-- /.col (LEFT) -->
        <div class="col-md-6">
          <!-- LINE CHART -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Line Chart</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="chart">
                <canvas id="lineChart" style="height:250px"></canvas>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- BAR CHART -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Bar Chart</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="chart">
                <canvas id="barChart" style="height:230px"></canvas>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
        <!-- /.col (RIGHT) -->
      </div>
      <!-- /.row -->

    </section>
<!-- end konten -->
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
	<script src="<?php echo base_url() ?>assets/plugins/chartjs/Chart.min.js"></script>
	<!--    <script src="<?php echo base_url() ?>assets/dist/js/pages/dashboard.js"></script>-->
	<script src="<?php echo base_url() ?>assets/dist/js/demo.js"></script>
	<script>
		$.widget.bridge('uibutton', $.ui.button);
	</script>
	<!-- chart -->
	<script>
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //--------------
    //- AREA CHART -
    //--------------

    // Get context with jQuery - using jQuery's .get() method.
    var areaChartCanvas = $("#areaChart").get(0).getContext("2d");
    // This will get the first returned node in the jQuery collection.
    var areaChart = new Chart(areaChartCanvas);

    var areaChartData = {
      labels: ["Luka Berat", "Luka Ringan", "Meninggal"],
      datasets: [
        {
          label: "<?php echo $hasil1['Name']; ?>",
          fillColor: "rgba(210, 214, 222, 1)",
          strokeColor: "rgba(210, 214, 222, 1)",
          pointColor: "rgba(210, 214, 222, 1)",
          pointStrokeColor: "#c1c7d1",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(220,220,220,1)",
          data: [<?php echo $hasil1['LB'].",". $hasil1['LR'].",".$hasil1['M'];?>]
        },
        {
					label: "<?php echo $hasil2['Name']; ?>",
          fillColor: "rgba(210, 214, 222, 1)",
          strokeColor: "rgba(210, 214, 222, 1)",
          pointColor: "rgba(210, 214, 222, 1)",
          pointStrokeColor: "#c1c7d1",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(220,220,220,1)",
          data: [<?php echo $hasil2['LB'].",". $hasil2['LR'].",".$hasil2['M'];?>]
        }
      ]
    };

    var areaChartOptions = {
      //Boolean - If we should show the scale at all
      showScale: true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines: false,
      //String - Colour of the grid lines
      scaleGridLineColor: "rgba(0,0,0,.05)",
      //Number - Width of the grid lines
      scaleGridLineWidth: 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines: true,
      //Boolean - Whether the line is curved between points
      bezierCurve: true,
      //Number - Tension of the bezier curve between points
      bezierCurveTension: 0.3,
      //Boolean - Whether to show a dot for each point
      pointDot: false,
      //Number - Radius of each point dot in pixels
      pointDotRadius: 4,
      //Number - Pixel width of point dot stroke
      pointDotStrokeWidth: 1,
      //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
      pointHitDetectionRadius: 20,
      //Boolean - Whether to show a stroke for datasets
      datasetStroke: true,
      //Number - Pixel width of dataset stroke
      datasetStrokeWidth: 2,
      //Boolean - Whether to fill the dataset with a color
      datasetFill: true,
      //String - A legend template
      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
      //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio: true,
      //Boolean - whether to make the chart responsive to window resizing
      responsive: true
    };

    //Create the line chart
    areaChart.Line(areaChartData, areaChartOptions);

    //-------------
    //- LINE CHART -
    //--------------
    var lineChartCanvas = $("#lineChart").get(0).getContext("2d");
    var lineChart = new Chart(lineChartCanvas);
    var lineChartOptions = areaChartOptions;
    lineChartOptions.datasetFill = false;
    lineChart.Line(areaChartData, lineChartOptions);

    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
    var pieChart = new Chart(pieChartCanvas);
    var PieData = [
      {
        value: 700,
        color: "#f56954",
        highlight: "#f56954",
        label: "Chrome"
      },
      {
        value: 500,
        color: "#00a65a",
        highlight: "#00a65a",
        label: "IE"
      },
      {
        value: 400,
        color: "#f39c12",
        highlight: "#f39c12",
        label: "FireFox"
      },
      {
        value: 600,
        color: "#00c0ef",
        highlight: "#00c0ef",
        label: "Safari"
      },
      {
        value: 300,
        color: "#3c8dbc",
        highlight: "#3c8dbc",
        label: "Opera"
      },
      {
        value: 100,
        color: "#d2d6de",
        highlight: "#d2d6de",
        label: "Navigator"
      }
    ];
    var pieOptions = {
      //Boolean - Whether we should show a stroke on each segment
      segmentShowStroke: true,
      //String - The colour of each segment stroke
      segmentStrokeColor: "#fff",
      //Number - The width of each segment stroke
      segmentStrokeWidth: 2,
      //Number - The percentage of the chart that we cut out of the middle
      percentageInnerCutout: 50, // This is 0 for Pie charts
      //Number - Amount of animation steps
      animationSteps: 100,
      //String - Animation easing effect
      animationEasing: "easeOutBounce",
      //Boolean - Whether we animate the rotation of the Doughnut
      animateRotate: true,
      //Boolean - Whether we animate scaling the Doughnut from the centre
      animateScale: false,
      //Boolean - whether to make the chart responsive to window resizing
      responsive: true,
      // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio: true,
      //String - A legend template
      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
    };
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    pieChart.Doughnut(PieData, pieOptions);

    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $("#barChart").get(0).getContext("2d");
    var barChart = new Chart(barChartCanvas);
    var barChartData = areaChartData;
    barChartData.datasets[1].fillColor = "#00a65a";
    barChartData.datasets[1].strokeColor = "#00a65a";
    barChartData.datasets[1].pointColor = "#00a65a";
    var barChartOptions = {
      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
      scaleBeginAtZero: true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines: true,
      //String - Colour of the grid lines
      scaleGridLineColor: "rgba(0,0,0,.05)",
      //Number - Width of the grid lines
      scaleGridLineWidth: 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines: true,
      //Boolean - If there is a stroke on each bar
      barShowStroke: true,
      //Number - Pixel width of the bar stroke
      barStrokeWidth: 2,
      //Number - Spacing between each of the X value sets
      barValueSpacing: 5,
      //Number - Spacing between data sets within X values
      barDatasetSpacing: 1,
      //String - A legend template
      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
      //Boolean - whether to make the chart responsive
      responsive: true,
      maintainAspectRatio: true
    };

    barChartOptions.datasetFill = false;
    barChart.Bar(barChartData, barChartOptions);
  });
</script>
	</script>
</body>

</html>
