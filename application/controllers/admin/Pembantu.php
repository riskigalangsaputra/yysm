<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembantu extends CI_Controller
{

    public function __construct()
    {
        // Fungsi untuk menghindari user melakukan akses ke halaman admin
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect(base_url('login-admin'));
        }

        $this->load->library('upload');
        $this->load->model('admin/Model_pembantu');
    }

    public function index()
    {
        $data = array(
            'title'               => 'Pembantu',
            'user'               => $this->db->get_where('user', ['email' =>  $this->session->userdata('email')])->row_array(),
            'pembantu'           => $this->Model_pembantu->read()
        );

        $this->load->view('admin/header', $data);
        $this->load->view('admin/pembantu', $data);
        $this->load->view('admin/footer');
    }

    public function tambah()
    {
        $data = array(
            'title'               => 'Tambah Pembantu',
            'user'               => $this->db->get_where('user', ['email' =>  $this->session->userdata('email')])->row_array(),
        );

        $this->load->view('admin/header', $data);
        $this->load->view('admin/pembantu_tambah', $data);
        $this->load->view('admin/footer');
    }

    public function simpan()
    {
        $data = array(
            'title'                => 'Tambah Pembantu',
            'user'                => $this->db->get_where('user', ['email' =>  $this->session->userdata('email')])->row_array(),
        );

        $this->form_validation->set_rules('nik', 'NIK', 'trim|required|is_unique[pembantu.nik]|max_length[16]');
        $this->form_validation->set_rules('username_pembantu', 'Username', 'trim|required|is_unique[pembantu.username_pembantu]');
        $this->form_validation->set_rules('nama_pembantu', 'Nama Lengkap', 'trim|required|is_unique[pembantu.nama_pembantu]');
        $this->form_validation->set_rules('email_pembantu', 'Email', 'trim|required|valid_email|is_unique[pembantu.email_pembantu]');
        $this->form_validation->set_rules('telepon', 'Telepon', 'trim|required|is_unique[pembantu.telepon]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('alamat_pembantu', 'Alamat Lengkap', 'trim|required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'trim|required|in_list[Laki-Laki,Perempuan]');
        $this->form_validation->set_rules('agama', 'Agama', 'trim|required|in_list[Islam,Kristen,Protestan,Hindu,Budha]');
        $this->form_validation->set_rules('umur', 'Umur', 'trim|required');
        $this->form_validation->set_rules('tinggi', 'Tinggi', 'trim|required');
        $this->form_validation->set_rules('berat', 'Berat', 'trim|required');
        $this->form_validation->set_rules('menginap', 'Menginap', 'trim|required|in_list[Ya,Tidak]');
        $this->form_validation->set_rules('pendidikan', 'Pendidikan', 'trim|required|in_list[SD,SMP,SMA,SMK]');
        $this->form_validation->set_rules('status', 'Status', 'trim|required|in_list[Belum Menikah,Menikah,Janda/Duda]');
        $this->form_validation->set_rules('pengalaman', 'Pengalaman', 'trim|required');
        $this->form_validation->set_rules('keterampilan', 'Keterampilan', 'trim|required');
        $this->form_validation->set_rules('gaji', 'Gaji', 'trim|required');
        $this->form_validation->set_rules('nama_bank', 'Nama Bank', 'trim|in_list[BNI,BRI,Mandiri,BCA]');
        $this->form_validation->set_rules('no_rekening', 'No Rekening', 'trim');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required');

        $this->form_validation->set_message('is_unique', '{field} sudah ada!');
        $this->form_validation->set_message('required', 'Kolom {field} harus diisi!');
        $this->form_validation->set_message('valid_email', 'Email yang diinput harus valid!');
        $this->form_validation->set_message('min_length', 'Kolom {field} harus lebih dari {param} karakter!');
        $this->form_validation->set_message('in_list', 'Kolom {field} harus diisi dengan {param}');
        $this->form_validation->set_message('max_length', 'Kolom {field} tidak lebih dari {param} digit!');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/header', $data);
            $this->load->view('admin/pembantu_tambah', $data);
            $this->load->view('admin/footer');
        } else {
            $config['upload_path']      = './assets/uploads/pembantu/'; //path folder
            $config['allowed_types']   = 'jpg|png|jpeg'; //type yang dapat diakses bisa anda sesuaikan
            $config['remove_spaces']   = TRUE;

            $this->upload->initialize($config);

            if (!empty($_FILES['foto_pembantu']['name']) || !empty($_FILES['foto_ktp']['name']) || !empty($_FILES['surat_polisi']['name']) || !empty($_FILES['surat_dokter']['name'])) {
                if ($this->upload->do_upload('foto_pembantu')) {
                    $fileData = $this->upload->data();
                    $data['foto_pembantu'] = $fileData['file_name'];
                } else {
                    $this->session->set_flashdata('error', 'Gagal upload foto pembantu. Pastikan mengunggah file image format jpg, png atau jpeg!');
                    redirect(base_url('admin/pembantu'));
                }

                if ($this->upload->do_upload('foto_ktp')) {
                    $fileData = $this->upload->data();
                    $data['foto_ktp'] = $fileData['file_name'];
                } else {
                    $this->session->set_flashdata('error', 'Gagal upload scan KTP. Pastikan mengunggah file image format jpg, png atau jpeg!');
                    redirect(base_url('admin/pembantu'));
                }

                if ($this->upload->do_upload('surat_polisi')) {
                    $fileData = $this->upload->data();
                    $data['surat_polisi'] = $fileData['file_name'];
                } else {
                    $this->session->set_flashdata('error', 'Gagal upload scan SKCK. Pastikan mengunggah file image format jpg, png atau jpeg!');
                    redirect(base_url('admin/pembantu'));
                }

                if ($this->upload->do_upload('surat_dokter')) {
                    $fileData = $this->upload->data();
                    $data['surat_dokter'] = $fileData['file_name'];
                } else {
                    $this->session->set_flashdata('error', 'Gagal upload scan surat dokter. Pastikan mengunggah file image format jpg, png atau jpeg!');
                    redirect(base_url('admin/pembantu'));
                }

                $foto_pembantu     = $data['foto_pembantu'];
                $foto_ktp               = $data['foto_ktp'];
                $surat_polisi          = $data['surat_polisi'];
                $surat_dokter         = $data['surat_dokter'];

                $user             = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
                $kd_user                = $user['kd_user'];
                $nik       = htmlspecialchars($this->input->post('nik', TRUE));
                $username_pembantu       = htmlspecialchars($this->input->post('username_pembantu', TRUE));
                $nama_pembantu       = htmlspecialchars($this->input->post('nama_pembantu', TRUE));
                $email_pembantu       = htmlspecialchars($this->input->post('email_pembantu', TRUE));
                $telepon       = htmlspecialchars($this->input->post('telepon', TRUE));
                $password          = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
                $alamat_pembantu       = htmlspecialchars($this->input->post('alamat_pembantu', TRUE));
                $jenis_kelamin       = htmlspecialchars($this->input->post('jenis_kelamin', TRUE));
                $agama       = htmlspecialchars($this->input->post('agama', TRUE));
                $umur       = htmlspecialchars($this->input->post('umur', TRUE));
                $tinggi       = htmlspecialchars($this->input->post('tinggi', TRUE));
                $berat       = htmlspecialchars($this->input->post('berat', TRUE));
                $menginap       = htmlspecialchars($this->input->post('menginap', TRUE));
                $pendidikan       = htmlspecialchars($this->input->post('pendidikan', TRUE));
                $status       = htmlspecialchars($this->input->post('status', TRUE));
                $pengalaman       = htmlspecialchars($this->input->post('pengalaman', TRUE));
                $keterampilan       = htmlspecialchars($this->input->post('keterampilan', TRUE));
                $gaji       = htmlspecialchars($this->input->post('gaji', TRUE));
                $nama_bank       = htmlspecialchars($this->input->post('nama_bank', TRUE));
                $no_rekening       = htmlspecialchars($this->input->post('no_rekening', TRUE));
                $status_pembantu       = 'Terverifikasi';
                $kategori       = 'Tersedia';
                $deskripsi       = htmlspecialchars($this->input->post('deskripsi', TRUE));

                $this->Model_pembantu->simpan($kd_user, $nik, $username_pembantu,  $nama_pembantu, $email_pembantu, $telepon, $password, $alamat_pembantu, $foto_pembantu, $jenis_kelamin, $agama, $umur, $tinggi, $berat, $menginap, $pendidikan, $status, $pengalaman, $foto_ktp, $surat_polisi, $surat_dokter, $keterampilan, $gaji, $nama_bank, $no_rekening, $status_pembantu, $kategori, $deskripsi);
                $this->session->set_flashdata('success', 'Pembantu <b>' . $this->input->post('nama_pembantu') . '</b> berhasil ditambahkan');
                redirect(base_url('admin/pembantu'));
            } else {
                $this->session->set_flashdata('warning', 'Anda harus mengunggah foto dengan format jpg, jpeg atau png!');
                redirect(base_url('tambah-pembantu'));
            }
        }
    }

    public function edit()
    {
        $kode = $this->uri->segment(4);
        $data = array(
            'title'               => 'Edit Pembantu',
            'user'               => $this->db->get_where('user', ['email' =>  $this->session->userdata('email')])->row_array(),
            'pembantu'      => $this->Model_pembantu->get_pembantu($kode)
        );

        $this->load->view('admin/header', $data);
        $this->load->view('admin/pembantu_edit', $data);
        $this->load->view('admin/footer');
    }

    public function update()
    {
        $kode = $this->uri->segment(4);
        $data = array(
            'title'                => 'Edit Pembantu',
            'user'                => $this->db->get_where('user', ['email' =>  $this->session->userdata('email')])->row_array(),
            'pembantu'      => $this->Model_pembantu->get_pembantu($kode)
        );

        $this->form_validation->set_rules('nik', 'NIK', 'trim|required|max_length[16]');
        $this->form_validation->set_rules('username_pembantu', 'Username', 'trim|required');
        $this->form_validation->set_rules('nama_pembantu', 'Nama Lengkap', 'trim|required');
        $this->form_validation->set_rules('email_pembantu', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('telepon', 'Telepon', 'trim|required');
        $this->form_validation->set_rules('alamat_pembantu', 'Alamat Lengkap', 'trim|required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'trim|required|in_list[Laki-Laki,Perempuan]');
        $this->form_validation->set_rules('agama', 'Agama', 'trim|required|in_list[Islam,Kristen,Protestan,Hindu,Budha]');
        $this->form_validation->set_rules('umur', 'Umur', 'trim|required');
        $this->form_validation->set_rules('tinggi', 'Tinggi', 'trim|required');
        $this->form_validation->set_rules('berat', 'Berat', 'trim|required');
        $this->form_validation->set_rules('menginap', 'Menginap', 'trim|required|in_list[Ya,Tidak]');
        $this->form_validation->set_rules('pendidikan', 'Pendidikan', 'trim|required|in_list[SD,SMP,SMA,SMK]');
        $this->form_validation->set_rules('status', 'Status', 'trim|required|in_list[Belum Menikah,Menikah,Janda/Duda]');
        $this->form_validation->set_rules('pengalaman', 'Pengalaman', 'trim|required');
        $this->form_validation->set_rules('keterampilan', 'Keterampilan', 'trim|required');
        $this->form_validation->set_rules('gaji', 'Gaji', 'trim|required');
        $this->form_validation->set_rules('nama_bank', 'Nama Bank', 'trim|in_list[BNI,BRI,Mandiri,BCA]');
        $this->form_validation->set_rules('no_rekening', 'No Rekening', 'trim');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required');

        $this->form_validation->set_message('required', 'Kolom {field} harus diisi!');
        $this->form_validation->set_message('min_length', 'Kolom {field} harus lebih dari {param} karakter!');
        $this->form_validation->set_message('in_list', 'Kolom {field} harus diisi dengan {param}');
        $this->form_validation->set_message('max_length', 'Kolom {field} tidak lebih dari {param} digit!');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/header', $data);
            $this->load->view('admin/pembantu_edit', $data);
            $this->load->view('admin/footer');
            $this->session->set_flashdata('error', 'Pembantu <b>' . $this->input->post('nama_pembantu') . '</b> gagal diperbarui!');
            redirect(base_url('admin/pembantu'));
        } else {
            $config['upload_path']      = './assets/uploads/pembantu/'; //path folder
            $config['allowed_types']   = 'jpg|png|jpeg'; //type yang dapat diakses bisa anda sesuaikan
            $config['remove_spaces']   = TRUE;

            $this->upload->initialize($config);

            if (!empty($_FILES['foto_pembantu']['name']) || !empty($_FILES['foto_ktp']['name'])) {
                if ($this->upload->do_upload('foto_pembantu')) {
                    $fileData = $this->upload->data();
                    $data['foto_pembantu'] = $fileData['file_name'];
                } else {
                    $this->session->set_flashdata('error', 'Gagal upload foto pembantu. Pastikan mengunggah file image format jpg, png atau jpeg!');
                    redirect(base_url('admin/pembantu'));
                }

                if ($this->upload->do_upload('foto_ktp')) {
                    $fileData = $this->upload->data();
                    $data['foto_ktp'] = $fileData['file_name'];
                } else {
                    $this->session->set_flashdata('error', 'Gagal upload foto KTP. Pastikan mengunggah file image format jpg, png atau jpeg!');
                    redirect(base_url('admin/pembantu'));
                }

                $foto_pembantu     = $data['foto_pembantu'];
                $foto_ktp               = $data['foto_ktp'];

                $kode                     = $this->input->post('kode');
                $user             = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
                $kd_user                = $user['kd_user'];
                $nik       = htmlspecialchars($this->input->post('nik', TRUE));
                $username_pembantu       = htmlspecialchars($this->input->post('username_pembantu', TRUE));
                $nama_pembantu       = htmlspecialchars($this->input->post('nama_pembantu', TRUE));
                $email_pembantu       = htmlspecialchars($this->input->post('email_pembantu', TRUE));
                $telepon       = htmlspecialchars($this->input->post('telepon', TRUE));
                $alamat_pembantu       = htmlspecialchars($this->input->post('alamat_pembantu', TRUE));
                $jenis_kelamin       = htmlspecialchars($this->input->post('jenis_kelamin', TRUE));
                $agama       = htmlspecialchars($this->input->post('agama', TRUE));
                $umur       = htmlspecialchars($this->input->post('umur', TRUE));
                $tinggi       = htmlspecialchars($this->input->post('tinggi', TRUE));
                $berat       = htmlspecialchars($this->input->post('berat', TRUE));
                $menginap       = htmlspecialchars($this->input->post('menginap', TRUE));
                $pendidikan       = htmlspecialchars($this->input->post('pendidikan', TRUE));
                $status       = htmlspecialchars($this->input->post('status', TRUE));
                $pengalaman       = htmlspecialchars($this->input->post('pengalaman', TRUE));
                $keterampilan       = htmlspecialchars($this->input->post('keterampilan', TRUE));
                $gaji       = htmlspecialchars($this->input->post('gaji', TRUE));
                $nama_bank       = htmlspecialchars($this->input->post('nama_bank', TRUE));
                $no_rekening       = htmlspecialchars($this->input->post('no_rekening', TRUE));
                $deskripsi       = htmlspecialchars($this->input->post('deskripsi', TRUE));

                $this->Model_pembantu->update($kode, $kd_user, $nik, $username_pembantu, $nama_pembantu, $email_pembantu, $telepon, $alamat_pembantu, $foto_pembantu, $jenis_kelamin, $agama, $umur, $tinggi, $berat, $menginap, $pendidikan, $status, $pengalaman, $foto_ktp, $keterampilan, $gaji, $nama_bank, $no_rekening, $deskripsi);
                $this->session->set_flashdata('success', 'Pembantu <b>' . $this->input->post('nama_pembantu') . '</b> berhasil diperbarui');
                redirect(base_url('admin/pembantu'));
            } elseif (!empty($_FILES['foto_pembantu']['name']) || !empty($_FILES['foto_ktp']['name'])) {
                if (!empty($_FILES['foto_pembantu']['name'])) {
                    if ($this->upload->do_upload('foto_pembantu')) {
                        $fileData = $this->upload->data();
                        $data['foto_pembantu'] = $fileData['file_name'];
                    } else {
                        $this->session->set_flashdata('error', 'Gagal upload foto pembantu. Pastikan mengunggah file image format jpg, png atau jpeg!');
                        redirect(base_url('admin/pembantu'));
                    }

                    $foto_pembantu     = $data['foto_pembantu'];
                    $kode                     = $this->input->post('kode');
                    $user             = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
                    $kd_user                = $user['kd_user'];
                    $nik       = htmlspecialchars($this->input->post('nik', TRUE));
                    $username_pembantu       = htmlspecialchars($this->input->post('username_pembantu', TRUE));
                    $nama_pembantu       = htmlspecialchars($this->input->post('nama_pembantu', TRUE));
                    $email_pembantu       = htmlspecialchars($this->input->post('email_pembantu', TRUE));
                    $telepon       = htmlspecialchars($this->input->post('telepon', TRUE));
                    $alamat_pembantu       = htmlspecialchars($this->input->post('alamat_pembantu', TRUE));
                    $jenis_kelamin       = htmlspecialchars($this->input->post('jenis_kelamin', TRUE));
                    $agama       = htmlspecialchars($this->input->post('agama', TRUE));
                    $umur       = htmlspecialchars($this->input->post('umur', TRUE));
                    $tinggi       = htmlspecialchars($this->input->post('tinggi', TRUE));
                    $berat       = htmlspecialchars($this->input->post('berat', TRUE));
                    $menginap       = htmlspecialchars($this->input->post('menginap', TRUE));
                    $pendidikan       = htmlspecialchars($this->input->post('pendidikan', TRUE));
                    $status       = htmlspecialchars($this->input->post('status', TRUE));
                    $pengalaman       = htmlspecialchars($this->input->post('pengalaman', TRUE));
                    $keterampilan       = htmlspecialchars($this->input->post('keterampilan', TRUE));
                    $gaji       = htmlspecialchars($this->input->post('gaji', TRUE));
                    $nama_bank       = htmlspecialchars($this->input->post('nama_bank', TRUE));
                    $no_rekening       = htmlspecialchars($this->input->post('no_rekening', TRUE));
                    $deskripsi       = htmlspecialchars($this->input->post('deskripsi', TRUE));

                    $this->Model_pembantu->update_foto_pembantu($kode, $kd_user, $nik, $username_pembantu, $nama_pembantu, $email_pembantu, $telepon, $alamat_pembantu, $foto_pembantu, $jenis_kelamin, $agama, $umur, $tinggi, $berat, $menginap, $pendidikan, $status, $pengalaman, $keterampilan, $gaji, $nama_bank, $no_rekening, $deskripsi);
                    $this->session->set_flashdata('success', 'Pembantu <b>' . $this->input->post('nama_pembantu') . '</b> berhasil diperbarui');
                    redirect(base_url('admin/pembantu'));
                } else {
                    if ($this->upload->do_upload('foto_ktp')) {
                        $fileData = $this->upload->data();
                        $data['foto_ktp'] = $fileData['file_name'];
                    } else {
                        $this->session->set_flashdata('error', 'Gagal upload scan KTP. Pastikan mengunggah file image format jpg, png atau jpeg!');
                        redirect(base_url('admin/pembantu'));
                    }

                    $foto_ktp               = $data['foto_ktp'];

                    $kode                     = $this->input->post('kode');
                    $user             = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
                    $kd_user                = $user['kd_user'];
                    $nik       = $this->input->post('nik', TRUE);
                    $username_pembantu       = $this->input->post('username_pembantu', TRUE);
                    $nama_pembantu       = $this->input->post('nama_pembantu', TRUE);
                    $email_pembantu       = $this->input->post('email_pembantu', TRUE);
                    $telepon       = $this->input->post('telepon', TRUE);
                    $alamat_pembantu       = $this->input->post('alamat_pembantu', TRUE);
                    $jenis_kelamin       = $this->input->post('jenis_kelamin', TRUE);
                    $agama       = $this->input->post('agama', TRUE);
                    $umur       = $this->input->post('umur', TRUE);
                    $tinggi       = $this->input->post('tinggi', TRUE);
                    $berat       = $this->input->post('berat', TRUE);
                    $menginap       = $this->input->post('menginap', TRUE);
                    $pendidikan       = $this->input->post('pendidikan', TRUE);
                    $status       = $this->input->post('status', TRUE);
                    $pengalaman       = $this->input->post('pengalaman', TRUE);
                    $keterampilan       = $this->input->post('keterampilan', TRUE);
                    $gaji       = $this->input->post('gaji', TRUE);
                    $nama_bank       = $this->input->post('nama_bank', TRUE);
                    $no_rekening       = $this->input->post('no_rekening', TRUE);
                    $deskripsi       = $this->input->post('deskripsi', TRUE);

                    $this->Model_pembantu->update_foto_ktp($kode, $kd_user, $username_pembantu, $nik, $nama_pembantu, $email_pembantu, $telepon, $alamat_pembantu, $jenis_kelamin, $agama, $umur, $tinggi, $berat, $menginap, $pendidikan, $status, $pengalaman, $foto_ktp, $keterampilan, $gaji, $nama_bank, $no_rekening, $deskripsi);
                    $this->session->set_flashdata('success', 'Pembantu <b>' . $this->input->post('nama_pembantu') . '</b> berhasil diperbarui');
                    redirect(base_url('admin/pembantu'));
                }
            } else {
                $kode                     = $this->input->post('kode');
                $user             = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
                $kd_user                = $user['kd_user'];
                $nik       = $this->input->post('nik', TRUE);
                $username_pembantu       = $this->input->post('username_pembantu', TRUE);
                $nama_pembantu       = $this->input->post('nama_pembantu', TRUE);
                $email_pembantu       = $this->input->post('email_pembantu', TRUE);
                $telepon       = $this->input->post('telepon', TRUE);
                $alamat_pembantu       = $this->input->post('alamat_pembantu', TRUE);
                $jenis_kelamin       = $this->input->post('jenis_kelamin', TRUE);
                $agama       = $this->input->post('agama', TRUE);
                $umur       = $this->input->post('umur', TRUE);
                $tinggi       = $this->input->post('tinggi', TRUE);
                $berat       = $this->input->post('berat', TRUE);
                $menginap       = $this->input->post('menginap', TRUE);
                $pendidikan       = $this->input->post('pendidikan', TRUE);
                $status       = $this->input->post('status', TRUE);
                $pengalaman       = $this->input->post('pengalaman', TRUE);
                $keterampilan       = $this->input->post('keterampilan', TRUE);
                $gaji       = $this->input->post('gaji', TRUE);
                $nama_bank       = $this->input->post('nama_bank', TRUE);
                $no_rekening       = $this->input->post('no_rekening', TRUE);
                $deskripsi       = $this->input->post('deskripsi', TRUE);

                $this->Model_pembantu->update_tanpa_gambar($kode, $kd_user, $nik, $username_pembantu, $nama_pembantu, $email_pembantu, $telepon, $alamat_pembantu, $jenis_kelamin, $agama, $umur, $tinggi, $berat, $menginap, $pendidikan, $status, $pengalaman, $keterampilan, $gaji, $nama_bank, $no_rekening, $deskripsi);
                $this->session->set_flashdata('success', 'Pembantu <b>' . $this->input->post('nama_pembantu') . '</b> berhasil diperbarui');
                redirect(base_url('admin/pembantu'));
            }
        }
    }

    public function verifikasi()
    {
        $kode = $this->uri->segment(4);
        $data['verifikasi'] = $this->db->query("SELECT * FROM pembantu WHERE kd_pembantu='$kode'");
        $this->db->query("UPDATE pembantu SET status_pembantu='Terverifikasi', kategori='Tersedia' WHERE kd_pembantu='$kode'");

        $this->session->set_flashdata('success', 'Pembantu berhasil terverifikasi');
        redirect(base_url('admin/pembantu'));
    }

    public function hapus()
    {
        $kode = $this->input->post('kode');
        $nama = $this->input->post('nama');
        $foto = $this->input->post('foto');
        $foto_ktp = $this->input->post('foto_ktp');
        $surat_polisi = $this->input->post('surat_polisi');
        $surat_dokter = $this->input->post('surat_dokter');
        $path = './assets/uploads/pembantu/' . $foto;
        $path = './assets/uploads/pembantu/' . $foto_ktp;
        $path = './assets/uploads/pembantu/' . $surat_polisi;
        $path = './assets/uploads/pembantu/' . $surat_dokter;
        unlink($path);
        $this->Model_pembantu->hapus($kode);
        $this->session->set_flashdata('success', 'Pembantu <b>' . $nama . '</b> berhasil dihapus');
        redirect(base_url('admin/pembantu'));
    }
}
