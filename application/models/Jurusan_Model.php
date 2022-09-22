<?php

/**
 * 
 */
class Jurusan_Model extends CI_Model
{
	public function getAllData($grup = null)
	{
		return $this->db->get('jurusan')->result();
	}

	public function CreateCode(){
		$this->db->select('RIGHT(jurusan.id_jurusan,5) as id_jurusan', FALSE);
		$this->db->order_by('id_jurusan','DESC');    
		$this->db->limit(1);    
		$query = $this->db->get('jurusan');
			if($query->num_rows() <> 0){      
				 $data = $query->row();
				 $kode = intval($data->id_jurusan) + 1; 
			}
			else{      
				 $kode = 1;  
			}
		$batas = str_pad($kode, 5, "0", STR_PAD_LEFT);    
		$kodetampil = "jrs".$batas;
		return $kodetampil;  
	}

	public function tambah_data()
	{
		$data = array(
			'id_jurusan' => $this->CreateCode(),
			'nama_jurusan' => $this->input->post('nm_jur', true)
		);

		$this->db->insert('jurusan', $data);
	}

	public function ubah_data()
	{
		$data = array(
			'nama_jurusan' => $this->input->post('nm_jur', true)
		);
		$this->db->where('id_jurusan', $this->input->post('id_jur', true));
		$this->db->update('jurusan', $data);
	}

	public function hapus_data($id)
	{
		$this->db->delete('jurusan', ['id_jurusan' => $id]);
	}

	public function detail_data($id)
	{
		return $this->db->get_where('jurusan', ['id_jurusan' => $id])->row_array();
	}
}
