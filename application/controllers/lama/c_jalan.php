<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_jalan extends CI_Controller {

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
    $this->load->model('m_kelola');
    $jalan = $this->m_kelola->lihat_jalan()->result_array();
    // $this->load->view('coba',$data);
		unlink('assets/gis_laka/data/jalan1.js');
    // $myfile = fopen("assets/gis_laka/data/jalan1.js", "w") or die("Unable to open file!");
    // $file['type'] = "FeatureCollection";
    // $file['crs']['type'] = "name";
    // $file['crs']['properties']['name'] = "urn:ogc:def:crs:OGC:1.3:CRS84";
    // foreach ($jalan as $key => $value) {
    //   $file['features'][$key]['type'] = "Feature";
    //   $file['features'][$key]['properties']['ID'] = $jalan[$key]['ID_JALAN'];
    //   $file['features'][$key]['properties']['Type'] = $jalan[$key]['TypeD'];
    //   $file['features'][$key]['properties']['Category'] = $jalan[$key]['Category'];
    //   $file['features'][$key]['properties']['Name'] = $jalan[$key]['Name'];
    //   $file['features'][$key]['properties']['SHAPE_len'] = $jalan[$key]['SHAPE_len'];
    //   $file['features'][$key]['properties']['Total_K'] = $jalan[$key]['J_TOTAL'];
    //   $file['features'][$key]['geometry']['type'] = $jalan[$key]['TIPE_GEO'];
    //   $file['features'][$key]['geometry']['coordinates'] = json_decode($jalan[$key]['KOORDINAT']);
    // }
    // $data_json = json_encode($file);
    // $file = 'var json_jalan1='.$data_json.'';
    // fwrite($myfile, $file);
    // fclose($myfile);
	}
}
