<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_statistik extends CI_Model {

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
	public function hitung_kecelakaan()
	{
    $query = $this->db->query("SELECT COUNT(Total_K) FROM DATA_KECELAKAAN");
    $query->result();
    return $query;
	}
	public function hitung_jalan(){
		$query = $this->db->query("SELECT SUM(TOTAL_K) AS TOTAL, Name FROM JALAN JOIN DATA_KECELAKAAN ON JALAN.ID_JALAN = DATA_KECELAKAAN.ID_JALAN GROUP BY JALAN.ID_JALAN ORDER BY TOTAL DESC LIMIT 5");
		$query->result();
		return $query;
	}
	public function hitung_wilayah(){
		$query = $this->db->query("SELECT KECAMATAN, SUM(TOTAL_K) AS TOTAL FROM WILAYAH JOIN DATA_KECELAKAAN ON WILAYAH.ID_WILAYAH = DATA_KECELAKAAN.ID_WILAYAH GROUP BY KECAMATAN");
		$query->result();
		return $query;
	}
	function hitung_tahun(){
		$query = $this->db->query("SELECT YEAR(WAKTU) AS Y, SUM(TOTAL_K) AS T FROM DATA_KECELAKAAN GROUP BY YEAR(WAKTU)");
		$query->result();
		return $query;
	}
	function hitung_korban(){
		$query = $this->db->query("SELECT MONTH(WAKTU), SUM(TOTAL_K) AS K, SUM(T_MENINGGAL) AS M, SUM(T_LUKA_BERAT) AS LB, SUM(T_LUKA_RINGAN) AS LR FROM DATA_KECELAKAAN GROUP BY MONTH(WAKTU)");
		$query->result();
		return $query;
	}
	function detail_jalan($where){
		$where = intval ($where);
		$query = $this->db->query("SELECT Name, Category, SHAPE_len, MONTH(WAKTU), COALESCE(SUM(T_MENINGGAL),0) AS M, COALESCE(SUM(T_LUKA_BERAT),0) AS LB, COALESCE(SUM(T_LUKA_RINGAN),0) AS LR, COALESCE(SUM(TOTAL_K),0) AS T FROM JALAN JOIN DATA_KECELAKAAN ON JALAN.ID_JALAN = DATA_KECELAKAAN.ID_JALAN WHERE JALAN.ID_JALAN = $where GROUP BY MONTH(WAKTU)");
		$query->result();
		return $query;
	}
	function detail_jalan_tahun($where){
		$where = intval ($where);
		$query = $this->db->query("SELECT Name, Category, SHAPE_len, YEAR(WAKTU), COALESCE(SUM(T_MENINGGAL),0) AS M, COALESCE(SUM(T_LUKA_BERAT),0) AS LB, COALESCE(SUM(T_LUKA_RINGAN),0) AS LR, COALESCE(SUM(TOTAL_K),0) AS T FROM JALAN JOIN DATA_KECELAKAAN ON JALAN.ID_JALAN = DATA_KECELAKAAN.ID_JALAN WHERE JALAN.ID_JALAN = $where GROUP BY YEAR(WAKTU)");
		$query->result();
		return $query;
	}
	function detail_titik($where){
		$query = $this->db->query("SELECT KODE_TITIK, Name, KECAMATAN, MONTH(WAKTU), COALESCE(SUM(T_MENINGGAL),0) AS M, COALESCE(SUM(T_LUKA_BERAT),0) AS LB, COALESCE(SUM(T_LUKA_RINGAN),0) AS LR, COALESCE(SUM(TOTAL_K),0) AS T FROM DATA_KECELAKAAN JOIN JALAN ON DATA_KECELAKAAN.ID_JALAN = JALAN.ID_JALAN JOIN WILAYAH ON DATA_KECELAKAAN.ID_WILAYAH = WILAYAH.ID_WILAYAH WHERE KODE_TITIK = '$where' GROUP BY MONTH(WAKTU)");
		$query->result();
		return $query;
	}
	// perbandingan
	function cari_jalan(){
		$query = $this->db->query("SELECT Name FROM JALAN JOIN DATA_KECELAKAAN ON JALAN.ID_JALAN = DATA_KECELAKAAN.ID_JALAN WHERE JALAN.ID_JALAN = DATA_KECELAKAAN.ID_JALAN GROUP BY Name");
		$query->result();
		return $query;
	}
	public function ambil_kec1($where){
		$this->db->select('id_wilayah');
		$this->db->where('kecamatan', $where);
		$query = $this->db->get('wilayah')->result_array();
		return $query;
	}
	public function ambil_kec2($where){
		$this->db->select('id_wilayah');
		$this->db->where('kecamatan', $where);
		$query = $this->db->get('wilayah')->result_array();
		return $query;
	}
	function select_kec($kec1_id,$kec2_id){
		$query = $this->db->query("SELECT WILAYAH.ID_WILAYAH, KECAMATAN, SUM(T_MENINGGAL) AS M, SUM(T_LUKA_RINGAN) AS LR, SUM(T_LUKA_BERAT) AS LB, SUM(TOTAL_K) AS T FROM WILAYAH LEFT JOIN DATA_KECELAKAAN ON WILAYAH.ID_WILAYAH = DATA_KECELAKAAN.ID_WILAYAH WHERE WILAYAH.ID_WILAYAH = $kec1_id OR WILAYAH.ID_WILAYAH = $kec2_id GROUP BY WILAYAH.ID_WILAYAH");
		$query->result();
		return $query;
	}
}
