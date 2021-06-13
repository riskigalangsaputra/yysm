<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_dashboard extends CI_Model
{

    function get_total_pembantu()
    {
        $sql = $this->db->count_all('pembantu');
        return $sql;
    }

    function get_total_majikan()
    {
        $sql = $this->db->count_all('majikan');
        return $sql;
    }

    function get_total_user()
    {
        $sql = $this->db->count_all('user');
        return $sql;
    }

    function get_total_negosiasi()
    {
        $sql = $this->db->count_all('negosiasi');
        return $sql;
    }
}
