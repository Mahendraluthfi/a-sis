<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_jenjang');
		$this->load->model('m_daftar');
		$this->load->model('m_tahunajaran');
		$this->load->model('m_getnoreg');
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
	    if (!$this->m_tahunajaran->get_aktif()->num_rows() > 0) {
	    	$this->session->set_flashdata('msg', 
            '<div class="alert alert-danger">
                <h4>Maaf</h4>
                <p>Anda harus membuat Tahun Ajaran dahulu !</p>
            </div>');
	        redirect('tahunajaran');		
	    }
	}

	public function index()
	{
		//$data['get'] = $this->m_jenjang->get()->result();
		//$data['paket'] = $this->m_jenjang->get_paket()->result();
		$set = $this->m_tahunajaran->get_aktif();
		foreach ($set->result() as $key) {
			$data['aktif'] = $key->nama_angkatan;
			$data['id_aktif'] = $key->id_angkatan;
		}
		$data['calon']	 = $this->m_daftar->show();
		$data['ta'] 	 = $this->m_tahunajaran->get()->result();
		$data['jenjang'] = $this->m_jenjang->get()->result();
		$data['content'] = 'akademik/daftar';
		$this->load->view('index', $data);
	}

	public function form_daftar()
	{
		$set = $this->m_tahunajaran->get_aktif();
		foreach ($set->result() as $key) {
			$data['aktif'] = $key->nama_angkatan;
			$data['id_aktif'] = $key->id_angkatan;
		}
		$data['ta'] = $this->m_tahunajaran->get()->result();
		$data['jenjang'] = $this->m_jenjang->get()->result();
		$data['content'] = 'akademik/form_daftar';
		$this->load->view('index', $data);
	}

	public function form_simpan()
	{
		$tgl_daftar = $this->input->post('tgldaftar');
		$noreg = $this->m_getnoreg->get_noreg($tgl_daftar);
		$tahunajaran = $this->input->post('tahunajaran');
		$jenjang = $this->input->post('jenjang');
		$nisn = $this->input->post('nisn');
		$nama = $this->input->post('nama');
		$wn = $this->input->post('cekwn');
		$jekel = $this->input->post('cekjekel');
		$anakke = $this->input->post('anakke');
		$tempatlahir = $this->input->post('tempatlahir');
		$sdrkandung = $this->input->post('sdrkandung');
		$tgllahir = $this->input->post('tgllahir');
		$sdrangkat = $this->input->post('sdrangkat');
		$agama = $this->input->post('agama');
		$alamattinggal = $this->input->post('alamattinggal');
		$alamatdomisili = $this->input->post('alamatdomisili');
		$tinggal = $this->input->post('cektinggal');
		$notelepon = $this->input->post('notelepon');
		$goldarah = $this->input->post('goldarah');
		$bb = $this->input->post('beratbadan');
		$tb = $this->input->post('tinggibadan');
		$penyakit = $this->input->post('penyakit');
		$namaayah = $this->input->post('namaayah');
		$namaibu = $this->input->post('namaibu');
		$namawali = $this->input->post('namawali');
		$almtortu = $this->input->post('alamatorangtua');
		$alamatwali = $this->input->post('alamatwali');
		$pendapatan = $this->input->post('pendapatan');

		$nmfile = 'IMG-'.date('dHis'); 		
		$config['upload_path']          = './asset/foto/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 2048;
        $config['max_width']            = 1900;
        $config['max_height']           = 1200;
        $config['file_name'] 			= $nmfile;         

        $this->load->library('upload', $config);

        if (!empty($_FILES['foto']['name'])) {
	        if ( ! $this->upload->do_upload('foto')){
	            $error = array('error' => $this->upload->display_errors());
	            //$this->load->view('upload_form', $error);
	            echo $error['error'];
	        }else{
	            $data = $this->upload->data();
	            $tmpname1 = $data['file_name'];
	            //$this->load->view('upload_success', $data);
	            //echo "sukses";
	        }
	    }else{
	    	$tmpname1 = '';
	    }
        $isi = array(
        	'no_reg' => $noreg,
        	'id_angkatan' => $tahunajaran,
        	'id_jenjang' => $jenjang,
        	'tgl_daftar' => $tgl_daftar,
        	'nisn' => $nisn,
        	'nama' => $nama,
        	'jekel' => $jekel,
        	'tempat_lahir' => $tempatlahir,
        	'tgl_lahir' => $tgllahir,
        	'agama' => $agama,
        	'alamat_tinggal' => $alamattinggal,
        	'wn' => $wn,
        	'anak_ke' => $anakke,
        	'sdr_kandung' => $sdrkandung,
        	'sdr_angkat' => $sdrangkat,
        	'alamat_domisili' => $alamatdomisili,
        	'telepon' => $notelepon,
        	'tinggal_dengan' => $tinggal,
        	'gol_darah' => $goldarah,
        	'penyakit' => $penyakit,
        	'tinggi' => $tb,
        	'berat' => $bb,
        	'foto' => $tmpname1,
        	'ayah' => $namaayah,
        	'ibu' => $namaibu,
        	'wali' => $namawali,
        	'alamat_orangtua' => $almtortu,
        	'alamat_wali' => $alamatwali,
        	'pendapatan' => $pendapatan
        );
        $this->m_daftar->simpansiswa($isi);
        $this->session->set_flashdata('msg', 
            '<div class="alert alert-info">
                <strong>Simpan Berhasil !</strong>                
            </div>');
        redirect('daftar');		
	}

	// public function download(){
	// 	$date = date('Y-m-d');
	// 	$data['noreg'] = $this->m_getnoreg->get_noreg($date);
	// 	$this->load->view('akademik/template_siswa', $data);
	// }
	public function upload_file(){
		$ta = $this->input->post('tahunajaran');
		$jenjang = $this->input->post('jenjang');
		$date = date('Y-m-d');
			$config = array(
			'upload_path'   => FCPATH.'asset/',
			'allowed_types' => 'xls|csv'
		);
		$this->load->library('upload', $config);
		if ($this->upload->do_upload('file')) {
			$data = $this->upload->data();
			@chmod($data['full_path'], 0777);

			$this->load->library('Spreadsheet_Excel_Reader');
			$this->spreadsheet_excel_reader->setOutputEncoding('CP1251');

			$this->spreadsheet_excel_reader->read($data['full_path']);
			$sheets = $this->spreadsheet_excel_reader->sheets[0];
			error_reporting(0);

			$data_excel = array();
			for ($i = 2; $i <= $sheets['numRows']; $i++) {
				if ($sheets['cells'][$i][1] == '') break;
    			$noreg = $this->m_getnoreg->get_noreg($date);       	            	
    			$data_excel[$i - 1]['no_reg']    = $noreg;
    			$data_excel[$i - 1]['id_angkatan']    = $ta;
    			$data_excel[$i - 1]['id_jenjang']    = $jenjang;
    			$data_excel[$i - 1]['tgl_daftar']    = $date;
				$data_excel[$i - 1]['nama']    = $sheets['cells'][$i][1];
				$data_excel[$i - 1]['jekel']   = $sheets['cells'][$i][2];
				$data_excel[$i - 1]['tgl_lahir'] = $sheets['cells'][$i][3];
				$data_excel[$i - 1]['tempat_lahir'] = $sheets['cells'][$i][4];
				$noreg++;
			}

			$this->db->insert_batch('sis_daftar', $data_excel);
			// @unlink($data['full_path']);
			redirect('daftar');
		}else{
			$error = array('error' => $this->upload->display_errors());
	            //$this->load->view('upload_form', $error);
	            echo $error['error'];		
		}
	}

	// public function download()
	// {
	// 	// Load plugin PHPExcel nya
	// 	include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		
	// 	// Panggil class PHPExcel nya
	// 	$csv = new PHPExcel();

	// 	// Settingan awal fil excel
	// 	$csv->getProperties()->setCreator('Excellent Computer')
	// 						   ->setLastModifiedBy('Excellent Computer')
	// 						   ->setTitle("Template Data Calon Siswa")
	// 						   ->setSubject("Siswa")
	// 						   ->setDescription("Template Data Calon Siswa")
	// 						   ->setKeywords("Data Siswa");

	// 	// Buat header tabel nya pada baris ke 1
		
		
	// 	$csv->setActiveSheetIndex(0)->setCellValue('A1', 'NO'); 
	// 	$csv->setActiveSheetIndex(0)->setCellValue('B1', 'NAMA'); 
	// 	$csv->setActiveSheetIndex(0)->setCellValue('C1', 'L/P'); 
	// 	$csv->setActiveSheetIndex(0)->setCellValue('D1', 'TGL_LAHIR'); 
	// 	$csv->setActiveSheetIndex(0)->setCellValue('E1', 'TEMPAT_LAHIR'); 

	// 	// Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
	// 	$date = date('Y-m-d');
	// 	$siswa = $this->m_getnoreg->get_noreg($date);
	// 	// $siswa = $this->SiswaModel->view();
		
	// 	$numrow = 2; // Set baris pertama untuk isi tabel adalah baris ke 2
	// 	for ($i=0; $i <5 ; $i++) {
			
	// 		$csv->setActiveSheetIndex(0)->setCellValue('A'.$numrow, '');
	// 		$csv->setActiveSheetIndex(0)->setCellValue('B'.$numrow, '');
	// 		$csv->setActiveSheetIndex(0)->setCellValue('C'.$numrow, '');			
	// 		$csv->setActiveSheetIndex(0)->setCellValue('D'.$numrow, '1999-12-31');			
	// 		$csv->setActiveSheetIndex(0)->setCellValue('E'.$numrow, '');			
						
	// 		$numrow++; // Tambah 1 setiap kali looping						
	// 	}
	// 	// foreach($siswa as $data){ // Lakukan looping pada variabel siswa
	// 	// }

	// 	// Set orientasi kertas jadi LANDSCAPE
	// 	$csv->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

	// 	// Set judul file excel nya
	// 	$csv->getActiveSheet(0)->setTitle("Template Upload Data Siswa");
	// 	$csv->setActiveSheetIndex(0);

	// 	// Proses file excel
	// 	header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
	// 	header('Content-Disposition: attachment; filename="Template Upload Data Siswa.csv"'); // Set nama file excel nya
	// 	header('Cache-Control: max-age=0');

	// 	$write = new PHPExcel_Writer_CSV($csv);
	// 	$write->save('php://output');		
	// }

	public function hapus($id)
	{
		$this->db->where('id_daftar', $id);
		$this->db->delete('sis_daftar');
		$this->session->set_flashdata('msg', 
            '<div class="alert alert-info">
                <strong>Hapus Berhasil !</strong>                
            </div>');
        redirect('daftar');	

	}
	public function detail_daftar($id)
	{
		$data['content'] = 'akademik/detail_daftar';
		$data['isi'] = $this->m_daftar->show_id($id);
		$this->load->view('index', $data);
	}

	public function edit_daftar($id)
	{
		$data['content'] = 'akademik/edit_daftar';
		$data['ta'] 	 = $this->m_tahunajaran->get()->result();
		$data['jenjang'] = $this->m_jenjang->get()->result();
		$data['isi'] 	 = $this->m_daftar->show_id($id);
		$this->load->view('index', $data);	
	}

	public function edit_simpan($id, $foto)
	{
		$tgl_daftar = $this->input->post('tgldaftar');		
		$tahunajaran = $this->input->post('tahunajaran');
		$jenjang = $this->input->post('jenjang');
		$nama = $this->input->post('nama');
		$wn = $this->input->post('cekwn');
		$jekel = $this->input->post('cekjekel');
		$anakke = $this->input->post('anakke');
		$tempatlahir = $this->input->post('tempatlahir');
		$sdrkandung = $this->input->post('sdrkandung');
		$tgllahir = $this->input->post('tgllahir');
		$sdrangkat = $this->input->post('sdrangkat');
		$agama = $this->input->post('agama');
		$alamattinggal = $this->input->post('alamattinggal');
		$alamatdomisili = $this->input->post('alamatdomisili');
		$tinggal = $this->input->post('cektinggal');
		$notelepon = $this->input->post('notelepon');
		$goldarah = $this->input->post('goldarah');
		$bb = $this->input->post('beratbadan');
		$tb = $this->input->post('tinggibadan');
		$penyakit = $this->input->post('penyakit');
		$namaayah = $this->input->post('namaayah');
		$namaibu = $this->input->post('namaibu');
		$namawali = $this->input->post('namawali');
		$almtortu = $this->input->post('alamatorangtua');
		$alamatwali = $this->input->post('alamatwali');
		$pendapatan = $this->input->post('pendapatan');

		$nmfile = 'IMG-'.date('dHis'); 		
		$config['upload_path']          = './asset/foto/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 2048;
        $config['max_width']            = 1900;
        $config['max_height']           = 1200;
        $config['file_name'] 			= $nmfile;
        $target = './asset/foto/'.$foto;         

        $this->load->library('upload', $config);

        if (!empty($_FILES['foto']['name'])) {
	        if ( ! $this->upload->do_upload('foto')){
	            $error = array('error' => $this->upload->display_errors());
	            //$this->load->view('upload_form', $error);
	            echo $error['error'];
	        }else{
	        	if (file_exists($target)) {
            		unlink($target);
            	}
	            $data = $this->upload->data();
	            $tmpname1 = $data['file_name'];
	            //$this->load->view('upload_success', $data);
	            //echo "sukses";
	        }
	    }else{
	    	$tmpname1 = $foto;
	    }
        $isi = array(        	
        	'id_angkatan' => $tahunajaran,
        	'id_jenjang' => $jenjang,
        	'tgl_daftar' => $tgl_daftar,
        	'nama' => $nama,
        	'jekel' => $jekel,
        	'tempat_lahir' => $tempatlahir,
        	'tgl_lahir' => $tgllahir,
        	'agama' => $agama,
        	'alamat_tinggal' => $alamattinggal,
        	'wn' => $wn,
        	'anak_ke' => $anakke,
        	'sdr_kandung' => $sdrkandung,
        	'sdr_angkat' => $sdrangkat,
        	'alamat_domisili' => $alamatdomisili,
        	'telepon' => $notelepon,
        	'tinggal_dengan' => $tinggal,
        	'gol_darah' => $goldarah,
        	'penyakit' => $penyakit,
        	'tinggi' => $tb,
        	'berat' => $bb,
        	'foto' => $tmpname1,
        	'ayah' => $namaayah,
        	'ibu' => $namaibu,
        	'wali' => $namawali,
        	'alamat_orangtua' => $almtortu,
        	'alamat_wali' => $alamatwali,
        	'pendapatan' => $pendapatan
        );
        $this->m_daftar->editsimpan($id, $isi);
        $this->session->set_flashdata('msg', 
            '<div class="alert alert-info">
                <strong>Ubah Berhasil !</strong>                
            </div>');
        redirect('daftar');
	}

}

/* End of file Daftar.php */
/* Location: ./application/controllers/Daftar.php */