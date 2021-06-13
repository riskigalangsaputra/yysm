<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesan extends CI_Controller
{

    function __construct()
    {
        // Fungsi untuk menghindari pengguna yg belum login
        parent::__construct();
        if (!$this->session->userdata('email_majikan')) {
            redirect(base_url('login'));
        }

        $this->load->helper('text');
        $this->load->model('majikan/Model_pesan');
    }

    public function index()
    {
        $data = array(
            'title' => 'Pesan - Situs Pencari Pembantu Rumah Tangga',
            'majikan' => $this->db->get_where('majikan', ['email_majikan' =>  $this->session->userdata('email_majikan')])->row_array(),
        );

        $this->load->view('majikan/header', $data);
        $this->load->view('majikan/pesan', $data);
        $this->load->view('majikan/footer');
    }

    public function kirim()
    {
        $majikan = $this->db->get_where('majikan', ['email_majikan' =>  $this->session->userdata('email_majikan')])->row_array();
        $kd_majikan = $majikan['kd_majikan'];
        $subjek = $this->input->post('subjek');
        $pesan = $this->input->post('pesan');

        $this->Model_pesan->kirim($kd_majikan, $subjek, $pesan);
        $this->session->set_flashdata('success', 'Pesan Anda berhasil dikirm');
        redirect(base_url());
    }
}
