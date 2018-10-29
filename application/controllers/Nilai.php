<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai extends CI_Controller {

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
		$dest_session = array('idm','idr','smt','ids');
		$this->session->unset_userdata($dest_session);
		$data['content'] = 'nilai/input';
		$id = $this->session->userdata('id');
		$data['get'] = $this->m_nilai->get_alokasi($id)->result();
		// echo $id;
		// print_r($get);
		$this->load->view('index', $data);
	}

	public function get_rombel($id)
	{
		$data = $this->m_nilai->get_rombel($id);
		echo json_encode($data);
	}

	public function session($idr,$idm,$smt)
	{
		$array = array(
			'idm' => $idm,
			'idr' => $idr,
			'smt' => $smt
		);	
		$this->session->set_userdata($array);
		redirect('nilai/entry');
	}

	// public function ceks()
	// {
	// 	echo $this->session->userdata('idm');
	// 	echo $this->session->userdata('idr');
	// 	echo $this->session->userdata('smt');
	// 	echo $this->session->userdata('ids');
	// }
	
	public function entry()
	{
		if (!empty($this->session->userdata('idm'))) {
			$idm = $this->session->userdata('idm');
			$idr = $this->session->userdata('idr');
			$smt = $this->session->userdata('smt');
			$data['row'] = $this->m_nilai->entrynew($idr)->result();		
			
			$data['mapel'] = $this->m_nilai->mapel($idm)->result();
			$data['rombel'] = $this->m_nilai->rombel($idr)->result();
			$data['content'] = 'nilai/entry'; 		
			$this->load->view('index', $data);
		}else{
			redirect('nilai');
		}
	}

	public function entry_where($ids,$idm,$idr,$smt)
	{
		$db = $this->db->get_where('sis_nilai',array(
			'id_rombel' => $idr,
			'id_siswa' => $ids,
			'id_mapel' => $idm,
			'semester' => $smt
		));
		$array = array(
			'ids' => $ids
		);		
		$this->session->set_userdata($array);
		$cek = $db->num_rows();
		//echo $cek;
		if (empty($cek)) {
			// echo "0";	0
			$data = $this->m_nilai->entry_empty($ids);
			// print_r($data);
		}else{
			$data = $this->m_nilai->entrywhere($ids,$idm,$idr,$smt);
			// print_r($data);		
		}
		echo json_encode($data);
	}

	public function simpan()
	{					
		$this->load->model('m_tahunajaran');
        $set = $this->m_tahunajaran->get_aktif();
        foreach ($set->result() as $key) {          
            $id_angkatan = $key->id_angkatan;
        }		
		$ids = $this->session->userdata('ids');
		$idr = $this->session->userdata('idr');
		$idm = $this->session->userdata('idm');
		$smt = $this->session->userdata('smt');
		$nuh1 = $this->input->post('nuh1');
		$nuh2 = $this->input->post('nuh2');
		$nuh3 = $this->input->post('nuh3');
		$nt1 = $this->input->post('nt1');
		$nt2 = $this->input->post('nt2');
		$nt3 = $this->input->post('nt3');
		$mid = $this->input->post('mid');
		$smter = $this->input->post('smt');
		$rnuh = ($nuh1 + $nuh2 + $nuh3) / 3;
		$rnt = ($nt1 + $nt2 + $nt3) / 3;
		$nh = ($rnuh + $rnt) / 2;
		$nar = ($nh + $mid + $smter) / 3;  

		$db = $this->db->query("SELECT * FROM sis_nilai WHERE id_siswa='$ids' and id_mapel = '$idm' and id_rombel = '$idr' and semester = '$smt'");
		$cek = $db->num_rows();
		if (empty($cek)) {
			$values = array(
				'id_rombel' => $idr,
				'id_siswa' => $ids,
				'id_mapel' => $idm,
				'id_angkatan' => $id_angkatan,
				'semester' => $smt,
				'nuh1' => $nuh1,
				'nuh2' => $nuh2,
				'nuh3' => $nuh3,
				'nt1' => $nt1,
				'nt2' => $nt2,
				'nt3' => $nt3,
				'mid' => $mid,
				'smt' => $smter,
				'rnuh' => $rnuh,
				'rnt' => $rnt,
				'nh' => $nh,
				'nar' => $nar				
			);
			$this->db->insert('sis_nilai', $values);
		}else{			
			foreach ($db->result() as $key) {
				$id = $key->id;
			}
			$values = array(				
				'nuh1' => $nuh1,
				'nuh2' => $nuh2,
				'nuh3' => $nuh3,
				'nt1' => $nt1,
				'nt2' => $nt2,
				'nt3' => $nt3,
				'mid' => $mid,
				'smt' => $smter,
				'rnuh' => $rnuh,
				'rnt' => $rnt,
				'nh' => $nh,
				'nar' => $nar				
			);
			$this->db->where('id', $id);
			$this->db->update('sis_nilai', $values);
		}
		//echo json_encode(array("status" => TRUE));		
		redirect('nilai/entry');
	}

	

}

/* End of file Nilai.php */
/* Location: ./application/controllers/Nilai.php */