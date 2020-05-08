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
	public function tambah()
	{
		$post=$this->input->post();
		$username = $post['username'];
		$password = password_hash($post['password'], PASSWORD_DEFAULT);
		$fname = $post['fname'];
		$lname = $post['lname'];
		$gambar = 'test.jpg';
			
		$this->form_validation->set_rules('username', 'username', 'required|trim|is_unique[user.username]', [
            'is_unique' => 'Username ini sudah digunakan!'
        ]);
        $this->form_validation->set_rules('fname', 'fname', 'required|trim');
        $this->form_validation->set_rules('lname', 'lname', 'required|trim');
        $this->form_validation->set_rules('password', 'password', 'required|trim|min_length[8]', ['min_length' => 'password terlalu pendek']);
        $this->form_validation->set_rules('Rpassword', 'Rpassword', 'required|trim|min_length[8]', ['min_length' => 'password terlalu pendek']);

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('pesan', 'Pendaftaran Gagal !');
        } else {            
			$data = [
				'nama_user' => $fname . " " . $lname,
				'username' => $username,
				'password' => $password,
				'level' => 3,
				'gambar' => $gambar
			];
			$this->db->insert('user', $data);
			$this->session->set_flashdata('pesan', 'Pendaftaran Sukses !');
		}
	}
}
