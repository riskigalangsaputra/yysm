<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_pesan extends CI_Model
{

    public function kirim($kode_pembantu, $kode_majikan, $subjek, $status_pesan, $pesan)
    {
        $sql = $this->db->query("INSERT INTO pesan (kd_pembantu,kd_majikan,subjek,status_pesan,pesan) VALUE ('$kode_pembantu', '$kode_majikan', '$subjek', '$status_pesan', '$pesan') ");
        return $sql;
    }
}
