<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {

	public function index()
	{
		$data['title'] = "Gallery - JangmarArt";

		// Tampil Data Gallery
		$data['gallery'] = $this->gallery_model->tampil_data('gallery')->result();
		// End Tampil Data Gallery

		// Tampil Data Contact
		$data['contact'] = $this->contact_model->get_site_data()->row_array();
		// End Tampil Data Contact

		// Tampil Data Cart
		$id_users = $this->session->userdata('id_users');
		$data['cart'] = $this->cart_model->tampil_produk_cart_detail_join($id_users);
		$data['jumlah_cart'] = $this->cart_model->get_jumlah_cart_users();
		// End Tampil Data Cart
		
		$data['kategori_produk'] = $this->kategori_produk_model->tampil_data('kategori_produk')->result();
		$this->load->view('templates_home/header', $data);	
		$this->load->view('templates_home/navbar');
		$this->load->view('home/gallery/index');
		$this->load->view('templates_home/footer');
	}

}

/* End of file Gallery.php */
/* Location: ./application/controllers/home/Gallery.php */