<?
include "koneksi.php";
$no_sertifikat=$_POST['no_sertifikat'];
$nip=$_POST['nip'];
$nama=$_POST['nama'];
$tempat_lahir=$_POST['tempat_lahir'];
$tanggal_lahir = $_POST['thn']."-".$_POST['bln']."-".$_POST['tgl'];
$jk=$_POST['jenis_kelamin'];
$pangkat=$_POST['pangkat'];
$jabatan=$_POST['jabatan'];
$intansi=$_POST['instansi'];
$jenis_diklat=$_POST['jenis_diklat'];
if (empty($id))
{
die("Isikan Nomor Sertifikat Diklat!");
}
elseif(empty($nip))
{
die("Isikan NIP!");
}
else
{
$cekdata="select id from pegawai where id='$id'";
$ada=mysql_query($cekdata) or die(mysql_error());
if(mysql_num_rows($ada)>0)
	{ die("Nomor Sertifikat telah Terdaftar!"); }
	else
		{
		if (isset($_POST['submit']) && isset($_FILES['f1'])) {
			$dir = './berkas/';
			$file = $_FILES['f1']['tmp_name'];
			$name = $_FILES['f1']['name'];
			$info = pathinfo($name);
			$size = filesize ($file);
		if ($size > 1000000){
			exit('UKURAN FILE TERLALU GEDHE, CARI NYANG LAEN');
			}
			$ext = $info['extension'];
	if(($ext == 'pdf') || ($ext == 'rar')){
			if (!is_uploaded_file($file)) {
			exit('GAG ADA FILE...');
			}
	if (!move_uploaded_file($file, $dir.$name)) {
		echo 'Unable to upload file';
		} else {
		echo 'FILE BERHASIL DI-UPLOAD';
		}
		} else {
		echo('CUMAN BOLEH UPLOAD PDF atau RAR');
		}
		}
		mysql_query("insert into pegawai(no_sertifikat,nip,nama,tempat_lahir,tanggal_lahir,jk,pangkat,jabatan,instansi,jenis_diklat,berkas)" .
		"values('$no_sertifikat','$nip','$nama','$tempat_lahir','$tanggal_lahir','$jk','$pangkat','$jabatan','$intansi','$jenis_diklat','$berkas')") or die(mysql_error());
		echo "Berhasil";
		header("location:laporan-data-pegawai.php");
	} //end if terdaftar
}
?>


fadixz
pegawai.sql
-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 12, 2012 at 03:10 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `diklat`
--

--
 

--
-- Table structure for table `pegawai`
--

