<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tes extends CI_Controller {

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
	//  public function __construct()
 // 	{
  //    parent::__construct();
 // 		$this->load->model('m_statistik');
  //    $this->load->helper('url');
 // 	}
	// public function index()
	// {
	// 	// $this->load->view('coba');
	// 	$this->load->view('polosan');
	// }
	// public function cari(){
	// 	$this->load->model('m_kelola');
	// 	$jalan = $this->m_kelola->lihat_jalan()->result_array();
	// 	$baru = array();
	// 	foreach ($jalan as $key => $value) {
	// 		$baru[$key]=$jalan[$key]['Name'];
	// 	}
		// echo json_encode($baru);
		// $tes[0] = "jakarta";
		// $tes[1] = "bogor";
		// $tes[2] = "malang";
		// $tes[3] = "mali";
		// $tes[4] = "medho";
		// $tes[5] = "medan";
		// $tes[6] = "denpasar";
		// $tes[7] = "batu";
		// $tes[8] = "mmmmm";
		// echo json_encode($tes);
	// }
	// public function hitung(){
	// 	$total_k = $this->m_statistik->hitung_kecelakaan()->result_array();
	// 	$this->load->view('coba',$total_k);
	//
	// }
	function coba($id_jalan){
		$this->load->model('m_statistik');
		$data = $this->m_statistik->detail_jalan($id_jalan)->result_array();
		foreach ($data as $key => $value) {
			$monthNum  = $data[$key]['MONTH(WAKTU)'];
			$dateObj   = DateTime::createFromFormat('!m', $monthNum);
			$monthName = $dateObj->format('F');
			echo $monthName;
		}		// echo "<pre>";
		// echo json_encode($coba);
		// echo "</pre>";
		// print_r($coba);
	}
}
