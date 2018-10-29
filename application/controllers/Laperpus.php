<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laperpus extends CI_Controller {

	public function __construct()
	{
		parent::__construct();	
		$this->load->model('m_transaksi');
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
	}

	public function index()
	{	
		$data['page'] = 'perpustakaan/blank';
		$data['content'] = 'perpustakaan/laporan';
		$this->load->view('index', $data);			
	}

	public function cari()
	{
		$jenis = $this->input->post('jenis');
		$month = substr($this->input->post('bulan'), 0,2); 
		$year = substr($this->input->post('bulan'), 3,4); 
		if ($jenis == '1') {		
			$view = $this->m_transaksi->peminjaman($month,$year)->result();
			foreach ($view as $key => $value) {
				$value->detail = $this->m_transaksi->show3($value->no_peminjaman);
			}
			$data['page'] = 'perpustakaan/view_peminjaman';
			$data['title'] = 'Laporan Peminjaman Buku Bulan '.$month.' Tahun '.$year;
		}else{
			$view = $this->m_transaksi->pengembalian($month,$year)->result();
			$data['page'] = 'perpustakaan/view_pengembalian';			
			$data['title'] = 'Laporan Pengembalian Buku Bulan '.$month.' Tahun '.$year;			
		}
		$data['view'] = $view;
		$data['content'] = 'perpustakaan/laporan';
		$this->load->view('index', $data);			

	}
}

/* End of file Laperpus.php */
/* Location: ./application/controllers/Laperpus.php */