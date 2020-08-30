<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Show_peta extends CI_Controller {

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
 	$this->load->model('m_datakecelakaan');
 			$this->load->model('m_jalan');
 			$this->load->model('m_titik');
 			$this->load->model('m_wilayah');
}
public function index()
{
	$this->load->library('session');
	if ($this->session->userdata('nama')=='Theo') {
		$data['apapun'] = '<td><a href=\"'.site_url('c_kelola/ubah_data/').'\' + (feature.properties[\'ID_KECELAKAAN\'] !== null ? Autolinker.link(String(feature.properties[\'ID_KECELAKAAN\'])) : \'\')+\'\"><button type=\"button\" name=\"button\">Ubah Data Kecelakaan</button></a></td>\\';
	}
	else {
		$data['apapun'] = "";
	}
	$data['p'] = $this->tampil_peta();
	$data['w'] = $this->tampil_wilayah();
	$data['j'] = $this->tampil_jalan();
    $data['a'] = $this->analisis_jalan();
 	$this->load->view('index',$data);
}

public function tampil_peta()
{
 $rekap_titik = $this->m_datakecelakaan->get_rekap_titik()->result_array();
 $file['type'] = "FeatureCollection";
 $file['crs']['type'] = "name";
 $file['crs']['properties']['name'] = "urn:ogc:def:crs:OGC:1.3:CRS84";
 	foreach ($rekap_titik as $key => $value) {
		$file['features'][$key]['type'] = "Feature";
		$idk = $rekap_titik[$key]['ID_KECELAKAAN'];
		$file['features'][$key]['properties']['ID_KECELAKAAN'] = (double)number_format($idk, 1);
		$file['features'][$key]['properties']['KODE_TITIK'] = $rekap_titik[$key]['KODE_TITIK'];
		$file['features'][$key]['properties']['ID_JALAN'] = (float)$rekap_titik[$key]['ID_JALAN'];
		$file['features'][$key]['properties']['ID_WILAYAH'] = (float)$rekap_titik[$key]['ID_WILAYAH'];
		$l = json_decode($rekap_titik[$key]['KOORDINAT']);
		$ln = $l[0];
		$lt = $l[1];
		$file['features'][$key]['properties']['Longitude'] = $ln;
		$file['features'][$key]['properties']['Latitude'] = $lt;
		$file['features'][$key]['properties']['Nama_Jalan'] = $rekap_titik[$key]['Name'];
		$file['features'][$key]['properties']['Kecamatan'] = $rekap_titik[$key]['KECAMATAN'];
		$file['features'][$key]['properties']['Meninggal'] = (float)$rekap_titik[$key]['M'];
		$file['features'][$key]['properties']['Luka_Berat'] = (float)$rekap_titik[$key]['LB'];
		$file['features'][$key]['properties']['Luka_Ringan'] = (float)$rekap_titik[$key]['LR'];
		$file['features'][$key]['properties']['Total Kecelakaan'] = (float)$rekap_titik[$key]['T'];
		$file['features'][$key]['properties']['Waktu'] = (float)$rekap_titik[$key]['WAKTU'];
		$file['features'][$key]['geometry']['type'] = $rekap_titik[$key]['TIPE_GEO'];
		$file['features'][$key]['geometry']['coordinates'] = json_decode($rekap_titik[$key]['KOORDINAT']);
		}
	$data_json = json_encode($file);
	return $data_json;
}

public function tampil_wilayah()
{
	$wilayah = $this->m_wilayah->get_lihat_wilayah()->result_array();
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
	return $data_json;
}

public function tampil_jalan()
{
	$jalan = $this->m_jalan->get_jalan_analisis()->result_array();
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
            $file['features'][$key]['properties']['Total_K'] = $jalan[$key]['TOTAL_JALAN'];
            $file['features'][$key]['properties']['Total_M'] = $jalan[$key]['M'];
            $file['features'][$key]['properties']['Total_LB'] = $jalan[$key]['LB'];
            $file['features'][$key]['properties']['Total_LR'] = $jalan[$key]['LR'];
            $file['features'][$key]['properties']['Analisis'] = $jalan[$key]['ANALISIS'];
            $file['features'][$key]['geometry']['type'] = $jalan[$key]['TIPE_GEO'];
            $file['features'][$key]['geometry']['coordinates'] = json_decode($jalan[$key]['KOORDINAT']);
		}
 $data_json = json_encode($file);
	return $data_json;
       //      echo "<pre>";
			 // print_r($file);
			 // echo "</pre>";
}

    public function analisis_jalan()
{
	$jalan = $this->m_jalan->get_jalan_analisis()->result_array();
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
            $file['features'][$key]['properties']['Total_K'] = $jalan[$key]['TOTAL_JALAN'];
            $file['features'][$key]['properties']['Total_M'] = $jalan[$key]['M'];
            $file['features'][$key]['properties']['Total_LB'] = $jalan[$key]['LB'];
            $file['features'][$key]['properties']['Total_LR'] = $jalan[$key]['LR'];
            $file['features'][$key]['properties']['Analisa'] = $jalan[$key]['ANALISIS'];
            $file['features'][$key]['geometry']['type'] = $jalan[$key]['TIPE_GEO'];
            $file['features'][$key]['geometry']['coordinates'] = json_decode($jalan[$key]['KOORDINAT']);
		}
  $data_json = json_encode($file);
	return $data_json;
//            echo "<pre>";
//			 print_r($file);
//			 echo "</pre>";
}


}
