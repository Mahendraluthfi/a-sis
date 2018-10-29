<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_buku');
		$this->load->model('m_kategoribuku');
		$this->load->model('m_rakbuku');
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
		$data['get'] = $this->m_buku->get()->result();
		$data['get2'] = $this->m_kategoribuku->get()->result();		
		$data['get3'] = $this->m_rakbuku->get()->result();		
		$data['content'] = 'perpustakaan/buku';
		$this->load->view('index', $data);
	}

	public function detailbuku($id)
	{
		$data['content'] = 'perpustakaan/detailbuku';
		$data['buku'] = $this->m_buku->get_id($id)->result();
		$where = array(
			'id_buku' => $id,
			'ava' => 1
		);
		$data['detail'] = $this->m_buku->detail_buku($where)->result();
		$this->load->view('index', $data);
	}

	public function get($id)
	{
		$data = $this->m_buku->get_id($id)->row();
		echo json_encode($data);
	}

	public function simpan(){
		$a = substr($this->input->post('judul'), 0,3)."_".substr($this->input->post('pengarang'), 0,2).date('dm');
		$id_buku = strtoupper($a);
		$data = array(
				'id_buku' => $id_buku,
				'id_kategori' => $this->input->post('kategori'),
				'id_rak' => $this->input->post('rak'),
				'judul' => $this->input->post('judul'),
				'pengarang' => $this->input->post('pengarang'),			
				'penerbit' => $this->input->post('penerbit'),
				'tahun_terbit' => $this->input->post('tahun_terbit'),
				'jml_buku' => $this->input->post('jml')									
			);
		$insert = $this->m_buku->add($data);
		for ($i=0; $i < $this->input->post('jml'); $i++) { 
			$iddet = $this->m_buku->get_max($id_buku);
			$detail = array(
				'id_detailbuku' => $id_buku.'_'.$iddet,
				'id_buku' => $id_buku				
			);
			$this->db->insert('sis_detailbuku', $detail);
			
		}
		 $this->session->set_flashdata('msg', 
            '<div class="alert alert-info">
                <strong>Simpan Berhasil !</strong>                
            </div>');
		echo json_encode(array("status" => TRUE));
	}

	public function edit($id){
		$data = array(
				'id_kategori' => $this->input->post('kategori'),
				'id_rak' => $this->input->post('rak'),
				'judul' => $this->input->post('judul'),
				'pengarang' => $this->input->post('pengarang'),			
				'penerbit' => $this->input->post('penerbit'),
				'tahun_terbit' => $this->input->post('tahun_terbit')				
			);
		$this->m_buku->update(array('id_buku' => $id), $data);
		$this->session->set_flashdata('msg', 
            '<div class="alert alert-info">
                <strong>Update Berhasil !</strong>                
            </div>');
		echo json_encode(array("status" => TRUE));
	}

	public function tambah()
	{
		$idbuku = $this->input->post('idbuku');	
		$jml = $this->input->post('jml');
		for ($i=0; $i < $this->input->post('jml'); $i++) { 
			$iddet = $this->m_buku->get_max($idbuku);
			$detail = array(
				'id_detailbuku' => $idbuku.'_'.$iddet,
				'id_buku' => $idbuku				
			);
			$this->db->insert('sis_detailbuku', $detail);
			// $iddet++;
		}
		$this->db->query("UPDATE sis_buku set jml_buku = jml_buku + $jml WHERE id_buku='$idbuku'");		
		 $this->session->set_flashdata('msg', 
            '<div class="alert alert-info">
                <strong>Simpan Berhasil !</strong>                
            </div>');
		redirect('buku/detailbuku/'.$idbuku,'refresh');
	}

	public function hapus($id)
	{
		$this->m_buku->delete($id);
		$this->session->set_flashdata('msg', 
            '<div class="alert alert-info">
                <strong>Hapus Berhasil !</strong>                
            </div>');
		redirect('buku','refresh');
	}

	public function hapusdetail($id,$buku)
	{
		$this->db->query("UPDATE sis_buku set jml_buku = jml_buku - 1 WHERE id_buku='$buku'");
		$this->db->where('id_detailbuku', $id);
		$this->db->update('sis_detailbuku', array('ava' => 0));
		$this->session->set_flashdata('msg', 
            '<div class="alert alert-info">
                <strong>Hapus Berhasil !</strong>                
            </div>');
		redirect('buku/detailbuku/'.$buku,'refresh');
	}

	public function cetakbarcode($id,$detail=null)
	{
		if (empty($this->uri->segment(4))) {			
			$where = array(
				'id_buku' => $id,
				'ava' => 1				
			);
		}else{
			$where = array(
				'id_detailbuku' => $detail,
				'ava' => 1				
			);
		}
		$data['detail'] = $this->m_buku->detail_buku($where)->result();								
		$data['buku'] = $this->m_buku->get_id($id)->result();
		$this->load->view('perpustakaan/cetakbarcode',$data);
	}

	public function barcode($text) {

        require_once( APPPATH . 'libraries/barcodegen/BCGFontFile.php');
        require_once( APPPATH . 'libraries/barcodegen/BCGColor.php');
        require_once( APPPATH . 'libraries/barcodegen/BCGDrawing.php');
        require_once( APPPATH . 'libraries/barcodegen/BCGcode128.barcode.php');

        $font = new BCGFontFile(APPPATH . 'libraries/font/Arial.ttf', 18);
        $colorFront = new BCGColor(0, 0, 0);
        $colorBack = new BCGColor(255, 255, 255);

        // Barcode Part
        $code = new BCGcode128();
        $code->setScale(2);
        $code->setThickness(30);
        $code->setForegroundColor($colorFront);
        $code->setBackgroundColor($colorBack);
        $code->setFont($font);
        $code->setStart(null);
        $code->setTilde(true);
        $code->parse($text);

        // Drawing Part
        $drawing = new BCGDrawing('', $colorBack);
        $drawing->setBarcode($code);
        $drawing->draw();

        header('Content-Type: image/png');

        $drawing->finish(BCGDrawing::IMG_FORMAT_PNG);        
		}

}

/* End of file Buku.php */
/* Location: ./application/controllers/Buku.php */