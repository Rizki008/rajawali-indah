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
			'price' => $this->input->post('price'),
			'stock' => $this->input->post('stock'),
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

		// simpan ke tabel pembayaran
		$data_bayar = array(
			'no_pengiriman' => $this->input->post('no_pengiriman'),
			'id_user' => $this->session->userdata('id_user'),
			'total_bayar' => $this->input->post('total_bayar'),
			'bukti_bayar' => 0,
			'pembayaran' => 0,
			'status_bayar' => 'belum bayar',
		);
		$this->m_kirim->simpan_bayar($data_bayar);

		$this->session->set_flashdata('pesan', 'Pesanan Berhasil Diproses');
		$this->cart->destroy();
		redirect('status_barang_admin');
	}

	public function bayar($no_pengiriman)
	{
		if ($this->form_validation->run() == FALSE) {
			$config['upload_path'] = './assets/transaksi';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
			$config['max_size']     = '2000';
			$this->upload->initialize($config);
			$field_name = "bukti_bayar";
			if (!$this->upload->do_upload($field_name)) {
			} else {
				$upload_data = array('uploads' => $this->upload->data());
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/transaksi' . $upload_data['uploads']['file_name'];
				$this->load->library('image_lib', $config);
				$data = array(
					'no_pengiriman' => $no_pengiriman,
					'id_user' => $this->session->userdata('id_user'),
					'pembayaran' => $this->input->post('pembayaran'),
					'status_bayar' => 'sudah bayar',
					'bukti_bayar' => $upload_data['uploads']['file_name'],
				);
				$this->m_kirim->bayar($data);

				$data = array(
					'no_pengiriman' => $no_pengiriman,
					'status' => 3
				);
				$this->m_kirim->update_status($data);
				$this->session->set_flashdata('pesan', 'Data Berhasil DiUpload !!!');
				redirect('status_barang_admin');
			}
		}
	}
}

/* End of file Kategori.php */
