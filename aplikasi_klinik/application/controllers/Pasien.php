<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pasien extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$pasien = $this->pasien_model->findAll();

		$this->load->view('templates/header', [
			"title" => "Manajemen Pasien"
		]);
		$this->load->view('pasien/index', [
			"pasien" => $pasien,
		]);
		$this->load->view('templates/footer');
	}

	public function create()
	{
		$users = $this->users_model->findAll();

		$this->load->view('templates/header', [
			"title" => "Tambah pasien"
		]);
		$this->load->view('pasien/tambah', [
			"users" => $users
		]);
		$this->load->view('templates/footer');
	}

	public function add()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('id_user', 'User', 'required');

		if ($this->form_validation->run() === FALSE) {
			$html_string = validation_errors();
			$error_messages = explode('</p>', $html_string);
			array_pop($error_messages);
			$this->session->set_flashdata('errors', $error_messages);
			redirect(site_url('/pasien/create'));
		}

		$this->pasien_model->insert($this->input->post());
		$this->session->set_flashdata('success', "Berhasil menambahkan pasien baru");
		redirect(site_url('/pasien'));
	}

	public function edit($slug)
	{
		$pasien = $this->pasien_model->findById($slug);
		$users = $this->users_model->findAll();

		if (!$pasien) show_404();

		$this->load->view('templates/header', [
			"title" => "Edit Pasien"
		]);
		$this->load->view('pasien/edit', [
			"pasien" => $pasien[0],
			"users" => $users
		]);
		$this->load->view('templates/footer');
	}

	public function update()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('id_user', 'User', 'required');

		if ($this->form_validation->run() === FALSE) {
			$html_string = validation_errors();
			$error_messages = explode('</p>', $html_string);
			array_pop($error_messages);
			$this->session->set_flashdata('errors', $error_messages);
			$id = $this->input->post('id');
			redirect(site_url("/pasien/edit/$id"));
		}

		$pasien = $this->pasien_model->update($this->input->post());

		if (!$pasien) show_404();

		$this->session->set_flashdata('success', "Berhasil mengedit pasien baru");
		redirect(site_url('/pasien'));
	}

	public function delete()
	{
		$id = $this->input->post('id');
		$pasien = $this->pasien_model->findById($id);

		if (!$pasien) show_404();

		$this->pasien_model->deleteById($id);
		$this->session->set_flashdata('error', "Berhasil menghapus pasien baru");
		redirect(site_url("/pasien"));
	}
}
