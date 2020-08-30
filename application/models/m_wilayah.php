<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_wilayah extends CI_Model {

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
	public function get_ambil_wilayah($where){
		$this->db->select('id_wilayah');
		$this->db->where('kecamatan', $where);
		$query = $this->db->get('wilayah')->result_array();
		return $query;
	}
	public function get_lihat_wilayah(){
		return $this->db->get('wilayah');
	}
//    statistik
    public function get_hitung_wilayah(){
		$query = $this->db->query("SELECT KECAMATAN, SUM(TOTAL_K) AS TOTAL FROM WILAYAH JOIN DATA_KECELAKAAN ON WILAYAH.ID_WILAYAH = DATA_KECELAKAAN.ID_WILAYAH GROUP BY KECAMATAN");
		$query->result();
		return $query;
	}
//    perbandingan
    public function get_ambil_kec1($where){
		$this->db->select('id_wilayah');
		$this->db->where('kecamatan', $where);
		$query = $this->db->get('wilayah')->result_array();
		return $query;
	}
    public function get_ambil_kec2($where){
		$this->db->select('id_wilayah');
		$this->db->where('kecamatan', $where);
		$query = $this->db->get('wilayah')->result_array();
		return $query;
	}
	function get_select_kec($kec1_id,$kec2_id){
		$query = $this->db->query("SELECT WILAYAH.ID_WILAYAH, KECAMATAN, SUM(T_MENINGGAL) AS M, SUM(T_LUKA_RINGAN) AS LR, SUM(T_LUKA_BERAT) AS LB, SUM(TOTAL_K) AS T FROM WILAYAH LEFT JOIN DATA_KECELAKAAN ON WILAYAH.ID_WILAYAH = DATA_KECELAKAAN.ID_WILAYAH WHERE WILAYAH.ID_WILAYAH = $kec1_id OR WILAYAH.ID_WILAYAH = $kec2_id GROUP BY WILAYAH.ID_WILAYAH");
		$query->result();
		return $query;
	}
}
?>