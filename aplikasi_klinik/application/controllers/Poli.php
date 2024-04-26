<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Poli extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data = $this->poli_model->findAll();

		$this->load->view('templates/header', [
			"title" => "Manajemen Poli"
		]);
		$this->load->view('poli/index', [
			"data" => $data,
		]);
		$this->load->view('templates/footer');
	}

	public function create()
	{
		if (!$this->session->userdata('id_user')) redirect(site_url('/auth/login'));

		$this->load->view('templates/header', [
			"title" => "Tambah Poli"
		]);
		$this->load->view('poli/tambah', []);
		$this->load->view('templates/footer');
	}

	public function add()
	{
		if (!$this->session->userdata('id_user')) redirect(site_url('/auth/login'));

		$this->form_validation->set_rules('nama_poli', 'Nama Poli', 'required');

		if ($this->form_validation->run() === FALSE) {
			$html_string = validation_errors();
			$error_messages = explode('</p>', $html_string);
			array_pop($error_messages);
			$this->session->set_flashdata('errors', $error_messages);
			redirect(site_url('/poli/create'));
		}

		$this->poli_model->insert($this->input->post());
		$this->session->set_flashdata('success', "Berhasil menambahkan poli baru");
		redirect(site_url('/poli'));
	}

	public function edit($slug)
	{
		if (!$this->session->userdata('id_user')) redirect(site_url('/auth/login'));

		$data = $this->poli_model->findById($slug);

		if (!$data) show_404();

		$this->load->view('templates/header', [
			"title" => "Edit poli"
		]);
		$this->load->view('poli/edit', [
			"data" => $data[0],
		]);
		$this->load->view('templates/footer');
	}

	public function update()
	{
		if (!$this->session->userdata('id_user')) redirect(site_url('/auth/login'));

		$this->form_validation->set_rules('nama_poli', 'Nama Poli', 'required');

		if ($this->form_validation->run() === FALSE) {
			$html_string = validation_errors();
			$error_messages = explode('</p>', $html_string);
			array_pop($error_messages);
			$this->session->set_flashdata('errors', $error_messages);
			$id = $this->input->post('id');
			redirect(site_url("/poli/edit/$id"));
		}

		$data = $this->poli_model->update($this->input->post());

		if (!$data) show_404();

		$this->session->set_flashdata('success', "Berhasil mengedit poli");
		redirect(site_url('/poli'));
	}

	public function delete()
	{
		if (!$this->session->userdata('id_user')) redirect(site_url('/auth/login'));

		$id = $this->input->post('id');
		$data = $this->poli_model->findById($id);

		if (!$data) show_404();

		$this->poli_model->deleteById($id);
		$this->session->set_flashdata('error', "Berhasil menghapus poli");
		redirect(site_url("/poli"));
	}
}
