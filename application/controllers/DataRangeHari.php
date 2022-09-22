<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 * 
 */
class DataRangeHari extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->has_userdata('id_user')) {
			redirect('Login');
		}
		$this->load->model('RangeHari_Model');
		$this->load->library('form_validation');
	}
	function index()
	{
		// tampil list range jam
		$data['range_hari'] = $this->RangeHari_Model->getAllData();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('rangehari/index', $data);
		$this->load->view('templates/footer');
	}


	public function validation_form()
	{
		$this->RangeHari_Model->tambah_data();
		$this->session->set_flashdata('flash_rangehari', 'Disimpan');
		redirect('DataRangeHari');
	}

	public function hapus($id_jam)
	{
		$this->RangeHari_Model->hapus_data($id_jam);
		$this->session->set_flashdata('flash_rangehari', 'Dihapus');
		redirect('DataRangeHari');
	}

	public function ubah($id_jam)
	{
		$this->form_validation->set_rules("id_jam", "ID Jam", "required|max_length[5]");
		$this->form_validation->set_rules("jamke", "Jam Ke-", "required");
		$this->form_validation->set_rules("jammu", "Jam Mulai", "required");
		$this->form_validation->set_rules("jamsel", " Jam Selesai", "required");
		if ($this->form_validation->run() == FALSE) {
			$data['ubah'] = $this->RangeJam_Model->detail_data($id_jam);
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar');
			$this->load->view('rangejam/ubah', $data);
			$this->load->view('templates/footer');
		} else {
			$this->RangeJam_Model->ubah_data();
			$this->session->set_flashdata('flash_rangejam', 'DiUbah');
			redirect('DataRangeJam');
		}
	}
}
