<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran extends CI_Controller
{

    public function __construct()
    {
        // Fungsi untuk menghindari user melakukan akses ke halaman pembantu
        parent::__construct();
        if (!$this->session->userdata('email_pembantu')) {
            redirect(base_url('login-pembantu'));
        }

        $this->load->model('pembantu/Model_pembayaran');
    }

    public function index()
    {
        $pembantu  = $this->db->get_where('pembantu', ['email_pembantu' =>  $this->session->userdata('email_pembantu')])->row_array();
        $email_pembantu = $pembantu['email_pembantu'];

        $data = array(
            'title'               => 'Pembayaran',
            'pembantu'     => $this->db->get_where('pembantu', ['email_pembantu' =>  $this->session->userdata('email_pembantu')])->row_array(),
            'pembayaran'           => $this->Model_pembayaran->read($email_pembantu)
        );

        $this->load->view('pembantu/header', $data);
        $this->load->view('pembantu/pembayaran', $data);
        $this->load->view('pembantu/footer');
    }

    public function verifikasi()
    {
        $data = array(
            'pembantu'     => $this->db->get_where('pembantu', ['email_pembantu' =>  $this->session->userdata('email_pembantu')])->row_array(),
        );

        $kode = $this->input->post('kode');
        $kd_kontrak = $this->input->post('kd_kontrak');
        $nama = $this->input->post('nama');
        $status = $this->input->post('status');
        $this->Model_pembayaran->verifikasi($kode, $status);
        // Update Status Kontrak
        $this->db->query("UPDATE kontrak SET status_kontrak='Diverifikasi' WHERE kd_kontrak='$kd_kontrak' ");
        $this->session->set_flashdata('success', 'Berhasil memverifikasi pembayaran dari majikan <b>' . $nama . '</b>.');
        redirect(base_url('pembantu/pembayaran'));

        $this->load->view('pembantu/header', $data);
        $this->load->view('pembantu/pembayaran', $data);
        $this->load->view('pembantu/footer');
    }

    public function tolak()
    {
        $data = array(
            'pembantu'     => $this->db->get_where('pembantu', ['email_pembantu' =>  $this->session->userdata('email_pembantu')])->row_array(),
        );

        $kode = $this->input->post('kode');
        $kd_kontrak = $this->input->post('kd_kontrak');
        $nama = $this->input->post('nama');
        $status = $this->input->post('status');
        $this->Model_pembayaran->tolak($kode, $status);
        $this->db->query("UPDATE kontrak SET status_kontrak='Batal' WHERE kd_kontrak='$kd_kontrak' ");

        $this->session->set_flashdata('success', 'Berhasil menolak pembayaran dari majikan <b>' . $nama . '</b>.');
        redirect(base_url('pembantu/pembayaran'));

        $this->load->view('pembantu/header', $data);
        $this->load->view('pembantu/pembayaran', $data);
        $this->load->view('pembantu/footer');
    }


    public function bukti()
    {
        $kode = $this->uri->segment(4);
        $data = array(
            'title' => 'Bukti Pembayaran',
            'pembantu'     => $this->db->get_where('pembantu', ['email_pembantu' =>  $this->session->userdata('email_pembantu')])->row_array(),
            'bukti'      => $this->Model_pembayaran->bukti_pembayaran($kode)
        );

        $this->load->view('pembantu/header', $data);
        $this->load->view('pembantu/pembayaran_bukti', $data);
        $this->load->view('pembantu/footer');
    }
}
