<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_maps extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}
  $file['type'] = "FeatureCollection";
  $file['crs']['type'] = "name";
  $file['crs']['properties']['name'] = "urn:ogc:def:crs:OGC:1.3:CRS84";
  foreach ($rekap_titik as $key => $value) {
    $file['features'][$key]['type'] = "Feature";
    $idk = $rekap_titik[$key]['ID_KECELAKAAN'];
    $file['features'][$key]['properties']['ID_Kecelakaan'] = (double)number_format($idk, 1);
    $file['features'][$key]['properties']['Kode_Titik'] = (float)$rekap_titik[$key]['KODE_TITIK'];
    $file['features'][$key]['properties']['ID_Jalan'] = (float)$rekap_titik[$key]['ID_JALAN'];
    $file['features'][$key]['properties']['ID_Wilayah'] = (float)$rekap_titik[$key]['ID_WILAYAH'];
    $l = json_decode($rekap_titik[$key]['KOORDINAT']);
    $ln = $l[0];
    $lt = $l[1];
    $file['features'][$key]['properties']['Longitude'] = $ln;
    $file['features'][$key]['properties']['Latitude'] = $lt;
    $file['features'][$key]['properties']['Nama_Jalan'] = $rekap_titik[$key]['NAMA_JALAN'];
    $file['features'][$key]['properties']['Kecamatan'] = $rekap_titik[$key]['K_KECAMATAN'];
    $file['features'][$key]['properties']['Meninggal'] = (float)$rekap_titik[$key]['M'];
    $file['features'][$key]['properties']['Luka_Berat'] = (float)$rekap_titik[$key]['LB'];
    $file['features'][$key]['properties']['Luka_Ringan'] = (float)$rekap_titik[$key]['LR'];
    $file['features'][$key]['properties']['Total Kecelakaan'] = (float)$rekap_titik[$key]['T'];
    $file['features'][$key]['properties']['Waktu'] = (float)$rekap_titik[$key]['WAKTU'];
    $file['features'][$key]['geometry']['type'] = $rekap_titik[$key]['TIPE_GEO'];
    $file['features'][$key]['geometry']['coordinates'] = json_decode($rekap_titik[$key]['KOORDINAT']);
  }
  print_r($file);
  // $data_json = json_encode($file);
}
