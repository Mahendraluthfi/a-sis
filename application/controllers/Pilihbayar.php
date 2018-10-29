<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pilihbayar extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_bayar');
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


	public function get_ta_aktif()
	{
		$db = $this->db->get_where('sis_tahunajaran', array('aktif' => '1'))->result();
		foreach ($db as $key) {
			$id = $key->id_angkatan;
		}
		return $id;
	}

	public function index()
	{
		$data['get'] = $this->m_bayar->get_pilihanbayar($this->get_ta_aktif())->result();
		$data['kelas'] = $this->db->get_where('sis_kelas', array('status' => 'AKTIF'))->result();
		$data['jenis'] = $this->db->get_where('sis_jenisbayar', array('status' => 1))->result();		
		$data['content'] = 'pembayaran/pilihpembayaran';
		$this->load->view('index', $data);
	}

	public function get($id)
	{
		$data = $this->db->get_where('sis_pilihanbayar', array('id' => $id))->row();
		echo json_encode($data);
	}

	public function simpan(){
		$data = array(				
				'id_jenis' => $this->input->post('jenis'),
				'id_kelas' => $this->input->post('kelas'),
				'id_ta' => $this->get_ta_aktif(),
				'nama_pilihan' => $this->input->post('nama'),			
				'opsi_a' => $this->input->post('opsia'),			
				'opsi_b' => $this->input->post('opsib'),			
				'opsi_c' => $this->input->post('opsic'),							
				'opsi_d' => $this->input->post('opsid')							
			);
		 $this->db->insert('sis_pilihanbayar', $data);
		 $this->session->set_flashdata('msg', 
            '<div class="alert alert-info">
                <strong>Simpan Berhasil !</strong>                
            </div>');
		echo json_encode(array("status" => TRUE));
	}

	public function edit($id){
		$data = array(				
				'id_jenis' => $this->input->post('jenis'),
				'id_kelas' => $this->input->post('kelas'),
				'nama_pilihan' => $this->input->post('nama'),			
				'opsi_a' => $this->input->post('opsia'),			
				'opsi_b' => $this->input->post('opsib'),			
				'opsi_c' => $this->input->post('opsic'),							
				'opsi_d' => $this->input->post('opsid')							
			);
		$this->db->where('id', $id);
		$this->db->update('sis_pilihanbayar', $data);
		$this->session->set_flashdata('msg', 
            '<div class="alert alert-info">
                <strong>Update Berhasil !</strong>                
            </div>');
		echo json_encode(array("status" => TRUE));
	}

	public function hapus($id)
	{
		$this->db->where('id', $id);
		$this->db->update('sis_pilihanbayar', array('status' => 0));
		$this->session->set_flashdata('msg', 
            '<div class="alert alert-info">
                <strong>Hapus Berhasil !</strong>                
            </div>');
		redirect('pilihbayar','refresh');
	}

}

/* End of file Pilihbayar.php */
/* Location: ./application/controllers/Pilihbayar.php */