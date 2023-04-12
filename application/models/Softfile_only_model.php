<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Softfile_only_model extends CI_Model {

	public function get_jumlah_softfile_only()
	{
		$sql = "SELECT count(id_softfile_only) as id_softfile_only FROM softfile_only";
		$result = $this->db->query($sql);
		return $result->row()->id_softfile_only;
	}

	public function find_softfile_only($slug)
	{
		// $result = $this->db->where('slug_softfile_only',$slug)
		// 					->limit(1)
		// 					->get('softfile_only');
		$result = $this->db->query("SELECT * FROM softfile_only so, kategori_produk kp WHERE so.id_kategori_produk=kp.id_kategori_produk AND so.slug_softfile_only='$slug' LIMIT 1");
		if( $result->num_rows() > 0 ){
			return $result->row();
		}else{ 
			return array();
		}

	}

	public function find_softfile_only_id($id_softfile_only)
	{
		$result = $this->db->query("SELECT * FROM softfile_only so, kategori_produk kp WHERE so.id_kategori_produk=kp.id_kategori_produk AND so.id_softfile_only='$id_softfile_only' LIMIT 1");
		if( $result->num_rows() > 0 ){
			return $result->row();
		}else{ 
			return array();
		}

	}

	public function tampil_data($table)
	{
		return $this->db->get($table);
	} 

	public function tampil_data_join()
	{
		return $this->db->query("SELECT * FROM softfile_only so, kategori_produk kp WHERE so.id_kategori_produk=kp.id_kategori_produk ORDER BY so.id_softfile_only DESC")->result();
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



	public function insert_softfile_only($data,$table)
	{
		$this->db->insert($table,$data);
	}

	public function update_data($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	} 

	public function softfile_only_best_seller()
	{
		return $this->db->query("SELECT softfile_only.*,transaksi.*, COUNT(qty) as total_qty FROM produk_transaksi, softfile_only,transaksi WHERE softfile_only.id_softfile_only=produk_transaksi.id_softfile_only AND produk_transaksi.no_transaksi=transaksi.no_transaksi GROUP BY softfile_only.id_softfile_only ORDER BY COUNT(qty) DESC LIMIT 3")->result();
	} 


	public function ambil_id_softfile_only($id)
	{
		$result = $this->db->where('id_softfile_only',$id)->get('softfile_only');
		if($result->num_rows() > 0){
			return $result->result();
		}else{
			return false;
		}
	} 
	public function ambil_slug_softfile_only_join()
	{
		return $this->db->query("SELECT * FROM softfile_only so, kategori_produk kp WHERE so.id_kategori_produk=kp.id_kategori_produk AND kp.slug_kategori_produk='soft_file_only' ORDER BY so.id_softfile_only DESC")->result();
	} 

	public function ambil_slug_softfile_only_join2()
	{
		return $this->db->query("SELECT * FROM softfile_only so, kategori_produk kp WHERE so.id_kategori_produk=kp.id_kategori_produk AND kp.slug_kategori_produk='soft_file_only' ORDER BY so.id_softfile_only DESC LIMIT 3")->result();
	} 

	public function ambil_slug_detail_softfile_only_join($slug)
	{
		return $this->db->query("SELECT * FROM softfile_only so, kategori_produk kp WHERE so.id_kategori_produk=kp.id_kategori_produk AND kp.slug_kategori_produk='$slug' ORDER BY so.id_softfile_only DESC LIMIT 4")->result();
	} 

	public function ambil_detail_softfile_only_join($slug)
	{
		return $this->db->query("SELECT * FROM softfile_only so, kategori_produk kp WHERE so.id_kategori_produk=kp.id_kategori_produk AND so.slug_softfile_only='$slug' ORDER BY so.id_softfile_only DESC")->result();
	} 

	public function ambil_id_softfile_only_join($id_softfile_only)
	{
		return $this->db->query("SELECT * FROM softfile_only so, kategori_produk kp WHERE so.id_kategori_produk=kp.id_kategori_produk AND so.id_softfile_only='$id_softfile_only' ORDER BY so.id_softfile_only DESC")->result();
	} 

	public function hapus_data($where,$table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
	 

	public function ambil_pencarian_softfile_only_join($keyword_softfile_only)
	{
		$this->db->select('*');
		$this->db->from('softfile_only');
		$this->db->join('kategori_produk', 'kategori_produk.id_kategori_produk = softfile_only.id_kategori_produk');
		$this->db->like('nama_softfile_only', $keyword_softfile_only);
		$this->db->or_like('variasi_softfile_only', $keyword_softfile_only);
		$this->db->or_like('harga_softfile_only', $keyword_softfile_only);
		$this->db->or_like('diskon_softfile_only', $keyword_softfile_only);
		$this->db->or_like('deskripsi_softfile_only', $keyword_softfile_only);
		return $this->db->get()->result();
	}

}

/* End of file Softfile_only_model.php */
/* Location: ./application/models/Softfile_only_model.php */