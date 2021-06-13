<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{

    public function __construct()
    {
        // Fungsi untuk menghindari user melakukan akses ke halaman admin
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect(base_url('login-admin'));
        }

        $this->load->library('Pdf');
        $this->load->model('admin/Model_laporan');
    }

    public function laporan_pembantu()
    {
        $data = array(
            'pembantu' =>  $this->Model_laporan->pembantu()
        );

        $this->load->view('admin/laporan/laporan_pembantu', $data);
    }

    public function laporan_majikan()
    {
        $data = array(
            'majikan' =>  $this->Model_laporan->majikan()
        );

        $this->load->view('admin/laporan/laporan_majikan', $data);
    }

    public function laporan_user()
    {
        $data = array(
            'user' =>  $this->Model_laporan->user()
        );

        $this->load->view('admin/laporan/laporan_user', $data);
    }

    public function laporan_negosiasi()
    {
        $data = array(
            'negosiasi' =>  $this->Model_laporan->negosiasi()
        );

        $this->load->view('admin/laporan/laporan_negosiasi', $data);
    }

    public function laporan_kontrak()
    {
        $data = array(
            'kontrak' =>  $this->Model_laporan->kontrak()
        );

        $this->load->view('admin/laporan/laporan_kontrak', $data);
    }

    public function laporan_pendapatan()
    {
        $data = array(
            'pendapatan' =>  $this->Model_laporan->pendapatan(),
            'total_biaya_admin' => $this->Model_laporan->total_biaya_admin()
        );

        $this->load->view('admin/laporan/laporan_pendapatan', $data);
    }

    public function laporan_pembayaran()
    {
        $data = array(
            'pembayaran' =>  $this->Model_laporan->pembayaran()
        );

        $this->load->view('admin/laporan/laporan_pembayaran', $data);
    }

    public function laporan_pengunjung()
    {
        $data = array(
            'pengunjung' =>  $this->Model_laporan->pengunjung()
        );

        $this->load->view('admin/laporan/laporan_pengunjung', $data);
    }

    public function laporan_pesan()
    {
        $data = array(
            'pesan' =>  $this->Model_laporan->pesan()
        );

        $this->load->view('admin/laporan/laporan_pesan', $data);
    }

    public function laporan_pembantu_belum_terverifikasi()
    {
        $data = array(
            'belum_terverfikasi' =>  $this->Model_laporan->pembantu_belum_terverfikasi()
        );

        $this->load->view('admin/laporan/laporan_pembantu_belum_terverifikasi', $data);
    }

    public function laporan_majikan_belum_terverifikasi()
    {
        $data = array(
            'belum_terverfikasi' =>  $this->Model_laporan->majikan_belum_terverfikasi()
        );

        $this->load->view('admin/laporan/laporan_majikan_belum_terverifikasi', $data);
    }
}