CREATE TABLE IF NOT EXISTS `pegawai` (
`no_sertifikat` varchar(50) NOT NULL,
`nip` char(18) NOT NULL,
`nama` varchar(50) NOT NULL,
`tempat_lahir` varchar(30) NOT NULL,
`tanggal_lahir` date NOT NULL,
`jk` enum('L','P') NOT NULL DEFAULT 'L',
`pangkat` char(26) NOT NULL,
`jabatan` varchar(50) NOT NULL,
`instansi` varchar(70) NOT NULL,
`jenis_diklat` varchar(50) NOT NULL,
`berkas` varchar(30) NOT NULL, // upload jenis file pdf, rar atau zip
PRIMARY KEY (`no_sertifikat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`no_sertifikat`, `nip`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jk`, `pangkat`, `jabatan`, `instansi`, `jenis_diklat`, `berkas`) VALUES
('12123232131', '123214314134', '', '', '1950-01-01', 'L', '-', '', '', '-', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
 
form input pegawai.html
 
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Entry Pegawai</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
.data {
font-family: Verdana, Geneva, sans-serif;
}
.menu {
font-family: Verdana, Geneva, sans-serif;
}
</style>
</head>
<body>
<p align="center">
<a href="index.php" class="menu"> MENU UTAMA</a>&nbsp;
<a href="laporan-data-pegawai.php" class="data"> DATA TERINPUT</a>
</p>
<form action="simpan-data-pegawai.php" method="post" enctype="multipart/form-data" name="FPEG">
<table width="615" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#669900">
<tr>
<td width="613" height="40" align="center" bgcolor="#669900"><strong><font color="#FFFFFF">ENTRY DATA PEGAWAI YANG TELAH DIKLAT</font></strong></td>
</tr>
<tr>
<td bgcolor="#FFFFFF"><table width="625" border="0" align="center" cellpadding="5" cellspacing="0">
<tr>
<td width="139">Nomor Sertifikat</td>
<td width="3">:</td>
<td width="200"><input name="no_sertifikat" type="text" id="no_sertifikat" size="50" maxlength="50"></td>
</tr>

<tr>
<td width="139">NIP</td>
<td width="3">:</td>
<td width="200"><input name="nip" type="text" id="nip" size="18" maxlength="18"></td>
</tr>
<tr>
<td>Nama</td>
<td>:</td>
<td><input name="nama" type="text" id="nama" size="50" maxlength="50"></td>
</tr>
<tr>
<td>Tempat Lahir</td>
<td>:</td>
<td><input name="tempat_lahir" type="text" id="tempat_lahir" size="30" maxlength="30"></td>
</tr>
<tr>
<td>Tanggal Lahir</td>
<td>:</td>
<td><select name="tgl" size="1" id="tgl">
<?
for ($i=1;$i<=31;$i++)
{
echo "<option value=".$i.">".$i."</option>";
}
?>
</select>
<select name="bln" size="1" id="bln">
<?
$bulan=array("","Januari","Pebruari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
for ($i=1;$i<=12;$i++)
{
echo "<option value=".$i.">".$bulan[$i]."</option>";
}
?>
</select>
<select name="thn" size="1" id="thn">
<?
for ($i=1950;$i<=1999;$i++)
{
echo "<option value=".$i.">".$i."</option>";
}
?>
</select></td>
</tr>
<tr>
<td>Jenis Kelamin</td>
<td>:</td>
<td><input name="jenis_kelamin" type="radio" value="L" checked>
Laki-laki
<input name="jenis_kelamin" type="radio" value="P">
Perempuan </td>
</tr>

<tr>
<td>Pangkat / Golongan</td>
<td>:</td>
<td><select name="pangkat" size="1">
<option selected value="-">--- Pilih Salah Satu ---</option>
<option value="Juru Muda / I.a">Juru Muda / I.a</option>
<option value="Juru Muda Tk. I / I.b">Juru Muda Tk. I / I.b</option>
<option value="Juru / I.c">Juru / I.c</option>
<option value="Juru Tk. I / I.d">Juru Tk. I / I.d</option>
<option value="Pengatur Muda / II.a">Pengatur Muda / II.a</option>
<option value="Pengatur Muda Tk. I / II.b">Pengatur Muda Tk. I / II.b</option>
<option value="Pengatur / II.c">Pengatur / II.c</option>
<option value="Pengatur Tk. I / II.d">Pengatur Tk. I / II.d</option>
<option value="Penata Muda / III.a">Penata Muda / III.a</option>
<option value="Penata Muda Tk. I / III.b">Penata Muda Tk. I / III.b</option>
<option value="Penata / III.c">Penata / III.c</option>
<option value="Penata Tk. I / III.d">Penata Tk. I / III.d</option>
<option value="Pembina / IV.a">Pembina / IV.a</option>
<option value="Pembina Tk. I / IV.b">Pembina Tk. I / IV.b</option>
<option value="Pembina Utama Muda / IV.c">Pembina Utama Muda / IV.c</option>
<option value="Pembina Utama Madya / IV.d">Pembina Utama Madya / IV.d</option>
<option value="Pembina Utama / IV.e">Pembina Utama / IV.e</option>
<option value="PTT">PTT</option>
</select>
</td>
</tr>

<tr>
<td>Jabatan</td>
<td>:</td>
<td><input name="jabatan" type="text" id="jabatan" size="50" maxlength="50"></td>
</tr>
<tr>
<td>Instansi</td>
<td>:</td>
<td><input name="instansi" type="text" id="instansi" size="70" maxlength="70">
</td>
</tr>

<tr>
<td>Jenis Diklat</td>
<td>:</td>
<td><select name="jenis_diklat" size="1">
<option selected value="-">--- Pilih Salah Satu ---</option>
<option value="Diklatpim Tk. I">Diklatpim Tk. I</option>
<option value="Diklatpim Tk. II">Diklatpim Tk. II</option>
<option value="Diklatpim Tk. III">Diklatpim Tk. III</option>
<option value="Diklatpim Tk. IV">Diklatpim Tk. IV</option>
<option value="Diklat Prajabatan CPNSD">Diklat Prajabatan CPNSD</option>
<option value="Diklat Manajemen Kepegawaian">Diklat Manajemen Kepegawaian</option>
<option value="Diklat Bendahara Pengeluaran">Diklat Bendahara Pengeluaran</option>
<option value="Diklat Pejabat Penatausahaan Keuangan">Diklat Pejabat Penatausahaan Keuangan</option>
<option value="Pelatihan / Orientasi PTT">Pelatihan / Orientasi PTT</option>
</select>
</td>
</tr>
<tr>
<td>Berkas Diklat</td>
<td>:</td>
<td><input type="file" name="doc" id="berkas"></td>
</tr>
<tr>
<td colspan="3" align="center"><input name="fok" type="submit" id="fok" value="OK">
<input name="fulang" type="reset" id="fulang" value="Ulangi">
<input name="fulang2" type="button" id="fulang2" value="Batal" onClick="javascript:history.back()"></td>
</tr>
</table></td>
</tr>
</table>
</form>
</body>
</html>

