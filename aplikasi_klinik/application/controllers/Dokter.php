<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dokter extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data = $this->dokter_model->findAll();

		$this->load->view('templates/header', [
			"title" => "Manajemen Dokter"
		]);
		$this->load->view('dokter/index', [
			"data" => $data,
		]);
		$this->load->view('templates/footer');
	}

	public function create()
	{
		if (!$this->session->userdata('id_user')) redirect(site_url('/auth/login'));

		$this->load->view('templates/header', [
			"title" => "Tambah dokter"
		]);
		$this->load->view('dokter/tambah', []);
		$this->load->view('templates/footer');
	}

	public function add()
	{
		if (!$this->session->userdata('id_user')) redirect(site_url('/auth/login'));

		$this->form_validation->set_rules('nama_dokter', 'Nama Dokter', 'required');

		if ($this->form_validation->run() === FALSE) {
			$html_string = validation_errors();
			$error_messages = explode('</p>', $html_string);
			array_pop($error_messages);
			$this->session->set_flashdata('errors', $error_messages);
			redirect(site_url('/dokter/create'));
		}

		$this->dokter_model->insert($this->input->post());
		$this->session->set_flashdata('success', "Berhasil menambahkan dokter baru");
		redirect(site_url('/dokter'));
	}

	public function edit($slug)
	{
		if (!$this->session->userdata('id_user')) redirect(site_url('/auth/login'));

		$data = $this->dokter_model->findById($slug);

		if (!$data) show_404();

		$this->load->view('templates/header', [
			"title" => "Edit Dokter"
		]);
		$this->load->view('dokter/edit', [
			"data" => $data[0],
		]);
		$this->load->view('templates/footer');
	}

	public function update()
	{
		if (!$this->session->userdata('id_user')) redirect(site_url('/auth/login'));

		$this->form_validation->set_rules('nama_dokter', 'Nama Dokter', 'required');

		if ($this->form_validation->run() === FALSE) {
			$html_string = validation_errors();
			$error_messages = explode('</p>', $html_string);
			array_pop($error_messages);
			$this->session->set_flashdata('errors', $error_messages);
			$id = $this->input->post('id');
			redirect(site_url("/dokter/edit/$id"));
		}

		$data = $this->dokter_model->update($this->input->post());

		if (!$data) show_404();

		$this->session->set_flashdata('success', "Berhasil mengedit dokter");
		redirect(site_url('/dokter'));
	}

	public function delete()
	{
		if (!$this->session->userdata('id_user')) redirect(site_url('/auth/login'));

		$id = $this->input->post('id');
		$data = $this->dokter_model->findById($id);

		if (!$data) show_404();

		$this->dokter_model->deleteById($id);
		$this->session->set_flashdata('error', "Berhasil menghapus dokter");
		redirect(site_url("/dokter"));
	}
}
