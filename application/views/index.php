<!doctype html>
<html lang="en">
    <head>
      <title>Peta Kecelakaan</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="initial-scale=1,width=device-width">
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-capable" content="yes">
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
        html, body, #map {
            width: 100%;
            height: 100%;
            padding: 0;
            margin: 0;
        }
        #map{
          height: 535px;
        }
        .info-admin{
          background-color: transparent;
        }
        </style>
        <title></title>
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
    			<li class="active">
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
    				<li class="active">
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
            <h1>Peta Kecelakaan<small>Kota Batu</small></h1>
<!--            <button onclick="myFunction()">Print Peta</button>-->
          </section>
          <!-- Main content -->
          <section class="content">
            <div id="map"></div>
          </section>
          <!-- /.content -->
        </div>
      </div>
      <!-- 'End Kontent' -->
      <footer class="main-footer">
    		<div class="pull-right hidden-xs"> </div> <strong>Copyright &copy; 2017 <a href="http://www.polresbatu.id/">Polres Kota Batu</a>.</strong> <b>Version</b> 1.0.0
      </footer>
        <!-- script ui -->
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
        <!-- <script src="<?php echo base_url()?>assets/peta_kecelakaan/data/wilayahkecamatan0.js"></script> -->
        <script type="text/javascript">
          var json_wilayahkecamatan0=<?php echo $w; ?>;
        </script>
        <script type="text/javascript">
          var json_jalan1=<?php echo $j; ?>;
//          console.log(json_jalan1);
        </script>
        <script type="text/javascript">
          var json_DataKecelakaan3=<?php echo $p; ?>;
        </script>
        <script type="text/javascript">
          var json_jalananalisis0=<?php echo $a; ?>;
        </script>
        <!-- <script src="<?php echo base_url()?>assets/peta_kecelakaan/data/jalan1.js"></script> -->

        <!-- <script src="<?php echo base_url()?>assets/peta_kecelakaan/data/BufferKecelakaan2.js"></script> -->
        <!-- <script src="<?php echo base_url()?>assets/peta_kecelakaan/data/DataKecelakaan3.js"></script> -->
        <script>
        L.ImageOverlay.include({
            getBounds: function () {
                return this._bounds;
            }
        });
        var map = L.map('map', {
            zoomControl:true, maxZoom:28, minZoom:12
        })
        var hash = new L.Hash(map);
        map.attributionControl.addAttribution('<a href="https://github.com/tomchadwin/qgis2web" target="_blank">qgis2web</a>');
        L.control.locate().addTo(map);
        var bounds_group = new L.featureGroup([]);
        var basemap0 = L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors,<a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>',
            maxZoom: 28
        });
        basemap0.addTo(map);
        function setBounds() {
            if (bounds_group.getLayers().length) {
                map.fitBounds(bounds_group.getBounds());
            }
        }
        function geoJson2heat(geojson, weight) {
          return geojson.features.map(function(feature) {
            return [
              feature.geometry.coordinates[1],
              feature.geometry.coordinates[0],
              feature.properties[weight]
            ];
          });
        }
        function pop_wilayahkecamatan0(feature, layer) {
            var popupContent = '<table>\
                    <tr>\
                        <th scope="row">Kecamatan</th>\
                        <td>' + (feature.properties['Kecamatan'] !== null ? Autolinker.link(String(feature.properties['Kecamatan'])) : '') + '</td>\
                    </tr>\
                </table>';
            layer.bindPopup(popupContent);
        }

        function style_wilayahkecamatan0_0() {
            return {
                pane: 'pane_wilayahkecamatan0',
                opacity: 1,
                color: 'rgba(0,0,0,0.5)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0,
                fillOpacity: 1,
                fillColor: 'rgba(255,255,255,0.5)',
            }
        }
        map.createPane('pane_wilayahkecamatan0');
        map.getPane('pane_wilayahkecamatan0').style.zIndex = 400;
        map.getPane('pane_wilayahkecamatan0').style['mix-blend-mode'] = 'normal';
    var layer_wilayahkecamatan0 = new L.geoJson.multiStyle(json_wilayahkecamatan0, {
        attribution: '<a href=""></a>',
        pane: 'pane_wilayahkecamatan0',
        onEachFeature: pop_wilayahkecamatan0,
        styles: [style_wilayahkecamatan0_0,]
    });
        bounds_group.addLayer(layer_wilayahkecamatan0);
        map.addLayer(layer_wilayahkecamatan0);

