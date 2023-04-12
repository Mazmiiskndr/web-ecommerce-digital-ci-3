<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

	public function detail($id)
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
		$data['title'] = "Profil - JangmarArt";
		// Tampil Kategori Produk
		$data['kategori_produk'] = $this->kategori_produk_model->tampil_data('kategori_produk')->result();
		// End Tampil Kategori Produk

		

		// Tampil Data Contact
		$data['contact'] = $this->contact_model->get_site_data()->row_array();
		// End Tampil Data Contact

		// Tampil Data Cart
		$id_users = $this->session->userdata('id_users');
		$data['cart'] = $this->cart_model->tampil_produk_cart_detail_join($id_users);
		$data['jumlah_cart'] = $this->cart_model->get_jumlah_cart_users();
		// End Tampil Data Cart

		// Tampil Produk Transaksi
		$data['produk_transaksi'] = $this->transaksi_model->tampil_produk_transaksi_profil($id_users);	
		$data['upload_transaksi'] = $this->transaksi_model->tampil_upload_transaksi_detail_join();
		// End Tampil Produk Transaksi

		$data['detail'] = $this->users_model->ambil_id_users_join($id);
		$this->load->view('templates_home/header', $data);	
		$this->load->view('templates_home/navbar');
		$this->load->view('home/profil/index');
		$this->load->view('templates_home/footer');
	}




	// Aksi Edit Data Profil
	public function edit_data_aksi()
	{
		$id_users 			= $this->input->post('id_users');
		$nama_users 		= htmlspecialchars($this->input->post('nama_users'));
		
		$password_users 	= $this->input->post('password_users');
		$alamat_users 		= htmlspecialchars($this->input->post('alamat_users'));
		$no_telp_users 		= htmlspecialchars($this->input->post('no_telp_users'));

		$data = array(
			'nama_users' 		=> $nama_users,
			'alamat_users' 		=> $alamat_users,
			'no_telp_users' 	=> $no_telp_users,
		);
		if ($password_users !== '') {
			$data['password_users'] = MD5($password_users);
		}
		$where = array('id_users' => $id_users);

		$this->users_model->update_data($where,$data,'users');
		$this->session->set_flashdata('success','Profil berhasil di Update!');
		redirect('home/profil/detail/'.$this->session->userdata('id_users'));
	}


	// Aksi Delete Data Transaksi
	public function hapus_data_transaksi($no_transaksi)
	{
		// if ($this->session->userdata('id_users') != 1){
		// 	$this->session->set_flashdata('pesan','
		// 		<div class="alert alert-warning alert-dismissible fade show" role="alert">
		// 		Maaf Anda bukan <strong>Admin!</strong>
		// 		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		// 		<span aria-hidden="true">&times;</span>
		// 		</button>
		// 		</div>
		// 		');
		// 	redirect('admin/transaksi');
		// }else{

		// }

		$where = array('no_transaksi' => $no_transaksi);
		$this->transaksi_model->hapus_data($where,'transaksi');
		$d = 1;
		// Hapus Data Produk Transaksi
		$transaksi = $this->transaksi_model->ambil_no_transaksi($no_transaksi);
		// End Hapus Data Produk Transaksi
		foreach ($transaksi as $items) {
			$where = array(
				'id_produk_transaksi' => $items->id_produk_transaksi,
				'no_transaksi' => $items->no_transaksi
			);
			$delete = $this->transaksi_model->hapus_data($where,'produk_transaksi');
			$d++;
		} 
		
		$this->session->set_flashdata('success','Transaksi berhasil di Hapus!');
		redirect($this->agent->referrer());
		
	}

	public function upload_bukti_pembayaran($id)
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
		$data['title'] = "Profil - JangmarArt";
		// Tampil Kategori Produk
		$data['kategori_produk'] = $this->kategori_produk_model->tampil_data('kategori_produk')->result();
		// End Tampil Kategori Produk

		
		// Tampil Upload Bukti Pembayaran
		$data['upload'] = $this->transaksi_model->ambil_id_transaksi_bukti_pembayaran($id);
		// End Tampil Upload Bukti Pembayaran

		// Tampil Data Contact
		$data['contact'] = $this->contact_model->get_site_data()->row_array();
		// End Tampil Data Contact

		// Tampil Jumlah Data
		$data['jumlah_cart'] = $this->cart_model->get_jumlah_cart_users();
		// End Tampil Jumlah Data

		// Tampil Data Cart
		$id_users = $this->session->userdata('id_users');
		$data['cart'] = $this->cart_model->tampil_produk_cart_detail_join($id_users);
		// End Tampil Data Cart

		// Tampil Produk Transaksi
		$data['produk_transaksi'] = $this->transaksi_model->tampil_produk_transaksi_profil($id_users);	
		$data['upload_transaksi'] = $this->transaksi_model->tampil_upload_transaksi_detail_join();
		// End Tampil Produk Transaksi

		$data['detail'] = $this->users_model->ambil_id_users_join($id_users);
		$this->load->view('templates_home/header', $data);	
		$this->load->view('templates_home/navbar');
		$this->load->view('home/profil/upload_bukti_pembayaran');
		$this->load->view('templates_home/footer');
	}


	// Aksi Upload Bukti Pembayaran
	public function upload_bukti_pembayaran_aksi()
	{
		$id_transaksi 			= $this->input->post('id_transaksi');
		$no_transaksi 			= $this->input->post('no_transaksi');

		$bukti_pembayaran = $_FILES['bukti_pembayaran']['name'];

		if($bukti_pembayaran){
			$config ['upload_path'] = './assets/uploads/bukti_pembayaran';
			$config ['allowed_types'] = 'jpg|jpeg|png|tiff';

			$this->load->library('upload', $config);

			if( $this->upload->do_upload('bukti_pembayaran') ){
				$bukti_pembayaran = $this->upload->data('file_name');
				$this->db->set('bukti_pembayaran',$bukti_pembayaran);
			}else{

				$this->session->set_flashdata('error','Bukti Pembayaran harus berupa Gambar!');
				redirect($this->agent->referrer());
			}
		}

		$data = array(
			'no_transaksi' 		=> $no_transaksi,
			'status_transaksi' 	=> 1,
			'status_pembayaran' => 1
		);

		$where = array('id_transaksi' => $id_transaksi);

		$this->transaksi_model->update_data($where,$data,'transaksi');
		$this->session->set_flashdata('upload_bukti','Bukti pembayaran berhasil di Upload!'); 
		redirect('home/profil/detail/'.$this->session->userdata('id_users'));
	}

	// Retur
	public function retur($id)
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
		$data['title'] = "Retur - JangmarArt";
		// Tampil Kategori Produk
		$data['kategori_produk'] = $this->kategori_produk_model->tampil_data('kategori_produk')->result();
		// End Tampil Kategori Produk

		
		// Tampil Upload Bukti Pembayaran
		$data['upload'] = $this->transaksi_model->ambil_id_transaksi_bukti_pembayaran($id);
		// End Tampil Upload Bukti Pembayaran

		// Tampil Data Contact
		$data['contact'] = $this->contact_model->get_site_data()->row_array();
		// End Tampil Data Contact

		// Tampil Jumlah Data
		$data['jumlah_cart'] = $this->cart_model->get_jumlah_cart_users();
		// End Tampil Jumlah Data

		// Tampil Data Cart
		$id_users = $this->session->userdata('id_users');
		$data['cart'] = $this->cart_model->tampil_produk_cart_detail_join($id_users);
		// End Tampil Data Cart

		// Tampil Produk Transaksi
		$data['produk_transaksi'] = $this->transaksi_model->tampil_produk_transaksi_profil($id_users);	
		$data['upload_transaksi'] = $this->transaksi_model->tampil_upload_transaksi_detail_join();
		// End Tampil Produk Transaksi

		$data['detail'] = $this->users_model->ambil_id_users_join($id_users);
		$this->load->view('templates_home/header', $data);	
		$this->load->view('templates_home/navbar');
		$this->load->view('home/profil/upload_retur');
		$this->load->view('templates_home/footer');
	}


	// Aksi Upload Bukti Retur
	public function retur_aksi()
	{
		$id_transaksi 			= $this->input->post('id_transaksi');
		$no_transaksi 			= $this->input->post('no_transaksi');

		$file_retur = $_FILES['file_retur']['name'];

		if($file_retur){
			$config ['upload_path'] = './assets/uploads/retur';
			$config ['allowed_types'] = 'mp4';
			$config['max_size']             = 100000;

			$this->load->library('upload', $config);

			if( $this->upload->do_upload('file_retur') ){
				$file_retur = $this->upload->data('file_name');
				$this->db->set('file_retur',$file_retur);
			}else{

				$this->session->set_flashdata('error','Bukti Retur harus berupa Video/MP4!');
				redirect($this->agent->referrer());
			}
		}

		$data = array(
			'no_transaksi' 		=> $no_transaksi,
			'status_transaksi' 	=> 5,
		);

		$where = array('id_transaksi' => $id_transaksi);

		$this->transaksi_model->update_data($where,$data,'transaksi');
		$this->session->set_flashdata('success','Bukti retur berhasil di Upload!');
		redirect('home/profil/detail/'.$this->session->userdata('id_users'));
	}

	public function download_file($id)
	{
		$this->load->helper('download');
		$fileProduk = $this->transaksi_model->downloadProduct($id);
		$file = 'assets/uploads/upload_file/'.$fileProduk['dokumen_file'];
		force_download($file, null);
	}
	

}

/* End of file Profil.php */
/* Location: ./application/controllers/home/Profil.php */