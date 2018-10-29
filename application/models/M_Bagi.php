<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Bagi extends CI_Model {

	public function show_n()
	{
		$this->db->select('sis_daftar.*, sis_tahunajaran.kd_angkatan, sis_jenjang.kd_jenjang');
		$this->db->from('sis_daftar');
		$this->db->join('sis_tahunajaran', 'sis_daftar.id_angkatan = sis_tahunajaran.id_angkatan');
		$this->db->join('sis_jenjang', 'sis_daftar.id_jenjang = sis_jenjang.id_jenjang');
		$this->db->where('sis_daftar.diterima', 'N');
		$db = $this->db->get();
		return $db->result();
	}	

	public function show_y()
	{
		$this->db->select('sis_daftar.*, sis_tahunajaran.kd_angkatan, sis_jenjang.kd_jenjang');
		$this->db->from('sis_daftar');
		$this->db->join('sis_tahunajaran', 'sis_daftar.id_angkatan = sis_tahunajaran.id_angkatan');
		$this->db->join('sis_jenjang', 'sis_daftar.id_jenjang = sis_jenjang.id_jenjang');
		$this->db->where('sis_daftar.diterima', 'Y');
		$db = $this->db->get();
		return $db->result();
	}	

	public function show_id($id)
	{
		$this->db->select('sis_daftar.*, sis_tahunajaran.kd_angkatan, sis_jenjang.kd_jenjang, sis_jenjang.nama_jenjang');
		$this->db->from('sis_daftar');
		$this->db->join('sis_tahunajaran', 'sis_daftar.id_angkatan = sis_tahunajaran.id_angkatan');
		$this->db->join('sis_jenjang', 'sis_daftar.id_jenjang = sis_jenjang.id_jenjang');
		$this->db->where('sis_daftar.id_daftar', $id);
		$db = $this->db->get();
		return $db->row();
	}

	public function get_j($id)
	{
		$this->db->select('sis_daftar.*, sis_tahunajaran.kd_angkatan, sis_jenjang.kd_jenjang');
		$this->db->from('sis_daftar');
		$this->db->join('sis_tahunajaran', 'sis_daftar.id_angkatan = sis_tahunajaran.id_angkatan');
		$this->db->join('sis_jenjang', 'sis_daftar.id_jenjang = sis_jenjang.id_jenjang');
		$this->db->where('sis_daftar.id_jenjang', $id);
		$this->db->where('sis_daftar.diterima', 'Y');
		$db = $this->db->get();
		return $db->result();
	}

	public function get_kuota($id)
	{
		$db = $this->db->query("SELECT *, (SELECT COUNT(*) as jml FROM sis_siswa where id_rombel=sis_rombel.id_rombel) as jml from sis_rombel where id_rombel='$id'");
		return $db->result();
	}


}

/* End of file M_Bagi.php */
/* Location: ./application/models/M_Bagi.php */