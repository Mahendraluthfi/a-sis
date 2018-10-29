<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenismapel extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_jenismapel');
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
		$data['get'] = $this->m_jenismapel->get()->result();
		$data['content'] = 'akademik/jenismapel';
		$this->load->view('index', $data);
	}

	public function get($id)
	{
		$data = $this->m_jenismapel->get_id($id);
		echo json_encode($data);
	}

	public function simpan(){
		$data = array(				
				'nama_jenismapel' => $this->input->post('nama_jenismapel'),
				'keterangan' => $this->input->post('keterangan')			
			);
		$insert = $this->m_jenismapel->add($data);
		 $this->session->set_flashdata('msg', 
            '<div class="alert alert-info">
                <strong>Simpan Berhasil !</strong>                
            </div>');
		echo json_encode(array("status" => TRUE));
	}

	public function edit($id){
		$data = array(
				'nama_jenismapel' => $this->input->post('nama_jenismapel'),
				'keterangan' => $this->input->post('keterangan')
			);
		$this->m_jenismapel->update(array('id_jenismapel' => $id), $data);
		$this->session->set_flashdata('msg', 
            '<div class="alert alert-info">
                <strong>Update Berhasil !</strong>                
            </div>');
		echo json_encode(array("status" => TRUE));
	}

	public function hapus($id)
	{
		$this->m_jenismapel->delete($id);
		$this->session->set_flashdata('msg', 
            '<div class="alert alert-info">
                <strong>Hapus Berhasil !</strong>                
            </div>');
		redirect('jenismapel','refresh');
	}

}

/* End of file Jenismapel.php */
/* Location: ./application/controllers/Jenismapel.php */