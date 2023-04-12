<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesan extends CI_Controller {

	// Cek Level Akses & Cek Login
	public function __construct()
    {
        parent::__construct();  
        cek_login();
        cek_user();
    } 

	// View Index Pesan
	public function index()
	{
		$data['title'] = "Pesan - JangmarArt";
		$data['pesan'] = $this->pesan_model->tampil_data('pesan')->result();
		$data['kategori_produk'] = $this->kategori_produk_model->tampil_data('kategori_produk')->result();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/topbar');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/pesan/index');
		$this->load->view('templates_admin/footer');		
	}


	// View Edit Data Pesan
	public function edit_data($id)
	{
		$data['title'] = "Edit Data Pesan - JangmarArt";
		$data['detail'] = $this->pesan_model->ambil_id_pesan($id);
		$data['kategori_produk'] = $this->kategori_produk_model->tampil_data('kategori_produk')->result();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/topbar');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/pesan/edit_data');
		$this->load->view('templates_admin/footer');	
	}

	// Aksi Edit Data Pesan
	public function edit_data_aksi()
	{
		$id_pesan 	= $this->input->post('id_pesan');
		$nama_pesan 	= $this->input->post('nama_pesan');

		
		$data = array(
			'nama_pesan' 	=> $nama_pesan,
		);

		$where = array('id_pesan' => $id_pesan);

		$this->pesan_model->update_data($where,$data,'pesan');
		$this->session->set_flashdata('pesan','
			<div class="alert alert-info" role="alert">
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>
			<i class="fa fa-edit me-2" aria-hidden="true"></i> Data Pesan Berhasil di <strong>Update!</strong>
			</div>
			');
		redirect('admin/pesan');
	}

	// Hapus Data Pesan
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
		// 	redirect('admin/pesan');
		// }else{

		// }

		$where = array('id_pesan' => $id);
		$this->pesan_model->hapus_data($where,'pesan');
		$this->session->set_flashdata('pesan','
			<div class="alert alert-danger" role="alert">
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>
			<i class="fa fa-times-circle me-2" aria-hidden="true"></i> Data Pesan Berhasil di <strong>Hapus!</strong>
			</div>
			');
		redirect('admin/pesan');
		
	}

	// Form Validation Pesan
	public function _rulespesan()
	{
		$this->form_validation->set_rules('nama_pesan','Nama Pesan','required',
			[
				'required' => "Nama Pesan tidak boleh kosong",
			]
		);
		
	}

}

/* End of file Pesan.php */
/* Location: ./application/controllers/admin/Pesan.php */