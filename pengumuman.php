<?php
date_default_timezone_set("Asia/jakarta");
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Penentuan kategori penyakit pasien rawat jalan Puskesmas Ngemplak dengan menggunakan metode k-means clustering</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/pagination.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
      </div>
      <div class="social-links d-none d-md-flex align-items-center">
        <i class="d-flex align-items-center ms-4"><span id="jam" style="font-size:24"></span></i>
      </div>
    </div>
  </section>

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="index.php">K-MEANS CLUSTERING</a></h1>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto" href="index.php">Home</a></li>
          <li><a class="nav-link scrollto active" href="pengumuman.php">Pengumuman</a></li>
          <li><a class="nav-link scrollto" href="login.php">Login</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main id="main">

   <!-- ======= Services Section ======= -->
    <section id="pengumuman" class="services">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>PENGUMUMAN</h2>
          <h3>HASIL PENENTUAN <span>KATEGORI</span></h3>
        </div>
        <div class="row">
          <div data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <form method="POST" action="">
                <div class="row">
                  <div class="col-sm-4">
                    <div class="form-group">
                      <form method="GET" action="">
                        <select class="form-control" name="nama_siswa" onchange="this.form.submit()">
                          <?php
                          $querySiswa = mysqli_query($koneksi, "SELECT * FROM data_siswa");
                          while($dataSiswa = mysqli_fetch_array($querySiswa)){
                            echo "<option value = '$dataSiswa[nama_siswa]'>$dataSiswa[nama_siswa]</option>";
                          }
                          ?>
                        </select>
                      </form>
                    </div>
                  </div>
                </div>
              </form>
            <hr>
              <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID Penyakit</th>
                      <th>Nama Penyakit</th>
                      <th>Usia 0-11 tahun</th>
                      <th>Usia 12-25 tahun</th>
                      <th>Usia 26-45 tahun</th>
                      <th>Usia 46-65 tahun</th>
                      <th>Usia > tahun</th>
                      <th>Perempuan</th>
                      <th>Laki - laki</th>
                      <th>Kategori</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $no = 1;
                      $no = 1;
                      $page = (isset($_GET['page']))? $_GET['page'] : 1;
                      $limit = 10;
                      $limit_start = ($page - 1) * $limit;

                      $ArrayNamaCluster = array();
                      $queryNamaCluster = mysqli_query($koneksi, "SELECT * FROM data_cluster");
                      while($dataNamaCluster = mysqli_fetch_array($queryNamaCluster)){
                        array_push($ArrayNamaCluster, $dataNamaCluster['nama_cluster']);
                      }

                      if(isset($_GET['nama_siswa'])){
                        $nama  = mysqli_real_escape_string($koneksi, $_GET['nama_siswa']);
                        $query = mysqli_query($koneksi, "SELECT data_hasil.*, data_nilai.*, data_siswa.* FROM data_hasil, data_nilai, data_siswa WHERE data_nilai.nis = data_siswa.nis AND data_hasil.id_nilai = data_nilai.id_nilai AND data_siswa.nama_siswa = '$nama'");
                      }else{
                        $query = mysqli_query($koneksi, "SELECT data_hasil.*, data_nilai.*, data_siswa.* FROM data_hasil, data_nilai, data_siswa WHERE data_nilai.nis = data_siswa.nis AND data_hasil.id_nilai = data_nilai.id_nilai LIMIT ".$limit_start.",".$limit);
                        $no = $limit_start + 1;
                      }
                      
                      while($data = mysqli_fetch_array($query)){
                        if($data['Cluster'] == "Cluster-1"){
                          $jurusan = $ArrayNamaCluster[0];
                        }elseif($data['Cluster'] == "Cluster-2"){
                          $jurusan = $ArrayNamaCluster[1];
                        }elseif($data['Cluster'] == "Cluster-3"){
                          $jurusan = $ArrayNamaCluster[2];
                        }elseif($data['Cluster'] == "Cluster-4"){
                          $jurusan = $ArrayNamaCluster[3];
                        }elseif($data['Cluster'] == "Cluster-5"){
                          $jurusan = $ArrayNamaCluster[4];
                        }
                    ?>
                    <tr>
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
                <hr>
                  <ul class="pagination">
                    <?php
                      if($page == 1){
                      ?>
                        <li class="disabled"><a href="#">First</a></li>
                        <li class="disabled"><a href="#">&laquo;</a></li>
                      <?php
                      }else{
                        $link_prev = ($page > 1)? $page - 1 : 1;
                      ?>
                        <li><a href="pengumuman.php?page=1">First</a></li>
                        <li><a href="pengumuman.php?page=<?php echo $link_prev; ?>">&laquo;</a></li>
                      <?php
                      }
                      ?>
                      <?php
                      $sql2 = mysqli_query($koneksi, "SELECT COUNT(*) AS jumlah FROM data_hasil");
                      $get_jumlah = mysqli_fetch_array($sql2);
                      
                      $jumlah_page = ceil($get_jumlah['jumlah'] / $limit);
                      $jumlah_number = 3;
                      $start_number = ($page > $jumlah_number)? $page - $jumlah_number : 1;
                      $end_number = ($page < ($jumlah_page - $jumlah_number))? $page + $jumlah_number : $jumlah_page;
                      
                      for($i = $start_number; $i <= $end_number; $i++){
                        $link_active = ($page == $i)? ' class="active"' : '';
                      ?>
                        <li<?php echo $link_active; ?>><a href="pengumuman.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                      <?php
                      }
                      ?>
                      <?php
                      if($page == $jumlah_page){
                      ?>
                        <li class="disabled"><a href="#">&raquo;</a></li>
                        <li class="disabled"><a href="#">Last</a></li>
                      <?php
                      }else{
                        $link_next = ($page < $jumlah_page)? $page + 1 : $jumlah_page;
                      ?>
                        <li><a href="pengumuman.php?page=<?php echo $link_next; ?>">&raquo;</a></li>
                        <li><a href="pengumuman.php?page=<?php echo $jumlah_page; ?>">Last</a></li>
                    <?php } ?>
                  </ul>
              </div>
            </div>
          </div>
        </div>

      </div>
</section><!-- End Contact Section -->

   

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="container py-4">
      <div class="copyright">
        <strong><span>K-MEANS CLUSTERING</span></strong>.
      </div>
      <div class="credits">
        <a href="index.php">PENENTUAN KATEGORI PENYAKIT PUSKESMAS NGEMPLAK</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <script src="assets/bower_components/jquery/dist/jquery.min.js"></script>
  <script src="assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable()
    $('#example3').DataTable()
    $('#example4').DataTable()
    $('#example5').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script type="text/javascript">
        window.onload = function() { jam(); }
       
        function jam() {
            var e = document.getElementById('jam'),
            d = new Date(), h, m, s;
            h = d.getHours();
            m = set(d.getMinutes());
            s = set(d.getSeconds());
       
            e.innerHTML = h +':'+ m +':'+ s;
       
            setTimeout('jam()', 1000);
        }
       
        function set(e) {
            e = e < 10 ? '0'+ e : e;
            return e;
        }
</script>
</body>

</html>