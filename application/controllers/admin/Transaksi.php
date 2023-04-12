<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	// Cek Level Akses & Cek Login
	public function __construct()
	{
		parent::__construct();  
		cek_login();
		cek_user();
	}  

	public function index()
	{
		$data['title'] = "Laporan & Hasil -  Web JangmarArt";

		// Tampil Produk Transaksi
		$data['transaksi'] = $this->transaksi_model->tampil_produk_transaksi_admin();	
		// End Tampil Produk Transaksi

		$data['kategori_produk'] = $this->kategori_produk_model->tampil_data('kategori_produk')->result();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/topbar');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/transaksi/index');
		$this->load->view('templates_admin/footer');		
	}	

	// View Detail Transaksi 
	public function detail_data($no_transaksi)
	{
		$data['title'] = "Detail Transaksi - JangmarArt" ;
		// Tampil Data Contact
		$data['contact'] = $this->contact_model->get_site_data()->row_array();
		// End Tampil Data Contact

		// Tampil Data Coupon 
		$data['coupon'] = $this->coupon_model->tampil_data_apply_coupon();
			// End Tampil Data Coupon 
			// Cek Coupon

		if($data['coupon']){
			if($data['coupon']['sampai_tanggal_coupon'] <=  date("Y-m-d")){
				$id_apply_coupon = $data['coupon']['id_applycoupon'];
				$where = array('id_applycoupon' => $id_apply_coupon);
				$this->coupon_model->hapus_data($where,'applycoupon');
			}else{

			}
		} 
			// End Cek Coupon

		// Tampil Data Transaksi
		$data['produk_transaksi'] = $this->transaksi_model->tampil_produk_transaksi_detail_join($no_transaksi);
		$data['detail'] = $this->transaksi_model->tampil_transaksi_detail_join($no_transaksi);
		// End Tampil Data Transaksi

		$data['kategori_produk'] = $this->kategori_produk_model->tampil_data('kategori_produk')->result();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/topbar');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/transaksi/detail_transaksi');
		$this->load->view('templates_admin/footer');	
	} 


	// View Edit Data Transaksi 
	public function edit_data($no_transaksi)
	{
		$data['title'] = "Edit Data Transaksi - JangmarArt" ;

		// Tampil Data Transaksi
		$data['detail'] = $this->transaksi_model->tampil_transaksi_detail_join($no_transaksi);
		// End Tampil Data Transaksi

		$data['kategori_produk'] = $this->kategori_produk_model->tampil_data('kategori_produk')->result();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/topbar');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/transaksi/edit_data');
		$this->load->view('templates_admin/footer');	
	} 

	// Aksi Edit Data Aksi Transaksi
	public function edit_data_aksi()
	{
		$id_transaksi 		= $this->input->post('id_transaksi');
		$status_pembayaran 	= $this->input->post('status_pembayaran');
		$status_transaksi 	= $this->input->post('status_transaksi');
		$no_resi 			= $this->input->post('no_resi');

		
		$data = array(
			'status_pembayaran' 	=> $status_pembayaran,
			'status_transaksi' 		=> $status_transaksi,
			'no_resi' 				=> $no_resi,
		);

		$where = array('id_transaksi' => $id_transaksi);

		$this->transaksi_model->update_data($where,$data,'transaksi');
		$this->session->set_flashdata('pesan','
			<div class="alert alert-info" role="alert">
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>
			<i class="fa fa-edit me-2" aria-hidden="true"></i> Data Transaksi Berhasil di <strong>Update!</strong>
			</div>
			');
		redirect('admin/transaksi');
	}


	// Aksi Edit Data Kategori Produk
	public function upload_file()
	{
		$id_produk_transaksi 	= $this->input->post('id_produk_transaksi');
		$dokumen_file = $_FILES['dokumen_file']['name'];

		if($dokumen_file){
			$config ['upload_path'] = './assets/uploads/upload_file';
			$config ['allowed_types'] = 'jpg|jpeg|png|tiff';

			$this->load->library('upload', $config);

			if( $this->upload->do_upload('dokumen_file') ){
				$dokumen_file = $this->upload->data('file_name');
				$this->db->set('dokumen_file',$dokumen_file);
			}else{

				echo "Dokumen File Gagal Diupload!";
			}
		}


		$where = array('id_produk_transaksi' => $id_produk_transaksi);

		$this->transaksi_model->upload_data($where,'produk_transaksi');
		$this->session->set_flashdata('pesan','
			<div class="alert alert-info" role="alert">
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>
			<i class="fa fa-edit me-2" aria-hidden="true"></i> Data Transaksi Berhasil di <strong>Update!</strong>
			</div>
			');
		redirect('admin/transaksi');
	}

	// Hapus Data Transaksi
	public function hapus_data($no_transaksi)
	{
		// if ($this->session->userdata('id_users') != 1){
		// 	$this->session->set_flashdata('pesan','
		// 		<div class="alert alert-warning alert-dismissible fade show" role="alert">
		// 		Maaf Anda bukan <strong>Admin!</strong>
		// 		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		// 		<span aria-hidden="true">&times;</span>
		// 		</button>
		// 		</div>
		// 		');
		// 	redirect('admin/jenis_cetakan');
		// }else{

		// }

		$where = array('no_transaksi' => $no_transaksi);
		$this->transaksi_model->hapus_data($where,'transaksi');
		$this->session->set_flashdata('pesan','
			<div class="alert alert-danger" role="alert">
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>
			<i class="fa fa-times-circle me-2" aria-hidden="true"></i> Data Transaksi Berhasil di <strong>Hapus!</strong>
			</div>
			');
		redirect('admin/transaksi');
		
	}



	// View Konfirmasi Status Pembayaran
	public function konfirmasi_pembayaran($id)
	{
		$data['title'] = "Konfirmasi Status Pembayaran - JangmarArt";
		$data['detail'] = $this->transaksi_model->ambil_id_transaksi_bukti_pembayaran($id);
		$data['kategori_produk'] = $this->kategori_produk_model->tampil_data('kategori_produk')->result();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/topbar');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/transaksi/konfirmasi_pembayaran');
		$this->load->view('templates_admin/footer');	
	}

	// Aksi Konfirmasi Status Pembayaran
	public function konfirmasi_pembayaran_aksi()
	{
		$id_transaksi 		= $this->input->post('id_transaksi');
		$status_pembayaran 	= $this->input->post('status_pembayaran');

		
		$data = array(
			'status_pembayaran' 	=> $status_pembayaran,
		);

		$where = array('id_transaksi' => $id_transaksi);

		$this->transaksi_model->update_data($where,$data,'transaksi');
		$this->session->set_flashdata('pesan','
			<div class="alert alert-info" role="alert">
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>
			<i class="fa fa-edit me-2" aria-hidden="true"></i> Data Transaksi Berhasil di <strong>Update!</strong>
			</div>
			');
		redirect('admin/transaksi');
	}

	public function download_bukti_pembayaran($id)
	{
		$this->load->helper('download');
		$filePembayaran = $this->transaksi_model->downloadBukti_pembayaran($id);
		$file = 'assets/uploads/bukti_pembayaran/'.$filePembayaran['bukti_pembayaran'];
		force_download($file, null);
		redirect($this->agent->referrer());
	}
	public function download_retur($id)
	{
		$this->load->helper('download');
		$fileretur = $this->transaksi_model->downloadBukti_retur($id);
		$file = 'assets/uploads/retur/'.$fileretur['file_retur'];
		force_download($file, null);
		redirect($this->agent->referrer());
	}
}

/* End of file Transaksi.php */
/* Location: ./application/controllers/admin/Transaksi.php */