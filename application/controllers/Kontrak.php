<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kontrak extends CI_Controller
{

    function __construct()
    {
        // Fungsi untuk menghindari pengguna yg belum login
        parent::__construct();
        if (!$this->session->userdata('email_majikan')) {
            redirect(base_url('login'));
        }

        $this->load->helper('text');
        $this->load->model('majikan/Model_kontrak');
    }

    public function index()
    {
        $majikan  = $this->db->get_where('majikan', ['email_majikan' =>  $this->session->userdata('email_majikan')])->row_array();
        $email_majikan = $majikan['email_majikan'];

        $data = array(
            'title' => 'Kontrak - Situs Pencari Pembantu Rumah Tangga',
            'majikan' => $this->db->get_where('majikan', ['email_majikan' =>  $this->session->userdata('email_majikan')])->row_array(),
            'kontrak' => $this->Model_kontrak->get_kontrak($email_majikan)
        );

        $this->load->view('majikan/header', $data);
        $this->load->view('majikan/kontrak', $data);
        $this->load->view('majikan/footer');
    }

    public function batal()
    {
        $data = array(
            'title' => 'Kontrak - Situs Pencari Pembantu Rumah Tangga',
            'majikan' => $this->db->get_where('majikan', ['email_majikan' =>  $this->session->userdata('email_majikan')])->row_array(),
        );

        $kode = $this->input->post('kode');
        $nama = $this->input->post('nama');
        $status = $this->input->post('status');
        $this->Model_kontrak->batal($kode, $status);
        $this->session->set_flashdata('success', 'Berhasil membatalkan kontrak dengan pembantu <b>' . $nama . '</b>.');
        redirect(base_url('kontrak'));

        $this->load->view('majikan/header', $data);
        $this->load->view('majikan/kontrak', $data);
        $this->load->view('majikan/footer');
    }
}
