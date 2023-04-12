<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {

	// Cek Level Akses & Cek Login
	public function __construct()
	{
		parent::__construct();  
		cek_login();
		cek_user();
	} 

	public function index()
	{
		$data['title'] = "About - JangmarArt";

		// Tampil Data About
		$data['about'] = $this->about_model->get_site_data()->row_array();
		// End Tampil Data About

		$data['kategori_produk'] = $this->kategori_produk_model->tampil_data('kategori_produk')->result();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/topbar');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/about/index');
		$this->load->view('templates_admin/footer');
	} 


	// Aksi Edit Data About
	public function edit_data_aksi()
	{
		$this->form_validation->set_rules('judul_about','Judul','required',
			[
				'required' => "Judul tidak boleh kosong",
			]
		);
		$this->form_validation->set_rules('subjek_about','Subjek','required',
			[
				'required' => "Subjek tidak boleh kosong",
			]
		);
		$this->form_validation->set_rules('visi_misi1','Visi Misi 1','required',
			[
				'required' => "Visi Misi 1 tidak boleh kosong",
			]
		);
		$this->form_validation->set_rules('visi_misi2','Visi Misi 2','required',
			[
				'required' => "Visi Misi 2 tidak boleh kosong",
			]
		);
		$this->form_validation->set_rules('visi_misi3','Visi Misi 3','required',
			[
				'required' => "Visi Misi 3 tidak boleh kosong",
			]
		);

		if($this->form_validation->run() == false){
			$this->index();
		}else{

			$id_about 				= $this->input->post('id_about');
			$judul_about 			= $this->input->post('judul_about');
			$subjek_about 			= $this->input->post('subjek_about');
			$deskripsi_about 		= $this->input->post('deskripsi_about');
			$visi_misi1 			= $this->input->post('visi_misi1');
			$deskripsi_visi_misi1 	= $this->input->post('deskripsi_visi_misi1');
			$visi_misi2 			= $this->input->post('visi_misi2');
			$deskripsi_visi_misi2 	= $this->input->post('deskripsi_visi_misi2');
			$visi_misi3 			= $this->input->post('visi_misi3');
			$deskripsi_visi_misi3 	= $this->input->post('deskripsi_visi_misi3');

			$gambar_about 		= $_FILES['gambar_about']['name'];

			// Thumbnail
			if($gambar_about){
				$config ['upload_path'] = './assets/uploads/about';
				$config ['allowed_types'] = 'jpg|jpeg|png|pdf|doc|docx';

				$this->load->library('upload', $config);

				if( $this->upload->do_upload('gambar_about') ){
					$gambar_about = $this->upload->data('file_name');
					$this->db->set('gambar_about',$gambar_about);
				}else{

					echo "Photo Banner Gagal Diupload!";

				}
			}


			$data = array(
				'judul_about' 			=> $judul_about,
				'subjek_about' 			=> $subjek_about,
				'deskripsi_about' 		=> $deskripsi_about,
				'visi_misi1' 			=> $visi_misi1,
				'deskripsi_visi_misi1' 	=> $deskripsi_visi_misi1,
				'visi_misi2' 			=> $visi_misi2,
				'deskripsi_visi_misi2' 	=> $deskripsi_visi_misi2,
				'visi_misi3' 			=> $visi_misi3,
				'deskripsi_visi_misi3' 	=> $deskripsi_visi_misi3
			);

			$where = array('id_about' => $id_about);

			$this->about_model->update_data($where,$data,'about');
			$this->session->set_flashdata('pesan','
				<div class="alert alert-info" role="alert">
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>
				<i class="fa fa-edit me-2" aria-hidden="true"></i> Data About Berhasil di <strong>Update!</strong>
				</div>
				');
			redirect('admin/about');
		}
	}

}

/* End of file About.php */
/* Location: ./application/controllers/admin/About.php */