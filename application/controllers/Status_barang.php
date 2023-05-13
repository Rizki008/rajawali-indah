<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Status_barang extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_status');
	}

	// List all your items
	public function index()
	{
		$data = array(
			'title' => 'Status Barang Masuk',
			'masuk' => $this->m_status->masuk(),
			'isi' => 'supplier/status/v_status'
		);
		$this->load->view('supplier/layout/v_wrapper', $data, FALSE);
	}

	public function kirim($id_barang_masuk)
	{
		$data = array(
			'id_barang_masuk' => $id_barang_masuk,
			'status' => 2
		);
		$this->m_status->update_status($data);
		$this->session->set_flashdata('pesan', 'Berhasil dikonfirmasi');
		redirect('status_barang');
	}
}

/* End of file Kategori.php */
