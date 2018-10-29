<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_getnoreg extends CI_Model {

	public function get_noreg($tgl_daftar){
		$q = $this->db->query("SELECT MAX(RIGHT(no_reg,4)) AS kd_max FROM sis_daftar WHERE tgl_daftar = '$tgl_daftar'");
        //$kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%04s", $tmp);
            }
        }else{
            $kd = "0001";
        }        
        $str = strtotime($tgl_daftar);
        $date = date('dmy', $str);
        $fix = $date.$kd;
        return 	$fix;
	}

    public function get_nopm($date)
    {
        $q = $this->db->query("SELECT MAX(RIGHT(no_peminjaman,4)) AS kd_max FROM sis_peminjaman WHERE datestamp = '$date'");
        //$kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%04s", $tmp);
            }
        }else{
            $kd = "0001";
        }        
        $str = strtotime($date);
        $date = date('dm', $str);
        $fix = "PMJ-".$date.$kd;
        return $fix;   
    }
}

/* End of file M_getnoreg.php */
/* Location: ./application/models/M_getnoreg.php */