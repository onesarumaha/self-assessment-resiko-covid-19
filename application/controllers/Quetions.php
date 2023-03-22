<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quetions extends CI_Controller {
	public function __construct() {
		parent:: __construct();
		$this->load->library('form_validation');
		$this->load->model('M_biodata');
		$this->load->model('M_karyawan');
		$this->load->model('M_form');
		if($this->session->userdata('hak_akses')!= "Karyawan" & $this->session->userdata('hak_akses')!= "Admin" & $this->session->userdata('hak_akses')!= "Pimpinan" & $this->session->userdata('hak_akses')!= "Satgas" ) {
				redirect(base_url('login'));
		}
		
	}

	public function index()
	{
		$data['jum_karyawan'] = $this->M_karyawan->getSumKaryawan();
		$data['masuk'] = $this->M_form->getMasuk();
		$data['title'] = 'Quetions'; 
		$this->load->view('template/header', $data);
		$this->load->view('template/topbar');
		$this->load->view('template/sidebar');
		$this->load->view('pertanyaan/data_quetion', $data);
		$this->load->view('template/footer');

	}

	
}
