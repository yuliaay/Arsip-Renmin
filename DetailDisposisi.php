<?php

require_once "core/init.php";

if(!isset($_SESSION['user'])) {
  header('Location: login.php');
}

?>


<!doctype html>
<html lang="en">
  <style type="text/css">
    
    .table-hover {
      margin-left: 2%;
      margin-top: 1%;
    }


    #btninput {
      margin-right: 1%;
    }

    #btncetak {
      margin-right: 1%;
    }

    .pagi {
      margin-bottom: 2%;
      margin-top: -5%;
    }

    #caridata {
      margin-top: 1%;
    }
/* Style The Dropdown Button */
.dropbtn {
    background-color: white;
    color: grey;
    font-size: 14px;
    border: none;
    cursor: pointer;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
    position: relative;
    display: inline-block;
    margin-right:  19%;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 190px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #f1f1f1}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {
    display: block;

}

.label .label-warning {
  margin-left: -2%;
}

#logout {
  list-style-type: none;
  margin-top: -3%;
  margin-right:  4%;

}

.navhead {
  margin-left: 20%;
}

  </style>
 
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="vendor/bootstrap-3.3.7-dist/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="vendor/admin/css/default.css">

    <title>Admin</title>
  </head>

  <body>
         
    <div class="container-fluid display-table">
      <div class="row display-table-row">

        <!-- side menu -->       
        <?php require_once 'sidemenu.php'; ?>  

        <!-- main content -->
        <?php require_once 'header.php'; ?>

        <?php require_once 'footer.php'; ?>



      	<div id="content">
            <nav id="navbar-example2" class="navbar navbar-light bg-light">
              <header>
               <a href="cetakDetailDisposisi.php"> <button type="submit" class="btn btn-success pull-right"  name="submit" value="Cetak Data" id="btncetak"> <span class="glyphicon glyphicon-download-alt"></span> Cetak  </button> </a>
                <p class="page_title"> Data Detail Disposisi </p>  
              </header>
<?php 
              $id = $_GET['id'];

                if(isset($_GET['id'])){
                  $disposisi = tampilkan_dd_id($id);
                  while ($row = mysqli_fetch_assoc($disposisi)){
                    $asal_surat = $row ['asal_surat'];
                    $no_surat = $row ['no_surat'];
                    $perihal = $row ['isi_surat'];
                    $no_agenda = $row ['no_agenda'];
                    $tgl_terima = $row ['tgl_terima'];
                    $isi_disposisi = $row ['isi_disposisi'];
                    $batas_waktu = $row ['batas_waktu'];
                    $kpd_yth = $row ['username'];
                  }
                }?>

                  <p>Asal Surat : <?=  $asal_surat; ?></p>
                  <p>No Surat : <?=  $no_surat; ?></p>
                  <p>Perihal : <?=  $perihal; ?></p>
                  <p>No Agenda : <?=  $no_agenda; ?></p>
                  <p>Tanggal Terima : <?=  $tgl_terima; ?></p>
                  <p>Kepada Yth :  <?=  $kpd_yth; ?></p>
                  <p>Isi Disposisi : <?=  $isi_disposisi; ?></p>
                  <p>Batas Waktu : <?=  $batas_waktu; ?></p>
                  