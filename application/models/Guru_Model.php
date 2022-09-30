<?php

/**
 * 
 */
class Guru_Model extends CI_Model
{
	public function getAllData()
	{
		return $this->db->get('guru')->result();
	}

	public function CreateCode(){
		$this->db->select('RIGHT(guru.id_guru,5) as id_guru', FALSE);
		$this->db->order_by('id_guru','DESC');    
		$this->db->limit(1);    
		$query = $this->db->get('guru');
			if($query->num_rows() <> 0){      
				 $data = $query->row();
				 $kode = intval($data->id_guru) + 1; 
			}
			else{      
				 $kode = 1;  
			}
		$batas = str_pad($kode, 5, "0", STR_PAD_LEFT);    
		$kodetampil = "gru".$batas;
		return $kodetampil;  
	}

	public function tambah_data()
	{
		$data = array(
			'id_guru' => $this->CreateCode(),
			'nama_guru' => $this->input->post('nama_gur'),
			'nip' => $this->input->post('nip_guru'),
			'pangkat' => $this->input->post('pangkat_gur'),
			'gol' => $this->input->post('gol_guru'),
			'status' => $this->input->post('status_gur'),
			'pendidikan_terakhir' => $this->input->post('pendidikan_gur'),
			'no_telp' => $this->input->post('telp_gur'),
			'email' => $this->input->post('email_gur')
		);

		$this->db->insert('guru', $data);
	}

	public function ubah_data()
	{
		$data = array(
			'nama_guru' => $this->input->post('nama_gur', true),
			'status' => $this->input->post('status_gur', true),
			'pendidikan_terakhir' => $this->input->post('pendidikan_gur', true),
			'no_telp' => $this->input->post('telp_gur', true),
			'email' => $this->input->post('email_gur', true)
		);
		$this->db->where('id_guru', $this->input->post('id_gur', true));
		$this->db->update('guru', $data);
	}

	public function hapus_data($id)
	{
		$this->db->delete('guru', ['id_guru' => $id]);
	}

	public function detail_data($id)
	{
		return $this->db->get_where('guru', ['id_guru' => $id])->row_array();
	}

	/* 
		* mendapatkan data guru yang melakukan request
		*/
	// public function getDataGuruJoinRequest()
	// {
	// 	return $this->db->query("SELECT guru.id_guru, guru.nama_guru, request_jadwal.id_request, request_jadwal.hari FROM guru left join request_jadwal on guru.id_guru = request_jadwal.id_guru")->result();
	// }

	/* 
		* mendapatkan data kelas berdasarkan id guru
		*/
	// public function getDataGuruJoinKelas($id_guru)
	// {
	// 	$query = $this->db->query("SELECT id_kelas from tugas_guru where id_guru ='$id_guru' GROUP BY id_kelas")->result();
	// 	$data = [];
	// 	foreach ($query as $value) {
	// 		$data[] = $value->id_kelas;
	// 	}
	// 	return $data;
	// }

	/* 
		* beban kerja guru berdasarkan id_guru
		*/
	// public function getDataBebanKerja($id_guru)
	// {
	// 	$query =  $this->db->query("SELECT SUM(sisa_jam) as beban FROM `tugas_guru` where id_guru ='$id_guru'")->row()->beban;
	// 	return ($query) ? $query : 0;
	// }

	/* 
		* total ketersediaan pada hari
		*/
	// public function ketersediaanJam($kelas, $hari)
	// {
	// 	$query = "SELECT COUNT(id_penjadwalan) as total FROM `penjadwalan` where keterangan = 'kosong' AND (";
	// 	if (empty($kelas)) {
	// 		return 0;
	// 	} else {
	// 		foreach ($kelas as $key => $dataKelas) {
	// 			if ($key == 0) {
	// 				$query .= "id_kelas = '$dataKelas'";
	// 			} else {
	// 				$query .= " OR id_kelas = '$dataKelas'";
	// 			}
	// 		}
	// 		$query .= ") AND (";
	// 		foreach ($hari as $key => $dataHari) {
	// 			if ($key == 0) {
	// 				$query .= "hari = '$dataHari'";
	// 			} else {
	// 				$query .= " OR hari = '$dataHari'";
	// 			}
	// 		}
	// 		$query .= ")";
	// 		return $this->db->query($query)->row()->total;
	// 	}
	// }
}
