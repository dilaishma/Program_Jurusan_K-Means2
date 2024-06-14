<?php include 'src/header.php'; ?>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        K-MEANS CLUSTERING PENENTUAN JURUSAN
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      
      <div class="row">
        <div class="col-lg-3 col-4">
          <div class="small-box bg-info">
            <div class="inner">
              <?php
              $query = mysqli_query($koneksi, "SELECT count(id_hasil) as c1 FROM data_hasil WHERE Cluster = 'Cluster-1'");
              $data  = mysqli_fetch_array($query);
              ?>
              <h3><?= $data['c1'] ?></h3>
              <p><?= $ArrayNamaCluster[0] ?></p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="data_hasil.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-4">
          <div class="small-box bg-success">
            <div class="inner">
              <?php
              $query = mysqli_query($koneksi, "SELECT count(id_hasil) as c2 FROM data_hasil WHERE Cluster = 'Cluster-2'");
              $data  = mysqli_fetch_array($query);
              ?>
              <h3><?= $data['c2'] ?></h3>
              <p><?= $ArrayNamaCluster[1] ?></p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="data_hasil.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-4">
          <div class="small-box bg-warning">
            <div class="inner">
              <?php
              $query = mysqli_query($koneksi, "SELECT count(id_hasil) as c3 FROM data_hasil WHERE Cluster = 'Cluster-3'");
              $data  = mysqli_fetch_array($query);
              ?>
              <h3><?= $data['c3'] ?></h3>
              <p><?= $ArrayNamaCluster[2] ?></p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="data_hasil.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-4">
          <div class="small-box bg-danger">
            <div class="inner">
              <?php
              $query = mysqli_query($koneksi, "SELECT count(id_hasil) as c4 FROM data_hasil WHERE Cluster = 'Cluster-4'");
              $data  = mysqli_fetch_array($query);
              ?>
              <h3><?= $data['c4'] ?></h3>
              <p><?= $ArrayNamaCluster[3] ?></p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="data_hasil.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-3">
          <div class="small-box bg-primary">
            <div class="inner">
              <?php
              $query = mysqli_query($koneksi, "SELECT count(id_hasil) as c5 FROM data_hasil WHERE Cluster = 'Cluster-5'");
              $data  = mysqli_fetch_array($query);
              ?>
              <h3><?= $data['c5'] ?></h3>
              <p><?= $ArrayNamaCluster[4] ?></p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="data_hasil.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Dashboard</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          <div style="width: 800px;margin: 0px auto;">
    <canvas id="myChart"></canvas>
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


<script>
    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ["TKJ", "Otomotif", "Tata Boga", "Wirausaha / Pemasaran", "Pertanian"],
        datasets: [{
          label: '',
          data: [
          <?php 
          $jumlah1 = mysqli_query($koneksi,"SELECT * FROM data_hasil WHERE Cluster='Cluster-1'");
          echo mysqli_num_rows($jumlah1);
          ?>, 
          <?php 
          $jumlah2 = mysqli_query($koneksi,"SELECT * FROM data_hasil WHERE Cluster='Cluster-2'");
          echo mysqli_num_rows($jumlah2);
          ?>, 
          <?php 
          $jumlah3 = mysqli_query($koneksi,"SELECT * FROM data_hasil WHERE Cluster='Cluster-3'");
          echo mysqli_num_rows($jumlah3);
          ?>, 
          <?php 
          $jumlah4 = mysqli_query($koneksi,"SELECT * FROM data_hasil WHERE Cluster='Cluster-4'");
          echo mysqli_num_rows($jumlah4);
          ?>,
          <?php 
          $jumlah5 = mysqli_query($koneksi,"SELECT * FROM data_hasil WHERE Cluster='Cluster-5'");
          echo mysqli_num_rows($jumlah5);
          ?>
          ],
          backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)'
          ],
          borderColor: [
          'rgba(255,99,132,1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)'
          ],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero:true
            }
          }]
        }
      }
    });
  </script>

  
<?php include 'src/footer.php'; ?>