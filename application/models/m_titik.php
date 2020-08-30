<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_titik extends CI_Model {

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
	public function get_kelola_koordinat(){
		return $this->db->get('titik');
	}
	public function get_ambil_koordinat($where){
		$this->db->select('longitude,latitude');
		$this->db->where('kode_titik', $where);
		$query = $this->db->get('titik')->result_array();
		return $query;
	}
	function set_tambah_koordinat($data,$table){
		$this->db->insert($table,$data);
	}
	function set_hapus_koordinat($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
	function get_ubah_koordinat($where,$table){
		return $this->db->get_where($table,$where);
	}
	function set_koordinat_baru($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
	public function get_lihat_koordinat(){
		return $this->db->get('titik');
	}
	public function get_cek_data($kode_titik){
		$query = $this->db->query("SELECT COUNT(KODE_TITIK) AS T_DATA FROM TITIK WHERE KODE_TITIK = '$kode_titik'");
		$query->num_rows();
		return $query;
	}
	public function get_cekkode($kode_titik){
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
}
?>