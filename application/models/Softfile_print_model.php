<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Softfile_print_model extends CI_Model {

	public function get_jumlah_softfile_print()
	{
		$sql = "SELECT count(id_softfile_print) as id_softfile_print FROM softfile_print";
		$result = $this->db->query($sql);
		return $result->row()->id_softfile_print;
	}
 	 
	public function find_softfile_print($slug)
	{
		// $result = $this->db->where('slug_softfile_print',$slug)
		// 					->limit(1)
		// 					->get('softfile_print');
		// $result = $this->db->query("SELECT * FROM softfile_print sp, kategori_produk kp WHERE sp.id_kategori_produk=kp.id_kategori_produk AND sp.slug_softfile_print='$slug' LIMIT 1");

		$result  = $this->db->query("SELECT 
			ukuran_jenis_cetakan.*,
			softfile_print.*,
			kategori_produk.*,  
			jenis_cetakan.*, 
			softfile_print.id_softfile_print as id_sp,
			softfile_print.id_jenis_cetakan as sp_id_jc,
			jenis_cetakan.id_jenis_cetakan as jc_id_jc,
			ukuran_jenis_cetakan.id_jenis_cetakan as ujc_id_jc,
			MIN(harga_ukuran_jenis_cetakan) as harga_terendah,
			MAX(harga_ukuran_jenis_cetakan) as harga_tertinggi,
			MIN(berat_ukuran_jenis_cetakan) as berat_terendah,
			MAX(berat_ukuran_jenis_cetakan) as berat_tertinggi
			FROM softfile_print 
			LEFT JOIN kategori_produk ON softfile_print.id_kategori_produk=kategori_produk.id_kategori_produk
			LEFT JOIN jenis_cetakan ON softfile_print.id_jenis_cetakan=jenis_cetakan.id_jenis_cetakan
			LEFT JOIN ukuran_jenis_cetakan ON jenis_cetakan.id_jenis_cetakan=ukuran_jenis_cetakan.id_jenis_cetakan
			WHERE softfile_print.slug_softfile_print='$slug' ORDER BY softfile_print.id_softfile_print LIMIT 1
			");

		if( $result->num_rows() > 0 ){
			return $result->row();
		}else{
			return array();
		}

	}

	public function find_softfile_print_id($id_softfile_print)
	{
		// $result = $this->db->where('slug_softfile_print',$slug)
		// 					->limit(1)
		// 					->get('softfile_print');
		// $result = $this->db->query("SELECT * FROM softfile_print sp, kategori_produk kp WHERE sp.id_kategori_produk=kp.id_kategori_produk AND sp.slug_softfile_print='$slug' LIMIT 1");

		$result  = $this->db->query("SELECT 
			ukuran_jenis_cetakan.*,
			softfile_print.*,
			kategori_produk.*, 
			jenis_cetakan.*, 
			softfile_print.id_softfile_print as id_sp,
			softfile_print.id_jenis_cetakan as sp_id_jc,
			jenis_cetakan.id_jenis_cetakan as jc_id_jc,
			ukuran_jenis_cetakan.id_jenis_cetakan as ujc_id_jc,
			MIN(harga_ukuran_jenis_cetakan) as harga_terendah,
			MAX(harga_ukuran_jenis_cetakan) as harga_tertinggi,
			MIN(berat_ukuran_jenis_cetakan) as berat_terendah,
			MAX(berat_ukuran_jenis_cetakan) as berat_tertinggi
			FROM softfile_print
			LEFT JOIN kategori_produk ON softfile_print.id_kategori_produk=kategori_produk.id_kategori_produk
			LEFT JOIN jenis_cetakan ON softfile_print.id_jenis_cetakan=jenis_cetakan.id_jenis_cetakan
			LEFT JOIN ukuran_jenis_cetakan ON jenis_cetakan.id_jenis_cetakan=ukuran_jenis_cetakan.id_jenis_cetakan
			WHERE softfile_print.id_softfile_print='$id_softfile_print' ORDER BY softfile_print.id_softfile_print LIMIT 1
			");

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

	public function tampil_data_id()
	{
		return $this->db->query("SELECT id_softfile_print FROM softfile_print")->result();
	} 

	public function tampil_data_join()
	{
		return $this->db->query("SELECT * FROM softfile_print sp, kategori_produk kp, jenis_cetakan jc WHERE sp.id_kategori_produk=kp.id_kategori_produk AND sp.id_jenis_cetakan=jc.id_jenis_cetakan ORDER BY sp.id_softfile_print DESC")->result();
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



	public function insert_softfile_print($data,$table)
	{
		$this->db->insert($table,$data);
	}

	public function update_data($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	} 

	public function ambil_id_softfile_print($id)
	{
		$result = $this->db->where('id_softfile_print',$id)->get('softfile_print');
		if($result->num_rows() > 0){
			return $result->result();
		}else{
			return false;
		}
	} 


	public function softfile_print_best_seller()
	{
		return $this->db->query("SELECT softfile_print.*,transaksi.*, COUNT(qty) as total_qty FROM produk_transaksi, softfile_print,transaksi WHERE softfile_print.id_softfile_print=produk_transaksi.id_softfile_print AND produk_transaksi.no_transaksi=transaksi.no_transaksi GROUP BY softfile_print.id_softfile_print ORDER BY COUNT(qty) DESC LIMIT 3")->result();
	} 

	// Masih Error
	public function ambil_slug_softfile_print_join() 
	{
		return $this->db->query("SELECT 
			ukuran_jenis_cetakan.*,
			sub_jenis_cetakan.*,
			softfile_print.*,
			kategori_produk.*, 
			jenis_cetakan.*, 
			jenis_cetakan.*, 
			softfile_print.id_softfile_print as id_sp,
			softfile_print.id_jenis_cetakan as sp_id_jc,
			jenis_cetakan.id_jenis_cetakan as jc_id_jc,
			ukuran_jenis_cetakan.id_jenis_cetakan as ujc_id_jc,
			sub_jenis_cetakan.id_jenis_cetakan as sjc_id_jc,
			MIN(harga_ukuran_jenis_cetakan) as harga_terendah,
			MAX(harga_ukuran_jenis_cetakan) as harga_tertinggi,
			MIN(harga_sub_jenis_cetakan) as harga_terendah_sjc,
			MAX(harga_sub_jenis_cetakan) as harga_tertinggi_sjc,
			MIN(berat_ukuran_jenis_cetakan) as berat_terendah,
			MAX(berat_ukuran_jenis_cetakan) as berat_tertinggi
			FROM softfile_print
			LEFT JOIN kategori_produk ON softfile_print.id_kategori_produk=kategori_produk.id_kategori_produk
			LEFT JOIN jenis_cetakan ON softfile_print.id_jenis_cetakan=jenis_cetakan.id_jenis_cetakan
			LEFT JOIN ukuran_jenis_cetakan ON jenis_cetakan.id_jenis_cetakan=ukuran_jenis_cetakan.id_jenis_cetakan
			LEFT JOIN sub_jenis_cetakan ON jenis_cetakan.id_jenis_cetakan=sub_jenis_cetakan.id_jenis_cetakan
			WHERE kategori_produk.slug_kategori_produk='soft_file_print' ORDER BY softfile_print.id_softfile_print DESC
			")->result();
	} 

	public function ambil_slug_softfile_print_join2() 
	{
		return $this->db->query("SELECT *  FROM softfile_print sp, kategori_produk kp, jenis_cetakan jc WHERE sp.id_kategori_produk=kp.id_kategori_produk AND sp.id_jenis_cetakan=jc.id_jenis_cetakan AND kp.slug_kategori_produk='soft_file_print' ORDER BY sp.id_softfile_print DESC LIMIT 3")->result();
	} 

	public function ambil_detail_softfile_print_join2($slug)
	{
		return $this->db->query("SELECT 
			ukuran_jenis_cetakan.*,
			sub_jenis_cetakan.*,
			softfile_print.*,
			kategori_produk.*, 
			jenis_cetakan.*, 
			softfile_print.id_softfile_print as id_sp,
			softfile_print.id_jenis_cetakan as sp_id_jc,
			jenis_cetakan.id_jenis_cetakan as jc_id_jc,
			ukuran_jenis_cetakan.id_jenis_cetakan as ujc_id_jc,
			sub_jenis_cetakan.id_jenis_cetakan as sjc_id_jc,
			MIN(harga_ukuran_jenis_cetakan) as harga_terendah,
			MAX(harga_ukuran_jenis_cetakan) as harga_tertinggi,
			MIN(harga_sub_jenis_cetakan) as harga_terendah_sjc,
			MAX(harga_sub_jenis_cetakan) as harga_tertinggi_sjc,
			MIN(berat_ukuran_jenis_cetakan) as berat_terendah,
			MAX(berat_ukuran_jenis_cetakan) as berat_tertinggi
			FROM softfile_print
			LEFT JOIN kategori_produk ON softfile_print.id_kategori_produk=kategori_produk.id_kategori_produk
			LEFT JOIN jenis_cetakan ON softfile_print.id_jenis_cetakan=jenis_cetakan.id_jenis_cetakan
			LEFT JOIN ukuran_jenis_cetakan ON jenis_cetakan.id_jenis_cetakan=ukuran_jenis_cetakan.id_jenis_cetakan
			LEFT JOIN sub_jenis_cetakan ON jenis_cetakan.id_jenis_cetakan=sub_jenis_cetakan.id_jenis_cetakan
			WHERE softfile_print.slug_softfile_print='$slug' ORDER BY softfile_print.id_softfile_print DESC
			")->result();
	} 

	public function ambil_id_softfile_print_join2($id_softfile_print)
	{
		return $this->db->query("SELECT 
			ukuran_jenis_cetakan.*,
			sub_jenis_cetakan.*,
			softfile_print.*,
			kategori_produk.*, 
			jenis_cetakan.*, 
			softfile_print.id_softfile_print as id_sp,
			softfile_print.id_jenis_cetakan as sp_id_jc,
			jenis_cetakan.id_jenis_cetakan as jc_id_jc,
			ukuran_jenis_cetakan.id_jenis_cetakan as ujc_id_jc,
			sub_jenis_cetakan.id_jenis_cetakan as sjc_id_jc,
			MIN(harga_ukuran_jenis_cetakan) as harga_terendah,
			MAX(harga_ukuran_jenis_cetakan) as harga_tertinggi,
			MIN(harga_sub_jenis_cetakan) as harga_terendah_sjc,
			MAX(harga_sub_jenis_cetakan) as harga_tertinggi_sjc,
			MIN(berat_ukuran_jenis_cetakan) as berat_terendah,
			MAX(berat_ukuran_jenis_cetakan) as berat_tertinggi
			FROM softfile_print
			LEFT JOIN kategori_produk ON softfile_print.id_kategori_produk=kategori_produk.id_kategori_produk
			LEFT JOIN jenis_cetakan ON softfile_print.id_jenis_cetakan=jenis_cetakan.id_jenis_cetakan
			LEFT JOIN ukuran_jenis_cetakan ON jenis_cetakan.id_jenis_cetakan=ukuran_jenis_cetakan.id_jenis_cetakan
			LEFT JOIN sub_jenis_cetakan ON jenis_cetakan.id_jenis_cetakan=sub_jenis_cetakan.id_jenis_cetakan
			WHERE softfile_print.id_softfile_print='$id_softfile_print' ORDER BY softfile_print.id_softfile_print DESC
			")->result();
	} 

	public function ambil_slug_detail_softfile_print_join($slug)
	{
		return $this->db->query("SELECT 
			ukuran_jenis_cetakan.*,
			sub_jenis_cetakan.*,
			softfile_print.*,
			kategori_produk.*, 
			jenis_cetakan.*, 
			jenis_cetakan.*, 
			softfile_print.id_softfile_print as id_sp,
			softfile_print.id_jenis_cetakan as sp_id_jc,
			jenis_cetakan.id_jenis_cetakan as jc_id_jc,
			ukuran_jenis_cetakan.id_jenis_cetakan as ujc_id_jc,
			sub_jenis_cetakan.id_jenis_cetakan as sjc_id_jc,
			MIN(harga_ukuran_jenis_cetakan) as harga_terendah,
			MAX(harga_ukuran_jenis_cetakan) as harga_tertinggi,
			MIN(harga_sub_jenis_cetakan) as harga_terendah_sjc,
			MAX(harga_sub_jenis_cetakan) as harga_tertinggi_sjc,
			MIN(berat_ukuran_jenis_cetakan) as berat_terendah,
			MAX(berat_ukuran_jenis_cetakan) as berat_tertinggi
			FROM softfile_print
			LEFT JOIN kategori_produk ON softfile_print.id_kategori_produk=kategori_produk.id_kategori_produk
			LEFT JOIN jenis_cetakan ON softfile_print.id_jenis_cetakan=jenis_cetakan.id_jenis_cetakan
			LEFT JOIN ukuran_jenis_cetakan ON jenis_cetakan.id_jenis_cetakan=ukuran_jenis_cetakan.id_jenis_cetakan
			LEFT JOIN sub_jenis_cetakan ON jenis_cetakan.id_jenis_cetakan=sub_jenis_cetakan.id_jenis_cetakan
			WHERE kategori_produk.slug_kategori_produk='$slug' ORDER BY softfile_print.id_softfile_print DESC LIMIT 4
			")->result();
	} 

	public function ambil_detail_softfile_print_join($slug)
	{
		return $this->db->query("SELECT * FROM softfile_print sp, kategori_produk kp, jenis_cetakan jc WHERE sp.id_kategori_produk=kp.id_kategori_produk AND sp.id_jenis_cetakan=jc.id_jenis_cetakan AND sp.slug_softfile_print='$slug' ORDER BY sp.id_softfile_print DESC")->result();
	} 

	public function hapus_data($where,$table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
	
	public function ambil_pencarian_softfile_print_join($keyword_softfile_print)
	{
		$this->db->select('*');
		$this->db->from('softfile_print'); 
		$this->db->join('kategori_produk', 'kategori_produk.id_kategori_produk = softfile_print.id_kategori_produk');
		$this->db->like('nama_softfile_print', $keyword_softfile_print);
		$this->db->or_like('variasi_softfile_print', $keyword_softfile_print);
		$this->db->or_like('harga_softfile_print', $keyword_softfile_print);
		$this->db->or_like('diskon_softfile_print', $keyword_softfile_print);
		$this->db->or_like('deskripsi_softfile_print', $keyword_softfile_print);
		return $this->db->get()->result();
	}

}

/* End of file Softfile_print_model.php */
/* Location: ./application/models/Softfile_print_model.php */
