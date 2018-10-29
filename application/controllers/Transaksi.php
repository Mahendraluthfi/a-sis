<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

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
	    // if ($this->access->priv() == false ) {
	    // 	$this->session->set_flashdata('msg', 
     //        '<div class="alert alert-danger">
     //            <h4>Maaf</h4>
     //            <p>Anda tidak mempunyai akses !</p>
     //        </div>');
	    //     redirect('dashboard');	
	    // }
	}

	public function peminjaman()
	{
		$ses_unset = array('sis_siswa', 'no');	
		$this->session->unset_userdata($ses_unset);				
		$data['get'] = $this->m_transaksi->get()->result();
		$data['content'] = 'perpustakaan/peminjaman';
		$this->load->view('index', $data);			
	}

	public function pengembalian()
	{
		$data['r1'] = "";
		$data['r2'] = "";
		$data['content'] = 'perpustakaan/pengembalian';
		$this->load->view('index', $data);			
	}

	public function form()
	{
		$tgl = date('Y-m-d');
		$ids = $this->uri->segment(3);
		if (!empty($ids)) {
			$array = array(
				'sis_siswa' => $ids
			);			
			$this->session->set_userdata( $array );
			$data['buku'] = $this->m_buku->get()->result();
			$data['no'] = $this->m_getnoreg->get_nopm($tgl);
			$data['i_siswa'] = $this->m_transaksi->get_s($ids)->result();
		}
		//$this->session->unset_userdata("sis_siswa");
		if (!empty($this->session->userdata('no'))) {
			$sesno = $this->session->userdata('no');
			$data['get'] = $this->m_transaksi->get_detp($sesno) ->result();			
		}
		$data['siswa'] = $this->m_transaksi->get_siswa()->result();			
		$data['content'] = 'perpustakaan/form_p';
		$this->load->view('index', $data);
	}

	public function simpan()
	{
		$no = $this->input->post('no');
		$idb = $this->input->post('buku');
		$jml = $this->input->post('jml');
		$cek = $this->db->query("SELECT * from sis_det_peminjaman where no_peminjaman='$no' and id_buku='$idb'");
		if ($cek->num_rows() > 0) {
			$this->db->query("UPDATE sis_det_peminjaman set jml=jml+$jml where no_peminjaman='$no' and id_buku='$idb'");
		}else{
			$isi = array(
				'no_peminjaman' => $no, 
				'id_buku' => $idb, 
				'jml' => $jml 			
			);
			$this->db->insert('sis_det_peminjaman', $isi);			
		}
		$array = array(
			'no' => $this->input->post('no')
		);
		$this->session->set_userdata( $array );			
		redirect('transaksi/form/'.$this->input->post('ids'));
	}

	public function hapus_p($id)
	{
		$this->db->where('id_peminjaman', $id);
		$this->db->delete('sis_det_peminjaman');
		redirect('transaksi/form/'.$this->session->userdata('sis_siswa'));	
	}

	public function hapusall($no)
	{
		$this->db->where('no_peminjaman', $no);
		$this->db->delete('sis_peminjaman');
		$this->db->where('no_peminjaman', $no);
		$this->db->delete('sis_det_peminjaman');
		$this->session->set_flashdata('msg', 
            '<div class="alert alert-info">
                <strong>Hapus Berhasil !</strong>                
            </div>');	
		redirect('transaksi/peminjaman');
	}

	public function simpanpinjam()
	{		
		$tglp = substr($this->input->post('tgl'), 0,10);
		$tglk = substr($this->input->post('tgl'), 13,10);
		$isi = array(
			'no_peminjaman' => $this->input->post('nopmj'),
			'id_siswa' => $this->input->post('ids'),
			'tanggal_pinjam' => $tglp,
			'tanggal_kembali' => $tglk,
			'status' => 'PROSES'
		);
		$this->db->insert('sis_peminjaman', $isi);	
		$ses_unset = array('sis_siswa', 'no');	
		$this->session->unset_userdata($ses_unset);	
		$this->session->set_flashdata('msg', 
            '<div class="alert alert-info">
                <strong>Simpan Berhasil !</strong>                
            </div>');	
		redirect('transaksi/peminjaman'); 		
	}

	public function get1($id)
	{
		$data = $this->m_transaksi->show1($id)->row();
		echo json_encode($data);
	}

	public function get2($id)
	{
		$data = $this->m_transaksi->show3($id);
		echo json_encode($data);
	}
	
	public function kembali()
	{
		$no = "PMJ-".$this->input->post('no');
		$db = $this->db->query("SELECT * FROM sis_peminjaman where no_peminjaman='$no' and status='PROSES'");
		if ($db->num_rows() > 0) {
			$data['r1'] = $this->m_transaksi->show1($no)->result();
			$data['r2'] = $this->m_transaksi->show2($no);
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
		$dt = date('Y-m-d');
		$tglk = strtotime($this->input->post('tglk'));
		$t = date('Y-m-d', $tglk);		
		$db = $this->db->get('sis_denda')->result();
		$selisih=(strtotime($dt)-$tglk)/(60*60*24);		
		foreach ($db as $dnd) {
			$denda = $dnd->denda;
		}	
		if ($t >= $dt) {
			$byr = 0;
		}else{
			$byr = $selisih * $denda;
		}
		$object = array(
			'status' => 'SELESAI',
			'denda' => $byr
		);		
		$cb = $this->input->post('cb');
		$ccb = count($cb);
		foreach ($cb as $key => $value) {
			$this->db->where('id_peminjaman', $key);
			$this->db->update('sis_det_peminjaman', $object);				
		}
		$db = $this->db->query("SELECT * FROM sis_det_peminjaman where no_peminjaman='$no' and status='PROSES'");		
		if ($db->num_rows()>0) {}else{
			$this->db->where('no_peminjaman', $no);
			$this->db->update('sis_peminjaman', array('status' => 'SELESAI'));
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
		redirect('transaksi/pengembalian');		
	}
}

/* End of file Transaksi.php */
/* Location: ./application/controllers/Transaksi.php */