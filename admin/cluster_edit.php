<?php
include 'src/header.php';

if(isset($_POST['simpan'])){
  $simpan = mysqli_query($koneksi, "UPDATE data_cluster SET nama_cluster = '$_POST[nama_cluster]', id_nilai = '$_POST[id_nilai]' WHERE id_cluster = '$_GET[id_cluster]'");
  $_SESSION["simpan"]  = 'Data Berhasil Dihapus';
header("Location: data_cluster.php");
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
          <h3 class="box-title">Edit Data Cluster</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"> <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"> <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          <?php
          $id    = $_GET['id_cluster'];
          $query = mysqli_query($koneksi, "SELECT data_cluster.*, data_nilai.* FROM data_cluster, data_nilai WHERE data_cluster.id_nilai = data_nilai.id_nilai AND data_cluster.id_cluster = '$id'");
          $data  = mysqli_fetch_array($query);
          ?>
          <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
              <label class="form-control-label" for="nama_cluster">Nama Cluster</label>
              <input type="text" class="form-control" name="nama_cluster" value="<?= $data['nama_cluster'] ?>" placeholder="Masukan Nama Cluster" required>
            </div>
            <div class="form-group">
              <label class="form-control-label" for="id_nilai">Nilai Cluster</label>
              <select class="form-control" name="id_nilai" required>
                <?php
                $queryNilai = mysqli_query($koneksi, "SELECT * FROM data_nilai");
                while($dataNIlai = mysqli_fetch_array($queryNilai)){
                  echo "<option value = '$dataNIlai[id_nilai]'>"."ID Nilai=".$dataNIlai['id_nilai']." C1=".$dataNIlai['c1']." C2=".$dataNIlai['c2']." C3=".$dataNIlai['c3']." C4=".$dataNIlai['c4']." C5=".$dataNIlai['c5']."</option>";
                }
                ?>
              </select>
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
  window.location.replace('data_cluster.php');
 } ,3000); 
</script>
<?php unset($_SESSION['simpan']); } ?>
<?php include 'src/footer.php'; ?>