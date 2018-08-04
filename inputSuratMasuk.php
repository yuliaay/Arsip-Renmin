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
if(isset($_POST['submit']) && isset($_FILES['file_surat_masuk'])){
  $no_surat = htmlspecialchars($_POST['no_surat']);
  $tgl_surat = htmlspecialchars($_POST['tgl_surat']);
  $asal_surat = htmlspecialchars($_POST['asal_surat']);
  $tgl_terima = htmlspecialchars($_POST['tgl_terima']);
  $isi_surat = htmlspecialchars($_POST['isi_surat']);
  $jenis_surat = htmlspecialchars($_POST['jenis_surat']);
  $no_agenda = htmlspecialchars($_POST['no_agenda']);
  $disposisi = htmlspecialchars($_POST['disposisi']);
  $tgl_ekspedisi = htmlspecialchars($_POST['tgl_ekspedisi']);
  $file_surat_masuk = upload_surat_masuk();

if(!empty(trim($no_surat)) && !empty(trim($isi_surat))){
 
  if(tambah_surat_masuk($no_surat, $tgl_surat, $asal_surat, $tgl_terima, $isi_surat, $jenis_surat, $no_agenda, $disposisi, $tgl_ekspedisi, $file_surat_masuk)){ 
    tambah_notifikasi_sm();
         echo "
      <script>
          alert('Data berhasil ditambahkan');
          document.location.href = 'lihatSuratMasuk.php';
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
            <p class="page_title"> Input Surat Masuk </p>  
          </header>

      
         <form class= "formSM" method="post" action="inputSuratMasuk.php" enctype="multipart/form-data">
          <div class="form-group row">
            <label for="no_surat" class="col-sm-2 col-form-label">Nomor Surat</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="no_surat" placeholder="Nomor Surat" required>
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
              <input type="text" class="form-control" name="asal_surat" placeholder="Asal Surat" required>
            </div>
          </div>

           <div class="form-group row">
            <label for="tgl_terima" class="col-sm-2 col-form-label">Tanggal Terima</label>
            <div class="col-sm-10">
              <input type="date" class="form-control" name="tgl_terima" placeholder="Tanggal Terima" required>
            </div>
          </div>

          <div class="form-group row">
            <label for="isi_surat" class="col-sm-2 col-form-label">Isi Surat</label>
            <div class="col-sm-10">
              <textarea class="form-control" name="isi_surat" rows="3" required></textarea>
            </div>
          </div>

          <div class="form-group row">
            <label for="jenis_surat" class="col-sm-2 col-form-label">Jenis Surat</label>
            <div class="col-sm-10">
              <select name="jenis_surat" class="form-control" required>
                <option>Nota Dinas</option>
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label for="no_agenda" class="col-sm-2 col-form-label">Nomor Agenda</label>
            <div class="col-sm-10">
              <input type="number" class="form-control" name="no_agenda" placeholder="Nomor Agenda" required>
            </div>
          </div>

          <div class="form-group row">
            <label for="disposisi" class="col-sm-2 col-form-label">Disposisi</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="disposisi" placeholder="Disposisi" required>
            </div>
          </div>

           <div class="form-group row">
            <label for="tgl_ekspedisi" class="col-sm-2 col-form-label">Tanggal Ekspedisi</label>
            <div class="col-sm-10">
              <input type="date" class="form-control" name="tgl_ekspedisi" placeholder="Tanggal Ekspedisi">
            </div>
          </div>


           <div class="form-group row">
            <label for="pakaian" class="col-sm-2 col-form-label">File Surat</label>
            <div class="col-sm-10">
              <input type="file" class="form-control" name="file_surat_masuk" placeholder="Surat Masuk" >
            </div>
          </div>
          

      
          
           <!-- Button trigger modal -->
           <Button type="submit" class="btn btn-primary pull-right"  name="submit" value="Simpan Data" id="btnsve">Simpan Data</Button>

          </br>
        </br>
          <div> <?=$error ?> </div> 
          <!-- Modal -->
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
    <script src="vendor/admin/js/default.js"></script>
  </body>
</html>