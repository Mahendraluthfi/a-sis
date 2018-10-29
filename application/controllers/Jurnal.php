<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurnal extends CI_Controller {

	public function __construct()
	{
		parent::__construct();	
		$this->load->model('m_akun');
		$this->load->model('m_rencana');
		$this->load->model('m_jurnal');
		date_default_timezone_set("Asia/Bangkok");					
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
	    $cek = $this->m_rencana->get_aktif()->num_rows();
		if (empty($cek)) {			
			$this->session->set_flashdata('msg', '<div class="alert alert-danger">
                <h4>Maaf</h4>                  
                <p>Anda belum membuat rencana anggaran !</p>
                </div>');
			redirect('rencana');
		}
	}

	public function index()
	{
		$raktif = $this->db->get_where('sis_rencana_anggaran', array('status' => '1'));
		foreach ($raktif->result() as $key) {
			$r_a = $key->id;
		}
		$data = array(
			'content' => 'keuangan/jurnal',
			'akun' => $this->m_akun->get()->result(),
			'jurnal' => $this->m_jurnal->showj($r_a)
			// 'jurnal' => $this->m_rencana->showjurnal()->result()
		);				
		$this->load->view('index', $data);
	}

	public function acak($long)
	{
		$char = 'ABCdefghIJKLmnopQRStuvWxYz1234567890';
		$string = '';
		for ($i=0; $i < $long; $i++) { 			
			$pos = rand(0, strlen($char)-1);
			$string .= $char{$pos};
		}
		return $string;
	}

	public function simpan()
	{
		$raktif = $this->db->get_where('sis_rencana_anggaran', array('status' => '1'));
		foreach ($raktif->result() as $key) {
			$r_a = $key->id;
		}
		$id_transaksi = 'T'.$this->acak(9);
		$dt = date('Y-m-d H:i:s');		
		$transaksi = array(				
			'id' => $id_transaksi,
			'waktu' => $dt,
			'id_jenis_transaksi' => 'undefinied',
			'idr' => $r_a,
			'pencatat' => $this->session->userdata('id'),
			'uraian' => $this->input->post('uraian')
			);
		$jk = array(
			'id_transaksi' => $id_transaksi,
			'akun' => $this->input->post('kredit'),
			'debet' => '0',
			'kredit' => $this->input->post('nominal')
		);
		$jd = array(
			'id_transaksi' => $id_transaksi,
			'akun' => $this->input->post('debet'),
			'debet' => $this->input->post('nominal'),
			'kredit' => '0'
		);
		$this->db->insert('sis_transaksi', $transaksi);
		$this->db->insert('sis_jurnal', $jk);
		$this->db->insert('sis_jurnal', $jd);
		$this->session->set_flashdata('msg', 
            '<div class="alert alert-success">                
                <p>Simpan Berhasil !</p>
            </div>');
		redirect('jurnal');
	}

	public function show()
	{
		// $data = 
		echo json_encode($data);
	}

	public function hapus($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('sis_transaksi');
		$this->db->where('id_transaksi', $id);
		$this->db->delete('sis_jurnal');
		$this->session->set_flashdata('msg', 
            '<div class="alert alert-success">                
                <p>Hapus Berhasil !</p>
            </div>');
		redirect('jurnal');
	}

}

/* End of file Jurnal.php */
/* Location: ./application/controllers/Jurnal.php */