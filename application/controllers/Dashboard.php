<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
		$data['title'] = "JangmarArt";

		$data['jumlah_cart'] = $this->cart_model->get_jumlah_cart_users();

		// Tampil Data Soft File Only
		$data['softfile_only'] = $this->softfile_only_model->ambil_slug_softfile_only_join();
		// End Tampil Data Soft File Only

		// Tampil Data Soft File Print
		$data['softfile_print'] = $this->softfile_print_model->ambil_slug_softfile_print_join();
		// End Tampil Data Soft File Print

		// Tampil Data Package
		$data['package'] = $this->package_model->ambil_slug_package_join();
		// End Tampil Data Package

		// Tampil Data Print Only
		$data['print_only'] = $this->print_only_model->ambil_slug_print_only_join();
		// End Tampil Data Print Only

		// Tampil Data Soft File Only2
		$data['softfile_only2'] = $this->softfile_only_model->ambil_slug_softfile_only_join2();
		$data['softfile_only_best_seller'] = $this->softfile_only_model->softfile_only_best_seller();
		// End Tampil Data Soft File Only2

		// Tampil Data Soft File Print2
		$data['softfile_print2'] = $this->softfile_print_model->ambil_slug_softfile_print_join2();
		$data['softfile_print_best_seller'] = $this->softfile_print_model->softfile_print_best_seller();
		// End Tampil Data Soft File Print2

		// Tampil Data Package2
		$data['package2'] = $this->package_model->ambil_slug_package_join2();
		$data['package_best_seller'] = $this->package_model->package_best_seller();
		// End Tampil Data Package2 

		// Tampil Data Print Only2
		$data['print_only2'] = $this->print_only_model->ambil_slug_print_only_join2();
		$data['print_only_best_seller'] = $this->print_only_model->print_only_best_seller();
		// End Tampil Data Print Only2

		// Tampil Data Kategori Produk
		$data['kategori_produk'] = $this->kategori_produk_model->tampil_data('kategori_produk')->result();
		// End Tampil Data Kategori Produk

		// Tampil Data Contact
		$data['contact'] = $this->contact_model->get_site_data()->row_array();
		// End Tampil Data Contact

		// Tampil Data Home
		$data['home'] = $this->home_model->get_site_data()->row_array();
		// End Tampil Data Home

		// Tampil Data Gallery
		$data['gallery'] = $this->gallery_model->tampil_data('gallery')->result();
		// End Tampil Data Gallery

		// Tampil Data Variasi
		$data['variasi'] = $this->variasi_model->tampil_data_rentang_harga();
		$data['harga_ukuran_rentang'] = $this->ukuran_jenis_cetakan_model->tampil_data_rentang_harga();
		$data['harga_packaging'] = $this->packaging_model->tampil_data_rentang_harga();
		// End Tampil Data Variasi

		// Tampil Data Cart
		$id_users = $this->session->userdata('id_users');
		$data['cart'] = $this->cart_model->tampil_produk_cart_detail_join($id_users);
		// End Tampil Data Cart

		$this->load->view('templates_home/header', $data);	
		$this->load->view('templates_home/navbar');
		$this->load->view('home/index');
		$this->load->view('templates_home/footer');		
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */