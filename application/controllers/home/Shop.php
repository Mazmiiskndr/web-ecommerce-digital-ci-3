<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends CI_Controller {

	public function categories($slug)
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

		// Tampil Data Print Only
		$data['print_only'] = $this->print_only_model->ambil_slug_print_only_join($slug);
		// End Tampil Data Print Only

		// Tampil Data Kategori Produk
		$data['kategori_produk'] = $this->kategori_produk_model->tampil_data('kategori_produk')->result();
		// End Tampil Data Kategori Produk
 
		// Tampil Jumlah Data
		$data['jumlah_softfile_only'] = $this->softfile_only_model->get_jumlah_softfile_only();
		$data['jumlah_softfile_print'] = $this->softfile_print_model->get_jumlah_softfile_print();
		$data['jumlah_package'] = $this->package_model->get_jumlah_package();
		$data['jumlah_print_only'] = $this->print_only_model->get_jumlah_print_only();
		// End Tampil Jumlah Data

		// Tampil Data Contact
		$data['contact'] = $this->contact_model->get_site_data()->row_array();
		// End Tampil Data Contact
 
		// Tampil Data Variasi
		$data['variasi'] = $this->variasi_model->tampil_data_rentang_harga();
		$data['harga_ukuran_rentang'] = $this->ukuran_jenis_cetakan_model->tampil_data_rentang_harga();
		$data['harga_packaging'] = $this->packaging_model->tampil_data_rentang_harga();
		// End Tampil Data Variasi

		// Tampil Data Cart
		$id_users = $this->session->userdata('id_users');
		$data['cart'] = $this->cart_model->tampil_produk_cart_detail_join($id_users);
		$data['jumlah_cart'] = $this->cart_model->get_jumlah_cart_users();
		$data['jumlah_reviews_softfile_only'] = $this->reviews_model->get_jumlah_reviews_softfile_only();
		$data['jumlah_reviews_softfile_print'] = $this->reviews_model->get_jumlah_reviews_softfile_print();
		$data['jumlah_reviews_package'] = $this->reviews_model->get_jumlah_reviews_package();
		$data['jumlah_reviews_print_only'] = $this->reviews_model->get_jumlah_reviews_print_only();
		// End Tampil Data Cart

		$this->load->view('templates_home/header', $data);	
		$this->load->view('templates_home/navbar');

		// View Kategori Produk
		if($slug == "soft_file_only"){
			$this->load->view('home/shop/categories/softfile_only');
		}elseif($slug == "soft_file_print"){
			$this->load->view('home/shop/categories/softfile_print');
		}elseif($slug == "package"){
			$this->load->view('home/shop/categories/package');
		}elseif($slug == "print_only"){
			$this->load->view('home/shop/categories/print_only');
		}else{
		}
		// End View Kategori Produk
		$this->load->view('templates_home/footer');
	}


	// View Detail Data Soft File Only
	public function detail_softfile_only($slug)
	{
		$data['title'] = "Detail Data Soft File Only";
		$data['detail'] = $this->softfile_only_model->ambil_detail_softfile_only_join($slug);
		// Tampil Data Soft File Only
		$data['softfile_only'] = $this->softfile_only_model->ambil_slug_softfile_only_join('soft_file_only');
		// End Tampil Data Soft File Only

		// Tampil Data Contact
		$data['contact'] = $this->contact_model->get_site_data()->row_array();
		// End Tampil Data Contact

		// Tampil Data Tambahan Biaya
		$data['tambahan_biaya'] = $this->tambahan_biaya_model->tampil_data('tambahan_biaya')->result();
		// End Tampil Data Tambahan Biaya

		// Tampil Data Variasi
		$data['variasi'] = $this->variasi_model->tampil_data('variasi')->result();
		$data['variasi_rentang'] = $this->variasi_model->tampil_data_rentang_harga();
		// End Tampil Data Variasi

		// Tampil Data Reviews
		$data['reviews'] = $this->reviews_model->tampil_data('reviews')->result();
		// End Tampil Data Reviews

		// Tampil Data Cart
		$id_users = $this->session->userdata('id_users');
		$data['cart'] = $this->cart_model->tampil_produk_cart_detail_join($id_users);
		$data['jumlah_cart'] = $this->cart_model->get_jumlah_cart_users();
		// End Tampil Data Cart

		$data['kategori_produk'] = $this->kategori_produk_model->tampil_data('kategori_produk')->result();
		$this->load->view('templates_home/header', $data);	
		$this->load->view('templates_home/navbar');
		$this->load->view('home/shop/detail/detail_softfile_only');
		$this->load->view('templates_home/footer');
	} 


	// View Detail Data Soft File Print
	public function detail_softfile_print($slug)
	{
		$data['title'] = "Detail Data Soft File Print";
		// Tampil Detail Soft File Print 
		$data['detail'] = $this->softfile_print_model->ambil_detail_softfile_print_join2($slug); 
		// End Tampil Detail Soft File Print 

		// Tampil Data Ukuran Jenis Cetakan
		$data['ukuran_jenis_cetakan'] = $this->ukuran_jenis_cetakan_model->tampil_data_join2();
		$data['ukuran_jenis_cetakan2'] = $this->ukuran_jenis_cetakan_model->tampil_data('ukuran_jenis_cetakan')->result();	
		// End Tampil Data Ukuran Jenis Cetakan

		// Tampil Data Contact
		$data['contact'] = $this->contact_model->get_site_data()->row_array();
		// End Tampil Data Contact

		// Tampil Data Sub Jenis Cetakan
		$data['sub_jenis_cetakan'] = $this->sub_jenis_cetakan_model->tampil_data_join2();
		$data['sub_jenis_cetakan2'] = $this->sub_jenis_cetakan_model->tampil_data('sub_jenis_cetakan')->result();	
		// End Tampil Data Sub Jenis Cetakan

		// Tampil Data Packaging
		$data['packaging'] = $this->packaging_model->tampil_data('packaging')->result();
		$data['packaging2'] = $this->packaging_model->tampil_data('packaging')->result();
		// End Tampil Data Packaging

		// Tampil Data Tambahan Biaya
		$data['tambahan_biaya'] = $this->tambahan_biaya_model->tampil_data('tambahan_biaya')->result();
		// End Tampil Data Tambahan Biaya

		// Tampil Data Soft File Print
		$data['softfile_print'] = $this->softfile_print_model->ambil_slug_softfile_print_join('soft_file_print');
		// End Tampil Data Soft File Print

		// Tampil Data Variasi
		$data['variasi'] = $this->variasi_model->tampil_data('variasi')->result();
		$data['variasi_rentang'] = $this->variasi_model->tampil_data_rentang_harga();
		$data['harga_packaging'] = $this->packaging_model->tampil_data_rentang_harga();
		$data['harga_ukuran_rentang'] = $this->ukuran_jenis_cetakan_model->tampil_data_rentang_harga();
		// End Tampil Data Variasi

		// Tampil Data Reviews
		$data['reviews'] = $this->reviews_model->tampil_data('reviews')->result();
		// End Tampil Data Reviews

		// Tampil Data Cart
		$id_users = $this->session->userdata('id_users');
		$data['cart'] = $this->cart_model->tampil_produk_cart_detail_join($id_users);
		$data['jumlah_cart'] = $this->cart_model->get_jumlah_cart_users();
		// End Tampil Data Cart

		$data['kategori_produk'] = $this->kategori_produk_model->tampil_data('kategori_produk')->result();
		$this->load->view('templates_home/header', $data);	
		$this->load->view('templates_home/navbar');
		$this->load->view('home/shop/detail/detail_softfile_print');
		$this->load->view('templates_home/footer');
	} 

	// View Detail Data Package
	public function detail_package($slug) 
	{
		$data['title'] = "Detail Data Package";
		// Tampil Detail Package 
		$data['detail'] = $this->package_model->ambil_detail_package_join2($slug);
		// End Tampil Detail Package 

		// Tampil Data Ukuran Jenis Cetakan
		$data['ukuran_jenis_cetakan'] = $this->ukuran_jenis_cetakan_model->tampil_data_join2();
		$data['ukuran_jenis_cetakan2'] = $this->ukuran_jenis_cetakan_model->tampil_data('ukuran_jenis_cetakan')->result();	
		// End Tampil Data Ukuran Jenis Cetakan

		// Tampil Data Contact
		$data['contact'] = $this->contact_model->get_site_data()->row_array();
		// End Tampil Data Contact

		// Tampil Data Sub Jenis Cetakan
		$data['sub_jenis_cetakan'] = $this->sub_jenis_cetakan_model->tampil_data_join2();
		$data['sub_jenis_cetakan2'] = $this->sub_jenis_cetakan_model->tampil_data('sub_jenis_cetakan')->result();	
		// End Tampil Data Sub Jenis Cetakan

		// Tampil Data Packaging
		$data['packaging'] = $this->packaging_model->tampil_data('packaging')->result();
		// End Tampil Data Packaging

		// Tampil Data Tambahan Biaya
		$data['tambahan_biaya'] = $this->tambahan_biaya_model->tampil_data('tambahan_biaya')->result();
		// End Tampil Data Tambahan Biaya

		// Tampil Data Soft File Print
		$data['softfile_print'] = $this->softfile_print_model->ambil_slug_softfile_print_join('soft_file_print');
		// End Tampil Data Soft File Print

		// Tampil Data Package
		$data['package'] = $this->package_model->ambil_slug_package_join('package');
		// End Tampil Data Package

		// Tampil Data Variasi
		$data['variasi'] = $this->variasi_model->tampil_data('variasi')->result();
		$data['harga_ukuran_rentang'] = $this->ukuran_jenis_cetakan_model->tampil_data_rentang_harga();
		$data['harga_packaging'] = $this->packaging_model->tampil_data_rentang_harga();
		// End Tampil Data Variasi

		// Tampil Data Reviews
		$data['reviews'] = $this->reviews_model->tampil_data('reviews')->result();
		// End Tampil Data Reviews

		// Tampil Data Cart
		$id_users = $this->session->userdata('id_users');
		$data['cart'] = $this->cart_model->tampil_produk_cart_detail_join($id_users);
		$data['jumlah_cart'] = $this->cart_model->get_jumlah_cart_users();
		// End Tampil Data Cart
		
		$data['kategori_produk'] = $this->kategori_produk_model->tampil_data('kategori_produk')->result();
		$this->load->view('templates_home/header', $data);	
		$this->load->view('templates_home/navbar');
		$this->load->view('home/shop/detail/detail_package');
		$this->load->view('templates_home/footer');
	} 

	// View Detail Data Print Only
	public function detail_print_only($slug)
	{
		$data['title'] = "Detail Data Print Only";
		
		// Tampil Detail Print Only 
		$data['detail'] = $this->print_only_model->ambil_detail_print_only_join2($slug);
		// End Tampil Detail Print Only 

		// Tampil Data Contact
		$data['contact'] = $this->contact_model->get_site_data()->row_array();
		// End Tampil Data Contact

		// Tampil Data Ukuran Jenis Cetakan
		$data['ukuran_jenis_cetakan'] = $this->ukuran_jenis_cetakan_model->tampil_data_join2();
		$data['ukuran_jenis_cetakan2'] = $this->ukuran_jenis_cetakan_model->tampil_data('ukuran_jenis_cetakan')->result();		
		// End Tampil Data Ukuran Jenis Cetakan

		// Tampil Data Sub Jenis Cetakan
		$data['sub_jenis_cetakan'] = $this->sub_jenis_cetakan_model->tampil_data_join2();
		$data['sub_jenis_cetakan2'] = $this->sub_jenis_cetakan_model->tampil_data('sub_jenis_cetakan')->result();	
		// End Tampil Data Sub Jenis Cetakan

		// Tampil Data Packaging
		$data['packaging'] = $this->packaging_model->tampil_data('packaging')->result();
		// End Tampil Data Packaging

// Tampil Data Packaging
		$data['packaging2'] = $this->packaging_model->tampil_data('packaging')->result();
		// End Tampil Data Packaging

		// Tampil Data Soft File Print
		$data['softfile_print'] = $this->softfile_print_model->ambil_slug_softfile_print_join('soft_file_print');
		// End Tampil Data Soft File Print

		// Tampil Data Print Only
		$data['print_only'] = $this->print_only_model->ambil_slug_print_only_join('print_only');
		// End Tampil Data Print Only

		// Tampil Data Variasi
		$data['variasi'] = $this->variasi_model->tampil_data('variasi')->result();
		// End Tampil Data Variasi

		// Tampil Data Reviews
		$data['reviews'] = $this->reviews_model->tampil_data('reviews')->result();
		// End Tampil Data Reviews

		// Tampil Data Cart
		$id_users = $this->session->userdata('id_users');
		$data['cart'] = $this->cart_model->tampil_produk_cart_detail_join($id_users);
		$data['jumlah_cart'] = $this->cart_model->get_jumlah_cart_users();
		// End Tampil Data Cart

		$data['kategori_produk'] = $this->kategori_produk_model->tampil_data('kategori_produk')->result();
		$this->load->view('templates_home/header', $data);	
		$this->load->view('templates_home/navbar');
		$this->load->view('home/shop/detail/detail_print_only');
		$this->load->view('templates_home/footer');
	} 


	// Pencarian Soft File Only
	public function search_softfile_only()
	{
		$data['title'] = "Produk Soft File Only - JangmarArt" ;
		$keyword_softfile_only = $this->input->post('keyword_softfile_only');
		// Tampil Jumlah Data
		$data['jumlah_softfile_only'] = $this->softfile_only_model->get_jumlah_softfile_only();
		// End Tampil Jumlah Data
		
		// Tampil Data Contact
		$data['contact'] = $this->contact_model->get_site_data()->row_array();
		// End Tampil Data Contact

		// Tampil Data Pencarian Soft File Only
		$data['softfile_only'] = $this->softfile_only_model->ambil_pencarian_softfile_only_join($keyword_softfile_only);
		// End Tampil Data Pencarian Soft File Only	

		// Tampil Data Kategori Produk
		$data['kategori_produk'] = $this->kategori_produk_model->tampil_data('kategori_produk')->result();
		// End Tampil Data Kategori Produk

		// Tampil Data Variasi
		$data['variasi'] = $this->variasi_model->tampil_data_rentang_harga();
		// End Tampil Data Variasi

		// Tampil Data Cart
		$id_users = $this->session->userdata('id_users');
		$data['cart'] = $this->cart_model->tampil_produk_cart_detail_join($id_users);
		$data['jumlah_cart'] = $this->cart_model->get_jumlah_cart_users();
		// End Tampil Data Cart

		if($data['softfile_only']){

			$this->load->view('templates_home/header', $data);	
			$this->load->view('templates_home/navbar');
			$this->load->view('home/shop/search/softfile_only');
			$this->load->view('templates_home/footer');	
		}else{
			$this->session->set_flashdata('error','
				Data Soft File Only yang Anda cari Tidak Ada!
				');
			redirect('home/shop/categories/soft_file_only');
		}

	}

	// Pencarian Soft File Print
	public function search_softfile_print()
	{
		$data['title'] = "Produk Soft File Print - JangmarArt" ;
		$keyword_softfile_print = $this->input->post('keyword_softfile_print');

		// Tampil Jumlah Data
		$data['jumlah_softfile_print'] = $this->softfile_print_model->get_jumlah_softfile_print();
		// End Tampil Jumlah Data

		// Tampil Data Contact
		$data['contact'] = $this->contact_model->get_site_data()->row_array();
		// End Tampil Data Contact
		 
		// Tampil Data Pencarian Soft File Print
		$data['softfile_print'] = $this->softfile_print_model->ambil_pencarian_softfile_print_join($keyword_softfile_print);
		// End Tampil Data Pencarian Soft File Print	

		// Tampil Data Kategori Produk
		$data['kategori_produk'] = $this->kategori_produk_model->tampil_data('kategori_produk')->result();
		// End Tampil Data Kategori Produk

		// Tampil Data Variasi
		$data['variasi'] = $this->variasi_model->tampil_data_rentang_harga();
		// End Tampil Data Variasi

		// Tampil Data Cart
		$id_users = $this->session->userdata('id_users');
		$data['cart'] = $this->cart_model->tampil_produk_cart_detail_join($id_users);
		$data['jumlah_cart'] = $this->cart_model->get_jumlah_cart_users();
		// End Tampil Data Cart

		if($data['softfile_print']){

			$this->load->view('templates_home/header', $data);	
			$this->load->view('templates_home/navbar');
			$this->load->view('home/shop/search/softfile_print');
			$this->load->view('templates_home/footer');	
		}else{
			$this->session->set_flashdata('error','
				Data Soft File Print yang Anda cari Tidak Ada!
				');
			redirect('home/shop/categories/soft_file_print');
		}

	}

	// Pencarian Print Only
	public function search_print_only()
	{
		$data['title'] = "Produk Print Only - JangmarArt" ;
		$keyword_print_only = $this->input->post('keyword_print_only');

		// Tampil Jumlah Data
		$data['jumlah_print_only'] = $this->print_only_model->get_jumlah_print_only();
		// End Tampil Jumlah Data

		// Tampil Data Contact
		$data['contact'] = $this->contact_model->get_site_data()->row_array();
		// End Tampil Data Contact
		
		// Tampil Data Pencarian Print Only
		$data['print_only'] = $this->print_only_model->ambil_pencarian_print_only_join($keyword_print_only);
		// End Tampil Data Pencarian Print Only	

		// Tampil Data Kategori Produk
		$data['kategori_produk'] = $this->kategori_produk_model->tampil_data('kategori_produk')->result();
		// End Tampil Data Kategori Produk

		// Tampil Data Cart
		$id_users = $this->session->userdata('id_users');
		$data['cart'] = $this->cart_model->tampil_produk_cart_detail_join($id_users);
		$data['jumlah_cart'] = $this->cart_model->get_jumlah_cart_users();
		// End Tampil Data Cart

		if($data['print_only']){

			$this->load->view('templates_home/header', $data);	
			$this->load->view('templates_home/navbar');
			$this->load->view('home/shop/search/print_only');
			$this->load->view('templates_home/footer');	
		}else{
			$this->session->set_flashdata('error','
				Data Print Only yang Anda cari Tidak Ada!
				');
			redirect('home/shop/categories/print_only');
		}

	}

	// Pencarian Package
	public function search_package()
	{
		$data['title'] = "Produk Package - JangmarArt" ;
		$keyword_package = $this->input->post('keyword_package');

		// Tampil Jumlah Data
		$data['jumlah_package'] = $this->package_model->get_jumlah_package();
		// End Tampil Jumlah Data

		// Tampil Data Contact
		$data['contact'] = $this->contact_model->get_site_data()->row_array();
		// End Tampil Data Contact
		
		// Tampil Data Pencarian Package
		$data['package'] = $this->package_model->ambil_pencarian_package_join($keyword_package);
		// End Tampil Data Pencarian Package	

		// Tampil Data Kategori Produk
		$data['kategori_produk'] = $this->kategori_produk_model->tampil_data('kategori_produk')->result();
		// End Tampil Data Kategori Produk

		// Tampil Data Cart
		$id_users = $this->session->userdata('id_users');
		$data['cart'] = $this->cart_model->tampil_produk_cart_detail_join($id_users);
		$data['jumlah_cart'] = $this->cart_model->get_jumlah_cart_users();
		// End Tampil Data Cart

		if($data['package']){

			$this->load->view('templates_home/header', $data);	
			$this->load->view('templates_home/navbar');
			$this->load->view('home/shop/search/package');
			$this->load->view('templates_home/footer');	
		}else{
			$this->session->set_flashdata('error','
				Data Package yang Anda cari Tidak Ada!
				');
			redirect('home/shop/categories/package');
		}

	}

	// View Reviews Soft File Only
	public function reviews_softfile_only($id_softfile_only)
	{
		$data['title'] = "Reviews Soft File Only";
		$data['detail'] = $this->softfile_only_model->ambil_id_softfile_only_join($id_softfile_only);
		// Tampil Data Soft File Only
		$data['softfile_only'] = $this->softfile_only_model->ambil_slug_softfile_only_join('soft_file_only');
		// End Tampil Data Soft File Only

		// Tampil Data Contact
		$data['contact'] = $this->contact_model->get_site_data()->row_array();
		// End Tampil Data Contact

		// Tampil Data Reviews
		$data['reviews'] = $this->reviews_model->tampil_data('reviews')->result();
		// End Tampil Data Reviews

		// Tampil Data Variasi
		$data['variasi'] = $this->variasi_model->tampil_data_rentang_harga();
		$data['variasi_rentang'] = $this->variasi_model->tampil_data_rentang_harga();
		// End Tampil Data Variasi

		// Tampil Data Cart
		$id_users = $this->session->userdata('id_users');
		$data['cart'] = $this->cart_model->tampil_produk_cart_detail_join($id_users);
		$data['jumlah_cart'] = $this->cart_model->get_jumlah_cart_users();
		// End Tampil Data Cart

		$data['kategori_produk'] = $this->kategori_produk_model->tampil_data('kategori_produk')->result();
		$this->load->view('templates_home/header', $data);	
		$this->load->view('templates_home/navbar');
		$this->load->view('home/shop/reviews/reviews_softfile_only');
		$this->load->view('templates_home/footer');
	} 

	public function tambah_reviews_softfile_only() 
	{
		$this->form_validation->set_rules('deskripsi_reviews','Deskripsi','required',
			[
				'required' => "Deskripsi tidak boleh kosong",
			]
		);

		$reviews = $this->db->get('reviews')->result();
		foreach($reviews as $review){
			if($this->input->post('id_users') == $review->id_users && $this->input->post('id_softfile_only') == $review->id_softfile_only){
				$this->session->set_flashdata('error','Anda sudah reviews!');
				redirect('');
			} 
		} 

		if($this->form_validation->run() == false){
			$this->session->set_flashdata('error','Reviews gagal!');
			redirect($this->agent->referrer());
		}else{
			$id_users 			= $this->input->post('id_users');
			$id_softfile_only 	= $this->input->post('id_softfile_only');
			$nama_reviews 		= htmlspecialchars($this->input->post('nama_reviews'));
			$email_reviews 		= htmlspecialchars($this->input->post('email_reviews'));
			$deskripsi_reviews 	= htmlspecialchars($this->input->post('deskripsi_reviews'));
			$gambar_reviews 	= 'default.png';


			$data = array(
				'id_users' 			=> $id_users,
				'id_softfile_only' 	=> $id_softfile_only,
				'nama_reviews' 		=> $nama_reviews,
				'email_reviews' 	=> $email_reviews,
				'deskripsi_reviews' => $deskripsi_reviews,
				'gambar_reviews' 	=> $gambar_reviews
			);

			$this->reviews_model->insert_reviews($data,'reviews');
			$this->session->set_flashdata('reviews','Thank You for Your Order!');
			redirect($this->agent->referrer());
		}
	}

	public function edit_reviews($id)
	{
		$data['title'] = "Edit Reviews Soft File Only";

		// Tampil Data Contact
		$data['contact'] = $this->contact_model->get_site_data()->row_array();
		// End Tampil Data Contact

		// Tampil Data Reviews
		$data['reviews'] = $this->reviews_model->tampil_data('reviews')->result();
		$data['detail'] = $this->reviews_model->ambil_id_reviews($id);
		foreach($data['detail'] as $row){
			if($row->edit_reviews == 1){
				$this->session->set_flashdata('error','Anda sudah Edit!');
			redirect('');
			}
		}
		// End Tampil Data Reviews

		// Tampil Data Cart
		$id_users = $this->session->userdata('id_users');
		$data['cart'] = $this->cart_model->tampil_produk_cart_detail_join($id_users);
		$data['jumlah_cart'] = $this->cart_model->get_jumlah_cart_users();
		// End Tampil Data Cart

		$data['kategori_produk'] = $this->kategori_produk_model->tampil_data('kategori_produk')->result();
		$this->load->view('templates_home/header', $data);	
		$this->load->view('templates_home/navbar');
		$this->load->view('home/shop/reviews/edit_reviews');
		$this->load->view('templates_home/footer');
	}

	// Aksi Edit Data Jenis Cetakan
	public function edit_reviews_aksi()
	{
		$id_reviews 		= $this->input->post('id_reviews');
		$nama_reviews 		= htmlspecialchars($this->input->post('nama_reviews'));
		$email_reviews 		= htmlspecialchars($this->input->post('email_reviews'));
		$deskripsi_reviews 	= htmlspecialchars($this->input->post('deskripsi_reviews'));

		
		$data = array(
			'nama_reviews' 			=> $nama_reviews,
			'email_reviews' 		=> $email_reviews,
			'deskripsi_reviews' 	=> $deskripsi_reviews,
			'edit_reviews' 			=> 1,
		);

		$where = array('id_reviews' => $id_reviews);

		$this->reviews_model->update_data($where,$data,'reviews');
		$this->session->set_flashdata('reviews','Thanks for editing the Review!');
		redirect('');
	}

	// View Reviews Soft File Print
	public function reviews_softfile_print($id_softfile_print)
	{
		$data['title'] = "Reviews Soft File Print";

		// Tampil Detail Soft File Print 
		$data['detail'] = $this->softfile_print_model->ambil_id_softfile_print_join2($id_softfile_print);
		// End Tampil Detail Soft File Print 

		// Tampil Data Ukuran Jenis Cetakan
		$data['ukuran_jenis_cetakan'] = $this->ukuran_jenis_cetakan_model->tampil_data_join2();
		$data['ukuran_jenis_cetakan2'] = $this->ukuran_jenis_cetakan_model->tampil_data('ukuran_jenis_cetakan')->result();	
		// End Tampil Data Ukuran Jenis Cetakan

		// Tampil Data Contact
		$data['contact'] = $this->contact_model->get_site_data()->row_array();
		// End Tampil Data Contact

		// Tampil Data Sub Jenis Cetakan
		$data['sub_jenis_cetakan'] = $this->sub_jenis_cetakan_model->tampil_data_join2();
		$data['sub_jenis_cetakan2'] = $this->sub_jenis_cetakan_model->tampil_data('sub_jenis_cetakan')->result();	
		// End Tampil Data Sub Jenis Cetakan

		// Tampil Data Packaging
		$data['packaging'] = $this->packaging_model->tampil_data('packaging')->result();
		// End Tampil Data Packaging

		// Tampil Data Tambahan Biaya
		$data['tambahan_biaya'] = $this->tambahan_biaya_model->tampil_data('tambahan_biaya')->result();
		// End Tampil Data Tambahan Biaya

		// Tampil Data Soft File Print
		$data['softfile_print'] = $this->softfile_print_model->ambil_slug_softfile_print_join('soft_file_print');
		// End Tampil Data Soft File Print

		// Tampil Data Variasi
		$data['variasi'] = $this->variasi_model->tampil_data('variasi')->result();
		$data['variasi_rentang'] = $this->variasi_model->tampil_data_rentang_harga();
		// End Tampil Data Variasi

		// Tampil Data Reviews
		$data['reviews'] = $this->reviews_model->tampil_data('reviews')->result();
		// End Tampil Data Reviews

		// Tampil Data Variasi
		$data['variasi_rentang'] = $this->variasi_model->tampil_data_rentang_harga();
		// End Tampil Data Variasi

		// Tampil Data Cart
		$id_users = $this->session->userdata('id_users');
		$data['cart'] = $this->cart_model->tampil_produk_cart_detail_join($id_users);
		$data['jumlah_cart'] = $this->cart_model->get_jumlah_cart_users();
		// End Tampil Data Cart

		$data['kategori_produk'] = $this->kategori_produk_model->tampil_data('kategori_produk')->result();
		$this->load->view('templates_home/header', $data);	
		$this->load->view('templates_home/navbar');
		$this->load->view('home/shop/reviews/reviews_softfile_print');
		$this->load->view('templates_home/footer');
	} 

	public function tambah_reviews_softfile_print() 
	{
		$this->form_validation->set_rules('deskripsi_reviews','Deskripsi','required',
			[
				'required' => "Deskripsi tidak boleh kosong",
			]
		);

		$reviews = $this->db->get('reviews')->result();
		foreach($reviews as $review){
			if($this->input->post('id_users') == $review->id_users && $this->input->post('id_softfile_print') == $review->id_softfile_print){
				$this->session->set_flashdata('error','Anda sudah reviews!');
				redirect('');
			}
		}

		if($this->form_validation->run() == false){
			$this->session->set_flashdata('error','Reviews gagal!');
			redirect($this->agent->referrer());
		}else{
			$id_users 			= $this->input->post('id_users');
			$id_softfile_print 	= $this->input->post('id_softfile_print');
			$nama_reviews 		= htmlspecialchars($this->input->post('nama_reviews'));
			$email_reviews 		= htmlspecialchars($this->input->post('email_reviews'));
			$deskripsi_reviews 	= htmlspecialchars($this->input->post('deskripsi_reviews'));
			$gambar_reviews 	= 'default.png';


			$data = array(
				'id_users' 			=> $id_users,
				'id_softfile_print' => $id_softfile_print,
				'nama_reviews' 		=> $nama_reviews,
				'email_reviews' 	=> $email_reviews,
				'deskripsi_reviews' => $deskripsi_reviews,
				'gambar_reviews' 	=> $gambar_reviews
			);

			$this->reviews_model->insert_reviews($data,'reviews');
			$this->session->set_flashdata('reviews','Thank You for Your Order!');
			redirect($this->agent->referrer());
		}
	}

	// View Reviews Package
	public function reviews_package($id_package) 
	{
		$data['title'] = "Reviews Package";

		// Tampil Detail Package 
		$data['detail'] = $this->package_model->ambil_id_package_join2($id_package);
		// End Tampil Detail Package 

		// Tampil Data Ukuran Jenis Cetakan
		$data['ukuran_jenis_cetakan'] = $this->ukuran_jenis_cetakan_model->tampil_data_join2();
		$data['ukuran_jenis_cetakan2'] = $this->ukuran_jenis_cetakan_model->tampil_data('ukuran_jenis_cetakan')->result();	
		// End Tampil Data Ukuran Jenis Cetakan

		// Tampil Data Contact
		$data['contact'] = $this->contact_model->get_site_data()->row_array();
		// End Tampil Data Contact

		// Tampil Data Sub Jenis Cetakan
		$data['sub_jenis_cetakan'] = $this->sub_jenis_cetakan_model->tampil_data_join2();
		$data['sub_jenis_cetakan2'] = $this->sub_jenis_cetakan_model->tampil_data('sub_jenis_cetakan')->result();	
		// End Tampil Data Sub Jenis Cetakan

		// Tampil Data Packaging
		$data['packaging'] = $this->packaging_model->tampil_data('packaging')->result();
		// End Tampil Data Packaging

		// Tampil Data Tambahan Biaya
		$data['tambahan_biaya'] = $this->tambahan_biaya_model->tampil_data('tambahan_biaya')->result();
		// End Tampil Data Tambahan Biaya

		// Tampil Data Soft File Print
		$data['softfile_print'] = $this->softfile_print_model->ambil_slug_softfile_print_join('soft_file_print');
		// End Tampil Data Soft File Print

		// Tampil Data Package
		$data['package'] = $this->package_model->ambil_slug_package_join('package');
		// End Tampil Data Package

		// Tampil Data Variasi
		$data['variasi'] = $this->variasi_model->tampil_data('variasi')->result();
		// End Tampil Data Variasi

		// Tampil Data Reviews
		$data['reviews'] = $this->reviews_model->tampil_data('reviews')->result();
		// End Tampil Data Reviews

		// Tampil Data Cart
		$id_users = $this->session->userdata('id_users');
		$data['cart'] = $this->cart_model->tampil_produk_cart_detail_join($id_users);
		$data['jumlah_cart'] = $this->cart_model->get_jumlah_cart_users();
		// End Tampil Data Cart
		
		$data['kategori_produk'] = $this->kategori_produk_model->tampil_data('kategori_produk')->result();
		$this->load->view('templates_home/header', $data);	
		$this->load->view('templates_home/navbar');
		$this->load->view('home/shop/reviews/reviews_package');
		$this->load->view('templates_home/footer');
	} 

	public function tambah_reviews_package() 
	{
		$this->form_validation->set_rules('deskripsi_reviews','Deskripsi','required',
			[
				'required' => "Deskripsi tidak boleh kosong",
			]
		);

		$reviews = $this->db->get('reviews')->result();
		foreach($reviews as $review){
			if($this->input->post('id_users') == $review->id_users && $this->input->post('id_package') == $review->id_package){
				$this->session->set_flashdata('error','Anda sudah reviews!');
				redirect('');
			}
		}

		if($this->form_validation->run() == false){
			$this->session->set_flashdata('error','Reviews gagal!');
			redirect($this->agent->referrer());
		}else{
			$id_users 			= $this->input->post('id_users');
			$id_package 		= $this->input->post('id_package');
			$nama_reviews 		= htmlspecialchars($this->input->post('nama_reviews'));
			$email_reviews 		= htmlspecialchars($this->input->post('email_reviews'));
			$deskripsi_reviews 	= htmlspecialchars($this->input->post('deskripsi_reviews'));
			$gambar_reviews 	= 'default.png';


			$data = array(
				'id_users' 			=> $id_users,
				'id_package' 		=> $id_package,
				'nama_reviews' 		=> $nama_reviews,
				'email_reviews' 	=> $email_reviews,
				'deskripsi_reviews' => $deskripsi_reviews,
				'gambar_reviews' 	=> $gambar_reviews
			);

			$this->reviews_model->insert_reviews($data,'reviews');
			$this->session->set_flashdata('reviews','Thank You for Your Order!');
			redirect($this->agent->referrer());
		}
	}

	// View Reviews Print Only
	public function reviews_print_only($id_print_only)
	{
		$data['title'] = "Reviews Print Only";
		
		// Tampil Detail Print Only 
		$data['detail'] = $this->print_only_model->ambil_id_print_only_join2($id_print_only);
		// End Tampil Detail Print Only 

		// Tampil Data Contact
		$data['contact'] = $this->contact_model->get_site_data()->row_array();
		// End Tampil Data Contact

		// Tampil Data Ukuran Jenis Cetakan
		$data['ukuran_jenis_cetakan'] = $this->ukuran_jenis_cetakan_model->tampil_data_join2();
		$data['ukuran_jenis_cetakan2'] = $this->ukuran_jenis_cetakan_model->tampil_data('ukuran_jenis_cetakan')->result();		
		// End Tampil Data Ukuran Jenis Cetakan

		// Tampil Data Sub Jenis Cetakan
		$data['sub_jenis_cetakan'] = $this->sub_jenis_cetakan_model->tampil_data_join2();
		$data['sub_jenis_cetakan2'] = $this->sub_jenis_cetakan_model->tampil_data('sub_jenis_cetakan')->result();	
		// End Tampil Data Sub Jenis Cetakan

		// Tampil Data Packaging
		$data['packaging'] = $this->packaging_model->tampil_data('packaging')->result();
		// End Tampil Data Packaging
		
		// Tampil Data Soft File Print
		$data['softfile_print'] = $this->softfile_print_model->ambil_slug_softfile_print_join('soft_file_print');
		// End Tampil Data Soft File Print

		// Tampil Data Print Only
		$data['print_only'] = $this->print_only_model->ambil_slug_print_only_join('print_only');
		// End Tampil Data Print Only

		// Tampil Data Variasi
		$data['variasi'] = $this->variasi_model->tampil_data('variasi')->result();
		// End Tampil Data Variasi

		// Tampil Data Reviews
		$data['reviews'] = $this->reviews_model->tampil_data('reviews')->result();
		// End Tampil Data Reviews

		// Tampil Data Cart
		$id_users = $this->session->userdata('id_users');
		$data['cart'] = $this->cart_model->tampil_produk_cart_detail_join($id_users);
		$data['jumlah_cart'] = $this->cart_model->get_jumlah_cart_users();
		// End Tampil Data Cart

		$data['kategori_produk'] = $this->kategori_produk_model->tampil_data('kategori_produk')->result();
		$this->load->view('templates_home/header', $data);	
		$this->load->view('templates_home/navbar');
		$this->load->view('home/shop/reviews/reviews_print_only');
		$this->load->view('templates_home/footer');
	} 


	public function tambah_reviews_print_only() 
	{
		$this->form_validation->set_rules('deskripsi_reviews','Deskripsi','required',
			[
				'required' => "Deskripsi tidak boleh kosong",
			]
		);

		$reviews = $this->db->get('reviews')->result();
		foreach($reviews as $review){
			if($this->input->post('id_users') == $review->id_users && $this->input->post('id_print_only') == $review->id_print_only){
				$this->session->set_flashdata('error','Anda sudah reviews!');
				redirect('');
			}
		}

		if($this->form_validation->run() == false){
			$this->session->set_flashdata('error','Reviews gagal!');
			redirect($this->agent->referrer());
		}else{
			$id_users 			= $this->input->post('id_users');
			$id_print_only 		= $this->input->post('id_print_only');
			$nama_reviews 		= htmlspecialchars($this->input->post('nama_reviews'));
			$email_reviews 		= htmlspecialchars($this->input->post('email_reviews'));
			$deskripsi_reviews 	= htmlspecialchars($this->input->post('deskripsi_reviews'));
			$gambar_reviews 	= 'default.png';


			$data = array(
				'id_users' 			=> $id_users,
				'id_print_only' 	=> $id_print_only,
				'nama_reviews' 		=> $nama_reviews,
				'email_reviews' 	=> $email_reviews,
				'deskripsi_reviews' => $deskripsi_reviews,
				'gambar_reviews' 	=> $gambar_reviews
			);

			$this->reviews_model->insert_reviews($data,'reviews');
			$this->session->set_flashdata('reviews','Thank You for Your Order!');
			redirect($this->agent->referrer());
		}
	}



}

/* End of file Shop.php */
/* Location: ./application/controllers/home/Shop.php */