<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Jenismapel extends CI_Model {

	var $nmtbl = 'sis_jenismapel';
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
		$this->db->where('id_jenismapel',$id);
		$query = $this->db->get();
		return $query->row();
	}

	public function delete($id)
	{
		$this->db->where('id_jenismapel', $id);
		$this->db->update($this->nmtbl, array('status' => 'NONAKTIF'));
	}

}

/* End of file M_Jenismapel.php */
/* Location: ./application/models/M_Jenismapel.php */