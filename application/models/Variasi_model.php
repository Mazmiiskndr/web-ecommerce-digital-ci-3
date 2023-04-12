<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Variasi_model extends CI_Model {

	function get_site_data(){
		$query = $this->db->get('variasi', 1); 
		return $query;
	}
	function get_site_data_variasi(){
		$query = $this->db->get('variasi', 1); 
		return $query;
	}

	public function get_jumlah_variasi()
	{
		$sql = "SELECT count(id_variasi) as id_variasi FROM variasi";
		$result = $this->db->query($sql);
		return $result->row()->id_variasi;
	}


	public function tampil_data($table)
	{
		return $this->db->get($table);
	}

	public function tampil_data_rentang_harga()
	{
		return $this->db->query("SELECT 
			variasi.*,
			MIN(harga_variasi) as harga_terendah_variasi,
			MAX(harga_variasi) as harga_tertinggi_variasi
			FROM variasi ORDER BY variasi.id_variasi DESC
			")->row_array();
	}



	public function insert_variasi($data,$table)
	{
		$this->db->insert($table,$data);
	}

	public function downloadCV($id)
	{
		$query = $this->db->get_where('variasi',array('id_variasi' => $id));
		return $query->row_array();
	}
	

	public function update_data($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	} 

	public function ambil_id_home($id)
	{
		$result = $this->db->where('id_variasi',$id)->get('variasi');
		if($result->num_rows() > 0){
			return $result->result();
		}else{
			return false;
		}
	} 

	public function hapus_data($where,$table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}




}
 
/* End of file Variasi_model.php */
/* Location: ./application/models/Variasi_model.php */