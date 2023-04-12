<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {


	public function index()
	{
		if(!$this->session->userdata('email_users')){

			$this->session->set_flashdata('pesan','
				<div style="color: red;" class="alert alert-danger alert-dismissible fade show" role="alert">
				Silahkan <strong>Login/Register!</strong>
				<button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true"></span>
				</button>
				</div>
				');
			redirect('auth/login');
		}
		$data['title'] = "Cart - JangmarArt";
		// Tampil Data Cart
		$id_users = $this->session->userdata('id_users');
		$data['cart'] = $this->cart_model->tampil_produk_cart_detail_join($id_users);
		$data['jumlah_cart'] = $this->cart_model->get_jumlah_cart_users();
		// End Tampil Data Cart


		if($data['cart']){
			// Tampil Data Coupon 
			$data['coupon'] = $this->coupon_model->tampil_data_apply_coupon();
			// End Tampil Data Coupon 
			// Cek Coupon

			if($data['coupon']){
				if($data['coupon']['sampai_tanggal_coupon'] <=  date("Y-m-d")){
					$id_apply_coupon = $data['coupon']['id_applycoupon'];
					$where = array('id_applycoupon' => $id_apply_coupon);
					$this->coupon_model->hapus_data($where,'applycoupon');
				}else{

				}
			}
			// End Cek Coupon
		}
		
		// Tampil Data Kategori Produk
		$data['kategori_produk'] = $this->kategori_produk_model->tampil_data('kategori_produk')->result();
		// End Tampil Data Kategori Produk

		// Tampil Data Contact
		$data['contact'] = $this->contact_model->get_site_data()->row_array();
		// End Tampil Data Contact

		$this->load->view('templates_home/header', $data);	
		$this->load->view('templates_home/navbar');
		$this->load->view('home/cart/index');
		$this->load->view('templates_home/footer');
	}

	// < --------------------------------------------- >
					// SOFT FILE ONLY
	// < --------------------------------------------- >

	public function update_cart() {

		$id_users = $this->session->userdata('id_users');
		$data['cart'] = $this->cart_model->tampil_produk_cart_detail_join($id_users);
		$i = 1;
		foreach ($data['cart'] as $items) {
			$data = array (
				
				'qty'   => $this->input->post($i.'[qty]')
			);
			$where = array('id_cart' => $items->id_cart);
			$update = $this->cart_model->update_data($where,$data,'cart');
			$i++;
		}
		$this->session->set_flashdata('success','Pesanan berhasil di Update!');
		redirect($this->agent->referrer());

	}



	// public function tambah_cart($slug)
	// {
	// 	if(!$this->session->userdata('email_users')){

	// 		$this->session->set_flashdata('pesan','
	// 			<div style="color: red;" class="alert alert-danger alert-dismissible fade show" role="alert">
	// 			Silahkan <strong>Login/Register!</strong>
	// 			<button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
	// 			<span aria-hidden="true"></span>
	// 			</button>
	// 			</div>
	// 			');
	// 		redirect('auth/login');
	// 	}
	// 	$softfile_only = $this->softfile_only_model->find_softfile_only($slug);
	// 	$package = $this->package_model->find_package($slug);
	// 	$softfile_print = $this->softfile_print_model->find_softfile_print($slug);
	// 	$print_only = $this->print_only_model->find_print_only($slug);

	// 	$qty = $this->input->post('qty');

	// 	// Tampil Data Tambahan Biaya
	// 	$id_tambahan_biaya = $this->input->post('id_tambahan_biaya');
	// 	$tambahan_biaya = $this->db->query("SELECT * FROM tambahan_biaya tb WHERE tb.id_tambahan_biaya='$id_tambahan_biaya' ORDER BY tb.id_tambahan_biaya LIMIT 1")->row_array();
	// 	// End Tampil Data Tambahan Biaya
	// 	$harga_tambahan_biaya = ($tambahan_biaya) ? $tambahan_biaya['harga_tambahan_biaya'] : 0;
	// 	$nama_tambahan_biaya = ($tambahan_biaya) ? $tambahan_biaya['nama_tambahan_biaya'] : "";


	// 	if($softfile_only){
	// 		$data = array(
	// 			array(
	// 				'id' 					=> $softfile_only->slug_softfile_only,
	// 				'id_softfile_only' 		=> $softfile_only->id_softfile_only,
	// 				'nama_kategori_produk' 	=> $softfile_only->nama_kategori_produk,
	// 				'qty' 					=> ($qty) ? $qty : 1,
	// 				'discount' 				=> $softfile_only->diskon_softfile_only,
	// 				'price' 				=> ($softfile_only->harga_softfile_only-$softfile_only->diskon_softfile_only) + $harga_tambahan_biaya,
	// 				'harga_diskon' 			=> $softfile_only->harga_softfile_only-$softfile_only->diskon_softfile_only,
	// 				'harga' 				=> $softfile_only->harga_softfile_only, 
	// 				'harga_tambahan_biaya' 	=> $harga_tambahan_biaya,
	// 				'nama_tambahan_biaya' 	=> $nama_tambahan_biaya,
	// 				'name' 					=> $softfile_only->nama_softfile_only,
	// 				'image' 				=> $softfile_only->gambar_softfile_only
	// 			),


	// 		);
	// 	}elseif($package){ 
	// 		// Tampil Data Ukuran Cetakan
	// 		$id_ukuran_jenis_cetakan = $this->input->post('id_ukuran_jenis_cetakan');
	// 		$ukuran_jenis_cetakan = $this->db->query("SELECT * FROM ukuran_jenis_cetakan ujc WHERE ujc.id_ukuran_jenis_cetakan='$id_ukuran_jenis_cetakan' ORDER BY ujc.id_ukuran_jenis_cetakan LIMIT 1")->row_array();
	// 		// End Tampil Data Ukuran Cetakan

	// 		// Tampil Data Sub Jenis Cetakan
	// 		$id_sub_jenis_cetakan = $this->input->post('id_sub_jenis_cetakan');
	// 		$sub_jenis_cetakan = $this->db->query("SELECT * FROM sub_jenis_cetakan sjc WHERE sjc.id_sub_jenis_cetakan='$id_sub_jenis_cetakan' ORDER BY sjc.id_sub_jenis_cetakan LIMIT 1")->row_array();
	// 		// End Tampil Data Sub Jenis Cetakan

	// 		// Tampil Data Packaging
	// 		$id_packaging = $this->input->post('id_packaging');
	// 		$packaging = $this->db->query("SELECT * FROM packaging p WHERE p.id_packaging='$id_packaging' ORDER BY p.id_packaging LIMIT 1")->row_array();
	// 		// End Tampil Data Packaging

	// 		$data = array(
	// 			array(
	// 				'id' 							=> $package->slug_package,
	// 				'id_package' 					=> $package->id_package,
	// 				'nama_kategori_produk' 			=> $package->nama_kategori_produk,
	// 				'qty' 							=> ($qty) ? $qty : 1,

	// 				'price' 						=> ($package->harga_package 
	// 					- 
	// 					$package->diskon_package) 
	// 				+ 
	// 				$ukuran_jenis_cetakan['harga_ukuran_jenis_cetakan'] 
	// 				+ 
	// 				$sub_jenis_cetakan['harga_sub_jenis_cetakan'] 
	// 				+ 
	// 				$packaging['harga_packaging'] 
	// 				+
	// 				$harga_tambahan_biaya,

	// 				'harga_diskon' 					=> $package->harga_package-$package->diskon_package ,
	// 				'harga' 						=> $package->harga_package,
	// 				'id_ukuran_jenis_cetakan' 		=> $ukuran_jenis_cetakan['id_ukuran_jenis_cetakan'],
	// 				'nama_ukuran_jenis_cetakan' 	=> $ukuran_jenis_cetakan['nama_ukuran_jenis_cetakan'],
	// 				'berat_ukuran_jenis_cetakan' 	=> $ukuran_jenis_cetakan['berat_ukuran_jenis_cetakan'],
	// 				'harga_ukuran_jenis_cetakan' 	=> $ukuran_jenis_cetakan['harga_ukuran_jenis_cetakan'],
	// 				'nama_sub_jenis_cetakan' 		=> $sub_jenis_cetakan['nama_sub_jenis_cetakan'],
	// 				'harga_sub_jenis_cetakan' 		=> $sub_jenis_cetakan['harga_sub_jenis_cetakan'],
	// 				'nama_packaging' 				=> $packaging['nama_packaging'],
	// 				'harga_packaging' 				=> $packaging['harga_packaging'],
	// 				'nama_jenis_cetakan' 			=> $package->nama_jenis_cetakan,
	// 				'harga_tambahan_biaya' 			=> $harga_tambahan_biaya,
	// 				'nama_tambahan_biaya' 			=> $nama_tambahan_biaya,
	// 				'discount' 						=> $package->diskon_package,
	// 				'name' 							=> $package->nama_package,
	// 				'image' 						=> $package->gambar_package
	// 			),

	// 		);

	// 	}elseif($softfile_print){
	// 		// Tampil Data Ukuran Cetakan
	// 		$id_ukuran_jenis_cetakan = $this->input->post('id_ukuran_jenis_cetakan');
	// 		$ukuran_jenis_cetakan = $this->db->query("SELECT * FROM ukuran_jenis_cetakan ujc WHERE ujc.id_ukuran_jenis_cetakan='$id_ukuran_jenis_cetakan' ORDER BY ujc.id_ukuran_jenis_cetakan LIMIT 1")->row_array();
	// 		// End Tampil Data Ukuran Cetakan

	// 		// Tampil Data Sub Jenis Cetakan
	// 		$id_sub_jenis_cetakan = $this->input->post('id_sub_jenis_cetakan');
	// 		$sub_jenis_cetakan = $this->db->query("SELECT * FROM sub_jenis_cetakan sjc WHERE sjc.id_sub_jenis_cetakan='$id_sub_jenis_cetakan' ORDER BY sjc.id_sub_jenis_cetakan LIMIT 1")->row_array();
	// 		// End Tampil Data Sub Jenis Cetakan

	// 		// Tampil Data Packaging
	// 		$id_packaging = $this->input->post('id_packaging');
	// 		$packaging = $this->db->query("SELECT * FROM packaging p WHERE p.id_packaging='$id_packaging' ORDER BY p.id_packaging LIMIT 1")->row_array();
	// 		// End Tampil Data Packaging
	// 		$data = array(
	// 			array(
	// 				'id' 							=> $softfile_print->slug_softfile_print,
	// 				'id_softfile_print'	 			=> $softfile_print->id_softfile_print,
	// 				'nama_kategori_produk' 			=> $softfile_print->nama_kategori_produk,
	// 				'qty' 							=> ($qty) ? $qty : 1,

	// 				'price' 						=> ($softfile_print->harga_softfile_print 
	// 					- 
	// 					$softfile_print->diskon_softfile_print) 
	// 				+ 
	// 				$ukuran_jenis_cetakan['harga_ukuran_jenis_cetakan'] 
	// 				+ 
	// 				$sub_jenis_cetakan['harga_sub_jenis_cetakan'] 
	// 				+ 
	// 				$packaging['harga_packaging']
	// 				+
	// 				$harga_tambahan_biaya,

	// 				'harga_diskon' 					=> $softfile_print->harga_softfile_print-$softfile_print->diskon_softfile_print,
	// 				'harga' 						=> $softfile_print->harga_softfile_print,
	// 				'id_ukuran_jenis_cetakan' 		=> $ukuran_jenis_cetakan['id_ukuran_jenis_cetakan'],
	// 				'nama_ukuran_jenis_cetakan' 	=> $ukuran_jenis_cetakan['nama_ukuran_jenis_cetakan'],
	// 				'berat_ukuran_jenis_cetakan' 	=> $ukuran_jenis_cetakan['berat_ukuran_jenis_cetakan'],
	// 				'harga_ukuran_jenis_cetakan' 	=> $ukuran_jenis_cetakan['harga_ukuran_jenis_cetakan'],
	// 				'nama_sub_jenis_cetakan' 		=> $sub_jenis_cetakan['nama_sub_jenis_cetakan'],
	// 				'harga_sub_jenis_cetakan' 		=> $sub_jenis_cetakan['harga_sub_jenis_cetakan'],
	// 				'nama_packaging' 				=> $packaging['nama_packaging'],
	// 				'harga_packaging' 				=> $packaging['harga_packaging'],
	// 				'harga_tambahan_biaya' 			=> $harga_tambahan_biaya,
	// 				'nama_tambahan_biaya' 			=> $nama_tambahan_biaya,
	// 				'nama_jenis_cetakan' 			=> $softfile_print->nama_jenis_cetakan,
	// 				'discount' 						=> $softfile_print->diskon_softfile_print,
	// 				'name' 							=> $softfile_print->nama_softfile_print,
	// 				'image' 						=> $softfile_print->gambar_softfile_print
	// 			),

	// 		);

	// 	}elseif($print_only){
	// 		// Tampil Data Ukuran Cetakan
	// 		$id_ukuran_jenis_cetakan = $this->input->post('id_ukuran_jenis_cetakan');
	// 		$ukuran_jenis_cetakan = $this->db->query("SELECT * FROM ukuran_jenis_cetakan ujc WHERE ujc.id_ukuran_jenis_cetakan='$id_ukuran_jenis_cetakan' ORDER BY ujc.id_ukuran_jenis_cetakan LIMIT 1")->row_array();
	// 		// End Tampil Data Ukuran Cetakan

	// 		// Tampil Data Sub Jenis Cetakan
	// 		$id_sub_jenis_cetakan = $this->input->post('id_sub_jenis_cetakan');
	// 		$sub_jenis_cetakan = $this->db->query("SELECT * FROM sub_jenis_cetakan sjc WHERE sjc.id_sub_jenis_cetakan='$id_sub_jenis_cetakan' ORDER BY sjc.id_sub_jenis_cetakan LIMIT 1")->row_array();
	// 		// End Tampil Data Sub Jenis Cetakan

	// 		// Tampil Data Packaging
	// 		$id_packaging = $this->input->post('id_packaging');
	// 		$packaging = $this->db->query("SELECT * FROM packaging p WHERE p.id_packaging='$id_packaging' ORDER BY p.id_packaging LIMIT 1")->row_array();
	// 		// End Tampil Data Packaging

	// 		$data = array(
	// 			array(
	// 				'id' 							=> $print_only->slug_print_only,
	// 				'id_print_only' 				=> $print_only->id_print_only,
	// 				'nama_kategori_produk' 			=> $print_only->nama_kategori_produk,
	// 				'qty' 							=> ($qty) ? $qty : 1,
	// 				'price' 						=> ($print_only->harga_print_only 
	// 					- 
	// 					$print_only->diskon_print_only) 
	// 				+ 
	// 				$ukuran_jenis_cetakan['harga_ukuran_jenis_cetakan'] 
	// 				+ 
	// 				$sub_jenis_cetakan['harga_sub_jenis_cetakan'] 
	// 				+ 
	// 				$packaging['harga_packaging']
	// 				+
	// 				$harga_tambahan_biaya,
	// 				'harga_diskon' 					=> $print_only->harga_print_only-$print_only->diskon_print_only,
	// 				'harga' 						=> $print_only->harga_print_only,
	// 				'id_ukuran_jenis_cetakan' 		=> $ukuran_jenis_cetakan['id_ukuran_jenis_cetakan'],
	// 				'nama_ukuran_jenis_cetakan' 	=> $ukuran_jenis_cetakan['nama_ukuran_jenis_cetakan'],
	// 				'berat_ukuran_jenis_cetakan' 	=> $ukuran_jenis_cetakan['berat_ukuran_jenis_cetakan'],
	// 				'harga_ukuran_jenis_cetakan' 	=> $ukuran_jenis_cetakan['harga_ukuran_jenis_cetakan'],
	// 				'nama_sub_jenis_cetakan' 		=> $sub_jenis_cetakan['nama_sub_jenis_cetakan'],
	// 				'harga_sub_jenis_cetakan' 		=> $sub_jenis_cetakan['harga_sub_jenis_cetakan'],
	// 				'nama_packaging' 				=> $packaging['nama_packaging'],
	// 				'harga_packaging' 				=> $packaging['harga_packaging'],
	// 				'harga_tambahan_biaya' 			=> $harga_tambahan_biaya,
	// 				'nama_tambahan_biaya' 			=> $nama_tambahan_biaya,
	// 				'nama_jenis_cetakan' 			=> $print_only->nama_jenis_cetakan,
	// 				'discount' 						=> $print_only->diskon_print_only,
	// 				'name' 							=> $print_only->nama_print_only,
	// 				'image' 						=> $print_only->gambar_print_only
	// 			),

	// 		);

	// 	}
	// 	$this->cart->insert($data);
	// 	if($data){
	// 		$this->session->set_flashdata('success','Pesanan masuk ke Keranjang!');
	// 		redirect($this->agent->referrer());
	// 	}else{
	// 		$this->session->set_flashdata('error','Pesanan gagal masuk ke Keranjang!');
	// 		redirect($this->agent->referrer());
	// 	}


	// }


	public function tambah_cart_softfile_only($id_so)
	{
		if(!$this->session->userdata('email_users')){

			$this->session->set_flashdata('pesan','
				<div style="color: red;" class="alert alert-danger alert-dismissible fade show" role="alert">
				Silahkan <strong>Login/Register!</strong>
				<button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true"></span>
				</button>
				</div>
				');
			redirect('auth/login');
		}
		$softfile_only = $this->softfile_only_model->find_softfile_only_id($id_so);
		$qty = $this->input->post('qty');


		// Tampil Data Tambahan Biaya
		$id_tambahan_biaya = $this->input->post('id_tambahan_biaya');
		$tambahan_biaya = $this->db->query("SELECT * FROM tambahan_biaya tb WHERE tb.id_tambahan_biaya='$id_tambahan_biaya' ORDER BY tb.id_tambahan_biaya LIMIT 1")->row_array();
		// End Tampil Data Tambahan Biaya
		$harga_tambahan_biaya = ($tambahan_biaya) ? $tambahan_biaya['harga_tambahan_biaya'] : 0;
		$nama_tambahan_biaya = ($tambahan_biaya) ? $tambahan_biaya['nama_tambahan_biaya'] : "";

		// Tampil Data Variasi
		$id_variasi = $this->input->post('id_variasi');
		$variasi = $this->db->query("SELECT * FROM variasi v WHERE v.id_variasi='$id_variasi' ORDER BY v.id_variasi LIMIT 1")->row_array();
		// End Tampil Data Variasi

		$data = array(
			'id_users' 				=> 	$this->session->userdata('id_users'),
			'id_softfile_only' 		=> $softfile_only->id_softfile_only,
			'nama_kategori_produk' 	=> $softfile_only->nama_kategori_produk,
			'qty' 					=> $qty,
			'discount' 				=> $softfile_only->diskon_softfile_only,
			'price' 				=> ($softfile_only->harga_softfile_only-$softfile_only->diskon_softfile_only) + $harga_tambahan_biaya + $variasi['harga_variasi'],
			'harga_diskon' 			=> $softfile_only->harga_softfile_only-$softfile_only->diskon_softfile_only,
			'harga' 				=> $softfile_only->harga_softfile_only, 
			'harga_tambahan_biaya' 	=> $harga_tambahan_biaya,
			'nama_tambahan_biaya' 	=> $nama_tambahan_biaya,
			'nama_variasi_cart' 	=> $variasi['nama_variasi_cart'],
			'harga_variasi' 		=> $variasi['harga_variasi'],
			'nama_cart' 			=> $softfile_only->nama_softfile_only,
			'gambar_cart' 			=> $softfile_only->gambar_softfile_only
		);

		$this->variasi_model->insert_variasi($data,'cart');
		if($data){
			$this->session->set_flashdata('success','Pesanan masuk ke Keranjang!');
			redirect($this->agent->referrer());
		}else{
			$this->session->set_flashdata('error','Pesanan gagal masuk ke Keranjang!');
			redirect($this->agent->referrer());
		}
	}

	public function tambah_cart_softfile_print($id_sp)
	{
		if(!$this->session->userdata('email_users')){

			$this->session->set_flashdata('pesan','
				<div style="color: red;" class="alert alert-danger alert-dismissible fade show" role="alert">
				Silahkan <strong>Login/Register!</strong>
				<button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true"></span>
				</button>
				</div>
				');
			redirect('auth/login');
		}
		$softfile_print = $this->softfile_print_model->find_softfile_print_id($id_sp);
		$qty = $this->input->post('qty');

		// Tampil Data Ukuran Cetakan
		$id_ukuran_jenis_cetakan = $this->input->post('id_ukuran_jenis_cetakan');
		$ukuran_jenis_cetakan = $this->db->query("SELECT * FROM ukuran_jenis_cetakan ujc WHERE ujc.id_ukuran_jenis_cetakan='$id_ukuran_jenis_cetakan' ORDER BY ujc.id_ukuran_jenis_cetakan LIMIT 1")->row_array();
		// End Tampil Data Ukuran Cetakan

		// Tampil Data Sub Jenis Cetakan
		$id_sub_jenis_cetakan = $this->input->post('id_sub_jenis_cetakan');
		$sub_jenis_cetakan = $this->db->query("SELECT * FROM sub_jenis_cetakan sjc WHERE sjc.id_sub_jenis_cetakan='$id_sub_jenis_cetakan' ORDER BY sjc.id_sub_jenis_cetakan LIMIT 1")->row_array();
		// End Tampil Data Sub Jenis Cetakan

		// Tampil Data Packaging
		$id_packaging = $this->input->post('id_packaging');
		$packaging = $this->db->query("SELECT * FROM packaging p WHERE p.id_packaging='$id_packaging' ORDER BY p.id_packaging LIMIT 1")->row_array();
		// End Tampil Data Packaging

		// Tampil Data Variasi
		$id_variasi = $this->input->post('id_variasi');
		$variasi = $this->db->query("SELECT * FROM variasi v WHERE v.id_variasi='$id_variasi' ORDER BY v.id_variasi LIMIT 1")->row_array();
		// End Tampil Data Variasi

		// Tampil Data Tambahan Biaya
		$id_tambahan_biaya = $this->input->post('id_tambahan_biaya');
		$tambahan_biaya = $this->db->query("SELECT * FROM tambahan_biaya tb WHERE tb.id_tambahan_biaya='$id_tambahan_biaya' ORDER BY tb.id_tambahan_biaya LIMIT 1")->row_array();
		// End Tampil Data Tambahan Biaya
		$harga_tambahan_biaya = ($tambahan_biaya) ? $tambahan_biaya['harga_tambahan_biaya'] : 0;
		$nama_tambahan_biaya = ($tambahan_biaya) ? $tambahan_biaya['nama_tambahan_biaya'] : "";

		$data = array(
			'id_users' 						=> $this->session->userdata('id_users'),
			'id_softfile_print'	 			=> $softfile_print->id_softfile_print,
			'nama_kategori_produk' 			=> $softfile_print->nama_kategori_produk,
			'qty' 							=> ($qty) ? $qty : 1,

			'price' 						=> ($softfile_print->harga_softfile_print 
				- 
				$softfile_print->diskon_softfile_print) 
			+ 
			$ukuran_jenis_cetakan['harga_ukuran_jenis_cetakan'] 
			+ 
			$sub_jenis_cetakan['harga_sub_jenis_cetakan'] 
			+ 
			$packaging['harga_packaging']
			+
			$harga_tambahan_biaya
			+ 
			$variasi['harga_variasi'],

			'harga_diskon' 					=> $softfile_print->harga_softfile_print-$softfile_print->diskon_softfile_print,
			'harga' 						=> $softfile_print->harga_softfile_print,
			'id_ukuran_jenis_cetakan' 		=> $ukuran_jenis_cetakan['id_ukuran_jenis_cetakan'],
			'nama_ukuran_jenis_cetakan' 	=> $ukuran_jenis_cetakan['nama_ukuran_jenis_cetakan'],
			'berat_ukuran_jenis_cetakan' 	=> $ukuran_jenis_cetakan['berat_ukuran_jenis_cetakan'],
			'harga_ukuran_jenis_cetakan' 	=> $ukuran_jenis_cetakan['harga_ukuran_jenis_cetakan'],
			'nama_sub_jenis_cetakan' 		=> $sub_jenis_cetakan['nama_sub_jenis_cetakan'],
			'harga_sub_jenis_cetakan' 		=> $sub_jenis_cetakan['harga_sub_jenis_cetakan'],
			'nama_packaging' 				=> $packaging['nama_packaging'],
			'harga_packaging' 				=> $packaging['harga_packaging'],
			'berat_packaging' 				=> $packaging['berat_packaging'],
			'harga_tambahan_biaya' 			=> $harga_tambahan_biaya,
			'nama_tambahan_biaya' 			=> $nama_tambahan_biaya,
			'nama_variasi_cart' 			=> $variasi['nama_variasi_cart'],
			'harga_variasi' 				=> $variasi['harga_variasi'],
			'nama_jenis_cetakan' 			=> $softfile_print->nama_jenis_cetakan,
			'discount' 						=> $softfile_print->diskon_softfile_print,
			'nama_cart' 					=> $softfile_print->nama_softfile_print,
			'gambar_cart' 					=> $softfile_print->gambar_softfile_print

		);

		$this->variasi_model->insert_variasi($data,'cart');
		if($data){
			$this->session->set_flashdata('success','Pesanan masuk ke Keranjang!');
			redirect($this->agent->referrer());
		}else{
			$this->session->set_flashdata('error','Pesanan gagal masuk ke Keranjang!');
			redirect($this->agent->referrer());
		}
	}

	public function tambah_cart_package($id_p)
	{
		if(!$this->session->userdata('email_users')){

			$this->session->set_flashdata('pesan','
				<div style="color: red;" class="alert alert-danger alert-dismissible fade show" role="alert">
				Silahkan <strong>Login/Register!</strong>
				<button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true"></span>
				</button>
				</div>
				');
			redirect('auth/login');
		}
		$package = $this->package_model->find_package_id($id_p);
		$qty = $this->input->post('qty');

		// Tampil Data Ukuran Cetakan
		$id_ukuran_jenis_cetakan = $this->input->post('id_ukuran_jenis_cetakan');
		$ukuran_jenis_cetakan = $this->db->query("SELECT * FROM ukuran_jenis_cetakan ujc WHERE ujc.id_ukuran_jenis_cetakan='$id_ukuran_jenis_cetakan' ORDER BY ujc.id_ukuran_jenis_cetakan LIMIT 1")->row_array();
		// End Tampil Data Ukuran Cetakan

		// Tampil Data Packaging
		$id_packaging = $this->input->post('id_packaging');
		$packaging = $this->db->query("SELECT * FROM packaging p WHERE p.id_packaging='$id_packaging' ORDER BY p.id_packaging LIMIT 1")->row_array();
		// End Tampil Data Packaging

		// Tampil Data Tambahan Biaya
		$id_tambahan_biaya = $this->input->post('id_tambahan_biaya');
		$tambahan_biaya = $this->db->query("SELECT * FROM tambahan_biaya tb WHERE tb.id_tambahan_biaya='$id_tambahan_biaya' ORDER BY tb.id_tambahan_biaya LIMIT 1")->row_array();
		// End Tampil Data Tambahan Biaya
		$harga_tambahan_biaya = ($tambahan_biaya) ? $tambahan_biaya['harga_tambahan_biaya'] : 0;
		$nama_tambahan_biaya = ($tambahan_biaya) ? $tambahan_biaya['nama_tambahan_biaya'] : "";

		$data = array(
			'id_users' 						=> $this->session->userdata('id_users'),
			'id_package'	 				=> $package->id_package,
			'nama_kategori_produk' 			=> $package->nama_kategori_produk,
			'qty' 							=> ($qty) ? $qty : 1,

			'price' 						=> ($package->harga_package 
				- 
				$package->diskon_package) 
			+
			$ukuran_jenis_cetakan['harga_ukuran_jenis_cetakan'] 
			+ 
			$packaging['harga_packaging']
			+
			$harga_tambahan_biaya,

			'harga_diskon' 					=> $package->harga_package-$package->diskon_package,
			'harga' 						=> $package->harga_package,
			'id_ukuran_jenis_cetakan' 		=> $ukuran_jenis_cetakan['id_ukuran_jenis_cetakan'],
			'nama_ukuran_jenis_cetakan' 	=> $ukuran_jenis_cetakan['nama_ukuran_jenis_cetakan'],
			'berat_ukuran_jenis_cetakan' 	=> $ukuran_jenis_cetakan['berat_ukuran_jenis_cetakan'],
			'harga_ukuran_jenis_cetakan' 	=> $ukuran_jenis_cetakan['harga_ukuran_jenis_cetakan'],
			'nama_packaging' 				=> $packaging['nama_packaging'],
			'harga_packaging' 				=> $packaging['harga_packaging'],
			'berat_packaging' 				=> $packaging['berat_packaging'],
			'harga_tambahan_biaya' 			=> $harga_tambahan_biaya,
			'nama_tambahan_biaya' 			=> $nama_tambahan_biaya,
			'discount' 						=> $package->diskon_package,
			'nama_cart' 					=> $package->nama_package,
			'gambar_cart' 					=> $package->gambar_package

		);
		$this->variasi_model->insert_variasi($data,'cart');
		if($data){
			$this->session->set_flashdata('success','Pesanan masuk ke Keranjang!');
			redirect($this->agent->referrer());
		}else{
			$this->session->set_flashdata('error','Pesanan gagal masuk ke Keranjang!');
			redirect($this->agent->referrer());
		}
	}

	public function tambah_cart_print_only($id_po)
	{
		if(!$this->session->userdata('email_users')){

			$this->session->set_flashdata('pesan','
				<div style="color: red;" class="alert alert-danger alert-dismissible fade show" role="alert">
				Silahkan <strong>Login/Register!</strong>
				<button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true"></span>
				</button>
				</div>
				');
			redirect('auth/login');
		}
		$print_only = $this->print_only_model->find_print_only_id($id_po);
		$qty = $this->input->post('qty');

		// Tampil Data Ukuran Cetakan
		$id_ukuran_jenis_cetakan = $this->input->post('id_ukuran_jenis_cetakan');
		$ukuran_jenis_cetakan = $this->db->query("SELECT * FROM ukuran_jenis_cetakan ujc WHERE ujc.id_ukuran_jenis_cetakan='$id_ukuran_jenis_cetakan' ORDER BY ujc.id_ukuran_jenis_cetakan LIMIT 1")->row_array();
		// End Tampil Data Ukuran Cetakan

		// Tampil Data Sub Jenis Cetakan
		$id_sub_jenis_cetakan = $this->input->post('id_sub_jenis_cetakan');
		$sub_jenis_cetakan = $this->db->query("SELECT * FROM sub_jenis_cetakan sjc WHERE sjc.id_sub_jenis_cetakan='$id_sub_jenis_cetakan' ORDER BY sjc.id_sub_jenis_cetakan LIMIT 1")->row_array();
		// End Tampil Data Sub Jenis Cetakan

		// Tampil Data Packaging
		$id_packaging = $this->input->post('id_packaging');
		$packaging = $this->db->query("SELECT * FROM packaging p WHERE p.id_packaging='$id_packaging' ORDER BY p.id_packaging LIMIT 1")->row_array();
		// End Tampil Data Packaging

		$data = array(
			'id_users' 						=> $this->session->userdata('id_users'),
			'id_print_only' 				=> $print_only->id_print_only,
			'nama_kategori_produk' 			=> $print_only->nama_kategori_produk,
			'qty' 							=> ($qty) ? $qty : 1,
			'price' 						=> ($print_only->harga_print_only 
				- 
				$print_only->diskon_print_only) 
			+ 
			$ukuran_jenis_cetakan['harga_ukuran_jenis_cetakan'] 
			+ 
			$sub_jenis_cetakan['harga_sub_jenis_cetakan'] 
			+ 
			$packaging['harga_packaging'],
			'harga_diskon' 					=> $print_only->harga_print_only-$print_only->diskon_print_only,
			'harga' 						=> $print_only->harga_print_only,
			'id_ukuran_jenis_cetakan' 		=> $ukuran_jenis_cetakan['id_ukuran_jenis_cetakan'],
			'nama_ukuran_jenis_cetakan' 	=> $ukuran_jenis_cetakan['nama_ukuran_jenis_cetakan'],
			'berat_ukuran_jenis_cetakan' 	=> $ukuran_jenis_cetakan['berat_ukuran_jenis_cetakan'],
			'harga_ukuran_jenis_cetakan' 	=> $ukuran_jenis_cetakan['harga_ukuran_jenis_cetakan'],
			'nama_sub_jenis_cetakan' 		=> $sub_jenis_cetakan['nama_sub_jenis_cetakan'],
			'harga_sub_jenis_cetakan' 		=> $sub_jenis_cetakan['harga_sub_jenis_cetakan'],
			'nama_packaging' 				=> $packaging['nama_packaging'],
			'harga_packaging' 				=> $packaging['harga_packaging'],
			'berat_packaging' 				=> $packaging['berat_packaging'],
			'nama_jenis_cetakan' 			=> $print_only->nama_jenis_cetakan,
			'discount' 						=> $print_only->diskon_print_only,
			'nama_cart' 					=> $print_only->nama_print_only,
			'gambar_cart' 					=> $print_only->gambar_print_only

		);

		$this->variasi_model->insert_variasi($data,'cart');
		if($data){
			$this->session->set_flashdata('success','Pesanan masuk ke Keranjang!');
			redirect($this->agent->referrer());
		}else{
			$this->session->set_flashdata('error','Pesanan gagal masuk ke Keranjang!');
			redirect($this->agent->referrer());
		}
	}

	public function delete_cart($id)
	{

		$where = array('id_cart' => $id);
		$delete = $this->cart_model->hapus_data($where,'cart');
		$this->session->set_flashdata('success','Pesanan berhasil di Hapus!');
		redirect($this->agent->referrer());
		
	}


	public function applycoupon()
	{

		$nama_coupon = htmlspecialchars($this->input->post('nama_coupon'));
		$sampai_tanggal_coupon = $this->input->post('sampai_tanggal_coupon');
		$cek = $this->coupon_model->cek_coupon($nama_coupon);
		// var_dump($cek['id_coupon']);die;

		if($cek == FALSE){
			$this->session->set_flashdata('error','Coupon yang Anda masukan Salah!');
			redirect($this->agent->referrer());
		}else{
			if($sampai_tanggal_coupon >= $cek['sampai_tanggal_coupon'] ){
				$this->session->set_flashdata('error','Coupon telah di Kadaluarsa!');
				redirect($this->agent->referrer());
			}else{
				$id_users = $this->session->userdata('id_users');
				$id_coupon = $cek['id_coupon'];

				$data = array(
					'id_users' => $id_users,
					'id_coupon' => $id_coupon
				);
				$this->coupon_model->insert_apply_coupon($data,'applycoupon');
				$this->session->set_flashdata('success','Coupon Berhasil di Tambahkan!');
				redirect($this->agent->referrer());
			}
		}


	}

	// < --------------------------------------------- >
					// END SOFT FILE ONLY
	// < --------------------------------------------- >



}

/* End of file Cart.php */
/* Location: ./application/controllers/home/Cart.php */ 