<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lapbayar extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_lapbayar');
		$this->load->model('m_kelas');
		date_default_timezone_set("Asia/Bangkok");									
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
	}

	public function get_ta_aktif()
	{
		$db = $this->db->get_where('sis_tahunajaran', array('aktif' => '1'))->result();
		foreach ($db as $key) {
			$id = $key->id_angkatan;
		}
		return $id;
	}

	public function index()
	{
		$data['get'] = $this->db->get_where('sis_jenisbayar', array('status' => 1))->result();		
		$data['rombel'] = $this->db->get_where('sis_rombel', array('status' => 'AKTIF'))->result();
		$data['content'] = 'pembayaran/lapbayar';
		$this->session->unset_userdata('tipe','ta','tb','idk','idta');
		$this->load->view('index', $data);
	}

	public function create_session()
	{
		$array = array(
			'tipe' => $this->input->post('tipe'),
			'ta' => $this->input->post('tgla'),
			'tb' => $this->input->post('tglb'),
			'idk' => $this->input->post('idk'),
			'jenis' => $this->input->post('jenis'),
			'idta' => $this->get_ta_aktif()
		);	
		$this->session->set_userdata( $array );	
		redirect('lapbayar/cari','refresh');
	}

	public function cari()
	{
		$tipe = $this->session->userdata('tipe');
		$ta = $this->session->userdata('ta');
		$tb = $this->session->userdata('tb');
		$idk = $this->session->userdata('idk');
		$idta = $this->session->userdata('idta');
		$jenis = $this->session->userdata('jenis');
		if ($tipe == 2) {
			$data['get'] = $this->m_lapbayar->get_tabungan($ta,$tb,$idk,$idta)->result();
			$data['rombel'] = $this->db->get_where('sis_rombel',array('id_rombel' => $idk))->result();
			$data['ta'] = $ta;
			$data['tb'] = $tb;
			$data['content'] = 'pembayaran/result_tabungan';			
			$this->load->view('index', $data);	
		}elseif ($tipe == 1){			
			$data['get'] = $this->m_lapbayar->get_pembayaran($ta,$tb,$idk,$idta,$jenis)->result();
			$data['rombel'] = $this->db->get_where('sis_rombel',array('id_rombel' => $idk))->result();
			$data['ta'] = $ta;
			$data['tb'] = $tb;
			$data['content'] = 'pembayaran/result_pmb';			
			$this->load->view('index', $data);	
			// print_r($data);
		}elseif ($tipe == 3) {
			$data['get'] = $this->m_lapbayar->get_saldo($idk)->result();
			$data['rombel'] = $this->db->get_where('sis_rombel',array('id_rombel' => $idk))->result();			
			$data['content'] = 'pembayaran/result_saldo';			
			$this->load->view('index', $data);	
		}
	}

}

/* End of file Lapbayar.php */
/* Location: ./application/controllers/Lapbayar.php */