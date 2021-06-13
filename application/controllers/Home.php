<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('text');

        $this->load->model('majikan/Model_prt');
    }

    public function index()
    {
        $data = array(
            'title' => 'Situs Pencari Pembantu Rumah Tangga',
            'majikan' => $this->db->get_where('majikan', ['email_majikan' =>  $this->session->userdata('email_majikan')])->row_array(),
            'pembantu' => $this->Model_prt->get_all_pembantu(),
            'populer' => $this->Model_prt->pembantu_populer(),
        );

        $this->load->view('majikan/header', $data);
        $this->load->view('majikan/home', $data);
        $this->load->view('majikan/footer');
    }
}
