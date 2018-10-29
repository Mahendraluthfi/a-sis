<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inputbayar extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_bayar');
		$this->load->model('m_anggota');
		$this->load->model('m_setting');
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
		$data['content'] = 'pembayaran/input_bayar';		
		$this->session->unset_userdata('bayar');
		$this->load->view('index', $data);	
	}

	public function get1($id)
	{
		$data = $this->db->get_where('sis_pilihanbayar', array('id' => $id))->row();
		echo json_encode($data);
	}

	public function get2($id,$jns)
	{
		$data = $this->m_bayar->get_row_bayar($id,$jns);
		echo json_encode($data);
	}

	public function get_tagihan($id)
	{
		$data = $this->m_bayar->get_row_bayar($id,$jns);
		echo json_encode($data);
	}

	public function set($id,$siswa,$tipe)
	{
		$array = array('bayar' => $id, 'swbayar' => $siswa, 'tipe' => $tipe);		
		$this->session->set_userdata($array);
		redirect('inputbayar/form','refresh');
	}

	public function view()
	{
		$ids = base64_decode($this->uri->segment(3));
		if (empty($this->uri->segment(3))) {
			$data['content'] = 'pembayaran/tagihan';	
			$this->session->unset_userdata(array('tagihan','jns'));		
		}else{
			$data['content'] = 'pembayaran/tagihan_view';
			$data['tagihan1'] = $this->db->query("SELECT sis_pilihanbayar.nama_pilihan, sis_pmb_rutin.id FROM sis_pmb_rutin JOIN sis_pilihanbayar ON sis_pilihanbayar.id=sis_pmb_rutin.id_jenis WHERE sis_pmb_rutin.id_siswa = '$ids'")->result();
			$data['tagihan2'] = $this->db->query("SELECT sis_pilihanbayar.nama_pilihan, sis_pmb_angsur.id FROM sis_pmb_angsur JOIN sis_pilihanbayar ON sis_pilihanbayar.id=sis_pmb_angsur.id_jenis WHERE sis_pmb_angsur.id_siswa = '$ids'")->result();
			$data['showtagihan'] = $this->db->get_where('sis_tagihan',array('id_siswa' => $ids))->result();
			if ($this->session->userdata('jns') == '1') {
				$data['row'] = $this->m_bayar->get_row_bayar2($this->session->userdata('tagihan'))->result();					
				$data['show'] = 'pembayaran/tagihan_rutin';
			}elseif ($this->session->userdata('jns') == '2'){
				$data['row'] = $this->m_bayar->get_row_bayar3($this->session->userdata('tagihan'))->result();					
				$data['show'] = 'pembayaran/tagihan_angsur';
			}
		}
		$data['kelas'] = $this->m_anggota->get_kelas()->result();		
		$this->load->view('index', $data);
	}

	public function direct()
	{
		$enc = base64_encode($this->input->post('siswa'));
		redirect('inputbayar/view/'.$enc);
	}

	public function form()
	{
		if (empty($this->session->userdata('bayar'))) {
			redirect('inputbayar','refresh');	
		}else{
			if ($this->session->userdata('tipe') > 1) {			
				$data['row'] = $this->m_bayar->get_row_bayar2($this->session->userdata('bayar'))->result();		
				$data['history'] = $this->m_bayar->get_history_bayar($this->session->userdata('swbayar'),$this->get_ta_aktif())->result();	
				$data['content'] = 'pembayaran/bayar_form';				
				$this->load->view('index', $data);		
			}else{
				$data['row'] = $this->m_bayar->get_row_bayar3($this->session->userdata('bayar'))->result();		
				$data['history'] = $this->m_bayar->get_history_bayar($this->session->userdata('swbayar'),$this->get_ta_aktif())->result();	
				$data['angsur'] = $this->m_bayar->get_angsur($this->session->userdata('bayar'))->result();
				$data['content'] = 'pembayaran/bayar_form2';				
				$this->load->view('index', $data);		
			}
		}
	}

	public function get_bayar()
	{
		if ($this->session->userdata('tipe') > 1) {
			$data = $this->m_bayar->get_row_bayar2($this->session->userdata('bayar'))->row();
		}else{
			$data = $this->m_bayar->get_row_bayar3($this->session->userdata('bayar'))->row();			
		}
		echo json_encode($data);
	}

	public function detail_inv($id)
	{
		$data = $this->db->get_where('sis_pembayaran', array('id_tf' => $id))->result();
		echo json_encode($data);	
	}

	public function acak($long)
	{
		$char = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0987654321';
		$string = '';
		for ($i=0; $i < $long; $i++) { 			
			$pos = rand(0, strlen($char)-1);
			$string .= $char{$pos};
		}
		return $string;
	}

	public function simpan()
	{
		$id = $this->session->userdata('bayar');
		$idtf = 'INV'.date('md').$this->acak(3).date('is');
		$bulan = $this->input->post('bulan');
		$nominal = str_replace(',', '', $this->input->post('bayar'));		
		if ($this->session->userdata('tipe') > 1) {					
			$data = array(
				'id_tf' => $idtf,
				'date' => date('Y-m-d'),
				'id_siswa' => $this->input->post('siswa'),
				'id_ta' => $this->input->post('ta'),
				'id_jenis' => $this->input->post('jenis'),
				'bayar' => $nominal,
				'ket' => $this->input->post('ket')
			);
			$this->db->insert('sis_pembayaran', $data);
			$this->db->where('id', $this->session->userdata('bayar'));
			$this->db->update('sis_pmb_rutin', array( $bulan => $idtf));
		}else{
			$data = array(
				'id_tf' => $idtf,
				'date' => date('Y-m-d'),
				'id_siswa' => $this->input->post('siswa'),
				'id_ta' => $this->input->post('ta'),
				'id_jenis' => $this->input->post('jenis'),
				'bayar' => $nominal,
				'ket' => $this->input->post('ket')
			);
			$this->db->insert('sis_pembayaran', $data);
			$this->db->insert('sis_detail_angsur', array(
				'id_angsur' => $this->session->userdata('bayar'),
				'id_tf' => $idtf,
				'cicilan' => $nominal
			));			
			$this->db->query("UPDATE sis_pmb_angsur set sisa = sisa - '$nominal' where id = '$id'");
		}
		redirect('inputbayar/form');
	}

	public function cetak($id,$offset=0)
	{
		$idta = $this->get_ta_aktif();		
		$ids = base64_decode($id);
		$jml = $this->db->get_where('sis_pembayaran', array('id_siswa'=>$ids,'id_ta' => $this->get_ta_aktif()));
		$config['base_url'] = base_url().'inputbayar/cetak/'.$id;
		$config['total_rows'] = $jml->num_rows();
		$config['per_page'] = 25;
		$config['uri_segment'] = 4;		
		$choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

		$config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        //$config['first_link'] = false;
        //$config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
		
		$this->pagination->initialize($config);
		$data['offset'] = $offset;
		$data['halaman'] = $this->pagination->create_links();
		$data['set'] = $this->db->query("SELECT sis_pembayaran.*, sis_jenisbayar.kode_jenis FROM sis_pembayaran JOIN sis_jenisbayar ON sis_pembayaran.id_jenis=sis_jenisbayar.id WHERE sis_pembayaran.id_siswa='$ids' AND sis_pembayaran.id_ta='$idta' LIMIT $config[per_page] OFFSET $offset")->result();
		// $data['set'] = $this->db->get_where('sis_pembayaran', array('id_siswa'=>$ids,'id_ta' => $this->get_ta_aktif()), $config['per_page'], $offset)->result();
		// $data['page'] = 'content/pengumuman';
		// $this->load->view('index', $data);

		$data['content'] = 'pembayaran/pembayaran_printview';
		$this->load->view('index', $data);
	}

	public function save_p($id)
	{
		$ids = base64_decode($id);
		$idta = $this->get_ta_aktif();
		$this->db->query("UPDATE sis_pembayaran SET cek_p = '1' WHERE id_siswa='$ids' and id_ta='$idta' and cek_p = '0'");
		redirect('inputbayar');
	}

	public function ses($id,$jns,$ids)
	{
		$array = array(
			'tagihan' => $id,
			'jns' => $jns
		);		
		$this->session->set_userdata( $array );
		redirect('inputbayar/view/'.$ids);
	}

	public function save_tagihan()
	{
		$ok  = $this->input->post('ok');
		$tagihan  = $this->input->post('tagihan');
		$idjenis  = $this->input->post('idjenis');
		$tipe  = $this->input->post('tipe');
		$ids  = base64_decode($this->input->post('ids'));
		if ($tipe > 1) {
			$arrayName = array(
				'id_siswa' => $ids, 
				'nm_tagihan' => $idjenis, 
				'tagihan' => $tagihan, 
			);
			$this->db->insert('sis_tagihan', $arrayName);
		}else{
			$bayar = count($ok) * $tagihan;
			$arrayName = array(
				'id_siswa' => $ids, 
				'nm_tagihan' => $idjenis, 
				'tagihan' => $bayar, 
			);
			$this->db->insert('sis_tagihan', $arrayName);
		}
		$this->session->unset_userdata(array('tagihan','jns'));				
		redirect('inputbayar/view/'.base64_encode($ids));
	}

	public function hapus_t($id,$ids)
	{
		$this->db->where('id', $id);
		$this->db->delete('sis_tagihan');
		redirect('inputbayar/view/'.$ids);
	}

	public function cetak_tagihan($ids)
	{
		$ids = base64_decode($this->uri->segment(3));
		$data['showtagihan'] = $this->db->get_where('sis_tagihan',array('id_siswa' => $ids))->result();		
		$data['info'] = $this->m_setting->get_info()->result();		
		$data['siswa'] = $this->m_bayar->getsw($ids)->result();		
		$data['content'] = 'pembayaran/cetak_tagihan';
		$this->load->view('index', $data);
	}
}

/* End of file Inputbayar.php */
/* Location: ./application/controllers/Inputbayar.php */