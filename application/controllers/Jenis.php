<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis extends CI_Controller {
	public function index()
	{
		$jenis = $this->Jenis_model->get_all();

        $data = array(
        	'judul' => "Jenis Barang Inventaris",
        	'page' =>  "jenis/index",
            'jenis_data' => $jenis
        );
		$this->load->view('halaman',$data);
	}

	public function create(){
		 $data = array(
            'button' => 'Tambah',
            'judul' => 'Form Jenis',
            'sub_title' => 'Tambah data baru',
            'action' => site_url('jenis/create_action'),
	    'id_jenis' => set_value('id_jenis'),
	    'jenis' => set_value('jenis'),
	    'ket_jenis' => set_value('ket_jenis')
	);
		$data['page'] = "jenis/form";
        $this->load->view('halaman', $data);
	}
	
	public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_jenis' => $this->input->post('id_jenis',TRUE),
		'jenis' => $this->input->post('jenis',TRUE),
		'ket_jenis' => $this->input->post('ket_jenis',TRUE),
	    );

            $this->Jenis_model->insert($data);
            $this->session->set_flashdata('message', '<p class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Berhasil Menambahkan</p>');
            redirect(site_url('jenis'));
        }
    }

    public function update($id) 
    {
        $row = $this->Jenis_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Ubah',
                'judul' => 'Jenis Inventaris',
                'sub_title' => 'Ubah Data',
                'action' => site_url('jenis/update_action'),
		'id_jenis' => set_value('id_jenis', $row->id_jenis),
		'jenis' => set_value('jenis', $row->jenis),
		'ket_jenis' => set_value('ket_jenis', $row->ket_jenis)
	    );
           $data['page'] = "jenis/form";
        	$this->load->view('halaman', $data);
        } else {
            $this->session->set_flashdata('message', '<p class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong>Data Tidak Ditemukan</p>');
            redirect(site_url('jenis'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_jenis', TRUE));
        } else {
            $data = array(
		'id_jenis' => $this->input->post('id_jenis',TRUE),
		'jenis' => $this->input->post('jenis',TRUE),
		'ket_jenis' => $this->input->post('ket_jenis',TRUE)
	    );

            $this->Jenis_model->update($this->input->post('id_jenis', TRUE), $data);
            $this->session->set_flashdata('message', '<p class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Berhasil Memperbaharui</p>');
            redirect(site_url('jenis'));
        }
    }

    public function delete($id) 
    {
        $row = $this->Jenis_model->get_by_id($id);

        if ($row) {
            $this->Jenis_model->delete($id);
            $this->session->set_flashdata('message', '<p class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Berhasil Menghapus</p>');
            redirect(site_url('jenis'));
        } else {
            $this->session->set_flashdata('message', '<p class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong>Data Tidak Ditemukan</p>');
            redirect(site_url('jenis'));
        }
    }

  public function _rules() 
    {
	$this->form_validation->set_rules('jenis', 'Jenis', 'trim|required');
	$this->form_validation->set_rules('ket_jenis', 'Keterangan Jenis', 'trim|required');
	$this->form_validation->set_rules('id_jenis', 'Id Jenis', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}
