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
                      <th>Nama User</th>
                      <th>Username</th>
                      <th>Level</th>
                      <th>Gambar</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Nama User</th>
                      <th>Username</th>
                      <th>Level</th>
                      <th>Gambar</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php foreach ($Muser as $item) : ?>
                      <tr>
                        <td><?=$item['nama_user'];?></td>
                        <td><?=$item['username'];?></td>
                        <td><?=$item['level'];?></td>
                        <td><?=$item['gambar'];?></td>
                        <td>
                        <a href="" data-toggle="modal" data-target="#user<?= $item['username']; ?>" class="btn btn-success btn-sm"><i class="fa fa-fw fa-edit"></i>Edit</a>
                        <a href="<?//echo base_url() . 'admin/deletebarang/' . $item['id'] ?>" class="btn btn-danger btn-sm deleteDosen"><i class="fa fa-fw fa-trash"></i>Delete</a>
                        </td>
                      </tr>
                    <?php endforeach;?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
<?php foreach ($Muser as $item) : ?>
<!-- Modal Edit -->
<div class="modal fade" id="user<?= $item['username'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="dosenlabel">Edit Data User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?= base_url('admin/updateUser/' . $item['id']); ?>" method="POST">
          <div class="modal-body">
            <div class="form-group">
              <label for="nip">Tanggal</label>
              <input type="text" class="form-control" id="tanggal" name="tanggal" value="<?= $item['tanggal']; ?>">
            </div>
            <div class="form-group">
              <label for="nip">Harga</label>
              <input type="text" class="form-control" id="harga" name="harga" value="<?= $item['harga']; ?>">
            </div>
            <div class="form-group">
              <label for="nama">Keterangan</label>
              <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?= $item['keterangan']; ?>">
              <?= form_error('nama', '<div class="alert-danger" role="alert">', '</div>'); ?>
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
<?php endforeach;?>