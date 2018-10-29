<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mapel extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_mapel');
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
		$data['get'] = $this->m_mapel->get()->result();
		$data['get2'] = $this->m_jenismapel->get()->result();		
		$data['content'] = 'akademik/mapel';
		$this->load->view('index', $data);
	}

	public function get($id)
	{
		$data = $this->m_mapel->get_id($id);
		echo json_encode($data);
	}

	public function simpan(){
		$data = array(
				'id_jenismapel' => $this->input->post('id_jenismapel'),
				'nama_mapel' => $this->input->post('nama_mapel'),
				'keterangan' => $this->input->post('keterangan'),			
			);
		$insert = $this->m_mapel->add($data);
		 $this->session->set_flashdata('msg', 
            '<div class="alert alert-info">
                <strong>Simpan Berhasil !</strong>                
            </div>');
		echo json_encode(array("status" => TRUE));
	}

	public function edit($id){
		$data = array(
				'id_jenismapel' => $this->input->post('id_jenismapel'),			
				'nama_mapel' => $this->input->post('nama_mapel'),
				'keterangan' => $this->input->post('keterangan')
			);
		$this->m_mapel->update(array('id_mapel' => $id), $data);
		$this->session->set_flashdata('msg', 
            '<div class="alert alert-info">
                <strong>Update Berhasil !</strong>                
            </div>');
		echo json_encode(array("status" => TRUE));
	}

	public function hapus($id)
	{
		$this->m_mapel->delete($id);
		$this->session->set_flashdata('msg', 
            '<div class="alert alert-info">
                <strong>Hapus Berhasil !</strong>                
            </div>');
		redirect('mapel','refresh');
	}

	public function alokasi($id)
	{
	 	$data['get1'] = $this->m_mapel->get_mapel($id);
	 	$data['get'] = $this->m_mapel->get_kelas($id);
	 	$data['get2'] = $this->m_mapel->get_kelas2($id);
		$data['content'] = 'akademik/alokasimapel';
		$this->load->view('index', $data);
	}

	public function alokasisimpan($id)
	{
		$cb = $this->input->post('cb');
		foreach ($cb as $key => $value) {
			$this->db->insert('sis_alokasimapel', array(
				'id_mapel' => $id,
				'id_kelas' => $key
			));
		}
		$this->session->set_flashdata('msg', 
			'<div class="alert alert-info">
                <strong>Simpan Berhasil !</strong>                
            </div>');
        redirect('mapel/alokasi/'.$id);			
	}

	public function alokasihapus($id)
	{
		$cb = $this->input->post('cb');
		foreach ($cb as $key => $value) {
			$this->db->where('id', $key);
			$this->db->delete('sis_alokasimapel');
		}
		$this->session->set_flashdata('msg', 
			'<div class="alert alert-info">
                <strong>Hapus Berhasil !</strong>                
            </div>');
        redirect('mapel/alokasi/'.$id);				
	}
}

/* End of file Mapel.php */
/* Location: ./application/controllers/Mapel.php */