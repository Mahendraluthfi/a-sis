<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lapbukubesar extends CI_Controller {

	public function __construct()
	{
		parent::__construct();	
		$this->load->model('m_akun');
		$this->load->model('m_rencana');
		if($this->auth->is_logged_in() == false)
	    {
	         $this->session->set_flashdata('msg', 
            '<div class="alert alert-danger">
                <h4>Maaf</h4>
                <p>Anda Belum Login !</p>
            </div>');
	        redirect('login');
	    }
	    if ($this->access->priv() == false ) {
	    	$this->session->set_flashdata('msg', 
            '<div class="alert alert-danger">
                <h4>Maaf</h4>
                <p>Anda tidak mempunyai akses !</p>
            </div>');
	        redirect('dashboard');	
	    }
	    $cek = $this->m_rencana->get_aktif()->num_rows();
		if (empty($cek)) {			
			$this->session->set_flashdata('msg', '<div class="alert alert-danger">
                <h4>Maaf</h4>                  
                <p>Anda belum membuat rencana anggaran !</p>
                </div>');
			redirect('rencana');
		}
	}

	public function index($page='')
	{
		$ga = $this->m_rencana->get_aktif()->result();
		foreach ($ga as $key) {
			$id = $key->id;
		}	
		$akun  = $this->input->post('akun');
		$ga = $this->db->get_where('sis_akun', array('id_akun' => $akun))->result();
		foreach ($ga as $a) {
			$data['nama'] = $a->nama_akun;
		}
		if (!empty($akun)) {
			$debet = $this->m_akun->akunbuku('debet',$akun,$id)->result();
			$kredit = $this->m_akun->akunbuku('kredit',$akun,$id)->result();			
			$data['datadebet'] = $debet;
			$data['datakredit'] = $kredit;
			$page = 'keuangan/show_buku';
		}

		$data['content'] = 'keuangan/lapbukubesar';
		$data['get'] = $this->m_akun->get()->result();
		$data['page'] = $page;


		$this->load->view('index', $data);
	}

}

/* End of file Lapbukubesar.php */
/* Location: ./application/controllers/Lapbukubesar.php */