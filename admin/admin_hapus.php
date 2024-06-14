<?php
include '../koneksi.php';
session_start();
$hapus = mysqli_query($koneksi, "DELETE FROM data_admin WHERE id_admin = '$_GET[id_admin]'");
$_SESSION["hapus"]  = 'Data Berhasil Dihapus';
header("Location: data_admin.php");
?>