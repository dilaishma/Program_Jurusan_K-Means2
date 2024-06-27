<?php

ob_start();
require('../assets/pdf/fpdf.php');

$pdf = new FPDF("L","cm","A4");

$pdf->SetMargins(2,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',12);
$pdf->Image('../logo1.png',1,1,2,2);
$pdf->SetX(4);            
$pdf->MultiCell(19.5,0.5,'LAPORAN DATA HASIL PENENTUAN CLUSTER PENYAKIT PASIEN RAWAT JALAN PUSKESMAS NGEMPLAK',0,'L');    
$pdf->SetFont('Arial','B',10);
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Telpon : ',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Indonesia',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Source Code by',0,'L');
$pdf->Line(1,3.1,28.5,3.1);
$pdf->SetLineWidth(0.1);      
$pdf->Line(1,3.2,28.5,3.2);   
$pdf->SetLineWidth(0);
$pdf->ln(1);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(0,0.7,'Laporan data Hasil Penentuan Jurusan',0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(5,0.7,"Di cetak pada : ".date("D-d/m/Y"),0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(2.5, 0.8, 'ID Penyakit', 1, 0, 'C');
$pdf->Cell(6, 0.8, 'Nama Penyakit', 1, 0, 'C');
$pdf->Cell(2, 0.8, 'Jumlah Usia 0-11 tahun', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Jumlah Usia 12-25 tahun', 1, 0, 'C');
$pdf->Cell(2, 0.8, 'Jumlah Usia 26-45 tahun', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'JUmlah Usia 46 - 65 tahun', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Jumlah Usia > 65 tahun', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'Kategori', 1, 0, 'C');
$pdf->ln();

$no=1;
include '../koneksi.php';

$ArrayNamaCluster = array();
$queryNamaCluster = mysqli_query($koneksi, "SELECT * FROM data_cluster");
while($dataNamaCluster = mysqli_fetch_array($queryNamaCluster)){
  array_push($ArrayNamaCluster, $dataNamaCluster['nama_cluster']);
}

$query=mysqli_query($koneksi, "SELECT data_hasil.*, data_nilai.*, data_siswa.* FROM data_hasil, data_nilai, data_siswa WHERE data_nilai.nis = data_siswa.nis AND data_hasil.id_nilai = data_nilai.id_nilai");
while($lihat=mysqli_fetch_array($query)){

    if($lihat['Cluster'] == "Cluster-1"){
        $jurusan = $ArrayNamaCluster[0];
    }elseif($lihat['Cluster'] == "Cluster-2"){
        $jurusan = $ArrayNamaCluster[1];
    }elseif($lihat['Cluster'] == "Cluster-3"){
        $jurusan = $ArrayNamaCluster[2];
    }

    $pdf->Cell(2.5, 0.8, $lihat['nis'] , 1, 0, 'C');
    $pdf->Cell(6, 0.8, $lihat['nama_siswa'],1, 0, 'C');
    $pdf->Cell(2, 0.8, $lihat['c1'],1, 0, 'C');
    $pdf->Cell(3, 0.8, $lihat['c2'],1, 0, 'C');
    $pdf->Cell(2, 0.8, $lihat['c3'],1, 0, 'C');
    $pdf->Cell(3, 0.8, $lihat['c4'],1, 0, 'C');
    $pdf->Cell(3, 0.8, $lihat['c5'],1, 0, 'C');
    $pdf->Cell(4, 0.8, $jurusan,1, 0, 'C');
    $pdf->ln();
    $no++;
}

$pdf->Output("laporan_data_hasil_cluster.pdf","I");

?>

