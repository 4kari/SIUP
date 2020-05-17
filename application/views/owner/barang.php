        <!-- Begin Page Content -->
        <div class="container-fluid">
          <div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800"><?= $active ?></h1>
          <p class="mb-4">Halaman ini akan membantu anda melakukan perhitungan transaksi</a>.</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <div class="row">
                <div class="col-sm-12 col-md-6">
                  <h6 class="m-0 font-weight-bold text-primary">Tabel Data Barang</h6>
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
                      <th>Id Barang</th>
                      <th>Nama Barang</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if (empty($item)) : ?>
                      <tr>
                        <td colspan="12">
                          <div class="alert alert-danger" role="alert">
                            Data not found!
                          </div>
                        </td>
                      </tr>
                    <?php endif; ?>
                    <?php foreach ($item as $i) : ?>
                      <tr>
                        <th scope="row"><?= ++$start; ?></th>
                        <td><?= $i['id']; ?></td>
                        <td><?= $i['nama_barang']; ?></td>
                        <td>
                          <a href="" data-toggle="modal" data-target="#barang<?= $i['id']; ?>" class="btn btn-success btn-sm"><i class="fa fa-fw fa-edit"></i> Edit</a>
                          <a href="<?= base_url() . 'Owner/hapus_barang/' . $i['id']; ?>" data-nama="<?= $i['nama_barang']; ?>" class="btn btn-danger btn-sm DelBarang"></i> Delete</a>
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

        <?php foreach ($item as $i) : ?>
          <!-- Modal Edit -->
          <div class="modal fade" id="barang<?= $i['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="barangLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="barang">Edit Data Barang</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="<?= base_url('Owner/edit_barang/' . $i['id']); ?>" method="POST" class="needs-validation" novalidate>
                  <div class="modal-body">
                    <div class="form-group">
                      <label for="id">Kode Barang</label>
                      <input type="text" class="form-control" id="id" name="id" value="<?= $i['id']; ?>" required>
                      <div class="invalid-feedback">
                        Masukan Kode Barang
                      </div>
                      <?= form_error('id', '<div class="alert-danger" role="alert">', '</div>'); ?>
                    </div>
                    <div class="form-group">
                      <label for="nama_barang">Nama Barang</label>
                      <input type="text" class="form-control" id="nama_barang" name="nama_barang" value=<?= $i['nama_barang']; ?> required>
                      <div class="invalid-feedback">
                        Masukan Nama Barang
                      </div>
                      <?= form_error('nama_barang', '<div class="alert-danger" role="alert">', '</div>'); ?>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
                <h5 class="modal-title" id="barang">Tambah Data Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="<?= base_url('owner/tambah_barang/'); ?>" method="POST" class="needs-validation" novalidate>
                <div class="modal-body">
                  <div class="form-group">
                    <label for="nama_barang">Kode Barang</label>
                    <input type="text" class="form-control" id="id" name="id" placeholder="Kode" required>
                    <div class="invalid-feedback">
                      Masukan Kode Barang
                    </div>
                    <?= form_error('id', '<div class="alert-danger" role="alert">', '</div>'); ?>
                  </div>
                  <div class="form-group">
                    <label for="nama_barang">Nama Barang</label>
                    <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Nama" required>
                    <div class="invalid-feedback">
                      Masukan Nama Barang
                    </div>
                    <?= form_error('nama_barang', '<div class="alert-danger" role="alert">', '</div>'); ?>
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