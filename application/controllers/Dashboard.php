<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_dashboard');
		date_default_timezone_set('Asia/Bangkok');
		if($this->auth->is_logged_in() == false)
	    {
	        $this->session->set_flashdata('msg', 
            '<div class="alert alert-danger">
                <h4>Maaf</h4>
                <p>Anda Belum Login !</p>
            </div>');
	        redirect('login');
	    }
	}

	public function index()
	{
		$date = date('Y-m-d');
		$rmain = $this->m_dashboard->get_main()->result();
		foreach ($rmain as $key => $value) {
			$value->sub_main = $this->m_dashboard->get_sub($value->id_modul)->result();							
		}
		$data['main'] = $rmain;
		$data['jsiswa'] = $this->m_dashboard->jsiswa()->num_rows();
		$data['jcsiswa'] = $this->m_dashboard->jcsiswa()->num_rows();
		$data['peminjaman'] = $this->m_dashboard->peminjaman()->num_rows();
		$data['anggota'] = $this->db->get_where('sis_anggota', array('status' => '1'))->num_rows();
		$data['chart'] = $this->m_dashboard->chart()->result();
		$data['tabungan'] = $this->m_dashboard->tabungan()->result();
		$data['pembayaran'] = $this->m_dashboard->pembayaran()->result();
		$data['tottab'] = $this->m_dashboard->tottab($date)->result();
		$data['totpem'] = $this->m_dashboard->totpem($date)->result();
		$data['year'] = date('Y');
		$data['ta'] = $this->db->get_where('sis_tahunajaran', array('aktif' => '1'))->result();
		$data['anggaran'] = $this->db->get_where('sis_rencana_anggaran', array('status' => '1'))->result();
		$data['content'] = 'dashboard';
		$this->load->view('index', $data);		
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */