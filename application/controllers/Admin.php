<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_admin');
	}

	public function index()
	{
		if ($this->session->userdata('login')) {
			redirect('admin/menu');
		}

		if ($this->session->userdata('login_user')) {
			redirect('pilih');
		}		

		$this->load->view('admin/v_login');
	}

	public function menu()
	{
		if (!$this->session->userdata('login')) {
			redirect('admin');
		}

		$this->load->view('admin/v_menu');
	}

	public function mahasiswa()
	{
		$data['mahasiswa'] = $this->m_admin->get_mahasiswa();
		$this->load->view('admin/v_mahasiswa', $data);
	}

	public function create()
	{
		if (!$this->session->userdata('login')) {
			redirect('admin');
		}

		$this->load->view('admin/v_create');
	}

	public function tabulasi()
	{
		if (!$this->session->userdata('login')) {
			redirect('admin');
		}

		$data['surat_suara_num_rows'] = $this->m_admin->get_surat_suara();
		$data['data_calon'] = $this->m_admin->get_data_calon();
 		$this->load->view('admin/v_tabulasi', $data);
	}

	public function calon()
	{
		if (!$this->session->userdata('login')) {
			redirect('admin');
		}


		$data['pemilu'] = $this->m_admin->getNamaPemilu();
		$this->load->view('admin/v_calon', $data);
	}

	public function login()
	{
		if ($this->m_admin->login()) {
			redirect('admin/menu');
		} else {
			$this->session->set_flashdata('fail', 'Login Gagal');
			redirect('admin');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();

		redirect('admin');
	}

	public function insert_pemilihan()
	{
		if ($this->m_admin->insert_pemilihan()) {
			redirect('admin/calon');
		} else {
			$this->session->set_flashdata('fail', 'Setup Gagal');
			redirect('admin/create');
		}
	}

	public function insert_calon()
	{
		$this->m_admin->delete_calon();

		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size']  = '10000';
		
		$this->load->library('upload', $config);
		
		$status;

		$n = $this->m_admin->getNamaPemilu()->jumlah;
		for ($i=0; $i < $n; $i++) {
			$a=$i;
			$b=$i;
			if ( ! $this->upload->do_upload('foto'.$i)){
				$this->session->set_flashdata('fail', $this->upload->display_errors());
				redirect('admin/calon');
			}
			else{
				$foto = $this->upload->data();

				$object = array(
					'no_urut' => $this->input->post('urut'.$i),
					'nomor' => $b+1,
					'nama' => $this->input->post('calon'.$i),
					'foto' => $foto['file_name']
				);

				$status = $this->m_admin->insert_calon($object);
			}	
		}

		/*$object = array(
					'nomor' => $n+1,
					'nama' => 'Abstain',
					'foto' => 'Abstain.png'
				);

		$this->m_admin->insert_calon($object);*/
		$this->m_admin->delete_suara();
		$this->m_admin->gen_id();

		if ($status) {
			$this->session->set_flashdata('success', 'Setup Success');
			redirect('admin/menu');
		} else {
			$this->session->set_flashdata('fail', 'Setup Gagal');
			redirect('admin/calon');
		}
	}

	public function a()
	{
		$z = $this->input->post('limit');
		
		foreach ($this->m_admin->get_suara_by_id($z) as $a) {
			echo $a->id;
		}

	}

	public function b()
	{
		$z = $this->input->post('limit');
		
		foreach ($this->m_admin->get_suara_by_pilihan($z) as $a) {
			echo $a->suara;
		}
	}
}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */