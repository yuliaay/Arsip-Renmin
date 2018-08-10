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
  $username = htmlspecialchars($_POST['username']);
  $password = htmlspecialchars($_POST['password']);
  $nama = htmlspecialchars($_POST['nama']);
  $status = htmlspecialchars($_POST['status']);
  $nipnrp = htmlspecialchars($_POST['nipnrp']);
  $pangkat = htmlspecialchars($_POST['pangkat']);
  $jabatan = htmlspecialchars($_POST['jabatan']);

if(!empty(trim($username)) && !empty(trim($password))){
 
  if(tambah_user($username, $password, $nama, $status, $nipnrp, $pangkat, $jabatan)){ 
   echo "
      <script>
          alert('Data berhasil ditambahkan');
          document.location.href = 'lihatDataUser.php';
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
            <p class="page_title"> Input Data User</p>  
          </header>

      
         <form class= "formSM" method="post" action="inputDataUser.php">
          <div class="form-group row">
            <label for="username" class="col-sm-2 col-form-label">Username</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="username" placeholder="Username" required>
            </div>
          </div>

          <div class="form-group row">
            <label for="password" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" name="password" placeholder="Password" required>
            </div>
          </div>

          <div class="form-group row">
            <label for="nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="nama" placeholder="Nama" required>
            </div>
          </div>


          <div class="form-group row">
            <label for="status" class="col-sm-2 col-form-label">Klasifikasi User</label>
            <div class="col-sm-10">
              <select name="status" class="form-control" required>
                 <option value="3">Staff TI</option>
                <option value="1">Tata Usaha</option>
                <option value="2">Kasubag/Kasubid</option>
                <option value="4">Kabid</option> 
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label for="nipnrp" class="col-sm-2 col-form-label">NIP/NRP</label>
            <div class="col-sm-10">
              <input type="number" class="form-control" name="nipnrp" placeholder="NIP/NRP" required>
            </div>
          </div>

          <div class="form-group row">
            <label for="pangkat" class="col-sm-2 col-form-label">Pangkat</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="pangkat" placeholder="Pangkat">
            </div>
          </div>

          <div class="form-group row">
            <label for="pangkat" class="col-sm-2 col-form-label">Jabatan</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="jabatan" placeholder="Jabatan">
            </div>
          </div>
          
           <!-- Button trigger modal -->
        <button type="submit" class="btn btn-primary pull-right"  name="submit" value="Simpan Data" id="btnsve">Simpan Data</button>

          </br>
        </br>
          <div> <?=$error ?> </div> 


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