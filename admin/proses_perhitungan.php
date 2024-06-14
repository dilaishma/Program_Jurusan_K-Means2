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
          <h3 class="box-title">Proses Perhitungan</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"> <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"> <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          <?php
            $query_total_data = mysqli_query($koneksi, "SELECT COUNT(*) as SIZE FROM data_nilai");
            $n_iterasi = 100;
            $n_data = mysqli_fetch_array($query_total_data)['SIZE'];
            $n_cluster = 5;
            $old_iterasi = array();
                    
            for ($i=0; $i < $n_iterasi; $i++) { 
          ?>
          <div class="page-header">
            <h1>
              <small> Iterasi ke  <i class="ace-icon fa fa-angle-double-right"></i> <?php echo ($i+1) ?> </small>
            </h1>
          </div>
          <div style="margin: 2px 2px;">
            <?php
              $centroid = array();

              if ($i == 0) {
                $query_total_data = mysqli_query($koneksi, "SELECT data_cluster.*, data_nilai.* FROM data_cluster, data_nilai WHERE data_cluster.id_nilai = data_nilai.id_nilai") or die(mysqli_error($koneksi));
                $index_centroid = 1;
            ?>
            <div class="page-header">
              <small> Centroid Awal  </small>
            </div>
            <table class="table table-bordered" width="100%" cellspacing="0"> 
              <?php
              $cluster_= 1;
              while ($row = mysqli_fetch_array($query_total_data)) {
                //Centroid awal
                if ($index_centroid == 1 or $index_centroid == 2 or $index_centroid == 3 or $index_centroid == 4 or $index_centroid == 5) {
                  array_push($centroid, $row);
              ?>
              <tr>
                <th><?php echo 'Cluster'.$cluster_++; ?></th>
                <th><?php echo $row['c1'] ?></th>
                <th><?php echo $row['c2'] ?></th>
                <th><?php echo $row['c3'] ?></th>
                <th><?php echo $row['c4'] ?></th>
                <th><?php echo $row['c5'] ?></th>
              </tr>
              <?php } $index_centroid++; } ?>
            </table>
            <?php }else{ ?>
            <div class="page-header">
              <small> Centroid Baru </small>
            </div>
            <table class="table table-bordered" width="100%" cellspacing="0">
              <?php
                //Menghitung centroid baru
                for ($j=0; $j < $n_cluster; $j++) {
                  $query_centroid = "SELECT data_nilai.*, data_hasil.*, AVG(data_nilai.c1) as 'c1', AVG(data_nilai.c2) as 'c2', AVG(data_nilai.c3) as 'c3', AVG(data_nilai.c4) as 'c4', AVG(data_nilai.c5) as 'c5' FROM data_hasil, data_nilai WHERE data_hasil.id_nilai = data_nilai.id_nilai AND data_hasil.Cluster = 'Cluster-".($j+1)."'";
                  $resultat_centroid = mysqli_query($koneksi, $query_centroid) or die(mysqli_error($koneksi));
                  while ($row_centroid = mysqli_fetch_array($resultat_centroid)) {
                    array_push($centroid, $row_centroid);
              ?>
              <tr>
                <th><?php echo 'Cluster'.($j+1); ?></th>
                <th><?php echo $row_centroid['c1'] ?></th>
                <th><?php echo $row_centroid['c2'] ?></th>
                <th><?php echo $row_centroid['c3'] ?></th>
                <th><?php echo $row_centroid['c4'] ?></th>
                <th><?php echo $row_centroid['c5'] ?></th>
              </tr>
              <?php } } ?>
            </table>
            <?php }
              $resultat = mysqli_query($koneksi, "SELECT data_hasil.*, data_nilai.* FROM data_hasil, data_nilai WHERE data_hasil.id_nilai = data_nilai.id_nilai") or die(mysqli_error($koneksi));
            ?>
            <div class="page-header">
              <small> Hasil Cluster </small>
            </div>
            <div class="table-responsive">
              <table class="table table-bordered" id="example<?=$i+1?>" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>NIS</th>
                    <th>C1</th>
                    <th>C2</th>
                    <th>C3</th>
                    <th>C4</th>
                    <th>C5</th>
                    <th>Clus 1</th>
                    <th>Clus 2</th>
                    <th>Clus 3</th>
                    <th>Clus 4</th>
                    <th>Clus 5</th>
                    <th>Cluster</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $no = 1;
                    while ($row = mysqli_fetch_array($resultat)) {
                      $temp_cluster = array();
                      for ($j=0; $j < $n_cluster; $j++) {
                        $nilai_cluster = sqrt(pow(($row['c1']-$centroid[$j]['c1']), 2)+pow(($row['c2']-$centroid[$j]['c2']), 2)+pow(($row['c3']-$centroid[$j]['c3']), 2)+pow(($row['c4']-$centroid[$j]['c4']), 2)+pow(($row['c5']-$centroid[$j]['c5']), 2));
                        $temp_cluster['Cluster-'.($j+1)] = $nilai_cluster;
                      }

                      $my_cluster = array($temp_cluster['Cluster-1'], $temp_cluster['Cluster-2'], $temp_cluster['Cluster-3'], $temp_cluster['Cluster-4'], $temp_cluster['Cluster-5']);
                      sort($my_cluster);


                      $cluster = '';
                      foreach ($temp_cluster as $key => $value) {
                        if ($value == $my_cluster[0]) {
                          $cluster = $key;
                          break;
                        }
                      }
                  ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $row['nis'] ?></td>
                    <td><?= $row['c1'] ?></td>
                    <td><?= $row['c2'] ?></td>
                    <td><?= $row['c3'] ?></td>
                    <td><?= $row['c4'] ?></td>
                    <td><?= $row['c5'] ?></td>
                    <th><?php echo $temp_cluster['Cluster-1'] ?></th>
                    <th><?php echo $temp_cluster['Cluster-2'] ?></th>
                    <th><?php echo $temp_cluster['Cluster-3'] ?></th>
                    <th><?php echo $temp_cluster['Cluster-4'] ?></th>
                    <th><?php echo $temp_cluster['Cluster-5'] ?></th>
                    <th><?php echo $cluster ?></th>
                  </tr>
                  <?php
                    $id =  $row['id_hasil'];
                    $query_update = mysqli_query($koneksi, "UPDATE data_hasil SET Cluster= '$cluster' WHERE id_hasil = '$id'") or die(mysqli_error($koneksi));
                    }
                  ?>
                </tbody>
              </table>
              <?php
                if ($i <= 0) {
                  for ($k=0; $k < $n_cluster; $k++) { 
                    $query_old_iterasi = "SELECT `id_hasil`, `Cluster` FROM `data_hasil` WHERE `Cluster` = 'Cluster-".($k+1)."'";
                    $resultat_old_iterasi = mysqli_query($koneksi, $query_old_iterasi) or die(mysqli_error($koneksi));
                        
                    while ($row = mysqli_fetch_array($resultat_old_iterasi)) {
                      $old_iterasi[$row['id_hasil']] = $row['Cluster'];
                    }
                  }
                }else{
                  $check = true;

                  for ($k=0; $k < $n_cluster; $k++) { 
                    $query_old_iterasi = "SELECT `id_hasil`, `Cluster` FROM `data_hasil` WHERE `Cluster` = 'Cluster-".($k+1)."'";
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
                      $query_old_iterasi = "SELECT `id_hasil`, `Cluster` FROM `data_hasil` WHERE `Cluster` = 'Cluster-".($k+1)."'";
                      $resultat_old_iterasi = mysqli_query($koneksi, $query_old_iterasi) or die(mysqli_error($koneksi));
                        
                      while ($row = mysqli_fetch_array($resultat_old_iterasi)) {
                        $old_iterasi[$row['id_hasil']] = $row['Cluster'];
                      }
                    }
                  }
                }
              ?>
              </div>
              <?php } ?>
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