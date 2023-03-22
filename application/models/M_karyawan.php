<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_karyawan extends CI_Model {
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function idkaryawan($id)
	{
		return $this->db->get_where('users', ['id_user' => $id])->row_array();
	}

	public function getKaryawan()
	{
		$this->db->order_by('id_user', 'DESC');
		$this->db->where('hak_akses', 'karyawan');
		return $this->db->get('users')->result_array();  
		
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

	public function getSumKaryawan()
	{
		$query = $this->db->get('users') ;

		    if($query->num_rows()>0)
		    {
		      return $query->num_rows();
		    }
		    else
		    {
		      return 0;
		    }
	}













}