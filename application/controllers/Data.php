<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data extends CI_Controller
{

    public function save()
    {
        $this->load->model('M_Data', 'data');

        $cahaya = $this->input->get('cahaya');
        $hujan = $this->input->get('hujan');

        // data dari M_Simpan.php
        $rekap = $this->data->ambil_data_terakhir();

        if ($rekap) {
            $cahaya_sebelumnya = $rekap[0]["cahaya"];
            $hujan_sebelumnya = $rekap[0]["hujan"];

            $awal  = date_create($rekap[0]['waktu']);
            $akhir = date_create(); // waktu sekarang
            $diff  = date_diff($awal, $akhir);

            $hari = $diff->d;
            $jam = $diff->h;

            if ($cahaya_sebelumnya == $cahaya && $hujan_sebelumnya == $hujan) {
                if ($hari >= 1 || $jam >= 1) {
                    // Simoan ke database
                    $this->data->save($cahaya, $hujan);
                    echo "Data berhasil disimpan";
                } else {
                    echo "Data berhasil disimpan";
                }
            } else {
                // Simpan ke database
                $this->data->save($cahaya, $hujan);
                echo "Data berhasil disimpan";
            }
        } else {
            // Simpan ke database
            $this->data->save($cahaya, $hujan);
            echo "Data berhasil disimpan";
        }
    }

    public function data_terakhir()
    {
        $this->load->model('M_Data', 'data');

        $rekap = $this->data->ambil_data_terakhir();

        $cahaya = $rekap[0]["cahaya"];
        $hujan = $rekap[0]["hujan"];

        if ($cahaya <= 50 || $hujan >= 40) {
            echo "true";
        } else {
            echo "false";
        }
    }
}
