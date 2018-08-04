<?php 
require_once "core/init.php";

if(!isset($_SESSION['user'])) {
  header('Location: login.php');
}

 if(isset($_GET['id'])) {

  $agenda = tampilkan_perid_agenda(@$id);
  $row = mysqli_fetch_assoc($agenda);
  $jabatan = $row ['jabatan'];  
 }
   echo $jabatan; 

?>