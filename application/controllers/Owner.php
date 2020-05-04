<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Owner extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('level')!=2){
			redirect('Auth');
		}else{
            $data['header'] = 'SI-UP - Owner';
            $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();    
        }
    }
    public function data(){
        $data['side'] = 'SI-UP Owner';
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
        $this->load->view('owner/template/header',$data);
        $this->load->view('owner/template/sidebar');
        $this->load->view('owner/template/topbar');
        $this->load->view('owner/index');
        $this->load->view('owner/template/footer');
    }
    
    public function transaksi()
    {
        $data=$this->data();
        $data['header'] = 'SI-UP - Transaksi';
        $data['active'] = 'Data Transaksi';
        $this->load->view('owner/template/header',$data);
        $this->load->view('owner/template/sidebar');
        $this->load->view('owner/template/topbar');
        $this->load->view('owner/transaksi');
        $this->load->view('owner/template/footer');
    }
    public function barang()
    {
        $data=$this->data();
        $data['header'] = 'SI-UP - Data Barang';
        $data['active'] = 'Data Barang';
        $this->load->view('owner/template/header',$data);
        $this->load->view('owner/template/sidebar');
        $this->load->view('owner/template/topbar');
        $this->load->view('owner/barang');
        $this->load->view('owner/template/footer');
    }
}
