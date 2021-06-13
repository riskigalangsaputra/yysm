<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_laporan extends CI_Model
{

    function pembantu()
    {
        $sql = $this->db->query("SELECT * FROM pembantu INNER JOIN user ON pembantu.kd_user=user.kd_user ORDER BY kd_pembantu ASC ");
        return $sql->result_array();
    }

    function majikan()
    {
        $sql = $this->db->query("SELECT * FROM majikan INNER JOIN user ON majikan.kd_user=user.kd_user ORDER BY kd_majikan ASC ");
        return $sql->result_array();
    }

    function user()
    {
        $sql = $this->db->query("SELECT * FROM user ORDER BY kd_user ASC ");
        return $sql->result_array();
    }

    function negosiasi()
    {
        $sql = $this->db->query("SELECT *,DATE_FORMAT(tanggal_negosiasi, '%d %M %Y') AS tanggal FROM negosiasi INNER JOIN pembantu ON negosiasi.kd_pembantu=pembantu.kd_pembantu INNER JOIN majikan ON negosiasi.kd_majikan=majikan.kd_majikan ORDER BY kd_negosiasi ASC ");
        return $sql->result_array();
    }

    function kontrak()
    {
        $sql = $this->db->query("SELECT *,DATE_FORMAT(tanggal_kontrak, '%d %M %Y') AS tanggal FROM kontrak INNER JOIN pembantu ON kontrak.kd_pembantu=pembantu.kd_pembantu INNER JOIN majikan ON kontrak.kd_majikan=majikan.kd_majikan ORDER BY kd_kontrak ASC ");
        return $sql->result_array();
    }

    function pendapatan()
    {
        $sql = $this->db->query("SELECT *,DATE_FORMAT(tanggal_pembayaran_kontrak, '%d %M %Y %H:%i') AS tanggal FROM kontrak INNER JOIN pembantu ON pembantu.kd_pembantu=kontrak.kd_pembantu INNER JOIN majikan ON kontrak.kd_majikan=majikan.kd_majikan WHERE status_kontrak='Diverifikasi' ORDER BY kd_kontrak ASC ");
        return $sql->result_array();
    }

    function total_biaya_admin()
    {
        $sql = $this->db->query("SELECT SUM(biaya_admin) AS total_biaya_admin FROM kontrak WHERE status_kontrak='Diverifikasi'");
        return $sql->result_array();
    }

    function pembayaran()
    {
        $sql = $this->db->query("SELECT *,DATE_FORMAT(tanggal_pembayaran, '%d %M %Y') AS tanggal FROM pembayaran INNER JOIN pembantu ON pembayaran.kd_pembantu=pembantu.kd_pembantu INNER JOIN majikan ON pembayaran.kd_majikan=majikan.kd_majikan ORDER BY kd_pembayaran ASC ");
        return $sql->result_array();
    }

    function pengunjung()
    {
        $sql = $this->db->query("SELECT *,DATE_FORMAT(pengunjung_tanggal, '%d %M %Y') AS tanggal, DATE_FORMAT(pengunjung_tanggal, '%H:%i') AS jam FROM statistik INNER JOIN majikan ON statistik.kd_majikan=majikan.kd_majikan ORDER BY kd_statistik ASC ");
        return $sql->result_array();
    }

    function pesan()
    {
        $sql = $this->db->query("SELECT *,DATE_FORMAT(tanggal_pesan, '%d %M %Y') AS tanggal FROM pesan INNER JOIN majikan ON majikan.kd_majikan=pesan.kd_majikan ORDER BY kd_pesan ASC ");
        return $sql->result_array();
    }

    function pembantu_belum_terverfikasi()
    {
        $sql = $this->db->query("SELECT * FROM pembantu WHERE status_pembantu='Belum Terverifikasi' ORDER BY kd_pembantu ASC ");
        return $sql->result_array();
    }

    function majikan_belum_terverfikasi()
    {
        $sql = $this->db->query("SELECT * FROM majikan WHERE status='Belum Terverifikasi' ORDER BY kd_majikan ASC ");
        return $sql->result_array();
    }
}
