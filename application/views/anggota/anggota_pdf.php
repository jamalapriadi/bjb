<?php

$pdf = new FPDF('P','mm','A4');

$pdf->AddPage();
$pdf->AliasNbPages();


$pdf->SetFont('Arial','B',11);

$pdf->Cell(100,6,'Data Anggota');
$pdf->Ln(10);
$pdf->Cell(10,6,'No.',1,0,'C');
$pdf->Cell(50,6,'Nama Lengkap',1,0,'C');
$pdf->Cell(90,6,'Alamat',1,0,'C');
$pdf->Cell(40,6,'No. Telp',1,0,'C');
$pdf->Ln();

$pdf->SetFont('Arial','',10);
$no = 0;
foreach($query as $row):
	$no++;
	$pdf->Cell(10,6,$no,1,0);
	$pdf->Cell(50,6,$row->nama,1,0);
	$pdf->Cell(90,6,$row->alamat,1,0);
	$pdf->Cell(40,6,$row->telp,1,0);
	$pdf->Ln();
endforeach;



//tampilkan file PDF
$pdf->Output('Laporan_Anggota.pdf','I');