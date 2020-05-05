        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800"><?= $active ?></h1>
          <p class="mb-4">Halaman ini akan memperlihatkan kepada anda data transaksi</a>.</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Tabel Data Transaksi</h6>
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
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Tanggal</th>
                      <th>Harga</th>
                      <th>Keterangan</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
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
                        <td><?= $i['tanggal']; ?></td>
                        <td><?= $i['harga']; ?></td>
                        <td><?= $i['keterangan']; ?></td>
                        <td>
                          <a href="" data-toggle="modal" data-target="#barang<?= $i['id']; ?>" class="btn btn-success btn-sm"><i class="fa fa-fw fa-edit"></i> Edit</a>
                          <a href="<? //echo base_url() . 'owner/deletebarang/' . $item['id'] 
                                    ?>" class="btn btn-danger btn-sm deleteDosen"><i class="fa fa-fw fa-trash"></i> Delete</a>
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

        <?php foreach ($item as $i) :
        ?>

          <!-- Modal Edit -->
          <div class="modal fade" id="barang<?= $i['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="barangLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="barang">Edit Data Transaksi</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="<?= base_url('owner/updateTransaksi/' . $i['id']); ?>" method="POST">
                  <div class="modal-body">
                    <div class="form-group">
                      <label for="harga">Harga</label>
                      <input type="text" class="form-control" id="harga" name="harga" value="<?= $i['harga']; ?>">
                      <?= form_error('harga', '<div class="alert-danger" role="alert">', '</div>'); ?>
                    </div>
                    <div class="form-group">
                      <label for="alamat">Keterangan</label>
                      <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?= $i['keterangan']; ?>">
                      <?= form_error('keterangan', '<div class="alert-danger" role="alert">', '</div>'); ?>
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