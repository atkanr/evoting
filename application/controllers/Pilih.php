<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pilih extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model('m_pilih');
		$this->load->model('m_admin');
	}

	public function index()
	{
		if ($this->session->userdata('login')) {
			redirect('admin');
		}

		if ($this->session->userdata('login_user')) {
			redirect('pilih/calon');
		}		
		$this->load->view('user/v_verif');	
	}

	public function calon()
	{
		if (!$this->session->userdata('login_user')) {
			redirect('pilih');
		}

		if ($this->session->userdata('status_pemilih') == 1) {
			$this->logout();
			#redirect('pilih');
		}

		$data['calon'] = $this->m_pilih->get_calon();
		$data['jumlah'] = $this->m_admin->getNamaPemilu()->jumlah;
		$this->load->view('user/v_pilih', $data);
	}

	public function verif()
	{
		if ($this->m_pilih->verif($this->input->post('nomor_induk'), $this->input->post('random_number'))) {
			redirect('pilih/calon');
		} else {
			$this->session->set_flashdata('fail', 'Gagal Verifikasi');
			redirect('pilih');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('pilih');
	}

	public function get_id()
	{
		$id = $this->m_pilih->get_id()->id;
		$this->update_suara($id, $this->session->userdata('token'));

		echo $id;	
	}

	public function update_suara($id, $ident)
	{
		$this->m_pilih->update_suara($id, $ident);
	}

	public function pilih_suara()
	{
		if ($this->m_pilih->pilih_suara() == true) {
			$this->update_data_suara();
			$this->update_data_pemilih();
			$array = array(
				'status_pemilih' => 1
			);
			
			$this->session->set_userdata( $array );

			echo "done";
		} else {
			echo 'fail';
		}
	}

	public function update_data_suara()
	{
		$this->m_pilih->update_data_suara($this->session->userdata('token'));
	}

	public function update_data_pemilih()
	{
		$this->m_pilih->update_data_pemilih($this->session->userdata('npm'));
	}

}

/* End of file pilih.php */
/* Location: ./application/controllers/pilih.php */