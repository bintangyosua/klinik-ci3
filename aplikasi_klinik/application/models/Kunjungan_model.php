<?php
class Kunjungan_model extends CI_Model
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
		SELECT `kunjungan`.*, `dokter`.`nama_dokter`, `pasien`.`nama`, `poli`.`nama_poli`, `users`.`username`
		FROM `kunjungan` 
		LEFT JOIN `dokter` ON `kunjungan`.`id_dokter` = `dokter`.`id_dokter` 
		LEFT JOIN `pasien` ON `kunjungan`.`id_pasien` = `pasien`.`id_pasien` 
		LEFT JOIN `poli` ON `kunjungan`.`id_poli` = `poli`.`id_poli` 
		LEFT JOIN `users` ON `kunjungan`.`id_user` = `users`.`id_user`;
		";
		$query = $this->db->query($sql);

		return $query->result();
	}

	public function insert($data)
	{
		return $this->db->insert('kunjungan', $data);
	}

	public function findById(int $id)
	{
		$query = $this->db->get_where('kunjungan', ["id_kunjungan" => $id]);
		return $query->result();
	}

	public function update($pasien)
	{
		$this->db->where('id_kunjungan', $pasien['id_kunjungan']);
		return $this->db->replace('pasien', $pasien);
	}

	public function deleteById(int $id)
	{
		return $this->db->delete('kunjungan', ["id_kunjungan" => $id]);
	}
}
