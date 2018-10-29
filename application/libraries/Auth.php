<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth
{
	var $ci = NULL;

	public function __construct()
	{
        $this->ci =& get_instance();
	}

	function is_logged_in(){
      if($this->ci->session->userdata('id') == '' && $this->ci->session->userdata('username') == '' && $this->ci->session->userdata('level') == ''){
         return false;
      }
      return true;
   }
   
   function restrict(){
      if($this->is_logged_in() == false){
         redirect(base_url());
      }
   }
   
  

}

/* End of file Auth.php */
/* Location: ./application/libraries/Auth.php */
