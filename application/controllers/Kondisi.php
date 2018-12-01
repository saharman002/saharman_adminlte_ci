<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kondisi extends CI_Controller {
    public function index()
    {
        $kondisi = $this->Kondisi_model->get_all();

        $data = array(
            'judul' => "kondisi Barang Inventaris",
            'page' =>  "kondisi/index",
            'kondisi_data' => $kondisi
        );
        $this->load->view('halaman',$data);
    }

    public function create(){
         $data = array(
            'button' => 'Tambah',
            'judul' => 'Form Kondisi',
            'sub_title' => 'Tambah data baru',
            'action' => site_url('kondisi/create_action'),
        'id_kondisi' => set_value('id_kondisi'),
        'kondisi' => set_value('kondisi'),
        'ket_kondisi' => set_value('ket_kondisi')
    );
        $data['page'] = "kondisi/form";
        $this->load->view('halaman', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
        'id_kondisi' => $this->input->post('id_kondisi',TRUE),
        'kondisi' => $this->input->post('kondisi',TRUE),
        'ket_kondisi' => $this->input->post('ket_kondisi',TRUE),
        );

            $this->Kondisi_model->insert($data);
            $this->session->set_flashdata('message', '<p class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Berhasil Menambahkan</p>');
            redirect(site_url('kondisi'));
        }
    }

    public function update($id) 
    {
        $row = $this->Kondisi_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Ubah',
                'judul' => 'kondisi Inventaris',
                'sub_title' => 'Ubah Data',
                'action' => site_url('kondisi/update_action'),
        'id_kondisi' => set_value('id_kondisi', $row->id_kondisi),
        'kondisi' => set_value('kondisi', $row->kondisi),
        'ket_kondisi' => set_value('ket_kondisi', $row->ket_kondisi)
        );
           $data['page'] = "kondisi/form";
            $this->load->view('halaman', $data);
        } else {
            $this->session->set_flashdata('message', '<p class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong>Data Tidak Ditemukan</p>');
            redirect(site_url('kondisi'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_kondisi', TRUE));
        } else {
            $data = array(
        'id_kondisi' => $this->input->post('id_kondisi',TRUE),
        'kondisi' => $this->input->post('kondisi',TRUE),
        'ket_kondisi' => $this->input->post('ket_kondisi',TRUE)
        );

            $this->Kondisi_model->update($this->input->post('id_kondisi', TRUE), $data);
            $this->session->set_flashdata('message', '<p class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Berhasil Memperbaharui</p>');
            redirect(site_url('kondisi'));
        }
    }

    public function delete($id) 
    {
        $row = $this->Kondisi_model->get_by_id($id);

        if ($row) {
            $this->Kondisi_model->delete($id);
            $this->session->set_flashdata('message', '<p class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Berhasil Menghapus</p>');
            redirect(site_url('kondisi'));
        } else {
            $this->session->set_flashdata('message', '<p class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong>Data Tidak Ditemukan</p>');
            redirect(site_url('kondisi'));
        }
    }

  public function _rules() 
    {
    $this->form_validation->set_rules('kondisi', 'Kondisi', 'trim|required');
    $this->form_validation->set_rules('ket_kondisi', 'Keterangan Kondisi', 'trim|required');
    $this->form_validation->set_rules('id_kondisi', 'Id Kondisi', 'trim');
    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}
