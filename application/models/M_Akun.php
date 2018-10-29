<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Akun extends CI_Model {

	var $nmtbl = 'sis_akun';
	public function add($data)
	{
		$this->db->insert($this->nmtbl, $data);
		return $this->db->insert_id();
	}

	public function get()
	{
		return $this->db->get_where($this->nmtbl, array('status' => '1'));
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

	public function akunbuku($jenis,$akun,$id)
	{
		return $this->db->query("SELECT sis_transaksi.waktu, sis_transaksi.uraian, sis_jurnal.".$jenis."
		FROM sis_jurnal 
		JOIN sis_transaksi ON sis_jurnal.id_transaksi=sis_transaksi.id
		WHERE NOT sis_jurnal.".$jenis." = '0'
		AND sis_jurnal.akun = '".$akun."'
		AND sis_transaksi.idr = '".$id."'");		
	}

}

/* End of file M_Akun.php */
/* Location: ./application/models/M_Akun.php */