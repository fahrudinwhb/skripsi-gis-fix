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
    <title>Ubah Lokasi Kecelakaan</title>
    <link rel="stylesheet" href="<?php echo base_url()?>assets/peta_kecelakaan/css/leaflet.css" />
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/peta_kecelakaan/css/L.Control.Locate.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/peta_kecelakaan/css/qgis2web.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/peta_kecelakaan/css/MarkerCluster.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>assets/peta_kecelakaan/css/MarkerCluster.Default.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>assets/peta_kecelakaan/css/leaflet-search.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/iCheck/flat/blue.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/style.css">
    <style>
        html,
        body,
        #map {
            width: 100%;
            height: 100%;
            padding: 0;
            margin: 0;
        }
        
        #map {
            height: 450px;
        }
        
        .info-admin {
            background-color: transparent;
        }
    </style>
</head>

<body class="tambah_koordinat hold-transition skin-green sidebar-mini">
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
                                <a href="<?php echo site_url('c_statistik/perbandingan') ?>"> <i class="fa fa-road"></i> <span>Perbandingan Jalan</span> </a>
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
            <div class="content">
                <section class="content-header">
                    <h1>Ubah Lokasi Kecelakaan<small>Kota Batu</small></h1> </section>
                <!-- Main content -->
                <!--maps-->
                <div class="box box-info">
                    <div class="col-cs-12">
                        <div class="box-body">
                            <div id="map"></div>
                            <?php foreach ($titik as $t) { ?>
                                <form action="<?php echo site_url('c_kelola/koordinat_baru/'.$t->KODE_TITIK) ?>" method="post">
                                    <div class="col-xs-12">Latitude dan Longitude:</div>
                                    <div class="col-xs-4">
                                        <div class="input-group"> <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
                                            <input type="text" class="form-control" placeholder="Kode" name="kode_titik" value="<?php echo $t->KODE_TITIK ?>" required readonly> </div>
                                    </div>
                                    <div class="col-xs-4">
                                        <div class="input-group"> <span class="input-group-addon"><i class="fa fa-map-pin"></i></span>
                                            <input type="text" id="latclicked" class="form-control" placeholder="Latitude" name="latitude" value="<?php echo $t->LATITUDE ?>" required readonly> </div>
                                    </div>
                                    <div class="col-xs-4">
                                        <div class="input-group"> <span class="input-group-addon"><i class="fa fa-map-pin"></i></span>
                                            <input type="text" id="longclicked" class="form-control" placeholder="Longitude" name="longitude" value="<?php echo $t->LONGITUDE ?>" required readonly> </div>
                                    </div>
                                    <div class="col-xs-4">
                                        <div class="input-group"> <span class="input-group-addon"><i class="fa fa-map-pin"></i></span>
                                            <input type="text" class="form-control" placeholder="ID Jalan" id="id_jal" name="id_jalan" value="<?php echo $t->ID_JALAN ?>" required readonly> </div>
                                    </div>
                                    <div class="col-xs-4">
                                        <div class="input-group"> <span class="input-group-addon"><i class="fa fa-map-pin"></i></span>
                                            <input type="text" class="form-control" placeholder="Nama Jalan" name="" id="nam_jal" value="" required readonly> </div>
                                    </div>
                                    <div class="col-xs-2">
                                        <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                                    </div>
                                </form>
                                <?php } ?>
                        </div>
                    </div>
                </div>
                <!--   end maps-->
                <!-- </section> -->
                <!-- /.content -->
            </div>
        </div>
        <!-- 'End Kontent' -->
        <footer class="main-footer">
            <div class="pull-right hidden-xs"> </div> <strong>Copyright &copy; 2017 <a href="http://www.polresbatu.id/">Polres Kota Batu</a>.</strong> <b>Version</b> 1.0.0 </footer>
        <!-- new maps -->
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
        <script src="<?php echo base_url() ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
        <script src="<?php echo base_url() ?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
        <script src="<?php echo base_url() ?>assets/plugins/fastclick/fastclick.js"></script>
        <script src="<?php echo base_url() ?>assets/dist/js/app.min.js"></script>
        <script src="<?php echo base_url() ?>assets/dist/js/demo.js"></script>
        <script>
            $.widget.bridge('uibutton', $.ui.button);
        </script>
        <!-- script peta -->
        <script src="<?php echo base_url()?>assets/peta_kecelakaan/js/qgis2web_expressions.js"></script>
        <script src="<?php echo base_url()?>assets/peta_kecelakaan/js/leaflet.js"></script>
        <script src="<?php echo base_url()?>assets/peta_kecelakaan/js/L.Control.Locate.min.js"></script>
        <script src="<?php echo base_url()?>assets/peta_kecelakaan/js/multi-style-layer.js"></script>
        <script src="<?php echo base_url()?>assets/peta_kecelakaan/js/leaflet-heat.js"></script>
        <script src="<?php echo base_url()?>assets/peta_kecelakaan/js/leaflet.rotatedMarker.js"></script>
        <script src="<?php echo base_url()?>assets/peta_kecelakaan/js/OSMBuildings-Leaflet.js"></script>
        <script src="<?php echo base_url()?>assets/peta_kecelakaan/js/leaflet-hash.js"></script>
        <script src="<?php echo base_url()?>assets/peta_kecelakaan/js/leaflet-tilelayer-wmts.js"></script>
        <script src="<?php echo base_url()?>assets/peta_kecelakaan/js/Autolinker.min.js"></script>
        <script src="<?php echo base_url()?>assets/peta_kecelakaan/js/leaflet.markercluster.js"></script>
        <script src="<?php echo base_url()?>assets/peta_kecelakaan/js/leaflet-search.js"></script>
        <!-- <script type="text/javascript">
      var json_wilayahkecamatan0=<?php echo $w; ?>;
    </script> -->
        <script type="text/javascript">
            var json_jalan1 = <?php echo $j; ?>;
            console.log(json_jalan1);
        </script>
        <script type="text/javascript">
            var json_DataKecelakaan3 = <?php echo $p; ?>;
        </script>
        <script>
            L.ImageOverlay.include({
                getBounds: function () {
                    return this._bounds;
                }
            });
            var map = L.map('map', {
                zoomControl: true
                , maxZoom: 28
                , minZoom: 12
            })
            var hash = new L.Hash(map);
            map.attributionControl.addAttribution('<a href="https://github.com/tomchadwin/qgis2web" target="_blank">qgis2web</a>');
            L.control.locate().addTo(map);
            var bounds_group = new L.featureGroup([]);
            var basemap0 = L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors,<a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>'
                , maxZoom: 28
            });
            basemap0.addTo(map);

            function setBounds() {
                if (bounds_group.getLayers().length) {
                    map.fitBounds(bounds_group.getBounds());
                }
            }

            function geoJson2heat(geojson, weight) {
                return geojson.features.map(function (feature) {
                    return [
          feature.geometry.coordinates[1]
          , feature.geometry.coordinates[0]
          , feature.properties[weight]
        ];
                });
            }

            function pop_jalan1(feature, layer, e) {
                // var popupContent = '<table>\
                //       </table>';
                //
                // layer.bindPopup(popupContent);
            }

            function style_jalan1_0(feature) {
          var x = feature.properties['Total_K'];
          if (x >= 0 && x <= 10) {
            return {
                pane: 'pane_jalan1',
                opacity: 1,
                color: 'rgba(0,166,90,2.5)',
                dashArray: '',
                lineCap: 'square',
                lineJoin: 'bevel',
                weight: 3.0,
                fillOpacity: 0,
            }
          }
          else if(x > 10 && x <= 50) {
            return {
                pane: 'pane_jalan1',
                opacity: 1,
                color: 'rgba(255,255,0,2.5)',
                dashArray: '',
                lineCap: 'square',
                lineJoin: 'bevel',
                weight: 5.0,
                fillOpacity: 0,
            }
          }
          else if(x > 51 && x <=100){
            return {
                pane: 'pane_jalan1',
                opacity: 1,
                color: 'rgba(255,165,0,2.5)',
                dashArray: '',
                lineCap: 'square',
                lineJoin: 'bevel',
                weight: 5.0,
                fillOpacity: 0,
            }
          }
          else if(x > 101 && x <= 500){
            return {
                pane: 'pane_jalan1',
                opacity: 1,
                color: 'rgba(255,0,0,2.5)',
                dashArray: '',
                lineCap: 'square',
                lineJoin: 'bevel',
                weight: 5.0,
                fillOpacity: 0,
            }
          }
          else if(x > 500){
            return {
                pane: 'pane_jalan1',
                opacity: 1,
                color: 'rgba(139,0,0,2.5)',
                dashArray: '',
                lineCap: 'square',
                lineJoin: 'bevel',
                weight: 5.0,
                fillOpacity: 0,
            }
          }

        }
            map.createPane('pane_jalan1');
            map.getPane('pane_jalan1').style.zIndex = 401;
            map.getPane('pane_jalan1').style['mix-blend-mode'] = 'normal';
            var layer_jalan1 = new L.geoJson.multiStyle(json_jalan1, {
                attribution: '<a href=""></a>'
                , pane: 'pane_jalan1'
                , onEachFeature: pop_jalan1
                , styles: [style_jalan1_0, ]
            });
            bounds_group.addLayer(layer_jalan1);
            map.addLayer(layer_jalan1);

            function pop_DataKecelakaan3(feature, layer) {
                // var popupContent = '<table>\
                //       </table>';
                // layer.bindPopup(popupContent);
            }

            function style_DataKecelakaan3_0() {
                return {
                    pane: 'pane_DataKecelakaan3'
                    , rotationAngle: 0.0
                    , rotationOrigin: 'center center'
                    , icon: L.icon({
                        iconUrl: '<?php echo base_url()?>assets/peta_kecelakaan/markers/halloween-danger-cartoon-4-by-Vexels.svg'
                        , iconSize: [12.5, 12.5]
                    })
                , }
            }
            map.createPane('pane_DataKecelakaan3');
            map.getPane('pane_DataKecelakaan3').style.zIndex = 403;
            map.getPane('pane_DataKecelakaan3').style['mix-blend-mode'] = 'normal';
            var layer_DataKecelakaan3 = new L.geoJson.multiStyle(json_DataKecelakaan3, {
                attribution: '<a href=""></a>'
                , pane: 'pane_DataKecelakaan3'
                , onEachFeature: pop_DataKecelakaan3
                , pointToLayers: [function (feature, latlng) {
                    var context = {
                        feature: feature
                        , variables: {}
                    };
                    return L.marker(latlng, style_DataKecelakaan3_0(feature))
      }, ]
            });
            bounds_group.addLayer(layer_DataKecelakaan3);
            map.addLayer(layer_DataKecelakaan3);
            var circle = new Array();
            for (var i = 0; i < json_DataKecelakaan3.features.length; i++) {
                var latlng = L.latLng(json_DataKecelakaan3.features[i].geometry.coordinates[1], json_DataKecelakaan3.features[i].geometry.coordinates[0]);
                circle['i'] = L.circle(latlng, 250).addTo(map);
            }
            var baseMaps = {};
            L.control.layers(baseMaps, {
                '<img src="<?php echo base_url()?>assets/peta_kecelakaan/legend/DataKecelakaan3.png" /> Lokasi Kecelakaan': layer_DataKecelakaan3
                , 'Total Kecelakaan Pada Jalan<br /><table><tr><td style="text-align: center;"><img src="<?php echo base_url()?>assets/peta_kecelakaan/legend/jalan1_00.png" /></td><td>0</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url()?>assets/peta_kecelakaan/legend/jalan1_111.png" /></td><td>1-25</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url()?>assets/peta_kecelakaan/legend/jalan1_162.png" /></td><td>25-50</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url()?>assets/peta_kecelakaan/legend/jalan1_183.png" /></td><td>50-75</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url()?>assets/peta_kecelakaan/legend/jalan1_214.png" /></td><td>75-100</td></tr></table>': layer_jalan1
            , }).addTo(map);
            setBounds();
            var searchLayer = L.layerGroup().addTo(map);
            map.addControl(new L.Control.Search({
                layer: layer_jalan1
                , initial: false
                , hideMarkerOnCollapse: true
                , propertyName: 'Name'
            }));
            var marker = L.marker(L.latLng($("#latclicked").val(), $("#longclicked").val())).addTo(map);

            function onMapClick(e) {
                $("#latclicked").val(e.latlng.lat);
                $("#longclicked").val(e.latlng.lng);
                $("#nam_jal").val(e.layer.feature.properties.Name);
                $("#id_jal").val(e.layer.feature.properties.ID);
            }
            // map.on('click', onMapClick);
            layer_jalan1.on('click', function (e) {
                $("#latclicked").val(e.latlng.lat);
                $("#longclicked").val(e.latlng.lng);
                $("#nam_jal").val(e.layer.feature.properties.Name);
                $("#id_jal").val(e.layer.feature.properties.ID);
                //
                map.removeLayer(marker);
                marker = L.marker(e.latlng).addTo(map);
            });
        </script>
</body>

</html>