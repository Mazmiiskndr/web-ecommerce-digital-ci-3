<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_produk extends CI_Controller {

	// Cek Level Akses & Cek Login
	public function __construct()
    {
        parent::__construct();  
        cek_login();
        cek_user();
    } 

	// View Index Kategori Produk
	public function index()
	{
		$data['title'] = "Kategori Produk - JangmarArt";
		$data['kategori_produk'] = $this->kategori_produk_model->tampil_data('kategori_produk')->result();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/topbar');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/kategori_produk/index');
		$this->load->view('templates_admin/footer');		
	}

	// View Edit Data Kategori Produk
	public function edit_data($id)
	{
		$data['title'] = "Edit Data Kategori Produk - JangmarArt";
		$data['detail'] = $this->kategori_produk_model->ambil_id_kategori_produk($id);
		$data['kategori_produk'] = $this->kategori_produk_model->tampil_data('kategori_produk')->result();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/topbar');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/kategori_produk/edit_data');
		$this->load->view('templates_admin/footer');	
	}

	// Aksi Edit Data Kategori Produk
	public function edit_data_aksi()
	{
		$id_kategori_produk 	= $this->input->post('id_kategori_produk');
		$nama_kategori_produk 	= $this->input->post('nama_kategori_produk');
		$gambar_kategori_produk = $_FILES['gambar_kategori_produk']['name'];

		if($gambar_kategori_produk){
			$config ['upload_path'] = './assets/uploads/kategori_produk';
			$config ['allowed_types'] = 'jpg|jpeg|png|tiff';

			$this->load->library('upload', $config);

			if( $this->upload->do_upload('gambar_kategori_produk') ){
				$gambar_kategori_produk = $this->upload->data('file_name');
				$this->db->set('gambar_kategori_produk',$gambar_kategori_produk);
			}else{

				echo "Photo Users Gagal Diupload!";
			}
		}

		$data = array(
			'nama_kategori_produk' 	=> $nama_kategori_produk,
		);

		$where = array('id_kategori_produk' => $id_kategori_produk);

		$this->kategori_produk_model->update_data($where,$data,'kategori_produk');
		$this->session->set_flashdata('pesan','
			<div class="alert alert-info" role="alert">
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>
			<i class="fa fa-edit me-2" aria-hidden="true"></i> Data Kategori Produk Berhasil di <strong>Update!</strong>
			</div>
			');
		redirect('admin/kategori_produk');
	}

}

/* End of file Kategori_produk.php */
/* Location: ./application/controllers/admin/Kategori_produk.php */