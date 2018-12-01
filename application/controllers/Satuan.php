<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Satuan extends CI_Controller {
	public function index()
	{
		$satuan = $this->Satuan_model->get_all();

        $data = array(
        	'judul' => "Satuan Barang Inventaris",
        	'page' =>  "satuan/index",
            'satuan_data' => $satuan
        );
		$this->load->view('halaman',$data);
	}

	public function create(){
		 $data = array(
            'button' => 'Tambah',
            'judul' => 'Form Satuan',
            'sub_title' => 'Tambah data baru',
            'action' => site_url('satuan/create_action'),
	    'id_satuan' => set_value('id_satuan'),
	    'satuan' => set_value('satuan'),
	    'ket_satuan' => set_value('ket_satuan')
	);
		$data['page'] = "satuan/form";
        $this->load->view('halaman', $data);
	}
	
	public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_satuan' => $this->input->post('id_satuan',TRUE),
		'satuan' => $this->input->post('satuan',TRUE),
		'ket_satuan' => $this->input->post('ket_satuan',TRUE),
	    );

            $this->Satuan_model->insert($data);
            $this->session->set_flashdata('message', '<p class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Berhasil Menambahkan</p>');
            redirect(site_url('satuan'));
        }
    }

    public function update($id) 
    {
        $row = $this->Satuan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Ubah',
                'judul' => 'Satuan Inventaris',
                'sub_title' => 'Ubah Data',
                'action' => site_url('satuan/update_action'),
		'id_satuan' => set_value('id_satuan', $row->id_satuan),
		'satuan' => set_value('satuan', $row->satuan),
		'ket_satuan' => set_value('ket_satuan', $row->ket_satuan)
	    );
           $data['page'] = "satuan/form";
        	$this->load->view('halaman', $data);
        } else {
            $this->session->set_flashdata('message', '<p class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong>Data Tidak Ditemukan</p>');
            redirect(site_url('satuan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_satuan', TRUE));
        } else {
            $data = array(
		'id_satuan' => $this->input->post('id_satuan',TRUE),
		'satuan' => $this->input->post('satuan',TRUE),
		'ket_satuan' => $this->input->post('ket_satuan',TRUE)
	    );

            $this->Satuan_model->update($this->input->post('id_satuan', TRUE), $data);
            $this->session->set_flashdata('message', '<p class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Berhasil Memperbaharui</p>');
            redirect(site_url('satuan'));
        }
    }

    public function delete($id) 
    {
        $row = $this->Satuan_model->get_by_id($id);

        if ($row) {
            $this->Satuan_model->delete($id);
            $this->session->set_flashdata('message', '<p class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Berhasil Menghapus</p>');
            redirect(site_url('satuan'));
        } else {
            $this->session->set_flashdata('message', '<p class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong>Data Tidak Ditemukan</p>');
            redirect(site_url('satuan'));
        }
    }

  public function _rules() 
    {
	$this->form_validation->set_rules('satuan', 'Satuan', 'trim|required');
	$this->form_validation->set_rules('ket_satuan', 'Keterangan Satuan', 'trim|required');
	$this->form_validation->set_rules('id_satuan', 'Id Satuan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}
