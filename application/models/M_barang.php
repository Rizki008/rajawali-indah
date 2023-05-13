<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_barang extends CI_Model
{

	// List all your items
	public function barang()
	{
		$this->db->select('*');
		$this->db->from('barang');
		$this->db->join('kategori', 'kategori.id_kategori = barang.id_kategori', 'left');
		$this->db->join('user', 'user.id_user = barang.id_user', 'left');
		$this->db->order_by('id_barang', 'desc');
		return $this->db->get()->result();
	}

	// List all your items
	public function barang_kurang()
	{
		$this->db->select('*');
		$this->db->from('barang');
		$this->db->join('kategori', 'kategori.id_kategori = barang.id_kategori', 'left');
		$this->db->join('user', 'user.id_user = barang.id_user', 'left');
		$this->db->where('stock <= 20');
		$this->db->order_by('id_barang', 'desc');
		return $this->db->get()->result();
	}

	// Add a new item
	public function add($data)
	{
		$this->db->insert('barang', $data);
	}

	// Detail update

	public function details($id_barang = null)
	{
		$this->db->select('*');
		$this->db->from('barang');
		$this->db->join('kategori', 'kategori.id_kategori = barang.id_kategori', 'left');
		$this->db->join('user', 'user.id_user = barang.id_user', 'left');
		$this->db->where('id_barang', $id_barang);
		return $this->db->get()->row();
	}
	//Update one item
	public function update($data)
	{
		$this->db->where('id_barang', $data['id_barang']);
		$this->db->update('barang', $data);
	}

	//Delete one item
	public function delete($data)
	{
		$this->db->where('id_barang', $data['id_barang']);
		$this->db->delete('barang', $data);
	}

	//BARANG KELUAR
	public function keluar()
	{
		$this->db->select('*');
		$this->db->from('barang_keluar');
		$this->db->join('barang', 'barang.id_barang = barang_keluar.id_barang', 'left');
		$this->db->order_by('id_barang_keluar', 'desc');
		return $this->db->get()->result();
	}

	public function kirim_barang($data)
	{
		$this->db->insert('barang_keluar', $data);
	}
}

/* End of file M_barang.php */
