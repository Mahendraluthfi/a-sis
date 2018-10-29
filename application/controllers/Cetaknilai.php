<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cetaknilai extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_nilai');
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
	    $cek = $this->m_nilai->cek_wali()->num_rows();
	    if ($cek > 0) {
			// echo "ada";
	    	$data['rombel'] = $this->m_nilai->get_rombel_raport()->result();
			$data['content'] = 'nilai/raport';	    	
	    }else{
	    	$this->session->set_flashdata('denided', 
            '<div class="alert alert-danger">
                <h4>Maaf</h4>
                <p>Menu Cetak Raport hanya tersedia bagi Wali Kelas.</p>
                <p>Hubungi Administrator untuk proses lebih lanjut.</p>
            </div>');
			$data['content'] = 'denided';	    		    	
			// echo "ga ada";
	    }
		$this->load->view('index', $data);				
	}

	public function get_siswa($id)
	{
		$data = $this->m_nilai->entrynew($id)->result();
		echo json_encode($data);
	}
	
	public function raportpdf($ids,$idr,$smt)
	{
		$cek = $this->m_nilai->nps($ids,$idr,$smt)->num_rows();
		if (empty($cek)) {
			$this->session->set_flashdata('msg', 
            '<div class="alert alert-danger">
                <h4>Maaf</h4>
                <p>Data Tidak Ditemukan.</p>                
            </div>');
			redirect('cetaknilai','refresh');
		}else{
			$nama = $this->m_nilai->get_n($ids);
			$rombel = $this->m_nilai->get_r($idr);
			foreach ($nama->result() as $key) {
				$data['nama'] = $key->nama;
			}
			foreach ($rombel->result() as $key1) {
				$data['rombel'] = $key1->nama_rombel;
			}
			$data['data'] = $this->m_nilai->nps($ids,$idr,$smt)->result();						
			if ($this->uri->segment(6) == "pdf") {
				$this->pdf->load_view('nilai/cetakraport', $data);		
				$this->pdf->render();
				$this->pdf->stream($data['nama']."-".$data['rombel']."-".$smt.".pdf");				
			}else{
				$this->load->view('nilai/cetakraportexcel', $data);
			}
		}
	}	
}

/* End of file Cetaknilai.php */
/* Location: ./application/controllers/Cetaknilai.php */