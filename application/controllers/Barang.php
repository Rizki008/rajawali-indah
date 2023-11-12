<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_barang');
		$this->load->model('m_user');
		$this->load->model('m_kategori');
		$this->load->model('m_notif');
	}

	// List all your items
	public function index()
	{
		$data = array(
			'title' => 'Kelola Barang',
			'barang' => $this->m_barang->barang(),
			'isi' => 'gudang/barang/v_barang'
		);
		$this->load->view('gudang/layout/v_wrapper', $data, FALSE);
	}

	public function add()
	{
		$this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required', array('required' => '%s Mohon untuk diisi!!!'));
		$this->form_validation->set_rules('id_kategori', 'Kategori Barang', 'required', array('required' => '%s Mohon untuk diisi!!!'));
		$this->form_validation->set_rules('id_user', 'Supplier Barang', 'required', array('required' => '%s Mohon untuk diisi!!!'));
		$this->form_validation->set_rules('stock', 'Stock Barang', 'required', array('required' => '%s Mohon untuk diisi!!!'));
		// $this->form_validation->set_rules('harga', 'Harga Barang', 'required', array('required' => '%s Mohon untuk diisi!!!'));
		$this->form_validation->set_rules('deskripsi', 'Deskripsi Barang', 'required', array('required' => '%s Mohon untuk diisi!!!'));

		if ($this->form_validation->run() == TRUE) {
			$config['upload_path'] = './assets/barang';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']  = '5000';
			$this->upload->initialize($config);
			$field_name = "gambar";
			if (!$this->upload->do_upload($field_name)) {
				$data = array(
					'title' => 'Tambah data barang',
					'kategori' => $this->m_kategori->kategori(),
					'user' => $this->m_user->user_supplier(),
					'error_upload' => $this->upload->display_errors(),
					'isi' => 'gudang/barang/v_add'
				);
				$this->load->view('gudang/layout/v_wrapper', $data, FALSE);
			} else {
				$upload_data = array('uploads' => $this->upload->data());
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/barang' . $upload_data['uploads']['file_name'];
				$this->load->library('image_lib', $config);
				$data = array(
					'nama_barang' => $this->input->post('nama_barang'),
					'id_kategori' => $this->input->post('id_kategori'),
					'id_user' => $this->input->post('id_user'),
					'stock' => $this->input->post('stock'),
					'harga' => '0',
					'deskripsi' => $this->input->post('deskripsi'),
					'gambar' => $upload_data['uploads']['file_name'],
				);
				$this->m_barang->add($data);
				$this->session->set_flashdata('pesan', 'Data barang berhasil ditambahkan');
				redirect('barang');
			}
		}
		$data = array(
			'title' => 'Tambah data barang',
			'kategori' => $this->m_kategori->kategori(),
			'user' => $this->m_user->user_supplier(),
			'isi' => 'gudang/barang/v_add'
		);
		$this->load->view('gudang/layout/v_wrapper', $data, FALSE);
	}
	public function update($id_barang = NULL)
	{
		$this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required', array('required' => '%s Mohon untuk diisi!!!'));
		$this->form_validation->set_rules('id_kategori', 'Kategori Barang', 'required', array('required' => '%s Mohon untuk diisi!!!'));
		$this->form_validation->set_rules('id_user', 'Supplier Barang', 'required', array('required' => '%s Mohon untuk diisi!!!'));
		$this->form_validation->set_rules('stock', 'Stock Barang', 'required', array('required' => '%s Mohon untuk diisi!!!'));
		// $this->form_validation->set_rules('harga', 'Harga Barang', 'required', array('required' => '%s Mohon untuk diisi!!!'));
		$this->form_validation->set_rules('deskripsi', 'Deskripsi Barang', 'required', array('required' => '%s Mohon untuk diisi!!!'));

		if ($this->form_validation->run() == TRUE) {
			$config['upload_path'] = './assets/barang';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']  = '5000';
			$this->upload->initialize($config);
			$field_name = "gambar";
			if (!$this->upload->do_upload($field_name)) {
				$data = array(
					'title' => 'Tambah data barang',
					'kategori' => $this->m_kategori->kategori(),
					'user' => $this->m_user->user_supplier(),
					'details' => $this->m_barang->details($id_barang),
					'error_upload' => $this->upload->display_errors(),
					'isi' => 'gudang/barang/v_edit'
				);
				$this->load->view('gudang/layout/v_wrapper', $data, FALSE);
			} else {
				//hapus gambar di folder
				$produk = $this->m_barang->details($id_barang);
				if ($produk->gambar !== "") {
					unlink('./assets/barang/' . $produk->gambar);
				}
				//end
				$upload_data = array('uploads' => $this->upload->data());
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/barang' . $upload_data['uploads']['file_name'];
				$this->load->library('image_lib', $config);
				$data = array(
					'id_barang' => $id_barang,
					'nama_barang' => $this->input->post('nama_barang'),
					'id_kategori' => $this->input->post('id_kategori'),
					'id_user' => $this->input->post('id_user'),
					'stock' => $this->input->post('stock'),
					'harga' => '0',
					'deskripsi' => $this->input->post('deskripsi'),
					'gambar' => $upload_data['uploads']['file_name'],
				);
				$this->m_barang->update($data);
				$this->session->set_flashdata('pesan', 'Data barang berhasil ditambahkan');
				redirect('barang');
			}
			$data = array(
				'id_barang' => $id_barang,
				'nama_barang' => $this->input->post('nama_barang'),
				'id_kategori' => $this->input->post('id_kategori'),
				'id_user' => $this->input->post('id_user'),
				'stock' => $this->input->post('stock'),
				'harga' => '0',
				'deskripsi' => $this->input->post('deskripsi'),
			);
			$this->m_barang->update($data);
			$this->session->set_flashdata('pesan', 'Data barang berhasil ditambahkan');
			redirect('barang');
		} else {
			$data = array(
				'title' => 'Tambah data barang',
				'kategori' => $this->m_kategori->kategori(),
				'user' => $this->m_user->user_supplier(),
				'details' => $this->m_barang->details($id_barang),
				'isi' => 'gudang/barang/v_edit'
			);
			$this->load->view('gudang/layout/v_wrapper', $data, FALSE);
		}
	}

	public function delete($id_barang = null)
	{
		$barang = $this->m_barang->details($id_barang);
		if ($barang->gambar !== "") {
			unlink('./assets/gambar/' . $barang->gambar);
		}

		$data = array(
			'id_barang' => $id_barang,
		);
		$this->m_barang->delete($data);
		$this->session->set_flashdata('pesan', 'Barang berhasil dihapus!!!');
		redirect('barang');
	}

	// supplier 
	public function supplier()
	{
		$data = array(
			'title' => 'Kelola Barang',
			'barang' => $this->m_barang->barang_supplier(),
			'isi' => 'supplier/barang/v_barang'
		);
		$this->load->view('supplier/layout/v_wrapper', $data, FALSE);
	}

	public function update_supplier($id_barang = NULL)
	{
		$this->form_validation->set_rules('harga', 'Harga Barang', 'required', array('required' => '%s Mohon untuk diisi!!!'));

		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'title' => 'Update Harga barang',
				'kategori' => $this->m_kategori->kategori(),
				'user' => $this->m_user->user_supplier(),
				'details' => $this->m_barang->details($id_barang),
				'isi' => 'supplier/barang/v_edit'
			);
			$this->load->view('supplier/layout/v_wrapper', $data, FALSE);
		} else {
			$data = array(
				'id_barang' => $id_barang,
				'harga' => $this->input->post('harga'),
			);
			$this->m_barang->update($data);
			$this->session->set_flashdata('pesan', 'Data barang berhasil ditambahkan');
			redirect('barang/supplier');
		}
		$data = array(
			'title' => 'Tambah data barang',
			'kategori' => $this->m_kategori->kategori(),
			'user' => $this->m_user->user_supplier(),
			'details' => $this->m_barang->details($id_barang),
			'isi' => 'supplier/barang/v_edit'
		);
		$this->load->view('supplier/layout/v_wrapper', $data, FALSE);
	}
}

/* End of file kontrol_barang.php */
