<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Jenjang extends CI_Model {

	var $nmtbl = 'sis_jenjang';
	public function add($data)
	{
		$this->db->insert($this->nmtbl, $data);
		return $this->db->insert_id();
	}

	public function get()
	{
		return $this->db->get_where($this->nmtbl, array('aktif' => 1));
	}	

	public function get_paket()
	{
		return $this->db->query("SELECT * FROM sis_paketjenjang where not id_paket in (select paket from sis_jenjang)");
	}

	public function paket($id)
	{
		return $this->db->get_where('sis_paketjenjang', array('id_paket' => $id));
	}	

	public function get_paket_id($id)
	{
		return $this->db->get_where('sis_jenjang', array('paket' => $id));
	}

	public function paket_isi($id)
	{
		return $this->db->get_where('sis_isipaket', array('id_paket' => $id));	
	}

	public function update($where, $data){
		$this->db->update($this->nmtbl, $data, $where);
		return $this->db->affected_rows();
	}

	public function get_id($id)
	{
		$this->db->from($this->nmtbl);
		$this->db->where('id_jenjang',$id);
		$query = $this->db->get();
		return $query->row();
	}

	public function delete($id)
	{
		$this->db->query("DELETE from sis_jenjang where id_jenjang = '$id'");
		return $this->db->error();

	}

}

/* End of file M_Jenjang.php */
/* Location: ./application/models/M_Jenjang.php */