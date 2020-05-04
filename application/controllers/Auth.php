<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function index(){
		$level=$this->session->userdata('level');
		if ($level==1){
			redirect('Admin');
		}else if($level==2){
			redirect('Owner');
		}else if($level==3){
			redirect('Karyawan');
        }else{
            redirect('Umum');
        }
    }
    public function logout(){
		session_unset();
		session_destroy();
		redirect('Auth');
	}
}