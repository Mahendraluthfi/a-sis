<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Guru extends CI_Model {

	var $nmtbl = 'sis_guru';
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
		$this->db->where('kode_guru',$id);
		$query = $this->db->get();
		return $query->row();
	}

	public function delete($id)
	{
		$this->db->where('kode_guru', $id);
		$this->db->update($this->nmtbl, array('status' => 'NONAKTIF'));
	}

	public function get_mapel($id)
	{
		$db = $this->db->query("SELECT * FROM sis_mapel where id_mapel not in (select id_mapel from sis_alokasiguru where kode_guru='$id')");
		return $db->result();
	}
	public function get_mapel2($id)
	{
		$this->db->select('sis_alokasiguru.*, sis_mapel.*');
		$this->db->from('sis_alokasiguru');
		$this->db->join('sis_mapel', 'sis_alokasiguru.id_mapel = sis_mapel.id_mapel');
		$this->db->where('sis_alokasiguru.kode_guru', $id);
		$db = $this->db->get();
		return $db->result();
	}

	public function get_guru($id)
	{
		$this->db->select('*');
		$this->db->from('sis_guru');
		$this->db->where('kode_guru', $id);
		$db = $this->db->get();
		return $db->result();
	}

}

/* End of file M_Guru.php */
/* Location: ./application/models/M_Guru.php */