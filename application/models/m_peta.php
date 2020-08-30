<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_peta extends CI_Model {

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
// peta
	public function get_rekap_titik(){
		$query = $this->db->query("SELECT ID_KECELAKAAN, KODE_TITIK, DATA_KECELAKAAN.ID_JALAN, DATA_KECELAKAAN.ID_WILAYAH, Name, KECAMATAN, T_MENINGGAL, T_LUKA_BERAT, T_LUKA_RINGAN, TOTAL_K, WAKTU, DATA_KECELAKAAN.TIPE_GEO, DATA_KECELAKAAN.KOORDINAT, SUM(DATA_KECELAKAAN.T_MENINGGAL) AS M, SUM(DATA_KECELAKAAN.T_LUKA_BERAT) AS LB, SUM(DATA_KECELAKAAN.T_LUKA_RINGAN) AS LR, SUM(DATA_KECELAKAAN.TOTAL_K) AS T FROM DATA_KECELAKAAN JOIN JALAN ON DATA_KECELAKAAN.ID_JALAN = JALAN.ID_JALAN JOIN WILAYAH ON DATA_KECELAKAAN.ID_WILAYAH = WILAYAH.ID_WILAYAH GROUP BY KODE_TITIK");
    $query->result();
    return $query;
	}
	public function get_jalan_total(){
		$query = $this->db->query("SELECT JALAN.ID_JALAN, TypeD, Category, Name, SHAPE_len, JALAN.TIPE_GEO, JALAN.KOORDINAT, COALESCE(SUM(TOTAL_K),0) AS TOTAL_JALAN FROM JALAN LEFT JOIN DATA_KECELAKAAN ON DATA_KECELAKAAN.ID_JALAN = JALAN.ID_JALAN GROUP BY JALAN.ID_JALAN");
		$query->result();
		return $query;
	}
}