<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pilih extends CI_Model {

	public function verif($npm,$token)
	{
		$status1;
		$status2;
		$npm = $this->db->where('npm', $npm)->get('data_pemilih')->row();

		if ($this->db->affected_rows() > 0) {
			$status1 = true;
		} else {
			$status1 = false;
		}

		$token = $this->db->where('identitas', $token)->get('data_suara')->row();

		if ($this->db->affected_rows() > 0) {
			$status2 = true;
		} else {
			$status2 = false;
		}

		if ($status1 == true && $status2 == true) {
			if ($token->status == 1) {
				return false;
			}

			if ($npm->status == 1) {
				return false;
			}

			$array = array(
				'npm' => $npm->npm,
				'token' => $token->identitas,
				'status_suara' => $token->status,
				'status_pemilih' => $npm->status,
				'login_user' => true
			);
			
			$this->session->set_userdata( $array );

			return true;	
		} else {
			return false;
		}
	}

	public function get_calon()
	{
		return $this->db->get('calon')->result();
	}

	public function get_id()
	{
		return $this->db->where('status', '0')->order_by('id',rand())->get('surat_suara',1)->row();
	}

	public function update_suara($id, $ident)
	{
		$object = array('status' => 1, 'token' => $ident);
		
		$this->db->where('id', $id)->update('surat_suara', $object);
		

		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function pilih_suara()
	{
		$object = array('suara' => $this->input->post('suara') );
		$this->db->where('id', $this->input->post('ident'))->update('surat_suara', $object);

		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function update_data_suara($ident)
	{
		$object = array('status' => 1 );
		$this->db->where('identitas',$ident)->update('data_suara', $object);

		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		} 
	}

	public function update_data_pemilih($npm)
	{
		$object = array('status' => 1 );
		$this->db->where('npm', $npm)->update('data_pemilih', $object);

		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

}

/* End of file M_pilih.php */
/* Location: ./application/models/M_pilih.php */