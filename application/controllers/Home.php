<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index()
	{
		$data['judul'] = "Sitem Inventaris Barang";
		$data['page'] = "home/index";
		$this->load->view('halaman',$data);
	}
}
