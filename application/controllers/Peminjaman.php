<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman extends CI_Controller {

	public function __construct()
	{
		parent::__construct();		
		date_default_timezone_set("Asia/Bangkok");			
		$this->load->model('m_transaksi');
		$this->load->model('m_getnoreg');
		$this->load->model('m_buku');
		$this->load->model('m_anggota');
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
		$ses_unset = array('sis_siswa', 'no');	
		$this->session->unset_userdata($ses_unset);				
		$data['get'] = $this->m_transaksi->get()->result();
		$data['content'] = 'perpustakaan/peminjaman';
		$this->load->view('index', $data);			
	}
	
	public function form()
	{
		$tgl = date('Y-m-d');
		$id_anggota = $this->input->post('id_anggota');
		if (!empty($id_anggota)) {
			$cek = $this->m_anggota->get_id($id_anggota)->num_rows();
			$cek2 = $this->m_anggota->get_id2($id_anggota)->num_rows();
			if (empty($cek) || !empty($cek2)) {
				$this->session->set_flashdata('msg', 
		            '<div class="alert alert-danger">
		                <strong>ID Anggota tidak ditemukan atau dalam masa peminjaman !</strong>                
		            </div>');			
				redirect('peminjaman/form');
			}else{
				$data['no'] = $this->m_getnoreg->get_nopm($tgl);
				$data['i_siswa'] = $this->m_anggota->get_id($id_anggota)->result();				
				$array = array(
					'sis_siswa' => $id_anggota
				);			
				$this->session->set_userdata( $array );
				// $data['buku'] = $this->m_buku->get()->result();
			}
		}else{
			$data['buku'] = '';
			$data['no'] = $this->m_getnoreg->get_nopm($tgl);
			$data['i_siswa'] = $this->m_anggota->get_id($this->session->userdata('sis_siswa'))->result();
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

	public function simpan($id)
	{
		$tgl = date('Y-m-d');
		$no = $this->m_getnoreg->get_nopm($tgl);
		$datadetail = array(
			'no_peminjaman' => $no,
			'id_detailbuku' => $id			
		);

		$this->db->insert('sis_det_peminjaman', $datadetail);
		$this->db->where('id_detailbuku', $id);
		$this->db->update('sis_detailbuku', array('status' => 0));

		$array = array(
			'no' => $no
		);
		$this->session->set_userdata( $array );			
		redirect('peminjaman/form');
	}

	public function hapus_p($id,$det)
	{
		$this->db->where('id_peminjaman', $id);
		$this->db->delete('sis_det_peminjaman');
		$this->db->where('id_detailbuku', $det);
		$this->db->update('sis_detailbuku', array('status' => 1));
		redirect('peminjaman/form');	
	}

	public function hapusall($no)
	{
		$db = $this->db->get_where('sis_det_peminjaman', array('no_peminjaman' => $no))->result();		
		foreach ($db as $key) {
			$this->db->where('id_detailbuku', $key->id_detailbuku);
			$this->db->update('sis_detailbuku', array('status' => 1));
		}
		// print_r($db);
		$this->db->where('no_peminjaman', $no);
		$this->db->delete('sis_peminjaman');
		$this->db->where('no_peminjaman', $no);
		$this->db->delete('sis_det_peminjaman');
		$this->session->set_flashdata('msg', 
            '<div class="alert alert-info">
                <strong>Hapus Berhasil !</strong>                
            </div>');	
		redirect('peminjaman');
	}

	public function simpanpinjam()
	{		
		$tgl = $this->input->post('tgl');
		$isi = array(
			'no_peminjaman' => $this->input->post('nopmj'),
			'id_anggota' => $this->input->post('ids'),
			'datestamp' => date('Y-m-d'),			
			'tanggal_pinjam' => $tgl,			
			'status' => 'PROSES'
		);
		$this->db->insert('sis_peminjaman', $isi);	
		$ses_unset = array('sis_siswa', 'no');	
		$this->session->unset_userdata($ses_unset);	
		$this->session->set_flashdata('msg', 
            '<div class="alert alert-info">
                <strong>Simpan Berhasil !</strong>                
            </div>');	
		redirect('peminjaman'); 		
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

	public function remove()
	{
		$ses_unset = array('sis_siswa', 'no');	
		$this->session->unset_userdata($ses_unset);				
		redirect('peminjaman/form');
	}

	public function search()
	{
		$id = $this->input->post('id');
		$data = $this->m_buku->get_buku($id)->result();
		$cek = $this->m_buku->get_buku($id)->num_rows();
		if (empty($cek)) {
			$isi = "<div class='alert alert-danger'>
                <strong>Data Buku tidak tersedia / dalam masa peminjaman !</strong>                
            </div>";
		}else{
			foreach ($data as $key) {
				$isi = "<table class='table table-striped table-hover'>					
						<tbody>
							<tr class='info'>
								<td>".$key->id_detailbuku."</td>
								<td>".$key->judul."</td>
								<td>".$key->nama_kategori."</td>
								<td>".$key->pengarang."</td>
								<td>".$key->nama_rak."</td>
								<td><a href='".base_url('peminjaman/simpan/'.$key->id_detailbuku)."' class='btn btn-primary btn-sm'>Pilih</a></td>							
							</tr>					
						</tbody>
					</table>";
			}							
		}
		$this->session->set_flashdata('cari', $isi);
		redirect('peminjaman/form');
	}
}

/* End of file Peminjaman.php */
/* Location: ./application/controllers/Peminjaman.php */