<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lapjurnal extends CI_Controller {

	public function __construct()
	{
		parent::__construct();	
		$this->load->model('m_akun');
		$this->load->model('m_rencana');
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

	public function index($offset=0)
	{
		if (empty($this->uri->segment(2))) {
			$this->session->unset_userdata(array('m','y'));
		}
		$search = $this->input->post('search');
		$raktif = $this->db->get_where('sis_rencana_anggaran', array('status' => '1'));
		foreach ($raktif->result() as $key) {
			$r_a = $key->id;
		}
		
		$config['per_page'] = 10;

		if (empty($search)) {
			if (empty($this->session->userdata('m'))) {
				$m = date('m');
				$y = date('Y');			
				$induk = $this->m_rencana->jurnal($r_a,$m,$y,$config['per_page'], $offset)->result();							
				$jml = $this->db->get_where('sis_transaksi', array('id_jenis_transaksi' => $r_a, 'YEAR(waktu)' => $y, 'MONTH(waktu)' => $m));
				$tm = $m;
				$ty = $y;
			}else{
				$induk = $this->m_rencana->jurnal($r_a,$this->session->userdata('m'),$this->session->userdata('y'),$config['per_page'], $offset)->result();	
				$jml = $this->db->get_where('sis_transaksi', array('id_jenis_transaksi' => $r_a, 'YEAR(waktu)' => $this->session->userdata('y'), 'MONTH(waktu)' => $this->session->userdata('m')));				
				$tm = $this->session->userdata('m');
				$ty = $this->session->userdata('y');
			}
		}else{
			$mx = substr($search, 0,2);
			$yx = substr($search, 3,4);
			$this->session->set_userdata(array('m' => $mx, 'y' => $yx));
			$induk = $this->m_rencana->jurnal($r_a,$this->session->userdata('m'),$this->session->userdata('y'),$config['per_page'], $offset)->result();
			$jml = $this->db->get_where('sis_transaksi', array('id_jenis_transaksi' => $r_a, 'YEAR(waktu)' => $this->session->userdata('y'), 'MONTH(waktu)' => $this->session->userdata('m')));
			$tm = $this->session->userdata('m');
			$ty = $this->session->userdata('y');
		}
		
		$config['base_url'] = base_url().'lapjurnal/index';
		$config['total_rows'] = $jml->num_rows();
		$config['uri_segment'] = 3;		
		$choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
		$config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';        
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
		foreach ($induk as $key => $value) {
			$sql = $this->db->query("SELECT sis_jurnal.*, sis_akun.nama_akun, sis_transaksi.waktu FROM sis_jurnal JOIN sis_akun ON sis_jurnal.akun=sis_akun.id_akun JOIN sis_transaksi ON sis_jurnal.id_transaksi=sis_transaksi.id WHERE sis_jurnal.id_transaksi='$value->id' ");
			$value->detail = $sql->result();
		}
		$data = array(
			'content' => 'keuangan/lapjurnal',			
			'month' => $tm,
			'year' => $ty,
			'offset' => $offset,
			'halaman' => $this->pagination->create_links(),
			'get_rencana' =>  $this->m_rencana->detail($r_a)->result(),
			'jurnal' => $induk
		);				
		$this->load->view('index', $data);
		// print_r($induk);
	}

}

/* End of file Lapjurnal.php */
/* Location: ./application/controllers/Lapjurnal.php */