<?php
include 'src/header.php';

if(isset($_POST['simpan'])){

  if(!preg_match("/^[0-9]*$/", $_POST['nis'])){
    echo "<script>alert('Input Hanya Boleh Berupa Angka!');window.location='siswa_tambah.php'</script>";
  }elseif(!preg_match("/^[0-9]*$/", $_POST['c1'])){
    echo "<script>alert('Input Hanya Boleh Berupa Angka!');window.location='siswa_tambah.php'</script>";
  }elseif(!preg_match("/^[0-9]*$/", $_POST['c2'])){
    echo "<script>alert('Input Hanya Boleh Berupa Angka!');window.location='siswa_tambah.php'</script>";
  }elseif(!preg_match("/^[0-9]*$/", $_POST['c3'])){
    echo "<script>alert('Input Hanya Boleh Berupa Angka!');window.location='siswa_tambah.php'</script>";
  }elseif(!preg_match("/^[0-9]*$/", $_POST['c4'])){
    echo "<script>alert('Input Hanya Boleh Berupa Angka!');window.location='siswa_tambah.php'</script>";
  }elseif(!preg_match("/^[0-9]*$/", $_POST['c5'])){
    echo "<script>alert('Input Hanya Boleh Berupa Angka!');window.location='siswa_tambah.php'</script>";
  }elseif(!preg_match("/^[a-z]*$/", $_POST['nama_siswa'])){
    echo "<script>alert('Input Hanya Boleh Berupa Huruf!');window.location='siswa_tambah.php'</script>";
  }else{
    $simpan1 = mysqli_query($koneksi, "INSERT INTO data_siswa VALUES('','$_POST[nis]','$_POST[nama_siswa]','$_POST[alamat_siswa]','$_POST[nis]')");
    $simpan2 = mysqli_query($koneksi, "INSERT INTO data_nilai VALUES('','$_POST[nis]','$_POST[c1]','$_POST[c2]','$_POST[c3]','$_POST[c4]','$_POST[c5]')");

    $query = mysqli_query($koneksi, "SELECT max(id_nilai) as idMax FROM data_nilai");
    $data1 = mysqli_fetch_array($query);

    $simpan3 = mysqli_query($koneksi, "INSERT INTO data_hasil VALUES('','$data1[idMax]','Cluster-2')");
    $_SESSION["simpan"]  = 'Data Berhasil Disimpan';
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
          <h3 class="box-title">Tambah Data Siswa</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"> <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"> <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          <form action="" method="POST">
            <table class="table table-bordered" id="example1" width="100%" cellspacing="0">
              <tr bgcolor="#6699FF"><td><h4 align="center">DATA DIRI SISWA</h4></tr>
            </table>
            <table class="table table-no-bordered" id="example1" width="100%" cellspacing="0">
              <tr><td>NISN : <input type="text" name="nis" class="form-control" placeholder="Masukan NISN Siswa" required></td></tr>
              <tr><td>Nama Lengkap : <input type="text" onkeypress="return event.charCode < 48 || event.charCode  >57" name="nama_siswa" class="form-control" placeholder="Masukan Nama Siswa" required></td></tr>
              <tr><td>Alamat : <input type="text" name="alamat_siswa" class="form-control" placeholder="Masukan Alamat Siswa" required></td></tr>
            </table>
            <table class="table table-bordered" id="example1" width="100%" cellspacing="0">
              <tr bgcolor="#6699FF"><td><h4 align="center">DATA NILAI SISWA</h4></tr>
            </table>
            <table class="table table-no-bordered" id="example1" width="100%" cellspacing="0">
              <tr>
                <td>NILAI BAHASA INDONESIA : <input type="number" min="0" max="100" name="c1" class="form-control" autocomplete="off" placeholder="Masukan NILAI BAHASA INDONESIA" required></td>
                <td>NILAI BAHASA INGGRIS : <input type="number" name="c2" class="form-control" placeholder="Masukan NILAI BAHASA INGGRIS" required></td>
                <td>NILAI MATEMATIKA : <input type="number" name="c3" class="form-control" placeholder="Masukan NILAI MATEMATIKA" required></td>
                <td>NILAI FISIKA : <input type="number" name="c4" class="form-control" placeholder="Masukan NILAI FISIKA" required></td>
                <td>NILAI BIOLOGI : <input type="number" name="c5" class="form-control" placeholder="Masukan NILAI BIOLOGI" required></td>
              </tr>
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
  window.location.replace('data_siswa.php');
 } ,3000); 
</script>
<?php unset($_SESSION['simpan']); } ?>

<?php include 'src/footer.php'; ?>