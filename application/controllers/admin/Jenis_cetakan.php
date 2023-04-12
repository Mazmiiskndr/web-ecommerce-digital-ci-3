<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis_cetakan extends CI_Controller {

	// Cek Level Akses & Cek Login
	public function __construct()
    {
        parent::__construct();  
        cek_login();
        cek_user();
    } 

	// View Index Jenis Cetakan
	public function index()
	{
		$data['title'] = "Jenis Cetakan - JangmarArt";
		$data['jenis_cetakan'] = $this->jenis_cetakan_model->tampil_data('jenis_cetakan')->result();
		$data['kategori_produk'] = $this->kategori_produk_model->tampil_data('kategori_produk')->result();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/topbar');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/jenis_cetakan/index');
		$this->load->view('templates_admin/footer');		
	}


	// View Tambah Jenis Cetakan
	public function tambah_data()
	{
		$data['title'] = "Tambah Data Jenis Cetakan - JangmarArt";
		$data['kategori_produk'] = $this->kategori_produk_model->tampil_data('kategori_produk')->result();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/topbar');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/jenis_cetakan/tambah_data');
		$this->load->view('templates_admin/footer');	
	}

	// Aksi Tambah Data Jenis Cetakan
	public function tambah_data_aksi()
	{
		$this->_rulesJenis_Cetakan();
		if($this->form_validation->run() == false){
			$this->tambah_data();
		}else{
			$nama_jenis_cetakan 			= htmlspecialchars($this->input->post('nama_jenis_cetakan'));

			$data = array(
				'nama_jenis_cetakan' 	=> $nama_jenis_cetakan,
			);

			$this->jenis_cetakan_model->insert_jenis_cetakan($data,'jenis_cetakan');
			$this->session->set_flashdata('pesan','
				<div class="alert alert-success" role="alert">
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>
				<i class="fa fa-check-circle-o me-2" aria-hidden="true"></i> Data Jenis Cetakan Berhasil di <strong>Tambahkan!</strong>
				</div>
				'); 
			redirect('admin/jenis_cetakan');
		}

	}

	// View Edit Data Jenis Cetakan
	public function edit_data($id)
	{
		$data['title'] = "Edit Data Jenis Cetakan - JangmarArt";
		$data['detail'] = $this->jenis_cetakan_model->ambil_id_jenis_cetakan($id);
		$data['kategori_produk'] = $this->kategori_produk_model->tampil_data('kategori_produk')->result();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/topbar');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/jenis_cetakan/edit_data');
		$this->load->view('templates_admin/footer');	
	}

	// Aksi Edit Data Jenis Cetakan
	public function edit_data_aksi()
	{
		$id_jenis_cetakan 	= $this->input->post('id_jenis_cetakan');
		$nama_jenis_cetakan 	= $this->input->post('nama_jenis_cetakan');

		
		$data = array(
			'nama_jenis_cetakan' 	=> $nama_jenis_cetakan,
		);

		$where = array('id_jenis_cetakan' => $id_jenis_cetakan);

		$this->jenis_cetakan_model->update_data($where,$data,'jenis_cetakan');
		$this->session->set_flashdata('pesan','
			<div class="alert alert-info" role="alert">
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>
			<i class="fa fa-edit me-2" aria-hidden="true"></i> Data Jenis Cetakan Berhasil di <strong>Update!</strong>
			</div>
			');
		redirect('admin/jenis_cetakan');
	}

	// Hapus Data Jenis Cetakan
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
		// 	redirect('admin/jenis_cetakan');
		// }else{

		// }

		$where = array('id_jenis_cetakan' => $id);
		$this->jenis_cetakan_model->hapus_data($where,'jenis_cetakan');
		$this->session->set_flashdata('pesan','
			<div class="alert alert-danger" role="alert">
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>
			<i class="fa fa-times-circle me-2" aria-hidden="true"></i> Data Jenis Cetakan Berhasil di <strong>Hapus!</strong>
			</div>
			');
		redirect('admin/jenis_cetakan');
		
	}

	// Form Validation Jenis Cetakan
	public function _rulesJenis_Cetakan()
	{
		$this->form_validation->set_rules('nama_jenis_cetakan','Nama Jenis Cetakan','required',
			[
				'required' => "Nama Jenis Cetakan tidak boleh kosong",
			]
		);
		
	}

}

/* End of file Jenis_cetakan.php */
/* Location: ./application/controllers/admin/Jenis_cetakan.php */