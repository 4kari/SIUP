<?php
defined('BASEPATH') or exit('No direct script access allowed');
class model_umum extends CI_Model
{
	public function ceklogin($username, $password)
	{
		$usr = $this->db->get_where('user', ['username' => $username])->row_array();
		if ($usr) {
			if (password_verify($password, $usr['password'])) {
				$ses = [
					'username' => $usr['username'],
					'level' => $usr['level'],
					'nama' => $usr['nama_user']
				];
				$this->session->set_userdata($ses);
				$this->session->set_flashdata('pesan', 'Login berhasil');
			}else{
				$this->session->set_flashdata('pesan', 'Password Salah !');
			}
		}else{
			$this->session->set_flashdata('pesan', 'User belum terdaftar');
		}
	}
	public function tambah($username, $pass, $fname, $lname, $gambar)
	{
		$data = [
			'nama_user' => $fname . " " . $lname,
			'username' => $username,
			'password' => $pass,
			'level' => 3,
			'gambar' => $gambar
		];
		$this->db->insert('user', $data);
		$this->session->set_flashdata('pesan', 'Pendaftaran Sukses !');
		redirect('umum');
	}
}
