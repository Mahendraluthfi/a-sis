<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_akun');
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
		$data['get'] = $this->m_akun->get()->result();
		$data['content'] = 'keuangan/akun';
		$this->load->view('index', $data);
	}

	public function get($id)
	{
		$data = $this->m_akun->get_id($id);
		echo json_encode($data);
	}

	public function simpan(){
		$data = array(				
				'id_akun' => $this->input->post('id_akun'),
				'nama_akun' => $this->input->post('nama_akun'),
				'jenis_akun' => $this->input->post('jenis_akun')			
			);
		$insert = $this->m_akun->add($data);
		 $this->session->set_flashdata('msg', 
            '<div class="alert alert-info">
                <strong>Simpan Berhasil !</strong>                
            </div>');
		echo json_encode(array("status" => TRUE));
	}

	public function edit($id){
		$data = array(
				'nama_akun' => $this->input->post('nama_akun'),
				'jenis_akun' => $this->input->post('jenis_akun')		
			);
		$this->m_akun->update(array('id_akun' => $id), $data);
		$this->session->set_flashdata('msg', 
            '<div class="alert alert-info">
                <strong>Update Berhasil !</strong>                
            </div>');
		echo json_encode(array("status" => TRUE));
	}

	public function hapus($id)
	{
		$this->m_akun->delete($id);
		$this->session->set_flashdata('msg', 
            '<div class="alert alert-info">
                <strong>Hapus Berhasil !</strong>                
            </div>');
		redirect('akun','refresh');
	}

}

/* End of file Akun.php */
/* Location: ./application/controllers/Akun.php */