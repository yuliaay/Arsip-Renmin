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
$pdf->Cell(0,4,'ARSIP AGENDA BID TI POL POLDA JAMBI',0,1,'C',false);


$pdf->Cell(130);



$pdf->Cell(79,0.2,'','0','1','C',true);
$pdf->Ln(7);

$pdf->SetFont('Arial','',10);
$pdf->Cell(9,9,'No.',1,0,'C');

$pdf->SetFont('Arial','',10);
$pdf->Cell(20,9,'No. Surat',1,0,'C');


$pdf->SetFont('Arial','',10);
$pdf->Cell(30,9,'Tanggal Surat',1,0,'C');

$pdf->SetFont('Arial','',10);
$pdf->Cell(38,9,'Asal Surat',1,0,'C');

$pdf->SetFont('Arial','',10);
$pdf->Cell(34,9,'Tanggal Terima',1,0,'C');

$pdf->SetFont('Arial','',10);
$pdf->Cell(40,9,'Perihal',1,0,'C');

$pdf->SetFont('Arial','',10);
$pdf->Cell(60,9,'Kegiatan',1,0,'C');

$pdf->SetFont('Arial','',10);
$pdf->Cell(33,9,'Tanggal Kegiatan',1,0,'C');

$pdf->SetFont('Arial','',10);
$pdf->Cell(30,9,'Tempat',1,0,'C');

$pdf->SetFont('Arial','',10);
$pdf->Cell(30,9,'Pakaian',1,0,'C');
$pdf->Ln(3); 

$conn = mysqli_connect("localhost","root","","arsip_renmin");
    $sql = "SELECT * FROM agenda ORDER BY id";
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
		$pdf->Cell(20,6,$row["nomor"] ,1,0,'C');
		$pdf->Cell(30,6,$row["tgl_surat"],1,0,'C');
		$pdf->Cell(38,6,$row["asal_surat"],1,0,'C');
		$pdf->Cell(34,6,$row["tgl_terima"] ,1,0,'C');
		$pdf->Cell(40,6,$row["perihal"],1,0,'C');
		$pdf->Cell(60,6,$row["giat"],1,0,'C');
		$pdf->Cell(33,6,$row["tgl_giat"] ,1,0,'C');
		$pdf->Cell(30,6,$row["tempat"],1,0,'C');
		$pdf->Cell(30,6,$row["pakaian"],1,0,'C');

}




//Cell width, height, text, border end line, align)
$pdf->Output();

?>