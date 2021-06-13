<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_kontrak extends CI_Model
{
    function read($email_pembantu)
    {
        $sql = $this->db->query("SELECT *, DATE_FORMAT(tanggal_kontrak,'%d %M %Y') AS tanggal FROM kontrak INNER JOIN pembantu ON kontrak.kd_pembantu=pembantu.kd_pembantu INNER JOIN majikan ON kontrak.kd_majikan=majikan.kd_majikan WHERE email_pembantu='$email_pembantu' ORDER BY tanggal_kontrak ASC");
        return $sql->result_array();
    }
}
