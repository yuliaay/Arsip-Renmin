<?php

function escape($data){
	global $link;
	return mysqli_real_escape_string($link,$data);
}

function tambah_surat_masuk($no_surat, $tgl_surat, $asal_surat, $tgl_terima, $isi_surat, $jenis_surat, $no_agenda, $disposisi, $tgl_ekspedisi){
	$isi_surat = escape($isi_surat);
	$disposisi = escape($disposisi);
	
	$query = "INSERT INTO surat_masuk (no_surat, tgl_surat, asal_surat, tgl_terima, isi_surat, jenis_surat, no_agenda, disposisi, tgl_ekspedisi) VALUES ('$no_surat', '$tgl_surat', '$asal_surat', '$tgl_terima', '$isi_surat', '$jenis_surat', '$no_agenda', '$disposisi', '$tgl_ekspedisi')";
	return run($query);
}

function tambah_surat_keluar($no_surat, $tgl_surat, $tujuan,  $isi_surat, $jenis_surat, $no_agenda, $keterangan){
	$isi_surat = escape($isi_surat);
	$keterangan = escape($keterangan);
	
	$query = "INSERT INTO surat_keluar (no_surat, tgl_surat, tujuan, isi_surat, jenis_surat, no_agenda, keterangan) VALUES ('$no_surat', '$tgl_surat', '$tujuan', '$isi_surat', '$jenis_surat', '$no_agenda', '$keterangan')";
	return run($query);
}

function tambah_agenda($nomor, $tgl_surat, $asal_surat, $tgl_terima, $perihal, $giat, $tgl_giat, $tempat, $pakaian){
	$isi_surat = escape($perihal);
	$disposisi = escape($giat);
	
	$query = "INSERT INTO agenda (nomor, tgl_surat, asal_surat, tgl_terima, perihal, giat, tgl_giat, tempat, pakaian) VALUES ('$nomor', '$tgl_surat', '$asal_surat', '$tgl_terima', '$perihal', '$giat', '$tgl_giat', '$tempat', '$pakaian')";
	return run($query);
}

function run($query){
	global $link; 

	if(mysqli_query($link, $query)) return true;
	else return false; 
}

function result($query){
global $link; 
 if($result = mysqli_query($link, $query) or die ('gagal menampilkan data')){
 	return $result;
  }

}

function tampilkan_surat_masuk(){
	$query = "SELECT * FROM surat_masuk";
	return result($query);
}

function tampilkan_surat_keluar(){
	$query = "SELECT * FROM surat_keluar";
	return result($query);
}

function tampilkan_agenda(){
	$query = "SELECT * FROM agenda";
	return result($query);
}

function hapus_data($id){
	$id = "SELECT id FROM agenda";
	$query = "DELETE FROM agenda WHERE id=$id";
	return run($query);
}



?>