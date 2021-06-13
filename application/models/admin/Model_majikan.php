<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_majikan extends CI_Model
{
    function read()
    {
        $sql = $this->db->query("SELECT * FROM majikan ORDER BY kd_majikan ASC ");
        return $sql->result_array();
    }

    function get_majikan($kode)
    {
        $sql = $this->db->query("SELECT * FROM majikan where kd_majikan='$kode'");
        return $sql;
    }

    function hapus($kode)
    {
        $sql = $this->db->query("DELETE FROM majikan where kd_majikan='$kode'");
        return $sql;
    }
}
