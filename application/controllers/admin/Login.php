<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Kata Sandi', 'required|trim');
        $this->form_validation->set_message('required', 'Kolom {field} harus diisi!');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Parete - Login';
            $this->load->view('admin/login', $data);
        } else {
            //validasi login sukses
            $this->_login();
        }
    }

    private function _login()
    {
        $username = $this->input->post();
        $password = $this->input->post('password');

        $this->db->where('email', $username['username'])->or_where('username', $username['username']);
        $user = $this->db->get('user')->row_array();

        //JIka usernya ada
        if ($user) {
            //Jika usernya statusnya aktif
            if ($user['status'] == 'Aktif') {
                //CEK PASSWORD
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                    ];

                    //MENYIMPAN DATA SESSION
                    $this->session->set_userdata($data);

                    $this->session->set_flashdata('success', 'Selamat Datang, <b>' . $user['nama_lengkap'] . '</b>');
                    redirect(base_url('dashboard'));
                } else {
                    // Alert untuk Jika memasukan password salah atau kurang
                    $this->session->set_flashdata('message', '<div class="alert alert-danger"
                    role="alert">Password salah!</div>');
                    redirect(base_url('login-admin'));
                }
            } else {
                // Alert untuk Jika username yg dimasukan status username tidak aktif
                $this->session->set_flashdata('message', '<div class="alert alert-danger"
                 role="alert">Akun ini belum diaktifkan!</div>');
                redirect(base_url('login-admin'));
            }
        } else {
            // jika user tidak ada di database
            $this->session->set_flashdata('message', '<div class="alert alert-danger"
            role="alert">Akun ini belum terdaftar!</div>');
            redirect(base_url('login-admin'));
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        $this->session->set_flashdata('message', '<div class="alert alert-success"
            role="alert">Anda telah berhasil keluar!</div>');
        redirect(base_url('login-admin'));
    }
}
