<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reviews_model extends CI_Model {

	function get_site_data(){
		$query = $this->db->get('reviews', 1); 
		return $query;
	}
	function get_site_data_reviews(){
		$query = $this->db->get('reviews', 1); 
		return $query;
	}

	public function get_jumlah_reviews_softfile_only()
	{
		// $this->db->select('*');
		// $this->db->from('reviews');
		// $this->db->join('softfile_only', 'reviews.id_softfile_only = softfile_only.id_softfile_only', 'left');
		// $this->db->like('softfile_only.id_kategori_produk', '1');
		// return $this->db->count_all_results();

		$sql = "SELECT count(id_reviews) as id_reviews FROM reviews r, softfile_only so WHERE r.id_softfile_only=so.id_softfile_only";
		$result = $this->db->query($sql);
		return $result->row()->id_reviews;
	}

	public function get_jumlah_reviews_softfile_print()
	{
		$this->db->select('*');
		$this->db->from('reviews');
		$this->db->like('id_softfile_print', '2');
		return $this->db->count_all_results();
	}
	public function get_jumlah_reviews_package()
	{
		$this->db->select('*');
		$this->db->from('reviews');
		$this->db->like('id_package', '3');
		return $this->db->count_all_results();
	}
	public function get_jumlah_reviews_print_only()
	{
		$this->db->select('*');
		$this->db->from('reviews');
		$this->db->like('id_print_only', '3');
		return $this->db->count_all_results();
	}

	public function get_jumlah_reviews()
	{
		$sql = "SELECT count(id_reviews) as id_reviews FROM reviews";
		$result = $this->db->query($sql);
		return $result->row()->id_reviews;
	}
 

	public function tampil_data($table)
	{
		return $this->db->get($table);
	}


	public function tampil_data_join()
	{
		return $this->db->query("SELECT * FROM reviews r, users u WHERE r.id_users=u.id_users ORDER BY r.id_reviews DESC")->result();
	}


	public function insert_reviews($data,$table)
	{
		$this->db->insert($table,$data);
	}

	public function downloadCV($id)
	{
		$query = $this->db->get_where('reviews',array('id_reviews' => $id));
		return $query->row_array();
	}
	

	public function update_data($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	} 

	public function ambil_id_reviews($id)
	{
		$result = $this->db->where('id_reviews',$id)->get('reviews');
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
 
/* End of file Reviews_model.php */
/* Location: ./application/models/Reviews_model.php */