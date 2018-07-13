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

    #edit {
      width: 40px;
      height: 30px;
    }

     #hapus {
      width: 40px;
      height: 30px;
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
                <p class="page_title"> Data Agenda </p>  
              </header>

            <!-- Tabel Untuk Menampilkan Agenda -->
            <table class="table table-hover">
              <thead>
                  <tr>
                    <th scope="col">Nomor</th>
                    <th scope="col">Tanggal Surat</th>
                    <th scope="col">Asal Surat</th>
                    <th scope="col">Tanggal Terima</th>
                    <th scope="col">Perihal</th>
                    <th scope="col">Kegiatan</th>
                    <th scope="col">Tanggal Kegiatan</th>
                    <th scope="col">Tempat</th>
                    <th scope="col">Pakaian</th>
                    <th scope="col">Action</th>
                  </tr>
              </thead>
              <tbody>

              <?php $articles = tampilkan_agenda(); ?>
              <?php while($row = mysqli_fetch_assoc($articles)): ?>
                <tr>
                  <td><?=  $row ['nomor'] ?></td>
                  <td><?=  $row ['tgl_surat'] ?></td>
                  <td><?=  $row ['asal_surat'] ?></td>
                  <td><?=  $row ['tgl_terima'] ?></td>
                  <td><?=  $row ['perihal'] ?></td>
                  <td><?=  $row ['giat'] ?></td>
                  <td><?=  $row ['tgl_giat'] ?></td>
                  <td><?=  $row ['tempat'] ?></td>
                  <td><?=  $row ['pakaian'] ?></td>
                  <td><button class="btn btn-success" id="edit" data-toggle="modal" data-target="#editmodal"> <span class="glyphicon glyphicon-pencil"></span></button><button class="btn btn-danger" id="hapus" data-toggle="modal" data-target="#hapusmodal"> <span class="glyphicon glyphicon-trash" ></span></button></td>
                </tr>
              <?php endwhile; ?>
              </tbody>
            </table>
          </nav>
         </div>

        <!-- modal untuk ngedit -->
         <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"><strong>Edit Data</strong></h5>
                </div>
                <div class="modal-body">
                  <form>
                    <div class="form-group">
                      <label for="formGroupExampleInput">Nomor</label>
                      <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Nomor" name="nomor">
                    </div>
                    <div class="form-group">
                      <label for="formGroupExampleInput2">Tanggal Surat</label>
                      <input type="date" class="form-control" id="formGroupExampleInput2" placeholder="Tanggal Surat" name="tgl_surat")>
                    </div>
                     <div class="form-group">
                      <label for="formGroupExampleInput">Asal Surat</label>
                      <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Asal Surat" name="asal_surat">
                    </div>
                    <div class="form-group">
                      <label for="formGroupExampleInput2">Tanggal Terima</label>
                      <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Tanggal Terima" name="tgl_terima">
                    </div>
                   <div class="form-group">
                      <label for="formGroupExampleInput">Perihal</label>
                      <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Perihal" name="perihal">
                    </div>
                    <div class="form-group">
                      <label for="formGroupExampleInput2">Kegiatan</label>
                      <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Kegiatan" name="giat">
                    </div>
                     <div class="form-group">
                      <label for="formGroupExampleInput">Tanggal Kegiatan</label>
                      <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Tanggal Kegiatan">
                    </div>
                    <div class="form-group">
                      <label for="formGroupExampleInput2">Tempat</label>
                      <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Tempat" name="tempat">
                    </div>
                    <div class="form-group">
                      <label for="formGroupExampleInput2">Pakaian</label>
                      <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Pakaian" name="pakaian">
                    </div>
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                  <input type="submit" class="btn btn-primary"  name="submit" value="Simpan">
                </div>
              </div>
            </div>
          </div>   

        <!-- Modal untuk hapus -->
        <div class="modal fade" id="hapusmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-body">
                  <h5><strong>Anda Yakin Ingin Mengapus Data?</strong></h5> 
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                  <a href="hapusAgenda.php?id=<?= $row ['id']; ?>" class="btn btn-primary"  name="hapus" value="Hapus">Hapus</a>
                </div>
              </div>
            </div>
          </div>   
        
        <!-- Footer -->
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