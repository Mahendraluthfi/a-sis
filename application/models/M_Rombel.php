<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Rombel extends CI_Model {

	var $nmtbl = 'sis_rombel';
	public function add($data)
	{
		$this->db->insert($this->nmtbl, $data);
		return $this->db->insert_id();
	}

	public function get_det($id)
	{
		$this->db->select('sis_daftar.*, sis_siswa.*, sis_rombel.*');
		$this->db->from('sis_siswa');
		$this->db->join('sis_daftar', 'sis_siswa.id_daftar = sis_daftar.id_daftar');
		$this->db->join('sis_rombel', 'sis_rombel.id_rombel = sis_siswa.id_rombel');
		$this->db->where('sis_siswa.id_rombel', $id);
		$db = $this->db->get();
		return $db->result();
	}

	public function get()
	{	
		$this->db->select('sis_rombel.*, sis_kelas.nama_kelas, sis_jenjang.nama_jenjang, (SELECT COUNT(*) as jml FROM sis_siswa where id_rombel=sis_rombel.id_rombel) as jml, sis_guru.nama_guru');
		$this->db->from('sis_rombel');
		$this->db->join('sis_kelas', 'sis_rombel.id_kelas = sis_kelas.id_kelas');
		$this->db->join('sis_jenjang', 'sis_kelas.id_jenjang = sis_jenjang.id_jenjang');
		$this->db->join('sis_guru', 'sis_rombel.nip = sis_guru.nip', 'left');
		$this->db->where('sis_rombel.status', 'AKTIF');
		$this->db->order_by('sis_rombel.id_rombel', 'asc');
		return $this->db->get();
	}		

	public function get_wali()
	{		
		$db = $this->db->get('sis_guru');
		return $db;
	}

	public function update($where, $data){
		$this->db->update($this->nmtbl, $data, $where);
		return $this->db->affected_rows();
	}

	public function get_id($id)
	{
		$this->db->select('sis_rombel.*, sis_kelas.nama_kelas, sis_jenjang.nama_jenjang');
		$this->db->from('sis_rombel');
		$this->db->join('sis_kelas', 'sis_rombel.id_kelas = sis_kelas.id_kelas');
		$this->db->join('sis_jenjang', 'sis_kelas.id_jenjang = sis_jenjang.id_jenjang');
		// $this->db->join('sis_guru', 'sis_rombel.kode_guru = sis_guru.kode_guru');
		$this->db->where('id_rombel',$id);
		$query = $this->db->get();
		return $query->row();
	}

	public function delete($id)
	{
		$this->db->where('id_rombel', $id);
		$this->db->update($this->nmtbl, array('status' => 'NONAKTIF'));
	}

	public function where_not($idr)
	{
		$this->db->select('sis_rombel.*, sis_kelas.*');
		$this->db->from('sis_rombel');
		$this->db->join('sis_kelas', 'sis_rombel.id_kelas = sis_kelas.id_kelas');
		$this->db->where_not_in('sis_rombel.id_rombel', $idr);
		$db = $this->db->get();
		return $db;
	}
}

/* End of file M_Rombel.php */
/* Location: ./application/models/M_Rombel.php */