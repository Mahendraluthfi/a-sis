<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Nilai extends CI_Model {

	public function get_alokasi($id)
	{
		$this->db->select('sis_alokasiguru.*, sis_mapel.nama_mapel');
		$this->db->from('sis_alokasiguru');
		$this->db->join('sis_mapel', 'sis_alokasiguru.id_mapel = sis_mapel.id_mapel');
		$this->db->join('sis_guru', 'sis_alokasiguru.kode_guru = sis_guru.kode_guru');
		$this->db->where('sis_guru.nip', $id);
		$db = $this->db->get();
		return $db;
	}

	public function get_rombel($id)
	{
		$this->db->select('sis_alokasimapel.*, sis_rombel.nama_rombel, sis_rombel.id_rombel');
		$this->db->from('sis_alokasimapel');
		$this->db->join('sis_kelas', 'sis_alokasimapel.id_kelas = sis_kelas.id_kelas');
		$this->db->join('sis_rombel', 'sis_kelas.id_kelas = sis_rombel.id_kelas');
		$this->db->where('sis_alokasimapel.id_mapel', $id);
		$db = $this->db->get();
		return $db->result();
	}

	public function mapel($id)
	{
		return $this->db->get_where('sis_mapel', array('id_mapel' => $id));
	}

	public function rombel($id)
	{
		return $this->db->get_where('sis_rombel', array('id_rombel' => $id));
	}	

	public function entrynew($idr)
	{	
		$this->db->select('sis_daftar.nama, sis_siswa.*');
		$this->db->from('sis_siswa');
		$this->db->join('sis_daftar', 'sis_daftar.id_daftar = sis_siswa.id_daftar');
		$this->db->join('sis_rombel', 'sis_rombel.id_rombel = sis_siswa.id_rombel');
		$this->db->where('sis_siswa.id_rombel', $idr);
		$db = $this->db->get();
		return $db;		
	}

	public function entry_empty($ids)
	{
		$this->db->select('sis_siswa.*, sis_daftar.nama');
		$this->db->from('sis_siswa');
		$this->db->join('sis_daftar', 'sis_siswa.id_daftar = sis_daftar.id_daftar');
		$this->db->where('sis_siswa.id_siswa', $ids);
		$db = $this->db->get();
		return $db->row();
	}

	public function entrywhere ($ids,$idm,$idr,$smt)
	{
		$this->db->select('sis_nilai.*, sis_daftar.nama, sis_siswa.nis');
		$this->db->from('sis_nilai');
		$this->db->join('sis_siswa', 'sis_nilai.id_siswa = sis_siswa.id_siswa');
		$this->db->join('sis_daftar', 'sis_siswa.id_daftar = sis_daftar.id_daftar');
		$this->db->where('sis_nilai.id_siswa', $ids);
		$this->db->where('sis_nilai.id_rombel', $idr);
		$this->db->where('sis_nilai.id_mapel', $idm);
		$this->db->where('sis_nilai.semester', $smt);
		$db = $this->db->get();
		return $db->row();		
	}

	public function get_siswa($idr,$idm,$smt,$ta)
	{
		$this->db->select('sis_daftar.nama, sis_siswa.*, sis_nilai.*');
		$this->db->from('sis_siswa');
		$this->db->join('sis_daftar', 'sis_daftar.id_daftar = sis_siswa.id_daftar');
		$this->db->join('sis_nilai', 'sis_siswa.id_siswa = sis_nilai.id_siswa');
		$this->db->where('sis_nilai.id_rombel', $idr);
		$this->db->where('sis_nilai.id_mapel', $idm);
		$this->db->where('sis_nilai.semester', $smt);
		$this->db->where('sis_nilai.id_angkatan', $ta);
		$db = $this->db->get();
		return $db;
	}

	public function print_n($id)
	{
		$this->db->select('sis_siswa.nis, sis_daftar.nama, sis_rombel.nama_rombel, sis_mapel.nama_mapel, sis_nilai.*');
		$this->db->from('sis_nilai');
		$this->db->join('sis_siswa', 'sis_siswa.id_siswa = sis_nilai.id_siswa');
		$this->db->join('sis_daftar', 'sis_siswa.id_daftar = sis_daftar.id_daftar');
		$this->db->join('sis_rombel', 'sis_rombel.id_rombel = sis_nilai.id_rombel');
		$this->db->join('sis_mapel', 'sis_mapel.id_mapel = sis_nilai.id_mapel');
		$this->db->where('sis_nilai.id', $id);
		$db = $this->db->get();
		return $db->result();
	}

	public function cek_wali()
	{
		$ses_id = $this->session->userdata('id');
		$db = $this->db->get_where('sis_rombel', array('nip' => $ses_id));
		return $db; 
	}

	public function get_rombel_raport()
	{
		$this->db->select('sis_rombel.*, sis_kelas.nama_kelas, (SELECT COUNT(*) as jml FROM sis_siswa where id_rombel=sis_rombel.id_rombel) as jml');
		$this->db->from('sis_rombel');
		$this->db->join('sis_kelas', 'sis_kelas.id_kelas = sis_rombel.id_kelas');
		$this->db->where('sis_rombel.nip', $this->session->userdata('id'));
		$db = $this->db->get();
		return $db; 
	}

	public function nps($ids, $idr, $smt)
	{
		$this->db->select('sis_mapel.nama_mapel, sis_nilai.nar');
		$this->db->from('sis_nilai');
		$this->db->join('sis_mapel', 'sis_nilai.id_mapel = sis_mapel.id_mapel');
		$this->db->where('sis_nilai.id_siswa', $ids);
		$this->db->where('sis_nilai.id_rombel', $idr);
		$this->db->where('sis_nilai.semester', $smt);
		$db = $this->db->get();
		return $db;
	}

	public function get_n($ids)
	{
		$this->db->select('sis_daftar.nama');
		$this->db->from('sis_siswa');
		$this->db->join('sis_daftar', 'sis_daftar.id_daftar = sis_siswa.id_daftar');
		$this->db->where('sis_siswa.id_siswa', $ids);
		$db = $this->db->get();
		return $db;	
	}

	public function get_r($idr)
	{
		return $this->db->get_where('sis_rombel', array('id_rombel' => $idr));
	}
}

/* End of file M_Nilai.php */
/* Location: ./application/models/M_Nilai.php */