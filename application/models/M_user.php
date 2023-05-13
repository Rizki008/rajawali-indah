<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_user extends CI_Model
{
	// List all your items
	public function user()
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->order_by('id_user', 'desc');
		return $this->db->get()->result();
	}
	// List all your items
	public function user_supplier()
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('level_user=3');
		$this->db->order_by('id_user', 'desc');
		return $this->db->get()->result();
	}

	// Add a new item
	public function add()
	{
	}

	//Update one item
	public function update($id = NULL)
	{
	}

	//Delete one item
	public function delete($id = NULL)
	{
	}
}

/* End of file M_user.php */
