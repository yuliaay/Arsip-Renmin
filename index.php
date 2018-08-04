<?php

require_once "core/init.php";

if(!isset($_SESSION['user'])) {
  header('Location: login.php');
}


?>
<!doctype html>
<html lang="en">
  <style type="text/css">
    
  .row-ss {
    margin-top: 8%;
  }

    #ss-surat {
      margin-top: 8%;
    }
  }

  </style>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="vendor/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/admin/css/default.css">
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="vendor/css/animate.css" type="text/css" />
    <link rel="stylesheet" href="vendor/css/font-awesome.min.css" type="text/css" />
    <link rel="stylesheet" href="vendor/css/font.css" type="text/css" />
    <link rel="stylesheet" href="vendor/js/calendar/bootstrap_calendar.css" type="text/css" />
    <link rel="stylesheet" href="vendor/css/app.css" type="text/css" />

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

          <section class="vbox">          
            <section class="scrollable padder">

              <div class="m-b-md">
                <h3 class="m-b-none">Data Arsip Surat</h3>
                <small>Welcome back, Noteman</small>
              </div>

              <?php

                $querysm = mysqli_query($link,"SELECT * FROM surat_masuk");
                $hasilsm = mysqli_num_rows($querysm);

                $querysk = mysqli_query($link,"SELECT * FROM surat_keluar");
                $hasilsk = mysqli_num_rows($querysk);

                $queryag = mysqli_query($link,"SELECT * FROM agenda");
                $hasilag = mysqli_num_rows($queryag);

                $queryus = mysqli_query($link,"SELECT * FROM users");
                $hasilus = mysqli_num_rows($queryus);



                $hasiltotal = $hasilsm + $hasilsk + $hasilag;
              ?>
 

              
              <section class="panel panel-default">
                  <div class="col-sm-6 col-md-3 padder-v b-r b-light lt">
                    <span class="fa-stack fa-2x pull-left m-r-sm">
                
                      <span class="easypiechart pos-abt" data-percent="100" data-line-width="4" data-track-Color="#fff" data-scale-Color="false" data-size="50" data-line-cap='butt' data-animate="2000" data-target="#bugs" data-update="3000"><span class="glyphicon glyphicon-log-out"></span></span>
                    </span>
                    <a class="clear" href="lihatSuratMasuk.php">
                      <span class="h3 block m-t-xs"><strong id="bugs"><?php echo $hasilsm; ?></strong></span>
                      <small class="text-muted text-uc">Surat Masuk</small>
                    </a>
                  </div>

                  <div class="col-sm-6 col-md-3 padder-v b-r b-light lt">
                    <span class="fa-stack fa-2x pull-left m-r-sm">
                      <span class="easypiechart pos-abt" data-percent="100" data-line-width="4" data-track-Color="#fff" data-scale-Color="false" data-size="50" data-line-cap='butt' data-animate="2000" data-target="#bugs" data-update="3000"><span class="glyphicon glyphicon-log-out"></span></span>
                    </span>
                    <a class="clear" href="lihatSuratKeluar.php">
                      <span class="h3 block m-t-xs"><strong id="bugs"><?php echo $hasilsk; ?></strong></span>
                      <small class="text-muted text-uc">Surat Keluar</small>
                    </a>
                  </div>

                  <div class="col-sm-6 col-md-3 padder-v b-r b-light lt">
                    <span class="fa-stack fa-2x pull-left m-r-sm">
                      <span class="easypiechart pos-abt" data-percent="100" data-line-width="4" data-track-Color="#fff" data-scale-Color="false" data-size="50" data-line-cap='butt' data-animate="2000" data-target="#bugs" data-update="3000"><span class="glyphicon glyphicon-edit"></span></span>
                    </span>
                    <a class="clear" href="lihatAgenda.php">
                      <span class="h3 block m-t-xs"><strong id="bugs"><?php echo $hasilag; ?></strong></span>
                      <small class="text-muted text-uc">Agenda</small>
                    </a>
                  </div>
                  
                  <div class="col-sm-6 col-md-3 padder-v b-r b-light">                     
                    <span class="fa-stack fa-2x pull-left m-r-sm">
                      <span class="easypiechart pos-abt" data-percent="100" data-line-width="4" data-track-Color="#f5f5f5" data-scale-Color="false" data-size="50" data-line-cap='butt' data-animate="3000" data-target="#firers" data-update="5000"><span class="glyphicon glyphicon-sort"></span></span>
                    </span>
                    <a class="clear" href="#">
                      <span class="h3 block m-t-xs"><strong id="firers"><?php echo $hasiltotal; ?></strong></span>
                      <small class="text-muted text-uc">Total Data</small>
                    </a>
                  </div>
              </section>

          
              <div class="row-ss">         
               <section class="panel panel-default">

                <div class="panel-body">
                  <div id="flot-1ine" style="height:250px"></div>
                </div>
                <footer class="panel-footer bg-white">
                  <div class="row text-center no-gutter">
                    <div class="col-xs-3 b-r b-light">
                      <p class="h3 font-bold m-t"><?php echo $hasilsm; ?></p>
                      <p class="text-muted"><a class="clear" href="lihatSuratMasuk.php">Surat Masuk</a></p>
                    </div>
                    <div class="col-xs-3 b-r b-light">
                      <p class="h3 font-bold m-t"><?php echo $hasilsk; ?></p>
                      <p class="text-muted"><a class="clear" href="lihatSuratKeluar.php">Surat Keluar</a></p>
                    </div>
                    <div class="col-xs-3 b-r b-light">
                      <p class="h3 font-bold m-t"><?php echo $hasilag; ?></p>
                      <p class="text-muted"><a class="clear" href="lihatAgenda.php">Agenda</a></p>
                    </div>
                    <div class="col-xs-3">
                      <p class="h3 font-bold m-t"><?php echo $hasilus; ?></p>
                      <p class="text-muted">Pengguna</p>                        
                    </div>
                  </div>
                </footer>
              </section>             
            </div>
                              
        
        
        </div>


        <?php require_once 'footer.php'; ?>
    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="vendor/bootstrap-3.3.7-dist/js/jquery.js"></script>
    <script src="vendor/bootstrap-3.3.7-dist/js/bootstrap.js"></script>
    <script src="vendor/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    <script src="vendor/admin/js/default.js"></script>
    <script src="js/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="vendor/js/bootstrap.js"></script>
    <!-- App -->
    <script src="vendor/js/app.js"></script>
    <script src="vendor/js/app.plugin.js"></script>
    <script src="vendor/js/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="vendor/js/charts/easypiechart/jquery.easy-pie-chart.js"></script>
    <script src="vendor/js/charts/sparkline/jquery.sparkline.min.js"></script>
    <script src="vendor/js/charts/flot/jquery.flot.min.js"></script>
    <script src="vendor/js/charts/flot/jquery.flot.tooltip.min.js"></script>
    <script src="vendor/js/charts/flot/jquery.flot.resize.js"></script>
    <script src="vendor/js/charts/flot/jquery.flot.grow.js"></script>
    <script src="vendor/js/charts/flot/demo.js"></script>

    <script src="vendor/js/calendar/bootstrap_calendar.js"></script>
    <script src="vendor/js/calendar/demo.js"></script>

    <script src="vendor/js/sortable/jquery.sortable.js"></script>
  </body>
</html>