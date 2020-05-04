<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Karyawan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('level')!=3){
			redirect('Auth');
        }
    }
    public function data(){
        $data['side'] = 'SI-UP Karyawan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['active']='default';
        $data['header']='default';
        return $data;
    }
    public function index()
    {
        $data=$this->data();
        $data['header'] = 'SI-UP - Dashboard';
        $data['active'] = 'Dashboard';
        $this->load->view('karyawan/template/header',$data);
        $this->load->view('karyawan/template/sidebar');
        $this->load->view('karyawan/template/topbar');
        $this->load->view('karyawan/index');
        $this->load->view('karyawan/template/footer');
    }
}
