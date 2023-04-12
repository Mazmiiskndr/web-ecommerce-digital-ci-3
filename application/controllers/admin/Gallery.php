<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {

	// Cek Level Akses & Cek Login
	public function __construct()
	{
		parent::__construct();  
		cek_login();
		cek_user();
	} 

	public function index()
	{
		$data['title'] = "Gallery - JangmarArt";

		// Tampil Data Gallery
		$data['gallery'] = $this->gallery_model->tampil_data('gallery')->result();
		// End Tampil Data Gallery

		$data['kategori_produk'] = $this->kategori_produk_model->tampil_data('kategori_produk')->result();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/topbar');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/gallery/index');
		$this->load->view('templates_admin/footer');
	}


	// View Tambah Gallery
	public function tambah_data()
	{
		$data['title'] = "Tambah Data Gallery - JangmarArt";
		$data['kategori_produk'] = $this->kategori_produk_model->tampil_data('kategori_produk')->result();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/topbar');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/gallery/tambah_data');
		$this->load->view('templates_admin/footer');	
	} 

	// Aksi Tambah Data Gallery
	public function tambah_data_aksi()
	{

		$gambar_gallery 		= $_FILES['gambar_gallery']['name'];

			// Thumbail
		if($gambar_gallery){
			$config ['upload_path'] = './assets/uploads/gallery';
			$config ['allowed_types'] = 'jpg|jpeg|png|pdf|doc|docx';

			$this->load->library('upload', $config);

			if( $this->upload->do_upload('gambar_gallery') ){
				$gambar_gallery = $this->upload->data('file_name');
				$this->db->set('gambar_gallery',$gambar_gallery);
			}else{
				echo "Photo Gallery Gagal Diupload!";

			}
		}else{ 
			$gambar_gallery = '';
		}

		$data = array(
			'gambar_gallery' 	=> $gambar_gallery,
		);

		$this->gallery_model->insert_gallery($data,'gallery');
		$this->session->set_flashdata('pesan','
			<div class="alert alert-success" role="alert">
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>
			<i class="fa fa-check-circle-o me-2" aria-hidden="true"></i> Data Gallery Berhasil di <strong>Tambahkan!</strong>
			</div>
			'); 
		redirect('admin/gallery');
		

	}

	// View Edit Data Gallery
	public function edit_data($id)
	{
		$data['title'] = "Edit Data Gallery - JangmarArt";
		$data['detail'] = $this->gallery_model->ambil_id_gallery($id);
		$data['kategori_produk'] = $this->kategori_produk_model->tampil_data('kategori_produk')->result();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/topbar');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/gallery/edit_data');
		$this->load->view('templates_admin/footer');	
	}

	// Aksi Edit Data Gallery
	public function edit_data_aksi()
	{
		$id_gallery 	= $this->input->post('id_gallery');

		$gambar_gallery 		= $_FILES['gambar_gallery']['name'];


		// Thumbnail
		if($gambar_gallery){
			$config ['upload_path'] = './assets/uploads/gallery';
			$config ['allowed_types'] = 'jpg|jpeg|png|pdf|doc|docx';

			$this->load->library('upload', $config);

			if( $this->upload->do_upload('gambar_gallery') ){
				$gambar_gallery = $this->upload->data('file_name');
				$this->db->set('gambar_gallery',$gambar_softfile_only);
			}else{

				echo "Photo Produk Gagal Diupload!";

			}
		}

		
		$data = array(
			'gambar_gallery' 	=> $gambar_gallery,
		);

		$where = array('id_gallery' => $id_gallery);

		$this->gallery_model->update_data($where,$data,'gallery');
		$this->session->set_flashdata('pesan','
			<div class="alert alert-info" role="alert">
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>
			<i class="fa fa-edit me-2" aria-hidden="true"></i> Data Gallery Berhasil di <strong>Update!</strong>
			</div>
			');
		redirect('admin/gallery');
	}

	// Hapus Data Gallery
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
		// 	redirect('admin/gallery');
		// }else{

		// }

		$where = array('id_gallery' => $id);
		$this->gallery_model->hapus_data($where,'gallery');
		$this->session->set_flashdata('pesan','
			<div class="alert alert-danger" role="alert">
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>
			<i class="fa fa-times-circle me-2" aria-hidden="true"></i> Data Gallery Berhasil di <strong>Hapus!</strong>
			</div>
			');
		redirect('admin/gallery');
		
	}

}

/* End of file Gallery.php */
/* Location: ./application/controllers/admin/Gallery.php */