<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Register extends CI_Model {

	public function user_reg($isi)
	{
		$this->db->insert('sis_reg_user', $isi);
	}

	public function login($input)
	{
		return $this->db->get_where('sis_level', $input);
	}

	public function privilage()
	{
		return $this->db->get('sis_modul');
	}
}

/* End of file Register.php */
/* Location: ./application/models/Register.php */