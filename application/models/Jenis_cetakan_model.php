<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Jenis_cetakan_model extends CI_Model {

	public function get_jumlah_jenis_cetakan()
	{
		$sql = "SELECT count(id_jenis_cetakan) as id_jenis_cetakan FROM jenis_cetakan";
		$result = $this->db->query($sql);
		return $result->row()->id_jenis_cetakan;
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



	public function insert_jenis_cetakan($data,$table)
	{
		$this->db->insert($table,$data);
	}

	public function update_data($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	} 

	public function ambil_id_jenis_cetakan($id)
	{
		$result = $this->db->where('id_jenis_cetakan',$id)->get('jenis_cetakan');
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

/* End of file Jenis_cetakan_model.php */
/* Location: ./application/models/Jenis_cetakan_model.php */