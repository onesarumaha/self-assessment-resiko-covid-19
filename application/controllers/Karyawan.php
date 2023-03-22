<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller {
	public function __construct() {
		parent:: __construct();
		$this->load->library('form_validation');
		$this->load->model('M_karyawan');
		if($this->session->userdata('hak_akses')!= "Karyawan" & $this->session->userdata('hak_akses')!= "Admin" & $this->session->userdata('hak_akses')!= "Pimpinan" & $this->session->userdata('hak_akses')!= "Satgas" ) {
				redirect(base_url('login'));
		}
		
	}

	public function index()
	{
		$data['title'] = 'Data Karyawan'; 
		$data['karyawan'] = $this->M_karyawan->getKaryawan();

		$this->load->view('template/header', $data);
		$this->load->view('template/topbar');
		$this->load->view('template/sidebar');
		$this->load->view('data_karyawan/index', $data);
		$this->load->view('template/footer');

	}

	public function submit()
	{
		$data['query'] = $this->db->get_where('users',['hak_akses' => $this->session->userdata('hak_akses')])->row_array();
		$data['title'] = 'Tambah Karyawan';
		
		$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'trim|required');
		$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'trim|required');
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'trim|required');
		$this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[users.username]', [
				'is_unique' => 'Username sudah terdaftar!',
				'required' => 'Username Harus Diisi'
		]);

		if($this->form_validation->run() == FALSE) 
		{
			$this->load->view('template/header', $data);
			$this->load->view('template/topbar');
			$this->load->view('template/sidebar');
			$this->load->view('data_karyawan/index', $data);
			$this->load->view('template/footer');
		}else{
			$this->M_karyawan->tambahKaryawan();
			$this->session->set_flashdata('notif', ' Ditambahkan');
            redirect(base_url('Karyawan/'));
		}	
	}

	public function edit($id)
	{
		$data['title'] = "Edit Karyawan";
		$data['query'] = $this->db->get_where('users',['hak_akses' => $this->session->userdata('hak_akses')])->row_array();
		$data['karyawan'] = $this->M_karyawan->idkaryawan($id);

		$this->load->view('template/header', $data);
		$this->load->view('template/topbar');
		$this->load->view('template/sidebar');
		$this->load->view('data_karyawan/edit_karyawan', $data);
		$this->load->view('template/footer');
	}

	public function submit_edit($id)
	{
		$data['title'] = "Edit Karyawan";
		$data['query'] = $this->db->get_where('users',['hak_akses' => $this->session->userdata('hak_akses')])->row_array();
		$data['karyawan'] = $this->M_karyawan->idkaryawan($id);
		
				
		$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'trim|required');
		$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'trim|required');
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'trim|required');

		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('template/header', $data);
			$this->load->view('template/topbar');
			$this->load->view('template/sidebar');
			$this->load->view('data_karyawan/edit_karyawan', $data);
			$this->load->view('template/footer');
		}else{
			$this->M_karyawan->updateKaryawan();
			$this->session->set_flashdata('notif', ' Diedit');
            redirect(base_url('Karyawan'));
		}
	}

	public function hapus($id) 
	{
		$this->M_karyawan->hapusKaryawan($id);
       	$this->session->set_flashdata('notif', ' Dihapus');
        redirect(base_url('Karyawan'));
	}








}