//        kjfsldk

            function pop_jalananalisis0(feature, layer) {
            var popupContent = '<table>\
                    <tr>\
                        <th scope="row">Jalan</th>\
                        <td>' + (feature.properties['Name'] !== null ? Autolinker.link(String(feature.properties['Name'])) : '') + '</td>\
                    </tr>\
                </table>';
            layer.bindPopup(popupContent);
        }

        function style_jalananalisis0_0() {
            return {
                pane: 'pane_jalananalisis0',
                opacity: 1,
                color: 'rgba(0,0,0,0.5)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0,
                fillOpacity: 1,
                fillColor: 'rgba(255,255,255,0.5)',
            }
        }
        map.createPane('pane_jalananalisis0');
        map.getPane('pane_jalananalisis0').style.zIndex = 400;
        map.getPane('pane_jalananalisis0').style['mix-blend-mode'] = 'normal';
    var layer_jalananalisis0 = new L.geoJson.multiStyle(json_jalananalisis0, {
        attribution: '<a href=""></a>',
        pane: 'pane_wilayahkecamatan0',
        onEachFeature: pop_jalananalisis0,
        styles: [style_jalananalisis0_0,]
    });
        bounds_group.addLayer(layer_jalananalisis0);
        map.addLayer(layer_jalananalisis0);

