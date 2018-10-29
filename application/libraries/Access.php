<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Access
{
	var $ci = NULL;	

	public function __construct()
	{
        $this->ci =& get_instance();
	}

	function priv()
	{		
		$id = $this->ci->session->userdata('id');
		$uri = $this->ci->uri->segment(1);
		$set = $this->ci->db->query("SELECT sis_privilage.id_akses, sis_modul.url FROM sis_privilage JOIN sis_modul ON sis_privilage.id_modul=sis_modul.id_modul WHERE sis_privilage.id_akses= '$id' AND sis_modul.url= '$uri'");
		$row = $set->num_rows();
		if (!empty($row)) {
			return true;
		}else{
			return false;
		}

	}

	

}

/* End of file Access.php */
/* Location: .//U/Access.php */
