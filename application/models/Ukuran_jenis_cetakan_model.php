<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Ukuran_jenis_cetakan_model extends CI_Model {

	public function get_jumlah_ukuran_jenis_cetakan()
	{
		$sql = "SELECT count(id_ukuran_jenis_cetakan) as id_ukuran_jenis_cetakan FROM ukuran_jenis_cetakan";
		$result = $this->db->query($sql);
		return $result->row()->id_ukuran_jenis_cetakan;
	}


	public function tampil_data($table)
	{
		return $this->db->get($table);
	} 

	public function tampil_data_join()
	{
		return $this->db->query("SELECT * FROM ukuran_jenis_cetakan ujc, jenis_cetakan jc WHERE ujc.id_jenis_cetakan=jc.id_jenis_cetakan ORDER BY ujc.id_ukuran_jenis_cetakan ASC")->result();
	} 
 	
 	public function tampil_data_rentang_harga()
	{
		return $this->db->query("SELECT 
			ukuran_jenis_cetakan.*,
			softfile_print.*,
			jenis_cetakan.*,
			MIN(harga_ukuran_jenis_cetakan) as harga_terendah_ukuran_jenis_cetakan,
			MAX(harga_ukuran_jenis_cetakan) as harga_tertinggi_ukuran_jenis_cetakan
			FROM ukuran_jenis_cetakan 
			LEFT JOIN jenis_cetakan ON ukuran_jenis_cetakan.id_jenis_cetakan=jenis_cetakan.id_jenis_cetakan
			LEFT JOIN softfile_print ON softfile_print.id_jenis_cetakan=jenis_cetakan.id_jenis_cetakan
			ORDER BY ukuran_jenis_cetakan.id_ukuran_jenis_cetakan DESC
			")->row_array();
	}

	public function tampil_data_join2()
	{
		return $this->db->query("SELECT MIN(ujc.harga_ukuran_jenis_cetakan) as harga_terendah, 
			MAX(ujc.harga_ukuran_jenis_cetakan) as harga_tertinggi,
			id_ukuran_jenis_cetakan,
			MIN(ujc.berat_ukuran_jenis_cetakan) as berat_terendah, 
			MAX(ujc.berat_ukuran_jenis_cetakan) as berat_tertinggi,
			id_ukuran_jenis_cetakan,
			ujc.id_jenis_cetakan,
			nama_ukuran_jenis_cetakan,harga_ukuran_jenis_cetakan FROM ukuran_jenis_cetakan as ujc,
			jenis_cetakan as jc,
			softfile_print as sp WHERE ujc.id_jenis_cetakan=jc.id_jenis_cetakan AND sp.id_jenis_cetakan=jc.id_jenis_cetakan ORDER BY ujc.id_ukuran_jenis_cetakan ASC")->result();
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



	public function insert_ukuran_jenis_cetakan($data,$table)
	{
		$this->db->insert($table,$data);
	}

	public function update_data($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	} 

	public function ambil_id_ukuran_jenis_cetakan($id)
	{
		$result = $this->db->where('id_ukuran_jenis_cetakan',$id)->get('ukuran_jenis_cetakan');
		if($result->num_rows() > 0){
			return $result->result();
		}else{
			return false;
		}
	} 
	public function ambil_id_ukuran_jenis_cetakan_join($id)
	{
		return $this->db->query("SELECT * FROM ukuran_jenis_cetakan ujc, jenis_cetakan jc WHERE ujc.id_jenis_cetakan=jc.id_jenis_cetakan AND ujc.id_ukuran_jenis_cetakan='$id' ORDER BY ujc.id_ukuran_jenis_cetakan ASC")->result();
	} 

	public function hapus_data($where,$table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
	

}

/* End of file Ukuran_jenis_cetakan_model.php */
/* Location: ./application/models/Ukuran_jenis_cetakan_model.php */