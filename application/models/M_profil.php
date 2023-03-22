<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_profil extends CI_Model {
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function idUser($id)
	{
		return $this->db->get_where('users', ['id_user' => $id])->row_array();
	}

	public function getUser()
	{
		$this->db->order_by('id_user', 'DESC');

		$username = $this->session->userdata['id_user'];
		$this->db->where('id_user', $username);

		return $this->db->get('users')->result_array();  
		
	}

	public function editProfile()
	{

		$data = [
				'nama_lengkap' => htmlspecialchars($this->input->post('nama_lengkap', true)),
				'jabatan' => htmlspecialchars($this->input->post('jabatan', true)),
				'jk' => htmlspecialchars($this->input->post('jk', true)),
				'username' => htmlspecialchars($this->input->post('username', true)),
				'email' => htmlspecialchars($this->input->post('email', true)),
			];
		$this->db->where('id_user', $this->input->post('id_user'));
		$this->db->update('users', $data);
	}








}