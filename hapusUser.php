<?php


require_once "core/init.php";

if(!isset($_SESSION['user'])) {
  header('Location: login.php');
}

if(isset($_GET['id'])){
	if(hapus_user($_GET['id'])){
		header('Location: lihatDataUser.php');
	 }
	else echo "
      <script>
          alert('Gagal Menghapus data');
          document.location.href = 'lihatAgenda.php';
       </script>
      ";
}

?>