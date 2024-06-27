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
          <h3 class="box-title">Laporan Hasil Clustering Penyakit</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"> <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"> <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          <a href="hasil_cetak_excel.php" target="_blank()" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
            <i class="fas fa-sm text-white-50" Arnol Arjansyah> </i>Export to Excel
          </a>
          <!-- <a href="hasil_cetak_pdf.php" target="_blank()" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm">
            <i class="fas fa-sm text-white-50"></i>Export to PDF
          </a> -->
          <hr>
          <div class="table-responsive">
            <table class="table table-bordered" id="example1" width="100%" cellspacing="0">
              <thead>
                <tr>
                <th>#</th>
                  <th>Nama Cluster</th>
                  <th>0-11 tahun</th>
                  <th>12-24 tahun</th>
                  <th>25-45 tahun</th>
                  <th>45-65 tahun</th>
                  <th>> 65 tahun</th>
                  <th>Perempuan</th>
                  <th>Laki-laki</th>
                  <th>Kategori</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $no = 1;
                  $query = mysqli_query($koneksi, "SELECT data_hasil.*, data_nilai.*, data_siswa.* FROM data_hasil, data_nilai, data_siswa WHERE data_nilai.nis = data_siswa.nis AND data_hasil.id_nilai = data_nilai.id_nilai");
                  while($data = mysqli_fetch_array($query)){
                    if($data['Cluster'] == "Cluster-1"){
                      $jurusan = $ArrayNamaCluster[0];
                    }elseif($data['Cluster'] == "Cluster-2"){
                      $jurusan = $ArrayNamaCluster[1];
                    }elseif($data['Cluster'] == "Cluster-3"){
                      $jurusan = $ArrayNamaCluster[2];
                    }
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
                  <td><?= $jurusan ?></td>
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