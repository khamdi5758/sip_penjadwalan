<?php

/**
 * 
 */
class RangeJam_Model extends CI_Model
{
	public function getAllData()
	{
		$this->db->select('id_jadwal, hari, jumlah_sesi, lama_sesi, jam_mulai');
		$this->db->from('jadwal');
		return $this->db->get()->result();
	}

	public function tambah_data()
	{
		$hari = $this->input->post('chkJadwalHari');
		foreach ($hari as $value) {
			$data = array(
				'id_jadwal' => $this->input->post('id_jadwal'),
				'hari' => $value,
				'jumlah_sesi' => $this->input->post('sesi'),
				'lama_sesi' => $this->input->post('durasi'),
				'jam_mulai' => $this->input->post('waktuMulai')
			);
			$this->db->insert('jadwal', $data);
		}
	}

	public function hapus_data($id)
	{
		$this->db->delete('jadwal', ['id_jadwal' => $id]);
	}

	public function ubah_data()
	{
		$data = array(
			'hari' => $this->input->post('hari'),
			'jumlah_sesi' => $this->input->post('sesi'),
			'lama_sesi' => $this->input->post('durasi'),
			'jam_mulai' => $this->input->post('waktuMulai')
		);
		$this->db->where('id_jadwal', $this->input->post('id_jadwal', true));
		$this->db->update('jadwal', $data);
	}


	public function detail_data($id)
	{
		return $this->db->get_where('jadwal', ['id_jadwal' => $id])->row_array();
	}
}
