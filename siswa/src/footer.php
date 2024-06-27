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

<script src="../assets/bower_components/jquery/dist/jquery.min.js"></script>
<script src="../assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="../assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="../assets/bower_components/fastclick/lib/fastclick.js"></script>
<script src="../assets/dist/js/adminlte.min.js"></script>
<script src="../assets/dist/js/demo.js"></script>
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
