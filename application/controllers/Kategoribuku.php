<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategoribuku extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_kategoribuku');
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
		$data['get'] = $this->m_kategoribuku->get()->result();
		$data['content'] = 'perpustakaan/kategoribuku';
		$this->load->view('index', $data);
	}

	public function get($id)
	{
		$data = $this->m_kategoribuku->get_id($id);
		echo json_encode($data);
	}

	public function simpan(){
		$data = array(				
				'nama_kategori' => $this->input->post('nama_kategori'),
				'keterangan' => $this->input->post('keterangan')			
			);
		$insert = $this->m_kategoribuku->add($data);
		 $this->session->set_flashdata('msg', 
            '<div class="alert alert-info">
                <strong>Simpan Berhasil !</strong>                
            </div>');
		echo json_encode(array("status" => TRUE));
	}

	public function edit($id){
		$data = array(
				'nama_kategori' => $this->input->post('nama_kategori'),
				'keterangan' => $this->input->post('keterangan')
			);
		$this->m_kategoribuku->update(array('id_kategori' => $id), $data);
		$this->session->set_flashdata('msg', 
            '<div class="alert alert-info">
                <strong>Update Berhasil !</strong>                
            </div>');
		echo json_encode(array("status" => TRUE));
	}

	public function hapus($id)
	{
		$this->m_kategoribuku->delete($id);
		$this->session->set_flashdata('msg', 
            '<div class="alert alert-info">
                <strong>Hapus Berhasil !</strong>                
            </div>');
		redirect('kategoribuku','refresh');
	}

}

/* End of file Kategoribuku.php */
/* Location: ./application/controllers/Kategoribuku.php */