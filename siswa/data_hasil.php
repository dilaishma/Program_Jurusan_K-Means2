<?php
include 'src/header.php';

$query_total_data = mysqli_query($koneksi, "SELECT COUNT(*) as SIZE FROM data_nilai") or die(mysqli_error($koneksi));
  $n_iterasi = 100; //JUMLAH ITERASI YANG AKAN DILAKUKAN
  $n_data = mysqli_fetch_array($query_total_data)['SIZE']; //JUMLAH DATA NILAI
  $n_cluster = 5; //JUMLAH CLUSTER
  $old_iterasi = array(); //DEKLRASI UNTUK MENYIMPAN ITERASI YANG LAMA
  
  for ($i=0; $i < $n_iterasi; $i++) {
    $centroid = array();
    
    if ($i == 0) {
      //MENGAMBIL TITIK PUSAT SETIAP CLUSTER
      $query_total_data = mysqli_query($koneksi, "SELECT data_cluster.*, data_nilai.* FROM data_cluster, data_nilai WHERE data_cluster.id_nilai = data_nilai.id_nilai") or die(mysqli_error($koneksi));
      $index_centroid = 1;

      while ($row = mysqli_fetch_array($query_total_data)) {
        //Centroid awal
        if ($index_centroid == 1 or $index_centroid == 2 or $index_centroid == 3 or $index_centroid == 4 or $index_centroid == 5) {
          array_push($centroid, $row);
        }
        $index_centroid++;
      }
    }else{
      //MENCARI/MENGHITUNG TITIK PUSAT(CENTROID) BARU
      for ($j=0; $j < $n_cluster; $j++) {
        $query_centroid = "SELECT data_nilai.*, data_hasil.*, AVG(data_nilai.c1) as 'c1', AVG(data_nilai.c2) as 'c2', AVG(data_nilai.c3) as 'c3', AVG(data_nilai.c4) as 'c4', AVG(data_nilai.c5) as 'c5', AVG(data_nilai.c5) as 'c6', AVG(data_nilai.c5) as 'c7' FROM data_hasil, data_nilai WHERE data_hasil.id_nilai = data_nilai.id_nilai AND data_hasil.Cluster = 'Cluster-".($j+1)."'";
        $resultat_centroid = mysqli_query($koneksi, $query_centroid) or die(mysqli_error($koneksi));
        while ($row_centroid = mysqli_fetch_array($resultat_centroid)) {
          array_push($centroid, $row_centroid);
        }
      }
    }
    $query = "SELECT data_hasil.*, data_nilai.* FROM data_hasil, data_nilai WHERE data_hasil.id_nilai = data_nilai.id_nilai";
    $resultat = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));
    
    while ($row = mysqli_fetch_array($resultat)) {
      $temp_cluster = array();
      for ($j=0; $j < $n_cluster; $j++) {
        $nilai_cluster = sqrt(pow(($row['c1']-$centroid[$j]['c1']), 2)+pow(($row['c2']-$centroid[$j]['c2']), 2)+pow(($row['c3']-$centroid[$j]['c3']), 2)+pow(($row['c4']-$centroid[$j]['c4']), 2)+pow(($row['c5']-$centroid[$j]['c5']), 2)+pow(($row['c6']-$centroid[$j]['c6']), 2)+pow(($row['c7']-$centroid[$j]['c7']), 2));
        $temp_cluster['Cluster-'.($j+1)] = $nilai_cluster;
      }

      $my_cluster = array($temp_cluster['Cluster-1'], $temp_cluster['Cluster-2'], $temp_cluster['Cluster-3']);
      sort($my_cluster);


      $cluster = '';
      foreach ($temp_cluster as $key => $value) {
        if ($value == $my_cluster[0]) {
          $cluster = $key;
          break;
        }
      }

      $id =  $row['id_nilai'];
      $query_update = mysqli_query($koneksi, "UPDATE data_hasil SET Cluster= '$cluster' WHERE id_hasil = '$id'") or die(mysqli_error($koneksi));
    }

    if ($i <= 0) {
      for ($k=0; $k < $n_cluster; $k++) { 
        $query_old_iterasi = "SELECT id_hasil, Cluster FROM data_hasil WHERE Cluster = 'Cluster-".($k+1)."'";
        $resultat_old_iterasi = mysqli_query($koneksi, $query_old_iterasi) or die(mysqli_error($koneksi));
        
        while ($row = mysqli_fetch_array($resultat_old_iterasi)) {
          $old_iterasi[$row['id_hasil']] = $row['Cluster'];
        }
      }
    }else{
      $check = true;

      for ($k=0; $k < $n_cluster; $k++) { 
        $query_old_iterasi = "SELECT id_hasil, Cluster FROM data_hasil WHERE Cluster = 'Cluster-".($k+1)."'";
        $resultat_old_iterasi = mysqli_query($koneksi, $query_old_iterasi) or die(mysqli_error($koneksi));
        while ($row = mysqli_fetch_array($resultat_old_iterasi)) {
          if($old_iterasi[$row['id_hasil']] != $row['Cluster']){
            $check = false;
            $k = $k + $n_cluster+1;
            break;
          }
        }
      }

      if ($check == true) {
        $i = $n_iterasi+1;
      }else{
        $old_iterasi = array();
        for ($k=0; $k < $n_cluster; $k++) { 
        $query_old_iterasi = "SELECT id_hasil, Cluster FROM data_hasil WHERE Cluster = 'Cluster-".($k+1)."'";
        $resultat_old_iterasi = mysqli_query($koneksi, $query_old_iterasi) or die(mysqli_error($koneksi));
        
        while ($row = mysqli_fetch_array($resultat_old_iterasi)) {
          $old_iterasi[$row['id_hasil']] = $row['Cluster'];
        }
      }
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
          <h3 class="box-title">Data Hasil Penentuan Cluster</h3>

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
                  $query = mysqli_query($koneksi, "SELECT data_nilai.*, data_siswa.*, data_hasil.* FROM data_hasil, data_nilai, data_siswa WHERE data_nilai.nis = data_siswa.nis AND data_hasil.id_nilai = data_nilai.id_nilai AND data_siswa.nis = '$_SESSION[id]'");
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