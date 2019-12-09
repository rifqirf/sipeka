  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="<?= base_url(); ?>assets/jquery-3.4.1.min.js"></script>
  <script src="<?= base_url(); ?>assets/popper.min.js"></script>
  <script src="<?= base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>

  <script src="<?= base_url(); ?>assets/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url(); ?>assets/datatables/dataTables.bootstrap4.min.js"></script>
  <script>
  $(document).ready( function () {
      $('#tabel-indikator').DataTable();
      $('#tabel-subindikator').DataTable();
      $('#tabel-guru').DataTable();
      $('#tabel-jabatan').DataTable();
      $('#tabel-raport').DataTable();
      var table = $('#table-ex').DataTable( {
          scrollY:        "300px",
          scrollX:        true,
          scrollCollapse: true,
          paging:         false,
          fixedColumns:   {
              leftColumns: 1,
              rightColumns: 1
          }
      } );
  });
  </script>
</body>
</html>