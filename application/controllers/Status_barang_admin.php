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
			'masuk' => $this->m_status->masuk_admin(),
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
		redirect('status_barang');
	}

	public function selesai($id_barang_masuk)
	{
		$data = array(
			'id_barang_masuk' => $id_barang_masuk,
			'status' => 4
		);
		$this->m_status->update_status($data);
		$this->session->set_flashdata('pesan', 'Berhasil dikonfirmasi');
		redirect('status_barang');
	}

	public function cek_bayar($no_pengiriman)
	{
		$data = array(
			'title' => 'Detail Pembayaran',
			'pembayaran' => $this->m_status->pembayaran($no_pengiriman),
			'isi' => 'supplier/status/v_pembayaran'
		);
		$this->load->view('supplier/layout/v_wrapper', $data, FALSE);
	}

	public function detail($no_pengiriman)
	{
		$data = array(
			'title' => 'Detail Pesana Barang',
			'detail' => $this->m_status->detail($no_pengiriman),
			'isi' => 'admin/status/v_detail'
		);
		$this->load->view('admin/layout/v_wrapper', $data, FALSE);
	}
}

/* End of file Kategori.php */
