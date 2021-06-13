<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_daftar extends CI_Model
{

    function daftar($nik, $nama_majikan, $username, $email_majikan, $password, $alamat_majikan, $jenis_kelamin, $telepon, $foto_majikan, $foto_ktp, $foto_kk, $status)
    {
        $sql = $this->db->query("INSERT INTO majikan (nik,nama_majikan,username,email_majikan,password,alamat_majikan,jenis_kelamin,telepon,foto_majikan,foto_ktp,foto_kk,status) VALUE ('$nik', '$nama_majikan', '$username', '$email_majikan', '$password', '$alamat_majikan', '$jenis_kelamin', '$telepon', '$foto_majikan', '$foto_ktp', '$foto_kk', '$status') ");
        return $sql;
    }
}
