<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mutasi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();		
		$this->load->model('m_rombel');
		$this->load->model('m_siswa');
		$this->load->model('m_mutasi');
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

	public function index()
	{
		$data['rombel'] = $this->m_rombel->get()->result();		
		$data['content'] = 'akademik/mutasi';
		$data['page'] = 'perpustakaan/blank';
		$this->load->view('index', $data);
	}

	public function view()
	{
		$idr = $this->input->post('id_rombel');
		$data['siswa'] = $this->m_siswa->show($idr);					
		$data['rombel'] = $this->m_rombel->get()->result();		
		$data['rombel2'] = $this->m_rombel->where_not($idr)->result();		
		$data['content'] = 'akademik/mutasi';
		$data['page'] = 'akademik/mutasi_view';
		$this->load->view('index', $data);	
	}

	public function simpan()
	{
		$cb = $this->input->post('cb');
		$jenis = $this->input->post('jenis');
		$idr = $this->input->post('idr');
		if ($jenis == '1' || $jenis == '2') {
			foreach ($cb as $key => $value) {
				$this->db->where('id_daftar', $key);
				$this->db->update('sis_siswa', array('id_rombel' => $idr));
			}
		}elseif ($jenis == '4') {
			foreach ($cb as $key => $value) {
				$this->db->insert('sis_lulus', array(
					'id_daftar' => $key,
					'id_rombel' => $this->input->post('id_rombel'),
					'tgl_lulus' => $this->input->post('lulus')
				));
				$this->db->where('id_daftar', $key);
				$this->db->delete('sis_siswa');
				$this->db->where('id_daftar', $key);
				$this->db->update('sis_daftar', array('diterima' => 'M'));
			}
		}elseif ($jenis == '3') {
			foreach ($cb as $key => $value) {
				$this->db->insert('sis_pindah', array(
					'id_daftar' => $key,
					'id_rombel' => $this->input->post('id_rombel'),					
					'nm_sekolah' => $this->input->post('nmsekolah')
				));
				$this->db->where('id_daftar', $key);
				$this->db->delete('sis_siswa');	
				$this->db->where('id_daftar', $key);
				$this->db->update('sis_daftar', array('diterima' => 'M'));
			}
		}
		// echo count($cb);
		$this->session->set_flashdata('msg', 
			'<div class="alert alert-info">
                <strong>Simpan Berhasil !</strong>                
            </div>');
		redirect('mutasi');
	}

	public function data($type)
	{
		$id = base64_decode($type);
		if ($id == "lulus") {
			$data['title'] = 'Data Mutasi Lulus';
			$data['row'] = $this->m_mutasi->lulus()->result();
			$data['td'] = 'Tgl Lulus';
		}elseif ($id == "pindah") {			
			$data['title'] = 'Data Mutasi Pindah';			
			$data['row'] = $this->m_mutasi->pindah()->result();			
			$data['td'] = 'Nama Sekolah';			
		}else{
			$this->output->set_status_header('404'); 
			$data['content'] = '404';
			$this->load->view('index', $data);
		}
		$data['content'] = 'akademik/mutasi_data';
		$this->load->view('index', $data);
	}
}

/* End of file Mutasi.php */
/* Location: ./application/controllers/Mutasi.php */