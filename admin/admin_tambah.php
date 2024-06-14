<?php
include 'src/header.php';

if(isset($_POST['simpan'])){
  $simpan = mysqli_query($koneksi, "INSERT INTO data_admin VALUES('','$_POST[nama_admin]','$_POST[username]','$_POST[password]')");
    
  $_SESSION["simpan"]  = 'Data Berhasil Disimpan';

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
          <h3 class="box-title">Tambah Data Akun</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"> <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"> <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
              <label class="form-control-label" for="nama_admin">Nama Admin</label>
              <input type="text" class="form-control" name="nama_admin" placeholder="Masukan Nama Admin" required>
            </div>
            <div class="form-group">
              <label class="form-control-label" for="username">Username</label>
              <input type="text" class="form-control" name="username" placeholder="Masukan Username" required>
            </div>
            <div class="form-group">
              <label class="form-control-label" for="password">Password</label>
              <input type="text" class="form-control" name="password" placeholder="Masukan Password" required>
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
<?php if(@$_SESSION['simpan']){ ?>
<script type='text/javascript'>
 setTimeout(function () { 
 swal({
            title: 'INFORMASI',
            text:  'DATA TERSIMPAN',
            type: 'success',
            timer: 3000,
            showConfirmButton: true
        });  
 },10); 
 window.setTimeout(function(){ 
  window.location.replace('data_admin.php');
 } ,3000); 
</script>
<?php unset($_SESSION['simpan']); } ?>
<?php include 'src/footer.php'; ?>