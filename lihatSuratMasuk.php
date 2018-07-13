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

         <div id="content">
            <nav id="navbar-example2" class="navbar navbar-light bg-light">
              <header>
                <p class="page_title"> Data Surat Masuk </p>  
              </header>

            <table class="table table-hover">
              <thead>
                  <tr>
                    <th scope="col">No. Surat</th>
                    <th scope="col">Tanggal Surat</th>
                    <th scope="col">Asal Surat</th>
                    <th scope="col">Tanggal Terima</th>
                    <th scope="col">Isi Surat</th>
                    <th scope="col">Jenis Surat</th>
                    <th scope="col">Nomor Agenda</th>
                    <th scope="col">Disposisi</th>
                    <th scope="col">Tanggal Ekpedisi</th>
                    <th scope="col">Action</th>
                  </tr>
              </thead>
              <tbody>

              <?php $articles = tampilkan_surat_masuk(); ?>
              <?php while($row = mysqli_fetch_assoc($articles)): ?>
                <tr>
                  <td><?=  $row ['no_surat'] ?></td>
                  <td><?=  $row ['tgl_surat'] ?></td>
                  <td><?=  $row ['asal_surat'] ?></td>
                  <td><?=  $row ['tgl_terima'] ?></td>
                  <td><?=  $row ['isi_surat'] ?></td>
                  <td><?=  $row ['jenis_surat'] ?></td>
                  <td><?=  $row ['no_agenda'] ?></td>
                  <td><?=  $row ['disposisi'] ?></td>
                  <td><?=  $row ['tgl_ekspedisi'] ?></td>
                  <td><button class="btn btn-success" id="edit" data-toggle="modal" data-target="#editmodal"> <span class="glyphicon glyphicon-pencil"></span></button><button class="btn btn-danger" id="hapus" data-toggle="modal" data-target="#hapusmodal"> <span class="glyphicon glyphicon-trash" ></span></button></td>
                </tr>
              <?php endwhile; ?>
              </tbody>
            </table>
          </nav>
         </div>
        <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"><strong>Edit Data</strong></h5>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                      <label for="formGroupExampleInput">Nomor Surat</label>
                      <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Nomor Surat" name="no_surat">
                    </div>
                    <div class="form-group">
                      <label for="formGroupExampleInput2">Tanggal Surat</label>
                      <input type="date" class="form-control" id="formGroupExampleInput2" placeholder="Tanggal Surat" name="tgl_surat">
                    </div>
                     <div class="form-group">
                      <label for="formGroupExampleInput">Asal Surat</label>
                      <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Asal Surat" name="asal_surat">
                    </div>
                    <div class="form-group">
                      <label for="formGroupExampleInput2">Tanggal Terima</label>
                      <input type="date" class="form-control" id="formGroupExampleInput2" placeholder="Tanggal Terima" name="tgl_terima">
                    </div>
                   <div class="form-group">
                      <label for="formGroupExampleInput">Isi Surat</label>
                      <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Isi Surat" name="isi_surat">
                    </div>
                    <div class="form-group">
                      <label for="formGroupExampleInput2">Jenis Surat</label>
                      <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Jenis Surat" name="jenis_surat">
                    </div>
                     <div class="form-group">
                      <label for="formGroupExampleInput">Nomor Agenda</label>
                      <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Nomor Agenda" name="no_agenda">
                    </div>
                    <div class="form-group">
                      <label for="formGroupExampleInput2">Disposisi</label>
                      <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Disposisi" name="disposisi">
                    </div>
                    <div class="form-group">
                      <label for="formGroupExampleInput2">Tanggal Ekspedisi</label>
                      <input type="date" class="form-control" id="formGroupExampleInput2" placeholder="Tanggal Ekspedisi" name="tgl_ekspedisi">
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                  <input type="submit" class="btn btn-primary"  name="submit" value="Simpan">
                </div>
              </div>
            </div>
          </div>   

        <div class="modal fade" id="hapusmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-body">
                  <h5><strong>Anda Yakin Ingin Mengapus Data?</strong></h5>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                  <input type="submit" class="btn btn-primary"  name="submit" value="Hapus">
                </div>
              </div>
            </div>
          </div>   
        <div class="row">
          <footer id="admin-footer" class="clearfix">
            <div class="pull-left"><p> Copyright 2015</p></div>
            <div class="pull-right"><p> Admin System </p></div>
          </footer>
      </div>
    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="vendor/bootstrap-3.3.7-dist/js/jquery.js"></script>
    <script src="vendor/bootstrap-3.3.7-dist/js/bootstrap.js"></script>
    
    <script src="vendor/admin/js/default.js"></script>
  </body>
</html>