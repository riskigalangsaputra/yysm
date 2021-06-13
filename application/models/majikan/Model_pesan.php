<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_pesan extends CI_Model
{

    function kirim($kd_majikan, $subjek, $pesan)
    {
        $sql = $this->db->query("INSERT INTO pesan (kd_majikan,subjek,pesan) VALUE ('$kd_majikan', '$subjek', '$pesan') ");
        return $sql;
    }
}
