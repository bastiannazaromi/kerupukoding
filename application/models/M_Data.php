<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Data extends CI_Model
{

    public function save($cahaya, $hujan)
    {
        $tanggal = date('Y-m-d H:i:s');

        $data = [
            "waktu" => $tanggal,
            "cahaya" => $cahaya,
            "hujan" => $hujan
        ];

        $this->db->insert('tbrekap', $data);
    }

    public function ambil_data_terakhir()
    {
        $this->db->select('*');
        $this->db->from('tbrekap');
        $this->db->order_by('id', 'desc');
        $this->db->limit(1);

        return $this->db->get()->result_array();
    }
}
