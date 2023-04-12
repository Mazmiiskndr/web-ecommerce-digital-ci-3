<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{ 
		if($this->session->userdata('email_users')){
			redirect('');
		}
		$data['title'] = 'Login';
		$data['kategori_produk'] = $this->kategori_produk_model->tampil_data('kategori_produk')->result();

		// Tampil Data Contact
		$data['contact'] = $this->contact_model->get_site_data()->row_array();
		// End Tampil Data Contact
		$this->load->view('templates_home/header', $data);	
		$this->load->view('templates_home/navbar');
		$this->load->view('auth/login');
		$this->load->view('templates_home/footer');	
	}

	public function proses_login()
	{
		$this->_rules();
		$data['title'] = 'Login';

		if( $this->form_validation->run() == FALSE ){
			$data['kategori_produk'] = $this->kategori_produk_model->tampil_data('kategori_produk')->result();
			$this->load->view('templates_home/header', $data);	
			$this->load->view('templates_home/navbar');
			$this->load->view('auth/login');
			$this->load->view('templates_home/footer');	;
		}else{ 
			$email_users	= $this->input->post('email_users');
			$password_users		= MD5($this->input->post('password_users'));

			$cek = $this->login_model->cek_login($email_users,$password_users);

			if( $cek == FALSE ){

				$this->session->set_flashdata('pesan','
					<div style="color: black;" class="alert alert-danger alert-dismissible fade show" role="alert">
					Email atau Password <strong>Salah!</strong>
					<button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true"></span>
					</button>
					</div>
					');
				redirect('auth/login');
			}else{
				$this->session->set_userdata('id_users',$cek->id_users);
				$this->session->set_userdata('email_users',$cek->email_users);
				$this->session->set_userdata('username_users',$cek->username_users);
				$this->session->set_userdata('alamat_users',$cek->alamat_users);
				$this->session->set_userdata('gambar_users',$cek->gambar_users);
				$this->session->set_userdata('role_id',$cek->role_id);
				$this->session->set_userdata('nama_users',$cek->nama_users);

				switch ($cek->role_id) {
					case 1 : 
					redirect('admin/dashboard');
					break;

					case 2 : 
					redirect('admin/dashboard');
					break;

					case 3 : 
					if(!$this->session->userdata('alamat_users')){
						redirect('home/profil/detail/'.$this->session->userdata('id_users'));
					}elseif($this->session->userdata('alamat_users') != NULL){
						redirect('');
					}
					break;
					
					default:
					break;
				}


			}


		}

		
	}


	public function _rules()
	{
		$this->form_validation->set_rules('email_users','Email','required',[
			'required' => "Email tidak boleh kosong!",
		]);
		$this->form_validation->set_rules('password_users','Password','required',[
			'required' => "Password tidak boleh kosong!",
		]);
	}
	
	public function logout()
	{
		$this->session->sess_destroy();
		redirect();
	}

	public function ganti_password()
	{
		$data['title'] = "Ganti Password";

		$this->load->view('template_admin/header',$data);
		$this->load->view('change_password');
		$this->load->view('template_admin/footer');
	}

	public function ganti_password_aksi()
	{
		$pass_baru 	= $this->input->post('pass_baru');
		$ulang_pass = $this->input->post('ulang_pass');

		$this->form_validation->set_rules('pass_baru','New Password','required|matches[ulang_pass]');
		$this->form_validation->set_rules('ulang_pass','Confirm Password','required');

		if( $this->form_validation->run() != false ){
			$id_customer			= $this->input->post('id_customer');
			$data = array('password' => md5($pass_baru));
			$id = array('username_users' => $this->session->userdata('username_users'));

			$this->rental_model->update_password($id,$data,'customer');
			$this->session->set_flashdata('pesan','
				<div style="color: green;" class="alert alert-success alert-dismissible fade show" role="alert">
				Password Berhasil <strong>Diupdate!</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>
				');
			redirect('auth/login');
		}else{
			$this->load->view('template_admin/header',$data);
			$this->load->view('change_password');
			$this->load->view('template_admin/footer');
			

		} 



	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */