<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        // Fungsi untuk menghindari user melakukan akses ke halaman pembantu
        parent::__construct();
        if (!$this->session->userdata('email_pembantu')) {
            redirect(base_url('login-pembantu'));
        }

        $this->load->model('pembantu/Model_dashboard');
    }

    public function index()
    {
        $pembantu  = $this->db->get_where('pembantu', ['email_pembantu' =>  $this->session->userdata('email_pembantu')])->row_array();
        $kd_pembantu = $pembantu['kd_pembantu'];

        $data = array(
            'title'     => 'Dashboard Pembantu',
            'pembantu'     => $this->db->get_where('pembantu', ['email_pembantu' =>  $this->session->userdata('email_pembantu')])->row_array(),
            'total_negosiasi'   => $this->Model_dashboard->get_total_negosiasi($kd_pembantu),
            'total_kontrak'   => $this->Model_dashboard->get_total_kontrak($kd_pembantu),
            'total_pembayaran'   => $this->Model_dashboard->get_total_pembayaran($kd_pembantu),
        );

        $this->load->view('pembantu/header', $data);
        $this->load->view('pembantu/dashboard', $data);
        $this->load->view('pembantu/footer');
    }
}
