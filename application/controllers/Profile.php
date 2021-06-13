<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{

    function __construct()
    {
        // Fungsi untuk menghindari pengguna yg belum login
        parent::__construct();
        if (!$this->session->userdata('email_majikan')) {
            redirect(base_url('login'));
        }

        $this->load->library('upload');
        // $this->load->model('majikan/Model_profile');
    }

    public function index()
    {
        $data = array(
            'title' => 'Profile - Situs Pencari Pembantu Rumah Tangga',
            'majikan' => $this->db->get_where('majikan', ['email_majikan' =>  $this->session->userdata('email_majikan')])->row_array(),
        );

        $this->load->view('majikan/header', $data);
        $this->load->view('majikan/profile', $data);
        $this->load->view('majikan/footer');
    }

    public function update()
    {
        $data = array(
            'title' => 'Profile - Situs Pencari Pembantu Rumah Tangga',
            'majikan' => $this->db->get_where('majikan', ['email_majikan' =>  $this->session->userdata('email_majikan')])->row_array(),
        );

        $this->form_validation->set_rules('nama_majikan', 'Nama Lengkap', 'trim|required|max_length[100]');
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('telepon', 'Telepon', 'trim|required|max_length[16]');
        $this->form_validation->set_rules('alamat_majikan', 'Alamat', 'trim|required');
        $this->form_validation->set_rules('password1', 'Password Baru', 'trim|min_length[6]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Konfirmasi  Password', 'trim|min_length[6]|matches[password1]');

        $this->form_validation->set_message('required', 'Kolom {field} harus diisi!');
        $this->form_validation->set_message('max_length', 'Kolom {field} harus kurang dari {param} karakter!');
        $this->form_validation->set_message('matches', '{field} harus sama!');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('majikan/header', $data);
            $this->load->view('majikan/profile', $data);
            $this->load->view('majikan/footer');
        } else {
            $nama_majikan = $this->input->post('nama_majikan');
            $username = $this->input->post('username');
            $email_majikan = $this->input->post('email_majikan');
            $password   = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $alamat_majikan = $this->input->post('alamat_majikan');
            $telepon = $this->input->post('telepon');

            $this->db->set('nama_majikan', $nama_majikan);
            $this->db->set('username', $username);
            $this->db->set('telepon', $telepon);
            $this->db->set('alamat_majikan', $alamat_majikan);
            $this->db->set('password', $password);
            $this->db->where('email_majikan', $email_majikan);
            $this->db->update('majikan');

            $this->session->set_flashdata('success', 'Profile <b>' . $nama_majikan . '</b> berhasil diperbarui! ');
            redirect(base_url('profile'));
        }
    }

    public function update_foto()
    {
        $data = array(
            'title' => 'Profile - Situs Pencari Pembantu Rumah Tangga',
            'majikan' => $this->db->get_where('majikan', ['email_majikan' =>  $this->session->userdata('email_majikan')])->row_array(),
        );

        $config['upload_path']      = './assets/uploads/majikan/'; //path folder
        $config['allowed_types']   = 'jpg|png|jpeg'; //type yang dapat diakses bisa anda sesuaikan
        $config['file_name']          = 'foto_majikan ';  //nama yang terupload nantinya
        $config['remove_spaces']   = TRUE;

        $this->upload->initialize($config);
        if (!empty($_FILES['foto_majikan']['name'])) {
            if ($this->upload->do_upload('foto_majikan')) {
                $image = $this->upload->data();
                $config['source_image']     = './assets/uploads/majikan/' . $image['file_name'];
                $config['quality']                = '60%';
                $config['new_image']         =  './assets/uploads/majikan/' . $image['file_name'];

                $this->load->library('upload', $config);

                $nama_majikan = $this->input->post('nama_majikan');
                $email_majikan = $this->input->post('email_majikan');
                $foto_majikan     = $image['file_name'];

                $this->db->set('foto_majikan', $foto_majikan);
                $this->db->where('email_majikan', $email_majikan);
                $this->db->update('majikan');
                $this->session->set_flashdata('success', 'Upload foto <b>' . $nama_majikan . '</b> berhasil diperbarui');
                redirect(base_url('profile'));
            } else {
                $this->session->set_flashdata('error', 'Gagal update foto. Pastikan mengunggah file image format jpg, png atau jpeg!');
                redirect(base_url('profile'));
            }
        } else {
            $this->session->set_flashdata('warning', 'Anda harus mengunggah file jpg, jpeg atau png!');
            redirect(base_url('profile'));
        }
    }
}
