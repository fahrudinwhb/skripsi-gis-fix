<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_jalan extends CI_Controller {

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
   public function cari(){
 		$this->load->model('m_kelola');
 		$jalan = $this->m_kelola->lihat_jalan()->result_array();
 		$baru = array();
 		foreach ($jalan as $key => $value) {
 			$baru[$key]=$jalan[$key]['Name'];
 		}
 		echo json_encode($baru);
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
 	}
  public function cari_jalan(){
   $this->load->model('m_statistik');
   $jalan = $this->m_statistik->cari_jalan()->result_array();
   $baru = array();
   foreach ($jalan as $key => $value) {
     $baru[$key]=$jalan[$key]['Name'];
   }
   echo json_encode($baru);
 }

 public function cari_wilayah(){
  $this->load->model('m_wilayah');
  $wilayah = $this->m_wilayah->get_lihat_wilayah()->result_array();
  $baru = array();
  foreach ($wilayah as $key => $value) {
    $baru[$key]=$wilayah[$key]['KECAMATAN'];
  }
  echo json_encode($baru);
  // print_r($baru);
}
}
