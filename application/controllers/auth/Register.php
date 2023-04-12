<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('email_users')){
			redirect('');
		}
		$data['kategori_produk'] = $this->kategori_produk_model->tampil_data('kategori_produk')->result();

		// Tampil Data Contact
		$data['contact'] = $this->contact_model->get_site_data()->row_array();
		// End Tampil Data Contact
		$data['title'] = 'Register';
		$this->load->view('templates_home/header', $data);	
		$this->load->view('templates_home/navbar');
		$this->load->view('auth/register');
		$this->load->view('templates_home/footer');
	}

	public function register_aksi()
	{
		$this->_rulesRegister();
		if($this->form_validation->run() == false){
			$this->index();
		}else{
			$nama_users 	= ucwords(htmlspecialchars($this->input->post('nama_users')));
			$email_users 	= htmlspecialchars($this->input->post('email_users'));
			$no_telp_users 	= strtolower(htmlspecialchars($this->input->post('no_telp_users')));
			$password_users = md5($this->input->post('password_users'));
			$role_id 		= 3;
			
			$gambar_users 	= 'default.png';
			
			$data = array(
				'id_users' 		=> $this->db->insert_id(),
				'nama_users' 	=> $nama_users,
				'email_users' 	=> $email_users,
				'no_telp_users' => $no_telp_users,
				'password_users'=> $password_users,
				'role_id'		=> $role_id,
				'gambar_users'	=> $gambar_users
			);
			$this->users_model->insert_users($data,'users');

			$this->session->set_flashdata('pesan','
					<div style="color: black;" class="alert alert-success alert-dismissible fade show" role="alert">
					Register berhasil silahkan <strong>Login!</strong>
					<button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true"></span>
					</button>
					</div>
					');
			redirect('auth/login');
		}
	}


	// Form Validation Users
	public function _rulesRegister()
	{
		$this->form_validation->set_rules('nama_users','Nama Lengkap','required',
			[
				'required' => "Nama Lengkap tidak boleh kosong",
			]
		);
		$this->form_validation->set_rules('email_users','Email','required|valid_email|is_unique[users.email_users]',
			[
				'required' => "Email tidak boleh kosong!",
				'valid_email' => "Email harus valid! contoh example@gmail.com",
				'is_unique' => 'Email ini sudah terdaftar!'
			]
		);
		$this->form_validation->set_rules('no_telp_users','No. Telepon','required',
			[
				'required' => "No. Telepon tidak boleh kosong",
			]
		);
		$this->form_validation->set_rules('password_users','Password','required',
			[
				'required' => "Password tidak boleh kosong",
			]
		);
	}

}

/* End of file Register.php */
/* Location: ./application/controllers/auth/Register.php */