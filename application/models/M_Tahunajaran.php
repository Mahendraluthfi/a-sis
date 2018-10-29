<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Tahunajaran extends CI_Model {	

	var $nmtbl = 'sis_tahunajaran';
	public function add($data)
	{
		$this->db->insert($this->nmtbl, $data);
		return $this->db->insert_id();
	}

	public function get()
	{
		return $this->db->get_where($this->nmtbl, array('status' => 'AKTIF'));
	}	

	public function update($where, $data){
		$this->db->update($this->nmtbl, $data, $where);
		return $this->db->affected_rows();
	}

	public function get_id($id)
	{
		$this->db->from($this->nmtbl);
		$this->db->where('id_angkatan',$id);
		$query = $this->db->get();
		return $query->row();
	}

	public function delete($id)
	{
		$this->db->where('id_angkatan', $id);
		$this->db->update($this->nmtbl, array('status' => 'NONAKTIF'));
	}

	public function get_aktif()
	{
		return $this->db->get_where($this->nmtbl, array('aktif' => '1'));
	}
}

/* End of file M_Tahunajaran.php */
/* Location: ./application/models/M_Tahunajaran.php */