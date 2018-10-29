<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Kelas extends CI_Model {

	var $nmtbl = 'sis_kelas';
	public function add($data)
	{
		$this->db->insert($this->nmtbl, $data);
		return $this->db->insert_id();
	}

	public function get()
	{	
		$this->db->select('sis_kelas.*, sis_jenjang.nama_jenjang');
		$this->db->from('sis_kelas');
		$this->db->join('sis_jenjang', 'sis_kelas.id_jenjang = sis_jenjang.id_jenjang');
		$this->db->where('sis_kelas.status', 'AKTIF');
		return $this->db->get();
	}		

	public function update($where, $data){
		$this->db->update($this->nmtbl, $data, $where);
		return $this->db->affected_rows();
	}

	public function get_id($id)
	{
		$this->db->select('sis_kelas.*, sis_jenjang.nama_jenjang, sis_jenjang.id_jenjang');
		$this->db->from('sis_kelas');
		$this->db->join('sis_jenjang', 'sis_kelas.id_jenjang = sis_jenjang.id_jenjang');
		$this->db->where('sis_kelas.id_kelas', $id);
		$query = $this->db->get();
		return $query->row();		
	}

	public function delete($id)
	{
		$this->db->where('id_kelas', $id);
		$this->db->update($this->nmtbl, array('status' => 'NONAKTIF'));
	}
}

/* End of file M_Kelas.php */
/* Location: ./application/models/M_Kelas.php */