<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Role_model extends CI_Model {

	public function get_jumlah_role()
	{
		$sql = "SELECT count(id_role) as id_role FROM role";
		$result = $this->db->query($sql);
		return $result->row()->id_role;
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



	public function insert_role($data,$table)
	{
		$this->db->insert($table,$data);
	}

	public function update_data($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	} 

	public function ambil_id_role($id)
	{
		$result = $this->db->where('id_role',$id)->get('role');
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

/* End of file Role_model.php */
/* Location: ./application/models/Role_model.php */