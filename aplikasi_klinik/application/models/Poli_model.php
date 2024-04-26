<?php
class Poli_model extends CI_Model
{

	public $id_poli;
	public $nama_poli;

	public function __construct()
	{
		$this->load->database();
	}

	public function findAll()
	{
		$query = $this->db->get('poli');

		return $query->result();
	}

	public function insert($data)
	{
		return $this->db->insert('poli', $data);
	}

	public function findById(int $id)
	{
		$query = $this->db->get_where('poli', ["id_poli" => $id]);
		return $query->result();
	}

	public function update($data)
	{
		$this->db->where('id_poli', $data['id_poli']);
		return $this->db->replace('poli', $data);
	}

	public function deleteById(int $id)
	{
		return $this->db->delete('poli', ["id_poli" => $id]);
	}
}
