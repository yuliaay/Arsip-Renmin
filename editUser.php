<?php

require_once "core/init.php";

if(!isset($_SESSION['user'])) {
  header('Location: login.php');
}

$id = @$_GET['id'];
if(isset($_GET['id'])){
  $user = tampilkan_perid_user($id);
  while ($row = mysqli_fetch_assoc($user)){
    $username_awal = $row ['username'];
    $password_awal = $row ['password'];
    $nama_awal = $row ['nama'];
    $status_awal = $row ['status'];
    $nipnrp_awal = $row ['nipnrp'];
    $pangkat_awal = $row ['pangkat'];
    $jabatan_awal = $row ['jabatan'];  
    $id_awal = $row['id'];  
  }
}

if(isset($_POST['submit'])){
  $username =  htmlspecialchars($_POST['username']);
  $password =  htmlspecialchars($_POST['password']);
  $nama =  htmlspecialchars($_POST ['nama']);
  $status =  htmlspecialchars($_POST ['status']);
  $nipnrp =  htmlspecialchars($_POST['nipnrp']);
  $pangkat =  htmlspecialchars($_POST['pangkat']);
  $jabatan =  htmlspecialchars($_POST ['jabatan']);
  $id =  htmlspecialchars($_POST['id']);
  

  if(!empty(trim($username)) && !empty(trim($password))){
    if(edit_data_user($username, $password, $nama, $status, $nipnrp, $pangkat, $jabatan, $id)){
    echo "
      <script>
          alert('Data telah diperbarui');
          document.location.href = 'lihatDataUser.php';
       </script>
      ";

    }else{
    echo "
      <script>
          alert('Ada masalah saat memperbarui data');
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
            <p class="page_title"> Edit User </p> 
            <a href="javascript:window.history.go(-1);" class="btn btn-primary pull-right"> kembali </a> 
          </header>

      
         <form class= "formSM" method="post" action="editUser.php">
          <div class="form-group row">
            <label for="username" class="col-sm-2 col-form-label">Username</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="username" placeholder="Usename" value="<?=@$username_awal; ?>" required>
            </div>
          </div>

          <div class="form-group row">
            <label for="password" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" name="password" placeholder="Password" value="<?=@$password_awal; ?>" required>
            </div>
          </div>

          <div class="form-group row">
            <label for="nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" value="<?=@$nama_awal; ?>" required>
            </div>
          </div>


          <div class="form-group row">
            <label for="jenis_surat" class="col-sm-2 col-form-label">Klasifikasi User</label>
             <div class="col-sm-10">
              <input type="text" class="form-control" name="status" placeholder="Nama Lengkap" value="<?=@$status_awal; ?>" required>
            </div>
          </div>

          <div class="form-group row">
            <label for="no_agenda" class="col-sm-2 col-form-label">NIP/NRP</label>
            <div class="col-sm-10">
              <input type="number" class="form-control" name="nipnrp" value="<?=@$nipnrp_awal; ?>" placeholder="NIP/NRP" required>
            </div>
          </div>

          <div class="form-group row">
            <label for="pangkat" class="col-sm-2 col-form-label">Pangkat</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="pangkat" value="<?=@$pangkat_awal; ?>" placeholder="Pangkat">
            </div>
          </div>

          <div class="form-group row">
            <label for="Jabatan" class="col-sm-2 col-form-label">Jabatan</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="jabatan" value="<?=@$jabatan_awal; ?>" placeholder="Jabatan">
            </div>
          </div>


          <div class="form-group row">
            <div class="col-sm-10">
           <input type="hidden" class="form-control" name="id" value="<?=@$id_awal; ?>" >
           </div>
          </div>
           <!-- Button trigger modal -->
        <Button type="submit" class="btn btn-primary pull-right"  name="submit" value="Simpan Data" id="btnsve"> Simpan Data </Button>

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
    <script src="vendor/admin/js/default.js"></script>
  </body>
</html>