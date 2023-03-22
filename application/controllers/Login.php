<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('auth/login');
		}else{
			$this->_login();
		}
	}

	private function _login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$user = $this->db->get_where('users', ['username' => $username])->row_array();

		if($user) {
			if(password_verify($password, $user['password'])) { 
				$data = [
					'username' => $user['username'],
					'hak_akses' => $user['hak_akses'],
					'nama_lengkap' => $user['nama_lengkap'],
					'id_user' => $user['id_user'],
				];
				$this->session->set_userdata($data);
				if($user['hak_akses'] == 'Karyawan' ) {
					redirect(base_url('Dashboard'));
				}elseif($user['hak_akses'] == 'Admin') {
					redirect(base_url('Dashboard'));
				}elseif($user['hak_akses'] == 'Pimpinan') {
					redirect(base_url('Dashboard'));
				}elseif($user['hak_akses'] == 'Satgas') {
					redirect(base_url('Dashboard'));
				}
			}else{
				$this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible" role="alert"> Password Salah</div>');
        		redirect(base_url('Login'));
			}
		}else{
			$this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible" role="alert"> Username Salah</div>');
        	redirect(base_url('Login'));
		}
	}

	public function daftar()
	{
		$this->load->view('auth/daftar');
	}

	public function action_daftar() 
	{
		if($this->session->userdata('username')) {
			redirect('Login');
		}

		$this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
			'required' => 'Nama Harus Diisi',
		]);
		$this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[users.username]', [
				'is_unique' => 'Username sudah terdaftar!',
				'required' => 'Username Harus Diisi'
		]);
		$this->form_validation->set_rules('email', 'Email', 'required|trim|is_unique[users.email]', [
				'is_unique' => 'Email sudah terdaftar!',
				'required' => 'Email Harus Diisi'
		]);
		$this->form_validation->set_rules('password','Password','required|trim|min_length[5]|matches[konfirmasi_password]', [
				'matches' => 'Password Tidak Sesuai',
				'min_length' => 'Password terlalu pendek minimal 5 karakter',
				'required' => 'Password Harus Diisi'
		]);
		$this->form_validation->set_rules('konfirmasi_password', 'Konfirmasi Password', 'required|trim|matches[password]',[
			'matches' => 'Password Harus Sama',
			'required' => 'Konfirmasi Password Harus Diisi'
		]);
		


		if($this->form_validation->run() == false){
			$data['title'] = 'DAFTAR';
			$this->load->view('auth/daftar', $data);
		}else{

			$data = [
				'nama_lengkap' => htmlspecialchars($this->input->post('nama', true)),
				'username' => htmlspecialchars($this->input->post('username', true)),
				'jk' => '-',
				'jabatan' => '-',
				'email' => htmlspecialchars($this->input->post('email', true)),
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'hak_akses' => 'Karyawan'
			];

			$this->db->insert('users', $data);


			$this->session->set_flashdata('notif', '<div class="alert alert-success" role="alert">
 			 Login Berhasil, Silahkan Login !</div>');
			redirect('Login');

		}
	}

	public function logout()
	{
		$this->session->sess_destroy();

		$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible" role="alert"> Logout Berhasil</div>');
        redirect(base_url('Login'));
	}





}