<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_statistik extends CI_Controller {

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
	function detail_jalan(){
		$this->load->view('detail_jalan');
	}
	function detail_titik(){
		$this->load->view('detail_titik');
	}
	function ambil_detail_jalan($id_jalan){
		$data = $this->m_jalan->get_detail_jalan($id_jalan)->result_array();
        $data1 = $this->m_jalan->get_detail_jalan_tahun($id_jalan)->result_array();
        foreach ($data as $key => $value) {
                $monthNum  = $data[$key]['MONTH(WAKTU)'];
                $dateObj   = DateTime::createFromFormat('!m', $monthNum);
                $data[$key]['Nama_Bulan'] = $dateObj->format('F');
            }
        $detail['jalan'] = $data;
        $detail['tahun'] = $data1;
        $this->load->view('detail_jalan',$detail);
        }
	function ambil_detail_titik($kode_titik){
		$data['titik'] = $this->m_datakecelakaan->get_detail_titik($kode_titik)->result_array();
		$this->load->view('detail_titik',$data);
	}
	function h_statistik(){
		// stat jalan
		$data['hitung_jalan'] = $this->m_jalan->get_hitung_jalan()->result_array();
		// stat tahun
		$data['hitung_tahun'] = $this->m_datakecelakaan->get_hitung_tahun()->result_array();
		// stat wilayah
		$total_k = $this->m_wilayah->get_hitung_wilayah()->result_array();
		$grafik_total_k = array();
		foreach ($total_k as $key => $value) {
			$grafik_total_k[$key]['label'] = $total_k[$key]['KECAMATAN'];
			$grafik_total_k[$key]['value'] = (int)$total_k[$key]['TOTAL'];
		}
		$data['grafik_total_k'] = $grafik_total_k;
		// stat korban
		$data['hitung_korban'] = $this->m_datakecelakaan->get_hitung_korban()->result_array();
//        analisis
        $hitung = $this->m_jalan->analisis()->result_array();
        $hasil = array();
        foreach ($hitung as $key=>$value){
            $hasil[]=array('Name'=>$value['Name'],'ANALISIS'=>($value['M']*10)+($value['LB']*4.25)+($value['LR']*2.33)+(0*1));
        }
        function sortByOrder($a, $b) {
         if($a['ANALISIS']==$b['ANALISIS']) return 0;
            return $a['ANALISIS'] < $b['ANALISIS']?1:-1;
        }
        usort($hasil, 'sortByOrder');
        $hasil = array_slice($hasil, 0, 5);
        $data['analisis'] = $hasil;
//		hasil
        $this->load->view('statistik',$data);
	}
  // perbandingan
  function bandingwilayah(){
    $nama_kec1 = $this->input->post('nama_kec1');
    if ($nama_kec1==false) {
      $detail['hasil1']="";
      $detail['hasil2']="";
    }
    else {
      $id_kec1 = $this->m_wilayah->get_ambil_kec1($nama_kec1);
      $kec1_id = $id_kec1[0]['id_wilayah'];
      $nama_kec2 = $this->input->post('nama_kec2');
      $id_kec2 = $this->m_wilayah->get_ambil_kec2($nama_kec2);
      $kec2_id = $id_kec2[0]['id_wilayah'];
      if ($kec1_id==$kec2_id) {
        $detail['pesan'] = 'Masukkan 2 nama kecamatan yang berbeda';
      }else {
        $kec_com = $this->m_wilayah->get_select_kec($kec1_id,$kec2_id)->result_array();
        $detail['hasil1'] = $kec_com[0];
        $detail['hasil2'] = $kec_com[1];
      }
    }
    $this->load->view('perbandingan',$detail);
  }
    function analisis(){
        $hitung = $this->m_jalan->analisis()->result_array();
        $hasil = array();
        foreach ($hitung as $key=>$value){
            $hasil[]=array('Name'=>$value['Name'],'ANALISIS'=>($value['M']*10)+($value['LB']*4.25)+($value['LR']*2.33)+(0*1));
        }
        function sortByOrder($a, $b) {
         if($a['ANALISIS']==$b['ANALISIS']) return 0;
            return $a['ANALISIS'] < $b['ANALISIS']?1:-1;
        }
        usort($hasil, 'sortByOrder');
        $hasil = array_slice($hasil, 0, 5);
         echo "<pre>";
		 print_r($hitung);
		 echo "</pre>";
    }
}