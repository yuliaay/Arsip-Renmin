<?php

require_once "core/init.php";

if(!isset($_SESSION['user'])) {
  header('Location: login.php');
}

if(isset($_GET['id'])){
	if(hapus_surat_keluar($_GET['id'])){
		header('Location: lihatSuratKeluar.php');
	 }
	else echo "
      <script>
          alert('Gagal Menghapus data');
          document.location.href = 'lihatSuratKeluar.php';
       </script>
      ";
}

?>