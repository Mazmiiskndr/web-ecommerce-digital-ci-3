<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Kategori_produk_model extends CI_Model {

	public function get_jumlah_kategori_produk()
	{
		$sql = "SELECT count(id_kategori_produk) as id_kategori_produk FROM kategori_produk";
		$result = $this->db->query($sql);
		return $result->row()->id_kategori_produk;
	}


	public function tampil_data($table)
	{
		return $this->db->get($table);
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



	public function insert_kategori_produk($data,$table)
	{
		$this->db->insert($table,$data);
	}

	public function update_data($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	} 

	public function ambil_id_kategori_produk($id)
	{
		$result = $this->db->where('id_kategori_produk',$id)->get('kategori_produk');
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

/* End of file Kategori_produk_model.php */
/* Location: ./application/models/Kategori_produk_model.php */