<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('level')!=1){
			redirect('Auth');
		}
	}

    public function data(){
        $data['side'] = 'SI-UP Admin';
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
        $this->load->view('admin/template/header',$data);
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/template/topbar');
        $this->load->view('admin/index');
        $this->load->view('admin/template/footer');
    }
    
    public function transaksi()
    {
        $data=$this->data();
        $data['header'] = 'SI-UP - Transaksi';
        $data['active'] = 'Data Transaksi';
        $this->load->view('admin/template/header',$data);
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/template/topbar');
        $this->load->view('admin/transaksi');
        $this->load->view('admin/template/footer');
    }
    public function barang()
    {
        $data=$this->data();
        $data['header'] = 'SI-UP - Data Barang';
        $data['active'] = 'Data Barang';
        $this->load->view('admin/template/header',$data);
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/template/topbar');
        $this->load->view('admin/barang');
        $this->load->view('admin/template/footer');
    }
    public function Management_user()
    {
        $data=$this->data();
        $data['header'] = 'SI-UP - Data Barang';
        $data['active'] = 'Management User';
        $this->load->view('admin/template/header',$data);
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/template/topbar');
        $this->load->view('admin/user');
        $this->load->view('admin/template/footer');
    }
}
