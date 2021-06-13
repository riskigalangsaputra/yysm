<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Daftar extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->library('upload');
        $this->load->model('majikan/Model_daftar');
    }


    public function index()
    {
        $data['title'] = 'Parete - Daftar';
        $this->load->view('majikan/daftar', $data);
    }

    public function simpan()
    {
        $data = array(
            'title'               => 'Parete - Daftar',
        );

        $this->form_validation->set_rules('nik', 'NIK', 'trim|required|max_length[16]|is_unique[majikan.nik]');
        $this->form_validation->set_rules('nama_majikan', 'Nama Majikan', 'trim|required|is_unique[majikan.nama_majikan]');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[majikan.username]');
        $this->form_validation->set_rules('email_majikan', 'Email', 'trim|required|valid_email|is_unique[majikan.email_majikan]');
        $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[6]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Konfirmasi Password', 'trim|required|matches[password1]');
        $this->form_validation->set_rules('alamat_majikan', 'Alamat Majikan', 'trim|required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'trim|required|in_list[Laki-Laki,Perempuan]');
        $this->form_validation->set_rules('telepon', 'Telepon', 'trim|required|is_unique[majikan.telepon]');

        $this->form_validation->set_message('is_unique', '{field} sudah ada!');
        $this->form_validation->set_message('required', 'Kolom {field} harus diisi!');
        $this->form_validation->set_message('valid_email', 'Email yang diinput harus valid!');
        $this->form_validation->set_message('matches', '{field} harus sama dengan konfirmasi password!');
        $this->form_validation->set_message('min_length', 'Kolom {field} harus lebih dari {param} karakter!');
        $this->form_validation->set_message('in_list', 'Kolom {field} harus diisi dengan {param}');
        $this->form_validation->set_message('max_length', 'Kolom {field} tidak lebih dari {param} digit!');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('majikan/daftar', $data);
        } else {
            $config['upload_path']      = './assets/uploads/majikan/'; //path folder
            $config['allowed_types']   = 'jpg|png|jpeg'; //type yang dapat diakses bisa anda sesuaikan
            $config['remove_spaces']   = TRUE;

            $this->upload->initialize($config);

            if (!empty($_FILES['foto_majikan']['name']) || !empty($_FILES['foto_ktp']['name']) || !empty($_FILES['foto_kk']['name'])) {
                if ($this->upload->do_upload('foto_majikan')) {
                    $fileData = $this->upload->data();
                    $data['foto_majikan'] = $fileData['file_name'];
                } else {
                    $this->session->set_flashdata('error', 'Gagal upload foto Majikan. Pastikan mengunggah file image format jpg, png atau jpeg!');
                    redirect(base_url('pembantu/daftar'));
                }

                if ($this->upload->do_upload('foto_ktp')) {
                    $fileData = $this->upload->data();
                    $data['foto_ktp'] = $fileData['file_name'];
                } else {
                    $this->session->set_flashdata('error', 'Gagal upload foto KTP. Pastikan mengunggah file image format jpg, png atau jpeg!');
                    redirect(base_url('pembantu/daftar'));
                }

                if ($this->upload->do_upload('foto_kk')) {
                    $fileData = $this->upload->data();
                    $data['foto_kk'] = $fileData['file_name'];
                } else {
                    $this->session->set_flashdata('error', 'Gagal upload foto KK. Pastikan mengunggah file image format jpg, png atau jpeg!');
                    redirect(base_url('pembantu/daftar'));
                }

                $foto_majikan     = $data['foto_majikan'];
                $foto_ktp               = $data['foto_ktp'];
                $foto_kk          = $data['foto_kk'];

                $nik = $this->input->post('nik');
                $nama_majikan = $this->input->post('nama_majikan');
                $username = $this->input->post('username');
                $email_majikan = $this->input->post('email_majikan');
                $password   = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
                $alamat_majikan = $this->input->post('alamat_majikan');
                $jenis_kelamin = $this->input->post('jenis_kelamin');
                $telepon = $this->input->post('telepon');
                $status = 'Belum Terverifikasi';

                $this->Model_daftar->daftar($nik, $nama_majikan, $username, $email_majikan, $password, $alamat_majikan, $jenis_kelamin, $telepon, $foto_majikan, $foto_ktp, $foto_kk, $status);
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Akun <b>' . $nama_majikan . '</b> berhasil dibuat </div>');
                redirect(base_url('login'));
            } else {
                $this->session->set_flashdata('warning', 'Anda harus mengunggah foto dengan format jpg, jpeg atau png!');
                redirect(base_url('daftar'));
            }
        }
    }
}
