<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

	public function index()
	{
		$data['title'] = "Contact - JangmarArt";
		$data['kategori_produk'] = $this->kategori_produk_model->tampil_data('kategori_produk')->result();

		// Tampil Data Contact
		$data['contact'] = $this->contact_model->get_site_data()->row_array();
		// End Tampil Data Contact

		// Tampil Data Cart
		$id_users = $this->session->userdata('id_users');
		$data['cart'] = $this->cart_model->tampil_produk_cart_detail_join($id_users);
		$data['jumlah_cart'] = $this->cart_model->get_jumlah_cart_users();
		// End Tampil Data Cart

		$this->load->view('templates_home/header', $data);	
		$this->load->view('templates_home/navbar');
		$this->load->view('home/contact/index');
		$this->load->view('templates_home/footer');
	}


	public function tambah_data_aksi()
	{
		$this->form_validation->set_rules('subject_pesan', 'Subject' , 'required');
		$this->form_validation->set_rules('nama_pesan', 'Nama Lengkap' , 'required');
		$this->form_validation->set_rules('email_pesan', 'Email' , 'required|valid_email');
		if($this->form_validation->run() == TRUE){
			
			$subject_pesan 		= htmlspecialchars($this->input->post('subject_pesan'));
			$nama_pesan 		= htmlspecialchars($this->input->post('nama_pesan'));
			$email_pesan 		= strtolower($this->input->post('email_pesan'));
			$deskripsi_pesan 	= htmlspecialchars($this->input->post('deskripsi_pesan'));

			$data = array(
				'subject_pesan' 		=> $subject_pesan,
				'nama_pesan' 		=> $nama_pesan,
				'email_pesan' 		=> $email_pesan,
				'deskripsi_pesan' 	=> $deskripsi_pesan

			);
			$this->pesan_model->insert_pesan($data,'pesan');
			$this->session->set_flashdata('success','Terimakasih telah memberikan pesan!');
			redirect('home/contact');
		}else{
			$this->index();
		}
	}

}

/* End of file Contact.php */
/* Location: ./application/controllers/home/Contact.php */