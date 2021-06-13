<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_pembayaran extends CI_Model
{

    public function get_pembayaran($email_majikan)
    {
        $sql = $this->db->query("SELECT *, DATE_FORMAT(tanggal_pembayaran,'%d %M %Y') AS tanggal FROM pembayaran INNER JOIN pembantu ON pembantu.kd_pembantu=pembayaran.kd_pembantu INNER JOIN kontrak ON kontrak.kd_kontrak=pembayaran.kd_kontrak INNER JOIN majikan ON pembayaran.kd_majikan=majikan.kd_majikan WHERE email_majikan='$email_majikan' ORDER BY tanggal_pembayaran ASC");
        return $sql->result_array();
    }

    public function get_kontrak($email_majikan)
    {
        $sql = $this->db->query("SELECT * FROM kontrak INNER JOIN pembantu ON pembantu.kd_pembantu=kontrak.kd_pembantu INNER JOIN majikan ON kontrak.kd_majikan=majikan.kd_majikan WHERE email_majikan='$email_majikan' ORDER BY kd_kontrak ASC");
        return $sql->result_array();
    }

    function simpan($kd_kontrak, $kd_pembantu, $kd_majikan, $bukti_pembayaran, $diverfikasi, $jumlah_pembayaran, $status_pembayaran)
    {
        $sql = $this->db->query("INSERT INTO pembayaran (kd_kontrak,kd_pembantu,kd_majikan,bukti_pembayaran,diverifikasi,jumlah_pembayaran,status_pembayaran) VALUE ('$kd_kontrak', '$kd_pembantu', '$kd_majikan', '$bukti_pembayaran', '$diverfikasi', '$jumlah_pembayaran', '$status_pembayaran') ");
        return $sql;
    }
}
