<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Daftar extends CI_Model {

	public function simpansiswa($isi)
	{
		$this->db->insert('sis_daftar', $isi);
	}
	
	public function show()
	{
		$id = $this->uri->segment(3);
		if (empty($this->uri->segment(3))) {
			$this->db->select('sis_daftar.*, sis_tahunajaran.kd_angkatan, sis_jenjang.kd_jenjang, sis_jenjang.nama_jenjang');
			$this->db->from('sis_daftar');
			$this->db->join('sis_tahunajaran', 'sis_daftar.id_angkatan = sis_tahunajaran.id_angkatan');
			$this->db->join('sis_jenjang', 'sis_daftar.id_jenjang = sis_jenjang.id_jenjang');
			$this->db->where('sis_daftar.diterima', 'N');			
			$db = $this->db->get();
			return $db->result();			
		}else{
			$this->db->select('sis_daftar.*, sis_tahunajaran.kd_angkatan, sis_jenjang.kd_jenjang, sis_jenjang.nama_jenjang');
			$this->db->from('sis_daftar');
			$this->db->join('sis_tahunajaran', 'sis_daftar.id_angkatan = sis_tahunajaran.id_angkatan');
			$this->db->join('sis_jenjang', 'sis_daftar.id_jenjang = sis_jenjang.id_jenjang');
			$this->db->where('sis_daftar.id_jenjang', $id);
			$this->db->where('sis_daftar.diterima', 'N');						
			$db = $this->db->get();
			return $db->result();
		}
	}

	public function show_id($id)
	{
		$this->db->select('sis_daftar.*, sis_tahunajaran.kd_angkatan, sis_jenjang.kd_jenjang, sis_jenjang.nama_jenjang');
		$this->db->from('sis_daftar');
		$this->db->join('sis_tahunajaran', 'sis_daftar.id_angkatan = sis_tahunajaran.id_angkatan');
		$this->db->join('sis_jenjang', 'sis_daftar.id_jenjang = sis_jenjang.id_jenjang');
		$this->db->where('sis_daftar.id_daftar', $id);
		$db = $this->db->get();
		return $db->result();
	}

	public function editsimpan($id, $isi)
	{
		$this->db->where('id_daftar', $id);
		$this->db->update('sis_daftar', $isi);
	}
}

/* End of file M_Daftar.php */
/* Location: ./application/models/M_Daftar.php */