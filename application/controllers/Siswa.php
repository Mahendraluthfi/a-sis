<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_rombel');
		$this->load->model('m_siswa');
		$this->load->model('m_tahunajaran');
		$this->load->model('m_jenjang');
		$this->load->model('m_daftar');
		if($this->auth->is_logged_in() == false){
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
		$idr = $this->input->post('id_kelas');
		$data['siswa'] = $this->m_siswa->show($idr);					
		$data['rombel'] = $this->m_rombel->get()->result();
		$data['content'] = 'akademik/siswa';
		$this->load->view('index', $data);
	}

	public function export()
	{
		$idr = $this->input->post('id_kelas');
		foreach ($this->db->get_where('sis_rombel', array('id_rombel' => $idr))->result() as $key) {
			$rombel = $key->nama_rombel;
		}
		// Load plugin PHPExcel nya
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		
		// Panggil class PHPExcel nya
		$csv = new PHPExcel();

		// Settingan awal fil excel
		$csv->getProperties()->setCreator('Excellent Computer')
							   ->setLastModifiedBy('Excellent Computer')
							   ->setTitle("Export Data Siswa Kelas ".$rombel)
							   ->setSubject("Siswa")
							   ->setDescription("Export Data Siswa")
							   ->setKeywords("Data Siswa");

		// Buat header tabel nya pada baris ke 1
		
		$csv->setActiveSheetIndex(0)->setCellValue('A1', "NO"); 
		$csv->setActiveSheetIndex(0)->setCellValue('B1', "NIS"); 
		$csv->setActiveSheetIndex(0)->setCellValue('C1', "NISN"); 
		$csv->setActiveSheetIndex(0)->setCellValue('D1', "ROMBEL"); 
		$csv->setActiveSheetIndex(0)->setCellValue('E1', "NAMA lENGKAP"); 
		$csv->setActiveSheetIndex(0)->setCellValue('F1', "TGL_LAHIR"); 
		$csv->setActiveSheetIndex(0)->setCellValue('G1', "TEMPAT_LAHIR"); 
		$csv->setActiveSheetIndex(0)->setCellValue('H1', "JEKEL"); 
		$csv->setActiveSheetIndex(0)->setCellValue('I1', "AGAMA"); 
		$csv->setActiveSheetIndex(0)->setCellValue('J1', "ALAMAT_TINGGAL"); 
		$csv->setActiveSheetIndex(0)->setCellValue('K1', "WN"); 
		$csv->setActiveSheetIndex(0)->setCellValue('L1', "ANAK_KE"); 
		$csv->setActiveSheetIndex(0)->setCellValue('M1', "SDR_KANDUNG"); 
		$csv->setActiveSheetIndex(0)->setCellValue('N1', "SDR_ANGKAT"); 
		$csv->setActiveSheetIndex(0)->setCellValue('O1', "ALAMAT_DOMISILI"); 
		$csv->setActiveSheetIndex(0)->setCellValue('P1', "TELEPON"); 
		$csv->setActiveSheetIndex(0)->setCellValue('Q1', "TINGGAL_DENGAN"); 
		$csv->setActiveSheetIndex(0)->setCellValue('R1', "GOL_DARAH"); 
		$csv->setActiveSheetIndex(0)->setCellValue('S1', "PENYAKIT"); 
		$csv->setActiveSheetIndex(0)->setCellValue('T1', "TINGGI"); 
		$csv->setActiveSheetIndex(0)->setCellValue('U1', "BERAT"); 
		$csv->setActiveSheetIndex(0)->setCellValue('V1', "AYAH"); 
		$csv->setActiveSheetIndex(0)->setCellValue('W1', "IBU"); 
		$csv->setActiveSheetIndex(0)->setCellValue('X1', "WALI"); 
		$csv->setActiveSheetIndex(0)->setCellValue('Y1', "ALAMAT_ORTU"); 
		$csv->setActiveSheetIndex(0)->setCellValue('Z1', "ALAMAT_WALI"); 
		$csv->setActiveSheetIndex(0)->setCellValue('AA1', "PENDAPATAN"); 


		// Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
		$date = date('Y-m-d');
		$siswa = $this->m_siswa->show($idr);
		// $siswa = $this->SiswaModel->view();
		$no = 1;
		$numrow = 2; // Set baris pertama untuk isi tabel adalah baris ke 2
		foreach ($siswa as $row) {
			
			$csv->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
			$csv->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $row->nis);
			$csv->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $row->nisn);
			$csv->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $row->nama_rombel);			
			$csv->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $row->nama);			
			$csv->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $row->tgl_lahir);			
			$csv->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $row->tempat_lahir);
			$csv->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $row->jekel);
			$csv->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $row->agama);
			$csv->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $row->alamat_tinggal);			
			$csv->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $row->wn);			
			$csv->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $row->anak_ke);			
			$csv->setActiveSheetIndex(0)->setCellValue('M'.$numrow, $row->sdr_kandung);
			$csv->setActiveSheetIndex(0)->setCellValue('N'.$numrow, $row->sdr_angkat);
			$csv->setActiveSheetIndex(0)->setCellValue('O'.$numrow, $row->alamat_domisili);
			$csv->setActiveSheetIndex(0)->setCellValue('P'.$numrow, $row->telepon);			
			$csv->setActiveSheetIndex(0)->setCellValue('Q'.$numrow, $row->tinggal_dengan);			
			$csv->setActiveSheetIndex(0)->setCellValue('R'.$numrow, $row->gol_darah);			
			$csv->setActiveSheetIndex(0)->setCellValue('S'.$numrow, $row->penyakit);
			$csv->setActiveSheetIndex(0)->setCellValue('T'.$numrow, $row->tinggi);
			$csv->setActiveSheetIndex(0)->setCellValue('U'.$numrow, $row->berat);
			$csv->setActiveSheetIndex(0)->setCellValue('V'.$numrow, $row->ayah);			
			$csv->setActiveSheetIndex(0)->setCellValue('W'.$numrow, $row->ibu);			
			$csv->setActiveSheetIndex(0)->setCellValue('X'.$numrow, $row->wali);			
			$csv->setActiveSheetIndex(0)->setCellValue('Y'.$numrow, $row->alamat_orangtua);			
			$csv->setActiveSheetIndex(0)->setCellValue('Z'.$numrow, $row->alamat_wali);			
			$csv->setActiveSheetIndex(0)->setCellValue('AA'.$numrow, $row->pendapatan);			
						
			$numrow++; // Tambah 1 setiap kali looping				
			$no++;		
		}
		
		// foreach($siswa as $data){ // Lakukan looping pada variabel siswa
		// }

		// Set orientasi kertas jadi LANDSCAPE
		$csv->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

		// Set judul file excel nya
		$csv->getActiveSheet(0)->setTitle("Data Siswa Kelas ".$rombel);
		$csv->setActiveSheetIndex(0);

		// Proses file excel
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="Export Data Siswa Kelas '.$rombel.'.csv"'); // Set nama file excel nya
		header('Cache-Control: max-age=0');

		$write = new PHPExcel_Writer_CSV($csv);
		$write->save('php://output');
	}

	public function nis()
	{
		$idr = $this->input->post('id_kelas');
		$data['siswa'] = $this->m_siswa->show($idr);							
		$data['content'] = 'akademik/form_nis';
		// $data['idr'] = $idr;
		$this->load->view('index', $data);	
	}

	public function save_nis()
	{
		$idr = $this->input->post('idr');
		$nis = $this->input->post('nis');
		foreach ($nis as $key => $value) {
			// $cek = $this->db->query("SELECT * FROM sis_siswa WHERE nis='$value'");
			// if (empty($cek)) {
				$this->db->query("UPDATE sis_siswa SET nis='$value' WHERE id_siswa='$key'");							
			// }
		}
		redirect('siswa','refresh');
	}

	public function edit($id,$jenjang)
	{
		$data['isi'] = $this->m_siswa->show_edit($id);
		$data['rombel'] = $this->m_siswa->g_rombel($jenjang);
		$data['ta'] 	 = $this->m_tahunajaran->get()->result();
		$data['jenjang'] = $this->m_jenjang->get()->result();		
		$data['content'] = 'akademik/edit_siswa';
		$this->load->view('index', $data);	
	}

	public function get_rombel()
	{
		$id=$this->input->post('id');
		//$id = '13';
		$data=$this->m_siswa->g_rombel($id);
		echo json_encode($data);
	}

	public function edit_simpan($id, $foto)
	{
		$nisn			= $this->input->post('nisn');
		$nis			= $this->input->post('nis');
		$rombel			= $this->input->post('rombel');			
		$tahunajaran 	= $this->input->post('tahunajaran');
		$jenjang 		= $this->input->post('jenjang');
		$nama 			= $this->input->post('nama');
		$wn 			= $this->input->post('cekwn');
		$jekel 			= $this->input->post('cekjekel');
		$anakke 		= $this->input->post('anakke');
		$tempatlahir 	= $this->input->post('tempatlahir');
		$sdrkandung 	= $this->input->post('sdrkandung');
		$tgllahir 		= $this->input->post('tgllahir');
		$sdrangkat 		= $this->input->post('sdrangkat');
		$agama 			= $this->input->post('agama');
		$alamattinggal 	= $this->input->post('alamattinggal');
		$alamatdomisili = $this->input->post('alamatdomisili');
		$tinggal 		= $this->input->post('cektinggal');
		$notelepon 		= $this->input->post('notelepon');
		$goldarah 		= $this->input->post('goldarah');
		$bb 			= $this->input->post('beratbadan');
		$tb 			= $this->input->post('tinggibadan');
		$penyakit 		= $this->input->post('penyakit');
		$namaayah 		= $this->input->post('namaayah');
		$namaibu 		= $this->input->post('namaibu');
		$namawali 		= $this->input->post('namawali');
		$almtortu 		= $this->input->post('alamatorangtua');
		$alamatwali 	= $this->input->post('alamatwali');
		$pendapatan 	= $this->input->post('pendapatan');

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
        	'nisn' => $nisn,
        	'id_jenjang' => $jenjang,        	
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
        $isi2 = array(
        	'nis' => $nis,
        	'id_rombel' => $rombel
        );
        $this->m_daftar->editsimpan($id, $isi);
        $this->m_siswa->editsimpan($id, $isi2);
        $this->session->set_flashdata('msg', 
            '<div class="alert alert-info">
                <strong>Ubah Berhasil !</strong>                
            </div>');
        redirect('siswa');
	}

	public function hapus($id)
	{
		$this->db->where('id_daftar', $id);
		$this->db->delete('sis_siswa');
		$this->db->where('id_daftar', $id);
		$this->db->delete('sis_daftar');
		$this->session->set_flashdata('msg', 
            '<div class="alert alert-info">
                <strong>Ubah Berhasil !</strong>                
            </div>');
        redirect('siswa');
	}

}

/* End of file Siswa.php */
/* Location: ./application/controllers/Siswa.php */