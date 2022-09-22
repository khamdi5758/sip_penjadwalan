<?php

/**
 * 
 */
class DataRuang extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->has_userdata('id_user')) {
			redirect('Login');
		}
		$this->load->model('Ruang_Model');
		$this->load->library('form_validation');
	}

	public function crcode(){
		$code = $this->Ruang_Model->Createcode();
		echo $code;
	}

	function index()
	{
		$data['ruang'] = $this->Ruang_Model->getAllData();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('ruang/index', $data);
		$this->load->view('templates/footer');
	}

	public function validation_form()
	{
		// $this->form_validation->set_rules("id_jur", "Kode ruang", "required|is_unique[ruang.id_ruang]|max_length[20]");
		$this->form_validation->set_rules("nm_ruang", "Nama ruang", "required");
		$this->form_validation->set_rules("kasis", "kapasitas", "required");
		if ($this->form_validation->run() == FALSE) {
			$this->index();
		} else {
			$this->Ruang_Model->tambah_data();
			$this->session->set_flashdata('flash_ruang', 'Disimpan');
			redirect('Dataruang');
		}
	}

	public function hapus($id)
	{
		$this->Ruang_Model->hapus_data($id);
		$this->session->set_flashdata('flash_ruang', 'Dihapus');
		redirect('Dataruang');
	}

	public function ubah($id)
	{
		// $this->form_validation->set_rules("id_jur", "Kode ruang", "required|max_length[20]");
		$this->form_validation->set_rules("nm_ruang", "Nama ruang", "required");
		$this->form_validation->set_rules("kasis", "kapasistas", "required");
		if ($this->form_validation->run() == FALSE) {
			$data['ubah'] = $this->Ruang_Model->detail_data($id);
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar');
			$this->load->view('ruang/ubah', $data);
			$this->load->view('templates/footer');
		} else {
			$this->Ruang_Model->ubah_data();
			$this->session->set_flashdata('flash_ruang', 'DiUbah');
			redirect('Dataruang');
		}
	}
}
