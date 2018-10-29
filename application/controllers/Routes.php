 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Routes extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here

	}
	public function index()
	{
		$sql = $this->db->get('sis_reg_user');
		$cek = $sql->num_rows();
		if (empty($cek)) {
			redirect('register','refresh');
		}else{
			redirect('login','refresh');
		}
	}

}

/* End of file Routes.php */
/* Location: ./application/controllers/Routes.php */