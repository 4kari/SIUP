<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Karyawan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') != 3) {
            log_message('error', 'Telah telah terjadi usaha akses pada halaman Karyawan langsung !');
            redirect('Auth');
        }
        $this->load->model('cetak_model');
        $this->load->model('karyawan_model', 'model');
    }
    public function data()
    {
        $data['side'] = 'SI-UP Karyawan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['active'] = 'default';
        $data['header'] = 'default';
        return $data;
    }
    public function index()
    {
        $data = $this->data();
        $data['header'] = 'SI-UP - Dashboard';
        $data['active'] = 'Dashboard';
        $this->load->view('karyawan/template/header', $data);
        $this->load->view('karyawan/template/sidebar');
        $this->load->view('karyawan/template/topbar');
        $this->load->view('karyawan/index');
        $this->load->view('karyawan/template/footer');
    }
    public function tambah_transaksi()
    {
        $this->model->tambahtransaksi();
        redirect('karyawan/transaksi');
    }
    public function transaksi()
    {
        $data = $this->data();
        $data['header'] = 'SI-UP - Transaksi';
        $data['active'] = 'Data Transaksi';
        $data = $this->filter($data);
        $data['option_tahun'] = $this->cetak_model->option_tahun();



        $this->load->view('karyawan/template/header', $data);
        $this->load->view('karyawan/template/sidebar');
        $this->load->view('karyawan/template/topbar');
        $this->load->view('karyawan/transaksi');
        $this->load->view('karyawan/template/footer');
    }
    public function barang()
    {
        $data = $this->data();
        $data['header'] = 'SI-UP - Data Barang';
        $data['active'] = 'Data Barang';

        $data['barang'] = $this->db->get('barang')->result_array();
        $data['start'] = 0;

        $this->load->view('karyawan/template/header', $data);
        $this->load->view('karyawan/template/sidebar');
        $this->load->view('karyawan/template/topbar');
        $this->load->view('karyawan/barang');
        $this->load->view('karyawan/template/footer');
    }
    function filter($data)
    {

        if (isset($_GET['filter']) && !empty($_GET['filter'])) { // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user

            if ($filter == '1') { // Jika filter nya 1 (per tanggal)
                $tgl = $_GET['tanggal'];

                $ket = 'Data Transaksi Tanggal ' . date('d-m-y', strtotime($tgl));
                $url_cetak = 'cetak?filter=1&tanggal=' . $tgl;
                $transaksi = $this->cetak_model->view_by_date($tgl); // Panggil fungsi view_by_date yang ada di cetak_model
            } else if ($filter == '2') { // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');

                $ket = 'Data Transaksi Bulan ' . $nama_bulan[$bulan] . ' ' . $tahun;
                $url_cetak = 'cetak?filter=2&bulan=' . $bulan . '&tahun=' . $tahun;
                $transaksi = $this->cetak_model->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di cetak_model
            } else { // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];

                $ket = 'Data Transaksi Tahun ' . $tahun;
                $url_cetak = 'cetak?filter=3&tahun=' . $tahun;
                $transaksi = $this->cetak_model->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di cetak_model
            }
        } else { // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data Transaksi';
            $url_cetak = 'cetak';
            $transaksi = $this->cetak_model->view_all(); // Panggil fungsi view_all yang ada di cetak_model
        }

        $data['ket'] = $ket;
        $data['transaksi'] = $transaksi;
        $data['url_cetak'] = base_url('karyawan/' . $url_cetak);
        return $data;
    }
    public function cetak()
    {
        // if (isset($_GET['filter']) && !empty($_GET['filter'])) { // Cek apakah user telah memilih filter dan klik tombol tampilkan
        //     $filter = $_GET['filter']; // Ambil data filder yang dipilih user

        //     if ($filter == '1') { // Jika filter nya 1 (per tanggal)
        //         $tgl = $_GET['tanggal'];

        //         $ket = 'Data Transaksi Tanggal ' . date('d-m-y', strtotime($tgl));
        //         $transaksi = $this->cetak_model->view_by_date($tgl); // Panggil fungsi view_by_date yang ada di cetak_model
        //     } else if ($filter == '2') { // Jika filter nya 2 (per bulan)
        //         $bulan = $_GET['bulan'];
        //         $tahun = $_GET['tahun'];
        //         $nama_bulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');

        //         $ket = 'Data Transaksi Bulan ' . $nama_bulan[$bulan] . ' ' . $tahun;
        //         $transaksi = $this->cetak_model->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di cetak_model
        //     } else { // Jika filter nya 3 (per tahun)
        //         $tahun = $_GET['tahun'];

        //         $ket = 'Data Transaksi Tahun ' . $tahun;
        //         $transaksi = $this->cetak_model->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di cetak_model
        //     }
        // } else { // Jika user tidak mengklik tombol tampilkan
        //     $ket = 'Semua Data Transaksi';
        //     $transaksi = $this->cetak_model->view_all(); // Panggil fungsi view_all yang ada di cetak_model
        // }

        // $data['ket'] = $ket;
        // $data['transaksi'] = $transaksi;
        //============================================== diganti dengan filter() ======================================================================
        $data = $this->data();
        $data = $this->filter($data);
        ob_start();
        $this->load->view('karyawan/print', $data);
        $html = ob_get_contents();
        ob_end_clean();

        require_once('./assets/html2pdf/html2pdf.class.php');
        $pdf = new HTML2PDF('P', 'A4', 'en');
        $pdf->WriteHTML($html);
        $pdf->Output('Data Transaksi.pdf', 'D');
    }
}
