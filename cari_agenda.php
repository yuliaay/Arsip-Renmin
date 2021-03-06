<?php
require_once "core/init.php";

if(!isset($_SESSION['user'])) {
  header('Location: login.php');
}


$articles = tampilkan_agenda();
if(isset($_GET['cari'])){
  $cari     = $_GET['cari'];
  $articles = hasil_cari_agenda($cari);
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

              <form action="cari_agenda.php" method="get">
                <input type="text" name="cari" class="hidden-sn hidden-xs" id="header-search-field" placeholder="Search for Something..">
              </form>
              </div>


              <div class="col-md-7">
                <ul>       
                  <div class="dropdown pull-right">
                  <li class="fixed-width"> 
                   <button class="dropbtn "><span class="glyphicon glyphicon-bell" id="notif"></span></button>
                         <span class="label label-success">  <?php echo "$count"; ?></span>
                          <div class="dropdown-content">
                            <?php  
                            foreach ($data as $value) {
                              # code...
                          ?>
                            <?php if($value['read_n'] == '1'){ 
                              $id = $value['id'];
                              ?>
                            <a href="?notf=<?php echo $value['id']; ?>" class="alert-danger"> Anda Menerima 1 <?php echo $value['title']; ?> Baru </a>
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

        <form action="cari_agenda_tgl.php" method="get">
        <div class="row" id="caridata"> 
          <div class="col-sm-4"> <input type="date" class="form-control" name="tgl_surat_mulai" placeholder="Tanggal Mulai" required> </div>

          <div class="col-sm-4"> <input type="date" class="form-control" name="tgl_surat_selesai" placeholder="Tanggal Selesai" required></div>

           <div class="col-sm-4">  <button type="submit" class="btn btn-success" id="btncari" > <span class="glyphicon glyphicon-search"></span> Cari  </button>  </div>
        </div>
      </form>


         <div id="content">
            <nav id="navbar-example" class="navbar navbar-light bg-light">
              <header>
                <a href="cetakAgenda.php"> <button type="submit" class="btn btn-success pull-right"  name="submit" value="Cetak Data" id="btncetak"> <span class="glyphicon glyphicon-download-alt"></span> Cetak  </button> </a>
                 <?php if($_SESSION['status'] == 1
                    || $_SESSION['status'] == 0  || $_SESSION['status'] == 3  ): ?><a href="inputAgenda.php">  <button type="submit" class="btn btn-primary pull-right"  name="submit" value="Input Data" id="btninput"> <span class="glyphicon glyphicon-edit"></span> Input </button></a>
                  <?php endif;  ?>

                <p class="page_title"><a href="lihatAgenda.php"> Data Agenda </a></p>  
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
                  <td>
                   <?php if($_SESSION['status'] == 1
                    || $_SESSION['status'] == 0 
                 ): ?>
                   <a href="editAgenda.php?id=<?php echo $row['id']; ?>"> <button class="btn btn-success btn-xs" id="edit"> <span class="glyphicon glyphicon-pencil"></span></button></a>
                   <a href="hapusAgenda.php?id=<?php echo $row['id']; ?>" onClick="return confirm('Apakah Anda Yakin Ingin Menghapus Data?')"><button class="btn btn-danger btn-xs" id="hapus"> <span class="glyphicon glyphicon-trash"></span></button></a>
                   <a href="detailAgenda.php?id=<?php echo $row['id']; ?>"> <button class="btn btn-primary btn-xs" id="edit"> <span class="glyphicon glyphicon-zoom-in"></span></button></a>
                  <?php endif;  ?>

                   <?php if($_SESSION['status'] == 2
                    || $_SESSION['status'] == 4
                 ): ?>
                  <a href="detailAgenda.php?id=<?php echo $row['id']; ?>"> <button class="btn btn-primary btn-xs" id="edit"> <span class="glyphicon glyphicon-zoom-in"></span></button></a>
                   <a href="disposisiAgenda.php?id=<?php echo $row['id']; ?>"> <button class="btn btn-success btn-xs" id="edit"> <span class="glyphicon glyphicon-edit"></span></button></a>
                   
                  <?php endif;  ?>
                 </td>
                </tr>
              <?php endwhile; ?>
              </tbody>
            </table>
          </nav>
         </div>

        <?php require_once 'footer.php'; ?>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="vendor/bootstrap-3.3.7-dist/js/jquery.js"></script>
    <script src="vendor/bootstrap-3.3.7-dist/js/bootstrap.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>
    <script src="vendor/admin/js/default.js"></script>
  </body>
  </body>
</html>