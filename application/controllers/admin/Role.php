<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Role extends CI_Controller {

	// Cek Level Akses & Cek Login
	public function __construct()
    {
        parent::__construct();  
        cek_login();
        cek_user();
    } 

	// View Index Role
	public function index()
	{
		$data['title'] = "Role - JangmarArt";
		$data['role'] = $this->role_model->tampil_data('role')->result();
		$data['kategori_produk'] = $this->kategori_produk_model->tampil_data('kategori_produk')->result();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/topbar');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/role/index');
		$this->load->view('templates_admin/footer');		
	}

	// View Edit Data Role
	public function edit_data($id)
	{
		$data['title'] = "Edit Data Role - JangmarArt";
		$data['kategori_produk'] = $this->kategori_produk_model->tampil_data('kategori_produk')->result();
		$data['detail'] = $this->role_model->ambil_id_role($id);
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/topbar');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/role/edit_data');
		$this->load->view('templates_admin/footer');	
	}

	// Aksi Edit Data Role
	public function edit_data_aksi()
	{
		$id_role 	= $this->input->post('id_role');
		$nama_role 	= $this->input->post('nama_role');

		$data = array(
			'nama_role' 	=> $nama_role,
		);

		$where = array('id_role' => $id_role);

		$this->role_model->update_data($where,$data,'role');
		$this->session->set_flashdata('pesan','
			<div class="alert alert-info" role="alert">
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>
			<i class="fa fa-edit me-2" aria-hidden="true"></i> Data Role Berhasil di <strong>Update!</strong>
			</div>
			');
		redirect('admin/role');
	}

}

/* End of file Role.php */
/* Location: ./application/controllers/admin/Role.php */