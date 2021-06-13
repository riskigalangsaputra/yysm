<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Daftar extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->library('upload');
        $this->load->model('pembantu/Model_daftar');
    }


    public function index()
    {
        $data['title'] = 'Daftar Pembantu';
        $this->load->view('pembantu/daftar', $data);
    }

    public function simpan()
    {
        $data = array(
            'title'                => 'Daftar Pembantu',
        );

        $this->form_validation->set_rules('nik', 'NIK', 'trim|required|is_unique[pembantu.nik]|max_length[16]');
        $this->form_validation->set_rules('username_pembantu', 'Username', 'trim|required|is_unique[pembantu.username_pembantu]');
        $this->form_validation->set_rules('nama_pembantu', 'Nama Lengkap', 'trim|required|is_unique[pembantu.nama_pembantu]');
        $this->form_validation->set_rules('email_pembantu', 'Email', 'trim|required|valid_email|is_unique[pembantu.email_pembantu]');
        $this->form_validation->set_rules('telepon', 'Telepon', 'trim|required|is_unique[pembantu.telepon]');
        $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[6]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Konfirmasi Password', 'trim|required|matches[password1]');
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
        $this->form_validation->set_message('matches', '{field} harus sama dengan konfirmasi password!');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('pembantu/daftar', $data);
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
                    $this->session->set_flashdata('error', 'Gagal upload foto. Pastikan mengunggah file image format jpg, png atau jpeg!');
                    redirect(base_url('pembantu/daftar'));
                }

                if ($this->upload->do_upload('foto_ktp')) {
                    $fileData = $this->upload->data();
                    $data['foto_ktp'] = $fileData['file_name'];
                } else {
                    $this->session->set_flashdata('error', 'Gagal upload foto KTP. Pastikan mengunggah file image format jpg, png atau jpeg!');
                    redirect(base_url('pembantu/daftar'));
                }

                if ($this->upload->do_upload('surat_polisi')) {
                    $fileData = $this->upload->data();
                    $data['surat_polisi'] = $fileData['file_name'];
                } else {
                    $this->session->set_flashdata('error', 'Gagal upload foto SKCK. Pastikan mengunggah file image format jpg, png atau jpeg!');
                    redirect(base_url('pembantu/daftar'));
                }

                if ($this->upload->do_upload('surat_dokter')) {
                    $fileData = $this->upload->data();
                    $data['surat_dokter'] = $fileData['file_name'];
                } else {
                    $this->session->set_flashdata('error', 'Gagal upload foto surat dokter. Pastikan mengunggah file image format jpg, png atau jpeg!');
                    redirect(base_url('pembantu/daftar'));
                }

                $foto_pembantu     = $data['foto_pembantu'];
                $foto_ktp               = $data['foto_ktp'];
                $surat_polisi          = $data['surat_polisi'];
                $surat_dokter         = $data['surat_dokter'];

                $kd_user    = '12';
                $nik       = htmlspecialchars($this->input->post('nik', TRUE));
                $username_pembantu       = htmlspecialchars($this->input->post('username_pembantu', TRUE));
                $nama_pembantu       = htmlspecialchars($this->input->post('nama_pembantu', TRUE));
                $email_pembantu       = htmlspecialchars($this->input->post('email_pembantu', TRUE));
                $telepon       = htmlspecialchars($this->input->post('telepon', TRUE));
                $password          = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
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
                $status_pembantu       = 'Belum Terverifikasi';
                $kategori       = 'Tidak Tersedia';
                $deskripsi       = htmlspecialchars($this->input->post('deskripsi', TRUE));

                $this->Model_daftar->daftar($kd_user, $nik, $username_pembantu, $nama_pembantu, $email_pembantu, $telepon, $password, $alamat_pembantu, $foto_pembantu, $jenis_kelamin, $agama, $umur, $tinggi, $berat, $menginap, $pendidikan, $status, $pengalaman, $foto_ktp, $surat_polisi, $surat_dokter, $keterampilan, $gaji, $nama_bank, $no_rekening, $status_pembantu, $kategori, $deskripsi);
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Akun <b>' . $nama_pembantu . '</b> berhasil dibuat. tunggu sampai Admin memverifikasi data Anda </div>');
                redirect(base_url('pembantu/login'));
            } else {
                $this->session->set_flashdata('warning', 'Anda harus mengunggah foto dengan format jpg, jpeg atau png!');
                redirect(base_url('pembantu/daftar'));
            }
        }
    }
}
