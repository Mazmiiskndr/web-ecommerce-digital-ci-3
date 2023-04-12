<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart_model extends CI_Model {

	public function get_jumlah_cart()
	{
		$sql = "SELECT count(id_cart) as id_cart FROM cart";
		$result = $this->db->query($sql);
		return $result->row()->id_cart;
	}

	public function get_jumlah_cart_users()
	{
		// $this->db->select('*');
		// $this->db->from('cart');
		// $this->db->join('users', 'cart.id_users=users.id_users');
		// $this->db->like('cart.id_users', 'users.id_users');
		// return $this->db->count_all_results();
		$id_users = $this->session->userdata('id_users');
		return $this->db->query("SELECT count(id_cart) as ic FROM cart, users WHERE users.id_users=cart.id_users AND cart.id_users='$id_users'")->row()->ic;
	}



	public function tampil_data($table)
	{
		return $this->db->get($table);
	} 

	public function tampil_data_limit($table)
	{
		return $this->db->get($table, 3);
	}

	public function tampil_cart_detail_join($id)
	{
		return $this->db->query("SELECT * FROM cart c, users u WHERE c.id_users=u.id_users AND c.id_cart='$id' ORDER BY c.id_cart DESC")->result();
	} 

	public function tampil_produk_cart_detail_join($id)
	{
		$result  = $this->db->query("SELECT 
			softfile_only.*,
			users.*,
			softfile_print.*,
			kategori_produk.*, 
			package.*,
			cart.*,
			print_only.*, 
			cart.id_softfile_only as c_id_so,
			cart.id_softfile_print as c_id_sp,
			cart.id_package as c_id_p,
			kategori_produk.id_kategori_produk as kp_id_kp,
			cart.id_print_only as c_id_po
			FROM cart
			LEFT JOIN softfile_only ON cart.id_softfile_only=softfile_only.id_softfile_only
			LEFT JOIN softfile_print ON cart.id_softfile_print=softfile_print.id_softfile_print
			LEFT JOIN package ON cart.id_package=package.id_package
			LEFT JOIN print_only ON cart.id_print_only=print_only.id_print_only
			LEFT JOIN kategori_produk ON softfile_only.id_kategori_produk=kategori_produk.id_kategori_produk
			LEFT JOIN users ON cart.id_users=users.id_users
			WHERE users.id_users='$id' ORDER BY cart.id_cart DESC
			");

		if( $result->num_rows() > 0 ){
			return $result->result();
		}else{
			return array();
		}
	} 

	// public function tampil_produk_transaksi_profil()
	// {
	// 	return $this->db->query("SELECT * FROM transaksi t, users u WHERE t.id_users=u.id_users ORDER BY t.id_transaksi DESC")->result();
	// }

	public function update_cart($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	} 


	public function insert_cart($data,$table)
	{
		$this->db->insert($table,$data);
	}

	public function update_data($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	} 

	public function ambil_id_cart($id)
	{
		$result = $this->db->where('id_cart',$id)->get('cart');
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

/* End of file Cart_model.php */
/* Location: ./application/models/Cart_model.php */