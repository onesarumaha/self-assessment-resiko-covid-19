<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_form extends CI_Model {
	public function __construct(){
		date_default_timezone_set('Asia/Jakarta');
		parent::__construct();
		$this->load->database();
	}

	public function idfrom($id)
	{
		return $this->db->get_where('data_form', ['id_user' => $id])->row_array();
	}

	public function getForm()
	{
		$this->db->select('*');
		$this->db->from('data_form');
		$this->db->join('users', 'users.id_user = data_form.id_user', 'left');

		return $query = $this->db->get()->result_array();  
		
	}

	public function getApprovekaryawan()
	{
		$this->db->order_by('id_form', 'DESC');
		$this->db->select('*');
		$this->db->from('form_pertanyaan');
		$this->db->join('status', 'status.id_status = form_pertanyaan.id_status');
		$this->db->join('users', 'users.id_user = form_pertanyaan.id_user');
		
		$username = $this->session->userdata['username'];
		$this->db->where('username', $username);

		return $query = $this->db->get()->result_array();
	}

	public function tambahKaryawan()
	{
		$data = [
				'nama_lengkap' => htmlspecialchars($this->input->post('nama_lengkap', true)),
				'jabatan' => htmlspecialchars($this->input->post('jabatan', true)),
				'jk' => htmlspecialchars($this->input->post('jk', true)),
				'username' => htmlspecialchars($this->input->post('username', true)),
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'hak_akses' => 'Karyawan'
				
				
			];
		$this->db->insert('users', $data);
	}

	public function updateKaryawan()
	{
		$data = [
				'nama_lengkap' => htmlspecialchars($this->input->post('nama_lengkap', true)),
				'jabatan' => htmlspecialchars($this->input->post('jabatan', true)),
				'jk' => htmlspecialchars($this->input->post('jk', true)),
				'username' => htmlspecialchars($this->input->post('username', true)),
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
			];
		$this->db->where('id_user', $this->input->post('id_user'));
		$this->db->update('users', $data);
	}


	public function hapusKaryawan($id)
	{
		$this->db->delete('users', ['id_user' => $id] );

	}

	public function tambahPertanyaan()
	{
		$data = [
				'nama_pertanyaan' => htmlspecialchars($this->input->post('nama_pertanyaan', true)),
				'poin' => htmlspecialchars($this->input->post('poin', true)),

				
				
			];
		$this->db->insert('data_pertanyaan', $data);
	}

	public function idpertanyaan($id)
	{
		return $this->db->get_where('data_pertanyaan', ['id_pertanyaan' => $id])->row_array();
	}

	public function getPertanyaan()
	{
		$this->db->order_by('id_pertanyaan', 'DESC');
		return $this->db->get('data_pertanyaan')->result_array();  
		
	}

	public function hapusPertanyaan($id)
	{
		$this->db->delete('data_pertanyaan', ['id_pertanyaan' => $id] );

	}

	public function editPertanyaan()
	{
		$data = [
				'nama_pertanyaan' => htmlspecialchars($this->input->post('nama_pertanyaan', true)),
				'poin' => htmlspecialchars($this->input->post('poin', true)),
				
			];
		$this->db->where('id_pertanyaan', $this->input->post('id_pertanyaan'));
		$this->db->update('data_pertanyaan', $data);
	}

	public function addPertanyaan()
	{
		$data = [
				'nama_pertanyaan' => htmlspecialchars($this->input->post('nama_pertanyaan', true)),
				'poin' => htmlspecialchars($this->input->post('poin', true)),
				
			];
		$this->db->insert('data_pertanyaan', $data);
	}

	public function addForm()
	{
		$data_status = [

				'isi_status' => 'Diizinkan Masuk',
		];
		$this->db->insert('status', $data_status);

		$id_status = $this->db->insert_id();

		$data_form = [
				'id_status' => $id_status,
				'tgl' => htmlspecialchars($this->input->post('tgl', true)),
				'waktu' => date('H:i:s'),
				'id_user' => htmlspecialchars($this->input->post('id_user', true)),
				'poin' => htmlspecialchars($this->input->post('pertanyaan1', true)) +
				 htmlspecialchars($this->input->post('pertanyaan2', true)) +
				 htmlspecialchars($this->input->post('pertanyaan3', true)) +
				 htmlspecialchars($this->input->post('pertanyaan4', true)) +
				 htmlspecialchars($this->input->post('pertanyaan5', true)),
		];
		$this->db->insert('form_pertanyaan', $data_form);

	}

	public function getApprove()
	{
		$this->db->order_by('id_form', 'DESC');
		$this->db->select('*');
		$this->db->from('form_pertanyaan');
		$this->db->join('status', 'status.id_status = form_pertanyaan.id_status');
		$this->db->join('users', 'users.id_user = form_pertanyaan.id_user');
		// $this->db->where('poin >', 50);
		return $query = $this->db->get()->result_array();
	}

	public function getApprovesat()
	{
		$this->db->order_by('id_form', 'DESC');
		$this->db->select('*');
		$this->db->from('form_pertanyaan');
		$this->db->join('status', 'status.id_status = form_pertanyaan.id_status');
		$this->db->join('users', 'users.id_user = form_pertanyaan.id_user');
		$this->db->where('poin >', 50);
		$this->db->where('isi_status', 'Diizinkan Masuk');
		return $query = $this->db->get()->result_array();
	}

	public function getApprovepim()
	{
		$this->db->order_by('id_form', 'DESC');
		$this->db->select('*');
		$this->db->from('form_pertanyaan');
		$this->db->join('status', 'status.id_status = form_pertanyaan.id_status');
		$this->db->join('users', 'users.id_user = form_pertanyaan.id_user');
		$this->db->where('poin >' , 50);
		$this->db->where('isi_status', 'Telah Diapprove Oleh Satgas');
		return $query = $this->db->get()->result_array();
	}

	public function getApprovesuk()
	{
		$this->db->order_by('id_form', 'DESC');
		$this->db->select('*');
		$this->db->from('form_pertanyaan');
		$this->db->join('status', 'status.id_status = form_pertanyaan.id_status');
		$this->db->join('users', 'users.id_user = form_pertanyaan.id_user');
		// $this->db->where('poin <' , 50);
		$this->db->where_not_in('isi_status' , 'Diproses');
		
		
		

		return $query = $this->db->get()->result_array();
	}

	public function idstatus($id)
	{
		return $this->db->get_where('status', ['id_status' => $id])->row_array();
	}

	public function approvePertanyaan()
	{
		$data = [
				'isi_status' => htmlspecialchars($this->input->post('isi_status', true)),
				
			];
		$this->db->where('id_status', $this->input->post('id_status'));
		$this->db->update('status', $data);

		
	}

	public function app_satgas($id, $data) 
	{
		$this->db->where('id_status', $id);
		return $this->db->update('status', $data);
	}

	public function app_satgas_tidak($id, $data) 
	{
		$this->db->where('id_status', $id);
		return $this->db->update('status', $data);
	}

	public function getLaporan()
	{
		
		$this->db->select('*');
		$this->db->from('form_pertanyaan');
		$this->db->join('status', 'status.id_status = form_pertanyaan.id_status');
		$this->db->join('users', 'users.id_user = form_pertanyaan.id_user');

		$this->db->where_not_in('isi_status' , 'Diproses');
		
		return $query = $this->db->get()->result_array();
	}

	public function getPeriode()
	{
		$dt1 = $_POST["tgl_1"];
    	$dt2 = $_POST["tgl_2"];
		
		$this->db->select('*');
		$this->db->from('form_pertanyaan');
		$this->db->join('status', 'status.id_status = form_pertanyaan.id_status');
		$this->db->join('users', 'users.id_user = form_pertanyaan.id_user');

		
		return $query = $this->db->get()->result_array();
	}

	public function getMasuk()
	{
		$query = $this->db->get('form_pertanyaan') ;


		    if($query->num_rows()>0)
		    {
		      return $query->num_rows();
		    }
		    else
		    {
		      return 0;
		    }
	}

	public function hapusFormKary($id)
	{
		$this->db->delete('form_pertanyaan', ['id_form' => $id] );

	}










}