<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sumber extends CI_Controller {
    public function index()
    {
        $sumber = $this->Sumber_model->get_all();

        $data = array(
            'judul' => "Sumber Barang Inventaris",
            'page' =>  "sumber/index",
            'sumber_data' => $sumber
        );
        $this->load->view('halaman',$data);
    }

    public function create(){
         $data = array(
            'button' => 'Tambah',
            'judul' => 'Form Sumber',
            'sub_title' => 'Tambah data baru',
            'action' => site_url('sumber/create_action'),
        'id_sumber' => set_value('id_sumber'),
        'sumber' => set_value('sumber'),
        'ket_sumber' => set_value('ket_sumber')
    );
        $data['page'] = "sumber/form";
        $this->load->view('halaman', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
        'id_sumber' => $this->input->post('id_sumber',TRUE),
        'sumber' => $this->input->post('sumber',TRUE),
        'ket_sumber' => $this->input->post('ket_sumber',TRUE),
        );

            $this->Sumber_model->insert($data);
            $this->session->set_flashdata('message', '<p class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Berhasil Menambahkan</p>');
            redirect(site_url('sumber'));
        }
    }

    public function update($id) 
    {
        $row = $this->Sumber_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Ubah',
                'judul' => 'Sumber Inventaris',
                'sub_title' => 'Ubah Data',
                'action' => site_url('sumber/update_action'),
        'id_sumber' => set_value('id_sumber', $row->id_sumber),
        'sumber' => set_value('sumber', $row->sumber),
        'ket_sumber' => set_value('ket_sumber', $row->ket_sumber)
        );
           $data['page'] = "sumber/form";
            $this->load->view('halaman', $data);
        } else {
            $this->session->set_flashdata('message', '<p class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong>Data Tidak Ditemukan</p>');
            redirect(site_url('sumber'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_sumber', TRUE));
        } else {
            $data = array(
        'id_sumber' => $this->input->post('id_sumber',TRUE),
        'sumber' => $this->input->post('sumber',TRUE),
        'ket_sumber' => $this->input->post('ket_sumber',TRUE)
        );

            $this->Sumber_model->update($this->input->post('id_sumber', TRUE), $data);
            $this->session->set_flashdata('message', '<p class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Berhasil Memperbaharui</p>');
            redirect(site_url('sumber'));
        }
    }

    public function delete($id) 
    {
        $row = $this->Sumber_model->get_by_id($id);

        if ($row) {
            $this->Sumber_model->delete($id);
            $this->session->set_flashdata('message', '<p class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Berhasil Menghapus</p>');
            redirect(site_url('sumber'));
        } else {
            $this->session->set_flashdata('message', '<p class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong>Data Tidak Ditemukan</p>');
            redirect(site_url('sumber'));
        }
    }

  public function _rules() 
    {
    $this->form_validation->set_rules('sumber', 'Sumber', 'trim|required');
    $this->form_validation->set_rules('ket_sumber', 'Keterangan Sumber', 'trim|required');
    $this->form_validation->set_rules('id_sumber', 'Id Sumber', 'trim');
    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}
