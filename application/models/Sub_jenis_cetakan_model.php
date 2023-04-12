<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Sub_jenis_cetakan_model extends CI_Model {

	public function get_jumlah_sub_jenis_cetakan()
	{
		$sql = "SELECT count(id_sub_jenis_cetakan) as id_sub_jenis_cetakan FROM sub_jenis_cetakan";
		$result = $this->db->query($sql);
		return $result->row()->id_sub_jenis_cetakan;
	} 


	public function tampil_data($table)
	{
		return $this->db->get($table);
	} 

	public function tampil_data_join()
	{
		return $this->db->query("SELECT * FROM sub_jenis_cetakan sjc, jenis_cetakan jc WHERE sjc.id_jenis_cetakan=jc.id_jenis_cetakan ORDER BY sjc.id_sub_jenis_cetakan ASC")->result();
	} 

	public function tampil_data_join2()
	{
		return $this->db->query("SELECT MIN(sub.harga_sub_jenis_cetakan) as harga_terendah, 
			MAX(sub.harga_sub_jenis_cetakan) as harga_tertinggi,
			id_sub_jenis_cetakan,
			sub.id_jenis_cetakan,
			nama_sub_jenis_cetakan,harga_sub_jenis_cetakan FROM sub_jenis_cetakan as sub,
			jenis_cetakan as jc,
			softfile_print as sp WHERE sub.id_jenis_cetakan=jc.id_jenis_cetakan AND sp.id_jenis_cetakan=jc.id_jenis_cetakan ORDER BY sub.id_sub_jenis_cetakan ASC")->result();
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

	public function ambil_id_sub_jenis_cetakan_join($id)
	{
		return $this->db->query("SELECT * FROM sub_jenis_cetakan sjc, jenis_cetakan jc WHERE sjc.id_jenis_cetakan=jc.id_jenis_cetakan AND sjc.id_sub_jenis_cetakan='$id' ORDER BY sjc.id_sub_jenis_cetakan ASC")->result();
	} 


	public function insert_sub_jenis_cetakan($data,$table)
	{
		$this->db->insert($table,$data);
	}

	public function update_data($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	} 

	public function ambil_id_sub_jenis_cetakan($id)
	{
		$result = $this->db->where('id_sub_jenis_cetakan',$id)->get('sub_jenis_cetakan');
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

/* End of file Sub_jenis_cetakan_model.php */
/* Location: ./application/models/Sub_jenis_cetakan_model.php */