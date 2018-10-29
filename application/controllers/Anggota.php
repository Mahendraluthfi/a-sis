<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_anggota');
		if($this->auth->is_logged_in() == false)
	    {
	         $this->session->set_flashdata('msg', 
            '<div class="alert alert-danger">
                <h4>Maaf</h4>
                <p>Anda Belum Login !</p>
            </div>');
	        redirect('login');
	    }
	    // if ($this->access->priv() == false ) {
	    // 	$this->session->set_flashdata('msg', 
     //        '<div class="alert alert-danger">
     //            <h4>Maaf</h4>
     //            <p>Anda tidak mempunyai akses !</p>
     //        </div>');
	    //     redirect('dashboard');	
	    // }
	}

	public function index()
	{
		$data['content'] = 'perpustakaan/anggota';
		$data['anggota'] = $this->m_anggota->get()->result();
		$this->load->view('index', $data);	
	}

	public function add()
	{
		$data['kelas'] = $this->m_anggota->get_kelas()->result();
		$data['content'] = 'perpustakaan/anggota_add';
		$this->load->view('index', $data);	
	}

	public function get_rombel()
	{
		$id = $this->input->post('id');
		$data = $this->m_anggota->get_rombel($id)->result();
		echo json_encode($data);
	}

	public function get_siswa()
	{
		$id = $this->input->post('id');
		$data = $this->m_anggota->get_siswa($id)->result();
		echo json_encode($data);
	}

	public function acak($long)
	{
		$char = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
		$string = '';
		for ($i=0; $i < $long; $i++) { 			
			$pos = rand(0, strlen($char)-1);
			$string .= $char{$pos};
		}
		return $string;
	}

	public function simpan()
	{
		$id_siswa = $this->input->post('siswa');
		$no_anggota = date('my').'-'.$this->acak(4);
		$data = array(
			'id_anggota' => $no_anggota,
			'id_siswa' => $id_siswa,
			'tgl_daftar' => date('Y-m-d'),
			'status' => '1'
		);
		$this->db->insert('sis_anggota', $data);
		$this->session->set_flashdata('msg', 
            '<div class="alert alert-info">
                <strong>Simpan Berhasil !</strong>                
            </div>');
		redirect('anggota','refresh');
	}

	public function cetakkartu($id)
	{
		$data = array(
			'anggota' => $this->m_anggota->get_id($id)->result(),
			'reg' => $this->db->get('sis_reg_user')->result()
		);
		$this->load->view('perpustakaan/cetak_kartu', $data);
	}
}

/* End of file Anggota.php */
/* Location: ./application/controllers/Anggota.php */