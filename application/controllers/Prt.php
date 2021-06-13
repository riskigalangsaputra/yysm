<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Prt extends CI_Controller
{

    function __construct()
    {
        // Fungsi untuk menghindari pengguna yg belum login
        parent::__construct();

        $this->load->helper('text');
        $this->load->model('majikan/Model_prt');
    }

    public function index()
    {
        $data = array(
            'title' => 'Pembantu - Situs Pencari Pembantu Rumah Tangga',
            'majikan' => $this->db->get_where('majikan', ['email_majikan' =>  $this->session->userdata('email_majikan')])->row_array(),
        );

        $this->load->view('majikan/header', $data);
        $this->load->view('majikan/pembantu', $data);
        $this->load->view('majikan/footer');
    }

    public function detail()
    {
        $kode = $this->uri->segment(3);
        $data = array(
            'title' => 'Detail - Situs Pencari Pembantu Rumah Tangga',
            'majikan' => $this->db->get_where('majikan', ['email_majikan' =>  $this->session->userdata('email_majikan')])->row_array(),
            'show_prt'  => $this->Model_prt->get_pembantu(),
            'detail_prt'    => $this->Model_prt->get_detail_pembantu($kode)
        );

        $this->db->query("UPDATE pembantu SET banyak_dilihat=banyak_dilihat+1 WHERE kd_pembantu='$kode'");

        $this->load->view('majikan/header', $data);
        $this->load->view('majikan/pembantu_detail', $data);
        $this->load->view('majikan/footer');
    }
}
