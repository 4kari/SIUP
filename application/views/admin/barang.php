        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800"><?= $active ?></h1>
          <p class="mb-4">Halaman ini akan membantu anda melakukan perhitungan transaksi</a>.</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                      <th>Id Barang</th>
                      <th>Nama Barang</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Id Barang</th>
                      <th>Nama Barang</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  <?php foreach ($barang as $item) : ?>
                    <tr>
                      <td><?=$item['id'];?></td>
                      <td><?=$item['nama_barang'];?></td>
                      <td>
                      <a href="" data-toggle="modal" data-target="#barang<?= $item['id']; ?>" class="btn btn-success btn-sm"><i class="fa fa-fw fa-edit"></i>Edit</a>
                      <a href="<?=base_url() . 'admin/deletebarang/' . $item['id'] ?>" class="btn btn-danger btn-sm deleteDosen"><i class="fa fa-fw fa-trash"></i>Delete</a>
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

<?php foreach ($barang as $item) : ?>
  <!-- Modal Edit -->
  <div class="modal fade" id="barang<?= $item['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="dosenlabel">Edit Data Barang</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?= base_url('admin/updateUser/' . $item['id']); ?>" method="POST">
          <div class="modal-body">
            <div class="form-group">
              <label for="nip">Nama</label>
              <input type="text" class="form-control" id="nama" name="nama" value="<?= $item['id']; ?>">
            </div>
            <div class="form-group">
              <label for="nama">Username</label>
              <input type="text" class="form-control" id="nama" name="nama" value="<?= $item['nama_barang']; ?>">
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