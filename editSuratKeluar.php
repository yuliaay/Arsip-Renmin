<?php

require_once "core/init.php";

if(!isset($_SESSION['user'])) {
  header('Location: login.php');
}

$id = @$_GET['id'];

if(isset($_GET['id'])){
  $surat = tampilkan_perid_suratkeluar($id);
  while ($row = mysqli_fetch_assoc($surat)){
    
    $no_surat_awal = $row ['no_surat'];
    $tgl_surat_awal = $row ['tgl_surat'];
    $tujuan_awal = $row ['tujuan'];
    $isi_surat_awal = $row ['isi_surat'];
    $jenis_surat_awal = $row ['jenis_surat'];
    $no_agenda_awal = $row ['no_agenda'];
    $keterangan_awal = $row ['keterangan'];
    $id_awal = $row ['id'];
  }
}

if(isset($_POST['submit'])){
  
  $no_surat =   htmlspecialchars($_POST['no_surat']);
  $tgl_surat =   htmlspecialchars($_POST['tgl_surat']);
  $tujuan =   htmlspecialchars($_POST ['tujuan']);
  $isi_surat =   htmlspecialchars($_POST['isi_surat']);
  $jenis_surat =   htmlspecialchars($_POST['jenis_surat']);
  $no_agenda =   htmlspecialchars($_POST ['no_agenda']);
  $keterangan =   htmlspecialchars($_POST['keterangan']);
  $id =  htmlspecialchars(@$_POST['id']);
  

  if(!empty(trim($no_surat)) && !empty(trim($isi_surat))){
    if(edit_surat_keluar($no_surat, $tgl_surat, $tujuan, $isi_surat, $jenis_surat, $no_agenda, $keterangan, $id)){
    echo "
      <script>
          alert('Data telah diperbarui');
          document.location.href = 'lihatSuratKeluar.php';
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
            <p class="page_title"> Edit Surat Keluar </p>  
          </header>

      
         <form class= "formSM" method="post" action="editSuratKeluar.php">
          <div class="form-group row">
            <label for="no_surat" class="col-sm-2 col-form-label">Nomor Surat</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="no_surat" placeholder="Nomor Surat" value="<?=@$no_surat_awal; ?>" required>
            </div>
          </div>

          <div class="form-group row">
            <label for="tgl_surat" class="col-sm-2 col-form-label">Tanggal Surat</label>
            <div class="col-sm-10">
              <input type="date" class="form-control" name="tgl_surat" placeholder="Tanggal Surat" value="<?=@$tgl_surat_awal; ?>" required>
            </div>
          </div>

          <div class="form-group row">
            <label for="asal_surat" class="col-sm-2 col-form-label">Tujuan Surat</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="tujuan" placeholder="Tujuan Surat" value="<?=@$tujuan_awal; ?>" required>
            </div>
          </div>

          <div class="form-group row">
            <label for="isi_surat" class="col-sm-2 col-form-label">Isi Surat</label>
            <div class="col-sm-10">
              <textarea class="form-control" name="isi_surat" rows="3"  required> <?=@$isi_surat_awal; ?> </textarea>
            </div>
          </div>

          <div class="form-group row">
            <label for="jenis_surat" class="col-sm-2 col-form-label">Jenis Surat</label>
            <div class="col-sm-10">
              <select name="jenis_surat" class="form-control" value="<?=@$jenis_surat_awal; ?>" required>
                <option>Nota Dinas</option> 
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label for="no_agenda" class="col-sm-2 col-form-label">Nomor Agenda</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="no_agenda" value="<?=@$no_agenda_awal; ?>" placeholder="Nomor Agenda" required>
            </div>
          </div>

          <div class="form-group row">
            <label for="disposisi" class="col-sm-2 col-form-label">Keterangan</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="keterangan" value="<?=@$keterangan_awal; ?>" placeholder="Keterangan">
            </div>
          </div>


          <div class="form-group row">
            <div class="col-sm-10">
           <input type="hidden" class="form-control" name="id" value="<?=@$id_awal; ?>" placeholder="keterangan">
           </div>
          </div>
           <!-- Button trigger modal -->
        <button type="submit" class="btn btn-primary pull-right"  name="submit" value="Simpan Data" id="btnsve"> Simpan Data </button>

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