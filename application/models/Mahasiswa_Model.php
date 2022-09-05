<?php 

/**
 * 
 */
class Mahasiswa_Model extends CI_Model
{
	public function getAllData()
	{
		return $this->db->get('jurusan')->result_array();
	}
}
 ?>