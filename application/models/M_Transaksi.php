<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Transaksi extends CI_Model {

	public function get()
	{		
		$this->db->select('sis_peminjaman.*, sis_daftar.nama, sis_rombel.nama_rombel');
		$this->db->from('sis_peminjaman');
		$this->db->join('sis_anggota', 'sis_anggota.id_anggota = sis_peminjaman.id_anggota');
		$this->db->join('sis_siswa', 'sis_anggota.id_siswa = sis_siswa.id_siswa');
		$this->db->join('sis_daftar', 'sis_siswa.id_daftar = sis_daftar.id_daftar');
		$this->db->join('sis_rombel', 'sis_siswa.id_rombel = sis_rombel.id_rombel');
		$db = $this->db->get();
		return $db;
	}

	public function get_siswa()
	{
		$this->db->select('sis_siswa.id_siswa, sis_daftar.nama, sis_rombel.nama_rombel');
		$this->db->from('sis_siswa');
		$this->db->join('sis_daftar', 'sis_siswa.id_daftar=sis_daftar.id_daftar');
		$this->db->join('sis_rombel', 'sis_siswa.id_rombel=sis_rombel.id_rombel');
		$db = $this->db->get();
		return $db;
	}

	public function get_s($ids)
	{	
		$this->db->select('sis_siswa.id_siswa, sis_daftar.nama, sis_rombel.nama_rombel');
		$this->db->from('sis_siswa');
		$this->db->join('sis_daftar', 'sis_siswa.id_daftar=sis_daftar.id_daftar');
		$this->db->join('sis_rombel', 'sis_siswa.id_rombel=sis_rombel.id_rombel');
		$this->db->where('sis_siswa.id_siswa', $ids);
		$db = $this->db->get();
		return $db;
	}

	public function get_detp()
	{
		$this->db->select('sis_det_peminjaman.*, sis_rakbuku.nama_rak, sis_buku.*, sis_kategoribuku.nama_kategori');
		$this->db->from('sis_det_peminjaman');
		$this->db->join('sis_detailbuku', 'sis_detailbuku.id_detailbuku = sis_det_peminjaman.id_detailbuku');
		$this->db->join('sis_buku', 'sis_detailbuku.id_buku = sis_buku.id_buku');
		$this->db->join('sis_rakbuku', 'sis_buku.id_rak = sis_rakbuku.id_rak');		
		$this->db->join('sis_kategoribuku', 'sis_buku.id_kategori = sis_kategoribuku.id_kategori');
		$this->db->where('sis_det_peminjaman.no_peminjaman', $this->session->userdata('no'));
		$db = $this->db->get();
		return $db;	
	}

	public function show1($id)
	{
		$this->db->select('sis_peminjaman.*, sis_daftar.nama, sis_rombel.nama_rombel, (SELECT sum(denda) as dnd from sis_det_peminjaman WHERE no_peminjaman=sis_peminjaman.no_peminjaman) as ttl');
		$this->db->from('sis_peminjaman');
		$this->db->join('sis_anggota', 'sis_anggota.id_anggota = sis_peminjaman.id_anggota');
		$this->db->join('sis_siswa', 'sis_anggota.id_siswa = sis_siswa.id_siswa');
		$this->db->join('sis_daftar', 'sis_siswa.id_daftar=sis_daftar.id_daftar');		
		$this->db->join('sis_rombel', 'sis_siswa.id_rombel=sis_rombel.id_rombel');
		$this->db->where('sis_peminjaman.no_peminjaman', $id);
		$db = $this->db->get();
		return $db;
	}

	public function show2($id)
	{
		$this->db->select('sis_det_peminjaman.*, sis_rakbuku.nama_rak, sis_buku.*, sis_kategoribuku.nama_kategori');
		$this->db->from('sis_det_peminjaman');
		$this->db->join('sis_detailbuku', 'sis_det_peminjaman.id_detailbuku = sis_detailbuku.id_detailbuku');
		$this->db->join('sis_buku', 'sis_buku.id_buku = sis_detailbuku.id_buku');
		$this->db->join('sis_rakbuku', 'sis_buku.id_rak = sis_rakbuku.id_rak');
		$this->db->join('sis_kategoribuku', 'sis_buku.id_kategori = sis_kategoribuku.id_kategori');
		$this->db->where('sis_det_peminjaman.no_peminjaman', $id);
		$this->db->where('sis_det_peminjaman.status', 'PROSES');
		$db = $this->db->get();
		return $db->result();	
	}
	
	public function show3($id)
	{
		$this->db->select('sis_det_peminjaman.*, sis_rakbuku.nama_rak, sis_buku.*, sis_kategoribuku.nama_kategori, sis_det_peminjaman.status as sts');
		$this->db->from('sis_det_peminjaman');
		$this->db->join('sis_detailbuku', 'sis_det_peminjaman.id_detailbuku = sis_detailbuku.id_detailbuku');
		$this->db->join('sis_buku', 'sis_buku.id_buku = sis_detailbuku.id_buku');
		$this->db->join('sis_rakbuku', 'sis_buku.id_rak = sis_rakbuku.id_rak');
		$this->db->join('sis_kategoribuku', 'sis_buku.id_kategori = sis_kategoribuku.id_kategori');
		$this->db->where('sis_det_peminjaman.no_peminjaman', $id);		
		$db = $this->db->get();
		return $db->result();	
	}

	public function peminjaman($m,$y)
	{
		$this->db->select('*');
		$this->db->from('sis_peminjaman');
		$this->db->where('MONTH(sis_peminjaman.datestamp)', $m);
		$this->db->where('YEAR(sis_peminjaman.datestamp)', $y);
		$db = $this->db->get();
		return $db;
	}

	public function pengembalian($m,$y)
	{
		$this->db->select('sis_peminjaman.*, (SELECT sum(denda) as dnd from sis_det_peminjaman WHERE no_peminjaman=sis_peminjaman.no_peminjaman) as ttl');
		$this->db->from('sis_peminjaman');
		$this->db->where('sis_peminjaman.status', 'SELESAI');
		$this->db->where('MONTH(sis_peminjaman.datestamp)', $m);
		$this->db->where('YEAR(sis_peminjaman.datestamp)', $y);
		$db = $this->db->get();
		return $db;
	}


	
}

/* End of file M_Transaksi.php */
/* Location: ./application/models/M_Transaksi.php */