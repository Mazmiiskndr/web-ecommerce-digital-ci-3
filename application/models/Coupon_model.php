<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coupon_model extends CI_Model {

	function get_site_data(){
		$query = $this->db->get('coupon', 1); 
		return $query;
	}
	function get_site_data_coupon(){
		$query = $this->db->get('coupon', 1); 
		return $query;
	}

	public function cek_coupon()
	{
		$nama_coupon 			= set_value('nama_coupon');

		$result = $this->db
						->where('nama_coupon',$nama_coupon)
						->limit(1)
						->get('coupon');
		if($result->num_rows() > 0){
			return $result->row_array();
		}else{
			return FALSE;
		}
	}

	public function get_jumlah_coupon()
	{
		$sql = "SELECT count(id_coupon) as id_coupon FROM coupon";
		$result = $this->db->query($sql);
		return $result->row()->id_coupon;
	}


	public function tampil_data($table)
	{
		return $this->db->get($table);
	}

	public function tampil_data_apply_coupon()
	{
		return $this->db->query("SELECT * FROM applycoupon ac,users u, coupon c WHERE ac.id_coupon=c.id_coupon AND ac.id_users=u.id_users ORDER BY ac.id_applycoupon DESC LIMIT 1")->row_array();
	}


	public function insert_coupon($data,$table)
	{
		$this->db->insert($table,$data);
	}

	public function insert_apply_coupon($data,$table)
	{
		$this->db->insert($table,$data);
	}

	public function downloadCV($id)
	{
		$query = $this->db->get_where('coupon',array('id_coupon' => $id));
		return $query->row_array();
	}
	

	public function update_data($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	} 

	public function ambil_id_coupon($id)
	{
		$result = $this->db->where('id_coupon',$id)->get('coupon');
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
 
/* End of file Coupon_model.php */
/* Location: ./application/models/Coupon_model.php */