<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_dashboard extends CI_Model
{

    function get_total_negosiasi($kd_pembantu)
    {
        $this->db->where('kd_pembantu', $kd_pembantu);
        $sql = $this->db->count_all_results('negosiasi');
        return $sql;
    }

    function get_total_kontrak($kd_pembantu)
    {
        $this->db->where('kd_pembantu', $kd_pembantu);
        $sql = $this->db->count_all_results('kontrak');
        return $sql;
    }

    function get_total_pembayaran($kd_pembantu)
    {
        $this->db->where('kd_pembantu', $kd_pembantu);
        $sql = $this->db->count_all_results('pembayaran');
        return $sql;
    }
}
