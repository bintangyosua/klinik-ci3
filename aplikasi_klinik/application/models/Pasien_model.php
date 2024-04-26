<?php
class Pasien_model extends CI_Model
{

	public $id_pasien;
	public $nama;
	public $tanggal_lahir;
	public $alamat;
	public $id_user;

	public function __construct()
	{
		$this->load->database();
	}

	public function findAll()
	{
		$sql = "
		SELECT `pasien`.*, `users`.`username`, `kunjungan`.`tanggal_kunjungan`, `kunjungan`.`keluhan`, `dokter`.`nama_dokter`, `poli`.`nama_poli`
		FROM `pasien` 
		LEFT JOIN `users` ON `pasien`.`id_user` = `users`.`id_user` 
		LEFT JOIN `kunjungan` ON `kunjungan`.`id_pasien` = `pasien`.`id_pasien` 
		LEFT JOIN `dokter` ON `kunjungan`.`id_dokter` = `dokter`.`id_dokter` 
		LEFT JOIN `poli` ON `kunjungan`.`id_poli` = `poli`.`id_poli`;
		";
		$query = $this->db->query($sql);

		return $query->result();
	}

	public function insert($pasien)
	{
		return $this->db->insert('pasien', $pasien);
	}

	public function findById(int $id)
	{
		$query = $this->db->get_where('pasien', ["id_pasien" => $id]);
		return $query->result();
	}

	public function update($pasien)
	{
		$this->db->where('id_pasien', $pasien['id_pasien']);
		return $this->db->replace('pasien', $pasien);
	}

	public function deleteById(int $id)
	{
		return $this->db->delete('pasien', ["id_pasien" => $id]);
	}
}
