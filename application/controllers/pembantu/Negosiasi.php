<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Negosiasi extends CI_Controller
{

    public function __construct()
    {
        // Fungsi untuk menghindari user melakukan akses ke halaman pembantu
        parent::__construct();
        if (!$this->session->userdata('email_pembantu')) {
            redirect(base_url('login-pembantu'));
        }

        $this->load->model('pembantu/Model_negosiasi');
    }

    public function index()
    {
        $pembantu  = $this->db->get_where('pembantu', ['email_pembantu' =>  $this->session->userdata('email_pembantu')])->row_array();
        $email_pembantu = $pembantu['email_pembantu'];

        $data = array(
            'title'               => 'Negosiasi',
            'pembantu'     => $this->db->get_where('pembantu', ['email_pembantu' =>  $this->session->userdata('email_pembantu')])->row_array(),
            'negosiasi'           => $this->Model_negosiasi->read($email_pembantu)
        );

        $this->load->view('pembantu/header', $data);
        $this->load->view('pembantu/negosiasi', $data);
        $this->load->view('pembantu/footer');
    }

    public function terima()
    {
        date_default_timezone_set("Asia/Jakarta");
        $data = array(
            'title'               => 'Negosiasi',
            'pembantu'     => $this->db->get_where('pembantu', ['email_pembantu' =>  $this->session->userdata('email_pembantu')])->row_array(),
        );

        // input tabel kontak
        $kd_pembantu = $this->input->post('kd_pembantu');
        $kd_majikan = $this->input->post('kd_majikan');
        $biaya_admin = $this->input->post('biaya_admin');
        $total = $this->input->post('total');
        $status_kontrak = $this->input->post('status_kontrak');

        // Update Pembantu
        $kode_pembantu = $this->input->post('kode_pembantu');
        $kategori = $this->input->post('kategori');

        $kode = $this->input->post('kode');
        $nama = $this->input->post('nama');
        $status = $this->input->post('status', TRUE);
        $date = date('Y-m-d H:i:s');

        $this->Model_negosiasi->terima($kode, $status, $date);
        $this->db->query("DELETE FROM negosiasi WHERE kd_negosiasi='$kode' ");
        $this->db->query("INSERT INTO kontrak (kd_pembantu,kd_majikan,biaya_admin,total,status_kontrak) VALUES ('$kd_pembantu', '$kd_majikan', '$biaya_admin', '$total', '$status_kontrak')");

        // Update Data Pembantu
        $this->db->query("UPDATE pembantu SET kategori='$kategori' WHERE kd_pembantu='$kode_pembantu' ");

        $this->session->set_flashdata('success', 'Pembantu <b>' . $nama . '</b> berhasil menerima negosiasi.');
        redirect(base_url('pembantu/negosiasi'));

        $this->load->view('pembantu/header', $data);
        $this->load->view('pembantu/kontrak', $data);
        $this->load->view('pembantu/footer');
    }

    public function tolak()
    {
        date_default_timezone_set("Asia/Jakarta");
        $data = array(
            'title'               => 'Negosiasi',
            'pembantu'     => $this->db->get_where('pembantu', ['email_pembantu' =>  $this->session->userdata('email_pembantu')])->row_array(),
        );

        $kode = $this->input->post('kode');
        $nama = $this->input->post('nama');
        $status = $this->input->post('status', TRUE);
        $date = date('Y-m-d H:i:s');

        $this->Model_negosiasi->terima($kode, $status, $date);
        $this->session->set_flashdata('error', 'Pembantu <b>' . $nama . '</b> menolak negosiasi.');
        redirect(base_url('pembantu/negosiasi'));

        $this->load->view('pembantu/header', $data);
        $this->load->view('pembantu/negosiasi', $data);
        $this->load->view('pembantu/footer');
    }
}
