<?php
include 'src/header.php';

// Mulai session
session_start();

// Pastikan koneksi database telah disertakan
include 'koneksi.php';

if(isset($_POST['simpan'])){
  // Validasi input
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
  }elseif(!preg_match("/^[a-zA-Z\s]*$/", $_POST['nama_siswa'])){
    echo "<script>alert('Input Hanya Boleh Berupa Huruf!');window.location='siswa_tambah.php'</script>";
  }else{
    // Escape input untuk keamanan
    $nis = mysqli_real_escape_string($koneksi, $_POST['nis']);
    $nama_siswa = mysqli_real_escape_string($koneksi, $_POST['nama_siswa']);
    $alamat_siswa = mysqli_real_escape_string($koneksi, $_POST['alamat_siswa']);
    $c1 = mysqli_real_escape_string($koneksi, $_POST['c1']);
    $c2 = mysqli_real_escape_string($koneksi, $_POST['c2']);
    $c3 = mysqli_real_escape_string($koneksi, $_POST['c3']);
    $c4 = mysqli_real_escape_string($koneksi, $_POST['c4']);
    $c5 = mysqli_real_escape_string($koneksi, $_POST['c5']);
    $c6 = mysqli_real_escape_string($koneksi, $_POST['c6']);
    $c7 = mysqli_real_escape_string($koneksi, $_POST['c7']);
    
    // Mulai transaksi
    mysqli_begin_transaction($koneksi);

    try {
      $simpan1 = mysqli_query($koneksi, "INSERT INTO data_siswa (nis, nama_siswa, alamat_siswa) VALUES ('$nis', '$nama_siswa', '$alamat_siswa')");
      $simpan2 = mysqli_query($koneksi, "INSERT INTO data_nilai (nis, c1, c2, c3, c4, c5, c6, c7) VALUES ('$nis', '$c1', '$c2', '$c3', '$c4', '$c5', '$c6', '$c7')");

      if ($simpan1 && $simpan2) {
        $query = mysqli_query($koneksi, "SELECT max(id_nilai) as idMax FROM data_nilai");
        $data1 = mysqli_fetch_array($query);

        $simpan3 = mysqli_query($koneksi, "INSERT INTO data_hasil (id_nilai, cluster) VALUES ('$data1[idMax]', 'Cluster-2')");

        if ($simpan3) {
          mysqli_commit($koneksi);
          $_SESSION["simpan"] = 'Data Berhasil Disimpan';
        } else {
          throw new Exception("Gagal menyimpan data hasil");
        }
      } else {
        throw new Exception("Gagal menyimpan data siswa atau data nilai");
      }
    } catch (Exception $e) {
      mysqli_rollback($koneksi);
      echo "<script>alert('".$e->getMessage()."');window.location='siswa_tambah.php'</script>";
    }
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
        <h3 class="box-title">Tambah Data Penyakit</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fa fa-minus"></i>
          </button>
          <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fa fa-times"></i>
          </button>
        </div>
      </div>
      <div class="box-body">
        <form action="" method="POST">
          <table class="table table-bordered" id="example1" width="100%" cellspacing="0">
            <tr bgcolor="#6699FF"><td><h4 align="center">DATA PENYAKIT</h4></tr>
          </table>
          <table class="table table-no-bordered" id="example1" width="100%" cellspacing="0">
            <tr><td>ID Penyakit<input type="text" name="nis" class="form-control" placeholder="Masukan ID Penyakit" required></td></tr>
            <tr><td>Nama Penyakit: <input type="text" onkeypress="return event.charCode < 48 || event.charCode  >57" name="nama_siswa" class="form-control" placeholder="Masukan Nama Penyakit" required></td></tr>
            <tr><td>Deskripsi : <input type="text" name="alamat_siswa" class="form-control" placeholder="Masukan Deskripsi Penyakit" required></td></tr>
          </table>
          <table class="table table-bordered" id="example1" width="100%" cellspacing="0">
            <tr bgcolor="#6699FF"><td><h4 align="center">DETAIL DATA PENYAKIT</h4></tr>
          </table>
          <table class="table table-no-bordered" id="example1" width="100%" cellspacing="0">
            <tr>
              <td>Jumlah Usia 1-11 tahun : <input type="number" min="0" max="1000" name="c1" class="form-control" autocomplete="off" placeholder="Masukan Jumlah Usia 1-11 tahun :" required></td>
              <td>Jumlah Usia 12-24 tahun : <input type="number" min="0" max="1000" name="c2" class="form-control" placeholder="Masukan Jumlah Usia 12-24 tahun :" required></td>
              <td>Jumlah Usia 25-45 tahun : <input type="number" min="0" max="1000" name="c3" class="form-control" placeholder="Masukan Jumlah Usia 25-45 tahun :" required></td>
              <td>Jumlah Usia 46 - 65 tahun : <input type="number" min="0" max="1000" name="c4" class="form-control" placeholder="Masukan Jumlah Usia 46-65 tahun :" required></td>
              <td>Jumlah Usia > 65 tahun : <input type="number" min="0" max="1000" name="c5" class="form-control" placeholder="Masukan Jumlah Usia > 65 tahun :" required></td>
              <td>Jumlah Perempuan :  <input type="number" name="c6" class="form-control" value="<?= $data['c6'] ?>" placeholder="Masukan Jumlah Usia Perempuan : " required></td>
              <td>Jumlah Laki - laki :  <input type="number" name="c7" class="form-control" value="<?= $data['c7'] ?>" placeholder="Masukan Jumlah Usia Laki - laki : " required></td>
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

<?php if(isset($_SESSION['simpan'])) { ?>
<script type='text/javascript'>
 setTimeout(function () { 
 swal({
            title: 'INFORMASI',
            text: '<?php echo $_SESSION['simpan']; ?>',
            type: 'success',
            timer: 3000,
            showConfirmButton: true
        });  
 }, 10); 
 window.setTimeout(function(){ 
  window.location.replace('data_siswa.php');
 }, 3000); 
</script>
<?php unset($_SESSION['simpan']); } ?>

<?php include 'src/footer.php'; ?>
