<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dataform extends CI_Controller {
	public function __construct() {
		parent:: __construct();
		$this->load->library('form_validation');
		$this->load->model('M_form');
		if($this->session->userdata('hak_akses')!= "Karyawan" & $this->session->userdata('hak_akses')!= "Admin" & $this->session->userdata('hak_akses')!= "Pimpinan" & $this->session->userdata('hak_akses')!= "Satgas" ) {
				redirect(base_url('login'));
		}
		
	}

	public function index()
	{
		$data['title'] = 'Hasil Self Assessment Karyawan'; 
		$data['app_suk'] = $this->M_form->getApprovesuk();
		$this->load->view('template/header', $data);
		$this->load->view('template/topbar');
		$this->load->view('template/sidebar');
		$this->load->view('data_form/index', $data);
		$this->load->view('template/footer');

	}

	public function form_karyawan()
	{
		$data['title'] = 'Data Form'; 
		$data['app_kary'] = $this->M_form->getApprovekaryawan();
		$this->load->view('template/header', $data);
		$this->load->view('template/topbar');
		$this->load->view('template/sidebar');
		$this->load->view('data_form/form_karyawan', $data);
		$this->load->view('template/footer');

	}

	public function history()
	{
		$data['title'] = 'History'; 
		$data['app_kary'] = $this->M_form->getApprovekaryawan();
		$this->load->view('template/header', $data);
		$this->load->view('template/topbar');
		$this->load->view('template/sidebar');
		$this->load->view('data_form/history', $data);
		$this->load->view('template/footer');

	}


	public function data_pertanyaan()
	{
		$data['title'] = 'Data Pertanyaan'; 
		$data['pertanyaan'] = $this->M_form->getPertanyaan();

		$this->load->view('template/header', $data);
		$this->load->view('template/topbar');
		$this->load->view('template/sidebar');
		$this->load->view('pertanyaan/data_pertanyaan', $data);
		$this->load->view('template/footer');

	}

	public function submit_pertanyaan()
	{

		$data['query'] = $this->db->get_where('users',['hak_akses' => $this->session->userdata('hak_akses')])->row_array();
		$data['title'] = 'Data Pertanyaan';
		$data['pertanyaan'] = $this->M_form->getPertanyaan();

		
		$this->form_validation->set_rules('nama_pertanyaan', 'Pertanyaan', 'trim|required');
		$this->form_validation->set_rules('poin', 'Poin', 'trim|required');


		if($this->form_validation->run() == FALSE) 
		{
			$this->load->view('template/header', $data);
			$this->load->view('template/topbar');
			$this->load->view('template/sidebar');
			$this->load->view('pertanyaan/data_pertanyaan', $data);
			$this->load->view('template/footer');
		}else{
			$this->M_form->addPertanyaan();
			$this->session->set_flashdata('notif', ' Ditambahkan');
            redirect(base_url('Dataform/data_pertanyaan/'));
		}	
	}

		public function edit_pertanyaan($id)
	{
		$data['title'] = "Edit Pertanyaan";
		$data['query'] = $this->db->get_where('users',['hak_akses' => $this->session->userdata('hak_akses')])->row_array();
		$data['pertanyaan'] = $this->M_form->idpertanyaan($id);

		$this->load->view('template/header', $data);
		$this->load->view('template/topbar');
		$this->load->view('template/sidebar');
		$this->load->view('pertanyaan/edit_pertanyaan', $data);
		$this->load->view('template/footer');
	}

	public function submit_edit_pertanyaan($id)
	{
		$data['title'] = "Edit Pertanyaan";
		$data['query'] = $this->db->get_where('users',['hak_akses' => $this->session->userdata('hak_akses')])->row_array();
		$data['pertanyaan'] = $this->M_form->idpertanyaan($id);
		
		
				
		$this->form_validation->set_rules('nama_pertanyaan', 'Pertanyaan', 'trim|required');
		$this->form_validation->set_rules('poin', 'Poin', 'trim|required');

		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('template/header', $data);
			$this->load->view('template/topbar');
			$this->load->view('template/sidebar');
			$this->load->view('pertanyaan/edit_pertanyaan', $data);
			$this->load->view('template/footer');
		}else{
			$this->M_form->editPertanyaan();
			$this->session->set_flashdata('notif', ' Diedit');
            redirect(base_url('Dataform/data_pertanyaan'));
		}
	}

	public function hapus_pertanyaan($id) 
	{
		$this->M_form->hapusPertanyaan($id);
       	$this->session->set_flashdata('notif', ' Dihapus');
        redirect(base_url('Dataform/data_pertanyaan'));
	}

	public function isi_form()
	{
		$data['title'] = 'Isi Form'; 
		$data['form1'] = $this->M_form->getForm();
		$data['form'] = $this->M_form->getPertanyaan();

		$this->load->view('template/header', $data);
		$this->load->view('template/topbar');
		$this->load->view('template/sidebar');
		$this->load->view('data_form/isi_form', $data);
		$this->load->view('template/footer');

	}


	public function submit_jawab()
	{
		
		$data['query'] = $this->db->get_where('users',['hak_akses' => $this->session->userdata('hak_akses')])->row_array();
		$data['title'] = 'Data Pertanyaan';
		$data['pertanyaan'] = $this->M_form->getPertanyaan();

		$this->form_validation->set_rules('tgl', 'Tanggal', 'trim|required');
		$this->form_validation->set_rules('pertanyaan1', 'Pertanyaan 1', 'trim|required');
		$this->form_validation->set_rules('pertanyaan2', 'Pertanyaan 2', 'trim|required');
		$this->form_validation->set_rules('pertanyaan3', 'Pertanyaan 3', 'trim|required');
		$this->form_validation->set_rules('pertanyaan4', 'Pertanyaan 4', 'trim|required');
		$this->form_validation->set_rules('pertanyaan5', 'Pertanyaan 5', 'trim|required');


		if($this->form_validation->run() == FALSE) 
		{
			$this->load->view('template/header', $data);
			$this->load->view('template/topbar');
			$this->load->view('template/sidebar');
			$this->load->view('data_form/isi_form', $data);
			$this->load->view('template/footer');
		}else{
			$this->M_form->addForm();
			$this->session->set_flashdata('notif', ' Terimakasih');
            redirect(base_url('Dataform/form_karyawan/'));
		}	
	}

	public function approve()
	{
		$data['title'] = 'Approve'; 
		$data['app'] = $this->M_form->getApprove();

		$this->load->view('template/header', $data);
		$this->load->view('template/topbar');
		$this->load->view('template/sidebar');
		$this->load->view('data_form/approve', $data);
		$this->load->view('template/footer');

	}

	public function app_satgas()
	{
		$data['title'] = 'Approve'; 
		$data['app'] = $this->M_form->getApprovesat();

		$this->load->view('template/header', $data);
		$this->load->view('template/topbar');
		$this->load->view('template/sidebar');
		$this->load->view('data_form/app_satgas', $data);
		$this->load->view('template/footer');

	}

	public function approve_pimpinan()
	{
		$data['title'] = 'Approve'; 
		$data['app'] = $this->M_form->getApprovepim();

		$this->load->view('template/header', $data);
		$this->load->view('template/topbar');
		$this->load->view('template/sidebar');
		$this->load->view('data_form/app_pimpinan', $data);
		$this->load->view('template/footer');

	}

	public function approve_pertanyaan($id)
	{
		$data['title'] = "Approve";
		$data['query'] = $this->db->get_where('users',['hak_akses' => $this->session->userdata('hak_akses')])->row_array();
		$data['app_id'] = $this->M_form->idstatus($id);
		$data['app'] = $this->M_form->getApprove();

		if(!$this->form_validation->run() == FALSE)
		{
			$this->load->view('template/header', $data);
			$this->load->view('template/topbar');
			$this->load->view('template/sidebar');
			$this->load->view('data_form/approve', $data);
			$this->load->view('template/footer');
		}else{
			$this->M_form->approvePertanyaan();
			$this->session->set_flashdata('notif', ' Approve');
            redirect(base_url('Dataform/approve_pimpinan'));
		}
	}

	public function approve_satgas($id)
	{
	      $data  = array(
	         'isi_status'      => 'Telah Diapprove Oleh Satgas'
	      
	      );

	      $res = $this->M_form->app_satgas($id, $data);

	      if($res > 0){
	      $this->session->set_flashdata('notif', ' Diapprove');	
	      
            redirect(base_url('Dataform/app_satgas'));

	      }else{
	       // kalau error 
	      }
        
	}

	public function approve_satgas_tidak($id)
	{
	      $data  = array(
	         'isi_status'      => 'Tidak Diizinkan Masuk'
	      
	      );

	      $res = $this->M_form->app_satgas_tidak($id, $data);

	      if($res > 0){
	      $this->session->set_flashdata('notif', ' Diapprove');	
	      
            redirect(base_url('Dataform/app_satgas'));

	      }else{
	       // kalau error 
	      }
        
	}

	public function hapusformkaryawan($id) 
	{
		$this->M_form->hapusFormKary($id);
       	$this->session->set_flashdata('notif', ' Dihapus');
        redirect(base_url('Dataform/form_karyawan'));
	}











}