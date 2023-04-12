<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

	public function kategori_produk($slug)
	{
		$data['title'] = "Produk $slug - JangmarArt" ;

		// Tampil Data Soft File Only
		$data['softfile_only'] = $this->softfile_only_model->ambil_slug_softfile_only_join($slug);
		// End Tampil Data Soft File Only

		// Tampil Data Soft File Print
		$data['softfile_print'] = $this->softfile_print_model->ambil_slug_softfile_print_join($slug);
		// End Tampil Data Soft File Print
 
		// Tampil Data Package
		$data['package'] = $this->package_model->ambil_slug_package_join($slug);
		// End Tampil Data Package

		// Tampil Data Variasi
		$data['variasi'] = $this->variasi_model->tampil_data_rentang_harga();
		// End Tampil Data Variasi

		// Tampil Data Print Only
		$data['print_only'] = $this->print_only_model->ambil_slug_print_only_join($slug);
		$data['harga_packaging'] = $this->packaging_model->tampil_data_rentang_harga();
		// End Tampil Data Print Only

		// Tampil Data Kategori Produk
		$data['kategori_produk'] = $this->kategori_produk_model->tampil_data('kategori_produk')->result();
		// End Tampil Data Kategori Produk

		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/topbar');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/produk/produk');
		$this->load->view('templates_admin/footer');	
	}

	// < --------------------------------------------- >
					// SOFT FILE ONLY
	// < --------------------------------------------- >

	// View Detail Data Soft File Only
	public function detail_softfile_only($slug)
	{
		$data['title'] = "Detail Data Soft File Only - JangmarArt" ;
		$data['detail'] = $this->softfile_only_model->ambil_detail_softfile_only_join($slug);
		$data['softfile_only'] = $this->softfile_only_model->ambil_slug_detail_softfile_only_join('soft_file_only');
		// Tampil Data Variasi
		$data['variasi'] = $this->variasi_model->tampil_data_rentang_harga();
		// End Tampil Data Variasi

		// Tampil Data Reviews
		$data['reviews'] = $this->reviews_model->tampil_data_join();
		// End Tampil Data Reviews
		$data['kategori_produk'] = $this->kategori_produk_model->tampil_data('kategori_produk')->result();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/topbar');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/produk/detail_softfile_only');
		$this->load->view('templates_admin/footer');	
	} 

	// View Tambah Soft File Only & Query Kategori Soft File Only
	public function tambah_data_softfile_only()
	{
		$data['title'] = "Tambah Data Soft File Only - JangmarArt";
		$data['kategori_produk'] = $this->kategori_produk_model->tampil_data('kategori_produk')->result();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/topbar');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/produk/tambah_data_softfile_only');
		$this->load->view('templates_admin/footer');	
	}

	// Aksi Tambah Data Soft File Only
	public function tambah_data_softfile_only_aksi()
	{
		$this->_rulesSoftfile_only();
		if($this->form_validation->run() == false){
			$this->tambah_data_softfile_only();
		}else{
			$id_kategori_produk = 1;
			$nama_softfile_only 		= htmlspecialchars($this->input->post('nama_softfile_only'));
			$slug_softfile_only 		= slug($this->input->post('nama_softfile_only'));
			$variasi_softfile_only 		= htmlspecialchars($this->input->post('variasi_softfile_only'));
			$harga_softfile_only 		= $this->input->post('harga_softfile_only');
			$diskon_softfile_only 		= $this->input->post('diskon_softfile_only');
			$deskripsi_softfile_only 	= $this->input->post('deskripsi_softfile_only');

			$gambar_softfile_only 		= $_FILES['gambar_softfile_only']['name'];
			$gambar1_softfile_only 		= $_FILES['gambar1_softfile_only']['name'];
			$gambar2_softfile_only 		= $_FILES['gambar2_softfile_only']['name'];
			$gambar3_softfile_only 		= $_FILES['gambar3_softfile_only']['name'];

			// Thumbail
			if($gambar_softfile_only){
				$config ['upload_path'] = './assets/uploads/softfile_only';
				$config ['allowed_types'] = 'jpg|jpeg|png|pdf|doc|docx';

				$this->load->library('upload', $config);
				
				if( $this->upload->do_upload('gambar_softfile_only') ){
					$gambar_softfile_only = $this->upload->data('file_name');
					$this->db->set('gambar_softfile_only',$gambar_softfile_only);
				}else{
					echo "Photo Produk Gagal Diupload!";

				}
			}else{ 
				$gambar_softfile_only = '';
			}

			// Gambar 1
			if($gambar1_softfile_only){
				$config ['upload_path'] = './assets/uploads/softfile_only';
				$config ['allowed_types'] = 'jpg|jpeg|png|pdf|doc|docx';

				$this->load->library('upload', $config);
				
				if( $this->upload->do_upload('gambar1_softfile_only') ){
					$gambar1_softfile_only = $this->upload->data('file_name');
					$this->db->set('gambar1_softfile_only',$gambar1_softfile_only);
				}else{
					echo "Photo Produk Gagal Diupload!";

				}
			}else{ 
				$gambar1_softfile_only = '';
			}

			// Gambar 2
			if($gambar2_softfile_only){
				$config ['upload_path'] = './assets/uploads/softfile_only';
				$config ['allowed_types'] = 'jpg|jpeg|png|pdf|doc|docx';

				$this->load->library('upload', $config);
				
				if( $this->upload->do_upload('gambar2_softfile_only') ){
					$gambar2_softfile_only = $this->upload->data('file_name');
					$this->db->set('gambar2_softfile_only',$gambar2_softfile_only);
				}else{
					echo "Photo Produk Gagal Diupload!";

				}
			}else{ 
				$gambar2_softfile_only = '';
			}

			// Gambar 3
			if($gambar3_softfile_only){
				$config ['upload_path'] = './assets/uploads/softfile_only';
				$config ['allowed_types'] = 'jpg|jpeg|png|pdf|doc|docx';

				$this->load->library('upload', $config);
				
				if( $this->upload->do_upload('gambar3_softfile_only') ){
					$gambar3_softfile_only = $this->upload->data('file_name');
					$this->db->set('gambar3_softfile_only',$gambar3_softfile_only);
				}else{
					echo "Photo Produk Gagal Diupload!";

				}
			}else{ 
				$gambar3_softfile_only = '';
			}


			$data = array(
				'id_kategori_produk' 		=> $id_kategori_produk,
				'nama_softfile_only' 		=> $nama_softfile_only,
				'slug_softfile_only' 		=> $slug_softfile_only,
				'variasi_softfile_only' 	=> $variasi_softfile_only,
				'harga_softfile_only' 		=> $harga_softfile_only,
				'diskon_softfile_only'		=> $diskon_softfile_only,
				'deskripsi_softfile_only'	=> $deskripsi_softfile_only,
				'gambar_softfile_only'		=> $gambar_softfile_only,
				'gambar1_softfile_only'		=> $gambar1_softfile_only,
				'gambar2_softfile_only'		=> $gambar2_softfile_only,
				'gambar3_softfile_only'		=> $gambar3_softfile_only
			);

			$this->softfile_only_model->insert_softfile_only($data,'softfile_only');
			$this->session->set_flashdata('pesan','
				<div class="alert alert-success" role="alert">
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>
				<i class="fa fa-check-circle-o me-2" aria-hidden="true"></i> Data Soft File Only Berhasil di <strong>Tambahkan!</strong>
				</div>
				'); 
			redirect('admin/produk/kategori_produk/soft_file_only');
		}

	}

	// View Edit Data Soft File Only
	public function edit_softfile_only($slug)
	{
		$data['title'] = "Edit Data Soft File Only - JangmarArt";
		$data['detail'] = $this->softfile_only_model->ambil_detail_softfile_only_join($slug);
		$data['softfile_only'] = $this->softfile_only_model->ambil_slug_detail_softfile_only_join('soft_file_only');
		$data['kategori_produk'] = $this->kategori_produk_model->tampil_data('kategori_produk')->result();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/topbar');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/produk/edit_data_softfile_only');
		$this->load->view('templates_admin/footer');
	}

	// Aksi Edit Data Soft File Only
	public function edit_data_softfile_only_aksi()
	{
		$id_softfile_only 			= $this->input->post('id_softfile_only');
		$id_kategori_produk 		= 1;
		$nama_softfile_only 		= htmlspecialchars($this->input->post('nama_softfile_only'));
		$slug_softfile_only 		= slug($this->input->post('nama_softfile_only'));
		$variasi_softfile_only 		= htmlspecialchars($this->input->post('variasi_softfile_only'));
		$harga_softfile_only 		= $this->input->post('harga_softfile_only');
		$diskon_softfile_only 		= $this->input->post('diskon_softfile_only');
		$deskripsi_softfile_only 	= $this->input->post('deskripsi_softfile_only');

		$gambar_softfile_only 		= $_FILES['gambar_softfile_only']['name'];
		$gambar1_softfile_only 		= $_FILES['gambar1_softfile_only']['name'];
		$gambar2_softfile_only 		= $_FILES['gambar2_softfile_only']['name'];
		$gambar3_softfile_only 		= $_FILES['gambar3_softfile_only']['name'];


		// Thumbnail
		if($gambar_softfile_only){
			$config ['upload_path'] = './assets/uploads/softfile_only';
			$config ['allowed_types'] = 'jpg|jpeg|png|pdf|doc|docx';

			$this->load->library('upload', $config);

			if( $this->upload->do_upload('gambar_softfile_only') ){
				$gambar_softfile_only = $this->upload->data('file_name');
				$this->db->set('gambar_softfile_only',$gambar_softfile_only);
			}else{

				echo "Photo Produk Gagal Diupload!";

			}
		}

		if($gambar1_softfile_only){
			$config ['upload_path'] = './assets/uploads/softfile_only';
			$config ['allowed_types'] = 'jpg|jpeg|png|pdf|doc|docx';

			$this->load->library('upload', $config);

			if( $this->upload->do_upload('gambar1_softfile_only') ){
				$gambar1_softfile_only = $this->upload->data('file_name');
				$this->db->set('gambar1_softfile_only',$gambar1_softfile_only);
			}else{

				echo "Photo Produk Gagal Diupload!";

			}
		}
		if($gambar2_softfile_only){
			$config ['upload_path'] = './assets/uploads/softfile_only';
			$config ['allowed_types'] = 'jpg|jpeg|png|pdf|doc|docx';

			$this->load->library('upload', $config);

			if( $this->upload->do_upload('gambar2_softfile_only') ){
				$gambar2_softfile_only = $this->upload->data('file_name');
				$this->db->set('gambar2_softfile_only',$gambar2_softfile_only);
			}else{

				echo "Photo Produk Gagal Diupload!";

			}
		}

		if($gambar3_softfile_only){
			$config ['upload_path'] = './assets/uploads/softfile_only';
			$config ['allowed_types'] = 'jpg|jpeg|png|pdf|doc|docx';

			$this->load->library('upload', $config);

			if( $this->upload->do_upload('gambar3_softfile_only') ){
				$gambar3_softfile_only = $this->upload->data('file_name');
				$this->db->set('gambar3_softfile_only',$gambar3_softfile_only);
			}else{

				echo "Photo Produk Gagal Diupload!";

			}
		}

		$data = array(
			'id_kategori_produk' 		=> $id_kategori_produk,
			'nama_softfile_only' 		=> $nama_softfile_only,
			'slug_softfile_only' 		=> $slug_softfile_only,
			'variasi_softfile_only' 	=> $variasi_softfile_only,
			'harga_softfile_only' 		=> $harga_softfile_only,
			'diskon_softfile_only'		=> $diskon_softfile_only,
			'deskripsi_softfile_only'	=> $deskripsi_softfile_only
		);
		$where = array('id_softfile_only' => $id_softfile_only);

		$this->softfile_only_model->update_data($where,$data,'softfile_only');
		$this->session->set_flashdata('pesan','
			<div class="alert alert-info" role="alert">
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>
			<i class="fa fa-edit me-2" aria-hidden="true"></i> Data Soft File Only Berhasil di <strong>Update!</strong>
			</div>
			'); 
		redirect('admin/produk/kategori_produk/soft_file_only');
	}

	// Hapus Data Produk
	public function hapus_softfile_only($slug)
	{
		if ($this->session->userdata('role_id') != 1) {
			$this->session->set_flashdata('pesan','
				<div class="alert alert-danger" role="alert">
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>
				<i class="fa fa-info me-2" aria-hidden="true"></i> Maaf Anda bukan <strong>Admin!</strong>
				</div>
				');
			redirect('admin/produk/kategori_produk/soft_file_only');
		}else{
			$where = array('slug_softfile_only' => $slug);
			$this->softfile_only_model->hapus_data($where,'softfile_only');
			$this->session->set_flashdata('pesan','
				<div class="alert alert-danger" role="alert">
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>
				<i class="fa fa-times-circle me-2" aria-hidden="true"></i> Data Soft File Only Berhasil di <strong>Hapus!</strong>
				</div>
				');
			redirect('admin/produk/kategori_produk/soft_file_only');
		}
		
	}

	// Form Validation Soft File Only
	public function _rulesSoftfile_only()
	{
		$this->form_validation->set_rules('nama_softfile_only','Nama','required',
			[
				'required' => "Nama tidak boleh kosong",
			]
		);
		$this->form_validation->set_rules('variasi_softfile_only','Varasi','required',
			[
				'required' => "Varasi tidak boleh kosong",
			]
		);
		$this->form_validation->set_rules('harga_softfile_only','Harga','required',
			[
				'required' => "Harga tidak boleh kosong",
			]
		);
		
	} 

	// Pencarian Soft File Only
	public function search_softfile_only()
	{
		$data['title'] = "Produk Soft File Only - JangmarArt" ;
		$keyword_softfile_only = $this->input->post('keyword_softfile_only');
		// Tampil Data Pencarian Soft File Only
		$data['softfile_only'] = $this->softfile_only_model->ambil_pencarian_softfile_only_join($keyword_softfile_only);
		// End Tampil Data Pencarian Soft File Only	

		// Tampil Data Kategori Produk
		$data['kategori_produk'] = $this->kategori_produk_model->tampil_data('kategori_produk')->result();
		// End Tampil Data Kategori Produk

		if($data['softfile_only']){

			$this->load->view('templates_admin/header', $data);
			$this->load->view('templates_admin/topbar');
			$this->load->view('templates_admin/sidebar');
			$this->load->view('admin/produk/search_softfile_only');
			$this->load->view('templates_admin/footer');	
		}else{
			$this->session->set_flashdata('pesan','
				<div class="alert alert-danger" role="alert">
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>
				<i class="fa fa-times-circle me-2" aria-hidden="true"></i> Data Soft File Only yang anda cari <strong>Tidak Ada!</strong>
				</div>
				');
			redirect('admin/produk/kategori_produk/soft_file_only');
		}

	}

	// < --------------------------------------------- >
					// SOFT FILE ONLY
	// < --------------------------------------------- >


	// << =========================================== >>


	// < --------------------------------------------- >
					// SOFT FILE PRINT
	// < --------------------------------------------- >

	// View Detail Data Soft File Print
	public function detail_softfile_print($slug)
	{ 
		$data['title'] = "Detail Data Soft File Print - JangmarArt";
		// Tampil Detail Soft File Print 
		$data['detail'] = $this->softfile_print_model->ambil_detail_softfile_print_join2($slug);
		// End Tampil Detail Soft File Print 

		// Tampil Data Ukuran Jenis Cetakan
		$data['ukuran_jenis_cetakan'] = $this->ukuran_jenis_cetakan_model->tampil_data_join2();
		$data['ukuran_jenis_cetakan2'] = $this->ukuran_jenis_cetakan_model->tampil_data('ukuran_jenis_cetakan')->result();		
		// End Tampil Data Ukuran Jenis Cetakan 

		// Tampil Data Sub Jenis Cetakan
		$data['sub_jenis_cetakan'] = $this->sub_jenis_cetakan_model->tampil_data_join2();
		$data['sub_jenis_cetakan2'] = $this->sub_jenis_cetakan_model->tampil_data('sub_jenis_cetakan')->result();		
		// End Tampil Data Sub Jenis Cetakan 

		// Tampil Data Ukuran Soft File Print Limit 4
		$data['softfile_print'] = $this->softfile_print_model->ambil_slug_detail_softfile_print_join('soft_file_print') ;
		// End Tampil Data Ukuran Soft File Print Limit 4

		// Tampil Data Variasi
		$data['variasi'] = $this->variasi_model->tampil_data_rentang_harga();
		$data['harga_ukuran_rentang'] = $this->ukuran_jenis_cetakan_model->tampil_data_rentang_harga();
		$data['harga_packaging'] = $this->packaging_model->tampil_data_rentang_harga();
		// End Tampil Data Variasi
 
		// Tampil Data Reviews
		$data['reviews'] = $this->reviews_model->tampil_data_join();
		// End Tampil Data Reviews

		$data['kategori_produk'] = $this->kategori_produk_model->tampil_data('kategori_produk')->result();

		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/topbar');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/produk/detail_softfile_print');
		$this->load->view('templates_admin/footer');	
	}  

	// View Tambah Soft File Print & Query Kategori Soft File Print
	public function tambah_data_softfile_print()
	{
		$data['title'] = "Tambah Data Soft File Print - JangmarArt";

		// Tampil Data Jenis Cetakan
		$data['jenis_cetakan'] = $this->jenis_cetakan_model->tampil_data('jenis_cetakan')->result();
		// End Tampil Data Jenis Cetakan

		$data['kategori_produk'] = $this->kategori_produk_model->tampil_data('kategori_produk')->result();

		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/topbar');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/produk/tambah_data_softfile_print');
		$this->load->view('templates_admin/footer');	
	}

	// Aksi Tambah Data Soft File Print
	public function tambah_data_softfile_print_aksi()
	{
		$this->_rulesSoftfile_print();
		if($this->form_validation->run() == false){
			$this->tambah_data_softfile_print();
		}else{
			$id_kategori_produk 		= 2;
			$id_jenis_cetakan 			= $this->input->post('id_jenis_cetakan');
			$nama_softfile_print 		= htmlspecialchars($this->input->post('nama_softfile_print'));
			$slug_softfile_print 		= slug($this->input->post('nama_softfile_print'));
			$variasi_softfile_print 	= htmlspecialchars($this->input->post('variasi_softfile_print'));
			$harga_softfile_print 		= $this->input->post('harga_softfile_print');
			$diskon_softfile_print 		= $this->input->post('diskon_softfile_print');
			$dimensi_softfile_print 	= htmlspecialchars($this->input->post('dimensi_softfile_print'));
			$deskripsi_softfile_print 	= $this->input->post('deskripsi_softfile_print');

			$gambar_softfile_print 		= $_FILES['gambar_softfile_print']['name'];
			$gambar1_softfile_print 	= $_FILES['gambar1_softfile_print']['name'];
			$gambar2_softfile_print 	= $_FILES['gambar2_softfile_print']['name'];
			$gambar3_softfile_print 	= $_FILES['gambar3_softfile_print']['name'];

			// Thumbail
			if($gambar_softfile_print){
				$config ['upload_path'] = './assets/uploads/softfile_print';
				$config ['allowed_types'] = 'jpg|jpeg|png|pdf|doc|docx';

				$this->load->library('upload', $config);
				
				if( $this->upload->do_upload('gambar_softfile_print') ){
					$gambar_softfile_print = $this->upload->data('file_name');
					$this->db->set('gambar_softfile_print',$gambar_softfile_print);
				}else{
					echo "Photo Produk Gagal Diupload!";

				}
			}else{ 
				$gambar_softfile_print = '';
			}

			// Gambar 1
			if($gambar1_softfile_print){
				$config ['upload_path'] = './assets/uploads/softfile_print';
				$config ['allowed_types'] = 'jpg|jpeg|png|pdf|doc|docx';

				$this->load->library('upload', $config);
				
				if( $this->upload->do_upload('gambar1_softfile_print') ){
					$gambar1_softfile_print = $this->upload->data('file_name');
					$this->db->set('gambar1_softfile_print',$gambar1_softfile_print);
				}else{
					echo "Photo Produk Gagal Diupload!";

				}
			}else{ 
				$gambar1_softfile_print = '';
			}

			// Gambar 2
			if($gambar2_softfile_print){
				$config ['upload_path'] = './assets/uploads/softfile_print';
				$config ['allowed_types'] = 'jpg|jpeg|png|pdf|doc|docx';

				$this->load->library('upload', $config);
				
				if( $this->upload->do_upload('gambar2_softfile_print') ){
					$gambar2_softfile_print = $this->upload->data('file_name');
					$this->db->set('gambar2_softfile_print',$gambar2_softfile_print);
				}else{
					echo "Photo Produk Gagal Diupload!";

				}
			}else{ 
				$gambar2_softfile_print = '';
			}

			// Gambar 3
			if($gambar3_softfile_print){
				$config ['upload_path'] = './assets/uploads/softfile_print';
				$config ['allowed_types'] = 'jpg|jpeg|png|pdf|doc|docx';

				$this->load->library('upload', $config);
				
				if( $this->upload->do_upload('gambar3_softfile_print') ){
					$gambar3_softfile_print = $this->upload->data('file_name');
					$this->db->set('gambar3_softfile_print',$gambar3_softfile_print);
				}else{
					echo "Photo Produk Gagal Diupload!";

				}
			}else{ 
				$gambar3_softfile_print = '';
			}


			$data = array(
				'id_kategori_produk' 		=> $id_kategori_produk,
				'id_jenis_cetakan' 			=> $id_jenis_cetakan,
				'nama_softfile_print' 		=> $nama_softfile_print,
				'slug_softfile_print' 		=> $slug_softfile_print,
				'variasi_softfile_print' 	=> $variasi_softfile_print,
				'harga_softfile_print' 		=> $harga_softfile_print,
				'diskon_softfile_print'		=> $diskon_softfile_print,
				'dimensi_softfile_print' 	=> $dimensi_softfile_print,
				'deskripsi_softfile_print'	=> $deskripsi_softfile_print,
				'gambar_softfile_print'		=> $gambar_softfile_print,
				'gambar1_softfile_print'	=> $gambar1_softfile_print,
				'gambar2_softfile_print'	=> $gambar2_softfile_print,
				'gambar3_softfile_print'	=> $gambar3_softfile_print
			);

			$this->softfile_print_model->insert_softfile_print($data,'softfile_print');
			$this->session->set_flashdata('pesan','
				<div class="alert alert-success" role="alert">
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>
				<i class="fa fa-check-circle-o me-2" aria-hidden="true"></i> Data Soft File Print Berhasil di <strong>Tambahkan!</strong>
				</div>
				'); 
			redirect('admin/produk/kategori_produk/soft_file_print');
		}

	}

	// View Edit Data Soft File Print
	public function edit_softfile_print($slug)
	{
		$data['title'] = "Edit Data Soft File Print - JangmarArt";

		// Tampil Detail Soft File Print 
		$data['detail'] = $this->softfile_print_model->ambil_detail_softfile_print_join2($slug);
		// End Tampil Detail Soft File Print

		// Tampil Data Jenis Cetakan
		$data['jenis_cetakan'] = $this->jenis_cetakan_model->tampil_data('jenis_cetakan')->result();
		// End Tampil Data Jenis Cetakan

		$data['softfile_print'] = $this->softfile_print_model->ambil_slug_detail_softfile_print_join('soft_file_print');
		$data['kategori_produk'] = $this->kategori_produk_model->tampil_data('kategori_produk')->result();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/topbar');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/produk/edit_data_softfile_print');
		$this->load->view('templates_admin/footer');
	}

	// Aksi Edit Data Soft File Print
	public function edit_data_softfile_print_aksi()
	{
		$id_softfile_print 			= $this->input->post('id_softfile_print');
		$id_kategori_produk 		= 2;
		$id_jenis_cetakan 			= $this->input->post('id_jenis_cetakan');
		$nama_softfile_print 		= htmlspecialchars($this->input->post('nama_softfile_print'));
		$slug_softfile_print 		= slug($this->input->post('nama_softfile_print'));
		$variasi_softfile_print 	= htmlspecialchars($this->input->post('variasi_softfile_print'));
		$harga_softfile_print 		= $this->input->post('harga_softfile_print');
		$diskon_softfile_print 		= $this->input->post('diskon_softfile_print');
		$dimensi_softfile_print 	= htmlspecialchars($this->input->post('dimensi_softfile_print'));
		$deskripsi_softfile_print 	= $this->input->post('deskripsi_softfile_print');

		$gambar_softfile_print 		= $_FILES['gambar_softfile_print']['name'];
		$gambar1_softfile_print 	= $_FILES['gambar1_softfile_print']['name'];
		$gambar2_softfile_print 	= $_FILES['gambar2_softfile_print']['name'];
		$gambar3_softfile_print 	= $_FILES['gambar3_softfile_print']['name'];


		// Thumbnail
		if($gambar_softfile_print){
			$config ['upload_path'] = './assets/uploads/softfile_print';
			$config ['allowed_types'] = 'jpg|jpeg|png|pdf|doc|docx';

			$this->load->library('upload', $config);

			if( $this->upload->do_upload('gambar_softfile_print') ){
				$gambar_softfile_print = $this->upload->data('file_name');
				$this->db->set('gambar_softfile_print',$gambar_softfile_print);
			}else{

				echo "Photo Produk Gagal Diupload!";

			}
		}

		if($gambar1_softfile_print){
			$config ['upload_path'] = './assets/uploads/softfile_print';
			$config ['allowed_types'] = 'jpg|jpeg|png|pdf|doc|docx';

			$this->load->library('upload', $config);

			if( $this->upload->do_upload('gambar1_softfile_print') ){
				$gambar1_softfile_print = $this->upload->data('file_name');
				$this->db->set('gambar1_softfile_print',$gambar1_softfile_print);
			}else{

				echo "Photo Produk Gagal Diupload!";

			}
		}
		if($gambar2_softfile_print){
			$config ['upload_path'] = './assets/uploads/softfile_print';
			$config ['allowed_types'] = 'jpg|jpeg|png|pdf|doc|docx';

			$this->load->library('upload', $config);

			if( $this->upload->do_upload('gambar2_softfile_print') ){
				$gambar2_softfile_print = $this->upload->data('file_name');
				$this->db->set('gambar2_softfile_print',$gambar2_softfile_print);
			}else{

				echo "Photo Produk Gagal Diupload!";

			}
		}

		if($gambar3_softfile_print){
			$config ['upload_path'] = './assets/uploads/softfile_print';
			$config ['allowed_types'] = 'jpg|jpeg|png|pdf|doc|docx';

			$this->load->library('upload', $config);

			if( $this->upload->do_upload('gambar3_softfile_print') ){
				$gambar3_softfile_print = $this->upload->data('file_name');
				$this->db->set('gambar3_softfile_print',$gambar3_softfile_print);
			}else{

				echo "Photo Produk Gagal Diupload!";

			}
		}

		$data = array(
			'id_kategori_produk' 		=> $id_kategori_produk,
			'id_jenis_cetakan' 			=> $id_jenis_cetakan,
			'nama_softfile_print' 		=> $nama_softfile_print,
			'slug_softfile_print' 		=> $slug_softfile_print,
			'variasi_softfile_print' 	=> $variasi_softfile_print,
			'harga_softfile_print' 		=> $harga_softfile_print,
			'diskon_softfile_print'		=> $diskon_softfile_print,
			'dimensi_softfile_print' 	=> $dimensi_softfile_print,
			'deskripsi_softfile_print'	=> $deskripsi_softfile_print,
		);
		$where = array('id_softfile_print' => $id_softfile_print);

		$this->softfile_print_model->update_data($where,$data,'softfile_print');
		$this->session->set_flashdata('pesan','
			<div class="alert alert-info" role="alert">
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>
			<i class="fa fa-edit me-2" aria-hidden="true"></i> Data Soft File Print Berhasil di <strong>Update!</strong>
			</div>
			'); 
		redirect('admin/produk/kategori_produk/soft_file_print');
	}

	// Hapus Data Produk
	public function hapus_softfile_print($slug)
	{
		if ($this->session->userdata('role_id') != 1) {
			$this->session->set_flashdata('pesan','
				<div class="alert alert-danger" role="alert">
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>
				<i class="fa fa-info me-2" aria-hidden="true"></i> Maaf Anda bukan <strong>Admin!</strong>
				</div>
				');
			redirect('admin/produk/kategori_produk/soft_file_print');
		}else{
			$where = array('slug_softfile_print' => $slug);
			$this->softfile_print_model->hapus_data($where,'softfile_print');
			$this->session->set_flashdata('pesan','
				<div class="alert alert-danger" role="alert">
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>
				<i class="fa fa-times-circle me-2" aria-hidden="true"></i> Data Soft File Print Berhasil di <strong>Hapus!</strong>
				</div>
				');
			redirect('admin/produk/kategori_produk/soft_file_print');
		}
		
	}

	// Form Validation Soft File Print
	public function _rulesSoftfile_print()
	{
		$this->form_validation->set_rules('nama_softfile_print','Nama','required',
			[
				'required' => "Nama tidak boleh kosong",
			]
		);
		$this->form_validation->set_rules('variasi_softfile_print','Varasi','required',
			[
				'required' => "Varasi tidak boleh kosong",
			]
		);
		$this->form_validation->set_rules('harga_softfile_print','Harga','required',
			[
				'required' => "Harga tidak boleh kosong",
			]
		);
		
	}

	// Pencarian Soft File Print
	public function search_softfile_print()
	{
		$data['title'] = "Produk Soft File Print - JangmarArt" ;
		$keyword_softfile_print = $this->input->post('keyword_softfile_print');
		// Tampil Data Pencarian Soft File Print
		$data['softfile_print'] = $this->softfile_print_model->ambil_pencarian_softfile_print_join($keyword_softfile_print);
		// End Tampil Data Pencarian Soft File Print	

		// Tampil Data Kategori Produk
		$data['kategori_produk'] = $this->kategori_produk_model->tampil_data('kategori_produk')->result();
		// End Tampil Data Kategori Produk

		if($data['softfile_print']){

			$this->load->view('templates_admin/header', $data);
			$this->load->view('templates_admin/topbar');
			$this->load->view('templates_admin/sidebar');
			$this->load->view('admin/produk/search_softfile_print');
			$this->load->view('templates_admin/footer');	
		}else{
			$this->session->set_flashdata('pesan','
				<div class="alert alert-danger" role="alert">
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>
				<i class="fa fa-times-circle me-2" aria-hidden="true"></i> Data Soft File Print yang Anda cari <strong>Tidak Ada!</strong>
				</div>
				');
			redirect('admin/produk/kategori_produk/soft_file_print');
		}
	}

	// < --------------------------------------------- >
					// SOFT FILE PRINT
	// < --------------------------------------------- >


	// << =========================================== >>

	// < --------------------------------------------- >
					// PACKAGE
	// < --------------------------------------------- >

	// View Detail Data Package
	public function detail_package($slug)
	{
		$data['title'] = "Detail Data Package - JangmarArt";
		// Tampil Detail Package 
		$data['detail'] = $this->package_model->ambil_detail_package_join2($slug);
		// End Tampil Detail Package 

		// Tampil Data Ukuran Jenis Cetakan
		$data['ukuran_jenis_cetakan'] = $this->ukuran_jenis_cetakan_model->tampil_data_join2();
		$data['ukuran_jenis_cetakan2'] = $this->ukuran_jenis_cetakan_model->tampil_data('ukuran_jenis_cetakan')->result();		
		// End Tampil Data Ukuran Jenis Cetakan

		// Tampil Data Sub Jenis Cetakan
		$data['sub_jenis_cetakan'] = $this->sub_jenis_cetakan_model->tampil_data_join2();
		$data['sub_jenis_cetakan2'] = $this->sub_jenis_cetakan_model->tampil_data('sub_jenis_cetakan')->result();		
		// End Tampil Data Sub Jenis Cetakan 
 
		// Tampil Data Ukuran Package Limit 4
		$data['package'] = $this->package_model->ambil_slug_detail_package_join('package');
		$data['harga_ukuran_rentang'] = $this->ukuran_jenis_cetakan_model->tampil_data_rentang_harga();
		$data['harga_packaging'] = $this->packaging_model->tampil_data_rentang_harga();
		// End Tampil Data Ukuran Package Limit 4

		// Tampil Data Reviews
		$data['reviews'] = $this->reviews_model->tampil_data_join();
		// End Tampil Data Reviews

		$data['kategori_produk'] = $this->kategori_produk_model->tampil_data('kategori_produk')->result();

		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/topbar');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/produk/detail_package');
		$this->load->view('templates_admin/footer');	
	}  

	// View Tambah Package & Query Kategori Package
	public function tambah_data_package()
	{
		$data['title'] = "Tambah Data Package - JangmarArt";

		// Tampil Data Jenis Cetakan
		$data['jenis_cetakan'] = $this->jenis_cetakan_model->tampil_data('jenis_cetakan')->result();
		// End Tampil Data Jenis Cetakan

		$data['kategori_produk'] = $this->kategori_produk_model->tampil_data('kategori_produk')->result();

		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/topbar');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/produk/tambah_data_package');
		$this->load->view('templates_admin/footer');	
	}

	// Aksi Tambah Data Package
	public function tambah_data_package_aksi()
	{
		$this->_rulesPackage();
		if($this->form_validation->run() == false){
			$this->tambah_data_package();
		}else{
			$id_kategori_produk = 3;
			$id_jenis_cetakan 	= $this->input->post('id_jenis_cetakan');
			$nama_package 		= htmlspecialchars($this->input->post('nama_package'));
			$slug_package 		= slug($this->input->post('nama_package'));
			$variasi_package 	= htmlspecialchars($this->input->post('variasi_package'));
			$harga_package 		= $this->input->post('harga_package');
			$diskon_package 	= $this->input->post('diskon_package');
			$dimensi_package 	= htmlspecialchars($this->input->post('dimensi_package'));
			$deskripsi_package 	= $this->input->post('deskripsi_package');

			$gambar_package 	= $_FILES['gambar_package']['name'];
			$gambar1_package 	= $_FILES['gambar1_package']['name'];
			$gambar2_package 	= $_FILES['gambar2_package']['name'];
			$gambar3_package 	= $_FILES['gambar3_package']['name'];

			// Thumbail
			if($gambar_package){
				$config ['upload_path'] = './assets/uploads/package';
				$config ['allowed_types'] = 'jpg|jpeg|png|pdf|doc|docx';

				$this->load->library('upload', $config);
				
				if( $this->upload->do_upload('gambar_package') ){
					$gambar_package = $this->upload->data('file_name');
					$this->db->set('gambar_package',$gambar_package);
				}else{
					echo "Photo Produk Gagal Diupload!";

				}
			}else{ 
				$gambar_package = '';
			}

			// Gambar 1
			if($gambar1_package){
				$config ['upload_path'] = './assets/uploads/package';
				$config ['allowed_types'] = 'jpg|jpeg|png|pdf|doc|docx';

				$this->load->library('upload', $config);
				
				if( $this->upload->do_upload('gambar1_package') ){
					$gambar1_package = $this->upload->data('file_name');
					$this->db->set('gambar1_package',$gambar1_package);
				}else{
					echo "Photo Produk Gagal Diupload!";

				}
			}else{ 
				$gambar1_package = '';
			}

			// Gambar 2
			if($gambar2_package){
				$config ['upload_path'] = './assets/uploads/package';
				$config ['allowed_types'] = 'jpg|jpeg|png|pdf|doc|docx';

				$this->load->library('upload', $config);
				
				if( $this->upload->do_upload('gambar2_package') ){
					$gambar2_package = $this->upload->data('file_name');
					$this->db->set('gambar2_package',$gambar2_package);
				}else{
					echo "Photo Produk Gagal Diupload!";

				}
			}else{ 
				$gambar2_package = '';
			}

			// Gambar 3
			if($gambar3_package){
				$config ['upload_path'] = './assets/uploads/package';
				$config ['allowed_types'] = 'jpg|jpeg|png|pdf|doc|docx';

				$this->load->library('upload', $config);
				
				if( $this->upload->do_upload('gambar3_package') ){
					$gambar3_package = $this->upload->data('file_name');
					$this->db->set('gambar3_package',$gambar3_package);
				}else{
					echo "Photo Produk Gagal Diupload!";

				}
			}else{ 
				$gambar3_package = '';
			}


			$data = array(
				'id_kategori_produk' 	=> $id_kategori_produk,
				'id_jenis_cetakan' 		=> $id_jenis_cetakan,
				'nama_package' 			=> $nama_package,
				'slug_package' 			=> $slug_package,
				'variasi_package' 		=> $variasi_package,
				'harga_package' 		=> $harga_package,
				'diskon_package'		=> $diskon_package,
				'dimensi_package' 		=> $dimensi_package,
				'deskripsi_package'		=> $deskripsi_package,
				'gambar_package'		=> $gambar_package,
				'gambar1_package'		=> $gambar1_package,
				'gambar2_package'		=> $gambar2_package,
				'gambar3_package'		=> $gambar3_package
			);

			$this->package_model->insert_package($data,'package');
			$this->session->set_flashdata('pesan','
				<div class="alert alert-success" role="alert">
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>
				<i class="fa fa-check-circle-o me-2" aria-hidden="true"></i> Data Package Berhasil di <strong>Tambahkan!</strong>
				</div>
				'); 
			redirect('admin/produk/kategori_produk/package');
		}

	}

	// View Edit Data Package
	public function edit_package($slug)
	{
		$data['title'] = "Edit Data Package - JangmarArt";

		// Tampil Detail Package 
		$data['detail'] = $this->package_model->ambil_detail_package_join2($slug);
		// End Tampil Detail Package

		// Tampil Data Jenis Cetakan
		$data['jenis_cetakan'] = $this->jenis_cetakan_model->tampil_data('jenis_cetakan')->result();
		// End Tampil Data Jenis Cetakan

		$data['package'] = $this->package_model->ambil_slug_detail_package_join('soft_file_print');
		$data['kategori_produk'] = $this->kategori_produk_model->tampil_data('kategori_produk')->result();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/topbar');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/produk/edit_data_package');
		$this->load->view('templates_admin/footer');
	}

	// Aksi Edit Data Package
	public function edit_data_package_aksi()
	{
		$id_package 		= $this->input->post('id_package');
		$id_kategori_produk = 3;
		$id_jenis_cetakan 	= $this->input->post('id_jenis_cetakan');
		$nama_package 		= htmlspecialchars($this->input->post('nama_package'));
		$slug_package 		= slug($this->input->post('nama_package'));
		$variasi_package 	= htmlspecialchars($this->input->post('variasi_package'));
		$harga_package 		= $this->input->post('harga_package');
		$diskon_package 	= $this->input->post('diskon_package');
		$dimensi_package 	= htmlspecialchars($this->input->post('dimensi_package'));
		$deskripsi_package 	= $this->input->post('deskripsi_package');

		$gambar_package 	= $_FILES['gambar_package']['name'];
		$gambar1_package 	= $_FILES['gambar1_package']['name'];
		$gambar2_package 	= $_FILES['gambar2_package']['name'];
		$gambar3_package 	= $_FILES['gambar3_package']['name'];


		// Thumbnail
		if($gambar_package){
			$config ['upload_path'] = './assets/uploads/package';
			$config ['allowed_types'] = 'jpg|jpeg|png|pdf|doc|docx';

			$this->load->library('upload', $config);

			if( $this->upload->do_upload('gambar_package') ){
				$gambar_package = $this->upload->data('file_name');
				$this->db->set('gambar_package',$gambar_package);
			}else{

				echo "Photo Produk Gagal Diupload!";

			}
		}

		if($gambar1_package){
			$config ['upload_path'] = './assets/uploads/package';
			$config ['allowed_types'] = 'jpg|jpeg|png|pdf|doc|docx';

			$this->load->library('upload', $config);

			if( $this->upload->do_upload('gambar1_package') ){
				$gambar1_package = $this->upload->data('file_name');
				$this->db->set('gambar1_package',$gambar1_package);
			}else{

				echo "Photo Produk Gagal Diupload!";

			}
		}
		if($gambar2_package){
			$config ['upload_path'] = './assets/uploads/package';
			$config ['allowed_types'] = 'jpg|jpeg|png|pdf|doc|docx';

			$this->load->library('upload', $config);

			if( $this->upload->do_upload('gambar2_package') ){
				$gambar2_package = $this->upload->data('file_name');
				$this->db->set('gambar2_package',$gambar2_package);
			}else{

				echo "Photo Produk Gagal Diupload!";

			}
		}

		if($gambar3_package){
			$config ['upload_path'] = './assets/uploads/package';
			$config ['allowed_types'] = 'jpg|jpeg|png|pdf|doc|docx';

			$this->load->library('upload', $config);

			if( $this->upload->do_upload('gambar3_package') ){
				$gambar3_package = $this->upload->data('file_name');
				$this->db->set('gambar3_package',$gambar3_package);
			}else{

				echo "Photo Produk Gagal Diupload!";

			}
		}

		$data = array(
			'id_kategori_produk' 	=> $id_kategori_produk,
			'id_jenis_cetakan' 		=> $id_jenis_cetakan,
			'nama_package' 			=> $nama_package,
			'slug_package' 			=> $slug_package,
			'variasi_package' 		=> $variasi_package,
			'harga_package' 		=> $harga_package,
			'diskon_package'		=> $diskon_package,
			'dimensi_package' 		=> $dimensi_package,
			'deskripsi_package'		=> $deskripsi_package,
		);
		$where = array('id_package' => $id_package);

		$this->package_model->update_data($where,$data,'package');
		$this->session->set_flashdata('pesan','
			<div class="alert alert-info" role="alert">
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>
			<i class="fa fa-edit me-2" aria-hidden="true"></i> Data Package Berhasil di <strong>Update!</strong>
			</div>
			'); 
		redirect('admin/produk/kategori_produk/package');
	}

	// Hapus Data Produk
	public function hapus_package($slug)
	{
		if ($this->session->userdata('role_id') != 1) {
			$this->session->set_flashdata('pesan','
				<div class="alert alert-danger" role="alert">
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>
				<i class="fa fa-info me-2" aria-hidden="true"></i> Maaf Anda bukan <strong>Admin!</strong>
				</div>
				');
			redirect('admin/produk/kategori_produk/package');
		}else{
			$where = array('slug_package' => $slug);
			$this->package_model->hapus_data($where,'package');
			$this->session->set_flashdata('pesan','
				<div class="alert alert-danger" role="alert">
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>
				<i class="fa fa-times-circle me-2" aria-hidden="true"></i> Data Package Berhasil di <strong>Hapus!</strong>
				</div>
				');
			redirect('admin/produk/kategori_produk/package');
		}
		
	}

	// Form Validation Package
	public function _rulesPackage()
	{
		$this->form_validation->set_rules('nama_package','Nama','required',
			[
				'required' => "Nama tidak boleh kosong",
			]
		);
		$this->form_validation->set_rules('variasi_package','Varasi','required',
			[
				'required' => "Varasi tidak boleh kosong",
			]
		);
		$this->form_validation->set_rules('harga_package','Harga','required',
			[
				'required' => "Harga tidak boleh kosong",
			]
		);
		
	}


	// Pencarian Package
	public function search_package()
	{
		$data['title'] = "Produk Package - JangmarArt" ;
		$keyword_package = $this->input->post('keyword_package');
		// Tampil Data Pencarian Package
		$data['package'] = $this->package_model->ambil_pencarian_package_join($keyword_package);
		// End Tampil Data Pencarian Package	

		// Tampil Data Kategori Produk
		$data['kategori_produk'] = $this->kategori_produk_model->tampil_data('kategori_produk')->result();
		// End Tampil Data Kategori Produk

		if($data['package']){

			$this->load->view('templates_admin/header', $data);
			$this->load->view('templates_admin/topbar');
			$this->load->view('templates_admin/sidebar');
			$this->load->view('admin/produk/search_package');
			$this->load->view('templates_admin/footer');	
		}else{
			$this->session->set_flashdata('pesan','
				<div class="alert alert-danger" role="alert">
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>
				<i class="fa fa-times-circle me-2" aria-hidden="true"></i> Data Package yang anda cari <strong>Tidak Ada!</strong>
				</div>
				');
			redirect('admin/produk/kategori_produk/package');
		}
	}

	// < --------------------------------------------- >
					// PACKAGE
	// < --------------------------------------------- >


	// << =========================================== >>


	// < --------------------------------------------- >
					// PRINT ONLY
	// < --------------------------------------------- >

	// View Detail Data Print Only
	public function detail_print_only($slug)
	{
		$data['title'] = "Detail Data Print Only - JangmarArt";
		// Tampil Detail Print Only 
		$data['detail'] = $this->print_only_model->ambil_detail_print_only_join2($slug);
		// End Tampil Detail Print Only 

		// Tampil Data Ukuran Jenis Cetakan
		$data['ukuran_jenis_cetakan'] = $this->ukuran_jenis_cetakan_model->tampil_data_join2();
		$data['ukuran_jenis_cetakan2'] = $this->ukuran_jenis_cetakan_model->tampil_data('ukuran_jenis_cetakan')->result();		
		// End Tampil Data Ukuran Jenis Cetakan

		// Tampil Data Sub Jenis Cetakan
		$data['sub_jenis_cetakan'] = $this->sub_jenis_cetakan_model->tampil_data_join2();
		$data['sub_jenis_cetakan2'] = $this->sub_jenis_cetakan_model->tampil_data('sub_jenis_cetakan')->result();		
		// End Tampil Data Sub Jenis Cetakan 

		// Tampil Data Ukuran Print Only Limit 4
		$data['print_only'] = $this->print_only_model->ambil_slug_detail_print_only_join('print_only');
		// End Tampil Data Ukuran Print Only Limit 4

		// Tampil Data Reviews
		$data['reviews'] = $this->reviews_model->tampil_data_join();
		// End Tampil Data Reviews


		$data['kategori_produk'] = $this->kategori_produk_model->tampil_data('kategori_produk')->result();

		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/topbar');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/produk/detail_print_only');
		$this->load->view('templates_admin/footer');	
	}   

	// View Tambah Print Only & Query Kategori Print Only
	public function tambah_data_print_only()
	{
		$data['title'] = "Tambah Data Print Only - JangmarArt";

		// Tampil Data Jenis Cetakan
		$data['jenis_cetakan'] = $this->jenis_cetakan_model->tampil_data('jenis_cetakan')->result();
		// End Tampil Data Jenis Cetakan

		$data['kategori_produk'] = $this->kategori_produk_model->tampil_data('kategori_produk')->result();

		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/topbar');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/produk/tambah_data_print_only');
		$this->load->view('templates_admin/footer');	
	}

	// Aksi Tambah Data Print Only
	public function tambah_data_print_only_aksi()
	{
		$this->_rulesPrint_only();
		if($this->form_validation->run() == false){
			$this->tambah_data_print_only();
		}else{
			$id_kategori_produk 	= 4;
			$id_jenis_cetakan 		= $this->input->post('id_jenis_cetakan');
			$nama_print_only 		= htmlspecialchars($this->input->post('nama_print_only'));
			$slug_print_only 		= slug($this->input->post('nama_print_only'));
			$variasi_print_only 	= htmlspecialchars($this->input->post('variasi_print_only'));
			$harga_print_only 		= $this->input->post('harga_print_only');
			$diskon_print_only 		= $this->input->post('diskon_print_only');
			$dimensi_print_only 	= htmlspecialchars($this->input->post('dimensi_print_only'));
			$deskripsi_print_only 	= $this->input->post('deskripsi_print_only');

			$gambar_print_only 		= $_FILES['gambar_print_only']['name'];
			$gambar1_print_only 	= $_FILES['gambar1_print_only']['name'];
			$gambar2_print_only 	= $_FILES['gambar2_print_only']['name'];
			$gambar3_print_only 	= $_FILES['gambar3_print_only']['name'];

			// Thumbail
			if($gambar_print_only){
				$config ['upload_path'] = './assets/uploads/print_only';
				$config ['allowed_types'] = 'jpg|jpeg|png|pdf|doc|docx';

				$this->load->library('upload', $config);
				
				if( $this->upload->do_upload('gambar_print_only') ){
					$gambar_print_only = $this->upload->data('file_name');
					$this->db->set('gambar_print_only',$gambar_print_only);
				}else{
					echo "Photo Produk Gagal Diupload!";

				}
			}else{ 
				$gambar_print_only = '';
			}

			// Gambar 1
			if($gambar1_print_only){
				$config ['upload_path'] = './assets/uploads/print_only';
				$config ['allowed_types'] = 'jpg|jpeg|png|pdf|doc|docx';

				$this->load->library('upload', $config);
				
				if( $this->upload->do_upload('gambar1_print_only') ){
					$gambar1_print_only = $this->upload->data('file_name');
					$this->db->set('gambar1_print_only',$gambar1_print_only);
				}else{
					echo "Photo Produk Gagal Diupload!";

				}
			}else{ 
				$gambar1_print_only = '';
			}

			// Gambar 2
			if($gambar2_print_only){
				$config ['upload_path'] = './assets/uploads/print_only';
				$config ['allowed_types'] = 'jpg|jpeg|png|pdf|doc|docx';

				$this->load->library('upload', $config);
				
				if( $this->upload->do_upload('gambar2_print_only') ){
					$gambar2_print_only = $this->upload->data('file_name');
					$this->db->set('gambar2_print_only',$gambar2_print_only);
				}else{
					echo "Photo Produk Gagal Diupload!";

				}
			}else{ 
				$gambar2_print_only = '';
			}

			// Gambar 3
			if($gambar3_print_only){
				$config ['upload_path'] = './assets/uploads/print_only';
				$config ['allowed_types'] = 'jpg|jpeg|png|pdf|doc|docx';

				$this->load->library('upload', $config);
				
				if( $this->upload->do_upload('gambar3_print_only') ){
					$gambar3_print_only = $this->upload->data('file_name');
					$this->db->set('gambar3_print_only',$gambar3_print_only);
				}else{
					echo "Photo Produk Gagal Diupload!";

				}
			}else{ 
				$gambar3_print_only = '';
			}


			$data = array(
				'id_kategori_produk' 	=> $id_kategori_produk,
				'id_jenis_cetakan' 		=> $id_jenis_cetakan,
				'nama_print_only' 		=> $nama_print_only,
				'slug_print_only' 		=> $slug_print_only,
				'variasi_print_only' 	=> $variasi_print_only,
				'harga_print_only' 		=> $harga_print_only,
				'diskon_print_only'		=> $diskon_print_only,
				'dimensi_print_only' 	=> $dimensi_print_only,
				'deskripsi_print_only'	=> $deskripsi_print_only,
				'gambar_print_only'		=> $gambar_print_only,
				'gambar1_print_only'	=> $gambar1_print_only,
				'gambar2_print_only'	=> $gambar2_print_only,
				'gambar3_print_only'	=> $gambar3_print_only
			);

			$this->print_only_model->insert_print_only($data,'print_only');
			$this->session->set_flashdata('pesan','
				<div class="alert alert-success" role="alert">
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>
				<i class="fa fa-check-circle-o me-2" aria-hidden="true"></i> Data Print Only Berhasil di <strong>Tambahkan!</strong>
				</div>
				'); 
			redirect('admin/produk/kategori_produk/print_only');
		}

	}

	// View Edit Data Print Only
	public function edit_print_only($slug)
	{
		$data['title'] = "Edit Data Print Only - JangmarArt";

		// Tampil Detail Print Only 
		$data['detail'] = $this->print_only_model->ambil_detail_print_only_join2($slug);
		// End Tampil Detail Print Only

		// Tampil Data Jenis Cetakan
		$data['jenis_cetakan'] = $this->jenis_cetakan_model->tampil_data('jenis_cetakan')->result();
		// End Tampil Data Jenis Cetakan

		$data['print_only'] = $this->print_only_model->ambil_slug_detail_print_only_join('print_only');
		$data['kategori_produk'] = $this->kategori_produk_model->tampil_data('kategori_produk')->result();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/topbar');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/produk/edit_data_print_only');
		$this->load->view('templates_admin/footer');
	}

	// Aksi Edit Data Print Only
	public function edit_data_print_only_aksi()
	{
		$id_print_only 			= $this->input->post('id_print_only');
		$id_kategori_produk 	= 4;
		$id_jenis_cetakan 		= $this->input->post('id_jenis_cetakan');
		$nama_print_only 		= htmlspecialchars($this->input->post('nama_print_only'));
		$slug_print_only 		= slug($this->input->post('nama_print_only'));
		$variasi_print_only 	= htmlspecialchars($this->input->post('variasi_print_only'));
		$harga_print_only 		= $this->input->post('harga_print_only');
		$diskon_print_only 		= $this->input->post('diskon_print_only');
		$dimensi_print_only 	= htmlspecialchars($this->input->post('dimensi_print_only'));
		$deskripsi_print_only 	= htmlspecialchars($this->input->post('deskripsi_print_only'));

		$gambar_print_only 		= $_FILES['gambar_print_only']['name'];
		$gambar1_print_only 	= $_FILES['gambar1_print_only']['name'];
		$gambar2_print_only 	= $_FILES['gambar2_print_only']['name'];
		$gambar3_print_only 	= $_FILES['gambar3_print_only']['name'];


		// Thumbnail
		if($gambar_print_only){
			$config ['upload_path'] = './assets/uploads/print_only';
			$config ['allowed_types'] = 'jpg|jpeg|png|pdf|doc|docx';

			$this->load->library('upload', $config);

			if( $this->upload->do_upload('gambar_print_only') ){
				$gambar_print_only = $this->upload->data('file_name');
				$this->db->set('gambar_print_only',$gambar_print_only);
			}else{

				echo "Photo Produk Gagal Diupload!";

			}
		}

		if($gambar1_print_only){
			$config ['upload_path'] = './assets/uploads/print_only';
			$config ['allowed_types'] = 'jpg|jpeg|png|pdf|doc|docx';

			$this->load->library('upload', $config);

			if( $this->upload->do_upload('gambar1_print_only') ){
				$gambar1_print_only = $this->upload->data('file_name');
				$this->db->set('gambar1_print_only',$gambar1_print_only);
			}else{

				echo "Photo Produk Gagal Diupload!";

			}
		}
		if($gambar2_print_only){
			$config ['upload_path'] = './assets/uploads/print_only';
			$config ['allowed_types'] = 'jpg|jpeg|png|pdf|doc|docx';

			$this->load->library('upload', $config);

			if( $this->upload->do_upload('gambar2_print_only') ){
				$gambar2_print_only = $this->upload->data('file_name');
				$this->db->set('gambar2_print_only',$gambar2_print_only);
			}else{

				echo "Photo Produk Gagal Diupload!";

			}
		}

		if($gambar3_print_only){
			$config ['upload_path'] = './assets/uploads/print_only';
			$config ['allowed_types'] = 'jpg|jpeg|png|pdf|doc|docx';

			$this->load->library('upload', $config);

			if( $this->upload->do_upload('gambar3_print_only') ){
				$gambar3_print_only = $this->upload->data('file_name');
				$this->db->set('gambar3_print_only',$gambar3_print_only);
			}else{

				echo "Photo Produk Gagal Diupload!";

			}
		}

		$data = array(
			'id_kategori_produk' 	=> $id_kategori_produk,
			'id_jenis_cetakan' 		=> $id_jenis_cetakan,
			'nama_print_only' 		=> $nama_print_only,
			'slug_print_only' 		=> $slug_print_only,
			'variasi_print_only' 	=> $variasi_print_only,
			'harga_print_only' 		=> $harga_print_only,
			'diskon_print_only'		=> $diskon_print_only,
			'dimensi_print_only' 	=> $dimensi_print_only,
			'deskripsi_print_only'	=> $deskripsi_print_only,
		);
		$where = array('id_print_only' => $id_print_only);

		$this->print_only_model->update_data($where,$data,'print_only');
		$this->session->set_flashdata('pesan','
			<div class="alert alert-info" role="alert">
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>
			<i class="fa fa-edit me-2" aria-hidden="true"></i> Data Print Only Berhasil di <strong>Update!</strong>
			</div>
			'); 
		redirect('admin/produk/kategori_produk/print_only');
	}

	// Hapus Data Produk
	public function hapus_print_only($slug)
	{
		if ($this->session->userdata('role_id') != 1) {
			$this->session->set_flashdata('pesan','
				<div class="alert alert-danger" role="alert">
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>
				<i class="fa fa-info me-2" aria-hidden="true"></i> Maaf Anda bukan <strong>Admin!</strong>
				</div>
				');
			redirect('admin/produk/kategori_produk/print_only');
		}else{
			$where = array('slug_print_only' => $slug);
			$this->print_only_model->hapus_data($where,'print_only');
			$this->session->set_flashdata('pesan','
				<div class="alert alert-danger" role="alert">
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>
				<i class="fa fa-times-circle me-2" aria-hidden="true"></i> Data Print Only Berhasil di <strong>Hapus!</strong>
				</div>
				');
			redirect('admin/produk/kategori_produk/print_only');
		}
		
	}

	// Form Validation Print Only
	public function _rulesPrint_only()
	{
		$this->form_validation->set_rules('nama_print_only','Nama','required',
			[
				'required' => "Nama tidak boleh kosong",
			]
		);
		$this->form_validation->set_rules('variasi_print_only','Varasi','required',
			[
				'required' => "Varasi tidak boleh kosong",
			]
		);
		$this->form_validation->set_rules('harga_print_only','Harga','required',
			[
				'required' => "Harga tidak boleh kosong",
			]
		);
		
	}


	// Pencarian Print Only
	public function search_print_only()
	{
		$data['title'] = "Produk Print Only - JangmarArt" ;
		$keyword_print_only = $this->input->post('keyword_print_only');
		// Tampil Data Pencarian Print Only
		$data['print_only'] = $this->print_only_model->ambil_pencarian_print_only_join($keyword_print_only);
		// End Tampil Data Pencarian Print Only	

		// Tampil Data Kategori Produk
		$data['kategori_produk'] = $this->kategori_produk_model->tampil_data('kategori_produk')->result();
		// End Tampil Data Kategori Produk

		if($data['print_only']){

			$this->load->view('templates_admin/header', $data);
			$this->load->view('templates_admin/topbar');
			$this->load->view('templates_admin/sidebar');
			$this->load->view('admin/produk/search_print_only');
			$this->load->view('templates_admin/footer');	
		}else{
			$this->session->set_flashdata('pesan','
				<div class="alert alert-danger" role="alert">
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>
				<i class="fa fa-times-circle me-2" aria-hidden="true"></i> Data Print Only yang anda cari <strong>Tidak Ada!</strong>
				</div>
				');
			redirect('admin/produk/kategori_produk/print_only');
		}
	}


	// < --------------------------------------------- >
					// PRINT ONLY
	// < --------------------------------------------- >


	// << =========================================== >>


}

/* End of file Produk.php */
/* Location: ./application/controllers/admin/Produk.php */