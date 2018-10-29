<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_guru');
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
		$data['get'] = $this->m_guru->get()->result();
		$data['content'] = 'akademik/guru';
		$this->load->view('index', $data);
	}

	public function get($id)
	{
		$data = $this->m_guru->get_id($id);
		echo json_encode($data);
	}

	public function simpan(){
		$data = array(				
				'nip' => $this->input->post('nip'),
				'nama_guru' => $this->input->post('nama_guru'),
				'jekel' => $this->input->post('jekel'),
				'no_hp' => $this->input->post('no_hp'),
				'alamat' => $this->input->post('alamat')
			);
		$data2 = array(
				'id_akses' => $this->input->post('nip'),
				'username' => $this->input->post('nama_guru'),
				'password' => md5($this->input->post('nip')),
				'level' => 'guru'				
			);
		$this->db->insert('sis_level', $data2);
		$insert = $this->m_guru->add($data);
		 $this->session->set_flashdata('msg', 
            '<div class="alert alert-info">
                <strong>Simpan Berhasil !</strong>                
            </div>');
		echo json_encode(array("status" => TRUE));
	}

	public function edit($id){
		$data = array(
				'nip' => $this->input->post('nip'),
				'nama_guru' => $this->input->post('nama_guru'),
				'jekel' => $this->input->post('jekel'),
				'no_hp' => $this->input->post('no_hp'),
				'alamat' => $this->input->post('alamat')
			);
		$this->m_guru->update(array('kode_guru' => $id), $data);
		$this->session->set_flashdata('msg', 
            '<div class="alert alert-info">
                <strong>Update Berhasil !</strong>                
            </div>');
		echo json_encode(array("status" => TRUE));
	}

	public function hapus($id)
	{
		$this->m_guru->delete($id);
		$this->session->set_flashdata('msg', 
            '<div class="alert alert-info">
                <strong>Hapus Berhasil !</strong>                
            </div>');
		redirect('guru','refresh');
	}

	public function alokasi($id)
	{
	 	$data['get1'] = $this->m_guru->get_guru($id);
	 	$data['get'] = $this->m_guru->get_mapel($id);
	 	$data['get2'] = $this->m_guru->get_mapel2($id);
		$data['content'] = 'akademik/alokasiguru';
		$this->load->view('index', $data);
	}

	public function alokasisimpan($id)
	{
		$cb = $this->input->post('cb');
		foreach ($cb as $key => $value) {
			$this->db->insert('sis_alokasiguru', array(
				'kode_guru' => $id,
				'id_mapel' => $key
			));
		}
		$this->session->set_flashdata('msg', 
			'<div class="alert alert-info">
                <strong>Simpan Berhasil !</strong>                
            </div>');
        redirect('guru/alokasi/'.$id);			
	}

	public function alokasihapus($id)
	{
		$cb = $this->input->post('cb');
		foreach ($cb as $key => $value) {
			$this->db->where('id', $key);
			$this->db->delete('sis_alokasiguru');
		}
		$this->session->set_flashdata('msg', 
			'<div class="alert alert-info">
                <strong>Hapus Berhasil !</strong>                
            </div>');
        redirect('guru/alokasi/'.$id);				
	}

	// public function cek()
	// {
	// 	$this->load->model('m_access');
	// 	$cek = $this->m_access->access()->num_rows();
	// 	echo $cek;		
	// 	echo $this->uri->segment(1);
	// }
}

/* End of file Guru.php */
/* Location: ./application/controllers/Guru.php */