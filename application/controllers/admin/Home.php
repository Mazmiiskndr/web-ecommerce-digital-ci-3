<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	// Cek Level Akses & Cek Login
	public function __construct()
	{
		parent::__construct();  
		cek_login();
		cek_user();
	} 

	public function index()
	{
		$data['title'] = "Home - JangmarArt";

		// Tampil Data Home
		$data['home'] = $this->home_model->get_site_data()->row_array();
		// End Tampil Data Home

		$data['kategori_produk'] = $this->kategori_produk_model->tampil_data('kategori_produk')->result();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/topbar');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/home/index');
		$this->load->view('templates_admin/footer');
	} 


	// Aksi Edit Data Home
	public function edit_data_aksi()
	{
		$this->form_validation->set_rules('judul_home1','Judul Home 1','required',
			[
				'required' => "Judul Home 1 tidak boleh kosong",
			]
		);
		$this->form_validation->set_rules('judul_home2','Judul Home 2','required',
			[
				'required' => "Judul Home 2 tidak boleh kosong",
			]
		);

		if($this->form_validation->run() == false){
			$this->index();
		}else{

			$id_home 			= $this->input->post('id_home');
			$judul_home1 		= $this->input->post('judul_home1');
			$deskripsi_home1 	= $this->input->post('deskripsi_home1');
			$judul_home2 		= $this->input->post('judul_home2');
			$deskripsi_home2 	= $this->input->post('deskripsi_home2');

			$gambar_home1 		= $_FILES['gambar_home1']['name'];
			$gambar_home2 	= $_FILES['gambar_home2']['name'];

			// Thumbnail
			if($gambar_home1){
				$config ['upload_path'] = './assets/uploads/home';
				$config ['allowed_types'] = 'jpg|jpeg|png|pdf|doc|docx';

				$this->load->library('upload', $config);

				if( $this->upload->do_upload('gambar_home1') ){
					$gambar_home1 = $this->upload->data('file_name');
					$this->db->set('gambar_home1',$gambar_home1);
				}else{

					echo "Photo Banner Gagal Diupload!";

				}
			}

			if($gambar_home2){
				$config ['upload_path'] = './assets/uploads/home';
				$config ['allowed_types'] = 'jpg|jpeg|png|pdf|doc|docx';

				$this->load->library('upload', $config);

				if( $this->upload->do_upload('gambar_home2') ){
					$gambar_home2 = $this->upload->data('file_name');
					$this->db->set('gambar_home2',$gambar_home2);
				}else{

					echo "Photo Banner Gagal Diupload!";

				}
			}

			$data = array(
				'judul_home1' 		=> $judul_home1,
				'deskripsi_home1' 	=> $deskripsi_home1,
				'judul_home2' 		=> $judul_home2,
				'deskripsi_home2' 	=> $deskripsi_home2
			);

			$where = array('id_home' => $id_home);

			$this->home_model->update_data($where,$data,'home');
			$this->session->set_flashdata('pesan','
				<div class="alert alert-info" role="alert">
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>
				<i class="fa fa-edit me-2" aria-hidden="true"></i> Data Home Berhasil di <strong>Update!</strong>
				</div>
				');
			redirect('admin/home');
		}
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/admin/Home.php */