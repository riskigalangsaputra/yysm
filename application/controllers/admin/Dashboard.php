<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        // Fungsi untuk menghindari user melakukan akses ke halaman admin
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect(base_url('login-admin'));
        }

        $this->load->model('admin/Model_dashboard');
    }

    public function index()
    {
        $data = array(
            'title'     => 'Dashboard',
            'user'     => $this->db->get_where('user', ['email' =>  $this->session->userdata('email')])->row_array(),
            'total_pembantu'    => $this->Model_dashboard->get_total_pembantu(),
            'total_majikan' => $this->Model_dashboard->get_total_majikan(),
            'total_user'    => $this->Model_dashboard->get_total_user(),
            'total_negosiasi'   => $this->Model_dashboard->get_total_negosiasi()
        );

        $this->load->view('admin/header', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('admin/footer');
    }
}
