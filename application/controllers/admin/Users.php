<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	// Cek Level Akses & Cek Login
	public function __construct()
	{
		parent::__construct();  
		cek_login();
		cek_user();
	} 

	// View Index Administrator
	public function index()
	{
		$data['title'] = "Data Administrator - JangmarArt";
		$data['kategori_produk'] = $this->kategori_produk_model->tampil_data('kategori_produk')->result();
		$data['users'] = $this->users_model->tampil_data_join();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/topbar');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/users/index');
		$this->load->view('templates_admin/footer');		
	}

	// View Index Manager
	public function manager()
	{
		$data['title'] = "Data Manager - JangmarArt";
		$data['kategori_produk'] = $this->kategori_produk_model->tampil_data('kategori_produk')->result();
		$data['users'] = $this->users_model->tampil_data_join();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/topbar');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/users/manager');
		$this->load->view('templates_admin/footer');		
	}

	// View Index Customer
	public function customer()
	{
		$data['title'] = "Data Customer - JangmarArt";
		$data['kategori_produk'] = $this->kategori_produk_model->tampil_data('kategori_produk')->result();
		$data['users'] = $this->users_model->tampil_data_join();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/topbar');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/users/customer');
		$this->load->view('templates_admin/footer');		
	}


	// View Tambah Manager
	public function tambah_data_manager()
	{
		$data['title'] = "Tambah Data Manager - JangmarArt";
		$data['kategori_produk'] = $this->kategori_produk_model->tampil_data('kategori_produk')->result();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/topbar');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/users/tambah_data_manager');
		$this->load->view('templates_admin/footer');	
	}

	// Aksi Tambah Data Manager
	public function tambah_data_manager_aksi()
	{
		$this->_rulesManager();
		if($this->form_validation->run() == false){
			$this->tambah_data_manager();
		}else{
			$role_id 			= 1;
			$nama_users 		= htmlspecialchars($this->input->post('nama_users'));
			$email_users 		= htmlspecialchars($this->input->post('email_users'));
			$password_users 	= $this->input->post('password_users');
			$alamat_users 		= htmlspecialchars($this->input->post('alamat_users'));
			$no_telp_users 		= htmlspecialchars($this->input->post('no_telp_users'));

			$gambar_users 				= $_FILES['gambar_users']['name'];

			if($gambar_users){
				$config ['upload_path'] = './assets/uploads/users';
				$config ['allowed_types'] = 'jpg|jpeg|png|tiff';

				$this->load->library('upload', $config);
				
				if( $this->upload->do_upload('gambar_users') ){
					$gambar_users = $this->upload->data('file_name');
					$this->db->set('gambar_users',$gambar_users);
				}else{
					echo "Photo User Gagal Diupload!";

				}
			}else{
				$gambar_users = 'default.png';
			}

			$data = array(
				'role_id' 			=> $role_id,
				'nama_users' 		=> $nama_users,

				'email_users' 		=> $email_users,
				'alamat_users' 		=> $alamat_users,
				'no_telp_users' 	=> $no_telp_users,
				'gambar_users' 		=> $gambar_users
			);

			$this->users_model->insert_users($data,'users');
			$this->session->set_flashdata('pesan','
				<div class="alert alert-success" role="alert">
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>
				<i class="fa fa-edit me-2" aria-hidden="true"></i> Data Manager Berhasil di <strong>Tambahkan!</strong>
				</div>
				'); 
			redirect('admin/users/manager');
		}

	}

	// View Edit Data Administrator
	public function edit_data_admin($id)
	{
		$data['title'] = "Edit Data Administrator - JangmarArt";
		$data['detail'] = $this->users_model->ambil_id_users_join($id);
		$data['role'] = $this->role_model->tampil_data('role')->result();
		$data['kategori_produk'] = $this->kategori_produk_model->tampil_data('kategori_produk')->result();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/topbar');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/users/edit_data_admin');
		$this->load->view('templates_admin/footer');	
	}

	// Aksi Edit Data Administrator
	public function edit_data_admin_aksi()
	{
		$id_users 			= $this->input->post('id_users');
		$role_id 			= htmlspecialchars($this->input->post('role_id'));
		$nama_users 		= htmlspecialchars($this->input->post('nama_users'));
		$email_users 		= htmlspecialchars($this->input->post('email_users'));
		$password_users 	= $this->input->post('password_users');
		$alamat_users 		= htmlspecialchars($this->input->post('alamat_users'));
		$no_telp_users 		= htmlspecialchars($this->input->post('no_telp_users'));

		$gambar_users 			= $_FILES['gambar_users']['name'];

		if($gambar_users){
			$config ['upload_path'] = './assets/uploads/users';
			$config ['allowed_types'] = 'jpg|jpeg|png|tiff';

			$this->load->library('upload', $config);

			if( $this->upload->do_upload('gambar_users') ){
				$gambar_users = $this->upload->data('file_name');
				$this->db->set('gambar_users',$gambar_users);
			}else{

				echo "Photo Users Gagal Diupload!";

			}
		}
		$data = array(
			'role_id' 			=> $role_id,
			'nama_users' 		=> $nama_users,
			'email_users' 		=> $email_users,
			'alamat_users' 		=> $alamat_users,
			'no_telp_users' 	=> $no_telp_users,

		);
		if ($password_users !== '') {
			$data['password_users'] = MD5($password_users);
		}
		$where = array('id_users' => $id_users);

		$this->users_model->update_data($where,$data,'users');
		$this->session->set_flashdata('pesan','
			<div class="alert alert-info" role="alert">
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>
			<i class="fa fa-edit me-2" aria-hidden="true"></i> Data Administrator Berhasil di <strong>Update!</strong>
			</div>
			');
		redirect('admin/users');
	}

	// View Edit Data Manager
	public function edit_data_manager($id)
	{
		$data['title'] = "Edit Data Manager - JangmarArt";
		$data['detail'] = $this->users_model->ambil_id_users_join($id);
		$data['role'] = $this->role_model->tampil_data('role')->result();
		$data['kategori_produk'] = $this->kategori_produk_model->tampil_data('kategori_produk')->result();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/topbar');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/users/edit_data_manager');
		$this->load->view('templates_admin/footer');	
	}

	// Aksi Edit Data Manager
	public function edit_data_manager_aksi()
	{
		$id_users 			= $this->input->post('id_users');
		$role_id 			= htmlspecialchars($this->input->post('role_id'));
		$nama_users 		= htmlspecialchars($this->input->post('nama_users'));
		$email_users 		= htmlspecialchars($this->input->post('email_users'));
		$password_users 	= $this->input->post('password_users');
		$alamat_users 		= htmlspecialchars($this->input->post('alamat_users'));
		$no_telp_users 		= htmlspecialchars($this->input->post('no_telp_users'));

		$gambar_users 			= $_FILES['gambar_users']['name'];

		if($gambar_users){
			$config ['upload_path'] = './assets/uploads/users';
			$config ['allowed_types'] = 'jpg|jpeg|png|tiff';

			$this->load->library('upload', $config);

			if( $this->upload->do_upload('gambar_users') ){
				$gambar_users = $this->upload->data('file_name');
				$this->db->set('gambar_users',$gambar_users);
			}else{

				echo "Photo Users Gagal Diupload!";

			}
		}
		$data = array(
			'role_id' 			=> $role_id,
			'nama_users' 		=> $nama_users,
			'email_users' 		=> $email_users,
			'alamat_users' 		=> $alamat_users,
			'no_telp_users' 	=> $no_telp_users,

		);
		if ($password_users !== '') {
			$data['password_users'] = MD5($password_users);
		}
		$where = array('id_users' => $id_users);

		$this->users_model->update_data($where,$data,'users');
		$this->session->set_flashdata('pesan','
			<div class="alert alert-info" role="alert">
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>
			<i class="fa fa-edit me-2" aria-hidden="true"></i> Data Manager Berhasil di <strong>Update!</strong>
			</div>
			');
		redirect('admin/users/manager');
	}

	// View Edit Data Customer
	public function edit_data_customer($id)
	{
		$data['title'] = "Edit Data Customer - JangmarArt";
		$data['detail'] = $this->users_model->ambil_id_users_join($id);
		$data['role'] = $this->role_model->tampil_data('role')->result();
		$data['kategori_produk'] = $this->kategori_produk_model->tampil_data('kategori_produk')->result();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/topbar');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/users/edit_data_customer');
		$this->load->view('templates_admin/footer');	
	}

	// Aksi Edit Data Customer
	public function edit_data_customer_aksi()
	{
		$id_users 			= $this->input->post('id_users');
		$role_id 			= htmlspecialchars($this->input->post('role_id'));
		$nama_users 		= htmlspecialchars($this->input->post('nama_users'));
		$email_users 		= htmlspecialchars($this->input->post('email_users'));
		$password_users 	= $this->input->post('password_users');
		$alamat_users 		= htmlspecialchars($this->input->post('alamat_users'));
		$no_telp_users 		= htmlspecialchars($this->input->post('no_telp_users'));

		$gambar_users 			= $_FILES['gambar_users']['name'];

		if($gambar_users){
			$config ['upload_path'] = './assets/uploads/users';
			$config ['allowed_types'] = 'jpg|jpeg|png|tiff';

			$this->load->library('upload', $config);

			if( $this->upload->do_upload('gambar_users') ){
				$gambar_users = $this->upload->data('file_name');
				$this->db->set('gambar_users',$gambar_users);
			}else{

				echo "Photo Users Gagal Diupload!";

			}
		}
		$data = array(
			'role_id' 			=> $role_id,
			'nama_users' 		=> $nama_users,
			'email_users' 		=> $email_users,
			'alamat_users' 		=> $alamat_users,
			'no_telp_users' 	=> $no_telp_users,

		);
		if ($password_users !== '') {
			$data['password_users'] = MD5($password_users);
		}
		$where = array('id_users' => $id_users);

		$this->users_model->update_data($where,$data,'users');
		$this->session->set_flashdata('pesan','
			<div class="alert alert-info" role="alert">
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>
			<i class="fa fa-edit me-2" aria-hidden="true"></i> Data Customer Berhasil di <strong>Update!</strong>
			</div>
			');
		redirect('admin/users/customer');
	}


	// View Edit Data Profil
	public function edit_data_profil($id)
	{
		$data['title'] = "Edit Data Profil - JangmarArt";
		$data['detail'] = $this->users_model->ambil_id_users_join($id);
		$data['role'] = $this->role_model->tampil_data('role')->result();
		$data['kategori_produk'] = $this->kategori_produk_model->tampil_data('kategori_produk')->result();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/topbar');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/users/edit_data_profil');
		$this->load->view('templates_admin/footer');	
	}

	// Aksi Edit Data Profil
	public function edit_data_profil_aksi()
	{
		$id_users 			= $this->input->post('id_users');
		$role_id 			= htmlspecialchars($this->input->post('role_id'));
		$nama_users 		= htmlspecialchars($this->input->post('nama_users'));
		$email_users 		= htmlspecialchars($this->input->post('email_users'));
		$password_users 	= $this->input->post('password_users');
		$alamat_users 		= htmlspecialchars($this->input->post('alamat_users'));
		$no_telp_users 		= htmlspecialchars($this->input->post('no_telp_users'));

		$gambar_users 			= $_FILES['gambar_users']['name'];

		if($gambar_users){
			$config ['upload_path'] = './assets/uploads/users';
			$config ['allowed_types'] = 'jpg|jpeg|png|tiff';

			$this->load->library('upload', $config);

			if( $this->upload->do_upload('gambar_users') ){
				$gambar_users = $this->upload->data('file_name');
				$this->db->set('gambar_users',$gambar_users);
			}else{

				echo "Photo Users Gagal Diupload!";

			}
		}
		$data = array(
			'role_id' 			=> $role_id,
			'nama_users' 		=> $nama_users,
			'email_users' 		=> $email_users,
			'alamat_users' 		=> $alamat_users,
			'no_telp_users' 	=> $no_telp_users,

		);
		if ($password_users !== '') {
			$data['password_users'] = MD5($password_users);
		}
		$where = array('id_users' => $id_users);

		$this->users_model->update_data($where,$data,'users');
		$this->session->set_flashdata('pesan','
			<div class="alert alert-info" role="alert">
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>
			<i class="fa fa-edit me-2" aria-hidden="true"></i> Data Profil Berhasil di <strong>Update!</strong>
			</div>
			');
		redirect('admin/users/edit_data_profil/'.$this->session->userdata('id_users'));
	}

	// Hapus Data Administrator
	public function hapus_data_admin($id)
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
		// 	redirect('admin/users');
		// }else{

		// }

		$where = array('id_users' => $id);
		$this->users_model->hapus_data($where,'users');
		$this->session->set_flashdata('pesan','
			<div class="alert alert-danger" role="alert">
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>
			<i class="fa fa-times-circle me-2" aria-hidden="true"></i> Data Administrator Berhasil di <strong>Hapus!</strong>
			</div>
			');
		redirect('admin/users');
		
	}

	// Hapus Data Manager
	public function hapus_data_manager($id)
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
		// 	redirect('admin/users');
		// }else{

		// }

		$where = array('id_users' => $id);
		$this->users_model->hapus_data($where,'users');
		$this->session->set_flashdata('pesan','
			<div class="alert alert-danger" role="alert">
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>
			<i class="fa fa-times-circle me-2" aria-hidden="true"></i> Data Manager Berhasil di <strong>Hapus!</strong>
			</div>
			');
		redirect('admin/users/manager');
		
	}

	// Hapus Data Customer
	public function hapus_data_customer($id)
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
		// 	redirect('admin/users');
		// }else{

		// }

		$where = array('id_users' => $id);
		$this->users_model->hapus_data($where,'users');
		$this->session->set_flashdata('pesan','
			<div class="alert alert-danger" role="alert">
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>
			<i class="fa fa-times-circle me-2" aria-hidden="true"></i> Data Customer Berhasil di <strong>Hapus!</strong>
			</div>
			');
		redirect('admin/users/customer');
		
	}

	// Form Validation Users
	public function _rulesManager()
	{
		$this->form_validation->set_rules('nama_users','Nama','required',
			[
				'required' => "Nama tidak boleh kosong!",
			]
		);
		$this->form_validation->set_rules('email_users','Email','required',
			[
				'required' => "Email tidak boleh kosong!",
			]
		);
		$this->form_validation->set_rules('password_users','Password','required',
			[
				'required' => "Password tidak boleh kosong!",
			]
		);
		$this->form_validation->set_rules('no_telp_users','No. Telepon/Wa','required',
			[
				'required' => "No. Telepon/Wa tidak boleh kosong!",
			]
		);
		$this->form_validation->set_rules('alamat_users','Alamat','required',
			[
				'required' => "Alamat tidak boleh kosong!",
			]
		);
		$this->form_validation->set_rules('email_users','Email','required|valid_email|is_unique[users.email_users]',
			[
				'required' => "Email tidak boleh kosong!",
				'valid_email' => "Email harus valid! contoh example@gmail.com",
				'is_unique' => 'Email ini sudah terdaftar!'
			]
		);
	}

}

/* End of file Users.php */
/* Location: ./application/controllers/admin/Users.php */