<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rombel extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_rombel');
		$this->load->model('m_kelas');
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
		$data['get'] = $this->m_rombel->get()->result();
		$data['get2'] = $this->m_kelas->get()->result();		
		$data['get3'] = $this->m_rombel->get_wali()->result();		
		$data['content'] = 'akademik/rombel';
		$this->load->view('index', $data);
	}

	public function get($id)
	{
		$data = $this->m_rombel->get_id($id);
		echo json_encode($data);
	}

	public function get_det($id)
	{
		$data = $this->m_rombel->get_det($id);
		echo json_encode($data);
	}

	public function simpan(){
		$data = array(
				'id_kelas' => $this->input->post('id_kelas'),
				'nama_rombel' => $this->input->post('nama_rombel'),				
				'kuota' => $this->input->post('kuota'),
				'nip' => $this->input->post('nip')				
			);
		$insert = $this->m_rombel->add($data);
		 $this->session->set_flashdata('msg', 
            '<div class="alert alert-info">
                <strong>Simpan Berhasil !</strong>                
            </div>');
		echo json_encode(array("status" => TRUE));
	}

	public function edit($id){
		$data = array(
				'id_kelas' => $this->input->post('id_kelas'),
				'nama_rombel' => $this->input->post('nama_rombel'),
				'kuota' => $this->input->post('kuota'),
				'nip' => $this->input->post('nip')								
			);
		$this->m_rombel->update(array('id_rombel' => $id), $data);
		$this->session->set_flashdata('msg', 
            '<div class="alert alert-info">
                <strong>Update Berhasil !</strong>                
            </div>');
		echo json_encode(array("status" => TRUE));
	}

	public function hapus($id)
	{
		$this->m_rombel->delete($id);
		$this->session->set_flashdata('msg', 
            '<div class="alert alert-info">
                <strong>Hapus Berhasil !</strong>                
            </div>');
		redirect('rombel','refresh');
	}

}

/* End of file Rombel.php */
/* Location: ./application/controllers/Rombel.php */