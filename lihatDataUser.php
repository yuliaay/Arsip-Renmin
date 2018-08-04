<?php

require_once "core/init.php";

if(!isset($_SESSION['user'])) {
  header('Location: login.php');
}

$perPage = 9;
$page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
$start = ($page > 1) ? ($page * $perPage) - $perPage : 0;

$articles = "SELECT * FROM users LIMIT $start, $perPage";

$result = mysqli_query($link,"SELECT * FROM users");
$result2 = mysqli_query($link,$articles);
$total = mysqli_num_rows($result);

$pages = ceil($total/$perPage);

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
                <a href="cetakDataUser.php"> <button type="submit" class="btn btn-success pull-right"  name="submit" value="Cetak Data" id="btncetak"> <span class="glyphicon glyphicon-download-alt"></span> Cetak  </button> </a>
                 <?php if($_SESSION['status'] == 1
                    || $_SESSION['status'] == 0  || $_SESSION['status'] == 3  ): ?> <a href="inputDataUser.php">  <button type="submit" class="btn btn-primary pull-right"  name="submit" value="Input Data" id="btninput"> <span class="glyphicon glyphicon-edit"></span> Input </button></a> <?php endif;  ?>
                <p class="page_title"> Data User </p>  
              </header>

            <table class="table table-hover">
              <thead>
                  <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Nama Lengkap</th>
                    <th scope="col">NIP/NRP</th>
                    <th scope="col">Pangkat</th>
                    <th scope="col">Jabatan</th>
                    <th scope="col">Username</th>
                    <th scope="col">Password</th>
                    <th scope="col">Klasifikasi User</th>
                    <th scope="col">Action</th>
                  </tr>
              </thead>
              <tbody>

               <?php $no = 1; ?>
              <?php $articles = tampilkan_user(); ?>
              <?php while($row = mysqli_fetch_assoc($result2)): ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?=  @$row ['nama'] ?></td>
                   <td><?=  @$row ['nipnrp'] ?></td>
                  <td><?=  @$row ['pangkat'] ?></td>
                  <td><?=  @$row ['jabatan'] ?></td>
                   <td><?=  @$row ['username'] ?></td>
                  <td><?=  @$row ['password'] ?></td>
                  <td><?=  @$row ['status'] ?></td>
                  <td>
                   <?php if($_SESSION['status'] == 1
                    || $_SESSION['status'] == 0 
                 ): ?>
                   <a href="editUser.php?id=<?php echo $row['id']; ?>"> <button class="btn btn-success" id="edit"> <span class="glyphicon glyphicon-pencil"></span></button></a>
                   <a href="hapusUser.php?id=<?php echo $row['id']; ?>" onClick="return confirm('Apakah Anda Yakin Ingin Menghapus Data?')"><button class="btn btn-danger" id="hapus"> <span class="glyphicon glyphicon-trash"></span></button></a>
                  <?php endif;  ?>

                   <?php if($_SESSION['status'] == 2
                    || $_SESSION['status'] == 4
                 ): ?>
                  <a href="detailSuratKeluar.php?id=<?php echo $row['id']; ?>"> <button class="btn btn-primary" id="edit"> <span class="glyphicon glyphicon-zoom-in"></span></button></a>
                   <a href="disposisiSuratKeluar.php?id=<?php echo $row['id']; ?>"> <button class="btn btn-success" id="edit"> <span class="glyphicon glyphicon-edit"></span></button></a>
                   
                  <?php endif;  ?>
                </tr>
              <?php endwhile; ?>
              </tbody>
            </table>
          </nav>
         </div>

         <nav aria-label="..." class="pagi">
          
          <ul class="pagination">
            <li class="page-item"> <?php for($i=1; $i<=$pages; $i++){ ?><a  href="?halaman=<?php echo $i; ?>"> <?php echo $i; ?> <?php } ?></li>
          </ul>
          
        </nav>



        
       <?php require_once 'footer.php'; ?>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="vendor/bootstrap-3.3.7-dist/js/jquery.js"></script>
    <script src="vendor/bootstrap-3.3.7-dist/js/bootstrap.js"></script>
    <script src="vendor/admin/js/default.js"></script>
  </body>
</html>