<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_model extends CI_Model {

	// public function get_jumlah_transaksi()
	// {
	// 	$sql = "SELECT count(id_transaksi) as id_transaksi FROM transaksi";
	// 	$result = $this->db->query($sql);
	// 	return $result->row()->id_transaksi;
	// }

	public function get_jumlah_transaksi()
	{
		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->like('status_transaksi', '4');
		return $this->db->count_all_results();
	}

	public function get_jumlah_pendapatan()
	{
		$sql = "SELECT SUM(total_bayar) as total_bayar FROM transaksi WHERE transaksi.status_pembayaran=2";
		$result = $this->db->query($sql);
		return $result->row()->total_bayar;
	}


	public function tampil_data($table)
	{
		return $this->db->get($table);
	} 

	public function tampil_data_limit($table)
	{
		return $this->db->get($table, 3);
	}

	public function tampil_transaksi_detail_join($no_transaksi)
	{
		return $this->db->query("SELECT * FROM transaksi t, users u WHERE t.id_users=u.id_users AND t.no_transaksi='$no_transaksi' ORDER BY t.id_transaksi DESC")->result();
	} 

	public function ambil_no_transaksi($no_transaksi)
	{
		return $this->db->query("SELECT * FROM transaksi t, produk_transaksi pt WHERE t.no_transaksi=pt.no_transaksi AND t.no_transaksi='$no_transaksi' ORDER BY pt.id_produk_transaksi DESC")->result();
	} 


	public function tampil_produk_transaksi_detail_join($no_transaksi)
	{ 
		$result  = $this->db->query("SELECT 
			produk_transaksi.*,
			softfile_only.*,
			softfile_only.gambar_softfile_only,
			softfile_print.*,
			kategori_produk.*, 
			package.*,
			print_only.*, 
			produk_transaksi.id_softfile_only as pt_id_so,
			produk_transaksi.id_softfile_print as pt_id_sp,
			produk_transaksi.id_package as pt_id_p,
			kategori_produk.id_kategori_produk as kp_id_kp,
			produk_transaksi.id_print_only as pt_id_po
			FROM produk_transaksi
			LEFT JOIN softfile_only ON produk_transaksi.id_softfile_only=softfile_only.id_softfile_only
			LEFT JOIN softfile_print ON produk_transaksi.id_softfile_print=softfile_print.id_softfile_print
			LEFT JOIN package ON produk_transaksi.id_package=package.id_package
			LEFT JOIN print_only ON produk_transaksi.id_print_only=print_only.id_print_only
			LEFT JOIN kategori_produk ON softfile_only.id_kategori_produk=kategori_produk.id_kategori_produk
			WHERE produk_transaksi.no_transaksi='$no_transaksi' ORDER BY softfile_print.id_softfile_print DESC
			");

		if( $result->num_rows() > 0 ){
			return $result->result();
		}else{
			return array();
		}
	} 

	public function tampil_upload_transaksi_detail_join()
	{
		$result  = $this->db->query("SELECT 
			produk_transaksi.*,
			transaksi.*,
			softfile_only.*,
			softfile_only.gambar_softfile_only,
			softfile_print.*,
			kategori_produk.*, 
			package.*,
			print_only.*, 
			produk_transaksi.id_softfile_only as pt_id_so,
			produk_transaksi.id_softfile_print as pt_id_sp,
			produk_transaksi.id_package as pt_id_p,
			kategori_produk.id_kategori_produk as kp_id_kp,
			produk_transaksi.id_print_only as pt_id_po
			FROM produk_transaksi
			LEFT JOIN softfile_only ON produk_transaksi.id_softfile_only=softfile_only.id_softfile_only
			LEFT JOIN softfile_print ON produk_transaksi.id_softfile_print=softfile_print.id_softfile_print
			LEFT JOIN package ON produk_transaksi.id_package=package.id_package
			LEFT JOIN print_only ON produk_transaksi.id_print_only=print_only.id_print_only
			LEFT JOIN kategori_produk ON softfile_only.id_kategori_produk=kategori_produk.id_kategori_produk
			LEFT JOIN transaksi ON produk_transaksi.no_transaksi=transaksi.no_transaksi
			WHERE produk_transaksi.no_transaksi=transaksi.no_transaksi ORDER BY softfile_print.id_softfile_print DESC
			");

		if( $result->num_rows() > 0 ){
			return $result->result();
		}else{
			return array();
		}
	} 


	public function tampil_produk_transaksi_profil($id_users)
	{
		return $this->db->query("SELECT * FROM transaksi t, users u WHERE t.id_users=u.id_users AND t.id_users='$id_users' ORDER BY t.id_transaksi DESC")->result();
	} 

	public function tampil_produk_transaksi_admin()
	{
		return $this->db->query("SELECT * FROM transaksi t, users u WHERE t.id_users=u.id_users ORDER BY t.id_transaksi DESC")->result();
	} 


	public function update_password($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	} 

	public function downloadBukti_pembayaran($id)
	{
		$query = $this->db->get_where('transaksi',array('id_transaksi' => $id));
		return $query->row_array();
	}
	public function downloadBukti_retur($id)
	{
		$query = $this->db->get_where('transaksi',array('id_transaksi' => $id));
		return $query->row_array();
	}
	public function downloadProduct($id)
	{
		$query = $this->db->get_where('produk_transaksi',array('id_produk_transaksi' => $id));
		return $query->row_array();
	}

	public function insert_transaksi($data,$table)
	{
		$this->db->insert($table,$data);
	}

	public function update_data($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	} 
	public function upload_data($where,$table)
	{
		$this->db->where($where);
		$this->db->update($table);
	} 

	public function ambil_id_transaksi($id)
	{
		$result = $this->db->where('id_transaksi',$id)->get('transaksi');
		if($result->num_rows() > 0){
			return $result->result();
		}else{
			return false;
		}
	} 

	public function ambil_id_transaksi_bukti_pembayaran($id)
	{
		$result = $this->db->where('id_transaksi',$id)->get('transaksi');
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

/* End of file Transaksi_model.php */
/* Location: ./application/models/Transaksi_model.php */