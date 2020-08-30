<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_kelola extends CI_Controller {

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
    $this->load->helper('url');
		if ($_SESSION['username']==null) {
			redirect(site_url('c_akses'));
		}
	}
// data kecelakaan
    function lihat_data()
    {
      $data['data_kecelakaan'] = $this->m_datakecelakaan->get_lihat_data()->result();
      $this->load->view('kelola_data_kecelakaan',$data);
    }
		function input_data()
		{
    	$data['wilayah'] = $this->m_wilayah->get_lihat_wilayah()->result_array();
			$data['titik'] = $this->m_titik->get_lihat_koordinat()->result_array();
			$this->load->view('tambah_data',$data);
		}
		function tambah_data()
		{
			$kode_titik = $this->input->post('kode_titik');
			$titik = $this->m_titik->get_ambil_koordinat($kode_titik);
			$id_jalan = $this->input->post('id_jalan');
			$nama_jalan = $this->input->post('nama_jalan');
			$kecamatan = $this->input->post('kecamatan');
			$id_wilayah = $this->m_wilayah->get_ambil_wilayah($kecamatan);
			$wilayah_id = $id_wilayah[0]['id_wilayah'];
			$m = $this->input->post('meninggal');
			$lb = $this->input->post('luka_berat');
			$lr = $this->input->post('luka_ringan');
			$t = $this->input->post('total');
			$w = $this->input->post('waktu');
			$tg = 'Point';
			$k = '['.$titik[0]['longitude'].','.$titik[0]['latitude'].']';
			$data = array(
					'kode_titik' => $kode_titik,
					'id_jalan' => $id_jalan,
					'id_wilayah' => $wilayah_id,
					't_meninggal' => $m,
					't_luka_berat' => $lb,
					't_luka_ringan' => $lr,
					'total_k' => $t,
					'waktu' => $w,
					'tipe_geo' => $tg,
					'koordinat' => $k
			);
			$this->m_datakecelakaan->set_tambah_data($data,'data_kecelakaan');
			redirect('c_kelola/lihat_data');
		}
		function hapus_data($id_kecelakaan)
		{
			$where = array('id_kecelakaan' => $id_kecelakaan);
			$this->m_datakecelakaan->set_hapus_data($where,'data_kecelakaan');
			redirect('c_kelola/lihat_data');
		}
		function ubah_data($id_kecelakaan)
		{
			$where = $id_kecelakaan;
			$data['data_kecelakaan'] = $this->m_datakecelakaan->get_ubah_data($where)->result_array();
			$data['wilayah'] = $this->m_wilayah->get_lihat_wilayah()->result_array();
			$data['titik'] = $this->m_titik->get_lihat_koordinat()->result_array();
//             echo "<pre>";
//			 print_r($data);
//			 echo "</pre>";
			$this->load->view('ubah_data',$data);
		}
		function data_baru($id_kecelakaan){

			$this->load->library('form_validation');

			$kode_titik = $this->input->post('kode_titik');
			$titik = $this->m_titik->get_ambil_koordinat($kode_titik);
            $id_jalan = $this->input->post('id_jalan');
//			$nama_jalan = $this->input->post('nama_jalan');
//			$id_jalan = $this->m_jalan->get_ambil_jalan($nama_jalan);
//			$jalan_id = $id_jalan[0]['id_jalan'];
			$kecamatan = $this->input->post('kecamatan');
            $wilayah = $this->m_wilayah->get_ambil_wilayah($kecamatan);
			$id_wilayah = $wilayah[0]['id_wilayah'];
//			$id_wilayah = $this->input->post('id_wilayah');
			$meninggal = $this->input->post('meninggal');
			$luka_berat = $this->input->post('luka_berat');
			$luka_ringan = $this->input->post('luka_ringan');
			$total = $this->input->post('total');
			$waktu = $this->input->post('waktu');
			$tipe_geo = 'Point';
			$koordinat = '['.$titik[0]['longitude'].','.$titik[0]['latitude'].']';



			$data = array(
					'kode_titik' => $kode_titik,
					'id_jalan' => $id_jalan,
					'id_wilayah' => $id_wilayah,
//					'nama_jalan' => $nama_jalan,
//					'k_kecamatan' => $kecamatan,
					't_meninggal' => $meninggal,
					't_luka_berat' => $luka_berat,
					't_luka_ringan' => $luka_ringan,
					'total_k' => $total,
					'waktu' => $waktu,
					'tipe_geo' => $tipe_geo,
					'koordinat' => $koordinat
			);

			$where = array(
				'id_kecelakaan' => $id_kecelakaan
			);
//
//			 echo "<pre>";
//			 print_r($data);
//			 echo "</pre>";
			$this->m_datakecelakaan->set_data_baru($where,$data,'data_kecelakaan');
//			redirect('c_kelola/lihat_data');
		}
		function opsi(){
            $kode_titik=$this->input->post('kode_titik');
            $this->load->model('m_jalan');
            echo $this->m_jalan->get_titik_jalan($kode_titik);
   }
// koordinat
    function kelola_koordinat()
    {
      $data['titik'] = $this->m_titik->get_lihat_koordinat()->result();
      $this->load->view('kelola_koordinat',$data);
    }
    function tambah_koordinat()
    {
      $kode_titik = $this->input->post('kode_titik');
      $latitude = $this->input->post('latitude');
      $longitude = $this->input->post('longitude');
			$id_jal = $this->input->post('id_jal');
			$data = array(
					'kode_titik' => $kode_titik,
					'latitude' => $latitude,
					'longitude' => $longitude,
					'id_jalan' => $id_jal
			);
			// echo "<pre>";
			// print_r($data);
			// echo "</pre>";
			$this->m_titik->set_tambah_koordinat($data,'titik');
			redirect('c_kelola/kelola_koordinat');
    }
		function hapus_koordinat($kode_titik)
		{
			$where = array('kode_titik' => $kode_titik);
			$this->m_titik->set_hapus_koordinat($where,'titik');
			redirect('c_kelola/kelola_koordinat');
		}
		function ubah_koordinat($kode_titik)
		{
			$where = array('kode_titik' => $kode_titik);
			$data['titik'] = $this->m_titik->get_ubah_koordinat($where,'titik')->result();
			$this->load->view('ubah_koordinat',$data);
		}
		function koordinat_baru($kode_titik){
			$kode_titik = $this->input->post('kode_titik');
			$latitude = $this->input->post('latitude');
			$longitude = $this->input->post('longitude');
            $id_jalan = $this->input->post('id_jalan');
			$data = array(
				'kode_titik' => $kode_titik,
				'latitude' => $latitude,
				'longitude' => $longitude,
                'id_jalan' => $id_jalan
			);
			$where = array(
				'kode_titik' => $kode_titik
			);
			$this->m_titik->set_koordinat_baru($where,$data,'titik');
			redirect('c_kelola/kelola_koordinat');
		}
}
