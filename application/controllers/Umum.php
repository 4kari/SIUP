<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Umum extends CI_Controller
{
    public function __construct(){
		parent::__construct();
		$this->load->model('model_umum');
		if ($this->session->userdata('level')){
            redirect('Auth');
        }
	}
	public function index()
	{
        $data['judul']="SIUP - Login";
		$this->load->view('umum/template/Header',$data); 
		$this->load->view('umum/Login');
		$this->load->view('umum/template/Footer');
	}
	public function cek_log(){
		
		$username=$this->input->post('username');
		$password = $this->input->post('password');
        $this->model_umum->ceklogin($username,$password);
		redirect('umum');
	}
	
	public function tdaftar(){
		$data['judul']="SIUP - Daftar Akun";
		
        $this->load->view('umum/template/Header',$data);
        $this->load->view('umum/Buatakun');
        $this->load->view('umum/template/Footer');
    }
    public function daftarakun(){
		$this->form_validation->set_rules('username', 'username', 'required|trim|is_unique[user.username]', [
            'is_unique' => 'Username ini sudah digunakan!'
        ]);
        //validasi nanti diganti JS
        $this->form_validation->set_rules('fname', 'fname', 'required|trim');
        $this->form_validation->set_rules('lname', 'lname', 'required|trim');
        $this->form_validation->set_rules('password', 'password', 'required|trim|min_length[8]', ['min_length' => 'password terlalu pendek']);
        $this->form_validation->set_rules('Rpassword', 'Rpassword', 'required|trim|min_length[8]', ['min_length' => 'password terlalu pendek']);

		if ($this->form_validation->run()) {
			$username=$this->input->post('username');
			$password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            $fname = $this->input->post('fname');
            $lname=$this->input->post('lname');
			$this->model_umum->tambah($username,$password,$fname,$lname);
        }else{
            redirect('Umum/tdaftar');
        }
    }
}