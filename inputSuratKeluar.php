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
if(isset($_POST['submit'])){
  $no_surat = $_POST['no_surat'];
  $tgl_surat = $_POST['tgl_surat'];
  $tujuan = $_POST['tujuan'];
  $isi_surat = $_POST['isi_surat'];
  $jenis_surat = $_POST['jenis_surat'];
  $no_agenda = $_POST['no_agenda'];
  $keterangan = $_POST['keterangan'];

if(!empty(trim($no_surat)) && !empty(trim($isi_surat))){
 
  if(tambah_surat_keluar($no_surat, $tgl_surat, $tujuan, $isi_surat, $jenis_surat, $no_agenda, $keterangan)){ 
      $error = 'Data Berhasil ditambahkan';
  }else { 
     $error = 'Ada Masalah saat Menambahkan data';
  }
}else{ 
  $error = 'No surat dan Isi Wajib diisi';

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
            <p class="page_title"> Input Surat Keluar </p>  
          </header>

      
         <form class= "formSM" method="post" action="inputSuratKeluar.php">
          <div class="form-group row">
            <label for="no_surat" class="col-sm-2 col-form-label">Nomor Surat</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="no_surat" placeholder="Nomor Surat">
            </div>
          </div>

          <div class="form-group row">
            <label for="tgl_surat" class="col-sm-2 col-form-label">Tanggal Surat</label>
            <div class="col-sm-10">
              <input type="date" class="form-control" name="tgl_surat" placeholder="Tanggal Surat">
            </div>
          </div>

          <div class="form-group row">
            <label for="asal_surat" class="col-sm-2 col-form-label">Tujuan Surat</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="tujuan" placeholder="Tujuan Surat">
            </div>
          </div>

          <div class="form-group row">
            <label for="isi_surat" class="col-sm-2 col-form-label">Isi Surat</label>
            <div class="col-sm-10">
              <textarea class="form-control" name="isi_surat" rows="3"></textarea>
            </div>
          </div>

          <div class="form-group row">
            <label for="jenis_surat" class="col-sm-2 col-form-label">Jenis Surat</label>
            <div class="col-sm-10">
              <select name="jenis_surat" class="form-control">
                <option>Nota Dinas</option> 
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label for="no_agenda" class="col-sm-2 col-form-label">Nomor Agenda</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="no_agenda" placeholder="Nomor Agenda">
            </div>
          </div>

          <div class="form-group row">
            <label for="disposisi" class="col-sm-2 col-form-label">Keterangan</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="keterangan" placeholder="keterangan">
            </div>
          </div>
          
           <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#exampleModal" id="btnsve">
            Simpan Data
          </button>

          </br>
        </br>
          <div> <?=$error ?> </div> 
          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  ...
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <input type="submit" class="btn btn-primary"  name="submit" value="submit">
                </div>
              </div>
            </div>
          </div>   
                  </form>
                </div>
              </div>
            </div>

          </div>
          </nav>
            
          </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="vendor/bootstrap-3.3.7-dist/js/jquery.js"></script>
    <script src="vendor/bootstrap-3.3.7-dist/js/bootstrap.js"></script>
    <script src="vendor/admin/js/default.js"></script>
  </body>
</html>