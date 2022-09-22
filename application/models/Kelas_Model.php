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
		$this->db->select('id_kelas, kelas, jurusan.nama_jurusan');
		$this->db->from('kelas');
		$this->db->join('jurusan', 'jurusan.id_jurusan = kelas.id_jurusan');
		$this->db->order_by('kelas.id_jurusan', 'ASC');
		$this->db->order_by('kelas.kelas', 'ASC');
		// $this->db->order_by('kelas.nama_kelas', 'ASC');
		return $this->db->get()->result();
	}

	public function CreateCode(){
		$this->db->select('RIGHT(kelas.id_kelas,5) as id_kelas', FALSE);
		$this->db->order_by('id_kelas','DESC');    
		$this->db->limit(1);    
		$query = $this->db->get('kelas');
			if($query->num_rows() <> 0){      
				 $data = $query->row();
				 $kode = intval($data->id_kelas) + 1; 
			}
			else{      
				 $kode = 1;  
			}
		$batas = str_pad($kode, 5, "0", STR_PAD_LEFT);    
		$kodetampil = "kls".$batas;
		return $kodetampil;  
	}

	public function getAllData_jurusan()
	{
		return $this->db->get('jurusan')->result();
	}

	public function tambah_data()
	{
		$data = array(
			'id_kelas' => $this->CreateCode(),
			'kelas' => $this->input->post('kelas'),
			'id_jurusan' => $this->input->post('id_jur'),
			// 'nama_kelas' => $this->input->post('nm_kelas')
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
