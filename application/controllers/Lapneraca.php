<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lapneraca extends CI_Controller {

	public function __construct()
	{
		parent::__construct();	
		$this->load->model('m_neraca');
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

	public function index()
	{
		$raktif = $this->db->get_where('sis_rencana_anggaran', array('status' => '1'));
		foreach ($raktif->result() as $key) {
			$r_a = $key->id;
		}
		$akun = $this->m_neraca->get_akun()->result();
		foreach ($akun as $key => $value) {								
			$value->saldo = $this->m_neraca->saldo($value->id_akun,$r_a)->result();				
			$value->penyesuaian = $this->m_neraca->penyesuaian($value->id_akun,$r_a)->result();
			$value->labarugi = $this->m_neraca->labarugi($value->id_akun,$r_a)->result();
			$value->neraca = $this->m_neraca->neraca($value->id_akun,$r_a)->result();			
		}		
		$data['jumlah_saldo'] = $this->m_neraca->jumlah_saldo($r_a)->result();
		$data['jumlah_penyesuaian'] = $this->m_neraca->jumlah_penyesuaian($r_a)->result();
		$data['jumlah_labarugi'] = $this->m_neraca->jumlah_labarugi($r_a)->result();
		$data['jumlah_neraca'] = $this->m_neraca->jumlah_neraca($r_a)->result();
		$data['akun'] = $akun;
		$data['content'] = 'keuangan/lapneraca';
		$data['anggaran'] = $this->db->get_where('sis_rencana_anggaran', array('status' => '1'))->result();
		$this->load->view('index', $data);		
	}

}

/* End of file Lapneraca.php */
/* Location: ./application/controllers/Lapneraca.php */