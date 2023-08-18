<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kirim extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_kirim');
	}

	// List all your items
	public function index()
	{
		$data = array(
			'title' => 'Data Pengiriman Barang',
			'list_kirim' => $this->m_kirim->list_kirim(),
			'isi' => 'admin/kirim/v_kirim'
		);
		$this->load->view('admin/layout/v_wrapper', $data, FALSE);
	}

	// Add a new item
	public function pesan()
	{
		$this->login_user->proteksi_halaman();
		// $id_barang = $this->input->post('id_barang');
		$data = array(
			'id' => $this->input->post('id'),
			'qty' => $this->input->post('qty'),
			'name' => $this->input->post('name'),
			'price' => '0'
		);
		$this->cart->insert($data);
		$this->session->set_flashdata('pesan', 'Berhasil');
		redirect('kirim');
	}

	public function add_cart()
	{
		$this->login_user->proteksi_halaman();
		$data = array(
			'id' => $this->input->post('id'),
			'name' => $this->input->post('name'),
			'qty' => $this->input->post('qty'),
		);
		$this->cart->insert($data);
		$this->session->set_flashdata('success', 'Data Produk Berhasil Disimpan Dikeranjang!');
		redirect('kirim/pengiriman');
	}

	public function pengiriman()
	{
		$data = array(
			'title' => 'Kirim Barang',
			'isi' => 'admin/kirim/v_cart'
		);
		$this->load->view('admin/layout/v_wrapper', $data, FALSE);
	}

	public function update()
	{
		$i = 1;
		foreach ($this->cart->contents() as $items) {
			$data = array(
				'rowid' => $items['rowid'],
				'qty' => $this->input->post($i . '[qty]'),
			);
			$this->cart->update($data);
			$i++;
		}
		$this->session->set_flashdata('pesan', 'Belanja Berhasil Diupdate');
		redirect('kirim/pengiriman');
	}

	public function delete($rowid)
	{
		$this->cart->remove($rowid);
		redirect('kirim/pengiriman');
	}

	public function cekout()
	{
		//proteksi halaman
		$this->login_user->proteksi_halaman();
		//simpan ke tabel barang masuk
		$i = 1;
		foreach ($this->cart->contents() as $item) {
			$data = array(
				'id_user' => $this->session->userdata('id_user'),
				'no_pengiriman' => $this->input->post('no_pengiriman'),
				'id_barang' => $item['id'],
				'status' => '0',
				'qty' => $this->input->post('qty' . $i++),
			);
			$this->m_kirim->kirim($data);
		}
		$this->session->set_flashdata('pesan', 'Pesanan Berhasil Diproses');
		$this->cart->destroy();
		redirect('status_barang_admin');
	}
}

/* End of file Kategori.php */
