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
$pdf->MultiCell(19.5,0.5,'LAPORAN DATA SISWA',0,'L');    
$pdf->SetFont('Arial','B',10);
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Telpon : 085896214769 ',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Indonesia',0,'L');
$pdf->SetX(4);
$pdf->Line(1,3.1,28.5,3.1);
$pdf->SetLineWidth(0.1);      
$pdf->Line(1,3.2,28.5,3.2);   
$pdf->SetLineWidth(0);
$pdf->ln(1);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(0,0.7,'Laporan data Siswa',0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(5,0.7,"Di cetak pada : ".date("D-d/m/Y"),0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(2.5, 0.8, 'NIS', 1, 0, 'C');
$pdf->Cell(6, 0.8, 'Nama', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'B INDO', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'B INGGRIS', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'MTK', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'FISIKA', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'BIOLOGI', 1, 0, 'C');
$pdf->ln();

$no=1;
include '../koneksi.php';

$query=mysqli_query($koneksi, "SELECT data_nilai.*, data_siswa.* FROM data_nilai, data_siswa WHERE data_nilai.nis = data_siswa.nis");
while($lihat=mysqli_fetch_array($query)){
    $pdf->Cell(2.5, 0.8, $lihat['nis'] , 1, 0, 'C');
    $pdf->Cell(6, 0.8, $lihat['nama_siswa'],1, 0, 'C');
    $pdf->Cell(3, 0.8, $lihat['c1'],1, 0, 'C');
    $pdf->Cell(3, 0.8, $lihat['c2'],1, 0, 'C');
    $pdf->Cell(3, 0.8, $lihat['c3'],1, 0, 'C');
    $pdf->Cell(4, 0.8, $lihat['c4'],1, 0, 'C');
    $pdf->Cell(4, 0.8, $lihat['c5'],1, 0, 'C');
    $pdf->ln();
    $no++;
} 
$pdf->MultiCell(22.9,5,'Tanggal 31 Juny 2022',5,'R');    
$pdf->SetFont('Arial','B',9);
$pdf->SetX(6);
$pdf->MultiCell(19.2,0.5,'ARNOL ARJANSYAH',5,'R');    
$pdf->SetFont('Arial','B',10);
$pdf->SetX(6);

$pdf->Output("laporan_data_siswa.pdf","I");

?>

