<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_prt extends CI_Model
{
    function get_all_pembantu()
    {
        $hasil = $this->db->query("SELECT *,DATE_FORMAT(tanggal_ditambahkan,'%d/%m/%Y') AS tanggal FROM pembantu ORDER BY kd_pembantu DESC");
        return $hasil->result_array();
    }

    // barang Populer
    function pembantu_populer()
    {
        $hasil = $this->db->query("SELECT * FROM pembantu ORDER BY banyak_dilihat DESC");
        return $hasil->result_array();
    }

    function get_pembantu()
    {
        $hasil = $this->db->query("SELECT * FROM pembantu ORDER BY nama_pembantu ASC ");
        return $hasil->result_array();
    }

    function get_detail_pembantu($kode)
    {
        $hasil = $this->db->query("SELECT *,DATE_FORMAT(tanggal_ditambahkan,'%d %M %Y') AS tanggal FROM pembantu WHERE kd_pembantu='$kode'");
        return $hasil;
    }
}
