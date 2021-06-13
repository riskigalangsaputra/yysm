<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_negosiasi extends CI_Model
{

    public function get_negosiasi($email_majikan)
    {
        $hasil = $this->db->query("SELECT *, DATE_FORMAT(tanggal_negosiasi,'%d %M %Y') AS tanggal FROM negosiasi INNER JOIN pembantu ON negosiasi.kd_pembantu=pembantu.kd_pembantu INNER JOIN majikan ON negosiasi.kd_majikan=majikan.kd_majikan WHERE email_majikan='$email_majikan' ORDER BY kd_negosiasi ASC");
        return $hasil->result_array();
    }

    function negosiasi($kd_pembantu, $kd_majikan, $biaya_admin, $total, $status_negosiasi, $tanggal_negosiasi)
    {
        $sql = $this->db->query("INSERT INTO negosiasi (kd_pembantu,kd_majikan,biaya_admin,total,status_negosiasi,tanggal_negosiasi) VALUE ('$kd_pembantu', '$kd_majikan', '$biaya_admin', '$total', '$status_negosiasi', '$tanggal_negosiasi') ");
        return $sql;
    }
}
