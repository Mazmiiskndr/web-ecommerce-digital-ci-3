<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Tambahan_biaya_model extends CI_Model {

	public function get_jumlah_tambahan_biaya()
	{
		$sql = "SELECT count(id_tambahan_biaya) as id_tambahan_biaya FROM tambahan_biaya";
		$result = $this->db->query($sql);
		return $result->row()->id_tambahan_biaya;
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



	public function insert_tambahan_biaya($data,$table)
	{
		$this->db->insert($table,$data);
	}

	public function update_data($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	} 

	public function ambil_id_tambahan_biaya($id)
	{
		$result = $this->db->where('id_tambahan_biaya',$id)->get('tambahan_biaya');
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

/* End of file Tambahan_biaya_model.php */
/* Location: ./application/models/Tambahan_biaya_model.php */