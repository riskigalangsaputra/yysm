<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_user extends CI_Model
{
    function read()
    {
        $sql = $this->db->query("SELECT * FROM user ORDER BY kd_user ASC ");
        return $sql->result_array();
    }

    function simpan($username, $nama_lengkap, $email, $jenis_kelamin, $telepon, $gambar, $password, $status)
    {
        $sql = $this->db->query("INSERT INTO user (username,nama_lengkap,email,jenis_kelamin,telepon,gambar,password,status) VALUE ('$username','$nama_lengkap', '$email', '$jenis_kelamin', '$telepon', '$gambar', '$password', '$status') ");
        return $sql;
    }

    function get_user($kode)
    {
        $sql = $this->db->query("SELECT * FROM user where kd_user='$kode'");
        return $sql;
    }

    function update($kode, $username, $nama_lengkap, $jenis_kelamin, $telepon, $gambar, $status)
    {
        $sql = $this->db->query("UPDATE user SET username='$username', nama_lengkap='$nama_lengkap', jenis_kelamin='$jenis_kelamin', telepon='$telepon', gambar='$gambar' ,status='$status' WHERE kd_user='$kode' ");
        return $sql;
    }

    function update_no_image($kode, $username, $nama_lengkap, $jenis_kelamin, $telepon, $status)
    {
        $sql = $this->db->query("UPDATE user SET username='$username', nama_lengkap='$nama_lengkap', jenis_kelamin='$jenis_kelamin', telepon='$telepon', status='$status' WHERE kd_user='$kode' ");
        return $sql;
    }

    function hapus($kode)
    {
        $sql = $this->db->query("DELETE FROM user where kd_user='$kode'");
        return $sql;
    }
}
