        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800"><?= $active ?></h1>
          <p class="mb-4">Halaman ini akan membantu anda melakukan perhitungan transaksi</a>.</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Tabel Data Barang</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Id Barang</th>
                      <th>Nama Barang</th>
                    </tr>
                  </thead>
                  <!-- <tfoot>
                    <tr>
                      <th>Id Barang</th>
                      <th>Nama Barang</th>
                    </tr>
                  </tfoot> -->
                  <tbody>
                    <?php if (empty($barang)) : ?>
                      <tr>
                        <td colspan="12">
                          <div class="alert alert-danger" role="alert">
                            Data not found!
                          </div>
                        </td>
                      </tr>
                    <?php endif; ?>
                    <?php foreach ($barang as $i) : ?>
                      <tr>
                        <th scope="row"><?= ++$start; ?></th>
                        <td><?= $i['id']; ?></td>
                        <td><?= $i['nama_barang']; ?></td>
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