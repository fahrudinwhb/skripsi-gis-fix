<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Statistik extends CI_Controller {

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
		$this->load->model('m_statistik');
		// untuk grafik per kecamatan
		$total_k = $this->m_statistik->hitung_wilayah()->result_array();
		$grafik_total_k = array();
		$color = array('#1abc9c','#419fdc','#9b59b6','#e74c3c','#d35400');
		foreach ($total_k as $key => $value) {
			$grafik_total_k[$key]['value'] = (int)$total_k[$key]['TOTAL'];
			$grafik_total_k[$key]['label'] = $total_k[$key]['KECAMATAN'];
			$random_color = $color[array_rand($color)];
			$grafik_total_k[$key]['color'] = $random_color;
		}
		// print_r($grafik_total_k);
		//untuk grafik per jalan1
		$total_j = $this->m_statistik->hitung_jalan()->result_array();
		$data['grafik_total_j'] = $total_j;
		$data['grafik_total_k'] = $grafik_total_k;
		$this->load->view('statistik',$data);
	}
}
