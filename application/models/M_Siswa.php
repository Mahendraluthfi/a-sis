<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Siswa extends CI_Model {

	public function show($id)
	{
		$this->db->select('sis_siswa.*, sis_daftar.*, sis_rombel.nama_rombel');
		$this->db->from('sis_siswa');
		$this->db->join('sis_daftar', 'sis_siswa.id_daftar = sis_daftar.id_daftar');
		$this->db->join('sis_rombel', 'sis_siswa.id_rombel = sis_rombel.id_rombel');
		$this->db->where('sis_siswa.id_rombel', $id);
		$db = $this->db->get();
		return $db->result();
	}

	public function show_edit($id)
	{
		$this->db->select('sis_siswa.*, sis_daftar.*, sis_rombel.nama_rombel');
		$this->db->from('sis_siswa');
		$this->db->join('sis_daftar', 'sis_siswa.id_daftar = sis_daftar.id_daftar');
		$this->db->join('sis_rombel', 'sis_siswa.id_rombel = sis_rombel.id_rombel');
		$this->db->where('sis_siswa.id_siswa', $id);
		$db = $this->db->get();
		return $db->result();	
	}

	public function g_rombel($id)
	{
		$this->db->select('sis_rombel.id_rombel, sis_rombel.nama_rombel, sis_kelas.nama_kelas');
		$this->db->from('sis_rombel');
		$this->db->join('sis_kelas', 'sis_rombel.id_kelas=sis_kelas.id_kelas');
		$this->db->join('sis_jenjang', 'sis_kelas.id_jenjang=sis_jenjang.id_jenjang');
		$this->db->where('sis_jenjang.id_jenjang', $id);
		$db = $this->db->get();
		return $db->result();
	}

	public function editsimpan($id,$isi2)
	{
		$this->db->where('id_daftar', $id);
		$this->db->update('sis_siswa', $isi2);
	}
}

/* End of file M_Siswa.php */
/* Location: ./application/models/M_Siswa.php */