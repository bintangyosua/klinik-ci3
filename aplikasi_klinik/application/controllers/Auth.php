<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function register()
	{
		$this->load->view('templates/header', [
			"title" => "Daftar"
		]);
		$this->load->view('auth/register');
		$this->load->view('templates/footer');
	}

	public function regist()
	{
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() === FALSE) {
			$html_string = validation_errors();
			$error_messages = explode('</p>', $html_string);
			array_pop($error_messages);
			$this->session->set_flashdata('errors', $error_messages);
			redirect(site_url('/auth/register'));
		}

		$id = $this->users_model->insert($this->input->post());
		$this->session->set_userdata([
			'id_user' => $id,
			'username' => $this->input->post('username'),
			'logged_in' => true
		]);
		$this->session->set_flashdata('success', "Berhasil daftar");
		redirect(site_url('/'));
	}

	public function login()
	{
		$this->load->view('templates/header', [
			"title" => "Login"
		]);
		$this->load->view('auth/login');
		$this->load->view('templates/footer');
	}

	public function signin()
	{
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() === FALSE) {
			$html_string = validation_errors();
			$error_messages = explode('</p>', $html_string);
			array_pop($error_messages);
			$this->session->set_flashdata('errors', $error_messages);
			redirect(site_url('/auth/register'));
		}

		$username = $this->input->post('username');
		$password = $this->input->post('password');
		if (!$this->users_model->signin($username, $password)) {
			redirect(site_url('/auth/login'));
		}

		$user = $this->users_model->findByUsername($username);

		$this->session->set_userdata([
			'id_user' => $user->id_user,
			'username' => $user->username,
			'logged_in' => true
		]);

		$this->session->set_flashdata('success', "Berhasil login");
		redirect(site_url('/'));
	}

	public function logout()
	{
		$this->session->unset_userdata(['id_user', 'username', 'logged_in']);
		$this->session->set_flashdata('success', "Berhasil logout");
		redirect(site_url("/"));
	}
}
