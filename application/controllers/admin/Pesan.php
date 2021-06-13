<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesan extends CI_Controller
{

    public function __construct()
    {
        // Fungsi untuk menghindari user melakukan akses ke halaman admin
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect(base_url('login-admin'));
        }

        $this->load->library('upload');
        $this->load->model('admin/Model_pesan');
    }

    public function index()
    {
        $data = array(
            'title'               => 'Pesan',
            'user'               => $this->db->get_where('user', ['email' =>  $this->session->userdata('email')])->row_array(),
            'pesan'           => $this->Model_pesan->read()
        );

        $this->load->view('admin/header', $data);
        $this->load->view('admin/pesan', $data);
        $this->load->view('admin/footer');
    }

    public function hapus()
    {
        $data = array(
            'title'               => 'Pesan',
            'user'               => $this->db->get_where('user', ['email' =>  $this->session->userdata('email')])->row_array(),
            'pesan'           => $this->Model_pesan->read()
        );

        $kode = $this->input->post('kode');
        $nama = $this->input->post('nama');
        $this->Model_pesan->hapus($kode);
        $this->session->set_flashdata('success', 'Berhasil menghapus pesan dari majikan <b>' . $nama . '</b>.');

        $this->load->view('admin/header', $data);
        $this->load->view('admin/pesan', $data);
        $this->load->view('admin/footer');
    }
}
