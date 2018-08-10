<?php

require_once "core/init.php";

if(!isset($_SESSION['user'])) {
  header('Location: login.php');
}

if(isset($_POST['submit'])) {
  $catatan = $_POST['catatan'];
  $kpd_yth2 = $_POST['kpd_yth2'];
  $id = $_POST['id_disposisi'];

if(!empty(trim($kpd_yth2)) && !empty(trim($catatan))){

  if(update_dispss($catatan, $id)){ 
   tambah_dispss_share_staff($kpd_yth2, $id);
   echo "
      <script>
          alert('Data berhasil ditambahkan');
          document.location.href = 'lihatDataDisposisi.php';
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
            <p class="page_title"> Input Disposisi </p>  
          </header>

      
         <form class= "formSM" method="post" action="lembardisposisi_staff.php?id=<?= $_GET['id'] ?>" enctype="multipart/form-data">
          
          <input type="hidden" name="id_disposisi" value="<?= $_GET['id'] ?>">

          <div class="form-group row">
            <label for="no_surat" class="col-sm-2 col-form-label">Kepada YTH</label>
              <div class="col-sm-10">
              <select name="kpd_yth2" class="form-control" required>
                <option value="4">Kaurmin</option>
                <option>Kaurtekom</option>
                <option>Kaurfo</option> 
              </select>
            </div>
          </div>

         <div class="form-group row">
            <label for="isi" class="col-sm-2 col-form-label">Isi Disposisi</label>
            <div class="col-sm-10">
              <textarea class="form-control" name="catatan" rows="3" placeholder="Isi Disposisi" required></textarea>
            </div>
          </div>

<!--          <div class="form-group row">
            <label for="isi" class="col-sm-2 col-form-label">Catatan</label>
            <div class="col-sm-10">
              <textarea class="form-control" name="catatan" rows="3" placeholder="Isi Disposisi"></textarea>
            </div>
          </div>

           <div class="form-group row">
            <label for="batas_waktu" class="col-sm-2 col-form-label">Batas Waktu</label>
            <div class="col-sm-10">
              <input type="date" class="form-control" name="batas_waktu" placeholder="Batas Waktu" required>
            </div>
          </div> -->

          
       <Button type="submit" class="btn btn-primary pull-right"  name="submit" value="Simpan Data" id="btnsve">Simpan Data</Button>

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
