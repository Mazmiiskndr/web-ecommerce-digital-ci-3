<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Print_only_model extends CI_Model {

	public function get_jumlah_print_only()
	{
		$sql = "SELECT count(id_print_only) as id_print_only FROM print_only";
		$result = $this->db->query($sql);
		return $result->row()->id_print_only;
	}

	public function find_print_only($slug)
	{
		// $result = $this->db->where('slug_print_only',$slug)
		// 					->limit(1)
		// 					->get('print_only');
		// $result = $this->db->query("SELECT * FROM print_only po, kategori_produk kp WHERE po.id_kategori_produk=kp.id_kategori_produk AND po.slug_print_only='$slug' LIMIT 1");
		
		$result = $this->db->query("SELECT 
			ukuran_jenis_cetakan.*,
			print_only.*,
			kategori_produk.*, 
			jenis_cetakan.*, 
			print_only.id_print_only as id_po,
			print_only.id_jenis_cetakan as po_id_jc,
			jenis_cetakan.id_jenis_cetakan as jc_id_jc,
			ukuran_jenis_cetakan.id_jenis_cetakan as ujc_id_jc,
			MIN(harga_ukuran_jenis_cetakan) as harga_terendah,
			MAX(harga_ukuran_jenis_cetakan) as harga_tertinggi,
			MIN(berat_ukuran_jenis_cetakan) as berat_terendah,
			MAX(berat_ukuran_jenis_cetakan) as berat_tertinggi
			FROM print_only
			LEFT JOIN kategori_produk ON print_only.id_kategori_produk=kategori_produk.id_kategori_produk
			LEFT JOIN jenis_cetakan ON print_only.id_jenis_cetakan=jenis_cetakan.id_jenis_cetakan
			LEFT JOIN ukuran_jenis_cetakan ON jenis_cetakan.id_jenis_cetakan=ukuran_jenis_cetakan.id_jenis_cetakan
			WHERE print_only.slug_print_only='$slug' ORDER BY print_only.id_print_only LIMIT 1
			");
		if( $result->num_rows() > 0 ){
			return $result->row();
		}else{
			return array();
		}

	}
	public function find_print_only_id($id_print_only)
	{
		// $result = $this->db->where('slug_print_only',$slug)
		// 					->limit(1)
		// 					->get('print_only');
		// $result = $this->db->query("SELECT * FROM print_only po, kategori_produk kp WHERE po.id_kategori_produk=kp.id_kategori_produk AND po.slug_print_only='$slug' LIMIT 1");
		
		$result = $this->db->query("SELECT 
			ukuran_jenis_cetakan.*,
			print_only.*,
			kategori_produk.*, 
			jenis_cetakan.*, 
			print_only.id_print_only as id_po,
			print_only.id_jenis_cetakan as po_id_jc,
			jenis_cetakan.id_jenis_cetakan as jc_id_jc,
			ukuran_jenis_cetakan.id_jenis_cetakan as ujc_id_jc,
			MIN(harga_ukuran_jenis_cetakan) as harga_terendah,
			MAX(harga_ukuran_jenis_cetakan) as harga_tertinggi,
			MIN(berat_ukuran_jenis_cetakan) as berat_terendah,
			MAX(berat_ukuran_jenis_cetakan) as berat_tertinggi
			FROM print_only
			LEFT JOIN kategori_produk ON print_only.id_kategori_produk=kategori_produk.id_kategori_produk
			LEFT JOIN jenis_cetakan ON print_only.id_jenis_cetakan=jenis_cetakan.id_jenis_cetakan
			LEFT JOIN ukuran_jenis_cetakan ON jenis_cetakan.id_jenis_cetakan=ukuran_jenis_cetakan.id_jenis_cetakan
			WHERE print_only.id_print_only='$id_print_only' ORDER BY print_only.id_print_only LIMIT 1
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
		return $this->db->query("SELECT id_print_only FROM print_only")->result();
	} 

	public function tampil_data_join()
	{
		return $this->db->query("SELECT * FROM print_only po, kategori_produk kp, jenis_cetakan jc WHERE po.id_kategori_produk=kp.id_kategori_produk AND po.id_jenis_cetakan=jc.id_jenis_cetakan ORDER BY po.id_print_only DESC")->result();
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



	public function insert_print_only($data,$table)
	{
		$this->db->insert($table,$data);
	}

	public function update_data($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	} 

	public function ambil_id_print_only($id)
	{
		$result = $this->db->where('id_print_only',$id)->get('print_only');
		if($result->num_rows() > 0){
			return $result->result();
		}else{
			return false;
		}
	} 


	public function print_only_best_seller()
	{
		return $this->db->query("SELECT print_only.*,transaksi.*, COUNT(qty) as total_qty FROM produk_transaksi, print_only,transaksi WHERE print_only.id_print_only=produk_transaksi.id_print_only AND produk_transaksi.no_transaksi=transaksi.no_transaksi GROUP BY print_only.id_print_only ORDER BY COUNT(qty) DESC LIMIT 3")->result();
	} 

	// Masih Error
	public function ambil_slug_print_only_join()
	{
		return $this->db->query("SELECT *  FROM print_only po, kategori_produk kp, jenis_cetakan jc WHERE po.id_kategori_produk=kp.id_kategori_produk AND po.id_jenis_cetakan=jc.id_jenis_cetakan AND kp.slug_kategori_produk='print_only' ORDER BY po.id_print_only DESC")->result();
	} 

	public function ambil_slug_print_only_join2()
	{
		return $this->db->query("SELECT *  FROM print_only po, kategori_produk kp, jenis_cetakan jc WHERE po.id_kategori_produk=kp.id_kategori_produk AND po.id_jenis_cetakan=jc.id_jenis_cetakan AND kp.slug_kategori_produk='print_only' ORDER BY po.id_print_only DESC LIMIT 3")->result();
	} 

	public function ambil_detail_print_only_join2($slug)
	{
		return $this->db->query("SELECT 
			ukuran_jenis_cetakan.*,
			sub_jenis_cetakan.*,
			print_only.*,
			kategori_produk.*,
			jenis_cetakan.*, 
			print_only.id_print_only as id_po,
			print_only.id_jenis_cetakan as po_id_jc,
			jenis_cetakan.id_jenis_cetakan as jc_id_jc,
			ukuran_jenis_cetakan.id_jenis_cetakan as ujc_id_jc,
			sub_jenis_cetakan.id_jenis_cetakan as sjc_id_jc,
			MIN(harga_ukuran_jenis_cetakan) as harga_terendah,
			MAX(harga_ukuran_jenis_cetakan) as harga_tertinggi,
			MIN(harga_sub_jenis_cetakan) as harga_terendah_sjc,
			MAX(harga_sub_jenis_cetakan) as harga_tertinggi_sjc,
			MIN(berat_ukuran_jenis_cetakan) as berat_terendah,
			MAX(berat_ukuran_jenis_cetakan) as berat_tertinggi
			FROM print_only
			LEFT JOIN kategori_produk ON print_only.id_kategori_produk=kategori_produk.id_kategori_produk
			LEFT JOIN jenis_cetakan ON print_only.id_jenis_cetakan=jenis_cetakan.id_jenis_cetakan
			LEFT JOIN ukuran_jenis_cetakan ON jenis_cetakan.id_jenis_cetakan=ukuran_jenis_cetakan.id_jenis_cetakan
			LEFT JOIN sub_jenis_cetakan ON jenis_cetakan.id_jenis_cetakan=sub_jenis_cetakan.id_jenis_cetakan
			WHERE print_only.slug_print_only='$slug' ORDER BY print_only.id_print_only DESC
			")->result();
	}  

	public function ambil_id_print_only_join2($id_print_only)
	{
		return $this->db->query("SELECT 
			ukuran_jenis_cetakan.*,
			sub_jenis_cetakan.*,
			print_only.*,
			kategori_produk.*,
			jenis_cetakan.*, 
			print_only.id_print_only as id_po,
			print_only.id_jenis_cetakan as po_id_jc,
			jenis_cetakan.id_jenis_cetakan as jc_id_jc,
			ukuran_jenis_cetakan.id_jenis_cetakan as ujc_id_jc,
			sub_jenis_cetakan.id_jenis_cetakan as sjc_id_jc,
			MIN(harga_ukuran_jenis_cetakan) as harga_terendah,
			MAX(harga_ukuran_jenis_cetakan) as harga_tertinggi,
			MIN(harga_sub_jenis_cetakan) as harga_terendah_sjc,
			MAX(harga_sub_jenis_cetakan) as harga_tertinggi_sjc,
			MIN(berat_ukuran_jenis_cetakan) as berat_terendah,
			MAX(berat_ukuran_jenis_cetakan) as berat_tertinggi
			FROM print_only
			LEFT JOIN kategori_produk ON print_only.id_kategori_produk=kategori_produk.id_kategori_produk
			LEFT JOIN jenis_cetakan ON print_only.id_jenis_cetakan=jenis_cetakan.id_jenis_cetakan
			LEFT JOIN ukuran_jenis_cetakan ON jenis_cetakan.id_jenis_cetakan=ukuran_jenis_cetakan.id_jenis_cetakan
			LEFT JOIN sub_jenis_cetakan ON jenis_cetakan.id_jenis_cetakan=sub_jenis_cetakan.id_jenis_cetakan
			WHERE print_only.id_print_only='$id_print_only' ORDER BY print_only.id_print_only DESC
			")->result();
	}  

	public function ambil_slug_detail_print_only_join($slug)
	{
		return $this->db->query("SELECT * FROM print_only po, kategori_produk kp WHERE po.id_kategori_produk=kp.id_kategori_produk AND kp.slug_kategori_produk='$slug' ORDER BY po.id_print_only DESC LIMIT 4")->result();
	} 

	public function ambil_detail_print_only_join($slug)
	{
		return $this->db->query("SELECT * FROM print_only po, kategori_produk kp, jenis_cetakan jc WHERE po.id_kategori_produk=kp.id_kategori_produk AND po.id_jenis_cetakan=jc.id_jenis_cetakan AND po.slug_print_only='$slug' ORDER BY po.id_print_only DESC")->result();
	} 

	public function hapus_data($where,$table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function ambil_pencarian_print_only_join($keyword_print_only)
	{
		$this->db->select('*');
		$this->db->from('print_only');
		$this->db->join('kategori_produk', 'kategori_produk.id_kategori_produk = print_only.id_kategori_produk');
		$this->db->like('nama_print_only', $keyword_print_only);
		$this->db->or_like('variasi_print_only', $keyword_print_only);
		$this->db->or_like('harga_print_only', $keyword_print_only);
		$this->db->or_like('diskon_print_only', $keyword_print_only);
		$this->db->or_like('deskripsi_print_only', $keyword_print_only);
		return $this->db->get()->result();
	}
	

}

/* End of file Print_only_model.php */
/* Location: ./application/models/Print_only_model.php */