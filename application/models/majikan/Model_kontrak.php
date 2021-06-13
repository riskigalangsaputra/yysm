<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_kontrak extends CI_Model
{
    function get_kontrak($email_majikan)
    {
        $hasil = $this->db->query("SELECT *, DATE_FORMAT(tanggal_kontrak,'%d %M %Y') AS tanggal,DATE_FORMAT(tanggal_pembayaran_kontrak,'%d %M %Y %H:%i') AS tanggal_pembayaran FROM kontrak INNER JOIN pembantu ON kontrak.kd_pembantu=pembantu.kd_pembantu INNER JOIN majikan ON kontrak.kd_majikan=majikan.kd_majikan WHERE email_majikan='$email_majikan' ORDER BY kd_kontrak ASC");
        return $hasil->result_array();
    }

    function batal($kode, $status)
    {
        $sql = $this->db->query("UPDATE kontrak SET status_kontrak='$status' WHERE kd_kontrak='$kode' ");
        return $sql;
    }
}
