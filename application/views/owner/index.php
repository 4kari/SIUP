<!-- Begin Page Content -->
<div class="container-fluid">
  <div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800"><?= $active ?></h1>
  <p class="mb-4">Halaman ini akan membantu anda melakukan perhitungan transaksi</a>.</p>
  <!-- Content Row -->

  <div class="row">
    <!-- Area Chart -->
    <div class="col-xl-8 col-lg-7">
      <div class="card shadow mb-4">
        <!-- Card Body -->
        <div class="card-body">
          <form>
            <div class="row">
              <div class="col-lg-4">
                Hitam Putih
              </div>
              <div class="form-group col-lg-8">
                <input type="number" class="form-control form-control-user" name="barang1" id="barang1" placeholder="Jumlah Halaman" value=0>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-4">
                1/4 Warna
              </div>
              <div class="form-group col-lg-8">
                <input type="number" class="form-control form-control-user" name="barang2" id="barang2" placeholder="Jumlah Halaman" value=0>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-4">
                1/2 Warna
              </div>
              <div class="form-group col-lg-8">
                <input type="number" class="form-control form-control-user" name="barang3" id="barang3" placeholder="Jumlah Halaman" value=0>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-4">
                Full Warna
              </div>
              <div class="form-group col-lg-8">
                <input type="number" class="form-control form-control-user" name="barang4" id="barang4" placeholder="Jumlah Halaman" value=0>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-lg-4">
              </div>
              <div class="col-lg-4">
                <a href="" data-toggle="modal" data-target="#Mtagihan" class="btn btn-primary btn-user btn-block" onclick='hitung()'>Hitung</a>
              </div>
              <div class="col-lg-4">
              </div>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- modal tagihan -->
<div class="modal fade" id="Mtagihan" tabindex="-1" role="dialog" aria-labelledby="mahasiswaEditLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="<?= base_url('owner/tambah_transaksi/'); ?>" method="POST" class="needs-validation" novalidate>
        <div class="modal-header">
          <h4 class="modal-title">Tagihan Pembayaran</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          <p id="tagihanfield">Rp. 0</p>
          <input type="hidden" name="harga" id="harga">
          <input type="hidden" name="keterangan" id="keterangan">
          <span style="display : none">
            <input type="date" name="tanggal" id="tanggal" value='<?= date("Y-m-d"); ?>'>
          </span>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <input type="submit" class="btn btn-primary" value="Simpan">
        </div>
      </form>
    </div>
  </div>
</div>
<!-- end modal detail -->