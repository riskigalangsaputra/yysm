<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_kontrak extends CI_Model
{
    function read()
    {
        $sql = $this->db->query("SELECT *, DATE_FORMAT(tanggal_kontrak,'%d %M %Y') AS tanggal FROM kontrak INNER JOIN pembantu ON kontrak.kd_pembantu=pembantu.kd_pembantu INNER JOIN majikan ON kontrak.kd_majikan=majikan.kd_majikan ORDER BY tanggal_kontrak ASC");
        return $sql->result_array();
    }

    function batal($kode, $status)
    {
        $sql = $this->db->query("UPDATE kontrak SET status_kontrak='$status' WHERE kd_kontrak='$kode' ");
        return $sql;
    }

    function hapus($kode)
    {
        $sql = $this->db->query("DELETE FROM kontrak WHERE kd_kontrak='$kode' ");
        return $sql;
    }
}
