<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Status_barang_admin extends CI_Controller
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
			'isi' => 'admin/status/v_status'
		);
		$this->load->view('admin/layout/v_wrapper', $data, FALSE);
	}

	public function konfirmasi($id_barang_masuk)
	{
		$data = array(
			'id_barang_masuk' => $id_barang_masuk,
			'status' => 1
		);
		$this->m_status->update_status($data);
		$this->session->set_flashdata('pesan', 'Berhasil dikonfirmasi');
		redirect('status_barang_admin');
	}

	public function selesai($id_barang_masuk)
	{
		$data = array(
			'id_barang_masuk' => $id_barang_masuk,
			'status' => 3
		);
		$this->m_status->update_status($data);
		$this->session->set_flashdata('pesan', 'Berhasil dikonfirmasi');
		redirect('status_barang_admin');
	}
}

/* End of file Kategori.php */
