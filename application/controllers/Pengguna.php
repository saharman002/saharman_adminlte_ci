<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller {
	public function index()
	{
		$pengguna = $this->Pengguna_model->get_all();

        $data = array(
        	'judul' => "Pengguna Barang Inventaris",
        	'page' =>  "pengguna/index",
            'pengguna_data' => $pengguna
        );
		$this->load->view('halaman',$data);
	}

	public function create(){
		 $data = array(
            'button' => 'Tambah',
            'judul' => 'Form Pengguna',
            'sub_title' => 'Tambah data baru',
            'action' => site_url('pengguna/create_action'),
	    'id_pengguna' => set_value('id_pengguna'),
	    'nm_depan' => set_value('nm_depan'),
	    'nm_belakang' => set_value('nm_belakang'),
	    'email' => set_value('email'),
	    'username' => set_value('username'),
	    'password' => set_value('password'),
	    'level' => set_value('level'),
	    'photo' => set_value('photo')
	);
		$data['page'] = "pengguna/form";
        $this->load->view('halaman', $data);
	}
	
	public function create_action() 
    {
        $this->_rules();       
        $photo=$_FILES['photo']['name'];
        if($photo==''){}else{
            $config['upload_path']= './assets/img';
            $config['allowed_types']= 'jpg|png|gif';

            $this->load->library('upload', $config);


            if(!$this->upload->do_upload('photo')){
                echo "gagal";die();
            }else{
                // if ($this->form_validation->run() == FALSE) {
                //     $this->create();
                // } else {
                    $data = array(
                        'id_pengguna' => $this->input->post('id_pengguna',TRUE),
                        'nm_depan' => $this->input->post('nm_depan',TRUE),
                        'nm_belakang' => $this->input->post('nm_belakang',TRUE),
                        'email' => $this->input->post('email',TRUE),
                        'username' => $this->input->post('username',TRUE),
                        'password' => $this->input->post('password',TRUE),
                        'level' => $this->input->post('level',TRUE),
                        'photo' => $photo
                );
                // }
                $this->Pengguna_model->insert($data);
                $this->session->set_flashdata('message', '<p class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Berhasil Menambahkan</p>');
                redirect(site_url('pengguna'));
            }
        } 
    }

    public function update($id) 
    {
        $row = $this->Pengguna_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Ubah',
                'judul' => 'Pengguna Inventaris',
                'sub_title' => 'Ubah Data',
                'action' => site_url('pengguna/update_action'),
		'id_pengguna' => set_value('id_pengguna', $row->id_pengguna),
		'nm_depan' => set_value('nm_depan', $row->nm_depan),
		'nm_belakang' => set_value('nm_belakang', $row->nm_belakang),
		'email' => set_value('email', $row->email),
		'username' => set_value('username', $row->username),
		'password' => set_value('password', $row->password),
		'level' => set_value('level', $row->level),
		'photo' => set_value('photo', $row->photo)
	    );
           $data['page'] = "pengguna/form";
        	$this->load->view('halaman', $data);
        } else {
            $this->session->set_flashdata('message', '<p class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong>Data Tidak Ditemukan</p>');
            redirect(site_url('pengguna'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();       
        $photo=$_FILES['photo']['name'];
        if($photo==''){}else{
            $config['upload_path']= './assets/img';
            $config['allowed_types']= 'jpg|png|gif';

            $this->load->library('upload', $config);


            if(!$this->upload->do_upload('photo')){
                echo "gagal";die();
            }else{
                // if ($this->form_validation->run() == FALSE) {
                //     $this->create();
                // } else {
                    $data = array(
                        'id_pengguna' => $this->input->post('id_pengguna',TRUE),
                        'nm_depan' => $this->input->post('nm_depan',TRUE),
                        'nm_belakang' => $this->input->post('nm_belakang',TRUE),
                        'email' => $this->input->post('email',TRUE),
                        'username' => $this->input->post('username',TRUE),
                        'password' => $this->input->post('password',TRUE),
                        'level' => $this->input->post('level',TRUE),
                        'photo' => $photo
                );
           
            // }
            $this->Pengguna_model->update($this->input->post('id_pengguna', TRUE), $data);
            $this->session->set_flashdata('message', '<p class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Berhasil Memperbaharui</p>');
            redirect(site_url('pengguna'));
            }
        }
    }

    public function delete($id) 
    {
        $row = $this->Pengguna_model->get_by_id($id);

        if ($row) {
            $this->Pengguna_model->delete($id);
            $this->session->set_flashdata('message', '<p class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Berhasil Menghapus</p>');
            redirect(site_url('pengguna'));
        } else {
            $this->session->set_flashdata('message', '<p class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong>Data Tidak Ditemukan</p>');
            redirect(site_url('pengguna'));
        }
    }

  public function _rules() 
    {
        
        $this->form_validation->set_rules('id_pengguna', 'Id Pengguna', 'trim');
        $this->form_validation->set_rules('nm_depan', 'Nama Depan', 'trim|required');
        $this->form_validation->set_rules('nm_belakang', 'Nama Belakang', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('level', 'Level', 'trim|required');
        $this->form_validation->set_rules('photo', 'Photo', 'trim|required');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
        }
}
