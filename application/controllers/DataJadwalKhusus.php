<?php

/**
 * 
 */
class DataJadwalKhusus extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->has_userdata('id_user')) {
			redirect('Login');
		}
		$this->load->model('JadwalKhusus_Model');
		$this->load->model('Kelas_Model');
		$this->load->model('Jadwal_Model');
		$this->load->library('form_validation');
	}
	function index()
	{
		// tampil list range jam
		$data = [
			'jadwal_khusus' => $this->JadwalKhusus_Model->getAllData(),
			'dataKelas' => $this->Kelas_Model->getAllData(),
			'jadwal' => $this->Jadwal_Model->getAllData(),
		];
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('jadwalKhusus/index', $data);
		$this->load->view('templates/footer');
	}


	public function validation_form()
	{
		$this->JadwalKhusus_Model->tambah_data();
		$this->session->set_flashdata('flash_jadwalKhusus', 'Disimpan');
		redirect('DataJadwalKhusus');
	}

	public function hapus($id_jam)
	{
		$this->JadwalKhusus_Model->hapus_data($id_jam);
		$this->session->set_flashdata('flash_jadwalKhusus', 'Dihapus');
		redirect('DataJadwalKhusus');
	}

	public function ubah($id_jam)
	{
		$this->form_validation->set_rules("id_jam", "ID Jam", "required|max_length[5]");
		$this->form_validation->set_rules("jamke", "Jam Ke-", "required");
		$this->form_validation->set_rules("jammu", "Jam Mulai", "required");
		$this->form_validation->set_rules("jamsel", " Jam Selesai", "required");
		if ($this->form_validation->run() == FALSE) {
			$data['ubah'] = $this->JadwalKhusus_Model->detail_data($id_jam);
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar');
			$this->load->view('rangejam/ubah', $data);
			$this->load->view('templates/footer');
		} else {
			$this->JadwalKhusus_Model->ubah_data();
			$this->session->set_flashdata('flash_jadwalKhusus', 'DiUbah');
			redirect('DataJadwalKhusus');
		}
	}
}
