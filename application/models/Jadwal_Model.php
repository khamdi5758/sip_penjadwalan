<?php

/**
 * 
 */
class Jadwal_Model extends CI_Model
{
	public function getAllData()
	{
		return $this->db->get('penjadwalan')->result();
	}

	public function getAllDataPenjadwalan()
	{
		$this->db->select('penjadwalan.id_penjadwalan, kelas.kelas,ruang.nama_ruang,mapel.nama_mapel,hari.nama_hari, jampel.jamke,jampel.waktu,guru.nama_guru ');
		$this->db->from('penjadwalan');
		$this->db->join('kelas', 'kelas.id_kelas = penjadwalan.id_kelas');
		$this->db->join('ruang', 'ruang.id_ruang = penjadwalan.id_ruang');
		$this->db->join('mapel', 'mapel.id_mapel = penjadwalan.id_mapel');
		$this->db->join('guru', 'guru.id_guru = mapel.id_guru');
		$this->db->join('hari', 'hari.id_hari = penjadwalan.id_hari');
		$this->db->join('jampel', 'jampel.id_jampel = penjadwalan.id_jampel');
		return $this->db->get()->result();
	}

	public function CreateCode(){
		$this->db->select('RIGHT(penjadwalan.id_penjadwalan,5) as id_penjadwalan', FALSE);
		$this->db->order_by('id_penjadwalan','DESC');    
		$this->db->limit(1);    
		$query = $this->db->get('penjadwalan');
			if($query->num_rows() <> 0){      
				 $data = $query->row();
				 $kode = intval($data->id_penjadwalan) + 1; 
			}
			else{      
				 $kode = 1;  
			}
		$batas = str_pad($kode, 5, "0", STR_PAD_LEFT);    
		$kodetampil = "jdwl".$batas;
		return $kodetampil;  
	}

	public function insertData()
	{	
		$data = array(
			'id_penjadwalan' => $this->CreateCode(),
			'id_kelas' => $this->input->post('kelas',TRUE),
			'id_ruang' => $this->input->post('ruang',TRUE),
			'id_mapel' => $this->input->post('mapel',TRUE),
			'id_hari' => $this->input->post('hari',TRUE),
			'id_jampel' => $this->input->post('jampel',TRUE)
		);
		$this->db->insert('penjadwalan', $data);
	}

	public function ubah_data()
	{
		$data = [
			'id_kelas' => $this->input->post('kelas',TRUE),
			'id_ruang' => $this->input->post('ruang',TRUE),
			'id_mapel' => $this->input->post('mapel',TRUE),
			'id_hari' => $this->input->post('hari',TRUE),
			'id_jampel' => $this->input->post('jampel',TRUE)
		];
		
		 	$this->db->where('id_penjadwalan', $this->input->post('id', true));
			$this->db->update('penjadwalan', $data);
	}


	public function detail_data($id)
	{
		return $this->db->get_where('penjadwalan', ['id_penjadwalan' => $id])->row_array();
	}

	public function cekjadwal(){
		$hari = $this->input->post('hari',TRUE);
		$jam = $this->input->post('jampel',TRUE);
		$mapel = $this->input->post('mapel',TRUE);
		$kelas = $this->input->post('kelas',TRUE);
		$ruang = $this->input->post('ruang',TRUE);
		
		$this->db->select('*');
		$this->db->from('penjadwalan');
		$this->db->like('id_kelas', $kelas);
		$this->db->like('id_mapel', $mapel);
		$this->db->like('id_hari', $hari);
		$this->db->like('id_jampel', $jam);
		$query = $this->db->get();
		$total = $query->num_rows();
		return $total;
	}

	public function cekhari()
	{
		$hari = $this->input->post('hari',TRUE);
		$cekhari = $this->db->get_where('penjadwalan', ['id_hari' => $hari]);
		$total = $cekhari->num_rows();
		return $total;
		// return $this->db->get_where('penjadwalan', ['id_hari' => $hari])->result();
		// return $this->db->get_where('penjadwalan', ['id_hari' => $hari])->row_array();
	}
	public function cekjam()
	{
		$jam = $this->input->post('jampel',TRUE);
		$cekjam = $this->db->get_where('penjadwalan', ['id_jampel' => $jam]);
		$total = $cekjam->num_rows();
		return $total;
		// return $this->db->get_where('penjadwalan', ['id_hari' => $hari])->result();
		// return $this->db->get_where('penjadwalan', ['id_hari' => $hari])->row_array();
	}
	public function cekmapel()
	{
		$mapel = $this->input->post('mapel',TRUE);
		$cekmapel = $this->db->get_where('penjadwalan', ['id_mapel' => $mapel]);
		$total = $cekmapel->num_rows();
		return $total;
		// return $this->db->get_where('penjadwalan', ['id_hari' => $hari])->result();
		// return $this->db->get_where('penjadwalan', ['id_hari' => $hari])->row_array();
	}
	public function cekruang()
	{
		$ruang = $this->input->post('ruang',TRUE);
		$cekruang= $this->db->get_where('penjadwalan', ['id_ruang' => $ruang]);
		$total = $cekruang->num_rows();
		return $total;
		// return $this->db->get_where('penjadwalan', ['id_hari' => $hari])->result();
		// return $this->db->get_where('penjadwalan', ['id_hari' => $hari])->row_array();
	}
	
