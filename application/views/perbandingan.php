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
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/style.css"> </head>
<style media="screen">
    .twitter-typeahead {
        width: 100% !important;
    }
    
    .ta-sugest {
        background-color: #00c0ef;
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
                        <li class="active">
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
                            <li class="active">
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
            <div class="content">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>Perbandingan<small>Wilayah Kecamatan</small></h1> </section>
                <!-- Main content -->
                <section class="content">
                    <div class="nama">
                        <div class="box-body">
                            <div class="callout callout-info">
                                <h4>
						Pilih Jalan
					</h4>
                                <!-- form start -->
                                <form class="form-horizontal" action="<?php echo site_url('c_statistik/bandingwilayah') ?>" method="post">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="inputPassword3" class="col-sm-2 control-label">Nama Kecamatan 1</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="typeahead form-control" value="" placeholder="Bumiaji, Batu, Junrejo, Pujon, Ngantang, Kasembon" name="nama_kec1" required> </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPassword3" class="col-sm-2 control-label">Nama Kecamatan 2</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="typeahead form-control" value="" placeholder="Bumiaji, Batu, Junrejo, Pujon, Ngantang, Kasembon" name="nama_kec2" required> </div>
                                        </div>
                                        <button type="submit" class="btn btn-warning pull-right">Bandingkan</button>
                                    </div>
                                </form>
                                <div class="small-box bg-red">
                                    <?php echo @$pesan; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" <?php if (@$hasil1=="" ) { echo 'style="display:none"'; } ?> >
                        <div class="col-md-12">
                            <!-- BAR CHART -->
                            <div class="box box-success">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Hasil Perbandingan 2 Kecamatan</h3>
                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i> </button>
                                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <div class="chart">
                                        <canvas id="banding" style="height:230px"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- KONTEN E NDEK KENE -->
                </section>
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
        <script src="<?php echo base_url() ?>assets/plugins/chartjs/Chart.min.js"></script>
        <script src="<?php echo base_url() ?>assets/dist/js/demo.js"></script>
        <script>
            $.widget.bridge('uibutton', $.ui.button);
        </script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/typeahead.bundle.js"></script>
        <script type="text/javascript">
            var states = <?php echo file_get_contents(site_url('c_otomatis/cari_wilayah')) ?>;
            // constructs the suggestion engine
            var states = new Bloodhound({
                datumTokenizer: Bloodhound.tokenizers.whitespace
                , queryTokenizer: Bloodhound.tokenizers.whitespace
                , // `states` is an array of state names defined in "The Basics"
                local: states
            });
            $('.typeahead').typeahead({
                hint: true
                , highlight: true
                , minLength: 1
                , classNames: {
                    input: 'ta-input'
                    , suggestion: 'ta-sugest'
                    , dataset: 'ta-data'
                }
            }, {
                name: 'states'
                , source: states
            });
            $('.typeahead').bind('typeahead:render', function (ev, suggestion) {
                $('.ta-sugest').css('width', $(".twitter-typeahead").width());
            });
        </script>
        <script>
            $(function () {
                /* ChartJS
                 * -------
                 * Here we will create a few charts using ChartJS
                 */
                //--------------
                //- AREA CHART -
                //--------------
                //-------------
                //- BAR CHART -
                //-------------
                var barChartCanvas = $("#barChart").get(0).getContext("2d");
                var barChart = new Chart(barChartCanvas);
                var barChartData = {
                    labels: ["Total Kecelakaan", "Luka Ringan", "Luka Berat", "Meninggal"]
                    , datasets: [
                        {
                            label: "<?php echo @$hasil1['KECAMATAN'] ?>"
                            , fillColor: "rgba(210, 214, 222, 1)"
                            , strokeColor: "rgba(210, 214, 222, 1)"
                            , pointColor: "rgba(210, 214, 222, 1)"
                            , pointStrokeColor: "#c1c7d1"
                            , pointHighlightFill: "#fff"
                            , pointHighlightStroke: "rgba(220,220,220,1)"
                            , data: [<?php echo @$hasil1['T'].",".@$hasil1['LR'].",".@$hasil1['LB'].",".@$hasil1['M']; ?>]
	        }
                        , {
                            label: "<?php echo @$hasil2['KECAMATAN'] ?>"
                            , fillColor: "rgba(60,141,188,0.9)"
                            , strokeColor: "rgba(60,141,188,0.8)"
                            , pointColor: "#3b8bba"
                            , pointStrokeColor: "rgba(60,141,188,1)"
                            , pointHighlightFill: "#fff"
                            , pointHighlightStroke: "rgba(60,141,188,1)"
                            , data: [<?php echo @$hasil2['T'].",".@$hasil2['LR'].",".@$hasil2['LB'].",".@$hasil2['M']; ?>]
	        }
	      ]
                };
                barChartData.datasets[1].fillColor = "#00a65a";
                barChartData.datasets[1].strokeColor = "#00a65a";
                barChartData.datasets[1].pointColor = "#00a65a";
                var barChartOptions = {
                    //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
                    scaleBeginAtZero: true
                    , //Boolean - Whether grid lines are shown across the chart
                    scaleShowGridLines: true
                    , //String - Colour of the grid lines
                    scaleGridLineColor: "rgba(0,0,0,.05)"
                    , //Number - Width of the grid lines
                    scaleGridLineWidth: 1
                    , //Boolean - Whether to show horizontal lines (except X axis)
                    scaleShowHorizontalLines: true
                    , //Boolean - Whether to show vertical lines (except Y axis)
                    scaleShowVerticalLines: true
                    , //Boolean - If there is a stroke on each bar
                    barShowStroke: true
                    , //Number - Pixel width of the bar stroke
                    barStrokeWidth: 2
                    , //Number - Spacing between each of the X value sets
                    barValueSpacing: 5
                    , //Number - Spacing between data sets within X values
                    barDatasetSpacing: 1
                    , //String - A legend template
                    legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>"
                    , //Boolean - whether to make the chart responsive
                    responsive: true
                    , maintainAspectRatio: true
                };
                barChartOptions.datasetFill = false;
                barChart.Bar(barChartData, barChartOptions);
            });
        </script>
        <script type="text/javascript">
var ctx = document.getElementById("banding");
var banding = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["Total Kecelakaan", "Meninggal", "Luka Berat", "Luka Ringan"],
        datasets: [{
            label: "<?php echo @$hasil1['KECAMATAN'] ?>",
            data: [<?php echo @$hasil1['T'].",".@$hasil1['M'].",".@$hasil1['LB'].",".@$hasil1['LR']; ?>],
            backgroundColor: [
                'rgba(54, 162, 235, 1.2)',
                'rgba(54, 162, 235, 1.2)',
                'rgba(54, 162, 235, 1.2)',
                'rgba(54, 162, 235, 1.2)'
            ],
            borderColor: [
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)'
            ],
            borderWidth: 1
        },
                {
            label: "<?php echo @$hasil2['KECAMATAN'] ?>",
            data: [<?php echo @$hasil2['T'].",".@$hasil2['M'].",".@$hasil2['LB'].",".@$hasil2['LR']; ?>],
            backgroundColor: [
                'rgba(255, 206, 86, 1.2)',
                'rgba(255, 206, 86, 1.2)',
                'rgba(255, 206, 86, 1.2)',
                'rgba(255, 206, 86, 1.2)'
            ],
            borderColor: [
                'rgba(255, 206, 86, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(255, 206, 86, 1)'
            ],
            borderWidth: 1
        }
                  ]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
        </script>
</body>

</html>