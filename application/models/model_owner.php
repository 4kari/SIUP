<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class model_owner extends CI_Model {
    public function tambahbarang(){
        $post=$this->input->post();
        $this->form_validation->set_rules('id', 'id', 'required|trim');
        $this->form_validation->set_rules('nama_barang', 'nama_barang', 'required|trim');
        if ($this->form_validation->run() == true) {
            if (!$this->db->get_where('barang', ['id' => $post['id']])->row_array()){
                $this->db->insert('barang',$post);
                //kondisi ketika sukses menambahkan data
            }else{
                //kondisi ketika kode barang sudah ada
            }
        } else {
            //kondisi ketika salah satu field kosong
        }
    }
    public function editbarang($id){
        $post=$this->input->post();
        $this->form_validation->set_rules('id', 'id', 'required|trim');
        $this->form_validation->set_rules('nama_barang', 'nama_barang', 'required|trim');
        if ($this->form_validation->run() == true) {
            $data=$this->db->get_where('barang', ['id' => $id])->row_array();
            if (!$data || $data['id']==$id){
                $this->db->where('id', $id);
                $this->db->update('barang', $post);
                //kondisi ketika sukses menambahkan data
            }else{
                //kondisi ketika kode barang sudah ada
            }
        } else {
                //kondisi ketika salah satu field kosong
        }
    }
    public function tambahtransaksi(){
        $post=$this->input->post();
        $this->form_validation->set_rules('tanggal', 'tanggal', 'required|trim');
        $this->form_validation->set_rules('harga', 'harga', 'required|trim');
        $this->form_validation->set_rules('keterangan', 'keterangan', 'required|trim');
        if ($this->form_validation->run() == true) {
            $this->db->insert('transaksi',$post);
            //kondisi ketika sukses menambahkan data
        } else {
            //kondisi ketika salah satu field kosong
        }
    }
    public function edittransaksi($id){
        $post=$this->input->post();
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