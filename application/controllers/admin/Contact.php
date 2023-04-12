<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

	// Cek Level Akses & Cek Login
	public function __construct()
	{
		parent::__construct();  
		cek_login();
		cek_user();
	} 

	public function index()
	{
		$data['title'] = "Contact - JangmarArt";

		// Tampil Data Contact
		$data['contact'] = $this->contact_model->get_site_data()->row_array();
		// End Tampil Data Contact

		$data['kategori_produk'] = $this->kategori_produk_model->tampil_data('kategori_produk')->result();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/topbar');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/contact/index');
		$this->load->view('templates_admin/footer');
	} 

	


	// Aksi Edit Data Contact
	public function edit_data_aksi()
	{
		$this->form_validation->set_rules('email_contact','Email','required',
			[
				'required' => "Email tidak boleh kosong",
			]
		);
		$this->form_validation->set_rules('no_telp_contact','No. Telepon','required',
			[
				'required' => "No. Telepon tidak boleh kosong",
			]
		);
		$this->form_validation->set_rules('alamat_contact','Alamat','required',
			[
				'required' => "Alamat tidak boleh kosong",
			]
		);

		if($this->form_validation->run() == false){
			$this->index();
		}else{

			$id_contact 		= $this->input->post('id_contact');
			$email_contact 		= htmlspecialchars($this->input->post('email_contact'));
			$kota_contact 		= htmlspecialchars($this->input->post('kota'));
			$no_telp_contact 	= htmlspecialchars($this->input->post('no_telp_contact'));
			$alamat_contact 	= htmlspecialchars($this->input->post('alamat_contact'));


			$data = array(
				'email_contact' 	=> $email_contact,
				'no_telp_contact' 	=> $no_telp_contact,
				'kota_contact' 		=> $kota_contact,
				'alamat_contact' 	=> $alamat_contact
			);

			$where = array('id_contact' => $id_contact);

			$this->contact_model->update_data($where,$data,'contact');
			$this->session->set_flashdata('pesan','
				<div class="alert alert-info" role="alert">
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>
				<i class="fa fa-edit me-2" aria-hidden="true"></i> Data Contact Berhasil di <strong>Update!</strong>
				</div>
				');
			redirect('admin/contact');
		}
	}

	public function provinsi()
	{

		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
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
				echo "<option value='" . $row['province_id'] . "' id_provinsi='" .$row['province_id'] . "'>" . $row['province'] . "</option>";
			}


			
		}
	}

	public function kota()
	{
		$id_provinsi_terpilih = $this->input->post('id_provinsi');

		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=".$id_provinsi_terpilih,
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
				echo "<option value='" . $row['city_id'] . "'>" . $row['city_name'] . "</option>";
			}

			
			
		}
	}

}

/* End of file Contact.php */
/* Location: ./application/controllers/admin/Contact.php */