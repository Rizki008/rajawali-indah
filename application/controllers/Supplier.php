<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Supplier extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		$this->load->model('m_notif');
	}

	// List all your items
	public function index()
	{
		$data = array(
			'title' => 'Indah Jaya Mebeul',
			'isi' => 'supplier/v_supplier'
		);
		$this->load->view('supplier/layout/v_wrapper', $data, FALSE);
	}

	// Add a new item
	public function add()
	{
	}

	//Update one item
	public function update($id = NULL)
	{
	}

	//Delete one item
	public function delete($id = NULL)
	{
	}
}

/* End of file Admin.php */
