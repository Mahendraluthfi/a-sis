<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setbayar extends CI_Controller {

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
		$data['content'] = 'pembayaran/setbayar';
		$this->load->view('index', $data);	
	}

	public function edit($id)
	{
		$pilih	= $this->m_bayar->get_config($id)->result();	
		foreach ($pilih as $key) {
			$idkls = $key->id_kelas;
			$a = $key->opsi_a;
			$b = $key->opsi_b;
			$c = $key->opsi_c;
			$d = $key->opsi_d;
		}
		$data = array(
			'siswa' => $this->m_bayar->config_list_siswa($idkls)->result(),
			'pilih' => $pilih,
			'content' => 'pembayaran/config',
			'a' => $a,
			'b' => $b,
			'c' => $c,
			'd' => $d
		);		
		$this->load->view('index', $data);	
		// print_r($pilih);		
	}	

	public function simpan()
	{
		$id = $this->input->post('idpilihan');
		$opsi = $this->input->post('opsi');
		$jenis = $this->input->post('jenis');		
		if ($jenis > 1) {
			foreach ($opsi as $key => $value) {
				$data = array(
					'id_siswa' => $key,
					'id_ta' => $this->get_ta_aktif(),
					'id_jenis' => $id,
					'tagihan' => $value
				);
				$this->db->insert('sis_pmb_rutin', $data);			
			}
			$this->db->where('id', $id);
			$this->db->update('sis_pilihanbayar', array('save' => '1'));
		}else{
			foreach ($opsi as $key => $value) {
				$data = array(
					'id_siswa' => $key,
					'id_ta' => $this->get_ta_aktif(),
					'id_jenis' => $id,
					'tagihan' => $value,
					'sisa' => $value
				);
				$this->db->insert('sis_pmb_angsur', $data);			
			}
			$this->db->where('id', $id);
			$this->db->update('sis_pilihanbayar', array('save' => '1'));
		}
		// echo $jenis;
		redirect('setbayar');
	}

	public function get_pilihan($id)
	{
		$data = $this->db->get_where('sis_pilihanbayar', array('id' => $id))->row();
		echo json_encode($data);
	}

	public function get_tagihan($id,$tipe)
	{
		$data = $this->m_bayar->edit($id,$tipe)->row();
		echo json_encode($data);
	}

	public function edit_set($id,$jns)
	{
		if ($jns > 1) {
			$set = $this->m_bayar->get_row_bayar2($id)->result();
			foreach ($set as $key) {
				$data['pbyr'] = $this->db->get_where('sis_pilihanbayar', array('id' => $key->id_jenis))->result();
			}
			$data['set'] = $set;
			$data['content'] = 'pembayaran/edit_config';
			$this->load->view('index', $data);
		}else{
			$set = $this->m_bayar->get_row_bayar3($id)->result();
			foreach ($set as $key) {
				$data['pbyr'] = $this->db->get_where('sis_pilihanbayar', array('id' => $key->id_jenis))->result();
			}
			$data['set'] = $set;
			$data['content'] = 'pembayaran/edit_config';
			$this->load->view('index', $data);
		}
	}

	public function simpanedit()
	{
		$id = $this->input->post('id');
		$tipe = $this->input->post('tipe');
		$pilih = $this->input->post('pilih');
		if ($tipe > 1) {
			$this->db->where('id', $id);
			$this->db->update('sis_pmb_rutin', array('tagihan' => $pilih));
		}else{
			$s = $this->db->get('sis_pmb_angsur', array('id' => $id))->result();
			foreach ($s as $a) {
				$sisa = $a->tagihan - $a->sisa;
			}
			$esisa = $pilih - $sisa;
			$this->db->where('id', $id);
			$this->db->update('sis_pmb_angsur', array('tagihan' => $pilih, 'sisa' => $esisa));
		}
		redirect('setbayar','refresh');
	}
}

/* End of file Setbayar.php */
/* Location: ./application/controllers/Setbayar.php */