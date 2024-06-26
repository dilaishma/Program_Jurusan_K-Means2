<?php
include 'src/header.php';
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
          <h3 class="box-title">Detail Data Penyakit</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"> <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"> <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="example1" width="100%" cellspacing="0">
              <thead>
                <tr>
                <th>#</th>
                <th>ID Penyakit</th>
                  <th>Nama Penyakit</th>
                  <th>0-11 tahun</th>
                  <th>12-24 tahun</th>
                  <th>25-45 tahun</th>
                  <th>45-65 tahun</th>
                  <th>> 65 tahun</th>
                  <th>Perempuan</th>
                  <th>Laki-laki</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $no = 1;
                  $query = mysqli_query($koneksi, "SELECT data_nilai.*, data_siswa.* FROM data_nilai, data_siswa WHERE data_nilai.nis = data_siswa.nis");
                  while($data = mysqli_fetch_array($query)){
                ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= $data['nis'] ?></td>
                  <td><?= $data['nama_siswa'] ?></td>
                  <td><?= $data['c1'] ?></td>
                  <td><?= $data['c2'] ?></td>
                  <td><?= $data['c3'] ?></td>
                  <td><?= $data['c4'] ?></td>
                  <td><?= $data['c5'] ?></td>
                  <td><?= $data['c6'] ?></td>
                  <td><?= $data['c7'] ?></td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
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