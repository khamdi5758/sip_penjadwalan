<?php

/**
 * 
 */
class PenugasanGuru_Model extends CI_Model
{
	public function getAllDataJoin()
	{
		$this->db->select('id_tugas, guru.id_guru, mapel.id_mapel, kelas.id_kelas, tahun_ajaran');
		$this->db->from('tugas_guru');
		$this->db->join('guru', 'guru.id_guru = tugas_guru.id_guru');
		$this->db->join('mapel', 'mapel.kode_mapel = tugas_guru.id_mapel');
		$this->db->join('kelas', 'kelas.id_kelas = tugas_guru.id_kelas');
		return $this->db->get()->result();
	}

	/* 
	* mengambil data penugasan guru dan beban mapel berdasarkan id guru 
	*/
	/* public function getDataByidGuru($id_guru)
	{
		$this->db->select('*');
		$this->db->from('tugas_guru');
		$this->db->join('mapel', 'tugas_guru.id_mapel = mapel.id_mapel');
		$this->db->where('tugas_guru.id_guru', $id_guru);
		return $this->db->get()->result();
	} */

	/* 
	* mengambil data penugasan guru dan beban mapel berdasarkan id guru dan id kelas dengan sisa jam !=0
	*/
	public function getDatatugasByidGuru($id_guru, $id_kelas)
	{
		$this->db->select('*, guru.code_color');
		$this->db->from('tugas_guru');
		$this->db->join('mapel', 'tugas_guru.id_mapel = mapel.id_mapel');
		$this->db->join('guru', 'guru.id_guru = tugas_guru.id_guru');
		$this->db->where('tugas_guru.id_guru', $id_guru);
		$this->db->where('tugas_guru.id_kelas', $id_kelas);
		$this->db->where('tugas_guru.sisa_jam !=', '0');
		return $this->db->get()->result();
	}



	public function getAllData()
	{
		return $this->db->get('tugas_guru')->result();
	}

	public function getAllDataByid_kelas($id_kelas)
	{
		return $this->db->query("SELECT tugas_guru.*, mapel.beban_jam, mapel.nama_mapel from tugas_guru left join mapel on tugas_guru.id_mapel = mapel.id_mapel where tugas_guru.id_kelas= '" . $id_kelas . "' GROUP by id_tugas")->result();
	}

	public function tugasGuruBelumterplot($id_kelas = null)
	{
		if ($id_kelas === null) {
			return $this->db->query("SELECT tugas_guru.*, mapel.beban_jam, mapel.nama_mapel , guru.nama_guru, request_jadwal.hari from tugas_guru join guru on tugas_guru.id_guru = guru.id_guru left join mapel on tugas_guru.id_mapel = mapel.id_mapel LEFT JOIN request_jadwal ON tugas_guru.id_guru = request_jadwal.id_guru where tugas_guru.status = 0")->result();
		}
		return $this->db->query("SELECT tugas_guru.*, mapel.beban_jam, mapel.nama_mapel, guru.nama_guru from tugas_guru join guru on tugas_guru.id_guru = guru.id_guru left join mapel on tugas_guru.id_mapel = mapel.id_mapel LEFT JOIN request_jadwal ON tugas_guru.id_guru = request_jadwal.id_guru where tugas_guru.id_kelas= '" . $id_kelas . "' AND tugas_guru.status = 0 GROUP by id_tugas")->result();
	}

	public function getTugasGuruJoinMapelRequestJadwal($id_kelas = null, $hari = null)
	{
		return $this->db->query("SELECT tugas_guru.*, mapel.nama_mapel, mapel.beban_jam FROM tugas_guru LEFT JOIN mapel on mapel.id_mapel = tugas_guru.id_mapel LEFT JOIN request_jadwal on tugas_guru.id_guru = request_jadwal.id_guru where tugas_guru.id_kelas='" . $id_kelas . "' && tugas_guru.status='0' && request_jadwal.hari LIKE '%" . $hari . "%' GROUP BY id_tugas");
	}

	public function tambah_data()
	{
		// $jumlah = $this->input->post('jml_data');
		echo $jumlah = count($this->input->post('guru'));
		$id_kelas = $this->input->post('id_kelas');
		$id_mapel = $this->input->post('id_mapel');
		$kode_mapel = $this->input->post('kode_mapel');
		$beban_jam = $this->input->post('beban_jam');
		$id_guru = $this->input->post('guru');
		print_r($id_guru);
		echo '<br>';
		for ($i = 0; $i < $jumlah; $i++) {
			if ($id_guru[$i] != 'Pilih Guru') {
				$data = array(
					'id_tugas' => $id_guru[$i] . '-' . $id_mapel[$i] . '-' . $id_kelas[$i],
					'id_guru' => $id_guru[$i],
					'id_mapel' => $id_mapel[$i],
					'kode_mapel' => $kode_mapel,
					'id_kelas' => $id_kelas[$i],
					'sisa_jam' => $beban_jam[$i],
					'beban_jam' => $beban_jam[$i]
				);
				print_r($data);
				echo '<br>';
				$this->db->insert('tugas_guru', $data);
			}
		}
	}

	public function ubah_data()
	{
		$data = array(
			'id_guru' => $this->input->post('id_gur', true),
			'id_mapel' => $this->input->post('id_map', true),
			'id_kelas' => $this->input->post('id_kls', true),
			'tahun_ajaran' => $this->input->post('thn', true)
		);
		$this->db->where('id_tugas', $this->input->post('id_pen', true));
		$this->db->update('tugas_guru', $data);
	}

	public function hapus_data($id)
	{
		$this->db->delete('tugas_guru', ['id_tugas' => $id]);
	}

	public function detail_data($id)
	{
		$this->db->join('mapel', 'tugas_guru.id_mapel = mapel.id_mapel');
		return $this->db->get_where('tugas_guru', ['id_tugas' => $id])->row_array();
	}

	public function dataKelasByKodeMapel($kode_mapel)
	{
		return $this->db->query("SELECT mapel.*, kelas.*, tugas_guru.id_tugas, tugas_guru.id_guru  FROM `mapel` INNER join kelas on (mapel.kelas = kelas.kelas && mapel.id_jurusan = kelas.id_jurusan)  LEFT JOIN tugas_guru on (kelas.id_kelas = tugas_guru.id_kelas && mapel.id_mapel = tugas_guru.id_mapel) WHERE mapel.kode_mapel = '" . $kode_mapel . "'   ORDER BY `kelas`.`id_jurusan` ASC, `kelas`.`kelas` ASC, `kelas`.`nama_kelas` ASC")->result();
	}


	public function listDataMapelyangKosong()
	{
		return $this->db->query("SELECT mapel.kode_mapel, mapel.nama_mapel, sum(case when tugas_guru.id_tugas IS NULL then 1 else 0 end) AS jumlah_kosong FROM `mapel` INNER join kelas on (mapel.kelas = kelas.kelas && mapel.id_jurusan = kelas.id_jurusan) LEFT JOIN tugas_guru on (kelas.id_kelas = tugas_guru.id_kelas && mapel.id_mapel = tugas_guru.id_mapel) GROUP by kode_mapel ORDER BY mapel.kode_mapel ASC
		")->result();
	}

	public function hapusDosa()
	{
		return $this->db->query("SELECT * FROM `tugas_guru` LEFT JOIN mapel ON tugas_guru.id_mapel = mapel.id_mapel ORDER BY `mapel`.`id_mapel` ASC ")->result();
	}
}
