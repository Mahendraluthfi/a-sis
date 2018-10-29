<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Mapel extends CI_Model {

	var $nmtbl = 'sis_mapel';
	public function add($data)
	{
		$this->db->insert($this->nmtbl, $data);
		return $this->db->insert_id();
	}

	public function get()
	{	
		$this->db->select('sis_mapel.*, sis_jenismapel.id_jenismapel, sis_jenismapel.nama_jenismapel');
		$this->db->from('sis_mapel');
		$this->db->join('sis_jenismapel', 'sis_mapel.id_jenismapel = sis_jenismapel.id_jenismapel');
		$this->db->where('sis_mapel.status', 'AKTIF');
		return $this->db->get();
	}		

	public function update($where, $data){
		$this->db->update($this->nmtbl, $data, $where);
		return $this->db->affected_rows();
	}

	public function get_id($id)
	{
		$this->db->select('sis_mapel.*, sis_jenismapel.id_jenismapel, sis_jenismapel.nama_jenismapel');
		$this->db->from('sis_mapel');
		$this->db->join('sis_jenismapel', 'sis_mapel.id_jenismapel = sis_jenismapel.id_jenismapel');
		$this->db->where('sis_mapel.id_mapel', $id);
		$query = $this->db->get();
		return $query->row();		
	}

	public function delete($id)
	{
		$this->db->where('id_mapel', $id);
		$this->db->update($this->nmtbl, array('status' => 'NONAKTIF'));
	}

	public function get_kelas($id)
	{
		$db = $this->db->query("SELECT * FROM sis_kelas where id_kelas not in (select id_kelas from sis_alokasimapel where id_mapel='$id')");
		return $db->result();
	}
	public function get_kelas2($id)
	{
		$this->db->select('sis_alokasimapel.*, sis_kelas.*');
		$this->db->from('sis_alokasimapel');
		$this->db->join('sis_kelas', 'sis_alokasimapel.id_kelas = sis_kelas.id_kelas');
		$this->db->where('sis_alokasimapel.id_mapel', $id);
		$db = $this->db->get();
		return $db->result();
	}

	public function get_mapel($id)
	{
		$this->db->select('*');
		$this->db->from('sis_mapel');
		$this->db->where('id_mapel', $id);
		$db = $this->db->get();
		return $db->result();
	}
}

/* End of file M_Mapel.php */
/* Location: ./application/models/M_Mapel.php */