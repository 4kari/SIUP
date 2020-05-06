<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Owner extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') != 2) {
            redirect('Auth');
        }
        $this->load->model('model_owner', 'model');
    }
    public function data()
    {
        $data['side'] = 'SI-UP Owner';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['active'] = 'default';
        $data['header'] = 'default';
        $data['start'] = 0;
        return $data;
    }
    public function index()
    {
        $data = $this->data();
        $data['header'] = 'SI-UP - Dashboard';
        $data['active'] = 'Dashboard';
        $this->load->view('owner/template/header', $data);
        $this->load->view('owner/template/sidebar');
        $this->load->view('owner/template/topbar');
        $this->load->view('owner/index');
        $this->load->view('owner/template/footer');
    }

    public function transaksi()
    {
        $data = $this->data();
        $data['header'] = 'SI-UP - Transaksi';
        $data['active'] = 'Data Transaksi';
        $data['item'] = $this->db->get('transaksi')->result_array();

        $this->load->view('owner/template/header', $data);
        $this->load->view('owner/template/sidebar');
        $this->load->view('owner/template/topbar');
        $this->load->view('owner/transaksi');
        $this->load->view('owner/template/footer');
    }
    public function tambah_transaksi(){
        $this->model->tambahtransaksi();
        redirect ('Owner/transaksi');
    }
    public function hapus_transaksi($id){
        $this->db->delete('transaksi', array('id' => $id));
        redirect ('Owner/transaksi');
    }
    public function edit_transaksi($id){
        $this->model->edittransaksi();
        redirect ('Owner/transaksi');
    }
    public function barang()
    {
        $data = $this->data();
        $data['header'] = 'SI-UP - Data Barang';
        $data['active'] = 'Data Barang';
        $data['item'] = $this->db->get('barang')->result_array();

        $this->load->view('owner/template/header', $data);
        $this->load->view('owner/template/sidebar');
        $this->load->view('owner/template/topbar');
        $this->load->view('owner/barang');
        $this->load->view('owner/template/footer');
    }
    public function tambah_barang(){
        $this->model->tambahbarang();
        redirect ('Owner/barang');
    }
    public function hapus_barang($id){
        $this->db->delete('barang', array('id' => $id));
        redirect ('Owner/barang');
    }
    public function edit_barang($id){
        $this->model->editbarang($id);
        redirect ('Owner/barang');
    }
}
