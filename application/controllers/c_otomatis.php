<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_otomatis extends CI_Controller {

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
	public function ajax_kode(){
       $kode_titik=$this->input->post('kode_titik');
       $this->load->model('m_titik');
       echo $this->m_titik->get_cekkode($kode_titik);
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
