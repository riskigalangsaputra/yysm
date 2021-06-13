<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_pembayaran extends CI_Model
{
    function read()
    {
        $sql = $this->db->query("SELECT *, DATE_FORMAT(tanggal_pembayaran,'%d %M %Y') AS tanggal FROM pembayaran INNER JOIN pembantu ON pembantu.kd_pembantu=pembayaran.kd_pembantu INNER JOIN kontrak ON kontrak.kd_kontrak=pembayaran.kd_kontrak INNER JOIN majikan ON pembayaran.kd_majikan=majikan.kd_majikan ORDER BY tanggal_pembayaran ASC");
        return $sql->result_array();
    }

    function hapus($kode)
    {
        $sql = $this->db->query("DELETE FROM pembayaran WHERE kd_pembayaran='$kode' ");
        return $sql;
    }

    function bukti_pembayaran($kode)
    {
        $sql = $this->db->query("SELECT * FROM pembayaran WHERE kd_pembayaran='$kode'");
        return $sql;
    }
}
