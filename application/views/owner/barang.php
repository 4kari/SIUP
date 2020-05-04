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
                    <tr>
                      <td>1</td>
                      <td>Kertas A4</td>
                      <td>
                      <a href="" data-toggle="modal" data-target="#barang<? //echo $item['id']; ?>" class="btn btn-success btn-sm"><i class="fa fa-fw fa-edit"></i>Edit</a>
                      <a href="<? //echo base_url() . 'owner/deletebarang/' . $item['id'] ?>" class="btn btn-danger btn-sm deleteDosen"><i class="fa fa-fw fa-trash"></i>Delete</a>
                      </td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>Buffallo</td>
                      <td>
                      <a href="" data-toggle="modal" data-target="#barang<? //echo $item['id']; ?>" class="btn btn-success btn-sm"><i class="fa fa-fw fa-edit"></i>Edit</a>
                      <a href="<?//echo base_url() . 'owner/deletebarang/' . $item['id'] ?>" class="btn btn-danger btn-sm deleteDosen"><i class="fa fa-fw fa-trash"></i>Delete</a>
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