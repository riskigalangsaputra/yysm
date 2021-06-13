<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('text');

        $this->load->model('Model_pengunjung');
    }

    function index()
    {
        $this->form_validation->set_rules('email_majikan', 'Email', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        $this->form_validation->set_message('required', 'Kolom {field} harus diisi!');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Parete - Login';
            $this->load->view('majikan/login', $data);
        } else {
            //validasi login sukses
            $this->masuk();
        }
    }

    private function masuk()
    {
        $email_majikan = $this->input->post('email_majikan');
        $password = $this->input->post('password');

        $majikan = $this->db->get_where('majikan', array('email_majikan' => $email_majikan))->row_array();

        // jika majikan ada didatabase
        if ($majikan) {
            // jika majikan aktif
            if ($majikan['status'] == 'Terverifikasi') {
                // cek password
                if (password_verify($password, $majikan['password'])) {
                    $data = [
                        'email_majikan' => $majikan['email_majikan']
                    ];
                    // menyimpan data session
                    $this->session->set_userdata($data);

                    $kd_majikan = $majikan['kd_majikan'];
                    $this->Model_pengunjung->count_visitor($kd_majikan);

                    // Memanggil Halaman sesuai dengan role atau level majikannya
                    if ($majikan['status'] == 'Terverifikasi') {
                        redirect(base_url());
                    }
                } else {
                    // Alert untuk Jika memasukan passwor salah atau kurang
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kata sandi salah! </div>');
                    redirect(base_url('login'));
                }
            } else {
                // Alert untuk Jika email yg dimasukan status email tidak aktif
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email ini belum diaktifkan! </div>');
                redirect(base_url('login'));
            }
        } else {
            // jika majikan tidak ada di database
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email tidak terdaftar!</div>');
            redirect(base_url('login'));
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        $this->session->set_flashdata('message', '<div class="alert alert-success"
            role="alert">Anda telah berhasil keluar!</div>');
        redirect(base_url());
    }
}
