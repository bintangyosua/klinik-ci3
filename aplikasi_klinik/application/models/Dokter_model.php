<?php
class Dokter_model extends CI_Model
{

	public $id_dokter;
	public $nama_dokter;

	public function __construct()
	{
		$this->load->database();
	}

	public function findAll()
	{
		$query = $this->db->get('dokter');

		return $query->result();
	}

	public function insert($data)
	{
		return $this->db->insert('dokter', $data);
	}

	public function findById(int $id)
	{
		$query = $this->db->get_where('dokter', ["id_dokter" => $id]);
		return $query->result();
	}

	public function update($data)
	{
		$this->db->where('id_dokter', $data['id_dokter']);
		return $this->db->replace('dokter', $data);
	}

	public function deleteById(int $id)
	{
		return $this->db->delete('dokter', ["id_dokter" => $id]);
	}
}
