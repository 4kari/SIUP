<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Umum extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_umum', 'model');
        if ($this->session->userdata('level')) {
            redirect('Auth');
        }
    }
    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'password', 'required|trim|min_length[8]', ['min_length' => 'password terlalu pendek']);

        if ($this->form_validation->run() == false) {
            $data['judul'] = "SIUP - Login";
            $this->load->view('umum/template/Header', $data);
            $this->load->view('umum/Login');
            $this->load->view('umum/template/Footer');
        } else {
            $this->_cek_log();
        }
    }
    public function _cek_log()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $this->model->ceklogin($username, $password);
        redirect('umum');
    }

    public function tdaftar()
    {
        $data['judul'] = "SIUP - Daftar Akun";

        $this->load->view('umum/template/Header', $data);
        $this->load->view('umum/Buatakun');
        $this->load->view('umum/template/Footer');
    }
    public function daftarakun()
    {
        $this->model->tambah();
        redirect('umum');
    }
}
