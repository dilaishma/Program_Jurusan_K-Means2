<?php
session_start();
  if($_SESSION['akses'] == ""){
    echo "<script>alert('Anda Harus Login Terlebih Dahulu');window.location='../login.php'</script>";
}
include '../koneksi.php';

$id     = $_SESSION['id'];
$ambil  = mysqli_query($koneksi, "SELECT * FROM data_admin WHERE id_admin = '$_SESSION[id]'");
$dt     = mysqli_fetch_array($ambil);

$ArrayNamaCluster = array();
$queryNamaCluster = mysqli_query($koneksi, "SELECT * FROM data_cluster");
while($dataNamaCluster = mysqli_fetch_array($queryNamaCluster)){
  array_push($ArrayNamaCluster, $dataNamaCluster['nama_cluster']);
}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Clustering Data Pasien Puskesmas Ngemplak, Boyolali menggunakan metode k-means clustering</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
  <script type="text/javascript" src="../assets/chartjs/Chart.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../assets/bower_components/Ionicons/css/ionicons.min.css">
    
  <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css" rel="stylesheet">

  <!-- DataTables -->
  <link rel="stylesheet" href="../assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../assets/dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index.php" class="logo">
      <span class="logo-mini"><b>KC</b></span>
      <span class="logo-lg"> PUSKESMAS NGEMPLAK <b>CLUSTERING</b></span>
    </a>
    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="data_admin.php" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../logo1.png" class="user-image" alt="User Image">
              <span class="hidden-xs"><?= $dt['nama_admin'] ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <img src="../logo1.png" class="img-circle" alt="User Image">
                <p>
                  <?= $dt['nama_admin'] ?> - Puskesmas
                  <small>Ngemplak Boyolali</small>
                </p>
              </li>
              <li class="user-footer">
                <div class="pull-left">
                  <a href="data_admin.php" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../logo1.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?= $dt['nama_admin'] ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="index.php">
            <i class="fa fa-dashboard"></i> <span>DASHBOARD</span>
            <span class="pull-right-container">
              
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i>
            <span>PENYAKIT</span>
          </a>
          <ul class="treeview-menu">
            <li><a href="data_siswa.php"><i class="fa fa-circle-o"></i>PENYAKIT</a></li>
            <li><a href="data_nilai.php"><i class="fa fa-circle-o"></i>DETAIL DATA PENYAKIT</a></li>
          </ul>
        </li>
        <li>
          <a href="data_hasil.php">
            <i class="fa fa-book"></i> <span>DATA HASIL</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-gear"></i>
            <span>PENGATURAN</span>
          </a>
          <ul class="treeview-menu">
            <li><a href="data_admin.php"><i class="fa fa-circle-o"></i>AKUN</a></li>
            <li><a href="data_cluster.php"><i class="fa fa-circle-o"></i>CLUSTER</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-print"></i>
            <span>LAPORAN</span>
          </a>
          <ul class="treeview-menu">
            <li><a href="laporan_siswa.php"><i class="fa fa-circle-o"></i>PENYAKIT</a></li>
            <li><a href="laporan_hasil.php"><i class="fa fa-circle-o"></i>HASIL</a></li>
          </ul>
        </li>
      </ul>
    </section>
  </aside>