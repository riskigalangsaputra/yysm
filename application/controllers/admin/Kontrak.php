<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kontrak extends CI_Controller
{

    public function __construct()
    {
        // Fungsi untuk menghindari user melakukan akses ke halaman admin
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect(base_url('login-admin'));
        }

        $this->load->library('upload');
        $this->load->model('admin/Model_kontrak');
    }

    public function index()
    {
        $data = array(
            'title'               => 'Kontrak',
            'user'               => $this->db->get_where('user', ['email' =>  $this->session->userdata('email')])->row_array(),
            'kontrak'           => $this->Model_kontrak->read()
        );

        $this->load->view('admin/header', $data);
        $this->load->view('admin/kontrak', $data);
        $this->load->view('admin/footer');
    }

    public function batal()
    {
        $data = array(
            'title'               => 'Kontrak',
            'user'               => $this->db->get_where('user', ['email' =>  $this->session->userdata('email')])->row_array(),
        );

        $kode = $this->input->post('kode');
        $kd_pembantu = $this->input->post('kd_pembantu');
        $nama = $this->input->post('nama');
        $status = $this->input->post('status');
        $this->Model_kontrak->batal($kode, $status);
        $this->db->query("UPDATE pembantu SET kategori='Tersedia' WHERE kd_pembantu='$kd_pembantu' ");
        $this->session->set_flashdata('success', 'Berhasil membatalkan kontrak dari majikan <b>' . $nama . '</b>.');
        redirect(base_url('admin/kontrak'));

        $this->load->view('admin/header', $data);
        $this->load->view('admin/kontrak', $data);
        $this->load->view('admin/footer');
    }

    public function hapus()
    {
        $data = array(
            'user'               => $this->db->get_where('user', ['email' =>  $this->session->userdata('email')])->row_array(),
        );

        $kode = $this->input->post('kode');
        $nama = $this->input->post('nama');
        $this->Model_kontrak->hapus($kode);
        $this->session->set_flashdata('success', 'Berhasil menghapus pembayaran dari majikan <b>' . $nama . '</b>.');
        redirect(base_url('admin/kontrak'));

        $this->load->view('admin/header', $data);
        $this->load->view('admin/kontrak', $data);
        $this->load->view('admin/footer');
    }
}
