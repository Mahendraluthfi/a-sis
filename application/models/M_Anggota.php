<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Anggota extends CI_Model {

	public function get()
	{
		$this->db->select('sis_anggota.*, sis_daftar.nama, sis_siswa.nis, sis_rombel.nama_rombel, sis_kelas.nama_kelas');
		$this->db->from('sis_anggota');
		$this->db->join('sis_siswa', 'sis_siswa.id_siswa = sis_anggota.id_siswa');
		$this->db->join('sis_daftar', 'sis_siswa.id_daftar = sis_daftar.id_daftar');
		$this->db->join('sis_rombel', 'sis_siswa.id_rombel = sis_rombel.id_rombel');
		$this->db->join('sis_kelas', 'sis_kelas.id_kelas = sis_rombel.id_kelas');
		$this->db->where('sis_anggota.status', '1');
		return $this->db->get();
	}

	public function get_rombel($id)
	{
		return $this->db->get_where('sis_rombel',array('id_kelas' => $id, 'status' => 'AKTIF'));		
	}

	public function get_kelas()
	{
		return $this->db->get_where('sis_kelas', array('status' => 'AKTIF'));
	}

	public function get_siswa($id)
	{
		return $this->db->query("SELECT sis_siswa.*, sis_daftar.nama
			FROM sis_siswa
			JOIN sis_daftar ON sis_siswa.id_daftar=sis_daftar.id_daftar
			WHERE sis_siswa.id_rombel = '$id'
			AND NOT sis_siswa.id_siswa IN (SELECT id_siswa FROM sis_anggota)");		
	}
	

	public function get_id($id)
	{
		$this->db->select('sis_anggota.*, sis_daftar.nama, sis_siswa.nis, sis_rombel.nama_rombel, sis_kelas.nama_kelas');
		$this->db->from('sis_anggota');
		$this->db->join('sis_siswa', 'sis_siswa.id_siswa = sis_anggota.id_siswa');
		$this->db->join('sis_daftar', 'sis_siswa.id_daftar = sis_daftar.id_daftar');
		$this->db->join('sis_rombel', 'sis_siswa.id_rombel = sis_rombel.id_rombel');
		$this->db->join('sis_kelas', 'sis_kelas.id_kelas = sis_rombel.id_kelas');
		$this->db->where('sis_anggota.status', '1');
		$this->db->where('sis_anggota.id_anggota', $id);		
		return $this->db->get();
	}

	public function get_id2($id)
	{
		return $this->db->get_where('sis_peminjaman',array('id_anggota' => $id, 'status' => 'PROSES'));
	}
	
}

/* End of file M_Anggota.php */
/* Location: ./application/models/M_Anggota.php */