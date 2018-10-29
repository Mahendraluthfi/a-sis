<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My404 extends CI_Controller {

	public function index()
	{
		$this->output->set_status_header('404'); 
		$data['content'] = '404';
		$this->load->view('index', $data);
	}

}

/* End of file My404.php */
/* Location: ./application/controllers/My404.php */