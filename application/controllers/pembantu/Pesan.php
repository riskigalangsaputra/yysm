<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesan extends CI_Controller
{

    public function __construct()
    {
        // Fungsi untuk menghindari user melakukan akses ke halaman pembantu
        parent::__construct();
        if (!$this->session->userdata('email_pembantu')) {
            redirect(base_url('login-pembantu'));
        }

        $this->load->model('pembantu/Model_pesan');
    }

    public function index()
    {
        $pembantu  = $this->db->get_where('pembantu', ['email_pembantu' =>  $this->session->userdata('email_pembantu')])->row_array();
        $kd_pembantu = $pembantu['kd_pembantu'];
        $nama_pembantu = $pembantu['nama_pembantu'];
        $email_pembantu = $pembantu['email_pembantu'];

        $data = array(
            'title'               => 'Pesan',
            'pembantu'     => $this->db->get_where('pembantu', ['email_pembantu' =>  $this->session->userdata('email_pembantu')])->row_array(),
            'kd_pembantu'  => $kd_pembantu,
            'nama'  => $nama_pembantu,
            'email'  => $email_pembantu
        );

        $this->load->view('pembantu/header', $data);
        $this->load->view('pembantu/pesan', $data);
        $this->load->view('pembantu/footer');
    }

    public function kirim()
    {
        $pembantu  = $this->db->get_where('pembantu', ['email_pembantu' =>  $this->session->userdata('email_pembantu')])->row_array();
        $kd_pembantu = $pembantu['kd_pembantu'];
        $nama_pembantu = $pembantu['nama_pembantu'];
        $email_pembantu = $pembantu['email_pembantu'];

        $data = array(
            'title'               => 'Pesan',
            'pembantu'     => $this->db->get_where('pembantu', ['email_pembantu' =>  $this->session->userdata('email_pembantu')])->row_array(),
            'kd_pembantu'  => $kd_pembantu,
            'nama'  => $nama_pembantu,
            'email'  => $email_pembantu
        );

        $this->form_validation->set_rules('subjek', 'Subjek', 'trim|required');
        $this->form_validation->set_rules('pesan', 'Isi Pesan', 'trim|required');
        $this->form_validation->set_message('required', 'Kolom {field} harus diisi!');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('pembantu/header', $data);
            $this->load->view('pembantu/pesan', $data);
            $this->load->view('pembantu/footer');

            $this->session->set_flashdata('error', 'Gagal mengirim Pesan!');
            redirect(base_url('hubungi-admin'));
        } else {
            $kode_pembantu = $kd_pembantu;
            $kode_majikan = '0';
            $subjek = htmlspecialchars($this->input->post('subjek', TRUE));
            $status_pesan  = '1';
            $pesan  = htmlspecialchars($this->input->post('pesan', TRUE));

            $this->Model_pesan->kirim($kode_pembantu, $kode_majikan, $subjek, $status_pesan, $pesan);
            $this->session->set_flashdata('success', 'Berhasil menigirim <b>Pesan</b>');
            redirect(base_url('dashboard-pembantu'));
        }
    }
}
