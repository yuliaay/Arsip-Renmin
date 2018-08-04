<?php

require_once "core/init.php";

if(!isset($_SESSION['user'])) {
  header('Location: login.php');
}

$id = @$_GET['id'];

?>

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
           		<p class="page_title"> Setting </p>  
              </header>



		<table class="table table-hover">

		    <tr>
		      <td>Nama</td>
		      <td></td>
		      <td></td>
		    </tr>
		    <tr>
		      <td>Username</td>
		      <td>Thornton</td>
		      <td>@fat</td>
		    </tr>
		    <tr>
		      <td>Password</td>
		      <td>the Bird</td>
		      <td>@twitter</td>
		    </tr>
		    <tr>
		      <td>Status</td>
		      <td>the Bird</td>
		      <td>@twitter</td>
		    </tr>
		   </tbody>
		</table>
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