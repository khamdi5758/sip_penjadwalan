<?php
class JadwalKhusus_Model extends CI_Model
{
	public function getAllData()
	{
		$this->db->select('id_jadwal_khusus, kelas, hari, keterangan, sesi, durasi');
		$this->db->from('jadwal_khusus');
		return $this->db->get()->result_array();
	}

	/* 
	* jadwal khusus yang di skip untuk keperluan di controller Data Jadwal
	*/
	public function getJadwalKhusus_hari($kelas, $hari)
	{
		return $this->db->query("SELECT * FROM `jadwal_khusus` WHERE hari = '" . $hari . "' AND kelas LIKE '%" . $kelas . "' GROUP by sesi ")->result();
	}

	public function tambah_data()
	{
		$hari = $this->input->post('hari');
		$kelas = $this->input->post('kelas');
		foreach ($hari as $h) {
			foreach ($kelas as $k) {
				$data = array(
					'hari' => $h,
					'kelas' => $k,
					'keterangan' => $this->input->post('keterangan'),
					'sesi' => $this->input->post('sesi'),
					'durasi' => $this->input->post('durasi')
				);
				$this->db->insert('jadwal_khusus', $data);
			}
		}
	}

	public function hapus_data($id)
	{
		$this->db->delete('jadwal_khusus', ['id_jadwal_khusus' => $id]);
	}

	public function ubah_data()
	{
		$data = array(
			'hari' => $this->input->post('hari'),
			'kelas' => $this->input->post('kelas'),
			'keterangan' => $this->input->post('keterangan'),
			'sesi' => $this->input->post('sesi'),
			'durasi' => $this->input->post('durasi')
		);
		$this->db->where('id_jadwal_khusus', $this->input->post('id_jadwal_khusus', true));
		$this->db->update('jadwal_khusus', $data);
	}

	public function detail_data($id)
	{
		return $this->db->get_where('jadwal_khusus', ['id_jadwal_khusus' => $id])->row_array();
	}
}
