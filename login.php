<?php
include 'koneksi.php';


date_default_timezone_set("Asia/jakarta");

include 'koneksi.php';

if(isset($_POST['login'])){
  session_start();
  $username   = $_POST['nis'];
  $password   = $_POST['password'];

  $query = mysqli_query($koneksi, "SELECT * FROM data_admin WHERE username = '$username' AND password = '$password'");
  $cek   = mysqli_num_rows($query);
  $data  = mysqli_fetch_array($query);

  $query1 = mysqli_query($koneksi, "SELECT * FROM data_siswa WHERE nis = '$username' AND password = '$password'");
  $cek1   = mysqli_num_rows($query1);
  $data1  = mysqli_fetch_array($query1);    

  if($cek > 0){
    $_SESSION['akses']    = 'Admin';
    $_SESSION['id']       = $data['id_admin'];
    $_SESSION['nama']     = $data['nama_admin'];
    $_SESSION["sukses"]  = 'Selamat Datang';
    header("Location:admin/index.php");
  }elseif($cek1 > 0){
    $_SESSION['akses']    = 'Siswa';
    $_SESSION['id']       = $data1['nis'];
    $_SESSION['nama']     = $data1['nama_siswa'];
    $_SESSION["sukses"]  = 'Selamat Datang';
    header("Location:siswa/index.php");
  }else{
    echo "<script>alert('Periksa Username dan Password Anda');window.location='index.php'</script>";
  }
  
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Penentuan jurusan pada SMKN 1 muaro jambi dengan menggunakan metode k-means clustering</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
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
          <li><a class="nav-link scrollto" href="pengumuman.php">Pengumuman</a></li>
          <li><a class="nav-link scrollto active" href="login.php">Login</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main id="main">

   <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>LOGIN AREA</h2>
          <h3>KMEANS <span>CLUSTERING</span></h3>
        </div>

        <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="100">
          <form action="" method="post" role="form" enctype="multipart/form-data">
            <div class="row justify-content-center">
              <div class="col-sm-5">
                <div class="form-group">
                  <label>Username :</label>
                  <input type="text" name="nis" class="form-control" placeholder="Masukan Username" autocomplete="off" required>
                </div>
              </div>
            </div>
            <br>
            <div class="row justify-content-center">
              <div class="col-sm-5">
                <div class="form-group">
                  <label>Password :</label>
                  <input type="password" name="password" class="form-control" placeholder="Masukan Password" autocomplete="off" required>
                </div>
            </div>
            </div>
            <br>
            <div class="row justify-content-center">
              <div class="col-sm-5">
                <button type="submit" name="login" id="login" class="btn btn-primary">Login</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
              </div>
            </div>
        </form>
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
        <a href="index.php">PENENTUAN JURUSAN PADA SMKN 1 MUARO JAMBI</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

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