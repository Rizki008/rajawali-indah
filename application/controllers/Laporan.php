<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_laporan');
	}

	public function index()
	{
		$data = array(
			'title' => 'Data Laporan Barang Keluar Dan Barang Masuk',
			'isi' => 'admin/laporan/v_laporan'
		);
		$this->load->view('admin/layout/v_wrapper', $data, FALSE);
	}

	// LAPORAN BARANG KELUAR
	public function lap_hari()
	{
		$tanggal = $this->input->post('tanggal');
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');

		$data = array(
			'title' => 'Laporan Barang Keluar Perhari',
			'tanggal' => $tanggal,
			'bulan' => $bulan,
			'tahun' => $tahun,
			'laporan' => $this->m_laporan->lap_hari($tanggal, $bulan, $tahun),
			'isi' => 'admin/laporan/keluar/v_hari'
		);
		$this->load->view('admin/layout/v_wrapper', $data, FALSE);
	}

	public function lap_bulan()
	{
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');
		$data = array(
			'title' => 'Laporan Barang Keluar Perbulan',
			'bulan' => $bulan,
			'tahun' => $tahun,
			'laporan' => $this->m_laporan->lap_bulan($bulan, $tahun),
			'isi' => 'admin/laporan/keluar/v_bulan'
		);
		$this->load->view('admin/layout/v_wrapper', $data, FALSE);
	}

	public function lap_tahun()
	{
		$tahun = $this->input->post('tahun');
		$data = array(
			'title' => 'Laporan Barang Keluar Pertahun',
			'tahun' => $tahun,
			'laporan' => $this->m_laporan->lap_tahun($tahun),
			'isi' => 'admin/laporan/keluar/v_tahun'
		);
		$this->load->view('admin/layout/v_wrapper', $data, FALSE);
	}

	// LAPORAN BARANG MASUK
	public function lap_hari_masuk()
	{
		$tanggal = $this->input->post('tanggal');
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');

		$data = array(
			'title' => 'Laporan Barang Masuk Perhari',
			'tanggal' => $tanggal,
			'bulan' => $bulan,
			'tahun' => $tahun,
			'laporan' => $this->m_laporan->lap_hari_masuk($tanggal, $bulan, $tahun),
			'isi' => 'admin/laporan/masuk/v_hari'
		);
		$this->load->view('admin/layout/v_wrapper', $data, FALSE);
	}

	public function lap_bulan_masuk()
	{
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');
		$data = array(
			'title' => 'Laporan Barang Masuk Perbulan',
			'bulan' => $bulan,
			'tahun' => $tahun,
			'laporan' => $this->m_laporan->lap_bulan_masuk($bulan, $tahun),
			'isi' => 'admin/laporan/masuk/v_bulan'
		);
		$this->load->view('admin/layout/v_wrapper', $data, FALSE);
	}

	public function lap_tahun_masuk()
	{
		$tahun = $this->input->post('tahun');
		$data = array(
			'title' => 'Laporan Barang Masuk Pertahun',
			'tahun' => $tahun,
			'laporan' => $this->m_laporan->lap_tahun_masuk($tahun),
			'isi' => 'admin/laporan/masuk/v_tahun'
		);
		$this->load->view('admin/layout/v_wrapper', $data, FALSE);
	}
}
