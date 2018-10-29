<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_lapbayar extends CI_Model {

	public function get_pembayaran($ta,$tb,$idk,$idta,$jenis)
	{
		if ($jenis == 0) {
			$this->db->select('sis_pembayaran.*, sis_daftar.nama, sis_jenisbayar.kode_jenis');
			$this->db->from('sis_pembayaran');
			$this->db->join('sis_siswa', 'sis_siswa.id_siswa = sis_pembayaran.id_siswa');
			$this->db->join('sis_daftar', 'sis_daftar.id_daftar = sis_siswa.id_daftar');			
			$this->db->join('sis_rombel', 'sis_rombel.id_rombel = sis_siswa.id_rombel');			
			$this->db->join('sis_jenisbayar', 'sis_jenisbayar.id = sis_pembayaran.id_jenis');			
			$this->db->where('sis_rombel.id_rombel', $idk);
			$this->db->where('sis_pembayaran.date >', $ta);
			$this->db->where('sis_pembayaran.date <', $tb);
			$this->db->where('sis_pembayaran.id_ta', $idta);
			$db = $this->db->get();
			return $db;			
		}else{
			$this->db->select('sis_pembayaran.*, sis_daftar.nama, sis_jenisbayar.kode_jenis');
			$this->db->from('sis_pembayaran');
			$this->db->join('sis_siswa', 'sis_siswa.id_siswa = sis_pembayaran.id_siswa');
			$this->db->join('sis_daftar', 'sis_daftar.id_daftar = sis_siswa.id_daftar');			
			$this->db->join('sis_rombel', 'sis_rombel.id_rombel = sis_siswa.id_rombel');			
			$this->db->join('sis_jenisbayar', 'sis_jenisbayar.id = sis_pembayaran.id_jenis');			
			$this->db->where('sis_rombel.id_rombel', $idk);
			$this->db->where('sis_pembayaran.date >', $ta);
			$this->db->where('sis_pembayaran.date <', $tb);
			$this->db->where('sis_pembayaran.id_ta', $idta);
			$this->db->where('sis_pembayaran.id_jenis', $jenis);
			$db = $this->db->get();
			return $db;			
		}
	}	

	public function get_tabungan($ta,$tb,$idk,$idta)
	{
			$this->db->select('sis_tabungandetail.*, sis_daftar.nama');
			$this->db->from('sis_tabungandetail');
			$this->db->join('sis_siswa', 'sis_siswa.id_siswa = sis_tabungandetail.id_siswa');
			$this->db->join('sis_daftar', 'sis_daftar.id_daftar = sis_siswa.id_daftar');			
			$this->db->join('sis_rombel', 'sis_rombel.id_rombel = sis_siswa.id_rombel');			
			$this->db->where('sis_rombel.id_rombel', $idk);
			$this->db->where('sis_tabungandetail.date >', $ta);
			$this->db->where('sis_tabungandetail.date <', $tb);
			$this->db->where('sis_tabungandetail.id_ta', $idta);
			$db = $this->db->get();
			return $db;
	}	

	public function get_saldo($idk)
	{
		$this->db->select('sis_siswa.*, sis_daftar.nama');
		$this->db->from('sis_siswa');
		$this->db->join('sis_daftar', 'sis_daftar.id_daftar = sis_siswa.id_daftar');			
		$this->db->where('sis_siswa.id_rombel', $idk);
		$db = $this->db->get();
		return $db;
	}

}

/* End of file M_lapbayar.php */
/* Location: ./application/models/M_lapbayar.php */