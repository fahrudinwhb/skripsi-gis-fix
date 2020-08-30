<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kelola extends CI_Model {

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
// data kecelakaan
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
	function get_ubah_data($where,$table){
        $this->ubah=$this->db->get_where($table,$where);
        return $this->ubah;
	}
	function set_data_baru($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
	
// koordinat
	public function kelola_koordinat(){
		return $this->db->get('titik');
	}
	public function ambil_koordinat($where){
		$this->db->select('longitude,latitude');
		$this->db->where('kode_titik', $where);
		$query = $this->db->get('titik')->result_array();
		return $query;
	}
	function tambah_koordinat($data,$table){
		$this->db->insert($table,$data);
	}
	function hapus_koordinat($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
	function ubah_koordinat($where,$table){
		return $this->db->get_where($table,$where);
	}
	function koordinat_baru($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
	public function lihat_koordinat(){
		return $this->db->get('titik');
	}
	public function cek_data($kode_titik){
		$query = $this->db->query("SELECT COUNT(KODE_TITIK) AS T_DATA FROM TITIK WHERE KODE_TITIK = '$kode_titik'");
		$query->num_rows();
		return $query;
	}
	public function cekkode($kode_titik){
	  $data='';
	  if($kode_titik=='|kosong|'){
	  $data[0]='<i class="glyphicon glyphicon-remove" style="color:red;"></i> Kode Harus Diisi';
		$data[1]='off';
	  return json_encode ($data);
	  }
	  $query=$this->db->query("SELECT KODE_TITIK AS T_DATA FROM TITIK WHERE KODE_TITIK = '$kode_titik'");
	  if ($query->num_rows() != 0){
			$data[0]='<i class="glyphicon glyphicon-remove" style="color:red;"></i> Kode sudah digunakan';
			$data[1]='on';
		}
	  else{

			 $data[0]='<i class="glyphicon glyphicon-ok" style="color:green;"></i> Kode belum digunakan';
			$data[1]='off';
		}
	  return json_encode ($data);
    }
// jalan
	public function lihat_jalan(){
		return $this->db->get('jalan');
	}
	public function ambil_jalan($where){
		$this->db->select('id_jalan');
		$this->db->where('name', $where);
		$query = $this->db->get('jalan')->result_array();
		return $query;
	}
    function titik_jalan($kode_titik){
		$query = $this->db->query("SELECT JALAN.ID_JALAN, Name FROM JALAN JOIN TITIK ON TITIK.ID_JALAN = JALAN.ID_JALAN WHERE KODE_TITIK= '$kode_titik'");
		$row = $query->row_array();
		return json_encode ($row);
	}
// wilayah
	public function ambil_wilayah($where){
		$this->db->select('id_wilayah');
		$this->db->where('kecamatan', $where);
		$query = $this->db->get('wilayah')->result_array();
		return $query;
	}
	public function lihat_wilayah(){
		return $this->db->get('wilayah');
	}
// peta
	public function rekap_titik(){
		$query = $this->db->query("SELECT ID_KECELAKAAN, KODE_TITIK, DATA_KECELAKAAN.ID_JALAN, DATA_KECELAKAAN.ID_WILAYAH, Name, KECAMATAN, T_MENINGGAL, T_LUKA_BERAT, T_LUKA_RINGAN, TOTAL_K, WAKTU, DATA_KECELAKAAN.TIPE_GEO, DATA_KECELAKAAN.KOORDINAT, SUM(DATA_KECELAKAAN.T_MENINGGAL) AS M, SUM(DATA_KECELAKAAN.T_LUKA_BERAT) AS LB, SUM(DATA_KECELAKAAN.T_LUKA_RINGAN) AS LR, SUM(DATA_KECELAKAAN.TOTAL_K) AS T FROM DATA_KECELAKAAN JOIN JALAN ON DATA_KECELAKAAN.ID_JALAN = JALAN.ID_JALAN JOIN WILAYAH ON DATA_KECELAKAAN.ID_WILAYAH = WILAYAH.ID_WILAYAH GROUP BY KODE_TITIK");
    $query->result();
    return $query;
	}
	public function jalan_total(){
		$query = $this->db->query("SELECT JALAN.ID_JALAN, TypeD, Category, Name, SHAPE_len, JALAN.TIPE_GEO, JALAN.KOORDINAT, COALESCE(SUM(TOTAL_K),0) AS TOTAL_JALAN FROM JALAN LEFT JOIN DATA_KECELAKAAN ON DATA_KECELAKAAN.ID_JALAN = JALAN.ID_JALAN GROUP BY JALAN.ID_JALAN");
		$query->result();
		return $query;
	}
}