<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengembalian extends CI_Controller {

	public function __construct()
	{
		parent::__construct();		
		date_default_timezone_set("Asia/Bangkok");			
		$this->load->model('m_transaksi');
		$this->load->model('m_getnoreg');
		$this->load->model('m_buku');
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
		$data['r1'] = "";
		$data['r2'] = "";
		$data['content'] = 'perpustakaan/pengembalian';
		$this->load->view('index', $data);			
	}		
	
	public function kembali()
	{
		$no = $this->input->post('no');
		$db = $this->db->query("SELECT * FROM sis_peminjaman where id_anggota='$no' and status='PROSES'");
		foreach ($db->result() as $key => $value) {
			$noid = $value->no_peminjaman;
		}
		if ($db->num_rows() > 0) {
			$data['r1'] = $this->m_transaksi->show1($noid)->result();
			$data['r2'] = $this->m_transaksi->show2($noid);
			$data['content'] = 'perpustakaan/pengembalian';
			$this->load->view('index', $data);
		}else{
			$this->session->set_flashdata('msg', 
            '<div class="alert alert-danger">
                <strong>Peminjaman tidak ditemukan !</strong>                
            </div>');	
			redirect('transaksi/pengembalian');		
		}
	}


	public function checkout(){
		$no = $this->input->post('no');
		$db = $this->db->get('sis_denda')->result();
		foreach ($db as $dnd) {
			$denda = $dnd->denda;
			$max = $dnd->max;
		}

		$dt = date('Y-m-d');
		$tglp = strtotime($this->input->post('tglp'));
		$t = date('Y-m-d', $tglp);		
		
		$selisih=(strtotime($dt)-$tglp)/(60*60*24);		

		if ($selisih > $max) {
			$hitung = $selisih - $max;
			$byr = $hitung * $denda;
		}else{
			$byr = 0;
		}

		$object = array(
			'status' => 'SELESAI',
			'denda' => $byr
		);	

		$cb = $this->input->post('cb');
		$ccb = count($cb);
		// echo $ccb;
		foreach ($cb as $key => $value) {
			$this->db->where('id_detailbuku', $key);
			$this->db->update('sis_det_peminjaman', $object);				
			$this->db->where('id_detailbuku', $key);
			$this->db->update('sis_detailbuku', array('status' => '1'));
		}
		$db = $this->db->query("SELECT * FROM sis_det_peminjaman where no_peminjaman='$no' and status='PROSES'");		
		if ($db->num_rows()>0) {}else{
			$this->db->where('no_peminjaman', $no);
			$this->db->update('sis_peminjaman', array('status' => 'SELESAI', 'tanggal_kembali' => $dt));
		}		
		$a = $this->m_transaksi->show1($no)->result();
		foreach ($a as $b ) {
			$c = $b->ttl;
		}
		$this->session->set_flashdata('sukses', 
            '<div class="info-box bg-green">
	            <span class="info-box-icon"><i class="fa fa-calendar-check-o"></i></span>
	            <div class="info-box-content">
	            	<span class="info-box-text">NO. PEMINJAMAN '.$no.'</span>
	              	<span class="info-box-number">Pengembalian Berhasil</span>
	              	<div class="progress">
		              	<div class="progress-bar" style="width: 100%"></div>
		            </div>
                	<span class="progress-description">
	                    Jumlah Buku dikembalikan : '.$ccb.'<br>
	                    Denda : Rp. '.$c.'
	                </span>
	            </div>	            
	          </div>');	
		redirect('pengembalian');		
	}

}

/* End of file Pengembalian.php */
/* Location: ./application/controllers/Pengembalian.php */