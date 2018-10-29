<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rencana extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_rencana');
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

	public function acak($long)
	{
		$char = 'ABCdefghIJKLmnopQRStuvWxYz1234567890';
		$string = '';
		for ($i=0; $i < $long; $i++) { 
			# code...
			$pos = rand(0, strlen($char)-1);
			$string .= $char{$pos};
		}
		return $string;
	}

	public function index()
	{		
		$data['get'] = $this->m_rencana->get()->result();
		$data['content'] = 'keuangan/rencana';
		$data['page'] = '';
		$this->load->view('index', $data);				
	
	}

	public function get_trans($id)
	{
		$data = $this->m_rencana->get_jenis($id);
		echo json_encode($data);
	}

	public function idrencana($id)
	{
		$data = $this->m_rencana->detail($id)->row();
		echo json_encode($data);
	}

	public function simpan()
	{
		$data = array(
			'nm_anggaran' => $this->input->post('nm_anggaran'),
			'awal_periode' => substr($this->input->post('periode'), 0,10),
			'akhir_periode' => substr($this->input->post('periode'), 13,10),
			'pencatat' => $this->session->userdata('id'),
			'status' => '0'
		);		
		$insert = $this->m_rencana->add($data);
		$this->session->set_flashdata('msg', 
            '<div class="alert alert-info">
                <strong>Simpan Berhasil !</strong>                
            </div>');
		echo json_encode(array("status" => TRUE));
	}

	public function get_rencana($id)
	{		
		$id = $this->uri->segment(3);	
		$data['akun'] = $this->m_akun->get()->result();		
		$data['get'] = $this->m_rencana->get()->result();
		$cek = $this->m_rencana->detail($id)->num_rows();
		$data['get_id'] = $this->m_rencana->detail($id)->result();
		foreach ($data['get_id'] as $key) {
			$ttp = $key->tetapkan;
		}
		if ($ttp == '0') {
			$data['page'] = 'keuangan/show_rencana';			
		}else{
			$data['page'] = 'keuangan/show_rencana2';						
		}
		$data['masuk'] = $this->m_rencana->get_detail('m',$id)->result();
		$data['keluar'] = $this->m_rencana->get_detail('k',$id)->result();
		$data['id']	= $id;
		$data['content'] = 'keuangan/rencana';
		$this->load->view('index', $data);
	}	

	public function s_root()
	{
		$data = array(
			'id' => 'J_'.$this->acak(7),
			'nm_jenis_trans' => $this->input->post('nm_jenis_trans'),
			'rencana_anggaran' => $this->input->post('idrab'),			
			'jenis_trans' => $this->input->post('jenis'),			
			'nominal' => $this->input->post('nominal'),			
			'debit' => $this->input->post('debit'),			
			'kredit' => $this->input->post('kredit'),			
			'keterangan' => $this->input->post('keterangan')			
		);		
		$insert = $this->m_rencana->add_root($data);		
		echo json_encode(array("status" => TRUE));	
	}

	public function s_edit($id)
	{
		$data = array(			
			'nm_jenis_trans' => $this->input->post('nm_jenis_trans'),			
			// 'jenis_trans' => $this->input->post('jenis'),			
			'nominal' => $this->input->post('nominal'),			
			'debit' => $this->input->post('debit'),			
			'kredit' => $this->input->post('kredit'),			
			'keterangan' => $this->input->post('keterangan')			
		);		
		$this->db->where('id', $id);
		$this->db->update('sis_jenis_transaksi', $data);
		echo json_encode(array("status" => TRUE));	
	}

	public function hapus($id,$idr)
	{
		$this->db->where('id', $id);
		$this->db->delete('sis_jenis_transaksi');
		redirect('rencana/get_rencana/'.$idr);
	}

	public function edit($id)
	{
		$this->db->where('id', $id);
		$this->db->update('sis_rencana_anggaran', array('nm_anggaran' => $this->input->post('nm_anggaran')));
		redirect('rencana/get_rencana/'.$id);
	}

	public function hapus_r($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('sis_rencana_anggaran');

		$this->db->where('rencana_anggaran', $id);	
		$this->db->delete('sis_jenis_transaksi');
		redirect('rencana');
	}

	public function save($id)
	{
		$this->db->where('id', $id);
		$this->db->update('sis_rencana_anggaran', array('tetapkan' => '1'));
		$this->session->set_flashdata('msg', 
            '<div class="alert alert-info">
                <strong>Simpan Berhasil !</strong>                
            </div>');
		redirect('rencana/get_rencana/'.$id);
	}

	public function aktif($id)
	{
		$this->db->update('sis_rencana_anggaran', array('status' => '0'));
		
		$this->db->where('id', $id);
		$this->db->update('sis_rencana_anggaran', array('status' => '1'));					
		$this->session->set_flashdata('msg', 
            '<div class="alert alert-info">
                <strong>Simpan Berhasil !</strong>                
            </div>');
		redirect('rencana/get_rencana/'.$id);	
	}

	
}

/* End of file Rencana.php */
/* Location: ./application/controllers/Rencana.php */