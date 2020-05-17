        <!-- Begin Page Content -->
        <div class="container-fluid">
          <div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800"><?= $active ?></h1>
          <p class="mb-4">Halaman ini akan memperlihatkan kepada anda data transaksi</a>.</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
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
                    <?php foreach ($transaksi as $i) : ?>
                      <tr>
                        <th scope="row"><?= ++$start; ?></th>
                        <td><?= $i['tanggal']; ?></td>
                        <td><?= $i['harga']; ?></td>
                        <td><?= $i['keterangan']; ?></td>
                        <td>
                          <a href="" data-toggle="modal" data-target="#transaksi<?= $i['id']; ?>" class="btn btn-success btn-sm"><i class="fa fa-fw fa-edit"></i> Edit</a>
                          <a href="<?= base_url() . 'Admin/hapus_transaksi/' . $i['id']; ?>" data-nama="<?= $i['keterangan']; ?>" class="btn btn-danger btn-sm DelTrans"><i class="fa fa-fw fa-trash"></i> Delete</a>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <?php foreach ($transaksi as $i) : ?>

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
                <form action="<?= base_url('Admin/edit_transaksi/' . $i['id']); ?>" method="POST" class="needs-validation" novalidate>
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
                      <input type="number" class="form-control" id="harga" name="harga" value="<?= $i['harga']; ?>" required>
                      <div class="invalid-feedback">
                        Masukan Harga Transaksi
                      </div>
                      <?= form_error('harga', '<div class="alert-danger" role="alert">', '</div>'); ?>
                    </div>
                    <div class="form-group">
                      <label for="keterangan">Keterangan</label>
                      <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?= $i['keterangan']; ?>" required>
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

        <!-- Modal tambah transaksi -->
        <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="barangLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="barang">Tambah Data Transaksi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="<?= base_url('Admin/tambah_transaksi/'); ?>" method="POST" class="needs-validation" novalidate>
                <div class="modal-body">
                  <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= date("Y-m-d"); ?>" required>
                    <div class="invalid-feedback">
                      Masukan Tanggal Transaksi
                    </div>
                    <?= form_error('tanggal', '<div class="alert-danger" role="alert">', '</div>'); ?>
                  </div>
                  <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="number" class="form-control" id="harga" name="harga" required>
                    <div class="invalid-feedback">
                      Masukan Harga Transaksi
                    </div>
                    <?= form_error('harga', '<div class="alert-danger" role="alert">', '</div>'); ?>
                  </div>
                  <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <input type="text" class="form-control" id="keterangan" name="keterangan" required>
                    <div class="invalid-feedback">
                      Masukan Keterangan Transaksi
                    </div>
                    <?= form_error('keterangan', '<div class="alert-danger" role="alert">', '</div>'); ?>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
              </form>
            </div>
          </div>
        </div>