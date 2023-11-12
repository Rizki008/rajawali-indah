<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_notif extends CI_Model
{

	// List all your items
	public function barang()
	{
		$this->db->where('stock', '1');
		return $this->db->get('barang')->num_rows();
	}

	// Add a new item
	public function pesanan()
	{
		$this->db->join('barang', 'barang_masuk.id_barang = barang.id_barang', 'left');
		$this->db->where('barang.id_user', $this->session->userdata('id_user'));
		return $this->db->get('barang_masuk')->num_rows();
	}

	public function jmlbarang()
	{
		return $this->db->get('barang')->num_rows();
	}
}

/* End of file M_notif.php */
