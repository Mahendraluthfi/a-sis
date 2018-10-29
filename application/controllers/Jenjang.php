<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenjang extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
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
		$data['get'] = $this->m_jenjang->get()->result();
		$data['paket'] = $this->m_jenjang->get_paket()->result();
		$data['content'] = 'akademik/jenjang';
		$this->load->view('index', $data);
	}

	public function get($id)
	{
		$data = $this->m_jenjang->get_id($id);
		echo json_encode($data);
	}

	public function simpan(){
		$data = array(
				'kd_jenjang' => $this->input->post('kd_jenjang'),
				'nama_jenjang' => $this->input->post('nama_jenjang'),
				'keterangan' => $this->input->post('keterangan'),			
			);
		$insert = $this->m_jenjang->add($data);
		 $this->session->set_flashdata('msg', 
            '<div class="alert alert-success">
                <strong>Simpan Berhasil !</strong>                
            </div>');
		echo json_encode(array("status" => TRUE));
	}

	public function simpanpaket(){
		$pkt = $this->input->post('pkt');
		$a = $this->m_jenjang->paket($pkt)->result();
		foreach ($a as $da) {
			$idp = $da->id_paket;
			$ar = array(				
				'kd_jenjang' => $da->kode_paket,
				'nama_jenjang' => $da->nama_paket,
				'paket' => $da->id_paket				
			);
			$this->db->insert('sis_jenjang', $ar);
		}
		$b = $this->m_jenjang->get_paket_id($idp)->result();
		foreach ($b as $db) {
			$idj = $db->id_jenjang;
		}
		$c = $this->m_jenjang->paket_isi($pkt)->result();
		foreach ($c as $dc) {
			$arc = array(
				'id_jenjang' => $idj,
				'nama_kelas' => $dc->nama_isi
			);
			$this->db->insert('sis_kelas', $arc);
		}
		echo json_encode(array("status" => TRUE));
	}

	public function edit($id){
		$data = array(
				'kd_jenjang' => $this->input->post('kd_jenjang'),			
				'nama_jenjang' => $this->input->post('nama_jenjang'),
				'keterangan' => $this->input->post('keterangan')
			);
		$this->m_jenjang->update(array('id_jenjang' => $id), $data);
		$this->session->set_flashdata('msg', 
            '<div class="alert alert-info">
                <strong>Update Berhasil !</strong>                
            </div>');
		echo json_encode(array("status" => TRUE));
	}

	public function hapus($id)
	{		
		$this->db->where('id_jenjang', $id);
		$this->db->update('sis_jenjang', array('aktif' => 0));
		$this->session->set_flashdata('msg', 
        '<div class="alert alert-info">
            <strong>Hapus Berhasil !</strong>                
        </div>');
        redirect('jenjang','refresh');		
	}

}

/* End of file Jenjang.php */
/* Location: ./application/controllers/Jenjang.php */