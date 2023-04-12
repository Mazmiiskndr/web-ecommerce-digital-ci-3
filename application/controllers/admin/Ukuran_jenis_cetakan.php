<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ukuran_jenis_cetakan extends CI_Controller {

	// Cek Level Akses & Cek Login
	public function __construct()
    {
        parent::__construct();  
        cek_login();
        cek_user();
    } 

	// View Index Ukuran Cetakan
	public function index()
	{
		$data['title'] = "Ukuran Cetakan - JangmarArt";
		$data['ukuran_jenis_cetakan'] = $this->ukuran_jenis_cetakan_model->tampil_data_join();
		$data['kategori_produk'] = $this->kategori_produk_model->tampil_data('kategori_produk')->result();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/topbar');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/ukuran_jenis_cetakan/index');
		$this->load->view('templates_admin/footer');		
	}


	// View Tambah Ukuran Cetakan
	public function tambah_data()
	{
		$data['title'] = "Tambah Data Ukuran Cetakan - JangmarArt";
		$data['jenis_cetakan'] = $this->jenis_cetakan_model->tampil_data('jenis_cetakan')->result();
		$data['kategori_produk'] = $this->kategori_produk_model->tampil_data('kategori_produk')->result();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/topbar');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/ukuran_jenis_cetakan/tambah_data');
		$this->load->view('templates_admin/footer');	
	}

	// Aksi Tambah Data Ukuran Cetakan
	public function tambah_data_aksi()
	{
		$this->_rulesUkuran_jenis_cetakan();
		if($this->form_validation->run() == false){
			$this->tambah_data();
		}else{
			$id_jenis_cetakan 			= htmlspecialchars($this->input->post('id_jenis_cetakan'));
			$nama_ukuran_jenis_cetakan 	= htmlspecialchars($this->input->post('nama_ukuran_jenis_cetakan'));
			$berat_ukuran_jenis_cetakan 	= htmlspecialchars($this->input->post('berat_ukuran_jenis_cetakan'));

			$harga_ukuran_jenis_cetakan 	= $this->input->post('harga_ukuran_jenis_cetakan');

			$data = array(
				'id_jenis_cetakan' 				=> $id_jenis_cetakan,
				'harga_ukuran_jenis_cetakan' 	=> $harga_ukuran_jenis_cetakan,
				'berat_ukuran_jenis_cetakan' 	=> $berat_ukuran_jenis_cetakan,
				'nama_ukuran_jenis_cetakan' 	=> $nama_ukuran_jenis_cetakan
			);

			$this->ukuran_jenis_cetakan_model->insert_ukuran_jenis_cetakan($data,'ukuran_jenis_cetakan');
			$this->session->set_flashdata('pesan','
				<div class="alert alert-success" role="alert">
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>
				<i class="fa fa-check-circle-o me-2" aria-hidden="true"></i> Data Ukuran Cetakan Berhasil di <strong>Tambahkan!</strong>
				</div>
				'); 
			redirect('admin/ukuran_jenis_cetakan');
		}

	}

	// View Edit Data Ukuran Cetakan
	public function edit_data($id)
	{
		$data['title'] = "Edit Data Ukuran Cetakan - JangmarArt";
		$data['detail'] = $this->ukuran_jenis_cetakan_model->ambil_id_ukuran_jenis_cetakan_join($id);
		$data['jenis_cetakan'] = $this->jenis_cetakan_model->tampil_data('jenis_cetakan')->result();
		$data['kategori_produk'] = $this->kategori_produk_model->tampil_data('kategori_produk')->result();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/topbar');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/ukuran_jenis_cetakan/edit_data');
		$this->load->view('templates_admin/footer');	
	}

	// Aksi Edit Data Ukuran Cetakan
	public function edit_data_aksi()
	{
		$id_ukuran_jenis_cetakan 	= $this->input->post('id_ukuran_jenis_cetakan');
		$id_jenis_cetakan 			= $this->input->post('id_jenis_cetakan');
		$nama_ukuran_jenis_cetakan 	= $this->input->post('nama_ukuran_jenis_cetakan');
		$berat_ukuran_jenis_cetakan 	= $this->input->post('berat_ukuran_jenis_cetakan');
		$harga_ukuran_jenis_cetakan 	= $this->input->post('harga_ukuran_jenis_cetakan');

		
		$data = array(
			'id_jenis_cetakan' 				=> $id_jenis_cetakan,
			'harga_ukuran_jenis_cetakan' 	=> $harga_ukuran_jenis_cetakan,
			'berat_ukuran_jenis_cetakan' 	=> $berat_ukuran_jenis_cetakan,
			'nama_ukuran_jenis_cetakan' 	=> $nama_ukuran_jenis_cetakan
		);

		$where = array('id_ukuran_jenis_cetakan' => $id_ukuran_jenis_cetakan);

		$this->ukuran_jenis_cetakan_model->update_data($where,$data,'ukuran_jenis_cetakan');
		$this->session->set_flashdata('pesan','
			<div class="alert alert-info" role="alert">
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>
			<i class="fa fa-edit me-2" aria-hidden="true"></i> Data Ukuran Cetakan Berhasil di <strong>Update!</strong>
			</div>
			');
		redirect('admin/ukuran_jenis_cetakan');
	}

	// Hapus Data Ukuran Cetakan
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

		$where = array('id_ukuran_jenis_cetakan' => $id);
		$this->ukuran_jenis_cetakan_model->hapus_data($where,'ukuran_jenis_cetakan');
		$this->session->set_flashdata('pesan','
			<div class="alert alert-danger" role="alert">
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>
			<i class="fa fa-times-circle me-2" aria-hidden="true"></i> Data Ukuran Berhasil di <strong>Hapus!</strong>
			</div>
			');
		redirect('admin/ukuran_jenis_cetakan');
		
	}

	// Form Validation Ukuran Cetakan
	public function _rulesUkuran_jenis_cetakan()
	{
		$this->form_validation->set_rules('nama_ukuran_jenis_cetakan',' Ukuran Cetakan','required',
			[
				'required' => "Ukuran Cetakan tidak boleh kosong",
			]
		);
		$this->form_validation->set_rules('harga_ukuran_jenis_cetakan',' Ukuran Cetakan','required',
			[
				'required' => "Harga Cetakan tidak boleh kosong",
			]
		);
		$this->form_validation->set_rules('berat_ukuran_jenis_cetakan',' Ukuran Cetakan','required',
			[
				'required' => "Berat Cetakan tidak boleh kosong",
			]
		);
		
	}

}

/* End of file Ukuran_jenis_cetakan.php */
/* Location: ./application/controllers/admin/Ukuran_jenis_cetakan.php */