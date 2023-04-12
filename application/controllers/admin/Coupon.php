<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coupon extends CI_Controller {

	// Cek Level Akses & Cek Login
	public function __construct()
	{
		parent::__construct();  
		cek_login();
		cek_user();
	} 

	// View Index Coupon
	public function index()
	{
		$data['title'] = "Coupon - JangmarArt";
		$data['coupon'] = $this->coupon_model->tampil_data('coupon')->result();
		$data['kategori_produk'] = $this->kategori_produk_model->tampil_data('kategori_produk')->result();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/topbar');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/coupon/index');
		$this->load->view('templates_admin/footer');		
	}


	// View Tambah Coupon
	public function tambah_data()
	{
		$data['title'] = "Tambah Data Coupon - JangmarArt";
		$data['kategori_produk'] = $this->kategori_produk_model->tampil_data('kategori_produk')->result();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/topbar');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/coupon/tambah_data');
		$this->load->view('templates_admin/footer');	
	}

	// Aksi Tambah Data Coupon
	public function tambah_data_aksi()
	{
		$this->_rulesCoupon();
		if($this->form_validation->run() == false){
			$this->tambah_data();
		}else{
			$nama_coupon 			= htmlspecialchars($this->input->post('nama_coupon'));
			$harga_coupon 			= $this->input->post('harga_coupon');
			$sampai_tanggal_coupon 	= $this->input->post('sampai_tanggal_coupon');

			$data = array(
				'nama_coupon' 				=> $nama_coupon,
				'harga_coupon' 				=> $harga_coupon,
				'sampai_tanggal_coupon' 	=> $sampai_tanggal_coupon
			);

			$this->coupon_model->insert_coupon($data,'coupon');
			$this->session->set_flashdata('pesan','
				<div class="alert alert-success" role="alert">
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>
				<i class="fa fa-check-circle-o me-2" aria-hidden="true"></i> Data Coupon Berhasil di <strong>Tambahkan!</strong>
				</div>
				'); 
			redirect('admin/coupon');
		}

	}

	// View Edit Data Coupon
	public function edit_data($id)
	{
		$data['title'] = "Edit Data Coupon - JangmarArt";
		$data['detail'] = $this->coupon_model->ambil_id_coupon($id);
		$data['kategori_produk'] = $this->kategori_produk_model->tampil_data('kategori_produk')->result();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/topbar');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/coupon/edit_data');
		$this->load->view('templates_admin/footer');	
	}

	// Aksi Edit Data Coupon
	public function edit_data_aksi()
	{
		$id_coupon 				= $this->input->post('id_coupon');
		$nama_coupon 			= htmlspecialchars($this->input->post('nama_coupon'));
		$harga_coupon 			= $this->input->post('harga_coupon');
		$sampai_tanggal_coupon 	= $this->input->post('sampai_tanggal_coupon');

		$data = array(
			'nama_coupon' 				=> $nama_coupon,
			'harga_coupon' 				=> $harga_coupon,
			'sampai_tanggal_coupon' 	=> $sampai_tanggal_coupon
		);

		$where = array('id_coupon' => $id_coupon);

		$this->coupon_model->update_data($where,$data,'coupon');
		$this->session->set_flashdata('pesan','
			<div class="alert alert-info" role="alert">
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>
			<i class="fa fa-edit me-2" aria-hidden="true"></i> Data Coupon Berhasil di <strong>Update!</strong>
			</div>
			');
		redirect('admin/coupon');
	}

	// Hapus Data Coupon
	public function hapus_data($id)
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
		// 	redirect('admin/coupon');
		// }else{

		// }

		$where = array('id_coupon' => $id);
		$this->coupon_model->hapus_data($where,'coupon');
		$this->session->set_flashdata('pesan','
			<div class="alert alert-danger" role="alert">
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>
			<i class="fa fa-times-circle me-2" aria-hidden="true"></i> Data Coupon Berhasil di <strong>Hapus!</strong>
			</div>
			');
		redirect('admin/coupon');
		
	}

	// Form Validation Coupon
	public function _rulesCoupon()
	{
		$this->form_validation->set_rules('nama_coupon','Nama Coupon','required',
			[
				'required' => "Nama Coupon tidak boleh kosong",
			]
		);
		$this->form_validation->set_rules('harga_coupon','Harga Coupon','required',
			[
				'required' => "Harga Coupon tidak boleh kosong",
			]
		);
		
	}

}

/* End of file Coupon.php */
/* Location: ./application/controllers/admin/Coupon.php */