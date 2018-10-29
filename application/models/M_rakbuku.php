<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_rakbuku extends CI_Model {
	
	var $nmtbl = 'sis_rakbuku';
	public function add($data)
	{
		$this->db->insert($this->nmtbl, $data);
		return $this->db->insert_id();
	}

	public function get()
	{
		return $this->db->get_where($this->nmtbl, array('status' => 'Y'));
	}	

	public function update($where, $data){
		$this->db->update($this->nmtbl, $data, $where);
		return $this->db->affected_rows();
	}

	public function get_id($id)
	{
		$this->db->from($this->nmtbl);
		$this->db->where('id_rak',$id);
		$query = $this->db->get();
		return $query->row();
	}

	public function delete($id)
	{
		$this->db->where('id_rak', $id);
		$this->db->update($this->nmtbl, array('status' => 'N'));
	}


}

/* End of file M_rakbuku.php */
/* Location: ./application/models/M_rakbuku.php */