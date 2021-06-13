<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    function index()
    {
        $this->form_validation->set_rules('username_pembantu', 'Username Pembantu', 'required|trim');
        $this->form_validation->set_rules('password', 'Kata Sandi', 'required|trim');
        $this->form_validation->set_message('required', 'Kolom {field} harus diisi!');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Login Pembantu';
            $this->load->view('pembantu/login', $data);
        } else {
            //validasi login sukses
            $this->_login();
        }
    }

    private function _login()
    {
        $username = $this->input->post();
        $password = $this->input->post('password');

        $this->db->where('email_pembantu', $username['username_pembantu'])->or_where('username_pembantu', $username['username_pembantu']);
        $pembantu = $this->db->get('pembantu')->row_array();

        //JIka usernya ada
        if ($pembantu) {
            //Jika usernya statusnya aktif
            if ($pembantu['status_pembantu'] == 'Terverifikasi') {
                //CEK PASSWORD
                if (password_verify($password, $pembantu['password'])) {
                    $data = [
                        'email_pembantu' => $pembantu['email_pembantu'],
                    ];

                    //MENYIMPAN DATA SESSION
                    $this->session->set_userdata($data);

                    $this->session->set_flashdata('success', 'Selamat Datang, <b>' . $pembantu['nama_pembantu'] . '</b>');
                    redirect(base_url('dashboard-pembantu'));
                } else {
                    // Alert untuk Jika memasukan password salah atau kurang
                    $this->session->set_flashdata('message', '<div class="alert alert-danger"
                    role="alert">Password salah!</div>');
                    redirect(base_url('login-pembantu'));
                }
            } else {
                // Alert untuk Jika username_pembantu yg dimasukan status username_pembantu tidak aktif
                $this->session->set_flashdata('message', '<div class="alert alert-danger"
                 role="alert">Akun ini belum diaktifkan!</div>');
                redirect(base_url('login-pembantu'));
            }
        } else {
            // jika user tidak ada di database
            $this->session->set_flashdata('message', '<div class="alert alert-danger"
            role="alert">Akun ini belum terdaftar!</div>');
            redirect(base_url('login-pembantu'));
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        $this->session->set_flashdata('message', '<div class="alert alert-success"
            role="alert">Anda telah berhasil keluar!</div>');
        redirect(base_url('login-pembantu'));
    }

    public function ubah_password()
    {
        $data = array(
            'pembantu'     => $this->db->get_where('pembantu', ['email_pembantu' =>  $this->session->userdata('email_pembantu')])->row_array(),
        );

        $this->form_validation->set_rules('passwordsekarang', 'Password Saat Ini', 'required|trim');
        $this->form_validation->set_rules('password1', 'Password Baru', 'required|trim|min_length[6]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Konfirmasi  Password', 'required|trim|min_length[6]|matches[password1]');

        $this->form_validation->set_message('required', 'Kolom {field} harus diisi!');
        $this->form_validation->set_message('min_length', 'Kolom {field} harus lebih dari {param} karakter!');
        $this->form_validation->set_message('matches', '{field} harus sama!');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', 'Gagal ubah password. Pastikan password tidak kurang dari 6 digit dan konfirmasi password harus sama dengan password baru!');
            redirect(base_url('dashboard-pembantu'));
        } else {
            $password_sekarang = $this->input->post('passwordsekarang');
            $password_baru = $this->input->post('password1');

            // Cek Password sekarang apakah sama
            if (!password_verify($password_sekarang, $data['pembantu']['password'])) {
                $this->session->set_flashdata('error', 'Password sekarang salah!');
                redirect(base_url('dashboard-pembantu'));
            } else {
                // Salah apabila password baru sama dengan password saat ini
                if ($password_sekarang == $password_baru) {
                    $this->session->set_flashdata('error', 'Password baru tidak boleh sama dengan Password sebelumnya!');
                    redirect(base_url('dashboard-pembantu'));
                } else {
                    // Apabila password baru berbeda dari password saat ini (password ok)
                    $password_hash = password_hash($password_baru, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email_pembantu', $this->session->userdata('email_pembantu'));
                    $this->db->update('pembantu');

                    $this->session->set_flashdata('success', 'Password berhasil diperbarui');
                    redirect(base_url('login-pembantu'));
                }
            }
        }
    }
}
