<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_register');
        if (!$this->db->get('sis_reg_user')->num_rows() > 0) {
            redirect(base_url());
        }
	}
	public function index()
	{
      if($this->auth->is_logged_in() == false)
        {          
            $this->load->view('login');
        }else{
            redirect('dashboard','refresh');
        }
	}

	public function submit()
    {
        $email = $this->input->post('email');
        $password = md5($this->input->post('password'));
        $input = array(
            'id_akses' => $email,
            'password' => $password
        );
        $cek = $this->m_register->login($input)->num_rows();
        if (!empty($cek)) {
           
            $get = $this->m_register->login($input)->result();
            foreach ($get as $key) {
            /*    $id = $key->id_akses
                $user = $key->username
                $level = $key->level
            */
                $ses_admin = array(
                    'id' => $key->id_akses,
                    'username' => $key->username,
                    'level' => $key->level                    
                );
            }
            $this->session->set_userdata($ses_admin);
            $this->session->set_flashdata('msg', 
            '<div class="alert alert-success">
                <h4>Selamat Datang</h4>
                <p>Di Halaman '.$this->session->userdata('level').'</p>
            </div>');
            redirect('dashboard','refresh');
        }else{
            $this->session->set_flashdata('msg', 
            '<div class="alert alert-danger">
                <h4>Maaf</h4>
                <p>Username atau Password salah !</p>
            </div>');
            redirect('login');
        }
    }

    public function logout()
    {
    	$ses_admin = array('id','username','level');
    	$this->session->unset_userdata($ses_admin);
		session_destroy();
		redirect(base_url());
    }

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */