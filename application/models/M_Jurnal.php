<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Jurnal extends CI_Model {

	public function showj($id)
	{
		$this->db->select('sis_transaksi.id, sis_transaksi.waktu, sis_transaksi.uraian, sis_transaksi.pencatat, sis_akun.nama_akun, sis_jurnal.debet, sis_jurnal.kredit');
		$this->db->from('sis_jurnal');
		$this->db->join('sis_akun', 'sis_jurnal.akun = sis_akun.id_akun');
		$this->db->join('sis_transaksi', 'sis_jurnal.id_transaksi = sis_transaksi.id');		
		$this->db->join('sis_rencana_anggaran', 'sis_transaksi.idr = sis_rencana_anggaran.id');
		$this->db->where('sis_rencana_anggaran.id', $id);
		$db = $this->db->get();
		return $db->result();	
	}

}

/* End of file M_Jurnal.php */
/* Location: ./application/models/M_Jurnal.php */