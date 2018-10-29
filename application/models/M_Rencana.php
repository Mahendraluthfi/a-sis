<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Rencana extends CI_Model {

	var $nmtbl = 'sis_rencana_anggaran';
	public function add($data)
	{
		$this->db->insert($this->nmtbl, $data);
		return $this->db->insert_id();
	}

	public function add_root($data)
	{
		$this->db->insert('sis_jenis_transaksi', $data);
		return $this->db->insert_id();
	}

	public function get()
	{
		return $this->db->get($this->nmtbl);
	}	

	public function detail($id)
	{
		return $this->db->get_where($this->nmtbl, array('id' => $id));
	}	

	public function get_jenis($id)
	{
		$this->db->from('sis_jenis_transaksi');
		$this->db->where('id',$id);
		$query = $this->db->get();
		return $query->row();
	}

	public function get_detail($jenis, $id)
	{
		if ($jenis=="m") {
			return $this->db->get_where('sis_jenis_transaksi', array('jenis_trans' => 'm','rencana_anggaran' => $id));
		}else{
			return $this->db->get_where('sis_jenis_transaksi', array('jenis_trans' => 'k','rencana_anggaran' => $id));
		}
	}	

	public function update($where, $data){
		$this->db->update($this->nmtbl, $data, $where);
		return $this->db->affected_rows();
	}

	public function get_id($id)
	{
		$this->db->from($this->nmtbl);
		$this->db->where('id_akun',$id);
		$query = $this->db->get();
		return $query->row();
	}

	public function delete($id)
	{
		$this->db->where('id_akun', $id);
		$this->db->update($this->nmtbl, array('status' => '0'));
	}

	public function get_aktif()
	{
		return $this->db->get_where($this->nmtbl, array('status' => '1'));
	}

	public function showt($id)
	{
		$this->db->select('sis_transaksi.id, sis_transaksi.waktu, sis_transaksi.uraian, sis_transaksi.pencatat, sis_akun.nama_akun, sis_jurnal.debet, sis_jurnal.kredit');
		$this->db->from('sis_jurnal');
		$this->db->join('sis_akun', 'sis_jurnal.akun = sis_akun.id_akun');
		$this->db->join('sis_transaksi', 'sis_jurnal.id_transaksi = sis_transaksi.id');
		$this->db->join('sis_jenis_transaksi', 'sis_transaksi.id_jenis_transaksi = sis_jenis_transaksi.id');
		$this->db->join('sis_rencana_anggaran', 'sis_jenis_transaksi.rencana_anggaran = sis_rencana_anggaran.id');
		$this->db->where('sis_rencana_anggaran.id', $id);
		$db = $this->db->get();
		return $db->result();
	}

	public function jurnal($id,$m,$y,$limit,$offset)
	{						
		return $this->db->query("SELECT *
			FROM `sis_transaksi`
			WHERE `idr` = '$id'
			AND YEAR(waktu) = '$y'
			AND MONTH(waktu) = '$m'
			 LIMIT $limit 
			 OFFSET $offset");
	}

	
}

/* End of file M_Rencana.php */
/* Location: ./application/models/M_Rencana.php */