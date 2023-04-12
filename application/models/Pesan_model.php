<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Pesan_model extends CI_Model {

	public function get_jumlah_pesan()
	{
		$sql = "SELECT count(id_pesan) as id_pesan FROM pesan";
		$result = $this->db->query($sql);
		return $result->row()->id_pesan;
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



	public function insert_pesan($data,$table)
	{
		$this->db->insert($table,$data);
	}

	public function update_data($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	} 

	public function ambil_id_pesan($id)
	{
		$result = $this->db->where('id_pesan',$id)->get('pesan');
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

/* End of file Pesan_model.php */
/* Location: ./application/models/Pesan_model.php */