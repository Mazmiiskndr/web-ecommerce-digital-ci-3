<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bank extends CI_Controller {

	// Cek Level Akses & Cek Login
	public function __construct()
    {
        parent::__construct();  
        cek_login();
        cek_user();
    } 

	// View Index Bank
	public function index()
	{
		$data['title'] = "Bank - JangmarArt";
		$data['bank'] = $this->bank_model->tampil_data('bank')->result();
		$data['kategori_produk'] = $this->kategori_produk_model->tampil_data('kategori_produk')->result();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/topbar');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/bank/index');
		$this->load->view('templates_admin/footer');		
	}


	// View Tambah Bank
	public function tambah_data()
	{
		$data['title'] = "Tambah Data Bank - JangmarArt";
		$data['kategori_produk'] = $this->kategori_produk_model->tampil_data('kategori_produk')->result();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/topbar');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/bank/tambah_data');
		$this->load->view('templates_admin/footer');	
	}

	// Aksi Tambah Data Bank
	public function tambah_data_aksi()
	{
		$this->_rulesBank();
		if($this->form_validation->run() == false){
			$this->tambah_data();
		}else{
			$nama_bank 		= htmlspecialchars($this->input->post('nama_bank'));
			$nama_rekening 	= htmlspecialchars($this->input->post('nama_rekening'));
			$nomor_rekening = $this->input->post('nomor_rekening');

			$data = array(
				'nama_bank' 			=> $nama_bank,
				'nama_rekening' 		=> $nama_rekening,
				'nomor_rekening' 		=> $nomor_rekening
			);

			$this->bank_model->insert_bank($data,'bank');
			$this->session->set_flashdata('pesan','
				<div class="alert alert-success" role="alert">
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>
				<i class="fa fa-check-circle-o me-2" aria-hidden="true"></i> Data Bank Berhasil di <strong>Tambahkan!</strong>
				</div>
				'); 
			redirect('admin/bank');
		}

	}

	// View Edit Data Bank
	public function edit_data($id)
	{
		$data['title'] = "Edit Data Bank - JangmarArt";
		$data['detail'] = $this->bank_model->ambil_id_bank($id);
		$data['kategori_produk'] = $this->kategori_produk_model->tampil_data('kategori_produk')->result();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/topbar');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/bank/edit_data');
		$this->load->view('templates_admin/footer');	
	}

	// Aksi Edit Data Bank
	public function edit_data_aksi()
	{
		$id_bank 			= $this->input->post('id_bank');
		$nama_bank 		= $this->input->post('nama_bank');
		$nama_rekening 	= htmlspecialchars($this->input->post('nama_rekening'));
		$nomor_rekening 		= $this->input->post('nomor_rekening');
		
		$data = array(
			'nama_bank' 		=> $nama_bank,
			'nama_rekening' 	=> $nama_rekening,
			'nomor_rekening' 	=> $nomor_rekening
		);

		$where = array('id_bank' => $id_bank);

		$this->bank_model->update_data($where,$data,'bank');
		$this->session->set_flashdata('pesan','
			<div class="alert alert-info" role="alert">
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>
			<i class="fa fa-edit me-2" aria-hidden="true"></i> Data Bank Berhasil di <strong>Update!</strong>
			</div>
			');
		redirect('admin/bank');
	}

	// Hapus Data Bank
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
		// 	redirect('admin/bank');
		// }else{

		// }

		$where = array('id_bank' => $id);
		$this->bank_model->hapus_data($where,'bank');
		$this->session->set_flashdata('pesan','
			<div class="alert alert-danger" role="alert">
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>
			<i class="fa fa-times-circle me-2" aria-hidden="true"></i> Data Bank Berhasil di <strong>Hapus!</strong>
			</div>
			');
		redirect('admin/bank');
		
	}

	// Form Validation Bank
	public function _rulesBank()
	{
		$this->form_validation->set_rules('nama_bank','Nama Bank','required',
			[
				'required' => "Nama Bank tidak boleh kosong",
			]
		);
		$this->form_validation->set_rules('nama_rekening','Nama Rekening','required',
			[
				'required' => "Nama Rekening tidak boleh kosong",
			]
		);
		$this->form_validation->set_rules('nomor_rekening','Nomor Rekening','required',
			[
				'required' => "Nomor Rekening tidak boleh kosong",
			]
		);
		
	}

}

/* End of file Bank.php */
/* Location: ./application/controllers/admin/Bank.php */