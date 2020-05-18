        <!-- Begin Page Content -->
        <div class="container-fluid">
          <div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800"><?= $active ?></h1>
          <p class="mb-4">Halaman ini akan memperlihatkan kepada anda data transaksi</a>.</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Filter Berdasarkan</h6>
            </div>
            <form method="get" action="<?= base_url('owner/transaksi'); ?>">
              <div class="form-group">
                <select class="form-control" name="filter" id="filter" style="width: 200px; margin:5px">
                  <option value="">Pilih</option>
                  <option value="1">Per Tanggal</option>
                  <option value="2">Per Bulan</option>
                  <option value="3">Per Tahun</option>
                </select>
              </div>

              <div id="form-tanggal">
                <label class="ml-1">Tanggal</label><br>
                <input type="text" name="tanggal" class="input-tanggal" style="margin:5px" autocomplete="off" />
                <br /><br />
              </div>

              <div id="form-bulan" class="form-group">
                <label class="ml-1">Bulan</label><br>
                <select name="bulan" class="form-control" style="width: 200px; margin:5px">
                  <option value="">Pilih</option>
                  <option value="1">Januari</option>
                  <option value="2">Februari</option>
                  <option value="3">Maret</option>
                  <option value="4">April</option>
                  <option value="5">Mei</option>
                  <option value="6">Juni</option>
                  <option value="7">Juli</option>
                  <option value="8">Agustus</option>
                  <option value="9">September</option>
                  <option value="10">Oktober</option>
                  <option value="11">November</option>
                  <option value="12">Desember</option>
                </select>
              </div>

              <div id="form-tahun" class="form-group">
                <label class="ml-1">Tahun</label><br>
                <select name="tahun" class="form-control" style="width: 200px; margin:5px">
                  <option value="">Pilih</option>
                  <?php
                  foreach ($option_tahun as $data) { // Ambil data tahun dari model yang dikirim dari controller
                    echo '<option value="' . $data->tahun . '">' . $data->tahun . '</option>';
                  }
                  ?>
                </select>
              </div>

              <button type="submit" class="btn ml-1 btn-primary btn-sm">Tampilkan</button>
              <a href="<?php echo base_url('owner/transaksi'); ?>" class="btn btn-info btn-sm">Reset Filter <i class="fa fa-fw fa-trash"></i></a>
            </form>
            <hr />
            <div class="card-header py-3">
              <div class="row">
                <div class="col-sm-12 col-md-6">
                  <h6 class="m-0 font-weight-bold text-primary">Tabel Data Transaksi</h6>
                </div>
                <div class="col-sm-12 col-md-6 text-right">
                  <a href="" data-toggle="modal" data-target="#tambah" class="btn btn-info btn-sm"><i class="fa fa-fw fa-plus"></i> Tambah</a>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <legend><?= $ket; ?></legend>
                  <a href="<?= $url_cetak; ?>" class="btn btn-info mr-2 btn-sm">Export Transaksi <i class="fa fa-fw fa-plus"></i></a>
                  <!-- <a href="<?php echo base_url('karyawan/printer?filter='); ?>" class="btn btn-danger btn-sm">Cetak Transaksi <i class="fa fa-fw fa-plus"></i></a><br></br> -->
                  <br></br>
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Tanggal</th>
                      <th>Harga</th>
                      <th>Keterangan</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if (empty($transaksi)) : ?>
                      <tr>
                        <td colspan="12">
                          <div class="alert alert-danger" role="alert">
                            Data not found!
                          </div>
                        </td>
                      </tr>
                    <?php endif; ?>
                    <?php
                    if (!empty($transaksi)) {
                      $no = 1;
                      foreach ($transaksi as $data) {
                        $tgl = date('d-m-Y', strtotime($data->tanggal));
                        ?>
                      <tr>
                        <th scope="row"><?= ++$start; ?></th>
                        <td><?= $data->tanggal; ?></td>
                        <td><?= $data->harga; ?></td>
                        <td><?= $data->keterangan; ?></td>
                        <td>
                          <a href="" data-toggle="modal" data-target="#transaksi<?= $data->id; ?>" class="btn btn-success btn-sm"><i class="fa fa-fw fa-edit"></i> Edit</a>
                          <a href="<?= base_url() . 'Owner/hapus_transaksi/' . $data->id; ?>" data-nama="<?= $data->keterangan; ?>" class="btn btn-danger btn-sm DelTrans"><i class="fa fa-fw fa-trash"></i> Delete</a>
                        </td>
                      </tr>
                    <?php  }
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <?php foreach ($item as $i) : ?>

          <!-- Modal Edit -->
          <div class="modal fade" id="transaksi<?= $i['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="TransaksiLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="transaksi">Edit Data Transaksi</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="<?= base_url('Owner/edit_transaksi/' . $i['id']); ?>" method="POST" class="needs-validation" novalidate>
                  <div class="modal-body">
                    <div class="form-group">
                      <label for="tanggal">Tanggal</label>
                      <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= $i['tanggal']; ?>" required>
                      <div class="invalid-feedback">
                        Masukan Tanggal Transaksi
                      </div>
                      <?= form_error('tanggal', '<div class="alert-danger" role="alert">', '</div>'); ?>
                    </div>
                    <div class="form-group">
                      <label for="harga">Harga</label>
                      <input type="number" class="form-control" name="harga" value="<?= $i['harga']; ?>" required>
                      <div class="invalid-feedback">
                        Masukan Harga Transaksi
                      </div>
                      <?= form_error('harga', '<div class="alert-danger" role="alert">', '</div>'); ?>
                    </div>
                    <div class="form-group">
                      <label for="keterangan">Keterangan</label>
                      <input type="text" class="form-control" name="keterangan" value="<?= $i['keterangan']; ?>" required>
                      <div class="invalid-feedback">
                        Masukan Keterangan Transaksi
                      </div>
                      <?= form_error('keterangan', '<div class="alert-danger" role="alert">', '</div>'); ?>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Edit</button>
                  </div>
                </form>
              </div>
            </div>
          </div>

        <?php endforeach; ?>
        
        <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="barangLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="barang">Tambah Data Transaksi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form>
                <div class="modal-body">
                  <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= date("Y-m-d"); ?>" required readonly>
                    <div class="invalid-feedback">
                      Masukan Tanggal Transaksi
                    </div>
                  </div>
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
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button data-dismiss="modal" data-toggle="modal" data-target="#Mtagihan" class="btn btn-primary" onclick="hitung()">Tambah</button>
                </div>
              </form>
            </div>
          </div>
        </div>
<!-- modal tagihan -->
<div class="modal fade" id="Mtagihan" tabindex="-1" role="dialog" aria-labelledby="mahasiswaEditLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="<?= base_url('Owner/tambah_transaksi/'); ?>" method="POST" class="needs-validation" novalidate>
        <div class="modal-header">
          <h4 class="modal-title">Tagihan Pembayaran</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-lg-4">
              Hitam Putih
            </div>
            <div class="form-group col-lg-8">
              <p id="satu">0</p>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-4">
              1/4 Warna
            </div>
            <div class="form-group col-lg-8">
              <p id="dua">0</p>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-4">
              1/2 Warna
            </div>
            <div class="form-group col-lg-8">
              <p id="tiga">0</p>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-4">
              Full Warna
            </div>
            <div class="form-group col-lg-8">
              <p id="empat">0</p>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-4">
              Total
            </div>
            <div class="form-group col-lg-8">
              <p id="tagihanfield">Total : Rp. 0</p>
            </div>
          </div>
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