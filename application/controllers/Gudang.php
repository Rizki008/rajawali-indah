<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Gudang extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		$this->load->model('m_barang');
	}

	// List all your items
	public function index()
	{
		$data = array(
			'title' => 'Indah Jaya Mebeul',
			'barang_kurang' => $this->m_barang->barang_kurang(),
			'isi' => 'gudang/v_gudang'
		);
		$this->load->view('gudang/layout/v_wrapper', $data, FALSE);
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
