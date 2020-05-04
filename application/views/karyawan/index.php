<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800"><?= $active ?></h1>
  <p class="mb-4">Halaman ini akan membantu anda melakukan perhitungan transaksi</a>.</p>

  <!-- Content Row -->

  <div class="row">

    <!-- Area Chart -->
    <div class="col-xl-8 col-lg-7">
      <div class="card shadow mb-4">
        <!-- Card Body -->
        <div class="card-body">
            <form>
              <div class="row">
                <div class="col-lg-4">
                  Barang 1
                </div>
                <div class="form-group col-lg-8">
                    <input type="text" class="form-control form-control-user" name="barang1" id="barang1" placeholder="Barang1">
                </div>
              </div>
              <div class="row">
                <div class="col-lg-4">
                  Barang 2
                </div>
                <div class="form-group col-lg-8">
                    <input type="text" class="form-control form-control-user" name="barang2" id="barang2" placeholder="Barang2">
                </div>
              </div>
              <div class="row">
                <div class="col-lg-4">
                  Barang 3
                </div>
                <div class="form-group col-lg-8">
                    <input type="text" class="form-control form-control-user" name="barang3" id="barang3" placeholder="Barang3">
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-lg-4">
                </div>
                <div class="col-lg-4">
                  <input type="submit" class="btn btn-primary btn-user btn-block" value="Hitung">
                </div>
                <div class="col-lg-4">
                </div>
              </div>
              
            </form>
        </div>
      </div>
    </div>
  </div>
</div>
 <!-- modal tagihan -->
 <div class="modal fade displaycontent" id="detail<?= $u['id'] ?>">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detail Skripsi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <td>Judul</td>
                            <td><?php echo $u['judul']; ?></td>
                        </tr>
                        <tr>
                            <td>Abstrak</td>
                            <td><?php echo $u['abstract']; ?></td>
                        </tr>
                        <tr>
                            <td>Dosen Pembimbing 1</td>
                            <td><?php echo $u['dosbing_1']; ?></td>
                        </tr>
                        <tr>
                            <td>Dosen Pembimbing2</td>
                            <td><?php echo $u['dosbing_2']; ?></td>
                        </tr>
                        <tr>
                            <td>Prodi</td>
                            <td><?php echo $u['prodi']; ?></td>
                        </tr>
                        <tr>
                            <td>status</td>
                            <td><?php echo $this->db->get_where('status', ['id' => $u['status']])->row_array()['ket']; ?></td>
                        </tr>
                        <tr>
                            <td>Nilai</td>
                            <?php if ($u['nilai'] != 0) : ?>
                                <td><?= $u['nilai']; ?></td>
                            <?php else : ?>
                                <td>N/A</td>
                            <?php endif; ?>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- end modal detail -->
