<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Majikan extends CI_Controller
{

    public function __construct()
    {
        // Fungsi untuk menghindari user melakukan akses ke halaman admin
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect(base_url('login-admin'));
        }

        $this->load->library('upload');
        $this->load->model('admin/Model_majikan');
    }

    public function index()
    {
        $data = array(
            'title'               => 'Majikan',
            'user'               => $this->db->get_where('user', ['email' =>  $this->session->userdata('email')])->row_array(),
            'majikan'           => $this->Model_majikan->read()
        );

        $this->load->view('admin/header', $data);
        $this->load->view('admin/majikan', $data);
        $this->load->view('admin/footer');
    }

    public function verifikasi()
    {
        $kode = $this->uri->segment(4);
        $data['verifikasi'] = $this->db->query("SELECT * FROM majikan WHERE kd_majikan='$kode'");
        $this->db->query("UPDATE majikan SET status='Terverifikasi' WHERE kd_majikan='$kode'");

        $user  = $this->db->get_where('user', ['email' =>  $this->session->userdata('email')])->row_array();
        $kd_user    = $user['kd_user'];
        $this->db->query("UPDATE majikan SET kd_user='$kd_user' WHERE kd_majikan='$kode'");

        $this->session->set_flashdata('success', 'Majikan berhasil terverifikasi');
        redirect(base_url('admin/majikan'));
    }

    public function hapus()
    {
        $kode = $this->input->post('kode');
        $nama = $this->input->post('nama');
        $foto = $this->input->post('foto');
        $path = './assets/uploads/majikan/' . $foto;
        unlink($path);
        $this->Model_majikan->hapus($kode);
        $this->session->set_flashdata('success', 'Majikan <b>' . $nama . '</b> berhasil dihapus');
        redirect(base_url('daftar-majikan'));
    }
}
