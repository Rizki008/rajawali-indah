<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_barang');
	}

	// List all your items
	public function index()
	{
		$data = array(
			'title' => 'Indah Jaya Mebeul',
			'barang' => $this->m_barang->barang(),
			'isi' => 'admin/v_admin'
		);
		$this->load->view('admin/layout/v_wrapper', $data, FALSE);
	}
}

/* End of file Admin.php */
