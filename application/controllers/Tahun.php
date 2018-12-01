<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tahun extends CI_Controller {
	public function index()
	{
		$tahun = $this->Tahun_model->get_all();

        $data = array(
        	'judul' => "Tahun Barang Inventaris",
        	'page' =>  "tahun/index",
            'tahun_data' => $tahun
        );
		$this->load->view('halaman',$data);
	}

	public function create(){
		 $data = array(
            'button' => 'Tambah',
            'judul' => 'Form Tahun',
            'sub_title' => 'Tambah data baru',
            'action' => site_url('tahun/create_action'),
	    'id_tahun' => set_value('id_tahun'),
	    'tahun' => set_value('tahun'),
	    'ket_tahun' => set_value('ket_tahun')
	);
		$data['page'] = "tahun/form";
        $this->load->view('halaman', $data);
	}
	
	public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_tahun' => $this->input->post('id_tahun',TRUE),
		'tahun' => $this->input->post('tahun',TRUE),
		'ket_tahun' => $this->input->post('ket_tahun',TRUE),
	    );

            $this->Tahun_model->insert($data);
            $this->session->set_flashdata('message', '<p class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Berhasil Menambahkan</p>');
            redirect(site_url('tahun'));
        }
    }

    public function update($id) 
    {
        $row = $this->Tahun_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Ubah',
                'judul' => 'Tahun Inventaris',
                'sub_title' => 'Ubah Data',
                'action' => site_url('tahun/update_action'),
		'id_tahun' => set_value('id_tahun', $row->id_tahun),
		'tahun' => set_value('tahun', $row->tahun),
		'ket_tahun' => set_value('ket_tahun', $row->ket_tahun)
	    );
           $data['page'] = "tahun/form";
        	$this->load->view('halaman', $data);
        } else {
            $this->session->set_flashdata('message', '<p class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong>Data Tidak Ditemukan</p>');
            redirect(site_url('tahun'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_tahun', TRUE));
        } else {
            $data = array(
		'id_tahun' => $this->input->post('id_tahun',TRUE),
		'tahun' => $this->input->post('tahun',TRUE),
		'ket_tahun' => $this->input->post('ket_tahun',TRUE)
	    );

            $this->Tahun_model->update($this->input->post('id_tahun', TRUE), $data);
            $this->session->set_flashdata('message', '<p class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Berhasil Memperbaharui</p>');
            redirect(site_url('tahun'));
        }
    }

    public function delete($id) 
    {
        $row = $this->Tahun_model->get_by_id($id);

        if ($row) {
            $this->Tahun_model->delete($id);
            $this->session->set_flashdata('message', '<p class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Berhasil Menghapus</p>');
            redirect(site_url('tahun'));
        } else {
            $this->session->set_flashdata('message', '<p class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong>Data Tidak Ditemukan</p>');
            redirect(site_url('tahun'));
        }
    }

  public function _rules() 
    {
	$this->form_validation->set_rules('tahun', 'Tahun', 'trim|required');
	$this->form_validation->set_rules('ket_tahun', 'Keterangan Tahun', 'trim|required');
	$this->form_validation->set_rules('id_tahun', 'Id Tahun', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}
