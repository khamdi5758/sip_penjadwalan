<?php

use Svg\Tag\Group;

/**
 * 
 */
class Mapel_Model extends CI_Model
{
	public function CreateCode(){
		$this->db->select('RIGHT(mapel.id_mapel,5) as id_mapel', FALSE);
		$this->db->order_by('id_mapel','DESC');    
		$this->db->limit(1);    
		$query = $this->db->get('mapel');
			if($query->num_rows() <> 0){      
				 $data = $query->row();
				 $kode = intval($data->id_mapel) + 1; 
			}
			else{      
				 $kode = 1;  
			}
		$batas = str_pad($kode, 5, "0", STR_PAD_LEFT);    
		$kodetampil = "mpl".$batas;
		return $kodetampil;  
	}

	public function getAllData($grup = false)
	{

		$this->db->select('mapel.id_mapel, mapel.nama_mapel,mapel.id_guru, guru.nama_guru');
		$this->db->from('mapel');
		$this->db->join('guru', 'guru.id_guru = mapel.id_guru');
		// if ($grup) {
		// 	$this->db->group_by('kode_mapel');
		// }
		// $this->db->order_by('kode_mapel', 'ASC');
		return $this->db->get()->result();
	}



	// public function getMapel()
	// {
	// 	return $this->db->query("SELECT * FROM `mapel` inner join kelas on (mapel.kelas = kelas.kelas && mapel.id_jurusan = kelas.id_jurusan) ORDER BY `mapel`.`kode_mapel` ASC ")->result();
	// }

	public function getMapelbyKodeMapel($kodeMapel)
	{
		return $this->db->get_where('mapel', ['kode_mapel' => $kodeMapel])->row('nama_mapel');
	}

	// public function listDataMapel()
	// {
	// 	$this->db->group_by('kode_mapel');
	// 	$this->db->order_by('id_mapel', 'ASC');
	// 	return $this->db->get('mapel')->result();
	// }

	// public function getDataMapelByKodeMapel($kodeMapel)
	// {
	// 	return $this->db->get_where('mapel', ['kode_mapel' => $kodeMapel])->result();
	// }

	public function getAllData_jurusan()
	{
		return $this->db->get('jurusan')->result();
	}

	public function checkExist($kode_mapel,  $nama_mapel, $id_gur)
	{
		// $data = [
		// 	'kode_mapel' => $kode_mapel,
		// 	'kelompok_mapel' => $kelompok_mapel,
		// 	'kelas' => $kelas,
		// 	'beban_jam' => $beban_jam,
		// 	'id_jurusan' => $id_jurusan
		// ];
		$data = [
			'id_mapel' => $kode_mapel,
			'nama_mapel' => $nama_mapel,
			'id_guru' => $id_gur
		];
		$query = $this->db->get_where('mapel', $data)->num_rows();
		if ($query > 0) {
			return false;
		}
		return true;
	}

	// public function tambah_data()
	// {
	// 	echo $jumlah = $this->input->post('jml_data');
	// 	echo $id_kelas = $this->input->post('id_kelas');
	// 	echo $id_mapel = $this->input->post('id_mapel');
	// 	echo $nama_mapel = $this->input->post('nama_mapel');
	// 	echo $kode_mapel = $this->input->post('kode_mapel');
	// 	echo $beban_jam = $this->input->post('beban_jam');
	// 	echo $id_guru = $this->input->post('guru');


	// for ($i = 0; $i < $jumlah; $i++) {
	// 	$data = array(
	// 		'id_tugas' => $id_guru[$i] . '-' . $id_mapel[$i] . '-' . $id_kelas[$i],
	// 		'id_guru' => $id_guru[$i],
	// 		'id_mapel' => $id_mapel[$i],
	// 		'nama_mapel' => $nama_mapel[$i],
	// 		'kode_mapel' => $kode_mapel[$i],
	// 		'id_kelas' => $id_kelas[$i],
	// 		'sisa_jam' => $beban_jam[$i]
	// 	);
	// 	$this->db->insert('mapel', $data);
	// }
	// }

	public function tambah_data()
	{
				$data = [
					'id_mapel' => $this->CreateCode(),
					'nama_mapel' => $this->input->post('nm_map'),
					'id_guru' => $this->input->post('id_gur')
				];
				// if ($this->checkExist($this->input->post('kd_map'), $this->input->post('kelompok_mapel'), $valueKls, $this->input->post('beban'), $valueJur)) {
					$this->db->insert('mapel', $data);
				//}
	}

	public function hapus_data($id)
	{
		$this->db->delete('mapel', ['id_mapel' => $id]);
	}

	public function ubah_data()
	{
		// $data = array(
		// 	'kode_mapel' => $this->input->post('kd_map', true),
		// 	'nama_mapel' => $this->input->post('nm_map', true),
		// 	'kelas' => $this->input->post('kls', true),
		// 	'beban_jam' => $this->input->post('beban', true),
		// 	'id_jurusan' => $this->input->post('id_jur', true),
		// 	'kelompok_mapel' => $this->input->post('kelompok_mapel', true)
		// );

		$data = [
			//'id_mapel' => $this->input->post('kd_map',true),
			'nama_mapel' => $this->input->post('nm_map',true),
			'id_guru' => $this->input->post('id_gur',true)
		];
		// if ($this->checkExist($this->input->post('kd_map'), $this->input->post('kelompok_mapel'), $this->input->post('kls', true), $this->input->post('beban'), $this->input->post('id_jur', true))) {
		 	$this->db->where('id_mapel', $this->input->post('id_map', true));
			$this->db->update('mapel', $data);
		// }
	}


	public function detail_data($id)
	{
		return $this->db->get_where('mapel', ['id_mapel' => $id])->row_array();
	}
}
