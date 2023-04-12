<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {

	function get_site_data(){
		$query = $this->db->get('home', 1); 
		return $query;
	}
	function get_site_data_home(){
		$query = $this->db->get('home', 1); 
		return $query;
	}

	public function get_jumlah_home()
	{
		$sql = "SELECT count(id_home) as id_home FROM home";
		$result = $this->db->query($sql);
		return $result->row()->id_home;
	}


	public function tampil_data($table)
	{
		return $this->db->get($table);
	}


	public function insert_home($data,$table)
	{
		$this->db->insert($table,$data);
	}

	public function downloadCV($id)
	{
		$query = $this->db->get_where('home',array('id_home' => $id));
		return $query->row_array();
	}
	

	public function update_data($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	} 

	public function ambil_id_home($id)
	{
		$result = $this->db->where('id_home',$id)->get('home');
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
 
/* End of file Home_model.php */
/* Location: ./application/models/Home_model.php */