<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembagian extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_daftar');		
		$this->load->model('m_bagi');
		$this->load->model('m_jenjang');
		$this->load->model('m_rombel');
		if($this->auth->is_logged_in() == false){
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
		$data['calon']	 = $this->m_bagi->show_n();		
		$data['calon_y'] = $this->m_bagi->show_y();		
		$data['content'] = 'akademik/bagi';
		$this->load->view('index', $data);		
	}

	public function get($id)
	{
		$data = $this->m_bagi->show_id($id);
		echo json_encode($data);
	}

	public function get_jenjang($id)
	{
		$data=$this->m_bagi->get_j($id);
		echo json_encode($data);
	}

	public function seleksi($id)
	{
		$this->db->where('id_daftar', $id);
		$this->db->update('sis_daftar', array('diterima' => 'Y'));
		redirect('pembagian','refresh');
	}

	public function unseleksi($id)
	{
		$this->db->where('id_daftar', $id);
		$this->db->update('sis_daftar', array('diterima' => 'N'));
		redirect('pembagian','refresh');
	}

	public function kelas()
	{
		$data['rombel'] = $this->m_rombel->get()->result();
		$data['jenjang'] = $this->m_jenjang->get()->result();
		$data['content'] = 'akademik/bagikelas';
		$this->load->view('index', $data);
	}

	public function simpan_kelas()
	{		
		$cb = $this->input->post('cb');
		$rombel = $this->input->post('rombel');
		$count = count($cb);
		$a = $this->m_bagi->get_kuota($rombel);		
		foreach ($a as $b) {
			$s = $b->kuota - $b->jml;
		}
		if ($s < $count) {
			$this->session->set_flashdata('msg', 
            '<div class="alert alert-danger">
                <strong>Jumlah Siswa melebihi kuota !</strong>                
            </div>');
            redirect('pembagian/kelas');
		}else{
			foreach ($cb as $key => $value) {
				$this->db->insert('sis_siswa', array(
					'id_daftar' => $key,
					'id_rombel' => $rombel
				));
				$this->db->where('id_daftar', $key);
				$this->db->update('sis_daftar', array('diterima' => 'C'));
			}
			$this->session->set_flashdata('msg', 
			'<div class="alert alert-info">
                <strong>Simpan Berhasil !</strong>                
            </div>');
            redirect('pembagian/kelas');			
		}
	}
}

/* End of file Pembagian.php */
/* Location: ./application/controllers/Pembagian.php */