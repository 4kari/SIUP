<?php
defined('BASEPATH') or exit('No direct script access allowed');
class model_owner_admin extends CI_Model
{
    public function getuserdata()
    {
        $query = "SELECT u.nama_user, u.username, l.level_user as level, u.gambar
        FROM user u, level l
        where u.level = l.id
        ";
        return $this->db->query($query)->result_array();
    }
    public function tambahuser()
    {
        $post = $this->input->post();
        $this->form_validation->set_rules('nama_user', 'nama_user', 'required|trim');
        $this->form_validation->set_rules('username', 'username', 'required|trim');
        $this->form_validation->set_rules('password', 'password', 'required|trim|min_length[8]', ['min_length' => 'password terlalu pendek']);
        $this->form_validation->set_rules('level', 'level', 'required|trim');
        if ($this->form_validation->run() == true) {
            if (!$this->db->get_where('user', ['username' => $post['username']])->row_array()) {
                $post['gambar'] = "test.jpg";
                $this->db->insert('user', $post);
                $this->session->set_flashdata('pesan', 'Menambah User baru berhasil');
            } else {
                //kondisi ketika kode barang sudah ada
                $this->session->set_flashdata('pesan', 'Username ini sudah terdaftar');
            }
        } else {
            //kondisi ketika salah satu field kosong
            $this->session->set_flashdata('pesan', 'Harap mengisi seluruh inputan');
        }
    }
    public function edituser($username)
    {
        $post = $this->input->post();
        $this->form_validation->set_rules('nama_user', 'nama_user', 'required|trim');
        $this->form_validation->set_rules('username', 'username', 'required|trim');
        $this->form_validation->set_rules('level', 'level', 'required|trim');
        if ($this->form_validation->run() == true) {
            $data = $this->db->get_where('user', ['username' => $post['username']])->row_array();
            if (!$data || $data['username'] == $username) {
                $this->db->where('username', $username);
                $this->db->update('user', $post);
                //kondisi ketika sukses menambahkan data
                $this->session->set_flashdata('pesan', 'Edit Data User berhasil');
            } else {
                //kondisi ketika kode barang sudah ada
                $this->session->set_flashdata('pesan', 'Tidak melakukan Edit Data User');
            }
        } else {
            //kondisi ketika salah satu field kosong
            $this->session->set_flashdata('pesan', 'Harap mengisi seluruh inputan');
        }
    }
    public function tambahbarang()
    {
        $post = $this->input->post();
        $this->form_validation->set_rules('id', 'id', 'required|trim');
        $this->form_validation->set_rules('nama_barang', 'nama_barang', 'required|trim');
        if ($this->form_validation->run() == true) {
            if (!$this->db->get_where('barang', ['id' => $post['id']])->row_array()) {
                $this->db->insert('barang', $post);
                //kondisi ketika sukses menambahkan data
            } else {
                //kondisi ketika kode barang sudah ada
            }
        } else {
            //kondisi ketika salah satu field kosong
        }
    }
    public function editbarang($id)
    {
        $post = $this->input->post();
        $this->form_validation->set_rules('id', 'id', 'required|trim');
        $this->form_validation->set_rules('nama_barang', 'nama_barang', 'required|trim');
        if ($this->form_validation->run() == true) {
            $data = $this->db->get_where('barang', ['id' => $id])->row_array();
            if (!$data || $data['id'] == $id) {
                $this->db->where('id', $id);
                $this->db->update('barang', $post);
                //kondisi ketika sukses menambahkan data
            } else {
                //kondisi ketika kode barang sudah ada
            }
        } else {
            //kondisi ketika salah satu field kosong
        }
    }
    public function tambahtransaksi()
    {
        $post = $this->input->post();
        $this->form_validation->set_rules('tanggal', 'tanggal', 'required|trim');
        $this->form_validation->set_rules('harga', 'harga', 'required|trim');
        $this->form_validation->set_rules('keterangan', 'keterangan', 'required|trim');
        if ($this->form_validation->run() == true) {
            $this->db->insert('transaksi', $post);
            //kondisi ketika sukses menambahkan data
        } else {
            //kondisi ketika salah satu field kosong
        }
    }
    public function edittransaksi($id)
    {
        $post = $this->input->post();
        $this->form_validation->set_rules('tanggal', 'tanggal', 'required|trim');
        $this->form_validation->set_rules('harga', 'harga', 'required|trim');
        $this->form_validation->set_rules('keterangan', 'keterangan', 'required|trim');
        if ($this->form_validation->run() == true) {
            $this->db->where('id', $id);
            $this->db->update('transaksi', $post);
            //kondisi ketika sukses menambahkan data
        } else {
            //kondisi ketika salah satu field kosong
        }
    }
}
