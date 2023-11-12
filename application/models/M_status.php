<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_status extends CI_Model
{
	public function masuk()
	{
		$this->db->select('*');
		$this->db->from('barang_masuk');
		$this->db->join('pembayaran', 'pembayaran.no_pengiriman = barang_masuk.no_pengiriman', 'left');
		$this->db->join('barang', 'barang.id_barang = barang_masuk.id_barang', 'left');
		$this->db->join('kategori', 'kategori.id_kategori = barang.id_kategori', 'left');
		$this->db->join('user', 'user.id_user = barang_masuk.id_user', 'left');
		$this->db->where('barang.id_user', $this->session->userdata('id_user'));
		$this->db->group_by('barang_masuk.no_pengiriman');
		$this->db->order_by('id_barang_masuk', 'desc');
		return $this->db->get()->result();
	}
	public function masuk_admin()
	{
		$this->db->select('*');
		$this->db->from('barang_masuk');
		$this->db->join('pembayaran', 'pembayaran.no_pengiriman = barang_masuk.no_pengiriman', 'left');
		$this->db->join('barang', 'barang.id_barang = barang_masuk.id_barang', 'left');
		$this->db->join('kategori', 'kategori.id_kategori = barang.id_kategori', 'left');
		$this->db->join('user', 'user.id_user = barang_masuk.id_user', 'left');
		// $this->db->where('barang_masuk.id_user', $this->session->userdata('id_user'));
		$this->db->group_by('barang_masuk.no_pengiriman');
		$this->db->order_by('id_barang_masuk', 'desc');
		return $this->db->get()->result();
	}
	public function update_status($data)
	{
		$this->db->where('id_barang_masuk', $data['id_barang_masuk']);
		$this->db->update('barang_masuk', $data);
	}
	public function update_status_sup($data)
	{
		$this->db->where('no_pengiriman', $data['no_pengiriman']);
		$this->db->update('barang_masuk', $data);
	}
	public function update_kirim($data)
	{
		$this->db->where('no_pengiriman', $data['no_pengiriman']);
		$this->db->update('barang_masuk', $data);
	}
	public function pembayaran($no_pengiriman)
	{
		$this->db->select('*');
		$this->db->from('pembayaran');
		$this->db->join('barang_masuk', 'barang_masuk.no_pengiriman = pembayaran.no_pengiriman', 'left');
		$this->db->join('user', 'user.id_user = barang_masuk.id_user', 'left');
		$this->db->join('barang', 'barang.id_barang = barang_masuk.id_barang', 'left');
		$this->db->where('pembayaran.no_pengiriman', $no_pengiriman);
		return $this->db->get()->result();
	}

	public function detail($no_pengiriman)
	{
		$this->db->select('*');
		$this->db->from('barang_masuk');
		$this->db->where('barang_masuk.no_pengiriman', $no_pengiriman);
		$this->db->join('pembayaran', 'pembayaran.no_pengiriman = barang_masuk.no_pengiriman', 'left');
		$this->db->join('barang', 'barang.id_barang = barang_masuk.id_barang', 'left');
		$this->db->join('kategori', 'kategori.id_kategori = barang.id_kategori', 'left');
		$this->db->join('user', 'user.id_user = barang_masuk.id_user', 'left');
		return $this->db->get()->result();
	}
}
