<?php

/**
 * 
 */
class Kelas_Model extends CI_Model
{
	/* 
	* mengambil semua data kelas dan join data jurusan
	*/
	public function getAllData()
	{
		$this->db->select('id_kelas, kelas, kelas.id_jurusan, jurusan.nama_jurusan, nama_kelas');
		$this->db->from('kelas');
		$this->db->join('jurusan', 'jurusan.id_jurusan = kelas.id_jurusan');
		$this->db->order_by('kelas.id_jurusan', 'ASC');
		$this->db->order_by('kelas.kelas', 'ASC');
		$this->db->order_by('kelas.nama_kelas', 'ASC');
		return $this->db->get()->result();
	}

	public function getAllData_jurusan()
	{
		return $this->db->get('jurusan')->result();
	}

	public function tambah_data()
	{
		$data = array(
			'id_kelas' => $this->input->post('kelas') .	$this->input->post('id_jur') . $this->input->post('nm_kelas'),
			'kelas' => $this->input->post('kelas'),
			'id_jurusan' => $this->input->post('id_jur'),
			'nama_kelas' => $this->input->post('nm_kelas')
		);
		$this->db->insert('kelas', $data);
	}

	public function hapus_data($id)
	{
		$this->db->delete('kelas', ['id_kelas' => $id]);
	}

	public function detail_data($id)
	{
		return $this->db->get_where('kelas', ['id_kelas' => $id])->row_array();
	}
}
