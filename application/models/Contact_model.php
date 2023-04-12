<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_model extends CI_Model {

	function get_site_data(){
		$query = $this->db->get('contact', 1); 
		return $query;
	}
	function get_site_data_contact(){
		$query = $this->db->get('contact', 1); 
		return $query;
	}

	public function get_jumlah_contact()
	{
		$sql = "SELECT count(id_contact) as id_contact FROM contact";
		$result = $this->db->query($sql);
		return $result->row()->id_contact;
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
		$query = $this->db->get_where('contact',array('id_contact' => $id));
		return $query->row_array();
	}
	

	public function update_data($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	} 

	public function ambil_id_home($id)
	{
		$result = $this->db->where('id_contact',$id)->get('contact');
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
 
/* End of file Type_model.php */
/* Location: ./application/models/Type_model.php */