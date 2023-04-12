<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan extends CI_Controller {

	// Cek Level Akses & Cek Login
	public function __construct()
	{
		parent::__construct();  
		cek_login();
		cek_user();
	} 

	public function belum_bayar()
	{
		$data['title'] = "Belum di Bayar -  Web JangmarArt";

		// Tampil Produk Transaksi
		$data['transaksi'] = $this->transaksi_model->tampil_produk_transaksi_admin();	
		// End Tampil Produk Transaksi

		$data['kategori_produk'] = $this->kategori_produk_model->tampil_data('kategori_produk')->result();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/topbar');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/penjualan/belum_bayar');
		$this->load->view('templates_admin/footer');
	}
	public function sedang_dalam_proses()
	{
		$data['title'] = "Sedang Dalam Proses -  Web JangmarArt";

		// Tampil Produk Transaksi
		$data['transaksi'] = $this->transaksi_model->tampil_produk_transaksi_admin();	
		// End Tampil Produk Transaksi

		$data['kategori_produk'] = $this->kategori_produk_model->tampil_data('kategori_produk')->result();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/topbar');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/penjualan/sedang_dalam_proses');
		$this->load->view('templates_admin/footer');
	}
	public function dikemas()
	{
		$data['title'] = "Dikemas -  Web JangmarArt";

		// Tampil Produk Transaksi
		$data['transaksi'] = $this->transaksi_model->tampil_produk_transaksi_admin();	
		// End Tampil Produk Transaksi

		$data['kategori_produk'] = $this->kategori_produk_model->tampil_data('kategori_produk')->result();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/topbar');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/penjualan/dikemas');
		$this->load->view('templates_admin/footer');
	}
	public function dikirim()
	{
		$data['title'] = "Dikirim -  Web JangmarArt";

		// Tampil Produk Transaksi
		$data['transaksi'] = $this->transaksi_model->tampil_produk_transaksi_admin();	
		// End Tampil Produk Transaksi

		$data['kategori_produk'] = $this->kategori_produk_model->tampil_data('kategori_produk')->result();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/topbar');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/penjualan/dikirim');
		$this->load->view('templates_admin/footer');
	}
	public function retur()
	{
		$data['title'] = "Retur -  Web JangmarArt";

		// Tampil Produk Transaksi
		$data['transaksi'] = $this->transaksi_model->tampil_produk_transaksi_admin();	
		// End Tampil Produk Transaksi

		$data['kategori_produk'] = $this->kategori_produk_model->tampil_data('kategori_produk')->result();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/topbar');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/penjualan/retur');
		$this->load->view('templates_admin/footer');
	}
	public function selesai()
	{
		$data['title'] = "Selesai -  Web JangmarArt";

		// Tampil Produk Transaksi
		$data['transaksi'] = $this->transaksi_model->tampil_produk_transaksi_admin();	
		// End Tampil Produk Transaksi

		$data['kategori_produk'] = $this->kategori_produk_model->tampil_data('kategori_produk')->result();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/topbar');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/penjualan/selesai');
		$this->load->view('templates_admin/footer');
	}

}

/* End of file Penjualan.php */
/* Location: ./application/controllers/admin/Penjualan.php */