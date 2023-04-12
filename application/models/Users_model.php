<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Users_model extends CI_Model {

	// public function get_jumlah_users()
	// {
	// 	$sql = "SELECT count(id_users) as id_users FROM users";
	// 	$result = $this->db->query($sql);
	// 	return $result->row()->id_users;
	// }

	function get_site_data(){
		$query = $this->db->get('users', 1); 
		return $query;
	}
	public function get_jumlah_users()
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->like('role_id', '3');
		return $this->db->count_all_results();
	}

	public function tampil_data($table)
	{
		return $this->db->get($table);
	} 
 
	public function tampil_data_join()
	{
		return $this->db->query("SELECT * FROM users u, role r WHERE r.id_role=u.role_id ORDER BY u.id_users DESC")->result();
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



	public function insert_users($data,$table)
	{
		$this->db->insert($table,$data);
	}

	public function update_data($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	} 

	public function ambil_id_users($id)
	{
		$result = $this->db->where('id_users',$id)->get('users');
		if($result->num_rows() > 0){
			return $result->result();
		}else{
			return false;
		}
	} 
	public function ambil_id_users_join($id)
	{
		return $this->db->query("SELECT * FROM users u, role r WHERE r.id_role=u.role_id AND u.id_users='$id' ORDER BY u.id_users DESC")->result();
	} 

	public function hapus_data($where,$table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
	

}

/* End of file Users_model.php */
/* Location: ./application/models/Users_model.php */