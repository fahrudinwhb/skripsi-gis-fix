<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/style.css">
    <title>Statistik Kecelakaan</title>
</head>

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
                        <li class="active">
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
                            <li class="active">
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
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
          Statistik
          <small>Data Kecelakaan</small>
        </h1>
                <button onclick="myFunction()" class="fa fa-print"></button>Print Sebagai Laporan
                </section>
                <!-- Main content -->
                <section class="content">
                    <div class="row">
                       <div class="col-md-12">
                            <!-- High CHART -->
                            <div class="box box-success">
                                <div class="box-header with-border">
                                    <h3 class="box-title">5 Jalan Tingkat Kecelakaan Tertinggi Berdasarkan Hasil Analisis EAN</h3>
                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i> </button>
                                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <div id="tinggi" style="height:250px"></div>
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
                        </div>
                        <div class="col-md-12">
                            <!-- High CHART -->
                            <div class="box box-success">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Total Kecelakaan Per-Wilayah</h3>
                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i> </button>
                                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <div id="donut" style="height:250px"></div>
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
                        </div>
                        <div class="col-md-12">
                            <!-- High CHART -->
                            <div class="box box-success">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Total Kecelakaan Per-Tahun</h3>
                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i> </button>
                                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <div id="line" style="height:250px"></div>
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
                        </div>
                        <!-- /.col (LEFT) -->
                        <div class="col-md-12">
                            <!-- High CHART -->
                            <div class="box box-success">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Total Korban Kecelakaan Per-Bulan</h3>
                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i> </button>
                                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <div id="bar" style="height:250px"></div>
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
                        </div>
                        <!-- /.col (RIGHT) -->
                        <!-- data kecelakaan/jalan -->
                        <div class="col-md-12">
                            <!-- High CHART -->
                            <div class="box box-success">
                                <div class="box-header with-border">
                                    <h3 class="box-title">5 Jalan Paling Sering Terjadi Kecelakaan</h3>
                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i> </button>
                                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <div id="jalan" style="height:250px"></div>
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
                        </div>
                    </div>
                    <!-- /.row -->
                </section>
                <!-- /.content -->
            </div>
            <div class="row">
                <!-- ./col -->
            </div>
        </div>
        <!-- 'End Kontent' -->
        <footer class="main-footer">
            <div class="pull-right hidden-xs"> </div> <strong>Copyright &copy; 2017 <a href="http://www.polresbatu.id/">Polres Kota Batu</a>.</strong> <b>Version</b> 1.0.0 </footer>
        <script src="<?php echo base_url() ?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
        <script src="<?php echo base_url() ?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
        <script src="<?php echo base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url() ?>assets/plugins/chartjs/Chart.min.js"></script>
        <script src="<?php echo base_url() ?>assets/plugins/fastclick/fastclick.js"></script>
        <script src="<?php echo base_url() ?>assets/dist/js/app.min.js"></script>
        <script src="<?php echo base_url() ?>assets/dist/js/demo.js"></script>
        <script src="<?php echo base_url() ?>assets/code/highcharts.js"></script>
        <script src="<?php echo base_url() ?>assets/code/highcharts-3d.js"></script>
        <script src="<?php echo base_url() ?>assets/code/modules/exporting.js"></script>
        <script type="text/javascript">
            Highcharts.chart('jalan', {
                chart: {
                    type: 'column'
                }
                , title: {
                    text: ''
                }
                , xAxis: {
                    type: 'category'
                    , labels: {
                        rotation: 0
                        , style: {
                            fontSize: '10px'
                            , fontFamily: 'Verdana, sans-serif'
                            , color: '#242424'
                        }
                    }
                }
                , yAxis: {
                    min: 0
                    , title: {
                        text: 'Total Kecelakaan'
                    }
                }
                , legend: {
                    enabled: false
                }
                , tooltip: {
                    pointFormat: 'Total Kecelakaan: <b>{point.y:f}</b>'
                }
                , series: [{
                    name: 'Population'
                    , data: [
<?php foreach ($hitung_jalan  as $key => $value) {
echo "['".$hitung_jalan[$key]['Name']."',".$hitung_jalan[$key]['TOTAL']."]".",";
 }
?>
        ]
                    , color: '#dd4a25'
                    , dataLabels: {
                        enabled: true
                        , rotation: 0
                        , color: '#1d1f21'
                        , align: 'center'
                        , format: '{point.y:.f} Kecelakaan', // one decimal
                        y: 10, // 10 pixels down from the top
                        style: {
                            fontSize: '13px'
                            , fontFamily: 'Verdana, sans-serif'
                        }
                    }
    }]
            });
        </script>
        <script type="text/javascript">
            // Make monochrome colors
var pieColors = (function () {
    var colors = [],
        base = Highcharts.getOptions().colors[0],
        i;

    for (i = 0; i < 10; i += 1) {
        // Start out with a darkened base color (negative brighten), and end
        // up with a much brighter color
        colors.push(Highcharts.Color(base).brighten((i - 3) / 7).get());
    }
    return colors;
}());

