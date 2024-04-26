<?php

class Users_model extends CI_Model
{

	public $id_user;
	public $username;
	public $password;

	public function __construct()
	{
		$this->load->database();
	}

	public function findAll()
	{
		$sql = "SELECT `id_user`, `username` FROM users";
		$query = $this->db->query($sql);

		return $query->result();
	}

	public function insert($user)
	{
		$this->db->insert('users', $user);
		return $this->db->insert_id();
	}

	public function findByUsername($username)
	{
		$user = $this->db->get_where('users', ['username' => $username])->result();
		return $user ? $user[0] : null;
	}

	public function signin($username, $password)
	{
		$user = $this->db->get_where('users', ['username' => $username])->result_array();

		if (!$user) {
			$this->session->set_flashdata('error', 'Username tidak terdaftar');
			return false;
		}

		if ($user[0]['password'] !== $password) {
			$this->session->set_flashdata('error', 'Password salah');
			return false;
		}

		return true;
	}
}
