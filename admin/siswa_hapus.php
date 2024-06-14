<?php
session_start();
include '../koneksi.php';
$query = mysqli_query($koneksi, "SELECT * FROM data_nilai WHERE nis = '$_GET[nis]'");
$data1 = mysqli_fetch_array($query);

$hapus2 = mysqli_query($koneksi, "DELETE FROM data_hasil WHERE id_nilai = '$data1[id_nilai]'");
$hapus1 = mysqli_query($koneksi, "DELETE FROM data_siswa WHERE nis = '$_GET[nis]'");
$hapus2 = mysqli_query($koneksi, "DELETE FROM data_nilai WHERE nis = '$_GET[nis]'");
$_SESSION["hapus"]  = 'Data Berhasil Dihapus';
header("Location: data_siswa.php");
?>