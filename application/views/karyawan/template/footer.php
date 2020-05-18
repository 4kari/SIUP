<!-- Footer -->
<footer class="sticky-footer bg-white">
  <div class="container my-auto">
    <div class="copyright text-center my-auto">
      <span>Copyright &copy; SI-UP</span>
    </div>
  </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">keluar?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">ketika anda menekan tombol logout anda akan keluar dari akun ini</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a class="btn btn-primary" href="<?= base_url(); ?>Auth/logout">Logout</a>
      </div>
    </div>
  </div>
</div>
<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?= base_url('assets/'); ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/sweet/sweetalert2.all.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/AlertSweet.js"></script>
<script src="<?= base_url('assets/'); ?>js/base.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url('assets/'); ?>js/demo/datatables-demo.js"></script>

<!-- Import JS keperluan cetak Transaksi -->
<script src="<?= base_url('assets/jquery.min.js'); ?>"></script>
<script src="<?= base_url('assets/jquery-ui/jquery-ui.min.js'); ?>"></script> <!-- Load file plugin js jquery-ui -->

<script>
  $(document).ready(function() { // Ketika halaman selesai di load
    $('.input-tanggal').datepicker({
      dateFormat: 'yy-mm-dd' // Set format tanggalnya jadi yyyy-mm-dd
    });

    $('#form-tanggal, #form-bulan, #form-tahun').hide(); // Sebagai default kita sembunyikan form filter tanggal, bulan & tahunnya

    $('#filter').change(function() { // Ketika user memilih filter
      if ($(this).val() == '1') { // Jika filter nya 1 (per tanggal)
        $('#form-bulan, #form-tahun').hide(); // Sembunyikan form bulan dan tahun
        $('#form-tanggal').show(); // Tampilkan form tanggal
      } else if ($(this).val() == '2') { // Jika filter nya 2 (per bulan)
        $('#form-tanggal').hide(); // Sembunyikan form tanggal
        $('#form-bulan, #form-tahun').show(); // Tampilkan form bulan dan tahun
      } else { // Jika filternya 3 (per tahun)
        $('#form-tanggal, #form-bulan').hide(); // Sembunyikan form tanggal dan bulan
        $('#form-tahun').show(); // Tampilkan form tahun
      }

      $('#form-tanggal input, #form-bulan select, #form-tahun select').val(''); // Clear data pada textbox tanggal, combobox bulan & tahun
    })
  })
</script>

<script>
  (function() {
    'use strict';
    window.addEventListener('load', function() {
      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.getElementsByClassName('needs-validation');
      // Loop over them and prevent submission
      var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
          if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
      });
    }, false);
  })();
</script>
<script>
$(document).ready(function(){
  $("#tambah").modal('show');
});
</script>

</body>

</html>