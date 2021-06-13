<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        // Fungsi untuk menghindari user melakukan akses ke halaman admin
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect(base_url('login-admin'));
        }

        $this->load->library('upload');
        $this->load->model('admin/Model_user');
    }

    public function index()
    {
        $data = array(
            'title'               => 'User',
            'user'               => $this->db->get_where('user', ['email' =>  $this->session->userdata('email')])->row_array(),
            'pengguna'           => $this->Model_user->read()
        );

        $this->load->view('admin/header', $data);
        $this->load->view('admin/user', $data);
        $this->load->view('admin/footer');
    }

    public function tambah()
    {
        $data = array(
            'title'               => 'Tambah User',
            'user'               => $this->db->get_where('user', ['email' =>  $this->session->userdata('email')])->row_array(),
        );

        $this->load->view('admin/header', $data);
        $this->load->view('admin/user_tambah', $data);
        $this->load->view('admin/footer');
    }

    public function simpan()
    {
        $data = array(
            'title'               => 'Tambah User',
            'user'              => $this->db->get_where('user', ['email' =>  $this->session->userdata('email')])->row_array(),
        );

        $this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[user.username]');
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'trim|required|max_length[100]|is_unique[user.nama_lengkap]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'trim|required|in_list[Laki-Laki,Perempuan]');
        $this->form_validation->set_rules('telepon', 'Telepon', 'trim|required|integer|max_length[14]|is_unique[user.telepon]');
        $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[6]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Konfirmasi Password', 'trim|required|matches[password1]');
        $this->form_validation->set_message('is_unique', '{field} sudah ada!');
        $this->form_validation->set_message('required', 'Kolom {field} harus diisi!');
        $this->form_validation->set_message('valid_email', 'Email yang diinput harus valid!');
        $this->form_validation->set_message('min_length', 'Kolom {field} harus lebih dari {param} karakter!');
        $this->form_validation->set_message('in_list', 'Kolom {field} harus diisi dengan {param}');
        $this->form_validation->set_message('max_length', 'Kolom {field} harus kurang dari {param} karakter!');
        $this->form_validation->set_message('integer', 'Kolom {field} harus berupa angka!');
        $this->form_validation->set_message('matches', '{field} harus sama dengan konfirmasi password!');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/header', $data);
            $this->load->view('admin/user_tambah', $data);
            $this->load->view('admin/footer');
        } else {
            $config['upload_path']      = './assets/uploads/user/'; //path folder
            $config['allowed_types']   = 'jpg|png|jpeg'; //type yang dapat diakses bisa anda sesuaikan
            $config['file_name']          = 'user ';  //nama yang terupload nantinya
            $config['remove_spaces']   = TRUE;

            $this->upload->initialize($config);
            if (!empty($_FILES['gambar']['name'])) {
                if ($this->upload->do_upload('gambar')) {
                    $image = $this->upload->data();

                    $config['source_image']     = './assets/uploads/user/' . $image['file_name'];
                    $config['quality']                = '60%';
                    $config['new_image']         =  './assets/uploads/user/' . $image['file_name'];

                    $this->load->library('upload', $config);

                    $username           = strip_tags(htmlspecialchars($this->input->post('username', TRUE), ENT_QUOTES));
                    $nama_lengkap   = strip_tags(htmlspecialchars($this->input->post('nama_lengkap', TRUE), ENT_QUOTES));
                    $email                 = strip_tags(htmlspecialchars($this->input->post('email', TRUE), ENT_QUOTES));
                    $jenis_kelamin   = strip_tags(htmlspecialchars($this->input->post('jenis_kelamin', TRUE), ENT_QUOTES));
                    $telepon              = strip_tags(htmlspecialchars($this->input->post('telepon', TRUE), ENT_QUOTES));
                    $gambar                = $image['file_name'];
                    $password          = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
                    $status                = 'Aktif';

                    $this->Model_user->simpan($username, $nama_lengkap, $email, $jenis_kelamin, $telepon, $gambar, $password, $status);
                    $this->session->set_flashdata('success', 'User <b>' . $this->input->post('nama_lengkap') . '</b> berhasil ditambahkan');
                    redirect(base_url('admin/user'));
                } else {
                    $this->session->set_flashdata('error', 'User gagal ditambahkan. Pastikan mengunggah file image format jpg, png atau jpeg!');
                    redirect(base_url('admin/user'));
                }
            } else {
                $this->session->set_flashdata('warning', 'Anda harus mengunggah file jpg, jpeg atau png!');
                redirect(base_url('admin/user'));
            }
        }
    }

    public function edit()
    {
        $kode = $this->uri->segment(4);
        $data = array(
            'title'               => 'Edit User',
            'user'               => $this->db->get_where('user', ['email' =>  $this->session->userdata('email')])->row_array(),
            'pengguna'      => $this->Model_user->get_user($kode)
        );

        $this->load->view('admin/header', $data);
        $this->load->view('admin/user_edit', $data);
        $this->load->view('admin/footer');
    }

    public function update()
    {
        $kode = $this->uri->segment(4);
        $data = array(
            'title'               => 'Edit User',
            'user'               => $this->db->get_where('user', ['email' =>  $this->session->userdata('email')])->row_array(),
            'pengguna'      => $this->Model_user->get_user($kode)
        );

        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'trim|required|max_length[100]');
        $this->form_validation->set_rules('telepon', 'Telepon', 'trim|required|max_length[16]');
        $this->form_validation->set_message('required', 'Kolom {field} harus diisi!');
        $this->form_validation->set_message('in_list', 'Kolom {field} harus diisi dengan {param}');
        $this->form_validation->set_message('max_length', 'Kolom {field} harus kurang dari {param} karakter!');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/header', $data);
            $this->load->view('admin/user_tambah', $data);
            $this->load->view('admin/footer');
        } else {
            $config['upload_path']      = './assets/uploads/user/'; //path folder
            $config['allowed_types']   = 'jpg|png|jpeg'; //type yang dapat diakses bisa anda sesuaikan
            $config['file_name']          = 'user ';  //nama yang terupload nantinya
            $config['remove_spaces']   = TRUE;

            $this->upload->initialize($config);
            if (!empty($_FILES['gambar']['name'])) {
                if ($this->upload->do_upload('gambar')) {
                    $image = $this->upload->data();

                    $config['source_image']     = './assets/uploads/user/' . $image['file_name'];
                    $config['quality']                = '60%';
                    $config['new_image']         =  './assets/uploads/user/' . $image['file_name'];

                    $this->load->library('upload', $config);

                    $kode                   = $this->input->post('kode');
                    $username           = strip_tags(htmlspecialchars($this->input->post('username', TRUE), ENT_QUOTES));
                    $nama_lengkap   = strip_tags(htmlspecialchars($this->input->post('nama_lengkap', TRUE), ENT_QUOTES));
                    $jenis_kelamin   = strip_tags(htmlspecialchars($this->input->post('jenis_kelamin', TRUE), ENT_QUOTES));
                    $telepon              = strip_tags(htmlspecialchars($this->input->post('telepon', TRUE), ENT_QUOTES));
                    $gambar                = $image['file_name'];
                    $status                = strip_tags(htmlspecialchars($this->input->post('status', TRUE), ENT_QUOTES));

                    $this->Model_user->update($kode, $username, $nama_lengkap, $jenis_kelamin, $telepon, $gambar, $status);
                    $this->session->set_flashdata('success', 'User <b>' . $this->input->post('nama_lengkap') . '</b> berhasil diperbarui');
                    redirect(base_url('admin/user'));
                } else {
                    $this->session->set_flashdata('error', 'User gagal diperbarui. Pastikan mengunggah file image format jpg, png atau jpeg!');
                    redirect(base_url('admin/user'));
                }
            } else {
                $kode                   = $this->input->post('kode');
                $username           = strip_tags(htmlspecialchars($this->input->post('username', TRUE), ENT_QUOTES));
                $nama_lengkap   = strip_tags(htmlspecialchars($this->input->post('nama_lengkap', TRUE), ENT_QUOTES));
                $jenis_kelamin   = strip_tags(htmlspecialchars($this->input->post('jenis_kelamin', TRUE), ENT_QUOTES));
                $telepon              = strip_tags(htmlspecialchars($this->input->post('telepon', TRUE), ENT_QUOTES));
                $status                = strip_tags(htmlspecialchars($this->input->post('status', TRUE), ENT_QUOTES));

                $this->Model_user->update_no_image($kode, $username, $nama_lengkap, $jenis_kelamin, $telepon, $status);
                $this->session->set_flashdata('success', 'User <b>' . $this->input->post('nama_lengkap') . '</b> berhasil diperbarui');
                redirect(base_url('admin/user'));
            }
        }
    }

    public function hapus()
    {
        $kode = $this->input->post('kode');
        $nama = $this->input->post('nama');
        $gambar = $this->input->post('gambar');
        $path = './assets/uploads/user/' . $gambar;
        unlink($path);
        $this->Model_user->hapus($kode);
        $this->session->set_flashdata('success', 'User <b>' . $nama . '</b> berhasil dihapus');
        redirect(base_url('admin/user'));
    }

    public function ubahPassword()
    {
        $data = array(
            'user'               => $this->db->get_where('user', ['email' =>  $this->session->userdata('email')])->row_array(),
        );

        $this->form_validation->set_rules('passwordsekarang', 'Password Saat Ini', 'required|trim');
        $this->form_validation->set_rules('password1', 'Password Baru', 'required|trim|min_length[6]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Konfirmasi  Password', 'required|trim|min_length[6]|matches[password1]');

        $this->form_validation->set_message('required', 'Kolom {field} harus diisi!');
        $this->form_validation->set_message('min_length', 'Kolom {field} harus lebih dari {param} karakter!');
        $this->form_validation->set_message('matches', '{field} harus sama!');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', 'Gagal ubah password. Pastikan password tidak kurang dari 6 digit dan konfirmasi password harus sama dengan password baru!');
            redirect(base_url('dashboard'));
        } else {
            $password_sekarang = $this->input->post('passwordsekarang');
            $password_baru = $this->input->post('password1');

            // Cek Password sekarang apakah sama
            if (!password_verify($password_sekarang, $data['user']['password'])) {
                $this->session->set_flashdata('error', 'Password sekarang salah!');
                redirect(base_url('dashboard'));
            } else {
                // Salah apabila password baru sama dengan password saat ini
                if ($password_sekarang == $password_baru) {
                    $this->session->set_flashdata('error', 'Password baru tidak boleh sama dengan Password sebelumnya!');
                    redirect(base_url('dashboard'));
                } else {
                    // Apabila password baru berbeda dari password saat ini (password ok)
                    $password_hash = password_hash($password_baru, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('success', 'Password <b>' . $this->input->post('email') . '</b> berhasil diperbarui');
                    redirect(base_url('login-admin'));
                }
            }
        }
    }
}
