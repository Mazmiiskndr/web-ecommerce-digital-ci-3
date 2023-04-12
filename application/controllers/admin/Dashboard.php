<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	// Cek Level Akses & Cek Login
	public function __construct()
	{
		parent::__construct();  
		cek_login();
		cek_user();
	} 

	public function index()
	{
		$data['title'] = "Dashboard Web JangmarArt";

		// Tampil Produk Transaksi
		$data['transaksi'] = $this->transaksi_model->tampil_produk_transaksi_admin();	
		// End Tampil Produk Transaksi

		// Tampil Jumlah Data
		$data['jumlah_users'] = $this->users_model->get_jumlah_users();
		$data['jumlah_softfile_only'] = $this->softfile_only_model->get_jumlah_softfile_only();
		$data['jumlah_softfile_print'] = $this->softfile_print_model->get_jumlah_softfile_print();
		$data['jumlah_package'] = $this->package_model->get_jumlah_package();
		$data['jumlah_print_only'] = $this->print_only_model->get_jumlah_print_only();
		$data['jumlah_transaksi'] = $this->transaksi_model->get_jumlah_transaksi();
		$data['jumlah_pendapatan'] = $this->transaksi_model->get_jumlah_pendapatan();
		// End Tampil Jumlah Data

		$data['kategori_produk'] = $this->kategori_produk_model->tampil_data('kategori_produk')->result();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/topbar');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/dashboard');
		$this->load->view('templates_admin/footer');		
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/admin/Dashboard.php */