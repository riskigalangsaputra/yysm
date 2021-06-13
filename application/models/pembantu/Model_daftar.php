<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_daftar extends CI_Model
{

    function daftar($kd_user, $nik, $username_pembantu, $nama_pembantu, $email_pembantu, $telepon, $password, $alamat_pembantu, $foto_pembantu, $jenis_kelamin, $agama, $umur, $tinggi, $berat, $menginap, $pendidikan, $status, $pengalaman, $foto_ktp, $surat_polisi, $surat_dokter, $keterampilan, $gaji, $nama_bank, $no_rekening, $status_pembantu, $kategori, $deskripsi)
    {
        $sql = $this->db->query("INSERT INTO pembantu (kd_user, nik,username_pembantu,nama_pembantu,email_pembantu,telepon,password,alamat_pembantu,foto_pembantu,jenis_kelamin,agama,umur,tinggi,berat,menginap,pendidikan,status,pengalaman,foto_ktp,surat_polisi,surat_dokter,keterampilan,gaji,nama_bank,no_rekening,status_pembantu,kategori,deskripsi)
        VALUE ('$kd_user', '$nik', '$username_pembantu', '$nama_pembantu', '$email_pembantu', '$telepon', '$password', '$alamat_pembantu', '$foto_pembantu', '$jenis_kelamin', '$agama', '$umur', '$tinggi', '$berat', '$menginap', '$pendidikan', '$status', '$pengalaman', '$foto_ktp', '$surat_polisi', '$surat_dokter', '$keterampilan', '$gaji', '$nama_bank', '$no_rekening', '$status_pembantu', '$kategori', '$deskripsi') ");
        return $sql;
    }
}
