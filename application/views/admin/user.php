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
                    <tr>
                      <td>Yusron Angga</td>
                      <td>owner</td>
                      <td>Owner</td>
                      <td>test.jpg</td>
                      <td>
                      <a href="" data-toggle="modal" data-target="#barang<? //echo $item['id']; ?>" class="btn btn-success btn-sm"><i class="fa fa-fw fa-edit"></i>Edit</a>
                      <a href="<?//echo base_url() . 'admin/deletebarang/' . $item['id'] ?>" class="btn btn-danger btn-sm deleteDosen"><i class="fa fa-fw fa-trash"></i>Delete</a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
