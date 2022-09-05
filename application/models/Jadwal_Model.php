<?php

/**
 * 
 */
class Jadwal_Model extends CI_Model
{
	public function getAllData()
	{
		return $this->db->get('jadwal')->result();
	}

	public function getAllDataPenjadwalan()
	{
		$this->db->select('penjadwalan.*, guru.code_color, guru.nama_guru, request_jadwal.hari as request');
		$this->db->join('guru', 'guru.id_guru = penjadwalan.id_guru', 'left');
		$this->db->join('request_jadwal', 'guru.id_guru = request_jadwal.id_guru', 'left');
		return $this->db->get('penjadwalan')->result();
	}

	public function insertData($hari, $kelas, $sesi, $kodeJadwal, $keterangan, $jam_mulai, $jam_selesai)
	{
		$data = array(
			'id_kelas' => $kelas,
			'hari' => $hari,
			'sesi' => $sesi,
			'kode_jadwal' => $kodeJadwal,
			'keterangan' => $keterangan,
			'jam_mulai' => $jam_mulai,
			'jam_selesai' => $jam_selesai
		);
		$this->db->insert('penjadwalan', $data);
	}

	public function checkingJadwalExist($hari = null, $sesi, $idGuru)
	{
		if ($this->db->query('SELECT * FROM penjadwalan where hari="' . $hari . '" && sesi="' . $sesi . '" && kode_jadwal LIKE %' . $idGuru . '%')->num_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function checkingJadwalGuru($idGuru)
	{
		if ($this->db->query('SELECT * FROM penjadwalan where kode_jadwal LIKE %' . $idGuru . '%')->num_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function checkingJadwalTabrakan($hari = null, $sesi, $idGuru)
	{
		return $this->db->query("SELECT * FROM penjadwalan where hari='$hari' && sesi='$sesi' && id_guru  = '$idGuru'")->result();
	}

	/* 
	*cari jadwal berdasarkan sesi hari dan kelas
	*/
	public function cariJadwal($sesi, $hari, $id_kelas)
	{
		return $this->db->query("SELECT * FROM penjadwalan where sesi  = '$sesi' and hari = '$hari' and id_kelas = '$id_kelas'")->row();
		// $this->db->where('sesi', $sesi);
		// $this->db->where('hari', $hari);
		// $this->db->where('id_kelas', $id_kelas);
		// return $this->db->get('penjadwalan')->row();
	}

	/* 
	* description : mendapatkan data penjadwalan berdasarkan id kelas dan Hari
	* param : id kelas , hari(can be null)
	*/
	public function getDataPenjadwalan($idKelas, $hari, $id_guru)
	{
		$this->db->select('penjadwalan.*');
		$this->db->from('penjadwalan');
		$this->db->where('id_kelas', $idKelas);
		$this->db->where('keterangan', 'kosong');
		$this->db->where('kode_jadwal', '-');
		$this->db->where('hari', $hari);
		$jadwal =  $this->db->get()->result();
		$jadwalGuru = $this->getDataPenjadwalanguru($hari, $id_guru);
		if ($id_guru && !empty($jadwalGuru)) {
			$key = [];
			foreach ($jadwalGuru as $value) {
				$ketemu = array_search($value->sesi, array_column($jadwal, 'sesi'));
				if (is_int($ketemu)) {
					$key[] = $ketemu;
				}
			}
			foreach ($key as $value) {
				unset($jadwal[$value]);
			}
		}
		return $jadwal;
	}

	public function getJadwalKosong($idKelas, $hari = null)
	{
		$this->db->where('kode_jadwal', '-');
		$this->db->where('keterangan', 'kosong');
		$this->db->where('id_kelas', $idKelas);
		if ($hari != null) {
			$this->db->where('hari', $hari);
		}
		return $this->db->get('penjadwalan')->result();
	}

	public function getDataPenjadwalanguru($hari, $id_guru)
	{
		$this->db->select('penjadwalan.*');
		$this->db->from('penjadwalan');
		// $this->db->where('id_kelas', $idKelas);
		// $this->db->where('keterangan', 'kosong');
		// $this->db->where('kode_jadwal', '-');
		$this->db->where('id_guru', $id_guru);
		$this->db->where('hari', $hari);
		return $this->db->get()->result();
	}

	public function getJadwalGuru_Kelas_Hari($kelas, $hari, $guru)
	{
		$this->db->where('id_kelas', $kelas);
		$this->db->where('hari', $hari);
		$this->db->where('id_guru', $guru);
		$this->db->where('keterangan', 'kosong');
		$this->db->where('kode_jadwal', '-');
		return $this->db->get('penjadwalan')->result();
	}


	public function isiJadwal($kelas, $hari, $sesi, $id_guru, $id_mapel, $keterangan, $kode_jadwal)
	{
		if (is_array($sesi)) {
			foreach ($sesi as $value) {
				$data = [
					'id_guru' => $id_guru,
					'id_mapel' => $id_mapel,
					'kode_jadwal' => $kode_jadwal,
					'keterangan' => $keterangan
				];

				$this->db->where('sesi', $value);
				$this->db->where('id_kelas', $kelas);
				$this->db->where('hari', $hari);
				$this->db->update('penjadwalan', $data);
			}
			$this->updateSisaJam($kode_jadwal, count($sesi), '-');
		} else {
			echo '<br>{sesi error }<br>';
		}
	}

	public function updateSisaJam($id_tugas, $jumlah, $status)
	{
		if ($status == '-') {
			$this->db->query("UPDATE tugas_guru SET sisa_jam = sisa_jam-$jumlah WHERE id_tugas='" . $id_tugas . "'");
		} else {
			$this->db->query("UPDATE tugas_guru SET sisa_jam = sisa_jam+$jumlah WHERE id_tugas='" . $id_tugas . "'");
		}
		$dataTugasGuru = $this->db->get_where("tugas_guru", ['id_tugas' => $id_tugas])->row();
		if ($dataTugasGuru->sisa_jam == 0) {
			$this->updateStatusPenugasan($id_tugas, 1);
		} else {
			$this->updateStatusPenugasan($id_tugas, 0);
		}
	}

	public function updateStatusPenugasan($id_tugas, $status)
	{
		$this->db->query("UPDATE tugas_guru SET status = '$status' WHERE id_tugas='" . $id_tugas . "'");
	}

	public function resetPenjadwalan()
	{
		$this->db->query('UPDATE penjadwalan SET id_guru = null, id_mapel = null, kode_jadwal = "-", keterangan = "kosong" WHERE id_guru != ""');
		$this->db->query('UPDATE tugas_guru SET status = "0" WHERE status="1"');
		$this->db->query('UPDATE tugas_guru SET sisa_jam = beban_jam');
	}

	public function resetJadwal()
	{
		$this->db->empty_table('penjadwalan');
	}


	// pemindahan jadwal pertama ke kedua
	public function pindahJadwal_1_2($dataFirst, $dataSecond)
	{
		if ($dataSecond['id_guru'] == 0) {
			$dataSecond['id_guru'] = null;
		}
		if ($dataSecond['id_mapel'] == 0) {
			$dataSecond['id_mapel'] = null;
		}

		$data1 = [
			'id_guru' => $dataSecond['id_guru'],
			'id_mapel' => $dataSecond['id_mapel'],
			'kode_jadwal' => $dataSecond['kode_jadwal'],
			'keterangan' => $dataSecond['keterangan']
		];
		$this->db->update('penjadwalan', $data1, ['id_penjadwalan' => $dataFirst['id_penjadwalan']]);
	}

	// pemindahan jadwal kedua ke pertama
	public function pindahJadwal_2_1($dataFirst, $dataSecond)
	{
		if ($dataFirst['id_guru'] == 0) {
			$dataFirst['id_guru'] = null;
		}
		if ($dataFirst['id_mapel'] == 0) {
			$dataFirst['id_mapel'] = null;
		}
		$data2 = [
			'id_guru' => $dataFirst['id_guru'],
			'id_mapel' => $dataFirst['id_mapel'],
			'kode_jadwal' => $dataFirst['kode_jadwal'],
			'keterangan' => $dataFirst['keterangan']
		];
		$this->db->update('penjadwalan', $data2, ['id_penjadwalan' => $dataSecond['id_penjadwalan']]);
	}

	public function pindahJadwal($dataFirst, $dataSecond)
	{
		if ($dataFirst['id_guru'] == 0) {
			$dataFirst['id_guru'] = null;
		}
		if ($dataFirst['id_mapel'] == 0) {
			$dataFirst['id_mapel'] = null;
		}
		$data2 = [
			'id_guru' => $dataFirst['id_guru'],
			'id_mapel' => $dataFirst['id_mapel'],
			'kode_jadwal' => $dataFirst['id_tugas'],
			'keterangan' => $dataFirst['nama_mapel']
		];
		$this->db->update('penjadwalan', $data2, ['id_penjadwalan' => $dataSecond['id_penjadwalan']]);
	}
}
