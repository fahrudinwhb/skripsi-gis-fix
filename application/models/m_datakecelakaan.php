<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_datakecelakaan extends CI_Model {

    private $data_kecelakaan;
    private $ubah;
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
//    kelola data kecelakaan
	public function get_lihat_data(){
		$this->data_kecelakaan = $this->db->query("SELECT ID_KECELAKAAN, KODE_TITIK, DATA_KECELAKAAN.ID_JALAN, DATA_KECELAKAAN.ID_WILAYAH, Name, KECAMATAN, T_MENINGGAL, T_LUKA_BERAT, T_LUKA_RINGAN, TOTAL_K, WAKTU, DATA_KECELAKAAN.TIPE_GEO, DATA_KECELAKAAN.KOORDINAT, SUM(DATA_KECELAKAAN.T_MENINGGAL) AS M, SUM(DATA_KECELAKAAN.T_LUKA_BERAT) AS LB, SUM(DATA_KECELAKAAN.T_LUKA_RINGAN) AS LR, SUM(DATA_KECELAKAAN.TOTAL_K) AS T FROM DATA_KECELAKAAN JOIN JALAN ON DATA_KECELAKAAN.ID_JALAN = JALAN.ID_JALAN JOIN WILAYAH ON DATA_KECELAKAAN.ID_WILAYAH = WILAYAH.ID_WILAYAH GROUP BY KODE_TITIK");
        $this->data_kecelakaan->result();
    return $this->data_kecelakaan;
//    return $query;
	}
	public function set_hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
	function set_tambah_data($data,$table){
		$this->db->insert($table,$data);
	}
	function get_ubah_data($where){
        $query = $this->db->query("SELECT DATA_KECELAKAAN.ID_KECELAKAAN, DATA_KECELAKAAN.ID_JALAN, DATA_KECELAKAAN.KODE_TITIK, Name, Kecamatan, T_MENINGGAL, T_LUKA_BERAT, T_LUKA_RINGAN, TOTAL_K, WAKTU FROM DATA_KECELAKAAN JOIN TITIK ON DATA_KECELAKAAN.KODE_TITIK = TITIK.KODE_TITIK JOIN JALAN ON DATA_KECELAKAAN.ID_JALAN = JALAN.ID_JALAN JOIN WILAYAH ON DATA_KECELAKAAN.ID_WILAYAH = WILAYAH.ID_WILAYAH WHERE ID_KECELAKAAN = $where");
        $query->result();
        return $query;
//        $this->ubah=$this->db->get_where($table,$where);
//        return $this->ubah;
	}
	function set_data_baru($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
//    statistk
    public function get_hitung_kecelakaan()
	{
        $query = $this->db->query("SELECT COUNT(Total_K) FROM DATA_KECELAKAAN");
        $query->result();
        return $query;
	}
    function get_hitung_tahun(){
		$query = $this->db->query("SELECT YEAR(WAKTU) AS Y, SUM(TOTAL_K) AS T FROM DATA_KECELAKAAN GROUP BY YEAR(WAKTU)");
		$query->result();
		return $query;
	}
    function get_hitung_korban(){
		$query = $this->db->query("SELECT MONTH(WAKTU), SUM(TOTAL_K) AS K, SUM(T_MENINGGAL) AS M, SUM(T_LUKA_BERAT) AS LB, SUM(T_LUKA_RINGAN) AS LR FROM DATA_KECELAKAAN GROUP BY MONTH(WAKTU)");
		$query->result();
		return $query;
	}
    function get_detail_titik($where){
		$query = $this->db->query("SELECT KODE_TITIK, Name, KECAMATAN, MONTH(WAKTU), COALESCE(SUM(T_MENINGGAL),0) AS M, COALESCE(SUM(T_LUKA_BERAT),0) AS LB, COALESCE(SUM(T_LUKA_RINGAN),0) AS LR, COALESCE(SUM(TOTAL_K),0) AS T FROM DATA_KECELAKAAN JOIN JALAN ON DATA_KECELAKAAN.ID_JALAN = JALAN.ID_JALAN JOIN WILAYAH ON DATA_KECELAKAAN.ID_WILAYAH = WILAYAH.ID_WILAYAH WHERE KODE_TITIK = '$where' GROUP BY MONTH(WAKTU)");
		$query->result();
		return $query;
	}
  // peta
  public function get_rekap_titik(){
		$query = $this->db->query("SELECT ID_KECELAKAAN, KODE_TITIK, DATA_KECELAKAAN.ID_JALAN, DATA_KECELAKAAN.ID_WILAYAH, Name, KECAMATAN, T_MENINGGAL, T_LUKA_BERAT, T_LUKA_RINGAN, TOTAL_K, WAKTU, DATA_KECELAKAAN.TIPE_GEO, DATA_KECELAKAAN.KOORDINAT, SUM(DATA_KECELAKAAN.T_MENINGGAL) AS M, SUM(DATA_KECELAKAAN.T_LUKA_BERAT) AS LB, SUM(DATA_KECELAKAAN.T_LUKA_RINGAN) AS LR, SUM(DATA_KECELAKAAN.TOTAL_K) AS T FROM DATA_KECELAKAAN JOIN JALAN ON DATA_KECELAKAAN.ID_JALAN = JALAN.ID_JALAN JOIN WILAYAH ON DATA_KECELAKAAN.ID_WILAYAH = WILAYAH.ID_WILAYAH GROUP BY KODE_TITIK");
    $query->result();
    return $query;
	}
}
?>
