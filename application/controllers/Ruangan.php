<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ruangan extends CI_Controller {
    public function index()
    {
        $ruangan = $this->Ruangan_model->get_all();

        $data = array(
            'judul' => "ruangan Barang Inventaris",
            'page' =>  "ruangan/index",
            'ruangan_data' => $ruangan
        );
        $this->load->view('halaman',$data);
    }

    public function create(){
         $data = array(
            'button' => 'Tambah',
            'judul' => 'Form Ruangan',
            'sub_title' => 'Tambah data baru',
            'action' => site_url('ruangan/create_action'),
        'id_ruangan' => set_value('id_ruangan'),
        'nama_ruangan' => set_value('nama_ruangan'),
        'fungsi_ruangan' => set_value('fungsi_ruangan')
    );
        $data['page'] = "ruangan/form";
        $this->load->view('halaman', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
        'id_ruangan' => $this->input->post('id_ruangan',TRUE),
        'nama_ruangan' => $this->input->post('nama_ruangan',TRUE),
        'fungsi_ruangan' => $this->input->post('fungsi_ruangan',TRUE),
        );

            $this->Ruangan_model->insert($data);
            $this->session->set_flashdata('message', '<p class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Berhasil Menambahkan</p>');
            redirect(site_url('ruangan'));
        }
    }

    public function update($id) 
    {
        $row = $this->Ruangan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Ubah',
                'judul' => 'ruangan Inventaris',
                'sub_title' => 'Ubah Data',
                'action' => site_url('ruangan/update_action'),
        'id_ruangan' => set_value('id_ruangan', $row->id_ruangan),
        'nama_ruangan' => set_value('nama_ruangan', $row->nama_ruangan),
        'fungsi_ruangan' => set_value('fungsi_ruangan', $row->fungsi_ruangan)
        );
           $data['page'] = "ruangan/form";
            $this->load->view('halaman', $data);
        } else {
            $this->session->set_flashdata('message', '<p class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong>Data Tidak Ditemukan</p>');
            redirect(site_url('ruangan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_ruangan', TRUE));
        } else {
            $data = array(
        'id_ruangan' => $this->input->post('id_ruangan',TRUE),
        'nama_ruangan' => $this->input->post('nama_ruangan',TRUE),
        'fungsi_ruangan' => $this->input->post('fungsi_ruangan',TRUE)
        );

            $this->Ruangan_model->update($this->input->post('id_ruangan', TRUE), $data);
            $this->session->set_flashdata('message', '<p class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Berhasil Memperbaharui</p>');
            redirect(site_url('ruangan'));
        }
    }

    public function delete($id) 
    {
        $row = $this->Ruangan_model->get_by_id($id);

        if ($row) {
            $this->Ruangan_model->delete($id);
            $this->session->set_flashdata('message', '<p class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Berhasil Menghapus</p>');
            redirect(site_url('ruangan'));
        } else {
            $this->session->set_flashdata('message', '<p class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong>Data Tidak Ditemukan</p>');
            redirect(site_url('ruangan'));
        }
    }

  public function _rules() 
    {
    $this->form_validation->set_rules('nama_ruangan', 'Ruangan', 'trim|required');
    $this->form_validation->set_rules('fungsi_ruangan', 'Keterangan Ruangan', 'trim|required');
    $this->form_validation->set_rules('id_ruangan', 'Id Ruangan', 'trim');
    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}
