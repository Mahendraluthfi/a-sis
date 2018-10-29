<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dbackup extends CI_Controller {
 	 	
  	public function db()
  	{
	    $this->load->dbutil();
	   
	    $prefs = array(
	       'format' => 'zip',
	       'filename' => 'my_db_backup'.date("Y-m-d-H-i-s").'.sql'
	    );
	   
	    $backup =& $this->dbutil->backup($prefs);
	   
	    $db_name = 'backup-on-' . date("Y-m-d-H-i-s") . '.zip'; // file name
	    $save  = 'backup/db/' . $db_name; // dir name backup output destination
	   
	    $this->load->helper('file');
	    write_file($save, $backup);
	   
	    $this->load->helper('download');
	    force_download($db_name, $backup);
	}
}

/* End of file Backup.php */
/* Location: ./application/controllers/Backup.php */