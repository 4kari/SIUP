<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('level')!=1){
			redirect('Auth');
		}else{
            $data['header'] = 'SI-UP - Admin';
            $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();    
        }
	}

	public function index()
    {
        $this->load->view('karyawan/template/header', $this->$data);
        $this->load->view('karyawan/index');
        $this->load->view('karyawan/template/footer');
    }
		
}