	public function hapus_data($id)
	{
		$this->db->delete('penjadwalan', ['id_penjadwalan' => $id]);
	}


	// public function checkingJadwalExist($hari = null, $sesi, $idGuru)
	// {
	// 	if ($this->db->query('SELECT * FROM penjadwalan where hari="' . $hari . '" && sesi="' . $sesi . '" && kode_jadwal LIKE %' . $idGuru . '%')->num_rows() > 0) {
	// 		return true;
	// 	} else {
	// 		return false;
	// 	}
	// }

	// public function checkingJadwalGuru($idGuru)
	// {
	// 	if ($this->db->query('SELECT * FROM penjadwalan where kode_jadwal LIKE %' . $idGuru . '%')->num_rows() > 0) {
	// 		return true;
	// 	} else {
	// 		return false;
	// 	}
	// }

	// public function checkingJadwalTabrakan($hari = null, $sesi, $idGuru)
	// {
	// 	return $this->db->query("SELECT * FROM penjadwalan where hari='$hari' && sesi='$sesi' && id_guru  = '$idGuru'")->result();
	// }

	/* 
	*cari jadwal berdasarkan sesi hari dan kelas
	*/
	// public function cariJadwal($sesi, $hari, $id_kelas)
	// {
	// 	return $this->db->query("SELECT * FROM penjadwalan where sesi  = '$sesi' and hari = '$hari' and id_kelas = '$id_kelas'")->row();
		// $this->db->where('sesi', $sesi);
		// $this->db->where('hari', $hari);
		// $this->db->where('id_kelas', $id_kelas);
		// return $this->db->get('penjadwalan')->row();
	//}

	/* 
	* description : mendapatkan data penjadwalan berdasarkan id kelas dan Hari
	* param : id kelas , hari(can be null)
	*/
	// public function getDataPenjadwalan($idKelas, $hari, $id_guru)
	// {
	// 	$this->db->select('penjadwalan.*');
	// 	$this->db->from('penjadwalan');
	// 	$this->db->where('id_kelas', $idKelas);
	// 	$this->db->where('keterangan', 'kosong');
	// 	$this->db->where('kode_jadwal', '-');
	// 	$this->db->where('hari', $hari);
	// 	$jadwal =  $this->db->get()->result();
	// 	$jadwalGuru = $this->getDataPenjadwalanguru($hari, $id_guru);
	// 	if ($id_guru && !empty($jadwalGuru)) {
	// 		$key = [];
	// 		foreach ($jadwalGuru as $value) {
	// 			$ketemu = array_search($value->sesi, array_column($jadwal, 'sesi'));
	// 			if (is_int($ketemu)) {
	// 				$key[] = $ketemu;
	// 			}
	// 		}
	// 		foreach ($key as $value) {
	// 			unset($jadwal[$value]);
	// 		}
	// 	}
	// 	return $jadwal;
	// }

	// public function getJadwalKosong($idKelas, $hari = null)
	// {
	// 	$this->db->where('kode_jadwal', '-');
	// 	$this->db->where('keterangan', 'kosong');
	// 	$this->db->where('id_kelas', $idKelas);
	// 	if ($hari != null) {
	// 		$this->db->where('hari', $hari);
	// 	}
	// 	return $this->db->get('penjadwalan')->result();
	// }

	// public function getDataPenjadwalanguru($hari, $id_guru)
	// {
	// 	$this->db->select('penjadwalan.*');
	// 	$this->db->from('penjadwalan');
		// $this->db->where('id_kelas', $idKelas);
		// $this->db->where('keterangan', 'kosong');
		// $this->db->where('kode_jadwal', '-');
	// 	$this->db->where('id_guru', $id_guru);
	// 	$this->db->where('hari', $hari);
	// 	return $this->db->get()->result();
	// }

	// public function getJadwalGuru_Kelas_Hari($kelas, $hari, $guru)
	// {
	// 	$this->db->where('id_kelas', $kelas);
	// 	$this->db->where('hari', $hari);
	// 	$this->db->where('id_guru', $guru);
	// 	$this->db->where('keterangan', 'kosong');
	// 	$this->db->where('kode_jadwal', '-');
	// 	return $this->db->get('penjadwalan')->result();
	// }


