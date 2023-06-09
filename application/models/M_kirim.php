<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_kirim extends CI_Model
{

	// List all your items
	public function list_kirim()
	{
		$this->db->select('*');
		$this->db->from('barang');
		$this->db->join('kategori', 'kategori.id_kategori = barang.id_kategori', 'left');
		$this->db->where('id_user', $this->session->userdata('id_user'));
		return $this->db->get()->result();
	}

	public function send()
	{
		$id = '0';
		$this->db->select('*');
		$this->db->from('barang');
		$this->db->where('barang.stock!=', $id);
		return $this->db->get()->result();
	}

	public function detail_kirim($id_barang)
	{
		$this->db->select('*');
		$this->db->from('barang');
		$this->db->where('barang.id_barang', $id_barang);
		return $this->db->get()->result();
	}

	public function kirim($data)
	{
		$this->db->insert('barang_masuk', $data);
	}
}

/* End of file M_barang.php */
