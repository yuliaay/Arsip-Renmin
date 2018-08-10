<?php

require_once "core/init.php";

if(!isset($_SESSION['user'])) {
  header('Location: login.php');
}

$perPage = 9;
$page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
$start = ($page > 1) ? ($page * $perPage) - $perPage : 0;

$articles = "SELECT * FROM share_dspss, dispss, users WHERE share_dspss.kpd_yth = users.id AND share_dspss.id_disposisi = dispss.id_dspss  ORDER BY id DESC LIMIT $start, $perPage";

$result = mysqli_query($link,"SELECT * FROM share_dspss, dispss, users WHERE share_dspss.kpd_yth = users.id AND share_dspss.id_disposisi = dispss.id_dspss  ORDER BY id DESC");
$result2 = mysqli_query($link,$articles);
$total = mysqli_num_rows($result);

$pages = ceil($total/$perPage);

?>
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
/* Style The Dropdown Button */
.dropbtn {
    background-color: white;
    color: grey;
    font-size: 14px;
    border: none;
    cursor: pointer;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
    position: relative;
    display: inline-block;
    margin-right:  19%;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 190px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #f1f1f1}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {
    display: block;

}

.label .label-warning {
  margin-left: -2%;
}

#logout {
  list-style-type: none;
  margin-top: -3%;
  margin-right:  4%;

}

.navhead {
  margin-left: 20%;
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

        <div class="col-md-10 col-sm-11 display-table-cell  valign-top">
          <div class="row">
           

            <header id="nav-header" class="clearfix">
              <div class="col-md-5">
                <nav class="navbar-default pull-left">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="offcanvas" data-target="#side-menu">
                  <span class="sr-only"></span>
                  <span class="icon-bar"> </span>
                  <span class="icon-bar"> </span>
                  <span class="icon-bar"> </span>
                </button>
                </nav>

              <form action="cari_suratmasuk.php" method="get">
                <input type="text" name="cari" class="hidden-sn hidden-xs" id="header-search-field" placeholder="Search for Something..">
              </form>
              </div>

              <div class="col-md-7">
                <ul>       
                  <div class="dropdown pull-right">
                  <li class="fixed-width"> 
                   <button class="dropbtn "><span class="glyphicon glyphicon-bell" id="notif"></span></button>
                         <span class="label label-success"><?php echo "$count"; ?></span>
                          <div class="dropdown-content">
                            <?php 
                            foreach ($data as $value) {
                              # code...
                          ?>
                            <?php if($value['read_n'] == '1'){ 
                              $id = $value['id'];
                              ?>
                            <a href="?notf=<?php echo $value['id']; ?>" class="alert-danger"> <?php echo $value['title']; ?> </a>
                          <?php } }?> 
                      </div>
                  </li>
                </div>
               </ul>
             </div>

                  <li id="logout" class="pull-right"> 
                    <a href="logout.php" class="logout">
                        <span class="glyphicon glyphicon-log-out"><span>
                        Logout
                    </a>
                  </li>
            </header>
        </div>



       <form action="carism_tgl.php" method="get">
        <div class="row" id="caridata"> 
          <div class="col-sm-4"> <input type="date" class="form-control" name="tgl_surat_mulai" placeholder="Tanggal Mulai" required> </div>

          <div class="col-sm-4"> <input type="date" class="form-control" name="tgl_surat_selesai" placeholder="Tanggal Selesai" required></div>

           <div class="col-sm-4">  <button type="submit" class="btn btn-success" id="btncari" > <span class="glyphicon glyphicon-search"></span> Cari  </button>  </div>
        </div>
      </form>

         <div id="content">
            <nav id="navbar-example2" class="navbar navbar-light bg-light">
              <header>
               <a href="cetakDisposisi.php"> <button type="submit" class="btn btn-success pull-right"  name="submit" value="Cetak Data" id="btncetak"> <span class="glyphicon glyphicon-download-alt"></span> Cetak  </button> </a>
                <p class="page_title"><a href="lihatdatadisposisi_atasan.php"> Data Disposisi Surat </a></p>  
              </header>

            <table class="table table-hover">
              <thead>
                  <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Tanggal Disposisi</th>
                    <th scope="col">Kpd YTH.</th>
                    <th scope="col">Isi Disposisi</th>
                    <th scope="col">Catatan</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                  </tr>
              </thead>
              <tbody>
              <?php  $i = 1; ?>
              <?php $articles = tampilkan_disposisi_atasan(); ?>
              <?php while($row = mysqli_fetch_assoc($result2)): ?>

                <tr>
                  <td><?=  $i++; ?></td>
                  <td><?=  $row ['batas_waktu'] ?></td>
                  <td><?=  $row ['pangkat'] ?></td>
                  <td><?=  $row ['isi_disposisi'] ?></td>
                  <td><?=  $row ['cttn'] ?></td>
                  <td><?php  if($row['sttus'] == 0){
                      echo '<p style="background-color:hsl(0, 70%, 50%); color:white; text-align:center; border-radius:25px; width:85px; font-size:14px; ">Diperiksa</p>';;
                      } elseif($row['sttus'] == 1){
                        echo '    <p style="background-color:DodgerBlue; color:white; text-align:center; border-radius:25px; width:85px; font-size:14px;">Diteruskan</p>';
                      } else {
                        echo '<p style="background-color:rgb(255, 165, 0); color:white; text-align:center; border-radius:25px; width:85px; font-size:14px;">Diterima</p>';
                      } ?></td>
                  <td>
                   <?php if($_SESSION['status'] == 4 ||  $_SESSION['status'] == 2): ?>
                   <!--<a href="editSuratMasuk.php?id=<?php echo $row['id']; ?>"> <button class="btn btn-success btn-sm" id="edit"> <span class="glyphicon glyphicon-pencil"></span></button></a>
                   <a href="hapusSuratMasuk.php?id=<?php echo $row['id']; ?>" onClick="return confirm('Apakah Anda Yakin Ingin Menghapus Data?')"><button class="btn btn-danger btn-sm" id="hapus"> <span class="glyphicon glyphicon-trash"></span></button></a> -->
                      <?php  if($row['sttus'] == 1 || $row['sttus'] == 2): ?>
                        <a href="DetailDisposisi.php?id=<?php echo $row['id_dspss']; ?>"> <button class="btn btn-primary btn-xs" id="edit">Lihat Disposisi</span></button></a>
                       <a href="TerusanDisposisi.php?id=<?php echo $row['id_dspss']; ?>"> <button class="btn btn-primary btn-xs" id="edit">Lihat Terusan</span></button></a>
                      <?php endif;  ?>
                  <?php endif;  ?>


                   <?php if($_SESSION['status'] == 2): ?>
                        <?php  if($row['sttus'] == 0): ?>
                           <a href="lembardisposisi_staff.php?id=<?= $row['id_disposisi'] ?>"> <button class="btn btn-success btn-sm" id="edit"> <span class="glyphicon glyphicon-edit"></span></button></a>
                        <?php endif; ?>
                        
                  <?php endif;  ?>
                   <td>
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