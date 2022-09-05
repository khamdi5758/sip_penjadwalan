<?php

use Dompdf\Dompdf;

class DataJadwal extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->has_userdata('id_user')) {
			redirect('Login');
		}
		$this->load->library('form_validation');
		$this->load->model('Jadwal_Model');
		$this->load->model('Mapel_Model');
		$this->load->model('Guru_Model');
		$this->load->model('JadwalKhusus_Model');
		$this->load->model('Kelas_Model');
		$this->load->model('RequestJadwal_Model');
		$this->load->model('PenugasanGuru_Model');
		$this->load->model('Rumusan_Model');
		$this->load->model('RangeJam_Model');
	}
	public function index($halaman = 'default')
	{
		$data = [
			'rumusan' => $this->Rumusan_Model->getDataRumusan(),
			'belumterplot' => $this->PenugasanGuru_Model->tugasGuruBelumterplot(),
			'kelas' => $this->Kelas_Model->getAllData(),
			'penjadwalan' => $this->Jadwal_Model->getAllDataPenjadwalan(),
			'jadwal' => $this->Jadwal_Model->getAllData(),
			'kelas' => $this->Kelas_Model->getAllData(),
			'mapel' => $this->Mapel_Model->getAllData(),
			'rangeJam' => $this->RangeJam_Model->getAllData()
		];
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('jadwal/index', $data);
		$this->load->view('templates/footer');
	}

	// search jadwal Khusus 
	public function searchJadwalKhusus($array, $sesi, $hari, $kelas)
	{
		foreach ($array as $value) {
			if ($value['kelas'] == $kelas && $value['hari'] == $hari  && $value['sesi'] == $sesi) {
				return ['id_jadwal' => $value['id_jadwal_khusus'], 'keterangan' => $value['keterangan'], 'durasi' => $value['durasi']];
			}
		}
		return false;
	}

	//create jadwal
	public function createJadwal()
	{
		$jadwal = $this->Jadwal_Model->getAllData();
		$kelas = $this->Kelas_Model->getAllData();
		$jadwalKhusus = $this->JadwalKhusus_Model->getAllData();

		echo '<table>';
		foreach ($kelas as $rowKelas) {
			$kosong = 0;
			echo '<tr>';
			echo '<td>';
			echo "jadwal kelas" . $rowKelas->kelas . $rowKelas->nama_jurusan . $rowKelas->nama_kelas . "<br>";
			echo '</td>';
			echo '</tr>';
			echo '<tr>';
			echo '<td colspan = "6">';
			echo 'Mapel : ';
			// $tugasGuru = $this->PenugasanGuru_Model->getAllDataByid_kelas($rowKelas->id_kelas);
			// foreach ($tugasGuru as $dataTugasGuru) {
			// 	$requestHari = $this->RequestJadwal_Model->getAllDataByid_guru($dataTugasGuru->id_guru);
			// 	$totalBebanJam += $dataTugasGuru->beban_jam;
			// 	echo $dataTugasGuru->id_tugas . ' : ' . $dataTugasGuru->nama_mapel .  '=>' . $dataTugasGuru->beban_jam  . '(' . $requestHari . ')' . ' <br>';
			// }
			echo '</td>';
			echo '</tr>';
			echo '<tr>';
			foreach ($jadwal as $rowJadwal) {
				echo '<td>';
				echo "===================<br>";
				echo $rowJadwal->hari;
				echo "<br>";
				echo "=================== <br>";
				$jam_mulai = strtotime($rowJadwal->jam_mulai);
				for ($i = 0; $i < $rowJadwal->jumlah_sesi; $i++) {
					if (is_array($khusus = $this->searchJadwalKhusus($jadwalKhusus, $i, $rowJadwal->hari, $rowKelas->kelas))) {
						$idJadwal = $khusus['id_jadwal'];
						$keterangan = $khusus['keterangan'];
						$lama_sesi = $khusus['durasi'];
					} else {
						$idJadwal = '-';
						$keterangan = "kosong";
						$lama_sesi = $rowJadwal->lama_sesi;
						$kosong++;
					}
					$jam_selesai = date("H:i", strtotime('+' . $lama_sesi . ' minutes', $jam_mulai));
					$this->Jadwal_Model->insertData($rowJadwal->hari, $rowKelas->id_kelas, $i, $idJadwal, $keterangan, date("H:i", $jam_mulai), $jam_selesai);
					echo $i . " " . $idJadwal . " " . $keterangan . " " . date("H:i", $jam_mulai) . "-" . $jam_selesai . "<br>";
					$jam_mulai = strtotime($jam_selesai);
				}
				echo '</td>';
			}
			echo '</tr>';
			echo '<tr>';
			echo '<td>';
			echo 'jumlah jadwal kosong : ' . $kosong;
			echo '</td>';
			echo '</tr>';
		}
		echo '</table>';
		redirect('DataJadwal');
	}

	public function tampilJadwal()
	{
		$data = [
			'belumterplot' => $this->PenugasanGuru_Model->tugasGuruBelumterplot(),
			'kelas' => $this->Kelas_Model->getAllData(),
			'penjadwalan' => $this->Jadwal_Model->getAllDataPenjadwalan(),
			'jadwal' => $this->Jadwal_Model->getAllData(),
			'kelas' => $this->Kelas_Model->getAllData(),
			'mapel' => $this->Mapel_Model->getAllData()
		];
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('jadwal/tampilJadwal', $data);
		$this->load->view('templates/footer');
	}

	public function tampilJadwalSementara()
	{
		$jadwal = $this->Jadwal_Model->getAllData();
		$kelas = $this->Kelas_Model->getAllData();
		$jadwalKhusus = $this->JadwalKhusus_Model->getAllData();
		echo '<table>';
		foreach ($kelas as $rowKelas) {
			$kosong = 0;
			echo '<tr>';
			echo '<td>';
			echo "jadwal kelas" . $rowKelas->kelas . $rowKelas->nama_jurusan . $rowKelas->nama_kelas . "<br>";
			echo '</td>';
			echo '</tr>';
			echo '<tr>';
			echo '<td colspan = "6">';
			echo 'Mapel yang belum : ';
			// $tugasGuru = $this->PenugasanGuru_Model->getAllDataByid_kelas($rowKelas->id_kelas);
			$tugasGuru = $this->PenugasanGuru_Model->tugasGuruBelumterplot($rowKelas->id_kelas);
			$totalBebanJam = 0;
			// echo "<pre>";
			// print_r($tugasGuru);
			// echo "</pre>";
			foreach ($tugasGuru as $dataTugasGuru) {

				$requestHari = $this->RequestJadwal_Model->getAllDataByid_guru($dataTugasGuru->id_guru);
				$totalBebanJam += $dataTugasGuru->beban_jam;
				echo "$dataTugasGuru->id_tugas  :  $dataTugasGuru->nama_mapel ($dataTugasGuru->beban_jam) => $dataTugasGuru->sisa_jam   ( $requestHari )  <br>";
			}
			echo 'total beban jam : ' . $totalBebanJam;
			echo '</td>';
			echo '</tr>';
			echo '<tr>';
			foreach ($jadwal as $rowJadwal) {
				echo '<td>';
				echo "===================<br>";
				echo $rowJadwal->hari;
				echo "<br>";
				echo "=================== <br>";
				$jam_mulai = strtotime($rowJadwal->jam_mulai);
				for ($i = 0; $i < $rowJadwal->jumlah_sesi; $i++) {
					if (is_array($khusus = $this->searchJadwalKhusus($jadwalKhusus, $i, $rowJadwal->hari, $rowKelas->kelas))) {
						$idJadwal = $khusus['id_jadwal'];
						$keterangan = $khusus['keterangan'];
						$lama_sesi = $khusus['durasi'];
					} else {
						$penjadwalan_guru = $this->Jadwal_Model->cariJadwal($i, $rowJadwal->hari, $rowKelas->id_kelas);
						// $idJadwal = $penjadwalan_guru->id_penjadwalan;
						$keterangan = "($penjadwalan_guru->id_guru) $penjadwalan_guru->keterangan";
						$idJadwal = "";
						// $keterangan = "";
						$lama_sesi = $rowJadwal->lama_sesi;
						// $kosong++;
					}
					$jam_selesai = date("H:i", strtotime('+' . $lama_sesi . ' minutes', $jam_mulai));
					// $this->Jadwal_Model->insertData($rowJadwal->hari, $rowKelas->id_kelas, $i, $idJadwal, $keterangan, date("H:i", $jam_mulai), $jam_selesai);
					echo $i . " " . $idJadwal . " " . $keterangan . " " . date("H:i", $jam_mulai) . "-" . $jam_selesai . "<br>";
					$jam_mulai = strtotime($jam_selesai);
				}
				echo '</td>';
			}
			echo '</tr>';
			echo '<tr>';
			echo '<td>';
			// echo 'jumlah jadwal kosong : ' . $kosong;
			echo '</td>';
			echo '</tr>';
		}
		echo '</table>';
	}

	/* 
	* mendapatkan data guru dan kehadirannya
	* rumusan berfungsi untuk menentukan prioritas guru mana yang perlu di masukan dahulu
	 */
	public function rumusan()
	{
		$result = $this->Guru_Model->getDataGuruJoinRequest();

		foreach ($result as $key => $value) {
			if (!$value->id_request) {
				// tambah data bila ada guru yang tidak request
				$value->hari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum`at', 'Sabtu'];
				$status = 0;
				$result[$key]->status_request = $status;
			} else {
				// convert data string to array
				$value->hari = explode(",", $value->hari);
				$status = 1;
				$result[$key]->status_request = $status;
			}
			// menambahkan kelas yang diajar
			$result[$key]->kelas = $this->Guru_Model->getDataGuruJoinKelas($value->id_guru);
			$kelas = $result[$key]->kelas;
			// menambahkan beban kerja guru
			$result[$key]->beban_kerja = $this->Guru_Model->getDataBebanKerja($value->id_guru);
			// menambahkan total jam tersedia
			$result[$key]->jam_tersedia = $this->Guru_Model->ketersediaanJam($kelas, $value->hari);
			// menambahkan hasil rumusan 
			if ($result[$key]->beban_kerja == 0 && $result[$key]->jam_tersedia == 0) {
				$rumusan = 0;
			} else {
				$rumusan = round(($status == 1) ? 1 + ($result[$key]->beban_kerja / $result[$key]->jam_tersedia) : 0 + ($result[$key]->beban_kerja / $result[$key]->jam_tersedia), 2);
			}

			$result[$key]->rumusan = $rumusan;
		}

		echo "<pre>";
		echo print_r($result);
		echo "</pre>";
		/* 
		!create data 
		*/
		$this->Rumusan_Model->createData($result);
		redirect('DataJadwal');
	}


	/* 
	*membuat data penjadwalan 
	*(tujuan agar mudah dibaca)
	*/
	public $jadwal;
	public function CreateDataJadwal($kelas)
	{
		$hari =  ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum`at', 'Sabtu'];
		// $data = [];
		// $dataHari = explode(',', $hari);
		foreach ($hari as $value) {
			$this->jadwal[$value] = $this->Jadwal_Model->getDataPenjadwalan($kelas, $value);
		}
	}

	/* 
	*mengambildata jadwal yang sudah dibuat bedasarkan hari yang di tentukan
 	*/
	public function getDataJadwal($hari)
	{
		$data = [];
		$dataHari = explode(',', $hari);
		foreach ($dataHari as $value) {
			$data[$value] = $this->jadwal[$value];
		}
		return $data;
	}

	/* 
	* plotting penjadwalan
	*/
	public function ploting_jadwal()
	{
		$dataKelas = $this->Kelas_Model->getAllData();
		// data kelas 
		foreach ($dataKelas as $valuedataKelas) {
			$metode = 1;
			$kelas = $valuedataKelas->id_kelas;
			echo "<hr>";
			echo $kelas;
			// ambil data guru dan tugas mengajarnya berdasarkan id kelas 
			$dataGuru = $this->dataGuru($kelas);
			// echo "<pre>";
			// print_r($dataGuru);
			// echo "</pre>";
			foreach ($dataGuru as $valueDataGuru) {
				echo '<br>';
				$id_guru = $valueDataGuru->id_guru;
				$request = $valueDataGuru->hari_request;
				echo "$id_guru";
				echo $valueDataGuru->hari_request . '<br>';
				echo 'mengajar : <br>';
				// echo '<pre>';
				// print_r($valueDataGuru->mengajar);
				// echo '</pre>';
				foreach ($valueDataGuru->mengajar as $valueMengajar) {
					echo "<br>-> $valueMengajar->nama_mapel kel. : $valueMengajar->kelompok_mapel beban : $valueMengajar->beban_jam , ";
					// *pencarian waktu terbaik
					$this->cariWaktuTerbaik($kelas, $id_guru, $request, $valueMengajar->beban_jam, $valueMengajar->kelompok_mapel, $metode, $valueMengajar->id_mapel, $valueMengajar->nama_mapel, $valueMengajar->id_tugas);
				}
				echo '<br>';
				// 	break;
			}
			// break;
			echo "<hr>";
			echo "ploting ulang perulangan";
			echo "<hr>";
			$kelasKosong = $this->Jadwal_Model->getJadwalKosong($kelas);
			if (count($kelasKosong) > 0) {
				$tugasGuruBelumterplot = [];
				$guru = $this->dataGuru($kelas);
				foreach (array_column($guru, 'mengajar') as $key => $value) {
					if (!empty($value)) {
						$tugasGuruBelumterplot[] = $guru[$key];
					}
				}
				foreach ($tugasGuruBelumterplot as $valueDataGuruBelumTerplot) {
					echo '<br>';
					$id_guru = $valueDataGuruBelumTerplot->id_guru;
					$request = $valueDataGuruBelumTerplot->hari_request;
					echo $id_guru . '<br>';
					echo $valueDataGuruBelumTerplot->hari_request . '<br>';
					echo 'mengajar : <br>';
					print_r($valueDataGuruBelumTerplot->mengajar);
					echo '<br>';
					foreach ($valueDataGuruBelumTerplot->mengajar as $valueMengajar) {
						echo "<br>-> $valueMengajar->nama_mapel kel. : $valueMengajar->kelompok_mapel sisa beban jam  : $valueMengajar->sisa_jam , ";
						// echo "<br>-> $valueMengajar->nama_mapel kel. : $valueMengajar->kelompok_mapel sisa beban jam  : $valueMengajar->beban_jam , ";
						// *pencarian waktu terbaik
						// $this->cariWaktuTerbaik($kelas, $id_guru, $request, $valueMengajar->beban_jam, $valueMengajar->kelompok_mapel, $metode++, $valueMengajar->id_mapel, $valueMengajar->nama_mapel, $valueMengajar->id_tugas);
						$this->cariWaktuTerbaik($kelas, $id_guru, $request, $valueMengajar->sisa_jam, $valueMengajar->kelompok_mapel, $metode++, $valueMengajar->id_mapel, $valueMengajar->nama_mapel, $valueMengajar->id_tugas);
					}
					echo '<br>';
				}

				$kelasKosong = $this->Jadwal_Model->getJadwalKosong($kelas);
				if (count($kelasKosong) > 0) {
					echo '<br>';
					echo '=============================';
					echo "JADWAL STUCK";
					echo '=============================';
					echo '<br>';
				}
			}
		}
		redirect('DataJadwal');
	}

	/* 
	* ambil data guru yang mengajar di kelas beserta kewajiban mengajarnya
	*/
	public function dataGuru(String $kelas)
	{
		$dataGuru = $this->Rumusan_Model->getDataRumusan($kelas);
		foreach ($dataGuru as $key => $valuedataGuru) {
			$dataGuru[$key]->mengajar = $this->PenugasanGuru_Model->getDatatugasByidGuru($valuedataGuru->id_guru, $kelas);
		}
		return (array) $dataGuru;
	}

	/* 
	* mencari jam terbaik
	*/
	public function cariWaktuTerbaik($kelas, $id_guru, $hari, $bebanJam, $kelompokMapel, $metode = 1, $id_mapel, $nama_mapel, $id_tugas)
	{
		/*
		* jumlah pembagian jam 
		* cek apakah ada jadwal yg ngepress
		* cek apakah ada jadwal yang ada tapi tidak ngpress
		* jika sudah tidak ada tambahi metode
		* kalau sudah tidak bisa maka geser
		* kalau sudah tidak bisa lagi maka kepepet
		*/

		$pembagianJam = $this->pembagianWaktu($kelompokMapel, $bebanJam, $metode);
		$dataHari = explode(',', $hari);
		foreach ($pembagianJam as $valuePembagianjam) {
			$hasilJadwal = $this->jadwalPas($kelas, $valuePembagianjam, $dataHari, $id_guru);
			// * cek hasil statusnya
			switch ($hasilJadwal['status']) {
				case 'Press':
					echo " sesi press";
					$status = '<div style="background-color: #c82333">error</div>';
					echo "<br>";
					print_r($hasilJadwal['sesi']);
					echo "<br>";

					foreach ($hasilJadwal['sesi'] as $keyHariJadwal => $sesi) {
						$jadwaltersedia = $this->Jadwal_Model->getJadwalGuru_Kelas_Hari($kelas, $keyHariJadwal, $id_guru);
						if (count($jadwaltersedia) == 0) {
							$saranSesi = [];
							foreach ($sesi as $valueSesi) {
								$saranSesi = $this->sesiUrut($kelas, $keyHariJadwal, $valueSesi);
							}
							if (!empty($saranSesi)) {
								$this->Jadwal_Model->isiJadwal($kelas, $keyHariJadwal, $saranSesi, $id_guru, $id_mapel, $nama_mapel, $id_tugas);
								$status = "<div style='background-color: #218838;'>sukses</div>";
								break;
							}
						}
					}
					echo "<br>";
					echo "$status : ";
					print_r($saranSesi);
					echo "<br>";
					break;
				case 'tidakPress':
					echo "<br>";
					echo "<div style='background-color: #7FFFD4 ;'>proses dahulu</div>";
					$tempTotal = 0;
					$hariyangdipilih = '';
					$status = '<div style="background-color: #c82333">error</div>';

					foreach ($hasilJadwal['sesi'] as $keyHariJadwal => $sesi) {
						$jadwaltersedia = $this->Jadwal_Model->getJadwalGuru_Kelas_Hari($kelas, $keyHariJadwal, $id_guru);
						if (count($jadwaltersedia) == 0) {
							if ($tempTotal < count($sesi)) {
								$tempTotal = count($sesi);
								$hariyangdipilih = $keyHariJadwal;
							}
						}
					}
					echo "---$hariyangdipilih==>temp Total : " . $tempTotal . "---<br>";

					if ($hariyangdipilih == '') {
						foreach ($hasilJadwal['sesi'] as $keyHariJadwal => $sesi) {
							// echo "<br>";
							// echo "tidak ada pilihan lain jumlah jadwal " . count($jadwaltersedia);
							if ($tempTotal < count($sesi)) {
								$tempTotal = count($sesi);
								$hariyangdipilih = $keyHariJadwal;
							}
						}
						echo 'hari yang dipilih kosong';
					}

					// print_r($hasilJadwal['sesi'][$hariyangdipilih]);
					foreach ($hasilJadwal['sesi'][$hariyangdipilih] as $valueSesi) {
						$saranSesi = $this->sesiUrut($kelas, $hariyangdipilih, $valueSesi);
						if (!empty($saranSesi)) {
							// $this->Jadwal_Model->isiJadwal($kelas, $hariyangdipilih, $hasilJadwal['sesi'][$hariyangdipilih][0], $id_guru, $id_mapel, $nama_mapel, $id_tugas);
							$this->Jadwal_Model->isiJadwal($kelas, $hariyangdipilih, $saranSesi, $id_guru, $id_mapel, $nama_mapel, $id_tugas);
							$status = "<div style='background-color: #218838;'>sukses</div>";
							break;
						}
					}
					echo "<br>";
					echo "$status : ";
					print_r($saranSesi);
					echo "<br>";
					break;
				case 'tidakMuat':
					echo "tidak muat";
					break;
			}
		}
	}

	public function sesiUrut($kelas, $hari, $sesi)
	{
		$kelas = $this->Kelas_Model->detail_data($kelas)['kelas'];
		echo "$kelas === $hari";
		$JadwalKhusus = $this->JadwalKhusus_Model->getJadwalKhusus_hari($kelas, $hari);
		$sesiKhusus = array_column($JadwalKhusus, 'sesi');
		$jumlahSesi = count($sesi);
		$sesiPertama = $sesi[0];
		$sesiBenar = [];
		$tempSesi = 0;
		for ($i = 0; $i < $jumlahSesi; $i++) {
			$tempSesi = $sesiPertama;
			if (is_bool(array_search($tempSesi, $sesiKhusus))) {
				$sesiBenar[] = $sesiPertama;
			} else {
				$i--;
			}
			$sesiPertama++;
		}

		if (empty(array_diff($sesi, $sesiBenar))) {
			return $sesi;
		} else {
			print_r($sesiKhusus);
		}
	}



	/* 
	* memecah jam sks
	*/
	public function pembagianWaktu($kelompokMapel, $bebanJam, $metodeKe = null)
	{
		switch ($bebanJam) {
			case '8':
				switch ($metodeKe) {
					case '1':
						return [4, 4];
						break;
					case '2':
						return [2, 2, 2, 2];
						break;
					case '3':
						return [5, 3];
						break;
					default:
						return false;
						break;
				}
				break;
			case '7':
				switch ($metodeKe) {
					case '1':
						return [3, 2, 2];
						break;
					case '2':
						return [4, 3];
						break;
					case '3':
						return [5, 2];
						break;
					default:
						return false;
						break;
				}
				break;
			case '6':
				switch ($metodeKe) {
					case '1':
						return [3, 3];
						break;
					case '2':
						return [2, 2, 2];
						break;
					case '3':
						return [4, 2];
					default:
						return false;
						break;
				}
				break;

			case '5':
				switch ($metodeKe) {
					case '1':
						return [3, 2];
						break;
					case '2':
						return [4, 1];
						break;
					default:
						return false;
						break;
				}
				break;
			case '4':
				if ($kelompokMapel == 'C') {
					switch ($metodeKe) {
						case '1':
							return [4];
							break;
						case '2':
							return [2, 2];
							break;
						default:
							return false;
							break;
					}
				} else {
					return [2, 2];
				}
				break;
			case '3':
				// switch ($metodeKe) {
				// 	case '1':
				// 		return [3];
				// 		break;
				// 	case '2':
				// 		return [2, 1];
				// 		break;
				// }
				return [3];
				break;
			case '2':
				// switch ($metodeKe) {
				// 	case '1':
				// 		return [2];
				// 		break;
				// case '2':
				// 	return [1, 1];
				// 	break;
				// }
				return [2];
				break;
			default:
				return [$bebanJam];
				break;
		}
	}

	/* 
	* function untuk mencari apakah ada jadwal yg ngepress dan berturut turut / hanya bisa di isi saja namun tidak ngepress
	* 
	*/
	public function jadwalPas($kelas, $pembagianJam, $hari, $id_guru)
	{
		echo "jumlah hari yang tersedia :" . count($hari) . "<br>";
		echo  "<div style='background-color: #DC143C'>Pembagian_jam ($pembagianJam sks)  -> </div>";
		// echo implode(", ", $pembagianJam);
		// foreach ($pembagianJam as $beban_jam) {
		// echo "value pembagian : $beban_jam <br>";
		$error = 0;
		foreach ($hari as $valueDataHari) {
			$jumlahHariKosong = 0;
			// echo $kelas;
			echo $valueDataHari;
			$dataJadwal = $this->Jadwal_Model->getDataPenjadwalan($kelas, $valueDataHari, $id_guru);
			// echo "</br>";
			// print_r($dataJadwal);
			// echo "</br>";
			$data = [];
			if ($pembagianJam <= count($dataJadwal)) {
				foreach ($dataJadwal as $dataHari) {
					if ($dataHari->kode_jadwal == '-' && $dataHari->keterangan == 'kosong') {
						$jumlahHariKosong++;
						$data[] = $dataHari->sesi;
						if (count($data) == $pembagianJam) {
							$sesi[$valueDataHari][] = $data;
							$data = [];
						}
					} else {
						$data = [];
						$jumlahHariKosong = 0;
					}
				}
				if ($jumlahHariKosong == $pembagianJam) {
					$result =  [
						'status' => 'Press',
						'sesi' => $pembagianBebanJam[$pembagianJam][] = $sesi
					];
				} else if ($jumlahHariKosong > $pembagianJam) {
					$result =  [
						'status' => 'tidakPress',
						'sesi' => $pembagianBebanJam[$pembagianJam][] = $sesi
					];
				} else {
					$result =  [
						'status' => 'ada sesuatu',
					];
				}
			} else {
				$error++;
				if ($error == count($hari)) {
					return [
						'status' => 'tidakMuat'
					];
				}
			}
		}
		// }
		return $result;
	}

	/* 
	* pindah jadwal
	*/

	public function pindahJadwal($status = null)
	{
		if ($status == null) {
			$dataFirst = $this->input->post('dataFirst');
			$dataSecond = $this->input->post('dataSecond');

			if ($dataFirst['id_kelas'] == $dataSecond['id_kelas']) {
				// if ($dataFirst['id_guru'] != null) {
				// 	echo 'dataFirst null';
				// }

				// if ($dataSecond['id_guru'] != null) {
				// 	echo 'dataSecond null';
				// }
				$cekJadwal1 = $this->Jadwal_Model->checkingJadwalTabrakan($dataFirst['hari'], $dataFirst['sesi'], $dataSecond['id_guru']);
				$cekJadwal2 = $this->Jadwal_Model->checkingJadwalTabrakan($dataSecond['hari'], $dataSecond['sesi'], $dataFirst['id_guru']);
				if (count($cekJadwal1) == 0 && count($cekJadwal2) == 0) {
					$this->Jadwal_Model->pindahJadwal_1_2($dataFirst, $dataSecond);
					$this->Jadwal_Model->pindahJadwal_2_1($dataFirst, $dataSecond);
					$data['status'] = 'success';
				} else {
					$data['keterangan'] = 'Jadwal Tabrakan';
					$data['status'] = 'error';
				}
			} else {
				$data['keterangan'] = 'tukar jadwal harus berbeda kelas';
				$data['status'] = 'error';
			}
			echo json_encode($data);
		} else {
			$tugasGuru = $this->input->post('tugasGuru');
			$dataFirst = $this->PenugasanGuru_Model->detail_data($tugasGuru);
			$dataSecond = $this->input->post('dataSecond');
			$cekJadwal = $this->Jadwal_Model->checkingJadwalTabrakan($dataSecond['hari'], $dataSecond['sesi'], $dataFirst['id_guru']);
			if (count($cekJadwal) == 0) {
				// echo "this is data first : ";
				// print_r($dataFirst);
				// echo "<br>";
				// echo "this is data second : ";
				// print_r($dataSecond);
				// echo "<br>";
				$this->Jadwal_Model->pindahJadwal($dataFirst, $dataSecond);
				if ($dataSecond['id_guru'] != null) {
					// echo $dataSecond['kode_jadwal'] . "+,";
					$this->Jadwal_Model->updateSisaJam($dataSecond['kode_jadwal'], 1,  '+');
					$data['status'] = 'success';
				} else {
					$data['status'] = 'success';
				}
				// echo $tugasGuru . "-";
				$this->Jadwal_Model->updateSisaJam($tugasGuru, 1,  '-');
			} else {
				$data['keterangan'] = 'Jadwal Tabrakan';
				$data['status'] = 'error';
			}
			echo json_encode($data);
		}
	}

	/* 
	* ambil hari yang kosong 
	*/
	public function getDataHariKosong($hari, $kelas)
	{
		foreach ($hari as $valueHari) {
			$dataKosong[$valueHari] = $this->Jadwal_Model->getDataPenjadwalanByIdKelas($kelas, $valueHari);
		}
		return $dataKosong;
	}

	public function reset_Penjadwalan()
	{
		$this->Jadwal_Model->resetPenjadwalan();
		redirect('DataJadwal');
	}
	public function reset_rumusan()
	{
		$this->Rumusan_Model->resetRumusan();
		$this->reset_Penjadwalan();
		redirect('DataJadwal');
	}

	public function reset_jadwal()
	{
		$this->Jadwal_Model->resetJadwal();
		redirect('DataJadwal');
	}

	public function pdf($id_guru = null)
	{
		$data = [
			'belumterplot' => $this->PenugasanGuru_Model->tugasGuruBelumterplot(),
			'kelas' => $this->Kelas_Model->getAllData(),
			'penjadwalan' => $this->Jadwal_Model->getAllDataPenjadwalan(),
			'jadwal' => $this->Jadwal_Model->getAllData(),
			'kelas' => $this->Kelas_Model->getAllData(),
			'mapel' => $this->Mapel_Model->getAllData(),
			'guru' => $id_guru

		];
		if ($id_guru != null) {
			$data['guru'] = $this->Guru_Model->detail_data($id_guru);
		}
		// export pdf
		// $this->load->library('pdfgenerator');
		// $html = $this->load->view('jadwal/exportPDF', $data, true);
		// $this->pdfgenerator->generate($html, 'tes');
		$this->load->view('jadwal/exportPDF', $data);
	}

	public function penghapusanDosa()
	{
		$arr = $this->PenugasanGuru_Model->hapusDosa();
		foreach ($arr as $key => $value) {
			if ($value->id_mapel == null) {
				echo $value->id_tugas;
				// $this->PenugasanGuru_Model->hapus_data($value->id_tugas);
			}
		}
	}
}
