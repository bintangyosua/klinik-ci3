<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kunjungan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data = $this->kunjungan_model->findAll();

		$this->load->view('templates/header', [
			"title" => "Manajemen Kunjungan"
		]);
		$this->load->view('kunjungan/index', [
			"data" => $data,
		]);
		$this->load->view('templates/footer');
	}

	public function create()
	{
		if (!$this->session->userdata('id_user')) redirect(site_url('/auth/login'));

		$pasien = $this->pasien_model->findAll();
		$dokter = $this->dokter_model->findAll();
		$poli = $this->poli_model->findAll();

		$this->load->view('templates/header', [
			"title" => "Tambah Kunjungan"
		]);
		$this->load->view('kunjungan/tambah', [
			'pasien' => $pasien,
			'dokter' => $dokter,
			'poli' => $poli,
		]);
		$this->load->view('templates/footer');
	}

	public function add()
	{
		if (!$this->session->userdata('id_user')) redirect(site_url('/auth/login'));

		$this->form_validation->set_rules('id_dokter', 'Nama Dokter', 'required');
		$this->form_validation->set_rules('id_pasien', 'Nama Pasien', 'required');
		$this->form_validation->set_rules('tanggal_kunjungan', 'Tanggal Kunjungan', 'required');
		$this->form_validation->set_rules('keluhan', 'Keluhan', 'required');
		$this->form_validation->set_rules('id_poli', 'Poli', 'required');
		$this->form_validation->set_rules('id_user', 'User', 'required');

		if ($this->form_validation->run() === FALSE) {
			$html_string = validation_errors();
			$error_messages = explode('</p>', $html_string);
			array_pop($error_messages);
			$this->session->set_flashdata('errors', $error_messages);
			redirect(site_url('/kunjungan/create'));
		}

		$this->kunjungan_model->insert($this->input->post());
		$this->session->set_flashdata('success', "Berhasil menambahkan kunjungan baru");
		redirect(site_url('/kunjungan'));
	}

	public function edit($slug)
	{
		if (!$this->session->userdata('id_user')) redirect(site_url('/auth/login'));

		$data = $this->kunjungan_model->findById($slug);
		$pasien = $this->pasien_model->findAll();
		$dokter = $this->dokter_model->findAll();
		$poli = $this->poli_model->findAll();

		if (!$data) show_404();

		$this->load->view('templates/header', [
			"title" => "Edit Kunjungan"
		]);
		$this->load->view('kunjungan/edit', [
			"data" => $data[0],
			'pasien' => $pasien,
			'dokter' => $dokter,
			'poli' => $poli,
		]);
		$this->load->view('templates/footer');
	}

	public function update()
	{
		if (!$this->session->userdata('id_user')) redirect(site_url('/auth/login'));

		$this->form_validation->set_rules('id_dokter', 'Nama Dokter', 'required');
		$this->form_validation->set_rules('id_pasien', 'Nama Pasien', 'required');
		$this->form_validation->set_rules('tanggal_kunjungan', 'Tanggal Kunjungan', 'required');
		$this->form_validation->set_rules('keluhan', 'Keluhan', 'required');
		$this->form_validation->set_rules('id_poli', 'Poli', 'required');

		if ($this->form_validation->run() === FALSE) {
			$html_string = validation_errors();
			$error_messages = explode('</p>', $html_string);
			array_pop($error_messages);
			$this->session->set_flashdata('errors', $error_messages);
			$id = $this->input->post('id');
			redirect(site_url("/kunjungan/edit/$id"));
		}

		$data = $this->kunjungan_model->update($this->input->post());

		if (!$data) show_404();

		$this->session->set_flashdata('success', "Berhasil mengedit kunjungan");
		redirect(site_url('/kunjungan'));
	}

	public function delete()
	{
		if (!$this->session->userdata('id_user')) redirect(site_url('/auth/login'));

		$id = $this->input->post('id');
		$data = $this->kunjungan_model->findById($id);

		if (!$data) show_404();

		$this->kunjungan_model->deleteById($id);
		$this->session->set_flashdata('error', "Berhasil menghapus kunjungan");
		redirect(site_url("/kunjungan"));
	}
}
