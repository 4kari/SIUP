        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800"><?= $active ?></h1>
          <p class="mb-4">Halaman ini akan memperlihatkan kepada anda data transaksi</a>.</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Filter Berdasarkan</h6>
            </div>
            <form method="get" action="<?= base_url('karyawan/transaksi'); ?>">
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
              <a href="<?php echo base_url('karyawan/transaksi'); ?>" class="btn btn-info btn-sm">Reset Filter <i class="fa fa-fw fa-trash"></i></a>
            </form>
            <hr />
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Tabel Data Transaksi</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <legend><?= $ket; ?></legend>
                  <a href="<?= $url_cetak; ?>" class="btn btn-info btn-sm">Cetak Transaksi <i class="fa fa-fw fa-plus"></i></a><br /><br />
                  <thead>
                    <tr>
                      <th>Tanggal</th>
                      <th>Harga</th>
                      <th>Keterangan</th>
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

                        echo "<tr>";
                        echo "<td>" . $tgl . "</td>";
                        echo "<td>" . $data->harga . "</td>";
                        echo "<td>" . $data->keterangan . "</td>";
                        echo "</tr>";
                        $no++;
                      }
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