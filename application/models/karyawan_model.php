<?php
defined('BASEPATH') or exit('No direct script access allowed');
class karyawan_model extends CI_Model
{
    public function tambahtransaksi()
    {
        $post = $this->input->post();
        $this->form_validation->set_rules('tanggal', 'tanggal', 'required|trim');
        $this->form_validation->set_rules('harga', 'harga', 'required|trim');
        $this->form_validation->set_rules('keterangan', 'keterangan', 'required|trim');
        if ($this->form_validation->run() == true) {
            $this->db->insert('transaksi', $post);
            //kondisi ketika sukses menambahkan data
            $this->session->set_flashdata('pesan', 'Transaksi baru berhasil ditambahkan');
        } else {
            //kondisi ketika salah satu field kosong
            $this->session->set_flashdata('pesan', 'Harap mengisi seluruh inputan transaksi');
            log_message('error', 'Harap mengisi seluruh inputan transaksi');
        }
    }
}
