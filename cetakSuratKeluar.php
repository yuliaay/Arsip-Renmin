<?php 
include "vendor/fpdf17/fpdf.php";
require_once "core/init.php";

if(!isset($_SESSION['user'])) {
  header('Location: login.php');
}

//A4 width : 219mm
//default marign : 10mm each side 
// writable horizontal : 219-(10*2)*189mm

$pdf = new FPDF ('L', 'mm', 'legal');

$pdf->AddPage();

// Set font
$pdf->SetFont('Arial','',11);
$pdf->Cell(0,4,'KEPOLISIAN DAERAH REPUBLIK INDOENSIA',0,1,'',false);

$pdf->SetFont('Arial','',11);
$pdf->Cell(28);
$pdf->Cell(0,4,'DAERAH JAMBI',0,1,'',false);

$pdf->SetFont('Arial','',11);
$pdf->Cell(4);
$pdf->Cell(0,4,'BIDANG TEKNOLOGI INFORMASI POLRI','0','1','',false);
$pdf->Cell(85,0.2,'','0','1','C',true);
$pdf->Ln(4);

$pdf->SetFont('Arial','',11);
$pdf->Cell(4);
$pdf->Cell(0,4,'ARSIP SURAT KELUAR BID TI POL POLDA JAMBI',0,1,'C',false);


$pdf->Cell(124);



$pdf->Cell(92,0.2,'','0','1','C',true);
$pdf->Ln(7);


$pdf->SetFont('Arial','',10);
$pdf->Cell(9,9,'No.',1,0,'C');

$pdf->SetFont('Arial','',10);
$pdf->Cell(30,9,'No. Surat',1,0,'C');


$pdf->SetFont('Arial','',10);
$pdf->Cell(38,9,'Tanggal Surat',1,0,'C');

$pdf->SetFont('Arial','',10);
$pdf->Cell(48,9,'Tujuan Surat',1,0,'C');


$pdf->SetFont('Arial','',10);
$pdf->Cell(82,9,'Isi Surat',1,0,'C');

$pdf->SetFont('Arial','',10);
$pdf->Cell(45,9,'Jenis Surat',1,0,'C');

$pdf->SetFont('Arial','',10);
$pdf->Cell(30,9,'No. Agenda',1,0,'C');

$pdf->SetFont('Arial','',10);
$pdf->Cell(40,9,'Keterangan',1,0,'C');
$pdf->Ln(3); 

$conn = mysqli_connect("localhost","root","","arsip_renmin");
    $sql = "SELECT * FROM surat_keluar ORDER BY id";
    $result = mysqli_query($conn, $sql);
    if(!$result){printf("Error:%s\n",mysqli_error($conn));
      exit();}
    $no = 0;
    while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
    {
    	$no++;
    	$pdf->Ln(6);
      	$pdf->SetFont('Arial','',10);
		$pdf->Cell(9,6,$no,1,0,'C');
		$pdf->Cell(30,6,$row["no_surat"] ,1,0,'C');
		$pdf->Cell(38,6,$row["tgl_surat"],1,0,'C');
		$pdf->Cell(48,6,$row["tujuan"],1,0,'C');
		$pdf->Cell(82,6,$row["isi_surat"] ,1,0,'C');
		$pdf->Cell(45,6,$row["jenis_surat"],1,0,'C');
		$pdf->Cell(30,6,$row["no_agenda"],1,0,'C');
		$pdf->Cell(40,6,$row["keterangan"],1,0,'C');
}



//Cell width, height, text, border end line, align)
$pdf->Output();

?>