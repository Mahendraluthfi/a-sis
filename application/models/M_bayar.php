<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_bayar extends CI_Model {
	
	public function tahunajaran()
	{
		$db = $this->db->get_where('sis_tahunajaran', array('status' => 'AKTIF'))->result();
		foreach ($db as $key) {
			$id = $key->id_angkatan;
		}
		return $id;
	}

	public function get_siswa($id)
	{
		$this->db->select('sis_daftar.nama, sis_kelas.nama_kelas, sis_rombel.nama_rombel');
		$this->db->from('sis_siswa');
		$this->db->join('sis_daftar', 'sis_siswa.id_daftar = sis_daftar.id_daftar');
		$this->db->join('sis_rombel', 'sis_rombel.id_rombel = sis_siswa.id_rombel');
		$this->db->join('sis_kelas', 'sis_kelas.id_kelas = sis_rombel.id_kelas');
		$this->db->where('sis_siswa.id_siswa', $id);
		$db = $this->db->get();
		return $db;
	}

	public function get_data($id)
	{
		return $this->db->get_where('sis_spp', array('id_transaksi' => $id));
	}

	public function get_siswa2($id)
	{
		return $this->db->query("SELECT sis_siswa.*, sis_daftar.nama
			FROM sis_siswa
			JOIN sis_daftar ON sis_siswa.id_daftar=sis_daftar.id_daftar
			WHERE sis_siswa.id_rombel = '$id'");		
	}

	public function history()
	{
		$this->db->select('sis_spp.*, sis_daftar.nama, sis_rombel.nama_rombel');		
		$this->db->from('sis_spp');
		$this->db->join('sis_siswa', 'sis_siswa.id_siswa = sis_spp.id_siswa');
		$this->db->join('sis_daftar', 'sis_siswa.id_daftar = sis_daftar.id_daftar');
		$this->db->join('sis_rombel', 'sis_rombel.id_rombel = sis_siswa.id_rombel');		
		$this->db->order_by('sis_spp.id', 'desc');
		$db = $this->db->get();
		return $db;
	}

	public function history_id($id)
	{
		$this->db->select('sis_spp.*, sis_daftar.nama, sis_rombel.nama_rombel');		
		$this->db->from('sis_spp');
		$this->db->join('sis_siswa', 'sis_siswa.id_siswa = sis_spp.id_siswa');
		$this->db->join('sis_daftar', 'sis_siswa.id_daftar = sis_daftar.id_daftar');
		$this->db->join('sis_rombel', 'sis_rombel.id_rombel = sis_siswa.id_rombel');		
		$this->db->where('sis_spp.id_siswa', $id);
		$this->db->order_by('sis_spp.id', 'desc');
		$db = $this->db->get();
		return $db;	
	}

	public function get_pilihanbayar($id)
	{
		$this->db->select('sis_pilihanbayar.*, sis_jenisbayar.kode_jenis, sis_jenisbayar.tipe_jenis, sis_kelas.nama_kelas');
		$this->db->from('sis_pilihanbayar');
		$this->db->join('sis_jenisbayar', 'sis_pilihanbayar.id_jenis = sis_jenisbayar.id');
		$this->db->join('sis_kelas', 'sis_pilihanbayar.id_kelas = sis_kelas.id_kelas');
		$this->db->where('sis_pilihanbayar.status', '1');
		$this->db->where('sis_pilihanbayar.id_ta', $id);
		$db = $this->db->get();
		return $db;		
	}

	public function get_recent_tabungan($id)
	{
		$this->db->select('sis_tabungandetail.*, sis_daftar.nama');
		$this->db->from('sis_tabungandetail');
		$this->db->join('sis_siswa', 'sis_tabungandetail.id_siswa = sis_siswa.id_siswa');
		$this->db->join('sis_daftar', 'sis_siswa.id_daftar = sis_daftar.id_daftar');
		$this->db->where('sis_tabungandetail.id_ta', $id);
		$this->db->order_by('sis_tabungandetail.id', 'desc');
		$this->db->limit(10);
		$db = $this->db->get();
		return $db;
	}

	public function get_det_siswa($id)
	{
		$this->db->select('sis_siswa.*, sis_rombel.nama_rombel, sis_daftar.nama');
		$this->db->from('sis_siswa');
		$this->db->join('sis_daftar', 'sis_daftar.id_daftar = sis_siswa.id_daftar');
		$this->db->join('sis_rombel', 'sis_rombel.id_rombel = sis_siswa.id_rombel');
		$this->db->where('sis_siswa.id_siswa', $id);
		$db = $this->db->get();
		return $db;	
	}

	public function get_history_siswa($id,$ta)
	{
		return $this->db->query("SELECT * FROM `sis_tabungandetail` WHERE id_siswa='$id' and id_ta='$ta' ORDER BY `sis_tabungandetail`.`id`  DESC");
	}

	public function get_queue($id,$ta)
	{
		return $this->db->query("SELECT * FROM `sis_tabungandetail` WHERE id_siswa='$id' and id_ta='$ta' and cek_p = '0'");	
	}

	public function get_config($id)
	{
		$this->db->select('sis_jenisbayar.tipe_jenis, sis_pilihanbayar.*');
		$this->db->from('sis_pilihanbayar');
		$this->db->join('sis_jenisbayar', 'sis_jenisbayar.id = sis_pilihanbayar.id_jenis');
		$this->db->where('sis_pilihanbayar.id', $id);
		$db = $this->db->get();
		return $db;
	}

	public function config_list_siswa($id)
	{
		$this->db->select('sis_siswa.*, sis_daftar.nama');
		$this->db->from('sis_siswa');
		$this->db->join('sis_daftar', 'sis_siswa.id_daftar = sis_daftar.id_daftar');
		$this->db->join('sis_rombel', 'sis_rombel.id_rombel = sis_siswa.id_rombel');
		$this->db->join('sis_kelas', 'sis_rombel.id_kelas = sis_kelas.id_kelas');
		$this->db->where('sis_kelas.id_kelas', $id);
		$db = $this->db->get();
		return $db;
	}

	public function get_row_bayar($id,$jns)
	{
		if ($jns > 1) {
			$this->db->select('sis_daftar.nama, sis_pmb_rutin.*, sis_rombel.nama_rombel');
			$this->db->from('sis_pmb_rutin');
			$this->db->join('sis_siswa', 'sis_pmb_rutin.id_siswa = sis_siswa.id_siswa');
			$this->db->join('sis_daftar', 'sis_daftar.id_daftar = sis_siswa.id_daftar');
			$this->db->join('sis_rombel', 'sis_rombel.id_rombel = sis_siswa.id_rombel');
			$this->db->where('sis_pmb_rutin.id_jenis', $id);
			$db = $this->db->get();
			return $db->result();			
		}else{
			$this->db->select('sis_daftar.nama, sis_pmb_angsur.*, sis_rombel.nama_rombel');
			$this->db->from('sis_pmb_angsur');
			$this->db->join('sis_siswa', 'sis_pmb_angsur.id_siswa = sis_siswa.id_siswa');
			$this->db->join('sis_daftar', 'sis_daftar.id_daftar = sis_siswa.id_daftar');
			$this->db->join('sis_rombel', 'sis_rombel.id_rombel = sis_siswa.id_rombel');
			$this->db->where('sis_pmb_angsur.id_jenis', $id);
			$db = $this->db->get();
			return $db->result();			
		}
	}

	public function get_row_bayar2($id)
	{
		$this->db->select('sis_daftar.nama, sis_pmb_rutin.*, sis_rombel.nama_rombel, sis_pilihanbayar.nama_pilihan, sis_pilihanbayar.id_jenis');
		$this->db->from('sis_pmb_rutin');
		$this->db->join('sis_siswa', 'sis_pmb_rutin.id_siswa = sis_siswa.id_siswa');
		$this->db->join('sis_daftar', 'sis_daftar.id_daftar = sis_siswa.id_daftar');
		$this->db->join('sis_rombel', 'sis_rombel.id_rombel = sis_siswa.id_rombel');
		$this->db->join('sis_pilihanbayar', 'sis_pilihanbayar.id = sis_pmb_rutin.id_jenis');		
		$this->db->where('sis_pmb_rutin.id', $id);
		$db = $this->db->get();
		return $db;
	}

	public function get_row_bayar3($id)
	{
		$this->db->select('sis_daftar.nama, sis_pmb_angsur.*, sis_rombel.nama_rombel, sis_pilihanbayar.nama_pilihan, sis_pilihanbayar.id_jenis');
		$this->db->from('sis_pmb_angsur');
		$this->db->join('sis_siswa', 'sis_pmb_angsur.id_siswa = sis_siswa.id_siswa');
		$this->db->join('sis_daftar', 'sis_daftar.id_daftar = sis_siswa.id_daftar');
		$this->db->join('sis_rombel', 'sis_rombel.id_rombel = sis_siswa.id_rombel');
		$this->db->join('sis_pilihanbayar', 'sis_pilihanbayar.id = sis_pmb_angsur.id_jenis');
		$this->db->where('sis_pmb_angsur.id', $id);
		$db = $this->db->get();
		return $db;
	}

	public function get_history_bayar($ids,$idta)
	{
		$this->db->select('sis_pembayaran.*, sis_jenisbayar.kode_jenis');
		$this->db->from('sis_pembayaran');
		$this->db->join('sis_jenisbayar', 'sis_pembayaran.id_jenis = sis_jenisbayar.id');
		$this->db->where(array('sis_pembayaran.id_siswa' => $ids, 'sis_pembayaran.id_ta' => $idta));
		$this->db->order_by('sis_pembayaran.id', 'desc');
		$db = $this->db->get();
		return $db;
	}

	public function get_angsur($id)
	{
		$this->db->select('sis_detail_angsur.*, sis_pembayaran.date');
		$this->db->from('sis_detail_angsur');
		$this->db->join('sis_pembayaran', 'sis_pembayaran.id_tf = sis_detail_angsur.id_tf');
		$this->db->where('sis_detail_angsur.id_angsur', $id);
		$this->db->order_by('sis_detail_angsur.id', 'desc');		
		$db = $this->db->get();
		return $db;
	}

	public function edit($id,$tipe)
	{
		if ($tipe > 1) {
			$this->db->select('sis_daftar.nama, sis_pmb_rutin.*');
			$this->db->from('sis_pmb_rutin');
			$this->db->join('sis_siswa', 'sis_pmb_rutin.id_siswa = sis_siswa.id_siswa');
			$this->db->join('sis_daftar', 'sis_siswa.id_daftar = sis_daftar.id_daftar');
			$this->db->where('sis_pmb_rutin.id', $id);
			$db = $this->db->get();
			return $db;
		}else{
			$this->db->select('sis_daftar.nama, sis_pmb_angsur.*');
			$this->db->from('sis_pmb_angsur');
			$this->db->join('sis_siswa', 'sis_pmb_angsur.id_siswa = sis_siswa.id_siswa');
			$this->db->join('sis_daftar', 'sis_siswa.id_daftar = sis_daftar.id_daftar');
			$this->db->where('sis_pmb_angsur.id', $id);
			$db = $this->db->get();
			return $db;
		}
	}

	public function getsw($id)
	{
		$this->db->select('sis_daftar.nama, sis_rombel.nama_rombel');
		$this->db->from('sis_siswa');
		$this->db->join('sis_daftar', 'sis_daftar.id_daftar = sis_siswa.id_daftar');
		$this->db->join('sis_rombel', 'sis_rombel.id_rombel = sis_siswa.id_rombel');
		$this->db->where('sis_siswa.id_siswa', $id);
		$db = $this->db->get();
		return $db;
	}
}

/* End of file M_bayar.php */
/* Location: ./application/models/M_bayar.php */