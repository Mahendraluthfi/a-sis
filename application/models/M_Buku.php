<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Buku extends CI_Model {

	var $nmtbl = 'sis_buku';
	public function add($data)
	{
		$this->db->insert($this->nmtbl, $data);
		return $this->db->insert_id();
	}

	public function get_max($id)
	{
		$this->db->select('MAX(RIGHT(sis_detailbuku.id_detailbuku,4)) as max');
		$this->db->from('sis_detailbuku');
		$this->db->where('sis_detailbuku.id_buku', $id);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
            foreach($query->result() as $k){
                $tmp = ((int)$k->max)+1;
                $kd = sprintf("%04s", $tmp);
            }
		}else{
			$kd = '0001';
		}
		return $kd;

	}

	public function get()
	{	
		$this->db->select('sis_buku.*, sis_kategoribuku.nama_kategori, sis_rakbuku.nama_rak');
		$this->db->from('sis_buku');
		$this->db->join('sis_kategoribuku', 'sis_buku.id_kategori = sis_kategoribuku.id_kategori');
		$this->db->join('sis_rakbuku', 'sis_buku.id_rak = sis_rakbuku.id_rak');
		// $this->db->join('sis_detailbuku', 'sis_buku.id_buku = sis_detailbuku.id_buku');
		$this->db->where('sis_buku.status', 'AKTIF');
		return $this->db->get();
	}		

	public function update($where, $data){
		$this->db->update($this->nmtbl, $data, $where);
		return $this->db->affected_rows();
	}

	public function get_id($id)
	{
		$this->db->select('sis_buku.*, sis_kategoribuku.nama_kategori, sis_rakbuku.nama_rak');		
		$this->db->from('sis_buku');
		$this->db->join('sis_kategoribuku', 'sis_buku.id_kategori = sis_kategoribuku.id_kategori');
		$this->db->join('sis_rakbuku', 'sis_buku.id_rak = sis_rakbuku.id_rak');		
		$this->db->where('sis_buku.id_buku', $id);
		return $this->db->get();			
	}

	public function delete($id)
	{
		$this->db->where('id_buku', $id);
		$this->db->update($this->nmtbl, array('status' => 'NONAKTIF'));
	}

	public function detail_buku($id)
	{		
		return $this->db->get_where('sis_detailbuku', $id);
	}

	public function get_buku($id)
	{
		$this->db->select('sis_detailbuku.id_detailbuku, sis_buku.*, sis_kategoribuku.nama_kategori, sis_rakbuku.nama_rak');
		$this->db->from('sis_detailbuku');
		$this->db->join('sis_buku', 'sis_buku.id_buku = sis_detailbuku.id_buku');
		$this->db->join('sis_kategoribuku', 'sis_buku.id_kategori = sis_kategoribuku.id_kategori');
		$this->db->join('sis_rakbuku', 'sis_buku.id_rak = sis_rakbuku.id_rak');		
		$this->db->where('sis_detailbuku.id_detailbuku', $id);
		$this->db->where('sis_detailbuku.status', 1);
		return $this->db->get();
	}
}

/* End of file M_Buku.php */
/* Location: ./application/models/M_Buku.php */