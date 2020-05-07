<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') != 1) {
            redirect('Auth');
        }
        $this->load->model('model_owner_admin', 'model');
    }

    public function data()
    {
        $data['side'] = 'SI-UP Admin';
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
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/template/topbar');
        $this->load->view('admin/index');
        $this->load->view('admin/template/footer');
    }

    public function transaksi()
    {
        $data = $this->data();
        $data['header'] = 'SI-UP - Transaksi';
        $data['active'] = 'Data Transaksi';
        $data['transaksi'] = $this->db->get('transaksi')->result_array();
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/template/topbar');
        $this->load->view('admin/transaksi');
        $this->load->view('admin/template/footer');
    }
    public function tambah_transaksi()
    {
        $this->model->tambahtransaksi();
        redirect('Admin/transaksi');
    }
    public function hapus_transaksi($id)
    {
        $this->db->delete('transaksi', array('id' => $id));
        $this->session->set_flashdata('pesan', 'Hapus Transaksi berhasil');
        redirect('Admin/transaksi');
    }
    public function edit_transaksi($id)
    {
        $this->model->edittransaksi($id);
        redirect('Admin/transaksi');
    }
    public function barang()
    {
        $data = $this->data();
        $data['header'] = 'SI-UP - Data Barang';
        $data['active'] = 'Data Barang';
        $data['barang'] = $this->db->get('barang')->result_array();
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/template/topbar');
        $this->load->view('admin/barang');
        $this->load->view('admin/template/footer');
    }
    public function tambah_barang()
    {
        $this->model->tambahbarang();
        redirect('Admin/barang');
    }
    public function hapus_barang($id)
    {
        $this->db->delete('barang', array('id' => $id));
        $this->session->set_flashdata('pesan', 'Barang berhasil dihapus');
        redirect('Admin/barang');
    }
    public function edit_barang($id)
    {
        $this->model->editbarang($id);
        redirect('Admin/barang');
    }
    public function Management_user()
    {
        $data = $this->data();
        $data['header'] = 'SI-UP - Data User';
        $data['active'] = 'Management User';
        $data['Muser'] = $this->model->getuserdata();
        $data['level'] = $this->db->get('level')->result_array();
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/template/topbar');
        $this->load->view('admin/user');
        $this->load->view('admin/template/footer');
    }
    public function tambah_user()
    {
        $this->model->tambahuser();
        redirect('Admin/Management_user');
    }
    public function hapus_user($username)
    {
        $this->db->delete('user', array('username' => $username));
        $this->session->set_flashdata('pesan', 'Menghapus User berhasil');
        redirect('Admin/Management_user');
    }
    public function edit_user($username)
    {
        $this->model->edituser($username);
        redirect('Admin/Management_user');
    }
}
