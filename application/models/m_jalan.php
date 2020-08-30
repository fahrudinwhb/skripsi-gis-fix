<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_jalan extends CI_Model {

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
//    kelola
	public function get_lihat_jalan(){
		return $this->db->get('jalan');
	}
	public function get_ambil_jalan($where){
		$this->db->select('id_jalan');
		$this->db->where('name', $where);
		$query = $this->db->get('jalan')->result_array();
		return $query;
	}
    function get_titik_jalan($kode_titik){
		$query = $this->db->query("SELECT JALAN.ID_JALAN, Name FROM JALAN JOIN TITIK ON TITIK.ID_JALAN = JALAN.ID_JALAN WHERE KODE_TITIK= '$kode_titik'");
		$row = $query->row_array();
		return json_encode ($row);
	}
//    statistik
    public function get_hitung_jalan(){
		$query = $this->db->query("SELECT SUM(TOTAL_K) AS TOTAL, Name FROM JALAN JOIN DATA_KECELAKAAN ON JALAN.ID_JALAN = DATA_KECELAKAAN.ID_JALAN GROUP BY JALAN.ID_JALAN ORDER BY TOTAL DESC LIMIT 5");
		$query->result();
		return $query;
	}
    function get_detail_jalan($where){
		$where = intval ($where);
		$query = $this->db->query("SELECT Name, Category, SHAPE_len, MONTH(WAKTU), COALESCE(SUM(T_MENINGGAL),0) AS M, COALESCE(SUM(T_LUKA_BERAT),0) AS LB, COALESCE(SUM(T_LUKA_RINGAN),0) AS LR, COALESCE(SUM(TOTAL_K),0) AS T FROM JALAN JOIN DATA_KECELAKAAN ON JALAN.ID_JALAN = DATA_KECELAKAAN.ID_JALAN WHERE JALAN.ID_JALAN = $where GROUP BY MONTH(WAKTU)");
		$query->result();
		return $query;
	}
    function get_detail_jalan_tahun($where){
		$where = intval ($where);
		$query = $this->db->query("SELECT Name, Category, SHAPE_len, YEAR(WAKTU), COALESCE(SUM(T_MENINGGAL),0) AS M, COALESCE(SUM(T_LUKA_BERAT),0) AS LB, COALESCE(SUM(T_LUKA_RINGAN),0) AS LR, COALESCE(SUM(TOTAL_K),0) AS T FROM JALAN JOIN DATA_KECELAKAAN ON JALAN.ID_JALAN = DATA_KECELAKAAN.ID_JALAN WHERE JALAN.ID_JALAN = $where GROUP BY YEAR(WAKTU)");
		$query->result();
		return $query;
	}
//    perbandingan
    function get_cari_jalan(){
		$query = $this->db->query("SELECT Name FROM JALAN JOIN DATA_KECELAKAAN ON JALAN.ID_JALAN = DATA_KECELAKAAN.ID_JALAN WHERE JALAN.ID_JALAN = DATA_KECELAKAAN.ID_JALAN GROUP BY Name");
		$query->result();
		return $query;
	}
	// peta
    public function get_jalan_total(){
		$query = $this->db->query("SELECT JALAN.ID_JALAN, TypeD, Category, Name, SHAPE_len, JALAN.TIPE_GEO, JALAN.KOORDINAT, COALESCE(SUM(TOTAL_K),0) AS TOTAL_JALAN, COALESCE(SUM(T_MENINGGAL),0) AS M, COALESCE(SUM(T_LUKA_BERAT),0) AS LB, COALESCE(SUM(T_LUKA_RINGAN),0) AS LR FROM JALAN LEFT JOIN DATA_KECELAKAAN ON DATA_KECELAKAAN.ID_JALAN = JALAN.ID_JALAN GROUP BY JALAN.ID_JALAN");
		$query->result();
		return $query;
	}
    public function get_jalan_analisis(){
        $query = $this->db->query("SELECT JALAN.ID_JALAN, TypeD, Category, Name, SHAPE_len, JALAN.TIPE_GEO, JALAN.KOORDINAT, COALESCE(SUM(TOTAL_K),0) AS TOTAL_JALAN, COALESCE(SUM(T_MENINGGAL),0) AS M, COALESCE(SUM(T_LUKA_BERAT),0) AS LB, COALESCE(SUM(T_LUKA_RINGAN),0) AS LR, COALESCE(((SUM(T_MENINGGAL)*10) + (SUM(T_LUKA_BERAT)*4.25) + (SUM(T_LUKA_RINGAN)*2.33) + (SUM(TOTAL_K)*1)),0) AS ANALISIS FROM JALAN LEFT JOIN DATA_KECELAKAAN ON DATA_KECELAKAAN.ID_JALAN = JALAN.ID_JALAN GROUP BY JALAN.ID_JALAN");
		$query->result();
		return $query;
    }
    public function analisiss(){
		$query = $this->db->query("SELECT Name, COALESCE(((SUM(T_MENINGGAL)*10) + (SUM(T_LUKA_BERAT)*4.25) + (SUM(T_LUKA_RINGAN)*2.33) + (SUM(TOTAL_K)*1)),0) AS ANALISIS FROM JALAN JOIN DATA_KECELAKAAN ON DATA_KECELAKAAN.ID_JALAN = JALAN.ID_JALAN GROUP BY JALAN.ID_JALAN ORDER BY `ANALISIS` DESC LIMIT 5");
		$query->result();
		return $query;
	}
    public function analisis(){
		$query = $this->db->query("SELECT Name, SUM(T_MENINGGAL) AS M, SUM(T_LUKA_BERAT) AS LB, SUM(T_LUKA_RINGAN) AS LR, SUM(TOTAL_K) AS T FROM JALAN JOIN DATA_KECELAKAAN ON DATA_KECELAKAAN.ID_JALAN = JALAN.ID_JALAN GROUP BY JALAN.ID_JALAN");
		$query->result();
		return $query;
	}
}
?>