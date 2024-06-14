<?php
include 'src/header.php';

if(isset($_POST['simpan'])){

  $queryCek = mysqli_query($koneksi, "SELECT * FROM data_siswa WHERE nis = '$_SESSION[id]'");
  $dataCek  = mysqli_fetch_array($queryCek);

  if($dataCek['password'] == $_POST['password1']){
    $simpan = mysqli_query($koneksi, "UPDATE data_siswa SET password = '$_POST[password2]' WHERE nis = '$_SESSION[id]'"); 
    echo "<script>alert('Data Berhasil Disimpan!');window.location='ganti_password.php'</script>";
  }else{
    echo "<script>alert('Password Lama Tidak Cocok!');window.location='ganti_password.php'</script>";
  }
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
          <h3 class="box-title">Ganti Password</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"> <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"> <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
              <label class="form-control-label" for="password1">Password Lama</label>
              <input type="text" class="form-control" name="password1" placeholder="Masukan Password Lama" required>
            </div>
            <div class="form-group">
              <label class="form-control-label" for="password2">Password Baru</label>
              <input type="text" class="form-control" name="password2" placeholder="Masukan Password Baru" required>
            </div>
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