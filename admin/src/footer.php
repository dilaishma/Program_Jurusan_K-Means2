<footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>K-MEANS</b> CLUSTERING
    </div>
    <strong><a href="index.php">K-MEANS CLUSTERING</a>.</strong> Penentuan Cluster Penyakit PAsien Rawat Jalan Puskesmas Kecamatan Ngemplak, Boyolali.
</footer>
        </form>
      </div>

    </div>
  </aside>

  <div class="control-sidebar-bg"></div>
</div>



<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
        </script>
        <!-- jangan lupa menambahkan script js sweet alert di bawah ini  -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>
<script src="../assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="../assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="../assets/bower_components/fastclick/lib/fastclick.js"></script>

<script src="../assets/dist/js/adminlte.min.js"></script>
<script src="../assets/dist/js/demo.js"></script>


<?php if(@$_SESSION['sukses']){ ?>
  <script>
    swal("Selamat Datang <?= $dt['nama_admin'] ?>!", "<?php echo $_SESSION['sukses']; ?>", "success");
  </script>
<?php unset($_SESSION['sukses']); } ?>

<?php if(@$_SESSION['hapus']){ ?>
  <script>
    swal("INFORMASI", "<?php echo $_SESSION['hapus']; ?>", "success");
  </script>
<?php unset($_SESSION['hapus']); } ?>

<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })
</script>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable()
    $('#example3').DataTable()
    $('#example4').DataTable()
    $('#example5').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>


</body>
</html>
