<?php

/**
 * 
 */
class DataJurusan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->has_userdata('id_user')) {
			redirect('Login');
		}
		$this->load->model('Jurusan_Model');
		$this->load->library('form_validation');
	}

	public function crcode(){
		$code = $this->Jurusan_Model->Createcode();
		echo $code;
	}

	function index()
	{
		$data['jurusan'] = $this->Jurusan_Model->getAllData();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('jurusan/index', $data);
		$this->load->view('templates/footer');
	}

	public function validation_form()
	{
		// $this->form_validation->set_rules("id_jur", "Kode Jurusan", "required|is_unique[jurusan.id_jurusan]|max_length[20]");
		$this->form_validation->set_rules("nm_jur", "Nama Jurusan", "required|is_unique[jurusan.nama_jurusan]");
		if ($this->form_validation->run() == FALSE) {
			$this->index();
		} else {
			$this->Jurusan_Model->tambah_data();
			$this->session->set_flashdata('flash_jurusan', 'Disimpan');
			redirect('DataJurusan');
		}
	}

	public function hapus($id)
	{
		$this->Jurusan_Model->hapus_data($id);
		$this->session->set_flashdata('flash_jurusan', 'Dihapus');
		redirect('DataJurusan');
	}

	public function ubah($id)
	{
		// $this->form_validation->set_rules("id_jur", "Kode Jurusan", "required|max_length[20]");
		$this->form_validation->set_rules("nm_jur", "Nama Jurusan", "required");
		if ($this->form_validation->run() == FALSE) {
			$data['ubah'] = $this->Jurusan_Model->detail_data($id);
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar');
			$this->load->view('jurusan/ubah', $data);
			$this->load->view('templates/footer');
		} else {
			$this->Jurusan_Model->ubah_data();
			$this->session->set_flashdata('flash_jurusan', 'DiUbah');
			redirect('DataJurusan');
		}
	}
}
