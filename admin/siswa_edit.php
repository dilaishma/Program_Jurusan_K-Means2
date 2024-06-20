<?php
include 'src/header.php';

// Function to check if all values in an array are numeric
function areAllNumeric($values) {
    foreach ($values as $value) {
        if (!preg_match("/^[0-9]+$/", $value)) {
            return false;
        }
    }
    return true;
}

if (isset($_POST['simpan'])) {
    $nis = $_POST['nis'];
    $nama = $_POST['nama_siswa'];
    $alamat = $_POST['alamat_siswa'];
    $c1 = $_POST['c1'];
    $c2 = $_POST['c2'];
    $c3 = $_POST['c3'];
    $c4 = $_POST['c4'];
    $c5 = $_POST['c5'];

    $nilai = [$c1, $c2, $c3, $c4, $c5];

    if (!preg_match("/^[0-9]+$/", $nis)) {
        echo "<script>alert('Input NIS hanya boleh berupa angka!');window.location='siswa_edit.php'</script>";
    } elseif (!areAllNumeric($nilai)) {
        echo "<script>alert('Input nilai hanya boleh berupa angka!');window.location='siswa_edit.php'</script>";
    } elseif (!preg_match("/^[a-zA-Z\s]+$/", $nama)) {
        echo "<script>alert('Input nama hanya boleh berupa huruf dan spasi!');window.location='siswa_edit.php'</script>";
    } else {
        // Use prepared statements to prevent SQL injection
        $stmt1 = $koneksi->prepare("UPDATE data_siswa SET nama_siswa = ?, alamat_siswa = ? WHERE nis = ?");
        $stmt1->bind_param("ssi", $nama, $alamat, $nis);
        $simpan1 = $stmt1->execute();

        $stmt2 = $koneksi->prepare("UPDATE data_nilai SET c1 = ?, c2 = ?, c3 = ?, c4 = ?, c5 = ? WHERE nis = ?");
        $stmt2->bind_param("iiiiii", $c1, $c2, $c3, $c4, $c5, $nis);
        $simpan2 = $stmt2->execute();

        if ($simpan1 && $simpan2) {
            $_SESSION["simpan"] = 'Data Berhasil Disimpan';
        } else {
            echo "<script>alert('Gagal menyimpan data!');window.location='siswa_edit.php'</script>";
        }
    }
}
?>

<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>K-MEANS CLUSTERING</h1>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Tambah Data Siswa</h3>
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
                        <tr bgcolor="#6699FF">
                            <td><h4 align="center">DATA DIRI SISWA</h4></tr>
                    </table>
                    <table class="table table-no-bordered" id="example1" width="100%" cellspacing="0">
                        <tr><td>NISN : <input type="number" name="nis" class="form-control" value="<?= $data['nis'] ?>"></td></tr>
                        <tr><td>Nama Lengkap : <input type="text" onkeypress="return event.charCode < 48 || event.charCode > 57" name="nama_siswa" class="form-control" value="<?= $data['nama_siswa'] ?>" placeholder="Masukan Nama Siswa" required></td></tr>
                        <tr><td>Alamat : <input type="text" name="alamat_siswa" class="form-control" value="<?= $data['alamat_siswa'] ?>" placeholder="Masukan Alamat Siswa" required></td></tr>
                    </table>
                    <table class="table table-bordered" id="example1" width="100%" cellspacing="0">
                        <tr bgcolor="#6699FF">
                            <td><h4 align="center">DATA NILAI SISWA</h4></tr>
                    </table>
                    <table class="table table-no-bordered" id="example1" width="100%" cellspacing="0">
                        <tr>
                            <td>NILAI BAHASA INDONESIA : <input type="number" name="c1" class="form-control" value="<?= $data['c1'] ?>" autocomplete="off" placeholder="Masukan NILAI BAHASA INDONESIA" required></td>
                            <td>NILAI BAHASA INGGRIS : <input type="number" name="c2" class="form-control" value="<?= $data['c2'] ?>" placeholder="Masukan NILAI BAHASA INGGRIS" required></td>
                            <td>NILAI MATEMATIKA : <input type="number" name="c3" class="form-control" value="<?= $data['c3'] ?>" placeholder="Masukan NILAI MATEMATIKA" required></td>
                            <td>NILAI FISIKA : <input type="number" name="c4" class="form-control" value="<?= $data['c4'] ?>" placeholder="Masukan NILAI FISIKA" required></td>
                            <td>NILAI BIOLOGI : <input type="number" name="c5" class="form-control" value="<?= $data['c5'] ?>" placeholder="Masukan NILAI BIOLOGI" required></td>
                        </tr>
                    </table>
                    <div class="form-group">
                        <button type="submit" class='d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm' name="simpan"><span aria-hidden="true"></span>Simpan</button>
                    </div>
                </form>
            </div>
            <!-- /.box-body -->
            <div class="box-footer"></div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php if (@$_SESSION['simpan']) { ?>
<script type='text/javascript'>
    setTimeout(function () { 
        swal({
            title: 'INFORMASI',
            text: 'DATA TERSIMPAN',
            type: 'success',
            timer: 3000,
            showConfirmButton: true
        });  
    }, 10); 
    window.setTimeout(function() { 
        window.location.replace('data_siswa.php');
    } ,3000); 
</script>
<?php unset($_SESSION['simpan']); } ?>

<?php include 'src/footer.php'; ?>
