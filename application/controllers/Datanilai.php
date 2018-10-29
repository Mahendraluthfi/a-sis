<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datanilai extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_nilai');
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
		$dest_session = array('idm','idr','smt');
		$this->session->unset_userdata($dest_session);
		$id = $this->session->userdata('id');
		$data['get'] = $this->m_nilai->get_alokasi($id)->result();
		$data['content'] = 'nilai/data';
		$this->load->view('index', $data);			
	}

	public function session($idr,$idm,$smt)
	{
		$array = array(
			'idm' => $idm,
			'idr' => $idr,
			'smt' => $smt
		);	
		$this->session->set_userdata($array);
		redirect('datanilai/view');
	}

	public function view()
	{
		if (!empty($this->session->userdata('idm'))) {		
			$this->load->model('m_tahunajaran');
			$set = $this->m_tahunajaran->get_aktif();
			foreach ($set->result() as $key) {          
			    $ta = $key->id_angkatan;
			}		
			$idr = $this->session->userdata('idr');
			$idm = $this->session->userdata('idm');
			$smt = $this->session->userdata('smt');
			$all = $this->db->get_where('sis_siswa',array('id_rombel' => $idr));
			$data['mapel'] = $this->m_nilai->mapel($this->session->userdata('idm'))->result();
			$data['rombel'] = $this->m_nilai->rombel($idr)->result();
			$data['get_siswa'] = $this->m_nilai->get_siswa($idr,$idm,$smt,$ta)->result();
			$data['jml'] = $this->m_nilai->get_siswa($idr,$idm,$smt,$ta)->num_rows();
			$data['all'] = $all->num_rows();
			$data['content'] = 'nilai/dataview';
			$this->load->view('index', $data); 
		}else{
			redirect('datanilai');
		}
	}

	public function print_n_m($id)
	{
		$res = $this->m_nilai->print_n($id);
		foreach ($res as $key) {
			$nama = $key->nama;
			$rombel = $key->nama_rombel;
			$mapel = $key->nama_mapel;
			$smt = $key->semester;
		}
		$data['view'] = $res;
		// $this->load->view('nilai/cetakpm', $data);
		$this->pdf->load_view('nilai/cetakpm', $data);
		$this->pdf->render();
		$this->pdf->stream($nama."-".$rombel."-".$mapel."-".$smt.".pdf");
	}

	public function view_print($id)
	{
		$this->load->model('m_tahunajaran');
			$set = $this->m_tahunajaran->get_aktif();
			foreach ($set->result() as $key) {          
			    $ta = $key->id_angkatan;
			}	
		$idr = $this->session->userdata('idr');
		$idm = $this->session->userdata('idm');
		$smt = $this->session->userdata('smt');
		$data['mapel'] = $this->m_nilai->mapel($idm)->result();
		$data['rombel'] = $this->m_nilai->rombel($idr)->result();
		$data['get_siswa'] = $this->m_nilai->get_siswa($idr,$idm,$smt,$ta)->result();
		if ($id == "pdf") {
			$this->pdf->load_view('nilai/dataview_print', $data);		
			$this->pdf->render();
			$this->pdf->stream($idm."-".$idr."-".$smt.".pdf");			
		}else{
			$this->load->view('nilai/dataview_excel', $data);		
		}
	}

}

/* End of file Datanilai.php */
/* Location: ./application/controllers/Datanilai.php */