<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventaris extends CI_Controller {
	public function index()
	{
		$inventaris = $this->Inventaris_model->get_all();

        $data = array(
        	'judul' => "Inventaris Barang Inventaris",
        	'page' =>  "inventaris/index",
            'inventaris_data' => $inventaris
        );
        
		$this->load->view('halaman',$data);
	}


}