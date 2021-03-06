<?php

require_once "core/init.php";

if(!isset($_SESSION['user'])) {
  header('Location: login.php');
}

?>
<!doctype html>
<html lang="en">

  <style type="text/css">
    .formSM {
      margin-left: 22px;
      margin-top: 20px;
      padding-right: : 10px;
    }

    .form-control{
      margin-left :-7%;
    }

    #savebtn {
        margin-left: 86%;
        margin-top: 1%;
    }
    #btnsve {
      margin-right: 5%;
    }



  </style>

<?php 


$error ='';
//mengecek apakah data sudah terisi dan tidak kosong 
if(isset($_POST['submit']) && isset($_FILES['file_agenda'])){
  $nomor = htmlspecialchars($_POST['nomor']);
  $tgl_surat = htmlspecialchars($_POST['tgl_surat']);
  $asal_surat = htmlspecialchars($_POST['asal_surat']);
  $tgl_terima = htmlspecialchars($_POST['tgl_terima']);
  $perihal = htmlspecialchars($_POST['perihal']);
  $giat = htmlspecialchars($_POST['giat']);
  $tgl_giat = htmlspecialchars($_POST['tgl_giat']);
  $tempat = htmlspecialchars($_POST['tempat']);
  $pakaian = htmlspecialchars($_POST['pakaian']);
  $uploader = htmlspecialchars($_POST['uploader']);
  $file_agenda = upload_agenda();

if(!empty(trim($nomor)) && !empty(trim($perihal))){
 
  if(tambah_agenda($nomor, $tgl_surat, $asal_surat, $tgl_terima, $perihal, $giat, $tgl_giat, $tempat, $pakaian, $uploader, $file_agenda)){ 
    tambah_notifikasi_ag();
     echo "
       <script>
           alert('Data berhasil ditambahkan');
           document.location.href = 'lihatAgenda.php';
        </script>
       ";
  }else { 
      echo "
      <script>
          alert('Ada masalah saat menambahkan data');
          
       </script>
      ";
  }
}else{ 
      echo "
      <script>
          alert('nomor surat dan perihal wajib diisi');
       </script>
      ";

  }
}

?>

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
            <p class="page_title"> Input Agenda </p>  
          </header>

      
         <form class= "formSM" method="post" action="inputAgenda.php" enctype="multipart/form-data">

          

          <div class="form-group row">
            <label for="nomor" class="col-sm-2 col-form-label">Nomor</label>
            <div class="col-sm-10">
              <input type="number" class="form-control" name="nomor" placeholder="Nomor" required>
            </div>
          </div>

          <div class="form-group row">
            <label for="tgl_surat" class="col-sm-2 col-form-label">Tanggal Surat</label>
            <div class="col-sm-10">
              <input type="date" class="form-control" name="tgl_surat" placeholder="Tanggal Surat" required>
            </div>
          </div>

          <div class="form-group row">
            <label for="asal_surat" class="col-sm-2 col-form-label">Asal Surat</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="asal_surat" placeholder="Tujuan Surat" required>
            </div>
          </div>

          <div class="form-group row">
            <label for="tgl_terima" class="col-sm-2 col-form-label">Tanggal Terima</label>
            <div class="col-sm-10">
              <input type="date" class="form-control" name="tgl_terima" placeholder="Tanggal Surat" required>
            </div>
          </div>

          <div class="form-group row">
            <label for="perihal" class="col-sm-2 col-form-label">Perihal</label>
            <div class="col-sm-10">
              <select name="perihal" class="form-control">
                <option>Undangan</option> 
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label for="giat" class="col-sm-2 col-form-label">Kegiatan</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="giat" placeholder="Kegiatan" required>
            </div>
          </div>

          <div class="form-group row">
            <label for="tgl_giat" class="col-sm-2 col-form-label">Tanggal Kegiatan</label>
            <div class="col-sm-10">
              <input type="date" class="form-control" name="tgl_giat" placeholder="Tanggal Kegiatan" required>
            </div>
          </div>

          <div class="form-group row">
            <label for="tempat" class="col-sm-2 col-form-label">Tempat</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="tempat" placeholder="Tempat Kegiatan" required>
            </div>
          </div>

          <div class="form-group row">
            <label for="pakaian" class="col-sm-2 col-form-label">Pakaian</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="pakaian" placeholder="Pakaian" required>
            </div>
          </div>

          <input type="hidden" name="uploader" value="<?= $_SESSION['user'] ?>">

           <div class="form-group row">
            <label for="pakaian" class="col-sm-2 col-form-label">File Surat</label>
            <div class="col-sm-10">
              <input type="file" class="form-control" name="file_agenda" placeholder="Agenda" >
            </div>


          </div>
          
           <!-- Button trigger modal -->
        <button type="submit" class="btn btn-primary pull-right"  name="submit" value="Simpan Data" id="btnsve">Simpan Data</button>

          </br>
        </br>
          
           
          
                  </form>
                </div>
              </div>
            </div>

          </div>
          </nav>
            
          </div>

          <?php require_once 'footer.php'; ?>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="vendor/bootstrap-3.3.7-dist/js/jquery.js"></script>
    <script src="vendor/bootstrap-3.3.7-dist/js/bootstrap.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>
    <script src="vendor/admin/js/default.js"></script>
  </body>
</html>