<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_akses extends CI_Controller {

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
function __construct(){
		parent::__construct();
		$this->load->model('m_login');
  }
  function index(){
    $this->load->view('login');
  }
  function login(){
    $username = $this->input->post('username');
    $kata_sandi = $this->input->post('kata_sandi');
    $where = array(
      'username' => $username,
      'kata_sandi' => $kata_sandi
    );
    $cek = $this->m_login->cek_login("admin",$where);
      print_r($cek);
    if(count($cek) > 0){

			$data_session = array(
				'nama' => $cek[0]['NAMA'],
				'username' => $cek[0]['USERNAME'],
				'status' => "Online",
                'foto' => $cek[0]['FOTO']
				);

			$this->session->set_userdata($data_session);
			redirect(site_url("utama"));

		}else{
			$this->session->set_flashdata('login', 'gagal');
			redirect(site_url("c_akses"));
		}
  }
  function logout(){
    $this->session->sess_destroy();
    redirect(site_url("utama"));
  }
}
?>
