<?php


require_once "core/init.php";

if(!isset($_SESSION['user'])) {
  header('Location: login.php');
}

if(isset($_GET['id'])){
	if(hapus_data($_GET['id'])){
		echo 'Data Berhasil Dihapus';
	 }
	else echo 'gagal menghapus data'; 
}

?>