// Build the chart
Highcharts.chart('donut', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie',
        options3d: {
                    enabled: true
                    , alpha: 20
                    , beta: 0
                    }
        },
    title: {
        text: ''
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.y:f}</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            depth: 35,
            colors: pieColors,
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b><br>{point.y:f}={point.percentage:.1f} %',
                distance: 0,
                filter: {
                    property: 'percentage',
                    operator: '>',
                    value: 4
                }
            }
        }
    },
    series: [{
        name: 'Total Kecelakaan Kecelakaan',
        data: [
                                <?php foreach ($grafik_total_k  as $key => $value) {
                                echo "['".$grafik_total_k[$key]['label']."',".$grafik_total_k[$key]['value']."]".",";
                                }
                                ?>
                            ]
    }]
});
        </script>
        <script type="text/javascript">
            Highcharts.chart('bar', {
                chart: {
                    type: 'column'
                }
                , title: {
                    text: ''
                }
                , xAxis: {
                    categories: [
            'Jan'
            , 'Feb'
            , 'Mar'
            , 'Apr'
            , 'May'
            , 'Jun'
            , 'Jul'
            , 'Aug'
            , 'Sep'
            , 'Oct'
            , 'Nov'
            , 'Dec'
        ]
                    , crosshair: true
                }
                , yAxis: {
                    min: 0
                    , title: {
                        text: 'Total Korban'
                    }
                }
                , plotOptions: {
                    column: {
                        pointPadding: 0.1
                        , borderWidth: 0
                    }
                    , series: {
                        borderWidth: 0
                        , dataLabels: {
                            enabled: true
                        }
                    }
                }
                , series: [{
                    name: 'Meninggal'
                    , data: [<?php foreach ($hitung_korban as $hk) {
  							if ($hk['MONTH(WAKTU)'] > 0) {
  								echo $hk['M'].",";
  							}
  						} ?>]
    }, {
                    name: 'Luka Berat'
                    , data: [<?php foreach ($hitung_korban as $hk) {
  							if ($hk['MONTH(WAKTU)'] > 0) {
  								echo $hk['LB'].",";
  							}
  						} ?>]
    }, {
                    name: 'Luka Ringan'
                    , data: [<?php foreach ($hitung_korban as $hk) {
  							if ($hk['MONTH(WAKTU)'] > 0) {
  								echo $hk['LR'].",";
  							}
  						} ?>]
    }]
            });
        </script>
        <script type="text/javascript">
            Highcharts.chart('line', {
                chart: {
                    type: 'line'
                }
                , title: {
                    text: ''
                }
                , xAxis: {
                    categories: ['2013', '2014', '2015', '2016', '2017']
                    , title: {
                        text: 'Tahun'
                    }
                }
                , yAxis: {
                    title: {
                        text: 'Total Kecelakaan'
                    }
                }
                , plotOptions: {
                    line: {
                        dataLabels: {
                            enabled: true
                        }
                        , enableMouseTracking: false
                    }
                }
                , series: [{
                    name: 'Data'
                    , data: [<?php foreach ($hitung_tahun as $ht) {
  							if ($ht['Y'] > 0) {
  								echo $ht['T'].",";
  							}
  						} ?>]
    }]
            });
        </script>
        <script type="text/javascript">
            Highcharts.chart('tinggi', {
                chart: {
                    type: 'column'
                }
                , title: {
                    text: ''
                }
                , xAxis: {
                    type: 'category'
                    , labels: {
                        rotation: 0
                        , style: {
                            fontSize: '15px'
                            , fontWeight: 'bold'
                            , fontFamily: 'Verdana, sans-serif'
                            , color: '#242424'
                        }
                    }
                }
                , yAxis: {
                    min: 0
                    , title: {
                        text: 'Hasil Analisis Kecelakaan'
                    }
                }
                , legend: {
                    enabled: false
                }
                , tooltip: {
                    pointFormat: 'Hasil Analisis Kecelakaan: <b>{point.y:f}</b>'
                }
                , series: [{
                    name: 'Population'
                    , data: [
<?php foreach ($hitung_jalan  as $key => $value) {
echo "['".$analisis[$key]['Name']."',".$analisis[$key]['ANALISIS']."]".",";
 }
?>
        ]
                    , color: '#8b0000'
                    , dataLabels: {
                        enabled: true
                        , rotation: 0
                        , color: '#FFFFFF'
                        , align: 'center'
                        , format: '{point.y:.f} EAN', // one decimal
                        y: 20, // 10 pixels down from the top
                        style: {
                            fontSize: '13px'
                            , fontFamily: 'Verdana, sans-serif'
                            , fontWeight: 'bold'
                        }
                    }
    }]
            });
        </script>
        <script>
            function myFunction() {
                window.print();
            }
        </script>
</body>

</html>