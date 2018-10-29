<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Neraca extends CI_Model {

	public function get_akun()
	{
		$this->db->select('*')->from('sis_akun')->order_by('nama_akun', 'asc');
		return $this->db->get();
	}

	public function saldo($id,$ra)
	{
		$this->db->select('SUM(sis_jurnal.debet), SUM(sis_jurnal.kredit),
			CASE
				WHEN SUM(sis_jurnal.debet) > SUM(sis_jurnal.kredit) then SUM(sis_jurnal.debet) - SUM(sis_jurnal.kredit)
			    ELSE null END as dbt,
			CASE
				WHEN SUM(sis_jurnal.debet) < SUM(sis_jurnal.kredit) then SUM(sis_jurnal.kredit) - SUM(sis_jurnal.debet)
			    ELSE null END as kdt');
		$this->db->from('sis_jurnal');
		$this->db->join('sis_transaksi', 'sis_jurnal.id_transaksi = sis_transaksi.id');
		$this->db->where('sis_jurnal.akun', $id);
		$this->db->where('sis_transaksi.idr', $ra);
		$this->db->where_not_in('sis_transaksi.id_jenis_transaksi', 'undefinied');
		return $this->db->get();
	}

	public function penyesuaian($id,$ra)
	{
		$this->db->select('SUM(sis_jurnal.debet), SUM(sis_jurnal.kredit),
			CASE
				WHEN SUM(sis_jurnal.debet) > SUM(sis_jurnal.kredit) then SUM(sis_jurnal.debet) - SUM(sis_jurnal.kredit)
			    ELSE null END as dbt1,
			CASE
				WHEN SUM(sis_jurnal.debet) < SUM(sis_jurnal.kredit) then SUM(sis_jurnal.kredit) - SUM(sis_jurnal.debet)
			    ELSE null END as kdt1');
		$this->db->from('sis_jurnal');
		$this->db->join('sis_transaksi', 'sis_jurnal.id_transaksi = sis_transaksi.id');
		$this->db->where('sis_jurnal.akun', $id);
		$this->db->where('sis_transaksi.idr', $ra);
		$this->db->where('sis_transaksi.id_jenis_transaksi', 'undefinied');
		return $this->db->get();
	}

	public function labarugi($id,$ra)
	{
		$this->db->select('SUM(sis_jurnal.debet), SUM(sis_jurnal.kredit),
			CASE
				WHEN SUM(sis_jurnal.debet) > SUM(sis_jurnal.kredit) then SUM(sis_jurnal.debet) - SUM(sis_jurnal.kredit)
			    ELSE null END as dbt2,
			CASE
				WHEN SUM(sis_jurnal.debet) < SUM(sis_jurnal.kredit) then SUM(sis_jurnal.kredit) - SUM(sis_jurnal.debet)
			    ELSE null END as kdt2');
		$this->db->from('sis_jurnal');
		$this->db->join('sis_transaksi', 'sis_jurnal.id_transaksi = sis_transaksi.id');
		$this->db->join('sis_akun', 'sis_jurnal.akun = sis_akun.id_akun');
		$this->db->where('sis_jurnal.akun', $id);
		$this->db->where('sis_transaksi.idr', $ra);		
		$this->db->where_in('sis_akun.jenis_akun', array('Beban','Pendapatan'));
		return $this->db->get();	
	}

	public function neraca($id,$ra)
	{
		$this->db->select('SUM(sis_jurnal.debet), SUM(sis_jurnal.kredit),
			CASE
				WHEN SUM(sis_jurnal.debet) > SUM(sis_jurnal.kredit) then SUM(sis_jurnal.debet) - SUM(sis_jurnal.kredit)
			    ELSE null END as dbt3,
			CASE
				WHEN SUM(sis_jurnal.debet) < SUM(sis_jurnal.kredit) then SUM(sis_jurnal.kredit) - SUM(sis_jurnal.debet)
			    ELSE null END as kdt3');
		$this->db->from('sis_jurnal');
		$this->db->join('sis_transaksi', 'sis_jurnal.id_transaksi = sis_transaksi.id');
		$this->db->join('sis_akun', 'sis_jurnal.akun = sis_akun.id_akun');
		$this->db->where('sis_jurnal.akun', $id);
		$this->db->where('sis_transaksi.idr', $ra);		
		$this->db->where_not_in('sis_akun.jenis_akun', array('Beban','Pendapatan'));
		return $this->db->get();	
	}

	public function jumlah_penyesuaian($id)
	{
		$this->db->select('SUM(sis_jurnal.debet) as a, SUM(sis_jurnal.kredit) as b');
		$this->db->from('sis_jurnal');
		$this->db->join('sis_transaksi', 'sis_jurnal.id_transaksi = sis_transaksi.id');		
		$this->db->where('sis_transaksi.idr', $id);
		$this->db->where('sis_transaksi.id_jenis_transaksi', 'undefinied');
		return $this->db->get();
	}

	public function jumlah_saldo($id)
	{
		$this->db->select('CASE
	WHEN SUM(sis_jurnal.debet) > SUM(sis_jurnal.kredit) then SUM(sis_jurnal.debet) - SUM(sis_jurnal.kredit)
	ELSE null END as dbt,
		CASE
	WHEN SUM(sis_jurnal.debet) < SUM(sis_jurnal.kredit) then SUM(sis_jurnal.kredit) - SUM(sis_jurnal.debet)
	ELSE null END as kdt');	
		$this->db->from('sis_jurnal');
		$this->db->join('sis_transaksi', 'sis_transaksi.id=sis_jurnal.id_transaksi');
		$this->db->where('sis_transaksi.idr', $id);
		$this->db->where_not_in('sis_transaksi.id_jenis_transaksi', 'undefinied');
		$this->db->group_by('sis_jurnal.akun');
		return $this->db->get();
	}

	public function jumlah_labarugi($id)
	{
		$this->db->select('CASE
	WHEN SUM(sis_jurnal.debet) > SUM(sis_jurnal.kredit) then SUM(sis_jurnal.debet) - SUM(sis_jurnal.kredit)
	ELSE null END as dbt2,
		CASE
	WHEN SUM(sis_jurnal.debet) < SUM(sis_jurnal.kredit) then SUM(sis_jurnal.kredit) - SUM(sis_jurnal.debet)
	ELSE null END as kdt2');	
		$this->db->from('sis_jurnal');
		$this->db->join('sis_transaksi', 'sis_jurnal.id_transaksi = sis_transaksi.id');
		$this->db->join('sis_akun', 'sis_jurnal.akun = sis_akun.id_akun');		
		$this->db->where('sis_transaksi.idr', $id);		
		$this->db->where_in('sis_akun.jenis_akun', array('Beban','Pendapatan'));
		$this->db->group_by('sis_jurnal.akun');
		return $this->db->get();
	}

	public function jumlah_neraca($id)
	{
		$this->db->select('CASE
	WHEN SUM(sis_jurnal.debet) > SUM(sis_jurnal.kredit) then SUM(sis_jurnal.debet) - SUM(sis_jurnal.kredit)
	ELSE null END as dbt3,
		CASE
	WHEN SUM(sis_jurnal.debet) < SUM(sis_jurnal.kredit) then SUM(sis_jurnal.kredit) - SUM(sis_jurnal.debet)
	ELSE null END as kdt3');	
		$this->db->from('sis_jurnal');
		$this->db->join('sis_transaksi', 'sis_jurnal.id_transaksi = sis_transaksi.id');
		$this->db->join('sis_akun', 'sis_jurnal.akun = sis_akun.id_akun');		
		$this->db->where('sis_transaksi.idr', $id);		
		$this->db->where_not_in('sis_akun.jenis_akun', array('Beban','Pendapatan'));
		$this->db->group_by('sis_jurnal.akun');
		return $this->db->get();
	}
}

/* End of file M_Neraca.php */
/* Location: ./application/models/M_Neraca.php */