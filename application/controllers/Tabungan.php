<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tabungan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Bangkok');			
		$this->load->model('m_anggota');		
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
		$data['get'] = $this->m_bayar->get_recent_tabungan($this->get_ta_aktif())->result();
		$data['content'] = 'pembayaran/tabungan';
		$this->load->view('index', $data);		
	}

	public function get_siswa()
	{
		$id = $this->input->post('id');
		$data = $this->m_bayar->get_siswa2($id)->result();
		echo json_encode($data);
	}

	public function add()
	{
		$data['idtf'] = 'TB_'.date('ymdHis');		
		$data['content'] = 'pembayaran/tabungan_add';			
		$data['kelas'] = $this->m_anggota->get_kelas()->result();
		$this->load->view('index', $data);	
	}

	public function save()
	{
		$get_siswa = $this->db->get_where('sis_siswa',array('id_siswa' => $this->input->post('siswa')))->result();
		$nominal = str_replace(',', '', $this->input->post('nominal')) ;
		foreach ($get_siswa as $key) {
			$saldoall = $key->saldo_tabungan;
		}

		if ($this->input->post('jenis') == "1") {
			$debit = '0';
			$kredit = $nominal;
			$saldo = $saldoall + $kredit;
		}else{
			$kredit = '0';
			$debit = $nominal;
			$saldo = $saldoall - $debit;			
		}
		$this->db->insert('sis_tabungandetail', array(
			'id_tf' => $this->input->post('idtf'),
			'date' => date('Y-m-d'),
			'id_siswa' => $this->input->post('siswa'),			
			'id_ta' => $this->get_ta_aktif(),
			'debit'	=> $debit,			
			'kredit' => $kredit,
			'saldo_r' => $saldo,
			'ket' => $this->input->post('ket')
		));
		$this->db->where('id_siswa', $this->input->post('siswa'));
		$this->db->update('sis_siswa', array('saldo_tabungan' => $saldo));
		redirect('tabungan/view/'.base64_encode($this->input->post('siswa')),'refresh');
	}

	public function view()
	{
		$ids = base64_decode($this->uri->segment(3));
		if (empty($this->uri->segment(3))) {
			$data['content'] = 'pembayaran/tabungan_cari';			
		}else{
			$data['content'] = 'pembayaran/tabungan_view';
			$data['siswa'] = $this->m_bayar->get_det_siswa($ids)->result();
			$data['riwayat'] = $this->m_bayar->get_history_siswa($ids,$this->get_ta_aktif())->result();
			$data['queue'] = $this->m_bayar->get_queue($ids,$this->get_ta_aktif())->result();
		}
		$data['kelas'] = $this->m_anggota->get_kelas()->result();		
		$this->load->view('index', $data);
	}

	public function direct()
	{
		$enc = base64_encode($this->input->post('siswa'));
		redirect('tabungan/view/'.$enc);
	}

	public function cetak($id,$offset=0)
	{
		$ids = base64_decode($this->uri->segment(3));
		$jml = $this->db->get_where('sis_tabungandetail', array('id_siswa'=>$ids,'id_ta' => $this->get_ta_aktif()));
		$config['base_url'] = base_url().'tabungan/cetak/'.$id;
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

		$data['set'] = $this->db->get_where('sis_tabungandetail', array('id_siswa'=>$ids,'id_ta' => $this->get_ta_aktif()), $config['per_page'], $offset)->result();
		// $data['page'] = 'content/pengumuman';
		// $this->load->view('index', $data);

		$data['content'] = 'pembayaran/tabungan_printview';
		$this->load->view('index', $data);
	}	

	public function save_p($id)
	{
		$ids = base64_decode($id);
		$idta = $this->get_ta_aktif();
		$this->db->query("UPDATE sis_tabungandetail SET cek_p = '1' WHERE id_siswa='$ids' and id_ta='$idta' and cek_p = '0'");
		redirect('tabungan');
	}

}

/* End of file Tabungan.php */
/* Location: ./application/controllers/Tabungan.php */