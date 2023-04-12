<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller {

	private $api_key = "dfe627cfc3f6dbc7b2ecc908a22f63e9";




	public function show($id)
	{
		if(!$this->session->userdata('email_users')){

			$this->session->set_flashdata('pesan','
				<div style="color: red;" class="alert alert-danger alert-dismissible fade show" role="alert">
				Silahkan <strong>Login!</strong>
				<button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true"></span>
				</button>
				</div>
				');
			redirect('auth/login');
		} 
		$data['title'] = "Checkout - JangmarArt"; 

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
			
			// Tampil Data Users
			$data['detail'] = $this->users_model->ambil_id_users_join($id);
			// End Tampil Data Users

			// Tampil Data Contact
			$data['contact'] = $this->contact_model->get_site_data()->row_array();
			// End Tampil Data Contact

			$data['kategori_produk'] = $this->kategori_produk_model->tampil_data('kategori_produk')->result();
			$this->load->view('templates_home/header', $data);	
			$this->load->view('templates_home/navbar');
			$this->load->view('home/checkout/index');
			$this->load->view('templates_home/footer');
		}else{
			$this->session->set_flashdata('error','Pesanan tidak ada!');
			redirect($this->agent->referrer());
		}
		
	}

	public function print_invoice($no_transaksi)
	{
		$data['title'] = "Print Invoice - JangmarArt";

		// Tampil Data Contact
		$data['contact'] = $this->contact_model->get_site_data()->row_array();
		// End Tampil Data Contact
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
		// Tampil Data Cart
		$id_users = $this->session->userdata('id_users');
		$data['cart'] = $this->cart_model->tampil_produk_cart_detail_join($id_users);
		$data['jumlah_cart'] = $this->cart_model->get_jumlah_cart_users();
		// End Tampil Data Cart
		
		
		// Tampil Data Transaksi
		$data['produk_transaksi'] = $this->transaksi_model->tampil_produk_transaksi_detail_join($no_transaksi);
		$data['detail'] = $this->transaksi_model->tampil_transaksi_detail_join($no_transaksi);
		// End Tampil Data Transaksi
		$this->load->view('home/checkout/print_invoice', $data);	
	}

	public function place_order($no_transaksi)
	{
		$data['title'] = "Invoice - JangmarArt";

		// Tampil Data Contact
		$data['contact'] = $this->contact_model->get_site_data()->row_array();
		// End Tampil Data Contact
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

		// Tampil Data Cart
		$id_users = $this->session->userdata('id_users');
		$data['cart'] = $this->cart_model->tampil_produk_cart_detail_join($id_users);
		$data['jumlah_cart'] = $this->cart_model->get_jumlah_cart_users();
		// End Tampil Data Cart
		
		// Tampil Data Bank	 
		$data['bank'] = $this->bank_model->tampil_data('bank')->result();
		// End Tampil Data Bank

		// Tampil Data Transaksi
		$data['produk_transaksi'] = $this->transaksi_model->tampil_produk_transaksi_detail_join($no_transaksi);
		$data['detail'] = $this->transaksi_model->tampil_transaksi_detail_join($no_transaksi);
		// End Tampil Data Transaksi
		$this->load->view('home/checkout/invoice', $data);	
	}

	public function place_order_aksi()
	{
		



			// Edit Data Users
		$id_users 			= $this->input->post('id_users');
		$nama_users 		= htmlspecialchars($this->input->post('nama_users'));
		$alamat_users 		= htmlspecialchars($this->input->post('alamat_users'));
		$no_telp_users 		= htmlspecialchars($this->input->post('no_telp_users'));

		$data = array(
			'nama_users' 		=> $nama_users,
			'alamat_users' 		=> $alamat_users,
			'no_telp_users' 	=> $no_telp_users,
		);
		$where = array('id_users' => $id_users);

		$this->users_model->update_data($where,$data,'users');
			// Tampil Data Cart
		$id_users = $this->session->userdata('id_users');
		$cart = $this->cart_model->tampil_produk_cart_detail_join($id_users);
			// End Tampil Data Cart

		$total = 0;
		$tot_bayar = 0;
		foreach($cart as $c){

			$total = $c->price * $c->qty;
			$tot_bayar += $total;
		}


			// Simpan ke table Transaksi
		$id_users 		= $this->input->post('id_users');
		$no_transaksi 	= $this->input->post('no_transaksi');
		$berat 			= $this->input->post('berat');
		$sub_total 		= $this->input->post('sub_total');
		$ongkir 		= $this->input->post('ongkir');	
		if($this->input->post('total_bayar') == 0){
			$total_bayar 	= $tot_bayar;
		}else{
			$total_bayar 	= $this->input->post('total_bayar');
		}


		$estimasi 		= $this->input->post('estimasi');
		$provinsi 		= $this->input->post('provinsi');
		$kota 			= $this->input->post('kota');
		$expedisi 		= $this->input->post('expedisi');
		$paket 			= $this->input->post('paket');
		$catatan_transaksi = htmlspecialchars($this->input->post('catatan_transaksi'));
		$status_pembayaran 			= 0;
		$status_transaksi 			= 0;

		$data = array(
			'id_users' 			=> $id_users,
			'no_transaksi' 		=> $no_transaksi,
			'berat' 			=> $berat,
			'sub_total' 		=> $sub_total,
			'ongkir' 			=> $ongkir,
			'total_bayar' 		=> $total_bayar,
			'estimasi' 			=> $estimasi,
			'provinsi' 			=> $provinsi,
			'kota' 				=> $kota,
			'expedisi' 			=> $expedisi,
			'paket' 			=> $paket,
			'status_pembayaran' => $status_pembayaran,
			'status_transaksi' 	=> $status_transaksi,
			'catatan_transaksi' => $catatan_transaksi
		);
			// End Simpan ke table Transaksi
		$this->transaksi_model->insert_transaksi($data,'transaksi');
			// Simpan ke table Produk Transaksi
		$i = 1;
		foreach ($cart as $item) {
			$qty = $this->input->post('qty'.$i++);
			$data = array(
				'no_transaksi' 									=> $this->input->post('no_transaksi'),
				'id_softfile_only' 							=> $item->id_softfile_only,
				'id_softfile_print' 							=> $item->id_softfile_print,
				'id_package' 							=> $item->id_package,
				'id_print_only' 							=> $item->id_print_only,
				'qty' 											=> $qty,
				'harga_satuan' 									=> $this->input->post('harga_satuan' . $i++),
				'harga_total_satuan' 							=> $this->input->post('harga_total_satuan' . $i++),
				'nama_jenis_cetakan_produk_transaksi' 			=> $item->nama_jenis_cetakan,
				'nama_tambahan_biaya_produk_transaksi' 			=> $item->nama_tambahan_biaya,
				'harga_tambahan_biaya_produk_transaksi' 		=> $item->harga_tambahan_biaya,
				'nama_packaging_produk_transaksi' 				=> $item->nama_packaging,
				'harga_packaging_produk_transaksi' 				=> $item->harga_packaging,
				'nama_sub_jenis_cetakan_produk_transaksi' 		=> $item->nama_sub_jenis_cetakan,
				'harga_sub_jenis_cetakan_produk_transaksi' 		=> $item->harga_sub_jenis_cetakan,
				'nama_ukuran_jenis_cetakan_produk_transaksi' 	=> $item->nama_ukuran_jenis_cetakan,
				'harga_ukuran_jenis_cetakan_produk_transaksi' 	=> $item->harga_ukuran_jenis_cetakan,
				'nama_variasi_cart' 							=> $this->input->post('nama_variasi_cart' . $i++),
				'harga_variasi' 								=> $this->input->post('harga_variasi' . $i++)

			);
				// if ($item->nama_kategori_produk == "Soft File Only") {
				// 	$data = array(
				// 		'no_transaksi' 								=> $this->input->post('no_transaksi'),
				// 		'id_softfile_only' 							=> $item->id_softfile_only,
				// 		'qty' 										=> $qty,
				// 		'harga_satuan' 								=> $this->input->post('harga_satuan' . $i++),
				// 		'harga_total_satuan' 						=> $this->input->post('harga_total_satuan' . $i++),
				// 		'nama_variasi_cart' 						=> $this->input->post('nama_variasi_cart' . $i++),
				// 		'harga_variasi' 							=> $this->input->post('harga_variasi' . $i++),
				// 		'nama_tambahan_biaya_produk_transaksi' 		=> $item->nama_tambahan_biaya,
				// 		'harga_tambahan_biaya_produk_transaksi' 	=> $item->harga_tambahan_biaya

				// 	);

				// }elseif ($item->nama_kategori_produk == "Soft File Print") {
				// 	$data = array(
				// 		'no_transaksi' 									=> $this->input->post('no_transaksi'),
				// 		'id_softfile_print' 							=> $item->id_softfile_print,
				// 		'qty' 											=> $qty,
				// 		'harga_satuan' 									=> $this->input->post('harga_satuan' . $i++),
				// 		'harga_total_satuan' 							=> $this->input->post('harga_total_satuan' . $i++),
				// 		'nama_jenis_cetakan_produk_transaksi' 			=> $item->nama_jenis_cetakan,
				// 		'nama_tambahan_biaya_produk_transaksi' 			=> $item->nama_tambahan_biaya,
				// 		'harga_tambahan_biaya_produk_transaksi' 		=> $item->harga_tambahan_biaya,
				// 		'nama_packaging_produk_transaksi' 				=> $item->nama_packaging,
				// 		'harga_packaging_produk_transaksi' 				=> $item->harga_packaging,
				// 		'nama_sub_jenis_cetakan_produk_transaksi' 		=> $item->nama_sub_jenis_cetakan,
				// 		'harga_sub_jenis_cetakan_produk_transaksi' 		=> $item->harga_sub_jenis_cetakan,
				// 		'nama_ukuran_jenis_cetakan_produk_transaksi' 	=> $item->nama_ukuran_jenis_cetakan,
				// 		'harga_ukuran_jenis_cetakan_produk_transaksi' 	=> $item->harga_ukuran_jenis_cetakan,
				// 		'nama_variasi_cart' 							=> $this->input->post('nama_variasi_cart' . $i++),
				// 		'harga_variasi' 								=> $this->input->post('harga_variasi' . $i++)

				// 	);

				// }elseif ($item->nama_kategori_produk == "Package") {
				// 	$data = array(
				// 		'no_transaksi' 									=> $this->input->post('no_transaksi'),
				// 		'id_package' 									=> $item->id_package,
				// 		'qty' 											=> $qty,
				// 		'harga_satuan' 									=> $this->input->post('harga_satuan' . $i++),
				// 		'harga_total_satuan' 							=> $this->input->post('harga_total_satuan' . $i++),
				// 		'nama_tambahan_biaya_produk_transaksi' 			=> $item->nama_tambahan_biaya,
				// 		'harga_tambahan_biaya_produk_transaksi' 		=> $item->harga_tambahan_biaya,
				// 		'nama_packaging_produk_transaksi' 				=> $item->nama_packaging,
				// 		'harga_packaging_produk_transaksi' 				=> $item->harga_packaging

				// 	);

				// }elseif ($item->nama_kategori_produk == "Print Only") {
				// 	$data = array(
				// 		'no_transaksi' 									=> $this->input->post('no_transaksi'),
				// 		'id_print_only' 								=> $item->id_print_only,
				// 		'qty' 											=> $qty,
				// 		'harga_satuan' 									=> $this->input->post('harga_satuan' . $i++),
				// 		'harga_total_satuan' 							=> $this->input->post('harga_total_satuan' . $i++),
				// 		'nama_jenis_cetakan_produk_transaksi' 			=> $item->nama_jenis_cetakan,
				// 		'nama_packaging_produk_transaksi' 				=> $item->nama_packaging,
				// 		'harga_packaging_produk_transaksi' 				=> $item->harga_packaging,
				// 		'nama_sub_jenis_cetakan_produk_transaksi' 		=> $item->nama_sub_jenis_cetakan,
				// 		'harga_sub_jenis_cetakan_produk_transaksi' 		=> $item->harga_sub_jenis_cetakan,
				// 		'nama_ukuran_jenis_cetakan_produk_transaksi' 	=> $item->nama_ukuran_jenis_cetakan,
				// 		'harga_ukuran_jenis_cetakan_produk_transaksi' 	=> $item->harga_ukuran_jenis_cetakan

				// 	);

				// }

			$this->transaksi_model->insert_transaksi($data,'produk_transaksi');
		}
			// End Simpan ke table Produk Transaksi


			// $this->session->set_flashdata('pesan','
			// 	<div class="alert alert-success" role="alert">
			// 	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>
			// 	<i class="fa fa-check-circle-o me-2" aria-hidden="true"></i> Data Place Order Berhasil di <strong>Tambahkan!</strong>
			// 	</div>
			// 	'); 
		$d = 1;
			// Tampil Data Cart
		$id_users = $this->session->userdata('id_users');
		$cart = $this->cart_model->tampil_produk_cart_detail_join($id_users);
		// End Tampil Data Cart
		foreach ($cart as $items) {
			$where = array(
				'id_cart' => $items->id_cart,
				'id_users' => $this->session->userdata('id_users')
			);
			$delete = $this->cart_model->hapus_data($where,'cart');
			$d++;

		}
		redirect('home/checkout/place_order/'.$no_transaksi);
		

	}

	public function upload_bukti_pembayaran()
	{
		$id_users 			= $this->session->userdata('id_users');
		$id_transaksi 		= $this->input->post('id_transaksi');
		$nama_bank 			= htmlspecialchars($this->input->post('nama_bank'));
		$nama_rekening 		= htmlspecialchars($this->input->post('nama_rekening'));
		$nomor_rekening 		= htmlspecialchars($this->input->post('nomor_rekening'));
		$status_transaksi 	= 1;
		$status_pembayaran 	= 1; 

		$bukti_pembayaran 			= $_FILES['bukti_pembayaran']['name'];

		if($bukti_pembayaran){
			$config ['upload_path'] = './assets/uploads/bukti_pembayaran';
			$config ['allowed_types'] = 'jpg|jpeg|png|tiff';

			$this->load->library('upload', $config);

			if( $this->upload->do_upload('bukti_pembayaran') ){
				$bukti_pembayaran = $this->upload->data('file_name');
				$this->db->set('bukti_pembayaran',$bukti_pembayaran);
			}else{

				echo "Photo Users Gagal Diupload!";

			}
		}

		$data = array(
			'status_transaksi' 		=> $status_transaksi,
			'nama_bank' 			=> $nama_bank,
			'nama_rekening' 		=> $nama_rekening,
			'nomor_rekening' 		=> $nomor_rekening,
			'status_pembayaran' 	=> $status_pembayaran
		);

		$where = array('id_transaksi' => $id_transaksi);

		$this->transaksi_model->update_data($where,$data,'transaksi');
		$this->session->set_flashdata('upload_bukti','Silahkan Kirim Foto Terbaikmu!');
		// redirect('home/profil/detail/'.$id_users); \
		redirect('home/profil/detail/'.$this->session->userdata('id_users'));
	}

	public function pesanan_diterima($no_transaksi)
	{

		$transaksi =  $this->db->query("SELECT * FROM transaksi t WHERE t.no_transaksi='$no_transaksi'")->row_array();

		
		$data = array(
			'status_transaksi' 		=> 4
		);

		$where = array('no_transaksi' => $transaksi['no_transaksi']);

		$this->transaksi_model->update_data($where,$data,'transaksi');
		$this->session->set_flashdata('success','Pesanan diterima!');
		// Tampil Data Contact
		$data['contact'] = $this->contact_model->get_site_data()->row_array();
		// End Tampil Data Contact
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
		// Tampil Data Cart
		$id_users = $this->session->userdata('id_users');
		$data['cart'] = $this->cart_model->tampil_produk_cart_detail_join($id_users);
		$data['jumlah_cart'] = $this->cart_model->get_jumlah_cart_users();
		// End Tampil Data Cart
		

		// Tampil Data Transaksi
		$data['produk_transaksi'] = $this->transaksi_model->tampil_produk_transaksi_detail_join($no_transaksi);
		$data['detail'] = $this->transaksi_model->tampil_transaksi_detail_join($no_transaksi);
		// End Tampil Data Transaksi
		$data['title'] = "Reviews Produk - JangmarArt";
		$this->load->view('home/checkout/pesanan_diterima', $data);	
	}

	

	//  Intergrasi Provinsi RajaOngkir
	public function provinsi()
	{

		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => "http://api.rajaongkir.com/starter/province",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
				"key: $this->api_key"
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
		} else {
			// echo $response;
			$array_response = json_decode($response, true);
			// echo "<pre>";
			// print_r($array_response['rajaongkir']['results']);
			// echo '</pre>'; 
			echo '<option value="" selected disabled hidden="">-- Pilih Provinsi -- </option>';
			$data_provinsi = $array_response['rajaongkir']['results'];
			
			foreach($data_provinsi as $row){
				echo "<option value='" . $row['province'] . "' id_provinsi='" .$row['province_id'] . "'>" . $row['province'] . "</option>";
			}


			
		}
	}

	public function kota()
	{
		$id_provinsi_terpilih = $this->input->post('id_provinsi');

		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => "http://api.rajaongkir.com/starter/city?province=".$id_provinsi_terpilih,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
				"key: $this->api_key"
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
		} else {
			// echo $response;
			$array_response = json_decode($response, true);
			// echo "<pre>";
			// print_r($array_response['rajaongkir']['results']);
			// echo '</pre>';
			echo '<option value="" selected disabled hidden="">-- Pilih Kota -- </option>';
			$data_kota = $array_response['rajaongkir']['results'];
			foreach($data_kota as $row){
				echo "<option value='" . $row['city_name'] . "' id_kota='" . $row['city_id'] . "'>" . $row['city_name'] . "</option>";
			}

			
			
		}
	}

	public function expedisi()
	{

		echo '<option value="" selected disabled hidden="">-- Pilih Expedisi -- </option>';
		echo '<option value="jne">JNE</option>';
		echo '<option value="tiki">TIKI</option>';
		echo '<option value="pos">POS INDONESIA</option>';

	}

	public function paket(){
		$contact = $this->contact_model->get_site_data()->row_array();
		$id_kota_asal = $contact['kota_contact'];
		$expedisi = $this->input->post('expedisi');
		$id_kota = $this->input->post('id_kota');
		$berat = $this->input->post('berat');

		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => "http://api.rajaongkir.com/starter/cost",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => "origin=" . $id_kota_asal . "&destination=" . $id_kota . "&weight=" . $berat . "&courier=" . $expedisi,
			CURLOPT_HTTPHEADER => array(
				"content-type: application/x-www-form-urlencoded",
				"key: $this->api_key"
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);
		
		if ($err) {
			echo "cURL Error #:" . $err;
		} else {
			$array_response = json_decode($response, true);
			// echo "<pre>";
			// print_r($array_response['rajaongkir']['results'][0]['costs']);
			// echo '</pre>';
			$data_paket = $array_response['rajaongkir']['results'][0]['costs'];
			echo '<option value="" selected disabled hidden="">-- Pilih Paket -- </option>';
			foreach($data_paket as $row){
				echo "<option value='" . $row['service'] . "' ongkir='" . $row['cost'][0]['value'] . "' estimasi='". $row['cost'][0]['etd'] ." Hari '>";
				echo $row['service'] . " - Rp. " .   number_format($row['cost'][0]['value'],0,',','.') . " - Estimasi " . $row['cost'][0]['etd'] . " Hari";
				echo "</option>";
			}
		}
	}


}

/* End of file Checkout.php */
/* Location: ./application/controllers/home/Checkout.php */