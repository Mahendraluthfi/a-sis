<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_guru');
		if($this->auth->is_logged_in() == false)
	    {
	         $this->session->set_flashdata('msg', 
            '<div class="alert alert-danger">
                <h4>Maaf</h4>
                <p>Anda Belum Login !</p>
            </div>');
	        redirect('login');
	    }
	    $this->load->model('m_setting');
	}

	public function index()
	{
		if ($this->session->userdata('level') == "administrator") {
			$data['sign'] = 'setting_admin';
		}else{
			$data['sign'] = 'setting_nonadmin';
		}
		$data['set'] = $this->m_setting->get()->result();
		$data['denda'] = $this->m_setting->get_denda()->result();
		$data['info'] = $this->m_setting->get_info()->result();
		$data['content'] = 'setting';
		$this->load->view('index', $data);
	}

	public function show($id)
	{
		$data['set'] = $this->m_setting->hak_akses($id)->result();
		$data['set2'] = $this->m_setting->privilage($id)->result();
		$data['content'] = 'hak_akses';
		$this->load->view('index', $data);
	}

	public function get($id)
	{
		$data = $this->m_setting->get_id($id);
		echo json_encode($data);
	}

	public function editdenda($id)
	{
		$arrayName = array('denda' => $this->input->post('denda') );
		$this->db->where('id_denda', $id);
		$this->db->update('sis_denda', $arrayName);
		echo json_encode(array("status" => TRUE));	
	}

	public function editmax($id)
	{
		$arrayName = array('max' => $this->input->post('max') );
		$this->db->where('id_denda', $id);
		$this->db->update('sis_denda', $arrayName);
		echo json_encode(array("status" => TRUE));	
	}

	public function simpaninfo()
	{
		$nmfile = 'LOGO-'.date('dHis'); 		
		$config['upload_path']          = './asset/logo/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 2048;
        $config['max_width']            = 1900;
        $config['max_height']           = 1200;
        $config['file_name'] 			= $nmfile;         

        $this->load->library('upload', $config);

        if (!empty($_FILES['logo']['name'])) {
	        if ( ! $this->upload->do_upload('logo')){
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

		$arrayName = array(
			'nama_sekolah' => $this->input->post('nama_sekolah'), 
			'alamat' => $this->input->post('alamat'), 
			'notelp' => $this->input->post('notelp'), 
			'email' => $this->input->post('email'),
			'logo' => $tmpname1
		);
		$this->db->update('sis_reg_user', $arrayName);
		 $this->session->set_flashdata('msg', 
            '<div class="alert alert-info">
                <strong>Simpan Berhasil !</strong>                
            </div>');
		redirect('setting');
	}

	public function hakakses($id)
	{
		$this->db->where('id_akses', $id);
		$this->db->delete('sis_privilage');
		$cb = $this->input->post('cb');
		// print_r($cb);
		foreach ($cb as $key => $value) {
		// }
		// foreach ($cb as $key) {
			$q1 = $this->db->query("SELECT * FROM sis_modul where id_modul='$key'");
			$cek = $q1->result();
			foreach ($cek as $data) {
				if ($data->ktg > 0) {
					$this->db->where('id_akses', $id);
					$this->db->where('id_modul', $data->ktg);
					$this->db->delete('sis_privilage');
					$this->db->insert('sis_privilage', array('id_akses' => $id, 'id_modul' => $data->ktg));
					$this->db->insert('sis_privilage', array('id_akses' => $id, 'id_modul' => $key));				
				}else{
					$this->db->insert('sis_privilage', array('id_akses' => $id, 'id_modul' => $key));					
				}
			}
		}
		redirect('setting');
	}

	public function change()
	{
		$this->load->model('m_register');
		$id_akses = $this->session->userdata('id');
		$pOld = md5($this->input->post('pOld'));
		$pNew = md5($this->input->post('pNew'));
		$cNew = md5($this->input->post('cNew'));
		$input = array(
            'id_akses' => $id_akses,
            'password' => $pOld
        );
        $cek = $this->m_register->login($input)->num_rows();
        if (!empty($cek)) {
        	$this->db->where('id_akses', $id_akses);
        	$this->db->update('sis_level', array('password' => $pNew));
        	$this->session->set_flashdata('msg', 
            '<div class="alert alert-success">
                <strong>Password Berhasil diubah!</strong>                
            </div>');
		redirect('setting');
        }else{
		$this->session->set_flashdata('msg', 
            '<div class="alert alert-danger">
                <strong>Password lama salah !</strong>                
            </div>');
		redirect('setting');
        }
	}


}

/* End of file Setting.php */
/* Location: ./application/controllers/Setting.php */