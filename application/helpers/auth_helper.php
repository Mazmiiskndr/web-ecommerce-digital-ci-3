<?php

function cek_login()
{
	$ci = get_instance();
	if (!$ci->session->userdata('email_users')) {
		$ci->session->set_flashdata('pesan','
			<div style="color: red;" class="alert alert-danger alert-dismissible fade show" role="alert">
			Akses ditolak !. Silahkan <strong>Login!</strong>
			<button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true"></span>
			</button>
			</div>
			');
		if ($ci->session->userdata('role_id') == 1) {
			redirect('auth/login');
		} else {
			redirect('auth/login');
			$ci->session->set_flashdata('pesan','
				<div style="color: red;" class="alert alert-danger alert-dismissible fade show" role="alert">
				Akses ditolak !. Silahkan <strong>Login!</strong>
				<button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true"></span>
				</button>
				</div>
				');
		}
	} else {
		$role_id = $ci->session->userdata('role_id');
		$id_users = $ci->session->userdata('id_users');
	}
}
function cek_user()
{
	$ci = get_instance();
	$role_id = $ci->session->userdata('role_id');
	if ($role_id == 3) {
		$ci->session->set_flashdata('pesan', '<div class="alert alertdanger" role="alert">Akses tidak diizinkan </div>');
		redirect('');
	}
}

