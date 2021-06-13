<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kontrak extends CI_Controller
{

    public function __construct()
    {
        // Fungsi untuk menghindari user melakukan akses ke halaman pembantu
        parent::__construct();
        if (!$this->session->userdata('email_pembantu')) {
            redirect(base_url('login-pembantu'));
        }

        $this->load->model('pembantu/Model_kontrak');
    }

    public function index()
    {
        $pembantu  = $this->db->get_where('pembantu', ['email_pembantu' =>  $this->session->userdata('email_pembantu')])->row_array();
        $email_pembantu = $pembantu['email_pembantu'];

        $data = array(
            'title'               => 'Kontrak',
            'pembantu'     => $this->db->get_where('pembantu', ['email_pembantu' =>  $this->session->userdata('email_pembantu')])->row_array(),
            'kontrak'           => $this->Model_kontrak->read($email_pembantu)
        );

        $this->load->view('pembantu/header', $data);
        $this->load->view('pembantu/kontrak', $data);
        $this->load->view('pembantu/footer');
    }
}
