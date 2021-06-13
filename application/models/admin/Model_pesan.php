<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_pesan extends CI_Model
{

    function read()
    {
        $sql = $this->db->query("SELECT *,DATE_FORMAT(tanggal_pesan, '%d %M %Y') AS tanggal FROM pesan INNER JOIN majikan ON majikan.kd_majikan=pesan.kd_majikan ORDER BY kd_pesan ASC ");
        return $sql->result_array();
    }

    function hapus($kode)
    {
        $sql = $this->db->query("DELETE FROM pesan WHERE kd_pesan='$kode' ");
        return $sql;
    }
}
