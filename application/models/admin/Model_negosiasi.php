<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_negosiasi extends CI_Model
{
    function read()
    {
        $sql = $this->db->query("SELECT *, DATE_FORMAT(tanggal_negosiasi,'%d %M %Y') AS tanggal FROM negosiasi INNER JOIN pembantu ON negosiasi.kd_pembantu=pembantu.kd_pembantu INNER JOIN majikan ON negosiasi.kd_majikan=majikan.kd_majikan ORDER BY tanggal_negosiasi ASC");
        return $sql->result_array();
    }

    function terima($kode, $status, $date)
    {
        $sql = $this->db->query("UPDATE negosiasi SET status_negosiasi='$status', update_tanggal_negosiasi='$date' WHERE kd_negosiasi='$kode' ");
        return $sql;
    }

    function tolak($kode, $status, $date)
    {
        $sql = $this->db->query("UPDATE negosiasi SET status_negosiasi='$status', update_tanggal_negosiasi='$date' WHERE kd_negosiasi='$kode' ");
        return $sql;
    }
}
