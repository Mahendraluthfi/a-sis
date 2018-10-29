<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_kelas');
		$this->load->model('m_jenjang');
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
		$data['get'] = $this->m_kelas->get()->result();
		$data['get2'] = $this->m_jenjang->get()->result();		
		$data['content'] = 'akademik/kelas';
		$this->load->view('index', $data);
	}

	public function get($id)
	{
		$data = $this->m_kelas->get_id($id);
		echo json_encode($data);
	}

	public function simpan(){
		$data = array(
				'id_jenjang' => $this->input->post('id_jenjang'),
				'nama_kelas' => $this->input->post('nama_kelas'),
				'keterangan' => $this->input->post('keterangan'),			
			);
		$insert = $this->m_kelas->add($data);
		 $this->session->set_flashdata('msg', 
            '<div class="alert alert-info">
                <strong>Simpan Berhasil !</strong>                
            </div>');
		echo json_encode(array("status" => TRUE));
	}

	public function edit($id){
		$data = array(
				'id_jenjang' => $this->input->post('id_jenjang'),			
				'nama_kelas' => $this->input->post('nama_kelas'),
				'keterangan' => $this->input->post('keterangan')
			);
		$this->m_kelas->update(array('id_kelas' => $id), $data);
		$this->session->set_flashdata('msg', 
            '<div class="alert alert-info">
                <strong>Update Berhasil !</strong>                
            </div>');
		echo json_encode(array("status" => TRUE));
	}

	public function hapus($id)
	{
		$this->m_kelas->delete($id);
		$this->session->set_flashdata('msg', 
            '<div class="alert alert-info">
                <strong>Hapus Berhasil !</strong>                
            </div>');
		redirect('kelas','refresh');
	}

}

/* End of file Kelas.php */
/* Location: ./application/controllers/Kelas.php */