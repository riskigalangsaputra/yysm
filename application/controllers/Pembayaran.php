<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran extends CI_Controller
{

    function __construct()
    {
        // Fungsi untuk menghindari pengguna yg belum login
        parent::__construct();
        if (!$this->session->userdata('email_majikan')) {
            redirect(base_url('login'));
        }

        $this->load->library('upload');
        $this->load->model('majikan/Model_pembayaran');
    }

    public function index()
    {
        $majikan  = $this->db->get_where('majikan', ['email_majikan' =>  $this->session->userdata('email_majikan')])->row_array();
        $email_majikan = $majikan['email_majikan'];

        $data = array(
            'title' => 'Pembayaran - Situs Pencari Pembantu Rumah Tangga',
            'majikan' => $this->db->get_where('majikan', ['email_majikan' =>  $this->session->userdata('email_majikan')])->row_array(),
            'pembayaran' => $this->Model_pembayaran->get_pembayaran($email_majikan)
        );

        $this->load->view('majikan/header', $data);
        $this->load->view('majikan/pembayaran', $data);
        $this->load->view('majikan/footer');
    }

    public function tambah()
    {
        $majikan  = $this->db->get_where('majikan', ['email_majikan' =>  $this->session->userdata('email_majikan')])->row_array();
        $email_majikan = $majikan['email_majikan'];
        $data = array(
            'title' => 'Tambah Pembayaran - Situs Pencari Pembantu Rumah Tangga',
            'majikan' => $this->db->get_where('majikan', ['email_majikan' =>  $this->session->userdata('email_majikan')])->row_array(),
            'kontrak' => $this->Model_pembayaran->get_kontrak($email_majikan)
        );

        $this->load->view('majikan/header', $data);
        $this->load->view('majikan/pembayaran_tambah', $data);
        $this->load->view('majikan/footer');
    }

    public function simpan()
    {
        $data = array(
            'title' => 'Tambah Pembayaran - Situs Pencari Pembantu Rumah Tangga',
            'majikan' => $this->db->get_where('majikan', ['email_majikan' =>  $this->session->userdata('email_majikan')])->row_array(),
        );

        $this->form_validation->set_rules('jumlah_pembayaran', 'Jumlah Pembayaran', 'trim|required');
        $this->form_validation->set_message('required', 'Kolom {field} harus diisi!');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('majikan/header', $data);
            $this->load->view('majikan/pembayaran_tambah', $data);
            $this->load->view('majikan/footer');
        } else {
            $config['upload_path']      = './assets/uploads/pembayaran/'; //path folder
            $config['allowed_types']   = 'jpg|png|jpeg'; //type yang dapat diakses bisa anda sesuaikan
            $config['file_name']          = 'bukti ';  //nama yang terupload nantinya
            $config['remove_spaces']   = TRUE;

            $this->upload->initialize($config);
            if (!empty($_FILES['bukti']['name'])) {
                if ($this->upload->do_upload('bukti')) {
                    $image = $this->upload->data();
                    $config['source_image']     = './assets/uploads/pembayaran/' . $image['file_name'];
                    $config['quality']                = '60%';
                    $config['new_image']         =  './assets/uploads/pembayaran/' . $image['file_name'];

                    $this->load->library('upload', $config);

                    $bukti_pembayaran   = $image['file_name'];
                    $kd_kontrak = $this->input->post('kd_kontrak');
                    $kd_pembantu = $this->input->post('kd_pembantu');
                    $kd_majikan = $this->input->post('kd_majikan');
                    $diverfikasi = $this->input->post('diverfikasi');
                    $jumlah_pembayaran = $this->input->post('jumlah_pembayaran');
                    $status_pembayaran = $this->input->post('status_pembayaran');

                    $this->Model_pembayaran->simpan($kd_kontrak, $kd_pembantu, $kd_majikan, $bukti_pembayaran, $diverfikasi, $jumlah_pembayaran, $status_pembayaran);
                    $this->session->set_flashdata('success', 'Pembayaran berhasil dikirm');
                    redirect(base_url('pembayaran'));
                } else {
                    $this->session->set_flashdata('error', 'Gagal upload pembayaran. Pastikan mengunggah file image format jpg, png atau jpeg!');
                    redirect(base_url('pembayaran'));
                }
            } else {
                $this->session->set_flashdata('warning', 'Anda harus mengunggah file jpg, jpeg atau png!');
                redirect(base_url('pembayaran'));
            }
        }
    }
}
