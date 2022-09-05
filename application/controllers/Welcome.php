<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->has_userdata('id_user')) {
			redirect('Login');
		}
		$this->load->model('Guru_Model');
		$this->load->model('Jurusan_Model');
		$this->load->model('Kelas_Model');
		$this->load->model('Mapel_Model');
	}
	public function index()
	{
		$data = [
			'guru' => count($this->Guru_Model->getAllData()),
			'mapel' => count($this->Mapel_Model->getAllData(true)),
			'kelas' => count($this->Kelas_Model->getAllData()),
			'jurusan' => count($this->Jurusan_Model->getAllData())
		];
		$this->load->view("templates/header");
		$this->load->view("templates/sidebar");
		$this->load->view("index", $data);
		$this->load->view("templates/footer");
	}
}
