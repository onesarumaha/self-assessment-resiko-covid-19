<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_biodata extends CI_Model {
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function idcalonsiswa($id)
	{
		return $this->db->get_where('calon_siswa', ['id_calon_siswa' => $id])->row_array();
	}

	public function get_datasiswa()
	{
		$this->db->select('*');
		$this->db->from('calon_siswa');
		
		$this->db->join('users', 'users.id_user = calon_siswa.id_user', 'left');

		$username = $this->session->userdata['username'];
		$this->db->where('username', $username);

		return $query = $this->db->get()->result_array();
	}

	public function bioOrtu()
	{
		$data = [
				'id_user' => htmlspecialchars($this->input->post('id_user', true)),
				'nama_ayah' => htmlspecialchars($this->input->post('nama_ayah', true)),
				'umur_ayah' => htmlspecialchars($this->input->post('umur_ayah', true)),
				'pekerjaan_ayah' => htmlspecialchars($this->input->post('pekerjaan_ayah', true)),
				'agama_ayah' => htmlspecialchars($this->input->post('agama_ayah', true)),
				'nama_ibu' => htmlspecialchars($this->input->post('nama_ibu', true)),
				'umur_ibu' => htmlspecialchars($this->input->post('umur_ibu', true)),
				'pekerjaan_ibu' => htmlspecialchars($this->input->post('pekerjaan_ibu', true)),
				'agama_ibu' => htmlspecialchars($this->input->post('agama_ibu', true)),
				'no_hp_ortu' => htmlspecialchars($this->input->post('no_hp_ortu', true)),
				'alamat_ortu' => htmlspecialchars($this->input->post('alamat_ortu', true)),
				
			];
		$this->db->insert('ortu_siswa', $data);
	}

	public function get_dataortu()
	{
		$this->db->select('*');
		$this->db->from('ortu_siswa');
		
		$this->db->join('users', 'users.id_user = ortu_siswa.id_user', 'left');

		$username = $this->session->userdata['username'];
		$this->db->where('username', $username);

		return $query = $this->db->get()->result_array();
	}













}