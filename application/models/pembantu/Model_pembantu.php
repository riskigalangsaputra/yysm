<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_pembantu extends CI_Model
{
    function read()
    {
        $sql = $this->db->query("SELECT * FROM pembantu ORDER BY kd_pembantu ASC ");
        return $sql->result_array();
    }

    function simpan($kd_user, $nik, $nama_pembantu, $email_pembantu, $telepon, $password, $alamat_pembantu, $foto_pembantu, $jenis_kelamin, $agama, $umur, $tinggi, $berat, $menginap, $pendidikan, $status, $pengalaman, $suku, $foto_ktp, $surat_polisi, $surat_dokter, $keterampilan, $gaji, $nama_bank, $no_rekening, $status_pembantu, $kategori, $deskripsi)
    {
        $sql = $this->db->query("INSERT INTO pembantu (kd_user,nik,nama_pembantu,email_pembantu,telepon,password,alamat_pembantu,foto_pembantu,jenis_kelamin,agama,umur,tinggi,berat,menginap,pendidikan,status,pengalaman,suku,foto_ktp,surat_polisi,surat_dokter,keterampilan,gaji,nama_bank,no_rekening,status_pembantu,kategori,deskripsi)
        VALUES ('$kd_user', '$nik', '$nama_pembantu', '$email_pembantu', '$telepon', '$password', '$alamat_pembantu', '$foto_pembantu', '$jenis_kelamin', '$agama', '$umur', '$tinggi', '$berat', '$menginap', '$pendidikan', '$status', '$pengalaman', '$suku', '$foto_ktp', '$surat_polisi', '$surat_dokter', '$keterampilan', '$gaji', '$nama_bank', '$no_rekening', '$status_pembantu', '$kategori', '$deskripsi') ");
        return $sql;
    }

    function get_pembantu($kode)
    {
        $sql = $this->db->query("SELECT * FROM pembantu WHERE kd_pembantu='$kode'");
        return $sql;
    }

    function update($kode, $kd_user, $nik, $nama_pembantu, $email_pembantu, $telepon, $alamat_pembantu, $foto_pembantu, $jenis_kelamin, $agama, $umur, $tinggi, $berat, $menginap, $pendidikan, $status, $pengalaman, $suku, $foto_ktp, $surat_polisi, $surat_dokter, $keterampilan, $gaji, $nama_bank, $no_rekening, $deskripsi)
    {
        $sql = $this->db->query("UPDATE pembantu SET kd_user='$kd_user',nik='$nik',nama_pembantu='$nama_pembantu',email_pembantu='$email_pembantu',telepon='$telepon',alamat_pembantu='$alamat_pembantu',foto_pembantu='$foto_pembantu', jenis_kelamin='$jenis_kelamin',agama='$agama',umur='$umur',tinggi='$tinggi',berat='$berat',menginap='$menginap',pendidikan='$pendidikan',status='$status',pengalaman='$pengalaman',suku='$suku', foto_ktp'$foto_ktp', surat_polisi='$surat_polisi', surat_dokter='$surat_dokter', keterampilan='$keterampilan',gaji='$gaji',nama_bank='$nama_bank',no_rekening='$no_rekening',deskripsi='$deskripsi' WHERE kd_pembantu='$kode'");
        return $sql;
    }

    function update_foto_pembantu($kode, $kd_user, $nik, $nama_pembantu, $email_pembantu, $telepon, $alamat_pembantu, $foto_pembantu, $jenis_kelamin, $agama, $umur, $tinggi, $berat, $menginap, $pendidikan, $status, $pengalaman, $suku, $keterampilan, $gaji, $nama_bank, $no_rekening, $deskripsi)
    {
        $sql = $this->db->query("UPDATE pembantu SET kd_user='$kd_user',nik='$nik',nama_pembantu='$nama_pembantu',email_pembantu='$email_pembantu',telepon='$telepon',alamat_pembantu='$alamat_pembantu',foto_pembantu='$foto_pembantu', jenis_kelamin='$jenis_kelamin',agama='$agama',umur='$umur',tinggi='$tinggi',berat='$berat',menginap='$menginap',pendidikan='$pendidikan',status='$status',pengalaman='$pengalaman',suku='$suku', keterampilan='$keterampilan',gaji='$gaji',nama_bank='$nama_bank',no_rekening='$no_rekening',deskripsi='$deskripsi' WHERE kd_pembantu='$kode'");
        return $sql;
    }

    function update_foto_ktp($kode, $kd_user, $nik, $nama_pembantu, $email_pembantu, $telepon, $alamat_pembantu, $jenis_kelamin, $agama, $umur, $tinggi, $berat, $menginap, $pendidikan, $status, $pengalaman, $suku, $foto_ktp, $keterampilan, $gaji, $nama_bank, $no_rekening, $deskripsi)
    {
        $sql = $this->db->query("UPDATE pembantu SET kd_user='$kd_user',nik='$nik',nama_pembantu='$nama_pembantu',email_pembantu='$email_pembantu',telepon='$telepon',alamat_pembantu='$alamat_pembantu', jenis_kelamin='$jenis_kelamin',agama='$agama',umur='$umur',tinggi='$tinggi',berat='$berat',menginap='$menginap',pendidikan='$pendidikan',status='$status',pengalaman='$pengalaman',suku='$suku', foto_ktp='$foto_ktp', keterampilan='$keterampilan',gaji='$gaji',nama_bank='$nama_bank',no_rekening='$no_rekening',deskripsi='$deskripsi' WHERE kd_pembantu='$kode'");
        return $sql;
    }

    function update_tanpa_gambar($kode, $kd_user, $nik, $nama_pembantu, $email_pembantu, $telepon, $alamat_pembantu, $jenis_kelamin, $agama, $umur, $tinggi, $berat, $menginap, $pendidikan, $status, $pengalaman, $suku, $keterampilan, $gaji, $nama_bank, $no_rekening, $deskripsi)
    {
        $sql = $this->db->query("UPDATE pembantu SET kd_user='$kd_user',nik='$nik',nama_pembantu='$nama_pembantu',email_pembantu='$email_pembantu',telepon='$telepon',alamat_pembantu='$alamat_pembantu',jenis_kelamin='$jenis_kelamin',agama='$agama',umur='$umur',tinggi='$tinggi',berat='$berat',menginap='$menginap',pendidikan='$pendidikan',status='$status',pengalaman='$pengalaman',suku='$suku' ,keterampilan='$keterampilan',gaji='$gaji',nama_bank='$nama_bank',no_rekening='$no_rekening',deskripsi='$deskripsi' WHERE kd_pembantu='$kode'");
        return $sql;
    }

    function hapus($kode)
    {
        $sql = $this->db->query("DELETE FROM majikan where kd_majikan='$kode'");
        return $sql;
    }
}
