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
                  <h6 class="m-0 font-weight-bold text-primary">Tabel Data User</h6>
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
                      <th>Nama User</th>
                      <th>Username</th>
                      <th>Level</th>
                      <th>Gambar</th>
                      <th>Action</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php if (empty($Muser)) : ?>
                      <tr>
                        <td colspan="12">
                          <div class="alert alert-danger" role="alert">
                            Data not found!
                          </div>
                        </td>
                      </tr>
                    <?php endif; ?>
                    <?php foreach ($Muser as $item) : ?>
                      <tr>
                        <td><?= $item['nama_user']; ?></td>
                        <td><?= $item['username']; ?></td>
                        <td><?= $item['level']; ?></td>
                        <td><?= $item['gambar']; ?></td>
                        <td>
                          <a href="" data-toggle="modal" data-target="#user<?= $item['username']; ?>" class="btn btn-success btn-sm"><i class="fa fa-fw fa-edit"></i>Edit</a>
                          <a href="<?= base_url() . 'admin/hapus_user/' . $item['username']; ?>" data-nama="<?= $item['nama_user']; ?>" class="btn btn-danger btn-sm DelUser"><i class="fa fa-fw fa-trash"></i>Delete</a>
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
        <?php foreach ($Muser as $item) : ?>
          <!-- Modal Edit -->
          <div class="modal fade" id="user<?= $item['username'] ?>" tabindex="-1" role="dialog" aria-labelledby="userlabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="userlabel">Edit Data User</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="<?= base_url('admin/edit_user/' . $item['username']); ?>" method="POST" class="needs-validation" novalidate>
                  <div class="modal-body">
                    <div class="form-group">
                      <label for="nama_user">Nama User</label>
                      <input type="text" class="form-control" id="nama_user" name="nama_user" value="<?= $item['nama_user']; ?>" required>
                      <div class="invalid-feedback">
                        Masukan Nama User
                      </div>
                      <?= form_error('nama_user', '<div class="alert-danger" role="alert">', '</div>'); ?>
                    </div>
                    <div class="form-group">
                      <label for="username">Username</label>
                      <input type="text" class="form-control" id="username" name="username" value="<?= $item['username']; ?>" required>
                      <div class="invalid-feedback">
                        Masukan Username
                      </div>
                      <?= form_error('username', '<div class="alert-danger" role="alert">', '</div>'); ?>
                    </div>
                    <div class="form-group">
                      <label for="level">Level User</label>
                      <select name="level" id="level" class="form-control" required>
                        <?php foreach ($level as $l) {
                          if ($item['level'] == $l['level_user']) {
                            echo "<option value='$l[id]' selected>$l[level_user]</option>";
                          } else {
                            echo "<option value='$l[id]'>$l[level_user]</option>";
                          }
                        }
                        ?>
                      </select>
                      <?= form_error('level', '<div class="alert-danger" role="alert">', '</div>'); ?>
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

        <!-- Modal tambah user -->
        <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="barangLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="barang">Tambah Data Transaksi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="<?= base_url('admin/tambah_user/'); ?>" method="POST" class="needs-validation" novalidate>
                <div class="modal-body">
                  <div class="form-group">
                    <label for="nama_user">Nama User</label>
                    <input type="text" class="form-control" id="nama_user" name="nama_user" placeholder="Nama" required>
                    <div class="invalid-feedback">
                      Masukan Nama User
                    </div>
                    <?= form_error('nama_user', '<div class="alert-danger" role="alert">', '</div>'); ?>
                  </div>
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                    <div class="invalid-feedback">
                      Masukan Username
                    </div>
                    <?= form_error('username', '<div class="alert-danger" role="alert">', '</div>'); ?>
                  </div>
                  <div class="form-group">
                    <label for="password">Password User</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                    <div class="invalid-feedback">
                      Masukan Password
                    </div>
                    <?= form_error('password', '<div class="alert-danger" role="alert">', '</div>'); ?>
                  </div>
                  <div class="form-group">
                    <label for="level">Level User</label>
                    <select name="level" id="level" class="form-control" required>
                      <option value="">- Pilih Level -</option>
                      <?php foreach ($level as $l) {
                        echo "<option value='$l[id]'>$l[level_user]</option>";
                      }
                      ?>
                    </select>
                    <?= form_error('level', '<div class="alert-danger" role="alert">', '</div>'); ?>
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