//            adnaksdlak



        function pop_jalan1(feature, layer) {
            var popupContent = '<table>\
                    <tr>\
                        <th scope="row">Kategori Jalan</th>\
                        <td>' + (feature.properties['Category'] !== null ? Autolinker.link(String(feature.properties['Category'])) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">Nama Jalan</th>\
                        <td>' + (feature.properties['Name'] !== null ? Autolinker.link(String(feature.properties['Name'])) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">Total Kecelakaan</th>\
                        <td>' + (feature.properties['Total_K'] !== null ? Autolinker.link(String(feature.properties['Total_K'])) : '') + '</td>\
                    </tr>\
                    <tr>\
                      <td><a href="<?php echo site_url('c_statistik/ambil_detail_jalan/')?>' + (feature.properties['ID'] !== null ? Autolinker.link(String(feature.properties['ID'])) : '')+'"><button type="button" name="button">Detail Jalan</button></a></td>\
                    </tr>\
                </table>';
            layer.bindPopup(popupContent);
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
        attribution: '<a href=""></a>',
        pane: 'pane_jalan1',
        onEachFeature: pop_jalan1,
        styles: [style_jalan1_0,]
    });
        bounds_group.addLayer(layer_jalan1);
        map.addLayer(layer_jalan1);


        function pop_DataKecelakaan3(feature, layer) {
            var popupContent = '<table>\
                    <tr>\
                        <th scope="row">ID</th>\
                        <td>' + (feature.properties['KODE_TITIK'] !== null ? Autolinker.link(String(feature.properties['KODE_TITIK'])) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">Nama Jalan</th>\
                        <td>' + (feature.properties['Nama_Jalan'] !== null ? Autolinker.link(String(feature.properties['Nama_Jalan'])) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">Kecamatan</th>\
                        <td>' + (feature.properties['Kecamatan'] !== null ? Autolinker.link(String(feature.properties['Kecamatan'])) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">Total kecelakaan</th>\
                        <td>' + (feature.properties['Total Kecelakaan'] !== null ? Autolinker.link(String(feature.properties['Total Kecelakaan'])) : '') + '</td>\
                    </tr>\
                    <tr>\
                      <td><a href="<?php echo site_url('c_statistik/ambil_detail_titik/')?>' + (feature.properties['KODE_TITIK'] !== null ? Autolinker.link(String(feature.properties['KODE_TITIK'])) : '')+'"><button type="button" name="button">Detail Kecelakaan</button></a></td>\
                    <?php echo $apapun; ?>
                    </tr>\
                </table>';
            layer.bindPopup(popupContent);
        }

        function style_DataKecelakaan3_0() {
            return {
                pane: 'pane_DataKecelakaan3',
        rotationAngle: 0.0,
        rotationOrigin: 'center center',
        icon: L.icon({
            iconUrl: '<?php echo base_url()?>assets/peta_kecelakaan/markers/halloween-danger-cartoon-4-by-Vexels.svg',
            iconSize: [12.5, 12.5]
        }),
            }
        }
        map.createPane('pane_DataKecelakaan3');
        map.getPane('pane_DataKecelakaan3').style.zIndex = 403;
        map.getPane('pane_DataKecelakaan3').style['mix-blend-mode'] = 'normal';
        var layer_DataKecelakaan3 = new L.geoJson.multiStyle(json_DataKecelakaan3, {
            attribution: '<a href=""></a>',
            pane: 'pane_DataKecelakaan3',
            onEachFeature: pop_DataKecelakaan3,
            pointToLayers: [function (feature, latlng) {
                var context = {
                    feature: feature,
                    variables: {}
                };
                return L.marker(latlng, style_DataKecelakaan3_0(feature))
            },
        ]});
        bounds_group.addLayer(layer_DataKecelakaan3);
        map.addLayer(layer_DataKecelakaan3);
        var circle = new Array();
        for (var i = 0; i < json_DataKecelakaan3.features.length; i++) {
          var  latlng = L.latLng(json_DataKecelakaan3.features[i].geometry.coordinates[1],json_DataKecelakaan3.features[i].geometry.coordinates[0]);
          circle['i'] = L.circle(latlng, 250).addTo(map);
        }

        var baseMaps = {};
        L.control.layers(baseMaps,{'<img src="<?php echo base_url()?>assets/peta_kecelakaan/legend/DataKecelakaan3.png" /> Layer Lokasi': layer_DataKecelakaan3,'Layer Jalan<br /><table><tr><td style="text-align: center;"><img src="<?php echo base_url()?>assets/peta_kecelakaan/legend/jalan1_00.png" /></td><td></td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url()?>assets/peta_kecelakaan/legend/jalan1_111.png" /></td><td></td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url()?>assets/peta_kecelakaan/legend/jalan1_162.png" /></td><td></td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url()?>assets/peta_kecelakaan/legend/jalan1_183.png" /></td><td></td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url()?>assets/peta_kecelakaan/legend/jalan1_214.png" /></td><td></td></tr></table>': layer_jalan1,'<img src="<?php echo base_url()?>assets/peta_kecelakaan/legend/wilayahkecamatan0.png" /> Layer Kecamatan': layer_wilayahkecamatan0,}).addTo(map);
        setBounds();

        var searchLayer = L.layerGroup().addTo(map);
        map.addControl( new L.Control.Search({
          layer: layer_jalan1,
          initial: false,
          hideMarkerOnCollapse: true,
          propertyName: 'Name'}) );
          // legend
                  var mataangin = new L.Control({position: 'topright'});
                    mataangin.onAdd = function (map) {
                      this._div = L.DomUtil.create('div','info');
                      this.update();
                      return this._div;
                    };
                  mataangin.update = function(){
                    this._div.innerHTML = '<img src="<?php echo base_url('assets/legend/mataangin.png') ?>" width = "75px" height = "75px">'
                  };
                  mataangin.addTo(map);

                  var legend = new L.Control({position: 'topright'});
                    legend.onAdd = function (map) {
                      this._div = L.DomUtil.create('div','info');
                      this.update();
                      return this._div;
                    };
                  legend.update = function(){
                    this._div.innerHTML = '<img src="<?php echo base_url('assets/legend/legend.jpg') ?>" width = "150px" height = "200px">'
                  };
                  legend.addTo(map);

                  var minimap = new L.Control({position: 'bottomleft'});
                    minimap.onAdd = function (map) {
                      this._div = L.DomUtil.create('div','info');
                      this.update();
                      return this._div;
                    };
                  minimap.update = function(){
                    this._div.innerHTML = '<img src="<?php echo base_url('assets/legend/minimap.jpg') ?>" width = "250px" height = "100px">'
                  };
                  minimap.addTo(map);
            // end legend
            L.control.scale('metric').addTo(map);
        </script>
        <script>
      		function myFunction() {
      			window.print();
      		}
      	</script>
    </body>
</html>
