<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$sql = "
		SELECT tanggal_kunjungan, COUNT(*) AS total_kunjungan
		FROM kunjungan
		GROUP BY tanggal_kunjungan
		UNION ALL
		SELECT tanggal_kunjungan, COUNT(*) AS total_kunjungan
		FROM kunjungan
		GROUP BY tanggal_kunjungan
		ORDER BY tanggal_kunjungan DESC
		LIMIT 4;
		";

		$data = $this->db->query($sql)->result();

		$this->load->view('templates/header', [
			"title" => "Sistem Manajemen Pasien",
		]);
		$this->load->view('home', [
			"data" => $data
		]);
		$this->load->view('templates/footer');
	}
}
