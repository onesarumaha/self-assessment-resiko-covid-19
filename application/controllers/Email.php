<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends CI_Controller {
	public function __construct() {
		parent:: __construct();
		$this->load->library('form_validation');
		$this->load->model('M_form');
		if($this->session->userdata('hak_akses')!= "Karyawan" & $this->session->userdata('hak_akses')!= "Admin" & $this->session->userdata('hak_akses')!= "Pimpinan" & $this->session->userdata('hak_akses')!= "Satgas" ) {
				redirect(base_url('login'));
		}
		
	}

	public function share()
	{
		$data['app_suk'] = $this->M_form->getApprovesuk();

		$message = '
			<h3 align="center">Hasil Self Assessment Resiko Covid-19</h3>
				<table border="1" width="100%" cellpadding="5">
					<tr>
						<td width="30%">Tanggal Dan Waktu</td>
						<td width="70%">'.$this->input->post("tgl").' '.$this->input->post("waktu").'</td>
					</tr>
					
					<tr>
						<td width="30%">Nama Lengkap</td>
						<td width="70%">'.$this->input->post("nama_lengkap").'</td>
					</tr>
					
					<tr>
						<td width="30%">Poin</td>
						<td width="70%">'.$this->input->post("poin").'</td>
					</tr>
					
					<tr>
						<td width="30%">Keterangan</td>
						<td width="70%">'.$this->input->post("status").'</td>
					</tr>
				</table>
			';

		 $config = Array(
		      	'protocol' => 'smtp',
	            'smtp_host' => 'ssl://smtp.googlemail.com',
	            'smtp_port' => 465,
	            'smtp_user' => 'onesarumaha@gmail.com',
	            'smtp_pass' => 'hzxcfattvwtkpwwd',
	            'mailtype' => 'html',
	            'charset' => 'iso-8859-1'
		    );

          $this->load->library('email', $config);

          	$this->email->set_newline("\r\n");
		    $this->email->from('onesarumaha@gmail.com');
		    $this->email->to($this->input->post("email"));
		    $this->email->subject('Hasil Self Assessment Resiko Covid-19 ');
	        $this->email->message($message);
	        // $this->email->attach('./assets/template/images/download.png');

          if($this->email->send()) {
              	$this->session->set_flashdata('notif', ' Dikirim');
        		redirect(base_url('Dataform/'));
          }
          else {
               show_error($this->email->print_debugger());
          }

     }

	


















}