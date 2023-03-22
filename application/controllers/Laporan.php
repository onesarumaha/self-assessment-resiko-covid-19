<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
	public function __construct() {
		parent:: __construct();
		require_once APPPATH.'third_party/dompdf/dompdf_config.inc.php';
		$this->load->library('form_validation');
		$this->load->model('M_karyawan');
		$this->load->model('M_form');
		if($this->session->userdata('hak_akses')!= "Karyawan" & $this->session->userdata('hak_akses')!= "Admin" & $this->session->userdata('hak_akses')!= "Pimpinan" & $this->session->userdata('hak_akses')!= "Satgas" ) {
				redirect(base_url('login'));
		}
		
	}

	public function index()
	{
		$data['title'] = 'Laporan Self Assessment Resiko Covid-19'; 
		$data['laporan'] = $this->M_form->getLaporan();
		

		$this->load->view('template/header', $data);
		$this->load->view('template/topbar');
		$this->load->view('template/sidebar');
		$this->load->view('laporan/index', $data);
		$this->load->view('template/footer');

	}

	public function cetak_laporan()
	{
		$data = array(
			'title' => 'Laporan Self Assessment Resiko Covid-19'
		);
		$data['laporan'] = $this->M_form->getLaporan();

		$html = $this->load->view('laporan/cetak_laporan', $data);
		
		
	}

	public function cetak_periode()
	{
		$data = array(
			'title' => 'Laporan Self Assessment Resiko Covid-19'
		);
		$data['laporan'] = $this->M_form->getLaporan();

		$html = $this->load->view('laporan/cetak_periode', $data);

	}












}