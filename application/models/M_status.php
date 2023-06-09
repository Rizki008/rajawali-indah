<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_status extends CI_Model
{
	public function masuk()
	{
		$this->db->select('*');
		$this->db->from('barang_masuk');
		$this->db->join('barang', 'barang.id_barang = barang_masuk.id_barang', 'left');
		$this->db->join('kategori', 'kategori.id_kategori = barang.id_kategori', 'left');
		// $this->db->where('status=0');
		$this->db->order_by('id_barang_masuk', 'desc');
		return $this->db->get()->result();
	}
	public function update_status($data)
	{
		$this->db->where('id_barang_masuk', $data['id_barang_masuk']);
		$this->db->update('barang_masuk', $data);
	}
}
