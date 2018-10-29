<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Mutasi extends CI_Model {

	public function lulus()
	{
		$this->db->select('sis_daftar.*, sis_lulus.*, sis_rombel.*, sis_lulus.tgl_lulus as last');
		$this->db->from('sis_lulus');
		$this->db->join('sis_daftar', 'sis_daftar.id_daftar = sis_lulus.id_daftar');
		$this->db->join('sis_rombel', 'sis_rombel.id_rombel = sis_lulus.id_rombel');
		$this->db->order_by('sis_lulus.id_daftar', 'desc');
		return $this->db->get();
	}

	public function pindah()
	{
		$this->db->select('sis_daftar.*, sis_pindah.*, sis_rombel.*, sis_pindah.nm_sekolah as last');
		$this->db->from('sis_pindah');
		$this->db->join('sis_daftar', 'sis_daftar.id_daftar = sis_pindah.id_daftar');
		$this->db->join('sis_rombel', 'sis_rombel.id_rombel = sis_pindah.id_rombel');		
		$this->db->order_by('sis_pindah.id_daftar', 'desc');
		return $this->db->get();
	}

}

/* End of file M_Mutasi.php */
/* Location: ./application/models/M_Mutasi.php */