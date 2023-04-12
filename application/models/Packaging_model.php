<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Packaging_model extends CI_Model {

	public function get_jumlah_packaging()
	{
		$sql = "SELECT count(id_packaging) as id_packaging FROM packaging";
		$result = $this->db->query($sql);
		return $result->row()->id_packaging;
	}

	public function tampil_data_rentang_harga()
	{
		return $this->db->query("SELECT 
			packaging.*,
			MIN(harga_packaging) as harga_terendah_packaging,
			MAX(harga_packaging) as harga_tertinggi_packaging
			FROM packaging ORDER BY packaging.id_packaging DESC
			")->row_array();
	}


	public function tampil_data($table)
	{
		return $this->db->get($table);
	} 


	public function tampil_data_limit($table)
	{
		return $this->db->get($table, 3);
	}


	public function update_password($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}



	public function insert_packaging($data,$table)
	{
		$this->db->insert($table,$data);
	}

	public function update_data($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	} 

	public function ambil_id_packaging($id)
	{
		$result = $this->db->where('id_packaging',$id)->get('packaging');
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

/* End of file Packaging_model.php */
/* Location: ./application/models/Packaging_model.php */