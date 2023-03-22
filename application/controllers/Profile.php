<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
	public function __construct() {
		parent:: __construct();
		$this->load->library('form_validation');
		$this->load->model('M_profil');
		if($this->session->userdata('hak_akses')!= "Karyawan" & $this->session->userdata('hak_akses')!= "Admin" & $this->session->userdata('hak_akses')!= "Pimpinan" & $this->session->userdata('hak_akses')!= "Satgas" ) {
				redirect(base_url('login'));
		}
		
	}

	public function index()
	{
		$data['title'] = 'Profile User'; 
		$data['usernya'] = $this->M_profil->getUser();
		$this->load->view('template/header', $data);
		$this->load->view('template/topbar');
		$this->load->view('template/sidebar');
		$this->load->view('profil/index', $data);
		$this->load->view('template/footer');

	}

		public function submit_profile($id)
	{

		$data['query'] = $this->db->get_where('users',['hak_akses' => $this->session->userdata('hak_akses')])->row_array();
		$data['title'] = 'Data Pertanyaan';
		$data['usernya'] = $this->M_profil->getUser();



		if(!$this->form_validation->run() == FALSE) 
		{
			$this->load->view('template/header', $data);
			$this->load->view('template/topbar');
			$this->load->view('template/sidebar');
			$this->load->view('profil/index', $data);
			$this->load->view('template/footer');
		}else{
			$this->M_profil->editProfile();
			$this->session->set_flashdata('notif', ' Diedit');
            redirect(base_url('Profile/'));
		}	
	}


















}
