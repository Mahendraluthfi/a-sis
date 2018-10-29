<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenisbayar extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
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
		$data['get'] = $this->db->get_where('sis_jenisbayar', array('status' => 1))->result();
		$data['content'] = 'pembayaran/jenisbayar';
		$this->load->view('index', $data);
	}

	public function get($id)
	{
		$data = $this->db->get_where('sis_jenisbayar', array('id' => $id))->row();
		echo json_encode($data);
	}

	public function simpan(){
		$data = array(				
				'kode_jenis' => $this->input->post('kode_jenis'),
				'nama_jenis' => $this->input->post('nama_jenis'),
				'tipe_jenis' => $this->input->post('tipe_jenis'),			
				'ket' => $this->input->post('ket')			
			);
		 $this->db->insert('sis_jenisbayar', $data);
		 $this->session->set_flashdata('msg', 
            '<div class="alert alert-info">
                <strong>Simpan Berhasil !</strong>                
            </div>');
		echo json_encode(array("status" => TRUE));
	}

	public function edit($id){
		$data = array(
			'kode_jenis' => $this->input->post('kode_jenis'),
			'nama_jenis' => $this->input->post('nama_jenis'),
			'tipe_jenis' => $this->input->post('tipe_jenis'),			
			'ket' => $this->input->post('ket')			
			);
		$this->db->where('id', $id);
		$this->db->update('sis_jenisbayar', $data);
		$this->session->set_flashdata('msg', 
            '<div class="alert alert-info">
                <strong>Update Berhasil !</strong>                
            </div>');
		echo json_encode(array("status" => TRUE));
	}

	public function hapus($id)
	{
		$this->db->where('id', $id);
		$this->db->update('sis_jenisbayar', array('status' => 0));
		$this->session->set_flashdata('msg', 
            '<div class="alert alert-info">
                <strong>Hapus Berhasil !</strong>                
            </div>');
		redirect('jenisbayar','refresh');
	}

}

/* End of file Jenisbayar.php */
/* Location: ./application/controllers/Jenisbayar.php */