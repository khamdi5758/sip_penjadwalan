<?php
class Rumusan_Model extends CI_Model
{
    /* 
    * mengambil semua data rumusan
    * param : hari(null), id kelas(null)
    */
    public function getDataRumusan($kelas = null)
    {
        $this->db->select("*");
        $this->db->from('rumusan');
        if ($kelas != null) {
            $this->db->like('kelas', $kelas, 'both');
        }
        $this->db->order_by('`rumusan`.`hasil_rumusan` DESC, `rumusan`.`beban_kerja` DESC');
        return $this->db->get()->result();
    }

    /* 
    * delete semua data rumusan
    */
    public function deleteData()
    {
        $this->db->delete('rumusan');
    }
    /* 
    * tambah data
    */
    public function createData($data)
    {
        foreach ($data as $value) {
            $data = [
                'id_guru' => $value->id_guru,
                'hari_request' =>  implode(',', $value->hari),
                'kelas' => implode(',', $value->kelas),
                'total' =>  $value->jam_tersedia,
                'beban_kerja' => $value->beban_kerja,
                'hasil_rumusan' => $value->rumusan
            ];
            $this->db->insert('rumusan', $data);
        }
    }

    public function resetRumusan()
    {
        $this->db->empty_table('rumusan');
    }
}
