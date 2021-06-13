<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran extends CI_Controller
{

    public function __construct()
    {
        // Fungsi untuk menghindari user melakukan akses ke halaman admin
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect(base_url('login-admin'));
        }

        $this->load->library('upload');
        $this->load->model('admin/Model_pembayaran');
    }

    public function index()
    {
        $data = array(
            'title'               => 'Pembayaran',
            'user'               => $this->db->get_where('user', ['email' =>  $this->session->userdata('email')])->row_array(),
            'pembayaran'           => $this->Model_pembayaran->read()
        );

        $this->load->view('admin/header', $data);
        $this->load->view('admin/pembayaran', $data);
        $this->load->view('admin/footer');
    }

    public function verifikasi_pembayaran()
    {
        $data = array(
            'user'               => $this->db->get_where('user', ['email' =>  $this->session->userdata('email')])->row_array(),
        );

        $kode = $this->input->post('kode');
        $kd_kontrak = $this->input->post('kd_kontrak');
        $nama = $this->input->post('nama');
        $status = $this->input->post('status');
        $this->Model_pembayaran->verifikasi($kode, $status);
        $this->db->query("UPDATE kontrak SET status_kontrak='Diverifikasi' WHERE kd_kontrak='$kd_kontrak' ");

        $this->session->set_flashdata('success', 'Berhasil memverifikasi pembayaran dari majikan <b>' . $nama . '</b>.');
        redirect(base_url('daftar-pembayaran'));

        $this->load->view('admin/header', $data);
        $this->load->view('admin/pembayaran', $data);
        $this->load->view('admin/footer');
    }

    public function tolak_pembayaran()
    {
        $data = array(
            'user'               => $this->db->get_where('user', ['email' =>  $this->session->userdata('email')])->row_array(),
        );

        $kode = $this->input->post('kode');
        $kd_kontrak = $this->input->post('kd_kontrak');
        $nama = $this->input->post('nama');
        $status = $this->input->post('status');
        $this->Model_pembayaran->tolak($kode, $status);
        $this->db->query("UPDATE kontrak SET status_kontrak='Batal' WHERE kd_kontrak='$kd_kontrak' ");

        $this->session->set_flashdata('success', 'Berhasil menolak pembayaran dari majikan <b>' . $nama . '</b>.');
        redirect(base_url('daftar-pembayaran'));

        $this->load->view('admin/header', $data);
        $this->load->view('admin/pembayaran', $data);
        $this->load->view('admin/footer');
    }

    public function hapus_pembayaran()
    {
        $data = array(
            'user'               => $this->db->get_where('user', ['email' =>  $this->session->userdata('email')])->row_array(),
        );

        $kode = $this->input->post('kode');
        $nama = $this->input->post('nama');
        $this->Model_pembayaran->hapus($kode);
        $this->session->set_flashdata('success', 'Berhasil menghapus pembayaran dari majikan <b>' . $nama . '</b>.');
        redirect(base_url('daftar-pembayaran'));

        $this->load->view('admin/header', $data);
        $this->load->view('admin/pembayaran', $data);
        $this->load->view('admin/footer');
    }

    public function bukti()
    {
        $kode = $this->uri->segment(4);
        $data = array(
            'title' => 'Bukti Pembayaran',
            'user'  => $this->db->get_where('user', ['email' =>  $this->session->userdata('email')])->row_array(),
            'bukti'      => $this->Model_pembayaran->bukti_pembayaran($kode)
        );

        $this->load->view('admin/header', $data);
        $this->load->view('admin/pembayaran_bukti', $data);
        $this->load->view('admin/footer');
    }
}