	// public function isiJadwal($kelas, $hari, $sesi, $id_guru, $id_mapel, $keterangan, $kode_jadwal)
	// {
	// 	if (is_array($sesi)) {
	// 		foreach ($sesi as $value) {
	// 			$data = [
	// 				'id_guru' => $id_guru,
	// 				'id_mapel' => $id_mapel,
	// 				'kode_jadwal' => $kode_jadwal,
	// 				'keterangan' => $keterangan
	// 			];

	// 			$this->db->where('sesi', $value);
	// 			$this->db->where('id_kelas', $kelas);
	// 			$this->db->where('hari', $hari);
	// 			$this->db->update('penjadwalan', $data);
	// 		}
	// 		$this->updateSisaJam($kode_jadwal, count($sesi), '-');
	// 	} else {
	// 		echo '<br>{sesi error }<br>';
	// 	}
	// }

	// public function updateSisaJam($id_tugas, $jumlah, $status)
	// {
	// 	if ($status == '-') {
	// 		$this->db->query("UPDATE tugas_guru SET sisa_jam = sisa_jam-$jumlah WHERE id_tugas='" . $id_tugas . "'");
	// 	} else {
	// 		$this->db->query("UPDATE tugas_guru SET sisa_jam = sisa_jam+$jumlah WHERE id_tugas='" . $id_tugas . "'");
	// 	}
	// 	$dataTugasGuru = $this->db->get_where("tugas_guru", ['id_tugas' => $id_tugas])->row();
	// 	if ($dataTugasGuru->sisa_jam == 0) {
	// 		$this->updateStatusPenugasan($id_tugas, 1);
	// 	} else {
	// 		$this->updateStatusPenugasan($id_tugas, 0);
	// 	}
	// }

	// public function updateStatusPenugasan($id_tugas, $status)
	// {
	// 	$this->db->query("UPDATE tugas_guru SET status = '$status' WHERE id_tugas='" . $id_tugas . "'");
	// }

	// public function resetPenjadwalan()
	// {
	// 	$this->db->query('UPDATE penjadwalan SET id_guru = null, id_mapel = null, kode_jadwal = "-", keterangan = "kosong" WHERE id_guru != ""');
	// 	$this->db->query('UPDATE tugas_guru SET status = "0" WHERE status="1"');
	// 	$this->db->query('UPDATE tugas_guru SET sisa_jam = beban_jam');
	// }

	// public function resetJadwal()
	// {
	// 	$this->db->empty_table('penjadwalan');
	// }


	// pemindahan jadwal pertama ke kedua
	// public function pindahJadwal_1_2($dataFirst, $dataSecond)
	// {
	// 	if ($dataSecond['id_guru'] == 0) {
	// 		$dataSecond['id_guru'] = null;
	// 	}
	// 	if ($dataSecond['id_mapel'] == 0) {
	// 		$dataSecond['id_mapel'] = null;
	// 	}

	// 	$data1 = [
	// 		'id_guru' => $dataSecond['id_guru'],
	// 		'id_mapel' => $dataSecond['id_mapel'],
	// 		'kode_jadwal' => $dataSecond['kode_jadwal'],
	// 		'keterangan' => $dataSecond['keterangan']
	// 	];
	// 	$this->db->update('penjadwalan', $data1, ['id_penjadwalan' => $dataFirst['id_penjadwalan']]);
	// }

	// pemindahan jadwal kedua ke pertama
	// public function pindahJadwal_2_1($dataFirst, $dataSecond)
	// {
	// 	if ($dataFirst['id_guru'] == 0) {
	// 		$dataFirst['id_guru'] = null;
	// 	}
	// 	if ($dataFirst['id_mapel'] == 0) {
	// 		$dataFirst['id_mapel'] = null;
	// 	}
	// 	$data2 = [
	// 		'id_guru' => $dataFirst['id_guru'],
	// 		'id_mapel' => $dataFirst['id_mapel'],
	// 		'kode_jadwal' => $dataFirst['kode_jadwal'],
	// 		'keterangan' => $dataFirst['keterangan']
	// 	];
	// 	$this->db->update('penjadwalan', $data2, ['id_penjadwalan' => $dataSecond['id_penjadwalan']]);
	// }

	// public function pindahJadwal($dataFirst, $dataSecond)
	// {
	// 	if ($dataFirst['id_guru'] == 0) {
	// 		$dataFirst['id_guru'] = null;
	// 	}
	// 	if ($dataFirst['id_mapel'] == 0) {
	// 		$dataFirst['id_mapel'] = null;
	// 	}
	// 	$data2 = [
	// 		'id_guru' => $dataFirst['id_guru'],
	// 		'id_mapel' => $dataFirst['id_mapel'],
	// 		'kode_jadwal' => $dataFirst['id_tugas'],
	// 		'keterangan' => $dataFirst['nama_mapel']
	// 	];
	// 	$this->db->update('penjadwalan', $data2, ['id_penjadwalan' => $dataSecond['id_penjadwalan']]);
	// }
}
