<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tambahan_biaya extends CI_Controller {

	// Cek Level Akses & Cek Login
	public function __construct()
    {
        parent::__construct();  
        cek_login();
        cek_user();
    } 

	// View Index Tambahan Biaya
	public function index()
	{
		$data['title'] = "Tambahan Biaya - JangmarArt";
		$data['tambahan_biaya'] = $this->tambahan_biaya_model->tampil_data('tambahan_biaya')->result();
		$data['kategori_produk'] = $this->kategori_produk_model->tampil_data('kategori_produk')->result();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/topbar');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/tambahan_biaya/index');
		$this->load->view('templates_admin/footer');		
	}


	// View Tambah Tambahan Biaya
	public function tambah_data()
	{
		$data['title'] = "Tambah Data Tambahan Biaya - JangmarArt";
		$data['kategori_produk'] = $this->kategori_produk_model->tampil_data('kategori_produk')->result();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/topbar');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/tambahan_biaya/tambah_data');
		$this->load->view('templates_admin/footer');	
	}

	// Aksi Tambah Data Tambahan Biaya
	public function tambah_data_aksi()
	{
		$this->_rulesTambahan_biaya();
		if($this->form_validation->run() == false){
			$this->tambah_data();
		}else{
			$nama_tambahan_biaya 		= htmlspecialchars($this->input->post('nama_tambahan_biaya'));
			$deskripsi_tambahan_biaya 	= htmlspecialchars($this->input->post('deskripsi_tambahan_biaya'));
			$harga_tambahan_biaya 		= $this->input->post('harga_tambahan_biaya');

			$data = array(
				'nama_tambahan_biaya' 		=> $nama_tambahan_biaya,
				'deskripsi_tambahan_biaya' 	=> $deskripsi_tambahan_biaya,
				'harga_tambahan_biaya' 		=> $harga_tambahan_biaya
			);

			$this->tambahan_biaya_model->insert_tambahan_biaya($data,'tambahan_biaya');
			$this->session->set_flashdata('pesan','
				<div class="alert alert-success" role="alert">
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>
				<i class="fa fa-check-circle-o me-2" aria-hidden="true"></i> Data Tambahan Biaya Berhasil di <strong>Tambahkan!</strong>
				</div>
				'); 
			redirect('admin/tambahan_biaya');
		}

	}

	// View Edit Data Tambahan Biaya
	public function edit_data($id)
	{
		$data['title'] = "Edit Data Tambahan Biaya - JangmarArt";
		$data['detail'] = $this->tambahan_biaya_model->ambil_id_tambahan_biaya($id);
		$data['kategori_produk'] = $this->kategori_produk_model->tampil_data('kategori_produk')->result();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/topbar');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/tambahan_biaya/edit_data');
		$this->load->view('templates_admin/footer');	
	}

	// Aksi Edit Data Tambahan Biaya
	public function edit_data_aksi()
	{
		$id_tambahan_biaya 			= $this->input->post('id_tambahan_biaya');
		$nama_tambahan_biaya 		= $this->input->post('nama_tambahan_biaya');
		$deskripsi_tambahan_biaya 	= htmlspecialchars($this->input->post('deskripsi_tambahan_biaya'));
		$harga_tambahan_biaya 		= $this->input->post('harga_tambahan_biaya');
		
		$data = array(
			'nama_tambahan_biaya' 		=> $nama_tambahan_biaya,
			'deskripsi_tambahan_biaya' 	=> $deskripsi_tambahan_biaya,
			'harga_tambahan_biaya' 	=> $harga_tambahan_biaya
		);

		$where = array('id_tambahan_biaya' => $id_tambahan_biaya);

		$this->tambahan_biaya_model->update_data($where,$data,'tambahan_biaya');
		$this->session->set_flashdata('pesan','
			<div class="alert alert-info" role="alert">
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>
			<i class="fa fa-edit me-2" aria-hidden="true"></i> Data Tambahan Biaya Berhasil di <strong>Update!</strong>
			</div>
			');
		redirect('admin/tambahan_biaya');
	}

	// Hapus Data Tambahan Biaya
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
		// 	redirect('admin/tambahan_biaya');
		// }else{

		// }

		$where = array('id_tambahan_biaya' => $id);
		$this->tambahan_biaya_model->hapus_data($where,'tambahan_biaya');
		$this->session->set_flashdata('pesan','
			<div class="alert alert-danger" role="alert">
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>
			<i class="fa fa-times-circle me-2" aria-hidden="true"></i> Data Tambahan Biaya Berhasil di <strong>Hapus!</strong>
			</div>
			');
		redirect('admin/tambahan_biaya');
		
	}

	// Form Validation Tambahan Biaya
	public function _rulesTambahan_biaya()
	{
		$this->form_validation->set_rules('nama_tambahan_biaya','Nama Tambahan Biaya','required',
			[
				'required' => "Nama Tambahan Biaya tidak boleh kosong",
			]
		);
		$this->form_validation->set_rules('harga_tambahan_biaya','Harga Tambahan','required',
			[
				'required' => "Harga tidak boleh kosong",
			]
		);
		
	}

}

/* End of file Tambahan_biaya.php */
/* Location: ./application/controllers/admin/Tambahan_biaya.php */