<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tahunajaran extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_tahunajaran');
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
		$data['get'] = $this->m_tahunajaran->get()->result();
		$data['content'] = 'akademik/tahunajaran';
		$this->load->view('index', $data);
	}

	public function get($id)
	{
		$data = $this->m_tahunajaran->get_id($id);
		echo json_encode($data);
	}

	public function simpan(){
		$tgla = substr($this->input->post('periode'), 0,10);
		$tglb = substr($this->input->post('periode'), 13,10);
		$data = array(
				'kd_angkatan' => $this->input->post('kd_angkatan'),
				'nama_angkatan' => $this->input->post('nama_angkatan'),
				'keterangan' => $this->input->post('keterangan'),			
				'tgl_a' => $tgla,			
				'tgl_b' => $tglb			
			);
		$insert = $this->m_tahunajaran->add($data);
		 $this->session->set_flashdata('msg', 
            '<div class="alert alert-info">
                <strong>Simpan Berhasil !</strong>                
            </div>');
		echo json_encode(array("status" => TRUE));
	}

	public function edit($id){
		$tgla = substr($this->input->post('periode'), 0,10);
		$tglb = substr($this->input->post('periode'), 13,10);
		$data = array(
				'kd_angkatan' => $this->input->post('kd_angkatan'),			
				'nama_angkatan' => $this->input->post('nama_angkatan'),
				'keterangan' => $this->input->post('keterangan'),
				'tgl_a' => $tgla,			
				'tgl_b' => $tglb			
			);
		$this->m_tahunajaran->update(array('id_angkatan' => $id), $data);
		$this->session->set_flashdata('msg', 
            '<div class="alert alert-info">
                <strong>Update Berhasil !</strong>                
            </div>');
		echo json_encode(array("status" => TRUE));
	}

	public function hapus($id)
	{
		$this->m_tahunajaran->delete($id);
		$this->session->set_flashdata('msg', 
            '<div class="alert alert-info">
                <strong>Hapus Berhasil !</strong>                
            </div>');
		redirect('tahunajaran','refresh');
	}

	public function set($id)
	{
		$this->db->update('sis_tahunajaran', array('aktif' => '0'));
		
		$this->db->where('id_angkatan', $id);
		$this->db->update('sis_tahunajaran', array('aktif' => '1'));
		redirect('tahunajaran');
	}	
}

/* End of file Tahunajaran.php */
/* Location: ./application/controllers/Tahunajaran.php */