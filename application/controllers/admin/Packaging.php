<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Packaging extends CI_Controller {

	// Cek Level Akses & Cek Login
	public function __construct()
	{
		parent::__construct();  
		cek_login();
		cek_user();
	} 

	// View Index Packaging
	public function index()
	{
		$data['title'] = "Packaging - JangmarArt";
		$data['packaging'] = $this->packaging_model->tampil_data('packaging')->result();
		$data['kategori_produk'] = $this->kategori_produk_model->tampil_data('kategori_produk')->result();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/topbar');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/packaging/index');
		$this->load->view('templates_admin/footer');		
	}


	// View Tambah Packaging
	public function tambah_data()
	{
		$data['title'] = "Tambah Data Packaging - JangmarArt";
		$data['kategori_produk'] = $this->kategori_produk_model->tampil_data('kategori_produk')->result();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/topbar');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/packaging/tambah_data');
		$this->load->view('templates_admin/footer');	
	}

	// Aksi Tambah Data Packaging
	public function tambah_data_aksi()
	{
		$this->_rulesPackaging();
		if($this->form_validation->run() == false){
			$this->tambah_data();
		}else{
			$nama_packaging 		= htmlspecialchars($this->input->post('nama_packaging'));
			$deskripsi_packaging 	= htmlspecialchars($this->input->post('deskripsi_packaging'));
			$harga_packaging 		= $this->input->post('harga_packaging');
			$berat_packaging 		= $this->input->post('berat_packaging');

			$data = array(
				'nama_packaging' 		=> $nama_packaging,
				'deskripsi_packaging' 	=> $deskripsi_packaging,
				'harga_packaging' 		=> $harga_packaging,
				'berat_packaging' 		=> $berat_packaging
			);

			$this->packaging_model->insert_packaging($data,'packaging');
			$this->session->set_flashdata('pesan','
				<div class="alert alert-success" role="alert">
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>
				<i class="fa fa-check-circle-o me-2" aria-hidden="true"></i> Data Packaging Berhasil di <strong>Tambahkan!</strong>
				</div>
				'); 
			redirect('admin/packaging');
		}

	}

	// View Edit Data Packaging
	public function edit_data($id)
	{
		$data['title'] = "Edit Data Packaging - JangmarArt";
		$data['detail'] = $this->packaging_model->ambil_id_packaging($id);
		$data['kategori_produk'] = $this->kategori_produk_model->tampil_data('kategori_produk')->result();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/topbar');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/packaging/edit_data');
		$this->load->view('templates_admin/footer');	
	}

	// Aksi Edit Data Packaging
	public function edit_data_aksi()
	{
		$id_packaging 	= $this->input->post('id_packaging');
		$nama_packaging 		= htmlspecialchars($this->input->post('nama_packaging'));
		$deskripsi_packaging 	= htmlspecialchars($this->input->post('deskripsi_packaging'));
		$harga_packaging 		= $this->input->post('harga_packaging');
		$berat_packaging 		= $this->input->post('berat_packaging');

		
		$data = array(
			'nama_packaging' 		=> $nama_packaging,
			'deskripsi_packaging' 	=> $deskripsi_packaging,
			'harga_packaging' 		=> $harga_packaging,
			'berat_packaging' 		=> $berat_packaging
		);

		$where = array('id_packaging' => $id_packaging);

		$this->packaging_model->update_data($where,$data,'packaging');
		$this->session->set_flashdata('pesan','
			<div class="alert alert-info" role="alert">
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>
			<i class="fa fa-edit me-2" aria-hidden="true"></i> Data Packaging Berhasil di <strong>Update!</strong>
			</div>
			');
		redirect('admin/packaging');
	}

	// Hapus Data Packaging
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
		// 	redirect('admin/packaging');
		// }else{

		// }

		$where = array('id_packaging' => $id);
		$this->packaging_model->hapus_data($where,'packaging');
		$this->session->set_flashdata('pesan','
			<div class="alert alert-danger" role="alert">
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>
			<i class="fa fa-times-circle me-2" aria-hidden="true"></i> Data Packaging Berhasil di <strong>Hapus!</strong>
			</div>
			');
		redirect('admin/packaging');
		
	}

	// Form Validation Packaging
	public function _rulesPackaging()
	{
		$this->form_validation->set_rules('nama_packaging','Nama Packaging','required',
			[
				'required' => "Nama Packaging tidak boleh kosong",
			]
		);
		$this->form_validation->set_rules('harga_packaging','Harga Packaging','required',
			[
				'required' => "Harga tidak boleh kosong",
			]
		);
		$this->form_validation->set_rules('berat_packaging','Berat Packaging','required',
			[
				'required' => "Berat tidak boleh kosong",
			]
		);
		
	}

}

/* End of file Packaging.php */
/* Location: ./application/controllers/admin/Packaging.php */