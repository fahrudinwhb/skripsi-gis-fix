<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_peta extends CI_Controller {

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
   public function __construct()
 	{
    parent::__construct();
 		$this->load->model('m_kelola');
    $this->load->helper('url');
 	}
   public function hilang_jalan()
 	{
 		unlink('assets/peta_kecelakaan/data/jalan1.js');
 	}
  function tampil_jalan(){
    $jalan = $this->m_kelola->lihat_jalan()->result_array();
    $myfile = fopen("assets/peta_kecelakaan/data/jalan1.js", "w") or die("Unable to open file!");
    $file['type'] = "FeatureCollection";
    $file['crs']['type'] = "name";
    $file['crs']['properties']['name'] = "urn:ogc:def:crs:OGC:1.3:CRS84";
    foreach ($jalan as $key => $value) {
      $file['features'][$key]['type'] = "Feature";
      $file['features'][$key]['properties']['ID'] = $jalan[$key]['ID_JALAN'];
      $file['features'][$key]['properties']['Type'] = $jalan[$key]['TypeD'];
      $file['features'][$key]['properties']['Category'] = $jalan[$key]['Category'];
      $file['features'][$key]['properties']['Name'] = $jalan[$key]['Name'];
      $file['features'][$key]['properties']['SHAPE_len'] = $jalan[$key]['SHAPE_len'];
      $file['features'][$key]['properties']['Total_K'] = $jalan[$key]['J_TOTAL'];
      $file['features'][$key]['geometry']['type'] = $jalan[$key]['TIPE_GEO'];
      $file['features'][$key]['geometry']['coordinates'] = json_decode($jalan[$key]['KOORDINAT']);
    }
    $data_json = json_encode($file);
    $file = 'var json_jalan1='.$data_json.'';
    fwrite($myfile, $file);
    fclose($myfile);
  }
	// titik
	function hilang_titik(){
		unlink('assets/peta_kecelakaan/data/DataKecelakaan3.js');
		redirect(site_url("c_kelola/lihat_data"));
	}
	function tampil_titik(){
		$data_kecelakaan = $this->m_kelola->lihat_data()->result_array();
    $myfile = fopen("assets/peta_kecelakaan/data/DataKecelakaan3.js", "w") or die("Unable to open file!");
    $file['type'] = "FeatureCollection";
    $file['crs']['type'] = "name";
    $file['crs']['properties']['name'] = "urn:ogc:def:crs:OGC:1.3:CRS84";
    foreach ($data_kecelakaan as $key => $value) {
      $file['features'][$key]['type'] = "Feature";
			$idk = $data_kecelakaan[$key]['ID_KECELAKAAN'];
      $file['features'][$key]['properties']['ID_Kecelakaan'] = (double)number_format($idk, 1);
      $file['features'][$key]['properties']['Kode_Titik'] = (float)$data_kecelakaan[$key]['KODE_TITIK'];
      $file['features'][$key]['properties']['ID_Jalan'] = (float)$data_kecelakaan[$key]['ID_JALAN'];
      $file['features'][$key]['properties']['ID_Wilayah'] = (float)$data_kecelakaan[$key]['ID_WILAYAH'];
			$l = json_decode($data_kecelakaan[$key]['KOORDINAT']);
			$ln = $l[0];
			$lt = $l[1];
			$file['features'][$key]['properties']['Longitude'] = $ln;
      $file['features'][$key]['properties']['Latitude'] = $lt;
			$file['features'][$key]['properties']['Nama_Jalan'] = $data_kecelakaan[$key]['NAMA_JALAN'];
			$file['features'][$key]['properties']['Kecamatan'] = $data_kecelakaan[$key]['K_KECAMATAN'];
			$file['features'][$key]['properties']['Meninggal'] = (float)$data_kecelakaan[$key]['T_MENINGGAL'];
			$file['features'][$key]['properties']['Luka_Berat'] = (float)$data_kecelakaan[$key]['T_LUKA_BERAT'];
			$file['features'][$key]['properties']['Luka_Ringan'] = (float)$data_kecelakaan[$key]['T_LUKA_RINGAN'];
			$file['features'][$key]['properties']['Total Kecelakaan'] = (float)$data_kecelakaan[$key]['TOTAL_K'];
			$file['features'][$key]['properties']['Waktu'] = (float)$data_kecelakaan[$key]['WAKTU'];
      $file['features'][$key]['geometry']['type'] = $data_kecelakaan[$key]['TIPE_GEO'];
      $file['features'][$key]['geometry']['coordinates'] = json_decode($data_kecelakaan[$key]['KOORDINAT']);
    }
    $data_json = json_encode($file);
    $file = 'var json_DataKecelakaan3='.$data_json.'';
    fwrite($myfile, $file);
    fclose($myfile);
		redirect(site_url("c_kelola/lihat_data"));
	}
	// wilayah
	function hilang_wilayah(){
		unlink('assets/peta_kecelakaan/data/wilayahkecamatan0.js');
	}

	function tampil_wilayah(){
		$wilayah = $this->m_kelola->lihat_wilayah()->result_array();
    $myfile = fopen("assets/peta_kecelakaan/data/wilayahkecamatan0.js", "w") or die("Unable to open file!");
    $file['type'] = "FeatureCollection";
    $file['crs']['type'] = "name";
    $file['crs']['properties']['name'] = "urn:ogc:def:crs:OGC:1.3:CRS84";
    foreach ($wilayah as $key => $value) {
      $file['features'][$key]['type'] = "Feature";
      $file['features'][$key]['properties']['ID'] = $wilayah[$key]['ID_WILAYAH'];
      $file['features'][$key]['properties']['Kecamatan'] = $wilayah[$key]['KECAMATAN'];
      $file['features'][$key]['properties']['xcoord'] = (double)$wilayah[$key]['XCOORD'];
      $file['features'][$key]['properties']['ycoord'] = (double)$wilayah[$key]['YCOORD'];
      $file['features'][$key]['geometry']['type'] = $wilayah[$key]['TIPE_GEO'];
      $file['features'][$key]['geometry']['coordinates'] = "[".$wilayah[$key]['KOORDINAT']."]";
			$file['features'][$key]['geometry']['coordinates'] = json_decode($file['features'][$key]['geometry']['coordinates']);
    }
    $data_json = json_encode($file);
    $file = 'var json_wilayahkecamatan0='.$data_json.'';
    fwrite($myfile, $file);
    fclose($myfile);
	}
// buffer
	function hilang_buffer(){
		unlink('assets/peta_kecelakaan/data/BufferKecelakaan2.js');
	}
	function tampil_buffer(){

	}
}
