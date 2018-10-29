<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Setting extends CI_Model {

	public function get()
	{
		return $this->db->get('sis_level');
	}	

	public function get_id($id)
	{
		$this->db->from('sis_denda');
		$this->db->where('id_denda',$id);
		$query = $this->db->get();
		return $query->row();
	}

	public function get_denda()
	{
		return $this->db->get('sis_denda');
	}
	public function get_info()
	{
		return $this->db->get('sis_reg_user');
	}
	public function hak_akses($id)
	{
		return $this->db->get_where('sis_level', array('id_akses' => $id));		
	}

	public function privilage($id)
	{
		return $this->db->get_where('sis_privilage', array('id_akses' => $id));
	}

}

/* End of file M_Setting.php */
/* Location: ./application/models/M_Setting.php */