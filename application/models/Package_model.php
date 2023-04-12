<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Package_model extends CI_Model {

	public function get_jumlah_package()
	{
		$sql = "SELECT count(id_package) as id_package FROM package";
		$result = $this->db->query($sql);
		return $result->row()->id_package;
	}

	public function find_package($slug)
	{
		// $result = $this->db->where('slug_package',$slug)
		// 					->limit(1)
		// 					->get('package');
		// $result = $this->db->query("SELECT * FROM package p, kategori_produk kp WHERE p.id_kategori_produk=kp.id_kategori_produk AND p.slug_package='$slug' LIMIT 1");
		
		$result = $this->db->query("SELECT 
			ukuran_jenis_cetakan.*,
			package.*, 
			kategori_produk.*, 
			jenis_cetakan.*, 
			package.id_package as id_p,
			package.id_jenis_cetakan as p_id_jc,
			jenis_cetakan.id_jenis_cetakan as jc_id_jc,
			ukuran_jenis_cetakan.id_jenis_cetakan as ujc_id_jc,
			MIN(harga_ukuran_jenis_cetakan) as harga_terendah,
			MAX(harga_ukuran_jenis_cetakan) as harga_tertinggi,
			MIN(berat_ukuran_jenis_cetakan) as berat_terendah,
			MAX(berat_ukuran_jenis_cetakan) as berat_tertinggi
			FROM package
			LEFT JOIN kategori_produk ON package.id_kategori_produk=kategori_produk.id_kategori_produk
			LEFT JOIN jenis_cetakan ON package.id_jenis_cetakan=jenis_cetakan.id_jenis_cetakan
			LEFT JOIN ukuran_jenis_cetakan ON jenis_cetakan.id_jenis_cetakan=ukuran_jenis_cetakan.id_jenis_cetakan
			WHERE package.slug_package='$slug' ORDER BY package.id_package LIMIT 1
			");

		if( $result->num_rows() > 0 ){
			return $result->row();
		}else{
			return array();
		}

	}

	public function find_package_id($id_package)
	{
		// $result = $this->db->where('slug_package',$slug)
		// 					->limit(1)
		// 					->get('package');
		// $result = $this->db->query("SELECT * FROM package p, kategori_produk kp WHERE p.id_kategori_produk=kp.id_kategori_produk AND p.slug_package='$slug' LIMIT 1");
		
		$result = $this->db->query("SELECT 
			ukuran_jenis_cetakan.*,
			package.*,
			kategori_produk.*, 
			jenis_cetakan.*, 
			package.id_package as id_p,
			package.id_jenis_cetakan as p_id_jc,
			jenis_cetakan.id_jenis_cetakan as jc_id_jc,
			ukuran_jenis_cetakan.id_jenis_cetakan as ujc_id_jc,
			MIN(harga_ukuran_jenis_cetakan) as harga_terendah,
			MAX(harga_ukuran_jenis_cetakan) as harga_tertinggi,
			MIN(berat_ukuran_jenis_cetakan) as berat_terendah,
			MAX(berat_ukuran_jenis_cetakan) as berat_tertinggi
			FROM package
			LEFT JOIN kategori_produk ON package.id_kategori_produk=kategori_produk.id_kategori_produk
			LEFT JOIN jenis_cetakan ON package.id_jenis_cetakan=jenis_cetakan.id_jenis_cetakan
			LEFT JOIN ukuran_jenis_cetakan ON jenis_cetakan.id_jenis_cetakan=ukuran_jenis_cetakan.id_jenis_cetakan
			WHERE package.id_package='$id_package' ORDER BY package.id_package LIMIT 1
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
		return $this->db->query("SELECT id_package FROM package")->result();
	} 

	public function tampil_data_join()
	{
		return $this->db->query("SELECT * FROM package p, kategori_produk kp, jenis_cetakan jc WHERE p.id_kategori_produk=kp.id_kategori_produk AND p.id_jenis_cetakan=jc.id_jenis_cetakan ORDER BY p.id_package DESC")->result();
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



	public function insert_package($data,$table)
	{
		$this->db->insert($table,$data);
	}

	public function update_data($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	} 

	public function ambil_id_package($id)
	{
		$result = $this->db->where('id_package',$id)->get('package');
		if($result->num_rows() > 0){
			return $result->result();
		}else{
			return false;
		}
	} 


	public function package_best_seller()
	{
		return $this->db->query("SELECT package.*,transaksi.*, COUNT(qty) as total_qty FROM produk_transaksi, package,transaksi WHERE package.id_package=produk_transaksi.id_package AND produk_transaksi.no_transaksi=transaksi.no_transaksi GROUP BY package.id_package ORDER BY COUNT(qty) DESC LIMIT 3")->result();
	} 

	// Masih Error
	public function ambil_slug_package_join()
	{
		return $this->db->query("SELECT 
			ukuran_jenis_cetakan.*,
			sub_jenis_cetakan.*,
			package.*,
			kategori_produk.*,
			jenis_cetakan.*, 
			package.id_package as id_p,
			package.id_jenis_cetakan as p_id_jc,
			jenis_cetakan.id_jenis_cetakan as jc_id_jc,
			ukuran_jenis_cetakan.id_jenis_cetakan as ujc_id_jc,
			sub_jenis_cetakan.id_jenis_cetakan as sjc_id_jc,
			MIN(harga_ukuran_jenis_cetakan) as harga_terendah,
			MAX(harga_ukuran_jenis_cetakan) as harga_tertinggi,
			MIN(harga_sub_jenis_cetakan) as harga_terendah_sjc,
			MAX(harga_sub_jenis_cetakan) as harga_tertinggi_sjc,
			MIN(berat_ukuran_jenis_cetakan) as berat_terendah,
			MAX(berat_ukuran_jenis_cetakan) as berat_tertinggi
			FROM package
			LEFT JOIN kategori_produk ON package.id_kategori_produk=kategori_produk.id_kategori_produk
			LEFT JOIN jenis_cetakan ON package.id_jenis_cetakan=jenis_cetakan.id_jenis_cetakan
			LEFT JOIN ukuran_jenis_cetakan ON jenis_cetakan.id_jenis_cetakan=ukuran_jenis_cetakan.id_jenis_cetakan
			LEFT JOIN sub_jenis_cetakan ON jenis_cetakan.id_jenis_cetakan=sub_jenis_cetakan.id_jenis_cetakan
			WHERE kategori_produk.slug_kategori_produk='package' ORDER BY package.id_package DESC
			")->result();
	} 

	public function ambil_slug_package_join2()
	{
		return $this->db->query("SELECT *  FROM package p, kategori_produk kp, jenis_cetakan jc WHERE p.id_kategori_produk=kp.id_kategori_produk AND p.id_jenis_cetakan=jc.id_jenis_cetakan AND kp.slug_kategori_produk='package' ORDER BY p.id_package DESC LIMIT 3")->result();
	} 

	public function ambil_detail_package_join2($slug)
	{
		return $this->db->query("SELECT 
			ukuran_jenis_cetakan.*,
			sub_jenis_cetakan.*,
			package.*,
			kategori_produk.*, 
			jenis_cetakan.*, 
			package.id_package as id_p,
			package.id_jenis_cetakan as p_id_jc,
			jenis_cetakan.id_jenis_cetakan as jc_id_jc,
			ukuran_jenis_cetakan.id_jenis_cetakan as ujc_id_jc,
			sub_jenis_cetakan.id_jenis_cetakan as sjc_id_jc,
			MIN(harga_ukuran_jenis_cetakan) as harga_terendah,
			MAX(harga_ukuran_jenis_cetakan) as harga_tertinggi,
			MIN(harga_sub_jenis_cetakan) as harga_terendah_sjc,
			MAX(harga_sub_jenis_cetakan) as harga_tertinggi_sjc,
			MIN(berat_ukuran_jenis_cetakan) as berat_terendah,
			MAX(berat_ukuran_jenis_cetakan) as berat_tertinggi
			FROM package
			LEFT JOIN kategori_produk ON package.id_kategori_produk=kategori_produk.id_kategori_produk
			LEFT JOIN jenis_cetakan ON package.id_jenis_cetakan=jenis_cetakan.id_jenis_cetakan
			LEFT JOIN ukuran_jenis_cetakan ON jenis_cetakan.id_jenis_cetakan=ukuran_jenis_cetakan.id_jenis_cetakan
			LEFT JOIN sub_jenis_cetakan ON jenis_cetakan.id_jenis_cetakan=sub_jenis_cetakan.id_jenis_cetakan
			WHERE package.slug_package='$slug' ORDER BY package.id_package DESC
			")->result();
	} 

	public function ambil_id_package_join2($id_package)
	{
		return $this->db->query("SELECT 
			ukuran_jenis_cetakan.*,
			sub_jenis_cetakan.*,
			package.*,
			kategori_produk.*,
			jenis_cetakan.*, 
			package.id_package as id_p,
			package.id_jenis_cetakan as p_id_jc,
			jenis_cetakan.id_jenis_cetakan as jc_id_jc,
			ukuran_jenis_cetakan.id_jenis_cetakan as ujc_id_jc,
			sub_jenis_cetakan.id_jenis_cetakan as sjc_id_jc,
			MIN(harga_ukuran_jenis_cetakan) as harga_terendah,
			MAX(harga_ukuran_jenis_cetakan) as harga_tertinggi,
			MIN(harga_sub_jenis_cetakan) as harga_terendah_sjc,
			MAX(harga_sub_jenis_cetakan) as harga_tertinggi_sjc,
			MIN(berat_ukuran_jenis_cetakan) as berat_terendah,
			MAX(berat_ukuran_jenis_cetakan) as berat_tertinggi
			FROM package
			LEFT JOIN kategori_produk ON package.id_kategori_produk=kategori_produk.id_kategori_produk
			LEFT JOIN jenis_cetakan ON package.id_jenis_cetakan=jenis_cetakan.id_jenis_cetakan
			LEFT JOIN ukuran_jenis_cetakan ON jenis_cetakan.id_jenis_cetakan=ukuran_jenis_cetakan.id_jenis_cetakan
			LEFT JOIN sub_jenis_cetakan ON jenis_cetakan.id_jenis_cetakan=sub_jenis_cetakan.id_jenis_cetakan
			WHERE package.id_package='$id_package' ORDER BY package.id_package DESC
			")->result();
	} 

	public function ambil_slug_detail_package_join($slug)
	{
		return $this->db->query("SELECT 
			ukuran_jenis_cetakan.*,
			sub_jenis_cetakan.*,
			package.*,
			kategori_produk.*,
			jenis_cetakan.*, 
			package.id_package as id_p,
			package.id_jenis_cetakan as p_id_jc,
			jenis_cetakan.id_jenis_cetakan as jc_id_jc,
			ukuran_jenis_cetakan.id_jenis_cetakan as ujc_id_jc,
			sub_jenis_cetakan.id_jenis_cetakan as sjc_id_jc,
			MIN(harga_ukuran_jenis_cetakan) as harga_terendah,
			MAX(harga_ukuran_jenis_cetakan) as harga_tertinggi,
			MIN(harga_sub_jenis_cetakan) as harga_terendah_sjc,
			MAX(harga_sub_jenis_cetakan) as harga_tertinggi_sjc,
			MIN(berat_ukuran_jenis_cetakan) as berat_terendah,
			MAX(berat_ukuran_jenis_cetakan) as berat_tertinggi
			FROM package
			LEFT JOIN kategori_produk ON package.id_kategori_produk=kategori_produk.id_kategori_produk
			LEFT JOIN jenis_cetakan ON package.id_jenis_cetakan=jenis_cetakan.id_jenis_cetakan
			LEFT JOIN ukuran_jenis_cetakan ON jenis_cetakan.id_jenis_cetakan=ukuran_jenis_cetakan.id_jenis_cetakan
			LEFT JOIN sub_jenis_cetakan ON jenis_cetakan.id_jenis_cetakan=sub_jenis_cetakan.id_jenis_cetakan
			WHERE kategori_produk.slug_kategori_produk='$slug' ORDER BY package.id_package DESC LIMIT 4
			")->result();
	} 

	public function ambil_detail_package_join($slug)
	{
		return $this->db->query("SELECT * FROM package p, kategori_produk kp, jenis_cetakan jc WHERE p.id_kategori_produk=kp.id_kategori_produk AND p.id_jenis_cetakan=jc.id_jenis_cetakan AND p.slug_package='$slug' ORDER BY p.id_package DESC")->result();
	} 

	public function hapus_data($where,$table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function ambil_pencarian_package_join($keyword_package)
	{
		$this->db->select('*');
		$this->db->from('package');
		$this->db->join('kategori_produk', 'kategori_produk.id_kategori_produk = package.id_kategori_produk');
		$this->db->like('nama_package', $keyword_package);
		$this->db->or_like('variasi_package', $keyword_package);
		$this->db->or_like('harga_package', $keyword_package);
		$this->db->or_like('diskon_package', $keyword_package);
		$this->db->or_like('deskripsi_package', $keyword_package);
		return $this->db->get()->result();
	}
	

}

/* End of file Package_model.php */
/* Location: ./application/models/Package_model.php */
