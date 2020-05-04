<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class model_umum extends CI_Model {
	public function ceklogin($username,$password)
	{
		$usr = $this->db->get_where('user',['username'=>$username])->row_array();
		if ($usr){
			if(password_verify($password,$usr['password'])){
				$ses= [
					'username'=>$usr['username'],
					'level'=>$usr['level'],
					'nama' => $usr['nama_user']
				];
				$this->session->set_userdata($ses);
			}
		}
			
	}
	public function tambah($username,$pass,$fname,$lname){
		$data = [
			'nama_user' => $name,
			'username' => $username,
			'password' => $pass,
			'level' => 3
		];
		$this->db->insert('user',$data);
		redirect('umum');
	}
}
