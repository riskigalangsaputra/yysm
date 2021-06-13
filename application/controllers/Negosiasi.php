<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Negosiasi extends CI_Controller
{

    function __construct()
    {
        // Fungsi untuk menghindari pengguna yg belum login
        parent::__construct();
        if (!$this->session->userdata('email_majikan')) {
            redirect(base_url('login'));
        }

        $this->load->helper('text');
        $this->load->model('majikan/Model_negosiasi');
    }

    public function index()
    {
        $majikan  = $this->db->get_where('majikan', ['email_majikan' =>  $this->session->userdata('email_majikan')])->row_array();
        $email_majikan = $majikan['email_majikan'];

        $data = array(
            'title' => 'Negosiasi - Situs Pencari Pembantu Rumah Tangga',
            'majikan' => $this->db->get_where('majikan', ['email_majikan' =>  $this->session->userdata('email_majikan')])->row_array(),
            'negosiasi' => $this->Model_negosiasi->get_negosiasi($email_majikan)
        );

        $this->load->view('majikan/header', $data);
        $this->load->view('majikan/negosiasi', $data);
        $this->load->view('majikan/footer');
    }

    public function pesan_negosiasi()
    {
        date_default_timezone_set("Asia/Jakarta");
        $kd_pembantu = $this->input->post('kd_pembantu');
        $nama_pembantu = $this->input->post('nama_pembantu');
        $kd_majikan = $this->input->post('kd_majikan');
        $biaya_admin = $this->input->post('biaya_admin');
        $total = $biaya_admin + $this->input->post('gaji');
        $status_negosiasi = $this->input->post('status_negosiasi');
        $tanggal_negosiasi = date('Y-m-d');

        $this->Model_negosiasi->negosiasi($kd_pembantu, $kd_majikan, $biaya_admin, $total, $status_negosiasi, $tanggal_negosiasi);
        $this->session->set_flashdata('success', 'Negosiasi berhasil. Menunggu negosiasi <b>diterima</b> oleh <b>' . $nama_pembantu . '</b>.');
        redirect(base_url('negosiasi'));
    }
}
