<?php

/**
 * 
 */
class Ruang_Model extends CI_Model
{
	/* 
	* mengambil semua data kelas dan join data jurusan
	*/
	public function getAllData()
	{
		$this->db->select('*');
		$this->db->from('ruang');
		// $this->db->join('jurusan', 'jurusan.id_jurusan = kelas.id_jurusan');
		// $this->db->order_by('kelas.id_jurusan', 'ASC');
		// $this->db->order_by('kelas.kelas', 'ASC');
		// $this->db->order_by('kelas.nama_kelas', 'ASC');
		return $this->db->get()->result();
	}

	public function CreateCode(){
		$this->db->select('RIGHT(ruang.id_ruang,5) as id_ruang', FALSE);
		$this->db->order_by('id_ruang','DESC');    
		$this->db->limit(1);    
		$query = $this->db->get('ruang');
			if($query->num_rows() <> 0){      
				 $data = $query->row();
				 $kode = intval($data->id_ruang) + 1; 
			}
			else{      
				 $kode = 1;  
			}
		$batas = str_pad($kode, 5, "0", STR_PAD_LEFT);    
		$kodetampil = "rag".$batas;
		return $kodetampil;  
	}

	public function getAllData_ruang()
	{
		return $this->db->get('ruang')->result();
	}

	public function tambah_data()
	{
		$data = array(
			'id_ruang' => $this->CreateCode(),
			'nama_ruang' => $this->input->post('nm_ruang'),
			'kapasitas' => $this->input->post('kasis')
			// 'nama_kelas' => $this->input->post('nm_kelas')
		);
		$this->db->insert('ruang', $data);
	}

	public function ubah_data()
	{
		$data = array(
			'nama_ruang' => $this->input->post('nm_ruang'),
			'kapasitas' => $this->input->post('kasis')
		);
		$this->db->where('id_ruang', $this->input->post('id_ruang', true));
		$this->db->update('ruang', $data);
	}

	public function hapus_data($id)
	{
		$this->db->delete('ruang', ['id_ruang' => $id]);
	}

	public function detail_data($id)
	{
		return $this->db->get_where('ruang', ['id_ruang' => $id])->row_array();
	}
}
