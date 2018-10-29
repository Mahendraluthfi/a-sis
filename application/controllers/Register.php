<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
        $this->load->model('m_register');
        if ($this->db->get('sis_reg_user')->num_rows() > 0) {
            redirect('login');
        }
	}

	public function index()
	{		
        $red = $this->uri->segment(3);
        if (empty($red)) {
            $data['content'] = 'register_form';            
        }else{
            $data['content'] = 'register_redirect';                        
        }
		$this->load->view('register',$data);    
	}

    public function submit()
    {
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $alamat = $this->input->post('alamat');
        $notelp = $this->input->post('notelp');
        $password = md5($this->input->post('password'));
        $date = date('Y-m-d');
        $id_reg = $password.'-'.$date;
        $isi = array(
            'id_reg' => $id_reg, 
            'date_reg' => $date, 
            'nama_sekolah' => $nama, 
            'email' => $email,            
            'alamat' => $alamat,            
            'notelp' => $notelp            
        );
        $this->m_register->user_reg($isi);
        $admin = array(
            'id_akses' => $email,
            'username' => 'Administrator',
            'password' => $password,
            'level' => 'administrator'
        );
        $this->db->insert('sis_level', $admin);
        $pri = $this->m_register->privilage()->result();
        foreach ($pri as $key) {
            $object = array(
                'id_akses' => $email,
                'id_modul' => $key->id_modul
            );
            $this->db->insert('sis_privilage', $object);
        }
        redirect('register/index/redirect');
    }	
}

/* End of file Register.php */
/* Location: ./application/controllers/Register.php */