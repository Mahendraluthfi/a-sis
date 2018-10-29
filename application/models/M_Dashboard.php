<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Dashboard extends CI_Model {

	public function get_main()
	{
        $sid = $this->session->userdata('id');		
		$this->db->select('sis_privilage.*, sis_modul.*');
		$this->db->from('sis_privilage');
		$this->db->join('sis_modul', 'sis_privilage.id_modul = sis_modul.id_modul');
		$this->db->where('sis_privilage.id_akses', $sid);
		$this->db->where('sis_modul.ktg', '0');
		return $this->db->get();
	}

	public function get_sub($id)
	{
		return $this->db->get_where('sis_modul', array('ktg' => $id));
	}

	public function jsiswa()
	{
		$this->db->select('sis_siswa.*');
		$this->db->from('sis_siswa');
		$this->db->join('sis_daftar', 'sis_daftar.id_daftar = sis_siswa.id_daftar');
		$this->db->join('sis_tahunajaran', 'sis_daftar.id_angkatan = sis_tahunajaran.id_angkatan');
		$this->db->where('sis_tahunajaran.aktif', '1');
		return $this->db->get();
	}

	public function jcsiswa()
	{
		$this->db->from('sis_daftar');
		$this->db->join('sis_tahunajaran', 'sis_daftar.id_angkatan = sis_tahunajaran.id_angkatan');
		$this->db->where('sis_daftar.diterima', 'N');
		return $this->db->get();
	}

	public function peminjaman()
	{
		$date = date('Y-m-d');
		$this->db->from('sis_peminjaman');
		$this->db->where('tanggal_pinjam', $date);
		return $this->db->get();
	}

	public function chart()
	{
		$year = date('Y');
		$this->db->select('COUNT(IF( MONTH(tanggal_pinjam) = 1, no_peminjaman, NULL)) AS januari, 
	       COUNT(IF( MONTH(tanggal_pinjam) = 2, no_peminjaman, NULL)) AS februari, 
	       COUNT(IF( MONTH(tanggal_pinjam) = 3, no_peminjaman, NULL)) AS maret, 
	       COUNT(IF( MONTH(tanggal_pinjam) = 4, no_peminjaman, NULL)) AS april, 
	       COUNT(IF( MONTH(tanggal_pinjam) = 5, no_peminjaman, NULL)) AS mei, 
	       COUNT(IF( MONTH(tanggal_pinjam) = 6, no_peminjaman, NULL)) AS juni, 
	       COUNT(IF( MONTH(tanggal_pinjam) = 7, no_peminjaman, NULL)) AS juli, 
	       COUNT(IF( MONTH(tanggal_pinjam) = 8, no_peminjaman, NULL)) AS agustus, 
	       COUNT(IF( MONTH(tanggal_pinjam) = 9, no_peminjaman, NULL)) AS september, 
	       COUNT(IF( MONTH(tanggal_pinjam) = 10, no_peminjaman, NULL)) AS oktober, 
	       COUNT(IF( MONTH(tanggal_pinjam) = 11, no_peminjaman, NULL)) AS november, 
	       COUNT(IF( MONTH(tanggal_pinjam) = 12, no_peminjaman, NULL)) AS desember');
		$this->db->from('sis_peminjaman');
		$this->db->where('YEAR(tanggal_pinjam)', $year);
		return $this->db->get();
	}
}

/* End of file M_Dashboard.php */
/* Location: ./application/models/M_Dashboard.php */