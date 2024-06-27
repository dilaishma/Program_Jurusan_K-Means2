<?php
include 'src/header.php';

if(isset($_POST['simpan'])){

  $nis   = $_POST['nis'];
  $nama  = $_POST['nama_siswa'];
  $alamt = $_POST['alamat_siswa'];

  $simpan1 = mysqli_query($koneksi, "UPDATE data_siswa SET nama_siswa = '$nama', alamat_siswa = '$alamt' WHERE nis = '$nis'");

  echo "<script>alert('Data Berhasil Disimpan!');window.location='data_siswa.php'</script>";
}
?>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        K-MEANS CLUSTERING
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Tambah Data Penyakit</h3>
          <?php
          $id = $_GET['nis'];
          $query = mysqli_query($koneksi, "SELECT data_nilai.*, data_siswa.* FROM data_nilai, data_siswa WHERE data_nilai.nis = data_siswa.nis AND data_siswa.nis = '$id'");
          $data = mysqli_fetch_array($query);
          ?>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"> <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"> <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          <form action="" method="POST">
            <table class="table table-bordered" id="example1" width="100%" cellspacing="0">
              <tr bgcolor="#6699FF"><td><h4 align="center">DATA PENYAKIT</h4></tr>
            </table>
            <table class="table table-no-bordered" id="example1" width="100%" cellspacing="0">
              <tr><td>ID Penyakit : <input type="text" name="nis" class="form-control" value="<?= $data['nis'] ?>" readonly></td></tr>
              <tr><td>NamaPenyakit : <input type="text" onkeypress="return event.charCode < 48 || event.charCode  >57" name="nama_siswa" class="form-control" value="<?= $data['nama_siswa'] ?>" placeholder="Masukan Nama Penyakit" required></td></tr>
              <tr><td>Deskripsi Penyakit : <input type="text" name="alamat_siswa" class="form-control" value="<?= $data['alamat_siswa'] ?>" placeholder="Masukan Deskripsi Penyakit" required></td></tr>
            </table>
            <div class="form-group">
              <button type="submit" class='d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm' name="simpan"><span aria-hidden="true"></span>Simpan</button>
            </div>
          </form>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
        
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php include 'src/footer.php'; ?>